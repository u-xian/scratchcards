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
        url: "do_createlogin.php",
        data: dataString,
        success: function() {
                 $("#newspaper-a").hide();
                 $("#vf2").hide();
		 $("#results").show();
         $("#results").html('<span class="label1"><center>Login created!</center></span>');
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
	       <th COLSPAN=4><center><b>Add new login</b></center></th>
	    </tr>  
            </thead>
            <tbody>
        <tr>
            <td>User</td>
            <td>
               <select name="t1" class="inputbox">
                <option value="0">Select a user</option>
                <?php
                      require_once('Connections/conn.php');
                      mysqli_select_db($conn,$database_conn);
                      $result = mysqli_query($conn,"SELECT id,names FROM users where id <> 1");
                      while($row = mysqli_fetch_array($result))
                      {
                            echo '<option value="'.$row['id'].'">'.$row['names'].'</option>';
                      }
               ?>
               </select>
            </td>
        </tr>
		<tr>
          <td>Location</td>
          <td>
		    <select name="t2" class="inputbox">
			  <option value="">Select  location</option>
			  <option value="Head Quarter">Head Quarter</option>
			  <option value="Muhanga">Muhanga</option>			  
			  <option value="Huye">Huye</option>
			  <option value="Rusizi">Rusizi</option>
			  <option value="Rubavu">Rubavu</option>
			  <option value="Musanze">Musanze</option>
			  <option value="Nyagatare">Nyagatare</option>
			  <option value="Remera">Remera</option>
			</select>
		  </td>
        </tr>
        <tr>
           <td>Login name</td>
           <td><input type="text" class="inputbox" value="" name="t3"></td>
        </tr>
	    <tr>
	      <td>Password</td>
	      <td><input type="password" class="inputbox" value="" name="t4"></td>
		</tr>
            <tr>
              <td>Confirm password</td>
              <td><input type="password" class="inputbox" value="" name="t5"></td>
                </tr>
	    <tr>
	      <td>Profile</td>
	      <td>
               <select name="t6" class="inputbox">
                <option value="0">Select a Profile</option>
                <?php 
		      require_once('Connections/conn.php');
		      mysql_select_db($database_conn, $conn);
                      $result = mysql_query("SELECT id,profilename FROM profiles where id <> 1");
		      while($row = mysql_fetch_array($result))
                      {
			    echo '<option value="'.$row['id'].'">'.$row['profilename'].'</option>'; 
                      }
               ?>
               </select>
              </td>
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
