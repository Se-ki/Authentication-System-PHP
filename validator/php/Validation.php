<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Validation
{
    protected static $verification_code;
    public static function passwordValidation($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            return true;
        } else {
            return false;
        }
    }

    public static function confirmedPassword($password, $confirm_pass)
    {
        return $password === $confirm_pass;
    }

    public static function hasRepeatedLetters($name)
    {
        if (!$name) {
            return false;
        }
        return preg_match('/(.)\\1{3,}/', $name) === 1;
    }
    public static function isInputCapitalized($name)
    {
        if (!$name) {
            return true;
        }
        $words = preg_split('/\s+/', $name);

        foreach ($words as $word) {
            if (!ctype_upper(substr($word, 0, 1))) {
                return false;
            }
        }
        return true;
    }
    public static function isNameStringOnly($name)
    {
        if (!$name) {
            return true;
        }
        return preg_match("/^[a-z-A-Z ]*$/", $name) === 1;
    }
    public static function isEmailExist($email, $db)
    {
        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->get();

        if ($user) {
            return true;
        }
        return false;
    }
    public static function isUsernameExist($username, $db)
    {
        $user = $db->query("SELECT * FROM users WHERE username = :username", [
            "username" => $username
        ])->get();

        if ($user) {
            return true;
        }
        return false;
    }
    public static function validateDoubleSpace($input)
    {
        $regex = '/\s{2,}/';
        if (preg_match($regex, $input)) {
            return false;
        }
        return true;
    }

    public static function validateFirstPartHasDoubleSpace($input)
    {
        $parts = explode(' ', $input, 2);
        if (preg_match('/\s{2,}/', $parts[0])) {
            return false;
        }
        return true;
    }

    public static function validateNumber($number)
    {
        $regex = '/^[0-9]+$/';
        if (!preg_match($regex, $number)) {
            return false;
        }
        return true;
    }

    public static function validatePhilippineContactNumber($contactNumber)
    {
        $regex = '/^(09|\+639)\d{9}$/';
        if (!preg_match($regex, $contactNumber)) {
            return false;
        }
        return true;
    }

    public static function locked()
    {
        if (isset($_SESSION['locked'])) {
            $difference = time() - $_SESSION['locked'];
            if ($difference > 30) {
                unset($_SESSION['locked']);
                unset($_SESSION['login_attempt']);
            }
        }
    }
}