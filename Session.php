<?php
class Session
{
    public static function flash($key, $value)
    {
        return $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $default;
    }
}