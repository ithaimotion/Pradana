<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `pradana`");
    echo "Database created or already exists.\n";
    
    // Select database
    $pdo->exec("USE `pradana`");
    
    // Import SQL file
    $sql = file_get_contents(__DIR__ . '/pradana.sql');
    if ($sql !== false) {
        $pdo->exec($sql);
        echo "SQL imported successfully.\n";
    } else {
        echo "Failed to read pradana.sql\n";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
