<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: index.php");
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="./css/farmerstyle.css">
     <!--  font -->
   
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Welcome farmer!</title>
    <style>
       *{
       font-family: 'Poppins', sans-serif;
      }
    </style>
  </head>
  <body>
  <div id="google_element"></div>
      <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
      <script>
        function loadGoogleTranslate(){
          new google.translate.TranslateElement("google_element");
        }
      </script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="../assets/logo.png"/></a>
  <a class="navbar-brand" href="#">Farmer</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="welcomefarmer.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#">  <img src="https://img.icons8.com/metro/26/ffffff/user-male.png"> <?php echo " ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>

<div class="col-lg-12">
  <br>
<h3 style="font-size: 16px;"><?php echo "Welcome ". $_SESSION['username']?>! Have a Good Day!</h3>
<hr>

</div>

<div class="container-fluid">
                        <h2 class="mt-4">Dashboard</h1>
                           <hr>
                        <div class="row" style="height: 450px">

                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">My Orders <img style="height:68px;padding:6px;" src="https://img.icons8.com/fluent-systems-regular/64/ffffff/purchase-order.png"/></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="order.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"> <b>My Shop </b> <img style="padding:10px;" src="https://img.icons8.com/android/48/ffffff/shop.png"/> </div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">

                                        <a class="small text-white stretched-link" href="myshop.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> <b>Add Items to Shop </b> <img style="height:70px;padding:6px;" src=https://img.icons8.com/pastel-glyph/64/ffffff/box--v2.png></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="products.php">View Details </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">

                                    <div class="card-body"> <b>Check Weather </b> <img style="height:70px;padding:6px;" src=https://img.icons8.com/pastel-glyph/64/ffffff/box--v2.png></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.html">View Details </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                        <div class="row py-2 mt-3" style=" font-weight: 600;">
        <div class="col-lg-12 text-center">
          © 2023-24 Copyright <a href="#" style="text-decoration: none; color: inherit">KISAN PORTAL</a>
        </div>
        </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </body>
</html>