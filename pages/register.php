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
        <?php include "../includes/header.php"; ?>

        <h2>Welcome to Match N' Meet</h2>
        <p>Find your perfect match today!</p>

        <button type="button" class="toggle-butn">Show Info</button>
        <div class="info-box" id="infoBox">
            <p>Your IP Address: <?php echo $user_ip; ?></p>
            <p>Server: <?php echo $server_info['server_name']; ?></p>
            <p>Timezone: <?php echo $server_info['timezone']; ?></p>
            <p>First Visit: <?php echo $first_visit; ?></p>
        </div>

        <script src="../scripts/toggleInfo.js"></script>

        <?php include "../includes/footer.php"; ?>
    </div>
</body>
</html>