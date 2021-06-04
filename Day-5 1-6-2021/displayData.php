<?php 

require 'connection.php';

$sql = 'SELECT * FROM user';

$result = mysqli_query($conn , $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){

    while ($row = mysqli_fetch_array($result)){
        echo '
        <div>
        <div class="card mt-2 mb-3">
          <div id="card-'.$row['id'].'-name" class="card-header">
          '.$row['name'].'
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col">
                    <h6 class="card-title">Email</h6>
                    <p id="card-'.$row['id'].'-email" class="card-text">'.$row['email'].'</p>
                </div>
                <div class="col">
                    <h6 class="card-title">Mobile</h6>
                    <p id="card-'.$row['id'].'-number" class="card-text">'.$row['number'].'</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h6 class="card-title">Date of Birth</h6>
                    <p id="card-'.$row['id'].'-dob" class="card-text">'.$row['dob'].'</p>
                </div>
                <div class="col">
                    <h6 class="card-title">Gender</h6>
                    <p id="card-'.$row['id'].'-gender" class="card-text">'.$row['gender'].'</p>
                </div>
            </div>
            <hr>
            <div class="row mb-1">
                <div class="col">
                    <h6 class="card-title">Address</h6>
                    <p id="card-'.$row['id'].'-address" class="card-text">'.$row['address'].'</p>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <h6 class="card-title">City</h6>
                    <p id="card-'.$row['id'].'-city" class="card-text">'.$row['city'].'</p>
                </div>
                <div class="col-4">
                    <h6 class="card-title">State</h6>
                    <p id="card-'.$row['id'].'-state" class="card-text">'.$row['state'].'</p>
                </div>
                <div class="col-3">
                    <h6 class="card-title">Zip</h6>
                    <p id="card-'.$row['id'].'-zip" class="card-text">'.$row['zip'].'</p>
                </div>
          </div>
          <div class="card-footer text-muted">
            <Button onClick="deleteData('.$row['id'].')" class="btn btn-danger">Delete</Button>
            <Button onClick="updateData('.$row['id'].')" class="btn btn-primary">Update</Button>
          </div>
        </div>
        </div>
        
        ';
    }

}else{
   echo "no data";
}

mysqli_close($conn);


?>