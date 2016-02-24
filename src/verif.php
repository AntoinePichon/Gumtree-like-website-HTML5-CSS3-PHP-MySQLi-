<?
session_start(); //On vérifie que le membre est connecté

if(!isset($_SESSION['logged']) || !$_SESSION['logged']) {
  echo '<h1>Vous n\'êtes pas connecté, accés interdit !</h1> <meta http-equiv="refresh" content="0; URL=login.php"> ';
}

$login = isset($_SESSION['login']) ? $_SESSION['login'] : '' ;
?> 