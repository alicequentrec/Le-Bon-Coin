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
<h1>Inscription</h1><hr>
    <form action="" method="post" enctype="multipart/form-data">
        <p><input type = "text" name = "nom" placeholder="Entrez votre Nom" required></p>
        <p><input type = "text" name = "prenom" placeholder="Entrez votre Prénom" required></p>
        <p><input type = "email" name = "mail" placeholder="Entrez votre mail" required></p>
        <p><input type = "password" name = "mdp" placeholder="Mot de passe" required></p>
        <p><input type = "telephone" name = "telephone" placeholder="Entrez votre numero de telephone"></p>
        <p><input type="file" name="avatar"></p>
        <p><input type = "submit" value = "Envoyer" name = "bouton" required></p>
        <a href="Connexion.php">Déjà inscrit?</a>
    </form><hr>

    <?php
    if(isset($_POST["bouton"])){
        // var_dump($_POST);
        // var_dump($_FILES);
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mail = $_POST["mail"];
        $mdp = $_POST["mdp"];
        $hashedmdp = password_hash($mdp, PASSWORD_DEFAULT);
  
        $pos = strpos($_FILES["avatar"]["name"], ".");
        $extension = substr($_FILES["avatar"]["name"], $pos);
        $avatar = "$nom$extension";
        move_uploaded_file($_FILES["avatar"]["tmp_name"], "avatar/$avatar");
        $telephone = $_POST["telephone"];
        //connexion au serveur mysql
        $bdd = new PDO('mysql:host=localhost:3307;dbname=projetweb;charset=utf8', 'root', '');
    
        $requete = "INSERT INTO user (id, nom, prenom, mail, mdp, avatar, telephone)
                    VALUES (null, :nom, :prenom, :mail, :mdp, :avatar, :telephone)";
        $stmt = $bdd->prepare($requete);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':mdp', $hashedmdp); // Utilisation du mot de passe haché
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->execute();
        echo "<h3>Inscription réussie.<br>Vous pouvez vous connecter...</h3>";
        /*echo $requete;
        echo mysqli_error($id);*/
        header("refresh:3; url=connexion.php");
        
    }
?>

</body>
</html>

    