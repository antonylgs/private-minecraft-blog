<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog_minecraft;charset=utf8', 'root', 'root');
        return $db;
    }
}
