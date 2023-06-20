<?php
session_start();
if (isset($_SESSION['error'])) {
  echo $_SESSION['error'];
  unset($_SESSION['error']); // Clear the error message
}
if(isset($_SESSION['logmsg'])) {
  echo $_SESSION['logmsg'];
  // Destroy all session data
  session_destroy();
  unset($_SESSION['msg']);
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
  <title>SignIn Form</title>
</head>
<body>
<?php
require 'db.php';
if (isset($_POST['submit'])){
   
  $email = $_POST['email'];
  $pwd =  $_POST['pwd'];
  $sql = "SELECT * FROM admin WHERE email LIKE '$email'";
  $result = $conn->query($sql);
  // Check user exist or not.
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row["password"];
    $id = $row["id"];
    // Verify the password
    if ($pwd == $storedPassword) {
      // Authentication successful, redirect to dashboard or homepage
      $_SESSION['email'] = $email;
      $_SESSION['msg'] = "<div id='alertMessage' class='alert alert-success message-container mt-5 fade show position-fixed top-0 end-0' role='alert'>
        Login Successfully !!! &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      header("Location: dashboard.php");
    } else {
      // Invalid password, show an error message
      echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
      Invalid Your password. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  } else {
    // Invalid Email, show an error message
    echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
    Invalid Your Email. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  // Close the database connection
  $conn->close();
}
?>
</div>
<div class="wrapper">
  <form id="signIn" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-right">
    <h2 class="text-center">Admin Login</h2>
    <div class="mb-3">
      <label for="email">Email address</label>
      <input type="text" id="email" name="email" class="input-field">
    </div>
    <div class="mb-3">
      <label for="password">Password</label>
      <input type="text"  id="pwd" name="pwd" class="input-field">
    </div>
    <div class="form-field">
      <input type="submit" value="Login" class="register" name="submit">
    </div>
  </form>
</div>
</body>
</html>