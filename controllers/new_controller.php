<?php

if (!isset($_SESSION['user']['token']) ){
    $_SESSION['user']['token'] = bin2hex(random_bytes(32));
}

$create = false;

if (isset($_POST['token']) && $_POST['token'] === $_SESSION['user']['token']) {
    if (isset($_POST['title']) && strlen($_POST['title']) <= 20 && strlen($_POST['title']) >= 1) {
        $create = true;
    }
    if (isset($_POST['contents']) && strlen($_POST['contents']) <= 255) {
        $create = true;
    } else {
        $create = false;
    }
}

if ($create) {
    $query = 'INSERT INTO post (title, contents, color, users_id) VALUES ("' . $_POST['title'] . '", "' . $_POST['contents'] . '", "' . $_POST['color'] . '", "' . $_SESSION['user']['id'] . '")';
    $request = $bdd->prepare($query);
    $request->execute();
    header("location: index.php?page=home");
    exit;
}

require './view/new.phtml';
