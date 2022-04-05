<?php

require_once('classes/ConnectDB.php');
require_once('classes/DeletePlayer.php');

if ($_GET) {
    print_r($_GET);
    $deletePlayer = new DeletePlayer(ConnectDB::getDB());
    $success = $deletePlayer->delete($_GET['id']);
    if ($success) {
        header('Location: /?delete=1');
    } else {
        header('Location: /?delete=0');
    }
}
