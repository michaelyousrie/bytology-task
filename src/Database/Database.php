<?php

namespace Bytology\Database;

use PDO;
use PDOException;
use Bytology\Helpers\Env;

class Database
{
    private $username;
    private $password;
    private $host;
    private $port;
    private $db;
    private $conn;

    public function __construct(string $host = null, string $username = null, string $password = null, string $db = null, int $port = null)
    {
        $this->host = $host ?: Env::get('DB_HOST');
        $this->username = $username ?: Env::get('DB_USERNAME');
        $this->password = $password ?: Env::get('DB_PASSWORD');
        $this->db = $db ?: Env::get('DB_NAME');
        $this->port = $port ?: Env::get('DB_PORT');

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db};port={$this->port}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error("Database connection failed with message: " . $e->getMessage());
            die;
        }
    }

    public function query(string $query)
    {
        try {
            $results = $this->conn->query($query);
        } catch (PDOException $e) {
            error("{$e->getMessage()}");
            die;
        }

        return $results;
    }

    public function insert(string $table, array $data)
    {
        $sql = "INSERT INTO `{$table}` SET ";

        foreach ($data as $key => $value) {
            $sql .= "`{$key}`='{$value}',";
        }
        $sql = rtrim($sql, ',');
        $sql .= ";";

        return $this->query($sql);
    }

    public function fetch(string $table, $num = 5)
    {
        $sql = "SELECT * FROM `{$table}` ORDER BY `created_at` DESC LIMIT {$num}";

        return $this->query($sql)->fetchAll();
    }
}
