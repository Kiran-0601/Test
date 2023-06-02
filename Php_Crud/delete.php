<html>
<body>
<?php 
    include "db.php"; 
    if (isset($_GET['id'])) {
      $user_id = $_GET['id'];
      $sql = "DELETE FROM `employee` WHERE `id`='$user_id'";
      $result = $conn->query($sql);
      if ($result == TRUE) {
        echo "Record deleted successfully.";
      }else
      {
        echo "Error:" . $sql . "<br>" . $conn->error;
      }
    } 
?>
<br>
<a href="form_complete.php">Back To Page</a>
</body>
</html>


