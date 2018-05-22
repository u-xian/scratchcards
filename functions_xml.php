<?php
 
  //Reading XML using the SAX(Simple API for XML) parser 
  $vouchers   = array();
  $elements   = null;
  
  //global $vouchers;
  //global $elements;
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
 
?>