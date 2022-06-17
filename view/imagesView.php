<?php
$title = 'CROFT - Images';
$css = './public/styleImages.css';
?>

<?php ob_start(); ?>
<a href="./index.php?action=addImage" class="addPostButton">Ajouter une image</a>
<div class="bigContainer">
    <?php
    while ($data = $images->fetch()) {
    ?>
        <div>
            <a href="<?= $data['post_image'] ?>">
                <h2><?= $data['post_title'] ?></h2>
                <img src="<?= $data['post_image'] ?>" class="parametres">
            </a>
        </div>
    <?php
    }
    $images->closeCursor();
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>