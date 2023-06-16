<?php

require 'db.php';

// Fetch the email from the AJAX request
$email = $_POST['email'];

$query = "SELECT COUNT(*) FROM auth WHERE email LIKE '$email'";
$result = mysqli_query($conn, $query);
$count = mysqli_fetch_row($result)[0];
mysqli_free_result($result);
mysqli_close($conn);

$response = array();
if ($count > 0) {
  $response['exists'] = true;
} else {
  $response['exists'] = false;
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
