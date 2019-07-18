<!DOCTYPE html>
<?php
include('server.php');
if (!isset($_SESSION['sname'])) {
		header('location: login.php');
	}
if ($_SESSION['sname']!="admin") {
		header('location: index.php');
	}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<ul class="topnav">
  <li><a href="index.php">Service Men</a></li>
  <li><a href="delete.php">Delete Men</a></li>
  <li><a href="work.php">Working Men</a></li>
  <li><a href="nowork.php">Free Men</a></li>
  <li><a href="Completed.php">Completed Orders</a></li>
  <li><a href="yettocomplete.php">Yet To Complete</a></li>
  <li><a href="customer.php">Customers</a></li>
  <li><a class="active" href="amount.php">Change Amount</a></li>
 <li><a href="chpass.php">Change Password</a></li>
  <li class="right"><a href="index.php?logout='1'">Logout</a></li>
</ul>
<div class='form' >
<form id='login-form' action="amount.php" method='post'>
  <center><span class="head">Change Amount</span></center><br></br> 
      <select name="type1">
            <option value="m">--- Select Issue---</option>
            <?php
            $uid=$_SESSION['id'];
            $list=mysqli_query($db ,"select * from `amount`");
            while($row_list=mysqli_fetch_assoc($list)){
                   echo" <option value='".$row_list['type']."'>".$row_list['type']." - Rs: ".$row_list['amount']."
                    </option>";
                }
                ?>
            </select>
            <br><br>
            <input type="text" placeholder="New Amount" name="namount"><br><br>
  <center><button type='submit' name="changeamnt">Change</button>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
  <a class="square" href='amount.php'>Reset</a></center><br></br>
  <center><?php include('errors.php'); ?></center>
  </form>
  </div>
</body>
<style>
.head{
   position:relative;
   text-decoration:none;
  padding:10px;
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
  padding:5%;
}
select{
  margin-bottom:5px;
  padding:10px;
  font-size:18px;
  width: 263px;
  border:1px solid #CCC;
  color: #464a92;
}
button,.square{
  position:relative;
   text-decoration:none;
  padding:5px;
  font-size:18px;
  color: white;
  background:#464a92;
  border: none;
  border-radius:2px;
  cursor:pointer;
 }
input {
  margin-bottom:2px;
  padding:10px;
  width: 250px;
  border:1px solid #CCC;
  color: #464a92;
}


</style>
</html>
