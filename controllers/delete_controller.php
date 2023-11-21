<?php

$id = $_GET['idDelete'];
$_GET['idDelete'] = null;

$delete = false;

$query = 'SELECT * FROM post';
$response = $bdd->query($query);
$datas = $response->fetchAll();
$response->closeCursor();

for ($i = 0; $i < count($datas); $i++) {
    if ($datas[$i]['id'] == $id) {
        $idDatas = $i;
    }
}

if ($_SESSION['user']['conected']) {
    if ($_SESSION['user']['type'] == 'su') {
        $delete = true;
    } else if ($datas[$idDatas]['users_id'] == $_SESSION['user']['id']) {
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
