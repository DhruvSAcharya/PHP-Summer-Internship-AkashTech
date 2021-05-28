<?php 

$data = stripslashes(file_get_contents("php://input"));

$subjects = json_decode($data, true);

$os = $subjects['os'];
$ds = $subjects['ds'];
$cn = $subjects['cn'];
$toc = $subjects['toc'];
$cd = $subjects['cd'];

$total = $os+$ds+$cn+$toc+$cd;
$percentage = ($total*100)/500;
if($percentage > 30){
    switch ($percentage) {
        case $percentage <= 59:
            $class = "Second class";
            break;
        case $percentage <= 79:
            $class = "First class";
            break;
        case $percentage >= 80:
            $class = "First class with Distinction";
            break;
        default:
           $class = "Error";
            break;
    }
    $status = "Cool.. You have Pass the Exam with '".$class."'.";
}else{
    $status = "So Sorry, You have failed this Exam.";
}

echo "<b>Marks</b>
<br>Operating System: ".$os."<br>".
    "Data Structure: ".$ds."<br>".
    "Computer Network: ".$cn."<br>".
    "Theory of Computation: ".$toc."<br>".
    "Compiler Design: ".$cd."<br><br>".
    "<b>Total</b>: ".$total."<br>".
    "<b>Percentage: </b>".$percentage."%<br><br>".
    "<h3>".$status."</h3>";




?>