<?php

require_once("User.php");

var_dump($_SESSION);

if (isset($_SESSION['user'])) { ?>
    <form action="" method="POST">
        <label for="article">article</label>
        <input type="text" name="article" required>
        <input type="submit" name="submit" value="Ajouter">
    </form>

<?php

} else {
    header('Location: connexion.php');
}

?>

<?php

if (isset($_POST['submit'])) {
    $request = $database->prepare("INSERT INTO articles (article, id_utilisateur) VALUES (?,?)");
    $request->execute([$_POST['article'], $_SESSION['user']['id']]);

}