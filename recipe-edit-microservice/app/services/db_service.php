<?php

require_once __DIR__ . '/../../config.php';

class Database {
    public $connection;

    public function __construct() {
        $config = require __DIR__ . '/../../config.php';

        $this->connection = new mysqli(
            $config['db_recipes_host'],
            $config['db_recipes_user'],
            $config['db_recipes_pass'],
            $config['db_recipes_name']
        );

        if ($this->connection->connect_error) {
            die("ERROR: Fallo en la conexión a MySQL: " . $this->connection->connect_error);
        }
    }
}
