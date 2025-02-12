<?php

require_once __DIR__ . '/../controllers/DeleteRecipeController.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['recipe_id'])) {
        http_response_code(400);
        echo json_encode(["error" => "El campo 'recipe_id' es requerido"]);
        exit;
    }

    $controller = new DeleteRecipeController();
    $controller->deleteRecipe($data['recipe_id']);
} else {
    http_response_code(405);
    echo json_encode(["error" => "Método no permitido"]);
}
