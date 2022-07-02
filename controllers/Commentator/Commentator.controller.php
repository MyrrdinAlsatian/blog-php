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
