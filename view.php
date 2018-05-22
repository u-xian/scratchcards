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
    $("#vf2").click(function(){
        dataString = $("#f2").serialize();
        $.ajax({
        type: "POST",
        url: "do_view.php",
        data: dataString,
        success: function(result) {
		 $("#results").show();
         $("#results").html(result);
        }
		});
         return false;
	});
$("#d1").datepicker({
    dateFormat: 'yy-mm-dd'
   });
  $("#d2").datepicker({
    dateFormat: 'yy-mm-dd'
   }); 
});
</script>
</head>
<body>
<table  width=850 align=center valign="top">
 <tr>
  <td id="rounded-corner">
   <span style="float:left;vertical-align:top"><a href="view.php" class="button" title="Refresh"><span class="icon icon158"></span></a></span><br><br>
    <form id="f2">
	 <fieldset id="f1">
	  <legend>Select User & Date</legend>
	  User  <select name="t1" class="inputbox" id="dl1">
        <option value="0">Select a user</option>
          <?php
            require_once('Connections/conn.php');
            mysql_select_db($database_conn, $conn);
            $result = mysql_query("select b.id,a.names from users a, logins b where a.id=b.user_id and b.profil=2");
            while($row = mysql_fetch_array($result))
            {
               echo '<option value="'.$row['id'].'">'.$row['names'].'</option>';
            }
           ?>
      </select>
	  Date   From: <input type="text" class="inputbox" value="" name="d1" id="d1">
	  To:   <input type="text" class="inputbox" value="" name="d2" id="d2"><br>	  
	 <span style="float:right;vertical-align:middle"><button class="button action blue" id="vf2"><span class="label">Go</span></button></span>
    </fieldset>
	</form>
   </td>
 </tr>
	<tr>
	 <td>
	  <span id="results"></span>
	 </td>
	</tr>
	</table>
</body>
</html>
