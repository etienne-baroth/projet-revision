<?php
require_once("User.php");

if (isset($_GET['upAndDown'])) {
    if ($_GET['upAndDown'] == "ASC") {
        $upAndDown = "DESC";
    } else if ($_GET['upAndDown'] == "DESC") {
        $upAndDown = "ASC";
    }
} else {
    $upAndDown = "DESC";
}

$request = $database->prepare("SELECT article, utilisateurs.firstname FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id ORDER BY articles.article $upAndDown ");

$request->execute();

$result = $request->fetchAll(PDO::FETCH_ASSOC);

?>

<?php

foreach ($result as $key => $value) { ?>

    <br>
    <?php echo "<strong>Nom de l'article</strong> " . $value['article']; ?>
    <br>
    <?php echo "<strong>Article ajouté par</strong> " . $value['firstname']; ?>
    <br>
<?php
}
?>

<form method="GET">
    <input type="submit" value="<?= $upAndDown ?>" name="upAndDown">
</form>