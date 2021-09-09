<?php
include('connect.php');

if (isset($_GET['id']))
{
$m=$_GET['id'];
mysql_query("DELETE FROM donor_add WHERE id='$m'");
header ("location: donor_list.php");

}
?>

