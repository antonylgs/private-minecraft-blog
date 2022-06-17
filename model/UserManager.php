<?php

require_once('Manager.php');

Class UserManager extends Manager
{

    public function getUsers(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM users');
        $req->execute();
        $users = $req->fetchAll();

        return $users;
    }
}
