<?php

if (isset($_SESSION['user']['conected']) && $_SESSION['user']['conected']) {
    if ($_SESSION['user']['type'] == 'us') {
        $query = 'SELECT * FROM post WHERE users_id = ' . $_SESSION['user']['id'] .' ORDER BY modified_at ASC';
    } else if ($_SESSION['user']['type'] == 'su') {
        $query = 'SELECT * FROM post ORDER BY modified_at ASC';
    }
    $response = $bdd->query($query);
    $datas = $response->fetchAll();
    $response->closeCursor();
}
function tab_post($datas) {
    for ($i=0; $i < count($datas); $i++) {
        if ($datas[$i]['color'] != null) {
            $color = $datas[$i]['color'];
        } else {
            $color = 'black';
        }
        echo '<div class="post-it">';
        echo '<div class="post-it-title">';
        echo '<p class="title">' . $datas[$i]['title'] . '</p>';
        echo '<a href="?page=delete&idDelete=' . $datas[$i]['id'] . '"><img src="./img/close.png" width="40px" alt="Delete post-it"></a>';
        echo '</div>';
        echo '<p style="color: ' . $color . '">' . nl2br($datas[$i]['contents']) . '</p>';
        echo '</div>';
    }
}

require './view/home.phtml';