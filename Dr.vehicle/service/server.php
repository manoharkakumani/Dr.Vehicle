<?php 
	$name = "";
	$email    = "";
	$voteid="";
	$errors = array();
     $msg="Code was sent to your email ";
	 $db = mysqli_connect('localhost','root','', 'vehicledb');
if (session_id() == "")
  session_start();
	// REGISTER USER
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['sname']);
		unset($_SESSION['phone']);
		unset($_SESSION['email']);
		unset($_SESSION['id']);
		header("location: login.php");
	}
	if (isset($_POST['signup_user'])) {
		// receive all input values from the form
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$address= mysqli_real_escape_string($db, $_POST['address']);
		$fr=mysqli_real_escape_string($db, $_POST['fr']);
		if($fr=='Fuel'){
			$fr=0;
		}
		if($fr=='Repair'){
			$fr=1;
		}
		if ($fr=="m") {
			array_push($errors, "Please Select Your Work");
		}
		//form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "Name is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required");}
		if (empty($phone)) { array_push($errors, "Phone NO is required"); }
		if ($password_1 != $password_2) {
		array_push($errors, "Passwords didn't matched");
		}
		if ($name=='admin'){ array_push($errors, "Name is not allowed"); }
		elseif (mysqli_num_rows(mysqli_query($db,"SELECT * FROM service WHERE name='$name'")) == 1){array_push($errors, "Name is already in Use");}
		if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM service WHERE email='$email'")) == 1){array_push($errors, "Email is already in Use");}
		if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM service WHERE phone='$phone'")) == 1){array_push($errors, "Phone no is already in Use");}
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			 $rand=rand(999,9999);
             $from='@noreplay';
             $sub="ACCOUNT VERIFICATION";
             $meg="Your CODE IS :".$rand;
      //  mail($email,$from,$sub,$meg);
			$password = ($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO service (name, email, password,verify,code,phone,address) 
					  VALUES('$name', '$email', '$password','0','$rand','$phone','$address')";
			mysqli_query($db, $query);
			$_SESSION['email'] = $email;
			header('location: verify.php');
		}
	}	
//------------------------------------------------------------------------------------------------
	// LOGIN USER
	if (isset($_POST['signin_user'])) {
		$email=mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
        
		if (empty($email)){
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM service WHERE email='$email'AND password='$password'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
					 {
					 	$_SESSION['email'] = $row['email'];
					 	$op = $row['verify'];
						$op1 = $row['verify1'];
					 	if($op){      
							 if($op1)
						 {
							  $_SESSION['sname'] = $row['name'];
							  $_SESSION['id'] = $row['id'];
							  $_SESSION['phone'] = $row['phone'];
							  $_SESSION['fm'] = $row['fm'];
							  header('location: index.php');
						 }
						 else{
				              header('location: verify1.php'); 
						 }
				         }
						
						 else{
							 
							 header('location: verify.php'); 
						 }
						 
			}else {
				array_push($errors, "Wrong Email/Password combination");
			}
		}
	}
//------------------------------------------------------------------------------------------------------------
//verification of mail	
	if (isset($_POST['verify'])) {
		$email=$_SESSION['email'];
		$code= $_POST['code'];
		if (empty($code)) {
			array_push($errors, "CODE is required");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM `service` WHERE email='$email'AND code='$code'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
		          {				
				mysqli_query($db,"UPDATE `service` SET `verify`='1' WHERE email='$email'");
							 $_SESSION['sname'] = $row['name'];
							  $_SESSION['id'] = $row['id'];
							  $_SESSION['phone'] = $row['phone'];
							  $_SESSION['fm'] = $row['fm'];
				        header('location: index.php');
			}else {
				array_push($errors, "YOU ENTERED WRONG CODE");
			}
		}
	}	
if (isset($_POST['resend'])) {
		$email=$_SESSION['email'];        
		 $rand=rand(999,9999);
             $from='@noreplay';
             $sub="ACCOUNT VERIFICATION";
             $meg="Your CODE IS :".$rand;
        //mail($email,$from,$sub,$meg);	
			$query = "SELECT * FROM `service` WHERE email='$email'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
					 {
							  $_SESSION['email'] = $row['email'];
				mysqli_query($db,"UPDATE `service` SET `code`='$rand' WHERE email='$email'");
				    header('location: verify.php');
					}
	}

//--------------------------------------------------------------------
//change email
	if (isset($_POST['chmail'])) {
		$email=$_SESSION['email'];
		$email= mysqli_real_escape_string($db,$_POST['email']);
		if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM service WHERE email='$email'")) == 1){array_push($errors, "Email is already in Use");}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM `service` WHERE email='$email'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
				 {				
				     mysqli_query($db,"UPDATE `service` SET `email`='$email' WHERE email='$email'");
				        $_SESSION['email'] = $email;				
				        header('location: verify.php');
				        	}
		}
	}
	
