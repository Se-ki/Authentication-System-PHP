<?php
if (!$_SESSION['user']['login']) {
    header('location: /login');
}
$users = $db->query("SELECT * FROM users WHERE id = :id", [
    "id" => $_SESSION['user']['id']
])->get();
$header = "Home";
require "./views/home.php";
?>