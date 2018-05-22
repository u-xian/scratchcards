<?php
 require_once('Connections/conn1.php');
 set_time_limit(0);
 session_start();
 $_SESSION['dealer_id'] = $_POST['select1']; 

  $d1 = $_POST['fname'];
  $d2 = $_POST['lname'];

$stmt = $mysqli->prepare("CALL activation_number(?,?)");
$stmt->bind_param('ss',$d1,$d2);

/* Exécution de la requête préparée */
$stmt->execute();

/* Fermeture de la commande */
$stmt->close();

/* Fermeture de la connexion */
$mysqli->close();		 

?>

