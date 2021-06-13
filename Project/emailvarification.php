<?php 
include 'src/connection.php';
if(isset($_GET['key'])){
    $key = $_GET['key'];
    $db_key= "";
    $msg = "";

    $sql = "SELECT Vkey , is_verified FROM user WHERE Vkey = '".$key."' AND is_verified=0";
    
    $result = mysqli_query($conn , $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $db_key = $row['Vkey'];
        }
    }
    //echo $db_key;
    if($db_key != ""){
        if($db_key == $key){
            $sql2 = "UPDATE user SET is_verified = 1 WHERE Vkey = '".$key."'";
            if(mysqli_query($conn , $sql2)){
                $msg = "<h2>your Account has been Verifyed successfully</h2>".
                "<br><a href=\"index.html\">Login To Your Account</a>";
            }else{
                $msg = "Error : " . mysqli_error($conn);
            }
        }else{
            $msg = "<h2>Try Again</h2>";
        }
    }else{
        $msg = "<h2>Your Account is Already Verifyed.</h2>";
    }

}else{
    $msg = "<h2>Unauthorized Access</h2>";
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
    <title>Home Page</title>
</head>
<body id="body" style="height:100%">
    
    
    <div class="row border border-2" style="height:100%">
        <div class="container d-flex justify-content-center align-items-center"> 
            <div class="d-flex-row justify-content-center">
                <?php echo $msg; ?>
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