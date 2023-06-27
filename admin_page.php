<?php
session_start();

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to the login page if not logged in or not an admin
    exit();
}

include 'resources/db_connect.php'; // Include the database connection

// Pagination variables
$records_per_page = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

// Retrieve reservations with pagination
try {
    $stmt = $conn->prepare("SELECT * FROM terduin.huur ORDER BY boekingsdatum DESC LIMIT :start_from, :records_per_page");
    $stmt->bindValue(':start_from', (int)$start_from, PDO::PARAM_INT);
    $stmt->bindValue(':records_per_page', (int)$records_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error executing the query: " . $e->getMessage();
}

// Count total number of reservations
try {
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM terduin.huur");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_reservations = $row['total'];
} catch (PDOException $e) {
    echo "Error executing the query: " . $e->getMessage();
}

$conn = null; // Close the database connection

// Calculate total number of pages
$total_pages = ceil($total_reservations / $records_per_page);

// Check if there are only 2 or less rooms available
$availableRooms = 2; // Set the available rooms value for demonstration purposes
if ($availableRooms <= 2) {
    $alarmMessage = '<div class="alarm">Nog ' . $availableRooms . ' kamer(s) beschikbaar voor de dag!</div>';
} else {
    $alarmMessage = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <title>Admin Page</title>
</head>
<body>
    <?php include 'resources/header.php'; ?>

    <div class="admin-container">
        <h2>Reservations</h2>
        <?php echo $alarmMessage; ?>
        <table class="reservations-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Booking Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation) { ?>
                    <tr>
                        <td><?php echo $reservation['id']; ?></td>
                        <td><?php echo $reservation['kamer_id']; ?></td>
                        <td><?php echo $reservation['naam']; ?></td>
                        <td><?php echo $reservation['email']; ?></td>
                        <td><?php echo $reservation['boekingsdatum']; ?></td>
                        <td>
                            <a href="edit_reservation.php?id=<?php echo $reservation['id']; ?>">Edit</a>
                            <a href="delete_reservation.php?id=<?php echo $reservation['id']; ?>" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</a>
                            <a href="print_reservation.php?id=<?php echo $reservation['id']; ?>" target="_blank">Print</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="?page=<?php echo $i; ?>" class="<?php if ($i == $page) echo 'active'; ?>"><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>

    

    <?php include 'resources/footer.php'; ?>
</body>
</html>
