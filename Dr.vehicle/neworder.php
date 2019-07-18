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
  <li><a href="add.php">Add vehicle</a></li>
  <li><a href="delete.php">Delete vehicle</a></li>
  <li><a href="vehicle.php">My vehicles</a></li>
  <li><a  href="cost.php">Cost</a></li>
  <li><a class="active" href="neworder.php">New Orders</a></li>
  <li><a href="myorder.php">My Orders</a></li>
  <li><a  href="serviceman.php">Service Man</a></li>
  <li><a href="chpass.php">Change Password</a></li>
  <li class="right"><a href="index.php?logout='1'">Logout</a></li>
   <li class="right"><a href="#contact">Contact Us</a></li>
</ul>
<div class='form'>
<form id='login-form' action="neworder.php" method='post'>
  <center><span class="head">New Order</span></center><br></br> 
      <select name="vehicle">
            <option value="m">--- Select vehicle ---</option>
            <?php
            $uid=$_SESSION['id'];
            $list=mysqli_query($db ,"select * from `vehicle` where `uid`=$uid");
            while($row_list=mysqli_fetch_assoc($list)){
                
                   echo" <option value='".$row_list['regno']."'>".$row_list['regno']." - ".$row_list['type']."
                    </option>";
                }
                ?>
            </select><br></br>
             <select name="fr">
            <option value='Fuel'>Fuel</option>
            <option value='Repair'>Repair</option>
            </select><br></br>
            <input type="text" placeholder="Describe issue/ Fule in Lts" name="issue"><br><br>
            <input type="text" placeholder="Address" name="address"><br><br>
  <center><button type='submit' name="order">Order</button>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
  <a class="square" href='neworder.php'>Reset</a></center><br></br>
  <center><?php include('errors.php'); ?></center>
  </form>
  </div>
</body>
<style>
.head{
   position:relative;
   text-decoration:none;
  padding:5px;
  font-size:20px;
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
  padding:2%;
}
select{
  margin-bottom:3px;
  padding:5px;
  font-size:15px;
  width: 250px;
  border:1px solid #CCC;
  color: #464a92;
}
button,.square{
  position:relative;
   text-decoration:none;
  padding:5px;
  font-size:14px;
  color: white;
  background:#464a92;
  border: none;
  border-radius:2px;
  cursor:pointer;
 }
input {
  margin-bottom:2px;
  padding:5px;
  width: 100%;
  border:1px solid #CCC;
  color: #464a92;
}

</style>
</html>
