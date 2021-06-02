function execute(){

    var value = document.getElementById("arrayvalue").value;
   
    value = value.replaceAll('"','');

    var e = document.getElementById("select-function");
    var functionName = e.options[e.selectedIndex].text;

    funselect = {"arrayvalue":value,"fname":functionName};

    ajaxRequest('processfunction.php', funselect, "display-result" ); 
   

}



function changeSelectInput() {
    var e = document.getElementById("select-function");
    var functionName = e.options[e.selectedIndex].text;
    //console.log();
    data = {"type":e.value,"fname":functionName};
    ajaxRequest('displaycode.php',data,'code');
}



/*

ajax call
1 php file name
2 data to send 
3 html tag id to display result

*/ 
function ajaxRequest(filename , data , target) {
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