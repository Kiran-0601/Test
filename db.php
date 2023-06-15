<?php
$servername = "localhost";
$username = "root";
$password = "Cl@1234";
$db = "demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>