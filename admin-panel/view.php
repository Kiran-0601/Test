<?php
session_start();
$email = $_SESSION['email'];

if (!isset($_SESSION['email'])) {
  $_SESSION['error'] = "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
  You are not logged in. Please login to access the dashboard. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  header("Location: signin.php");   // If user not login then Redirect to the login page
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <style>
    .wrapper{
      max-width: 650px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Welcome , <?php echo $email; ?></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="show-users.php">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php

require 'db.php';

if (isset($_GET['id'])) {

  $user_id = $_GET['id']; 
  $sql = "SELECT * FROM `auth` WHERE `id`='$user_id'";
  $result = $conn->query($sql); 
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      // $id = $row['id'];
      $fname = $row['fname'];
      $lname = $row['lname'];
      $email = $row['email'];
      $country = $row['country'];
      $mobile = $row['mobile'];
      $dob = $row['dob'];
      $pwd = $row['password'];
      $address = $row['address'];
      $gender = $row['gender'];
      $img = $row['image'];
    } ?>
    <?php echo $msg; ?>
    <div class="wrapper">
      <form id="editForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-right" enctype="multipart/form-data">
        <h2 class="text-center">View Profile</h2>
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label>First Name :</label>
            <P><?php echo $fname; ?></P>
          </div>
          <div class="col-sm-6 mb-3">
            <label>Last Name :</label>
            <P><?php echo $lname; ?></P>            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label>Email ID :</label>
            <p><?php echo $email; ?><p>
          </div>
          <div class="col-sm-6 mb-3">
            <label>Country :</label>
            <p> <?php if ($country == 'India') {
              echo 'India'; 
              }
              else if($country == 'New york') {
                echo 'New york';
              }
              else if($country == 'London'){
                echo 'London'; 
              } ?>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label>Mobile Number :</label>
            <p><?php echo $mobile; ?></p>
          </div>
          <div class="col-sm-6 mb-3">
            <label>Date Of Birth :</label>
            <p><?php echo $dob; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 mb-6">
            <label>Address :</label>
            <p><?php echo $address; ?></p>
          </div>
          <div class="col-sm-6 mb-6">
            <label>Gender :</label>
            <p><?php if($gender == 'Male') { 
              echo "Male";
             }
             else if($gender == 'Female') {
              echo "Female";
             }?>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 mb-6">
            <label>Profile Picture :</label>
            <?php
            if (!empty($img)) {
              echo '<img src="/php/Authentication/uploads/' . $img . '" width="80" height="70">';
            }
            else{
              echo "Not Uploaded";
            }
            ?>
          </div>
        </div>
        <br>
        <div class="mb-3">
          <button type="button" onclick="window.location.href='show-users.php';" class="btn btn-primary">Back</button>
        </div>     
      </form>      
    </div>
    <?php
  } 
  else{
    echo "Data missing";
  }
}?> 
</body>
</html>