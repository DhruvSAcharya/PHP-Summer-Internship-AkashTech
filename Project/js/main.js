function registerUser(e){
    e.preventDefault();
    var name = document.getElementById("signin-name").value;
    var mobile = document.getElementById("signin-mobile").value;
    var email = document.getElementById("signin-email").value;
    var password = document.getElementById("signin-password").value;

    mydata = {"fname":"registerUser","name": name, "mobile": mobile, "email": email, "password": password};

    $.ajax({
        url: "src/ManageRequest.php",
        method: "POST",
        data: JSON.stringify(mydata),
        success: function(data){
            var res = JSON.parse(data)
            console.log(res[0].res);
            switch (res[0].res) {
                case "1":
                    $("#myform")[0].reset();
                    $(".alert").removeClass("visually-hidden");
                    $(".alert").removeClass("alert-warning");
                    $(".alert").addClass("alert-primary");
                    $("#alert-msg").html('Registerd Successfully, <a href="index.html">Login</a> to Get Started.');
                    break;
                case "2":
                    console.log(res[0].res);
                    $(".alert").removeClass("visually-hidden");
                    $(".alert").removeClass("alert-primary");
                    $(".alert").addClass("alert-warning");
                    $("#alert-msg").html('User Alrady Exist with this Email.');
                    break;
                case "3":
                    console.log(res[0].error);
                    $(".alert").removeClass("visually-hidden");
                    $(".alert").removeClass("alert-primary");
                    $(".alert").addClass("alert-warning");
                    $("#alert-msg").html('Error in sending email.');
                    break;
                case "4":
                    console.log(res[0].error);
                    $(".alert").removeClass("visually-hidden");
                    $(".alert").removeClass("alert-primary");
                    $(".alert").addClass("alert-warning");
                    $("#alert-msg").html('error to store data in database.');
                    break;
            
                default:
                    console.log("error:"+res[0].res);
                    break;
            }
            
        }
    })
}//end of function

function processlogin(e){
    e.preventDefault();

    var email = document.getElementById("login-email").value;
    var password = document.getElementById("login-password").value;

    mydata = {"fname":"processLogin", "email": email, "password": password};

    $.ajax({
        url: "src/ManageRequest.php",
        method: "POST",
        data: JSON.stringify(mydata),
        success: function(data){
            console.log(data);
            var res = JSON.parse(data)
            console.log(res);
            switch (res[0].res) {
                case "0":
                    $(".alert").removeClass("visually-hidden");
                    $("#alert-msg").html('Pleace Verify Your Account First.');
                    break;
                case "1":
                    $("#myform")[0].reset();
                    window.location.href = "home.php";
                    break;
                case "2":
                    $(".alert").removeClass("visually-hidden");
                    $("#alert-msg").html('Wrong Password');
                    break;
                case "3":
                    $(".alert").removeClass("visually-hidden");
                    $("#alert-msg").html('User not found');
                    break;
                default:
                    console.log("error:"+res[0].res);
                    break;
            }
            
        }
    });

}//end function

// <------------ send otp ------------->
$("#sendotp").click(function(){
    console.log("otp sent");
    
    $("#emailHelp").html("The OTP will be sent to this Email Address.");
    $("#emailHelp").removeClass("text-danger");
    $("#sendotp").addClass("disabled");
    $(".displayspinner").removeClass("d-none");
    processSendOTP();
});
function processSendOTP(){
    console.log("function call");

    var email = document.getElementById("fp-email").value;
    console.log(email);

    if(email != ""){

        mydata = {"fname":"processSendOTP","email": email};

        $.ajax({
            url: "src/ManageRequest.php",
            method: "POST",
            data: JSON.stringify(mydata),
            success: function(data){
                console.log(data);
                var res = JSON.parse(data)
                console.log(res);
                switch (res[0].res) {
                    case "1":
                        $(".otpsentmsg").removeClass("d-none");
                        break;
                    case "2":
                        console.log("error:"+res[0].error);
                        break;
                    case "3":
                        $(".alert").removeClass("d-none");
                        $("#alert-msg").html("User Not Found")
                        break;
                    default:
                        console.log("error:"+res[0].res);
                        break;
                }

            }
        });

    }else{
        console.log("fill it");
        $("#emailHelp").addClass("text-danger");
        $("#emailHelp").html("Please enter your email address.");
    }

    $(".displayspinner").addClass("d-none");
    $("#sendotp").removeClass("disabled");

}//end function

// <------------ updatepassword ------------->

