<?php
require_once('auth.php');
include('connect.php');
mysql_select_db("blood", $con);
if (isset($_GET['id'])){



$member_id = $_GET['id'];
$result = mysql_query("SELECT * FROM donor_add WHERE id = $member_id");
						
$row = mysql_fetch_array($result);

						$id=$row["id"];
						$name=$row["name"];
						$mail=$row["email"];
						$pic=$row["pic"];
						$bd_g=$row["blood_group"];
						$living_d=$row["living_district"];
						$picture=$row["pic"];
						$dn_date=$row["donate_date"];
						$next_d=$row["next_date"];
						$contact=$row["contact_no"];
						
						}

if(isset($_POST['Submit']))	
{
$name=$_POST['Name'];
$email=$_POST['Email'];
$picture=$_FILES['pic'];
$blood_group=$_POST['blood_group'];
$bd_district=$_POST['living_district'];
$donate_date=$_POST['donate_date'];

$date=strtotime($donate_date);
$next_date=date('y-m-d', strtotime('3 months', $date));

//echo $next_date ;
$contact=$_POST['Contact'];


if($_FILES ['pic']['name'] != ""){
	$p=time().$_FILES['pic']['name'];
	$pc="uploade_pic/".$p;
	copy($_FILES['pic']['tmp_name'],$pc);
}
else{
	$p=$_POST['pic1'];
	}


$query_string="UPDATE donor_add SET name='".$name."',email='".$email."',blood_group='".$blood_group."',living_district='".$bd_district."',
				donate_date='".$donate_date."',next_date='".$next_date."',contact_no='".$contact."',pic='".$p."'
 WHERE id='".$_GET['id']."';";
mysql_query($query_string);


header ("location: donor_list.php");

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
<li><a href="#">Home</a></li>
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
<h2>Donor's Edit Area</h2>

<form action="donor_list_edit.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
<div><label>Name</label>
<input name="Name" type="text" value="<?php echo $name; ?>" />
</div>

<div><label>Email</label>

<input  name="Email" id="Email"" type="text" value="<?php echo $mail; ?>" /></div>
<div><label>Upload Image</label>

<img src="uploade_pic/<?php echo $row['pic'];?>"   height="50" width="50"/>
<input name="pic" type="file"" />
<input type="hidden" name="pic1" value="<?php echo $picture; ?>" />
</div>
<div><label>Blood group</label>
<?php 
			$query_string=mysql_query("select * from bloodgroup");
			?>
 
 <select name="blood_group" id="blood_group">
			<option  value="0">selected</option>
			<?php while($db_row=mysql_fetch_array($query_string) )
			
			{
				if($db_row['Id']==$bd_g) {$be=' selected="selected" ';} else{$be=' ';}
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
				if($db_row2['id']==$living_d) {$se=' selected="selected" ';} else{$se=' ';}
				echo '<option  value="'.$db_row2['id'].'" '.$se.' >'.$db_row2['name'].'</option>';
			}
			?>
			</select>


</div>
<div><label>Blood Donate Date</label>


<input type="date" name="donate_date"  id="date" value="<?php echo $dn_date; ?>" class="cp_dt" /></div>
<div><label>Contact No</label>
<input type="text" name="Contact" id="contact" value="<?php echo $contact; ?>" />
</div>
<div class="reset fix float_right">
<input type="reset" name="reset" value="Reset" /></div>
<div class="sub fix float_right">
<input type="submit" name="Submit" value="save" /></div>

</form>
</div>
</div>


<div class="footer_area fix ">
<div class="footer_left fix ">
<h3>Contact us</h3>
</div>
<div class="footer_right fix"></div>
</div>

</div>
</body>
</html>


<?php  mysql_close($con);?>