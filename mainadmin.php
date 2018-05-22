<?php
session_start();
$id_profile=$_SESSION['profile_id'];
$username=$_SESSION['username'];
?>
<html>
<head>
<title>::SCMS::..</title>
<link rel="SHORTCUT ICON" href="style/Barcode.ico">
<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
<script type="text/javascript" src="./jquery/jquery-1.7.2.min.js"></script>
<style>
  <!--
      a, a:active, a:visited { color: #607890; }
      a:hover { color: #036; }
	 .header-bar {
         width:100%;
         float:left;
         background: #f1f1f1;
         border-bottom: 1px solid #e5e5e5;
        }
        .wrapper {overflow: hidden; margin: 0 auto; background: none; }
        .logo {
		float:left;
                padding: 5px 5px 5px 5px;
                font: 14px Arial, sans-serif; 
                font-weight:bold;
	}
	.logotext{
           float:left;
           padding-top:30px;
           font: 14px Arial, sans-serif;
           font-weight:bold;
         }
	.usernav {
		float:right;
		margin:0;
                padding: 5px 5px 5px 5px;
          }
         .footer-bar{
         height: 30px;
         background: #f1f1f1;
         border-bottom: 1px solid #e5e5e5;
         text-align:center;
         margin: 2px 2px 2px 2px;
         padding-top : 10px;
         font-size:10px;
         font-family: Molengo, Arial, Helvetica, sans-serif;
        }
		.hr-line {
		 height:1px;
		 border: 1px solid #e5e5e5;
		 overflow: hidden;
        }
		.clearBoth {
         clear: both;
        }
  -->
  </style>
</head>
<body>
<div class="header-bar">
  <span class="logo">
   <img src="style/Barcode-icon.png" align="left" alt="" title="" border=0>
  </span>
  <span class="logotext">SCMS -
   Scratch Cards Management System
  </span>
  <span class="usernav"><b><?php echo $username; ?></b><br>
    <button class="button"><span class="icon icon96"></span><span class="label">Settings</span></button>
    <a href="logout.php" class="button action blue"><span class="label">Logout</span></a></span>
</div>
<div><?php include "navigation.php"; ?></div><br>
<div class="clearBoth"></div>
<div class="hr-line"></div>
<iframe width=100% height=80% align=middle  name="iframeID" frameborder=0 scrolling="auto"></iframe>
<div class="footer-bar">&copy; - <?php echo date("Y"); ?> Tigo Rwanda Ltd</div>
</body>
</html>
