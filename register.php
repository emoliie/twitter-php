<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'addUser') {

    require 'database.php';

    if ($_POST['name'] != '' && $_POST['email'] != '') {
        $newUser = [
            //gauche : noms dans la base de donnée, droite : noms dans le form
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $request = $database->prepare("INSERT INTO user(name, email, password) VALUES (:name, :email, :password)"); // on ajoute dans la base de donnée

        if ($request->execute($newUser)) {
            echo 'Inscription réussie';
            header('Location: login.php');
        } else {
            echo 'Inscription échouée';
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
    <title>Inscription</title>
</head>

<body>
    <form action="register.php" method="POST">

        <input type="hidden" name="form" value="addUser">

        <label for="name">Nom</label>
        <input type="text" name="name" id="name">

        <label for="email">E-mail</label>
        <input type="text" name="email" id="email">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id=password>

        <button type="submit">S'inscrire</button>

    </form>
</body>

</html>