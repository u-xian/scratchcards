<?php
  set_time_limit(0);
  //require_once('functions.php');
  
  
   $a1 ="20130724-1-3400";
   $dir = "./output/".$a1."*"; 

    foreach(glob($dir) as $file)   
    { 
      //do_activation($file);
	  echo $file;
    }
?>