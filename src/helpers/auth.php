<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// User must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

// Information available to every protected page
$firstName = $_SESSION['first_name'] ?? 'Student';
$surname = $_SESSION['surname'] ?? '';
$email = $_SESSION['email'] ?? '';
$role = $_SESSION['role'] ?? '';

$limeUser = [
    'name' => $firstName,
    'surname' => $surname,
    'email' => $email,
    'role' => $role
];