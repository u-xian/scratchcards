<?php

require_once('Connections/conn.php');
if($_POST['v1'])
{

$a1=mysql_escape_String($_POST['v1']);
$a2=mysql_escape_String($_POST['v2']);
$a3=mysql_escape_String($_POST['v3']);
$a4=mysql_escape_String($_POST['v4']);

$sql = "update users set names='$a2',function='$a3',email='$a4' where id='$a1'";

mysql_query($sql);
}
?>