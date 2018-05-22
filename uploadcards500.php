<?php 
session_start();
require_once('Connections/conn1.php');
$id_profile=$_SESSION['profile_id'];
$dealerid = $_SESSION['dealer_id'];


         $denom=$_POST['t500d'];
		 $pins_type="0";
		 $user_id=$_POST['t500userid'];
		  
		  if(!empty($_POST['t500t1']))
         {
            $a1= $_POST['t500t1'];
         }
		 if(!empty($_POST['t500t2']))
         {
            $a2= $_POST['t500t2'];
         }
		 if(!empty($_POST['t500t3']))
         {
            $a3= $_POST['t500t3'];
         }
		 if(!empty($_POST['t500t4']))
         {
            $a4= $_POST['t500t4'];
         }
		 if(!empty($_POST['t500t5']))
         {
            $a5= $_POST['t500t5'];
         }
         if(!empty($_POST['t500t6']))
         {
            $a6= $_POST['t500t6'];
         }
		 if(!empty($_POST['t500t7']))
         {
            $a7= $_POST['t500t7'];
         }
		 if(!empty($_POST['t500t8']))
         {
            $a8= $_POST['t500t8'];
         }
		 if(!empty($_POST['t500t9']))
         {
            $a9= $_POST['t500t9'];
         }
		 if(!empty($_POST['t500t10']))
         {
            $a10= $_POST['t500t10'];
         }
		 
$stmt = $mysqli->prepare("CALL load_data(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssssssssssss',$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$dealerid,$denom,$user_id,$pins_type);

/* Exécution de la requête préparée */
$stmt->execute();

/* Fermeture de la commande */
$stmt->close();

/* Fermeture de la connexion */
$mysqli->close();		 

?>