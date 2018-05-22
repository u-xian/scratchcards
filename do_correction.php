<?php
 require_once('Connections/conn.php');
 mysql_select_db($database_conn, $conn);
  
//if we got something through $_POST
if (isset($_POST['id4'])) 
{
  // never trust what user wrote! We must ALWAYS sanitize user input
    $id = mysql_real_escape_string((int)$_POST['id4']);
    $sql1 = "delete from activationno where id='$id'";
    $sql2 ="delete from cardsrequest1 where act_id='$id'";
    mysql_query($sql1);
    mysql_query($sql2);
}
?>

