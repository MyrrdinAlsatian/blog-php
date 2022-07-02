<?php
require_once('./models/MainManager.model.php');


class CommentatorManager extends MainManager
{
    private function getPasswordUser($login)
    {
        $req = $this->getBdd()->prepare('SELECT password FROM user WHERE email = :mail');
        $req->bindValue(':mail', $login, PDO::PARAM_STR);
        $req->execute();
        $userPasswords = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $userPasswords['password'];
    }

    public function isAccountValid($login)
    {
        $req = $this->getBdd()->prepare('SELECT isValid FROM user WHERE email = :mail');
        $req->bindValue(':mail', $login, PDO::PARAM_STR);
        $req->execute();
        $isValid = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return ((int)$isValid['isValid'] === 0 ? false : true);
    }
    public function isCredentialsValid($mail, $password)
    {
        $pwdDB = $this->getPasswordUser($mail);
        return password_verify($password, $pwdDB);
    }
    public function getUtilisateurs()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM user');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
}
