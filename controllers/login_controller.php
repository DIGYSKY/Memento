<?php

require './connexion_controller.php';

session_unset();
session_destroy();
session_start();

if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $erreurEmail = 'Email invalide !';
    $_GET['page'] = 'account';
    header("Location: ../index.php?erreurEmail=" . urlencode($erreurEmail));
    exit();
}

if (!isset($_POST['password']) || $_POST['password'] < 8) {
    $erreurPassword = 'Password invalide ! (8 charactère minimume)';
    header("Location: ../index.php?erreurEmail=" . urlencode($erreurEmail));
    exit();
}

$query = 'SELECT * FROM users';
$response = $bdd->query($query);
$users = $response->fetchAll();
$response->closeCursor();

$arrayKeyUser = -1;

for ($i = 0; $i < count($users); $i++) {
    if ($_POST['email'] == $users[$i]['email']) {
        $arrayKeyUser = $i;
        break;
    } else {
        $arrayKeyUser = -1;
    }
}

if ($arrayKeyUser >= 0) {
    $passwordCheck = md5($_POST['password']);
    if ($passwordCheck == $users[$arrayKeyUser]['password']) {
        $_SESSION['user'] = $users[$arrayKeyUser];
        $_SESSION['user']['conected'] = true;
    } else {
        header("Location: ../index.php?page=account");
        exit();
    }
} else {
    
    header("Location: ../index.php?page=newregister");
    exit();
}

$_GET['page'] = 'home';
header("Location: ../index.php");
exit();