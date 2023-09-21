<?php
session_start();
require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

const BASE_PATH = __DIR__ . '/../';

$header = "Index";
require "router.php";

unset($_SESSION['error']);