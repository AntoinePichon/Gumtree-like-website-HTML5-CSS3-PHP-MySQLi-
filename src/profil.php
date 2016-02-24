<?php
session_start();
include ('menu.php');



  $id=$_GET['id'];


  if (isset($id) AND $id > 0 )
  {
    
    $req = $bdd -> prepare('SELECT * FROM membre WHERE id = ?'); //on récupère les info du membre
    $req->execute(array($id));
    $userinfo = $req->fetch();
  }else {

   
    

  }

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

   <h1>

    <?php

    echo 'Bienvenue sur le profil de '. $userinfo['login'] . ' qui habite à ' . $userinfo['ville'] . ' dans le '. $userinfo['departement'] .', voici ses brocantes : <br />';

     $req1 = $bdd -> prepare('SELECT * FROM brocantes WHERE idmembre = ?'); //on affiche les info
    $req1->execute(array($id));

while ($donnees = $req1->fetch())

{
?>
</h1>
<h2>
    <li><a href="brocante.php?idbrocante=<? echo $donnees['id']; ?>"><? echo $donnees['titre']; ?></a><br/></br></li> <!--lien vers les brocantes -->
   <?php

}

$req1->closeCursor();

?>
</h2> 

</center>
  </body>
</html>
