<?php
session_start();
$id_profile=$_SESSION['profile_id'];
$username=$_SESSION['username'];
$user_id=$_SESSION['id_user'];
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
	  window.location.href="<?php echo $PHP_SELF; ?>?id2="+actid; 
	   $("#corr1").show();
	   $("#corr").hide();
	}
function deleteactivno(actnoid) 
	{	
	 var activid = actnoid.id; 
	  $.ajax({
        type: "POST",
        url: "do_correction.php",
		data: "id4="+ activid,
        success: function() {
		 $("#"+activid).hide();
        }
		});
    }		
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
$("#first_"+ID).hide();
$("#last_"+ID).hide();
$("#last1_"+ID).hide();
$("#first_input_"+ID).show();
$("#last_input_"+ID).show();
$("#last1_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();
var last=$("#last_input_"+ID).val();
var last1=$("#last1_input_"+ID).val();
var dataString = 'id='+ ID +'&batchno='+first+'&serialno1='+last+'&serialno2='+last1;
$("#first_"+ID).html('<img src="load.gif" />'); // Loading image

if(first.length > 0 && last.length > 0)
{

$.ajax({
type: "POST",
url: "table_edit_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
$("#first_"+ID).html(first);
$("#last_"+ID).html(last);
$("#last1_"+ID).html(last1);
}
});
}
else
{
alert('Enter something.');
}

});

// Edit input box click action
$(".editbox").mouseup(function() 
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>
</head>
<body>
<table cellspacing=10>
<tr>
<td id="main" valign="top">
 <table width=900>
    <tr>
	 <td>
	   <table  id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=5><center>Dealer & Activation No</center></th>
          </tr>
		  <tr>
        	<th scope="col">Date & Time Creation</th>
			<th scope="col">Dealer</th>
            <th scope="col">Activation No</th>
			<th scope="col">Username</th>
			<th scope="col"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
        <?php 
		  require_once('Connections/conn.php');
       mysqli_select_db($conn,$database_conn);
          $sql = "select a.id,a.creation_date,a.creation_time,a.actno,b.dealername,c.loginname,a.othername from activationno a, dealers b,logins c where a.dealerid=b.id and c.id=a.userid and a.confirmation=0 and a.userid='$user_id'";
          $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		   while($row = mysqli_fetch_array($result))
           {
		?>
		 <tr id="<?php echo $row["id"]; ?>">
		   <td><?php echo$row['creation_date'].' '.$row['creation_time']; ?></td>
		   <td><?php echo $row['dealername'].' '.$row['othername']; ?></td>
		   <td class="nav"><a href="#" id="<?php echo $row["id"]; ?>" onclick="javascript:dispsno(this)"><?php echo $row['actno']; ?></a></td>
		   <td><?php echo $row['loginname']; ?></td>
		   <td><a href="#" id="<?php echo $row["id"]; ?>" onclick="javascript:deleteactivno(this)" class="button action red"><span class="label">Delete</span></a></td></tr>
        <?php      
		   }
        ?>
        </tbody>
      </table>
	 </td>
	</tr>
	<tr>
	 <td>
	   <table id="newspaper-a" width=600> 
	    <thead>
         <tr>
          <th COLSPAN=4><center>Batch & Serial Numbers</center></th>
         </tr>
         <tr>
          <th scope="col" width="200">Denomination</th>
          <th scope="col" width="200"><center>Batch</center></th>
          <th scope="col" width="200"><center>Start Serial</center></th>
		   <th scope="col" width="200"><center>End Serial</center></th>
        </tr>
      </thead>
     <tbody>
       <?php
        require_once('Connections/conn.php');
        $id=$_GET['id2'];
        mysqli_select_db($conn,$database_conn);
        $sql = "select a.id,b.label,a.batch,a.start_serialnumber,a.end_serialnumber  from cardsrequest1 a , denomination b where a.denom_id=b.id and a.act_id='$id'";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        while($row = mysqli_fetch_array($result))
        {
		      $cid=$row['id'];
          $lbl=$row['label'];
          $batch=$row['batch'];
          $sn1=$row['start_serialnumber'];
		      $sn2=$row['end_serialnumber'];
       ?>
	    <tr id="<?php echo $cid; ?>" class="edit_tr">
         <td width="150"><?php echo $lbl; ?></td>
         <td class="edit_td" width="150">
           <span id="first_<?php echo $cid; ?>" class="text"><?php echo $batch; ?></span>
           <input type="text" value="<?php echo $batch; ?>" class="editbox" id="first_input_<?php echo $cid; ?>" />
         </td>

         <td class="edit_td" width="150">
          <span id="last_<?php echo $cid; ?>" class="text"><?php echo $sn1; ?></span> 
          <input type="text" value="<?php echo $sn1; ?>" class="editbox" id="last_input_<?php echo $cid; ?>"/>
         </td>
		 
		 <td class="edit_td" width="150">
          <span id="last1_<?php echo $cid; ?>" class="text"><?php echo $sn2; ?></span> 
          <input type="text" value="<?php echo $sn2; ?>" class="editbox" id="last1_input_<?php echo $cid; ?>"/>
         </td>
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
