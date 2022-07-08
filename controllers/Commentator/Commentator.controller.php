<?php
require_once("./controllers/MainController.controller.php");
require_once("./controllers/Toolbox.class.php");
require_once("./models/Commentator/Commentator.model.php");

class CommentatorController extends MainController
{
    private $commentatorManager;

    public function __construct()
    {
        $this->commentatorManager = new CommentatorManager();
    }

    public function validation_login($mail, $password)
    {
        if ($this->commentatorManager->isCredentialsValid($mail, $password)) {

            if ($this->commentatorManager->isAccountValid($mail)) {
                $_SESSION["profile"] = [
                    "mail" => $mail
                ];
                Toolbox::ajouterMessageAlerte("Connexion réussi", Toolbox::COULEUR_VERTE);
                header('Location: ' . URL . "backoffice/profile");
            } else {
                $msg = "Le compte de " . $mail . " n'est pas encore actif&nbp;";
                $msg .= " <a href='resendMailValidation/" . $mail . "'> Renvoyer le mail de confirmation </a>";
                Toolbox::ajouterMessageAlerte($msg, Toolbox::COULEUR_ORANGE);
                header('Location: ' . URL . "login");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Cette combinaison Email/mot de passe n'est pas valide", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "login");
        }
    }

    public function logout()
    {
        Toolbox::ajouterMessageAlerte("La déconnexion a bien été effectué", Toolbox::COULEUR_VERTE);
        unset($_SESSION['profile']);
        header('Location: ' . URL . "accueil");
    }
    public function profile()
    {
        $userData = $this->commentatorManager->getUserData($_SESSION["profile"]['mail']);
        print_r($userData);
        $_SESSION['profile']['role'] = $userData['role'];
        $_SESSION['profile']['username'] = $userData['username'];
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Profile de " . $_SESSION["profile"]['mail'] . "",
            "user" => $userData,
            "page_javascript" => ["profile.js"],
            'view' => "views/Commentator/profile.view.php",
            "template" => "views/common/admin.template.php"
        ];
        $this->generatePage($data_page);
    }

    public function resendMailValidation($mail)
    {
        $userData = $this->commentatorManager->getUserData($mail);
        $validationUrl = URL . "validationMail/" . $userData['username'] . "/" . $userData['linkValid'];
        $subject = "Création de compte sur " . URL;
        $content = " Veuillez cliquer sur le liens pour valider votre compte : " . $validationUrl;
        Toolbox::sendMail($mail, $subject, $content);
        header('Location: ' . URL . "login");
    }

    public function validationMail($username, $key)
    {
        if ($this->commentatorManager->setValidAccount($username, $key)) {
            Toolbox::ajouterMessageAlerte("Votre compte a été validé", Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . "login");
        } else {
            Toolbox::ajouterMessageAlerte("Votre compte n'a pas pu être validé", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "register");
        }
    }
    public function validationMailModification($mail)
    {
        if ($this->commentatorManager->setNewMail($mail, $_SESSION['profile']['username'])) {
            Toolbox::ajouterMessageAlerte("Votre Mail a bien été modifié", Toolbox::COULEUR_VERTE);
            $_SESSION['profile']['mail'] = $mail;
        } else {
            Toolbox::ajouterMessageAlerte("Votre mail n'a pas été modifié", Toolbox::COULEUR_ROUGE);
        }
        header('Location: ' . URL . "backoffice/profile");
    }

    public function passwordModification()
    {
        $data_page = [
            "page_description" => "Changer son mot de passe",
            "page_title" => "Modification du mot de passe",
            // "page_javascript" => ["profile.js"],
            'view' => "views/Commentator/modificationPassword.view.php",
            "template" => "views/common/admin.template.php"
        ];
        $this->generatePage($data_page);
    }
    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
