
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
function deleteItem(msg)
                    {
                        if (confirm(msg))
                            return true;
                        else
                            return false;
                    }
</script>

<div class="table_donor">
  <table border="3"  table width="100%">
          <thead>
            <tr bgcolor="#81BB6F" style="margin-bottom:10px;">
           
              <th>Name</th>
              <th>Email</th>
		
              <th>Blood Group</th>
			  <th>District</th>
              <th>Quantity</th>
              <th>Required Date </th>
              <th>Contact N0.</th>
               <th>Message</th>
              <th>Action</th>
            </tr>
          </thead>
                 <?php
				 
 $result = mysql_query("SELECT r.*,b.Name AS bgroup, di.name AS dinam FROM reqst_form r
LEFT JOIN bloodgroup b ON (b.Id=r.blood_group)
LEFT JOIN district di ON (di.id=r.living_district) ");

while($row = mysql_fetch_array($result))
  {
    echo '<tr>';
      echo '<td>'.$row['name'].'</td>';
      echo '<td>'.$row['email'].'</td>';
      echo '<td><div align="center">'.$row['bgroup'].'</div></td>';
	  echo '<td>'.$row['dinam'].'</td>';
      echo '<td>'.$row['quantity'].'</td>';
	  echo '<td><div align="center">'.$row['requir_date'].'</div></td>';
      echo '<td><div align="center">'.$row['contact_no'].'</div></td>';
	  echo '<td><div align="center">'.$row['message'].'</div></td>';
      echo '<td><div align="center">'.'<a href=request_list_edit.php?id='  . $row["id"] .'>edit</a>'.'|'.'<a onClick="return deleteItem(\'Are you sure want to delete?\');" href=request_delete.php?id=' . $row["id"] .'>del</a>'.' </div></td>';
    echo '</tr>';
  }
		
				
$result = mysql_query("SELECT r.*,b.Name AS bgroup, di.name AS dinam FROM reqst_form r
LEFT JOIN bloodgroup b ON (b.Id=r.blood_group)
LEFT JOIN district di ON (di.id=r.living_district) ");


				 
?>


   </div>   


</div>

</table>

   <?php include('footer.php');?>
   
          