function processUpdatePassword(e){
    e.preventDefault();

    var password = document.getElementById("up-password").value;
    var cpassword = document.getElementById("up-confirmpassword").value;
    var email = document.getElementById("up-email").value;
    var otp = document.getElementById("up-otp").value;
    console.log(email);

    if(password == cpassword && password != "" && cpassword != "" && email != "" && otp != ""){

        mydata = {"fname":"processUpdatePassword","password": password, "email" : email, "otp": otp};

        $.ajax({
            url: "src/ManageRequest.php",
            method: "POST",
            data: JSON.stringify(mydata),
            success: function(data){
                console.log(data);
                var res = JSON.parse(data)
                console.log(res);
                switch (res[0].res) {
                    case "1":
                        $("#fp2-alert").removeClass("d-none");
                        $("#fp2-alert-msg").html("Password Updated Successfully. <a href=\"index.html\">Login</a> to your account");
                        $("#up-password").val("");
                        $("#up-confirmpassword").val("");
                        break;
                    case "2":
                        $("#fp2-alert").removeClass("d-none");
                        $("#fp2-alert").removeClass("alert-success");
                        $("#fp2-alert").addClass("alert-warning");
                        $("#fp2-alert-msg").html(res[0].error);
                        break;
                    case "3":
                        $("#fp2-alert").removeClass("d-none");
                        $("#fp2-alert").removeClass("alert-success");
                        $("#fp2-alert").addClass("alert-warning");
                        $("#fp2-alert-msg").html(res[0].error);
                       
                        break;
                    case "4":
                        $("#fp2-alert").removeClass("d-none");
                        $("#fp2-alert").removeClass("alert-success");
                        $("#fp2-alert").addClass("alert-warning");
                        $("#fp2-alert-msg").html(res[0].error);
                       
                        break;
                    default:
                        console.log("error:"+res[0].res);
                        break;
                }
            }
        });

    }else{
        console.log("fill it");
        $("#up-password").val("");
        $("#up-confirmpassword").val("");
        alert("Something went Wrong, Enter password again");
    }

}

// <------------ check OTP ------------->
$("#btnsubmitfrotpass").click(function(e){
    e.preventDefault();
    processVarifyOtp();
});
function processVarifyOtp(){
    console.log("hello from function");

    var email = document.getElementById("fp-email").value;
    var otp = document.getElementById("fp-otp").value;

    if(email != "" && otp != ""){

        mydata = {"fname":"processVarifyOtp", "email" : email, "otp": otp};

        $.ajax({
            url: "src/ManageRequest.php",
            method: "POST",
            data: JSON.stringify(mydata),
            success: function(data){
                console.log(data);
                var res = JSON.parse(data)
                console.log(res);
                switch (res[0].res) {
                    case "1":
                        $("#forgot1-form").submit();
                        //window.location.href = "forgotpassword.php";
                        break;
                    case "2":
                        $("#forgot1-alert").removeClass("d-none");
                        $("#forgot1-alert-msg").html(res[0].error);
                        console.log("error:"+res[0].error);   
                        break;
                    default:
                        console.log("error:"+res[0].res);
                        break;
                }

            }
        });

    }else{
        
    }

}

// <------------ change produc priority function ------------->

function showRangeVal(val){
    document.getElementById("productpriorityvalue").innerHTML = val;
}

// <------------ update shop details ------------->
function processUpdate(e){
    e.preventDefault();
    var btnname = document.getElementById("updateshopdeail").innerHTML;
    console.log(btnname);
    if(btnname == "Update Data"){
        $("#updateshopdeail").removeClass("btn-secondary");
        $("#updateshopdeail").addClass("btn-primary");
        $("#updateshopdeail").html("Save Data");
        $("#shopname").prop("disabled",false);
        $("#shopaddress").prop("disabled",false);
        $("#shopcontact").prop("disabled",false);
        $("#shopaboutus").prop("disabled",false);
    }
    if(btnname == "Save Data"){
        updateShopDetails(e);
    }

}

function updateShopDetails(e){

    e.preventDefault();

    var shopname = document.getElementById("shopname").value;
    var shopaddress = document.getElementById("shopaddress").value;
    var shopcontact = document.getElementById("shopcontact").value;
    var shopaboutus = document.getElementById("shopaboutus").value;


    if(shopname != "" && shopaddress != "" && shopcontact != "" && shopaboutus != ""){

        mydata = {"fname":"processUpdateShopDetails","shopname": shopname, "shopaddress" : shopaddress, "shopcontact": shopcontact,"shopaboutus":shopaboutus};

        $.ajax({
            url: "src/ManageRequest.php",
            method: "POST",
            data: JSON.stringify(mydata),
            success: function(data){
                console.log(data);
                var res = JSON.parse(data)
                console.log(res);
                switch (res[0].res) {
                    case "1":
                        $("#sp-aleart").removeClass("d-none");
                        $("#sp-msg-aleart").html("successfully inserted");
                        $("#updateshopdeail").removeClass("btn-primary");
                        $("#updateshopdeail").addClass("btn-secondary");
                        $("#updateshopdeail").html("Update Data");
                        $("#shopname").prop("disabled",true);
                        $("#shopaddress").prop("disabled",true);
                        $("#shopcontact").prop("disabled",true);
                        $("#shopaboutus").prop("disabled",true);
                        break;
                    case "2":
                        $("#sp-aleart").removeClass("d-none");
                        $("#sp-msg-aleart").html("Error in insert: ".res[0].error);
                    
                        break;
                    case "3":
                        $("#sp-aleart").removeClass("d-none");
                        $("#sp-msg-aleart").html("successfully Updated");
                        $("#updateshopdeail").removeClass("btn-primary");
                        $("#updateshopdeail").addClass("btn-secondary");
                        $("#updateshopdeail").html("Update Data");
                        $("#shopname").prop("disabled",true);
                        $("#shopaddress").prop("disabled",true);
                        $("#shopcontact").prop("disabled",true);
                        $("#shopaboutus").prop("disabled",true);
                        break;
                    case "4":
                        $("#sp-aleart").removeClass("d-none");
                        $("#sp-msg-aleart").html("Error in update: ".res[0].error);
                        break;
                    case "5":
                        $("#sp-aleart").removeClass("d-none");
                        $("#sp-msg-aleart").html("Error in updating user: ".res[0].error);
                        break;
                   
                    default:
                        console.log("error:"+res[0].res);
                        break;
                }
            }
        });

    }else{
        alert("fill all the fields");
    }
}// <------------end of update shop details ------------->


