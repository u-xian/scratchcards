<?php 
session_start();
require_once('Connections/conn1.php');
require_once('Connections/conn.php');
mysqli_select_db($conn,$database_conn);
$id_profile=$_SESSION['profile_id'];
$dealerid = $_SESSION['dealer_id'];


         $denom=$_POST['denom'];
		 if ($denom=="1")
		 {
		  if(!empty($_POST['t300p']))
          {
		    $pins_type=$_POST['t300p'];
		  }
		 }
		 else
		 {
		   $pins_type="0";
		 }
		 $user_id=$_POST['t300userid'];
		 $stack=array();	
         $results=array();
		 
		 
		 if(!empty($_POST['t300t1']))
         {
            $stack[0]= $_POST['t300t1'];
			
         }
		 if(!empty($_POST['t300t2']))
         {
            $stack[1]= $_POST['t300t2'];
         }
		 if(!empty($_POST['t300t3']))
         {
            $stack[2]= $_POST['t300t3'];
         }
		 if(!empty($_POST['t300t4']))
         {
            $stack[3]= $_POST['t300t4'];
         }
		 if(!empty($_POST['t300t5']))
         {
            $stack[4]= $_POST['t300t5'];
         }
         if(!empty($_POST['t300t6']))
         {
            $stack[5]= $_POST['t300t6'];
         }
		 if(!empty($_POST['t300t7']))
         {
            $stack[6]= $_POST['t300t7'];
         }
		 if(!empty($_POST['t300t8']))
         {
            $stack[7]= $_POST['t300t8'];
         }
		 if(!empty($_POST['t300t9']))
         {
            $stack[8]= $_POST['t300t9'];
         }
		 if(!empty($_POST['t300t10']))
         {
            $stack[9]= $_POST['t300t10'];
         }
		 

for($i=0;$i<=sizeof($stack);$i++)
{
    //echo $stack[$i]."<br>"; 
 	$f1 = substr($stack[$i], 0, 6); 
	$f2 = substr($stack[$i], 6, 6);
	$sql="select CONCAT( batch, start_serialnumber ) AS b1, CONCAT( batch, end_serialnumber ) AS b2 from cardsrequest1 where  batch ='$f1' and (start_serialnumber ='$f2' OR  end_serialnumber ='$f2')";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while($row = mysqli_fetch_array($result))
    {
	    $r1=$row['b1'];
        $r2=$row['b2'];
	}
	
	if ($stack[$i]==$r1 && (!empty($r1)))  
	{
	 $results[$i]=$r1;
	}
	else if ($stack[$i]==$r2 && (!empty($r2)))
	{
	 $results[$i]=$r2;
	}
	else{
	 $status="0";
	}
}

if (sizeof($results) > 0 )
{
for ($j=0; $j<sizeof($results); $j++) 
 { 
    echo $results[$j]."<br>";
	
 }
}
else
{
 $stmt = $mysqli->prepare("CALL load_data(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param('ssssssssssssss',$stack[0],$stack[1],$stack[2],$stack[3],$stack[4],$stack[5],$stack[6],$stack[7],$stack[8],$stack[9],$dealerid,$denom,$user_id,$pins_type);

/* Exécution de la requête préparée */
$stmt->execute();

/* Fermeture de la commande */
$stmt->close();

/* Fermeture de la connexion */
$mysqli->close();
}
?>