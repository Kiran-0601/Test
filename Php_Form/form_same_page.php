<html>
<style>
  body{
    font-family: 'Times New Roman', Times, serif;
    background-color: white;
    padding: 20px;
    width: 100%;
    margin-left: 25%;
    font-size: 18px;
  }
  .container {
    padding: 30px;
    background-color: lightblue;
  }
  form{
    width: 50%;
  }
  .error {
    color: #FF0000;
  }
  input[type=text], input[type=password], input[type=file],textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }
  div {
    padding: 10px 0;
  }
  .registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }
</style>
<title>
  Registration Form
</title>
<body>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $gendererr = $monoerr = $filerror = $websiteErr = "";
$name = $email = $gender = $comment = $mono = $gender = $address = $website = "";

if (isset($_POST['submit'])){
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
    $websiteErr = "URL Is Required";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
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
  
  if (empty($_POST["fileToUpload"])) {
    $filerror = "Profile Pic Is Required";
  } else {
    $profile = test_input($_POST["fileToUpload"]);
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
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
  <div class="container">
    <center><h1>User Registration Form</h1></center>
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $name;?>" placeholder="Enter Your Name">
    <span class="error"><?php echo $nameErr;?></span>
    <br><br>
    E-mail: 
    <input type="text" name="email" value="<?php echo $email;?>" placeholder="Enter E-mail ID">
    <span class="error"><?php echo $emailErr;?></span>
    <br><br>
    Website: <input type="text" name="website" value="<?php echo $website;?>" placeholder="Enter Web Url">
    <span class="error"><?php echo $websiteErr;?></span>
    <br><br>
    Mobile No :
    <input type="text" name="mono" value="<?php echo $mono;?>" placeholder="Enter Mobile No"/>
    <span class="error"><?php echo $monoerr;?></span><br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
    <br><br>
    <span class="error"><?php echo $gendererr;?></span><br><br>
    Hobbies :
    <input type="checkbox" name="playing" value="Playing"/>Playing
    <input type="checkbox" name="reading" value="Reading"/>Reading
    <input type="checkbox" name="singing" value="Singing"/>Singing
    <br><br>
    Address :
    <textarea name="address"><?php echo $address;?></textarea>
    Select Profile Picture :
    <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $profile; ?>">
    <span class="error"><?php echo $filerror;?></span> 
    <input type="submit" value="SUBMIT" name="submit" class="registerbtn">
  </div>
</form>
<?php
echo $_POST['name']."<br>";
echo $_POST['email']."<br>";
echo $_POST['website']."<br>";
echo $_POST['mono']."<br>";
echo $_POST['gender']."<br>";
if (isset($_POST["reading"]) || isset($_POST["playing"]) || isset($_POST["singing"]) ){
echo "Hobbies :: <br>"; 
}
if (isset($_POST["playing"])) {
  echo "Playing  ";    
} 
if (isset($_POST["reading"])) {
  echo "Reading  ";    
} 
if (isset($_POST["singing"])) {
  echo "Singing<br>";    
} 
echo $_POST['address']."<br>";
?>

<?php
$target_dir = "/var/www/html/php/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
if($imageFileType!=""){
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }   
  if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "File Should be max 2 MB. Your File is too large.";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "your file was not uploaded.";
   // if everything is ok, try to upload file
  } 
  else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    }
    else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>
</body>
</html> 