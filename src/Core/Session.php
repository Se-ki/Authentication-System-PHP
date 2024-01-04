<?php

namespace Src\Core;

class Session
{
    public static function flash($key, $value)
    {
        return $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash($key = null)
    {
        if (!isset($key)) {
            unset($_SESSION['_flash']);
            return;
        }
        unset($_SESSION['_flash'][$key]);
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $default;
    }

    public static function check(array $session)
    {
        $uri = ['/login' => '/login', '/register' => '/register'];
        if (isset($session['user']['login'])  && array_key_exists(uri(), $uri)) {
            redirect('/home');
        } else if (!isset($session['user']['login']) && !array_key_exists(uri(), $uri)) {
            redirect('/login');
        }
    }
}
