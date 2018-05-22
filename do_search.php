<table align=right width=800>
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=7><center>Results</center></th>
          </tr>
		  <tr>
        	<th scope="col">Date & Time Creation</th>
			<th scope="col">Date & Time Activation</th>
			<th scope="col">Activation No </th>
            <th scope="col">Dealer</th>
			<th scope="col">Batch</th>
			<th scope="col">Start Serial No</th>
			<th scope="col">End Serial No</th>
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
	$f1 = substr($word, 0, 6); 
	$f2 = substr($word, 6, 6); 
	
	$sql="select concat(a.creation_date,' ',a.creation_time) as  adate,a.activation_date,a.actno,b.dealername,a.othername,c.batch,c.start_serialnumber,c.end_serialnumber  from activationno a, dealers b , cardsrequest1 c where a.dealerid=b.id and a.id=c.act_id and c.batch='$f1' and c.start_serialnumber <= '$f2' and c.end_serialnumber >='$f2'";
    $result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
      {
	    $a1=$row['adate'];
        $a2=$row['actno'];
	    $a3=$row['dealername'];
		$a4=$row['othername'];
		$a5=$row['batch'];
		$a6=$row['start_serialnumber'];
		$a7=$row['end_serialnumber'];
		$a8=$row['activation_date'];
?>
<tr>
  <td><?php echo $a1; ?></td>
  <td><?php echo $a8; ?></td>
  <td><?php echo $a2; ?></td>
  <td><?php echo $a3."<br>".$a4; ?></td>
  <td><?php echo $a5; ?></td>
  <td><?php echo $a6; ?></td>
  <td><?php echo $a7; ?></td>
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
