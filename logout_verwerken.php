

<?php
// Start de sessie
session_start();

// Voer eventuele andere logout-logica uit, zoals het vernietigen van sessiegegevens of het bijwerken van de gebruikersstatus

// Verwijder alle sessievariabelen
$_SESSION = array();

// Als je de sessie wilt behouden voor toekomstig gebruik, maar de gebruiker wilt uitloggen, kun je in plaats daarvan individuele sessievariabelen verwijderen met unset()

// Vernietig de sessie
session_destroy();

// Stuur de gebruiker door naar een andere pagina (bijv. inlogpagina)
header("Location: login.php");
exit();
?>
