<?php

require_once('./config/param.ini.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mailer extends PHPMailer
{
    public function __construct($exceptions = true)
    {
        parent::__construct($exceptions);

        $this->CharSet = 'UTF-8';

        // if (defined("SMTP_HOST") && defined("SMTP_USER") && defined("SMTP_PASS") && SMTP_HOST && SMTP_USER && SMTP_PASS) {
        //     if (isset($_GET['debug']))
        //         $this->SMTPDebug = SMTP::DEBUG_CONNECTION;      // Enable verbose debug output
        $this->isSMTP();                                    // Send using SMTP
        $this->Host       = SMTP_HOST;                      // Set the SMTP server to send through
        $this->SMTPAuth   = true;                           // Enable SMTP authentication
        $this->Username   = SMTP_USER;                      // SMTP username
        $this->Password   = SMTP_PASS;                      // SMTP password
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->Port       = 465; // 465
        // }
    }
}
