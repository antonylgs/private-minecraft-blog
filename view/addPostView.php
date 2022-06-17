<?php
$title = 'CROFT - Ajouter un post';
$css = './public/styleAdd.css';
?>
<?php ob_start(); ?>
<form method="post" action="./index.php?action=sendPost" enctype="multipart/form-data">
    <input type="text" name="post_author" placeholder="Votre pseudo" required>
    <input type="password" name="password" placeholder="Votre mot de passe" required>
    <input type="text" name="post_title" placeholder="Titre du post" required>
    <textarea name="post_content" cols="50" rows="15" placeholder="Contenu du post" required></textarea>
    <input type="file" name="post_image" id="image_annonce" class="inputfile" required>
    <label for="image_annonce">Choisir une image</label>
    <p class="img_ext">(jpg,jpeg,png)</p>
    <button type="submit">Envoyer</button>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>