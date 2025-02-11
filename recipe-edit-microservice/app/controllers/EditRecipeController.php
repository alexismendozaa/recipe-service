<?php

require_once __DIR__ . '/../services/db_service.php';

class EditRecipeController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function editRecipe($data) {
        $query = "UPDATE recipes SET title = ?, ingredients = ?, instructions = ? WHERE id = ?";
        $stmt = $this->db->connection->prepare($query);
        $stmt->bind_param("sssi", $data['title'], $data['ingredients'], $data['instructions'], $data['recipe_id']);
        
        if ($stmt->execute()) {
            echo json_encode(["message" => "Receta actualizada exitosamente."]);
        } else {
            echo json_encode(["error" => "Error al actualizar la receta."]);
        }
    }
}
