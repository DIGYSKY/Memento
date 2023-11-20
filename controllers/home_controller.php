<?php

$query = 'SELECT * FROM post ORDER BY modified_at ASC';
$response = $bdd->query($query);
$datas = $response->fetchAll();

function tab_post($datas) {
    for ($i=0; $i < count($datas); $i++) {
        if ($datas[$i]['color'] != null) {
            $color = $datas[$i]['color'];
        } else {
            $color = 'black';
        }
        echo '<div>';
        echo '<p class"' . $i . '-title">' . $datas[$i]['title'] . '</p>';
        echo '<br>';
        echo '<p style="color: ' . $color . '">' . $datas[$i]['contents'] . '</p>';
        echo '<br>';
        echo '</div>';
    }
}

require './view/home.phtml';