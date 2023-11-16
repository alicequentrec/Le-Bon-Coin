<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeBonCoin</title>
</head>

<body>

<?php

session_start();


if(isset($_POST['bouton'])){

    $id = mysqli_connect("localhost:3307", "root", "", "projetweb");

    $mail = $_SESSION['mail'];
    $requete = "DELETE FROM user WHERE mail = '$mail'";

    mysqli_query($id,$requete);
    
    echo "Votre compte a été supprimé";
    header("refresh:2; url=connexion.php");
}
elseif(isset($_POST['bouton1'])){
    header("location:PageProfil.php");

}

?>

<form action="" method="post" enctype="multipart/form-data"> 
    <s><input type = "submit" value="Confirmer" name="bouton"></s>
    <p><input type = "submit" value="Annuler" name="bouton1"></p>
</body>
</html>

