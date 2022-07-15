<?php



class Security
{

    public static function htmlSafe($entry)
    {
        return htmlspecialchars($entry);
    }
    public static function emailSafe($mail)
    {
        return strip_tags(filter_var($mail, FILTER_SANITIZE_EMAIL));
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
