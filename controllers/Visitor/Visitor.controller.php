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
        $articles = $this->visitorManager->getArticles();
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

    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
