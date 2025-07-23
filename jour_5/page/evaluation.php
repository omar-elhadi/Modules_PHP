<?php 
$title = "Evaluation";
$css = "./assets/css/evaluation.css";
require_once('./includes/header.php'); 
?>
    <main>
        <?php  $evaluation = ["Module 1" => 10, "Module 2" => 10, "Module 3" => 10, "Module 4" => 10, "Module 5" => 10, "Module 6" => 10, "Module 7" => 10, "Module 8" => 10, "Module 9" => 10, "Module 10" => 10, "Module 12" => 10]; ?>
        <table>
            <tr>
                <th>Module</th>
                <th>Evaluation</th>
            </tr>
            <?php foreach($evaluation as $key => $value): ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
<?php require_once('./includes/footer.php'); ?>