<?php
if (isset($_SESSION['user']['login'])) {
    header('location: /home');
}

if (!isset($_SESSION['timeIncrement'])) {
    $timeIncrement = .5;
} else {
    $timeIncrement = $_SESSION['timeIncrement'];
}

$_SESSION['timeIncrement'] = $timeIncrement + .5;


$header = "Invalid";
$message = Session::get('error');
require "./views/auth/session/invalid.php";