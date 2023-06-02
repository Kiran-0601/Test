<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<?php
require 'db.php';
?>
<?php
  if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $user_id = $_POST['user_id'];
    $website = $_POST['website'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender']; 
    $sql = "UPDATE `employee` SET `name`='$name',`email`='$email',`website`='$website',`mobile`='$mobile',`gender`='$gender' WHERE `id`='$user_id'"; 
    $result = $conn->query($sql); 
    if ($result == TRUE) {
      echo "Record updated successfully.";
    }else{
      echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }
  if (isset($_GET['id'])) {
    $user_id = $_GET['id']; 
    $sql = "SELECT * FROM `employee` WHERE `id`='$user_id'";
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
      <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
        <div class="container">
        <center><h1>Update User Data</h1></center>
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        <label>Name:</label><input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter E-mail ID">
        <span class="error"><?php echo $emailErr;?></span>
        <br><br>
        Website: <input type="text" name="website" placeholder="Enter Web Url"  value="<?php echo $website; ?>">
        <span class="error"><?php echo $websiteerr;?></span>
        <br><br>
        Mobile No :
        <input type="text" name="mono" placeholder="Enter Mobile No" value="<?php echo $mobile; ?>"/>
        <span class="error"><?php echo $monoerr;?></span><br><br>
        Gender:
        <input type="radio" name="gender" value="female" <?php if($gender == 'female'){ echo "checked";} ?>>Female
        <input type="radio" name="gender" value="male" <?php if($gender == 'male'){ echo "checked";} ?>>Male
        <input type="radio" name="gender" value="other">Other  
        <span class="error"><?php echo $gendererr;?></span>
        <br><br>  
        <!-- Hobbies :
        <input type="checkbox" name="playing" value="Playing"/>Playing
        <input type="checkbox" name="reading" value="Reading"/>Reading
        <input type="checkbox" name="singing" value="Singing"/>Singing
        <br><br>
        Address :
        <textarea name="address"><?php echo $address;?></textarea>
        Select Profile Picture :
        <input type="file" name="fileToUpload" id="fileToUpload">
        <span class="error"><?php echo $filerror;?></span>  -->
        <input type="submit" value="Update" name="update" class="registerbtn">
        <input type="button" onclick="window.location.href='form_complete.php';" value="Back" name="back" class="registerbtn">
        </div>
      </form>  
      <?php
    } 
    else{
      echo "Data missing";
    }
  }
?> 
</body>
</html>