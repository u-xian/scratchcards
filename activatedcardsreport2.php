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
    $("#gn2").click(function(){
        dataString = $("#f2").serialize();
		$("#dwn").html('<center><img src="./images/loader.gif" width=100></center>');
        $.ajax({
        type: "POST",
        url: "processactivcardsreport2.php",
        data: dataString,
        success: function() {
		 $("#dwn").html('<center><a href="./output/activecards2.xlsx" class="button action blue" id="dwn2"><span class="label">Download</span></a></center>');
        }
		});
         return false;
	});
});
</script>
</head>
<body>
<table align=right cellspacing=10 width=1000>
<tr>
<td align=right id="main" valign="top">
 <table align=right width=800>
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=3><center>Reports..Activated Cards by Serial Number</center></th>
          </tr>
		  <tr>
        	<th scope="col">From  <i>(Format: yyyy-mm-dd)</i></th>
			<th scope="col">To  <i>(Format: yyyy-mm-dd)</i></th>
            <th scope="col">Generate</th>
          </tr>
        </thead>
        <tbody>
		 <tr>
		   <form id="f2">
		    <td><input type="text" class="inputbox" value="" name="t1"></td>
			<td><input type="text" class="inputbox" value="" name="t2"></td>
			<td id="dwn"><button class="button action blue" onclick="this.disabled=true;" id="gn2"><span class="label">Generate</span></button></td>
		   </form>
		 </tr>
        </tbody>
      </table>
	 </td>
	</tr>
 </table>  
</body>
</html>
