<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","school");
    $query2="select * from teacher where personal_email='".$_SESSION['email']."' and password='".$_SESSION['password']."'";
    $res2=mysqli_query($conn,$query2);
    $row=mysqli_fetch_array($res2);
        $email=$_SESSION['email'];
        $pass=$_SESSION['password'];
        $cys=$row['class_to_teach'];
        $sec=$row['section'];

    if(isset($_POST['submit'])){
      $exam=mysqli_real_escape_string($conn,$_POST['exam']);
      $roll=mysqli_real_escape_string($conn,$_POST['roll']);
      if(isset($_POST['maths'])){
        $maths=mysqli_real_escape_string($conn,$_POST['maths']);
      }
      else{
        $maths=-1;
      }
      if(isset($_POST['english'])){
        $eng=mysqli_real_escape_string($conn,$_POST['english']);
      }
      else{
        $eng=-1;
      }
      if(isset($_POST['science'])){
        $science=mysqli_real_escape_string($conn,$_POST['science']);
      }
      else{
        $science=-1;
      }
      if(isset($_POST['social_science'])){
        $ss=mysqli_real_escape_string($conn,$_POST['social_science']);
      }
      else{
        $ss=-1;
      }
      if(isset($_POST['hindi'])){
        $hindi=mysqli_real_escape_string($conn,$_POST['hindi']);
      }
      else {
        $hindi=-1;
        }
      if(isset($_POST['sanskrit'])){
        $sanskrit=mysqli_real_escape_string($conn,$_POST['sanskrit']);
      }
      else{
        $sanskrit=-1;
      }
      if(isset($_POST['computer'])){
        $comp=mysqli_real_escape_string($conn,$_POST['computer']);
      }
      else{
        $comp=-1;
      }

      $query="select * from result where exam='$exam' and class=$cys and section='$sec' and roll_number=$roll";
      $res=mysqli_query($conn,$query);
      if(mysqli_num_rows($res)>0){
        $query2="UPDATE `result` SET `exam`='$exam',`class`=$cys,`section`='$sec',`roll_number`=$roll,`science`=$science,`social_science`=$ss,`maths`=$maths,`english`=$eng,
             `sanskrit`=$sanskrit,`hindi`=$hindi,`computer`=$comp WHERE `class`=$cys and `section`='$sec' and `roll_number`=$roll ";
          $res2=mysqli_query($conn,$query2);
          if($res2){
            $_SESSION['result']=2;
            header("location:result.php");
          }

      }
      else{
         $query2="insert into result(exam,class,section,roll_number,science,social_science,maths,english,sanskrit,hindi,computer) values('$exam',$cys,'$sec',$roll,$science,$ss,$maths,$eng,$sanskrit,$hindi,$comp)";
         $res2=mysqli_query($conn,$query2);
         if($res2){
           $_SESSION['result']=1;
           header("location:result.php");
         }

      }
    }
       ?>
