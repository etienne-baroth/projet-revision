<?php

require_once("User.php");

?>

<form action="" method="post">
    <label for="name">login</label>
    <input type="text" name="login" id="login" value="<?= $_SESSION['user']['login'] ?>" required>

    <label for="email">email</label>
    <input type="email" name="email" id="email" value="<?= $_SESSION['user']['email'] ?>" required>

    <label for="firstname">firstname</label>
    <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['user']['firstname'] ?>" required>

    <label for="lastname">lastname</label>
    <input type="text" name="lastname" id="lastname" value="<?= $_SESSION['user']['lastname'] ?>" required>

    <label for="password">password</label>
    <input type="password" name="password" id="password" required>

    <label for="password">confirm password</label>
    <input type="password" name="password_confirm" id="password" required>

    <input class="button" type="submit" name="submit" value="Confirm">
</form>

<?php


if (isset($_POST['submit'])) {

    if ($_POST['password'] == $_POST['password_confirm']) {

        if ($_POST['password'] == $_SESSION['user']['password']) {

            $user = new User($_POST["login"], $_POST["password"], $_POST["email"], $_POST["firstname"], $_POST["lastname"]);
            $user->Maj($_POST["login"], $_POST["password"], $_POST["email"], $_POST["firstname"], $_POST["lastname"]);
            $_SESSION['user']['login'] = $_POST["login"];
            $_SESSION['user']['email'] = $_POST["email"];
            $_SESSION['user']['firstname'] = $_POST["firstname"];
            $_SESSION['user']['lastname'] = $_POST["lastname"];

            header('Location: profil.php');

        } else {

            echo 'Mot de passe incorrect';
        }

    } else {

        echo 'Confirmation de mot de passe incorrecte';

    }
}