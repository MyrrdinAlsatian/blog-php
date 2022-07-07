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
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Profile de " . $_SESSION["profile"]['mail'] . "",
            "user" => $userData,
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
    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
