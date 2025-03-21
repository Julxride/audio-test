<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "julxride@gmail.com"; // Ton adresse email
    $subject = "Nouveau message de votre formulaire";
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    $body = "Email : $email\n\nMessage :\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\nX-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        echo "✅ Message envoyé avec succès !";
    } else {
        echo "❌ Échec de l'envoi du message.";
    }
} else {
    echo "❌ Méthode de requête non valide.";
}
