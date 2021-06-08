<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['submit'])){

  $name =  $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  require_once "PHPMailer.php";
  require_once "SMTP.php";
  require_once "Exception.php";

  $mail = new PHPMailer();

  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "ds.acharya11@gmail.com";
  $mail->Password = "";
  $mail->Port = 465;
  $mail->SMTPSecure = "ssl";

  $mail->isHTML(true);
  $mail->setFrom($email, $name);
  $mail->addAddress("ds.acharya11@gmail.com");
  $mail->Subject = ($subject);
  $mail->Body = "Mail from : ".$email."<br>
  Name is ".$name.".<br><br>".$message;


  if($mail->send()){
    $status = "success";
    $response = "Email is sent";
  }else{
    $status = "faild";
    $response = "Something is wrong".$mail->ErrorInfo;
  }

  echo "status: ". $status. " <br> Result: ". $response;



}



?>
