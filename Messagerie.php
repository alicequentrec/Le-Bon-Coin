<?php
session_start();
if (!isset($_SESSION["mail"])) {
    header("location: Connexion.php");
    exit();
}
$mail = $_SESSION["mail"];
$prenom = $_SESSION["prenom"];

$id = mysqli_connect("localhost:3307","root","","projetweb");
if(isset($_POST["bouton"])){
    $pseudo = $_POST["destinataire"];
    $message = $_POST["message"];
    $req = "insert into messages
            values (null, '$pseudo', '$message', now())";
    mysqli_query($id, $req);
    echo mysqli_error($id);
    /*header("location:Messagerie.php");*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Messagerie.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Salut <?=$prenom?>, Bienvenue dans le Chatbox
                <img src="message.jpg" width="35"></h1>
        </header>
        <div class="messages">
            <ul>
                <?php
                $req = "SELECT * FROM messages
                        WHERE destinataire = '$pseudo'
                        OR destinataire = 'tous'
                        ORDER BY date DESC";
                $res = mysqli_query($id, $req);
                if ($res) {
                    while ($ligne = mysqli_fetch_assoc($res)) {
                        $expediteur = $ligne["destinataire"];
                        $message = $ligne["message"];
                        $date = $ligne["date"];
                        echo "<li class='message'>$date - $pseudo: $message</li>";
                        
                    }
                }
                ?>
                
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <input type="text" name="message" placeholder="Message :" >
                <select name="destinataire">
                    <option value="tous"> Tous </option>
                    <?php
                    $req = "SELECT * FROM user ORDER BY prenom";
                    $res = mysqli_query($id, $req);
                    if ($res) {
                        while ($ligne = mysqli_fetch_assoc($res)) {
                            $dest = $ligne["prenom"];
                            echo "<option value='$dest'> $dest </option>";
                        }
                    }
                    if(isset($_POST["bouton2"])){
                        header("location:PageProfil.php");
                    }
                    ?>
                </select><br>
                <input type="submit" value="Envoyer" name="bouton">
                <input type="submit" value="Revenir sur profil" name="bouton2">
            </form>
        </div>
    </div>
</body>
</html>


