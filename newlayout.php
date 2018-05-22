<?php
session_start();
$id_profile=$_SESSION['profile_id'];
?>
<html>
<head>
<title>::Automatic Cards::</title>
<link href="style/style2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./jquery/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript">
	function getdealer(idSelected)
   { 
	  xmlHttp=GetXmlHttpObject()

     var url="getdealer.php"
     url=url+"?id1="+idSelected;
      xmlHttp.onreadystatechange=stateChanged 
      xmlHttp.open("GET",url,true)
      xmlHttp.send(null)
   }

     function stateChanged() 
     { 
	
      if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
       { 
	
         var showdata = xmlHttp.responseText; 
         document.getElementById("tigoshops").innerHTML=showdata; 
		  delete xmlHttp;
         xmlHttp = null;
	    } 
      }
	  
	function gettigoshopsid(selectid) 
	{		
		xhr = new XMLHttpRequest();  
		var url="gettigoshopsid.php"
      url=url+"?id2="+selectid
		
		xhr.onreadystatechange=stateChanged1 
      xhr.open("GET",url,true)
      xhr.send(null)
	 }	
	 function stateChanged1() 
     { 
	
      if (xhr.readyState==4 || xhr.readyState=="complete")
       { 
	
         var showdata1 = xhr.responseText; 
         document.getElementById("sector").innerHTML=showdata1; 
	    } 
      }
   function display(sectorid) 
	{		 
	   acode=idSelected + selectid + sectorid;
      document.getElementById("idareacode").innerHTML=acode; 
	   
   }
   
function GetXmlHttpObject()
{
var xmlHttp=false;

try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");

  }
 }
