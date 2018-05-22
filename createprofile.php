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
        url: "do_createprofile.php",
        data: dataString,
        success: function() {
                 $("#box").hide();
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
    <th COLSPAN=1><center>Add a new Profile</center></th>
  </tr>
 </thead>
 <tbody>
  <form id="f2">
  <td width=300 >
   <span id="results"></span> <input type="text" name="t1" id="box" class="inputbox"><br>
   <a href="#" class="button action blue"  id="vf2"><span class="label">Add</span></a>
  </td>
  </form>
 </tbody>
</table>  
</body>
</html>
