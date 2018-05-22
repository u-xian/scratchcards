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
        url: "do_profile_access.php",
        data: dataString,
        success: function() {
                 $("#newspaper-a").hide();
                 $("#vf2").hide();
		 $("#results").show();
         $("#results").html('<span class="label1"><center>Access granted!</center></span>');
		 
		 //$("#results").html(data);
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
	       <th COLSPAN=2><center><b>Access to a profile</b></center></th>
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
                      $result = mysqli_query($conn,"SELECT id,profilename FROM profiles where status=0");
                      while($row = mysqli_fetch_array($result))
                      {
                            echo '<option value="'.$row['id'].'">'.$row['profilename'].'</option>';
                      }
               ?>
               </select>
              </td> 
            </tr>
			<tr><th COLSPAN=2 align="center"><b>General</b></th></tr>
			<?php
              require_once('Connections/conn.php');
              mysqli_select_db($conn,$database_conn);
	          $sql1="select id,menuname from  profil_menu where status=1 and profile_type='general'";
              $result1 = mysqli_query($conn,$sql1);
	          while($row1 = mysqli_fetch_array($result1))
              {
            ?>
	        <tr>
	          <td><?php echo $row1['menuname']; ?></td>
	          <td><input type="checkbox" name="t2[]" value="<?php echo $row1['id']; ?>"></td>
		    </tr>
			<?php	
             }
            ?>
			<tr><th COLSPAN=2 align="center"><b>Warehouse</b></th></tr>
			<?php
              require_once('Connections/conn.php');
             mysqli_select_db($conn,$database_conn);
	          $sql2="select id,menuname from  profil_menu where status=1 and profile_type='warehouse'";
              $result2 = mysqli_query($conn,$sql2);
	          while($row2 = mysqli_fetch_array($result2))
              {
            ?>
	        <tr>
	          <td><?php echo $row2['menuname']; ?></td>
	          <td><input type="checkbox" name="t2[]" value="<?php echo $row2['id']; ?>"></td>
		    </tr>
			<?php	
             }
            ?>
			<tr><th COLSPAN=2 align="center"><b>Accounting</b></th></tr>
			<?php
              require_once('Connections/conn.php');
              mysqli_select_db($conn,$database_conn);
	          $sql3="select id,menuname from  profil_menu where status=1 and profile_type='accounting'";
              $result3 = mysqli_query($conn,$sql3);
	          while($row3 = mysqli_fetch_array($result3))
              {
            ?>
	        <tr>
	          <td><?php echo $row3['menuname']; ?></td>
	          <td><input type="checkbox" name="t2[]" value="<?php echo $row3['id']; ?>"></td>
		    </tr>
			<?php	
             }
            ?>
			<tr><th COLSPAN=2 align="center"><b>Billing</b></th></tr>
			<?php
              require_once('Connections/conn.php');
              mysqli_select_db($conn,$database_conn);
	          $sql4="select id,menuname from  profil_menu where status=1 and profile_type='billing'";
              $result4 = mysqli_query($conn,$sql4);
	          while($row4 = mysqli_fetch_array($result4))
              {
            ?>
	        <tr>
	          <td><?php echo $row4['menuname']; ?></td>
	          <td><input type="checkbox" name="t2[]" value="<?php echo $row4['id']; ?>"></td>
		    </tr>
			<?php	
             }
            ?>
            <tr>
		     <td COLSPAN=2 align="center"><button id="vf2" class="button action blue" style="float:right;"><span class="label">Save</span></button></td>
	        </tr>  
        </form>	
        </tbody>
       </table>
	 </td>
</table>  
</body>
</html>
