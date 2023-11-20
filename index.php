<?php

session_start();

$aviableRouts = ['home'];

$route = 'home';


if (isset($_GET['page']) && in_array($_GET['page'], $aviableRouts)) {
    $route = $_GET['page'];
}

require './view/layout.phtml';