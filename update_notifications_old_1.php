<?php
session_start();
$id_profile=$_SESSION['profile_id'];

require_once('Connections/conn.php');
mysql_select_db($database_conn, $conn);

$bquery1="select count(*) as nb from activationno where finconfirm=1 and hiacreated =0";
$bquery2="select a.actno,c.loginname,b.dealername,a.othername from activationno a, dealers b,logins c where a.dealerid=b.id and a.userid=c.id and a.finconfirm=1 and a.hiacreated =0";

$fquery1="select count(*) as nb from activationno where finconfirm=0 and confirmation=1";
$fquery2="select a.actno,c.loginname,b.dealername,a.othername from activationno a, dealers b,logins c where a.dealerid=b.id and a.userid=c.id and a.finconfirm=0 and a.confirmation=1";
  
if ($id_profile=="4")
{
 $sql1=$bquery1;
 $sql2=$bquery2;
}
if ($id_profile=="3")
{
 $sql1=$fquery1;
 $sql2=$fquery2;
}
    $result1 = mysql_query($sql1);
	while($row1 = mysql_fetch_array($result1))
    { 
	 $a1=$row1['nb']; 
    }
?>
    <a href="#" class="button"><span class="icon icon197"></span><span class="label">Pending...</span>&nbsp;&nbsp;&nbsp;<span class="notifbox"><?php echo $a1;?></span></a>
    <ul class="submenu">
   <?php
    $result2 = mysql_query($sql2);
	while($row2 = mysql_fetch_array($result2))
    { 
	 echo "<li>".$row2['actno']." | raised by ".$row2['loginname']."<br>".$row2['dealername']." ".$row2['othername']."</li>";
    }
   ?>
    </ul>