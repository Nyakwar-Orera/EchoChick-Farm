<?php
// Use environment variables for Docker compatibility
$host = getenv('DB_HOST') ?: 'db'; // Default to 'db' (Docker service name)
$dbname = getenv('DB_NAME') ?: 'poultryfarm';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: 'root';

try {
    // Set DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO attributes
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database '$dbname': " . $e->getMessage());
}
?>
