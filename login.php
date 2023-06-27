<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <title>Login</title>
</head>
<body>
<?php include 'resources/header.php';?>

<form class="login-form" action="login_verwerken.php" method="POST">
    <div class='container-login'>
           <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Wachtwoord:</label>
            <input type="password" class="password" id="password" name="password" required> <br>

            <input type="submit" value="Inloggen">
    </div>
 
</form>



<?php include 'resources/footer.php';?>
</body>
</html>