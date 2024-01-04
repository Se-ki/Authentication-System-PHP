<?php

use Src\Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function ipAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddr = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARD_FOR'])) {
        $ipAddr = $_SERVER['HTTP_X_FORWARD_FOR'];
    } else {
        $ipAddr = $_SERVER['REMOTE_ADDR'];
    }
    return $ipAddr;
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function remainData($firstname, $lastname, $middlename, $suffix, $sex, $birthdate, $age, $mobilenum, $country, $province, $city, $purok, $barangay,  $zipcode, $username, $email, $password, $confirmpassword)
{
    Session::flash('users', [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'middlename' => $middlename,
        'suffix' => $suffix,
        'sex' => $sex,
        'birthdate' => $birthdate,
        'age' => $age,
        'mobilenum' => $mobilenum,
        'country' => $country,
        'province' => $province,
        'city' => $city,
        'purok' => $purok,
        'barangay' => $barangay,
        'zipcode' => $zipcode,
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'confirmpassword' => $confirmpassword
    ]);
}

function path($path)
{
    $url = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'];
    return $url . $path;
}

function uri()
{
    return $_SERVER['REQUEST_URI'] ?? null;
}
