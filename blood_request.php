<?php
	include('manue.php');
	
?>
<?php
if(isset($_POST['Submit'])){
$name=$_POST['Name'];
$email=$_POST['Email'];
$b_group=$_POST['blood_group'];
$district=$_POST['living_district'];
$quantity=$_POST['bag'];
$requir_date=$_POST['req_date'];
$contact_no=$_POST['Contact'];
$message=$_POST['sms'];

$sql=mysql_query("INSERT INTO reqst_form (name, email, blood_group, living_district, quantity, requir_date, contact_no, message) 
VALUES ('$name', '$email', '$b_group', '$district', '$quantity', '$requir_date', '$contact_no', '$message')");
}
?>


<body>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
$().ready(function() {
        $(".cp_dt").datepicker({dateFormat: 'yy-mm-dd'});
    });

</script>
<div class="reg_form_area fix">
<div class="reg_form fix">
<h2>Request for Blood</h2>

<form action="blood_request.php" method="post" >
<div><label>Name<span style="color:red;">&lowast;</span></label>
<input type="text" name="Name" id="Name" value="" onBlur="validateForm()" /></div>
<div><label>Email<span style="color:red;">&lowast;</span></label>
<input type="text" name="Email" id="Email" value="" onBlur="validateForm1()"/></div>
<div><label>Blood group<span style="color:red;">&lowast;</span></label>
<?php 
$query_string=mysql_query("select * from bloodgroup");
?>
<select name="blood_group" id="blood_group">
<option value="0">Selected</option>
<?php 
while ($db_row=mysql_fetch_array($query_string))
{
	echo '<option value="'.$db_row['Id'].'">'.$db_row['Name'].'</option>';
}
?>
</select>
</div>
<div><label>Living District<span style="color:red;">&lowast;</span></label>
<?php
$query_string1=mysql_query("select * from district");
?>
<select name="living_district" id="living_district">
<option value="0">Selected</option>
<?php
while($db_row1=mysql_fetch_array($query_string1))
{
	echo'<option value="'.$db_row1['id'].'">'.$db_row1['name'].'</option>';
}
?>
</select>
</div>
<div> <label>Quantity</label>
<input type="input" name="bag" id="bag" value="" >
</div>
<div> <label>Required Date</label>
<input type="input" name="req_date"  id="date" value="" class="cp_dt" /></div>
<div><label>Contact No</label>
<input type="text" name="Contact" id="contact" value="" onBlur="validateForm2()"/></div>
<div><label> Message </label>
<textarea cols="30" rows="4" name="sms" id="sms"></textarea>
</div>
<div class="submit_req fix float_right">
<input type="submit" name="Submit" value="Submit Request" /></div>
<div class="reset_req fix float_left">
<input type="reset" name="reset" value="Clear All" /></div>
</form>
</div>
</div>

<?php include('footer.php');  ?>

