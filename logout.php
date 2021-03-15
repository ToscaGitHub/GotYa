
<?php

//Active la session
session_start();


//Nettoie la session
$_SESSION = array();


//Détruit la session
session_destroy();


//Redirige vers l'accueil
header('location: index.php');



?>