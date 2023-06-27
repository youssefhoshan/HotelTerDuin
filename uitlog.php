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
<head>
  <title>Uitlogformulier</title>
</head>
<body>
  <h2 class="h2-uitlog">Uitloggen</h2>
  
  <form action="logout_verwerken.php" method="post">
    <input type="submit" value="Uitloggen">
  </form>

  <?php include 'resources/footer.php';?>
</body>
</html>
