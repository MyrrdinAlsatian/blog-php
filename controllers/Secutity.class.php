<?php



class Security
{

    public static function htmlSafe($entry)
    {
        return htmlentities($entry);
    }
    public static function emailSafe($mail)
    {
        return strip_tags(filter_var($mail, FILTER_SANITIZE_EMAIL));
    }
    public static function urlSafe($url)
    {
        return strip_tags(filter_var($url, FILTER_SANITIZE_URL));
    }
    public static function numberSafe($number)
    {
        return strip_tags(filter_var($number, FILTER_SANITIZE_NUMBER_INT));
    }
    public static function isConnected(): bool
    {
        return (!empty($_SESSION["profile"]));
    }
    public static function isAdmin(): bool
    {
        return ($_SESSION['profile']['role'] === 2);
    }
    public static function isUser(): bool
    {
        return ($_SESSION['profile']['role'] === 1);
    }
}
