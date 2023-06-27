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
    header("Location: admin_page.php"); // Redirect to the admin page if reservation ID is not provided
    exit();
}

$reservationId = $_GET['id'];

// Delete the reservation from the database
try {
    $stmt = $conn->prepare("DELETE FROM terduin.huur WHERE id = :id");
    $stmt->bindParam(':id', $reservationId);
    $stmt->execute();

    // Redirect to the admin page after successful deletion
    header("Location: admin_page.php");
    exit();
} catch (PDOException $e) {
    echo "Error executing the query: " . $e->getMessage();
}

$conn = null; // Close the database connection
?>
