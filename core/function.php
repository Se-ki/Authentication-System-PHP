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

function remainData($firstname, $lastname, $middlename, $suffix, $sex, $birthdate, $age, $mobilenum, $country, $province, $city, $barangay, $zipcode, $address, $username, $email, $password, $confirmpassword)
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
        'barangay' => $barangay,
        'zipcode' => $zipcode,
        'address' => $address,
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'confirmpassword' => $confirmpassword
    ]);
}