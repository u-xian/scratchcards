<?php

require_once('Connections/conn.php');
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);

$b1=mysql_escape_String($_POST['statut']);

if ($b1=="1" || $b1=="2")
{
  if ($b1=="1")
  {
   $c1=2;
  }
  else
  {
   $c1=1;
  }
 $sql = "update logins set status='$c1' where id='$id'";
}
else 
{
  $sql = "delete from logins where id='$id'";
}

mysql_query($sql);
}
?>