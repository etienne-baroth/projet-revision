<?php

require_once("User.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<form action="" method="post">
    <label for="name">login</label>
    <input type="text" name="login" id="login" required>

    <label for="email">email</label>
    <input type="email" name="email" id="email" required>

    <label for="firstname">firstname</label>
    <input type="text" name="firstname" id="firstname" required>

    <label for="lastname">lastname</label>
    <input type="text" name="lastname" id="lastname" required>

    <label for="password">password</label>
    <input type="password" name="password" id="password" required>

    <label for="password">confirm password</label>
    <input type="password" name="password_confirm" id="password" required>

    <input type="submit" name="submit" value="Subscribe">
</form>


<?php

if (isset($_POST['submit'])) {
    if ($_POST['password'] == $_POST['password_confirm']) {

        $User = new User($_POST["login"], $_POST["password"], $_POST["email"], $_POST["firstname"], $_POST["lastname"]);

        $User->register();

        header('Location: connexion.php');

    } else {
        echo "Mauvaise confirmation de mot de passe.";
    }
}

?>

</body>
</html>

