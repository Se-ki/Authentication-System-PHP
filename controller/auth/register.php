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
        $_POST['zipcode'],
        $_POST['address'],
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['confirmpassword']
    );
    $db->register(
        test_input($_POST['firstname']),
        test_input($_POST['lastname']),
        test_input($_POST['middlename'] ?? null),
        test_input($_POST['extensionName'] ?? null),
        test_input($_POST['sex']),
        test_input($_POST['birthdate']),
        test_input($_POST['age']),
        test_input($_POST['mobilenum']),
        test_input($_POST['country']),
        test_input($_POST['province']),
        test_input($_POST['city']),
        test_input($_POST['barangay']),
        test_input($_POST['zipcode']),
        test_input($_POST['address']),
        test_input($_POST['username']),
        test_input($_POST['email']),
        test_input($_POST['password']),
    );
}

$header = 'Sign up';
$message = Session::get('response');
$user = Session::get('users');
require "./views/auth/register.php";