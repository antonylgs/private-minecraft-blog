<?php

require_once('model/PostManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    // Select and show posts
    $postmanager = new PostManager;
    $posts = $postmanager->listPosts();
    require('view/postsView.php');
}

function post()
{
    $postmanager = new PostManager;
    $post = $postmanager->post($_GET['id']);
    require('view/postView.php');
}

function listImages()
{
    // Select and show posts
    $imagemanager = new PostManager;
    $images = $imagemanager->listImages();
    require('view/imagesView.php');
}

function checkImage($image)
{
    if (isset($image) && $image['error'] == 0) {
        if ($image['size'] <= (1048576 * 10)) {
            $fileInfo = pathinfo($image['name']);
            $extension = strip_tags($fileInfo['extension']);
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            if (in_array($extension, $allowedExtensions)) {
                // Add 1 to imagecounter.txt
                $imagecounter = fopen('imagecounter.txt', 'r+');
                $image_number = fgets($imagecounter);
                $image_number += 1;
                fseek($imagecounter, 0);
                fputs($imagecounter, $image_number);
                fclose($imagecounter);

                move_uploaded_file($image['tmp_name'], 'public/images/' . $image_number . '_' . strip_tags(basename($image['name'])));
                return ('./public/images/' . $image_number . '_' . strip_tags(basename($image['name'])));
            } else {
                throw new Exception('Le format du fichier n\'est pas correct (jpg,jpeg,png).');
            }
        } else {
            throw new Exception('Le fichier est trop gros. (10Mo max)');
        }
    } else {
        throw new Exception('Aucun fichier envoyé.');
    }
}

function checkUser($user, $password)
{
    $usermanager = new UserManager;

    $users = $usermanager->getUsers();

    $author = strtolower($user);

    foreach ($users as $user) {
        if ($user['nickname'] === $author && $user['psw'] === $password) {
            return ($author);
        } else {
            $errorMessage = 'Tu n\'es pas dans la whitelist';
        }
    }

    if (!isset($loggedUser) && isset($errorMessage)) {
        throw new Exception($errorMessage);
    }
}

function addPost($author, $password, $title, $content, $image)
{
    // Check user in whitelist
    $author = checkUser($author, $password);

    // Check image and save it
    $image = checkImage($image);

    // Set date format
    date_default_timezone_set('Europe/Paris');
    $date_en = date('j F. Y');
    $jour_en = ['January', 'February', 'March', 'May', 'April', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $jour_fr = ['janv', 'fevr', 'mars', 'avril', 'mai', 'juin', 'juil', 'août', 'sept', 'oct', 'nov', 'dec'];
    $date = str_replace($jour_en, $jour_fr, $date_en);

    // Add post to db
    $postmanager = new PostManager;

    $affectedLines = $postmanager->addPost($author, $title, $date, $content, $image);

    // Check if post was added to db
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un post.');
    } else {
        header('Location: ./index.php?action=posts');
    }
}

function addImage($author, $password, $title, $image)
{
    // Check user in whitelist
    $author = checkUser($author, $password);

    // Check image and save it
    $image = checkImage($image);

    // Add image to db
    $imagemanager = new PostManager;

    $affectedLines = $imagemanager->addImage($author, $title, $image);

    // Check if image was added to db
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter une image.');
    } else {
        header('Location: ./index.php?action=images');
    }
}
