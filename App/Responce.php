<?php


class Responce
{
    public static function redirect(string $url = '/')
    {
        header('Location:' . $url);
        exit;
    }
}