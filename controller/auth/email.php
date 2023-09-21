<?php
if (isset($_SESSION['user']['login'])) {
    redirect('/home');
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    Validation::isUserExist($_POST['email'], $db);
    Validation::emailVerify($_POST['email']);
    $_SESSION['verify'] = [
        "code" => password_hash(Validation::verificationCode(), PASSWORD_BCRYPT),
        "email" => $_POST['email']
    ];
    redirect("/email/verification");
}
$error = $_SESSION['error'] ?? null;
unset($_SESSION['verify']);
unset($_SESSION['email']);
$header = "Verify Email";
require "./views/auth/email.php";