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
 <li><a class="active" href="delete.php">Delete Men</a></li>
  <li><a  href="work.php">Working Men</a></li>
  <li><a href="nowork.php">Free Men</a></li>
  <li><a href="Completed.php">Completed Orders</a></li>
  <li><a href="yettocomplete.php">Yet To Complete</a></li>
  <li><a href="customer.php">Customers</a></li>
  <li><a href="amount.php">Change Amount</a></li>
 <li><a href="chpass.php">Change Password</a></li>
  <li class="right"><a href="index.php?logout='1'">Logout</a></li>
</ul>
<div class='form'>
<form id='login-form' action="delete.php" method='post'>
  <center><span class="head">Delete Service Men</span></center><br></br> 
			<select name="sman">
            <option value="m">--- Select ServiceMan ---</option>
            <?php
            $list=mysqli_query($db ,"select * from `service`");
            while($row_list=mysqli_fetch_assoc($list)){
              if($row_list['name']!='admin')
                   echo" <option value='".$row_list['id']."'>".$row_list['id']."→".$row_list['name']."
                    </option>";
                }
                ?>
            </select><br></br>
  <center><button type='submit' name="delete">Delete</button>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
  <a class="square" href='delete.php'>Reset</a></center><br></br>
	<center><?php include('errors.php'); ?></center>
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
select{
  margin-bottom:3px;
  padding:10px;
  font-size:18px;
  width: 250px;
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
