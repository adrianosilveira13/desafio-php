<?php

class GetUser
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get($login, $player_id, $addBalance)
    {
        try {
            $id = intval($player_id);
            $query = "SELECT * FROM jogadores WHERE player_id=$id";
            $results = $stmt = $this->conn->query($query)->fetch_all();
            if (!empty($results)) {
                $player_id = $results[0][2];
                $balance = intval($addBalance) + intval($results[0][3]);
                $stmt = $this->conn->prepare("UPDATE jogadores SET balance=? WHERE player_id=?");
                $stmt->bind_param('ii', $balance, $id);
                $success = $stmt->execute();
                return $success;
            }
        } catch (mysqli $error) {
            return false;
        }
    }
}
