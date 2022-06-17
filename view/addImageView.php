<?php
$title = 'CROFT - Ajouter une image';
$css = './public/styleAdd.css';
?>
<?php ob_start(); ?>
<form method="post" action="./index.php?action=sendImage" enctype="multipart/form-data">
    <input type="text" name="post_author" placeholder="Votre pseudo" required>
    <input type="password" name="password" placeholder="Votre mot de passe" required>
    <input type="text" name="post_title" placeholder="Titre de l'image" required>
    <input type="file" name="post_image" id="image_annonce" class="inputfile" required>
    <label for="image_annonce">Choisir une image</label>
    <p class="img_ext">(jpg,jpeg,png)</p>
    <button type="submit">Envoyer</button>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>