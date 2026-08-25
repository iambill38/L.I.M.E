<?php
/**
 * Database connection for L-I-M-E
 * Uses PDO so we get prepared statements (protects against SQL Injection).
 */

$host = 'localhost';
$dbname = 'lime_db';
$username = 'root';   // default XAMPP MySQL user
$password = '';        // default XAMPP MySQL password is blank

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    // In production this should log the error instead of showing it directly.
    die("Database connection failed: " . $e->getMessage());
}
