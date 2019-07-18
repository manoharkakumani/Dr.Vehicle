<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
</head>
<body>
<div class='form' >
<form id='login-form' action="login.php" method='post'>
  <center><span class="head">Service Man Login</span></center><br>
  <input type="email" placeholder="Email" name="email">
  <input type="password" placeholder="Password" name="password"><br></br>
  <center><button type='submit' name="signin_user">Login</button>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="signup.php" class="square"> Sign up ?</a></center><br></br>
     <center><a class="square" href="forgot.php">Forgot Password ?</a></center><br></br>
       <center><a class="square" href="../index.php">Customer?</a></center><br></br>
	<center><?php include('errors.php'); ?></center>
</form>
</div>
</body>
<style>
.head{
    padding:5px;
	font-size:28px;
	color: #464a92;
	border:none;
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
