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
<link rel="stylesheet" media="all" type="text/css" href="datetimepicker/jquery-ui-1.8.22.custom.css" />
<link rel="stylesheet" media="all" type="text/css" href="datetimepicker/jquery-ui-timepicker-addon.css" />
<script type="text/javascript" src="./datetimepicker/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./datetimepicker/jquery-ui.min.js"></script>
<script type="text/javascript" src="./datetimepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="./datetimepicker/jquery-ui-sliderAccess.js"></script>
<script language="javascript" type="text/javascript">
$(function(){
    $("#gn2").click(function(){
	    var username = "<?php echo $username; ?>";
		var fname='report_'+username+'.xlsx';
        dataString = $("#f2").serialize();
		$("#dwn").html('<center><img src="./images/loader.gif" width=100></center>');
        $.ajax({
        type: "POST",
        url: "processactivcardsreport.php",
        data: dataString,
        success: function() {
		 $("#dwn").html('<center><a href="./output/'+fname+'" class="button action blue" id="dwn2"><span class="label">Download</span></a></center>');
        }
		});
         return false;
	});
	
 $("#t1").datepicker({
    dateFormat: 'yy-mm-dd'
   });
  $("#t2").datepicker({
    dateFormat: 'yy-mm-dd'
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
        	<th COLSPAN=4>
			<div class="tiptip">
			  <a href="reports.php" class="button" title="Back"><span class="icon icon63"></span></a>
			 <center>
			  Reports..Activated Cards by Amount
			 </center>
			  <span style="float:right;"><a href="activatedcardsreport.php" class="button" title="Reload"><span class="icon icon158"></span></a></span>
			 </div>
			</th>
          </tr>
        </thead>
        <tbody>
		 <tr>
		   <form id="f2">
		    <td>From: <input type="text" class="inputbox" value="" name="t1" id="t1"></td>
			<td>To: <input type="text" class="inputbox" value="" name="t2" id="t2"></td>
			<td>
			 <select name="t3" class="inputbox">
              <option value="0">Select a status</option>
              <option value="c">Created</option>
			  <option value="a">Activated</option>
             </select>
			</td>
			<td id="dwn"><button type="submit" class="button action blue" onclick="this.disabled=true;" id="gn2"><span class="label">Generate</span></button></td>
		   </form>
		 </tr>
        </tbody>
      </table>
	 </td>
	</tr>
 </table>  
</body>
</html>
