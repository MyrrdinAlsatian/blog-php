<?php

require_once("./controllers/MainController.controller.php");
require_once("./models/Visitor/Visitor.model.php");
class VisitorController extends MainController
{

    private $visitorManager;

    public function __construct()
    {
        $this->visitorManager = new VisitorManager();
    }

    public  function accueil()
    {
        $articles = $this->visitorManager->getLastArticles();
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Blog jb",
            "page_data" => $articles,
            'view' => "views/accueil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function login()
    {
        $data_page = [
            "page_description" => " Page de connection",
            "page_title" => "Login",
            'view' => "views/Visitor/login.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function register()
    {
        $data_page = [
            "page_description" => " Page d'inscription",
            "page_title" => "Inscription",
            'view' => "views/Visitor/register.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function validation_register($mail, $pseudo, $password)
    {
        if ($this->visitorManager->isPseudoAvailable($pseudo)) {
            if ($this->visitorManager->isMailAvailable($mail)) {
                $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
                $key = rand(0, 999999); // rand
                if ($this->visitorManager->createNewAccount($passwordEncrypted, $pseudo, $mail, $key)) {
                    $this->sendValidationMail($mail, $key, $pseudo);
                    Toolbox::ajouterMessageAlerte('Le compte a bien été créer, veuillez valider votre compte', Toolbox::COULEUR_VERTE);
                    header('Location:' . URL . 'login');
                } else {
                    Toolbox::ajouterMessageAlerte('La création du compte a échoué, veuillez retenter', Toolbox::COULEUR_ROUGE);
                    header('Location:' . URL . 'register');
                }
            } else {
                Toolbox::ajouterMessageAlerte('Cette email est déjas liés à un compte', Toolbox::COULEUR_ORANGE);
            }
        } else {
            Toolbox::ajouterMessageAlerte('Ce pseudo n\'est plus disponible', Toolbox::COULEUR_ORANGE);
            header('Location: ' . URL . 'register');
        }
    }

    public function sendValidationMail($mail, $key, $username)
    {
        $validationUrl = URL . "validationMail/" . $username . "/" . $key;
        $subject = "Création de compte sur " . URL;
        $content = " Veuillez cliquer sur le liens pour valider votre compte : " . $validationUrl;
        Toolbox::sendMail($mail, $subject, $content);
    }

    public function articles()
    {
        $articles = $this->visitorManager->getArticles();
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Articles du blog jb",
            "page_data" => $articles,
            'view' => "views/blog.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }
    public function article($id)
    {
        if (ctype_digit($id)) {
            (int)$isID =  Security::numberSafe($id);
            if ($this->visitorManager->isValidArticleId($isID)) {

                $article = $this->visitorManager->getArticle($isID);
                $data_page = [
                    "page_description" => " Blog OpenClassroom",
                    "page_title" => "Articles du blog jb",
                    "page_data" => $article,
                    'view' => "views/Visitor/blogItem.view.php",
                    "template" => "views/common/template.php"
                ];
                $this->generatePage($data_page);
            } else {
                Toolbox::ajouterMessageAlerte('Cette page n\'existe pas', Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . 'articles');
            }
        } else {
            Toolbox::ajouterMessageAlerte('Cette page n\'existe pas', Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . 'articles');
        }
    }

    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
