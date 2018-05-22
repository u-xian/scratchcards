<?php
session_start();
$id_profile=$_SESSION['profile_id'];
$username=$_SESSION['username'];
?>
<html>
<head>
<title>::SCMS::..</title>
<link rel="SHORTCUT ICON" href="style/Barcode.ico">
<link href="style/style2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
<script type="text/javascript" src="./jquery/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="./Googleplusbutton/tiptip.css" type="text/css"  media="screen">
<script src="./Googleplusbutton/jquery.tiptip.js"></script>
<script>
		$(document).ready(function() {
		
			// Toggle the dropdown menu's
			$(".dropdown .button, .dropdown button").click(function () {
				if (!$(this).find('span.toggle').hasClass('active')) {
					$('.dropdown-slider').slideUp();
					$('span.toggle').removeClass('active');
				}
       
        // open selected dropown
				$(this).parent().find('.dropdown-slider').slideToggle('fast');
				$(this).find('span.toggle').toggleClass('active');
				
				return false;
			});
			
			// Launch TipTip tooltip
			$('.tiptip a.button, .tiptip button').tipTip();
		
		});
		
		// Close open dropdown slider by clicking elsewhwere on page
		$(document).bind('click', function (e) {
			if (e.target.id != $('.dropdown').attr('class')) {
				$('.dropdown-slider').slideUp();
				$('span.toggle').removeClass('active');
			}
		});
  </script>


<script>
$(document).ready(function()
{
 var profileid ="<?php echo $id_profile;?>";
 $("#noty").hide();
setInterval(function(){
  $.get("update_notifications.php", function(results){

     if((profileid == 4) || (profileid == 3))
	 {
	  $("#noty").show();
      $("#noty").html(results);
	 }
	 else
	 {
	  $("#noty").hide();
	 }
	
  });
},5000);
});
</script>

<script>
$(function() {
  $('#menu2').hide();
  $('#menu1').hover(function() {
      $('#menu2').stop().show();
  }, function(){
      $('#menu2').stop().hide();
  });
});
</script>
<style type="text/css">
 body
 {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-weight: inherit;
	font-style: inherit;
	font-size: 100%;
	vertical-align: baseline;
	background:gray;
}
.wrap 
{
	margin:0 auto;
	width:900px;
}
#header, #footer 
{
    float:left;
    padding:5px 0;
	min-width:100%;
	
}
#header 
{
	background: #f1f1f1;
    border-bottom: 1px solid #e5e5e5;
}
#header .logo 
{
    float:left;
    padding: 5px 5px 5px 5px;
    font: 14px Arial, sans-serif; 
    font-weight:bold;
}
#header .logotext 
{
    float:left;
    padding-top:30px;
    font: 14px Arial, sans-serif;
    font-weight:bold;
}
#header .usernav 
{
    float:right;
	margin-right:20px;
    padding: 5px 5px 5px 5px;
	font: 14px Arial, sans-serif;
}
#content 
{
    overflow:auto;
    background: gray;
    margin: 0px;
    clear:both;
}
#content .left
 {
    float:left;
    width: 20%; 
    margin-top:5px;  
    padding:20px;
    background: white; 
	border: 1px solid #000000;	
}
#content .right
 {
    float:right; 
    width: 75%; 
    margin-top:5px; 
    padding:0px;
    background: white;
    border: 1px solid #000000;	
}
#footer 
{
	background:gray;
	text-align:center;
    margin-top: 2px;
    font-size:10px;
    font-family: Molengo, Arial, Helvetica, sans-serif;
}
ul.menu { list-style-type:none; margin:0px; padding:0px; overflow:hidden; }
li.menu { float:left;margin:2px; padding:3px;text-align:center; }

.submenu
{
 border-top:solid 1px #D9D9D9;
 border-left:solid 1px #D9D9D9;
 border-right:solid 1px #D9D9D9;
 display:block;
 width:250px;
 clear:both;
}
ul.submenu
{
 padding:0;
 margin:0;
 list-style:none;
 background-color: #F3F3F3;
}
ul.submenu li 
{
  border-bottom:solid 1px #D9D9D9;
  font: 12px Arial, sans-serif;
  font-color:#000000;
}
</style>
</head>
<body>

<div id="header">
<span class="logo">
   <img src="style/Barcode-icon.png" align="left" alt="" title="" border=0><br>SCMS
  </span>
  <span class="logotext">
   Scratch Cards Management System
  </span>
  <span class="usernav"><span style="float:right;margin-right:80px;"><b><?php echo $username; ?></b></span><br>
    <a href="mainuser.php" class="button"><span class="icon icon108"></span><span class="label">Home</span></a>
	<div class="dropdown">
	<button class="button"><span class="icon icon96"></span><span class="label">Settings</span><span class="toggle"></span></button>
    <div class="dropdown-slider">
      <a href="changepwdlogon.php" class="ddm" target="iframeID"><span class="label">Change Password</span></a>
    </div> <!-- /.dropdown-slider -->
  </div> <!-- /.dropdown -->
    <a href="index.php" class="button action blue"><span class="label">Logout</span></a></span>
</div>
<div id="content">  
<div class="left"> 
 <table>
 <tr>
  <td>
    <span id="noty"></span>
 </td>
 </tr>
 <tr>
   <td class="menubox">
     <ul class="menu">
    <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
          $result = mysql_query("select a.id,a.menucode as code,a.menuname as menunames,a.pathname from  profil_menu a, profiles_axs b where b.function =a.id and b.profil='$id_profile' and a.status=1 order by a.id");
		   while($row = mysql_fetch_array($result))
           {
			 echo '<li id="'.$row['code'].'" class="menu"><a href="'.$row['pathname'].'" class="button" target="iframeID"><span class="label">'.$row['menunames'].'</span></a></li>';
           }
    ?>
	</ul>
   </td>
  </tr>
 </table>
 </div>  
 <div class="right">     
    <iframe width=100% height=80% align=middle  name="iframeID" frameborder=0 scrolling="auto">
	</iframe>
 </div>
</div>
<div id="footer">
	<div class="wrap">
        &copy; 2012 - Tigo Rwanda Ltd
    </div>
</div>
</body>
</html>
