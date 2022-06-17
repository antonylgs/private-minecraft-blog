<?php
$title = 'CROFT - Infos';
$css = './public/styleInfos.css';
?>

<?php ob_start(); ?>
<section class="parametres">
    <h2>PARAMETRES</h2>
    <img src="./public/images/parametres.svg" class="settings">
    <ul>
        <div class="ulblock">
            <li>Difficulté : Difficile</li>
            <li>Map: Vanilla</li>
            <li>Mods: Simple Voice Chat</li>
            <li>Whitelist: Activé</li>
            <li>Version: 1.18.1</li>
            <li>Command block: Désactivé</li>
        </div>
    </ul>
</section>
<section class="parametres">
    <h2>REGLES</h2>
    <img src="./public/images/regles.svg" class="settings">
    <ul>
        <div class="ulblock">
            <li>Constructions réalistes dans le thème médiéval</li>
            <li>Utilisation de glitchs / bugs interdits sauf cas spécifiques utilisés en tant que magie noire
            </li>
            <li>Pas de déconnexion pour faire passer la nuit</li>
            <li>Décoration et background avec un story telling obligatoire pour toute construction de ferme
                automatique</li>
            <li>Les déclarations de guerre doivent être fait via des affiches ou par pigeons voyageurs et acceptés par les deux clans.</li>
            <li>Utilisation d'informations metas interdite in game</li>
            <li>Interdiction de free kill</li>
        </div>
    </ul>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>