//===========================================================================
// Change password
		if (isset($_POST['chpass'])) {
		$email= $_SESSION['email'];
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$password_3 = mysqli_real_escape_string($db, $_POST['password_3']);
		// form validation: ensure that the form is correctly filled
		if (empty($password_1)) { array_push($errors, "Current Password is required"); }
        if (empty($password_2)) { array_push($errors, "New Password is required"); }
		if ($password_2 != $password_3) {array_push($errors, "The two passwords didn't matched");}
		if (count($errors) == 0) {	
		         if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM service WHERE `email`='$email' AND `password`='$password_1'")) == 1)
					 {	
					 	mysqli_query($db,"UPDATE `service` SET `password`='$password_2'WHERE `email`='$email' AND `password`='$password_1'");
					 	$_SESSION['success']="Password is succesfully Changed";
                 header('location:index.php');
			       	}
	     else{
	     	array_push($errors, "Current Password is Wrong"); 
	     }
}
else
$_SESSION['success']="";
}

//=============================================================================
	//forgot password
		if (isset($_POST['forgotpass'])) {
		$email=mysqli_real_escape_string($db, $_POST['email']);  
		if (empty($email)) { array_push($errors, "Email is required"); }
		elseif (mysqli_num_rows(mysqli_query($db,"SELECT * FROM service WHERE email='$email'")) == 0){array_push($errors, "Email NOT FOUND ");}	
	if (count($errors) == 0) {	
		mysqli_query($db,"UPDATE `service` SET `verify1`='0' WHERE email='$email'");
		 $rand=rand(999,9999);
             $from='@noreplay';
             $sub="ACCOUNT VERIFICATION";
             $meg="Your CODE IS :".$rand;
           mail($email,$from,$sub,$meg);	
			$query = "SELECT * FROM service WHERE email='$email'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
					 {
				        $_SESSION['email'] = $row['email'];				
				mysqli_query($db,"UPDATE `service` SET `verify1`='0',`code`='$rand' WHERE email='$email'");
				    header('location: verify1.php');
					
					 }
				}
	}
//---------------------------------------------------------------
	if (isset($_POST['verify1'])) {
		$email=$_SESSION['email'];
		$code=$_POST['code'];
		if (empty($code)) {
			array_push($errors, "CODE is required");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM `service` WHERE email='$email'AND code='$code'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
				 {			
				mysqli_query($db,"UPDATE `service` SET `verify1`='1' WHERE `email`='$email'");
				 $_SESSION['email'] = $row['email'];
				 $_SESSION['code'] = $row['code'];
				  header('location: chpass1.php');
			}else {
				array_push($errors, "You Enterd Wrong Code");
			}
		}
	}
	
if (isset($_POST['resend1'])) {
		$email=$_SESSION['email'];
		$_SESSION['verify1']=1;        
		 $rand=rand(999,9999);
             $from='@noreplay';
             $sub="ACCOUNT VERIFICATION";
             $meg="Your CODE IS :".$rand;
       //mail($email,$from,$sub,$meg);	
			$query = "SELECT * FROM `service` WHERE email='$email'";
				$results = mysqli_query($db,$query);
				$row = mysqli_fetch_array($results);
		         if (mysqli_num_rows($results) == 1)
					 {
				  $_SESSION['email'] = $row['email'];				
				mysqli_query($db,"UPDATE `service` SET `code`='$rand' WHERE email='$email'");
				    header('location: verify1.php');
					}
	}

	//-----------------------------------------------------------------------------------------------------
	
	
	//  Forgot change password
		if (isset($_POST['chpass1'])) {
		$email= $_SESSION['email'];
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		// form validation: ensure that the form is correctly filled
		if (empty($password_1)) { array_push($errors, "NEW Password is required"); }
		if ($password_2 != $password_1) {array_push($errors, "The two passwords didn't matched");	}
		if (count($errors) == 0) {	
		         if (mysqli_num_rows(mysqli_query($db,"SELECT * FROM service WHERE `email`='$email'")) == 1)
					 {	
				unset($_SESSION['code']);
				 mysqli_query($db,"UPDATE `service` SET `password`='$password_1' WHERE `email`='$email' ");
                 header('location: login.php');
			       	}
}}
//=======================change amount====================
if (isset($_POST['changeamnt'])){
		$type= $_POST['type1'];
		$namount= $_POST['namount'];
		if ($type=="m") {
			array_push($errors, "Please Select Issue");
		}
		if (empty($namount)) { array_push($errors, "Amount is required"); }
		if (count($errors) == 0){
		   mysqli_query($db,"UPDATE `amount` SET `amount`='$namount' WHERE `type`='$type'");
		   header('location: amount.php');
					}
}
//======================collectamount================

if (isset($_GET['collect'])) {
	$_SESSION['oid']=$_GET['collect'];
		header("location: collect.php");
	}

if (isset($_POST['collectamt'])){
		$camount= $_POST['camount'];
		if (empty($camount)) { array_push($errors, "Amount is required"); }
		if (count($errors) == 0){
		   mysqli_query($db,"UPDATE `orders` SET `amount`='$camount',`status`='1' WHERE `id`='".$_SESSION['oid']."'");
		   mysqli_query($db,"UPDATE `service` SET `status`='0' WHERE `id`='".$_SESSION['id']."'");
		   unset($_SESSION['oid']);
		   header('location: user.php');
					}
}
/*------------------Delete--------------------------------*/
if (isset($_POST['delete'])) {
		$sman= $_POST['sman'];
		if ($sman=="m") {
			array_push($errors, "Please Select Service Man");
		}
		if (count($errors) == 0) {
			$uid=$_SESSION['id'];
				mysqli_query($db,"Delete from `service` Where `id`='$sman'");
				        header('location: delete.php');
					}
}

?>
