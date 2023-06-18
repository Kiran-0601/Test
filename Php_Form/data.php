<?php
session_start();
?>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $gendererr = $monoerr = $filerror = $websiteErr = "";
$name = $email = $gender = $comment = $mono = $address = $website = "";

if (isset($_POST['submit'])){
    if (empty($_POST["name"])) {
      $nameErr = "Name is required"; 
    }
    else {
      $name = test_input($_POST["name"]);
       if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
         $nameErr = "Only letters and white space allowed";
       }
    }
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } 
    else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
       {
         $emailErr = "Invalid email format";
       }
    }
    if (empty($_POST["website"])) {
       $websiteErr = "URL Is Required";
    } 
    else {
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
$_SESSION['name']=$name;
$_SESSION['email']=$email;
$_SESSION['gender']=$gender;
$_SESSION['comment']=$comment;
$_SESSION['mono']=$mono;
$_SESSION['address']=$address;
$_SESSION['website']=$website;

$_SESSION['mySessionArray'] = array(); // Create an array to store session variables for displaying Errors

// Add variables to the session array
$_SESSION['mySessionArray']['nameErr']=$nameErr;
$_SESSION['mySessionArray']['emailErr']=$emailErr;
$_SESSION['mySessionArray']['websiteErr']=$websiteErr;
$_SESSION['mySessionArray']['gendererr']=$gendererr; 
$_SESSION['mySessionArray']['monoerr']=$monoerr;

$myarray = $_SESSION['mySessionArray'];

if (!empty(array_filter($myarray))){ // Check The array has at least one defined value or not.
  header("Location: form_complete.php"); // redirected to the form for displaying errors.
} 
else{ //if array is empty then showing data of the form
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
}
?>
