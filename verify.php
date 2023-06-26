<?php
session_start();

require 'db.php';
require 'mail.php';

// Retrieve the verification token from the URL parameter
$token = $_GET['token'];

// Validate the token
$sql = "SELECT * FROM auth WHERE token LIKE '$token'";
$result = $conn->query($sql);

// Check token exist or not.
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $expire = $row["expire"];
    $verify = $row["verified"];
    $email = $row["email"];

    $currentDateTime = date("Y-m-d H:i:s");
    $addedTime = date('Y-m-d H:i:s', strtotime($expire . ' +20 minutes'));
    // echo $addedTime;
    // check verification link expire or not.
    if (strtotime($addedTime) > strtotime($currentDateTime)) {
        $active = $row["active"];
        $verify = $row["verified"];
        if ($active == 0) {
            if($verify == 'No'){
                $active = 1;
                $verified = "Yes";
                $sql = "UPDATE `auth` SET `active`='$active',`verified`='$verified' WHERE `token`='$token'";
                $result = $conn->query($sql);
                if ($result == TRUE) {
                    $mail->setFrom('ramchandanik872@gmail.com', 'Concetto Labs');
                    $mail->isHTML(true);
                    $mail->addAddress($email);
                    $mail->Subject = 'Verification Successfully';
                    $mail->Body = '<h1>Verification Successfully</h1>
                    <p>Your Account Verified Successfully</p>
                    <a href="http://localhost/php/Authentication/signin.php">Click Here To Signin</a>';
                    if ($mail->send()) {
                        $_SESSION['verimsg'] = "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
                        Account Verification Successfully!!! Plz Sign In. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                        header("Location: signin.php");
                    }
                 
                }
            }
        }
        else{
            $_SESSION['verimsg'] = "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
            Your account already Verified!!! &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            header("Location: signin.php");
        }
    }
    else{
        $_SESSION['resendmsg'] = "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
        Sorry !! This link is expired Plz click resend verification mail.. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        $_SESSION['token'] = $token;
        header("Location: signin.php");
    }
}
else{
  echo "Your account not register plz go to sign up page";
}
?>