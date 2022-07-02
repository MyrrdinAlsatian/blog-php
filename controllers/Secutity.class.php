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
}
