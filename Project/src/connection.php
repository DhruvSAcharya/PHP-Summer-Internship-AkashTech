<?php 

 global $conn; 
 $conn = mysqli_connect("localhost","root","",'akashInternProject');

if($conn){
    //echo "Connected sucessfully.";
}else{
    die("Connection failed".mysqli_connect_error());
}

?>