<?php

require_once __DIR__ . '/../controllers/EditRecipeController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller = new EditRecipeController();
    $controller->editRecipe($data);
}
