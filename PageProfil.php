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
    <link rel ="stylesheet" href="Profil.css">
    <title>LeBonCoin</title>
</head>

<body>

<h1>Bienvenue sur votre page de profil</h1>
<p><?php echo $_SESSION["mail"]; ?></p>

<form action="" method="post" enctype="multipart/form-data">
<div class="container">
    <img src="profil.png" onclick="showBox()">
    <div id="box" class="hidden">
        <p><input type = "submit" value="Modifier" name="bouton" class="profil"></p>
        <p><input type = "submit" value="Deconnexion" name="bouton1" class="profil"></p>
        <p><input type = "submit" value="Supprimer son compte" name="bouton2" class="delete-button"></p>
    </div>
    <i><input type="submit" value="Ajouter une annonce" name="bouton3" class="annonce"></i>
    <i><input type="submit" value="Favori" name="bouton4" class="favori"></i>
    <i><input type="submit" value="Message" name="bouton5" class="message"></i>
    <i><input type="submit" value="Voir mes annonces" name="bouton6" class="annonces"></i>
    <i><input type="submit" value="Retourner à l'accueil" name="bouton7" class="accueil"></i>
    
</div>    
</form>

<script>
  function ouvrirListe() {
    var liste = document.getElementById("maListe");
    if (liste.style.display === "none") {
      liste.style.display = "block";
    } else {
      liste.style.display = "none";
    }
  }

  function showBox() {
  var box = document.getElementById("box");
  if (box.classList.contains("hidden")) {
    box.classList.remove("hidden");
  } else {
    box.classList.add("hidden");
  }
}

</script>


<?php 

if(isset($_POST["bouton"])){
    echo "Vous allez être redirigé";
    header("location:PageProfilModif.php");
}
elseif(isset($_POST["bouton1"])){
    echo "Vous allez être redirigé";
    header("location:Deconnexion.php");
}
elseif(isset($_POST["bouton2"])){

    echo "Vous allez être redirigé";
    header("location:SuppCompte.php");
}elseif(isset($_POST["bouton3"])){

  echo "Vous allez être redirigé";
  header("location:AjouterAnnonce.php");
}elseif(isset($_POST["bouton4"])){

  echo "Vous allez être redirigé";
  header("location:Favori.php");
}
elseif(isset($_POST["bouton5"])){

  echo "Vous allez être redirigé";
  header("location:Messagerie.php");
}
elseif(isset($_POST["bouton6"])){

  echo "Vous allez être redirigé";
  header("location:Annonce.php");
}       
elseif(isset($_POST["bouton7"])){

  echo "Vous allez être redirigé";
  header("location:Accueil2.php");
}             

?>      

</body>
</html>