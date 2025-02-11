<?php
class Database {
    private $recipes_conn;
    private $users_conn;

    public function __construct() {
        $config = include(__DIR__ . '/../../config.php');

        // Conexión a MySQL (Recetas)
        $this->recipes_conn = new mysqli(
            $config['db_recipes_host'],
            $config['db_recipes_user'],
            $config['db_recipes_pass'],
            $config['db_recipes_name']
        );

        if ($this->recipes_conn->connect_error) {
            die("Error en conexión MySQL: " . $this->recipes_conn->connect_error);
        }

        // Conexión a PostgreSQL (Usuarios)
        $this->users_conn = pg_connect("host={$config['db_users_host']} dbname={$config['db_users_name']} user={$config['db_users_user']} password={$config['db_users_pass']} sslmode=require");

        if (!$this->users_conn) {
            die("Error en conexión PostgreSQL: " . pg_last_error());
        }
    }

    public function getRecipesConnection() {
        return $this->recipes_conn;
    }

    public function getUsersConnection() {
        return $this->users_conn;
    }
}
