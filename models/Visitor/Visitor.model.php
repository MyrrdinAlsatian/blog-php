<?php

require_once("./models/MainManager.model.php");

class VisitorManager extends MainManager
{
    public function getArticles()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM article WHERE status = 1 ORDER BY id DESC');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
    public function getArticle($id)
    {
        $req = $this->getBdd()->prepare('SELECT a.id, u.username, a.title, a.modified, a.chapo, a.content, a.featureImage, a.created, a.modified, a.readingTime FROM article a INNER JOIN user u ON a.user_id = u.id WHERE a.id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $datas = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function getValidComments($id)
    {
        $req = $this->getBdd()->prepare('SELECT u.username,c.content,c.status,c.created,c.modified, c.uuid FROM comment c INNER JOIN user u ON u.id = c.user_id INNER JOIN article a ON a.id = c.article_id  WHERE c.status = 1 AND a.id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function getLastArticles()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM article WHERE status = 1  ORDER BY id DESC LIMIT 3 ');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
    public function isPseudoAvailable($pseudo): bool
    {
        $req = $this->getBdd()->prepare('SELECT * FROM user WHERE username = :pseudo');
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();
        $available = ($req->rowCount() === 0);
        $req->closeCursor();
        return $available;
    }

    public function isMailAvailable($mail): bool
    {
        $req = $this->getBdd()->prepare('SELECT * FROM user WHERE email = :mail');
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();
        $available = ($req->rowCount() === 0);
        $req->closeCursor();
        return $available;
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

    public  function createNewAccount($password, $pseudo, $mail, $key)
    {
        $req = $this->getBdd()->prepare('INSERT INTO user ( username,email,password,create_time,role,isValid,linkValid) VALUES (:pseudo,:mail,:password,current_timestamp(),0,0,:key)');
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':key', $key, PDO::PARAM_INT);
        $req->execute();
        $isAdded = ($req->rowCount() > 0);
        $req->closeCursor();
        return $isAdded;
    }
}
