<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <title>
    Registration Form
  </title>
  <body>
  <?php
    require 'db.php';
  ?>
<?php
  $name = $email = $gender = $comment = $website = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
    if (empty($_POST["website"])) {
      $websiteerr = "URL Is Required";
    } else {
      $website = test_input($_POST["website"]);
      // check if URL address syntax is valid
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        $websiteerr = "Invalid URL";
      }    
    }
    if (empty($_POST["mono"])) {
      $monoerr = "Mobile Number Is Required";
    } else {
      $mono = test_input($_POST["mono"]);
      if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $mono)) {
        $monoerr = "Only Digits Are Allowed";
      }
    }
    if (empty($_POST["gender"])) {
      $gendererr = "Gender Is Required";
    } else {
      $gender = test_input($_POST["gender"]);
    } 
    if (empty($_POST["address"])) {
      //$address = "Address Is Required";
    } else {
      $address = test_input($_POST["address"]);
    }
  }
  function test_input($data) {
    $data = trim($data);
    return $data;
  }
?>
<?php
  if (isset($_POST['submit'])){
    if($nameErr == "" && $genderErr == "" && $monoerr == "" && $websiteErr == "" && $emailErr == ""){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $website = $_POST['website'];
      $mobile =  $_POST['mono'];
      $gender = $_POST['gender'];
      $img=$_FILES["fileToUpload"]["name"];
      
      $sql = "INSERT INTO `employee`(`name`, `email`, `website`, `mobile`, `gender`, `image`) VALUES ('$name','$email','$website','$mobile','$gender','$img')";
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      }else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
?>
<form action="<?php $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
<div class="container">
<center><h1>User Registration Form</h1></center>
  <label>Name:</label><input type="text" name="name" placeholder="Enter Your Name">
  <span class="error"><?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" placeholder="Enter E-mail ID">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" placeholder="Enter Web Url">
  <span class="error"><?php echo $websiteerr;?></span>
  <br><br>
  Mobile No :
  <input type="text" name="mono" placeholder="Enter Mobile No"/>
  <span class="error"><?php echo $monoerr;?></span><br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other  
  <span class="error"><?php echo $gendererr;?></span>
  <br><br>  
  <!-- Hobbies :
  <input type="checkbox" name="playing" value="Playing"/>Playing
  <input type="checkbox" name="reading" value="Reading"/>Reading
  <input type="checkbox" name="singing" value="Singing"/>Singing
  <br><br>
  Address :
  <textarea name="address"><?php echo $address;?></textarea>-->
  Select Profile Picture :
  <input type="file" name="fileToUpload" id="fileToUpload">
  <span class="error"><?php echo $filerror;?></span> 
  <input type="submit" value="SUBMIT" name="submit" class="registerbtn">
</div>

<h2>All Users</h2>
<table id="customers">
  <thead>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email ID</th>
    <th>Website</th>
    <th>Mobile</th>
    <th>Gender</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody> 
    <?php
    $sql = "SELECT * FROM employee";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><img src="uploads/<?php  echo $row['image'];?>" width="80" height="80"></td>
    <td><?php echo $row['mobile']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>                      
    <?php    
    }
    }?>                
  </tbody>
</table>

</form>

<?php
$target_dir = "/var/www/html/php/OOP/Test/Php_Crud/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
  //echo "File is an image - " . $check["mime"] . ".";
  $uploadOk = 1;
} else {
  //echo "File is not an image.";
  $uploadOk = 0;
}
// Check if file already exists
if (empty($_POST["fileToUpload"])) {
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
  echo "File Should be max 2 MB. Your File is too large.";
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "your file was not uploaded.";
} 
else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } 
  else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>

</body>
</html> 