function executeFactorial(){
    
    fetch ("factorial.php")
    .then(x => x.text())
    .then(y => document.getElementById("display-output-factorial").innerHTML = y);

}

function executeCode1(){

    fetch ("vardeclar.php")
    .then(x => x.text())
    .then(y => document.getElementById("display-output-varstm").innerHTML = y);

}

function executeSwich(){

    fetch ("switchstatement.php")
    .then(x => x.text())
    .then(y => document.getElementById("display-output-swich").innerHTML = y);

}

function executePalindrome(){

    fetch ("palindrome.php")
    .then(x => x.text())
    .then(y => document.getElementById("display-output-palindrome").innerHTML = y);

}

function executeFib(){

    console.log("hello")
    fetch ("fibonacci.php")
    .then(x => x.text())
    .then(y => document.getElementById("display-output-fibonacci").innerHTML = y);

}
