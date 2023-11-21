<?php

$query = 'SELECT * FROM users';
$response = $bdd->query($query);
$users = $response->fetchAll();
$response->closeCursor();

