<?php
session_start();
$profpic = "img/b.jpg";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css/styles.css">

   <script src="js/register.js"></script>
    <title>DAV Public School</title>
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
         <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Home</a></li>
         <!-- nav-item is used to display link content horizontally -->
         <li class="nav-item"><a class="nav-link" href="./aboutus.php"><span class="fa fa-info fa-lg"></span> About</a></li>
         <li class="nav-item"><a class="nav-link" href="./contactus.php"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
      </ul>
      <span class="navbar-text">
   <a data-toggle="modal" data-target="#loginModal">
     <span class="fa fa-sign-in"></span> LogIn
   </a>
</span>
    </div>
    </div>
  </nav>
  <div id="loginModal" class="modal fade" role="dialog">
     <div class="modal-dialog modal-lg" role="content">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#E4E4E4;">
          <h3 class="card-header" style=" background-color:#E4E4E4;" >Log in to continue..</h3>
        <button type="button" class="close" style=" background-color:#E4E4E4;" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body bg-light">
                  <form action="process.php" method="POST">
                  <div class="form-group row">
                    <label class="col-sm-3" for="username" >Username</label>
                    <div class="col-sm-9 mr-auto">
                      <input class="form-control" type="mail" name="username" placeholder="Email" onkeyup="emailcheck(this);" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3" for="password" required >Password</label>
                    <div class="col-sm-9 mr-auto">
                      <input class="form-control" type="password" name="password" placeholder="Password" onkeyup="passcheck(this);" required>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-sm-3" for="type">I am :</label>
                  <div class="col-sm-9">
                    <input type="radio" name="type" value="student" checked>&nbsp;Student
                    <input type="radio" name="type" value="teacher">&nbsp;Teacher
                    <input type="radio" name="type" value="parent">&nbsp;Parent
                    <input type="radio" name="type" value="admin">&nbsp;Admin
                </div>
              </div>
                      <div class="form-row">
                          <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Cancel</button>
                          <button type="submit" value="submit" class="btn btn-primary btn-sm ml-1">Sign in</button>
                      </div>
                  </form>
                   <div class="text center">
                     <h5><a href="register.php">Click here to Sign Up now</a></h5>
                   </div>
             </div>
          </div>
        </div>
      </div>

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
        <div class="row bg-content " style="background-color:#2F321E;">
            <div class=" col-12 text-white" style="text-align:center;" >
                <h2>Principle's Message</h2>
            </div>
            <div class="col-12 text-white">
              <p class="text-justify">Education is a life-long learning process. Learning happens all the time; not only in a pre-designated place called the school. It happens in the home, between home and school too. The home’s and school’s mission therefore is to provide a learning environment and opportunities to the children as the learners.
              </p>
            </div>
            <div class="col-12 offset-md-4">
              <div class="media">
                <img class="d-flex mr-3 img-circle align-self-center" src="img/principal.jpg" alt="uthappizza" height="130" width="150" >
                <div class="media-body text-white">
                  <h3 class="mt-0 ">Dr. X Singh<span class=" ml-2 badge badge-danger">HEAD</span></h3>
                  <p class="d-none d-sm-block">Phd. in Physics</p>
                </div>
              </div>
            </div>
        </div>

        <div class="row row-content align-items-center">
          <div class="d-none d-sm-block col-sm-4 col-md-2" style="background-color:#5D5E53;">
          </div>
            <div class="col col-sm-5 col-md-6 offset-sm-3 offset-md-4">
                <div >
                  <h2 class="mt-0">NOTICE Corner<span class="ml-2 badge badge-danger">NEW</span></h2>
                  <ul>
                    <br>
                    <li>Physics Professor required</li><br>
                    <li>Internal Exams Result</li><br>
                    <li>Organizing Inter School Sports Competetion</li>
                  </ul>
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
		              121, Canary Hill Road<br>
		              Hazaribag, Jharkhand<br>
		              INDIA<br>
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
