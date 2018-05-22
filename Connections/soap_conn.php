<?php

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

$username = "";
$password = "";

//Check with your provider which security name-space they are using.
$strWSSENS = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd";
//$strWSSENS = "./oasis-200401-wss-wssecurity-secext-1.0.xsd";
$WSDL = "http://172.17.201.77/ccws/ccws.asmx?wsdl";
$arrOptions = array(
      "trace"      => 1,		// enable trace to view what is happening
      "exceptions" => 1,		// disable exceptions
      "cache_wsdl" => 1); 		// disable any caching on the wsdl, encase you alter the wsdl server
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

?>