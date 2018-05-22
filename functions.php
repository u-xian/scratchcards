<?php
function remove_file($fn)
{
   $File = "./output/".$fn."*";
	
	foreach (glob($File) as $filename) 
	{
      unlink ($filename);
    }
	
	$File1 = "./checking/".$fn."*";
	
	foreach (glob($File1) as $filename1) 
	{
      unlink ($filename1);
    }

}
?>