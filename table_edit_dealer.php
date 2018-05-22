<?php

require_once('Connections/conn.php');
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);

$a1=mysql_escape_String($_POST['dealername']);

$sql = "update dealers set dealername='$a1' where id='$id'";
mysql_query($sql);
}
?>