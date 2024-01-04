<?php

use Src\Models\Database;
use Src\Core\Session;

Session::check($_SESSION);
$users = (new Database)->query("SELECT * FROM users WHERE id = :id", [
    "id" => $_SESSION['user']['id']
])->get();
$header = "Home";
require "./views/home.php";
