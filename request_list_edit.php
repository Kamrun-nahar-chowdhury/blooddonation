<?php
require_once('auth.php');
include('connect.php');
mysql_select_db("blood",$con);
if(isset($_GET['id'])){

$member_id=$_GET['id'];

$result=mysql_query("select * from reqst_form where id = $member_id");

$row=mysql_fetch_array($result);


                        $id=$row["id"];
						$name=$row["name"];
						$mail=$row["email"];
						$bd_g=$row["blood_group"];
						$living_d=$row["living_district"];
						$quan=$row["quantity"];
						$requir_d=$row["requir_date"];
						$con=$row["contact_no"];
					
						}
						
if (isset($_POST['Submit'])){
	
$name=$_POST['Name'];
$email=$_POST['Email'];
$blood_group=$_POST['Blood_group'];
$bd_district=$_POST['Living_district'];
$quant=$_POST['Quantity'];
$requir_date=$_POST['Req_date'];
$contact=$_POST['Contact'];


$query_string="UPDATE reqst_form SET name='".$name."', email='".$email."', blood_group='".$blood_group."', living_district='".$bd_district."', quantity='".$quant."', requir_date='".$requir_date."', contact_no='".$contact."' where id='".$_GET['id']."';";

mysql_query($query_string);
header("location: request_list.php");	
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
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-ui.js" type="text/javascript"></script>

<script type="text/javascript">
 $().ready(function() {
        $(".cp_dt").datepicker({dateFormat: 'yy-mm-dd'});
    });</script>
    

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
<h2>Request's Edit Area</h2>

<form action="request_list_edit.php?id=<?=$_GET['id']?>" method="post">
<div><label>Name</label>
<input name="Name" type="text" value="<?php echo $name; ?>" />
</div>

<div><label>Email</label>

<input  name="Email" id="Email" type="text" value="<?php echo $mail; ?>" />

</div>
<div><label>Blood group</label>
<?php 
			$query_string=mysql_query("select * from bloodgroup");
			?>
 
 <select name="Blood_group" id="blood_group">
			<option  value="0">selected</option>
			<?php while($db_row=mysql_fetch_array($query_string) )
			
			{
				if($db_row['Id']==$bd_g) {$be=' selected="selected" ';} 
				else{$be=' ';}
				echo '<option  value="'.$db_row['Id'].'" '.$be.' >'.$db_row['Name'].'</option>';
			}
			?>
			</select>
</div>
<div><label>Living District</label>
<?php 
			$query_string2=mysql_query("select * from district");
			?>
 
 <select name="Living_district" id="living_district">
			<option  value="0">selected</option>
			<?php while($db_row2=mysql_fetch_array($query_string2) )
			
			{
				if($db_row2['id']==$living_d) {$se=' selected="selected" ';} 
				else{$se=' ';}
				echo '<option  value="'.$db_row2['id'].'" '.$se.' >'.$db_row2['name'].'</option>';
			}
			?>
			</select>
</div>

<div><label>Quantity</label>

<input name="Quantity" id="Quantity" value="<?php echo $quan; ?>"  /></div>

<div><label>Required date</label>

<input name="Req_date" id="Req_date" type="date" value="<?php echo $requir_d; ?>" class="cp_dt"/></div>

<div><label>Contact No</label>
<input name="Contact" id="Contact" value="<?php echo $con; ?>" />
</div>

<div class="submit_req fix float_right">
<input type="submit" name="Submit" value="Save" /></div>
<div class="reset_req fix float_left">
<input type="reset" name="reset" value="Reset" /></div>
</form>
</div>
</div>


<div class="footer_area fix">
<div class="footer_left fix">
<h2>Contact us</h2>
</div>
<div class="footer_right fix"></div>
</div>
</div>
</body>
</html>
















</head>

<body>
</body>
</html>