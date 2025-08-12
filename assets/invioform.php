<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Raccogli i dati del modulo
    $nome = htmlspecialchars($_POST['nome']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $messaggio = htmlspecialchars($_POST['messaggio']);

    // Configura il destinatario e l'oggetto dell'email
    $to = "kekko-sa@live.it"; // Cambia con il tuo indirizzo email
    $subject = "Nuovo messaggio dal modulo di contatto";
    
    // Corpo dell'email
    $body = "Nome: $nome\nTelefono: $telefono\nEmail: $email\nMessaggio:\n$messaggio";
    $headers = "From: $email";

    // Invia l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Email inviata con successo!";
    } else {
        echo "Errore nell'invio dell'email.";
    }
}
?>