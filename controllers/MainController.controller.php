<?php

require_once("models/MainManager.model.php");


abstract class MainController
{

    private $mainManager;

    public function __construct()
    {
        // $this->mainManager = new MainManager();
    }

    protected function generatePage($data): void
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    // public  function accueil()
    // {

    //     $data_page = [
    //         "page_description" => " Blog OpenClassroom",
    //         "page_title" => "Blog jb",
    //         'view' => "views/accueil.view.php",
    //         "template" => "views/common/template.php"
    //     ];
    //     $this->generatePage($data_page);
    // }

    protected function ErrorPage($msg): void
    {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur $msg ",
            "msg" => $msg,
            "view" => "./views/erreur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }
}
