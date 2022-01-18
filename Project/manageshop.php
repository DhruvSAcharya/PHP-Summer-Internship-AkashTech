<?php 
require 'src/DatabaseManagment.php';
//require 'src/user.php';
//require 'src/shop.php';

$curentUser = new UserModel;
$curentUser = unserialize($_SESSION['currentUser']);
if($curentUser == null ){
  header('Location: index.html');
}

$shopname = "";
$shopaddress = "";
$shopcontect = "";
$shopaboutus = "";

if($curentUser->getId() != null && $curentUser->getIs_shopcreated() == 1){
  global $conn;
  $newshop = new ShopModel;
  $dbmanage = new DatabaseManagment;
  $newshop = $dbmanage->getShopsByUserid($curentUser);
  $shopname = $newshop->getShopname();
  $shopaddress = $newshop->getShopaddress();
  $shopcontect = $newshop->getShopcontact();
  $shopaboutus = $newshop->getShopaboutus();
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
              <div class="container-fluid">
                <!-- website name -->
                <div class="navbar-header d-flex align-items-center">
                  <img class="img-responsive" src="https://img.icons8.com/cute-clipart/64/000000/shop.png" />
                  <h1 class="navbar-brand " >Make Your Shop Online</h1>
                </div>
                <!-- page title -->
                <div class="d-flex flex-fill justify-content-center">
                  <h2>Manage Your Shope</h2>
                </div>
                <!-- nav bar -->
                <div class="navbar d-flex justify-content-end" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item m-1">
                        <a class="btn nav-link active" style="background-color: rgba(120, 207, 173);" aria-current="page" href="home.php">Home</a>
                    </li>  
                    <li class="nav-item m-1">
                      <form action="manageshop.php" method="post">
                        <!-- <button name="logoutbtn" class="btn nav-link active" style="background-color: rgba(120, 207, 173);" type="submit">Create Shop</button> -->
                      </form>
                    </li>
                    <li class="nav-item m-1">
                      <form action="#" method="post">
                      <!-- <button name="logoutbtn" class="btn nav-link active" style="background-color: rgba(120, 207, 173);" type="submit">Logout</button> -->
                      </form>
                      <!-- <a class="btn nav-link active" onclick="logoutProcess()"  aria-current="page" href="#">Logout</a> -->
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
        </div>
    </div>
    <!-- page body -->
    <div class="pb-5" style="height:100%; overflow:scroll;">
        <div class="container mt-2">
          <!-- shop detail -->
            <div class="row mb-2">
              <h2>Shop Detail</h2>
                <form id="shopdtailform">
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Name: </label>
                            </div>
                            <div class="col-10">
                              <div class="input-group">
                                <input id="shopname" class="form-control" type="text" value="<?php echo $shopname;?>"  placeholder="Shope name" required disabled>
                              </div>
                                
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Address: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                  <textarea id="shopaddress" class="form-control" rows="3" placeholder="Shop number, Street, City , Postal Code , State,  Country" disabled><?php echo $shopaddress;?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Contact: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                  <input id="shopcontact" class="form-control" type="text" value="<?php echo $shopcontect;?>" placeholder="Mobile Number Or Email Address" required disabled> 
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">About Us: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                  <input id="shopaboutus" class="form-control" type="text" value="<?php echo $shopaboutus;?>" placeholder="Information about Shop" required disabled>
                                </div>
                            </div>
                        </div>
                        <div class="input-group d-flex align-items-center justify-content-center">
                          <button id="updateshopdeail" class="btn btn-secondary" onclick="processUpdate(event)">Update Data</button>
                        </div>
                    </div>
                </form>
                <div id="sp-aleart" class="alert alert-warning alert-dismissible fade show mt-2 d-none" role="alert">
                  <div id="sp-msg-aleart"></div>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            </div>
            <!-- personal detail end -->
<hr>
            <!-- product detail -->
            <div class="row">
                <h2>Product Detail</h2>
                <form id="productform" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Product Name: </label>
                            </div>
                            <div class="col-10">
                              <div class="input-group">
                                <input class="form-control" id="productname" name="pname" type="text" placeholder="Name Of Product" required>
                              </div>  
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Product Price: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                  <input class="form-control" id="productprice" name="pprice" type="number" placeholder="Price Of Product" required>
                                </div>
                                
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Product Category: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                  <input class="form-control" id="productcategory" name="pcategory" type="text" placeholder="Category of Product" required>
                                </div>
                                
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Offer Detail: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                  <input class="form-control" id="offerdetails" type="text" name="offerdetail" placeholder="Availabe offers detail on Product" required>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Description: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                  <textarea class="form-control"  id="productdescription" name="pdescription" rows="3" placeholder="Description Of Product" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Availibility: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                  <select class="form-select" id="availibilitystatus" name="pavilibility" aria-label="Default select example">
                                    <option value="Available" selected>Select Availibility</option>
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                    <option value="Coming soon">Coming soon</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Product Priority: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                  <div class="col-11">
                                  <input id="productpriority" name="ppriority" type="range" class="form-range d-inline" value="5" onchange="showRangeVal(this.value)">
                                  </div>
                                  <div class="ms-5">
                                    <p class="d-inline" id="productpriorityvalue">5</p> 
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Product quantity: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                <input class="form-control" name="pquantity" id="productquantity" type="number" placeholder="Number of Product Available" required>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="col-2 d-flex align-items-center">
                                <label class="form-label" for="">Product Image: </label>
                            </div>
                            <div class="col-10">
                                <div class="input-group">
                                <input class="form-control" id="productimage" name="photo" type="file" accept=".png,.jpg,.jpej" multiple>
                                </div>
                                <div>
                                  <img id="img" src="" >
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-2 d-flex justify-content-center align-content-center">
                            <button class="btn btn-primary" type="submit" >Add Product</button>
                        </div>
                        <div id="addp-aleart" class="alert alert-warning alert-dismissible fade show mt-2 d-none" role="alert">
                          <div id="addp-msg-aleart"></div>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- product detail div -->

            <hr>
            <!-- product display -->
            <div class="row pb-5">
              <h2>Your Products</h2>
              <div id="cardcontainer" class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-around">
                
              </div>
            </div>
            <!--end of product display -->
        </div>   
    </div>
    

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>