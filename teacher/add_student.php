<?php
session_start();
$conn=mysqli_connect("localhost","root","","school");
$query2="select * from teacher where personal_email='".$_SESSION['email']."' and password='".$_SESSION['password']."'";
$res2=mysqli_query($conn,$query2);
$row=mysqli_fetch_array($res2);
$cys=$row['class_to_teach'];
$sec=$row['section'];

if(isset($_POST['submit'])){
  $first=mysqli_real_escape_string($conn,$_POST['first']);
  $last=mysqli_real_escape_string($conn,$_POST['last']);
  $mail=mysqli_real_escape_string($conn,$_POST['mail']);
  $mob=mysqli_real_escape_string($conn,$_POST['mob']);
  $dob=mysqli_real_escape_string($conn,$_POST['dob']);
  $pass=mysqli_real_escape_string($conn,$_POST['pass']);
  $roll=mysqli_real_escape_string($conn,$_POST['roll']);
  $sql_r="select * from student where class_of_study=$cys and section='$sec' and roll_number=$roll";
  $res_r=mysqli_query($conn,$sql_r) or die(mysqli_error($conn));
  $sql_e="select * from student where personal_email='$mail'";
  $res_e=mysqli_query($conn,$sql_e) or die(mysqli_error($conn));
  if(mysqli_num_rows($res_e)>0){
    $_SESSION['flag']=2;
    header("location:attendance.php");
    exit;
  }
  else if( mysqli_num_rows($res_r)>0){
    $_SESSION['flag']=3;
    header("location:attendance.php");
    exit;
  }
  else {
  $query1="insert into student (first_name, last_name,personal_email,class_of_study, mobile_number,
             date_of_birth,password,token,status,created_at,section,roll_number) values('$first','$last','$mail',$cys,$mob,'$dob','$pass','',1,'".date("y-m-d H:i:s")."','$sec',$roll)";
  $res1=mysqli_query($conn,$query1);
  $query2="insert into email (email, token, status,created_at) values('$mail','',1,'".date("y-m-d H:i:s")."')";
  $res2=mysqli_query($conn,$query2);
  if($res1 && $res2){
    $_SESSION['flag']=1;
    header("location:attendance.php");
    exit;
  }
}
}

if(isset($_POST['submit_attendance'])){
  $query3="select * from attendance where date='".date("y-m-d")."' and class=$cys and section='$sec'";
  $res3=mysqli_query($conn,$query3);
  if(mysqli_num_rows($res3)>0){
    foreach($_POST['attendance_status'] as $id=>$attendance_status){
      $student_name=$_POST['student_name'][$id];
      $roll_number=$_POST['roll_number'][$id];
      $date=date("y-m-d");
    $query="UPDATE `attendance` SET `student_name`='$student_name',`date`='$date',`class`=$cys,`section`='$sec',`roll_number`=$roll_number,`attendance_status`='$attendance_status' WHERE `date`='$date' and `roll_number`=$roll_number";
    $res=mysqli_query($conn,$query);
    if($res){
    $_SESSION['atten']=0;

     }
   }
   header("location:take_attendance.php");
  }
  else {
    foreach($_POST['attendance_status'] as $id=>$attendance_status){
      $student_name=$_POST['student_name'][$id];
      $roll_number=$_POST['roll_number'][$id];
      $date=date("y-m-d");
    $query4="insert into attendance(student_name,date,class,section,roll_number,attendance_status) values('$student_name','$date',$cys,'$sec',$roll_number,'$attendance_status')";
    $res4=mysqli_query($conn,$query4);
    if($res4){
      $_SESSION['atten']=1;
      header("location:take_attendance.php");
    }
   }
  }
}
?>
