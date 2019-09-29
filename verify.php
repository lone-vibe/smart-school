<?php
    if(!isset($_GET['email']) || !isset($_GET['token'])){
      header('location: register.php');
      exit;
    }
    else{
      $conn=mysqli_connect("localhost","root","","school");
      $email=mysqli_real_escape_string($conn,$_GET['email']);
      $token=mysqli_real_escape_string($conn,$_GET['token']);
      $type=mysqli_real_escape_string($conn,$_GET['type']);
      $query1="select * from ".$type." where personal_email='$email' and token='$token' and NOW()<=DATE_ADD(created_at,INTERVAL 30 MINUTE)";
      $result=mysqli_query($conn,$query1) or die(mysqli_error($conn));
        if(mysqli_num_rows($result)>0){
          $query2="update $type set status=1 where personal_email='$email' and token='$token'";
          $query3="update email set status=1 where email='$email' and token='$token'";
          mysqli_query($conn,$query2) or die ($mysqli_error($conn));
          mysqli_query($conn,$query3) or die ($mysqli_error($conn));
          $msg='<h3 style="color:green; text-align:center;">Registration of '.$type.' with email : "'.$email.'" has been verified</h3>';
          echo $msg;
        }
        else{
          $msg= '<h3 style="color:red; text-align:center;">Validity time out '.$type.' . Please ask to try again.</h3>';
          echo $msg;
        }
    }
?>
