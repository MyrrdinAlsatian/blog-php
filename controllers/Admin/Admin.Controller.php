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
        $usersData = $this->adminManager->getAllUtilisateurs();
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Profile de " . $_SESSION["profile"]['mail'] . "",
            "allUsers" => $usersData,
            "page_javascript" => ["profile.js"],
            'view' => "views/Admin/users.view.php",
            "template" => "views/common/admin.template.php"
        ];
        $this->generatePage($data_page);
    }

    public function validateRoleModification($id, $role)
    {
        if ($this->adminManager->setRoleModification($id, $role)) {
            Toolbox::ajouterMessageAlerte('Le role de l\'utilisateur n°' . $id . ' a été Mise à jour', Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . 'backoffice/users');
        } else {
            Toolbox::ajouterMessageAlerte('Le role de l\'utilisateur n°' . $id . ' n\'a pas été modifier', Toolbox::COULEUR_ORANGE);
            header('Location: ' . URL . 'backoffice/users');
        }
    }

    public function deleteUser($id)
    {
        if ($this->adminManager->removeAccount($id)) {
            Toolbox::ajouterMessageAlerte('L\'utilisateur n°' . $id . ' a été supprimé', Toolbox::COULEUR_ORANGE);
            header('Location: ' . URL . 'backoffice/users');
        } else {
            Toolbox::ajouterMessageAlerte('L\'utilisateur n°' . $id . ' n\'a pas été supprimé', Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . 'backoffice/users');
        }
    }

    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
