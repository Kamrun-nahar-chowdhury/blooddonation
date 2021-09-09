
<?php
	require_once('auth.php');
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
<a href="donor.php"><img src="image/add.png" class="back" alt="back" border="0" /></a>
  <table border="3"  table width="100%" bgcolor="#82C0FF">
          <thead>
            <tr bgcolor="#81BB6F" style="margin-bottom:10px;">
           
              <th>Name</th>
              <th>Email</th>
			  <th>Image</th>
              <th>Blood Group</th>
			  <th>District</th>
              <th>Donate Date</th>
              <th>Next Donate Date </th>
              <th>Contact N0.</th>
              <th>Action</th>
            </tr>
          </thead>
      
         
          
          
     
              <?php
			  
	
		
		  $result = mysql_query("SELECT d.*,b.Name AS bgroup, di.name AS dinam FROM donor_add d
LEFT JOIN bloodgroup b ON (b.Id=d.blood_group)
LEFT JOIN district di ON (di.id=d.living_district) limit $page1,8");

while($row = mysql_fetch_array($result))
  {
    echo '<tr>';
      echo '<td>'.$row['name'].'</td>';
      echo '<td>'.$row['email'].'</td>';
	  echo '<td><div align="center"><img src="uploade_pic/'.$row['pic'].'" height="50" width="50" /></div></td>';
      echo '<td><div align="center">'.$row['bgroup'].'</div></td>';
	  echo '<td>'.$row['dinam'].'</td>';
      echo '<td>'.$row['donate_date'].'</td>';
	  echo '<td><div align="center">'.$row['next_date'].'</div></td>';
      echo '<td><div align="center">'.$row['contact_no'].'</div></td>';
      echo '<td><div align="center">'.'<a href=donor_list_edit.php?id='  . $row["id"] .'>edit</a>'.'|'.'<a onClick="return deleteItem(\'Are you sure want to delete?\');" href=donor_delete.php?id=' . $row["id"] .'>del</a>'.' </div></td>';
    echo '</tr>';
  }
?>
     </div>   


</div>
</table>
     <?php include('footer.php');?>