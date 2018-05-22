<html>
<head>
<script type="text/javascript" src="./jquery/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
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
  
  <style>
  <!--
		a, a:active, a:visited { color: #607890; }
		a:hover { color: #036; }
		
		.buttons {
			background: #F1F1F1;
			padding-bottom: 10px;
			border: 1px solid #D2D2D2;
			width: 800px;
			height:30px;
			margin-bottom: 20px;
			align:center;
		}
		
		body {
			font-family: 'PT Sans', Arial, Helvetica, sans-serif;
			text-align: center;
			margin: 0;
		}
		
	    #container {
			text-align: left;
			margin: 0 auto;
			padding: 40px;
			align:center;
		}
		
		h1, h2, h3, h4, h5 {
			font-family: Molengo, Arial, Helvetica, sans-serif;
			margin: 0 0 14px 0;
			padding: 0;
		}
		
		p {
			margin: 0 0 7px 0;
			padding: 0;
		}
  -->
  </style>
</head>
<body>
  <a href="mainadmin.php" class="button"><span class="icon icon108"></span><span class="label">Home</span><span class="toggle"></span></a>
  <div class="dropdown">
    <a href="#" class="button"><span class="icon icon130"></span><span class="label">Dealer</span><span class="toggle"></span></a>
    <div class="dropdown-slider">
      <a href="createdealer.php" class="ddm" target="iframeID"><span class="icon icon3"></span><span class="label">Add</span></a>
      <a href="editdealer1.php" class="ddm" target="iframeID"><span class="icon icon145"></span><span class="label">Edit</span></a>
    </div> <!-- /.dropdown-slider -->
  </div> <!-- /.dropdown -->
  
  <div class="dropdown">
    <a href="#" class="button"><span class="icon icon191"></span><span class="label">Users</span><span class="toggle"></span></a>
    <div class="dropdown-slider">
      <a href="createuser.php" class="ddm" target="iframeID"><span class="icon icon3"></span><span class="label">Add user</span></a>
      <a href="createlogin.php" class="ddm" target="iframeID"><span class="icon icon3"></span><span class="label">Add login</span></a>
      <a href="edituser.php" class="ddm" target="iframeID"><span class="icon icon145"></span><span class="label">Edit user</span></a>
      <a href="editlogin.php" class="ddm" target="iframeID"><span class="icon icon145"></span><span class="label">Edit login</span></a>
    </div> <!-- /.dropdown-slider -->
  </div> <!-- /.dropdown -->
  
  <div class="dropdown">
    <a href="#" class="button"><span class="icon icon125"></span><span class="label">Mailing</span><span class="toggle"></span></a>
    <div class="dropdown-slider">
      <a href="mail_receiver.php" class="ddm" target="iframeID"><span class="icon icon3"></span><span class="label">Add</span></a>
      <a href="editmailreceiver.php" class="ddm" target="iframeID"><span class="icon icon145"></span><span class="label">Edit</span></a>
    </div> <!-- /.dropdown-slider -->
  </div> <!-- /.dropdown -->
  
   <div class="dropdown">
    <a href="#" class="button"><span class="icon icon196"></span><span class="label">Profile</span><span class="toggle"></span></a>
    <div class="dropdown-slider">
      <a href="createprofile.php" class="ddm" target="iframeID"><span class="icon icon3"></span><span class="label">Add</span></a>
      <a href="#" class="ddm"><span class="icon icon145"></span><span class="label">Edit</span></a>
    </div> <!-- /.dropdown-slider -->
  </div> <!-- /.dropdown -->
   
  <div class="dropdown">
    <a href="#" class="button"><span class="icon icon2"></span><span class="label">Access</span><span class="toggle"></span></a>
    <div class="dropdown-slider">
      <a href="view_profile_access.php" class="ddm" target="iframeID"><span class="icon icon84"></span><span class="label">View</span></a>
	  <a href="add_profile_access.php" class="ddm" target="iframeID"><span class="icon icon3"></span><span class="label">Add</span></a>
      <a href="#" class="ddm"><span class="icon icon145"></span><span class="label">Edit</span></a>
    </div> <!-- /.dropdown-slider -->
  </div> <!-- /.dropdown -->
</body>
</html>
