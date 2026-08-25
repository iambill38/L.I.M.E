<?php
session_start();

header('Content-Type: application/json');

require_once __DIR__ . '/../src/config/database.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'loggedIn' => false
    ]);
    exit();
}

$userId = $_SESSION['user_id'];
$role = $_SESSION['role'] ?? '';
$email = $_SESSION['email'] ?? '';

$firstName = $_SESSION['first_name'] ?? '';
$surname = $_SESSION['surname'] ?? '';

/*
 * If the name is missing from the session,
 * retrieve it from the database.
 */
if ($role === 'student' && $firstName === '') {

    $stmt = $pdo->prepare("
        SELECT first_name, surname
        FROM student
        WHERE user_id = ?
    ");

    $stmt->execute([$userId]);
    $student = $stmt->fetch();

    if ($student) {
        $firstName = $student['first_name'];
        $surname = $student['surname'];

        $_SESSION['first_name'] = $firstName;
        $_SESSION['surname'] = $surname;
    }
}

echo json_encode([
    'loggedIn' => true,
    'user' => [
        'name' => $firstName ?: 'Student',
        'surname' => $surname,
        'email' => $email,
        'role' => $role
    ]
]);