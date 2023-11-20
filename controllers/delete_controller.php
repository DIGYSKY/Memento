<?php

$id = $_GET['idDelete'];
$_GET['idDelete'] = null;

$delete = false;

if ($_SESSION['user']['conected']) {
    if ($_SESSION['user']['type'] == 'su') {
        $delete = true;
    }
    if ($datas[$id]['droit'] == 'all') {
        $delete = true;
    }
    if ($datas[$id]['droit'] == 'me' && $datas[$id]['user_create '] == $_SESSION['user']['name']) {
        $delete = true;
    }
}

if ($delete) {
    $sql = "DELETE FROM post WHERE id = " . $id;
    $response = $bdd->prepare($sql);
    $response->execute();
    $response->closeCursor();
}

$_GET['page'] = 'home';
header("Location: index.php");
exit();