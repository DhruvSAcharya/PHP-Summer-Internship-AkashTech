<?php

require 'connection.php';
require 'mailprocess/SendMail.php';


class DatabaseManagment {


    function registerUser(UserModel $user){
        $newuser = new UserModel;
        global $conn;
        $response="";

        $newuser  = $this->getUserByEmail($user);

        if($newuser->getEmail()==$user->getEmail()){
            $response = "2";
        }else{
            $key = md5(time().$user->getEmail());
            $sql  = "INSERT INTO user (NAME, EMAIL, MOBILE , PASSWORD, Vkey , is_verified , OTP) VALUES 
            ('".$user->getName()."', '".$user->getEmail()."', '".$user->getMobile()."','".$user->getPassword()."','".$key."',0,0)";

            if(mysqli_query($conn, $sql)){
                $this->sendverificationMail($user->getEmail(),$key);
                $response =  "1";
            } else {
                $response = "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        $return_arr[] = array("res"=>$response);
        
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

    function sendverificationMail($email , $key){

        $mail = new SendMail;
        $mail->setTO($email);
        $mail->setSubject("Varify Your email address");
        $mail->setBody("<h3>This mail sent to you to varify your email address.</h3>
                        <p>Click below link to varify.</p>
                        <br><a href=\"http://localhost/PHP%20Summer%20Internship%20AkashTech/Project/emailvarification?key=".$key."\">click here</a><br>");
        $mail->send();
    }

}//end of class


?>