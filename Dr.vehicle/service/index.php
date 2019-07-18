<?php
include('server.php');
if ($_SESSION['sname']=="admin") {
		header('location: admin.php');
	}
else{
		header('location: user.php');
}
?>