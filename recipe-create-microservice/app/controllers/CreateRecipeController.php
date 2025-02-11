<?php
require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../services/db_service.php';

class CreateRecipeController {
    public function createRecipe($data) {
        if (!isset($data['user_id']) || !isset($data['title']) || !isset($data['ingredients']) || !isset($data['instructions'])) {
            return ['status' => 400, 'message' => 'Todos los campos son requeridos.'];
        }

        $dbService = new Database();
        $usersDb = $dbService->getUsersConnection();
        
        // Verificar si el usuario existe en la base de datos de usuarios
        $query = 'SELECT id FROM "Users" WHERE id = $1';
$result = pg_query_params($usersDb, $query, [$data['user_id']]);


        if (pg_num_rows($result) === 0) {
            return ['status' => 404, 'message' => 'Usuario no encontrado.'];
        }

        $recipesDb = $dbService->getRecipesConnection();
        $recipe = new Recipe($data['user_id'], $data['title'], $data['ingredients'], $data['instructions']);

        if ($recipe->save($recipesDb)) {
            return ['status' => 201, 'message' => 'Receta creada con éxito.'];
        } else {
            return ['status' => 500, 'message' => 'Error al guardar la receta.'];
        }
    }
}
