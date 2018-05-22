<?php
session_start();
$id_profile=$_SESSION['profile_id'];
$username=$_SESSION['username'];
?>
<html>
<head>
<link href="style/style2.css" rel="stylesheet" type="text/css" />
<link href="style/style3.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
<script type="text/javascript" src="./jquery/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript">
$(function(){
    $("#vf2").click(function(){
        dataString = $("#f2").serialize();
        $.ajax({
        type: "POST",
        url: "do_mail_receiver.php",
        data: dataString,
        success: function() {
                 $("#names").hide();
				 $("#email").hide();
                 $("#vf2").hide();
		 $("#results").show();
         $("#results").html('<center>Done!</center>');
        }
		});
         return false;
	});
});
</script>
</head>
<body>
<table align="center" id="newspaper-a">
 <thead>
  <tr>
    <th COLSPAN=4><center>Add a new mail receiver</center></th>
  </tr>
 </thead>
 <tbody>
  <form id="f2">
    <tr id="names">
      <td>Names</td>
      <td><input type="text" class="inputbox" value="" name="t1"></td>
    </tr>
    <tr id="email">
	  <td>Email</td>
	  <td><input type="text" class="inputbox" value="" name="t2"></td>
    </tr>
    <tr>
	  <td COLSPAN=4 align="center">
	    <span id="results"></span>
	   <a href="#" class="button action blue" style="float:right;" id="vf2"><span class="label">Add</span></a>
	  </td>
	</tr> 
  </form>
 </tbody>
</table>  
</body>
</html>
