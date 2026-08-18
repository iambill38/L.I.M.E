<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>L.I.M.E - Login</title>
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

    .login-container {
      display: flex;
      width: 100%;
      height: 100vh;
    }

    /* Left side - Branding */
    .login-brand {
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

    .login-brand::before {
      content: '';
      position: absolute;
      width: 300px;
      height: 300px;
      background: rgba(207, 224, 231, 0.1);
      border-radius: 50%;
      top: -100px;
      left: -100px;
    }

    .login-brand::after {
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

    /* Right side - Form */
    .login-form-wrapper {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 3rem;
      background: linear-gradient(180deg, rgba(15, 20, 29, 0.95) 0%, rgba(26, 31, 46, 0.9) 100%);
      backdrop-filter: blur(10px);
    }

    .login-card {
      width: 100%;
      max-width: 400px;
      background: rgba(26, 31, 46, 0.8);
      border: 1px solid rgba(207, 224, 231, 0.15);
      border-radius: 12px;
      padding: 2.5rem;
      backdrop-filter: blur(10px);
    }

    .login-header {
      margin-bottom: 2rem;
      text-align: center;
    }

    .login-title {
      font-size: 1.75rem;
      font-weight: 700;
      color: #F7FAFC;
      margin-bottom: 0.5rem;
    }

    .login-subtitle {
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

    .login-footer {
      margin-top: 1.5rem;
      text-align: center;
      font-size: 0.9rem;
      color: #D6E4EA;
    }

    .login-footer a {
      color: #CFE0E7;
      text-decoration: none;
      font-weight: 600;
      transition: color 150ms ease;
    }

    .login-footer a:hover {
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
      .login-container {
        flex-direction: column;
      }

      .login-brand {
        min-height: 250px;
        padding: 2rem 3rem;
      }

      .brand-logo {
        font-size: 3rem;
      }

      .login-form-wrapper {
        flex: 1;
        min-height: auto;
        padding: 2rem;
      }
    }

    @media (max-width: 640px) {
      .login-card {
        padding: 1.5rem;
      }

      .brand-logo {
        font-size: 2.5rem;
      }

      .login-title {
        font-size: 1.5rem;
      }

      .auth-social {
        flex-direction: column;
      }
    }
  </style>
  <link rel="stylesheet" href="lime-background.css">
</head>
<body>
  <div class="login-container">
    <!-- Left: Branding -->
    <div class="login-brand">
      <div class="brand-content">
        <div class="brand-logo">L.I.M.E</div>
        <h2 class="brand-title">Welcome</h2>
        <p class="brand-subtitle">Connect with top talent and build your professional network</p>
      </div>
    </div>

    <!-- Right: Login Form -->
    <div class="login-form-wrapper">
      <div class="login-card">
        <div class="login-header">
          <h1 class="login-title">Sign In</h1>
          <p class="login-subtitle">Access your professional account</p>
        </div>

        <!-- Social Auth -->
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

        <!-- Divider -->
        <div class="divider-section">
          <div class="divider-line"></div>
          <span class="divider-text">Or</span>
          <div class="divider-line"></div>
        </div>

        <!-- Email Form -->
        <form class="auth-form" method="POST" action="#" novalidate>
          <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input 
              type="email" 
              id="email" 
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
              id="password" 
              name="password" 
              class="form-input" 
              placeholder="Enter your password" 
              required
            >
          </div>

          <button type="submit" class="submit-button">Sign In</button>
        </form>

        <!-- Footer -->
        <div class="login-footer">
          <p>Don't have an account? <a href="signup.html">Create one</a></p>
        </div>
      </div>
    </div>
  </div>

  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>
</body>
</html>
