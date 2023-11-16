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

$id = mysqli_connect("localhost:3307", "root", "", "projetweb");

$idu = $_SESSION['id'];
$requete = "DELETE FROM annonce WHERE id = '$idu'";

mysqli_query($id,$requete);

echo "Annonce supprimée";
header('refresh:2; url=PageProfil.php');


?>

</body>
</html>