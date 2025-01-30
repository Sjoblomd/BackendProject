<?php

function getServerInfo() {
    return [
        'server_name' => $_SERVER['SERVER_NAME'],
        'timezone' => date_default_timezone_get()
    ];
}

function getFirstVisitTime() {
    $visit_time = date("d-m-Y H:i:s");

    if (!isset($_COOKIE['first_visit'])) {
        setcookie("first_visit", $visit_time, time() + (86400 * 30), "/");
    }
    return $_COOKIE['first_visit'] ?? $visit_time;
}
