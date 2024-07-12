<?php
//This script will handle login
session_start();
 
// check if the user is already logged in
if(isset($_SESSION['username']) )
{
  $msg=$_SESSION['type'];
  
    if(strcmp($msg,"farmer")==0)
    {
    
    header("location: php/welcomefarmer.php");
    exit;
    }
    else{
      header("location: customer.php");
      exit;
    }
}
require_once "./php/config.php";
 
$username = $password = "";
$err = "";
 
// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
 
     if(!isset($_POST['farmer']))
      {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
        {
            $err = "Please enter username + password";
            die($err);
        }        
      } 
      else {
        $username = trim($_POST['farmername']);
        $password = trim($_POST['fpassword']);
        if(empty(trim($_POST['farmername'])) || empty(trim($_POST['fpassword'])))
        {
            $err = "Please enter username + password";
            die($err);
        }   
        
      }
 
if(empty($err))
{
  if(!isset($_POST['farmer']))
  {
    $sql = "SELECT userid, username, password FROM users WHERE username = ?";
  } 
  else {
    $sql = "SELECT farmerid, username, password FROM farmer WHERE username = ?";
  }
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                  
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
 
                            //Redirect user to welcome page
                            echo '<script>alert("Successful login")</script>';
 
                            if(!isset($_POST['farmer']))
                            {
                              $_SESSION["type"] = "user";
                              header("location: customer.php");
                            } 
                            else {
                              header("location: ./php/welcomefarmer.php");
                              $_SESSION["type"] = "farmer";
                            }       
                        }
                        else {
                          echo '<script>alert("Invalid username or password")</script>';
                      }
                    }
                }
    }
}

}
?>
<!DOCTYPE html>
<html lang="en">
  <style type="text/css">
    .header {
      overflow: hidden;
      background-color: black;
      padding: 10px 30px;
    }

    .header a {
      float: left;
      color: white;
      text-align: center;
      padding: 12px;
      text-decoration: none;
      font-size: 18px;
      line-height: 25px;
      border-radius: 4px;
    }

    .header a.logo {
      font-size: 25px;
      font-weight: bold;
    }
    .header a.logo:hover {
      background-color: black;
    }

    .header a:hover {
      background-color: rgb(86, 246, 11);
      color: black;
    }

    .header a.active {
      background-color: dodgerblue;
      color: white;
    }

    .header-right {
      float: right;
    }
    .subnav {
      float: left;
      overflow: hidden;
      padding: 12px;
      text-decoration: none;
      font-size: 18px;
      line-height: 25px;
      border-radius: 4px;
    }

    .subnav .subnavbtn {
      border: none;
      outline: none;
      color: white;

      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .subnav-content {
      display: none;
      position: absolute;

      background-color: black;
      z-index: 1;
    }

    .subnav-content a {
      float: left;
      color: white;
      text-decoration: none;
    }

    .subnav-content a:hover {
      background-color: rgb(6, 240, 26);
      color: black;
    }

    .subnav:hover .subnav-content {
      display: block;
    }
    
  </style>
  

  <head>
    
    <meta name="viewport" content="width=device-width , initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8" />
    <title>KISAN PORTAL</title>
    <!-- viewport meta -->
    <meta name="KISAN PORTAL" content="All You Need for Agronomy" />

    <!-- styles -->
    <!-- helpers -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" />
    <!-- fontawesome css -->
    <link
      rel="stylesheet"
      href="plugins/font-awesome/css/font-awesome.min.css"
    />
    <!-- strock gap icons -->
    <link rel="stylesheet" href="plugins/Stroke-Gap-Icons-Webfont/style.css" />
    <!-- revolution slider css -->
    <link rel="stylesheet" href="plugins/revolution/css/settings.css" />
    <link rel="stylesheet" href="plugins/revolution/css/layers.css" />
    <link rel="stylesheet" href="plugins/revolution/css/navigation.css" />
    <!-- flaticon css -->
    <link rel="stylesheet" href="plugins/flaticon/flaticon.css" />
    <!-- jQuery ui css -->
    <link href="plugins/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet" />
    <!-- owl carousel css -->
    <link
      rel="stylesheet"
      href="plugins/owl.carousel-2/assets/owl.carousel.css"
    />
    <link
      rel="stylesheet"
      href="plugins/owl.carousel-2/assets/owl.theme.default.min.css"
    />
    <!-- animate css -->
    <link rel="stylesheet" href="plugins/animate.min.css" />
    <!-- fancybox -->
    <link
      rel="stylesheet"
      href="plugins/fancyapps-fancyBox/source/jquery.fancybox.css"
    />
    <link
      rel="icon"
      href="images/aynaLogo.png"
      type="image/gif"
      sizes="16x16"
    />

    <!-- master stylesheet -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/login.css" />
    <!-- responsive stylesheet -->
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"  />
    
  </head>
  <body>
    <style type="text/css">
      .header {
        overflow: hidden;
        background-color: black;
        padding: 10px 30px;
      }

      .header a {
        float: left;
        color: white;
        text-align: center;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        line-height: 25px;
        border-radius: 4px;
      }

      .header a.logo {
        font-size: 25px;
        font-weight: bold;
      }
      .header a.logo:hover {
        background-color: black;
      }

      .header a:hover {
        background-color: rgb(86, 246, 11);
        color: black;
      }

      .header a.active {
        background-color: dodgerblue;
        color: white;
      }

      .header-right {
        float: right;
      }
      .subnav {
        float: left;
        overflow: hidden;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        line-height: 25px;
        border-radius: 4px;
      }

      .subnav .subnavbtn {
        border: none;
        outline: none;
        color: white;

        background-color: inherit;
        font-family: inherit;
        margin: 0;
      }

      .subnav-content {
        display: none;
        position: absolute;

        background-color: black;
        z-index: 1;
      }

      .subnav-content a {
        float: left;
        color: white;
        text-decoration: none;
      }

      .subnav-content a:hover {
        background-color: rgb(6, 240, 26);
        color: black;
      }

      .subnav:hover .subnav-content {
        display: block;
      }


    </style>

    <!-- Start mainmenu -->
    <div id="google_element"></div>
      <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
      <script>
        function loadGoogleTranslate(){
          new google.translate.TranslateElement("google_element");
        }
      </script>
    <header>
      <div class="header">
        <a href="#default" class="logo"
          ><img style="height: 80px" src="images/footer-logo.png" alt="logo"
        /></a>
        <br />
        <div class="header-right">
          <div class="subnav">
            <button class="subnavbtn">Weather<i class="#"></i></button>
            <div class="subnav-content">
              <li><a href="weatherwebsite/index.html">Search</a></li>
              <li>
                <a href="weatherwebsite/currentLocationW/index.html"
                  >Your Current Location</a
                >
              </li>
            </div>
          </div>
          <a href="govts.html">Goverment Schemes</a>
          <a href="php/register.php">Register</a>
          
          <div class="subnav">
            <button class="subnavbtn">Crops<i class="#"></i></button>
            <div class="subnav-content">
              <li><a href="seed.html">Info on Seeds</a></li>
              <li><a href="seed price.html">Current Seeds Price</a></li>
              <li><a href="Fertilizer.html">Fertilizer</a></li>
            </div>
          </div>
          <div class="subnav">
            <button class="subnavbtn">Tech Knowledge<i class="#"></i></button>
            <div class="subnav-content">
              <li><a href="solarpanel.html">Solar Panel</a></li>
              <li><a href="tech.html">Modern Day Tech</a></li>
            </div>
          </div>
          <a class="nav-link" href="#" data-toggle="modal" data-target="#at-login" style="cursor: pointer;">Log In</a>
          <a href="Feedback.php">Feedback</a>
        </div>
      </div>
    </header>
    <!-- End mainmenu -->
    <section class="at-login-form">
      <div class="modal fade" id="at-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content wrapper">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
        </div>
        <div class="modal-body">
            <div class="title-text">
            <div class="title login">
                Farmer Login
              </div>
              <div class="title signup">
                Customer Login
              </div>
            </div>
              <div class="form-container">
                  <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Farmer</label>
                    <label for="signup" class="slide signup">Customer</label>
                    <div class="slider-tab">
                  </div>
              </div>
              <div class="form-inner">
                  <form action="#" class="login" method="post">
                      <div class="field">
                        <input type="text" placeholder="Email Address" name="farmername" required>
                      </div>
                      <div class="field">
                        <input type="password" placeholder="Password" name="fpassword" required>
                      </div>
                      <div class="pass-link">
                        <a href="#">Forgot password?</a></div>
                        <div class="field btn">
                          <div class="btn-layer">
                          </div>
                          <input type="submit" value="Sign in" name="farmer">
                      </div>
                      <div class="signup-link">
                          Not a member? <a href="./php/register.php">Signup now</a>
                      </div>
                  </form>
                  <form action="#" class="login" method="post">
                      <div class="field">
                          <input type="text" placeholder="Email Address" name="username" required>
                      </div>
                      <div class="field">
                          <input type="password" placeholder="Password" name="password" required>
                      </div>
                      <div class="pass-link">
                        <a href="#">Forgot password?</a>
                      </div>
                      <div class="field btn">
                          <div class="btn-layer">
                          </div>
                          <input type="submit" value="Sign in" name="user">
                      </div>
                      <div class="signup-link">
                        Not a member? <a href="./php/register.php">Signup now</a>
                      </div>
                  </form>
                </div>
              </div>
          </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </section>
  
    </div>
  
    
    </div>
  
    <!-- <script type="text/javascript" src="index.js"></script> -->
    <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (()=>{ 
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
      });
      
  </script>

    <section class="rev_slider_wrapper thm-banner-wrapper">
      <div id="slider1" class="rev_slider" data-version="5.0">
        <ul>
          <li data-transition="parallaxvertical" data-ease="SlowMo.ease">
            <img src="images/slider/crop.jpg" alt="Crop Background" />
            <div
              class="tp-caption sfb tp-resizeme caption-h1"
              data-x="left"
              data-hoffset="0"
              data-y="top"
              data-voffset="188"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="500"
            >
            KISAN PORTAL
            </div>
            <div
              class="tp-caption sfb tp-resizeme caption-p"
              data-x="left"
              data-hoffset="33"
              data-y="top"
              data-voffset="315"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="1000"
            >
              "KISAN PORTAL - <strong>You Need for Agronomy</strong>."
            </div>
          </li>

          <li data-transition="parallaxvertical" data-ease="SlowMo.ease">
            <img src="images/slider/11.jpeg" alt="Farms" />
            <div
              class="tp-caption sfb tp-resizeme caption-h1"
              data-x="left"
              data-hoffset="0"
              data-y="top"
              data-voffset="248"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="500"
            >
              Our<br />
              Vision
            </div>
            <div
              class="tp-caption sfb tp-resizeme caption-p"
              data-x="left"
              data-hoffset="0"
              data-y="top"
              data-voffset="375"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="1000"
            >
              Is to create awareness related to Farming Technics and Technology
              in Farmers community.
            </div>
            <div
              class="tp-caption sfl tp-resizeme"
              data-x="left"
              data-hoffset="0"
              data-y="top"
              data-voffset="500"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="1500"
            ></div>
          </li>
          <li data-transition="parallaxvertical" data-ease="SlowMo.ease">
            <img src="images/slider/bg2.jpg" alt="crop" />
            <div
              class="tp-caption sfb tp-resizeme caption-h1"
              data-x="left"
              data-hoffset="0"
              data-y="top"
              data-voffset="248"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="500"
            >
            OUR<br />VISION
            </div>
            <div
              class="tp-caption sfb tp-resizeme caption-p"
              data-x="left"
              data-hoffset="0"
              data-y="top"
              data-voffset="375"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="1000"
            >
              Is to work for farmers problem and introduce them to various
              policies and Technology related to farming.
            </div>
            <div
              class="tp-caption sfl tp-resizeme"
              data-x="left"
              data-hoffset="0"
              data-y="top"
              data-voffset="500"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="1500"
            >
              <!--<a href="about.html" class="thm-btn">About Us <i class="fa fa-arrow-right"></i></a>-->
            </div>
          </li>

          <li data-transition="parallaxvertical" data-ease="SlowMo.ease">
            <img src="images/slider/12.jpeg" alt="farms" />
            <div
              class="tp-caption sfb tp-resizeme caption-h1"
              data-x="left"
              data-hoffset="0"
              data-y="bottom"
              data-voffset="0"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="500"
            ></div>
            <div
              class="tp-caption sfb tp-resizeme caption-h1"
              data-x="right"
              data-hoffset="0"
              data-y="bottom"
              data-voffset="0"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="1700"
            ></div>
            <div
              class="tp-caption sfb tp-resizeme caption-p"
              data-x="right"
              data-hoffset="50"
              data-y="top"
              data-voffset="275"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="1100"
            >
              "Farming looks mighty easy when your plow is a pencil,<br />
              and you're a thousand miles from the corn field." <br />
              - President Dwight D. Eisenhower
            </div>
            <div
              class="tp-caption sfl tp-resizeme"
              data-x="right"
              data-hoffset="460"
              data-y="top"
              data-voffset="360"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="o:0"
              data-transform_out="o:0"
              data-start="1500"
            >
              <!--<a href="https://www.vitbhopal.ac.in/" class="thm-btn inverse">VIT Bhopal <i class="fa fa-arrow-right"></i></a>-->
            </div>
          </li>
        </ul>
      </div>
    </section>
""
    <section class="about-info-box sec-padding" id="aboutus">
      <div class="thm-container">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <div class="sec-title">
              <h2><span>What is KISAN PORTAL</span></h2>
              <ul class="bulleted-list">
                <li>
                  <i class="fa fa-arrow-circle-right"></i> KISAN PORTAL is a website particularly for the Indian Farmers
                  to provide all information in one portal.
                </li>
              </ul>
              <!-- <h2><span>What does AYNA means?</span></h2>
              <ul class="bulleted-list">
                <li>
                  <i class="fa fa-arrow-circle-right"></i> AYNA - All You Need
                  for Agronomy
                </li>
                <li>
                  <i class="fa fa-arrow-circle-right"></i> AYNA also stands for
                  mirror in Hindi. Same as a mirror our website also reflects
                  out all the info that's out there without misleading.
                </li>
              </ul> -->
              <h2><span>Reasons to Use KISAN PORTAL</span></h2>
              <ul class="bulleted-list">
                <li>
                  <i class="fa fa-arrow-circle-right"></i> A farmer will be able
                  to get all relevant information on specific subjects around
                  his state.
                </li>
                <li>
                  <i class="fa fa-arrow-circle-right"></i> One Stop Solution for
                  Farmers with most of the required Info available at one place.
                </li>
                <li>
                  <i class="fa fa-arrow-circle-right"></i> Consist of features
                  like weather report, government schemes, seed price etc.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="welcome-services home-one">
      <div class="thm-container">
        <div class="sec-title">
          <h2><span>Features</span></h2>
          <p>All the features that are provided by this website.</p>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="welcome-single-services">
              <div class="img-box">
                <img src="images/welcome-services/18.jpg" alt="weather" />
              </div>
              <div class="text-box">
                <div class="content">
                  <h3>Weather Report</h3>
                  <p>
                    Get all information needed on the weather of your current
                    location or by searching for the location.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="welcome-single-services">
              <div class="img-box">
                <img src="images/welcome-services/2.jpg" alt="seed" />
              </div>
              <div class="text-box">
                <div class="content">
                  <h3>Seed Price & Info</h3>
                  <p>
                    Realtime Seed Price along with all the Knowledge you need
                    about different types of seeds
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="welcome-single-services">
              <div class="img-box">
                <img src="images/welcome-services/19.png" alt="Govt Schemes" />
              </div>
              <div class="text-box">
                <div class="content">
                  <h3>Goverment Schemes</h3>
                  <p>
                    Latest Government Schemes for maximizing the benefits and
                    minimizing the loss.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="welcome-single-services">
              <div class="img-box">
                <img src="images/welcome-services/3.jpg" alt="Tech" />
              </div>
              <div class="text-box">
                <div class="content">
                  <h3>Technological Knowledge</h3>
                  <p>
                    The knowledge you need to enhance your crop production:
                    Solar Panel, etc.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="welcome-single-services">
              <div class="img-box">
                <img src="images/welcome-services/5.jpg" alt="Internet" />
              </div>
              <div class="text-box">
                <div class="content">
                  <h3>Low Internet Consumption</h3>
                  <p>
                    Even with poor internet connectivity, you can access this
                    website.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="welcome-single-services">
              <div class="img-box">
                <img src="images/welcome-services/7.jpg" alt="Ui Ux" />
              </div>
              <div class="text-box">
                <div class="content">
                  <h3>Easy to Use</h3>
                  <p>Simple visuals are used making it easy to understand.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer" class="sec-padding">
      <div class="thm-container">
        <div class="row">
          <div class="col-md-4 col-sm-6 footer-widget">
            <div class="about-widget">
              <a href="index.php"
                ><img
                  style="height: 150px"
                  src="images/footer-logo.png"
                  alt="logo"
              /></a>
              <p>All You Need for Agronomy</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 footer-widget">
            <div class="pl-30">
              <div class="title" style="color: #05f7c2">
                <h2>
                  <span>"If the farmer is rich, then so is the nation."</span>
                </h2>
                <br />
                <p><strong>- Amit Kalantri</strong></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 footer-widget"></div>
        </div>
      </div>

      
    </footer>

    <style type="text/css">
      .container{
          width : 1140px;
          margin: auto;
          display: flex;
          justify-content: center;
          padding:30px;
      }

      .footer-content{
        width: 33.33%;
      }
      
      .ab{
        font-size:28px;
        margin-bottom: 20px;
        text-align: center;
        color:#05f7c2;
       }

       .footer-content p{
        width: 190px;
        margin:auto;
        padding:7px;
        
       }
       .footer-content ul{
        text-align:center;
       }
       .list{
        padding:5px;
       }

       .list li{
        width:auto;
        text-align:center;
        padding:7px;
        position: relative;
       }

       .list li::before{
        content: '';
        position:absolute;
        transform:translate(-50%,-50%);
        left:50%;
        top:100%;
        width:0;
        height: 2px;
        background: #05f7c2;
        transition-duration: 0.5s;
       }

       .list li:hover::before{
        width: 70px;
      }
      .social-icons{
        text-align: center;
         padding: 0;
      }
      .social-icons li{
        display: inline-block;
        text-align: center;
        padding: 5px;
      }
      .social-icons i{
        color: white;
        font-size: 25px;
      }
      a{
        text-decoration: none;
        color: white;
      }
      a:hover{
        color:#05f7c2;
      }
      .social-icons i:hover{
        color:#05f7c2;
      }
      html{
        scroll-behavior: smooth;
      }

    </style>

    <div class="container">
        <div class="footer-content">
          <h3  class="ab">Contact us</h3>
          <p>Email: kisanportal@gmail.com</p>
          <p>Phone: +91 7023261474</p>
          <p>Address: SKIT Jaipir</p>

        </div>
        <div class="footer-content">
          <h3 class="ab">Quick Links</h3>
          <ul class = "list">
            <li><a href="">Home</a></li>
            <li><a href="#aboutus">About us</a></li>
            <li><a href="Feedback.php">Feedback</a></li>
            <li><a href="govts.html">Goverment Schemes</a></li>
            <li><a href="weatherwebsite/currentLocationW/index.html">Weather</a></li>
          </ul>
        </div>
        <div class="footer-content">
          <h3 class="ab">Follow Us</h3>
          <ul class="social-icons">
          <li><a href=""><i class="fab fa-facebook"></i></a></li>
          <li><a href=""><i class="fab fa-twitter" ></i></a></li>
          <li><a href=""><i class="fab fa-instagram" ></i></a></li>
          <li><a href=""><i class="fab fa-linkedin" ></i></a></li>
          </ul>
        </div>
      </div>
    <section class="bottom-bar">
      <div class="thm-container clearfix">
        <div class="pull-left">
          <p>KISAN PORTAL All rights reserved.</p>
        </div>
        <div class="pull-right">
          <a href="#">Created By : <i>KISAN PORTAL TEAM</i> </a>
        </div>
      </div>
    </section>
      

    <!-- jQuery js -->
    <script src="plugins/jquery/jquery-1.11.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery ui js -->
    <script src="plugins/jquery-ui-1.11.4/jquery-ui.js"></script>
    <!-- owl carousel js -->
    <script src="plugins/owl.carousel-2/owl.carousel.min.js"></script>
    <!-- jQuery appear -->
    <script src="plugins/jquery-appear/jquery.appear.js"></script>
    <!-- jQuery countTo -->
    <script src="plugins/jquery-countTo/jquery.countTo.js"></script>
    <!-- jQuery validation -->
    <script src="plugins/jquery-validation/dist/jquery.validate.min.js"></script>
    <!-- gmap.js helper -->
    <script src="http://maps.google.com/maps/api/js"></script>
    <!-- gmap.js -->
    <script src="plugins/gmap.js"></script>
    <!-- mixit up -->
    <script src="plugins/jquery.mixitup.min.js"></script>

    <!-- revolution slider js -->
    <script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>

    <!-- fancy box -->
    <script src="plugins/fancyapps-fancyBox/source/jquery.fancybox.pack.js"></script>
    <!-- type script -->
    <script src="plugins/typed.js-master/dist/typed.min.js"></script>

    <!-- theme custom js  -->
    <script src="js/main.js"></script>
  </body>
</html>
