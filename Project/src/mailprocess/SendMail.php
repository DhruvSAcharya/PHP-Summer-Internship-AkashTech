<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once "PHPMailer.php";
require_once "SMTP.php";
require_once "Exception.php";
include 'info.php';
class SendMail {

  public $to;
  public $subject;
  public $body;

  function setTO($to){
    $this->to = $to;
  }
  function setSubject($subject){
    $this->subject = $subject;
  }

  function setBody($body){
    $this->body = $body;
  }

  function send(){
    global $myemail;
    global $mypassword;

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $myemail;
    $mail->Password = $mypassword;
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom($this->to);
    $mail->addAddress($this->to);
    $mail->Subject = $this->subject;
    $mail->Body = $this->body;


    if($mail->send()){
      $status = "1";
      $response = "Email is sent";
    }else{
      $status = "0";
      $response = "Something is wrong".$mail->ErrorInfo;
    }
    if($status == "1"){
      return $status;
    }else{
      return $response;
    }
    
  }
  

}




?>
