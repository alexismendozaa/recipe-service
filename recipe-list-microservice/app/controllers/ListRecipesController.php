<?php

require_once __DIR__ . '/../services/db_service.php';
require_once __DIR__ . '/../models/Recipe.php';

class ListRecipesController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getRecipes() {
        $connection = $this->db->getConnection();
        $query = "SELECT id, title, ingredients, instructions, created_at FROM recipes ORDER BY created_at DESC";
        $result = $connection->query($query);

        $recipes = [];
        while ($row = $result->fetch_assoc()) {
            $recipes[] = new Recipe(
                $row['id'],
                $row['title'],
                $row['ingredients'],
                $row['instructions'],
                $row['created_at']
            );
        }

        header('Content-Type: application/json');
        echo json_encode($recipes);
    }
}
