<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <title>Contact Us</title>
</head>
<body>
    <?php include 'resources/header.php'; ?>
    <section class="information-section">
    <h2>Hotelinformatie</h2>
    <p>Welkom bij Hotel Duin, een luxe hotel gelegen in het hart van een prachtige kustplaats. Ons hotel biedt adembenemend uitzicht op de oceaan, comfortabele accommodaties en eersteklas voorzieningen voor een onvergetelijk verblijf.</p>
    <p>Bij Hotel Duin zijn we trots op het bieden van uitzonderlijke service aan onze gasten. Ons vriendelijke en attente personeel staat 24/7 voor u klaar om u te helpen met vragen of verzoeken die u heeft.</p>
    <p>Ontdek de lokale bezienswaardigheden, geniet van het prachtige strand en laat u verwennen met culinaire hoogstandjes in ons eigen restaurant. We bieden ook een scala aan voorzieningen, waaronder een spa, fitnesscentrum en conferentiefaciliteiten voor uw gemak.</p>
  </section>

  <section class="contact-section">
  <h2>Contacteer ons</h2>
  <div class="contact-info">
    <p>Als u vragen heeft of een reservering wilt maken, aarzel dan niet om contact met ons op te nemen:</p>
    <ul>
      <li>Adres: 123 Ocean Avenue, Kustplaats</li>
      <li>Telefoon: +1 123-456-7890</li>
      <li>E-mail: info@hotelduin.com</li>
    </ul>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6933842.777338979!2d-122.21189459888377!3d31.942839972853083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80d8ebba2e05be67%3A0x71fb7360c04a9b6d!2sCuatro%20Cuatros!5e0!3m2!1snl!2snl!4v1685738545660!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="contact-form">
    <h2>Neem contact op</h2>
    <form action="send_email.php" method="post">
      <input type="text" name="name" placeholder="Uw Naam" required>
      <input type="email" name="email" placeholder="Uw E-mail" required>
      <textarea name="message" placeholder="Uw Bericht" required></textarea>
      <button type="submit">Verstuur Bericht</button>
    </form>
  </div>
</section>
</
  </section>
</main>
    <?php include 'resources/footer.php'; ?>
</body>
</html>
