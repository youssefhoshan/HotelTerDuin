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

// Retrieve the reservation details from the database
try {
    $stmt = $conn->prepare("SELECT * FROM terduin.huur WHERE id = :id");
    $stmt->bindParam(':id', $reservationId);
    $stmt->execute();
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$reservation) {
        header("Location: admin_page.php"); // Redirect to the admin page if reservation is not found
        exit();
    }
} catch (PDOException $e) {
    echo "Error executing the query: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated reservation details from the form
    $roomId = $_POST['room_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $bookingDate = $_POST['booking_date'];

    // Update the reservation in the database
    try {
        $stmt = $conn->prepare("UPDATE terduin.huur SET kamer_id = :room_id, naam = :name, email = :email, boekingsdatum = :booking_date WHERE id = :id");
        $stmt->bindParam(':room_id', $roomId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':booking_date', $bookingDate);
        $stmt->bindParam(':id', $reservationId);
        $stmt->execute();

        // Redirect to the admin page after successful update
        header("Location: admin_page.php");
        exit();
    } catch (PDOException $e) {
        echo "Error executing the query: " . $e->getMessage();
    }
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
    <title>Edit Reservation</title>
</head>
<body>
    <?php include './resources/header.php'; ?>

    <div class="form-container">
        <h2>Edit Reservation</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $reservationId; ?>" method="POST">
            <label for="room_id">Room ID:</label>
            <input type="text" id="room_id" name="room_id" value="<?php echo $reservation['kamer_id']; ?>" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $reservation['naam']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $reservation['email']; ?>" required>

            <label for="booking_date">Booking Date:</label>
            <input type="date" id="booking_date" name="booking_date" value="<?php echo $reservation['boekingsdatum']; ?>" required>

            <input type="submit" value="Update">
        </form>
    </div>

    <?php include './resources/footer.php'; ?>
</body>
</html>
