<?php
//GET

echo '<a href="?name=benny&job=none&favorite=dog">Benny</a>';

if (isset($_GET['user_id'])) {
    echo $_GET['user_id'];
}
;
