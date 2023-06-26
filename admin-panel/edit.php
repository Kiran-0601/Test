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
if(isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  // Destroy all session data
  unset($_SESSION['msg']);
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
  <script src="main.js"></script>
  <style>
    .wrapper{
      max-width: 850px;
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
if (isset($_POST['submit'])){

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $mobile =  $_POST['mobile'];
  $dob =  $_POST['dob'];
  $address =  $_POST['address'];
  $country = $_POST['country'];
  $gender = $_POST['gender'];
  $id = $_POST['id'];

  if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] !== UPLOAD_ERR_NO_FILE) {
    $image = $_FILES["fileToUpload"]["name"];
    $target_dir = "/var/www/html/php/Authentication/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    
    $currentFilename = '';
    $sql = "SELECT image FROM auth WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $currentFilename = $row['image'];
    }
    if (!empty($currentFilename)) {
      $filepath = dirname(__FILE__) . "/../uploads/" . $currentFilename;
      if (file_exists($filepath)) {
        unlink($filepath);
      }
    }
  }
  else{
    $currentFilename = '';
    $sql = "SELECT image FROM auth WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $currentFilename = $row['image'];
      $image = $row['image'];
    }
  }
 
  $sql = "UPDATE `auth` SET `fname`='$fname',`lname`='$lname',`mobile`='$mobile',`dob`='$dob',`address`='$address',`country`='$country',`gender`='$gender',`image`='$image' WHERE `id`= '$id'"; 
  $result = $conn->query($sql);
  if ($result == TRUE) {
    $_SESSION['msg'] = "<div id='alertMessage' class='alert alert-success message-container mt-5 fade show position-fixed top-0 end-0' role='alert'>
    Record Updated Successfully !!! &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    header("Location: edit.php?id=" . $id);
  }else{
    echo "Error:" . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}

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
        <h2 class="text-center">Edit Profile</h2>
        <div class="row">
          <div class="col-sm-6 mb-3">
          <input type="hidden" name="id" class="input-field" value="<?php echo $user_id; ?>">
            <label>First Name</label>
            <input type="text" name="fname" id="fname" class="input-field" value="<?php echo $fname; ?>">
          </div>
          <div class="col-sm-6 mb-3">
            <label>Last Name</label>
            <input type="text" name="lname" id="lname" class="input-field" value="<?php echo $lname; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label>Email ID</label>
            <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="input-field" disabled>
            <span class="error">Email Can not Change</span>
          </div>
          <div class="col-sm-6 mb-3">
            <label>password</label>
            <input type="password" name="pwd" id="pwd" value="<?php echo $pwd; ?>" class="input-field" disabled>
            <span class="error">Password Can not Change</span>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 mb-3">
            <label>Mobile Number</label>
            <input type="text" name="mobile" value="<?php echo $mobile; ?>" id="mobile" class="input-field">
          </div>
          <div class="col-sm-6 mb-3">
            <label>Date Of Birth</label>
            <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>" class="input-field">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5 mb-5">
            <label>Address</label>
            <textarea id="address" name="address" class="form-control"><?php echo $address; ?></textarea>
          </div>
          <div class="col-sm-4 mb-4">
            <label>Select Country</label>
            <select id="country" name="country" class="form-select">
              <option selected>Select an option</option>
              <option value="India" <?php if ($country == 'India') echo 'selected'; ?>>India</option>
              <option value="New york" <?php if ($country == 'New york') echo 'selected'; ?>>New york</option>
              <option value="London" <?php if ($country == 'London') echo 'selected'; ?>>London</option>
            </select>
          </div>
          <div class="col-sm-3 mb-3">
            <label>Select Gender</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?>>
              <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check" id="gendererror">
              <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php  if($gender == 'Female'){ echo "checked";} ?>>
              <label class="form-check-label" for="female">Female</label>
            </div>
          </div>                      
        </div>
        <div class="row">
          <div class="col-5">
            <div class="mb-3">
              <label>Profile Photo</label>
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <?php
            if (!empty($img)) {
              echo '<img src="/php/Authentication/uploads/' . $img . '" width="80" height="70">';
            }
            ?>
          </div>            
        </div><br>
        <div class="mb-3">
          <input type="submit" value="Update" name="submit" class="btn btn-primary">
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