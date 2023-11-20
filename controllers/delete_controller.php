<?php

$id = $_GET['idDelete'];
$_GET['idDelete'] = null;

if (empty($_SESSION['user']['conected'])) {
    $_GET['page'] = 'home';
    header("Location: index.php");
    exit();
}

$sql = "DELETE FROM post WHERE id = " . $id;
$response = $bdd->prepare($sql);
$response->execute();
$response->closeCursor();

$_GET['page'] = 'home';
header("Location: index.php");
exit();