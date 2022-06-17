<?php
$title = 'CROFT - Erreur';
$css = './public/stylePost.css';
?>

<?php ob_start(); ?>
<div class="container">
    <img src="./public/images/error.svg" id="errorsvg">
    <h2><?= $errorMessage ?></h2>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>