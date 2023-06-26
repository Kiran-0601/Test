<?php
session_start();
$email = $_SESSION['email'];
$id =  $_SESSION['id'];

if (!isset($_SESSION['email'])) {
  $_SESSION['error'] = "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
  You are not logged in. Please login to access the dashboard. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  header("Location: signin.php");     // If user not login then Redirect to the login page
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script> 
  <link rel="stylesheet" href="main.css"/>
  <script src="main.js"></script> 
  <title>Change Password</title>
  <style>
  .wrapper{
    max-width: 550px;
  }
  </style>
</head>
<body>
<?php
  require 'db.php';
  if (isset($_POST['submit'])){
    $sql = "SELECT password  FROM auth WHERE email LIKE '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $storedPassword = $row["password"];
      $pwd = $_POST['pwd'];
      $oldhashedPassword = md5($pwd);
      // Verify the password
      if ($oldhashedPassword == $storedPassword) {
        $npwd = $_POST['npwd'];
        $newhashedPassword = md5($npwd);
        $sql = "UPDATE `auth` SET `password`='$newhashedPassword' WHERE `id`='$id'"; 
        $result = $conn->query($sql);
        if ($result == TRUE) {
          echo "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
          Record Updated Successfully !!! &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }else{
          echo "Error:" . $sql . "<br>" . $conn->error;
        }
      } else {
        // Invalid password, show an error message
        echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
        Your Old Password Is Wrong !!! &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
    } 
  }
?>
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
      <div class="wrapper">
        <form id="changePassword" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-right">
          <h2 class="text-center">Change Password</h2>
          <div class="row">
            <div class="col-sm-12 mb-12">
              <label>Old Password</label>
              <input type="text" name="pwd" value="" id="pwd" class="input-field">
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12 mb-12">
              <label>New Password</label>
              <input type="text" name="npwd" id="npwd" class="input-field">
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12 mb-12">
              <label>Confirm Password</label>
              <input type="text" name="cpwd" id="cpwd" class="input-field">
            </div>
          </div><br>
          <div class="mb-3">
            <input type="submit" value="Update" class="login" name="submit">
          </div>
        </form>   
      </div>
    </div>
  </div>
</div>
</body>
</html>
