<?php
session_start();
include '../includes/functions.php';

$upload_dir = '../uploads/';
$uploaded_files = array_diff(scandir($upload_dir), array('.', '..'));
$profile_picture = $_SESSION['profile_picture'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <?php include '../includes/header.php'; ?>
        <h2>Upload profile picture</h2>

        <?php if (!empty($_SESSION['upload_errors'])): ?>
            <div class="error-box">
                <?php foreach ($_SESSION['upload_errors'] as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
                <?php unset($_SESSION['upload_errors']); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['upload_success'])): ?>
            <div class="success-box">
                <p><?php echo htmlspecialchars($_SESSION['upload_success']); ?></p>
                <?php unset($_SESSION['upload_success']); ?>
            </div>
        <?php endif; ?>

        <form action="../includes/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="profile_picture" accept="image/png, image/jpeg" required>
            <button type="submit">Upload</button>
        </form>

        <h3>Current Profile Picture:</h3>
        <?php if ($profile_picture): ?>
            <img src="<?php echo $upload_dir . htmlspecialchars($profile_picture); ?>" alt="Profile Picture" width="150">
        <?php else: ?>
            <p>No profile picture uploaded.</p>
        <?php endif; ?>

        <h3>Previous Profile Pictures:</h3>
        <div class="profile-pictures">
            <?php foreach ($uploaded_files as $file): ?>
                <img src="<?php echo $upload_dir . htmlspecialchars($file); ?>" alt="Profile Picture" width="100">
            <?php endforeach; ?>
        </div>

        <?php include '../includes/footer.php'; ?>
    </div>
</body>
</html>
