<?php
$title = 'CROFT';
$css = './public/styleIndex.css';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <link href="<?= $css ?>" rel="stylesheet">
    <title><?= $title ?></title>
</head>

<body>
    <nav>
        <a href="./index.php" id="lienlogo"><img src="./public/images/logo_w.png" id="logo"></a>
        <div id="barre"></div>
        <ul>
            <li><a href="./index.php?action=infos">INFOS</a></li>
            <li><a href="./index.php?action=posts">POST</a></li>
            <li><a href="./index.php?action=images">IMAGES</a></li>
        </ul>
    </nav>
</body>