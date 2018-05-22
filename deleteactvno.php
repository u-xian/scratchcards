<?php

require_once('Connections/conn.php'); 

if($_GET['id'])
{
   $id=$_GET['id'];
   $sql1 = "delete from activationno where id='$id'";
   $sql2 ="delete from cardsrequest1 where act_id='$id'";
   mysql_query($sql1);
   mysql_query($sql2);
}

?>