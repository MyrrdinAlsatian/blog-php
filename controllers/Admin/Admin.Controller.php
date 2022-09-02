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
        $rowNbr = $this->adminManager->getNonValideComments();
        $usersData = $this->adminManager->getAllUtilisateurs();

        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Profile de " . $_SESSION["profile"]['mail'] . "",
            "allUsers" => $usersData,
            "comment_nbr" => $rowNbr,
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

    public function articles()
    {
        $rowNbr = $this->adminManager->getNonValideComments();


        $articlesData = $this->adminManager->getAllArticles();
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Backoffice listing des articles",
            "allArticles" => $articlesData,
            "comment_nbr" => $rowNbr,
            "page_javascript" => ["status.js"],
            'view' => "views/Admin/articles.view.php",
            "template" => "views/common/admin.template.php"
        ];
        $this->generatePage($data_page);
    }

    public function newArticle()
    {
        $rowNbr = $this->adminManager->getNonValideComments();
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Backoffice listing des articles",
            // "page_javascript" => ["profile.js"],
            "comment_nbr" => $rowNbr,
            'view' => "views/Admin/newArticle.view.php",
            "template" => "views/common/admin.template.php"
        ];
        $this->generatePage($data_page);
    }
    public function validateArticle($title, $subtitle, $status, $content, $readTime, $imgPath, $user)
    {
        if ($this->adminManager->setArticle($title, $subtitle, $status, $content, $readTime, $imgPath, $user)) {
            Toolbox::ajouterMessageAlerte('L\'article' . $title . 'à été ajouté', Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . 'backoffice/articles');
        } else {
            Toolbox::ajouterMessageAlerte('Aucun article n\'a été ajouté', Toolbox::COULEUR_ORANGE);
            header('Location: ' . URL . 'backoffice/articles');
        }
    }

    public function deleteArticle($id, $title)
    {
        if ($this->adminManager->unsetArticle($id)) {
            Toolbox::ajouterMessageAlerte('L\'article' . $title . 'à été supprimer', Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . 'backoffice/articles');
        } else {
            Toolbox::ajouterMessageAlerte('L\'article' . $title . 'n\'à pas été supprimer', Toolbox::COULEUR_ORANGE);
            header('Location: ' . URL . 'backoffice/articles');
        }
    }

    public function updateStatus($id, $status)
    {
        if ($this->adminManager->updateArticleStatus($id, $status)) {
            Toolbox::ajouterMessageAlerte('Le status a bien été mise à jour', Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . 'backoffice/articles');
        } else {
            Toolbox::ajouterMessageAlerte('Le status n\'a pas été mise à jour', Toolbox::COULEUR_ORANGE);
            header('Location: ' . URL . 'backoffice/articles');
        }
    }
    public function updateArticle($id)
    {
        if (ctype_digit($id)) {
            (int)$isID =  Security::numberSafe($id);
            if ($this->adminManager->isValidArticleId($isID)) {

                $article = $this->adminManager->getArticle($isID);
                $rowNbr = $this->adminManager->getNonValideComments();
                $data_page = [
                    "page_description" => " Blog OpenClassroom",
                    "page_title" => "Articles du blog jb",
                    "page_data" => $article,
                    "comment_nbr" => $rowNbr,
                    "page_javascript" => ["profile.js"],
                    'view' => "views/Admin/modificationBlogItem.view.php",
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
    public function articleTitleModification($id, $title)
    {
        if (ctype_digit($id)) {
            (int)$isID =  Security::numberSafe($id);
            if ($this->adminManager->isValidArticleId($isID)) {

                if ($this->adminManager->updateArticleTitle($id, $title)) {
                    Toolbox::ajouterMessageAlerte('Le Titre de l\'article:' . $title . ' a été mise a jour', Toolbox::COULEUR_VERTE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                } else {
                    Toolbox::ajouterMessageAlerte('Le Titre de l\'article:' . $title . ' n\'a pas été mise a jour', Toolbox::COULEUR_ORANGE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                }
            } else {
                Toolbox::ajouterMessageAlerte('Cette article n\'existe pas', Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . 'articles');
            }
        } else {
            Toolbox::ajouterMessageAlerte('Cette page n\'existe pas', Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . 'articles');
        }
    }
    public function articleChapoModification($id, $chapo)
    {
        if (ctype_digit($id)) {
            (int)$isID =  Security::numberSafe($id);
            if ($this->adminManager->isValidArticleId($isID)) {

                if ($this->adminManager->updateArticleChapo($id, $chapo)) {
                    Toolbox::ajouterMessageAlerte('Le chapo de l\'article: a été mise a jour', Toolbox::COULEUR_VERTE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                } else {
                    Toolbox::ajouterMessageAlerte('Le chapo de l\'article: n\'a pas été mise a jour', Toolbox::COULEUR_ORANGE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                }
            } else {
                Toolbox::ajouterMessageAlerte('Cette article n\'existe pas', Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . 'articles');
            }
        } else {
            Toolbox::ajouterMessageAlerte('Cette page n\'existe pas', Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . 'articles');
        }
    }
    public function articleContentModification($id, $content)
    {
        if (ctype_digit($id)) {
            (int)$isID =  Security::numberSafe($id);
            if ($this->adminManager->isValidArticleId($isID)) {

                if ($this->adminManager->updateArticleContent($id, $content)) {
                    Toolbox::ajouterMessageAlerte('Le contenu de l\'article: a été mise a jour', Toolbox::COULEUR_VERTE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                } else {
                    Toolbox::ajouterMessageAlerte('Le contenu de l\'article: n\'a pas été mise a jour', Toolbox::COULEUR_ORANGE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                }
            } else {
                Toolbox::ajouterMessageAlerte('Cette article n\'existe pas', Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . 'articles');
            }
        } else {
            Toolbox::ajouterMessageAlerte('Cette page n\'existe pas', Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . 'articles');
        }
    }
    public function articleImgModification($id, $img)
    {
        if (ctype_digit($id)) {
            (int)$isID =  Security::numberSafe($id);
            if ($this->adminManager->isValidArticleId($isID)) {

                if ($this->adminManager->updateArticleImg($id, $img)) {
                    Toolbox::ajouterMessageAlerte('L\'image de l\'article a été mise a jour', Toolbox::COULEUR_VERTE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                } else {
                    Toolbox::ajouterMessageAlerte('L\'image de l\'article n\'a pas été mise a jour', Toolbox::COULEUR_ORANGE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                }
            } else {
                Toolbox::ajouterMessageAlerte('Cette article n\'existe pas', Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . 'articles');
            }
        } else {
            Toolbox::ajouterMessageAlerte('Cette page n\'existe pas', Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . 'articles');
        }
    }

    public function articleTimeModification($id, $time)
    {
        if (ctype_digit($id)) {
            (int)$isID =  Security::numberSafe($id);
            if ($this->adminManager->isValidArticleId($isID)) {

                if ($this->adminManager->updateArticleReadingTime($id, $time)) {
                    Toolbox::ajouterMessageAlerte('Le temps de lecture de l\'article: a été mise a jour', Toolbox::COULEUR_VERTE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                } else {
                    Toolbox::ajouterMessageAlerte('Le temps de lecture de l\'article: n\'a pas été mise a jour', Toolbox::COULEUR_ORANGE);
                    header('Location:' . URL . 'article/' . $id . '/edit');
                }
            } else {
                Toolbox::ajouterMessageAlerte('Cette article n\'existe pas', Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . 'articles');
            }
        } else {
            Toolbox::ajouterMessageAlerte('Cette page n\'existe pas', Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . 'articles');
        }
    }

    public function comments()
    {
        $comments = $this->adminManager->getAllComments();
        $rowNbr = $this->adminManager->getNonValideComments();
        $data_page = [
            "page_description" => " Blog OpenClassroom",
            "page_title" => "Commentaire sur le blog jb",
            "page_data" => $comments,
            "comment_nbr" => $rowNbr,
            "page_javascript" => ["status.js"],
            'view' => "views/admin/comment.view.php",
            "template" => "views/common/admin.template.php"
        ];
        $this->generatePage($data_page);
    }

    public function UpdateCommentStatus($id, $status)
    {
        if ($this->adminManager->updateCommentStatus($id, $status)) {
            $mail = "stephan.jeanba@gmail.com"; // $_SESSION['mail']
            $subject = "Un commentaire sur " . URL . " a été validé";
            $content = "Votre Commentaire a été accepté ";
            Toolbox::sendMail($mail, $subject, $content);
            Toolbox::ajouterMessageAlerte('Le status a bien été mise à jour', Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . 'backoffice/comments');
        } else {
            Toolbox::ajouterMessageAlerte('Le status n\'a pas été mise à jour', Toolbox::COULEUR_ORANGE);
            header('Location: ' . URL . 'backoffice/comments');
        }
    }
    public function deleteComment($uuid)
    {
        if ($this->adminManager->unsetComment($uuid)) {
            Toolbox::ajouterMessageAlerte('Le commentaire a bien été supprimer', Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . 'backoffice/comments');
        } else {
            Toolbox::ajouterMessageAlerte('Le commentaire n\'a bien été supprimer', Toolbox::COULEUR_ORANGE);
            header('Location: ' . URL . 'backoffice/comments');
        }
    }

    public function ErrorPage($msg): void
    {
        parent::ErrorPage($msg);
    }
}
