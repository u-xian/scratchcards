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
		var x1 ="_";
        var x2 =".hia";
		var batchname = $("#t1").val();
		var activno =   $("#t2").val();
		var fname = activno.concat(x1,batchname,x2);
		$("#dwn").html('<center><b>Processing...</b><br><br><img src="./images/loader.gif"></center>');
		$("#txtf").hide();
		$("#txtf1").hide();
        $.ajax({
        type: "POST",
        url: "load_databatch.php",
        data: dataString,
        success: function() {
		$("#dwn").html('<center><a href="./output/'+fname+'" class="button action blue" id="dwn2"><span class="label">Download</span></a></center>');
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
        	<th COLSPAN=1><center>Create HIA Batch</center></th>
          </tr>
        </thead>
        <tbody>
		 <tr>
		   <form id="f2">
		    <td>
			  <span id="txtf">Enter Batch ID<br><input type="text" class="inputbox" value="" name="t1" id="t1"></span><br><br><br>
			  <span id="txtf1">Enter Activation Number<br><input type="text" class="inputbox" value="" name="t2" id="t2"></span><br><br><br>
			  <span id="dwn"><button class="button action blue" onclick="this.disabled=true;" id="gn2"><span class="label">Generate</span></button></span>
			</td>
		   </form>
		 </tr>
        </tbody>
      </table>
	 </td>
	</tr>
 </table>  
</body>
</html>
