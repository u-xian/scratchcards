<?php
session_start();
$id_profile=$_SESSION['profile_id'];
$username=$_SESSION['username'];
?>
<html>
<head>
<title>::Automatic Cards::</title>
<LINK REL="SHORTCUT ICON" HREF="autopay.ico">
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
        url: "do_changepwdlogon.php",
        data: dataString,
        success: function() {
		 window.location.pathname="/scratchcards/mainuser.php";
        }
		});
         return false;
	});
});
</script>
</head>
<body>
<table align=center>
<tr>
 <td>
  <table align=center id="newspaper-a">
   <form id="f2">
    <thead>
	 <tr>
       <th COLSPAN=2><center>Change Password</center></th>
     </tr>
	</thead>
    <tbody>
     <tr><td class="lbl">Username</td><td align=center><input type="text" class="inputbox" value="<?php echo $username;?>" name="txt1" disabled="disabled"></td></tr>
     <tr><td class="lbl">Old Password</td><td align=center><input type="password" class="inputbox" value="" name="txt2"></td></tr>
	 <tr><td class="lbl">New Password</td><td align=center><input type="password" class="inputbox" value="" name="txt3"></td></tr>
	 <tr><td class="lbl">Confirm Password</td><td align=center><input type="password" class="inputbox" value="" name="txt4"></td></tr>
     <tr><td></td><td align=center id="results"><button class="button action blue" id="vf2"><span class="label">Validate</span></button></td></tr>
	</tbody>
   </form>
  </table>
 </td>
</tr>
</table>
</body>
</html>
