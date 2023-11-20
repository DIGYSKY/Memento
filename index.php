<?php

session_start();

// unset($_SESSION);
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=memento;charset=utf8','root','');
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$aviableRouts = ['home', 'delete'];

$route = 'home';


if (isset($_GET['page']) && in_array($_GET['page'], $aviableRouts)) {
    $route = $_GET['page'];
}

require './view/layout.phtml';