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

<link rel="stylesheet" href="datepicker/css/datepicker.css" type="text/css" />
<link rel="stylesheet" media="screen" type="text/css" href="datepicker/css/layout.css" />
<script type="text/javascript" src="datepicker/js/datepicker.js"></script>
<script type="text/javascript" src="datepicker/js/eye.js"></script>
<script type="text/javascript" src="datepicker/js/utils.js"></script>
<script type="text/javascript" src="datepicker/js/layout.js?ver=1.0.2"></script>

<script language="javascript" type="text/javascript">
 function dispsno(idactno) 
	{	
	  var actid = idactno.id;
	  var actname = idactno.name;
	  var fname =actname+'.hia';
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
 function onDownload() {
    document.location = 'data:Application/octet-stream,' +
                         encodeURIComponent(dataToDownload);
}
</script>
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
        	<th COLSPAN=4><center>Download HIA File</center></th>
          </tr>
		  <tr>
        	<th scope="col">Date & Time Creation </th>
			<th scope="col">Dealer</th>
            <th scope="col">Activation No</th>
			<th scope="col"><center>Action</center>(Right-click and choose Save Target as..)</th>
          </tr>
        </thead>
        <tbody>
        <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
          $result = mysql_query("select a.id,a.creation_date,a.creation_time,a.actno,b.dealername,a.othername from activationno a, dealers b where a.dealerid=b.id and a.billingconfirm=0 and a.status=1");
		   while($row = mysql_fetch_array($result))
           {
		    $fname='./output/'.$row["actno"].'.hia';
		?>
		 <tr><td><?php echo $row['creation_date'].' '.$row['creation_time']; ?></td><td><?php echo $row['dealername'].' '.$row['othername']; ?></td><td class="nav"><?php echo $row['actno']; ?></td><td><a href="<?php echo $fname; ?>" class="button action blue"><span class="label">Download</span></a></td></tr>
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
