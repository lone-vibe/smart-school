<?php
session_start();
require ("../fpdf/fpdf.php");
$conn=mysqli_connect("localhost","root","","school");
$query2="select * from teacher where personal_email='".$_SESSION['email']."' and password='".$_SESSION['password']."'";
$res2=mysqli_query($conn,$query2);
$row=mysqli_fetch_array($res2);
if(mysqli_num_rows($res2)>0){
    $email=$_SESSION['email'];
    $pass=$_SESSION['password'];
    $cys=$row['class_to_teach'];
    $sec=$row['section'];
    if(isset($_POST['download_result'])){
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      $roll=mysqli_real_escape_string($conn,$_POST['roll']);
      $exam=mysqli_real_escape_string($conn,$_POST['exam']);

$query3="select * from result where exam='$exam' and class=$cys and section='$sec' and roll_number=$roll";
$res3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($res3);
if(mysqli_num_rows($res3)){
  if($exam=='midsem'){
    $exam="Mid-Sem Result";
  }
  else if($exam=='finals'){
    $exam="Finals Result";
  }

class mypdf extends FPDF {
  function Header(){
    $this->Image('../img/a.png',14,10,30,30);
    $this->SetFont('Arial','B',30);
    $this->Cell(30,5,'',0,0);
    $this->Cell(160,20,'DAV PUBLIC SCHOOL',0,1,'C');
    $this->SetFont('Arial','',20);
    $this->Cell(30,5,'',0,0);
    $this->Cell(160,5,' Hazaribag, Jharkhand ',0,1,'C');
    $this->Cell(190,10,'',0,1,);
    $this->Cell(130,10,'',0,0);
    $this->SetFont('Arial','',15);
    $this->Cell(60,10,'Date : '.date('m-d-Y'),0,1,'C');
  }

  function Footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','',8);
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
  }
}

$pdf= new mypdf('p','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
$pdf->Cell(190,20,$exam,0,1,'C');
$pdf->Cell(190,10,'',0,1,);

$pdf->Cell(20,10,'',0,0);
$pdf->Cell(55,10,'Name',0,0);
$pdf->Cell(115,10,': '.$name,0,1);

$pdf->Cell(20,10,'',0,0);
$pdf->Cell(55,10,'Class',0,0);
$pdf->Cell(115,10,': '.$cys,0,1);

$pdf->Cell(20,10,'',0,0);
$pdf->Cell(55,10,'Section',0,0);
$pdf->Cell(115,10,': '.$sec,0,1);

$pdf->Cell(20,10,'',0,0);
$pdf->Cell(55,10,'Roll Number',0,0);
$pdf->Cell(115,10,': '.$roll,0,1);

$pdf->Cell(190,20,'',0,1);

$pdf->SetFont('Arial','B',20);
$pdf->Cell(95,10,'Subject',0,0,'C');
$pdf->Cell(95,10,'Marks',0,1,'C');

$pdf->SetFont('Arial','',15);
if($row3['science']!=-1){
  $pdf->Cell(20,10,'',0,0);
  $pdf->Cell(75,10,'Science',0,0);
$pdf->Cell(95,10,' '.$row3['science'],0,1,'C');
}
if($row3['social_science']!=-1){
  $pdf->Cell(20,10,'',0,0);
  $pdf->Cell(75,10,'Social Science',0,0);
$pdf->Cell(95,10,' '.$row3['social_science'],0,1,'C');
}
if($row3['maths']!=-1){
  $pdf->Cell(20,10,'',0,0);
  $pdf->Cell(75,10,'Maths',0,0);
$pdf->Cell(95,10,' '.$row3['maths'],0,1,'C');
}
if($row3['english']!=-1){
  $pdf->Cell(20,10,'',0,0);
  $pdf->Cell(75,10,'English',0,0);
$pdf->Cell(95,10,' '.$row3['english'],0,1,'C');
}
if($row3['sanskrit']!=-1){
  $pdf->Cell(20,10,'',0,0);
  $pdf->Cell(75,10,'Sanskrit',0,0);
$pdf->Cell(95,10,' '.$row3['sanskrit'],0,1,'C');
}
if($row3['hindi']!=-1){
$pdf->Cell(20,10,'',0,0);
$pdf->Cell(75,10,'Hindi',0,0);
$pdf->Cell(95,10,' '.$row3['hindi'],0,1,'C');
}
if($row3['computer']!=-1){
$pdf->Cell(20,10,'',0,0);
$pdf->Cell(75,10,'Computer',0,0);
$pdf->Cell(95,10,' '.$row3['computer'],0,1,'C');
}

$pdf->Cell(190,50,'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(150,10,"Teacher's Signature",0,0);
$pdf->Cell(40,10,"Principal's Signature",0,1);

$pdf->Output();

  }
    }
}
?>
