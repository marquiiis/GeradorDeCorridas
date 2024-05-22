<?php
namespace App;

class Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('sqlite:' . __DIR__ . '/../database.sqlite');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->createTable();
    }

    private function createTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS races (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            start_location TEXT,
            end_location TEXT,
            status TEXT
        )");
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
