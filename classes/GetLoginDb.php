<?php

class GetLoginDb
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get()
    {
        try {
            $results = $this->conn->query("SELECT id, login, player_id, balance FROM jogadores");
            $row = $results->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli $error) {
            return false;
        }
    }
}
