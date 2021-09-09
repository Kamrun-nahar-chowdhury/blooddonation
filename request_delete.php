<?php 
include('connect.php');

if (isset($_GET['id']));
{
$m=$_GET['id'];

mysql_query("DELETE from reqst_form where id='$m'");
header ("location: request_list.php");
}

?>