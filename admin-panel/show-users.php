<?php
session_start();
$email = $_SESSION['email'];

if (!isset($_SESSION['email'])) {
  $_SESSION['error'] = "<div id='alertMessage' class='alert alert-danger message-container fade show position-fixed top-0 end-0' role='alert'>
  You are not logged in. Please login to access the dashboard. &nbsp;&nbsp;  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  header("Location: signin.php");   // If user not login then Redirect to the login page
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="main.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
   
    var table =  $('#recordTable').DataTable({
      "ajax":{ 
        "url": "users.php",
        "type": "POST"
      }, // Path to your PHP file that retrieves data
      "columns": [
        { "data": "id" },
        { "data": "fname" },
        { "data": "lname" },
        { "data": "email" },
        {
          "data": "active",
          "render": function(data, type, row) {
            var checked = (data == 1) ? 'checked' : '';
            var toggleSwitch = '<div class="form-switch"><input class="form-check-input toggle-switch" type="checkbox" role="switch" data-id="' + row.id + '" ' + checked + '></div>';
            return toggleSwitch;
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {
            return '<a href="view.php?id=' + data.id + '" style="font-size:15px;color:#800000"><i class="fas fa-eye"></i>View</a> &nbsp;&nbsp; <a href="edit.php?id=' + data.id + '" style="font-size:15px;color:#800000"><i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp; <a href="delete.php?id=' + data.id + '" style="font-size:15px;color:#800000" class="delete-link"><i class="fa fa-trash o"></i>Delete</a>';
          }
        }
      ],
    });
    $('#recordTable').on('change', '.toggle-switch', function() {
      
      var userId = $(this).data('id');
      var status = ($(this).prop('checked')) ? 1 : 0;
      $.ajax({
        data: { userId: userId, status: status },
        type: "post",
        url: "update-status.php",
        success: function(response){
          
          // Display success message or perform any other action
          $('#alertmes').html(response.records); // Update table body
          var alertMessage = document.getElementById('alertMessage');
          // Hide the alert after 2 seconds
          setTimeout(function() {
            alertMessage.classList.remove('show');
          }, 2000);
        }
      });
    });  
  });
  </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Welcome , <?php echo $email; ?></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="show-users.php">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-8">
  <h2 class="text-center">All Users</h2>
  <div class="row justify-content-center">    
    <div class="col-lg-12"><br>
      <table id="recordTable"> 
        <!-- Table headers -->
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Is Active</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>  
    </div>
    <div id="alertmes">
    </div>
  </div>
</div>
</body>
</html>