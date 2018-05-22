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
        url: "do_updateuser.php",
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
$(function(){
    $("#dl1").change(function(){
       var userid = $("#dl1").val();	
       window.location.href="<?php echo $PHP_SELF; ?>?id3="+userid; 	   
	});
});
</script>
</head>
<body>
<table align="center">
<td>
 <span id="results"></span>
 <table id="newspaper-a" width=200> 
  <form id="f2">
  <thead>
	<tr>
	 <th COLSPAN=4><center><b>Edit user</b></center></th>
	</tr>  
  </thead>
 </table>
 <br>
 <br>
 <table id="newspaper-b" width=300> 
 <tbody>
  <form id="f3">
    <tr>
    <td>
	 Choose user
	</td>
    <td>
	 <select name="t1" class="inputbox" id="dl1">
                <option value="0">Select a user</option>
                <?php
                      require_once('Connections/conn.php');
                      mysql_select_db($database_conn, $conn);
                      $result = mysql_query("SELECT * FROM users where id <> 1");
                      while($row = mysql_fetch_array($result))
                      {
                            echo '<option value="'.$row['id'].'">'.$row['names'].'</option>';
                      }
               ?>
     </select>
	</td>
    </tr>
  </form>	
    </tbody>
 </table>
 <table id="newspaper-b" width=300> 
 <tbody>
  <form id="f3">
    <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
		   $iduser=$_GET['id3'];
		   $dealerfullname="";
          $result = mysql_query("select id,names,function,location,email,status from users where id='$iduser'");
		   while($row = mysql_fetch_array($result))
           {
		     $userid=$row["id"];
		     $v1=$row['names'];
			 $v2=$row['function'];
			 $v3=$row['location'];
			 $v4=$row['email'];
			 $v5=$row['status'];
		   }
     ?>
    <tr>
     <td>Names</td>
     <td><input type="text"  class="inputbox9" value="<?php echo $v1; ?>" name="t1"></td>
    </tr>
	<tr>
	 <td>Function</td>
	 <td><input type="text"  class="inputbox9" value="<?php echo $v2; ?>" name="t2"></td>
    </tr>
    <tr>
     <td>Location</td>
     <td><input type="text"  class="inputbox9" value="<?php echo $v3; ?>" name="t3"></td>
    </tr>
    <tr>
     <td>Email</td>
	 <td><input type="text" class="inputbox9" value="<?php echo $v4; ?>"  name="t4"></td>
    </tr>
	<tr>
     <td>Status</td>
	 <td><input type="text" class="inputbox9" value="<?php echo $v5; ?>"  name="t5"></td>
    </tr>
    <tr>
	<td COLSPAN=4 align="center">
	  <input type="hidden" value="<?php echo $userid; ?>"  name="t5">
	  <button id="vf2" class="button action blue" style="float:right;"><span class="label">Save</span></button>
	</td>
	</tr>  
  </form>	
    </tbody>
 </table>
 </td>
</table>  
</body>
</html>
