<?php
// Start the session
session_start();

// Destroy all session data
session_destroy();

// Redirect to another page or perform any desired action
header("Location: signin.php");
exit();
?>