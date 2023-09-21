<?php
if (isset($_SESSION['user']['login'])) {
    redirect('/home');
}

if (!isset($_SESSION['email'])) {
    redirect('/email');
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $db->register(
        test_input($_POST['firstname']),
        test_input($_POST['lastname']),
        test_input($_POST['middlename'] ?? null),
        test_input($_POST['extensionName'] ?? null),
        test_input($_POST['sex'] ?? null),
        test_input($_POST['age']),
        test_input($_POST['contactNumber']),
        test_input($_POST['address']),
        test_input($_POST['username']),
        test_input($_POST['password']),
        test_input($_POST['confirmPassword'])
    );
}

$header = 'Sign up';
$error = $_SESSION['error'] ?? null;
require "./views/auth/register.php";