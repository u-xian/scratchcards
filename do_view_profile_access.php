<table id="newspaper-a"> 
<thead>
  <tr>
	<th COLSPAN=2><center><b>Profile:</b></center></th>
  </tr> 
  <tr>
    <th scope="col">Profilename</th>
    <th scope="col">Access</th>
  </tr>			 
</thead>
<tbody>
<?php
 require_once('Connections/conn.php');
 mysqli_select_db($conn,$database_conn);
  
//if we got something through $_POST
if (isset($_POST['t1'])) 
{
  
    // never trust what user wrote! We must ALWAYS sanitize user input
    $pf_id = $_POST['t1'];
	
	$sql="select a.menuname,b.function from  profil_menu a, profiles_axs b where a.id=b.function and b.profil='$pf_id'";
    $result = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_array($result))
      {
	    $a1=$row['menuname'];
        $a2=$row['function'];
?>
 <tr>
   <td><?php echo $a1; ?></td> 
   <td><input type="checkbox" checked="yes" disabled value="<?php echo $a2; ?>"></td> 
 </tr> 
<?php	
    }
}
?>
</tbody>
</table> 