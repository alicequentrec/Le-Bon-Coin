<?php

session_start();
if (!isset($_SESSION['mail'])) {
    header('Location: Connexion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="Accueil2.css">
    <title>LeBonCoin</title>
</head>

<h1>Bienvenue sur votre page de profil</h1>
<p><?php echo $_SESSION["mail"]; ?></p>

<?php

$bdd = new PDO('mysql:host=localhost:3307;dbname=projetweb;charset=utf8', 'root', '');

$annonce = $bdd->query('SELECT Nom, Prix, Description FROM annonce ORDER BY id DESC');
$q = "";

if (isset($_GET['q']) && !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $annonce = $bdd->query('SELECT Nom, Prix, Description FROM annonce WHERE Nom LIKE "%' . $q . '%" ORDER BY id DESC');

    if ($annonce->rowCount() == 0) {
        $annonce = $bdd->query('SELECT Nom, Prix, Description FROM annonce WHERE CONCAT(Nom, Prix) LIKE "%' . $q . '%" ORDER BY id DESC');
    }
}
?>

<html>
<form method="GET">
    <div class="recherche">
        <input type="search" name="q" placeholder="Recherche..." class="barre"/>
        <input type="submit" value="Valider" class="Valider"/>
    </div>
    <input type="submit" value="Profil" name="bouton" class="profil">
</form>

<?php 

if ($annonce->rowCount() > 0) { ?>
    <ul>
        <?php while ($a = $annonce->fetch()) { ?>
            <div class="box">
                <li><?= $a['Nom'] ?></li>
                <li><?= $a['Prix'] ?>$</li>
                <li><?= $a['Description'] ?></li>
                <a href="Annonce.php">Voir Détail</a>

            </div>
            
        <?php } ?>
    </ul>
<?php } else { ?>
    Aucun résultat pour: <?= $q ?>
<?php } ?>

<?php 
if(isset($_POST['bouton'])){
    header("refresh:1; url=PageProfil.php");
}
?>


</body>
</html>