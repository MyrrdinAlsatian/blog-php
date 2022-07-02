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
                Toolbox::ajouterMessageAlerte("Connexion réussi", Toolbox::COULEUR_VERTE);
                $_SESSION['profile'] = [
                    "mail" => $mail
                ];
                header('Location: ' . URL . "backoffice/profile");
            } else {
                Toolbox::ajouterMessageAlerte("Le compte de " . $mail . " n'est pas encore actif", Toolbox::COULEUR_ORANGE);
                header('Location: ' . URL . "login");
            }
            echo "TUTU";
        } else {
            Toolbox::ajouterMessageAlerte("Cette combinaison Email/mot de passe n'est pas valide", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "login");
        }
    }

    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
