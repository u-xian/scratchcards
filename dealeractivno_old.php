<?php
 require_once('Connections/conn1.php');
 set_time_limit(0);
 session_start();
 $_SESSION['dealer_id'] = $_POST['select1']; 

  $d1 = $_POST['select1'];



$stmt = $mysqli->prepare("CALL activation_number(?)");
$stmt->bind_param('i',$d1);

/* Ex�cution de la requ�te pr�par�e */
$stmt->execute();

/* Fermeture de la commande */
$stmt->close();

/* Fermeture de la connexion */
$mysqli->close();		 

?>

