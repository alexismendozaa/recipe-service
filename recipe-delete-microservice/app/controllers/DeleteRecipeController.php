<?php

require_once __DIR__ . '/../services/db_service.php';

class DeleteRecipeController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function deleteRecipe($recipe_id) {
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare("DELETE FROM recipes WHERE id = ?");
        $stmt->bind_param("i", $recipe_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode(["message" => "Receta eliminada exitosamente"]);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Receta no encontrada"]);
        }

        $stmt->close();
    }
}
