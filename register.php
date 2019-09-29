<?php
include "mail_function.php";
date_default_timezone_set("Asia/Kolkata");
$success="";
$first="";
$last="";
$mail="";
$mob="";
$dob="";
$profpic = "img/b.jpg";
  $conn= mysqli_connect("localhost","root","","school");
   if(isset($_POST['submit'])){
     session_start();
     $first=mysqli_real_escape_string($conn,$_POST['first']);
     $last=mysqli_real_escape_string($conn,$_POST['last']);
     $mail=mysqli_real_escape_string($conn,$_POST['mail']);
     $mob=mysqli_real_escape_string($conn,$_POST['mob']);
     $dob=mysqli_real_escape_string($conn,$_POST['dob']);
     $pass=mysqli_real_escape_string($conn,$_POST['pass']);
     $cpass=mysqli_real_escape_string($conn,$_POST['cpass']);
     $type=mysqli_real_escape_string($conn,$_POST['type']);

   $sql_e="select * from email where email='$mail'";
   $res_e=mysqli_query($conn,$sql_e) or die(mysqli_error($conn));
   if(mysqli_num_rows($res_e)>0){
     $mail_error="Sorry... email already registered";
   }
   else {
     // $otp=rand(100000,999999);
     // $msg="<h4 style='color:MediumSeaGreen;'>One time password for login authentication is:</h4><br><br><h2 style='color=DodgerBlue;align:center;'>".$otp."<h2><br><h5 style='color:red;'>This otp is valid for 30 minutes</h5>";
     // $mail_status=sendOTP($mail,$msg);

                   $mail_status=1;


         if($mail_status==1){
           $query1="insert into email (email,token,status,created_at) values ('$mail','$token',0,'".date("y-m-d H:i:s")."')";
           mysqli_query($conn,$query1) or die(mysqli_error($conn));
           $current_id=mysqli_insert_id($conn);
           if(!empty($current_id)){
             $success=2;
             }
             $mail_error="";
                if($type=="student"){
                  $tmail=mysqli_real_escape_string($conn,$_POST['tmail']);
                  $cys=mysqli_real_escape_string($conn,$_POST['cys']);
                  $sec=mysqli_real_escape_string($conn,$_POST['sec']);
                  $roll=mysqli_real_escape_string($conn,$_POST['roll']);
                  $token='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM()/';
                  $token=str_shuffle($token);
                  $token=substr($token,0,10);
                  $msg=" <h3 style='color:MediumSeaGreen;'>Name: $first.' '.$last</h3><br>
                                <h3 style='color:MediumSeaGreen;'>Email: $mail</h3><br>
                                <h3 style='color:MediumSeaGreen;'>Type: $type</h3><br>
                                <h3 style='color:MediumSeaGreen;'>Class: $cys</h3><br>
                                <h3 style='color:MediumSeaGreen;'>Section: $sec</h3><br>
                                <h3 style='color:MediumSeaGreen;'>Roll Number: $roll</h3><br>
                                <h4>Please click on the link below to verify :</h4><br>
                                <a href='http://localhost/Project-school/verify.php?email=$mail&token=$token&type=$type'>Click Here</a>";

                  $sql_s="select * from teacher where personal_email='$tmail' and status=1 ";
                  $res_s=mysqli_query($conn,$sql_s) or die(mysqli_error($conn));
                  if(mysqli_num_rows($res_s)==0){
                    $tmail_error="Sorry... teacher's email does not exist";
                  }
                  else{
                     $tmail_error="";

                      $query2="insert into student (first_name, last_name,personal_email,class_of_study, mobile_number,
                                 date_of_birth,password,token,status,created_at,section,roll_number) values('$first','$last','$mail',$cys,$mob,'$dob','$pass','$token',0,'".date("y-m-d H:i:s")."','$sec',$roll)";
                    mysqli_query($conn,$query2) or die(mysqli_error($conn));
                    sendLink($tmail,$msg);
                   }
                }
                else if($type="teacher"){
                  $tmail=mysqli_real_escape_string($conn,$_POST['amail']);
                  $cys=mysqli_real_escape_string($conn,$_POST['cyt']);
                  $sql_s="select * from admin where personal_email='$tmail' and status=1 ";
                  $res_s=mysqli_query($conn,$sql_s) or die(mysqli_error($conn));
                  if(mysqli_num_rows($res_s)==0){
                    $tmail_error="Sorry... Admin's email does not exist";
                  }
                  else{
                     $tmail_error="";

                      $query2="insert into teacher (first_name, last_name,personal_email,class_to_teach, mobile_number,
                                 date_of_birth,password,token,status,created_at,section) values('$first','$last','$mail',$cyt,$mob,'$dob','$pass','$token',0,'".date("y-m-d H:i:s")."'),$tsecs";
                    mysqli_query($conn,$query2) or die(mysqli_error($conn));
                    sendLink($tmail,$msg);
                   }
                }
                else if($type="parent"){
                  $tmail=mysqli_real_escape_string($conn,$_POST['smail']);
                  $tsec=mysqli_real_escape_string($conn,$_POST['tsec']);
                  $sql_s="select * from student where personal_email='$tmail' and status=1 ";
                  $res_s=mysqli_query($conn,$sql_s) or die(mysqli_error($conn));
                  if(mysqli_num_rows($res_s)==0){
                    $tmail_error="Sorry... Admin's email does not exist";
                  }
                  else{
                     $tmail_error="";

                      $query2="insert into parent (first_name, last_name,personal_email, mobile_number,
                                 date_of_birth,password,token,status,created_at) values('$first','$last','$mail',$mob,'$dob','$pass','$token',0,'".date("y-m-d H:i:s")."')";
                    mysqli_query($conn,$query2) or die(mysqli_error($conn));
                    sendLink($tmail,$msg);
                   }
                }
                else if($type="admin"){
                  $tmail=mysqli_real_escape_string($conn,$_POST['amail']);
                  $sql_s="select * from admin where personal_email='$tmail' and status=1 ";
                  $res_s=mysqli_query($conn,$sql_s) or die(mysqli_error($conn));
                  if(mysqli_num_rows($res_s)==0){
                    $tmail_error="Sorry... Admin's email does not exist";
                  }
                  else{
                     $tmail_error="";

                      $query2="insert into admin (first_name, last_name,personal_email, mobile_number,
                                 date_of_birth,password,token,status,created_at) values('$first','$last','$mail',$mob,'$dob','$pass','$token',0,'".date("y-m-d H:i:s")."')";
                    mysqli_query($conn,$query2) or die(mysqli_error($conn));
                    sendLink($tmail,$msg);
                   }
                }
         }else{
           $mail_error="$mail does not exist";
         }
   }
}

      if(isset($_POST['submit_otp'])){
          $query3="select * from email where otp='".$_POST['otp']."' and status!=1 and NOW()<=DATE_ADD(created_at,INTERVAL 30 MINUTE)";
          $result=mysqli_query($conn,$query3) or die(mysqli_error($conn));
          $count=mysqli_num_rows($result);
          if(!empty($count)){
            $query4="update email set status=1 where otp='".$_POST['otp']."' and status=0";
            mysqli_query($conn,$query4);
            $success=2;
          }
          else{
            $success=1;
            $otp_error="INVALID OTP";
          }
      }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="js/register.js"></script>

