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
<script language="javascript" type="text/javascript">
 function dispsno(idactno) 
	{	
	  var actid = idactno.name;
	  var actitp = "valid";
	  var dataString = 'id3='+ actid + '&id4=' + actitp;
	  $("#"+actid).html('<center><img src="./images/loader.gif" width=100></center>');
	  $.ajax({
        type: "POST",
        url: "do_accounting_valid.php",
		data: dataString,
        success: function() {
		 $("#"+actid).html('<center><a href="topdf.php?id2='+actid+'" class="button action blue"><span class="label">Print</span></a></center>');  
        }
		});
	}
 function discardact(disactno) 
	{	
	  var actid = disactno.name;
	  var actitp = "discard";
	  var dataString = 'id5='+ actid + '&id6=' + actitp;
	  $("#"+actid).html('<center><img src="./images/loader.gif" width=100></center>');
	  $.ajax({
        type: "POST",
        url: "do_accounting_valid.php",
		data: dataString,
        success: function() {
		 $("#"+actid).html('<center><button class="button action red" disabled="disabled"><span class="label">Discarded</span></button></center>');
        }
		});
	}
</script>
</head>
<body>
<table align=center cellspacing=10>
<tr>
<td  id="main" valign="top">
 <table width=800>
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=4><center>Accounting Validation</center></th>
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
          $result = mysql_query("select a.id,a.creation_date,a.creation_time,a.actno,b.dealername,a.othername from activationno a, dealers b where a.dealerid=b.id and a.finconfirm=0 and a.confirmation=1");
		   while($row = mysql_fetch_array($result))
           {
		?>
		 <tr><td><?php echo $row['creation_date'].' '.$row['creation_time']; ?></td><td><?php echo $row['dealername'].' '.$row['othername']; ?></td><td class="nav"><?php echo $row['actno']; ?></td><td><span id="<?php echo $row["id"]; ?>"><a href="#" name="<?php echo $row["id"]; ?>" onclick="javascript:dispsno(this)" class="button action green"><span class="label">Validate</span></a> <a href="#" name="<?php echo $row["id"]; ?>" onclick="javascript:discardact(this)" class="button action red"><span class="label">Discard</span></a></span></td></tr>
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
