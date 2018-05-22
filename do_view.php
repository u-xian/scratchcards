<script language="javascript" type="text/javascript">
 function dispsno(idactno) 
	{	
	  var actid = idactno.id;
	  $.ajax({
        type: "POST",
        url: "do_view_details.php",
		data: "id2="+ actid,
        success: function(result1){
		 $("#results1").show();
         $("#results1").html(result1);
        }
		});
	}
</script>
<table id="newspaper-a" width=980> 
	    <thead>
		  <tr>
        	<th COLSPAN=5><center><b>Dealer & Activation No</b></center></th>
			<th COLSPAN=4><center><b>Activation Progress</b></center></th>
          </tr>	  
		  <tr>
        	<th scope="col"><b>Creation Date</b></th>
			<th scope="col"><b>Activation Date</b></th>
			<th scope="col"><b>Dealer</b></th>
            <th scope="col"><b>Activation No</b></th>
			<th scope="col"><b>Raised by</b></th>
			<th scope="col"><b>Warehouse</b></th>
            <th scope="col"><b>Accounting</b></th>
            <th scope="col"><b>Billing</b></th>
          </tr>
        </thead>
        <tbody>
<?php 
		  require_once('Connections/conn.php');
		   mysql_select_db($database_conn, $conn);
		   $uid = mysql_real_escape_string($_POST['t1']);
		   $dt1 = mysql_real_escape_string($_POST['d1']);
		   $dt2 = mysql_real_escape_string($_POST['d2']);
		   
		   $dealerfullname="";
           $result = mysql_query("select a.id,a.dealerid,a.creation_date,a.creation_time,a.activation_date,a.actno,b.dealername,a.confirmation, a.finconfirm ,a.billingconfirm,a.othername,c.loginname from activationno a, dealers b,logins c where a.dealerid=b.id and c.id=a.userid and a.userid='$uid' and a.creation_date between '$dt1' and '$dt2' order by a.id");
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
		  <td><?php echo $row['activation_date']; ?></td>
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
<span id="results1"></span>