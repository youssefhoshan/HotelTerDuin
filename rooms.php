<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <title>Kamers</title>
</head>
<body>
    <?php include 'resources/header.php';?>

    <div class="container-hotel">
        <h1 class="hotel-title">Kamers</h1>
        <div class="room-list-hotel">
            <?php
            // Inclusie van de databaseverbinding
            include 'resources/db_connect.php';

            // Query om kamers op te halen
            $sql = "SELECT * FROM kamer";
            $stmt = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Loop door de resultaten en toon de kamers
            foreach ($result as $row) {
                echo '<div class="room-hotel">';
                echo '<img src="images/' . $row['afbeelding'] . '" alt="' . $row['naam'] . '">';
                echo '<h2>' . $row['naam'] . '</h2>';
                echo '<p class="price-hotel">€ ' . $row['prijs'] . '</p>';
                echo '<p>' . $row['beschrijving'] . '</p>';
                echo '<p>' . $row['bonus'] . '</p>';
                echo '<a class="hotel-link" href="huur.php?id=' . $row['id'] . '">Nu huren</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <?php include 'resources/footer.php';?>
</body>
</html>
