<?php

require './controllers/connexion_controller.php';

$aviableRouts = ['home', 'delete', 'account', 'newregister', 'new'];

$route = 'home';


if (isset($_GET['page']) && in_array($_GET['page'], $aviableRouts)) {
    $route = $_GET['page'];
    if (isset($_SESSION['user']['conected']) && $_GET['page'] == 'account' && $_SESSION['user']['conected']) {
        $route = 'myaccont';
    } else if ($_GET['page'] == 'account') {
        $route = 'register';
    }
}

require './view/layout.phtml';