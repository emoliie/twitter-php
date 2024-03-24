<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'supprimer') {
    $userDelete = [
        'id' => $_POST['suppr']
    ];

    $request = $database->prepare('DELETE FROM user WHERE id = :id');
    $request->execute($userDelete);
}
