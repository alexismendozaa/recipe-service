<?php

require_once __DIR__ . '/../../config.php';

class Database {
    private $connection;

    public function __construct() {
        $config = require __DIR__ . '/../../config.php';

        $this->connection = new mysqli(
            $config['db_recipes_host'],
            $config['db_recipes_user'],
            $config['db_recipes_pass'],
            $config['db_recipes_name']
        );

        if ($this->connection->connect_error) {
            die("Error de conexión: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
