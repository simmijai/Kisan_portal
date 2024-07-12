<?php

include('config.php');
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
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
     
@import url('https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&subset=greek-ext');
  *{
       font-family: 'Poppins', sans-serif;
      }
body{
	background-image: url("https://unsplash.com/photos/fjj7lVpCxRE");
	background-position: center;
    background-origin: content-box;
    background-repeat: no-repeat;
    background-size: cover;
	min-height:100vh;
	font-family: 'Poppins', sans-serif;
}

.box{
	position:absolute;
	left:50%;
	top:50%;
	transform: translate(-50%,-50%);
    background-color: rgba(0, 0, 0, 0.89);
	border-radius:3px;
	padding:70px 100px;
}

.input-container input{ 
  border:0;
  border-bottom:2px solid #555;  
  background:transparent;
  width:50%;
  padding:8px 0 5px 0;
  font-size:16px;
  color:#fff;
}
.input-container input:focus{ 
 border:none;	
 outline:none;
 border-bottom:1px solid #fff;	
}
/*.btn{
	color:#fff;
	background-color:#e74c3c;
	outline: none;
    border: 0;
    color: #fff;
	padding:10px 20px;
	text-transform:uppercase;
	margin-top:50px;
	border-radius:2px;
	cursor:pointer;
	position:relative;
}*/

.input-container input:focus ~ label,
.input-container input:valid ~ label{
	top:-12px;
	font-size:12px;
	
}
        table {
  border-collapse: collapse;
  border-radius: 1em;
  overflow: hidden;
  padding: 20px;
  width: 110%;
  text-indent: 20px;
  background-color: #f5f5f5;
}
th{
  height: 50px;
  width: 150px;
  background-color: #28a745;
  color: #fff;
}
tr:hover {background-color:#dbdbdb;}
      
      .back {
        margin:  20px;
        background-color: white !important;
        border-color: white !important;
      } 
        
    </style>
    <title>Products</title>
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
  <a class="back btn btn-primary" href="welcomefarmer.php" role="button"><img src="https://img.icons8.com/android/24/000000/back.png"/><span class="sr-only">(current)</span></a>
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
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/ffffff/user-male.png"> <?php echo " ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>
<div class="container">
<div class="container mt-4">
<h3><b>Currently available Products </b><img src="https://img.icons8.com/pastel-glyph/64/000000/box--v2.png"/></h3>
<hr>
</div>
<?php $results = mysqli_query($conn, "SELECT * from product");?>
<div class="table1">

<center><table class="table-striped" >
<thead>
    <tr>
    <th scope="col">Product id</th>
    <th scope="col" >Image</th>
    <th scope="col" >Name</th>
    <th scope="col" >Type</th>
    <th scope="col" >Quantity (in kgs)</th>
    <th scope="col" >Rate(per kg)</th>
    <th scope="col" >Rate(per kg)</th>

    </tr>
</thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($results)){

      $img = "../assets/".$row['prodname']."."."png";
      ?>
    <tr>
    <form method="POST" action="insert.php">
    <input name="proid" type="number" value="<?php echo $row['prodid'];?>" readonly required style="visibility:hidden;">
        <td ><?php echo $row['prodid'];?></td>
        <td><?php echo "<img src='{$img}' width='60%' height='30%'>";?></td>
        <td ><?php echo $row['prodname'];?></td>
        <td><?php echo $row['prodtype'];?></td>
        <td> <div class="input-container"><input type=number name=quantity ></td>
		    <td> <div class="input-container"><input type=number name=price ></div> </td>
        <td width="20%"><button type="submit" class="btn btn-success" name="add">Add to Shop</button></td>
    </form>
    </tr>
    <?php } ?>
    </tbody>
</table></center>
    
    <div class="row py-2 mt-3" style=" font-weight: 600;">
        <div class="col-lg-12 text-center">
          © 2024 Copyright <a href="#" style="text-decoration: none; color: inherit">KISAN PORTAL</a>
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