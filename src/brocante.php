<?php

include ('menu.php');
include('connexionbdd.php');


    $idbrocante=$_GET['idbrocante'];
   

   $req = $bdd->prepare('SELECT * FROM brocantes where id = :idbrocante');
    $req->execute(array("idbrocante" => $idbrocante)); // on récupère les info de la brocante


while ($donnees = $req->fetch())
{

      $req1 = $bdd->prepare('SELECT * FROM membre where id = :id');
    $req1->execute(array("id" => $donnees['idmembre'])); // on récupère les info du membre


while ($donnees1 = $req1->fetch())
{


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

    <section>
      <center>


        <article>

              <h1>
                 <?php
                   echo $donnees['titre']; ?> <br/>

               </h1>

            
                   <img src='fichier/1_<?echo $idbrocante ;?>' alt="Photo1" /> <!-- on affiche la première photo -->

                   <img src='fichier/2_<?echo $idbrocante ;?>' alt="Photo2" />  <!-- on affiche la deuxième photo -->
                   <h2>
            
                   <?php
                     echo $donnees['description'];
                     
?>
                  </br>
              </br>
              <!--info sur le vendeur -->
              Cette Brocante est proposée par <?php echo$donnees1['login'] ?> qui habite à <?php echo$donnees1['ville'] ?> dans le <?php echo$donnees1['departement'] ?></br>

              <a href="mail.php?idbrocante=70">Contacter le vendeur</a>
</h2>
        </article>
        <aside>
               
        </aside>
    </section>

    
    
    
    <?php

  




}
}
?>
  
</center>

  </body>
</html>