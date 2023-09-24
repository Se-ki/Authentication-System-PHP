<?php
require "../Validation.php";
require "../model/Database.php";
require "../function.php";

if ($_SERVER['HTTP_SEC_FETCH_MODE'] === "navigate") {
    redirect('/register');
}

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $exist = Validation::checkUserExist("username", $username);
    if ($exist) {
        echo "This {$username} username is already taken";
    }
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $exist = Validation::checkUserExist("email", $email);
    if ($exist) {
        echo "This {$email} email is already taken";
    }
}