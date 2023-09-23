<?php

class Database
{
    public $connection;
    public $statement;
    public function __construct($username = "root", $password = "")
    {
        $database = [
            "host" => "localhost",
            "user" => "root",
            "port" => 3306,
            "dbname" => "securitydb",
            "charset" => "utf8mb4",
        ];
        $dsn = "mysql: " . http_build_query($database, '', ";");
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function login($username, $password)
    {
        $user = $this->query("SELECT * FROM users WHERE username = :username", [
            'username' => $username,
        ])->find();
        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['attempts'] -= 1;
            $_SESSION['error'] = ["credentials" => "Incorrect username and password. You only have {$_SESSION['attempts']} attempts"];
            $_SESSION['login_attempt'] += 1;
            redirect('/login');
        } else {
            $_SESSION['user'] = [
                "id" => $user['id'],
                "username" => $user['username'],
                "login" => true
            ];
            redirect("/home");
        }
    }
    public function register($firstname, $lastname, $middlename, $extensionName, $sex, $age, $contactNumber, $country, $province, $city, $barangay, $email, $username, $password, $confirmPassword)
    {
        //check if username is exist 
        if (Validation::isUsernameExist($username, $this)) {
            $_SESSION['error'] = ["credentials" => "Username named {$username} is already exist."];
            redirect('/register');
        }

        //check if email exist
        if (Validation::isEmailExist($email, $this)) {
            $_SESSION['error'] = ["credentials" => "Email named {$email} is already exist."];
            redirect('/register');
        }

        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

        $this->query("INSERT INTO `users` VALUES (null, :firstname, :lastname,:middlename, :extensionName, :sex, :age, :contactNumber, :country, :province, :city, :barangay, null, :username, :email, :password, null, NOW())", [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "middlename" => $middlename,
            "extensionName" => $extensionName,
            "sex" => $sex,
            "age" => $age,
            "contactNumber" => $contactNumber,
            "country" => $country,
            "province" => $province,
            "city" => $city,
            "barangay" => $barangay,
            "username" => $username,
            "email" => $email,
            "password" => $hashed_pwd,
        ])->get();

        $_SESSION['error'] = [
            "success" => "Successfully Registered, you can now <a href='/login'>LOGIN.</a>"
        ];
        unset($_SESSION['email']);
        redirect('/register');
    }
    public function logout()
    {
        session_destroy();
        redirect('/login');
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }
}
$db = new Database();