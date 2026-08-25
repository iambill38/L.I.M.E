<?php
session_start();
require_once __DIR__ . '/../src/config/database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';

    // Split full name into first name + surname (everything after the first space)
    $nameParts = preg_split('/\s+/', $fullname, 2);
    $firstName = $nameParts[0] ?? '';
    $surname = $nameParts[1] ?? '';

    // --- Validation ---
    if ($fullname === '' || $email === '' || $password === '') {
        $errors[] = "All fields are required.";
    }

    if ($firstName === '' || $surname === '') {
    $errors[] = "Please enter both your first name and surname.";
}
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // --- Check email isn't already registered ---
    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT user_id FROM User WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors[] = "An account with that email already exists.";
        }
    }

    // --- Create the account ---
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // NOTE: role defaults to 'student' for now since the signup form
        // does not yet have a student/company toggle. Ask the frontend
        // team to add one, then read it from $_POST here instead.
        $role = 'student';

        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare("INSERT INTO User (email, password, role) VALUES (?, ?, ?)");
            $stmt->execute([$email, $hashedPassword, $role]);
            $userId = $pdo->lastInsertId();

            $stmt = $pdo->prepare("INSERT INTO Student (user_id, first_name, surname) VALUES (?, ?, ?)");
            $stmt->execute([$userId, $firstName, $surname]);

            $pdo->commit();

            // Log the new user in immediately
            $_SESSION['user_id'] = $userId;
            $_SESSION['role'] = $role;
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $firstName;
            $_SESSION['surname'] = $surname;

            header("Location: studentdashboard.php");
            exit;

        } catch (PDOException $e) {
            $pdo->rollBack();
            $errors[] = "Something went wrong creating your account. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>L.I.M.E - Sign Up</title>
  <link rel="stylesheet" href="lime-theme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    body {
      display: flex;
      font-family: 'Inter', sans-serif;
      background: #0F1419;
    }

    .signup-container {
      display: flex;
      width: 100%;
      height: 100vh;
    }

    .signup-brand {
      flex: 1;
      background: linear-gradient(135deg, #537179 0%, #3D5660 100%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 3rem;
      color: #F7FAFC;
      overflow: hidden;
      position: relative;
    }

    .signup-brand::before {
      content: '';
      position: absolute;
      width: 300px;
      height: 300px;
      background: rgba(207, 224, 231, 0.1);
      border-radius: 50%;
      top: -100px;
      left: -100px;
    }

    .signup-brand::after {
      content: '';
      position: absolute;
      width: 200px;
      height: 200px;
      background: rgba(207, 224, 231, 0.05);
      border-radius: 50%;
      bottom: -50px;
      right: -50px;
    }

    .brand-content {
      position: relative;
      z-index: 1;
      text-align: center;
    }

    .brand-logo {
      font-size: 4rem;
      font-weight: 700;
      letter-spacing: -0.05em;
      color: #CFE0E7;
      margin-bottom: 2rem;
      text-transform: uppercase;
    }

    .brand-title {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: #CFE0E7;
    }

    .brand-subtitle {
      font-size: 0.95rem;
      color: rgba(207, 224, 231, 0.8);
      line-height: 1.6;
      max-width: 300px;
    }

    .signup-form-wrapper {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 3rem;
      background: linear-gradient(180deg, rgba(15, 20, 29, 0.95) 0%, rgba(26, 31, 46, 0.9) 100%);
      backdrop-filter: blur(10px);
      overflow-y: auto;
    }

    .signup-form-wrapper::-webkit-scrollbar {
      width: 8px;
    }

    .signup-form-wrapper::-webkit-scrollbar-track {
      background: rgba(83, 113, 121, 0.1);
    }

    .signup-form-wrapper::-webkit-scrollbar-thumb {
      background: var(--accent);
      border-radius: 4px;
    }

    .signup-card {
      width: 100%;
      max-width: 400px;
      background: rgba(26, 31, 46, 0.8);
      border: 1px solid rgba(207, 224, 231, 0.15);
      border-radius: 12px;
      padding: 2.5rem;
      backdrop-filter: blur(10px);
    }

    .signup-header {
      margin-bottom: 2rem;
      text-align: center;
    }

    .signup-title {
      font-size: 1.75rem;
      font-weight: 700;
      color: #F7FAFC;
      margin-bottom: 0.5rem;
    }

    .signup-subtitle {
      font-size: 0.9rem;
      color: #D6E4EA;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-label {
      display: block;
      font-size: 0.85rem;
      font-weight: 600;
      color: #D6E4EA;
      margin-bottom: 0.5rem;
    }

    .form-input {
      width: 100%;
      padding: 0.75rem 1rem;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(207, 224, 231, 0.2);
      border-radius: 6px;
      color: #F7FAFC;
      font-family: 'Inter', sans-serif;
      font-size: 0.95rem;
      transition: all 150ms ease;
    }

    .form-input::placeholder {
      color: #AFC2CB;
    }

    .form-input:focus {
      outline: none;
      background: rgba(255, 255, 255, 0.08);
      border-color: #CFE0E7;
      box-shadow: 0 0 0 3px rgba(207, 224, 231, 0.1);
    }

    .submit-button {
      width: 100%;
      padding: 0.85rem;
      background: #3D5660;
      color: #F7FAFC;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 150ms ease;
      font-family: 'Inter', sans-serif;
    }

    .submit-button:hover {
      background: #537179;
      box-shadow: 0 8px 24px rgba(83, 113, 121, 0.3);
    }

    .signup-footer {
      margin-top: 1.5rem;
      text-align: center;
      font-size: 0.9rem;
      color: #D6E4EA;
    }

    .signup-footer a {
      color: #CFE0E7;
      text-decoration: none;
      font-weight: 600;
      transition: color 150ms ease;
    }

    .signup-footer a:hover {
      color: #F7FAFC;
    }

    .divider-section {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin: 1.5rem 0;
    }

    .divider-line {
      flex: 1;
      height: 1px;
      background: rgba(207, 224, 231, 0.2);
    }

    .divider-text {
      color: #AFC2CB;
      font-size: 0.9rem;
    }

    .auth-social {
      display: flex;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .auth-button {
      flex: 1;
      padding: 0.75rem;
      background: rgba(83, 113, 121, 0.3);
      border: 1px solid rgba(207, 224, 231, 0.2);
      border-radius: 6px;
      color: #D6E4EA;
      cursor: pointer;
      font-size: 0.85rem;
      font-weight: 500;
      font-family: 'Inter', sans-serif;
      transition: all 150ms ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .auth-button:hover {
      background: rgba(83, 113, 121, 0.5);
      border-color: #CFE0E7;
      color: #CFE0E7;
    }

    .auth-icon {
      width: 16px;
      height: 16px;
    }

    @media (max-width: 1024px) {
      .signup-container {
        flex-direction: column;
      }

      .signup-brand {
        min-height: 250px;
        padding: 2rem 3rem;
      }

      .brand-logo {
        font-size: 3rem;
      }

      .signup-form-wrapper {
        flex: 1;
        min-height: auto;
        padding: 2rem;
      }
    }

    @media (max-width: 640px) {
      .signup-card {
        padding: 1.5rem;
      }

      .brand-logo {
        font-size: 2.5rem;
      }

      .signup-title {
        font-size: 1.5rem;
      }

      .auth-social {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="signup-container">
    <div class="signup-brand">
      <div class="brand-content">
        <div class="brand-logo">L.I.M.E</div>
        <h2 class="brand-title">Join Us</h2>
        <p class="brand-subtitle">Start your professional journey and connect with opportunities</p>
      </div>
    </div>

    <div class="signup-form-wrapper">
      <div class="signup-card">
        <div class="signup-header">
          <h1 class="signup-title">Create Account</h1>
          <p class="signup-subtitle">Build your professional profile</p>
        </div>

        <div class="auth-social">
          <button class="auth-button" aria-label="Continue with LinkedIn">
            <i class="fab fa-linkedin"></i>
            <span>LinkedIn</span>
          </button>
          <button class="auth-button" aria-label="Continue with Google">
            <i class="fab fa-google"></i>
            <span>Google</span>
          </button>
        </div>

        <div class="divider-section">
          <div class="divider-line"></div>
          <span class="divider-text">Or</span>
          <div class="divider-line"></div>
        </div>

        <form class="auth-form" method="POST" action="signup.php" novalidate>
            <?php if (!empty($errors)): ?>
              <div class="form-errors" style="background:#3a1a1a;border:1px solid #ef4444;color:#fecaca;padding:0.75rem 1rem;border-radius:6px;margin-bottom:1rem;">
                <?php foreach ($errors as $error): ?>
                  <p style="margin:0;"><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          <div class="form-group">
            <label for="fullname" class="form-label">Full Name</label>
            <input
              type="text"
              id="fullname" name="fullname"
              name="fullname"
              class="form-input"
              placeholder="John Doe"
              required
            >
          </div>

          <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input
              type="email"
              id="email" name="email"
              name="email"
              class="form-input"
              placeholder="you@example.com"
              required
            >
          </div>

          <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              id="password" name="password"
              name="password"
              class="form-input"
              placeholder="Create a password"
              required
            >
          </div>

          <div class="form-group">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input
              type="password"
              id="confirm-password" name="confirm-password"
              name="confirm-password"
              class="form-input"
              placeholder="Confirm your password"
              required
            >
          </div>

          <button type="submit" class="submit-button">Create Account</button>
        </form>

        <div class="signup-footer">
          <p>Already have an account? <a href="login.php">Sign in</a></p>
          <p>By creating an account, you agree to our <a href="termsandconditions.html">Terms of Service</a> </p>
        </div>
      </div>
    </div>
  </div>

  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>
</body>
</html>
