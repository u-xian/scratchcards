<?php
 require_once('Connections/conn.php');
 mysql_select_db($database_conn, $conn);
  
//if we got something through $_POST
if (isset($_POST['t1']) && isset($_POST['t2']) && isset($_POST['t3']) && isset($_POST['t4']) && isset($_POST['t5']) && isset($_POST['t6'])) 
{
  
    // never trust what user wrote! We must ALWAYS sanitize user input
	
    $a1 = mysql_real_escape_string($_POST['t1']);
    $a2 = mysql_real_escape_string($_POST['t2']);
    $a3 = mysql_real_escape_string($_POST['t3']);
    $a4 = mysql_real_escape_string($_POST['t4']);
    $a5 = mysql_real_escape_string($_POST['t5']);
	$a6 = mysql_real_escape_string($_POST['t6']);
    
    if($a4 == $a5)
    {
     $p1=$a5;
     $pwd=sha1($p1);
    }
    $current_date=date("Y-m-d");
    $expdate=date ('Y-m-d',strtotime('+90 day',strtotime($current_date)));
    $sql="insert into logins(loginname,password,profil,status,location,exp_date,user_id) values ('$a3','$pwd','$a6',0,'$a2','$expdate','$a1')";
    mysql_query($sql);
}	
?>

