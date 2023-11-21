<?php

if ($_SESSION['user']['conected']) {
    require './view/myaccont.phtml';
} else {
    require './view/register.phtml';
}