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
}
