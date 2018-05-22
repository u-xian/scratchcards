<html>
<head>
<link href="style/style2.css" rel="stylesheet" type="text/css" />
<link href="style/style3.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
<script type="text/javascript" src="./jquery/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript">
function dispsno(idactno,sts) 
{	
	  var actid = idactno.id;
	  var sts1 = sts;
	  var dataString = 'id='+ actid +'&statut='+sts1;
	  $.ajax({
        type: "POST",
        url: "do_changeuserstatus.php",
        data: dataString,
        success: function() {
         $("#"+actid).hide();
        }
	});
}
</script>
<!-- Using TipTip jQuery plugin for the tooltips --> 
  <link rel="stylesheet" href="./Googleplusbutton/tiptip.css" type="text/css"  media="screen"> 
	<script src="./Googleplusbutton/jquery.tiptip.js"></script> 
  
	<script> 
		$(document).ready(function() {
		
			// Toggle the dropdown menu's
			$(".dropdown .button, .dropdown button").click(function () {
				if (!$(this).find('span.toggle').hasClass('active')) {
					$('.dropdown-slider').slideUp();
					$('span.toggle').removeClass('active');
				}
       
        // open selected dropown
				$(this).parent().find('.dropdown-slider').slideToggle('fast');
				$(this).find('span.toggle').toggleClass('active');
				
				return false;
			});
			
			// Launch TipTip tooltip
			$('.tiptip a.button, .tiptip button').tipTip();
		
		});
		
		// Close open dropdown slider by clicking elsewhwere on page
		$(document).bind('click', function (e) {
			if (e.target.id != $('.dropdown').attr('class')) {
				$('.dropdown-slider').slideUp();
				$('span.toggle').removeClass('active');
			}
		});
  </script> 
<script type="text/javascript">
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
$("#txt1_"+ID).hide();
$("#t1_"+ID).show();
$("#txt2_"+ID).hide();
$("#t2_"+ID).show();
$("#txt3_"+ID).hide();
$("#t3_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var s1=$("#t1_"+ID).val();
var s2=$("#t2_"+ID).val();
var s3=$("#t3_"+ID).val();

var dataString ='v1='+ ID +'&v2='+ s1 +'&v3='+ s2 +'&v4='+s3;

//alert(dataString);

$("#txt1_"+ID).html('<img src="load.gif" />'); // Loading image

if(ID.length > 0)
{
 $.ajax({
 type: "POST",
 url: "update_user.php",
 data: dataString,
 cache: false,
 success: function(html)
         {
           $("#txt1_"+ID).html(s1);
           $("#txt2_"+ID).html(s2);
           $("#txt3_"+ID).html(s3);
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
<table align=center cellspacing=10 width=1000>
<tr>
<td  id="main" valign="top">
 <table  width=1000>
    <tr>
	 <td>
	   <table id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=5>
			<center>
			  Edit User 
			  <div class="tiptip">
			  <a href="edituser.php" class="button" title="Reload"><span class="icon icon157"></span></a>
			  </div>
			</center>
			</th>
          </tr>
		  <tr>
        	<th scope="col">Names</th>
			<th scope="col">Function</th>
			<th scope="col">Email</th>
			<th scope="col">Current Status</th>
			<th scope="col"><center>Enable/Disable</center></th>
          </tr>
        </thead>
        <tbody>
        <?php 
          require_once('Connections/conn.php');
          mysqli_select_db($conn,$database_conn);
          $per_page = 5; 

          if($_GET)
          {
            $page=$_GET['page'];
          }

          //get table contents
          $start = ($page-1)*$per_page;
          $result = mysqli_query($conn,"select id,names,function,email,status from users where id <> 1 limit $start,$per_page") or die(mysqli_error($conn));
		   while($row = mysqli_fetch_array($result))
           {
		      $cid=$row["id"];
		      if ($row['status']=="1")
			  {
                            $sts1="<span style='color:#3A8E00;'>Enabled</span>";
			  //$sts2="<img src='./style/turnoff.png' border=0 alt='Disable'>";
                            $sts2="<button class='action red'><span class='label'>Disable</span></button>";
			  }
			  else
			  {
                           $sts1="<span style='color:#D64937;'>Disabled</span>";
			   $sts2="<button class='action green'><span class='label'>Enable</span></button>";
			  }
		?>
		<tr id="<?php echo $cid; ?>" class="edit_tr">
		  <td class="edit_td">
		    <span id="txt1_<?php echo $cid; ?>" class="text"><?php echo $row['names']; ?></span>
            <input type="text" value="<?php echo $row['names']; ?>" class="editbox" id="t1_<?php echo $cid; ?>" />
		  </td>
		  <td class="edit_td">
		    <span id="txt2_<?php echo $cid; ?>" class="text"><?php echo $row['function']; ?></span>
            <input type="text" value="<?php echo $row['function']; ?>" class="editbox" id="t2_<?php echo $cid; ?>" />
		  </td>
		  <td class="edit_td">
		    <span id="txt3_<?php echo $cid; ?>" class="text"><?php echo $row['email']; ?></span>
            <input type="text" value="<?php echo $row['email']; ?>" class="editbox" id="t3_<?php echo $cid; ?>" />
		  </td>
		  <td class="nav">
		    <?php echo $sts1; ?>
		  </td>
		  <td>
		    <a href="#" id="<?php echo $cid; ?>"  onclick="javascript:dispsno(this,<?php echo $row['status']; ?>)"><?php echo $sts2; ?></a>
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
