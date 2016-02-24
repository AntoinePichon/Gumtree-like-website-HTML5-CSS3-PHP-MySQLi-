<?php //Déconnexion et redirection vers login.php
session_start();
session_unset();
session_destroy();
header('Location: login.php');
?>