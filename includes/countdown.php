<?php
$countdownMessage = "";
$initialTimeLeft = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["date"])) {
    $dateInput = $_POST["date"];
    $date = strtotime($dateInput);
    $now = time();

    if ($date === false || $date <= $now) {
        $countdownMessage = "Ogiltigt eller passerat datum!";
    } else {
        $initialTimeLeft = $date - $now; // Tidsdifferens i sekunder
        $countdownMessage = "Nedräkningen har startats. Nedräkning visas nedan.";
    }
}
?>

<h3>Nedräkning till ditt datum</h3>
<form action="" method="post">
    <label for="date">Välj ett datum:</label>
    <input type="date" id="date" name="date" required>
    <button type="submit">Starta nedräkning</button>
</form>

<p id="countdownMessage"><?php echo $countdownMessage; ?></p>
<p id="countdown"></p>

<?php if ($initialTimeLeft > 0): ?>
<script>
    // JavaScript för realtidsnedräkning
    let timeLeft = <?php echo $initialTimeLeft; ?>; // Tid kvar i sekunder (från PHP)

    function updateCountdown() {
        if (timeLeft <= 0) {
            document.getElementById("countdown").textContent = "Nedräkningen är avslutad!";
            clearInterval(countdownInterval);
        } else {
            const days = Math.floor(timeLeft / (60 * 60 * 24)); 
            const hours = Math.floor((timeLeft % (60 * 60 * 24)) / (60 * 60)); 
            const minutes = Math.floor((timeLeft % (60 * 60)) / 60); 
            const seconds = timeLeft % 60; 

            document.getElementById("countdown").textContent =
                `Tid kvar till ditt datum: ${days} dagar, ${hours} timmar, ${minutes} minuter, ${seconds} sekunder.`;

            timeLeft--; // Minska tiden kvar med 1 sekund
        }
    }

    // Kör nedräkningen varje sekund
    const countdownInterval = setInterval(updateCountdown, 1000);

    // Initiera direkt
    updateCountdown();
</script>
<?php endif; ?>
