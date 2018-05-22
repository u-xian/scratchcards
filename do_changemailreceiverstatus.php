<?php

require_once('Connections/conn.php');
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);

$b1=mysql_escape_String($_POST['statut']);

if ($b1=="0")
  {
   $c1=1;
  }
  else
  {
   $c1=0;
  }
 $sql = "update mail_receivers set status='$c1' where id='$id'";


mysql_query($sql);
}
?>