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

    

    
    
<form method="post" action="">

    <legend><h1>Connexion</h1></legend>

    <div class="form-group">
      <label > <h3>Login</h3></label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="login" placeholder="Login">
      </div>
    </div><br/><br/><br/>

    <div class="form-group">
      <label ><h3>Mot de passe</h3></label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
      </div>
    </div>

<br/><br/><br/><center><button type="submit" name="submit" class="btn btn-primary">Connexion</button></center>
</form>

<?php
// on se connecte à MySQL 
$db = mysql_connect('localhost', 'root', 'root'); 
mysql_select_db('brocante',$db); 

$login = $_POST['login'];
$password = $_POST['password'];



if(isset($_POST) && !empty($login) && !empty($password)) {
  $password = hash("sha256", $password);
  

  // on recupére le password de la table qui correspond au login du visiteur
  $sql = "select * from membre where login='".$login."'";
  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

  $data = mysql_fetch_assoc($req);
  if($data['password'] != $password) {
    echo '<div class="alert alert-dismissable alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Oh Non !</strong> Mauvais login / password. Merci de recommencer !
    </div>';
  }else {
    session_start(); // on creer des parametres de session
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['logged'] = true;
    $_SESSION['id'] = $data['id'];
    
    echo '<div class="alert alert-dismissable alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong> Bienvenue  !</strong> <meta http-equiv="refresh" content="2; URL=HOME.php">
    </div>';
    
  }    
}else {
  $champs = '<p><b>(Remplissez tous les champs pour vous connectez !)</b></p>';
}


?>


  </center>
  </body>
</html>
