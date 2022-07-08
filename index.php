<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require_once('./controllers/Visitor/Visitor.controller.php');
require_once('./controllers/Commentator/Commentator.controller.php');
require_once("./controllers/Toolbox.class.php");
require_once("./controllers/Secutity.class.php");

$visitorController = new VisitorController();
$userController = new CommentatorController();

try {
    if (empty($_GET['page'])) {
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch ($page) {
        case "accueil":
            $visitorController->accueil();
            break;
        case "login":
            $visitorController->login();
            break;
        case 'validation_login':
            if (!empty($_POST["mail"] && !empty($_POST["password"]))) {
                $mail = Security::emailSafe($_POST["mail"]);
                $password = Security::htmlSafe($_POST['password']);
                $userController->validation_login($mail, $password);
            } else {
                Toolbox::ajouterMessageAlerte("Mot de passe ou email non renseigné", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "login");
            }
            break;
        case "logout":
            $userController->logout();
            break;
        case "register":
            $visitorController->register();
            break;
        case 'validation_register':
            if (!empty($_POST["mail"] && !empty($_POST["password"])) && !empty($_POST['pseudo']) && !empty($_POST['confirmpassword'])) {
                if ($_POST['confirmpassword'] !== $_POST['password']) {
                    Toolbox::ajouterMessageAlerte("Veuillez re-confirmer votre mot de passe", Toolbox::COULEUR_ROUGE);
                    header('Location: ' . URL . "register");
                } else {

                    $mail = Security::emailSafe($_POST["mail"]);
                    $pseudo = Security::htmlSafe($_POST["pseudo"]);
                    $password = Security::htmlSafe($_POST["password"]);
                    $visitorController->validation_register($mail, $pseudo, $password);
                }
            } else {
                Toolbox::ajouterMessageAlerte("Veuillez compléter tous les champs du formulaire", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "register");
            }
            break;
        case 'resendMailValidation':
            $userController->resendMailValidation($url[1]);
            break;
        case 'validationMail':
            $userController->validationMail($url[1], $url[2]);
            break;
        case 'backoffice':
            if (Security::isConnected()) {
                switch ($url[1]) {
                    case 'profile':
                        $userController->profile();
                        break;
                    case 'validation_mailModification':
                        $userController->validationMailModification(Security::emailSafe($_POST["mail"]));
                        break;
                    case 'passwordModification':
                        $userController->passwordModification();
                        break;
                    case 'validation_newPassword':
                        if (
                            !empty($_POST["newPassword"]) &&
                            !empty($_POST["confirmPassword"]) &&
                            !empty($_POST["oldPassword"])
                        ) {

                            if ($_POST['newPassword'] !== $_POST['confirmPassword']) {
                                Toolbox::ajouterMessageAlerte("Veuillez re-confirmer votre mot de passe", Toolbox::COULEUR_ROUGE);
                                header('Location: ' . URL . "backoffice/passwordModification");
                            } else {

                                $oldPassword = Security::htmlSafe($_POST["oldPassword"]);
                                $newPassword = Security::htmlSafe($_POST["newPassword"]);

                                $userController->validationNewPassword($oldPassword, $newPassword);
                            }
                        } else {
                            Toolbox::ajouterMessageAlerte("Veuillez compléter tous les champs du formulaire", Toolbox::COULEUR_ROUGE);
                            header('Location: ' . URL . "backoffice/passwordModification");
                        }

                        break;
                    default:
                        throw new Exception("ce profile n'existe pas");
                }
            } else {
                Toolbox::ajouterMessageAlerte("Veuillez vous connectez !!", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "login");
            }
            break;
        default:
            throw new Exception("La page n'existe pas");
    }
} catch (Exception $e) {
    $visitorController->ErrorPage($e->getMessage());
}
