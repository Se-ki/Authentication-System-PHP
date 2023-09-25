<?php
if (isset($_SESSION['user']['login'])) {
    header('location: /home');
}

Validation::locked(); // if activated the login button will disabled
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $db->login(test_input($_POST['username']), test_input($_POST['password']));
}
$header = "Sign in";
$message = Session::get('error');
require "./views/auth/login.php";