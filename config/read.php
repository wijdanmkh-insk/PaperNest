<?php
$envPath = __DIR__ . '/.env'; // Adjust to your actual path

if (!file_exists($envPath)) {
    die(".env file does not exist at: " . $envPath);
}

if (!is_readable($envPath)) {
    die("The .env file exists, but PHP does not have permission to READ it.");
}

echo "Success: The .env file is found and readable by PHP!";
