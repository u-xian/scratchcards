 <?php
  session_start();
  require_once('./PHPMailer_v5.1/class.phpmailer.php');
  require_once('Connections/conn.php');
  mysql_select_db($database_conn, $conn);
  
  $id_profile=$_SESSION['profile_id'];
  $username=$_SESSION['username'];
  $user_id=$_SESSION['id_user'];
  
   if(isset($_POST['id3'])) 
   {
    $bid= (int)$_POST['id3'];
	
	 $sql="select a.actno,b.dealername,a.othername,a.userid from activationno a, dealers b where a.dealerid=b.id and a.id='$bid'";
     $result = mysql_query($sql);
     while($row = mysql_fetch_array($result))
     {
	   $a1=$row['actno'];
       $a2=$row['dealername'];
	   $a3=$row['othername'];
	   $a4=$row['userid'];
     }
    $sql1 = "update activationno set finconfirm=0 where id='$bid'";
	mysql_query($sql1);
	
$sql6="select a.names,a.email,a.function,b.location  from users a , logins b where a.id=b.user_id and a.id='$user_id'";
$result6 = mysql_query($sql6);
while($row6 = mysql_fetch_array($result6))
{
  $b1=$row6['email'];
  $b2=$row6['names']; 
  $b3=$row6['function'];
  $b4=$row6['location'];
}

  
$title="Scratchcards Activation Canceled (".$a1.") for ".$a2." ".$a3;
$contents = "<html>
<head>
<title>My HTML Email</title>
</head>
<body>
<p style='color:#000000;font: 14px Arial, Helvetica, sans-serif;'>
Hello,
</p>
<p style='color:#000000;font: 14px Arial, Helvetica, sans-serif;'>
This is to inform you that Voucher cards with activation number  ".$a1."\n purchased by ".$a2." ".$a3." is discarded in Billing!".
"</p>
 <p style='color:#000000;font: 14px Arial, Helvetica, sans-serif;'>With Kind Regards,<br/><br/>
".$b2."<br/>".$b3." ".$b4."</p>";

$mail = new PHPMailer();

$mail->IsSMTP();  // telling the class to use SMTP

$mail->Host      = "10.138.80.65"; // SMTP server

$sql5="select a.email from users a, logins b where a.id=b.user_id and b.id='$a4'";
$result5 = mysql_query($sql5);
while($row5 = mysql_fetch_array($result5))
 {
	$mail->AddAddress($row5['email']);
 }

$sql2="select a.email from users a, logins b where a.id=b.user_id and b.profil in (3,4) and b.status=1";
$result3 = mysql_query($sql2);
while($row3 = mysql_fetch_array($result3))
 {
	$mail->AddCC($row3['email']);
 }
 
$sql3="select email from mail_receivers where status=1";
$result4 = mysql_query($sql3);
while($row4 = mysql_fetch_array($result4))
 {
	$mail->AddCC($row4['email']);
 }

$mail->SetFrom($b1,$b2);

$mail->Subject  = $title;

$mail->Body     = $contents;

$mail->isHTML(true);


if(!$mail->Send()) 
 {
   echo 'Message was not sent.';
   echo 'Mailer error: ' . $mail->ErrorInfo;
 } 
else 
 {
   echo 'Message has been sent.';
 }
	 
}
 ?>