<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="main.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    loadRecords(1, '', perPage); // Fetch data when user change per page records
  });
});
function loadRecords(page, search, perPage) {
  $.ajax({
    url: 'search.php',
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
  <div class="container">
    <div class="row-md-3">
      <h2>Employee Data</h2>
    </div>
    <div class="col-md-4">
      <input type="button" class="btn btn-danger" onclick="window.location.href='add.php';" name="addemp" value="Add Employee">
    </div>
    <div class="col-md-4">
      <input type="text" id="search-input" class="form-control" placeholder="Search...">
    </div>
    <table id="recordTable" class="table"> 
    <!-- Table headers -->
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Website</th>
          <th>Mobile</th>
          <th>Gender</th>
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
    </div>
    <div id="per-page">
      <label for="recordsperpage">Records per page:</label>
      <div class="form-group" style="width: 50px;">
        <select id="records-per-page" class="form-control">
          <option value="2">2</option>
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="20">20</option>
        </select>
      </div>
    </div>
  </div>
</body>
</html>