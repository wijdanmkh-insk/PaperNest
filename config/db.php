<?php
    require_once(__DIR__ . "/vendor/autoload.php");
    use Dotenv\Dotenv;

    $env = Dotenv::createImmutable(__DIR__);
    $env->load();

    $host = $_ENV['DB_HOST'] ?? 'localhost';
    $user = $_ENV['DB_USER'] ?? 'root';
    $pass = $_ENV['DB_PASS'] ?? '';
    $db   = $_ENV['DB_NAME'] ?? 'papernest';

    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn){
        die("Connection Failed: ". mysqli_connect_error());
    }
?>