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
</head><body>
<ul class="topnav">
  <li><a href="index.php">Home</a></li>
  <li><a href="add.php">Add vehicle</a></li>
  <li><a href="delete.php">Delete vehicle</a></li>
  <li><a href="vehicle.php">My vehicles</a></li>
  <li><a  href="cost.php">Cost</a></li>
  <li><a href="neworder.php">New Orders</a></li>
  <li><a href="myorder.php">My Orders</a></li>
  <li><a class="active"  href="serviceman.php">Service Man</a></li>
  <li><a href="chpass.php">Change Password</a></li>
  <li class="right"><a href="index.php?logout='1'">Logout</a></li>
   <li class="right"><a href="#contact">Contact Us</a></li>
</ul>
<div class='form'>
 <form action="#" method='post'>
<center><span class="head">Your Service Men Details</span></center><br></br> 
  <table>
  <tr>
    <th>Name</th>
    <th>Phone</th> 
    <th>Email</th>
    <th>Address</th>
  </tr>
             <?php
             $uid=$_SESSION['id'];
             $ls=mysqli_query($db ,"select * from `orders` where uid='$uid' AND status=0");
             while($r=mysqli_fetch_assoc($ls)){
             $sid=$r['sid'];
              $list=mysqli_query($db ,"select * from `service` where id='$sid'");
              while($row_list=mysqli_fetch_assoc($list)){                
                   echo " <tr><td>".$row_list['name']."</td><td>".$row_list['phone']."</td><td>".$row_list['email']."</td><td>".$row_list['address']."</td></tr>";
                }
              }
                ?>
         </table>
             <br></br>
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
  width:auto;
  padding:48px;
  border:5px solid #464a92;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color:#464a92;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
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
