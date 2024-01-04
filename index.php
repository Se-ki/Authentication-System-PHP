<?php
session_start();
require("./src/Core/function.php");
const BASE_PATH = __DIR__ . '/../';
require('vendor/autoload.php');

use Src\Core\Session;
use Symfony\Component\Dotenv\Dotenv;

spl_autoload_register(function ($class) {
    require("./src/Core/{$class}.php");
});


(new Dotenv)->load(__DIR__ . '/.env');

$header = "Index";
require("router.php");
Session::unflash();
