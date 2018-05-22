<?php 
require_once('Connections/conn1.php');
require_once('Connections/conn.php');
require_once('functions.php');

$a1= (int)$_POST['id3'];
$fn= (int)$_POST['v2'];

remove_file($fn);

$stmt = $mysqli->prepare("CALL create_ccbatch(?)");
$stmt->bind_param('i',$a1);

/* Exécution de la requête préparée */
$stmt->execute();

/* Fermeture de la commande */
$stmt->close();

/* Fermeture de la connexion */
$mysqli->close();	
?>