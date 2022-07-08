<?php

require_once("./models/MainManager.model.php");

class VisitorManager extends MainManager
{
    public function getArticles()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM article');
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

    public  function createNewAccount($password, $pseudo, $mail, $key, $role = 0)
    {
        $req = $this->getBdd()->prepare('INSERT INTO user ( username,email,password,create_time,role,isValid,linkValid) VALUES (:pseudo,:mail,:password,current_timestamp(),:role,0,:key)');
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':key', $key, PDO::PARAM_INT);
        $req->bindValue(':role', $role, PDO::PARAM_INT);
        $req->execute();
        $isAdded = ($req->rowCount() > 0);
        $req->closeCursor();
        return $isAdded;
    }
}
