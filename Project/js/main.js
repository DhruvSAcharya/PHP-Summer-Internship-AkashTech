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
                    $(".alert").removeClass("visually-hidden");
                    $(".alert").removeClass("alert-primary");
                    $(".alert").addClass("alert-warning");
                    $("#alert-msg").html('User Alrady Exist with this Email.');
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
                    window.location.href = "home.html";
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
    })

}

function logoutProcess(){
    window.location.href = "index.html";
}



