<?php

class ConnectDB
{
    public static function getDB()
    {
        try {
            $conn = new mysqli('localhost', 'root', 'root', 'desafio1');
            return $conn;
        } catch (Exception $error) {
            return $error;
        }
    }
}
