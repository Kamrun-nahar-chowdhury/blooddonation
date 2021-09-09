<?php
include('connect.php');

if (isset($_GET['id']))
{
$n=$_GET['id'];
mysql_query("DELETE FROM reg_form WHERE id='$n'");
header ("location: member_list.php");

}
?>

