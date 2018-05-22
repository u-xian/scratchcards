<?php
set_time_limit(0);
 $mysqli = new mysqli("localhost", "root", "", "scratchcards");
    if (mysqli_connect_errno(  )) {
        printf("Connect failed: %s\n", mysqli_connect_error(  ));
        exit (  );
    } else {
        printf("Connect succeeded\n");
    }

$rs = $mysqli->query('CALL activation_number()');

/* Exécution de la requête préparée */
//$stmt->execute();

/* Fermeture de la commande */
//$stmt->close();

/* Fermeture de la connexion */
$mysqli->close();
?>