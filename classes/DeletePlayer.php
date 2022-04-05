<?php

class DeletePlayer
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function delete($id)
    {
        try {
            $success = $this->conn->query("DELETE FROM jogadores WHERE id=$id");
            return $success;
        } catch (mysqli $error) {
            return false;
        }
    }
}
