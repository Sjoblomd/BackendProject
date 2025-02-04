<?php
// pages/guestbook.php
session_start();
include '../includes/functions.php';

$comments_file = '../comments.txt';
$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])) {
    $username = $_SESSION['username'] ?? 'Guest';
    $comment = trim($_POST['comment']);
    $timestamp = date("Y-m-d H:i:s");

    if (empty($comment)) {
        $errors[] = "Comment cannot be empty.";
    }

    if (empty($errors)) {
        $new_comment = "$timestamp | $username: $comment" . PHP_EOL;
        file_put_contents($comments_file, $new_comment, FILE_APPEND);
        $success = "Comment posted successfully!";
    }
}

$comments = file_exists($comments_file) ? array_reverse(file($comments_file, FILE_IGNORE_NEW_LINES)) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <?php include '../includes/header.php'; ?>
        <h2>Guestbook</h2>

        <?php if (!empty($errors)): ?>
            <div class="error-box">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success-box">
                <p><?php echo htmlspecialchars($success); ?></p>
            </div>
        <?php endif; ?>

        <form action="guestbook.php" method="post">
            <textarea name="comment" placeholder="Leave a comment" required></textarea>
            <button type="submit">Post Comment</button>
        </form>

        <h2>Comments</h2>
        <div class="comments">
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <p><?php echo htmlspecialchars($comment); ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No comments yet!</p>
            <?php endif; ?>
        </div>

        <?php include '../includes/footer.php'; ?>
    </div>
</body>
</html>
