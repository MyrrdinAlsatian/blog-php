<?php

require_once("./controllers/MainController.controller.php");

class VisitorController extends MainController
{
    public  function accueil()
    {

        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Blog jb",
            'view' => "views/accueil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }
    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
