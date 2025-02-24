<?php
session_start();
include '../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reflektion & Feedback</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="images/MNMFavicon.png">
</head>

<body>
    <div class="container">
        <?php include '../includes/header.php'; ?>

        <h2>Reflektion & Feedback</h2>
        <p>Här sammanfattar vi våra tankar kring inlärningen, utmaningar och förbättringar för kursen.</p>

        <section>
            <h3>Inlärningsprocessen</h3>
            <p>Att arbeta med detta projekt har varit både lärorikt och utmanande. Vi har fått en djupare förståelse för PHP, sessionshantering och hantering av formulärdata. En av de viktigaste lärdomarna har varit hur man organiserar koden bättre genom att separera PHP-logik från HTML och använda include för att hålla koden ren och strukturerad.</p>
            <p>Det var särskilt givande att få praktisk erfarenhet av att hantera cookies och sessioner.</p>
        </section>

        <section>
            <h3>Utmaningar och svårigheter</h3>
            <p>En av de större utmaningarna var att få sessionshantering att fungera korrekt. Att förstå hur information lagras mellan sidladdningar tog tid, särskilt när vi försökte kombinera det med inloggningssystemet.</p>
            <p>En annan utmaning var att få räknaren för unika besökare att fungera. Det krävde en del felsökning innan vi insåg att vi behövde kontrollera om IP-adressen redan fanns i filen innan den lades till.</p>
            <p>Att arbeta med PHP:s felhantering och debugging var också en del av processen. Att hitta syntaxfel och förstå varför vissa funktioner inte fungerade som förväntat var både frustrerande och lärorikt.</p>
        </section>

        <section>
            <h3>Det som var roligt</h3>
            <p>Det mest givande momentet var när vi fick nedräkningsfunktionen att fungera korrekt. Att se sidan uppdateras dynamiskt och räkna ner i realtid kändes som en tydlig framgång.</p>
            <p>Vi tyckte också att det var roligt att arbeta med inloggningssystemet och att få användarsessioner att lagras och visas korrekt. Det gav en tydlig känsla av hur autentisering fungerar på en riktig webbplats.</p>
            <p>Slutligen var det kul att kunna se resultatet av all kod i en fungerande webbplats. Det gav en känsla av att det vi lärt oss faktiskt går att applicera i verkligheten.</p>
        </section>

        <section>
            <h3>Förbättringsförslag för kursen</h3>
            <p>Kursen har varit bra, men vi tycker att det hade hjälpt om det fanns fler exempel på hur man felsöker PHP-kod. Ibland kändes det som att vi letade efter små fel utan att ha en tydlig metod för hur vi skulle hitta dem.</p>
            <p>Slutligen hade det varit bra om kursen hade inkluderat fler praktiska projekt där vi fick bygga en mer komplett webbplats från start till slut, med en databas och användarhantering.</p>
        </section>

        <?php include "../includes/footer.php"; ?>
    </div>
</body>
</html>
