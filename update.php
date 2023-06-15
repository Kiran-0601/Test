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
<?php
require 'db.php';
?>
<?php
  if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $user_id = $_POST['user_id'];
    $website = $_POST['website'];
    $email = $_POST['email'];
    $mobile = $_POST['mono'];
    $gender = $_POST['gender']; 
    $sql = "UPDATE `demo2` SET `name`='$name',`email`='$email',`website`='$website',`mobile`='$mobile',`gender`='$gender' WHERE `id`='$user_id'"; 
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "Record updated successfully.";
    }else{
      echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }
  if (isset($_GET['id'])) {
    $user_id = $_GET['id']; 
    $sql = "SELECT * FROM `demo2` WHERE `id`='$user_id'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $website = $row['website'];
        $mobile = $row['mobile'];
        $gender = $row['gender'];
      } ?>
  
      <div class="col-md-6 offset-md-3">
        <div class="row-md-3">
          <h2>Edit Data</h2>
        </div>
        <form id="myForm" action="<?php $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="user_id" value="<?php echo $id; ?>">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name;?>" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="<?php echo $email;?>" id="email" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="website">Website:</label>
            <input type="text" class="form-control" id="website" value="<?php echo $website;?>" name="website" placeholder="Enter Website">
          </div>
          <div class="form-group">
            <label for="mobile">Mobile Number:</label>
            <input type="text" class="form-control" name="mono" value="<?php echo $mobile; ?>" id="mono" placeholder="Enter Mobile Number" />
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?>>Male
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female
          </div><br>
          <input type="submit" class="btn btn-danger" value="Update" name="update" class="registerbtn">
          <input type="button" class="btn btn-danger" onclick="window.location.href='home.php';" value="Back" name="back" class="registerbtn">
        </form>
        <?php
      } 
    else{
      echo "Data missing";
    }
  }
?> 
</div>
</body>
</html>