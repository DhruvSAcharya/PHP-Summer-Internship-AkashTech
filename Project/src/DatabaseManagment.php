<?php

require 'connection.php';
require 'mailprocess/SendMail.php';
require 'user.php';
require 'shop.php';
require 'product.php';
session_start();

class DatabaseManagment {


    function registerUser(UserModel $user){
        $newuser = new UserModel;
        global $conn;
        $response="";
        $error = "";

        $newuser  = $this->getUserByEmail($user);

        if($newuser->getEmail()==$user->getEmail()){
            $response = "2";
        }else{
            $key = md5(time().$user->getEmail());
            $sql  = "INSERT INTO user (NAME, EMAIL, MOBILE , PASSWORD, Vkey , is_verified , OTP, is_shopcreated) VALUES 
            ('".$user->getName()."', '".$user->getEmail()."', '".$user->getMobile()."','".$user->getPassword()."','".$key."',0,0,0)";
            $mailres = $this->sendverificationMail($user->getEmail(),$key);
            if($mailres == "1"){
                if(mysqli_query($conn, $sql)){
                    $response =  "1";
                } else {
                    $response = "4";
                    $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }else{
                $response = "3";
                $error = $mailres;
            }
            
        }

        $return_arr[] = array("res"=>$response,"error"=>$error);
        
        echo json_encode($return_arr);

        mysqli_close($conn);

    }//end fn

    function getUserByEmail(UserModel $user){
        $newuser = new UserModel;
        $email = $user->getEmail();
        global $conn;

        $sql = "SELECT * FROM user WHERE email='".$email."'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $newuser->setId($row['id']);
                $newuser->setName($row['NAME']);
                $newuser->setEmail($row['EMAIL']);
                $newuser->setMobile($row['MOBILE']);
                $newuser->setPassword($row['PASSWORD']);
                $newuser->setVkey($row['Vkey']);
                $newuser->setIs_verified($row['is_verified']);
                $newuser->setOtp($row['OTP']);
                $newuser->setIs_shopcreated($row['is_shopcreated']);
            }
        }

