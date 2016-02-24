<?php
session_start();
include('menu.php');

mysql_connect('localhost','root','root');
mysql_select_db('brocante'); // on se connecte à MySQL. 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="author" content="">

    <title>ROCK'N'BROCANTE</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

   
    <link href="navbar-static-top.css" rel="stylesheet">

    </head>
  <body>

  	<center>

  	<?

if(isset($_POST['requete']) || isset($_POST['requete1']) ) // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
{

$requete = htmlspecialchars($_POST['requete']); 
$requete1 = htmlspecialchars($_POST['requete1']);
if(isset($_POST['requete']) && $_POST['requete']!=NULL)
{
$query = mysql_query("SELECT * FROM membre WHERE departement LIKE '%$requete%' ORDER BY id DESC") or die (mysql_error()); 
}
else
{
  $query = mysql_query("SELECT * FROM membre WHERE ville LIKE '%$requete1%' ORDER BY id DESC") or die (mysql_error());
}
$nb_resultats = mysql_num_rows($query); // on utilise la fonction mysql_num_rows pour compter les résultats 
if($nb_resultats != 0) 
{
// maintenant, on va afficher les résultats et la page qui les donne ainsi que leur nombre
?>
<h3>Résultats de votre recherche.</h3>
<p>Nous avons trouvé <? echo $nb_resultats; // on affiche le nombre de résultats 
if($nb_resultats > 1) { echo 'résultats'; } else { echo 'résultat'; } // on vérifie le nombre de résultats pour orthographier correctement. 
?>
 dans notre base de données. Voici les vendeurs que nous avons trouvées dans votre département :<br/>
<br/>
<?
while($donnees = mysql_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<a href="profil.php?id=<? echo $donnees['id']; ?>"><? echo $donnees['login']; ?></a><br/>
<?
} // fin de la boucle
?><br/>
<br/>
<a href="rechercher.php">Faire une nouvelle recherche</a></p>
<?
} 
else
{ 
?>
<h3>Pas de résultats</h3>
<p>Nous n'avons trouvé aucun résultat pour votre requête "<? echo $_POST['requete']; ?>". <a href="rechercher.php">Réessayez</a> avec autre chose.</p>
<?
}
mysql_close(); 
}
else
{ 
?>
<h1>Recherche par département</h1>
 <form action="rechercher.php" method="Post">
<input type="text" class="form-control" name="requete" size="10"  placeholder="Entrer un département (en chiffre)"></br>
<input type="submit" class="btn btn-primary" value="Recherche">
</form>

<h1>Recherche par ville</h1>
 <form action="rechercher.php" method="Post">
<input type="text" class="form-control" name="requete1" size="10" placeholder="Entrer une ville"></br>
<input type="submit" class="btn btn-primary" value="Recherche">
</form>
<?
}

?>

</center>

</body>
</html>