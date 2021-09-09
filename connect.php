<?php
//Connect to mysql server
	$con = mysql_connect('localhost','root',"");
	if(!$con) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db("blood", $con);
	if(!$db) {
		die("Unable to select database");
	}
    ?>