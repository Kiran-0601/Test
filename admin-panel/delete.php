<?php

require 'db.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];// Update the user status in the database
  $sql = "DELETE FROM auth WHERE id=$id"; 
  $result = mysqli_query($conn, $sql); // $connection is your database connection variable

  if ($result) {
    header("Location: show-users.php");
  } else {
    echo "Failed to delete data";
  }
  // echo json_encode($response);
  $conn->close();
}
// $conn->close();

?>
