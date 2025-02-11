<?php

// Asegurar que `autoload.php` se carga correctamente
$autoloadPath = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoloadPath)) {
    die("ERROR: No se encontró vendor/autoload.php. Asegúrate de ejecutar 'composer install'.");
}
require_once $autoloadPath;

// Verificar si las variables existen, si no, mostrar un error claro
function getEnvOrDie($key) {
    $value = getenv($key);
    if (!$value) {
        die("ERROR: La variable de entorno $key no está definida.");
    }
    return $value;
}

return [
    // Base de datos de recetas (MySQL en RDS)
    'db_recipes_host' => getEnvOrDie('DB_RECIPES_HOST'),
    'db_recipes_name' => getEnvOrDie('DB_RECIPES_NAME'),
    'db_recipes_user' => getEnvOrDie('DB_RECIPES_USER'),
    'db_recipes_pass' => getEnvOrDie('DB_RECIPES_PASS'),
    'db_recipes_ssl' => true,

    // Base de datos de usuarios (PostgreSQL en RDS)
    'db_users_host' => getEnvOrDie('DB_USERS_HOST'),
    'db_users_name' => getEnvOrDie('DB_USERS_NAME'),
    'db_users_user' => getEnvOrDie('DB_USERS_USER'),
    'db_users_pass' => getEnvOrDie('DB_USERS_PASS'),
    'db_users_ssl' => true
];
