<?php

require_once('Manager.php');

class PostManager extends Manager
{

    public function post($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function listPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM posts WHERE post_enable = 1 ORDER BY post_id DESC');

        return $req;
    }

    public function addPost($author, $title, $date, $content, $image)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts(post_author, post_title, post_date, post_content, post_image, post_enable) VALUES(?, ?, ?, ?, ?, 1)');
        $affectedLines = $post->execute(array($author, $title, $date, $content, $image));

        return $affectedLines;
    }

    public function addImage($author,$title,$image)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts(post_author, post_title, post_image, post_enable) VALUES(?, ?, ?, 0)');
        $affectedLines = $post->execute(array($author,$title,$image));

        return $affectedLines;
    }

    public function listImages(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT post_title, post_image FROM posts ORDER BY post_id DESC');

        return $req;
    }
}
