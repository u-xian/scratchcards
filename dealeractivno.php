<?php

session_start();
$user_id=$_SESSION['id_user'];
set_time_limit(0);
require_once('Connections/conn1.php');


 session_start();
 $_SESSION['dealer_id'] = $_POST['select1']; 

$d1 = $_POST['select1'];
$d2 = strtoupper($_POST['tghq']);


$stmt = $mysqli->prepare("CALL activation_number(?, ?, ?)");
$stmt->bind_param('sss',$d1,$d2,$user_id);

/* Ex�cution de la requ�te pr�par�e */
$stmt->execute();

/* Fermeture de la commande */
$stmt->close();

/* Fermeture de la connexion */
$mysqli->close();	 

?>

