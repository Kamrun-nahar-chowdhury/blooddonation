<?php
include('connect.php'); 

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="css/style.css" type="text/css" />

</head>
<body>
<div class="wrap">


<div class="banner_area fix">
<img src="image/header.jpg" />
</div>
<div class="menu_area fix">
<div class="main_menu fix">
<ul>
<li><a href="donor.php">Home</a></li>
<li><a href="donor_list.php">All Doners list</a></li>
		<li><a href="#">Doners By Group</a>
			<ul>
			<?php 
				$query_string=mysql_query("select * from bloodgroup");
				while($db_row=mysql_fetch_array($query_string))			
					{
						echo '<li><a href="grp_wise.php?bg='.$db_row['Id'].'">'.$db_row['Name'].'</a></li>';	
					}
			?>
			</ul>
		</li>
<li><a href="member_list.php">All Members List</a></li>
<li><a href="about.php">About Blood</a></li>
<li><a href="request_list.php">Request for Blood</a></li>
<li><a href="index.php">Log out</a></li>
</ul>
</div>
</div>


</div>
</body>
</html>
