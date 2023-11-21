<?php

$id = $_GET['idDelete'];
$_GET['idDelete'] = null;

$delete = false;

$query = 'SELECT * FROM post ORDER BY modified_at DESC';
$response = $bdd->query($query);
$datas = $response->fetchAll();
$response->closeCursor();

if ($_SESSION['user']['conected']) {
    if ($_SESSION['user']['type'] == 'su') {
        $delete = true;
    } else if ($datas[$id]['droit'] == 'null') {
        $delete = true;
    } else if ($datas[$id]['droit'] == 'me' && $datas[$id]['user_create '] == $_SESSION['user']['name']) {
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