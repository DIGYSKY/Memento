<?php
session_start();
session_unset();
session_destroy();

$_GET['page'] = 'home';
header("Location: ../index.php");
exit();