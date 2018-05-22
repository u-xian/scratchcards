<?php
session_start();
$id_profile=$_SESSION['profile_id'];
$username=$_SESSION['username'];
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
$(function(){
    $("#dl1").change(function(){
       var userid = $("#dl1").val();	
       window.location.href="<?php echo $PHP_SELF; ?>?id3="+userid; 	   
	});
});
</script>
</head>
<body>
<table align=right>
<tr>
<td align=right id="main" valign="top">
 <table  width=850 >
    <tr>
	 <td>
	   <table id="newspaper-a"> 
	    <thead>
		  <tr>
        	<th COLSPAN=4><center><b>View . . . Dealer & Activation No</b></center></th>
			<th COLSPAN=3><center><b>View . . . Progress</b></center></th>
          </tr>
		  <tr>
        	<th COLSPAN=7>
			 <center>
			  <select name="t1" class="inputbox" id="dl1">
                <option value="0">Select a user</option>
                <?php
                      require_once('Connections/conn.php');
                      mysql_select_db($database_conn, $conn);
                      $result = mysql_query("select b.id,a.names from users a, logins b where a.id=b.user_id and b.profil=2");
                      while($row = mysql_fetch_array($result))
                      {
                            echo '<option value="'.$row['id'].'">'.$row['names'].'</option>';
                      }
               ?>
               </select>
			 </center>
			</th>
          </tr>
		  <tr>
        	<th scope="col"><b>Date & Time Creation</b></th>
			<th scope="col"><b>Dealer</b></th>
            <th scope="col"><b>Activation No</b></th>
			<th scope="col"><b>Username</b></th>
			<th scope="col"><b>Warehouse</b></th>
            <th scope="col"><b>Accounting</b></th>
            <th scope="col"><b>Billing</b></th>
          </tr>
        </thead>
        <tbody>
        <?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
		   $iduser=$_GET['id3'];
		   $dealerfullname="";
          $result = mysql_query("select a.id,a.dealerid,a.creation_date,a.creation_time,a.actno,b.dealername,a.confirmation, a.finconfirm ,a.billingconfirm,a.othername,c.loginname from activationno a, dealers b,logins c where a.dealerid=b.id and c.id=a.userid and a.userid='$iduser' order by a.id desc limit 5");
		   while($row = mysql_fetch_array($result))
           {
		     $actid=$row["dealerid"];
		     $n1=$row['confirmation'];
			 $n2=$row['finconfirm'];
			 $n3=$row['billingconfirm'];
			 if ($n1=="1")
			  {
                 $sts1="Valid";
			  }
			  else
			  {
                 $sts="Not Active";
				 $sts1="Not Valid";
			  }
			 if ($n2=="1")
			  {
                 $sts2="Valid";
			  }
			  else
			  {
                 $sts="Not Active";
				 $sts2="Not Valid";
			  }
			 if ($n3=="1")
			  {
                 $sts3="Valid";
				 $sts="Active";
			  }
             else
			  {
                 $sts="Not Active";
				 $sts3="Not Valid";
			  }
			  
			  $dealerfullname = $row['dealername'].'  '.$row['othername'];
			
		?>
		<tr>
		  <td><?php echo $row['creation_date'].' '.$row['creation_time']; ?></td>
		  <td><?php echo $dealerfullname; ?></td><td class="nav"><a href="#" id="<?php echo $row["id"]; ?>" onclick="javascript:dispsno(this)"><?php echo $row['actno']; ?></a></td>
		  <td><?php echo $row['loginname']; ?></td>
		  <td><?php echo $sts1; ?></td>
		  <td><?php echo $sts2; ?></td>
		  <td><?php echo $sts3; ?></td>
		</tr>
        <?php      
		   }
        ?>

        </tbody>
      </table>
	 </td>
	</tr>
	</table>
	
	<table  width=850  align=left>
	<tr>
	 <td id="box300" valign=top>
	   <table id="newspaper-a"> 
	    <tr>
	       <th COLSPAN=4><center><b>300 RWF</b></center></th>
		</tr>
        <tr>
		  <th scope="col">ID</th>
          <th scope="col">Batch no</th>
		  <th scope="col">Start Serial No</th>
          <th scope="col">End Serial No</th>
         </tr>		
        <?php
        require_once('Connections/conn.php');
		$id=$_GET['id2'];
        mysql_select_db($database_conn, $conn);
        $result = mysql_query("select id,batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=1 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		  $id300=$row['id'];
          $batch=$row['batch'];
          $sn1=$row['start_serialnumber'];
		  $sn2=$row['end_serialnumber'];
		  
       ?>		
        <tr>
		  <td><?php echo $id300; ?></td>
	      <td><?php echo $batch; ?></td>
	      <td><?php echo $sn1; ?></td>
		  <td><?php echo $sn2; ?></td>
	    </tr>  
		<?php  
         }
        ?>
		<?php
		 require_once('Connections/conn.php');
         $id=$_GET['id2'];
		 mysql_select_db($database_conn, $conn);
         $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=1");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1=$row1['tpins'];
          $t2=$row1['tcards'];
		 }
		?>
	    <tr>
		  <td COLSPAN=4><span style="float:left;"><b>TOTAL PINS : <span class="box5"><?php echo $t1; ?></span></span> <span style="float:right;">TOTAL CARDS: <span class="box5"><?php echo $t2; ?></span></b></span></td>
	    </tr>  
       </table>
	 </td>
	 
	 <td id="box500" valign=top>
	   <table id="newspaper-a">
	    <tr>
		  <th COLSPAN=4><center><b>500 RWF</b></center></th>
	    </tr> 
		<tr>
		  <th scope="col">ID</th>
          <th scope="col">Batch no</th>
		  <th scope="col">Start Serial No</th>
          <th scope="col">End Serial No</th>
         </tr>		
         <?php
        require_once('Connections/conn.php');
        $id=$_GET['id2'];
        mysql_select_db($database_conn, $conn);
        $result = mysql_query("select id,batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=2 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		  $id500=$row['id'];
          $batch500=$row['batch'];
          $sn1_500=$row['start_serialnumber'];
		  $sn2_500=$row['end_serialnumber'];
		  
       ?>		
        <tr>
		  <td><?php echo $id500; ?></td>
	      <td><?php echo $batch500; ?></td>
	      <td><?php echo $sn1_500; ?></td>
		  <td><?php echo $sn2_500; ?></td>
	    </tr>  
		<?php  
         }
        ?>
		<?php
		 mysql_select_db($database_conn, $conn);
         $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=2");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1_500=$row1['tpins'];
          $t2_500=$row1['tcards'];
		 }
		?>
		<tr>
		  <td COLSPAN=4><span style="float:left;"><b>TOTAL PINS: <span class="box5"><?php echo $t1_500; ?></span></span>   <span style="float:right;">TOTAL CARDS: <span class="box5"><?php echo $t2_500; ?></span></b></span></td>
	    </tr>
	   </table>
	 </td>
	</tr>
	   
	<tr>
	 <td id="box1000" valign=top>
	   <table id="newspaper-a">
	    <tr>
	       <th COLSPAN=4><center><b>1 000 RWF</b></center></th>
	    </tr> 
        <tr>
		  <th scope="col">ID</th>
          <th scope="col">Batch no</th>
		  <th scope="col">Start Serial No</th>
          <th scope="col">End Serial No</th>
         </tr>			
        <?php
        require_once('Connections/conn.php');
        $id=$_GET['id2'];
        mysql_select_db($database_conn, $conn);
        $result = mysql_query("select id,batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=3 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		
		  $id1000=$row['id'];
          $batch1000=$row['batch'];
          $sn1_1000=$row['start_serialnumber'];
		  $sn2_1000=$row['end_serialnumber'];
		  
       ?>		
        <tr>
		  <td><?php echo $id1000; ?></td>
	      <td><?php echo $batch1000; ?></td>
	      <td><?php echo $sn1_1000; ?></td>
		  <td><?php echo $sn2_1000; ?></td>
	    </tr>  
		<?php  
         }
        ?>
		<?php
		 mysql_select_db($database_conn, $conn);
         $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=3");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1_1000=$row1['tpins'];
          $t2_1000=$row1['tcards'];
		 }
		?>
	    <tr>
		  <td COLSPAN=4><span style="float:left;"><b>TOTAL PINS: <span class="box5"><?php echo $t1_1000; ?></span></span><span style="float:right;"> TOTAL CARDS : <span class="box5"><?php echo $t2_1000; ?></span></b></span></td>
	    </tr>  
	  </table>
	 </td>
	   
	 <td id="box2000" valign=top>
	   <table id="newspaper-a">
	    <tr>
	       <th COLSPAN=4><center><b>2 000 RWF</b></center></tH>
	    </tr>
		<tr>
		  <th scope="col">ID</th>
          <th scope="col">Batch no</th>
		  <th scope="col">Start Serial No</th>
          <th scope="col">End Serial No</th>
         </tr>	
        <?php
        require_once('Connections/conn.php');
        $id=$_GET['id2'];
        mysql_select_db($database_conn, $conn);
        $result = mysql_query("select id,batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=4 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		  $id2000=$row['id'];
          $batch2000=$row['batch'];
          $sn1_2000=$row['start_serialnumber'];
		  $sn2_2000=$row['end_serialnumber'];
		  
       ?>		
        <tr>
		  <td><?php echo $id2000; ?></td>
	      <td><?php echo $batch2000; ?></td>
	      <td><?php echo $sn1_2000; ?></td>
		  <td><?php echo $sn2_2000; ?></td>
	    </tr>  
		<?php  
         }
        ?>
		<?php
		 mysql_select_db($database_conn, $conn);
         $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=4");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1_2000=$row1['tpins'];
          $t2_2000=$row1['tcards'];
		 }
		?>
	    <tr>
		  <td COLSPAN=4><span style="float:left;"><b>TOTAL PINS : <span class="box5"><?php echo $t1_2000; ?></span></span><span style="float:right;">TOTAL CARDS: <span class="box5"><?php echo $t2_2000; ?></span></b></span></td>
	    </tr>  
	   </table>
	  </td>
	</tr>
	   
	<tr>
	 <td id="box5000">
	   <table id="newspaper-a">
	    <tr>
	       <th COLSPAN=4><center><b>5 000 RWF</b></center></th>
	    </tr> 
        <tr>
		  <th scope="col">ID</th>
          <th scope="col">Batch no</th>
		  <th scope="col">Start Serial No</th>
          <th scope="col">End Serial No</th>
        </tr>			
         <?php
        require_once('Connections/conn.php');
        $id=$_GET['id2'];
        mysql_select_db($database_conn, $conn);
        $result = mysql_query("select id,batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=5 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		  $id5000=$row['id'];
          $batch5000=$row['batch'];
          $sn1_5000=$row['start_serialnumber'];
		  $sn2_5000=$row['end_serialnumber'];
		  
       ?>		
        <tr>
		  <td><?php echo $id5000; ?></td>
	      <td><?php echo $batch5000; ?></td>
	      <td><?php echo $sn1_5000; ?></td>
		  <td><?php echo $sn2_5000; ?></td>
	    </tr>  
		<?php  
         }
        ?>
		<?php
		 mysql_select_db($database_conn, $conn);
         $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=5");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1_5000=$row1['tpins'];
          $t2_5000=$row1['tcards'];
		 }
		?>
	    <tr>
		  <td COLSPAN=4><span style="float:left;"><b>TOTAL PINS : <span class="box5"><?php echo $t1_5000; ?></span></span><span style="float:right;">TOTAL CARDS: <span class="box5"><?php echo $t2_5000; ?></span></b></span></td>
	    </tr>  
	   </table>
	  </td>
	
	  <td id="box10000" valign=top>
	   <table id="newspaper-a">
	    <tr>
	       <th COLSPAN=4><center><b>10 000 RWF</b></center></th>
	    </tr>  
		<tr>
		  <th scope="col">ID</th>
          <th scope="col">Batch no</th>
		  <th scope="col">Start Serial No</th>
          <th scope="col">End Serial No</th>
        </tr>
         <?php
        require_once('Connections/conn.php');
        $id=$_GET['id2'];
        mysql_select_db($database_conn, $conn);
        $result = mysql_query("select id,batch,start_serialnumber,end_serialnumber  from cardsrequest1 where denom_id=6 and act_id='$id'");
        while($row = mysql_fetch_array($result))
        {
		  $id10000=$row['id'];
          $batch10000=$row['batch'];
          $sn1_10000=$row['start_serialnumber'];
		  $sn2_10000=$row['end_serialnumber'];
		  
       ?>		
        <tr>
		  <td><?php echo $id10000; ?></td>
	      <td><?php echo $batch10000; ?></td>
	      <td><?php echo $sn1_10000; ?></td>
		  <td><?php echo $sn2_10000; ?></td>
	    </tr>  
		<?php  
         }
        ?>
		<?php
		 mysql_select_db($database_conn, $conn);
         $result1 = mysql_query("select sum(pins) as tpins,sum(cards) as tcards from cardsrequest1 where act_id='$id' and denom_id=6");
         while($row1 = mysql_fetch_array($result1))
         {
          $t1_10000=$row1['tpins'];
          $t2_10000=$row1['tcards'];
		 }
		?>
	    <tr>
		  <td COLSPAN=4><span style="float:left;"><b>TOTAL PINS : <span class="box5"><?php echo $t1_10000; ?></span></span><span style="float:right;">TOTAL CARDS: <span class="box5"><?php echo $t2_10000; ?></span></b></span></td>
	    </tr>  
	   </table>
	  </td>
	</tr>
	
 </table>

</body>
</html>
