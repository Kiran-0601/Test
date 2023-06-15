<html>
<body>
<?php 
  include "db.php"; 
  if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "DELETE FROM `demo2` WHERE `id`='$user_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "Record deleted successfully.";
    }else
    {
      echo "Error:" . $sql . "<br>" . $conn->error;
    }
  } 
?>
<br><br>
<a href="home.php">Back To Page</a>
</body>
</html>