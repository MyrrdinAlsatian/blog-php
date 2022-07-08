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

    public function getAllArticles()
    {
        $req = $this->getBdd()->prepare('SELECT a.id, a.title, a.status, a.created, u.username FROM user u INNER JOIN article a ON a.user_id = u.id');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $data;
    }
}
