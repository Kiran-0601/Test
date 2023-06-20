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
    max-width: 550px;
  }
  </style>
  <title>Forgot Password Form</title>
</head>
<body>
<?php
require 'db.php';
require 'mail.php';
if (isset($_POST['submit'])){
  
  $email = $_POST['email'];
  $sql = "SELECT * FROM auth WHERE email LIKE '$email'";
  $result = $conn->query($sql);
  // Check user exist or not.
  if ($result->num_rows > 0) {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32));
    $sql = "INSERT INTO `password_reset`(`email`, `token`) VALUES ('$email','$token')";
    if ($conn->query($sql) === TRUE) {
      // echo "hello";
      // send email 
      $mail->isHTML(true);
      $mail->setFrom('ramchandanik872@gmail.com', 'Concetto Labs');
      $mail->addAddress($email);
      $mail->Subject = "Password Reset Mail";
      $mail->Body = '<h1>Reset Your Password</h1>
      <p>Please click the following link to reset your password:</p>
      <a href="http://localhost/php/Authentication/reset-password.php?token=' . $token . '">Reset Password</a>';
      if ($mail->send()) {
        echo "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
        Reset Password Link has been Sent to your E-mail !! &nbsp;&nbsp;&nbsp;&nbsp;<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
      else {
        // Invalid username, show an error message
        echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
        Invalid Your Email. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
    }
    // Close the database connection
    $conn->close();
  }
  else{
    echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
    Invalid Your Email. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
}
?>
    
<div class="wrapper">
  <form id="forgotpassword" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-right">
    <h2 class="text-center">Forgot Password</h2>
    <div class="mb-3">
      <label for="email">Email address</label>
      <input type="email" name="email" class="input-field" id="email">
    </div>
    <div class="form-field">
      <input type="submit" value="Login" class="login" name="submit">
      <p><a href="signin.php" style="color: #800000;">Back To Login</a></p>
    </div>
  </form>
</div>
</body>
</html>