<?php

set_time_limit(0);

require_once('Connections/conn1.php');
require_once('Connections/conn.php');
class clsWSSEAuth 
{
   private $Username;
   private $Password;
   function __construct($username, $password) 
   {
     $this->Username=$username;
     $this->Password=$password;
   }
}

class clsWSSEToken 
{
  private $UsernameToken;
  function __construct ($innerVal)
  {
    $this->UsernameToken = $innerVal;
  }
}

$username = "christian_uwakristu";
$password = "Isanes5%";

//Check with your provider which security name-space they are using.
//$strWSSENS = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd";
$strWSSENS = './style/oasis-200401-wss-wssecurity-secext-1.0.xsd';
$WSDL = "http://172.17.201.77/ccws/ccws.asmx?wsdl";
$arrOptions = array(
      "trace"      => 1,		// enable trace to view what is happening
      "exceptions" => 1,		// disable exceptions
      "cache_wsdl" => 1); 		// disable any caching on the wsdl, encase you alter the wsdl server
$strMethod="RetrieveVoucherByBatchSerial";

$objSoapVarUser = new SoapVar($username, XSD_STRING, NULL, $strWSSENS, NULL, $strWSSENS);
$objSoapVarPass = new SoapVar($password, XSD_STRING, NULL, $strWSSENS, NULL, $strWSSENS);
$objWSSEAuth = new clsWSSEAuth($objSoapVarUser, $objSoapVarPass);
$objSoapVarWSSEAuth = new SoapVar($objWSSEAuth, SOAP_ENC_OBJECT, NULL, $strWSSENS, 'UsernameToken', $strWSSENS);
$objWSSEToken = new clsWSSEToken($objSoapVarWSSEAuth);
$objSoapVarWSSEToken = new SoapVar($objWSSEToken, SOAP_ENC_OBJECT, NULL, $strWSSENS, 'UsernameToken', $strWSSENS);
$objSoapVarHeaderVal=new SoapVar($objSoapVarWSSEToken, SOAP_ENC_OBJECT, NULL, $strWSSENS, 'Security', $strWSSENS);
$objSoapVarWSSEHeader = new SoapHeader($strWSSENS, 'Security', $objSoapVarHeaderVal,true);
$objClient = new SoapClient($WSDL, $arrOptions);
$objClient->__setSoapHeaders(array($objSoapVarWSSEHeader));


mysql_select_db($database_conn, $conn);
 $sql1="select id,batch,serialnumber from check_tmp where activid ='1697' limit 5";
 $result = mysql_query($sql1) or trigger_error(mysql_error().$sql1);
 while($row = mysql_fetch_array($result))
 {
   $checkid=$row['id'];
   $batchno=$row['batch'];
   $serialno=$row['serialnumber'];
  

   $param->batchNumber = $batchno;
   $param->serialNumber = $serialno;

try 
{
  $results = $objClient->__soapCall($strMethod,array($param));
  //print_r($objClient->RetrieveVoucherByBatchSerial($param));
  //print_r($results);
  $status = $results->RetrieveVoucherByBatchSerialResult->State;
  /*
  echo $batchno;
  echo $serialno;
  echo $status;
  echo "<br>";
  */
  $sql3="update check_tmp set status='$status' where id='$checkid'";
  mysql_query($sql3);
} 
catch (SoapFault $exception)
{
  print_r($exception);
}

}
/*
$reference = $results->RetrieveVoucherByBatchSerialResult->CardId;
echo $reference;

echo "<br>";
echo "<br>";
echo "<br>";
$results1 = array( $results->RetrieveVoucherByBatchSerialResult);
 foreach ($results1 as $message) {
    echo $message->CardId;
	echo "<br>";
	echo $message->BatchNumber;
	echo "<br>";
	echo $message->SerialNumber;
	echo "<br>";
	echo $message->State;
	echo "<br>";
	echo $message->FaceValue;
}
*/
?>