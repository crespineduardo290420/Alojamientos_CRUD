<?php
// config/config.php

// Definir el entorno (development/production)
define('ENVIRONMENT', 'development');

// Configuración de la URL base
if (ENVIRONMENT == 'development') {
    define('BASE_URL', 'http://localhost/Kodigo/Alojamientos_CRUD/');
} else {
    define('BASE_URL', 'https://tudominio.com'); // Para producción (reemplazar)
}

// Otras configuraciones (de ser necesario)
//define('DB_HOST', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASS', '');
//define('DB_NAME', 'alojamientos_db');