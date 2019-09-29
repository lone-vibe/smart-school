<?php
session_start();
session_destroy();
  if(isset($_SESSION['email'])){
    header("location:index.php");
  }
  else{
    echo "<a href='index.php'>Go to Log in page</a>";
  }
?>
