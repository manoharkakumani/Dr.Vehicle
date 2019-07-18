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
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="add.php">Add vehicle</a></li>
  <li><a href="delete.php">Delete vehicle</a></li>
  <li><a href="vehicle.php">My vehicles</a></li>
  <li><a href="neworder.php">New Orders</a></li>
  <li><a  href="cost.php">Cost</a></li>
  <li><a href="myorder.php">My Orders</a></li>
  <li><a href="serviceman.php">Service Man</a></li>
  <li><a href="chpass.php">Change Password</a></li>
  <li class="right"><a href="index.php?logout='1'">Logout</a></li>
   <li class="right"><a href="#contact">Contact Us</a></li>
</ul>
<div class='form'>
<form id='login-form' action="#" method='post'>
  <center><span class="head">YOUR DETAILS</span></center><br></br> 
  <center><span class="select">Name : <?php echo $_SESSION['name'];?></span></center><br></br>
  <center><span class="select">Email : <?php echo $_SESSION['email'];?></span></center><br></br> 
  <center><span class="select">Phone : <?php echo $_SESSION['phone'];?></span></center><br></br>			
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
  width:350px;
  padding:48px;
  border:5px solid #464a92;
}
.form{
	padding:5%;
}
.select{
  margin-bottom:3px;
  padding:0px;
  font-size:18px;
  width: 250px;
  color: #464a92;
}


</style>
</html>
