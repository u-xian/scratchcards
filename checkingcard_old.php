<?php 

require_once('Connections/conn.php');
//$a1= (int)$_POST['id3'];
//$a1=103;
	
function activationcheck($a1)
{

 $sql1="select id,actno from activationno where id='$a1'";
 $result = mysql_query($sql1);
 while($row = mysql_fetch_array($result))
 {
   $actid=$row['id'];
   $actname=$row['actno'];
 }
 
 $filename = $actname.".sql";
 $File = "./checking/".$filename; 
 $Handle = fopen($File, 'w');
 
  $sql2="select concat('select batch_number, min(serial_number), max(serial_number),state, count(*) from recharge_card where batch_number =' ,batch,' and serial_number between ',start_serialnumber,' and ',end_serialnumber,' group by batch_number,state;') as q1  from cardsrequest1 where act_id='$actid'";
  $result1 = mysql_query($sql2);
  while($row1 = mysql_fetch_array($result1))
  {
    $qry=$row1['q1'];
	$Data = $qry."\n"; 
    fwrite($Handle, $Data);
  }
 
 fclose($Handle);
 
}

if(isset($_POST['id3'])) {
    $bid= (int)$_POST['id3'];
    activationcheck($bid);	
  }
  
?>