<?php
$profpic = "img/b.jpg";
$oldguess= new ArrayObject($_POST);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Contact Us</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap-social/bootstrap-social.css">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark navbar-expand-sm">
    <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
       <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="Navbar">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item"><a class="nav-link" href="./index.php"><span class="fa fa-home fa-lg"></span> Home</a></li>
         <li class="nav-item"><a class="nav-link" href="./aboutus.php"><span class="fa fa-info fa-lg"></span> About</a></li>
         <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
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
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
            <div class="col-12">
               <h3>Contact Us</h3>
               <hr>
            </div>
        </div>

        <div class="row row-content">
           <div class="col-12">
              <h3>Location Information</h3>
           </div>
            <div class="col-12 col-sm-4 offset-sm-1">
                   <h5>Our Address</h5>
                    <address style="font-size: 100%">
		              121, Clear Water Bay Road<br>
		              Clear Water Bay, Canary<br>
		              Hazaribag<br>
		              <i class="fa fa-phone"></i>: +852 1234 5678<br>
		              <i class="fa fa-fax"></i>: +852 8765 4321<br>
		              <i class="fa fa-envelope"></i>:
                        <a href="mailto:confusion@food.net">confusion@food.net</a>
		           </address>
            </div>
            <div class="col-12 col-sm-11 offset-sm-1">
                <div class="btn-group" role="group">
                  <a role="button" class="btn btn-primary"><i class="fa fa-phone"></i> Call</a>
                  <a role="button" class="btn btn-info"><i class="fa fa-skype"></i> Skype</a>
                  <a role="button" class="btn btn-success" href="mailto:confusion@food.net"><i class="fa fa-envelope-o"></i> Email</a>
                </div>
            </div>
        </div>

        <div class="row card">
           <div class="col-12 card-header">
              <h3 class="card-header text-white bg-yellow">Register</h3>
           </div>
            <div class="col-12 col-md-9 card-body">
                <form method="post">
                  <div class="form-group row">
                    <label for="firstname" class="col-md-2">First Name</label>
                    <div class="col-md-10">
                       <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="lastname" class="col-md-2">Last Name</label>
                    <div class="col-md-10">
                       <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="telnum" class=" col-12 col-md-2">Contact Tel.</label>
                    <div class=" col-5 col-md-3">
                       <input type="tel" class="form-control" id="areacode" name="areacode" placeholder="Area Code">
                    </div>
                    <div class=" col-7 col-md-7">
                       <input type="tel" class="form-control" id="telnum" name="telnum" placeholder="Tel. Number">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="emailid" class="col-md-2 col-form-label" required>Email</label>
                    <div class="col-md-10">
                       <input type="emailid" class="form-control" id="emailid" name="emailid" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label" required>Password</label>
                    <div class="col-md-10">
                       <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6 offset-md-2">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                        <label class="form-check" for="approve">
                          <strong>May we contact you?</strong></label>
                      </div>
                    </div>
                    <div class="col-md-3 offset-md-1">
                      <select class="form-control">
                        <option>Tel.</option>
                        <option>Email</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="aboutyou" class="col-md-2 col-form-label">About You</label>
                    <div class="col-md-10">
                       <textarea class="form-control" id="aboutyou" name="aboutyou" rows="12"></textarea>
                    </div>
                  </div>
                    <div class="form-group row">
                      <div class="offset-md-2 col-md-10">
                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                </form>
            </div>
             <div class="col-12 col-md">
            </div>
       </div>
<?php if(isset($_POST['submit'])){?>
       <div class="row row-content">
           <div class="col-12" style="text-align:center;">
             <h1>Hello <?= htmlentities($oldguess['firstname'])?> <?= htmlentities($oldguess['lastname'])?></h1>
           </div>
         <div class="col-12" style="text-align:center;">
           <p>We Will soon reach you at <strong><?= htmlentities($oldguess['emailid'])?> </strong></p>
         </div>
  </div>
<?php } ?>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-1 col-sm-2 text-white">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./aboutus.php">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5 text-white">
                    <h5>Our Address</h5>
                    <address>
                      121, Clear Water Bay Road<br>
                      Clear Water Bay, Canary<br>
                      Hazaribag<br>
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
