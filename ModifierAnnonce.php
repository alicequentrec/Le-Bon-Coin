<?php 
session_start();
$id = mysqli_connect("localhost:3307", "root", "", "projetweb");

// Récupérer les informations de l'utilisateur connecté
$result = $id->query("SELECT * FROM annonce WHERE id='" . $_SESSION['id']. "'");
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
        <p><input type="text" name="titre" value="<?php echo $annonce['titre']; ?>"></p>
        <p><textarea name="description"><?php echo $annonce['description']; ?></textarea></p>
        <p><input type="text" name="prix" value="<?php echo $annonce['prix']; ?>"></p>
        <p><input type="file" name="image"></p>
        <p><input type="submit" value="Enregistrer" name="bouton"></p>
    </form><hr>

    <?php
    if(isset($_POST["bouton"])){
        // Récupérer les valeurs du formulaire
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $image = $_FILES['image']['name'];

        // Déplacer l'image vers le dossier de destination (assurez-vous que le dossier existe)
        move_uploaded_file($_FILES['image']['tmp_name'], 'chemin/vers/le/dossier/' . $image);

        // Effectuer la mise à jour de l'annonce dans la base de données
        $requete = "UPDATE annonce SET titre = '$titre', description = '$description', prix = '$prix', image = '$image' WHERE id = '".$_SESSION['id']."'";
        mysqli_query($id, $requete);

        echo "<h3>Modification enregistrée.<br>Retour vers l'annonce...</h3>";
        header("refresh:2; url=annonce.php?id=".$_SESSION['id']);
    }
    ?>

</body>
</html>
