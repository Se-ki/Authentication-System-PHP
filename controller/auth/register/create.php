<?php
if (isset($_SESSION['user']['login'])) {
    redirect('/home');
}
$header = 'Sign up';
$message = Session::get('response');
$user = Session::get('users');
require "./views/auth/register/create.php";