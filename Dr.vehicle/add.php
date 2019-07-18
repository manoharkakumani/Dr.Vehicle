<!DOCTYPE html>
<?php
include('server.php');
if (!isset($_SESSION['name'])) {
		header('location: login.php');
	}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<ul class="topnav">
  <li><a href="index.php">Home</a></li>
  <li><a class="active" href="add.php">Add vehicle</a></li>
  <li><a href="delete.php">Delete vehicle</a></li>
  <li><a href="vehicle.php">My vehicles</a></li>
  <li><a  href="cost.php">Cost</a></li>
  <li><a href="neworder.php">New Orders</a></li>
  <li><a href="myorder.php">My Orders</a></li>
  <li><a href="serviceman.php">Service Man</a></li>
  <li><a href="chpass.php">Change Password</a></li>
  <li class="right"><a href="index.php?logout='1'">Logout</a></li>
   <li class="right"><a href="#contact">Contact Us</a></li>
</ul>
<div class='form' >
<form action="add.php" method='post'>
  <center><span class="head">Add vehicle</span></center><br>
  <input type="text" placeholder="Enter RegNo" name="regno"><br><br>
  <input type="text" placeholder="Enter Type" name="type"><br><br>
  <input type="text" placeholder="Enter Model" name="model"><br><br>
  <center><button type='submit' name="addvehicle">ADD</center><br>
  <center><?php include('errors.php');?> </center>
</form>
</div>
</body>
<style>
.head{
   position:relative;
   text-decoration:none;
	padding:8px;
	font-size:25px;
	color: white;
	background:#464a92;
	border: none;
	border-radius:2px;
}
form{
  margin:0 auto;
  width:250px;
  padding:48px;
  border:5px solid #464a92;
}
.form{
	padding:5%;
}
input {
  margin-bottom:3px;
  padding:10px;
  width: 100%;
  border:1px solid #CCC;
  color: #464a92;
}
button,.square{
	position:relative;
   text-decoration:none;
	padding:8px;
	font-size:14px;
	color: white;
	background:#464a92;
	border: none;
	border-radius:2px;
	cursor:pointer;
 }


</style>
</html>
