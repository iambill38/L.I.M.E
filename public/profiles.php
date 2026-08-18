<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profiles - L.I.M.E</title>
  <link rel="stylesheet" href="lime-theme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="lime-background.css">  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      padding-top: 64px;
    }

    .container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 2rem;
    }

    .header {
      margin-bottom: 3rem;
    }

    .page-title {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }

    .page-description {
      font-size: 1.1rem;
      color: var(--text-secondary);
    }

    .filters-section {
      display: flex;
      gap: 1rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .filter-btn {
      padding: 0.7rem 1.5rem;
      background: rgba(83, 113, 121, 0.3);
      color: var(--text-secondary);
      border: 1px solid rgba(207, 224, 231, 0.2);
      border-radius: 6px;
      cursor: pointer;
      font-weight: 600;
      font-family: 'Inter', sans-serif;
      transition: all 150ms ease;
    }

    .filter-btn:hover,
    .filter-btn.active {
      background: var(--accent);
      color: var(--text-primary);
      border-color: var(--accent);
    }

    .profiles-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .profile-card {
      background: rgba(26, 31, 46, 0.6);
      border: 1px solid rgba(207, 224, 231, 0.1);
      border-radius: 12px;
      padding: 2rem;
      text-align: center;
      transition: all 150ms ease;
    }

    .profile-card:hover {
      background: rgba(26, 31, 46, 0.8);
      border-color: rgba(207, 224, 231, 0.2);
      transform: translateY(-4px);
      box-shadow: 0 8px 24px rgba(83, 113, 121, 0.2);
    }

    .profile-avatar {
      width: 100px;
      height: 100px;
      margin: 0 auto 1.5rem;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--accent), rgba(83, 113, 121, 0.6));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      font-weight: 700;
      color: var(--text-primary);
    }

    .profile-name {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }

    .profile-title {
      font-size: 1rem;
      color: var(--open-skies);
      font-weight: 600;
      margin-bottom: 0.5rem;
    }

    .profile-company {
      font-size: 0.9rem;
      color: var(--text-secondary);
      margin-bottom: 1rem;
    }

    .profile-description {
      font-size: 0.95rem;
      color: var(--text-secondary);
      line-height: 1.6;
      margin-bottom: 1.5rem;
      min-height: 60px;
    }

    .profile-actions {
      display: flex;
      gap: 0.75rem;
    }

    .profile-btn {
      flex: 1;
      padding: 0.7rem 1rem;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      font-family: 'Inter', sans-serif;
      transition: all 150ms ease;
    }

    .profile-btn-primary {
      background: var(--accent);
      color: var(--text-primary);
    }

    .profile-btn-primary:hover {
      background: var(--storm-blue);
    }

    .profile-btn-secondary {
      background: rgba(207, 224, 231, 0.1);
      color: var(--open-skies);
      border: 1px solid rgba(207, 224, 231, 0.25);
    }

    .profile-btn-secondary:hover {
      background: rgba(207, 224, 231, 0.2);
      border-color: var(--open-skies);
    }

    .empty-state {
      text-align: center;
      padding: 4rem 2rem;
      color: var(--text-secondary);
    }

    .empty-icon {
      font-size: 3rem;
      color: var(--text-muted);
      margin-bottom: 1rem;
    }

    @media (max-width: 1024px) {
      .profiles-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
      }

      .page-title {
        font-size: 2rem;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 1.5rem;
      }

      .profiles-grid {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 1rem;
      }

      .page-title {
        font-size: 1.75rem;
      }

      .profile-card {
        padding: 1.5rem;
      }

      .profile-avatar {
        width: 80px;
        height: 80px;
        font-size: 1.5rem;
      }
    }

    @media (max-width: 600px) {
      .profiles-grid {
        grid-template-columns: 1fr;
      }

      .filters-section {
        flex-direction: column;
      }

      .filter-btn {
        width: 100%;
      }
    }
  </style></head>
<body class="has-lime-nav">
  <div id="lime-nav-root"></div>

  <div class="container">
    <div class="header">
      <h1 class="page-title">Professional Profiles</h1>
      <p class="page-description">Connect with top talent and industry professionals</p>
    </div>

    <div class="filters-section">
      <button class="filter-btn active">All Profiles</button>
      <button class="filter-btn">Designers</button>
      <button class="filter-btn">Developers</button>
      <button class="filter-btn">Managers</button>
      <button class="filter-btn">Available Now</button>
    </div>

    <div class="profiles-grid">
      <div class="profile-card">
        <div class="profile-avatar">JD</div>
        <div class="profile-name">John Developer</div>
        <div class="profile-title">Full Stack Developer</div>
        <div class="profile-company">Tech Corp</div>
        <div class="profile-description">Experienced full-stack developer with expertise in React, Node.js, and cloud technologies</div>
        <div class="profile-actions">
          <button class="profile-btn profile-btn-primary">View Profile</button>
          <button class="profile-btn profile-btn-secondary">Connect</button>
        </div>
      </div>

      <div class="profile-card">
        <div class="profile-avatar">SD</div>
        <div class="profile-name">Sarah Designer</div>
        <div class="profile-title">UI/UX Designer</div>
        <div class="profile-company">Design Studio</div>
        <div class="profile-description">Creative designer specializing in user experience and modern interface design</div>
        <div class="profile-actions">
          <button class="profile-btn profile-btn-primary">View Profile</button>
          <button class="profile-btn profile-btn-secondary">Connect</button>
        </div>
      </div>

      <div class="profile-card">
        <div class="profile-avatar">MM</div>
        <div class="profile-name">Mike Manager</div>
        <div class="profile-title">Product Manager</div>
        <div class="profile-company">Innovation Inc</div>
        <div class="profile-description">Strategic product manager with proven track record in scaling products and leading teams</div>
        <div class="profile-actions">
          <button class="profile-btn profile-btn-primary">View Profile</button>
          <button class="profile-btn profile-btn-secondary">Connect</button>
        </div>
      </div>

      <div class="profile-card">
        <div class="profile-avatar">ES</div>
        <div class="profile-name">Emma Specialist</div>
        <div class="profile-title">Marketing Specialist</div>
        <div class="profile-company">Growth Labs</div>
        <div class="profile-description">Digital marketing expert focused on brand strategy and customer acquisition</div>
        <div class="profile-actions">
          <button class="profile-btn profile-btn-primary">View Profile</button>
          <button class="profile-btn profile-btn-secondary">Connect</button>
        </div>
      </div>

      <div class="profile-card">
        <div class="profile-avatar">RC</div>
        <div class="profile-name">Robert Consultant</div>
        <div class="profile-title">Business Consultant</div>
        <div class="profile-company">Consulting Group</div>
        <div class="profile-description">Experienced consultant specializing in business transformation and organizational development</div>
        <div class="profile-actions">
          <button class="profile-btn profile-btn-primary">View Profile</button>
          <button class="profile-btn profile-btn-secondary">Connect</button>
        </div>
      </div>

      <div class="profile-card">
        <div class="profile-avatar">LW</div>
        <div class="profile-name">Lisa Wang</div>
        <div class="profile-title">Data Scientist</div>
        <div class="profile-company">AI Innovations</div>
        <div class="profile-description">Data science expert with strong background in machine learning and analytics</div>
        <div class="profile-actions">
          <button class="profile-btn profile-btn-primary">View Profile</button>
          <button class="profile-btn profile-btn-secondary">Connect</button>
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

  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>
  <script src="lime-nav.js"></script>
</body>
</html>
