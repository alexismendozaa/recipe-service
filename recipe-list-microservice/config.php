<?php

require_once __DIR__ . '/vendor/autoload.php';

if (!function_exists('getEnvOrDie')) {
    function getEnvOrDie($key) {
        $value = getenv($key);
        if (!$value) {
            die("ERROR: La variable de entorno $key no está definida.");
        }
        return $value;
    }
}

return [
    'db_recipes_host' => getEnvOrDie('DB_RECIPES_HOST'),
    'db_recipes_name' => getEnvOrDie('DB_RECIPES_NAME'),
    'db_recipes_user' => getEnvOrDie('DB_RECIPES_USER'),
    'db_recipes_pass' => getEnvOrDie('DB_RECIPES_PASS'),
    'db_recipes_ssl' => true
];
