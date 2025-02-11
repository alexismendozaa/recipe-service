<?php
require_once __DIR__ . '/../controllers/CreateRecipeController.php';

$controller = new CreateRecipeController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $response = $controller->createRecipe($data);
    
    http_response_code($response['status']);
    echo json_encode($response);
}
