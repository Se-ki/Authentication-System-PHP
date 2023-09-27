<?php
require "./function.php";
require "./model/Database.php";
require "./Validation.php";     
require "./Session.php";

// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// $routes = [
//     "/" => "./controller/index.php",
//     "/about" => "./controller/about.php",
//     "/contact" => "./controller/contact.php",
//     "/notes" => "./controller/notes/index.php",
//     "/notes/create" => "./controller/notes/create.php",
//     "/note" => "./controller/notes/show.php",
// ];

// if (array_key_exists($uri, $routes)) {
//     require base_path($routes[$uri]);
// } else {
//     abort(Response::NOT_FOUND, "Sorry. Page not found.");
// }

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ($uri === "/") {
    require "./views/index.php";
} else if ($uri === "/login") {
    require "./controller/auth/login.php";
} else if ($uri === "/home") {
    require "./controller/home.php";
} else if ($uri === "/register") {
    require "./controller/auth/register.php";
} else if ($uri === "/logout") {
    require "./controller/auth/logout.php";
}