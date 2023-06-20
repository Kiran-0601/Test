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
  <title>SignUp Form</title>
</head>
<body>
<?php
  require 'db.php';
  require 'mail.php';

  if (isset($_POST['submit'])){
   
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $mobile =  $_POST['mobile'];
    $dob =  $_POST['dob'];    
    $pwd =  $_POST['pwd'];
    $hashedPassword = md5($pwd);
    $address =  $_POST['address'];
    $gender = $_POST['gender'];
    
    $sql = "INSERT INTO `auth`(`fname`, `lname`, `email`, `country`, `mobile`, `dob`, `password`, `address`, `gender`) VALUES ('$fname','$lname','$email','$country','$mobile','$dob','$hashedPassword','$address','$gender')";
    if ($conn->query($sql) === TRUE) {
      $mail->setFrom('ramchandanik872@gmail.com', 'Concetto Labs');
      $mail->addAddress($email, $fname . $lname);
      $mail->Subject = 'Welcome Mail';
      $mail->Body = 'Hello, ' . $fname . ' ' . $lname . ' Welcome To Concetto Labs..';
      if ($mail->send()) {
        echo "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
        Registration Successfully !! Please Check Your Mail
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
    }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
?>
<div class="wrapper">
  <form id="signUp" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-right">
    <h2 class="text-center">SignUp Form</h2>
    <div class="row">
      <div class="col-sm-6 mb-3">
        <label>First Name</label>
        <input type="text" name="fname" id="fname" class="input-field">
      </div>
      <div class="col-sm-6 mb-3">
        <label>Last Name</label>
        <input type="text" name="lname" id="lname" class="input-field">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 mb-3">
        <label>Email ID</label>
        <input type="text" name="email" id="email" class="input-field">
      </div>
      <div class="col-sm-6 mb-3">        
        <label>Select Country</label>
        <select id="country" name="country" class="form-select">        
          <option value="0">Select an option</option>
          <option value="India">India</option>
          <option value="New york">New york</option>
          <option value="London">London</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 mb-3">
        <label>Mobile Number</label>
        <input type="text" name="mobile" id="mobile" class="input-field">
      </div>
      <div class="col-sm-6 mb-3">
        <label>Date Of Birth</label>
        <input type="date" name="dob" id="dob" class="input-field">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 mb-3">
        <label>Password</label>
        <input type="password" name="pwd" id="pwd" class="input-field">
      </div>
      <div class="col-sm-6 mb-3">
        <label>Confirm Password</label>
        <input type="password" name="cpwd" id="cpwd" class="input-field">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8 mb-8">
        <label>Address</label>
        <textarea id="address" name="address" class="form-control"></textarea>
      </div>
      <div class="col-sm-4 mb-4">
        <label>Select Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check" id="gendererror">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
          <label class="form-check-label" for="female">Female</label>
        </div>
      </div>
    </div>
    <div class="form-check" id="agreeerror">
      <input class="form-check-input" type="checkbox" id="agree" name="agree">
      <label class="form-check-label" for="checkbox2">
        I agree all terms & Conditions
      </label>
    </div>
    <div class="mb-3">
      <input type="submit" value="Register" class="register" name="submit">
      <p style="color: #800000;">Already registered ??   <a href="signin.php">Please Login</a></p>
    </div>
  </form> 
</div>
</body>
</html>

