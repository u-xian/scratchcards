<html>
<head>
<title>::SCMS::..</title>
<link rel="SHORTCUT ICON" href="style/Barcode.ico">
<link href="style/style2.css" rel="stylesheet" type="text/css" />
<link href="style/style3.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
<style>
  <!--
    a, a:active, a:visited { color: #607890; }
    a:hover { color: #036; }
	.header-bar 
	{
        width:100%;
        float:left;
        background: #f1f1f1;
        border-bottom: 1px solid #e5e5e5;
		margin: 0 auto;
    }
     .logo 
	{
		float:left;
        padding: 5px 5px 5px 5px;
        font: 14px Arial, sans-serif; 
        font-weight:bold;
	}
	.logotext
	{
        float:left;
        padding-top:30px;
        font: 14px Arial, sans-serif;
        font-weight:bold;
    }
    .footer-bar
	{
        height: 30px;
        background: #f1f1f1;
        border-bottom: 1px solid #e5e5e5;
        text-align:center;
        margin: 2px 2px 2px 2px;
        padding-top : 10px;
        font-size:10px;
        font-family: Molengo, Arial, Helvetica, sans-serif;
    }
    .clearBoth 
	{
        clear: both;
    }
  -->
  </style>
<style>
<!--
  .signin-box {
  width: 250px;
  height: 250px;
  margin: 12px 0 0;
  padding: 20px 25px 15px;
  background: #f1f1f1;
  border: 1px solid #e5e5e5;
  font: 14px Arial, sans-serif;
  font-size:12px;
  }
  .signin-box div {
  margin: 0 0 1.5em;
  }
  .signin-box label {
  display: block;
  }
  .signin-box input[type=text],
  .signin-box input[type=password] {
  width: 100%;
  height: 32px;
  font-size: 15px;
  direction: ltr;
  }
  .signin-box .email-label,
  .signin-box .passwd-label {
  float:left;
  font-weight: bold;
  font: 14px Arial, sans-serif;
  margin: 0 0 .5em;
  display: block;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
  }
   -->
</style>
</head>
<body>
<div class="header-bar">
  <span class="logo">
   <a href="#" ><img src="style/Barcode-icon.png" align="left" alt="" title="" border=0></a>
  </span>
  <span class="logotext">SCMS -
   Scratch Cards Management System
  </span>
</div>
<div></div><br>
<div class="clearBoth"></div>
<center>
<div class="signin-box"> 
  <h2>Log in <strong></strong></h2> 
  <form action="checklogin.php"  method="post">
<div class="email-div"> 
  <label for="Email"><strong class="email-label">Username</strong></label> 
  <input type="text" spellcheck="false" name="txt1" value=""> 
</div> 
<div class="passwd-div"> 
  <label for="Passwd"><strong class="passwd-label">Password</strong></label> 
  <input type="password"  name="txt2"> 
</div>  
 <button id="vf2" class="button action blue" style="float:right;"><span class="label">Login</span></button>
  </form> 
</div>
</center>
</body>
</html>
