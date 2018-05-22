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
<script type="text/javascript" src="./jquery/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript">
 function dispsno(idactno) 
	{	
	  var actid = idactno.id;
	   $.ajax({
        type: "POST",
        url: "ftp.php",
        data: "id4="+actid,
        success: function() {
		 $("#"+actid).hide("slow");
        }
		});
	}
</script>
</head>
<body>
<table class="header" align=center width=800>
   <tr>
    <td>
      <center><h1>Automatic Cards</h1></center>
    </td>
   </tr>
</table>
<div id="footer">
 <div class="header-1">
  <span><b>Welcome, <span style="color:#FF6600;"><?php echo $username; ?></span><br><a href="logout.php" class="nav">Logout</a></b></span><span style="float:right;"><b><?php echo date("l, j F Y H:i");?></b></span>
 </div>
 </div>
<br>
<table align=right cellspacing=10 width=1000>
<tr>
  <td  valign=top align=left>
     <table class="box1"  width=200> 
	     <tr><th class="menu">MENU</th></tr> 
		 <tr><td class="nav"><a href="main.php">Home</a></td></tr> 
		 <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
          $result = mysql_query("select a.menucode as code,a.menuname as menunames,a.pathname from  profil_menu a, profiles_axs b where b.function =a.id and b.profil='$id_profile'");
		   while($row = mysql_fetch_array($result))
           {
			echo '<tr><td class="nav" id="'.$row['code'].'"><a href="'.$row['pathname'].'">'.$row['menunames'].'</a></td></tr>';
           }
          ?>
		 <tr><td class="nav"><a href="logout.php">Logout</a></td></tr>  
      </table>
   </td>
<td align=right id="main" valign="top">
 <table align=right width=800>
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=4><center>Send HIA </center></th>
          </tr>
		  <tr>
        	<th scope="col">Date & Time Creation</th>
			<th scope="col">Dealer</th>
            <th scope="col">Activation No</th>
			<th scope="col"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
        <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
          $result = mysql_query("select a.id,a.actdate,a.acttime,a.actno,b.dealername from activationno a, dealers b where a.dealerid=b.id and a.confirmation=1 and a.hiacreated=1 and a.status=0");
		   while($row = mysql_fetch_array($result))
           {
		?>
		 <tr id="<?php echo $row["id"]; ?>"><td><?php echo $row['actdate'].' '.$row['acttime']; ?></td><td><?php echo $row['dealername']; ?></td><td class="nav"><?php echo $row['actno']; ?></td><td><a href="#" id="<?php echo $row["id"]; ?>" class="ubtn" onclick="javascript:dispsno(this)"><img src="./style/apply2.png" alt="">Send File</a></td></tr>
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
