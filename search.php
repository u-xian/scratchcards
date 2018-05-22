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
        url: "do_search.php",
        data: dataString,
        success: function(result) {
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
        	<th COLSPAN=1><center>Search by Serial number</center></th>
          </tr>
        </thead>
        <tbody>
         <td>
		  <form id="f2">
           <input type="text" name="search" id="search_box" class="inputbox"><br>
           <button class="button action blue" id="vf2"><span class="label">Search</span></button>
          </form>
		 </td>
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
