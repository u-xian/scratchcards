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
        url: "do_changeloginstatus.php",
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
        	<th COLSPAN=5>
			<center>
			  Edit Logins
			  <div class="tiptip">
			  <a href="editlogin.php" class="button" title="Reload"><span class="icon icon157"></span></a>
			  </div>
			</center>
			</th>
          </tr>
		  <tr>
        	<th scope="col">Loginame</th>
			<th scope="col">Profile Name</th>
			<th scope="col">Location</th>
			<th scope="col">Current Status</th>
			<th scope="col"><center>Action</center></th>
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
		  $query="select id,loginname,case when profil=2 then 'Service Center' when profil=3 then 'Accounting'when profil=4 then 'Billing'end profile_name ,location,status from logins where id <> 1 limit $start,$per_page";
          $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		   while($row = mysqli_fetch_array($result))
           {
		      $cid=$row["id"];
		      if ($row['status']=="0")
			  {
                $sts1="<span style='color:#3A8E00;'>Not yet logon</span>";
                $sts2="<button class='action blue'><span class='label'>Delete</span></button>";
			  }
			  else if ($row['status']=="1")
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
		    <span class="text"><?php echo $row['loginname']; ?></span>
		  </td>
		  <td>
		    <span class="text"><?php echo $row['profile_name']; ?></span>
		  </td>
		  <td>
		    <span class="text"><?php echo $row['location']; ?></span>
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
