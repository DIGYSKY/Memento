<?php

require './connexion_controller.php';

session_unset();
session_destroy();
session_start();

$query = 'SELECT * FROM users';
$response = $bdd->query($query);
$users = $response->fetchAll();
$response->closeCursor();

$arrayKeyUser = null;

for ($i = 0; $i < count($users); $i++) {
    if ($_POST['email'] == $users[$i]['email']) {
        $arrayKeyUser = $i;
        break;
    } else {
        $arrayKeyUser = null;
    }
}

var_dump($users);
echo 'session';
var_dump($_SESSION['user']);
var_dump($arrayKeyUser);

if ($arrayKeyUser >= 0) {
    $passwordCheck = md5($_POST['password']);
    if ($passwordCheck == $users[$arrayKeyUser]['password']) {
        $_SESSION['user'] = $users[$arrayKeyUser];
        $_SESSION['user']['conected'] = true;
        echo 'session';
        var_dump($_SESSION['user']);
    }
}
