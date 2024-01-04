<?php
require "./core/function.php";
require "./model/Database.php";
require "./core/Validation.php";
require "./core/Session.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    "/" => "./controller/index.php",
    "/login" => "./controller/auth/session/create.php",
    "/logins" => "./controller/auth/session/invalid.php",
    "/register" => "./controller/auth/register/create.php",
    "/register/store" => "./controller/auth/register/store.php",
    "/login/store" => "./controller/auth/session/store.php",
    "/session/destroy" => "./controller/auth/session/destroy.php",
    "/home" => "./controller/home.php",
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    echo "<h1>404 Not Found! <a href='/'>Go Back!</a></h1>";
    exit;
}