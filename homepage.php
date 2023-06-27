<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to our Hotel</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
 <?php include 'resources/header.php';?>

  <main>
    <section class="welcome-section">
      <h2>Welcome bij Hotel Duin</h2>
      <p>Ervaar luxe en comfort in onze prachtige hotelkamers.</p>
    </section>

    <section class="room-section">
  <div class="room-list">
    <div class="room-card">
      <img src="images/room1.jpg" alt="Room 1">
      <h3>Standaard Kamer</h3>
      <p> Een comfortabele en betaalbare optie voor gasten die op zoek zijn naar een aangenaam verblijf.</p>
      <a href="rooms.php" class="btn">Boek Nu</a>
    </div>
    <div class="room-card">
      <img src="images/room2.jpg" alt="Room 2">
      <h3>Deluxe Kamer</h3>
      <p>Een ruimere en luxueuzere optie voor gasten die wat extra comfort en stijl wensen.</p>
      <a href="rooms.php" class="btn">Boek Nu</a>
    </div>
    <div class="room-card">
      <img src="images/room3.jpg" alt="Room 3">
      <h3>Suite Kamer</h3>
      <p>De meest exclusieve en luxe accommodatie in het hotel</p>
      <a href="rooms.php" class="btn">Boek Nu</a>
    </div>
  </div>
</section>
<section class="about-section">
  <div class="about-content">
    <h2>Over Ons</h2>
    <p>Welkom bij Hotel Duin, een luxe hotel gelegen in het hart van een prachtige kustplaats. Wij bieden comfortabele accommodaties, uitzonderlijke service en een gedenkwaardige ervaring voor al onze gasten. Of u nu hier bent voor een ontspannen uitje of een zakenreis, we streven ernaar u een heerlijk verblijf te bieden.</p>
    <p>Ons hotel beschikt over een scala aan voorzieningen, waaronder een spa, fitnesscentrum en een restaurant met verfijnde gerechten. Ons toegewijde personeel is 24/7 beschikbaar om aan uw behoeften te voldoen en aanbevelingen te doen voor lokale bezienswaardigheden en activiteiten.</p>
    <a href="contact.php" class="btn">Neem Contact Op</a>
  </div>
  <div class="hotel-image">
    <img src="images/hotel.jpg" alt="Hotel Duin">
  </div>
</section>

  </main>
 <?php include 'resources/footer.php';?>
</body>
</html>
