<?php
function getServerInfo() {
    return [
        'server_name' => $_SERVER['SERVER_NAME'],
        'timezone' => date_default_timezone_get(),
    ];
}

function getFirstVisitTime() {
    if (!isset($_COOKIE['first_visit'])) {
        setcookie('first_visit', time(), time() + (86400 * 30), "/");
        return "This is your first visit!";
    } else {
        return date("Y-m-d H:i:s", $_COOKIE['first_visit']);
    }
}
?>
