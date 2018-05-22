<?php
    $a1 ="20130723-27-3390";
    $dir = "./output/".$a1."*";  
      
    // Open a known directory, and proceed to read its contents  
    foreach(glob($dir) as $file)   
    {  
        echo $file."<br>";  
    }  
	
?>