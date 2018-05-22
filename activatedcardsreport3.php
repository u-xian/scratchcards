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
        url: "do_search_print.php",
        data: dataString,
        success: function(result) {
		 $("#dwn").html('<button class="button action blue"  id="gn2">Search</button>');
		 $("#results").show();
         $("#results").html(result);
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
        	<th COLSPAN=2><center>Reports...View Activ Form</center></th>
          </tr>
		  <tr>
        	<th scope="col">Enter Activation Number</i></th>
		    <th scope="col">Search</th>
          </tr>
        </thead>
        <tbody>
		 <tr>
		   <form id="f2">
		    <td><input type="text" class="inputbox" value="" name="search" id="a1"></td>
			<td id="dwn"><button class="button action blue" id="gn2"><span class="label">Search</span></button></td>
		   </form>
		 </tr>
        </tbody>
      </table>
	 </td>
	</tr>
	<tr>
	 <td>	   
        <span id="results"></span>
	  </td>
	 </tr>	
 </table>  
  </table>
</body>
</html>
