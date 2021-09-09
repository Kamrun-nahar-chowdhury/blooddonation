<?php
	require_once('auth.php');
?>
<?php
include('connect.php'); 
?>

<?php
	include('manue_admin.php');
?>

<script type="text/javascript">
function deleteItem (msg)
{
	if(confirm (msg))
	return true;
	else
	return false;
}
</script>


<div class="table_donor">
  <table border="3"  table width="100%">
          <thead>
            <tr bgcolor="#3E84AE" style="margin-bottom:10px;">
              <th>Name</th>
              <th>Email</th>
              <th>Blood Group</th>
			  <th>Living District</th>
              <th>Contact Number</th>
              <th>Action</th>
            </tr>
          </thead>
          
                 <?php
		
		  $result = mysql_query("SELECT reg.*, b.Name as bgroup, di.name as diname FROM reg_form reg
LEFT JOIN bloodgroup b ON (b.Id=reg.b_group)
LEFT JOIN district di ON (di.id=reg.district)");

while($row = mysql_fetch_array($result))
  {
    echo '<tr>';
      echo '<td>'.$row['nam'].'</td>';
      echo '<td>'.$row['mail'].'</td>';
      echo '<td><div align="center">'.$row['bgroup'].'</div></td>';
	  echo '<td>'.$row['diname'].'</td>';
      echo '<td><div align="center">'.$row['con_num'].'</div></td>';
      echo '<td><div align="center">'.'<a href=member_list_edit.php?id=' . $row["id"] .'>edit</a>'.'|'.'<a onClick="return deleteItem(\'Are you sure want to delete?\');" href=membar_delete.php?id=' . $row["id"] .'>del</a>'.' </div></td>';
  echo '</tr>';
  }


?> 
   </table>
      <?php include('footer.php');?>