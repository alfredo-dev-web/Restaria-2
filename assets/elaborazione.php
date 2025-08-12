<?php
// Verifica che i dati siano stati inviati tramite POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filtra e assegna i dati del modulo
    $nome = htmlspecialchars($_POST['nome']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $messaggio = htmlspecialchars($_POST['messaggio']);
    $consenso = isset($_POST['consenso']) ? "Sì" : "No";

    // Indirizzo email del destinatario
    $destinatario = "provacontroprova970@gmail.com"; // Sostituisci con il tuo indirizzo email
    $oggetto = "Nuovo messaggio dal modulo di contatto";

    // Corpo del messaggio email
    $corpo = "Hai ricevuto un nuovo messaggio:\n\n";
    $corpo .= "Nome: $nome\n";
    $corpo .= "Telefono: $telefono\n";
    $corpo .= "Email: $email\n\n";
    $corpo .= "Messaggio:\n$messaggio\n\n";
    $corpo .= "Consenso al trattamento dei dati: $consenso\n";

    // Intestazioni dell'email
    $intestazioni = "From: $email";

    // Invio dell'email
    if (mail($destinatario, $oggetto, $corpo, $intestazioni)) {
        echo "Messaggio inviato con successo! Grazie per averci contattato.";
    } else {
        echo "Errore nell'invio del messaggio. Riprova più tardi.";
    }
} else {
    echo "Richiesta non valida. Si prega di inviare il modulo correttamente.";
}
?>