<?php

require_once('classes/ConnectDB.php');
require_once('classes/UpdateBalanceDb.php');

class ReduceBalance
{
    public static function reduce($users, $balanceToReduce)
    {
        try {
            $updateBalance = new UpdateBalanceDb(ConnectDB::getDB());
            foreach ($users as $user) {
                $currentBalance = intval($user[3]);
                if ($currentBalance <= $balanceToReduce) {
                    $balanceToReduce = $balanceToReduce - $currentBalance;
                    $currentBalance = 0;
                } elseif ($currentBalance > $balanceToReduce && $balanceToReduce !== 0) {
                    $currentBalance = $currentBalance - $balanceToReduce;
                    $balanceToReduce = 0;
                }
                $success = $updateBalance->update($user[0], $currentBalance);
            }
            return $success;
        } catch (mysqli $error) {
            return false;
        }
    }
}
