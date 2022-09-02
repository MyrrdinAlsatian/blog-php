<?php

// SMTP server configuration
define('SMTP_HOST', 'mail.jbscreative.dev');
define('SMTP_USER', 'openclassroom@jbscreative.dev');
define('SMTP_PASS', 'Permaculteur1');

// DB server configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blog');
define('DB', 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8');
// Security configuration
define("CRSF_TOKEN_SECRET", "openclassroom");
define("CSRF_VALIDATION_INTERVAL", 15);
// ................
include_once "vendor/autoload.php";
