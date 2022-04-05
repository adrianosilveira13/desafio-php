<?php

require_once('classes/ConnectDB.php');
require_once('classes/UpdateBalanceDb.php');

if (isset($_GET)) {
    $salvar = new UpdateBalanceDb(ConnectDB::getDB());
    $result = $salvar->update($_GET['id'], $_GET['value']);
    if ($result) {
        header('Location: /?update=1');
    } else {
        header('Location: /?update=0');
    }
}