</head>

<body>
  <nav class="navbar navbar-dark navbar-expand-sm">
    <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
      <!-- Here, "data-target" command uses the id of other elements which it targets -->
       <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="Navbar">
      <ul class="navbar-nav mr-auto">
        <!-- navbar-nav is used to display the content horizontally -->
<!--  mr-auto is used to specify right margin i.e. the content will be pushed as left as possible -->
         <li class="nav-item active"><a class="nav-link" href="./index.php"><span class="fa fa-home fa-lg"></span> Home</a></li>
         <!-- nav-item is used to display link content horizontally -->
         <li class="nav-item"><a class="nav-link" href="./aboutus.php"><span class="fa fa-info fa-lg"></span> About</a></li>
         <li class="nav-item"><a class="nav-link" href="./contactus.php"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
      </ul>
    </div>
    </div>
  </nav>
  <header class="">
      <div class="container">
          <div class="row row-header">
            <div class="col-12 col-sm-3 ">
              <img src="img/a.png" class="img-fluid">
            </div>
              <div class="col-12 col-sm-9 align-self-center text-justify">
                  <h1 class="text-center">DAV Public School</h1>
                  <p>We take inspiration from the World's legendry diciples, and create a unique fusion experience. Our profoud adaptive technique in your account to grab!</p>
              </div>
          </div>
      </div>
  </header>

