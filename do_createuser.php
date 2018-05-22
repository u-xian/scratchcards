<?php
 require_once('Connections/conn.php');
 mysql_select_db($database_conn, $conn);
  
//if we got something through $_POST
if (isset($_POST['t1']) && isset($_POST['t2']) && isset($_POST['t3'])) 
{
  
    // never trust what user wrote! We must ALWAYS sanitize user input
    $a1 = mysql_real_escape_string($_POST['t1']);
    $a2 = mysql_real_escape_string($_POST['t2']);
    $a3 = mysql_real_escape_string($_POST['t3']);
 
    $sql="insert into users(names,function,email,status) values ('$a1','$a2','$a3',1)";
    mysql_query($sql);
}	
?>

