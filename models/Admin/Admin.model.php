<?php
require_once('./models/MainManager.model.php');


class AdminManager extends MainManager
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
    public function getUserData($cd)
    {
        $req = $this->getBdd()->prepare('SELECT * FROM user WHERE email = :mail');
        $req->bindValue(':mail', $cd, PDO::PARAM_STR);
        $req->execute();
        $datas = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function setValidAccount($username, $key)
    {
        $req = $this->getBdd()->prepare('UPDATE user SET isValid = 1, role = 1 WHERE username = :username AND linkValid = :key');
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':key', $key, PDO::PARAM_INT);
        $req->execute();
        $validated = ($req->rowCount() > 0);
        $req->closeCursor();
        return $validated;
    }

    public function setNewMail($mail, $username)
    {
        $req = $this->getBdd()->prepare('UPDATE user SET email = :mail WHERE username = :username');
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();
        $validated = ($req->rowCount() > 0);
        $req->closeCursor();
        return $validated;
    }
    public function setNewPassword($password, $mail)
    {
        $req = $this->getBdd()->prepare('UPDATE user SET password = :password WHERE email = :email');
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->bindValue(':email', $mail, PDO::PARAM_STR);
        $req->execute();
        $validated = ($req->rowCount() > 0);
        $req->closeCursor();
        return $validated;
    }

    public function removeAccount($mail)
    {
        $req = $this->getBdd()->prepare('DELETE user FROM user WHERE email = :email');
        $req->bindValue(':email', $mail, PDO::PARAM_STR);
        $req->execute();
        $validated = ($req->rowCount() > 0);
        $req->closeCursor();
        return $validated;
    }
}
