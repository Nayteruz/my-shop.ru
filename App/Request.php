<?php


class Request
{
    public static function getIntFromGet(string $key, $default = 0)
    {
        if (isset($_GET[$key])) {
            return (int)$_GET[$key];
        }
        return $default;
    }

    public static function getIntFromPost(string $key, $default = 0)
    {
        if (isset($_POST[$key])) {
            return (int)$_POST[$key];
        }

        return $default;
    }

    public static function getStrFromPost(string $key, $default = '')
    {
        if (isset($_POST[$key])) {
            return (string)$_POST[$key];
        }

        return $default;
    }

    public static function isPost(): bool
    {
        return !empty($_POST);
    }
}