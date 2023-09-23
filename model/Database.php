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
    public function register($firstname, $lastname, $middlename, $suffix, $sex, $age, $mobilenum, $country, $province, $city, $barangay, $email, $username, $password, $confirmPassword)
    {
        // if (!$firstname || !$lastname || !$sex || !$country || !$province || !$city || !$barangay || !$username || !$email || !$contactNumber || !$password) {
        //     Session::flash('error', "All fields must be filled.");
        //     redirect('/register');
        // }

        //Validate if input has contains numbers
        if (!Validation::isNameStringOnly($firstname)) {
            Session::flash('error', [
                "firstname" => "firstname should not contain numeric number and special characters."
            ]);
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($lastname)) {
            Session::flash('error', [
                "lastname" => "Lastname should not contain numeric number and special characters."
            ]);
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($middlename)) {
            Session::flash('error', [
                "middlename" => "Middlename should not contain numeric number and special characters."
            ]);
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($suffix)) {
            Session::flash('error', [
                "suffix" => "Suffix should not contain numeric number and special characters."
            ]);
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($country)) {
            Session::flash('error', [
                "country" => "Country should not contain numeric number and special characters."
            ]);
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($province)) {
            Session::flash('error', [
                "province" => "Province should not contain numeric number and special characters."
            ]);
            redirect('/register');
        }
        if (!Validation::isNameStringOnly($city)) {
            Session::flash('error', [
                "city" => "Municipal or city should not contain numeric number and special characters."
            ]);
            redirect('/register');
        }


        //Input should capitalize the first letter
        if (!Validation::isInputCapitalized($firstname)) {
            Session::flash('error', [
                "firstname" => "The first letter of the firstname should be capitalized."
            ]);
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($lastname)) {
            Session::flash('error', [
                "lastname" => "The first letter of the lastname should be capitalized."
            ]);
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($middlename)) {
            Session::flash('error', [
                "middlename" => "The first letter of the middlename should be capitalized."
            ]);
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($suffix)) {
            Session::flash('error', [
                "suffix" => "The first letter of the suffix should be capitalized."
            ]);
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($country)) {
            Session::flash('error', [
                "country" => "The first letter of the country should be capitalized."
            ]);
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($province)) {
            Session::flash('error', [
                "province" => "The first letter of the province should be capitalized."
            ]);
            redirect('/register');
        }
        if (!Validation::isInputCapitalized($city)) {
            Session::flash('error', [
                "city" => "The first letter of the municipal / city should be capitalized."
            ]);
            redirect('/register');
        }


        //Input should not contains repeated letters
        if (Validation::hasRepeatedLetters($firstname)) {
            Session::flash('error', [
                "firstname" => "Firstname contains repeated letters."
            ]);
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($lastname)) {
            Session::flash('error', [
                "lastname" => "Lastname contains repeated letters."
            ]);
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($middlename)) {
            Session::flash('error', [
                "middlename" => "Middlename contains repeated letters."
            ]);
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($suffix)) {
            Session::flash('error', [
                "suffix" => "Suffix contains repeated letters."
            ]);
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($country)) {
            Session::flash('error', [
                "country" => "Country contains repeated letters."
            ]);
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($province)) {
            Session::flash('error', [
                "province" => "Province contains repeated letters."
            ]);
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($city)) {
            Session::flash('error', [
                "city" => "City contains repeated letters."
            ]);
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($username)) {
            Session::flash('error', [
                "username" => "Username contains repeated letters."
            ]);
            redirect('/register');
        }
        if (Validation::hasRepeatedLetters($email)) {
            Session::flash('error', [
                "email" => "Email contains repeated letters."
            ]);
            redirect('/register');
        }


        //restrict if contains double spaces
        if (!Validation::validateDoubleSpace($firstname) || !Validation::validateFirstPartHasDoubleSpace($firstname)) {
            Session::flash('error', [
                "firstname" => "Firstname should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($lastname) || !Validation::validateFirstPartHasDoubleSpace($lastname)) {
            Session::flash('error', [
                "lastname" => "Lastname should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($middlename) || !Validation::validateFirstPartHasDoubleSpace($middlename)) {
            Session::flash('error', [
                "middlename" => "Middlename should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($suffix) || !Validation::validateFirstPartHasDoubleSpace($suffix)) {
            Session::flash('error', [
                "suffix" => "Suffix should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($country) || !Validation::validateFirstPartHasDoubleSpace($country)) {
            Session::flash('error', [
                "country" => "Country should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($province) || !Validation::validateFirstPartHasDoubleSpace($province)) {
            Session::flash('error', [
                "province" => "Province should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($city) || !Validation::validateFirstPartHasDoubleSpace($city)) {
            Session::flash('error', [
                "city" => "Municipal / city should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($barangay) || !Validation::validateFirstPartHasDoubleSpace($barangay)) {
            Session::flash('error', [
                "barangay" => "Barangay should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($username) || !Validation::validateFirstPartHasDoubleSpace($username)) {
            Session::flash('error', [
                "username" => "Username should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($mobilenum) || !Validation::validateFirstPartHasDoubleSpace($mobilenum)) {
            Session::flash('error', [
                "mobilenum" => "Mobile Number should not contain double space."
            ]);
            redirect('/register');
        }
        if (!Validation::validateDoubleSpace($email) || !Validation::validateFirstPartHasDoubleSpace($email)) {
            Session::flash('error', [
                "email" => "Email should not contain double space."
            ]);
            redirect('/register');
        }


        //validate inputted numbers that contains string characters
        if (!Validation::validateNumber($age)) {
            Session::flash('error', [
                "age" => "Age must not contain letters or special characters."
            ]);
            redirect('/register');
        }
        if (!Validation::validateNumber($mobilenum)) {
            Session::flash('error', [
                "age" => "Contact number must not contain letters or special characters."
            ]);
            redirect('/register');
        }


        //Validate if contact number is same format as the format of the philippines
        if (!Validation::validatePhilippineContactNumber($mobilenum)) {
            Session::flash('error', [
                "mobilenum" => "The contact number is invalid."
            ]);
            redirect('/register');
        }

        //check if username is exist 
        if (Validation::isUsernameExist($username, $this)) {
            Session::flash('error', [
                "username" => "Username named {$username} is already exist."
            ]);
            redirect('/register');
        }

        //check if email exist
        if (Validation::isEmailExist($email, $this)) {
            Session::flash('error', [
                "email" => "Email named {$email} is already exist."
            ]);
            redirect('/register');
        }

        if (Validation::passwordValidation($password)) {
            Session::flash('error', [
                "password" => "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character."
            ]);
            redirect('/register');
        }

        if (!Validation::confirmedPassword($password, $confirmPassword)) {
            Session::flash('error', ['confirm' => "Password is not match"]);
            redirect('/register');
        }

        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

        $this->query("INSERT INTO `users` VALUES (null, :firstname, :lastname,:middlename, :suffix, :sex, :age, :mobilenum, :country, :province, :city, :barangay, null, :username, :email, :password, null, NOW())", [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "middlename" => $middlename,
            "suffix" => $suffix,
            "sex" => $sex,
            "age" => $age,
            "mobilenum" => $mobilenum,
            "country" => $country,
            "province" => $province,
            "city" => $city,
            "barangay" => $barangay,
            "username" => $username,
            "email" => $email,
            "password" => $hashed_pwd,
        ])->get();

        Session::unflash();
        Session::flash('error', ["success" => "Successfully Registered, you can now <a href='/login'>LOGIN.</a>"]);
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