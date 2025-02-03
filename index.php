<?php
session_start();
include "includes/functions.php";
include "includes/counter.php"; 

$user_ip = $_SERVER['REMOTE_ADDR'];
$username = $_SESSION['username'] ?? 'Guest';
$server_info = getServerInfo();
$first_visit = getFirstVisitTime();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match N' Meet</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/MNMFavicon.png">
</head>

<body>
    <div class="container">
        <?php include "header.php"; ?>

        <h2>Welcome to Match N' Meet</h2>
        <p>Find your perfect match today!</p>

        <button class="toggle-butn">Show Info</button>
        <div class="info-box" id="infoBox">
            <p>Your IP Address: <?php echo $user_ip; ?></p>
            <p>Username: <?php echo $username; ?></p>
            <p>Server: <?php echo $server_info['server_name']; ?></p>
            <p>Timezone: <?php echo $server_info['timezone']; ?></p>
            <p>First Visit: <?php echo $first_visit; ?></p>
        </div>

        <?php include "includes/login.php"; ?>  
        <?php include "includes/countdown.php"; ?>  
        <h3>Visitor Counter</h3>
        <p>Unique Visitors: <strong><?php echo countVisitors(); ?></strong></p>

        <script src="scripts/toggleInfo.js"></script>
        <?php include "footer.php"; ?>
    </div>
</body>
</html>
