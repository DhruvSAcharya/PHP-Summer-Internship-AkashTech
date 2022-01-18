<?php 

require "DatabaseManagment.php";
//include "user.php";
//include "shop.php";

$data = stripslashes(file_get_contents("php://input"));
$data2 = json_decode($data, true);
$fname  = $data2['fname'];
// $fname  = "registerUser";



$newuser = new UserModel;
$newshop = new ShopModel;
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

    case 'processSendOTP':

        $email  = trim($data2['email']); 

        $newuser->setEmail($email);

        $db_manage->processSendOTP($newuser);
        break;
        
    case 'processUpdatePassword':
        $email  = trim($data2['email']); 
        $password  = trim($data2['password']); 
        $otp  = trim($data2['otp']); 

        $newuser->setEmail($email);
        $newuser->setOtp($otp);
        $newuser->setPassword($password);

        $db_manage->processUpdatePassword($newuser);
        break;
    
    case 'processVarifyOtp':
        $email  = trim($data2['email']); 
        $otp  = trim($data2['otp']); 

        $newuser->setEmail($email);
        $newuser->setOtp($otp);

        $db_manage->processVarifyOtp($newuser);
        break;

    case 'processUpdateShopDetails':
        $shopname  = trim($data2['shopname']); 
        $shopaddress  = trim($data2['shopaddress']); 
        $shopcontact  = trim($data2['shopcontact']); 
        $shopaboutus  = trim($data2['shopaboutus']); 

        $newshop->setShopname($shopname);
        $newshop->setShopaddress($shopaddress);
        $newshop->setShopcontact($shopcontact);
        $newshop->setShopaboutus($shopaboutus);

        $db_manage->processUpdateShopDetails($newshop);
        break;
    case 'getCurrentUserProduct':
        $db_manage->getCurrentUserProduct();
        break;
        
    case 'getAllShopsAndProducts':
        $db_manage->getAllShopsAndProducts();
        break;
    case 'deleteProduct':
        $id = $data2['id'];
        $db_manage->deleteProduct($id);
        break;
    case 'getShopDetails':
        $id = $data2['id'];
        $db_manage->getShopDetails($id);
        break;
    case 'getProductDetails':
        $id = $data2['id'];
        $db_manage->getProductDetails($id);
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