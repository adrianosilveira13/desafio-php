<?php

require_once('classes/ConnectDB.php');
require_once('classes/AddLoginDb.php');

if (isset($_POST)) {
    print_r($_POST);
    $conn = ConnectDB::getDB();
    $addPlayer = new AddLoginDb($conn);
    $success = $addPlayer->add($_POST);
    if ($success) {
        header('Location: /?success=1');
    } else {
        header('Location: /?error=0');
    }
}
