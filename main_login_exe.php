<?php
include('connect.php'); 

//Start session
	session_start();
	
	
		//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	
	
	// Generate Guid 
	$login = clean($_POST['username']);
	$password = clean($_POST['password']);
	
	
	
	//Create query
	$qry="SELECT * FROM user WHERE user='$login' AND pass='$password'";
	$result=mysql_query($qry);
	
		//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['pass'];
			session_write_close();
			header("location: donor.php");
			exit();
		}else {
			//Login failed
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>
