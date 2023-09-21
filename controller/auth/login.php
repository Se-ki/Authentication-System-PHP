<?php
if (isset($_SESSION['user']['login'])) {
    header('location: /home');
}

attempts();
Validation::locked(); // if activated the login button will disabled
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $db->login($_POST['username'], $_POST['password']);
}

unset($_SESSION['verify']);
unset($_SESSION['email']);
$error = $_SESSION['error'] ?? null;
$header = "Sign in";
require "./views/auth/login.php";