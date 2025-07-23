<?php 
$title = "Module";
$css = "./assets/css/modules.css";
require_once('./includes/header.php'); 
?>
    <main>
        <?php  $evaluation =
         [
            "Module 1" => "Présentation de PHP et Syntaxe de base",
            "Module 2" => "Variables et types de données",
            "Module 3" => "Operateurs et structures conditionnelles",
            "Module 4" => "Boucles et boucles infinies",
            "Module 5" => "Switch et match",
            "Module 6" => "Tableaux et structures de données",
            "Module 7" => "Les fonctions", 
            "Module 8" => "Manipuler les chaînes de caractères et les dates, les principales fonctions de PHP", 
            "Module 9" => "Superglobales, validation et traitement des formulaires",
            "Module 10" => "Les sessions",
            "Module 12" => "Organisation, gestion des fichiers et templating"
            ]; ?>
        <table>
            <ul>
            <?php foreach($evaluation as $key => $value): ?>
                    <div class="module">
                        <li><?= $key ?></li>
                        <li><?= $value ?></li>
                    </div>
                    <?php endforeach; ?>
                </ul>
        </table>
    </main>
<?php require_once('./includes/footer.php'); ?>