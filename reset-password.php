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
  <title>Reset Password</title>
</head>
<body>

<?php
require 'db.php';
require 'mail.php';

if (isset($_POST['submit'])) {
    
    $token = $_POST['token'];
    $sql = "SELECT * FROM password_reset WHERE token LIKE '$token'";
    $result = $conn->query($sql);
    // Check token exist or not.
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row["email"];
        $newPassword = $_POST['npwd'];
        $confirmPassword = $_POST['cpwd'];
        $newhashedPassword = md5($newPassword);
        $cnfhashedPassword = md5($confirmPassword);
        if ($newhashedPassword == $cnfhashedPassword) {
          // Verify the password
            $sql = "UPDATE `auth` SET `password`='$newhashedPassword' WHERE `email`='$email'"; 
            $result = $conn->query($sql);
            if ($result == TRUE) {
                $sql = "DELETE FROM `password_reset` WHERE `email`='$email'";
                $result = $conn->query($sql);
                if ($result == TRUE) {
                    $mail->isHTML(true);
                    $mail->setFrom('ramchandanik872@gmail.com', 'Concetto Labs');
                    $mail->addAddress($email);
                    $mail->Subject = "Password Reset Successfully";
                    $mail->Body = '<h1>Password Reset Successfully</h1>
                    <a href="http://localhost/php/Authentication/signin.php">Click Here to Signin</a>';
                    if ($mail->send()) {
                        echo "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
                        Password Reset Successfully !!! &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                }
            }else{
                echo "Error:" . $sql . "<br>" . $conn->error;
            }
        }
        else {
            // Invalid password, show an error message
            echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
            New password and confirm password should be same .. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
    else {
        // Invalid password, show an error message
        echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
        Sorry !! Your token is invalid ..&nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}
?>
<div class="wrapper">
  <form id="resetpassword" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-right">
    <h2 class="text-center">Reset Your Password</h2>
    <div class="mb-3">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <label>New Password</label>
        <input type="text" name="npwd" id="npwd" class="input-field">
    </div>
    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="text" name="cpwd" id="cpwd" class="input-field">
    </div>
    <div class="form-field">
      <input type="submit" value="Login" class="login" name="submit">
      <p><a href="signin.php" style="color: #800000;">Back To Login</a></p>
    </div>
  </form>
</div>

</body>
</html>