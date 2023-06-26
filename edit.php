<?php
session_start();
$email = $_SESSION['email'];
$id =  $_SESSION['id'];

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script> 
  <script src="main.js"></script>
  <title>Edit Profile</title>
</head>
<body>
<div class="container-fluid">
  <div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <ul class="nav nav-pills" id="menu">
          <li><a href="dashboard.php" class="nav-link px-0 align-middle">Dashboard Menu</a></li>
          <li><a href="edit.php" class="nav-link px-0 align-middle">Edit Profile</a></li>
          <li><a href="change_password.php" class="nav-link px-0 align-middle">Change Password</a></li>
          <li><a href="logout.php" class="nav-link px-0 align-middle">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="col py-3">
      <?php
      require 'db.php';
      
      if (isset($_POST['submit'])){
                
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $country = $_POST['country'];
        $mobile =  $_POST['mobile'];
        $dob =  $_POST['dob'];
        $address =  $_POST['address'];
        $gender = $_POST['gender'];
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
            $filepath = "uploads/" . $currentFilename; // Replace with the actual path to the folder where the file is stored
            if (file_exists($filepath)) {
              unlink($filepath);
            }
          }
        }
        else{
          // $currentFilename = '';
          $sql = "SELECT image FROM auth WHERE id = '$id'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $image = $row['image'];
          }
        }
       
        $sql = "UPDATE `auth` SET `fname`='$fname',`lname`='$lname',`country`='$country',`mobile`='$mobile',`dob`='$dob',`address`='$address',`gender`='$gender',`image`='$image'  WHERE `id`='$id'"; 
        $result = $conn->query($sql);
        if ($result == TRUE) {
          echo "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
          Record Updated Successfully !!! &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }else{
          echo "Error:" . $sql . "<br>" . $conn->error;
        }
      }
      if (isset($_SESSION['email'])) {
    
      $sql = "SELECT * FROM `auth` WHERE `email`='$email'";
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
          $address = $row['address'];
          $gender = $row['gender'];
          $img =  $row['image'];
          
        } ?>
      <?php echo $msg; ?>
      <div class="wrapper">
        <form id="editForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-right" enctype="multipart/form-data">
          <h2 class="text-center">Edit Profile</h2>
          <div class="row">
            <div class="col-sm-6 mb-3">
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
              <label>Select Country</label>
              <select id="country" name="country" class="form-select">
                <option selected>Select an option</option>
                <option value="India" <?php if ($country == 'India') echo 'selected'; ?>>India</option>
                <option value="New york" <?php if ($country == 'New york') echo 'selected'; ?>>New york</option>
                <option value="London" <?php if ($country == 'London') echo 'selected'; ?>>London</option>
              </select>
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
            <div class="col-sm-8 mb-8">
              <label>Address</label>
              <textarea id="address" name="address" class="form-control"><?php echo $address; ?></textarea>
            </div>
            <div class="col-sm-4 mb-4">
              <label>Select Gender</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?>>
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="form-check" id="gendererror">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Female"  <?php if($gender == 'Female'){ echo "checked";} ?>>
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
              else{
                echo '<p>Not Uploaded</p>';
              }
              ?>
            </div>
          </div>
          <div class="mb-3">
            <input type="submit" value="Update" class="register" name="submit">
          </div>
        </form>        
      </div>
      <?php
      }
      else{
        echo "Data missing";
      }
      }?>
    </div>
  </div>
</div>


</body>
</html>