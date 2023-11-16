<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="Inscription.css">
    <title>LeBonCoin</title>
</head>

<body>
<h1>Annonce</h1><hr>
    <form action="" method="post" enctype="multipart/form-data">
        <p><input type = "text" name = "nom" placeholder="Nom" required></p>
        <p><input type = "text" name = "prix" placeholder="Prix" required></p>
        <p><input type = "text" name = "description" placeholder="Décrivez votre article" required></p>
        <p><input type="file" name="photo"></p>
        <p><input type = "submit" value = "Envoyer" name = "bouton" required></p>
    </form><hr>

    <style>
        body{
            background: linear-gradient(to left, #ffffff, #b803be);
        }
        
    </style>

<?php

session_start();

if(isset($_POST['bouton'])){
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];

    $pos = strpos($_FILES["photo"]["name"], ".");
    $extension = substr($_FILES["photo"]["name"], $pos);
    $photo = "$nom$extension";
    move_uploaded_file($_FILES["photo"]["tmp_name"], "photo/$photo");

    $longueurMinimal = 30;

    if($description<$longueurMinimal){
        echo "Vous devez au minimum décrire votre article de 30 caractères";
    }

    $id = mysqli_connect("localhost:3307", "root", "", "projetweb");
        
    $requete = "INSERT INTO annonce (nom, prix, description, photo)
                values ('$nom', '$prix', '$description', '$photo')";
    mysqli_query($id, $requete);

    header("location:PageProfil.php");

}
?>
        
</body>
</html>