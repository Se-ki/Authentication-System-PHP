<?php
require "../core/function.php";
require "../model/Database.php";
require "../core/Validation.php";

if ($_SERVER['HTTP_SEC_FETCH_MODE'] === "navigate") {
    redirect('/register');
}

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $exist = Validation::checkUserExist("username", $username);
    if ($exist) {
        echo json_encode(["ok" => true, "message" => "This '{$username}' username is already taken"]);
    } else {
        echo json_encode(["ok" => false]);
    }
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $exist = Validation::checkUserExist("email", $email);
    if ($exist) {
        $response = ["ok" => true, "message" => "This '{$email}' username is already taken"];
        echo json_encode($response);
    } else {
        echo json_encode(["ok" => false]);
    }
}