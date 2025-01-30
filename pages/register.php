<?php
// pages/register.php
session_start();
include '../includes/functions.php';

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    
    if (empty($username) || empty($email)) {
        $errors[] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif (preg_match("/[\r\n]/", $email)) {
        $errors[] = "Header injections are not allowed";
    }
    if (empty($errors)) {
        $password = substr(md5(rand()), 0, 8); // Random Pass gen
        
        // Email sender
        $subject = "Welcome to Match N' Meet";
        $message = "Hello $username,\n\nYour account has been created. Your password is: $password\n";
        $headers = "From: no-reply@matchnmeet.com\r\n";
        
        if (mail($email, $subject, $message, $headers)) {
            $success = "Registration successful! Your password has been sent to your email.";
        } else {
            $errors[] = "Failed to send email.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match N' Meet</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="container">

        <?php include '../includes/header.php'; ?>

        <h2>Register</h2>

        <?php if (!empty($errors)): ?>
            <div class="error-box">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success-box">
                <p><?php echo $success; ?></p>
            </div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Register</button>
        </form>

        <?php include "../includes/footer.php"; ?>
    </div>
</body>

</html>