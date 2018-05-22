<?php
  require_once('Connections/conn.php');
  $id=$_GET['id2'];
  mysql_select_db($database_conn, $conn);
  $result = mysql_query("select b.label,a.batch,a.serialnumber from cardsrequest1 a , denomination b where a.denom_id=b.id and a.act_id='$id'");
  while($row = mysql_fetch_array($result))
  {
?>
   <tr><td><?php echo $row['label']; ?></td><td><input type="text" class="txt1 inputbox5" value='<?php echo $row['batch']; ?>' name="" maxlength="12"></td><td><input type="text" class="txt1 inputbox5" value='<?php echo $row['serialnumber']; ?>' name="" maxlength="12"></td><td><button class="vbtn" onclick="this.disabled=true;" id="vf6">Update</button></td></tr><br>
<?php  
  }
?>
