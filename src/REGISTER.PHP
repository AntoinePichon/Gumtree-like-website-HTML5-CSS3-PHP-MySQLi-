<?php
include ('menu.php');

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
   

    <!--Formulaire -->
    
    

    <form method="post" action="">



    <legend><h1>S'inscrire sur le site</h1></legend>

    <div class="form-group">
      <label ><h3>Login</h3></label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="login" placeholder="Login">
      </div>
    </div><br/><br/><br/>

    <div class="form-group">
      <label class=><h3>Mot de passe</h3></label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
      </div>
    </div><br/><br/><br/>

    <div class="form-group">
      <label ><h3>Retapez le mot de passe</h3></label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password2" placeholder="Mot de passe">
      </div>
    </div><br/><br/><br/>

    <div class="form-group">
      <label ><h3>Email</h3></label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="email" placeholder="Email">
      </div>
    </div><br/><br/><br/>

    <div class="form-group">
      <label ><h3>Nom</h3></label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="nom" placeholder="Nom">
      </div>
    </div><br/><br/><br/>

    <div class="form-group">
      <label ><h3>Prénom</h3></label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="prenom" placeholder="Prénom">
      </div>
    </div><br/><br/><br/>

    <div class="form-group">
      <label ><h3>Département en chiffre </br>(ex :33 )</h3></label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="departement" placeholder="Département">
      </div>
    </div><br/><br/>

    <div class="form-group">
      <label ><h3>Ville</h3></label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="ville" placeholder="Ville">
      </div>
    </div><br/><br/><br/>



    
<center><button type="submit" name="submit" class="btn btn-primary">S'Inscrire</button></center>
</form>


<?php
//Connexion à la BDD
  try
  {
  
   $bdd = new PDO ('mysql:host=localhost;dbname=brocante', 'root', 'root');
  
  }
  
  catch(Exception $e)
  {
   die('Erreur :'.$e->getMessage());
  }
  
    if(ISSET($_POST['submit']))
{



//On créer les variables
$login =   $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$departement = $_POST['departement'];
$ville = $_POST['ville'];


//vérification mdp

if(!($password==$password2))

{
echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Mot de passe différents !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
}

else {


       if(empty($password))

    {

      echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Mot de passe vide !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
    }
  else  {


    // vérification email


      if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
      {
        echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Adresse mail non valide !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
      }
      else {

            $req = $bdd->prepare('SELECT * FROM membre WHERE email = :email');
$req->execute(array('email'=> $email));
$resultat=$req->fetch();
  

if($resultat)
{
    echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> L\'adresse mail est déjà ulitilsée !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
}

else {




    //vérification login
    
  

    if (strlen($login) < 3 || strlen($login) > 15)
    {
        echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Votre pseudo est soit trop grand, soit trop petit (entre 3 et 15 caractères) !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
        
    }

    else {

      $req = $bdd->prepare('SELECT * FROM membre WHERE login = :login');
$req->execute(array('login'=> $login));
$resultat=$req->fetch();
  

if($resultat)
{
    echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Votre pseudo est déjà utilisé !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
}
else
{
    
// vérification nom

       if(empty($nom))

    {

      echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Nom vide !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
    }
  else  {

    // vérification prénom

     if(empty($prenom))

    {

      echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Prénom vide !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
    }
  else  {

    // vérification département

     if(empty($departement))

    {

      echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Département vide !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
    }
  else  {


          if (!preg_match("#^[0-9]#", $_POST['departement']))
      {
        echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Format département non valide, (ex : 33) !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
      }
      else {

        //vérification ville

     if(empty($ville))

    {

      echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong> Ville vide !</strong> <meta http-equiv="refresh" content="2; URL=REGISTER.php">
</div>';
    }
  else  {

    //protection du mdp et transmission à la bdd

 



$password = hash("sha256", $password);
$req = $bdd->prepare('INSERT INTO membre(login, password, email, nom, prenom, departement, ville) VALUES (:login, :password, :email, :nom, :prenom, :departement, :ville)');


$req->execute(array("login" => $login, "password" => $password, "email" => $email, "nom" => $nom, "prenom" =>$prenom, "departement" => $departement, "ville" => $ville));



echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
   Vous etes bien enregistrez, vous pouvez maintenant vous connecter! <meta http-equiv="refresh" content="2; URL=login.php">
</div>';




}
}
}
}
}
}
}
}
}
}
}
}

   
   ?>
</center>
 </body>

 </html>
