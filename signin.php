<?php
session_start();
  if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']); // Clear the error message
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
  <style>
  .wrapper{
    max-width: 450px;
  }
  </style>
  <title>SignIn Form</title>
</head>
<body>
<?php
  require 'db.php';

  if (isset($_POST['submit'])){
   
    $email = $_POST['email'];
    $pwd =  $_POST['pwd'];
    $sql = "SELECT * FROM auth WHERE email LIKE '$email'";
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
        $_SESSION['id'] = $id;
        header("Location: dashboard.php");
      } else {
        // Invalid password, show an error message
        echo "Invalid Your password.";
      }
    } else {
      // Invalid username, show an error message
      echo "Invalid Your Username";
    }
    // Close the database connection
    $conn->close();
  }
?>
    
<div class="wrapper">
  <form id="signin" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-right">
    <h2 class="text-center">SignIn Form</h2>
    <div class="mb-3">
      <label for="email">Email address</label>
      <input type="email" name="email" class="input-field" id="email">
    </div>
    <div class="mb-3">
      <label for="password">Password</label>
      <input type="password" name="pwd" class="input-field" id="pwd">
    </div>
    <div class="form-field">
      <input type="submit" value="Login" class="register" name="submit">
      <p style="color: #800000;">New Register ?? <a href="signup.php">Please SignUp</a></p>
      <p style="color: #800000;">Forgot Password ?? <a href="forgot-password.php">Click here</a></p>
    </div>
  </form>
</div>
</body>
</html>