<?php
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function attempts()
{
    if (!isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = 3;
    }
}