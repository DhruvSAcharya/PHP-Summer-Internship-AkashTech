<?php 
require 'connection.php';

$data = stripslashes(file_get_contents("php://input"));
$data2 = json_decode($data, true);
$id = $data2['userid'];
$sql = "DELETE FROM user WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "1";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>