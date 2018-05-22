<?php
set_time_limit(0);
require_once('Connections/conn.php');
require_once('Connections/soap_conn.php');


mysql_select_db($database_conn, $conn);
$strMethod="ModifyVoucher";
$query="select * from check_tmp where sn_status=''"; 
$result=mysql_query($query); 
$num=mysql_numrows($result); 
$number_queries = round($num / 1000);
$i=0;
while ($i<=$number_queries)
{
  $values = mysql_query("select id,batch,serialnumber,ship_date from check_tmp where sn_status='' limit 0,1000"); 
  while ($row = mysql_fetch_array($values)) 
  {
    $a1=$row['id'];
	$a2=$row['batch'];
	$a3=$row['serialnumber'];
	$a4=$row['ship_date'];
	$param->batchNumber = $a2;
    $param->newStateName = "Active";
    $param->startSerial = $a3;
    $param->endSerial = $a3;
    $param->shipDate = $a4;

    try 
    {
     $results = $objClient->__soapCall($strMethod,array($param));
     /*echo "<pre>";
     print_r($results);
      echo "</pre>";*/
    } 
    catch (SoapFault $exception)
    { 
      echo "<pre>";
      print_r($exception);
      echo "</pre>";
    }
    $results1 = array( $results->ModifyVoucherResult);
    foreach ($results1 as $message) 
    {
	  if ($message=="1")
		{
            $sql1 = "update check_tmp set sn_status='Active' where id='$a1'";
            mysql_query($sql1);
		}
	  
    }
  }
  $i=$i+1;
}
?>



