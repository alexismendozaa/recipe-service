<?php

require_once __DIR__ . '/../controllers/ListRecipesController.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new ListRecipesController();
    $controller->getRecipes();
} else {
    http_response_code(405);
    echo json_encode(["error" => "Método no permitido"]);
}
