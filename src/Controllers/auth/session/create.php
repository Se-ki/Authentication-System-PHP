<?php

use Src\Core\Session;

Session::check($_SESSION);
$header = "Sign in";
$message = Session::get('error');
require "./views/auth/session/create.php";
