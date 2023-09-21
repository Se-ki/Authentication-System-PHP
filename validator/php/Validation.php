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
        return preg_match('/(.)\\1{2,}/', $name) === 1;
    }
    public static function isInputCapitalized($name)
    {
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
        return preg_match("/^[a-z-A-Z ]*$/", $name) === 1;
    }
    public static function isUserExist($email, $db)
    {
        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->get();

        if ($user) {
            $_SESSION['error'] = ["credentials" => "Email named {$email} is already exist."];
            redirect('/email');
        }
        return false;
    }
    public static function isNameDoubleSpace($name)
    {
        return preg_match('/  /', $name) === 1;
    }

    public static function emailVerify($email)
    {
        $mail = new PHPMailer(true);

        try {
            //first is configure server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL'];
            $mail->Password = $_ENV['PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            //second add the recipients of the mail
            $mail->setFrom('cautor3@gmail.com', 'Christian Kyle Autor'); //set sender
            $mail->addAddress($email); //set receiver

            //add the content, this is when the receiver see the email message format
            $mail->isHTML(true);
            static::$verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = "Email Verification";
            $mail->Body = "
            <h1>Welcome, {$email}. Please verify if this is you.</h1>
            <p>Your verification code is: 
                <b style='font-size: 30px; color: red;'>"
                . static::$verification_code .
                "</b>
            </p>";

            //send the email 
            $mail->send();
            return;
        } catch (\Exception) {
            $_SESSION['error'] = ['credentials' => "Connectivity Failed."];
            redirect('/email');
            // die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

    public static function isEmailVerified($inputted_code)
    {

        if (!password_verify($inputted_code, $_SESSION['verify']['code'])) {
            $_SESSION['error'] = ["input_code" => "Incorrect Verification Code"];
            redirect("/email/verification");
        }

        $_SESSION['email'] = $_SESSION['verify']['email'];
        unset($_SESSION['verify']);
        redirect('/register');
    }

    public static function locked()
    {
        if (isset($_SESSION['locked'])) {
            $difference = time() - $_SESSION['locked'];
            if ($difference > 10) {
                unset($_SESSION['locked']);
                unset($_SESSION['login_attempt']);
                echo "<script>alert('10 secs surpass!')</script>";
            }
        }
    }

    public static function checkIfVerified($email, $db)
    {
        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->get();

        if (isset($user['email_verified_at'])) {
            return true;
        }
        return false;
    }
    public static function verificationCode()
    {
        return static::$verification_code;
    }
}