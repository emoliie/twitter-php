<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'login') {

    require 'database.php';

    if ($_POST['name'] != '' && $_POST['password'] != '') {
        //on crée un objet/map
        $credentials = [
            //gauche : noms dans la base de donnée, droite : noms dans le form
            'name' => $_POST['name'],
            'password' => $_POST['password']
        ];

        $request = $database->prepare("SELECT * FROM user WHERE name = :name AND password = :password");

        $request->execute($credentials);
        $result = $request->fetch(PDO::FETCH_ASSOC);

        // var_dump($result) ;

        if ($result) {
            echo 'Connecté';

            $_SESSION["id"] = $result["id"];
            $_SESSION["name"] = $result["name"];
            $_SESSION["email"] = $result["email"];

            header('Location: twitter.php');
        } else {
            echo 'Nom ou Mot de passe incorrect';
        }
    } else {
        echo "Formulaire incomplet";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
    <form action="login.php" method="POST" id="login-form">

        <input type="hidden" name="form" value="login">

        <label for="name">Nom</label>
        <input type="text" name="name" id="name">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id=password>

        <button type="submit">Se connecter</button>
    </form>
</body>

</html>