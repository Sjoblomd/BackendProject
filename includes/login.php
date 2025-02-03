<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
    $_SESSION["username"] = htmlspecialchars($_POST["username"]);
    header("Location: index.php");
    exit;
}
?>

<h3>Login</h3>
<form action="" method="post">
    <label for="username">Enter Username:</label>
    <input type="text" id="username" name="username" required>
    <button type="submit">Login</button>
</form>

<a href="includes/logout.php">Logout</a>
