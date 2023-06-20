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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script>
    $(document).ready(function() {
      var perPage = $('#records-per-page').val();
      loadRecords(1, '', perPage); // Load records for the first page

      $('#search-input').on('input', function() {
        var perPage = $('#records-per-page').val();
        var search = $(this).val();
        loadRecords(1, search, perPage);
      });
      $('#records-per-page').on('change', function() {
        var perPage = $(this).val();
        loadRecords(1, '', perPage);        // Fetch data when user change per page records
      });
    });
    function loadRecords(page, search, perPage) {
      $.ajax({
        url: 'users.php',
        method: 'POST',
        data: { page: page, search: search, perPage: perPage },
        success: function(response) {
          //console.log(response)
          $('#recordTableBody').html(response.records); // Update table body
          $('#pagination .pagination').html(response.pagination); // Update pagination controls
        }
      });
    }
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
<div class="container mt-5">
  <h2 class="text-center">All Users</h2>
  <div class="col-lg-4 custom-row-padding">
      <input type="text" id="search-input" class="form-control" placeholder="Search...">
    </div>
 
  <div class="row justify-content-center">    
    <div class="col-lg-10"><br>
      <table id="recordTable" class="table"> 
        <!-- Table headers -->
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <!-- Table body -->
        <tbody id="recordTableBody">
          <!-- Data rows will be dynamically added here -->
        </tbody>
      </table>
      <!-- Pagination controls -->
      <div id="pagination">
        <ul class="pagination">
          <!-- Pagination links will be dynamically added here -->
        </ul>
        Records Per Page :
        <div class="form-group" style="width: 60px;">
          <select id="records-per-page" class="form-select">
            <option value="2" selected>2</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>