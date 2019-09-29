<?php

session_start();

// connect to the server and select database
$conn=mysqli_connect("localhost","root","","school");

    // get values passed from form in login.php file
if(isset($_POST['username'])){
    $user=mysqli_real_escape_string($conn,$_POST['username']);
    $pass=mysqli_real_escape_string($conn,$_POST['password']);
    $type=mysqli_real_escape_string($conn,$_POST['type']);



    // query to the database
    $result= mysqli_query($conn,"select * from $type where personal_email='".$user."' and password='".$pass."' and status=1 limit 1;")
             or die("Failed to query database".mysqli_error($conn));
    $row=mysqli_fetch_array($result);
    if($row['personal_email']==$user && $row['password']==$pass){
      $_SESSION['email']=$user;
      $_SESSION['password']=$pass;
      $_SESSION['type']=$row['type'];
      header("location:$type/$type.php");
     }
      else{?>
        <script>alert ("Incorrect username or password or type.");</script>
    <?php
            echo '<a href="index.php"><h1 style="text-align:center; margin:50px auto;">Go back to Home page</h1></a>';
  }

}?>
