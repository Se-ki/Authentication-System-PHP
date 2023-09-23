<?php
if (isset($_SESSION['user']['login'])) {
    redirect('/home');
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    remainData(
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['middlename'],
        $_POST['suffix'],
        $_POST['sex'],
        $_POST['age'],
        $_POST['mobilenum'],
        $_POST['country'],
        $_POST['province'],
        $_POST['city'],
        $_POST['barangay'],
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['confirmpassword']
    );

    $db->register(
        test_input($_POST['firstname']),
        test_input($_POST['lastname']),
        test_input($_POST['middlename'] ?? null),
        test_input($_POST['suffix'] ?? null),
        test_input($_POST['sex']),
        test_input($_POST['age']),
        test_input($_POST['mobilenum']),
        test_input($_POST['country']),
        test_input($_POST['province']),
        test_input($_POST['city']),
        test_input($_POST['barangay']),
        test_input($_POST['username']),
        test_input($_POST['email']),
        test_input($_POST['password']),
        test_input($_POST['confirmpassword'])
    );
}

$header = 'Sign up';
$error = Session::get('error');
$user = Session::get('users');
require "./views/auth/register.php";