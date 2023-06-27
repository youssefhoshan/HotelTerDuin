<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <title>Reservation</title>
</head>


<?php include 'resources/header.php'; ?>

<div class="thankyou-container">
  <h1>Bedankt voor uw boeking!</h1>
  <?php
  if (isset($_GET['name']) && isset($_GET['bookingId'])) {
    $name = $_GET['name'];
    $bookingId = $_GET['bookingId'];

    echo '<p>Beste ' . $name . ',</p>';
    echo '<p>Uw boeking met boekingsnummer ' . $bookingId . ' is succesvol voltooid.</p>';
    echo '<p>Bedankt voor het kiezen van ons hotel. We kijken ernaar uit om u te verwelkomen!</p>';

    
  }
  ?>
</div>
<canvas id="confetti"></canvas>

<script src="./resources/confetti.js"></script>
<style>
  .thankyou-container {
    text-align: center;
    margin-top: 100px;
  }

  .thankyou-container h1 {
    color: #333;
    font-size: 24px;
  }

  .thankyou-container p {
    color: #555;
    font-size: 16px;
    margin-bottom: 10px;
  }
</style>

<?php include 'resources/footer.php'; ?>
</body>
</html>