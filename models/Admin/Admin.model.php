<?php
require_once('./models/MainManager.model.php');


class AdminManager extends MainManager
{

    public function getAllUtilisateurs()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM user');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function setRoleModification($id, $role)
    {
        $req = $this->getBdd()->prepare('UPDATE user SET role = :role WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':role', $role, PDO::PARAM_INT);
        $req->execute();
        $isSet = ($req->rowCount() > 0);
        $req->closeCursor();
        return $isSet;
    }

    public function removeAccount($id)
    {
        $req = $this->getBdd()->prepare('DELETE user FROM user WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $validated = ($req->rowCount() == 1);
        $req->closeCursor();
        return $validated;
    }
    public function unsetArticle($id)
    {
        $req = $this->getBdd()->prepare('DELETE article FROM article WHERE id = :id ');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $validated = ($req->rowCount() == 1);
        $req->closeCursor();
        return $validated;
    }
    public function setArticle($title, $subtitle, $status, $content, $readTime, $imgPath, $user)
    {
        $req = $this->getBdd()->prepare('INSERT INTO article (title, chapo, status, content, featureImage, readingTime , user_id) VALUES (:title, :subtitle, :status, :content, :imgPath, :readTime , :user)');
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':subtitle', $subtitle, PDO::PARAM_STR);
        $req->bindValue(':status', $status, PDO::PARAM_INT);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->bindValue(':readTime', $readTime, PDO::PARAM_INT);
        $req->bindValue(':user', $user, PDO::PARAM_INT);
        $req->bindValue(':imgPath', $imgPath, PDO::PARAM_STR);
        $req->execute();
        $isDone = ($req->rowCount() == 1);
        $req->closeCursor();
        return $isDone;
    }
    public function updateArticleStatus($id, $newStatus)
    {
        $req = $this->getBdd()->prepare('UPDATE Article SET status = :status WHERE id = :id');
        $req->bindValue(':status', $newStatus, PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $isUpdated = ($req->rowCount() > 0);
        $req->closeCursor();
        return $isUpdated;
    }

    public function getAllArticles()
    {
        $req = $this->getBdd()->prepare('SELECT a.id, a.title, a.status, a.created, u.username FROM user u INNER JOIN article a ON a.user_id = u.id');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $data;
    }
}
