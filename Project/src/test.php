<?php 
require 'mailprocess/SendMail.php';

$mail = new SendMail;
$mail->setTO("ds.acharya29@gmail.com");
$mail->setSubject("for varification of you account");
$mail->setBody("<h1>hello how are you</h1><br>
                <p>varify you email.</p>
                <br><a href=\"http://localhost/PHP%20Summer%20Internship%20AkashTech/Project/emailvarification?key=\">click here</a><br>");
$mail->send();


?>