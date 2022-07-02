<?php
session_start();


define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require_once('./controllers/Visitor/Visitor.controller.php');
$Visitor = new VisitorController();

try {
    if (empty($_GET['page'])) {
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch ($page) {
        case "accueil":
            $Visitor->accueil();
            print_r("accueil");
            break;

            break;
        default:
            throw new Exception("La page n'existe pas");
    }
} catch (Exception $e) {
    $Visitor->ErrorPage($e->getMessage());
}
