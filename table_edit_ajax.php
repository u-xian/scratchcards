<?php

require_once('Connections/conn.php');
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);

$a1=mysql_escape_String($_POST['batchno']);
$a2=mysql_escape_String($_POST['serialno1']);
$a3=mysql_escape_String($_POST['serialno2']);

$a4=$a3-$a2;


$sql = "update cardsrequest1 set batch='$a1',start_serialnumber='$a2',end_serialnumber ='$a3',pins='$a4' where id='$id'";
mysql_query($sql);
}
?>