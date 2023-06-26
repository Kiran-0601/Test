<?php
session_start();

  if (isset($_GET['token'])) {
    include 'db.php';
    include 'mail.php';

    $token = $_GET['token'];
    $ntoken = bin2hex(random_bytes(32));
    $currentDateTime = date("Y-m-d H:i:s");
    $sql = "SELECT email FROM auth WHERE token LIKE '$token'";
    $result = $conn->query($sql);
    // Check token exist or not.
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $email = $row["email"];
      $sql = "UPDATE `auth` SET `token`='$ntoken',`expire`='$currentDateTime' WHERE `token`='$token'";
      $result = $conn->query($sql);
      if ($result == TRUE) {
        $mail->setFrom('ramchandanik872@gmail.com', 'Concetto Labs');
        $mail->isHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'Resend Verification Mail';
        $mail->Body = '<h1>Verify Your Account</h1>
        <p>Please click the following link to activate your account</p>
        <a href="http://localhost/php/Authentication/verify.php?token=' . $ntoken . '">Click Here</a>
        <h4>Note : This link will be expired after 20 Minutes.</h4>';
        if ($mail->send()) {
          $_SESSION['resendmsg'] = "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
          Resend Verification Mail has been sent to the email.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          header("Location: signin.php");
        }else {
          echo "Error: " . $mail->ErrorInfo;
        }
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
    else{
      echo "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
      Your account not registered Plz register yourself <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  }
?>
  

