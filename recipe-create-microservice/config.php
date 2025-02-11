<?php
// Cargar las variables de entorno desde el archivo .env si existe
if (file_exists(__DIR__ . '/.env')) {
    $lines = file(__DIR__ . '/.env');
    foreach ($lines as $line) {
        if (trim($line) !== '' && strpos($line, '=') !== false) {
            putenv(trim($line));
        }
    }
}

return [
    // Base de datos de recetas (MySQL en RDS)
    'db_recipes_host' => getenv('DB_RECIPES_HOST') ?: die("ERROR: DB_RECIPES_HOST no definido."),
    'db_recipes_name' => getenv('DB_RECIPES_NAME') ?: die("ERROR: DB_RECIPES_NAME no definido."),
    'db_recipes_user' => getenv('DB_RECIPES_USER') ?: die("ERROR: DB_RECIPES_USER no definido."),
    'db_recipes_pass' => getenv('DB_RECIPES_PASS') ?: die("ERROR: DB_RECIPES_PASS no definido."),
    'db_recipes_ssl' => true,

    // Base de datos de usuarios (PostgreSQL en RDS)
    'db_users_host' => getenv('DB_USERS_HOST') ?: die("ERROR: DB_USERS_HOST no definido."),
    'db_users_name' => getenv('DB_USERS_NAME') ?: die("ERROR: DB_USERS_NAME no definido."),
    'db_users_user' => getenv('DB_USERS_USER') ?: die("ERROR: DB_USERS_USER no definido."),
    'db_users_pass' => getenv('DB_USERS_PASS') ?: die("ERROR: DB_USERS_PASS no definido."),
    'db_users_ssl' => true
];
