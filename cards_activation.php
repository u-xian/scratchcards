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
<link href="jquery/css/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./jquery/jquery-1.9.1.js"></script>
<script type="text/javascript" src="./jquery/jquery-ui-1.10.2.custom.js"></script>

<script language="javascript" type="text/javascript">
function activcheck(idactno) 
	{	
	  var actid = idactno.id.substr(4);
	  var actname = idactno.name.substr(4);
	  var fname =actname+'.sql';
	  var dataString ='id3='+ actid +'&v2='+ actname;
	  $("#chk_"+actid).html('<center><img src="./images/loader.gif" width=100></center>');
	  $.ajax({
        type: "POST",
        url: "checkingcard.php",
        data: dataString,
        success: function() {
		 $("#chk_"+actid).html('<center><a href="./checking/'+fname+'" id="dwn2"><span class="label">Download</span></a></center>');
        }
		});
	}

function create(idactno) 
	{	
	  var actid = idactno.id.substr(4);
	  var actno = idactno.name.substr(4);
	  var x2 =".ccbatch";
	  var fname = actno.concat(x2);
	  var dataString ='id3='+ actid +'&v2='+ actno;
	  $("#crt_"+actid).html('<center><img src="./images/loader.gif" width=100></center>');
	   $.ajax({
        type: "POST",
        url: "load_data.php",
        data: dataString,
        success: function() {
		  $("#crt_"+actid).html('<center><a href="./output/'+fname+'" id="dwn2"><span class="label">Download</span></a></center>');
        }
		});
	}
function validate(idactno) 
	{	
	  var actid = idactno.id.substr(4);
	  $("#vld_"+actid).html('<center><img src="./images/loader.gif" width=100></center>');
	  $.ajax({
        type: "POST",
        url: "do_billing_valid.php",
		data: "id3="+ actid,
        success: function() {
		 $("#vld_"+actid).html('<center><span class="label">Done</span></center>');
        }
		});
	}
function cancel(idactno) 
	{	
	  var actid = idactno.id.substr(4);
	  $("#cmt_"+actid).html('<center><img src="./images/loader.gif" width=100></center>');
	  $.ajax({
        type: "POST",
        url: "do_billing_discard.php",
		data: "id3="+ actid,
        success: function() {
		 $("#cmt_"+actid).html('<center><span class="label">Done</span></center>');
        }
		});
	}
$(function() {
$( "#dialog-form" ).dialog({
autoOpen: false,
height: 300,
width: 300,
modal: true,
buttons: {
"Comment": function() {
 $( this ).dialog( "close" );
},
Cancel: function() {
$( this ).dialog( "close" );
}
},
close: function() {
allFields.val( "" ).removeClass( "ui-state-error" );
}
});

$("#cmts" ).click(function() {
$( "#dialog-form" ).dialog( "open" );
});
});
</script>
<style>
<!--
body{font-size: 62.5%;}
 -->
</style>
</head>
<body>
<table cellspacing=10 width=1000>
<tr>
<td id="main" valign="top">
 <table width=900>
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=5>
			<span style="float:left;"><a href="cards_activation.php" class="button" title="Reload"><span class="icon icon158"></span></a></span>
			<center>CARDS ACTIVATION</center></th>
          </tr>
		  <tr>
        	<th scope="col">Date & Time</th>
			<th scope="col">Activation No</th>
			<th scope="col"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
<?php 
require_once('Connections/conn.php');
mysql_select_db($database_conn, $conn);
$result = mysql_query("select a.id,a.creation_date,a.creation_time,a.actno,b.dealername,a.othername,c.loginname  from activationno a, dealers b,logins c  where a.dealerid=b.id and c.id=a.userid and a.finconfirm=1 and a.billingconfirm =0");
while($row = mysql_fetch_array($result))
 {
?>
<tr>
 <td>
  <?php 
	echo $row['creation_date'].' '.$row['creation_time']; 
  ?>
 </td>
 <td>
<?php
    echo "<b>Raised on: </b>".$row['creation_date'].' '.$row['creation_time'].'<br>';
    echo "<b>Activ no: </b>".$row['actno'].'<br>';
    echo "<b>Raised by: </b>".$row['loginname'].'<br>';		  
	echo "<b>Dealer: </b>".$row['dealername'].' '.$row['othername'];       
?>
</td>
<td>
            <a href="#" id="chk_<?php echo $row["id"]; ?>" name="chk_<?php echo $row["actno"]; ?>" onclick="javascript:activcheck(this)" class="button action blue"><span class="label">Check</span></a>
		    <a href="#" id="crt_<?php echo $row["id"]; ?>" name="crt_<?php echo $row["actno"]; ?>" onclick="javascript:create(this)" class="button action red"><span class="label">Create</span></a>
		    <a href="#" id="vld_<?php echo $row["id"]; ?>" name="vld_<?php echo $row["actno"]; ?>" onclick="javascript:validate(this)" class="button action green"><span class="label">Validate</span></a>
		    <a href="#" id="cmt_<?php echo $row["id"]; ?>" name="cmt_<?php echo $row["actno"]; ?>" onclick="javascript:cancel(this)" class="button action"><span class="label">Cancel</span></a>
		   </td>
		   </tr>
        <?php      
		   }
        ?>
 </tbody>
</table> 
	 </td>
	</tr>
 </table>
</td> 
</tr>
</table>
<div id="dialog-form" title="Comment">
<form>
<label for="name">Write a comment</label>
 <textarea rows="4" cols="50" class="text ui-widget-content ui-corner-all">
</textarea>
</form>
</div>
</body>
</html>
