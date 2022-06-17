<?php
$title = $post['post_title']." - CROFT";
$css = './public/stylePost.css';
?>

<?php ob_start(); ?>
<div class="container">
    <div class="<?= $post['post_author'] ?>"></div>
    <h2><?= $post['post_title'] ?></h2>
    <h3><?= $post['post_date'] ?></h3>
    <img src="<?= $post['post_image'] ?>" class="parametres">
    <p class="desc"><?= $post['post_content'] ?></p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>