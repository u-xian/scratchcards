<table align=right width=800>
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=4><center>Results</center></th>
          </tr>
		  <tr>
        	<th scope="col">Date & Time Creation</th>
			<th scope="col">Dealer</th>
            <th scope="col">Activation No</th>
			<th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
<?php
 require_once('Connections/conn.php');
 mysql_select_db($database_conn, $conn);
  
//if we got something through $_POST
if (isset($_POST['search'])) 
{
  
    // never trust what user wrote! We must ALWAYS sanitize user input
    $word = mysql_real_escape_string($_POST['search']);
	
	$sql="select a.id,concat(a.creation_date,' ',a.creation_time) as adate,a.actno,b.dealername,a.othername  from activationno a, dealers b where a.dealerid=b.id and a.actno='$word'";
    $result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
      { 
	    $a1=$row['id'];
	    $a2=$row['adate'];
        $a3=$row['actno'];
	    $a4=$row['dealername'];
		$a5=$row['othername'];
?>
<tr>
  <td><?php echo $a2; ?></td>
  <td><?php echo $a4."<br>".$a5; ?></td>
  <td><?php echo $a3; ?></td>
  <td><a  href="topdf.php?id2=<?php echo $row["id"]; ?>" >Print</a></td>
</tr>
<?php	
      }
}
?>
       </tbody>
      </table>
	 </td>
	</tr>
 </table>
