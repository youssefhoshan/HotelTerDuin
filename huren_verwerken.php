<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
include 'resources/db_connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomId = $_POST['kamer_id'];
    $name = $_POST['naam'];
    $email = $_POST['email'];
    $bookingDate = $_POST['boekingsdatum'];

    $selectedDate = $_POST["boekingsdatum"];

    // Get the current date
    $currentYear = date("Y");
    $currentDate = date("Y-m-d");

    // Check if the selected date is in the past or beyond the current year
    if ($selectedDate < $currentDate || date("Y", strtotime($selectedDate)) > $currentYear) {
        echo "<script>alert('U kunt niet back in the future!')</script>";
    } else {

    // Controleer of de kamer beschikbaar is
    $sqlCheckAvailability = "SELECT COUNT(*) AS count FROM huur WHERE kamer_id = :roomId AND boekingsdatum = :bookingDate";
    $stmtCheckAvailability = $conn->prepare($sqlCheckAvailability);
    $stmtCheckAvailability->bindParam(':roomId', $roomId);
    $stmtCheckAvailability->bindParam(':bookingDate', $bookingDate);
    $stmtCheckAvailability->execute();
    $availabilityResult = $stmtCheckAvailability->fetch(PDO::FETCH_ASSOC);

    if ($availabilityResult['count'] >= 3) {
        echo 'De kamer is niet beschikbaar op de opgegeven datum.';
        exit;
    }

    // Voeg de huur toe aan de database
    $sqlAddBooking = "INSERT INTO huur (kamer_id, naam, email, boekingsdatum) VALUES (:roomId, :name, :email, :bookingDate)";
    $stmtAddBooking = $conn->prepare($sqlAddBooking);
    $stmtAddBooking->bindParam(':roomId', $roomId);
    $stmtAddBooking->bindParam(':name', $name);
    $stmtAddBooking->bindParam(':email', $email);
    $stmtAddBooking->bindParam(':bookingDate', $bookingDate);
    $stmtAddBooking->execute();

    // Genereer de factuur
    $bookingId = $conn->lastInsertId();
    $invoice = "Factuur voor kamerhuur" . "\n\n";
    $invoice .= "Boekingsnummer: " . $bookingId . "\n";
    $invoice .= "Naam: " . $name . "\n";
    $invoice .= "E-mail: " . $email . "\n";
    $invoice .= "Boekingsdatum: " . $bookingDate . "\n";
    // Voeg andere factuurgegevens toe, zoals prijs en betalingsinstructies

    // Stuur de factuur naar de klant via e-mail
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'hotelterduin@outlook.com';
    $mail->Password = 'Hotel123';
    $mail->setFrom('hotelterduin@outlook.com', 'Test Test');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Factuur voor kamerhuur';
    $mail->Body = $invoice;

    try {
        $mail->send();
        header('Location: thankyou.php?name=' . urlencode($name) . '&bookingId=' . $bookingId);
        exit;
    } catch (Exception $e) {
        echo 'Er is een fout opgetreden bij het verzenden van de e-mail: ' . $mail->ErrorInfo;
    }

    // Update de beschikbaarheid van de kamer
    $sqlUpdateAvailability = "UPDATE huur SET beschikbaarheid = beschikbaarheid - 1 WHERE id = :roomId";
    $stmtUpdateAvailability = $conn->prepare($sqlUpdateAvailability);
    $stmtUpdateAvailability->bindParam(':roomId', $roomId);
    $stmtUpdateAvailability->execute();

}


} else {
    echo 'Ongeldige aanvraag.';
}
?>
