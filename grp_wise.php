<?php

include('connect.php');
include('manue_admin.php');
mysql_select_db("blood", $con);
$result= mysql_query("SELECT d.*,b.Name AS bgroup, di.name AS dinam FROM donor_add d
LEFT JOIN bloodgroup b ON (b.Id=d.blood_group)
LEFT JOIN district di ON (di.id=d.living_district)
where d.blood_group=".$_GET['bg']
);



echo "<table border='1' class='table_donor'>

<tr>
<th>Name</th>
<th>Email</th>
<th>Blood_Group</th>
<th>Living_Group</th>
<th>Donate_Date</th>
<th>Next_Donate_Date</th>
<th>Contact_No</th>
<th>Image</th>
</tr>";
while($row= mysql_fetch_array($result))
{
echo"<tr>";
echo"<td>".$row['name']."</td>";
echo"<td>".$row['email']."</td>";
echo"<td>".$row['bgroup']."</td>";
echo"<td>".$row['name']."</td>";
echo"<td>".$row['donate_date']."</td>";
echo"<td>".$row['next_date']."</td>";
echo"<td>".$row['contact_no']."</td>";
echo"<td>";?> <img src="uploade_pic/<?php echo $row['pic'];?>" height="50" width="50" /> <?php echo
"</td>";
echo "</tr>";
}
echo"</table>";
mysql_close($con);

?>



