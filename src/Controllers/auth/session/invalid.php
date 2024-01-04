<?php

use Src\Core\Session;

if (isset($_SESSION['user']['login'])) {
    header('location: /home');
}

$increment = .5;
if (!isset($_SESSION['timeIncrement'])) {
    $timeIncrement = $increment;
} else if ($_SESSION['timeIncrement'] == 1 && $_SESSION['based'] == 2) {
    $increment = 1;
    $timeIncrement = $_SESSION['timeIncrement'];
} else if ($_SESSION['timeIncrement'] >= 2) {
    $increment = 0;
    $timeIncrement = $_SESSION['timeIncrement'];
} else {
    $timeIncrement = $increment;
}

$_SESSION['timeIncrement'] = $timeIncrement + $increment;


$header = "Invalid";
$message = Session::get('error');
require "./views/auth/session/invalid.php";
