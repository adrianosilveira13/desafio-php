<?php

class GetUserByLogin
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUser($login)
    {
        try {
            $results = $this->conn->query("SELECT * FROM jogadores WHERE login='$login'");
            return $results->fetch_all();
        } catch (mysqli $error) {
            return false;
        }
    }
}
