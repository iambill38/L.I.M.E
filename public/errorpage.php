<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error - L.I.M.E</title>
  <link rel="stylesheet" href="lime-theme.css">
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="lime-background.css">
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
      min-height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      font-family: 'Inter', sans-serif;
      background: #0F1419;
    }

    .error-container {
      flex: 1;
      width: 100%;
      display: flex;
      flex-direction: column;
    }

    .error-brand {
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

    .error-brand::before {
      content: '';
      position: absolute;
      width: 300px;
      height: 300px;
      background: rgba(207, 224, 231, 0.1);
      border-radius: 50%;
      top: -100px;
      left: -100px;
    }

    .error-brand::after {
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

    .error-content-wrapper {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 3rem;
      background: linear-gradient(180deg, rgba(15, 20, 29, 0.95) 0%, rgba(26, 31, 46, 0.9) 100%);
      backdrop-filter: blur(10px);
    }

    .error-card {
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    .error-code {
      font-size: 5rem;
      font-weight: 700;
      color: #3D5660;
      margin-bottom: 1rem;
      text-transform: uppercase;
    }

    .error-title {
      font-size: 1.75rem;
      font-weight: 700;
      color: #F7FAFC;
      margin-bottom: 1rem;
    }

    .error-description {
      font-size: 1rem;
      color: #D6E4EA;
      margin-bottom: 2rem;
      line-height: 1.6;
    }

    .error-icon {
      font-size: 4rem;
      color: #3D5660;
      margin-bottom: 1rem;
      opacity: 0.7;
    }

    .error-actions {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .error-button {
      padding: 0.85rem 2rem;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 150ms ease;
      font-family: 'Inter', sans-serif;
      text-decoration: none;
      display: inline-block;
      border: none;
    }

    .error-button-primary {
      background: #3D5660;
      color: #F7FAFC;
    }

    .error-button-primary:hover {
      background: #537179;
      box-shadow: 0 8px 24px rgba(83, 113, 121, 0.3);
    }

    .error-button-secondary {
      background: rgba(83, 113, 121, 0.3);
      color: #CFE0E7;
      border: 1px solid rgba(207, 224, 231, 0.2);
    }

    .error-button-secondary:hover {
      background: rgba(83, 113, 121, 0.5);
      border-color: #CFE0E7;
    }

    @media (max-width: 1024px) {
      .error-brand {
        min-height: 250px;
      }

      .brand-logo {
        font-size: 3rem;
      }
    }

    @media (max-width: 640px) {
      .error-code {
        font-size: 3.5rem;
      }

      .error-title {
        font-size: 1.5rem;
      }

      .error-actions {
        flex-direction: column;
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

  <div class="error-container">
    <div class="error-brand">
      <div class="brand-content">
        <div class="brand-logo">L.I.M.E</div>
        <h2 class="brand-title">Oops!</h2>
        <p class="brand-subtitle">Something went wrong. We're working to fix it</p>
      </div>
    </div>

    <div class="error-content-wrapper">
      <div class="error-card">
        <div class="error-icon">
          <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="error-code">Error</div>
        <h1 class="error-title">Page Not Found</h1>
        <p class="error-description">The page you're looking for doesn't exist or has been moved. Let's get you back on track.</p>
        
        <div class="error-actions">
          <a href="login.html" class="error-button error-button-primary">Go to Home</a>
          <a href="search.html" class="error-button error-button-secondary">Browse Jobs</a>
        </div>
      </div>
    </div>
  </div>

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
</body>
</html>
