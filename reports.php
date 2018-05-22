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
        	<th COLSPAN=4 width=400><center>Reports</center></th>
          </tr>
        </thead>
        <tbody>
		 <tr>
		    <td width=400>
			 <ul>
			  <li><a href="activatedcardsreport.php">Activated Cards by Amount</a></li>
			  <li><a href="activatedcardsreport2.php">Activated Cards by Serial Number</a></li>
			  <li><a href="activatedcardsreport3.php">View Activation form</a></li>
			 </ul>
			</td>
		 </tr>
        </tbody>
      </table>
	 </td>
	</tr>
 </table>  
</body>
</html>
