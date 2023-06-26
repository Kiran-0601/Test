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
  if(isset($_SESSION['verimsg'])) {
    echo $_SESSION['verimsg'];
    unset($_SESSION['verimsg']);
  }
  if(isset($_SESSION['resendmsg'])) {
    echo $_SESSION['resendmsg'];
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
    max-width: 550px;
  }
  </style>
  <title>SignIn Form</title>
</head>
<body>
<?php
  require 'db.php';

  if (isset($_POST['login'])){
   
    $email = $_POST['email'];
    $pwd =  $_POST['pwd'];
    $hashedPassword = md5($pwd);
    $sql = "SELECT * FROM auth WHERE email LIKE '$email'";
    $result = $conn->query($sql);
    // Check user exist or not.
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $storedPassword = $row["password"];
      $id = $row["id"];
      $active = $row["active"];
      $expire = $row["expire"];
      $verify = $row["verified"];
      $token = $row["token"];

      // Verify the password
      if ($hashedPassword == $storedPassword) {
        if($active == 1){
          // Authentication successful, redirect to dashboard or homepage
          $_SESSION['email'] = $email;
          $_SESSION['id'] = $id;
          $_SESSION['msg'] = "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
          Login Successfully !!! &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          header("Location: dashboard.php");
        }
        else{
          if($verify == 'No'){
            $currentDateTime = date("Y-m-d H:i:s");
            $addedTime = date('Y-m-d H:i:s', strtotime($expire . ' +20 minutes'));
            // echo $addedTime;
            // check verification link expire or not.
            if (strtotime($addedTime) < strtotime($currentDateTime)) {
              $_SESSION['resendmsg'] = "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
              Sorry !! Your verification is pending. Plz click Resend verification mail&nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
              $_SESSION['token'] = $token;
              header("Location: signin.php");
              exit;
            }
            else{
              echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
              Your verification is pending. Plz Go to email to verify your account. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
          }
          else{
            echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
            Your account has been disabled Plz Contact to administartor.. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          }
        }
      }
      else {
        // Invalid password, show an error message
        echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
        Invalid Your password. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
    } 
    else {
      // Invalid Email, show an error message
      echo "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
      Invalid Your Email. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    $conn->close();
    // Close the database connection
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
      <button type="submit" value="Login" class="login" name="login">Login</button>
      <p style="color: #800000;">New Register ?? <a href="signup.php">Click here</a></p>
      <p style="color: #800000;">Forgot Password ?? <a href="forgot-password.php">Click here</a></p>
      <?php if (isset($_SESSION['resendmsg'])): ?>
      <p style="color: #800000;">Verification Pending ??
        <a href="reverify.php?token=<?php   $token = $_SESSION['token'];  echo $token; ?>">Resend verification mail</a>
      </p>
      <?php unset($_SESSION['resendmsg']); endif; ?>
    </div>
  </form> 
</div>
</body>
</html>