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
<script type="text/javascript" src="./style/autoSum1.js"></script>
<link href="jquery/css/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./jquery/jquery-1.9.1.js"></script>
<script type="text/javascript" src="./jquery/jquery-ui-1.10.2.custom.js"></script>
<script language="javascript" type="text/javascript">
$(function(){
    $("#dl1").change(function(){
		 var fname     = $('#dl1').val();  
		 var	a = 14;
		 var	b = 20;
         if(fname == a) {
	      $("#tghq").show();
		  $("#tghq").change(function(){
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

$(function() {
	  $("#dialog-form").dialog({
      autoOpen: false,
	  height: 300,
      width: 600,
      modal: true,
      buttons:{
      Ok: function() {
      $( this ).dialog( "close" );
	  $("#t300t1").val("");
	  $("#t300t2").val("");  
	  $("#t300t3").val("");
	  $("#t300t4").val("");	  
	  $("#t300t5").val("");
	  $("#t300t6").val("");	  
	  $("#t300t7").val("");
	  $("#t300t8").val("");	  
	  $("#t300t9").val("");
	  $("#t300t10").val("");

    }
   }
});

$("#vf2").click(function() {
        dataString = $("#f2").serialize();
        $.ajax({
        type: "POST",
        url: "uploadcards.php",
        data: dataString,
        success: function(result){
		if(result){
		   $("#results").html(result);
          $("#dialog-form" ).dialog("open");
		 }
		 $("#t300t1").val("");
	     $("#t300t2").val("");
		 $("#t300t3").val("");
	     $("#t300t4").val("");	  
	     $("#t300t5").val("");
	     $("#t300t6").val("");	  
	     $("#t300t7").val("");
	     $("#t300t8").val("");	  
	     $("#t300t9").val("");
	     $("#t300t10").val("");
          }
		});
         return false;
});

});	

$(function(){
    $("#denom").change(function(){
	  var a1  = $('#denom').val(); 	  
	  var b1 = 1;
       if(a1 == b1) {
	    $("#pin_type").show();
	   }
	   else{
	    $("#pin_type").hide();
	   }
	});
});

</script>
</head>
<body>
<table width=800 cellspacing=10 align=center>
<tr>
  <td  id="main">
   <table  width=600 id="main_form">      
    <tr>
	 <td id="box300">
	   <table id="newspaper-a" > 
		 <tr>
		  <th COLSPAN=2>
		   <b>Choose a Dealer</b>
		   <br>
		   <br>
		    <form  id="f1">
		    <select name="select1" class="inputbox" id="dl1">
             <option value="0">Select a dealer</option>
             <?php 
		      require_once('Connections/conn.php');
		      mysqli_select_db($conn,$database_conn);
              $result = mysqli_query($conn,"SELECT id,dealername FROM dealers");
		      while($row = mysqli_fetch_array($result))
              {
			    echo '<option value="'.$row['id'].'">'.$row['dealername'].'</option>'; 
              }
             ?>
            </select>
		   <input type="text" class="inputbox" value="" id="tghq" name="tghq">
		</th>
         </form>
		</tr> 
		
		<tr>
		  <th COLSPAN=2>
		   <b>Denom & pins type</b>
		   <br>
		   <br>
		    <form  id="f2" name="f300">
		     <select name="denom" class="inputbox" id="denom" onChange="startCalc300();">
			 <option value="0">Select</option>
             <option value="1">300 RWF</option> 
             <option value="2">500 RWF</option> 
             <option value="3">1000 RWF</option> 
             <option value="4">2000 RWF</option> 
             <option value="5">5000 RWF</option>
             <option value="6">10000 RWF</option>
            </select>
			<span id="pin_type">
			<input type="radio" class="txt1 inputbox" value="8" name="t300p" checked="checked" onFocus="startCalc300();" onBlur="stopCalc300();">8 pins
			<input type="radio" class="txt1 inputbox" value="100" name="t300p" onFocus="startCalc300();" onBlur="stopCalc300();">100 pins
			<input type="radio" class="txt1 inputbox" value="150" name="t300p" onFocus="startCalc300();" onBlur="stopCalc300();">150 pins
			</span>
		  </th>
		</tr> 
        <tr>
	      <td><input type="text" class="txt1 inputbox" value="" id="t300t1" name="t300t1" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" id="t300t2" name="t300t2" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
	    </tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" id="t300t3" name="t300t3" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
		  <td><input type="text" class="txt1 inputbox" value="" id="t300t4" name="t300t4" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" id="t300t5" name="t300t5" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>   
          <td><input type="text" class="txt1 inputbox" value="" id="t300t6" name="t300t6" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
		</tr>   		
	    <tr>
	      <td><input type="text" class="txt1 inputbox" value="" id="t300t7" name="t300t7" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" id="t300t8" name="t300t8" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
		</tr>
	    <tr>
		  <td><input type="text" class="txt1 inputbox" value="" id="t300t9" name="t300t9" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
	      <td><input type="text" class="txt1 inputbox" value="" id="t300t10" name="t300t10" maxlength="12" onFocus="startCalc300();" onBlur="stopCalc300();"></td>
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
		   <span style="float:right;"><a href="#" id="vf2"  class="button action blue"><span class="label">Save</span></a></span>
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
 <div id="dialog-form" title="Attention!!">
<p>Sorry these serial numbers have been used!!</p>
<p><span id="results"></span></p>
</div>
<script>
  $("#pin_type").hide();
  $("#tghq").hide();
</script>
</body>
</html>   
