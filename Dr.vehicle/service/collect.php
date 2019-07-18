<!DOCTYPE html>
<?php
include('server.php');
if (!isset($_SESSION['sname'])) {
		header('location: login.php');
	}
if (!isset($_SESSION['oid'])) {
    header('location: index.php');
  }
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
 var total = 0;
    function test(item){
        if(item.checked){
           total+= parseFloat(item.value);
        }else{
           total-= parseFloat(item.value);
        }
        if(total>0){
        document.getElementById('inpt').value =total;
        document.getElementById('inpt1').value=total;
    }
    else{
      document.getElementById('inpt').value ="Amount To Be Collect";
       document.getElementById('inpt1').value="Amount To Be Collect";
    }
  }
    </script>
</head>
<body>
<ul class="topnav">
  <li><a  href="index.php">Home</a></li>
  <li><a href="cost.php">Cost</a></li>
  <li><a href="neworder.php">Yet to Complete</a></li>
  <li><a href="oldorder.php">Completed Orders</a></li>
  <li><a class="active" href="collect.php">Collect Amount</a></li>
  <li><a href="chpass.php">Change Password</a></li>
  <li class="right"><a href="index.php?logout='1'">Logout</a></li>
</ul>
<div class='form' >
<form id='login-form' action="collect.php" method='post'>
  <center><span class="head">Check Repairs</span></center><br></br> 
      <?php
            if($_SESSION['fm']==1)
            {
              $list=mysqli_query($db ,"select * from `amount` where type<>'Fuel'");
            while($row=mysqli_fetch_assoc($list)){
                   echo " <input type='checkbox' onClick='test(this);' name='".$row['type']."'value='".$row['amount']."'>".$row['type']."<br>";
               }
             } 
             else{
              $list=mysqli_query($db ,"select * from `amount` where type='Fuel'");
              $row=mysqli_fetch_assoc($list);
              $r=mysqli_fetch_assoc(mysqli_query($db ,"select * from `orders` where `id`='".$_SESSION['oid']."'"));
               echo "<input type='checkbox' onClick='test(this);' name='Fuel' value='".
                            $r['issue']*$row['amount']."'>Fuel<br>";
             }
               ?>
               <br>
            <input type="text" id='inpt1' placeholder="Amount To Be Collect" disabled><br><br>
            <input type="text" id='inpt' placeholder="Amount To Be Collect" name="camount" style="visibility:hidden">
  <center><button type='submit' name="collectamt">Collect</button>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
  <a class="square" href='collect.php'>Reset</a></center>
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
  width:300px;
  padding:48px;
  border:5px solid #464a92;
}
.form{
  padding:5%;
}
#inpt,#inpt1{
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
 input[type="checkbox"]{
  width: 15px; /*Desired width*/
  height: 15px; /*Desired height*/
}
</style>
</html>
