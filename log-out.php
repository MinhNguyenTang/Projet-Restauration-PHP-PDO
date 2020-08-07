<?php
//Destruction de la session, déconnexion
session_start();
$_SESSION = array();
session_destroy();
//Redirection vers la page d'accueil
echo '<body onLoad="alert(\'Vous êtes déconnecté(e) !\')">';
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
exit;
?>
