<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donate blood,safe life</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<?php include('connect.php');  ?>

<body>
<div class="wrap">
<div class="banner_area fix">
<img src="image/Blood Donors Club, Bangladesh 2014-06-21 12-03-15.png" />
</div>
<div class="menu_area fix">
<div class="main_menu fix">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="show_donor.php">All Doners list</a></li>
<li><a href="#">Doners By Group</a>
<ul>

<?php 
			$query_string=mysql_query("select * from bloodgroup");
			?>
 

			<?php while($db_row=mysql_fetch_array($query_string) )
			
			{
				echo '<li><a href="grp_wise.php?bg='.$db_row['Id'].'">'.$db_row['Name'].'</a></li>';
				//echo '<option  value="'.$db_row['Id'].'" '.$be.' >'.$db_row['Name'].'</option>';
			}
			?>
		

</ul>

</li>
<li><a href="show_membar.php">All Members List</a></li>
<li><a href="#">About Blood</a></li>
<li><a href="blood_request.php">Request for Blood</a></li>
<li><a href="#">Contact us</a></li>
</ul>
</div>
</div>
