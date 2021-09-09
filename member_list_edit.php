<?php
require_once('auth.php');
include('connect.php');
mysql_select_db("blood", $con);
if(isset($_GET['id'])){
	
	
	$member_id=$_GET['id'];
	
	$result=mysql_query("select * from reg_form WHERE id= $member_id");
	
	$row=mysql_fetch_array($result);
	
	
	             $id=$row["id"];
				 $name=$row["nam"];
				 $email=$row["mail"];
				 $blood_group=$row["b_group"];
				 $district=$row["district"];
				 $con=$row["con_num"];
}
if (isset($_POST['Submit']))
{
$nam=$_POST['Name'];
$mail=$_POST['Email'];
$bl_group=$_POST['blood_group'];
$bd_district=$_POST['living_district'];
$contact=$_POST['Contact'];

$query_string="UPDATE reg_form SET nam='".$nam."', mail='".$mail."', b_group='".$bl_group."', district='".$bd_district."', con_num='".$contact."' 
WHERE id='".$_GET['id']."';";

mysql_query($query_string);

header("location: member_list.php");

}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>

<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>



<div class="wrap">
<div class="banner_area fix">
<img src="image/Blood Donors Club, Bangladesh 2014-06-21 12-03-15.png" />
</div>
<div class="menu_area fix">
<div class="main_menu fix">
<ul>
<li><a href="donor_list.php">Home</a></li>
<li><a href="donor_list.php" >All Doners list</a></li>
<li><a href="#">Doners By Group</a></li>
<li><a href="member_list.php">All Members List</a></li>
<li><a href="#">About Blood</a></li>
<li><a href="#">Request for Blood</a></li>
<li><a href="index.php">Logout</a></li>
</ul>
</div>
</div>
<div class="reg_form_area fix">
<div class="reg_form fix">
<h2>Member's Edit Area</h2>

<form action="member_list_edit.php?id=<?=$_GET['id']?>" method="post">
<div><label>Name</label>
<input type="text" name="Name" id="Name" value="<?php echo $name; ?>" /></div>

<div><label>Email</label>
<input type="text" name="Email" id="Email" value="<?php echo $email; ?>" /> </div>

<div><label>Blood group</label>
<?php 
			$query_string=mysql_query("select * from bloodgroup");
			?>
 
 <select name="blood_group" id="blood_group">
			<option  value="0">selected</option>
			<?php while($db_row=mysql_fetch_array($query_string) )
			
			{
				if($db_row['Id']==$blood_group) {$be=' selected="selected" ';} else{$be=' ';}
				echo '<option  value="'.$db_row['Id'].'" '.$be.' >'.$db_row['Name'].'</option>';
			}
			?>
			</select>
</div>
<div><label>Living District</label>
<?php 
			$query_string2=mysql_query("select * from district");
			?>
 
 <select name="living_district" id="living_district">
			<option  value="0">selected</option>
			<?php while($db_row2=mysql_fetch_array($query_string2) )
			
			{
				if($db_row2['id']==$district) {$se=' selected="selected" ';} else{$se=' ';}
				echo '<option  value="'.$db_row2['id'].'" '.$se.' >'.$db_row2['name'].'</option>';
			}
			?>
			</select>
</div>

<div><label>Contact No</label>
<input name="Contact" id="Contact"  value="<?php echo $con; ?>"/></div>

<div class="submit_reg fix float_right">
<input type="submit" name="Submit" value="Save" /></div>
<div class="reset_reg fix float_left">
<input type="reset" name="reset" value="Reset" /></div>


</form>
</div>
</div>
<?php  mysql_close($con);?>