<?php
include('connect.php');
include ('manue.php');
mysql_select_db("blood", $con);
$result= mysql_query("SELECT reg.*, b.Name As bgroup, di.name As diname FROM reg_form reg
LEFT JOIN bloodgroup b ON (b.Id=reg.b_group)
LEFT JOIN district di ON (di.id=reg.district)
");
echo "<table border='1',table width=100%>
<tr>
<th>Name</th>
<th>Email</th>
<th>Blood Group</th>
<th>Living District</th>
<th>Contact No</th>
</tr>";
while($row= mysql_fetch_array($result))
{
echo"<tr>";
echo"<td>".$row['nam']."</td>";
echo"<td>".$row['mail']."</td>";
echo"<td>".$row['bgroup']."</td>";
echo"<td>".$row['diname']."</td>";
echo"<td>".$row['con_num']."</td>";

echo "</tr>";
}
echo"</table>";
mysql_close($con);

?>
<?php include('footer.php');  ?>