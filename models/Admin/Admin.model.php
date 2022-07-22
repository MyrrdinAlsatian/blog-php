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
    public function updateArticleTitle($id, $title)
    {
        $req = $this->getBdd()->prepare('UPDATE Article SET title = :title, modified = current_timestamp() WHERE id = :id');
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $isUpdated = ($req->rowCount() > 0);
        $req->closeCursor();
        return $isUpdated;
    }
    public function updateArticleChapo($id, $chapo)
    {
        $req = $this->getBdd()->prepare('UPDATE Article SET chapo = :chapo, modified = current_timestamp() WHERE id = :id');
        $req->bindValue(':chapo', $chapo, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $isUpdated = ($req->rowCount() > 0);
        $req->closeCursor();
        return $isUpdated;
    }
    public function updateArticleImg($id, $path)
    {
        $req = $this->getBdd()->prepare('UPDATE Article SET featureImage = :feat, modified = current_timestamp() WHERE id = :id');
        $req->bindValue(':feat', $path, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $isUpdated = ($req->rowCount() > 0);
        $req->closeCursor();
        return $isUpdated;
    }
    public function updateArticleContent($id, $content)
    {
        $req = $this->getBdd()->prepare('UPDATE Article SET content = :content, modified = current_timestamp() WHERE id = :id');
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $isUpdated = ($req->rowCount() > 0);
        $req->closeCursor();
        return $isUpdated;
    }

    public function updateArticleReadingTime($id, $readTime)
    {
        $req = $this->getBdd()->prepare('UPDATE Article SET readingTime = :readTime, modified = current_timestamp() WHERE id = :id');
        $req->bindValue(':readTime', $readTime, PDO::PARAM_STR);
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
    public function getArticle($id)
    {
        $req = $this->getBdd()->prepare('SELECT u.username, a.id, a.title, a.modified, a.chapo, a.content, a.featureImage, a.created, a.modified, a.readingTime FROM article a INNER JOIN user u ON a.user_id = u.id WHERE a.id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $datas = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function isValidArticleId($id): bool
    {
        $req = $this->getBdd()->prepare('SELECT * FROM article WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $isValid = ($req->rowCount() === 1);
        $req->closeCursor();
        return $isValid;
    }

    public function getAllComments()
    {
        $req = $this->getBdd()->prepare('SELECT comment.uuid,comment.status, comment.content, comment.created, user.username, user.email, article.title, article.id FROM comment INNER JOIN user ON user.id=comment.user_id INNER JOIN article ON article.id= comment.article_id');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
    public function getNonValideComments()
    {
        $req = $this->getBdd()->query('SELECT COUNT(*) FROM comment WHERE status = 0 ');
        $rowNbr = $req->fetchColumn();
        $req->closeCursor();
        return $rowNbr;
    }
}
