<?php
require_once("./controllers/MainController.controller.php");
require_once("./controllers/Toolbox.class.php");
require_once("./models/Admin/Admin.model.php");

class AdminController extends MainController
{
    private $AdminManager;

    public function __construct()
    {
        $this->adminManager = new AdminManager();
    }


    public function listUsers()
    {
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Profile de " . $_SESSION["profile"]['mail'] . "",
            // "user" => $userData,
            "page_javascript" => ["profile.js"],
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
