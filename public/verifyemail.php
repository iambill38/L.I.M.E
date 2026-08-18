<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verify Email - L.I.M.E</title>
  <link rel="stylesheet" href="lime-theme.css" />
  <link rel="stylesheet" href="lime-nav.css" />
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

    body.has-lime-nav .verify-container {
      padding-top: 96px;
    }

    .main-content {
      flex: 1;
    }

    .verify-container {
      width: 100%;
      display: flex;
      flex-direction: column;
      flex: 1;
      min-height: calc(100vh - 96px);
    }

    .verify-brand {
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

    .verify-brand::before {
      content: '';
      position: absolute;
      width: 300px;
      height: 300px;
      background: rgba(207, 224, 231, 0.1);
      border-radius: 50%;
      top: -100px;
      left: -100px;
    }

    .verify-brand::after {
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
      max-width: 520px;
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
      max-width: 340px;
      margin: 0 auto;
    }

    .verify-form-wrapper {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 3rem;
      background: linear-gradient(180deg, rgba(15, 20, 29, 0.95) 0%, rgba(26, 31, 46, 0.9) 100%);
      backdrop-filter: blur(10px);
    }

    .verify-card {
      width: 100%;
      max-width: 420px;
      background: rgba(26, 31, 46, 0.88);
      border: 1px solid rgba(207, 224, 231, 0.15);
      border-radius: 12px;
      padding: 2.5rem;
      backdrop-filter: blur(10px);
    }

    .verify-header {
      margin-bottom: 2rem;
      text-align: center;
    }

    .verify-icon {
      font-size: 3rem;
      color: #3D5660;
      margin-bottom: 1rem;
    }

    .verify-title {
      font-size: 1.75rem;
      font-weight: 700;
      color: #F7FAFC;
      margin-bottom: 0.5rem;
    }

    .verify-subtitle {
      font-size: 0.95rem;
      color: #D6E4EA;
      line-height: 1.6;
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

    .code-inputs {
      display: flex;
      gap: 0.5rem;
      justify-content: center;
    }

    .code-input {
      width: 50px;
      height: 50px;
      text-align: center;
      font-size: 1.5rem;
      font-weight: 600;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(207, 224, 231, 0.2);
      border-radius: 6px;
      color: #F7FAFC;
      font-family: 'Inter', sans-serif;
      transition: all 150ms ease;
    }

    .code-input:focus {
      outline: none;
      background: rgba(255, 255, 255, 0.08);
      border-color: #CFE0E7;
      box-shadow: 0 0 0 3px rgba(207, 224, 231, 0.1);
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

    .verify-footer {
      margin-top: 1.5rem;
      text-align: center;
      font-size: 0.9rem;
      color: #D6E4EA;
    }

    .verify-footer a {
      color: #CFE0E7;
      text-decoration: none;
      font-weight: 600;
      transition: color 150ms ease;
    }

    .verify-footer a:hover {
      color: #F7FAFC;
    }

    @media (max-width: 1024px) {
      .verify-brand {
        min-height: 250px;
      }

      .brand-logo {
        font-size: 3rem;
      }

      .verify-form-wrapper {
        padding: 2.5rem 1.5rem;
      }
    }

    @media (max-width: 640px) {
      .verify-card {
        padding: 1.5rem;
      }

      .verify-title {
        font-size: 1.5rem;
      }

      .code-inputs {
        gap: 0.3rem;
      }

      .code-input {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
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

  <main class="main-content">
    <div class="verify-container">
      <div class="verify-brand">
        <div class="brand-content">
          <div class="brand-logo">L.I.M.E</div>
          <h2 class="brand-title">Verify</h2>
          <p class="brand-subtitle">Complete email verification to access your account</p>
        </div>
      </div>

      <div class="verify-form-wrapper">
        <div class="verify-card">
          <div class="verify-header">
            <div class="verify-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <h1 class="verify-title">Verify Email</h1>
            <p class="verify-subtitle">Enter the 6-digit code sent to your email</p>
          </div>

          <form class="verify-form" method="POST" action="#" novalidate>
            <div class="form-group">
              <div class="code-inputs">
                <input type="text" class="code-input" maxlength="1" required />
                <input type="text" class="code-input" maxlength="1" required />
                <input type="text" class="code-input" maxlength="1" required />
                <input type="text" class="code-input" maxlength="1" required />
                <input type="text" class="code-input" maxlength="1" required />
                <input type="text" class="code-input" maxlength="1" required />
              </div>
            </div>

            <button type="submit" class="submit-button">Verify Email</button>
          </form>

          <div class="verify-footer">
            <p>Didn't receive the code? <a href="#">Resend</a></p>
          </div>
        </div>
      </div>
    </div>
  </main>

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

  <script src="lime-nav.js"></script>
  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>
</body>
</html>
