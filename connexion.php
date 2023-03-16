<?php

require_once('User.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    
<form action="" method="post">
    <label for="name">login</label>
    <input type="text" name="login" id="login" required>

    <label for="password">password</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" name="submit" value="S'inscrire">
</form>


<?php

if (isset($_POST['submit'])) {

    $User = new User($_POST["login"], $_POST["password"], NULL, NULL, NULL);

    $User->connect($_POST['login'], $_POST['password']);

    $User->isConnected();

    header('Location: connexion.php');

}
// var_dump($_SESSION);

?>

</body>
</html>


