<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>



    </script>

    <script>


    </script>
    <title>Day 3 Task</title>

</head>

<body class="bg-secondary">
    <div>
        <div>


            <!-- header -->

            <?php 
            
            include "header.php";

            ?>


            <div>

                <!-- start of programs -->



                <!-- program 1 -->

                <div class="row">

                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">

                                <div class="mt-2">

                                    <div class="col">

                                        <div class="row">
                                            <div class="col-3">
                                                <label for="" class="col-form-label">Array Functions</label>
                                            </div>
                                            <div class="col-9 ">
                                                <select id="select-function" class="form-select form-select-sm mb-3" onchange="if (this.selectedIndex) changeSelectInput()" aria-label=".form-select-sm example">
                                                  <option selected>Select Function</option>
                                                  <option value="1">count</option>
                                                  <option value="2">array_count_values</option>
                                                  <option value="1">array_sum</option>
                                                  <option value="1">array_product</option>
                                                  <option value="2">array_reverse</option>
                                                  <option value="2">array_unique</option>
                                                  <option value="2">sort</option>
                                                  <option value="2">rsort</option>
                                                  <option value="2">asort</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>



        
                                    <p id="code">Code will display here</p>
                                    <!-- <?php
                                       //include "displaycode.php";
                                    ?> -->
                                </div>

                               
                               
                            </div>

                        </div>

                    </div>

                    <div class="col-1 d-flex align-items-center justify-content-center">

                        <button onclick="execute()" type="button" class="btn btn-light">Run</button>

                    </div>


                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">

                                <h3>Output</h3>
                                <!-- Resule display code -->
                                <p id="display-result">
                                    Output will display Here
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- ens of program -->

                <!-- end of all programs -->

            </div>

        </div>
    </div>


</body>

</html>