<?php
session_start();
include "../instamojo/instamojo.php";
if(isset($_POST['pay_fee'])){
  $name=$_POST['name'];
  $cys=$_POST['class'];
  $sec=$_POST['section'];
  $roll=$_POST['roll'];
  $email=$_POST['email'];
  $month=$_POST['month'];
  $nom=$_POST['number_of_month'];
  $mobile=$_POST['mobile'];
  $fpm=$_SESSION['fpm'];
  $_SESSION['nom']=$nom;

$api = new Instamojo\Instamojo(test_bcd49b3e4525d5e5991df87a900, test_1e491d055072d5e14f4b88666c7, 'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "fee of ".$nom." month from ".$month." ",
        "amount" => $nom*$fpm,
        "send_email" => true,
        "email" => $email,
        "buyer_name" =>$name,
        "phone" => $mobile,
        "send_sms" => true,
        "allow_repeated_payments" => false,
        "redirect_url" => "http://localhost/Project-school/student/thankyou.php",
        // "webhook" =>
        ));
    // print_r($response);
    $pay_url=$response['longurl'];
    header("location:$pay_url");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

}
?>
