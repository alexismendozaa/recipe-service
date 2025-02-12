<?php

require_once __DIR__ . '/../controllers/EditRecipeController.php';

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller = new EditRecipeController();
    $controller->editRecipe($data);
} else {
    http_response_code(405); // Método no permitido
    echo json_encode(["error" => "Método no permitido. Usa PUT para actualizar."]);
}
