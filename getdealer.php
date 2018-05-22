<select name="select2">
<option value="0">-</option>
<?php 
  $id=$_GET['id1'];
  require_once('Connections/conn.php');
  mysql_select_db($database_conn, $conn);
  $query = "select id,tigoshopname from tigoshops where did='$id'";
  $result = mysql_query($query);
   while($row = mysql_fetch_array($result))
    {
	 echo '<option value="'.$row['id'].'">'.$row['tigoshopname'].'</option>'; 
    }
?>
</select>




