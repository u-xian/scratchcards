<?php
session_start();
$userid=$_SESSION['id_user'];
$id_profile=$_SESSION['profile_id'];
$username=$_SESSION['username'];
?>
<html>
<head>
<title>::Automatic Cards::</title>
<link href="style/style2.css" rel="stylesheet" type="text/css" />
<link href="style/style3.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./Googleplusbutton/css/css3-buttons1.css" type="text/css"  media="screen">
<script type="text/javascript" src="./style/autoSum.js"></script>
<script type="text/javascript" src="./jquery/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript">
$(function(){
    $("#dl1").change(function(){
        //dataString = $("#f1").serialize();
		  var fname     = $('#dl1').attr('value');  
		 var	a = 14;
		 var	b = 20;
         if(fname == a) {
	      $("#tghq").show();
		  $("#tghq").change(function(){
		    //var lname = $('#tghq').attr('value'); 
			dataString = $("#f1").serialize();
			$.ajax({
            type: "POST",
            url: "dealeractivno.php",
            data: dataString,
            success: function() {
		    $("#n3").html('<center><span class="msg"></span></center>');
            }
		    });
              return false;

		  });
        }
		else if(fname == b) {
	      $("#tghq").show();
		  $("#tghq").change(function(){
		    //var lname = $('#tghq').attr('value'); 
			dataString = $("#f1").serialize();
			$.ajax({
            type: "POST",
            url: "dealeractivno.php",
            data: dataString,
            success: function() {
		    $("#n3").html('<center><span class="msg"></span></center>');
            }
		    });
              return false;

		  });
        }
        else {
	    $("#tghq").hide().val("");
		dataString = $("#f1").serialize();
	    $.ajax({
        type: "POST",
        url: "dealeractivno.php",
        data: dataString,
        success: function() {
		 $("#n3").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
		 
		}
		 

	});
});
$(function(){
    $("#vf2").click(function(){
        dataString = $("#f2").serialize();
		$("#box300").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards300.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf3").click(function(){
        dataString = $("#f3").serialize();
		$("#box500").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards500.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf4").click(function(){
        dataString = $("#f4").serialize();
		$("#box1000").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards1000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf5").click(function(){
        dataString = $("#f5").serialize();
		$("#box2000").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards2000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf6").click(function(){
        dataString = $("#f6").serialize();
		$("#box5000").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards5000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf7").click(function(){
        dataString = $("#f7").serialize();
		$("#box10000").hide();
        $.ajax({
        type: "POST",
        url: "uploadcards10000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg"></span></center>');
        }
		});
         return false;
	});
});
</script>
</head>
<body>
<table width=800 cellspacing=10>
<tr>
  <td  id="main">
   <table  width=600 id="main_form">
   <tr>
	 <td>
	   <table id="newspaper-a" > 
	     <th COLSPAN=2>
		    <center><h3>Choose a Dealer</h3></center>
         </th>	
	     <tr>
		 <form  id="f1">
	       <td>
		    <select name="select1" class="inputbox" id="dl1">
             <option value="0">Select a Dealer</option>
             <?php 
		      require_once('Connections/conn.php');
		      mysql_select_db($database_conn, $conn);
              $result = mysql_query("SELECT id,dealername FROM dealers where status=1");
		      while($row = mysql_fetch_array($result))
              {
			    echo '<option value="'.$row['id'].'">'.$row['dealername'].'</option>'; 
              }
             ?>
            </select>
		  </td>
		  <td>
		   <input type="text" class="inputbox" value="" id="tghq" name="tghq">
		  </td>
		 </form>
	    </tr> 
       </table>
	 </td>
    </tr>
	      
    <tr>
	 <td id="box300">
	   <table id="newspaper-a" > 
	    <form id="f2" name="f300">
	    <tr>
		   <th COLSPAN=2>
		    <center><b>300 RWF</b></center><br>
			<input type="radio" class="txt1 inputbox" value="8" name="t300p" checked="checked" onFocus="startCalc300();" onBlur="stopCalc300();">8 pins<br>
			<input type="radio" class="txt1 inputbox" value="150" name="t300p" onFocus="startCalc300();" onBlur="stopCalc300();">150 pins
		   </th>
		</tr>  
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t300t1" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t300t2" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
	    </tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t300t3" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
		  <td><input type="text" class="txt1 inputbox" value="" name="t300t4" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t300t5" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>   
          <td><input type="text" class="txt1 inputbox" value="" name="t300t6" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
		</tr>   		
	    <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t300t7" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t300t8" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t300t9" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t300t10" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
		</tr>
		<tr>
		  <td COLSPAN=2>
		    <span style="float:left;"><b>Total Pins</b><br><span id="Display1" class="dispbox">0</span></span>
			<span style="float:right;"><b>Total Cards</b><br><span id="Display2" class="dispbox">0</span></span>
		  </td>
		</tr>
        <tr>
		  <td COLSPAN=2>
		   <input type="hidden" value="1" name="t300d">
		   <input type="hidden" value="<?php echo $userid; ?>" name="t300userid">
		   <span style="float:right;"><button class="button action blue" onclick="this.disabled=true;" id="vf2"><span class="label">Save</span></button></span>
		 </td>
	    </tr>  
        </form>		
       </table>
	 </td>
	 <td id="box500">
	   <table id="newspaper-a">
	    <form id="f3" name="f500">
	    <tr>
		  <th COLSPAN=2><center><b>500 RWF</b></center></th>
	    </tr>  
        <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t500t1" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t500t2" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t500t3" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>
		  <td><input type="text" class="txt1 inputbox" value="" name="t500t4" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t500t5" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>   
          <td><input type="text" class="txt1 inputbox" value="" name="t500t6" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>
		</tr>   		
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t500t7" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t500t8" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>
		</tr>  
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t500t9" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t500t10" maxlength="12" onFocus="startCalc500();" onBlur="stopCalc500();"></td>
		</tr> 
        <tr>
		  <td COLSPAN=2>
		    <span style="float:left;"><b>Total Pins</b><br><span id="Display3" class="dispbox">0</span></span>
			<span style="float:right;"><b>Total Cards</b><br><span id="Display4" class="dispbox">0</span></span>
		  </td>
		</tr>		
        <tr>
		  <td COLSPAN=2>
		   <input type="hidden" value="2" name="t500d">
		   <input type="hidden" value="<?php echo $userid; ?>" name="t500userid">
		   <span style="float:right;"><button class="button action blue" onclick="this.disabled=true;" id="vf3"><span class="label">Save</span></button></span>
		 </td>
	    </tr>
		</form>
	   </table>
	 </td>
	</tr>
	   
	<tr>
	 <td id="box1000">
	   <table id="newspaper-a">
	    <form id="f4" name="f1000">
	    <tr>
		   <th COLSPAN=2><center><b>1 000 RWF</b></center></th>
	    </tr>  
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t1000t1" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t1000t2" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t1000t3" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>
		  <td><input type="text" class="txt1 inputbox" value="" name="t1000t4" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t1000t5" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>   
          <td><input type="text" class="txt1 inputbox" value="" name="t1000t6" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>
		</tr>    		
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t1000t7" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t1000t8" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>
		</tr>
	    <tr>   
		  <td><input type="text" class="txt1 inputbox" value="" name="t1000t9" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t1000t10" maxlength="12" onFocus="startCalc1000();" onBlur="stopCalc1000();"></td>
		</tr>
		<tr>
		  <td COLSPAN=2>
		    <span style="float:left;"><b>Total Pins</b><br><span id="Display5" class="dispbox">0</span></span>
			<span style="float:right;"><b>Total Cards</b><br><span id="Display6" class="dispbox">0</span></span>
		  </td>
		</tr>
        <tr>
		<td COLSPAN=2>
		   <input type="hidden" value="3" name="t1000d">
		   <input type="hidden" value="<?php echo $userid; ?>" name="t1000userid">
		   <span style="float:right;"><button class="button action blue" onclick="this.disabled=true;" id="vf4"><span class="label">Save</span></button></span>
		 </td>
	   </tr>
	   </form>
	  </table>
	 </td>
	   
	 <td id="box2000">
	   <table id="newspaper-a">
	    <form id="f5" name="f2000">
	    <tr>
		   <th COLSPAN=2><center><b>2 000 RWF</b></center></th>
	    </tr>  
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t2000t1" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t2000t2" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>
		</tr>
		<tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t2000t3" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>
		  <td><input type="text" class="txt1 inputbox" value="" name="t2000t4" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t2000t5" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>   
          <td><input type="text" class="txt1 inputbox" value="" name="t2000t6" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>
		</tr>    		
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t2000t7" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t2000t8" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t2000t9" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t2000t10" maxlength="12" onFocus="startCalc2000();" onBlur="stopCalc2000();"></td>
		</tr>
		<tr>
		  <td COLSPAN=2>
		    <span style="float:left;"><b>Total Pins</b><br><span id="Display7" class="dispbox">0</span></span>
			<span style="float:right;"><b>Total Cards</b><br><span id="Display8" class="dispbox">0</span></span>
		  </td>
		</tr>
        <tr>
		  <td COLSPAN=2>
		   <input type="hidden" value="4" name="t2000d">
		   <input type="hidden" value="<?php echo $userid; ?>" name="t2000userid">
		   <span style="float:right;"><button class="button action blue" onclick="this.disabled=true;" id="vf5"><span class="label">Save</span></button></span>
		 </td>
	    </tr>
		</form>
	   </table>
	  </td>
	</tr>
	   
	<tr>
	 <td id="box5000">
	   <table id="newspaper-a">
	    <form id="f6" name="f5000">
	    <tr>
		   <th COLSPAN=2><center><b>5 000 RWF</b></center></th>
	    </tr>  
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t5000t1" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t5000t2" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>
		</tr> 
		<tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t5000t3" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>
		  <td><input type="text" class="txt1 inputbox" value="" name="t5000t4" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>
		</tr>
		<tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t5000t5" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>   
          <td><input type="text" class="txt1 inputbox" value="" name="t5000t6" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>
		</tr>    		
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t5000t7" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t5000t8" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t5000t9" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t5000t10" maxlength="12" onFocus="startCalc5000();" onBlur="stopCalc5000();"></td>
		</tr>
		<tr>
		  <td COLSPAN=2>
		    <span style="float:left;"><b>Total Pins</b><br><span id="Display9" class="dispbox">0</span></span>
			<span style="float:right;"><b>Total Cards</b><br><span id="Display10" class="dispbox">0</span></span>
		  </td>
		</tr>
        <tr>
		  <td COLSPAN=2>
		   <input type="hidden" value="5" name="t5000d">
		   <input type="hidden" value="<?php echo $userid; ?>" name="t5000userid">
		   <span style="float:right;"><button class="button action blue" onclick="this.disabled=true;" id="vf6"><span class="label">Save</span></button></span>
		 </td>
	    </tr>
		</form>
	   </table>
	  </td>
	
	  <td id="box10000">
	   <table id="newspaper-a">
	    <form id="f7" name="f10000">
	    <tr>
		   <th COLSPAN=2><center><b>10 000 RWF</b></center></th>
	    </tr>  
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t10000t1" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t10000t2" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>
		</tr>
		<tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t10000t3" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>
		  <td><input type="text" class="txt1 inputbox" value="" name="t10000t4" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>
		</tr>
		<tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t10000t5" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>   
          <td><input type="text" class="txt1 inputbox" value="" name="t10000t6" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>
		</tr>    		
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" name="t10000t7" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t10000t8" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" name="t10000t9" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" name="t10000t10" maxlength="12" onFocus="startCalc10000();" onBlur="stopCalc10000();"></td>
		</tr>
		<tr>
		  <td COLSPAN=2>
		    <span style="float:left;"><b>Total Pins</b><br><span id="Display11" class="dispbox">0</span></span>
			<span style="float:right;"><b>Total Cards</b><br><span id="Display12" class="dispbox">0</span></span>
		  </td>
		</tr>
        <tr>
		  <td COLSPAN=2>
		   <input type="hidden" value="6" name="t10000d">
		   <input type="hidden" value="<?php echo $userid; ?>" name="t10000userid">
		   <span style="float:right;"><button class="button action blue" onclick="this.disabled=true;" id="vf7"><span class="label">Save</span></button></span>
		 </td>
		</tr>
		</form>
	   </table>
	  </td>
	</tr>
	   
  </table>  
   </td>
   
</tr>
 </table>
 <script>
  $("#tghq").hide();
</script>
</body>
</html>
