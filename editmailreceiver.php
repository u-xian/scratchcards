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
        url: "do_changemailreceiverstatus.php",
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
        	<th COLSPAN=4>
			<center>
			  Edit Mail Receiver
			  <div class="tiptip">
			  <a href="editmailreceiver.php" class="button" title="Reload"><span class="icon icon157"></span></a>
			  </div>
			</center>
			</th>
          </tr>
		  <tr>
        	<th scope="col">Names</th>
			<th scope="col">Email</th>
			<th scope="col">Current Status</th>
			<th scope="col"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
        <?php 
          require_once('Connections/conn.php');
          mysql_select_db($database_conn, $conn);

          //get table contents
          $start = ($page-1)*$per_page;
		  $query="select id,names,email,status from mail_receivers";
          $result = mysql_query($query);
		   while($row = mysql_fetch_array($result))
           {
		      $cid=$row["id"];
		      if ($row['status']=="1")
			  {
                $sts1="<span style='color:#3A8E00;'>Enabled</span>";			  
                $sts2="<button class='action red'><span class='label'>Disable</span></button>";
			  }
			  else 
			  {	
				$sts1="<span style='color:#D64937;'>Disabled</span>";
			    $sts2="<button class='action green'><span class='label'>Enable</span></button>";
			  }
			  
		?>
		<tr id="<?php echo $cid; ?>">
		  <td>
		    <span class="text"><?php echo $row['names']; ?></span>
		  </td>
		  <td>
		    <span class="text"><?php echo $row['email']; ?></span>
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
