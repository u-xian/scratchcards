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
        url: "do_createuser.php",
        data: dataString,
        success: function() {
                 $("#newspaper-a").hide();
                 $("#vf2").hide();
		 $("#results").show();
         $("#results").html('<span class="label1"><center>User created</center></span>');
        }
		});
         return false;
	});
});
</script>
</head>
<body>
<table align="center">
<td>
 <span id="results"></span>
	   <table id="newspaper-a"> 
	    <form id="f2">
            <thead>
	    <tr>
	       <th COLSPAN=4><center><b>Add new user</b></center></th>
	    </tr>  
            </thead>
            <tbody>
        <tr>
            <td>Names</td>
            <td><input type="text" class="inputbox" value="" name="t1"></td>
        </tr>
	    <tr>
	      <td>Function</td>
	      <td><input type="text" class="inputbox" value="" name="t2"></td>
		</tr>
		<tr>
		  <td>Email</td>
	      <td><input type="text" class="inputbox" value="" name="t3"></td>
		</tr>
            <tr>
		  <td COLSPAN=4 align="center"><button id="vf2" class="button action blue" style="float:right;"><span class="label">Save</span></button></td>
	    </tr>  
        </form>	
        </tbody>
       </table>
	 </td>
</table>  
</body>
</html>
