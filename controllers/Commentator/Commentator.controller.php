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
                Toolbox::ajouterMessageAlerte("Le compte de " . $mail . " n'est pas encore actif", Toolbox::COULEUR_ORANGE);
                header('Location: ' . URL . "login");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Cette combinaison Email/mot de passe n'est pas valide", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "login");
        }
    }

    public function logout()
    {
        Toolbox::ajouterMessageAlerte("La déconnexion a bien été éffectué", Toolbox::COULEUR_VERTE);
        unset($_SESSION['profile']);
        header('Location: ' . URL . "/accueil");
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
    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
