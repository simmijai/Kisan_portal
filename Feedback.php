<?php 
require_once "./php/config.php";
 
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
    <link rel="stylesheet" href="css/popup.css" />
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" />
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
    <!-- responsive stylesheet -->
    <link rel="stylesheet" href="css/responsive.css" />
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
      .thanks{
        display: flex;
      }
    </style>

    <!-- Start mainmenu -->
    <header>
      <div class="header">
        <a href="index.php" class="logo"
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
          <div class="subnav">
            <button class="subnavbtn">Crop<i class="#"></i></button>
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
        </div>
      </div>
    </header>
    <!-- End mainmenu -->

    <section class="sec-padding contact-page-content">
      <div class="thm-container">
        <div class="sec-title">
          <h2><span>Feedback</span></h2>
          <p>Give us your thoughts and ideas where we can improve.<br /></p>
        </div>
        <br />
        <style>
          .form-container {
                  max-width: 700px;
                  /* margin: 0 auto; */
                          }
          .input-field {
                   width: 100%;
                   padding: 10px;
                   margin-bottom: 15px;
                   border: 1px solid #000;
                   border-radius: 5px;
                   box-sizing: border-box;
                   color: black;
                         }
          .label {
                  font-weight: bold;
                 color: #000;
                 }
          .input-field::placeholder {
                   color: #666;
                         }
           .submit-button {
                   background-color: #00FF00;
                   color: #000;
                   padding: 10px 20px;
                   border: none;
                   border-radius: 5px;
                   cursor: pointer;
                  
                  }
          .submit-button:hover {
                   background-color: #008000;
                  } 
                  
  .cn{
    border-radius: 10px;
    width: 160px;
    height: 40px;
    background: #00FF00;
    border: 2px solid blue;
    margin-bottom: 10px;
    margin-left: 10px;
    font-size: 17px;
    cursor: pointer;
    /* margin-top: 30px; */
    transition: 0.4s ease;
}
      .cn:hover{
           background-color: #008000 ;
    
               }
      .cn a{
          text-decoration: none;
          color:black;
          transition: 0.4s ease;
             }
      .thanks {
          display: flex;
          /* margin-left : 20px ; */
}

        </style>
        <div class="row">
          <div class="col-md-7 col-sm-6 col-xs-12 pull-left">
            <div class="form-container">
             <form  action="" method= "POST"
             class="form"
               
             >
          
              <div class="form-group">
              <!-- <label class="label" for="name">Name:</label> -->
                <input id="name" class="input-field" type="text" placeholder="Name" name="name" />
                        </div>
              <div class="form-group">
              <!-- <label class="label" for="email">Email:</label> -->
                <input
                  id="email"
                  class="input-field"
                  type="text"
                  placeholder="Email"
                  name="email"
                />
                        </div>
              <!--<p><input type="text" placeholder="Subject" name="subject"></p>-->
              <div class="form-group">
              <!-- <label class="label" for="feedback">Feedback:</label> -->
                <textarea
                  id="message"
                  class="input-field"
                  name="message"
                  placeholder="Feedback"
                ></textarea>
                        </div>
              <p>
                <input class="submit-button"  type="submit" value="submit" name="register"/>
                </p>
              <!-- <button
                class="popup"
                onclick="submitFunction()"
                type="submit"
                class="thm-btn"
                name="submit"
              >
                Submit Now<span class="popuptext" id="myPopup"
                  >Thanks for your response</span
                >
              </button> -->
              <!-- <script>
                function submitFunction() {
                  var popup = document.getElementById("myPopup");
                  popup.classList.toggle("show");
                  var x = document.getElementById("name");
                  var y = document.getElementById("email");
                  var z = document.getElementById("message");
                  x.value = "";
                  y.value = "";
                  z.value = "";
                }
              </script> -->
             </form>
            </div>
          </div>
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

<?php

  if($_POST['register']){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['message'];
    
   $query = "INSERT INTO feedback(name,email,message) values(?,?,?)";
   $stmt =  mysqli_prepare($conn,$query);
   if($stmt){  
    $stmt->bind_param("sss", $name , $email , $feedback);
    $stmt->execute();
    // echo "data inserted into database";
  ?>  
  
  <div class = "thanks">
             <h1>Your Feedback has been submitted .</h1>
             <button class="cn"><a href="index.php">click here</a></button> 
            <h1>  to go back to Home page.</h1></div>
 <?php
    $stmt->close();
    $conn->close();
  //  <br><br>
          //  <!-- <div class="dbba" > <h1>Your Form has been submitted . You will receive appoinment details shortly. </h1>
          //   <button class="cn"><a href="index.php">Click here</a></button> 
          //   <h1>   to go back to Home page.</h1>
          //   </div> -->
          // header("location: /kisan-portal-main/index.php");

        //   if (mysqli_stmt_execute($stmt))
        // {
        //     //echo "Username: ", $param_username;  
        //     header("location: /kisan-portal-main/index.php");
        // }
        // else{
        //     echo "Something went wrong... cannot redirect!";
        // }
 }
    // else{
    // echo "failed ";
    //  }
}
?>
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