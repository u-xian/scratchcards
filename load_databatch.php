<?php
require_once('Connections/conn1.php');
require_once('Connections/conn.php');
//$a1=$_POST['id3'];

$a1= (int)$_POST['t1'];
$a2= $_POST['t2'];
//$a1=8;
$stmt = $mysqli->prepare("CALL concat_databatch(?)");
$stmt->bind_param('i',$a1);

/* Exécution de la requête préparée */
$stmt->execute();

/* Fermeture de la commande */
$stmt->close();

/* Fermeture de la connexion */
$mysqli->close();


 $filename = $a2."_".$a1.".hia";
 $File = "./output/".$filename; 
 $Handle = fopen($File, 'w');
 
  $sql2="select hias from hia_tmp";
  $result1 = mysql_query($sql2);
  while($row1 = mysql_fetch_array($result1))
  {
    $hias=$row1['hias'];
	$Data = $hias."\n"; 
    fwrite($Handle, $Data);
  }

 print "Data Written"; 
 
 $sql2="truncate table hia_tmp";
 mysql_query($sql2);
 
 fclose($Handle); 	 
 
?>