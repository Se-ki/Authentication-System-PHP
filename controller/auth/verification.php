<?php
if (isset($_SESSION['user']['login'])) {
    redirect('/home');
}

if (!isset($_SESSION['verify']['code'])) {
    redirect('/email');
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    Validation::isEmailVerified($_POST['verification_code']);
}

$error = $_SESSION['error'] ?? null;
unset($_SESSION['email']);
$header = "Email Verification";
require "./views/auth/verification.php";