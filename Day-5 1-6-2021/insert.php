<?php 
require 'connection.php';
$data = stripslashes(file_get_contents("php://input"));

$userdata = json_decode($data, true);

$name = $userdata['name'];
$email = $userdata['email'];
$mobile = $userdata['mobile'];
$dob = $userdata['dob'];
$gender = $userdata['gender'];
$address = $userdata['address'];
$city = $userdata['city'];
$state = $userdata['state'];
$pincode = $userdata['pincode'];

// echo "name: " . $name ." email:". $email ." mobile:". $mobile 
// . " dob: ". $dob ." gender: ". $gender ." address: ". $address ." city:" . $city 
// ." state: ". $state ." pincode: ". $pincode;

$sql = "INSERT INTO user (name, email, number , dob , gender , address , city , state , zip)
VALUES ('$name', '$email' , $mobile , '$dob', '$gender', '$address', '$city', '$state' , $pincode)";

if (mysqli_query($conn, $sql)) {
    echo "1";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

?>