<?php

require 'db.php';

$userId = $_POST['userId'];
$status = $_POST['status'];
// echo $status;
// Update the user status in the database
$sql = "UPDATE `auth` SET `active`='$status' WHERE `id`='$userId'"; 
$result = $conn->query($sql);

if ($result == TRUE) {
    if($status==0){
        $html = '';
        $html .= '<div id="alertMessage" class="alert alert-danger message-container mt-5 fade show position-fixed top-0 end-0" role="alert">
        User Deactivate successfully !!! &nbsp;&nbsp;  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else{
        $html = '';
        $html .= '<div id="alertMessage" class="alert alert-success message-container mt-5 fade show position-fixed top-0 end-0" role="alert">
        User Activate successfully !!! &nbsp;&nbsp;  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    // $response = array('success' => true, 'message' => 'User status updated successfully');
} else {
    $response = array('success' => false, 'message' => 'Failed to update user status');
}

$response = [
    'records' => $html
];
header('Content-Type: application/json');
echo json_encode($response);
$conn->close();

// $conn->close();

?>
