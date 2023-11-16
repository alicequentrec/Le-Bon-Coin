<?php 
session_start();
$id = mysqli_connect("localhost:3307", "root", "", "projetweb");

// Récupérer les informations de l'utilisateur connecté
$result = $id->query("SELECT * FROM user WHERE mail='" . $_SESSION['mail']. "'");
$user = $result->fetch_assoc();

// Fermer la connexion à la base de données
$id->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="PageProfilModif.css">
    <title>LeBonCoin</title>
</head>

<body>
<h1>Profil</h1><hr>
    <form action="" method="post" enctype="multipart/form-data">
        <p><input type = "text" name = "nom" value="<?php echo $user['nom']; ?>" ></p>
        <p><input type = "text" name = "prenom" value="<?php echo $user['prenom']; ?>" ></p>
        <p><input type = "email" name = "mail" value="<?php echo $user['mail']; ?>" ></p>
        <p><input type="text" name="telephone" <?php if(!empty($user['telephone'])) { echo 'value="' . $user['telephone'] . '"'; } else { echo 'placeholder="Entrez votre numero de telephone"'; } ?>></p>
        <p><input type = "submit" value = "Enregistrer" name = "bouton" required></p>
        
    </form><hr>

    <?php
    if(isset($_POST["bouton"])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];

        $id = mysqli_connect("localhost:3307", "root", "", "projetweb");

        $requete = "UPDATE user SET nom = '$nom', prenom = '$prenom', telephone = '$telephone' WHERE mail='".$_SESSION['mail']."'";
        mysqli_query($id, $requete);

        echo "<h3>Informations enregistrées.<br>Retour vers profil...</h3>";
        /*echo $requete;
        echo mysqli_error($id);*/
        header("refresh:2; url=PageProfil.php");
    }
    ?>

</body>
</html>

