userid="";

function executeInsert(){
    console.log("hello");
    var id = userid;
    var name = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var dob = document.getElementById("dob").value;
    var ele = document.getElementsByName('gender');
    for(i = 0; i < ele.length; i++) {
        if(ele[i].checked)
            var gender = ele[i].value;
    }
    var address = document.getElementById("address1").value+' '+document.getElementById("address2").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var pincode = document.getElementById("zip").value;   


    if(name === "", email === "" , mobile === "" , dob === "", gender ==="" , address === "", city === "", state === "", pincode === ""){
        alert("Please fill All the fields");
    }else{

        data = {"id":id,"name": name, "email": email, "mobile": mobile, "dob": dob,
        "gender": gender, "address": address, "city": city, "state": state, "pincode": pincode};
        if(document.getElementById("insert-updatebtn").innerHTML == "Update"){
            ajaxRequest('updateData.php',data);
            console.log("update");
        }else{
            ajaxRequest('insert.php',data);
            console.log("insert");
        }
        

    }


}

function updateData(userid){
    this.userid = userid;
    console.log("inup: " + userid);
    
    makeAllEmpty();
    document.getElementById("fname").value = document.getElementById("card-"+userid+"-name").innerHTML.trim();
    document.getElementById("email").value = document.getElementById("card-"+userid+"-email").innerHTML.trim();
    document.getElementById("mobile").value = document.getElementById("card-"+userid+"-number").innerHTML.trim();
    document.getElementById("dob").value = document.getElementById("card-"+userid+"-dob").innerHTML.trim();
    document.getElementById("address1").value = document.getElementById("card-"+userid+"-address").innerHTML.trim();
    document.getElementById("city").value = document.getElementById("card-"+userid+"-city").innerHTML.trim();
    document.getElementById("state").value = document.getElementById("card-"+userid+"-state").innerHTML.trim();
    document.getElementById("zip").value = document.getElementById("card-"+userid+"-zip").innerHTML.trim(); 
    var ele = document.getElementsByName('gender');
    for(i = 0; i < ele.length; i++) {
        if(ele[i].value == document.getElementById("card-"+userid+"-gender").innerHTML.trim())
            ele[i].checked = true;
    }
    var btn = document.getElementById("insert-updatebtn");
    btn.innerHTML = "Update";
    btn.classList.remove("btn-light");
    btn.classList.add("btn-primary");

    var btn = document.getElementById("show-cancel");
    btn.innerHTML = "Cancel";
    btn.classList.remove("btn-light");
    btn.classList.add("btn-dark");


}

function deleteData(userid){
    data = {"userid":userid};
    ajaxRequest('delete.php', data);

}

function cancelUpdate(){
    console.log("in can: "+userid);
    makeAllEmpty();
    var btn = document.getElementById("insert-updatebtn");
    btn.innerHTML = "Insert";
    btn.classList.remove("btn-primary");
    btn.classList.add("btn-light");

    var btn = document.getElementById("show-cancel");
    btn.innerHTML = "Show";
    btn.classList.remove("btn-dark");
    btn.classList.add("btn-light");
}

function displayData(){
    if(document.getElementById("show-cancel").innerHTML == "Cancel"){
        cancelUpdate();
        console.log("cancel");
    }else{
        ajaxRequest2('displayData.php','','dispay-output');
        console.log("show");
    }
    
}


/*

ajax call
1 php file name
2 data to send 

*/ 
function ajaxRequest(filename , data) {
    xhr = new XMLHttpRequest();

    xhr.open('POST', filename, true);
    xhr.onload = function () {
        
        result = this.responseText;

        if(result === "1"){
            displayData();
            makeAllEmpty();
        }else{
            console.log(result);
        }
    }    
    
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.addEventListener('error', function (event) {
        alert('Oops! Something went wrong.');
    });

    xhr.send(JSON.stringify(data));
}


/*

ajax call
1 php file name
2 data to send 
3 html tag id to display result

*/ 
function ajaxRequest2(filename , data , target) {
    xhr = new XMLHttpRequest();

    xhr.open('POST', filename, true);
    xhr.onload = function () {
        document.getElementById(target).innerHTML=this.responseText;
    }    
    
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.addEventListener('error', function (event) {
        alert('Oops! Something went wrong.');
    });

    xhr.send(JSON.stringify(data));
}

function makeAllEmpty(){
    document.getElementById("fname").value = "";
    document.getElementById("email").value= "";
    document.getElementById("mobile").value= "";
    document.getElementById("dob").value= "";
    var ele = document.getElementsByName('gender');
    for(i = 0; i < ele.length; i++) {
            ele[i].checked = false;
    }
    document.getElementById("address2").value = "";
    document.getElementById("address1").value = "";
    document.getElementById("city").value = "";
    document.getElementById("state").value = "";
    document.getElementById("zip").value = "";  
}

