<?php
session_start();
if(isset($_POST["bouton"])){
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $id = mysqli_connect("localhost:3307", "root", "", "projetweb");
    $requete = "SELECT * FROM user
            WHERE mail='$mail'
            and mdp='$mdp'";
    $res = mysqli_query($id, $requete);
    if(mysqli_num_rows($res) > 0){   
        $_SESSION["mail"] = $mail;
        $ligne = mysqli_fetch_assoc($res);
        $_SESSION["nom"] = $ligne["nom"];
        $_SESSION["prenom"] = $ligne["prenom"];
        $_SESSION["avatar"] = $ligne["avatar"];

        echo "Connexion OK, vous allez être redirigé...";
        header("refresh:1; url=PageProfil.php");//redirection au bout de 3 secondes
    }else{
        echo "<h3>Erreur de mail ou de mot de passe...</h3>";
    }
}
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeBonCoin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to left, #ffffff, #b803be);
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
            background-color: #f2f2f2;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        h3 {
            color: red;
            text-align: center;
        }
        i{
            position: relative;
            left: 500px;

        }
        .links {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulaire de Connexion </h1><hr>
    <form action="" method="post">
       <p> <input type="email" name="mail" placeholder="Entrez votre mail :" required></p>
       <p> <input type="password" name="mdp" placeholder="Mot de passe :" required></p>
       <p> <input type="submit" value="Connexion" name="bouton"></p>
       <div class="links">
            <a href="motdepasse_oublie.php">Mot de passe oublié?</a>
            <a href="Inscription.php">Pas encore inscrit?</a>
        </div>
    </form><hr>
</body>
</html>