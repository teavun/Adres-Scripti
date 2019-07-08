<?php

class Request
{
    public static function getHttpMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function posts(){
        return $_POST;
    }

    public static function gets()
    {
        return $_GET;
    }

    public static function params()
    {
        $arr = $_SERVER['REQUEST_URI'];
        $arr  = trim($arr, '/');

        if (strlen($arr) > 0)
            return explode('/', $arr);

        return false;
    }

    public static function type()
    {
        return current(self::params());
    }

    public static function id()
    {
        return next(self::params());
    }
}
