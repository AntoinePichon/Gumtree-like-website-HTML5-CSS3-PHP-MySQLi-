<?php
session_start();
try
  {
  
   $bdd = new PDO ('mysql:host=localhost;dbname=brocante', 'root', 'root'); // connexion bdd
  
  }
  
  catch(Exception $e)
  {
   die('Erreur :'.$e->getMessage());
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

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="HOME.php">ROCK'N'BROCANTE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <li><a href="login.php">Connexion</a></li>
            <li><a href="logout.php">Deconnexion</a></li>
            <li><a href="REGISTER.php">Inscription</a></li>
            <li><a href="espaceperso.php">Espace Personel</a></li>
            
            
           
                <li><a href="rechercher.php">Recherche</a></li>
           
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


  </body>
</html>
