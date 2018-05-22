<?php
  set_time_limit(0);
  require_once('Connections/soap_conn.php');
  $strMethod="ModifyVoucher";
  //$a1 ="20130724-26-3399";
  //$dir = "./output/".$a1."*"; 

  //foreach(glob($dir) as $file)   
  //{ 
   // $filename= $file;  
  //Reading XML using the SAX(Simple API for XML) parser 
  $filename = './output/20130725-27-3412_1.xml';
  $vouchers   = array();
  $elements   = null;
  // Called to this function when tags are opened 
  function startElements($parser, $name, $attrs)
  {
      global $vouchers, $elements;
      if(!empty($name))
          {
          if ($name == 'MODIFYVOUCHER') {
              // creating an array to store information
              $vouchers []= array();
          }
          $elements = $name;
      }
  }
  // Called to this function when tags are closed 
  function endElements($parser, $name)
  {
      global $elements;
      if(!empty($name))
          {
        $elements = null;
      }
  }
  // Called on the text between the start and end of the tags
  function characterData($parser, $data)
  {
      global $vouchers, $elements;
      if(!empty($data))
          {
          if ($elements == 'BATCHNUMBER' || $elements == 'NEWSTATENAME' ||  $elements == 'STARTSERIAL' ||  $elements == 'SHIPDATE')
          {
             $vouchers[count($vouchers)-1][$elements] = trim($data);
          }
      }
  }
  // Creates a new XML parser and returns a resource handle referencing it to be used by the other XML functions. 
  $parser = xml_parser_create();
  xml_set_element_handler($parser, "startElements", "endElements");
  xml_set_character_data_handler($parser, "characterData");
  // open xml file
   if (!($handle = fopen($filename, "r"))) {
       die("could not open XML input");
   }
   while($data = fread($handle, 4096)) // read xml file
   {
    xml_parse($parser, $data);  // start parsing an xml document 
   }
   xml_parser_free($parser); // deletes the parser
   foreach($vouchers as $voucher)
   {
      $a2=$voucher['BATCHNUMBER'];
      $a3=$voucher['NEWSTATENAME'];
      $a4=$voucher['STARTSERIAL'];
      $a5=$voucher['SHIPDATE'];
	  /*echo $a2;
	  echo $a3;
	  echo $a4;
	  echo $a5;*/
	$param->batchNumber = $a2;
    $param->newStateName = $a3;
    $param->startSerial = $a4;
    $param->endSerial = $a4;
    $param->shipDate = $a5;

    try 
    {
     $results = $objClient->__soapCall($strMethod,array($param));
    } 
    catch (SoapFault $exception)
    { 
      echo "<pre>";
      print_r($exception);
      echo "</pre>";
    }
	
   }
   //sleep(10);
  //}
  ?>