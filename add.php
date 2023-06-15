<!DOCTYPE html>
<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script> 
  <script src="main.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css"/>
</head>
<body>
<div class="col-md-6 offset-md-3">
  <div class="row-md-3">
    <h2>Add Data</h2>
  </div>
  <form id="myForm" action="insert.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" class="form-control" name="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email"  id="email" class="form-control" name="email"  placeholder="Enter your email">
    </div>
    <div class="form-group">
      <label for="website">Website:</label>
      <input type="text" id="website" class="form-control" name="website" placeholder="Enter Website">
    </div>
    <div class="form-group">
      <label for="mobile">Mobile Number:</label>
      <input type="text" id="mono" class="form-control" name="mono"  placeholder="Enter Mobile Number" />
    </div>
    <div class="form-group">
      <div id="gendererr">
        <label class="form-check-label" for="gender">Select Gender ::</label>
        <input  type="radio" name="gender" id="male" value="Male"> Male          
        <input type="radio" name="gender" id="female" value="Female"> Female
      </div>
    </div>         
    <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary">
    <input type="button" class="btn btn-danger" onclick="window.location.href='home.php';" value="Back" name="back">
  </form>
</div>
</body>
</html>