<div class=" container-fluid" style="background-image:url('<?php echo $profpic;?>'); background-repeat:no-repeat;background-size:cover;">
<div class="row bg-content justify-content-center">
<div class="col-8 col-sm-3 wel-content align-self-center" style="text-align:center;" >
<h1 >Welcome</h1>
</div>
</div>
</div>
  <div class="container">
    <div class="row card">
     <div class="col-12 col-sm-8 offset-sm-2">
      <div class="col-12 card-header">
        <h3 class="card-header text-white" style="background-color:#2F321E;">Fill In the details to register...</h3>
        <div class="card-body">
            <?php if($success==2) {?>
              <h4 class="text-success text-center">Successfully Registered !! </h4><br>
              <h6 class="text-success text-center">Please wait for the verification by the <?php if($type=="student")echo "teacher";
                                                                                                 else if($type=="teacher")echo "admin";
                                                                                                 else if($type=="parent")echo "daughter/son";
                                                                                                 else echo "admin"; ?>.</h6>
            <?php }else{?>
              <form action="#" method="POST" onsubmit="return validation();">
          <div class="form-group row">
            <label class="col-sm-4" for="firstname" >First Name</label>
            <div class=" col-sm-8 mr-auto">
              <input class="form-control" type="text" name="first" placeholder="First Name" onkeyup="lettersonly(this);" value="<?php echo $first; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4" for="lastname" >Last Name</label>
            <div class="col-sm-8 mr-auto">
              <input class="form-control" type="text" name="last" placeholder="Last Name" onkeyup="lettersonly(this);" value="<?php echo $last; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4" for="mail" >Email</label>
            <div class="col-sm-8 mr-auto">
              <input class='form-control' type="email" name="mail" placeholder="x@y.com" onkeyup="emailcheck(this);" value="<?php echo $mail; ?>" required>
              <?php if(isset($mail_error)): ?>
                <span class="text-danger"><?php echo $mail_error; ?></span>
              <?php endif ?>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4" for="mail" >Mobile</label>
            <div class="col-sm-8 mr-auto">
              <input class='form-control' type="tel" name="mob" placeholder="Mobile Number" onkeyup="numbersonly(this);" value="<?php echo $mob; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4" for="tel" >Date of Birth</label>
            <div class="col-sm-8 mr-auto">
              <input class="form-control" type="date" name="dob" placeholder="dd-mm-yyyy" required value="<?php echo $dob; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4" for="password" required >Password</label>
            <div class="col-sm-8 mr-auto">
              <input id="pass" class="form-control" type="password" name="pass" placeholder="Password" onkeyup="passcheck(this);" required>
            </div>
            <span id="passinfo" class="text-danger font-weight-bold"></span>
          </div>
          <div class="form-group row">
            <label class="col-sm-4" for="password" required >Confirm Password</label>
            <div class="col-sm-8 mr-auto">
              <input id="cpass" class="form-control" type="password" name="cpass" placeholder="Confirm Password" onkeyup="cpasscheck(this);" required>
            </div>
            <span id="cpassinfo" class="text-danger font-weight-bold"></span>
          </div>
        <div class="form-group row">
          <label class="col-sm-4" for="type">I am :</label>
          <div class="col-sm-8"  required>
            <input type="radio" name="type" value="student" onchange="check(this);"required>&nbsp;Student
            <input type="radio" name="type" value="teacher" onchange="check(this);"required>&nbsp;Teacher
            <input type="radio" name="type" value="parent" onchange="check(this);" required>&nbsp;Parent
            <input type="radio" name="type" value="admin" onchange="check(this);" required>&nbsp;Admin
        </div>
      </div>
      <?php if(isset($tmail_error)): ?>
        <h6 class="text-danger text-center"><?php echo $tmail_error; ?></h6>
      <?php endif ?>
      <div id="student" style="display:none;">
      <div class="form-group row">
        <label class="col-sm-4" for="tmail" >Teacher's Email</label>
        <div class="col-sm-8 mr-auto">
          <input class='form-control' type="email"name="tmail" placeholder="x@y.com" onkeyup="emailcheck(this);">
        </div>
      </div>
      <div class="form-group row" >
        <label class="col-sm-4" for="cys" >Class you study</label>
        <div class="col-sm-8 mr-auto">
          <input  class='form-control' type="number" name="cys" placeholder="Class you study" onkeyup="numbersonly(this);">
        </div>
      </div>
      <div class="form-group row" >
        <label class="col-sm-4" for="sec" >Section</label>
        <div class="col-sm-8 mr-auto">
          <input  class='form-control' type="text" name="sec" placeholder="Section" onkeyup="lettersonly(this);">
        </div>
      </div>
        <div class="form-group row" >
          <label class="col-sm-4" for="roll" >Roll Number</label>
          <div class="col-sm-8 mr-auto">
            <input  class='form-control' type="number" name="roll" placeholder="Roll Number" onkeyup="numbersonly(this);">
          </div>
        </div>
    </div>
    <div id="teacher" style="display:none;">
    <div class="form-group row">
      <label class="col-sm-4" for="amail" >Admin's Email</label>
      <div class="col-sm-8 mr-auto">
        <input class='form-control' type="email"name="amail" placeholder="x@y.com" onkeyup="emailcheck(this);">
      </div>
    </div>
    <div id="admin" >
    <div class="form-group row" >
      <label class="col-sm-4" for="cyt" >Class you teach</label>
      <div class="col-sm-8 mr-auto">
        <input  class='form-control' type="number" name="cyt" placeholder="Class you teach" onkeyup="numbersonly(this);">
      </div>
    </div>
    <div class="form-group row" >
      <label class="col-sm-4" for="sec" >Section</label>
      <div class="col-sm-8 mr-auto">
        <input  class='form-control' type="text" name="tsec" placeholder="Section" onkeyup="lettersonly(this);">
      </div>
    </div>
  </div>
</div>
  <div id="parent" style="display:none;">
  <div class="form-group row">
    <label class="col-sm-4" for="tmail" >Son/Daughter Email</label>
    <div class="col-sm-8 mr-auto">
      <input class='form-control' type="email" name="smail" placeholder="x@y.com" onkeyup="emailcheck(this);" >
    </div>
  </div>
</div>

        <div class="form-group row">
          <div class="offset-md-2 col-md-10">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm ml-1">Register</button>
          </div>
        </div>
        </form>
<?php }?>
      </div>
  </div>
  </div>
  </div>
  </div>
  <footer class="footer">
      <div class="container">
          <div class="row">
              <div class="col-4 offset-1 col-sm-2 text-white">
                  <h5>Links</h5>
                  <ul class="list-unstyled">
                      <li><a href="#">Home</a></li>
                      <li><a href="./aboutus.php">About</a></li>
                      <li><a href="./contactus.php">Contact</a></li>
                  </ul>
              </div>
              <div class="col-7 col-sm-5 text-white">
                  <h5>Our Address</h5>
                  <address>
                121, Clear Water Bay Road<br>
                Clear Water Bay, Kowloon<br>
                HONG KONG<br>
                <i class="fa fa-phone fa-lg"></i>  +852 1234 5678<br>
                <i class="fa fa-fax fa-lg"></i>  +852 8765 4321<br>
                <i class="fa fa-envelope fa-lg"></i>  <a href="mailto:confusion@food.net">confusion@food.net</a>
             </address>
              </div>
              <div class="col-12 col-sm-4 align-self-center">
                  <div>
                      <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus fa-lg"></i></a>
                      <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"></i></a>
                      <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
                      <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
                      <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube fa-lg"></i></a>
                      <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o fa-lg"></i></a>
                  </div>
              </div>
         </div>
         <div class="row justify-content-center">
              <div class="col-auto text-white">
                  <p>© Sandeep Mehta</p>
              </div>
         </div>
      </div>
  </footer>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
