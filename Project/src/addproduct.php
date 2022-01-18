<?php
require 'DatabaseManagment.php';

$product = new ProductModel;
$managedb = new DatabaseManagment;
if(isset($_FILES['photo']['name'])){

   $pname =  $_POST['pname'];
   $pprice =  $_POST['pprice'];
   $pcategory =  $_POST['pcategory'];
   $offerdetail =  $_POST['offerdetail'];
   $pdescription =  $_POST['pdescription'];
   $pavilibility =  $_POST['pavilibility'];
   $ppriority =  $_POST['ppriority'];
   $pquantity =  $_POST['pquantity'];
   $filename = $_FILES['photo']['name'];

   

   //echo $pname." ".$pprice." ".$pcategory." ".$offerdetail." ".$pdescription." ".$pavilibility." ".$ppriority." ".$pquantity;


   $location = "../uploads/$filename";
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);
   //echo $imageFileType."<br>";
   $newfilename = md5($filename. time()).".".$imageFileType;
   $location = "../uploads/".$newfilename;
   $newlocation = "uploads/".$newfilename;
   //echo $newfilename."<br>";
   
   //echo $location."<br>";
   
   
   

   
   $valid_extensions = array("jpg","jpeg","png");

   $response = "";
   $error = 0;
   
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      
      if(move_uploaded_file($_FILES['photo']['tmp_name'],$location)){
         $response = $newlocation;
         $product->setName($pname);
         $product->setPrice($pprice);
         $product->setCategory($pcategory);
         $product->setOffer($offerdetail);
         $product->setDescriptions($pdescription);
         $product->setAvilibility($pavilibility);
         $product->setPriority($ppriority);
         $product->setQuantity($pquantity);
         $product->setImgpath($newlocation);
      }else{
         $response = '3';
         $error = "Failed to store photo";
         $return_arr[] = array("res"=>$response,"error"=>$error);
      }
   }
   if($response != "" && $response != '3'){
      $return_arr[] = $managedb->addProduct($product);
   }
   //echo $response."<br>";
   //print_r($return_arr);
   //echo "<br>";


   
   echo json_encode($return_arr);
   exit;
}else{
   $response = '2';
   $error = "photo not fount";
   $return_arr[] = array("res"=>$response,"error"=>$error);
   echo json_encode($return_arr);
}

//echo 0;