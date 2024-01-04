<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
    "/" => "./src/Controllers/index.php",
    "/login" => "./src/Controllers/auth/session/create.php",
    "/logins" => "./src/Controllers/auth/session/invalid.php",
    "/register" => "./src/Controllers/auth/register/create.php",
    "/register/store" => "./src/Controllers/auth/register/store.php",
    "/login/store" => "./src/Controllers/auth/session/store.php",
    "/session/destroy" => "./src/Controllers/auth/session/destroy.php",
    "/home" => "./src/Controllers/home.php",
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    echo "<h1>404 Not Found! <a href='/'>Go Back!</a></h1>";
    exit;
}
