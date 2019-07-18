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
<form id='login-form' action="forgot.php" method='post'>
  <center><span class="head">Email</span></center><br></br> 
  <input type="email" placeholder="Email" name="email"><br></br>
  <center><button type='submit' name="forgotpass">Find</button>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
  <a class="square" href='login.php'>Back</a></center><br></br>
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
button,.square{
	position:relative;
   text-decoration:none;
	padding:8px;
	font-size:15px;
	color: white;
	background:#464a92;
	border: none;
	border-radius:2px;
	cursor:pointer;
 }

</style>
</html>
