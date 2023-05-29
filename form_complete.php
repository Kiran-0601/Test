<?php
session_start();
?>
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
<form action="data.php" method="post" enctype="multipart/form-data">
  <div class="container">
    <center><h1>User Registration Form</h1></center>
    <label>Name:</label>
    <input type="text" name="name" value="<?php if (isset($_SESSION["name"])) echo $_SESSION["name"]; session_destroy();?>" placeholder="Enter Your Name">
    <span class="error"><?php if (isset($_SESSION['mySessionArray']['nameErr'])) echo $_SESSION['mySessionArray']['nameErr']; session_destroy();?></span>
    <br><br>
    E-mail: 
    <input type="text" name="email" value="<?php if (isset($_SESSION["email"])) echo $_SESSION["email"]; session_destroy();?>" placeholder="Enter E-mail ID">
    <span class="error"><?php if (isset($_SESSION['mySessionArray']["emailErr"])) echo $_SESSION['mySessionArray']["emailErr"]; session_destroy();?></span>
    <br><br>
    Website: <input type="text" name="website" value="<?php if (isset($_SESSION["website"])) echo $_SESSION["website"]; session_destroy();?>" placeholder="Enter Web Url">
    <span class="error"><?php if (isset($_SESSION['mySessionArray']["websiteErr"])) echo $_SESSION['mySessionArray']["websiteErr"]; session_destroy();?></span>
    <br><br>
    Mobile No :
    <input type="text" name="mono" value="<?php if (isset($_SESSION["mono"])) echo $_SESSION["mono"]; session_destroy();?>" placeholder="Enter Mobile No"/>
    <span class="error"><?php if (isset($_SESSION['mySessionArray']["monoerr"])) echo $_SESSION['mySessionArray']["monoerr"]; session_destroy();?></span>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($_SESSION["gender"]) && $_SESSION["gender"]=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($_SESSION["gender"]) && $_SESSION["gender"]=="male") echo "checked";?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($_SESSION["gender"]) && $_SESSION["gender"]=="other") echo "checked";?> value="other">Other  
    <br><br>
    <span class="error"><?php if (isset($_SESSION['mySessionArray']["gendererr"])) echo $_SESSION['mySessionArray']["gendererr"]; session_destroy();?>
    </span><br><br>
    Hobbies :
    <input type="checkbox" name="playing" value="Playing"/>Playing
    <input type="checkbox" name="reading" value="Reading"/>Reading
    <input type="checkbox" name="singing" value="Singing"/>Singing
    <br><br>
    Address :
    <textarea name="address"><?php if (isset($_SESSION["address"])) echo $_SESSION["address"]; session_destroy();?></textarea>
    Select Profile Picture :
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="SUBMIT" name="submit" class="registerbtn">
  </div>
</form>

</body>
</html> 