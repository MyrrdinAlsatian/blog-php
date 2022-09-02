<?php

require_once('./config/param.ini.php');

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
    public static function createToken(): string
    {
        $seed = random_bytes(8);
        $time = time();
        $hash = hash_hmac('sha256', session_id() . $seed . $time, CRSF_TOKEN_SECRET, true);

        return self::urlSafeEncode($hash . '|&|' . $seed . '|&|' . $time);
    }

    private static function urlSafeEncode($m): string
    {
        return rtrim(strtr(base64_encode($m), '+/', '-_'), '=');
    }
    private static function urlSafeDecode($m): string
    {
        return base64_decode(strstr($m, '-_', '+/'));
    }

    public static function validateToken($token): bool
    {
        $parts = explode('|&|', self::urlSafeDecode($token));
        if (count($parts) == 3) {
            $hash = hash_hmac('sha256', session_id() . $parts[1], $parts[2], CRSF_TOKEN_SECRET, true);
            if (hash_equals($hash, $parts[0])) {
                return true;
            }
        }
        return false;
    }
}