        return $newuser;

    }//end fn

    function processLogin(UserModel $user){
        
        $newuser = new UserModel;
        $response="";

        $newuser  = $this->getUserByEmail($user);
        

        if($newuser != null){
            if($newuser->getEmail()===$user->getEmail()){
                if($newuser->getPassword()===$user->getPassword()){
                    if($newuser->getIs_verified()==='1'){
                        $response = "1";
                        $this->startSession($newuser);
                    }else{
                        $response = "0";
                    }
                    
                }else{
                    $response = "2";
                }
            }else{
                $response = "3";
            }
        }else{
            $response = "3";
        }
        $return_arr[] = array("res"=>$response);
        
        echo json_encode($return_arr);

    }//end of fn

    function startSession(UserModel $user){        

        $_SESSION['currentUser'] = serialize($user);

    }

    function endSession(){
        session_destroy();
    }

    function processSendOTP(UserModel $user){
        $error = "no error";
        $otp = random_int(100000, 999999);
        $user->setOtp($otp);
        $userexist = $this->checkUserExistanceByEmail($user->getEmail());
        if($userexist == "1"){
            $mail = new SendMail;
            $mail->setTO($user->getEmail());
            $mail->setSubject("Password Reset One Time Password");
            $mail->setBody("<h3>This mail sent to you for Password Recovery</h3>
                            <p>Your OTP Is: </p>
                            <br>".$otp."<br>");
            $mailres = $mail->send();
            if($mailres == "1"){
                $updres = $this->updateUserOTPByMail($user);
                if($updres == "1"){
                    $response = "1";
                }else{
                    $response = "2";
                    $error = $updres;
                }
            }else{
                $response = "2";
                $error = $mailres;
            }
        }else{
            $response = "3";
            $error = "user not found";
        }
        
        $return_arr[] = array("res"=>$response,"error"=>$error);
        
        echo json_encode($return_arr);

    }//end fn

    function updateUserOTPByMail(UserModel $user){
        global $conn;
        $sql = "UPDATE user SET OTP = '".$user->getOtp()."' WHERE email = '".$user->getEmail()."'";

        if(mysqli_query($conn,$sql)){
            return "1";
        }else{
            return "error: ".mysqli_error($conn);
        }
        
    }//end fn

    function sendverificationMail($email , $key){

        $mail = new SendMail;
        $mail->setTO($email);
        $mail->setSubject("Varify Your email address");
        $mail->setBody("<h3>This mail sent to you to varify your email address.</h3>
                        <p>Click below link to varify.</p>
                        <br><a href=\"http://localhost/PHP%20Summer%20Internship%20AkashTech/Project/emailvarification?key=".$key."\">click here</a><br>");
        return $mail->send();
    }//end fn

    function processUpdatePassword(UserModel $user){
        global $conn;
        $response="";
        $error = "";

        $userexist = $this->checkUserExistanceByEmail($user->getEmail());
        if($userexist == "1"){
            $sql = "UPDATE user SET PASSWORD = '".$user->getPassword()."' WHERE EMAIL = '".$user->getEmail()."' AND OTP = '".$user->getOtp()."'";
            if(mysqli_query($conn, $sql)){
                $user->setOtp("0");
                $updres = $this->updateUserOTPByMail($user);
                if($updres == "1"){
                    $response = "1";
                }else{
                    $response = "2";
                    $error = "erorr in otp update";
                }
            }else{
                $response = "3";
                $error = "erorr in password update";;
               
            }
            
        }else{
            $response = "4";
            $error = "User not found";
        }

        $return_arr[] = array("res"=>$response,"error"=>$error);
        
        echo json_encode($return_arr);

    }//end fn

    function processVarifyOtp(UserModel $user){
        $newuser = new UserModel;
        $newuser = $this->getUserByEmail($user);
        $response = "";
        $error = "";


        if($newuser != null){
            if($user->getOtp() == $newuser->getOtp()){
                $response = "1";
            }else{
                $response = "2";
                $error = "Wrong otp";
            }
        }else{
            $response = "2";
            $error ="User Not Found";
        }

        $return_arr[] = array("res"=>$response,"error"=>$error);
        
        echo json_encode($return_arr);

    }

    function checkUserExistanceByEmail($email){
        global $conn;
        $sql = "SELECT * FROM user WHERE email = '$email'";

        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result) > 0){
            return "1";
        }else{
            return "2";
        }

    }

    function updateSession(UserModel $user){
        $_SESSION['currentUser'] = serialize($user);
    }

    function getUserById(UserModel $user){
        $newuser = new UserModel;
        $id = $user->getId();
        global $conn;

        $sql = "SELECT * FROM user WHERE id ='".$id."'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $newuser->setId($row['id']);
                $newuser->setName($row['NAME']);
                $newuser->setEmail($row['EMAIL']);
                $newuser->setMobile($row['MOBILE']);
                $newuser->setPassword($row['PASSWORD']);
                $newuser->setVkey($row['Vkey']);
                $newuser->setIs_verified($row['is_verified']);
                $newuser->setOtp($row['OTP']);
                $newuser->setIs_shopcreated($row['is_shopcreated']);
            }
        }

        return $newuser;
    }

    function getShopsByUserid(UserModel $user){
        global $conn;
        $shops = new ShopModel;
        $userid = $user->getId();
        $sql = "SELECT * FROM shops WHERE userid = '".$userid."'";
        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $shops->setShopid($row['shopid']);
                $shops->setUserid($row['userid']);
                $shops->setShopname($row['name']);
                $shops->setShopaddress($row['address']);
                $shops->setShopcontact($row['contact']);
                $shops->setShopaboutus($row['aboutus']);
            }
        }

        return $shops;
    }

    

    function processUpdateShopDetails(ShopModel $shop){
        global $conn;
        $response="";
        $error = "";
        $curentUser = new UserModel;
        $curentUser = unserialize($_SESSION['currentUser']);
        $shop->setUserid($curentUser->getId());
        if($curentUser->getIs_shopcreated() == '0'){
            $sql = "UPDATE user SET is_shopcreated = 1 WHERE id = '".$curentUser->getId()."'";
            if(mysqli_query($conn, $sql)){
                $sql = "INSERT INTO shops (userid, name, address, contact , aboutus) VALUES 
                ('".$shop->getUserid()."', '".$shop->getShopname()."', '".$shop->getShopaddress()."','".$shop->getShopcontact()."','".$shop->getShopaboutus()."')";

                if(mysqli_query($conn, $sql)){
                    $curentUser = $this->getUserById($curentUser);
                    $this->updateSession($curentUser);
                    $response =  "1";
                } else {
                    $response = "2";
                    $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }else{
                $response = "5";
                $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            

        }else{

            $sql = "UPDATE shops SET name = '".$shop->getShopname()."',
             address = '".$shop->getShopaddress()."', contact = '".$shop->getShopcontact()."',
             aboutus = '".$shop->getShopaboutus()."' WHERE userid = '".$curentUser->getId()."'";

            if(mysqli_query($conn, $sql)){
                $response =  "3";
            } else {
                $response = "4";
                $error = "Error: <br>" . mysqli_error($conn);
            }

        }
       
        $return_arr[] = array("res"=>$response,"error"=>$error);
        
        echo json_encode($return_arr);
    }//end of function


    function addProduct(ProductModel $product) {
        global $conn;
        $response = "";
        $error = "";
        $curentUser1 = new UserModel;
        $newShop = new ShopModel;
        $curentUser1 = unserialize($_SESSION['currentUser']);
        $newShop = $this->getShopsByUserid($curentUser1);
        $product->setUserid($curentUser1->getId());
        $product->setShopid($newShop->getShopid());

        $sql = "INSERT INTO products (shopid, userid, name, price, category, offer, description, avilibility, priority, quantity, imgpath)
        VALUES (".$product->getShopid().",".$product->getUserid().",'".$product->getName()."',".$product->getPrice().",
        '".$product->getCategory()."','".$product->getOffer()."','".$product->getDescriptions()."','".$product->getAvilibility()."',
        ".$product->getPriority().",".$product->getQuantity().",'".$product->getImgpath()."')";

        if(mysqli_query($conn, $sql)){
            $response =  '1';
        }else{
            $response =  '2';
            $error = mysqli_error($conn);
        }
        $return_arr = array("res"=>$response,"error"=>$error);

        return $return_arr;
    }//end of function


    function getCurrentUserProduct(){
        global $conn;
        $curentUser = new UserModel;
        $curentUser = unserialize($_SESSION['currentUser']);

        $sql = "SELECT * FROM products WHERE userid = ".$curentUser->getId();

        $result = mysqli_query($conn , $sql);
        
        if(mysqli_num_rows($result)>0){ 
            while($row = mysqli_fetch_assoc($result)){ ?>
                <!-- card detail -->
                    <div class="card m-4 p-1" style="width: 18rem;">
                        <div class="d-block" style="height: 200px; width: 100% ; overflow: hidden">
                            <img src="<?php echo $row['imgpath']?>" style="height: 100%;" class="card-img-top">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo "Price: ".$row['price']; ?></li>
                        <li class="list-group-item"><?php echo "Category: ".$row['category']; ?></li>
                        <li class="list-group-item"><?php echo "Availibility: ".$row['avilibility'];?></li>
                        <li class="list-group-item"><?php echo "Offer: ".$row['offer']; ?></li>
                      </ul>
                      <div class="card-footer d-flex justify-content-around">
                        <!-- <Button class="btn btn-outline-primary" onclick="updateProductDtails()">Update</Button> -->
                        <Button class="btn btn-outline-danger" onclick="deleteProduct(<?php echo $row['id']; ?>)">Delete</Button>
                      </div>
                    </div>
                    <!-- end of card -->
                <?php
            }   
        }else{
            echo "no data avilable";
        }
    }//end of function

    function getAllShopsAndProducts(){
        global $conn;
        $sql = "SELECT * FROM shops";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){ 
                ?>
                
                <!-- outer card -->
                  <div class="card mt-1 m-3">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-10 d-flex align-items-center">
                          <h4><?php echo $row['name'];?></h4>
                        </div>
                        <div class="col-2">
                          <button class="btn btn-primary btn-sm" onclick="getShopDetails(<?php echo $row['shopid'];?>)">View Details</button>
                        </div>
                      </div>   
                    </div>
                    <div class="card-body">
                      <p class="card-text"><?php echo "Address: ".$row['address'];?></p>
                      <div class="d-flex w-100" style="overflow-x:scroll;">
                      <?php 
                        $sql2 = "SELECT * FROM products WHERE shopid = ".$row['shopid'];
                        $result1 = mysqli_query($conn , $sql2);
                        if(mysqli_num_rows($result1) > 0){
                            while($row2 = mysqli_fetch_assoc($result1)){ ?>
                                <!-- inner card -->
                                <div class="d-flex flex-shrink-0 card mt-1 ms-1" style="width: 18rem">
                                    <div class="d-block" style="height: 200px; width: 100% ; overflow: hidden">
                                        <img src="<?php echo $row2['imgpath'];?>" style="height: 100%;" class="card-img-top">
                                    </div>
                                  
                                  <div class="card-body">
                                    <div class="row">
                                      <div class ="col">
                                        <h5 class="card-title"><?php echo $row2['name'];?></h5>
                                      </div>
                                      <div class ="col">
                                        <button class="btn btn-primary btn-sm" onclick="getProductDetails(<?php echo $row2['id'];?>)">View Details</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--end inner card --> 
                            <?php
                            }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                <!--end outer card -->
            <?php
            }
        }
    }//end of function

    function deleteProduct($id){
        global $conn;
        $response = "";
        $error = "";
        $sql = "SELECT * FROM products WHERE id = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
        }
        if($row != null){
            unlink("../".$row['imgpath']);
            $sql = "DELETE FROM products WHERE id = ".$id;
            if(mysqli_query($conn, $sql)){
                $response = "1";
            }else{
                $response = "3";
                $error = mysqli_error($conn);
            }
        }else{
            $response = "2";
            $error = "data not found";
        }

        $return_arr[] = array("res"=>$response,"error"=>$error);
        
        echo json_encode($return_arr);
    }

    function getShopDetails($id){
        global $conn;
        $row = "";
        $sql = "SELECT * FROM shops WHERE shopid = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
        }
        if($row != ""){
            ?>
            <!-- shop card -->
            <div class="card">
              <h5 class="card-header"><?php echo $row['name']; ?></h5>
              <div class="card-body">
                <h5 class="card-title">Contact</h5>
                <p class="card-text"><?php echo $row['contact']; ?></p>
                <hr>
                <h5 class="card-title">About Shop</h5>
                <p class="card-text"><?php echo $row['aboutus']; ?></p>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary">Contect</button>
              </div>
            </div>
            <!--end of shop card -->
            <?php
        }else{
            echo "no data avilable";
        }
        
    }//end of function

    function getProductDetails($id){
        global $conn;
        $sql = "SELECT * FROM products WHERE id = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
        }
        if($row != null){
            ?>
            <!-- product card -->
            <div class="card">
              <h5 class="card-header"><?php echo $row['name']; ?></h5>
              <div class="card-body">
                <p class="card-text"><?php echo $row['description']; ?></p>
                <hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo "Price: ".$row['price']; ?></li>
                    <li class="list-group-item"><?php echo "Category: ".$row['category']; ?></li>
                    <li class="list-group-item"><?php echo "Availibility: ".$row['avilibility'];?></li>
                    <li class="list-group-item"><?php echo "Offer: ".$row['offer']; ?></li>
                </ul>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary">Make a request</button>
              </div>
            </div>
            <!--end of product card -->
            <?php
        }
       
    }//end of function

}//end of class


?>