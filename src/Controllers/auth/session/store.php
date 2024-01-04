<?php

use Src\Core\Session;
use Src\Models\Database;

if ($_SERVER['HTTP_SEC_FETCH_SITE'] === "none") {
    echo "<h1>404 Not Found <a href='/'>Go Back</a></h1>";
    exit;
}

$db = new Database;
$username = testInput($_POST['username']);
$password = testInput($_POST['password']);
$_SESSION['username'] = $username;
$ip = IPAddress();
$time = time() - 15;
$check_login_row = $db->query("SELECT COUNT(*) AS total_count FROM attempts WHERE login_time > :time AND
 ip_address= :ip", [
    'ip' => $ip,
    'time' => $time
])->find();
$total_count = $check_login_row['total_count'];
if ($total_count >= 3) {
    redirect('/logins');
} else {
    $user = $db->query("SELECT * FROM users WHERE username = :username", [
        'username' => $username,
    ])->find();

    if ($user && password_verify($password, $user['password'])) {
        $login = true;
        $_SESSION['user'] = [
            "id" => $user['id'],
            "username" => $user['username'],
            "login" => true
        ];

        $db->query("DELETE FROM attempts WHERE ip_address= :ip", [
            'ip' => $ip,
        ])->find();
        unset($_SESSION['timeIncrement']);
        unset($_SESSION['based']);
        // Session::unflash('username');
        unset($_SESSION['username']);
        $_SESSION['username'] = $username;
        redirect('/home');
    } else {
        $login_time = time();
        $db->query("INSERT INTO attempts VALUES (null, :ip_address, :login_time)", [
            'ip_address' => $ip,
            'login_time' => $login_time
        ])->get();
        $total_count++;
        $_SESSION['attempts'] = 3 - $total_count;
        if ($_SESSION['attempts'] <= 0) {
            $_SESSION['based'] += 1;
            redirect('/logins');
        } else {
            Session::flash('error', "These credentials do not match our records.");
        }
        redirect('/login');
    }
}
