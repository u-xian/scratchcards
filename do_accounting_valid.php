 <?php
  session_start();
  require_once('./PHPMailer_v5.1/class.phpmailer.php');
  require_once('Connections/conn.php');
  mysql_select_db($database_conn, $conn);
  
  $id_profile=$_SESSION['profile_id'];
  $username=$_SESSION['username'];
  $id_users=$_SESSION['users_id'];
  $user_id=$_SESSION['id_user'];
 
$sql1="select a.email,a.names,a.function,b.location  from users a , logins b where a.id=b.user_id and a.id='$user_id'";
$result1 = mysql_query($sql1);
while($row1 = mysql_fetch_array($result1))
{
  $b1=$row1['email'];
  $b2=$row1['names'];
  $b3=$row1['function'];
  $b4=$row1['location'];
}
  
   if(isset($_POST['id3']) && ($_POST['id4']=="valid")) 
   {
    $fid= (int)$_POST['id3'];
	
	 $sql="select a.actno,b.dealername,a.othername,a.userid from activationno a, dealers b where a.dealerid=b.id and a.id='$fid'";
     $result = mysql_query($sql);
     while($row = mysql_fetch_array($result))
     {
	   $a1=$row['actno'];
       $a2=$row['dealername'];
	   $a3=$row['othername'];
	   $a4=$row['userid'];
     }
     $sql1 =  "update activationno set finconfirm=1 where id='$fid'";
     mysql_query($sql1);
	 $contents = "<html>
                  <head>
                   <title>My HTML Email</title>
                  </head>
                  <body>
                    <p style='color:#000000;font: 14px Arial, Helvetica, sans-serif;'>
                      Hello,
                    </p>
                    <p style='color:#000000;font: 14px Arial, Helvetica, sans-serif;'>
                      This is to inform you that Activation form of voucher cards with activation number  ".$a1."\n purchased by ".$a2." ".$a3." is valid in accounting!".
                    "</p>
                    <p style='color:#000000;font: 14px Arial, Helvetica, sans-serif;'>With Kind Regards,<br/><br/>
                     ".$b2."<br/>".$b3." ".$b4."</p>";
	}
	else if (isset($_POST['id5']) && ($_POST['id6']=="discard")) 
	{
	   $did= (int)$_POST['id5'];
	
	 $sql="select a.actno,b.dealername,a.othername,a.userid from activationno a, dealers b where a.dealerid=b.id and a.id='$did'";
     $result = mysql_query($sql);
     while($row = mysql_fetch_array($result))
     {
	   $a1=$row['actno'];
       $a2=$row['dealername'];
	   $a3=$row['othername'];
	   $a4=$row['userid'];
     }
     $sql1 = "update activationno set confirmation=0 where id='$did'";
     mysql_query($sql1); 
	 $contents = "<html>
                  <head>
                   <title>My HTML Email</title>
                  </head>
                  <body>
                    <p style='color:#000000;font: 14px Arial, Helvetica, sans-serif;'>
                      Hello,
                    </p>
                    <p style='color:#000000;font: 14px Arial, Helvetica, sans-serif;'>
                      This is to inform you that Activation form of voucher cards with activation number  ".$a1."\n purchased by ".$a2." ".$a3." is discarded in Accounting!".
                    "</p>
                    <p style='color:#000000;font: 14px Arial, Helvetica, sans-serif;'>With Kind Regards,<br/><br/>
                     ".$b2."<br/>".$b3." ".$b4."</p>";
	}
	
$title="Scratchcards Activation (".$a1.") for ".$a2." ".$a3;

$mail = new PHPMailer();

$mail->IsSMTP();  // telling the class to use SMTP

$mail->Host     = "10.138.80.65"; // SMTP server


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
	 

 ?>