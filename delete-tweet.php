<?php

require 'twitter.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'supprimer') {
    $tweetDelete = [
        'id' => $_POST['suppr']
    ];

    $request = $database->prepare('DELETE FROM tweet WHERE id = :id');
    $request->execute($tweetDelete);
}
