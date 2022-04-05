<?php

class AddLoginDb
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function add(array $dados)
    {
        try {
            if (!$dados) {
                throw new Error('Missin Data');
            }

            if (isset($dados['login']) && isset($dados['player_id']) && isset($dados['balance'])) {
                $query = "INSERT INTO jogadores(login, player_id, balance) VALUES(?, ?, ?);";
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('sii', $dados['login'], $dados['player_id'], $dados['balance']);
                $success = $stmt->execute();
                return $success;
            }
        } catch (mysqli $error) {
            return false;
        }
    }
}
