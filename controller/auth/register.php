<?php
if (isset($_SESSION['user']['login'])) {
    redirect('/home');
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $db->register(
        test_input($_POST['firstname']),
        test_input($_POST['lastname']),
        test_input($_POST['middlename'] ?? null),
        test_input($_POST['extensionName'] ?? null),
        test_input($_POST['sex']),
        test_input($_POST['age']),
        test_input($_POST['contactNumber']),
        test_input($_POST['country']),
        test_input($_POST['province']),
        test_input($_POST['city']),
        test_input($_POST['barangay']),
        test_input($_POST['username']),
        test_input($_POST['email']),
        test_input($_POST['password']),
        test_input($_POST['confirmPassword'])
    );
}

$header = 'Sign up';
require "./views/auth/register.php";