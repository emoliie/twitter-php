<?php

session_start();

require 'database.php';

$request = $database->prepare('SELECT * FROM `tweet` INNER JOIN `user` ON tweet.user_id = user.id ORDER BY tweet.createdAt DESC'); //ne pas oublier twwet. pour spécifier quelle colonne car les deux bdd ont la meme colonne createdAt
$request->execute();
$tweets = $request->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'addTweet') {

    if ($_POST['content'] != '') {
        $newTweet = [
            'user_id' => $_SESSION['id'],
            'content' => $_POST['content']
        ];

        $request = $database->prepare("INSERT INTO tweet(content, user_id) VALUES (:content, :user_id)");

        if ($request->execute($newTweet)) {
            echo "Nouveau Tweet posté";
            header('Refresh:0');
        } else {
            echo "Tweet non posté";
        }
    } else {
        echo "Formulaire incomplet";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'searchTweet') {

    if ($_POST['search'] != '') {
        $data = [
            'search' => $_POST['search']
        ];
        $request = $database->prepare("SELECT * FROM `tweet` INNER JOIN `user` ON tweet.user_id = user.id WHERE content like '%" . $data["search"] . "%' ORDER BY tweet.createdAt DESC");
        $request->execute();
        $tweets = $request->fetchAll(PDO::FETCH_ASSOC);
    }
}

//var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <h1>Bienvenu(e) <?php echo $_SESSION['name'] ?> !</h1>

    <div class="bloc">
        <form action="" method="POST">
            <input type="hidden" name="form" value="searchTweet">

            <input type="text" name="search" id="search" placeholder="Rechercher un tweet">

            <button type="submit">Rechercher</button>

        </form>

        <form action="" method="POST">
            <input type="hidden" name="form" value="addTweet">

            <input type="text" name="content" id="tweet" placeholder="Quoi de neuf ?">

            <button type="submit">Poster</button>
        </form>
    </div>

    <div class="tweets">
        <?php
        foreach ($tweets as $tweet) : ?>

            <form action="delete-tweet.php" method="POST">
                <input type="hidden" name="form" value="supprimer">
                <input type="hidden" name="suppr" value="<?php echo $tweet['id']; ?>">

                <?php echo '<li id="tweet">' . $tweet['name'] . ' ' . $tweet['content'] . ' ' . $tweet['createdAt'] .

                    (($_SESSION["id"] == $tweet["user_id"]) ?
                        ' <button type="submit">Supprimer</button>' : "")
                    . '</li>'; ?>
            </form>

        <?php endforeach; ?>
    </div>


</body>

</html>