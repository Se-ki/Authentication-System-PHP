<?php

use Src\Core\Validation;
use Src\Core\Session;
use Src\Models\Database;

$firstname = testInput($_POST['firstname']);
$lastname = testInput($_POST['lastname']);
$middlename = testInput($_POST['middlename']);
$suffix = testInput($_POST['suffix']);
$sex = testInput($_POST['sex']);
$birthdate = testInput($_POST['birthdate']);
$age = testInput($_POST['age']);
$mobilenumber = testInput($_POST['mobilenum']);
$country = testInput($_POST['country']);
$province = testInput($_POST['province']);
$city = testInput($_POST['city']);
$purok = testInput($_POST['purok']);
$barangay = testInput($_POST['barangay']);
$zipcode = testInput($_POST['zipcode']);
$username = testInput($_POST['username']);
$email = testInput($_POST['email']);
$password = testInput($_POST['password']);
$confirmpassword = testInput($_POST['confirmpassword']);

remainData(
    $firstname,
    $lastname,
    $middlename,
    $suffix,
    $sex,
    $birthdate,
    $age,
    $mobilenumber,
    $country,
    $province,
    $city,
    $purok,
    $barangay,
    $zipcode,
    $username,
    $email,
    $password,
    $confirmpassword
);

// check if username is exist 
//check if email is exist
if (Validation::checkUserExist('email', $email)) {
    $type = "email";
    $message = "This {$email} email is already taken";
    $isRegister = false;
} else if (Validation::checkUserExist('username', $username)) {
    $type = "username";
    $message = "This {$username} username is already taken";
    $isRegister = false;
} else {
    $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
    (new Database)->query("INSERT INTO users 
    VALUES (null, 
    :firstname, 
    :lastname,
    :middlename, 
    :suffix, 
    :sex, 
    :birthdate, 
    :age, 
    :mobilenumber, 
    :country, 
    :province, 
    :city, 
    :purok,
    :barangay,
    :zipcode, 
    :username, 
    :email, 
    :password, 
    null, 
    null)", [
        "firstname" => $firstname,
        "lastname" => $lastname,
        "middlename" => $middlename,
        "suffix" => $suffix,
        "sex" => $sex,
        "birthdate" => $birthdate,
        "age" => $age,
        "mobilenumber" => $mobilenumber,
        "country" => $country,
        "province" => $province,
        "city" => $city,
        "purok" => $purok,
        "barangay" => $barangay,
        "zipcode" => $zipcode,
        "username" => $username,
        "email" => $email,
        "password" => $hashed_pwd,
    ])->get();
    $type = "success";
    $message = "Successfully Registered. You can now login";
    $isRegister = true;
}
Session::unflash();
echo json_encode([
    "type" => $type,
    "message" => $message,
    "ok" => $isRegister
]);
