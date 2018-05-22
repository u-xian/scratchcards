<?php
 require_once('Connections/conn.php');
 mysql_select_db($database_conn, $conn);
  
//if we got something through $_POST
if (isset($_POST['t1'])) 
{
  
    // never trust what user wrote! We must ALWAYS sanitize user input
    $a1 = mysql_real_escape_string($_POST['t1']);
	$a2 = mysql_real_escape_string($_POST['t2']);
	
	$sql="insert into mail_receivers(names,email,status) values ('$a1','$a2',1)";
    mysql_query($sql);
}	
?>

