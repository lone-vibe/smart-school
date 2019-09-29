<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer1;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
  function sendOTP($email,$msg){
    include "PHPMailer/PHPMailer.php";
    include "PHPMailer/Exception.php";
    include "PHPMailer/SMTP.php";

    $mail=new PHPMailer(true);
     $mail->SMTPDebug = 0;                                       // Enable verbose debug output
     $mail->isSMTP();                                            // Set mailer to use SMTP
     $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
     $mail->Username   = 'm.sandeepkm1997@gmail.com';                     // SMTP username
     $mail->Password   = 'smartsandeep9471520149';                               // SMTP password
     $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
     $mail->Port       = 587;

    $mail->SetFrom('m.sandeepkm1997@gmail.com','Sandeep Mehta');
    $mail->AddAddress($email);
    $mail->Subject='OTP to LogIn';
    $mail->isHTML(true);
    $mail->Body=$msg;
    $result=$mail->Send();
    if(!$result){
      echo "Mailer Error".$mail->ErrorInfo;
    }else{
      return $result;
    }
  }

  function sendLink($email,$msg){
    include "PHPMailer/PHPMailer.php";
    include "PHPMailer/Exception.php";
    include "PHPMailer/SMTP.php";

    $dmail=new PHPMailer(true);
     $dmail->SMTPDebug = 0;                                       // Enable verbose debug output
     $dmail->isSMTP();                                            // Set mailer to use SMTP
     $dmail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
     $dmail->SMTPAuth   = true;                                   // Enable SMTP authentication
     $dmail->Username   = 'm.sandeepkm1997@gmail.com';                     // SMTP username
     $dmail->Password   = 'smartsandeep9471520149';                               // SMTP password
     $dmail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
     $dmail->Port       = 587;

    $dmail->SetFrom('m.sandeepkm1997@gmail.com','Sandeep Mehta');
    $dmail->AddAddress($email);
    $dmail->Subject='Verification Link';
    $dmail->isHTML(true);
    $dmail->Body=$msg;
    $result=$dmail->Send();
    if(!$result){
      echo "Mailer Error".$dmail->ErrorInfo;
    }else{
      return $result;
    }
    $dmail->SmtpClose();
    unset($dmail);
  }
?>
