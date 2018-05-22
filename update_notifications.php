<?php
session_start();
$id_profile=$_SESSION['profile_id'];

require_once('Connections/conn.php');
mysqli_select_db($conn,$database_conn);

$bquery1="select count(*) as nb from activationno where finconfirm=1 and billingconfirm =0";
$bquery2="select a.actno,c.loginname,b.dealername,a.othername from activationno a, dealers b,logins c where a.dealerid=b.id and a.userid=c.id and a.finconfirm=1 and a.billingconfirm =0";

$fquery1="select count(*) as nb from activationno where finconfirm=0 and confirmation=1";
$fquery2="select a.actno,c.loginname,b.dealername,a.othername from activationno a, dealers b,logins c where a.dealerid=b.id and a.userid=c.id and a.finconfirm=0 and a.confirmation=1";
  
if ($id_profile=="4")
{
 $sql1=$bquery1;
 $sql2=$bquery2;
 $pname="cards_activation.php";
 $tgt="iframeID";
}
if ($id_profile=="3")
{
 $sql1=$fquery1;
 $sql2=$fquery2;
 $pname="#";
 $tgt="";
}
    $result1 = mysqli_query($conn,$sql1);
	while($row1 = mysqli_fetch_array($result1))
    { 
	 $a1=$row1['nb']; 
    }
?>
    <a href="<?php echo $pname; ?>" target="<?php echo $tgt; ?>"><span class="notifbox"><?php echo $a1;?></span>&nbsp;&nbsp;&nbsp;&nbsp;Activ form(s) pending...</a>
    <ul>
    <?php
      $result2 = mysqli_query($conn,$sql2);
	  while($row2 = mysqli_fetch_array($result2))
      { 
	    echo "<li><a href='#'>".$row2['actno']." | raised by ".$row2['loginname']."<br>".$row2['dealername']." ".$row2['othername']."</a></li>";
      }
    ?>
    </ul>