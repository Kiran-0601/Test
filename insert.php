<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Document</title>
</head>
<body>
<?php
  require 'db.php';
?>
<?php
  if (isset($_POST['submit'])){
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $mobile =  $_POST['mono'];
    $gender = $_POST['gender'];
    
    $sql = "INSERT INTO `demo2`(`name`, `email`, `website`, `mobile`, `gender`) VALUES ('$name','$email','$website','$mobile','$gender')";
    if ($conn->query($sql) === TRUE) {
      echo "<h2>New record created successfully</h2>";
    }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
?>
<p>Name :: <?php echo $name; ?></p>
<p>Email Id:: <?php echo $email; ?></p>
<p>Website:: <?php echo $website; ?></p>
<p>Mobile No:: <?php echo $mobile; ?></p>
<p>Gender:: <?php echo $gender; ?></p>

<input type="button" class="btn btn-danger" onclick="window.location.href='add.php';" value="Back" name="back">
</body>
</html>

