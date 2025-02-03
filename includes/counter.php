<?php
function countVisitors() {
    $visitorFile = "includes/visitors.txt";
    $visitorIP = $_SERVER['REMOTE_ADDR'];

    $visitors = file_exists($visitorFile) ? file($visitorFile, FILE_IGNORE_NEW_LINES) : [];

    if (!in_array($visitorIP, $visitors)) {
        file_put_contents($visitorFile, $visitorIP . "\n", FILE_APPEND);
    }

    return count($visitors);
}
?>
