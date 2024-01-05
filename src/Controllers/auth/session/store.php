<?php

use Src\Core\Session;
use Src\Models\Database;

if ($_SERVER['HTTP_SEC_FETCH_SITE'] === "none") {
    echo "<h1>404 Not Found <a href='/'>Go Back</a></h1>";
    exit;
}

class Authentication
{
    private $username;
    private $password;
    private $totalCount;
    private $ip;
    private $time;
    private $db;
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->ip = ipAddress();
        $this->time = time() - 15;
        $this->db = new Database;
    }
    public function totalAttempt()
    {
        $checkLoginRow = $this->db->query("SELECT COUNT(*) AS total_count FROM attempts WHERE login_time > :time AND ip_address= :ip", [
            'ip' => $this->ip,
            'time' => $this->time
        ])->find();
        $this->totalCount =  $checkLoginRow['total_count'];
        return $this->totalCount;
    }
    public function attempt()
    {
        if ($this->totalAttempt() >= 3) {
            redirect('/logins');
        }
        $_SESSION['username'] = $this->username;
        $this->isLogin();
        if ($this->failedToLogin()) {
            redirect('/logins');
        }
    }
    public function isLogin()
    {
        $user = $this->db->query("SELECT * FROM users WHERE username = :username", [
            'username' => $this->username,
        ])->find();

        if ($user && password_verify($this->password, $user['password'])) {
            $_SESSION['user'] = [
                "id" => $user['id'],
                "username" => $user['username'],
                "login" => true
            ];

            $this->db->query("DELETE FROM attempts WHERE ip_address= :ip", [
                'ip' => $this->ip,
            ])->find();
            unset($_SESSION['timeIncrement']);
            unset($_SESSION['based']);
            unset($_SESSION['username']);
            $_SESSION['username'] = $this->username;
            redirect('/home');
        }
    }
    public function failedToLogin()
    {
        $loginTime = time();
        $this->db->query("INSERT INTO attempts VALUES (null, :ip_address, :login_time)", [
            'ip_address' => $this->ip,
            'login_time' => $loginTime
        ])->get();
        $this->totalCount++;
        $_SESSION['attempts'] = 3 - $this->totalCount;
        if ($_SESSION['attempts'] <= 0) {
            $_SESSION['based'] += 1;
            return true;
        } else {
            Session::flash('error', "These credentials do not match our records.");
        }
        return redirect('/login');
    }
}

$authentication = new Authentication(testInput($_POST['username']), testInput($_POST['password']));
$authentication->attempt();

// $db = new Database;
// $username = testInput($_POST['username']);
// $password = testInput($_POST['password']);
// $_SESSION['username'] = $username;
// $ip = ipAddress();
// $time = time() - 15;
// $checkLoginRow = $db->query("SELECT COUNT(*) AS total_count FROM attempts WHERE login_time > :time AND
//  ip_address= :ip", [
//     'ip' => $ip,
//     'time' => $time
// ])->find();
// $totalCount = $checkLoginRow['total_count'];
// if ($totalCount >= 3) {
//     redirect('/logins');
// } else {
//     $user = $db->query("SELECT * FROM users WHERE username = :username", [
//         'username' => $username,
//     ])->find();

//     if ($user && password_verify($password, $user['password'])) {
//         $login = true;
//         $_SESSION['user'] = [
//             "id" => $user['id'],
//             "username" => $user['username'],
//             "login" => true
//         ];

//         $db->query("DELETE FROM attempts WHERE ip_address= :ip", [
//             'ip' => $ip,
//         ])->find();
//         unset($_SESSION['timeIncrement']);
//         unset($_SESSION['based']);
//         // Session::unflash('username');
//         unset($_SESSION['username']);
//         $_SESSION['username'] = $username;
//         redirect('/home');
//     } else {
//         $login_time = time();
//         $db->query("INSERT INTO attempts VALUES (null, :ip_address, :login_time)", [
//             'ip_address' => $ip,
//             'login_time' => $login_time
//         ])->get();
//         $totalCount++;
//         $_SESSION['attempts'] = 3 - $totalCount;
//         if ($_SESSION['attempts'] <= 0) {
//             $_SESSION['based'] += 1;
//             redirect('/logins');
//         } else {
//             Session::flash('error', "These credentials do not match our records.");
//         }
//         redirect('/login');
//     }
// }
