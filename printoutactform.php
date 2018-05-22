<?php
session_start();
$id_profile=$_SESSION['profile_id'];
$username=$_SESSION['username'];
?>
<html>
<head>
<title>::Automatic Cards::</title>
<link href="style/style2.css" rel="stylesheet" type="text/css" />
<link href="style/style3.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
<script type="text/javascript" src="./jquery/jquery-1.4.2.min.js"></script>
</head>
<body>
<table align=right>
<tr>
<td align=right id="main" valign="top">
 <table  width=800 >
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=4><center>Print out the Activation Form</center></th>
          </tr>
		  <tr>
        	<th scope="col">Date & Time Creation</th>
			<th scope="col">Dealer</th>
            <th scope="col">Activation No</th>
			<th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
          $result = mysql_query("select a.id,a.creation_date,a.creation_time,a.actno,b.dealername,a.billingconfirm,a.othername  from activationno a, dealers b where a.dealerid=b.id and a.billingconfirm=1 order by a.id desc limit 5");
		   while($row = mysql_fetch_array($result))
           {
		     $n1=$row['billingconfirm'];
			 if ($n1=="1")
			  {
                 $sts="Active";
			  }
             else
			  {
                 $sts="Not Active";
			  }
		?>
		 <tr><td><?php echo $row['creation_date'].' '.$row['creation_time']; ?></td><td><?php echo $row['dealername'].'  '.$row['othername']; ?></td><td class="nav"><a  href="topdf.php?id2=<?php echo $row["id"]; ?>" ><?php echo $row['actno']; ?></a></td><td><?php echo $sts; ?></td></tr>
        <?php      
		   }
        ?>
        </tbody>
      </table>
	 </td>
	</tr>
	</table>
</body>
</html>
