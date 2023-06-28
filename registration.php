<?php
session_start();

// Redirect to home page if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: homepage.php");
    exit();
}

// Include database connection and helper functions
include 'resources/db_connect.php';
include 'resources/functions.php';

// Initialize variables
$username = $email = $password = $confirm_password = '';
$username_err = $email_err = $password_err = $confirm_password_err = '';

// Process form data when submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate username
    if (empty(trim($_POST['username']))) {
        $username_err = 'Please enter a username.';
    } else {
        $username = trim($_POST['username']);
        // Check if username already exists
        if (usernameExists($conn, $username)) {
            $username_err = 'Username is already taken.';
        }
    }

    // Validate email
    if (empty(trim($_POST['email']))) {
        $email_err = 'Please enter an email.';
    } else {
        $email = trim($_POST['email']);
        // Check if email already exists
        if (emailExists($conn, $email)) {
            $email_err = 'Email is already registered.';
        }
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter a password.';
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = 'Password must have at least 6 characters.';
    } else {
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Please confirm the password.';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = 'Passwords do not match.';
        }
    }

    // Check for input errors before inserting into database
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        // Prepare the insert statement
        $sql = "INSERT INTO users (username, email, password, created_at, role) VALUES (:username, :email, :password, NOW(), 'user')";
        $stmt = $conn->prepare($sql);

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Bind parameters to the statement
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page
            header("Location: login.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close the database connection
    $conn = null;
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
    <title>Registration</title>
</head>
<body>
    <?php include 'resources/header.php';?>

    <form class="registration-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class='container-registration'>
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
            <span class="error"><?php echo $username_err; ?></span>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            <span class="error"><?php echo $email_err; ?></span>

            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" required>
            <span class="error"><?php echo $password_err; ?></span>

            <label for="confirm_password">Bevestig Wachtwoord:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <span class="error"><?php echo $confirm_password_err; ?></span>

            <input type="submit" value="Registreren">
        </div>
    </form>

    <?php include 'resources/footer.php';?>
</body>
</html>
