<?php

require('card.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My memory</title>
</head>

<body>
    <div class="container">
            <form method="post">
                <label for="nbcartes">Choix du nombre de cartes</label>
                <select>
                    <option value="1">4 cartes</option>
                    <option value="2">6 cartes</option>
                    <option value="3">8 cartes</option>
                </select>
                <button type="submit">Commencer la partie</button>
            </form>

    </div>
</body>

<?php

function addNewCard ($add) {
    for ($i = 0; $i < ($add * 2); $i += 2) {
        $imgCardUp = 'img/' . $i . '.jpg';
        $imgCardDown = 'img/backSide.jpg';
        $card[$i] = new Card($i, $imgCardDown, $imgCardUp, false);
        $card[$i + 1] = new Card($i + 1, $imgCardDown, $imgCardUp, false);
    }
    return $card;
}

function shuffle($add, $card) {
    if (empty($_SESSION['order'])) {
        $_SESSION['order'] = [];
        for ($i = 0; $i < ($add * 2); $i++) {
            array_push($_SESSION['order'], $card[$i]);
        }
        shuffle($_SESSION['order']);
    }
    return $_SESSION['order'];
}