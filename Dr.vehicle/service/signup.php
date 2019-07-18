<?php
include('server.php');
if (isset($_SESSION['name'])) {
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
</head>
<body>
<div class='form'>
<form id='register-form' action="signup.php" method='post'>
  <center><span class="head">Service Men SignUp</span></center><br>
  <input type="text" placeholder="Name" name="name" required>
  <input type="email" placeholder="Email" name="email" required>
  <input type="text" placeholder="Phone NO" name="phone" required>
  <input type="text" placeholder="Address" name="address" required>
  <select name="fr">
            <option value='m'>Your Work</option>
            <option value='Fuel'>FuelBoy</option>
            <option value='Repair'>Mechanic</option>
            </select>
  <input type="password" placeholder="Password" name="password_1" required>
  <input type="password" placeholder="Re Password" name="password_2" required><br></br>
  <center><button type='submit' name="signup_user">Register</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php" class="square"> LogIn?</a></center><br></br>
 <center><?php include('errors.php'); ?></center>
</form>
</div>
</body>
<style>
.head{
    padding:5px;
	font-size:28px;
	color: #464a92;
	border: none;
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
  width: 200px;
  border:1px solid #CCC;
  color: #464a92;
}
select{
  margin-bottom:3px;
  padding:10px;
  width: 223px;
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
