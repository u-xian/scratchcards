<?php
session_start();
$username=$_SESSION['username'];
 require_once('Connections/conn.php');
 mysql_select_db($database_conn, $conn);
  
    // never trust what user wrote! We must ALWAYS sanitize user input
	$oldpwd = mysql_real_escape_string($_POST['txt2']);
	$npwd= mysql_real_escape_string($_POST['txt3']);
	$cpwd = mysql_real_escape_string($_POST['txt4']);
 
    $query1="SELECT id,loginname,password FROM logins where loginname='$username'";
    $result = mysql_query($query1) or die(mysql_error());
    while($row = mysql_fetch_array($result))
    {
	  $id_user=$row['id'];
      $uname=$row['loginname'];
      $passwd=$row['password']; 
    }
    if ($username == $uname && sha1($oldpwd) == $passwd)
    {
     if ($npwd == $cpwd)
	 {
	     $pwd_enc=sha1($npwd);
		 $sql1="update logins set password='$pwd_enc',status=1 where loginname='$username'";
         mysql_query($sql1);
	 }
	 else
	 {
	  echo " New password is blank or not confirmed";
	 }
    }
  else
   {
    echo "Invalid username or password";
   }

?>

