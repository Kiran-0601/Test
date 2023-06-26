<?php
session_start();
$email = $_SESSION['email'];
$id = $_SESSION['id'];
$msg = $_SESSION['msg'];

if (!isset($_SESSION['email'])) {
    $_SESSION['error'] = "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
    You are not logged in. Please login to access the dashboard. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    header("Location: signin.php");     // If user not login then Redirect to the login page
    exit();
}
else if(isset($_SESSION['email'])) {
    echo $msg;
    unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script> 
  <link rel="stylesheet" href="main.css"/>
  <script src="main.js"></script>
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
            <p style="color: #800000; font-size: 20px;"><b>Welcome </b>, <?php echo $email; ?></p>
        </div>
    </div>
</div>
</body>
</html>
