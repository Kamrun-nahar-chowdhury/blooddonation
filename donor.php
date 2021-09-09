<?php
	require_once('auth.php');
	include('connect.php');
	include('manue_admin.php');
?>


<?php
if(isset($_POST['Submit'])){

$name=$_POST['Name'];
$email=$_POST['Email'];
$picture=$_FILES['pic'];
$blood_group=$_POST['blood_group'];
$bd_district=$_POST['living_district'];
$donate_date=$_POST['donate_date'];
//$next_date=$_POST['next_date'];
$date=strtotime($donate_date);
$next_date=date('y-m-d', strtotime('3 months', $date));


$contact=$_POST['Contact'];


if($_FILES ['pic']['name'] != ""){
	$p=time().$_FILES['pic']['name'];
	$pc="uploade_pic/".$p;
	copy($_FILES['pic']['tmp_name'],$pc);
}




$sql=mysql_query("INSERT INTO donor_add (name, email, blood_group, living_district, donate_date, next_date, contact_no, pic)
VALUES ('$name', '$email', '$blood_group', '$bd_district', '$donate_date', '$next_date', '$contact', '$p')");

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

<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-ui.js" type="text/javascript"></script>



<script type="text/javascript">
 $().ready(function() {
        $(".cp_dt").datepicker({dateFormat: 'yy-mm-dd'});
    });
function validateForm()
{
	var Name	 = $('#Name').val();
	if(Name=='')
	{
		alert('Name is empty');
		return false;
		}
}
	function validateForm1(){
		var Email  =$('#Email').val();
	if(Email=='')
	{
		alert('Email is empty');
		return false;
		}
}
function validateForm2(){
		var donate_date  =$('#date').val();
	if(donate_date=='')
	{
		alert('Date is empty');
		return false;
		}
}
function validateForm3(){
		var Contact  =$('#contact').val();
	if(Contact=='')
	{
		alert('Contact is empty');
		return false;
		}
}

</script>

<div class="reg_form_area fix">
<div class="reg_form fix">
<h2>Donor's Add Area</h2>
<form action="donor.php" method="post" enctype="multipart/form-data" >
<div><label>Name</label>
<input type="text" name="Name" id="Name" value="" onBlur="validateForm()" /></div>
<div><label>Email</label>
<input type="text" name="Email" id="Email" value="" onBlur="validateForm1()" /></div>
<div><label>Upload Image</label>
<input type="file" name="pic" /></div>
<div><label>Blood group</label>
 
 
 
			<?php 
			$query_string=mysql_query("select * from bloodgroup");
			?>
 
 <select name="blood_group" id="blood_group">
			<option  value="0">selected</option>
			<?php while($db_row=mysql_fetch_array($query_string) )
			
			{
			echo '<option  value="'.$db_row['Id'].'">'.$db_row['Name'].'</option>';
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
				echo '<option  value="'.$db_row2['id'].'">'.$db_row2['name'].'</option>';
			}
			?>
			</select>


</div>
<div><label>Blood Donate Date</label>
<input type="input" name="donate_date"  id="date" value="" class="cp_dt" /></div>
<div><label>Contact No</label>
<input type="text" name="Contact" id="contact" value="" onBlur="validateForm3()"/></div>
<div class="reset fix float_right">
<input type="reset" name="reset" value="Reset" /></div>
<div class="sub fix float_right">
<input type="submit" name="Submit" value="Add" /></div>


</form>
</div>
</div>


<div class="footer_area fix">
<div class="footer_copyright fix">
<p align="center" >Copyright@2015</p>

</div>


</div>
</body>
</html>


