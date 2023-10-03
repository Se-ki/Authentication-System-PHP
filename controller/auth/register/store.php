<?php
if ($_SERVER['HTTP_SEC_FETCH_SITE'] === "none") {
    echo "<h1>404 Not Found <a href='/'>Go Back</a></h1>";
    exit;
}

$firstname = test_input($_POST['firstname']);
$lastname = test_input($_POST['lastname']);
$middlename = test_input($_POST['middlename']);
$suffix = test_input($_POST['suffix']);
$sex = test_input($_POST['sex']);
$birthdate = test_input($_POST['birthdate']);
$age = test_input($_POST['age']);
$mobilenumber = test_input($_POST['mobilenum']);
$country = test_input($_POST['country']);
$province = test_input($_POST['province']);
$city = test_input($_POST['city']);
$barangay = test_input($_POST['barangay']);
$zipcode = test_input($_POST['zipcode']);
$address = test_input($_POST['address']);
$username = test_input($_POST['username']);
$email = test_input($_POST['email']);
$password = test_input($_POST['password']);
$confirmpassword = test_input($_POST['confirmpassword']);

// remainData(
//     $firstname,
//     $lastname,
//     $middlename,
//     $suffix,
//     $sex,
//     $birthdate,
//     $age,
//     $mobilenumber,
//     $country,
//     $province,
//     $city,
//     $barangay,
//     $zipcode,
//     $address,
//     $username,
//     $email,
//     $password,
//     $confirmpassword
// );

// check if username is exist 
//check if email is exist
if (Validation::checkUserExist('email', $email)) {
    // Session::flash('response', ['error-username' => "This {$username} username is already taken"]);
    // redirect('/register');
    $type = "email";
    $message = "This {$email} email is already taken";
    $isRegister = false;
} else if (Validation::checkUserExist('username', $username)) {
    // Session::flash('response', ['error-email' => "This {$email} email is already taken"]);
    // redirect('/register');
    $type = "username";
    $message = "This {$username} username is already taken";
    $isRegister = false;
} else {
    $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
    $db->query("INSERT INTO users VALUES (null, :firstname, :lastname,:middlename, :suffix, :sex, :birthdate, :age, :mobilenumber, :country, :province, :city, :barangay, :zipcode, :address, :username, :email, :password, null, null)", [
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
        "barangay" => $barangay,
        "zipcode" => $zipcode,
        "address" => $address,
        "username" => $username,
        "email" => $email,
        "password" => $hashed_pwd,
    ])->get();
    $type = "success";
    $message = "Successfully Registered. You can now <a href='/login'>LOGIN</a>";
    $isRegister = true;
}
Session::unflash();
echo json_encode([
    "type" => $type,
    "message" => $message,
    "ok" => $isRegister
]);

// redirect('/register');
