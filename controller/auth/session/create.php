<?php
if (isset($_SESSION['user']['login'])) {
    header('location: /home');
}
$header = "Sign in";
$message = Session::get('error');
require "./views/auth/session/create.php";