<?php

require 'db.php';

// Get the page number from the Ajax request
$page = $_POST['page'];
$search = $_POST['search'];
$recordsPerPage = $_POST['perPage'];


// Calculate the offset and limit for the query
$offset = ($page - 1) * $recordsPerPage;

// Query to fetch records for the current page

$sql = "SELECT * FROM auth WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' OR email LIKE '%$search%' LIMIT $offset, $recordsPerPage";
// Execute the query and fetch records
$result = $conn->query($sql);
// Generate the HTML for the table rows
if ($result->num_rows > 0) {
$html = '';
$id = ($page - 1) * $recordsPerPage + 1;
while ($row = $result->fetch_assoc()) {
  $html .= "<tr>";
  $html .= "<td>" . $id . "</td>";
  $html .= "<td>" . $row['fname'] . "</td>";
  $html .= "<td>" . $row['lname'] . "</td>";
  $html .= "<td>" . $row['email'] . "</td>";
  $html .= "<td>";
  $html .= "<a href='view.php?id=" . $row['id'] . "' style='font-size:15px;color:#800000'><i class='fas fa-eye'></i>View</a> &nbsp;&nbsp;";
  $html .= "<a href='edit.php?id=" . $row['id'] . "' style='font-size:15px;color:#800000'><i class='fa fa-edit'></i> Edit</a>";
  $html .= "</td>";
  $html .= "</tr>";
  $id++;
}
}
else{
  $html .= '<tr><td colspan="8" style="text-align: center; font-size: 20px;">No Record Found</td></tr>';
}
$totalRecordsQuery = "SELECT COUNT(*) as total FROM auth";
$resultTotal = $conn->query($totalRecordsQuery);
$rowTotal = $resultTotal->fetch_assoc();
$totalRecords = $rowTotal['total'];


// Generate the HTML for the pagination controls
$totalPages = ceil($totalRecords / $recordsPerPage);
$paginationHtml = '';
for ($i = 1; $i <= $totalPages; $i++) {
  $activeClass = ($i == $page) ? 'active' : '';
  $paginationHtml .= '<li class="page-item ' . $activeClass . '"><a href="#" class="page-link" onclick="loadRecords(' . $i . ', \'' . $search . '\', \'' . $recordsPerPage . '\')" data-page="' . $i . '">' . $i . '</a></li>';
}

// Prepare the response as JSON
$response = [
  'records' => $html,
  'pagination' => $paginationHtml
];

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
$conn->close();
?>
