<?php
$countdownMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["date"])) {
    $countdownMessage = getCountdown($_POST["date"]);
}

function getCountdown($dateInput) {
    $date = strtotime($dateInput);
    $now = time();
    
    if ($date === false || $date <= $now) {
        return "Invalid or past date!";
    } else {
        $diff = $date - $now;
        $days = floor($diff / (60 * 60 * 24));
        $hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
        $minutes = floor(($diff % (60 * 60)) / 60);
        $seconds = $diff % 60;
        return "Time left until your date: $days days, $hours hours, $minutes minutes, $seconds seconds.";
    }
}
?>

<h3>Countdown to Your Date</h3>
<form action="" method="post">
    <label for="date">Select a Date:</label>
    <input type="date" id="date" name="date" required>
    <button type="submit">Start Countdown</button>
</form>
<p><?php echo $countdownMessage; ?></p>
