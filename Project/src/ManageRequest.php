<?php 

require "DatabaseManagment.php";
include "user.php";

$data = stripslashes(file_get_contents("php://input"));
$data2 = json_decode($data, true);
$fname  = $data2['fname'];
// $fname  = "registerUser";



$newuser = new UserModel;
$db_manage = new DatabaseManagment;





$bool = false;

switch ($fname) {
    case 'registerUser':
        $name  = $data2['name'];
        $mobile  = $data2['mobile'];
        $email  = $data2['email'];
        $password  = $data2['password'];
        // $name  = "Dhruv";
        // $mobile  = "12345";
        // $email  = "ds.acharya29@gmail.com";
        // $password  = "abc123";

        $newuser->setName($name);
        $newuser->setEmail($email);
        $newuser->setMobile($mobile);
        $newuser->setPassword($password);
        
        $db_manage->registerUser($newuser);
        break;

    case 'processLogin':

        $email  = $data2['email'];
        $password  = $data2['password'];

        $newuser->setEmail($email);
        $newuser->setPassword($password);

        $db_manage->processLogin($newuser);
        break;
    
    default:
        $error =  "error..";
        $bool = true;
        break;
}

if($bool){
    $return_arr[] = array("eror"=>$error);

    echo json_encode($return_arr);
}


?>