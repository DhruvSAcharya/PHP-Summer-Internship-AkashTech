<?php 
require 'src/DatabaseManagment.php';
//require 'src/user.php';

if(isset($_POST['logoutbtn'])){
  session_destroy();
  header('Location: index.html');
}

$curentUser = new UserModel;
$curentUser = unserialize($_SESSION['currentUser']);
if($curentUser == null ){
  header('Location: index.html');
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
<body id="body" style="height:100% ; overflow:hidden">
    
    <!-- header -->
    <div class="row">
        <div class="container border">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid border-3 d-flex">
                <!-- website name -->
                <div class="navbar-header d-flex align-items-center">
                  <img class="img-responsive" src="https://img.icons8.com/cute-clipart/64/000000/shop.png" />
                  <h1 class="navbar-brand " >Make Your Shop Online</h1>
                </div>
                <!-- page title -->
                <div class="d-flex flex-fill justify-content-center">
                  <h2>SHOPS</h2>
                </div>
                <!-- nav bar -->
                <div class="navbar d-flex justify-content-end" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item m-1">
                        <a class="btn nav-link active" style="background-color: rgba(120, 207, 173);" aria-current="page" href="profile.php">Profile</a>
                    </li>  
                    <li class="nav-item m-1">
                      <form action="manageshop.php" method="post">
                        <button name="logoutbtn" class="btn nav-link active" style="background-color: rgba(120, 207, 173);" type="submit">Manage Shop</button>
                      </form>
                    </li>
                    <li class="nav-item m-1">
                      <form action="#" method="post">
                      <button name="logoutbtn" class="btn nav-link active" style="background-color: rgba(120, 207, 173);" type="submit">Logout</button>
                      </form>
                      <!-- <a class="btn nav-link active" onclick="logoutProcess()"  aria-current="page" href="#">Logout</a> -->
                    </li>
                  </ul>
                </div>

              </div>
            </nav>
        </div>
    </div>
    <div class="d-flex justify-content-center" style="height:100%">
        
        <div class="row d-flex mb-5 w-100" style="height:100%;">

          <!-- middel div -->
          <div class="col-8 overflow-scroll d-flex" style="height:100%">
            <div class="d-flex flex-column w-100">

              <div class="container d-flex justify-content-center align-items-center">
                <h2 class="text-center"><u>Find The Shop Near You</u></h2>
              </div>

              <!-- search bar -->
              <div class="d-flex container m-1 w-100">
                <div class="input-group border border-top-0 border-start-0 border-end-0 border-bottom-2 border-dark">
                  <img src="https://img.icons8.com/windows/35/000000/shop-location--v1.png"/>
                  <input type="text" class="form-control border-0 bg-transparent" name="q" placeholder="Search Shop"/> 
                  <button class="btn bg-transparent border border-start-1 border-top-0 border-end-0 border-bottom-0 border-dark">Search</button> 
                </div>
              </div>

              <div id="shopcontainer">
              
              </div>
              
              <div class="mb-5">
                <br>
              </div>
              <div class="mb-5">
                <br>
              </div>
              

            </div>
            

            
          </div>

          <!-- right sid div -->
          <div class="col overflow-scroll border border-top-0 border-5 border-end-0 border-success  w-100" style="height:100%">
            <h1 class="text-center"><u>More Details</u></h1>
            <!-- shop container -->
            <div id="shopdetailcontainer" class="">
              
            </div>
            <!-- product container -->
            <div id="productdetailcontainer" class="mt-1">
              
            </div>
            <!-- end of product container -->
            <div class="mb-5">
              <br>
            </div>
            <div class="mb-5">
              <br>
            </div>
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