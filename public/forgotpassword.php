<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password - L.I.M.E</title>
  <link rel="stylesheet" href="lime-theme.css" />
  <link rel="stylesheet" href="lime-nav.css" />
  <link rel="stylesheet" href="lime-background.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      width: 100%;
      min-height: 100%;
      font-family: 'Inter', sans-serif;
      background: #0F1419;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .reset-container {
      display: flex;
      flex-direction: column;
      width: 100%;
      flex: 1;
      min-height: calc(100vh - 0px);
    }

    .reset-brand {
      flex: 1;
      background: linear-gradient(135deg, #537179 0%, #3D5660 100%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 3rem;
      color: #F7FAFC;
      position: relative;
      overflow: hidden;
    }

    .reset-brand::before {
      content: '';
      position: absolute;
      width: 300px;
      height: 300px;
      background: rgba(207, 224, 231, 0.1);
      border-radius: 50%;
      top: -100px;
      left: -100px;
    }

    .reset-brand::after {
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
      max-width: 540px;
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
      font-size: 1.75rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: #CFE0E7;
    }

    .brand-subtitle {
      font-size: 1rem;
      color: rgba(207, 224, 231, 0.8);
      line-height: 1.7;
      max-width: 360px;
      margin: 0 auto;
    }

    .reset-form-wrapper {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 3rem 2rem;
      background: linear-gradient(180deg, rgba(15, 20, 29, 0.95) 0%, rgba(26, 31, 46, 0.9) 100%);
      backdrop-filter: blur(10px);
    }

    .reset-card {
      width: 100%;
      max-width: 420px;
      background: rgba(26, 31, 46, 0.88);
      border: 1px solid rgba(207, 224, 231, 0.15);
      border-radius: 16px;
      padding: 2.5rem;
      backdrop-filter: blur(10px);
    }

    .reset-header {
      margin-bottom: 2rem;
      text-align: center;
    }

    .reset-title {
      font-size: 1.75rem;
      font-weight: 700;
      color: #F7FAFC;
      margin-bottom: 0.5rem;
    }

    .reset-subtitle {
      font-size: 0.95rem;
      color: #D6E4EA;
      line-height: 1.6;
    }

    .reset-icon {
      font-size: 3rem;
      color: #3D5660;
      margin-bottom: 1rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-label {
      display: block;
      font-size: 0.9rem;
      font-weight: 600;
      color: #D6E4EA;
      margin-bottom: 0.5rem;
    }

    .form-input {
      width: 100%;
      padding: 0.85rem 1rem;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(207, 224, 231, 0.18);
      border-radius: 8px;
      color: #F7FAFC;
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
      padding: 0.95rem;
      background: #3D5660;
      color: #F7FAFC;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 150ms ease;
    }

    .submit-button:hover {
      background: #537179;
      box-shadow: 0 10px 24px rgba(83, 113, 121, 0.3);
    }

    .reset-footer {
      margin-top: 1.75rem;
      text-align: center;
      font-size: 0.92rem;
      color: #D6E4EA;
    }

    .reset-footer a {
      color: #CFE0E7;
      text-decoration: none;
      font-weight: 600;
    }

    .reset-footer a:hover {
      color: #F7FAFC;
    }

    @media (max-width: 1024px) {
      .reset-brand {
        min-height: 280px;
      }

      .brand-logo {
        font-size: 3.2rem;
      }

      .reset-form-wrapper {
        padding: 2.5rem 1.5rem;
      }
    }

    @media (max-width: 640px) {
      .reset-card {
        padding: 1.8rem;
      }

      .brand-logo {
        font-size: 2.8rem;
      }

      .brand-title {
        font-size: 1.5rem;
      }

      .error-button {
        width: 100%;
      }
    }

    .lime-footer {
      background: rgba(83, 113, 121, 0.8);
      backdrop-filter: blur(10px);
      border-top: 1px solid rgba(207, 224, 231, 0.2);
      padding: 2rem;
    }
  </style>
</head>
<body class="has-lime-nav">
  <div id="lime-nav-root"></div>

  <div class="reset-container">
    <div class="reset-brand">
      <div class="brand-content">
        <div class="brand-logo">L.I.M.E</div>
        <h2 class="brand-title">Recover Account</h2>
        <p class="brand-subtitle">We'll help you get back into your account quickly and securely.</p>
      </div>
    </div>

    <div class="reset-form-wrapper">
      <div class="reset-card">
        <div class="reset-header">
          <div class="reset-icon">
            <i class="fas fa-key"></i>
          </div>
          <h1 class="reset-title">Reset Password</h1>
          <p class="reset-subtitle">Enter your email address and we’ll send you a password reset link.</p>
        </div>

        <form class="reset-form" method="POST" action="#" novalidate>
          <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-input"
              placeholder="you@example.com"
              required
            />
          </div>

          <button type="submit" class="submit-button">Send Reset Link</button>
        </form>

        <div class="reset-footer">
          <p>Remember your password? <a href="login.html">Sign in</a></p>
        </div>
      </div>
    </div>
  </div>

  <script src="lime-nav.js"></script>
  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>

  <footer class="lime-footer">
    <div class="footer-content">
      <div class="footer-section">
        <h4>L.I.M.E</h4>
        <p>Connecting talent with opportunity</p>
      </div>
      <div class="footer-section">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="search.html">Search Jobs</a></li>
          <li><a href="profiles.html">My Profile</a></li>
          <li><a href="messages.html">Messages</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h4>Support</h4>
        <ul>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h4>Follow Us</h4>
        <ul>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">LinkedIn</a></li>
          <li><a href="#">GitHub</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 L.I.M.E Platform. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
