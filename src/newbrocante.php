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

   <form method="post" action="" enctype="multipart/form-data">




   	  <div class="form-group">
      <label class="col-lg-2 control-label">Titre</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="titre" placeholder="Titre">
      </div>
    </div><br/><br/><br/>  <div class="form-group">
      <label class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="description" placeholder="Description"> </textarea>
      </div>
    </div><br/><br/><br/>  <div class="form-group">
      <label class="col-lg-2 control-label">Photo1</label>
      <div class="col-lg-10">
        <input type="file" class="form-control" name="photo1" placeholder="Photo1">
      </div>
    </div><br/><br/><br/>
     <div class="form-group">
    <label class="col-lg-2 control-label">Photo2</label>
      <div class="col-lg-10">
        <input type="file" class="form-control" name="photo2" placeholder="Photo2">
      </div>
    </div><br/><br/><br/>

    <center><button type="submit" name="submit" class="btn btn-primary">S'Inscrire</button></center>
</form>

<?php

 


$titre=$_POST['titre'];
$description=$_POST['description'];
$id=$_SESSION['id'];

// Vérification de la présence d'un titre et d'une description

if (empty($titre) || empty($description)) 
{
echo "Vous devez rentrer un titre et une description ";
}
else { // Vérification qu'il y ai au moins une photo
  if (empty($_FILES['photo1']['name']) && empty($_FILES['photo2']['name'])) 
{
echo "Vous devez enregistrer au moins une photo !";
}
else {

// Vérification de la taille des photos

if ($_FILES['photo1']['size'] > 2000000 || $_FILES['photo2']['size'] > 2000000)
{
  echo "taille Photo trop grosse, max = 2 Mo ";
}
else {




$nom1 = "photo1";


$nom2 = "photo2";





// Ajout de la brocante à la BDD

  $req = $bdd->prepare('INSERT INTO brocantes(idmembre, titre, description, photo1, photo2) VALUES (:idmembre, :titre, :description, :photo1, :photo2)');

 $req->execute(array("idmembre" =>$id, "titre" => $titre, "description" => $description , "photo1" => $nom1, "photo2" => $nom2));
$idbrocante = $bdd->lastInsertId();


$nom1 = 'fichier/1_'.$idbrocante.'';
$resultat1 = move_uploaded_file($_FILES['photo1']['tmp_name'],$nom1);

$nom2 = 'fichier/2_'.$idbrocante.'';
$resultat2 = move_uploaded_file($_FILES['photo2']['tmp_name'],$nom2);

$req = $bdd->prepare('UPDATE brocantes SET photo1 = :photo1, photo2 = :photo2 WHERE id = :id');
$req->execute(array('photo1' => $nom1,'photo2' => $nom2,'id' =>$idbrocante));


  
    echo '<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
   Votre brocante est bien crée! <meta http-equiv="refresh" content="2; URL=brocante.php?idbrocante='.$idbrocante.'">
</div>';



}

}
}


?>

</center>
  </body>
</html>