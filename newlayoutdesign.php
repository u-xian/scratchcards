<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="layout/style.css" type="text/css" media="screen, projection" />
	<!--[if lte IE 6]><link rel="stylesheet" href="layout/style_ie.css" type="text/css" media="screen, projection" /><![endif]-->
	<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
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
.logo {
	float:left;
    padding: 5px 5px 5px 5px;
    font: 14px Arial, sans-serif; 
    font-weight:bold;
	}
.logotext{
           float:left;
           padding-top:30px;
           font: 14px Arial, sans-serif;
           font-weight:bold;
         }
.usernav {
		float:right;
		margin:0;
        padding: 5px 5px 5px 5px;
        }
#latestgames {
    background: #c4c4c4;
	width: 475px;
	margin: 0px auto;
}
 
#latestgames ul {
    list-style: none;
}
 
#latestgames ul li {
	display: inline-block;
    text-align: center;
	padding: 20px;
}


  -->
</style>
</head>

<body>

<div id="wrapper">

	<div id="header">
	  <span class="logo">
       <a href="mainadmin.php" ><img src="style/Barcode-icon.png" align="left" alt="" title="" border=0></a><br>SCMS
      </span>
      <span class="logotext">
        Scratch Cards Management System
      </span>
      <span class="usernav">
	   <b><?php echo $username; ?></b><br>
       <button class="button"><span class="icon icon96"></span><span class="label">Settings</span></button>
       <a href="index.php" class="button action blue"><span class="label">Logout</span></a>
      </span>
	</div><!-- #header-->

	<div id="middle">

		<div id="container">
			<div id="content">
				po
			</div><!-- #content-->
		</div><!-- #container-->

		<div class="sidebar" id="sideLeft">
              <h3>Latest Games</h3>
              <ul>
               <li>
			    <div id="game1">
                <strong>Game Name <br />
                Game info</strong>
               </div></li>
    <li><div id="game2">
        <strong>Game Name <br />
        Game info</strong>
    </div></li>
    <li><div id="game3">
        <strong>Game Name <br />
        Game info</strong>
    </div></li>
    </ul>

    <ul>
    <li><div id="game4">
        <strong>Game Name <br />
        Game info</strong>
    </div></li>
    <li><div id="game5">
        <strong>Game Name <br />
        Game info</strong>
    </div></li>
    <li><div id="game6">
        <strong>Game Name <br />
        Game info</strong>
    </div></li>
    </ul>
    <ul>
    <li><div id="game7">
    <strong>Game Name <br />
    Game info</strong>
    </div></li>
    <li><div id="game8">
        <strong>Game Name <br />
     Game info</strong>
     </div></li>
    <li><div id="game9">
    <strong>Game Name <br />
        Game info</strong>
    </div></li>
 </ul>
<!--end games-->

	    </div><!-- #middle-->

	<div id="footer">
		&copy; 2012 Tigo Rwanda Ltd
	</div><!-- #footer -->

</div><!-- #wrapper -->

</body>
</html>