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
<script language="javascript" type="text/javascript">
 function dispsno(idactno) 
	{	
	  var actid = idactno.id;
	  var actno = idactno.name;
	  var x2 =".hia";
	  var fname = actno.concat(x2);
	  $("#"+actid).html('<center><img src="./images/loader.gif" width=100></center>');
	   $.ajax({
        type: "POST",
        url: "load_data.php",
        data: "id3="+actid,
        success: function() {
		  $("#"+actid).html('<center><a href="./output/'+fname+'" id="dwn2"><span class="label">Download</span></a></center>');
        }
		});
	}
</script>
</head>
<body>
<table cellspacing=10 width=1000>
<tr>
<td id="main" valign="top">
 <table width=900>
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=5><center>Create HIA Data</center></th>
          </tr>
		  <tr>
        	<th scope="col">Date & Time</th>
			<th scope="col">Dealer</th>
			<th scope="col">Raised by</th>
            <th scope="col">Activation No</th>
			<th scope="col"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
        <?php 
		  require_once('Connections/conn.php');
		   mysqli_select_db($conn,$database_conn);
		   $sql = "select a.id,a.creation_date,a.creation_time,a.actno,b.dealername,a.othername,c.loginname  from activationno a, dealers b,logins c  where a.dealerid=b.id and c.id=a.userid and a.status=1 and a.confirmation=1  and  a.finconfirm=1 and a.billingconfirm=0 and a.hiacreated=0";
		   $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		   while($row = mysqli_fetch_array($result))
           {
		?>
		 <tr>
		 	<td><?php echo $row['creation_date'].' '.$row['creation_time']; ?></td>
		 	<td><?php echo $row['dealername'].' '.$row['othername']; ?></td>
		 	<td class="nav"><?php echo $row['loginname']; ?></td>
		 	<td class="nav"><?php echo $row['actno']; ?></td>
		 	<td><a href="#" id="<?php echo $row["id"]; ?>" name="<?php echo $row["actno"]; ?>" onclick="javascript:dispsno(this)" class="button action blue"><span class="label">Load Data</span></a></td>
		 </tr>
        <?php      
		   }
        ?>
        </tbody>
      </table>
	 </td>
	</tr>
 </table>  
</body>
</html>
