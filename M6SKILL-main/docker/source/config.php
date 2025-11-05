<?php 

if ( ! file_exists(__DIR__ . '/../.env')) {
    die('Geen .env bestand gevonden');
}

$envSettings = parse_ini_file(__DIR__ . '/../.env');

define('DB_HOST', (isset($envSettings['DB_HOST'])) ? $envSettings['DB_HOST'] : 'mariadb');
define('DB_USER', (isset($envSettings['DB_USER'])) ? $envSettings['DB_USER'] : 'm6skill_user');
define('DB_PASSWORD', (isset($envSettings['DB_PASSWORD'])) ? $envSettings['DB_PASSWORD'] : 'm6skill_pass');
define('DB_SCHEMA', (isset($envSettings['DB_SCHEMA'])) ? $envSettings['DB_SCHEMA'] : 'm6skill');
define('HOSTNAME', (isset($envSettings['HOSTNAME'])) ? $envSettings['HOSTNAME'] : 'http://localhost:88/');
define('SOURCE_ROOT', (isset($envSettings['SOURCE_ROOT'])) ? $envSettings['SOURCE_ROOT'] : '/var/www/html/source/');