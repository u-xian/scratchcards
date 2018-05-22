<?php
session_start();
$id_profile=$_SESSION['profile_id'];
$username=$_SESSION['username'];
$user_id=$_SESSION['id_user'];
?>
<html>
<head>
<title>::Automatic Cards::</title>
<link href="style/style2.css" rel="stylesheet" type="text/css" />
<link href="style/style3.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
<script type="text/javascript" src="./jquery/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript">
 function dispsno(idactno) 
	{	
	  var actid = idactno.id;
	  $("#"+actid).html('<center><img src="./images/loader.gif" width=100></center>');
	  $(".button action green").hide();
	  $.ajax({
        type: "POST",
        url: "do_warehouse_valid.php",
		data: "id3="+ actid,
        success: function() {
		 $("#"+actid).html('<center><span class="label">Done!</span></center>');
        }
		});
	}
</script>
</head>
<body>
<table cellspacing=10>
<tr>
<td id="main" valign="top">
 <table width=900>
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=5><center>Validation</center></th>
          </tr>
		  <tr>
        	<th scope="col">Date & Time Creation</th>
			<th scope="col">Dealer</th>
            <th scope="col">Activation No</th>
			<th scope="col">Username</th>
			<th scope="col"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
        <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
          $result = mysql_query("select a.id,a.creation_date,a.creation_time,a.actno,b.dealername,c.loginname,a.othername from activationno a, dealers b,logins c where a.dealerid=b.id and c.id=a.userid and a.confirmation=0 and a.userid='$user_id'");
		   while($row = mysql_fetch_array($result))
           {
		?>
		 <tr>
		  <td><?php echo $row['creation_date'].' '.$row['creation_time']; ?></td>
		  <td><?php echo $row['dealername'].' '.$row['othername']; ?></td>
		  <td class="nav"><?php echo $row['actno']; ?></td>
		  <td><?php echo $row['loginname']; ?></td>
		  <td><a href="#" id="<?php echo $row["id"]; ?>" onclick="javascript:dispsno(this);this.disabled=true;" class="button action green"><span class="label">Validate</span></a></td>
		</tr>
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
