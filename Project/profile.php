<?php

require 'src/DatabaseManagment.php';
//require 'src/user.php';

$curentUser = new UserModel;
$curentUser = unserialize($_SESSION['currentUser']);
if ($curentUser == null) {
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

<body id="body" style="overflow:hidden; height:100%;">


  <div class="row ">
    <div class="container border">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <!-- website name -->
          <div class="navbar-header d-flex align-items-center">
            <img class="img-responsive" src="https://img.icons8.com/cute-clipart/64/000000/shop.png" />
            <h1 class="navbar-brand ">Make Your Shop Online</h1>
          </div>
          <!-- page title -->
          <div class="d-flex flex-fill justify-content-center">
            <h2>Your Profile</h2>
          </div>
          <!-- nav bar -->
          <div class="navbard-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <!-- <li class="nav-item m-2 ">
                <div class="d-flex align-content-center justify-content-center">
                  <h5 id="username"><?php //echo $curentUser->getName(); ?></h5>
                </div>
              </li> -->
              <li class="nav-item m-1">
                <a class="btn nav-link active" style="background-color: rgba(120, 207, 173);" aria-current="page" href="home.php">Home</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="row d-flex justify-content-center mt-5" style="height:100%; margin-left: 25%; margin-right: 25%;">
    <div class="container">
      <div class="text-center rounded-3" style="background-color: rgba(255,255,255, 0.6);" >
        <div class="row">
          <h3>Your Details</h3>
        </div>
        <div class="row ">
          <div class="col-6">
            <p>Name: </p>
          </div>
          <div class="col-6">
            <p><?php echo $curentUser->getName(); ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <p>Email Id: </p>
          </div>
          <div class="col-6">
            <p><?php echo $curentUser->getEmail(); ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <p>Mobile Number: </p>
          </div>
          <div class="col-6">
            <p><?php echo $curentUser->getMobile(); ?></p>
          </div>
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