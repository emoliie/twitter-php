<?php
try {
    //pdo permet connexion base de donnée
    $database = new PDO('mysql:host=localhost;dbname=Twitter', 'root', 'root'); //type de base de donnée , identifiant , mdp
} catch (PDOException $e) { //si ça ne marche pas on recupere une exception
    die('Site indisponible');
}
