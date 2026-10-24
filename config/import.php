<?php
    require_once dirname(__DIR__) . '/vendor/autoload.php';
    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->safeLoad();

    $file = "db.sql";
    $host = $_ENV['DB_HOST'] ?? 'localhost';
    $user = $_ENV['DB_USER'] ?? 'root';
    $pass = $_ENV['DB_PASS'] ?? '';
    $db   = $_ENV['DB_NAME'] ?? 'papernest';

    mysqli_connect($host, $user, $pass) or die('Failed connecting to MySQL Server:' . mysqli_connect_error());
    mysqli_select_db($conn, $db) or die('Error selecting MySQL'. mysqli_connect_error());

    $templine = '';
    $lines = file($file);
    foreach ($lines as $line){
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;

        $templine .= $line;
        if (substr(trim($line), -1, 1) == ';')
        {
            mysqli_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_connect_error() . '<br /><br />');
            $templine = '';
        }
        }
        echo "Tables imported successfully";
?>