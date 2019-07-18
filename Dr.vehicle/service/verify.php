<?php
include('server.php');
if (!isset($_SESSION['email'])) {
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
  <input type='checkbox' id='form-switch'>
<form id='login-form' action="verify.php" method='post'>
  <center><span class="head">Verification</span></center><br>
  <span style="color:#464a92;">Email : <?php echo $_SESSION['email']; ?></span><br></br>
  <input type="password" placeholder="Verification Code" name="code"><br></br>
  <center><button type='submit' name="verify">Verify</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    <button type='submit' name="resend">Resend</button></center><br><br>
  <center><label for='form-switch'><span class="square">Change Email?</span></label></center>
  <center><?php include('errors.php'); ?></center>
</form>
<form id='register-form' action="verify.php" method='post'>
  <center><span class="head">Change Email</span></center><br>
  <input type="email" placeholder="Email" name="email" required><br></br>
  <center><label for='form-switch'><span class="square">Back</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button type='submit' name="chmail">Change</button></center><br></br>
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
button {
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
label {
  cursor:pointer;
}
.square{
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
#form-switch {
  display:none;
}
#register-form {
  display:none;
}
#form-switch:checked~#register-form {
  display:block;
}
#form-switch:checked~#login-form {
  display:none;
}

</style>
</html>
