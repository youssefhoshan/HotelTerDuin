<?php
include 'resources/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $roomId = $_GET['id'];

    // Haal de kamerinformatie op uit de database
    $sql = "SELECT * FROM kamer WHERE id = :roomId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':roomId', $roomId);
    $stmt->execute();
    $room = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$room) {
        echo 'Kamer niet gevonden.';
        exit;
    }

    // Toon het formulier voor huurinformatie
    ?>

    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <title>Huur</title>
</head>
    <body>
        <?php include 'resources/header.php';?>
<main>
<div class="container-room">
            <div class="room-container">
                <div class="room-images">
                    <img src="images/<?php echo $room['afbeelding']; ?>" alt="<?php echo $room['naam']; ?>">
                </div>
                <div class="room-details">
                    <h2 class="room-title"><?php echo $room['naam']; ?></h2>
                    <p class="price">€ <?php echo $room['prijs']; ?></p>
                    <form method="POST" action="huren_verwerken.php">
                        <input type="hidden" name="kamer_id" value="<?php echo $roomId; ?>">
                        <label for="naam">Naam:</label>
                        <input placeholder="Uw naam..." type="text" name="naam" required>
                        <label for="email">E-mail:</label>
                        <input placeholder="Uw e-mail..." type="email" name="email" required>
                        <label for="boekingsdatum">Boekingsdatum:</label>
                        <input type="date" name="boekingsdatum" required>
                        <input type="submit" value="Huur nu">
                    </form>
                </div>
            </div>
        </div>
</main>

    
    </body>
    <?php include 'resources/footer.php';?>
    </html>

    <?php
} else {
    echo 'Ongeldige aanvraag.';
}
?>
