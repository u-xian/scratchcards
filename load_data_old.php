<?php 
require_once('Connections/conn1.php');
require_once('Connections/conn.php');
//$a1=$_POST['id3'];

$a1= (int)$_POST['id3'];
//$a1=8;
$stmt = $mysqli->prepare("CALL concat_data(?)");
$stmt->bind_param('i',$a1);

/* Exécution de la requête préparée */
$stmt->execute();

/* Fermeture de la commande */
$stmt->close();

/* Fermeture de la connexion */
$mysqli->close();	

mysql_select_db($database_conn, $conn);
 $sql1="select id,actno from activationno where id ='$a1'";
 $result = mysql_query($sql1);
 while($row = mysql_fetch_array($result))
 {
   $actid=$row['id'];
   $actname=$row['actno'];
 }
 
 $filename = $actname.".hia";
 $File = "./output/".$filename; 
 $Handle = fopen($File, 'w');
 
  $sql2="select hias from hia_tmp where activid='$actid'";
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
 
 $sql3="update activationno set hiacreated=1,status=1 where id='$a1'";
 mysql_query($sql3);
 
 fclose($Handle); 	 

?>