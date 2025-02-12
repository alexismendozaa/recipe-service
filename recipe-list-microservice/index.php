<?php

$requestUri = $_SERVER['REQUEST_URI'];

if (strpos($requestUri, '/list') === 0) {
    require __DIR__ . '/app/routes/list_routes.php';
} else {
    http_response_code(404);
    echo json_encode(["error" => "Ruta no encontrada"]);
}
