<?php
if ($_SERVER['HTTP_SEC_FETCH_SITE'] === "none") {
    echo "<h1>404 Not Found <a href='/'>Go Back</a></h1>";
    exit;
}

$ip = IPAddress();
$time = time() - 30;
$check_login_row = $db->query("SELECT COUNT(*) AS total_count FROM attempts WHERE login_time > :time AND
 ip_address= :ip", [
    'ip' => $ip,
    'time' => $time
])->find();
$total_count = $check_login_row['total_count'];
if ($total_count >= 3) {
    redirect('/logins');
} else {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

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
            redirect('/logins');
        } else {
            Session::flash('error', "Incorrect username or password. </br> You only have {$_SESSION['attempts']} attempts");
        }
        redirect('/login');
    }
}