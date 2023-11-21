<?php

require './connexion_controller.php';

$query = 'SELECT * FROM users';
$response = $bdd->query($query);
$users = $response->fetchAll();
$response->closeCursor();

// $query = 'SELECT * FROM post';
// $response = $bdd->query($query);
// $datas = $response->fetchAll();
// $response->closeCursor();

var_dump($users);

$arrayKeyPassword = null;

for ($i = 0; $i < count($users); $i++) {
    if ($_POST['email'] == $users[$i]['email']) {
        $arrayKeyPassword = $i;
        break;
    } else {
        $arrayKeyPassword = null;
    }
}

if ($arrayKeyPassword != null) {
    // verifie password
    $passwordCheck = md5($_POST['password']);
    if ($passwordCheck == $users[$arrayKeyPassword]['password']) {

    }
}