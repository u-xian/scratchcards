<?php
  set_time_limit(0);
  //require_once('functions.php');
  
$a1 ="20130724-1-3400";
$dir = "./output/".$a1."*"; 

foreach(glob($dir) as $filename)   
{ 
	//$files[] = $filename;
	echo $filename;
}

//sort($files);

echo "<pre>";
print_r($files);
echo "</pre>";

echo "<hr>";
//rsort($files);

echo "<pre>";
print_r($files);
echo "</pre>";

?>