<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PageAccueil.css" type="text/css">
    <title>LeBonCoin</title>
</head>

<body>
    
<h1>Bienvenue sur LeBonCoin !</h1><hr>
    <form action="" method="post" enctype="multipart/form-data">
        <p><input type = "submit" value = "Inscription" name = "bouton" class="bouton"></p>
        <p><input type = "submit" value = "Connexion" name = "bouton1" class="bouton"></p>
    </form>

<?php


if (isset($_POST["bouton"])) {
    echo "Vous allez être redirigé vers Inscription";
    header("refresh:2; url=Inscription.php");
    exit();
}

if (isset($_POST["bouton1"])) {
    echo "Vous allez être redirigé vers Connexion";
    header("refresh:2; url=Connexion.php");
    exit();
}
?>
</body>
</html>