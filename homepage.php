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
      <h2>Welcome to Hotel Duin</h2>
      <p>Experience luxury and comfort in our beautiful hotel rooms.</p>
    </section>

    <section class="room-section">
  <div class="room-list">
    <div class="room-card">
      <img src="images/room1.jpg" alt="Room 1">
      <h3>Standard Room</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <a href="#" class="btn">Book Now</a>
    </div>
    <div class="room-card">
      <img src="images/room2.jpg" alt="Room 2">
      <h3>Deluxe Room</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <a href="#" class="btn">Book Now</a>
    </div>
    <div class="room-card">
      <img src="images/room3.jpg" alt="Room 3">
      <h3>Suite Room</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <a href="#" class="btn">Book Now</a>
    </div>
  </div>
</section>
<section class="about-section">
  <div class="about-content">
    <h2>About Us</h2>
    <p>Welcome to Hotel Duin, a luxury hotel located in the heart of a beautiful coastal town. We offer comfortable accommodations, exceptional service, and a memorable experience for all our guests. Whether you're here for a relaxing getaway or a business trip, we strive to provide you with a delightful stay.</p>
    <p>Our hotel features a range of amenities, including a spa, fitness center, and fine dining restaurant. Our dedicated staff is available 24/7 to ensure your needs are met and to provide recommendations for local attractions and activities.</p>
    <a href="contact.php" class="btn">Contact Us</a>
  </div>
  <div class="hotel-image">
    <img src="images/hotel.jpg" alt="Hotel Duin">
  </div>
</section>

  </main>
 <?php include 'resources/footer.php';?>
</body>
</html>
