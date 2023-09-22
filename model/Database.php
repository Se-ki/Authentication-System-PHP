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
        if (!$firstname || !$lastname || !$sex || !$country || !$province || !$city || !$barangay || !$username || !$email || !$contactNumber || !$password) {
            $_SESSION['error'] = ["credentials" => "All fields must be filled."];
            redirect('/register');
        }

        //Validate if input has contains numbers
        if (!Validation::isNameStringOnly($firstname)) {
            $_SESSION['error'] = ["credentials" => "Firstname should not contain numeric number and special characters."];
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($lastname)) {
            $_SESSION['error'] = ["credentials" => "Lastname should not contain numeric number and special characters."];
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($middlename) && isset($middlename)) {
            $_SESSION['error'] = ["credentials" => "Middlename should not contain numeric number and special characters."];
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($extensionName)) {
            $_SESSION['error'] = ["credentials" => "Suffix Name should not contain numeric number and special characters."];
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($country)) {
            $_SESSION['error'] = ["credentials" => "Country should not contain numeric number and special characters."];
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($province)) {
            $_SESSION['error'] = ["credentials" => "Province should not contain numeric number and special characters."];
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($city)) {
            $_SESSION['error'] = ["credentials" => "City should not contain numeric number and special characters."];
            redirect('/register');
        }


        //Input should capitalize the first letter
        if (!Validation::isInputCapitalized($firstname)) {
            $_SESSION['error'] = ["credentials" => "The first letter of the firstname should be capitalized."];
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($lastname)) {
            $_SESSION['error'] = ["credentials" => "The first letter of the lastname should be capitalized."];
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($middlename)) {
            $_SESSION['error'] = ["credentials" => "The first letter of the middlename should be capitalized."];
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($extensionName)) {
            $_SESSION['error'] = ["credentials" => "The first letter of the suffix name should be capitalized."];
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($country)) {
            $_SESSION['error'] = ["credentials" => "The first letter of the country name should be capitalized."];
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($province)) {
            $_SESSION['error'] = ["credentials" => "The first letter of the province name should be capitalized."];
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($city)) {
            $_SESSION['error'] = ["credentials" => "The first letter of the city name should be capitalized."];
            redirect('/register');
        }


        //Input should not contains repeated letters
        if (Validation::hasRepeatedLetters($firstname)) {
            $_SESSION['error'] = ["credentials" => "Firstname contains repeated letters."];
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($lastname)) {
            $_SESSION['error'] = ["credentials" => "Lastname contains repeated letters."];
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($middlename)) {
            $_SESSION['error'] = ["credentials" => "Middlename contains repeated letters."];
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($extensionName)) {
            $_SESSION['error'] = ["credentials" => "Suffix name contains repeated letters."];
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($country)) {
            $_SESSION['error'] = ["credentials" => "Country name contains repeated letters."];
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($province)) {
            $_SESSION['error'] = ["credentials" => "Province name contains repeated letters."];
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($city)) {
            $_SESSION['error'] = ["credentials" => "City name contains repeated letters."];
            redirect('/register');
        }


        //restrict if contains double spaces
        if (!Validation::validateDoubleSpace($firstname)) {
            $_SESSION['error'] = ["credentials" => "Firstname should not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($lastname)) {
            $_SESSION['error'] = ["credentials" => "Lastname should not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($middlename)) {
            $_SESSION['error'] = ["credentials" => "Middlename should not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($extensionName)) {
            $_SESSION['error'] = ["credentials" => "Suffix name should not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($country)) {
            $_SESSION['error'] = ["credentials" => "Country should not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($province)) {
            $_SESSION['error'] = ["credentials" => "Province should not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($city)) {
            $_SESSION['error'] = ["credentials" => "City should not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($barangay)) {
            $_SESSION['error'] = ["credentials" => "Barangay should not contain double space."];
            redirect('/register');
        }


        //restrict if first part of input contains double spaces
        if (!Validation::validateFirstPartHasDoubleSpace($firstname)) {
            $_SESSION['error'] = ["credentials" => "The first part of the firstname must not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateFirstPartHasDoubleSpace($lastname)) {
            $_SESSION['error'] = ["credentials" => "The first part of the input lastname not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateFirstPartHasDoubleSpace($middlename)) {
            $_SESSION['error'] = ["credentials" => "The first part of the middlename must not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateFirstPartHasDoubleSpace($extensionName)) {
            $_SESSION['error'] = ["credentials" => "The first part of the suffix name must not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateFirstPartHasDoubleSpace($country)) {
            $_SESSION['error'] = ["credentials" => "The first part of the country must not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateFirstPartHasDoubleSpace($province)) {
            $_SESSION['error'] = ["credentials" => "The first part of the province must not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateFirstPartHasDoubleSpace($city)) {
            $_SESSION['error'] = ["credentials" => "The first part of the city must not contain double space."];
            redirect('/register');
        }
        if (!Validation::validateFirstPartHasDoubleSpace($barangay)) {
            $_SESSION['error'] = ["credentials" => "The first part of the barangay must not contain double space."];
            redirect('/register');
        }


        //validate inputted numbers that contains string characters
        if (!Validation::validateNumber($age)) {
            $_SESSION['error'] = ["credentials" => "Age must not contain letters or special characters."];
            redirect('/register');
        }
        if (!Validation::validateNumber($contactNumber)) {
            $_SESSION['error'] = ["credentials" => "Contact number must not contain letters or special characters."];
            redirect('/register');
        }


        //Validate if contact number is same format as the format of the philippines
        if (!Validation::validatePhilippineContactNumber($contactNumber)) {
            $_SESSION['error'] = ["credentials" => "The contact number is invalid."];
            redirect('/register');
        }

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

        if (Validation::passwordValidation($password)) {
            $_SESSION['error'] = ["password" => "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character."];
            redirect('/register');
        }

        if (!Validation::confirmedPassword($password, $confirmPassword)) {
            $_SESSION['error'] = ["password" => "Password is not match with confirm password"];
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