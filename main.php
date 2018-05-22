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
<script type="text/javascript" src="./jquery/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript">
$(function(){
    $("#dl1").change(function(){
        dataString = $("#f1").serialize();
        $.ajax({
        type: "POST",
        url: "dealeractivno.php",
        data: dataString,
        success: function() {
		 $("#n3").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf2").click(function(){
        dataString = $("#f2").serialize();
		$("#box300").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards300.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf3").click(function(){
        dataString = $("#f3").serialize();
		$("#box500").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards500.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf4").click(function(){
        dataString = $("#f4").serialize();
		$("#box1000").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards1000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf5").click(function(){
        dataString = $("#f5").serialize();
		$("#box2000").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards2000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf6").click(function(){
        dataString = $("#f6").serialize();
		$("#box5000").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards5000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf7").click(function(){
        dataString = $("#f7").serialize();
		$("#box10000").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards10000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});
</script>
</head>
<body>
<table class="header" align=center width=800>
   <tr>
    <td>
      <center>Automatic Cards</center>
    </td>
   </tr>
</table>
<div id="footer">
 <div class="header-1">
  <span><b>Welcome, <span style="color:#FF6600;"><?php echo $username; ?></span><br><a href="logout.php" class="nav">Logout</a></b></span><span style="float:right;"><b><?php echo date("l, j F Y H:i");?></b></span>
 </div>
 </div>
<br>
<table align=center width=800>
<tr>
  <td  valign=top width=40%>
     <table class="box1" align=right> 
	     <tr><th class="menu">MENU</th></tr> 
		 <tr><td class="nav"><a href="main.php">Home</a></td></tr> 
		 <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
          $result = mysql_query("select a.menucode as code,a.menuname as menunames,a.pathname from  profil_menu a, profiles_axs b where b.function =a.id and b.profil='$id_profile' order by a.id");
		   while($row = mysql_fetch_array($result))
           {
			echo '<tr><td class="nav" id="'.$row['code'].'"><a href="'.$row['pathname'].'">'.$row['menunames'].'</a></td></tr>';
           }
          ?>
		 <tr><td class="nav"><a href="logout.php">Logout</a></td></tr>  
      </table>
   </td>
   
   <td id="main" class="box9" width=60%>
     Welcome to Scratch cards management.<br><br>
	 
    Choose a function on left menu 
   </td>
   
</tr>
 </table>
</body>
</html>
