<?php
	include('connect.php');
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	//unset($_SESSION['SESS_LAST_NAME']);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donate blood,safe life</title>
<link rel="stylesheet" href="css/style.css" type="text/css">

</head>

<body>
<div class="wrap" >
<div class="banner_area fix">
<img src="image/header.jpg" />
</div>


<div class="doner_area  fix">
<h1>Admin Login</h1>
<form method="post" action="main_login_exe.php">
<div class="email"><input type="text" name="username" placeholder="User name" /></div>
<div class="pass"><input type="password" name="password"  placeholder="*******" /></div>
<div class="submit_admin float_left fix"><input type="submit" name="login " value="Login" /></div>
<div class="reset_admin float_right fix"><input type="reset" name="reset " value="Reset" /></div>
</form>


<div class="forgot_pass">
<h4>Forgot Password</h4>
</div>




</div>
</div>


<div class="footer_area fix">
<div class="footer_copyright fix">
<p align="center" >Copyright@2015</p>
</div>

</div>





</div>
</body>
</html>
