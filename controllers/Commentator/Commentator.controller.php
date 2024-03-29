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
        $rowNbr = $this->commentatorManager->getNonValideComments();


        $_SESSION['profile']['role'] = $userData['role'];
        $_SESSION['profile']['username'] = $userData['username'];
        $_SESSION['profile']['id'] = $userData['id'];
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Profile de " . $_SESSION["profile"]['mail'] . "",
            "user" => $userData,
            "comment_nbr" => $rowNbr,
            "page_javascript" => ["profile.js"],
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

    public function validationMail($username, $key)
    {
        if ($this->commentatorManager->setValidAccount($username, $key)) {
            Toolbox::ajouterMessageAlerte("Votre compte a été validé", Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . "login");
        } else {
            Toolbox::ajouterMessageAlerte("Votre compte n'a pas pu être validé", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "register");
        }
    }

    public function validationMailModification($mail)
    {
        if ($this->commentatorManager->setNewMail($mail, $_SESSION['profile']['username'])) {
            Toolbox::ajouterMessageAlerte("Votre Mail a bien été modifié", Toolbox::COULEUR_VERTE);
            $_SESSION['profile']['mail'] = $mail;
        } else {
            Toolbox::ajouterMessageAlerte("Votre mail n'a pas été modifié", Toolbox::COULEUR_ROUGE);
        }
        header('Location: ' . URL . "backoffice/profile");
    }

    public function passwordModification()
    {
        $data_page = [
            "page_description" => "Changer son mot de passe",
            "page_title" => "Modification du mot de passe",
            "page_javascript" => ["passwordModif.js"],
            'view' => "views/Commentator/modificationPassword.view.php",
            "template" => "views/common/admin.template.php"
        ];
        $this->generatePage($data_page);
    }
    public function validationNewPassword($oldPassword, $newPassword)
    {
        $newPasswordEncrypted = password_hash($newPassword, PASSWORD_DEFAULT);
        if ($this->commentatorManager->isCredentialsValid($_SESSION['profile']['mail'], $oldPassword)) {
            if ($this->commentatorManager->setNewPassword($newPasswordEncrypted, $_SESSION['profile']['mail'])) {
                Toolbox::ajouterMessageAlerte("Votre mot de passe a bien été modifié", Toolbox::COULEUR_VERTE);
            } else {
                Toolbox::ajouterMessageAlerte("Votre mot de passe n'a pas été modifié", Toolbox::COULEUR_ROUGE);
            }
            header('Location: ' . URL . "backoffice/passwordModification");
        } else {
            Toolbox::ajouterMessageAlerte("Cette veuillez renseigner votre mot de passe actuel", Toolbox::COULEUR_ORANGE);
            header('Location: ' . URL . "backoffice/passwordModification");
        }
    }

    public function deleteAccount()
    {

        if ($this->commentatorManager->removeAccount($_SESSION['profile']['mail'])) {
            Toolbox::ajouterMessageAlerte("Votre compte à bien été supprmier", Toolbox::COULEUR_VERTE);
            $this->logout();
        } else {
            Toolbox::ajouterMessageAlerte("Impossible de supprimer ce compte, veuillez contacter l'administrateur", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "backoffice/profile");
        }
    }
    public function addComment($id, $content)
    {
        $id_article = Security::htmlSafe($id);
        $comment_content = Security::htmlSafe($content);
        $user_id = $_SESSION['profile']['id'];
        if ($this->commentatorManager->setComment($id_article, $comment_content, $user_id)) {
            Toolbox::ajouterMessageAlerte('Votre commentaire a bien été envoyé, il doit encore être valider par un administrateur', Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . 'article/' . $id_article);
        } else {
            Toolbox::ajouterMessageAlerte("Impossible d 'ajouter un commentaire", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . 'article/' . $id_article);
        }
    }
    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
