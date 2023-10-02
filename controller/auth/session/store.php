<?php

if ($_SERVER['HTTP_SEC_FETCH_SITE'] === "none") {
    echo "<h1>404 Not Found <a href='/'>Go Back</a></h1>";
    exit;
}
Validation::locked(); // if many attempts locked the login button
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$user = $db->query("SELECT * FROM users WHERE username = :username", [
    'username' => $username,
])->find();
if (!$user || !password_verify($password, $user['password'])) {
    $_SESSION['attempts'] -= 1;
    // Session::flash('error', "Incorrect username or password. </br> You only have {$_SESSION['attempts']} attempts");
    $_SESSION['login_attempt'] += 1;
    // redirect('/login');
    $message = "Incorrect username or password. </br> You only have {$_SESSION['attempts']} attempts";
    $login = false;
} else {
    $login = true;
    $message = "Login Successfully";
    $_SESSION['user'] = [
        "id" => $user['id'],
        "username" => $user['username'],
        "login" => true
    ];
}

echo json_encode([
    "login" => $login,
    "message" => $message
]);
// redirect("/home");