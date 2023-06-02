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
    <main>
        <section class="information-section">
            <h2>Hotel Information</h2>
            <p>Welcome to Hotel Duin, a luxury hotel located in the heart of a beautiful coastal town. Our hotel offers stunning ocean views, comfortable accommodations, and top-notch amenities for a memorable stay.</p>
            <p>At Hotel Duin, we pride ourselves on providing exceptional service to our guests. Our friendly and attentive staff is available 24/7 to assist you with any inquiries or requests you may have.</p>
            <p>Explore the local attractions, enjoy the beautiful beach, and indulge in the finest dining experiences at our onsite restaurant. We also offer a range of amenities, including a spa, fitness center, and conference facilities for your convenience.</p>
        </section>

        <section class="contact-section">
            <h2>Contact Us</h2>
            <div class="contact-info">
                <p>If you have any questions or would like to make a reservation, please don't hesitate to contact us:</p>
                <ul>
                    <li>Address: 123 Ocean Avenue, Coastal Town</li>
                    <li>Phone: +1 123-456-7890</li>
                    <li>Email: info@hotelduin.com</li>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6933842.777338979!2d-122.21189459888377!3d31.942839972853083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80d8ebba2e05be67%3A0x71fb7360c04a9b6d!2sCuatro%20Cuatros!5e0!3m2!1snl!2snl!4v1685738545660!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </ul>
            </div>
            <div class="contact-form">
                <h2>Get in Touch</h2>
                <form action="send_email.php" method="post">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <textarea name="message" placeholder="Your Message" required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </section>
    </main>
    <?php include 'resources/footer.php'; ?>
</body>
</html>
