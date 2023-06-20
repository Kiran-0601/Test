<?php
session_start();

$_SESSION['logmsg'] = "<div id='alertMessage' class='alert alert-success message-container fade show position-fixed top-0 end-0' role='alert'>
Logout Successfully !!! &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";

// Redirect to another page or perform any desired action
header("Location: signin.php");
exit();
?>