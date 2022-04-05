<?php

require_once('classes/ConnectDB.php');
require_once('classes/GetUser.php');

if (isset($_POST)) {
    $getUser = new GetUser(ConnectDB::getDB());
    $success = $getUser->get($_POST['login'], $_POST['player_id'], $_POST['balance']);
    if ($success) {
        header('Location: /?add=1');
    } else {
        header('Location: /?add=0');
    }
}
