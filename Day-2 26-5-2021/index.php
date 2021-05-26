<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>Day 2 Task</title>
</head>

<body class="bg-secondary">
    <div>
        <div >


            <!-- header -->

            <div class="jumbotron m-1">
            <h1>Day 2 Task</h1>
            </div>


            <div>

                <!-- start of programs -->

                

                <!-- program -->

                <div class="row">

                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">
                                
                                <h3>Program</h3>
                                <!-- php display code -->
            
                                <?php


$code = '<?php 
$num1 = 10;
$num2 = 20;
                               
echo "Value: ".$num1;
echo "<br>value of num1 is ".$num1." And value of num2 is ".$num2;
echo "<br>value of num1 is $num1 and value of num2 is $num2";
echo \'<br>value of num1 is \'.$num1.\'and value of num 2 is \'.$num2;
echo "<br>Sum of num1 and num2 is ".($num1+$num2);         
?>';
                

                                echo '<pre>' . htmlspecialchars($code) . '</pre>';

                                ?>
                            </div>

                        </div>
                        
                    </div>

                    <div class="col-1 d-flex align-items-center justify-content-center">
                        
                        <button onclick="executeCode1()" type="button" class="btn btn-light">Run</button>
                        
                    </div>


                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">
                                
                                <h3>Output</h3>
                                <!-- Resule display code -->
                                <p id="display-output-varstm">
                                    Output will display Here
                                </p>   
                            </div>

                        </div>
                    </div>

                </div>

                <!-- ens of program -->





                <!-- program -->

                <div class="row">

                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">
                                
                                <h3>Program</h3>
                                <!-- php display code -->
            
                                <?php


$code = '<?php 
$a = "b";
 switch ($a) {
    case "a":
        echo "A";
        break;
    case "b":
        echo "B";
       break;
    case "c":
        echo "C";
        break;
     
    default:
        echo "select a to c";
        break;
 }
?>';
                

                                echo '<pre>' . htmlspecialchars($code) . '</pre>';

                                ?>
                            </div>

                        </div>
                        
                    </div>

                    <div class="col-1 d-flex align-items-center justify-content-center">
                        
                        <button onclick="executeSwich()" type="button" class="btn btn-light">Run</button>
                        
                    </div>


                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">
                                
                                <h3>Output</h3>
                                <!-- Resule display code -->
                                <p id="display-output-swich">
                                    Output will display Here
                                </p>   
                            </div>

                        </div>
                    </div>

                </div>

                <!-- ens of program -->


                <!-- program 1 -->

                <div class="row">

                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">
                                
                                <h3>Program</h3>
                                <!-- php display code -->
            
                                <?php


$code = '<?php 
for($i=0;$i<10;$i++){
    echo "$i <br>";
}
?> ';
                

                                echo '<pre>' . htmlspecialchars($code) . '</pre>';

                                ?>


                                
                            </div>

                        </div>
                        
                    </div>

                    <div class="col-1 d-flex align-items-center justify-content-center">
                        
                        <button type="button" class="btn btn-light" onclick="executeCode()" >Run</button>
                        
                    </div>


                    <div class="col">
                        <div class="d-flex justify-content-center">

                            <div class="container bg-white m-2 rounded">
                                
                                <h3>Output</h3>
                                <!-- Resule display code -->
                                <p id="display">
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

    <script src="javascript.js">

     


    </script>
</body>

</html>