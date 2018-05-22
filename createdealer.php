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
$(function(){
    $("#vf2").click(function(){
        dataString = $("#f2").serialize();
        $.ajax({
        type: "POST",
        url: "do_createdealer.php",
        data: dataString,
        success: function() {
                 $("#dealer_box").hide();
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
    <th COLSPAN=1><center>Add a new Dealer</center></th>
  </tr>
 </thead>
 <tbody>
  <form id="f2">
  <td width=400>
   <span id="results"></span> <input type="text" name="t1" id="dealer_box" class="inputbox"><br><a href="#" class="button" id="vf2">Add Item</a>
  </td>
  </form>
 </tbody>
</table>  
</body>
</html>
