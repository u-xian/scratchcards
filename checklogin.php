<?php
session_start();
require_once('Connections/conn.php');

$myusername=$_POST['txt1']; 
$mypassword=$_POST['txt2'];
$iduser="";
   $uname="";
   $passwd=""; 
   $profile="";
   $sts=""; 
mysqli_select_db($conn,$database_conn);
$query1="SELECT id,loginname,password,profil,status FROM logins where loginname='$myusername'";
$result = mysqli_query($conn,$query1) or die(mysqli_error($conn));
while($row = mysqli_fetch_array($result))
 {
   $iduser=$row['id'];
   $uname=$row['loginname'];
   $passwd=$row['password']; 
   $profile=$row['profil'];
   $sts=$row['status']; 
 }

 echo $iduser;
 echo $uname;
 echo $passwd;
 echo $profile;
 echo $sts;
 echo "------------------";

 echo $myusername;
 echo $mypassword;

if ($sts == 0)
 {
  if ($myusername == $uname && sha1($mypassword) == $passwd)
   {
    $_SESSION['id_user'] =$iduser;
	$_SESSION['username'] =$uname;
	$_SESSION['profile_id'] =$profile;
    header("Location: changepwdlogon.php");
   }
  else
   {
    echo "Invalid username or password";
   }
 }  
 else if ($sts == 1 and $profile==1)
 {
  if ($myusername == $uname && sha1($mypassword) == $passwd)
   {
    $_SESSION['id_user'] =$iduser;
	  $_SESSION['username'] =$uname;
	  $_SESSION['profile_id'] =$profile;
    header("Location: mainadmin.php");
   }
  else
   {
    echo "Invalid username or password";
   }
 }  
 else if ($sts == 1 and $profile!=1)
 {
  if ($myusername == $uname && sha1($mypassword) == $passwd)
   {
    $_SESSION['id_user'] =$iduser;
	$_SESSION['username'] =$uname;
	$_SESSION['profile_id'] =$profile;
    header("Location: mainuser.php");
   }
  else
   {
    echo "Invalid username or password";
   }
 } 
else
{
 echo "User disabled";
}
?>


