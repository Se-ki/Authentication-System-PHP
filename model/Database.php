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
    public function register($firstname, $lastname, $middlename, $extensionName, $sex, $age, $contactNumber, $address, $username, $password, $confirmPassword)
    {
        if (!$firstname || !$lastname || !$sex || !$address || !$contactNumber || !$password) {
            $_SESSION['error'] = ["credentials" => "All fields must be filled."];
            redirect('/register');
        }

        if (!Validation::isNameStringOnly($firstname) || !Validation::isNameStringOnly($lastname)) {
            $_SESSION['error'] = ["credentials" => "Firstname and lastname should not contain numeric number."];
            redirect('/register');
        }

        if (!Validation::isInputCapitalized($firstname) || !Validation::isInputCapitalized($lastname)) {
            $_SESSION['error'] = ["credentials" => "The first letter of the firstname and lastname should be capitalized."];
            redirect('/register');
        }

        if (Validation::hasRepeatedLetters($firstname) || Validation::hasRepeatedLetters($lastname)) {
            $_SESSION['error'] = ["credentials" => "The string contains repeated letters."];
            redirect('/register');
        }

        if (Validation::isNameDoubleSpace($firstname) || Validation::isNameDoubleSpace($lastname)) {
            $_SESSION['error'] = ["credentials" => "Name should not contain double space."];
            redirect('/register');
        }

        if (Validation::isUserExist($username, $this)) {
            $_SESSION['error'] = ["credentials" => "Username named {$username} is already exist."];
            redirect('/register');
        }

        // if (Validation::isUserExist($email, $this)) {
        //     $_SESSION['error'] = ["credentials" => "Email named {$email} is already exist."];
        //     redirect('/register');
        // }

        if (!Validation::confirmedPassword($password, $confirmPassword)) {
            $_SESSION['error'] = ["password" => "Password is not match with confirm password"];
            redirect('/register');
        }

        if (Validation::passwordValidation($password)) {
            $_SESSION['error'] = ["password" => "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character."];
            redirect('/register');
        }

        // Validation::emailVerify($email);

        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

        $this->query("INSERT INTO `users` VALUES (null, :firstname, :lastname,:middlename, :extensionName, :sex, :age, :contactNumber, :address, :username, :email, :password, null, NOW())", [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "middlename" => $middlename,
            "extensionName" => $extensionName,
            "sex" => $sex,
            "age" => $age,
            "contactNumber" => $contactNumber,
            "address" => $address,
            "username" => $username,
            "email" => $_SESSION['email'],
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