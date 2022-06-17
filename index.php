<?php

require_once('controller.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'infos') {
            require('view/infosView.php');
        } elseif ($_GET['action'] == 'posts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé.');
            }
        } elseif ($_GET['action'] == 'images') {
            listImages();
        } elseif ($_GET['action'] == 'addPost') {
            require('view/addPostView.php');
        } elseif ($_GET['action'] == 'addImage') {
            require('view/addImageView.php');
        } elseif ($_GET['action'] == 'sendPost') {
            if (!empty(strip_tags($_POST['post_author'])) && !empty(strip_tags($_POST['password'])) && !empty(strip_tags($_POST['post_title'])) && !empty(strip_tags($_POST['post_content'])) && !empty($_FILES['post_image'])) {
                addPost(strip_tags($_POST['post_author']), strip_tags($_POST['password']), strip_tags($_POST['post_title']), strip_tags($_POST['post_content']), $_FILES['post_image']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis.');
            }
        } elseif ($_GET['action'] == 'sendImage') {
            if (!empty(strip_tags($_POST['post_author'])) && !empty(strip_tags($_POST['password'])) && !empty(strip_tags($_POST['post_title'])) && !empty($_FILES['post_image'])) {
                addImage(strip_tags($_POST['post_author']), strip_tags($_POST['password']), strip_tags($_POST['post_title']), $_FILES['post_image']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis.');
            }
        }
    } else {
        require('view/indexView.php');
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
