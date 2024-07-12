<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
//Check the connection
if($conn == false)
{
    die('Error: Cannot connect');
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS kisan_portal";
if (mysqli_query($conn, $sql)) 
{
  //echo "Database created successfully";
} 
else 
{
  echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);


//connecting again
define('DB_NAME', 'kisan_portal');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//Check the connection
if($conn == false){
    die('Error: Cannot connect');
}


$sql1 = "CREATE TABLE IF NOT EXISTS farmer (
  farmerid int(11) NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  name varchar(100) NOT NULL,
  address varchar(100) NOT NULL,
  mobile text NOT NULL,
  gender text NOT NULL,
  -- created_at datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (farmerid)
)";
if (!mysqli_query($conn, $sql1)) 
{
  echo "Error creating table farmer: " . mysqli_error($conn);
}


$sql2 = "CREATE TABLE IF NOT EXISTS product (
  prodid int(11) NOT NULL AUTO_INCREMENT primary key,
  prodname varchar(50) NOT NULL,
  prodtype varchar(70) NOT NULL
)";
if(!mysqli_query($conn, $sql2)) 
{
  echo "Error creating table product: " . mysqli_error($conn);
}


$sql3 = "CREATE TABLE IF NOT EXISTS users (
  userid int(11) NOT NULL AUTO_INCREMENT primary key,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  name varchar(100) NOT NULL,
  address varchar(100) NOT NULL,
  mobile text NOT NULL,
  gender text NOT NULL,
  created_at datetime NOT NULL DEFAULT current_timestamp()
)";
if (!mysqli_query($conn, $sql3)) 
{
  echo "Error creating table users: " . mysqli_error($conn);
}

$sql4 = "CREATE TABLE IF NOT EXISTS myshop (
  prodid int(11),
  farmerid int(11),
  quantity varchar(10) NOT NULL,
  price varchar(10) NOT NULL,
  foreign key(prodid) references product(prodid),
  foreign key(farmerid) references farmer(farmerid),
  CONSTRAINT myshopid PRIMARY KEY (prodid, farmerid)
)";
if (!mysqli_query($conn, $sql4)) 
{
  echo "Error creating table myshop: " . mysqli_error($conn);
}


$sql6 = "CREATE TABLE IF NOT EXISTS cart (
  userid int(11),
  prodid int(11),
  farmerid int(11) ,
  cart_quantity int(11) NOT NULL,
  flag boolean not null default 1,
  foreign key(prodid, farmerid) references myshop(prodid, farmerid),
  foreign key(userid) references users(userid),
  CONSTRAINT cartid PRIMARY KEY (prodid, farmerid, userid)
  -- primary key(prodid, farmerid, userid) as cartid
)";
if (!mysqli_query($conn, $sql6)) 
{
  echo "Error creating table cart: " . mysqli_error($conn);
}


$sql7 = "CREATE TABLE IF NOT EXISTS myorder(
	orderid int(11) not null,
	userid int(11),
	prodid int(11),
	farmerid int(11),
  amount int(11),
	status int(11) not null DEFAULT 0,
  quantity int(11),
  orderdate datetime default now(),
	foreign key(prodid, farmerid, userid) references cart(prodid, farmerid, userid),
	primary key(orderid, prodid, farmerid, userid)
)";
if (!mysqli_query($conn, $sql7)) 
{
  echo "Error creating table order: " . mysqli_error($conn);
}


$sql8 = "INSERT IGNORE INTO product (prodid, prodname, prodtype) VALUES
(1, 'Potato', 'Vegetable'),
(2, 'Tomato', 'Vegetable'),
(3, 'Onion', 'Vegetable'),
(4, 'Carrot', 'Vegetable'),
(5, 'Capsicum', 'Vegetable'),
(6, 'Spinach', 'Vegetable'),
(7, 'Apple', 'Fruit'),
(8, 'Orange', 'Fruit'),
(9, 'Banana', 'Fruit'),
(10, 'Wheat', 'Cereal'),
(11, 'Rice', 'Cereal'),
(12, 'Maize', 'Cereal')";
if (!mysqli_query($conn, $sql8)) 
{
  echo "Error inserting in table product: " . mysqli_error($conn);
}

//200 - 10%, 300-15$, 500-20%
$sql9 = "CREATE TABLE IF NOT EXISTS coupon(
  couponcode VARCHAR(20),
  discount int(11) not null,
  pricelimit int(11) not null,
  primary key(couponcode)
)";
if (!mysqli_query($conn, $sql9)) 
{
  echo "Error creating table order: " . mysqli_error($conn);
}


$sql10 = "INSERT IGNORE INTO coupon (couponcode, discount, pricelimit) VALUES
('KRISHI200', 10, 200),
('KRISHI300', 15, 300),
('KRISHI500', 20, 500)";
if (!mysqli_query($conn, $sql10)) 
{
  echo "Error inserting in table product: " . mysqli_error($conn);
}


$sql11 = "CREATE TABLE IF NOT EXISTS feedback (
  
  name varchar(20) NOT NULL,
  email varchar(30) NOT NULL,
  message varchar(500) NOT NULL)";
if (!mysqli_query($conn, $sql11)) 
{
  echo "Error creating table feedback: " . mysqli_error($conn);
}

?>