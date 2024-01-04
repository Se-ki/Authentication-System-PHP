<?php

use Src\Core\Session;
use Src\Core\Ajax;

$fetch = new Ajax($_GET['username'] ?? null, $_GET['email'] ?? null);
$fetch->response();
Session::check($_SESSION);

$header = 'Sign up';
$message = Session::get('response');
$user = Session::get('users');
require "./views/auth/register/create.php";
