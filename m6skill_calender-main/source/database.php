<?php
// haal de configuratie op door het config.php bestand te laden.
require_once(__DIR__ . '/config.php');

// Maak een database verbinding waarbij je de constanten uit de .env file gebruikt
$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
