function execute(){

    var os = document.getElementById("os").value;
    var ds = document.getElementById("ds").value;
    var cn = document.getElementById("cn").value;
    var toc = document.getElementById("toc").value;
    var cd = document.getElementById("cd").value;


    

    if( os === "" || ds === "" || cn === "" || toc === "" || cd === ""){
        alert("Please fill all the fields");
    }else{


        if(os <= 100 && ds <= 100 && cn <= 100 && toc <= 100 && cd <= 100) {
            
            var subjects = {"os":os , "ds":ds , "cn":cn , "toc":toc , "cd":cd };

            xhr = new XMLHttpRequest();

            
            xhr.open('POST', 'processMarks.php', true);

            xhr.onload = function () {
                document.getElementById("display-output-marks").innerHTML=this.responseText
                
            }


            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            xhr.addEventListener('error', function (event) {
                alert('Oops! Something went wrong.');
            });


            xhr.send(JSON.stringify(subjects));
            


        }else{
            alert('Value should be smaller than 100');
        }

        
    }

}


