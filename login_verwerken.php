<?php
session_start(); // Start de sessie

include './resources/db_connect.php'; // Inclusie van het databaseconfiguratiebestand

// Verkrijg de ingevulde inloggegevens
$username = $_POST['username'];
$password = $_POST['password'];

try {
    // Bereid de query voor om de gebruiker te controleren
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        // Inloggegevens zijn correct, sla de gebruikersinformatie op in de sessie
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Doorsturen naar de gewenste pagina na succesvol inloggen
        header("Location: homepage.php"); // Vervang "home.php" door de gewenste startpagina na het inloggen
        exit();
    } else {
        // Inloggegevens zijn onjuist, geef een foutmelding weer
        echo "Ongeldige gebruikersnaam of wachtwoord.";
    }
} catch(PDOException $e) {
    echo "Fout bij het uitvoeren van de query: " . $e->getMessage();
}

$conn = null; // Sluit de databaseverbinding
?>
