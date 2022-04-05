<?php

require_once('classes/ConnectDB.php');
require_once('classes/GetUserByLogin.php');
require_once('classes/ReduceBalance.php');

if ($_POST) {
    $balanceToReduce = intval($_POST['balance']);
    $getUserByLogin = new GetUserByLogin(ConnectDB::getDB());
    $users = $getUserByLogin->getUser($_POST['login']);
    $success = ReduceBalance::reduce($users, $balanceToReduce);
    if ($success) {
        header('Location: /?reduce=1');
    } else {
        header('Location: /?reduce=0');
    }
}
