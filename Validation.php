<?php

class Validation
{
    public static function locked()
    {
        if (!isset($_SESSION['attempts'])) {
            $_SESSION['attempts'] = 3;
        }
        if (isset($_SESSION['locked'])) {
            $difference = time() - $_SESSION['locked'];
            if ($difference > 10) {
                unset($_SESSION['locked']);
                unset($_SESSION['login_attempt']);
            }
        }
    }
    public static function checkUserExist($type, $value)
    {
        $user = (new Database)->query("SELECT * FROM users WHERE {$type} = :{$type}", [
            "{$type}" => $value
        ])->get();
        return count($user) > 0;
    }
}