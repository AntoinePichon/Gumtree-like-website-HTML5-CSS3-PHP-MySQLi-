


<?php

include ('menu.php');
include('verif.php');

$login = $_SESSION['login'];
$idmembre = $_SESSION['id'];


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
<h2>

<li><a href="newbrocante.php">Créer une nouvelle brocante</a><br/><br/></li>
<li><a href="profil.php?id=<?=$_SESSION['id']?>">Profil</a></li>

</h2>
    

      <center>

        <h1>
      <?php

      echo 'Bonjour '.  $login.' , bienvenue sur votre espace personel voici vos brocantes : </br>' ;
    
      $req = $bdd->prepare('SELECT titre FROM brocantes where idmembre= :idmembre'); // on recupere les info du membre
      $req->execute(array("idmembre" => $idmembre));

while ($donnees = $req->fetch())
{
  $req1 = $bdd->prepare('SELECT id FROM brocantes where titre= :titre');
      $req1->execute(array("titre" => $donnees['titre'])); // on recupère les info de la brocante

      while ($donnees1 = $req1->fetch())
{
  ?>
</h1>
<h2>
    <li><a href="brocante.php?idbrocante=<? echo $donnees1['id']; ?>"><? echo $donnees['titre']; ?></a><br/></br></li>
   <?php
}
}

$req->closeCursor();
$req1->closeCursor();


?>
</h2>
<br/>
<br/>
<br/>




  

   </center>
  </body>
</html>