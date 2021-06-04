<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    



    <title>Day 5 Task</title>

</head>

<body class="bg-secondary">
    <div>
        <div>


            <!-- header -->

            <?php 
            
            include "header.php";

            ?>


            <div>

                



                <!-- program 1 -->

                <div class="row">

                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">

                                <div class="mt-1">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item col">
                                          <a class="nav-link active text-center" id="insert-tab" data-toggle="tab" href="#insert" role="tab" aria-controls="home" aria-selected="true">Insert Data</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="insert" role="tabpanel" aria-labelledby="home-tab">

                                            <form>
                                                <div class="form-group">

                                                    <div class="row mb-2 mt-2">
                                                        <div class="col-3">
                                                            <label class="col-form-label" for="">Full Name</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input class="form-control" type="text" id="fname" placeholder="Enter Your Name">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2 mt-2">
                                                        <div class="col-3">
                                                            <label class="col-form-label" for="">Email</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input class="form-control" type="email" name="" id="email" placeholder="Enter Your Email">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2 mt-2">
                                                        <div class="col-3">
                                                            <label class="col-form-label" for="">Mobile No.</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input class="form-control" type="tel" id="mobile" placeholder="Enter Your Mobile Number">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2 mt-2">
                                                        <div class="col-3">
                                                            <label class="col-form-label">Date of Birth</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input class="form-control" type="date" id="dob">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2 mt-2">
                                                        <div class="col-3">
                                                            <label class="col-form-label" for="">Gender</label>
                                                        </div>
                                                        
                                                        <div class="col-3 d-flex align-items-center">
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                                                              <label class="form-check-label" for="inlineRadio1">Male</label>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-3 d-flex align-items-center">
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                                              <label class="form-check-label " for="inlineRadio2">Female</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 d-flex align-items-center">
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Other">
                                                              <label class="form-check-label" for="inlineRadio2">Other</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2 mt-2">
                                                        <div class="form-group">
                                                          <label for="inputAddress">Address</label>
                                                          <input type="text" class="form-control" id="address1" placeholder="1234 Main St">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="inputAddress2">Address 2</label>
                                                          <input type="text" class="form-control" id="address2" placeholder="Apartment, studio, or floor">
                                                        </div>
                                                        <div class="form-row">
                                                          <div class="form-group col-md-5">
                                                            <label for="inputCity">City</label>
                                                            <input type="text" class="form-control" id="city" placeholder="City Name">
                                                          </div>
                                                          <div class="form-group col-md-4">
                                                            <label for="inputState">State</label>
                                                            <input type="text" class="form-control" id="state" placeholder="State Name">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                            <label for="inputZip">Zip</label>
                                                            <input type="text" class="form-control" id="zip" placeholder="Pincode">
                                                          </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </form>
                                        
                                        </div>
                                    </div>

                                </div>
                               
                            </div>

                        </div>

                    </div>

                    <div class="col-1 d-flex align-items-center justify-content-center">
                        <div class="row ">
                            <div class="col mb-4 d-flex align-items-center justify-content-center">
                                <button id="insert-updatebtn" onclick="executeInsert()" type="button" class="btn btn-light">Insert</button>
                            </div>
                            <div class="col mb-4 d-flex align-items-center justify-content-center">
                                <button id="show-cancel" onclick="displayData()" type="button" class="btn btn-light">Show</button>
                            </div>
                            <!-- <div class="col d-flex align-items-center justify-content-center">
                            <button onclick="" type="button" class="btn btn-light">Delete</button>
                            </div> -->
                        </div>
                        
                        
                        

                    </div>


                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">

                                <div class="mt-1">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item col">
                                          <a class="nav-link active text-center" id="display-tab" data-toggle="tab" href="#dispay" role="tab" aria-controls="home" aria-selected="true">Display All Records</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active overflow-scroll" style="height:515px"  id="dispay" role="tabpanel" aria-labelledby="home-tab">
                                            
                                            <div id="dispay-output" class="">
                                                <h5>Records will display here.</h5>
                                            </div>

                                        </div>
                                        
                                    </div>

                                </div>
                                
                            </div>

                        </div>
                    </div>

                </div>

                <!-- ens of program -->

                

            </div>

        </div>
    </div>

    <script src="javascript.js"></script>
</body>

</html>