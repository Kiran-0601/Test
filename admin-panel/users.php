<?php

require 'db.php';


// Query to fetch records for the current page

$sql = "SELECT id,fname,lname,email,active FROM auth";
// Execute the query and fetch records
$result = $conn->query($sql);
// Generate the HTML for the table rows

$data = array();
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode(array("data" => $data));
$conn->close();

?>
