<?php
$title = 'CROFT - Posts';
$css = './public/stylePosts.css';
?>

<?php ob_start(); ?>
<a href="./index.php?action=addPost" class="addPostButton">Ajouter un post</a>
<?php
while ($data = $posts->fetch()) {
?>
    <div class="container">
        <div class="<?= $data['post_author'] ?>"></div>
        <a href="./index.php?action=post&id=<?= $data['post_id'] ?>">
            <h2><?= $data['post_title'] ?></h2>
        </a>
        <h3><?= $data['post_date'] ?></h3>
        <p class="desc"><?= $data['post_content'] ?></p>
        <img src="<?= $data['post_image'] ?>" class="parametres">
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>