// <------------uplod product details ------------->
$(document).ready(function() {
    $(document).on("submit","#productform",function(event){
        event.preventDefault();
        console.log("in document");
        $.ajax({
            url: 'src/addproduct.php',
            type: 'post',
            dataType: 'json',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(res){
               console.log(res);
               switch (res[0].res) {
                case "1":
                    $("#addp-aleart").removeClass("d-none");
                    $("#addp-msg-aleart").html("Product added Successfully");
                    $('#productform').trigger("reset");
                    getProductOfCurrentUser();
                    break;
                case "2":
                    console.log(res[0].error);
                    break;
                case "3":
                    console.log(res[0].error);
                    break;
                default:
                    console.log("error:"+res[0].res);
                    break;
            }
            },
            error : function(){
                console.log("error");
            },
         });//ajax
    });//onsubmit
});
// <------------ end of add product ------------->

//<------------ get all product of current user ------------->
$(document).ready(function(){
    console.log("get ready call");
    getProductOfCurrentUser();
    getAllShopsAndProducts();
})
function getProductOfCurrentUser(){
    
    mydata = {"fname":"getCurrentUserProduct"};
    $.ajax({
        url: "src/ManageRequest.php",
        method: "POST",
        data: JSON.stringify(mydata),
        dataType: "html",
        success: function(data){
            $("#cardcontainer").html(data);
        }
    });
}

// <------------ getallshops and products  ------------->

function getAllShopsAndProducts(){
    mydata = {"fname":"getAllShopsAndProducts"};
    $.ajax({
        url: "src/ManageRequest.php",
        method: "POST",
        data: JSON.stringify(mydata),
        dataType: "html",
        success: function(data){
            $("#shopcontainer").html(data);
        }
    });
}

// <------------ update product  ------------->

// function updateProductDtails(id){
//     console.log(id);
//     mydata = {"fname":"updateProductDtails"};
//     $.ajax({
//         url: "src/ManageRequest.php",
//         method: "POST",
//         data: JSON.stringify(mydata),
//         dataType: "html",
//         success: function(data){
//             $("#shopcontainer").html(data);
//         }
//     });

// }

// <------------ delete product  ------------->

function deleteProduct(id){
    console.log(id);
    mydata = {"fname":"deleteProduct","id":id};
    $.ajax({
        url: "src/ManageRequest.php",
        method: "POST",
        data: JSON.stringify(mydata),
        success: function(data){
            console.log(data);
            var res = JSON.parse(data);
            console.log(res);
            switch (res[0].res) {
                case "1":
                    console.log("deleted succesfully");
                    getProductOfCurrentUser();
                    break;
                case "2":
                    console.log(res[0].error);
                    break;
                case "3":
                    console.log(res[0].error);
                    break;
                default:
                    console.log("error:"+res[0].res);
                    break;
            }
        }
    });

}
// <------------ getshopdetail ------------->
function getShopDetails(id){
    mydata = {"fname":"getShopDetails","id":id};
    $.ajax({
        url: "src/ManageRequest.php",
        method: "POST",
        data: JSON.stringify(mydata),
        dataType: "html",
        success: function(data){
            $("#shopdetailcontainer").html(data);
        }
    });
}


// <------------ getproductdetail ------------->
function getProductDetails(id){
    mydata = {"fname":"getProductDetails","id": id};
    $.ajax({
        url: "src/ManageRequest.php",
        method: "POST",
        data: JSON.stringify(mydata),
        dataType: "html",
        success: function(data){
            $("#productdetailcontainer").html(data);
        }
    });

}


// <------------ logout ------------->
function logoutProcess(){
    window.location.href = "index.html";
}



