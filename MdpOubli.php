<?php

$bdd = new PDO('mysql:host=localhost:3307;dbname=projetweb;charset=utf8', 'root', '');

if (isset($_POST['submit'])) {
    // Récupérer l'adresse e-mail saisie par l'utilisateur
    $email = $_POST['email'];

    // Vérifier si l'adresse e-mail existe dans la base de données
    // ... Effectuer la vérification dans votre base de données ...

    // Si l'adresse e-mail existe, générer un jeton unique
    $token = bin2hex(random_bytes(32)); // Génère un jeton de 32 octets

    // Enregistrer le jeton dans la base de données
    // ... Enregistrement du jeton dans votre base de données ...

    // Envoyer l'e-mail de réinitialisation contenant le lien avec le jeton
    $resetLink = "http://example.com/reset_password.php?token=" . $token; // Remplacez par votre URL de réinitialisation
    $subject = "Réinitialisation de votre mot de passe";
    $message = "Bonjour,\n\nVous avez demandé la réinitialisation de votre mot de passe. Cliquez sur le lien suivant pour réinitialiser votre mot de passe :\n\n" . $resetLink . "\n\nSi vous n'avez pas demandé la réinitialisation de votre mot de passe, vous pouvez ignorer cet e-mail.\n\nCordialement,\nVotre équipe";
    $headers = "From: VotreNom <votre@email>";

    // Envoyer l'e-mail
    if (mail($email, $subject, $message, $headers)) {
        echo "Un e-mail de réinitialisation a été envoyé à votre adresse e-mail. Veuillez vérifier votre boîte de réception.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de l'e-mail de réinitialisation. Veuillez réessayer ultérieurement.";
    }
}
?>

<!-- Formulaire de réinitialisation de mot de passe -->
<form method="post" action="">
    <label for="email">Adresse e-mail :</label>
    <input type="email" name="email" id="email" required>
    <input type="submit" name="submit" value="Réinitialiser le mot de passe">
</form>
