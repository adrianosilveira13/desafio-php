<?php

class UpdateBalanceDb
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function update($player_id, $value)
    {
        try {
            $id = intval($player_id);
            $value = intval($value);
            $query = "UPDATE jogadores SET balance=? WHERE id=?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('ii', $value, $id);
            $success = $stmt->execute();
            return $success;
        } catch (mysqli $error) {
            return false;
        }
    }
}
