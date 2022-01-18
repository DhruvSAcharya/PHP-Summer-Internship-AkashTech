<?php 
$Otp = "1";
$OTP = "1";
$name = "Dhruv";
$email = "ds.acb@gmail.com";
require 'src/connection.php';

if(isset($_POST['forgot1-useremail']) && isset($_POST['forgot1-userOTP'])){
    
    $email = $_POST['forgot1-useremail'];
    $Otp = $_POST['forgot1-userOTP'];

    $email = trim($email);
    $Otp = trim($Otp);

    $sql = "SELECT NAME,OTP FROM user where Email = '".$email."'";

    $result = mysqli_query($conn , $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $name = trim($row['NAME']);
            $OTP = trim($row['OTP']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" style="height:100%">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <!-- Bootstrap CSS -->    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Password Recovery</title>
</head>
<body id="body" style="height:100%">
    
    
    <div class="row border border-2" style="height:100%">
        <div class="container d-flex justify-content-center align-items-center"> 
            <div class="d-flex-row justify-content-center bg-light p-5 rounded-3">
                <?php 
                if($Otp == $OTP){
                ?>

                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <h2>Make a new password</h2>
                    </div>

                    <div>
                        <p>Hello, <b><?php echo $name ?></b></p>
                        <p>Your Email address is : <b><?php echo $email ?></b><p>
                    </div>
                    
                    <form onsubmit="processUpdatePassword(event)">
                        <div class="mb-2">
                            <div class="form-group d-flex">
                                <img src="https://img.icons8.com/color/48/000000/password.png"/>
                                <input type="password" class="form-control" id="up-password" placeholder="Password" aria-describedby="emailHelp" required>
                            </div>
                            <div id="emailHelp" class="form-text d-block">Enter new password</div>                        
                        </div>
                        <div class="mb-2">
                            <div class="form-group d-flex">
                                <img src="https://img.icons8.com/color/48/000000/repeat.png"/>
                                <input type="password" class="form-control" id="up-confirmpassword" placeholder="Password" aria-describedby="otpHelp" required>
                            </div>
                            <div id="otpHelp" class="form-text d-block">Confirm your password</div>
                        </div>
                        <div class="input-group mb-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"  >Confirm Update Password</button>
                        </div>
                        <input type="hidden" id="up-email" value="<?php echo $email ?>">
                        <input type="hidden" id="up-otp" value="<?php echo $OTP ?>">
                    </form>
                    <div id="fp2-alert" class="alert alert-success d-flex align-items-center d-none" role="alert">
                        <p id="fp2-alert-msg" class="m-1"></p>  
                    </div>
                
                
                
                <?php 
                }else{
                    
                ?>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <h2>Unauthorized access</h2>
                    </div>
                <?php
                }
                
                ?>
                
            </div>
        </div>
    </div>


    
    
    

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>