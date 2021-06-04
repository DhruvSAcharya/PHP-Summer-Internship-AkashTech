<?php 
require 'connection.php';


$data = stripslashes(file_get_contents("php://input"));

$userdata = json_decode($data, true);

$id = $userdata['id'];
$name = $userdata['name'];
$email = $userdata['email'];
$mobile = $userdata['mobile'];
$dob = $userdata['dob'];
$gender = $userdata['gender'];
$address = $userdata['address'];
$city = $userdata['city'];
$state = $userdata['state'];
$pincode = $userdata['pincode'];

$sql = "UPDATE user SET name='$name', email = '$email', number = '$mobile',
 dob = '$dob', gender= '$gender', address = '$address', city = '$city', state = '$state',
    zip='$pincode' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "1";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);

?>