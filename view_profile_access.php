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
$(document).ready(function()
{
 $("#profile").change(function()
  {
    dataString = $("#f2").serialize();
   $.ajax
   ({
    type: "POST",
    url: "do_view_profile_access.php",
    data: dataString,
    cache: false,
    success: function(html){
     $("#results").html(html);
    } 
   });
  });
});
</script>
</head>
<body>
<table align="center">
<tr>
<td>
	   <table id="newspaper-a"> 
	    <form id="f2">
        <thead>
	     <tr>
	       <th COLSPAN=2><center><b>View Profile Access</b></center></th>
	     </tr>  
        </thead>
        <tbody>
            <tr>
              <td>Profile</td>
              <td>
               <select name="t1" class="inputbox" id="profile">
                <option value="0">Select a Profile</option>
                <?php
                      require_once('Connections/conn.php');
                      mysqli_select_db($conn,$database_conn);
                      $result = mysqli_query($conn,"SELECT id,profilename FROM profiles where id <> 1");
                      while($row = mysqli_fetch_array($result))
                      {
                            echo '<option value="'.$row['id'].'">'.$row['profilename'].'</option>';
                      }
               ?>
               </select>
              </td>
            </tr> 
        </form>	
        </tbody>
      </table>
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
