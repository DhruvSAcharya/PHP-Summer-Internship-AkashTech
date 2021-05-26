function executeCode(){
    
    fetch ("forloop.php")
    .then(x => x.text())
    .then(y => document.getElementById("display").innerHTML = y);


    
}

function executeCode1(){

    fetch ("vardeclar.php")
    .then(x => x.text())
    .then(y => document.getElementById("display-output-varstm").innerHTML = y);

}

function executeSwich(){

    fetch ("swichstatement.php")
    .then(x => x.text())
    .then(y => document.getElementById("display-output-swich").innerHTML = y);

}