<?php
session_start();

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to the login page if not logged in or not an admin
    exit();
}

include 'resources/db_connect.php'; // Include the database connection

// Check if the reservation ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: admin.php"); // Redirect to the admin page if ID is not provided
    exit();
}

$reservationId = $_GET['id'];

// Retrieve the reservation details
try {
    $stmt = $conn->prepare("SELECT * FROM terduin.huur WHERE id = :reservationId");
    $stmt->bindValue(':reservationId', $reservationId, PDO::PARAM_INT);
    $stmt->execute();
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error executing the query: " . $e->getMessage();
}

$conn = null; // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <title>Print Reservation</title>
    <style>
        /* Add your custom CSS styles for printing the reservation here */
    </style>
</head>
<body>
    <div class="print-container">
        <h2>Reservation Details</h2>
        <table>
            <tr>
                <th>ID:</th>
                <td><?php echo $reservation['id']; ?></td>
            </tr>
            <tr>
                <th>Room ID:</th>
                <td><?php echo $reservation['kamer_id']; ?></td>
            </tr>
            <tr>
                <th>Name:</th>
                <td><?php echo $reservation['naam']; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $reservation['email']; ?></td>
            </tr>
            <tr>
                <th>Booking Date:</th>
                <td><?php echo $reservation['boekingsdatum']; ?></td>
            </tr>
        </table>
    </div>

    <script>
        window.onload = function() {
            window.print(); // Automatically trigger the print dialog when the page loads
        }
    </script>
</body>
</html>
