<?php
session_start();
include('menu.php');
$idbrocante=$_GET['idbrocante'];

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

 <form method="post" action="">



    <legend>Ecriver votre message</legend>

     <div class="form-group">
      <label class="col-lg-2 control-label">Nom</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="objet" placeholder="Objet">
      </div>
    </div><br/><br/><br/>

    <div class="form-group">
      <label class="col-lg-2 control-label">Login</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="mail" placeholder="Votre message">
      </div>
    </div><br/><br/><br/>

    <center><button type="submit" name="submit" class="btn btn-primary">Envoyer</button></center>
</form>

<?php
$mail =   $_POST['mail'];
$objet = $_POST['objet'];



   $req = $bdd->prepare('SELECT * FROM brocantes where id = :idbrocante');
    $req->execute(array("idbrocante" => $idbrocante)); // On récupère les infos de la brocante


while ($donnees = $req->fetch())
{
	echo $donnees['id'];

      $req1 = $bdd->prepare('SELECT * FROM membre where id = :id');
    $req1->execute(array("id" => $donnees['idmembre'])); // On récupère les infos du membre


while ($donnees1 = $req1->fetch())
{
	echo $donnees1['email'];
	

mail($donnees1['email'], $objet, $mail); // On envoie le mail

}}

?>
</center>
</body>
</html>
