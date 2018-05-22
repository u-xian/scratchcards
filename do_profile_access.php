<?php
 require_once('Connections/conn.php');
 mysql_select_db($database_conn, $conn);
  
    // never trust what user wrote! We must ALWAYS sanitize user input
	$a1 = mysql_real_escape_string($_POST['t1']);
	$a2= $_POST['t2'];

    for($i=0;$i<sizeof($a2);$i++)
	{
	  $a3 = $a2[$i];
      $query1="insert into profiles_axs(profil,function) values ('$a1','$a3')";
      $result = mysql_query($query1) or die(mysql_error());
    }
	
	//$query2="update profiles set status=1 where id='$a1'";
    //mysql_query($query2) or die(mysql_error());
?>