return xmlHttp;
}
$(function(){
    $("#vf1").click(function(){
        dataString = $("#f1").serialize();
        $.ajax({
        type: "POST",
        url: "dealeractivno.php",
        data: dataString,
        success: function() {
		 $("#n3").html('<center><span class="msg">OFS made successfully!</span></center>');
        }
		});
         return false;
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
		 $("#n8").html('<center><span class="msg">OFS made successfully!</span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf3").click(function(){
        dataString = $("#f3").serialize();
        $.ajax({
        type: "POST",
        url: "uploadcards500.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg">OFS made successfully!</span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf4").click(function(){
        dataString = $("#f4").serialize();
        $.ajax({
        type: "POST",
        url: "uploadcards1000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg">OFS made successfully!</span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf5").click(function(){
        dataString = $("#f5").serialize();
        $.ajax({
        type: "POST",
        url: "uploadcards2000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg">OFS made successfully!</span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf6").click(function(){
        dataString = $("#f6").serialize();
        $.ajax({
        type: "POST",
        url: "uploadcards5000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg">OFS made successfully!</span></center>');
        }
		});
         return false;
	});
});

$(function(){
    $("#vf7").click(function(){
        dataString = $("#f7").serialize();
        $.ajax({
        type: "POST",
        url: "uploadcards10000.php",
        data: dataString,
        success: function() {
		 $("#n8").html('<center><span class="msg">OFS made successfully!</span></center>');
        }
		});
         return false;
	});
});
</script>
</head>
<body>
<table class="header" align=center width=800>
   <tr>
    <td>
      <center><h1>Automatic Cards</h1></center>
    </td>
   </tr>
</table>
<br>
<br>
<table align=right cellspacing=10 width=1000>
 <tr>
  <td  valign=top align=left>
     <table class="box3"  width=200> 
	     <tr><th>Menu</th></tr> 
		 <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
          $result = mysql_query("select a.menuname as menunames from  profil_menu a, profiles_axs b where b.function =a.id and b.profil='$id_profile'");
		   while($row = mysql_fetch_array($result))
          {
			//echo '<option value="'.$row['id'].'">'.$row['dealername'].'</option>'; 
			echo '<tr><td><a href="#">'.$row['menunames'].'</a></td></tr>';
          }
          ?>
		 <tr><td><a href="logout.php">Logout</a></td></tr>  
      </table>
   </td>
   
   <div>
   <td align=right id="main">
   <table align=right width=800 class="box1">
   <tr>
	 <td>
	   <table class="box3"> 
	     <tr>
		    <td><h3>Choose a dealer</h3></td>
         </tr>	
	     <tr>
		 <form  id="f1">
	       <td><select name="select1" onChange="getdealer(this.value);" class="inputbox">
          <option value="0">Select a Dealer</option>
          <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
          $result = mysql_query("SELECT id,dealername FROM dealers");
		   while($row = mysql_fetch_array($result))
          {
			echo '<option value="'.$row['id'].'">'.$row['dealername'].'</option>'; 
          }
          ?>
         </select></td>
	    <td>
             <div id="tigoshops">
              <select>
                <option value="-1">-</option>
              </select>
            </div>
            </td>
		<td><button class="vbtn" onclick="this.disabled=true;" id="vf1">Send</button></td>
		</form>
	    </tr> 
     </table>
	   </td>
	   </tr>
	      
    <tr>
	 <td id="box300">
	   <table class="box3" > 
	     <form id="f2">
	     <tr>
	       <td><b>300 RWF</b> </td>
		</tr>  
       <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t1" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t2" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t3" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t4" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t5" maxlength="6"></td>   
           <td><input type="text" class="txt1 inputbox" value="" name="t300t6" maxlength="6"></td></tr>   		
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t7" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t8" maxlength="6"></td></tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t9" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t10" maxlength="6"></td></tr>
	   
       <tr>
	    <td>Total Pins <span id="sum" class="box5">0</span></td>
		<td>Total Cards <span class="box5">56</span></td>
		<td><input type="hidden" value="1" name="t300d"></td>
		<td><button class="vbtn" onclick="this.disabled=true;" id="vf2">Send</button></td>
		</form>
	   </tr>   
       </table>
	   </td>
	   
	   <td id="box300">
	   <table class="box3" > 
	     <form id="f2">
	     <tr>
	       <td><b>500 RWF</b> </td>
		</tr>  
       <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t1" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t2" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t3" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t4" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t5" maxlength="6"></td>   
           <td><input type="text" class="txt1 inputbox" value="" name="t300t6" maxlength="6"></td></tr>   		
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t7" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t8" maxlength="6"></td></tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t9" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t10" maxlength="6"></td></tr>
	   
       <tr>
	    <td>Total Pins <span id="sum" class="box5">0</span></td>
		<td>Total Cards <span class="box5">56</span></td>
		<td><input type="hidden" value="1" name="t300d"></td>
		<td><button class="vbtn" onclick="this.disabled=true;" id="vf2">Send</button></td>
		</form>
	   </tr>   
       </table>
	   </td>
	   
	   </tr>
	   
	   <tr>
	 <td id="box300">
	   <table class="box3" > 
	     <form id="f2">
	     <tr>
	       <td><b>1000 RWF</b> </td>
		</tr>  
       <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t1" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t2" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t3" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t4" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t5" maxlength="6"></td>   
           <td><input type="text" class="txt1 inputbox" value="" name="t300t6" maxlength="6"></td></tr>   		
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t7" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t8" maxlength="6"></td></tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t9" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t10" maxlength="6"></td></tr>
	   
       <tr>
	    <td>Total Pins <span id="sum" class="box5">0</span></td>
		<td>Total Cards <span class="box5">56</span></td>
		<td><input type="hidden" value="1" name="t300d"></td>
		<td><button class="vbtn" onclick="this.disabled=true;" id="vf2">Send</button></td>
		</form>
	   </tr>   
       </table>
	   </td>
	   
	   <td id="box300">
	   <table class="box3" > 
	     <form id="f2">
	     <tr>
	       <td><b>2000 RWF</b> </td>
		</tr>  
       <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t1" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t2" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t3" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t4" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t5" maxlength="6"></td>   
           <td><input type="text" class="txt1 inputbox" value="" name="t300t6" maxlength="6"></td></tr>   		
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t7" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t8" maxlength="6"></td></tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t9" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t10" maxlength="6"></td></tr>
	   
       <tr>
	    <td>Total Pins <span id="sum" class="box5">0</span></td>
		<td>Total Cards <span class="box5">56</span></td>
		<td><input type="hidden" value="1" name="t300d"></td>
		<td><button class="vbtn" onclick="this.disabled=true;" id="vf2">Send</button></td>
		</form>
	   </tr>   
       </table>
	   </td>
	   
	   </tr>
	 
	   <tr>
	 <td id="box300">
	   <table class="box3" > 
	     <form id="f2">
	     <tr>
	       <td><b>5000 RWF</b> </td>
		</tr>  
       <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t1" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t2" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t3" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t4" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t5" maxlength="6"></td>   
           <td><input type="text" class="txt1 inputbox" value="" name="t300t6" maxlength="6"></td></tr>   		
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t7" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t8" maxlength="6"></td></tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t9" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t10" maxlength="6"></td></tr>
	   
       <tr>
	    <td>Total Pins <span id="sum" class="box5">0</span></td>
		<td>Total Cards <span class="box5">56</span></td>
		<td><input type="hidden" value="1" name="t300d"></td>
		<td><button class="vbtn" onclick="this.disabled=true;" id="vf2">Send</button></td>
		</form>
	   </tr>   
       </table>
	   </td>
	   
	   <td id="box300">
	   <table class="box3" > 
	     <form id="f2">
	     <tr>
	       <td><b>10000 RWF</b> </td>
		</tr>  
       <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t1" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t2" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t3" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t4" maxlength="6"></td>
	   </tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t5" maxlength="6"></td>   
           <td><input type="text" class="txt1 inputbox" value="" name="t300t6" maxlength="6"></td></tr>   		
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t7" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t8" maxlength="6"></td></tr>
	   <tr><td><input type="text" class="txt1 inputbox" value="" name="t300t9" maxlength="6"></td>
	       <td><input type="text" class="txt1 inputbox" value="" name="t300t10" maxlength="6"></td></tr>
	   
       <tr>
	    <td>Total Pins <span id="sum" class="box5">0</span></td>
		<td>Total Cards <span class="box5">56</span></td>
		<td><input type="hidden" value="1" name="t300d"></td>
		<td><button class="vbtn" onclick="this.disabled=true;" id="vf2">Send</button></td>
		</form>
	   </tr>   
       </table>
	   </td>
	   
	   </tr>
	 </table>  
   </td>
   </div>
 </tr>
 </table>
<script>
//$("#main").hide();
 //$("#mofs1").click(function(){
   //$("#box300").hide();
 //});
 
 $(document).ready(function(){
        //iterate through each textboxes and add keyup
        //handler to trigger sum event
        $(".txt1").each(function() {
            $(this).keyup(function(){
                calculateSum();
            });
        });
    });
    function calculateSum() {
        var sum = 0;
        //iterate through each textboxes and add the values
        $(".txt1").each(function() {
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#sum").html(sum);
    }
</script>   
</body>
</html>
