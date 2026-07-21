<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - L.I.M.E</title>
  <link rel="stylesheet" href="assets/css/lime-nav.css">
  <style>
    /* ===== FONT IMPORTS ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap');

    /* ===== CSS VARIABLES ===== */
    :root {
      --color-black: #0a0a0a;
      --color-navy: #0f1419;
      --color-white: #ffffff;
      --color-grey-light: #e8e8e8;
      --color-grey-med: #8a8a8a;
      --color-lime: #00ff41;
      --color-lime-hover: #00dd38;
      --color-lime-glow: rgba(0, 255, 65, 0.2);
      --color-border: rgba(0, 255, 65, 0.15);

      --font-display: 'Space Grotesk', sans-serif;
      --font-body: 'Inter', sans-serif;
      --font-logo: 'Poppins', sans-serif;

      --spacing-xs: 0.5rem;
      --spacing-sm: 1rem;
      --spacing-md: 1.5rem;
      --spacing-lg: 2rem;
      --spacing-xl: 3rem;

      --transition: 150ms cubic-bezier(0.2, 0, 0.38, 0.9);
    }

    /* ===== RESET ===== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background-color: #0a0a0a;
      color: var(--color-grey-light);
      font-family: var(--font-body);
      font-size: 1rem;
      line-height: 1.6;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      min-height: 100vh;
      position: relative;
      overflow-x: hidden;
    }


    /* ===== LAYOUT ===== */
    .page-nav {
      position: fixed;
      inset: 0 auto auto 0;
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 0.75rem;
      align-items: center;
      padding: 1rem 1.5rem;
      background: rgba(15, 20, 29, 0.92);
      border-bottom: 1px solid var(--color-border);
      backdrop-filter: blur(16px);
      z-index: 20;
    }

    .nav-links {
      display: flex;
      flex-wrap: wrap;
      gap: 0.75rem;
      align-items: center;
    }

    .nav-user {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 0.75rem;
      padding: 0.5rem 0.75rem;
      border-radius: 3px;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid transparent;
      transition: all var(--transition);
    }

    .nav-user:hover {
      border-color: rgba(0, 255, 65, 0.15);
      background: rgba(0, 255, 65, 0.08);
    }

    .page-nav a {
      color: var(--color-grey-light);
      text-decoration: none;
      padding: 0.75rem 1rem;
      border-radius: 3px;
      border: 1px solid transparent;
      transition: all var(--transition);
      font-weight: 600;
      background: rgba(255, 255, 255, 0.03);
    }

    .page-nav a:hover,
    .page-nav a.active {
      color: var(--color-lime);
      background: rgba(0, 255, 65, 0.12);
      border-color: rgba(0, 255, 65, 0.15);
    }

    .dashboard-container {
      display: block;
      margin-top: 76px;
      min-height: calc(100vh - 76px);
      position: relative;
      z-index: 1;
    }

    .sidebar {
      display: none;
    }

    .sidebar-logo {
      font-family: var(--font-logo);
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--color-lime);
      margin-bottom: var(--spacing-xl);
      text-transform: uppercase;
      letter-spacing: -0.02em;
    }

    .nav-menu {
      display: flex;
      flex-direction: column;
      gap: var(--spacing-sm);
      margin-bottom: var(--spacing-xl);
      flex: 1;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: var(--spacing-sm);
      padding: var(--spacing-md);
      color: var(--color-grey-light);
      text-decoration: none;
      border-radius: 6px;
      font-weight: 500;
      transition: all var(--transition);
      cursor: pointer;
      border: 1px solid transparent;
    }

    .nav-link:hover {
      background: rgba(0, 255, 65, 0.1);
      border-color: rgba(0, 255, 65, 0.2);
      color: var(--color-lime);
    }

    .nav-link.active {
      background: rgba(0, 255, 65, 0.15);
      border-color: var(--color-lime);
      color: var(--color-lime);
    }

    .nav-link:focus-visible {
      outline: 2px solid var(--color-lime);
      outline-offset: -2px;
    }

    .nav-icon {
      width: 24px;
      height: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .sidebar-footer {
      border-top: 1px solid var(--color-border);
      padding-top: var(--spacing-md);
      margin-top: auto;
    }

    .user-profile {
      display: flex;
      align-items: center;
      gap: var(--spacing-sm);
      padding: var(--spacing-sm);
      border-radius: 6px;
      cursor: pointer;
      transition: all var(--transition);
    }

    .user-profile:hover {
      background: rgba(0, 255, 65, 0.1);
    }

    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 4px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      color: var(--color-black);
      font-size: 0.9rem;
    }

    .user-info {
      flex: 1;
      min-width: 0;
    }

    .user-name {
      font-weight: 600;
      color: var(--color-white);
      font-size: 0.9rem;
    }

    .user-status {
      font-size: 0.75rem;
      color: var(--color-grey-med);
    }

    /* ===== MAIN CONTENT ===== */
    .main-content {
      grid-column: 2;
      padding: var(--spacing-lg);
      overflow-y: auto;
    }

    /* ===== HEADER ===== */
    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: var(--spacing-xl);
      flex-wrap: wrap;
      gap: var(--spacing-lg);
    }

    .header-title {
      font-family: var(--font-display);
      font-size: 2rem;
      font-weight: 700;
      color: var(--color-white);
      letter-spacing: -0.01em;
    }

    .header-controls {
      display: flex;
      gap: var(--spacing-sm);
      align-items: center;
    }

    .icon-button {
      width: 44px;
      height: 44px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      color: var(--color-grey-light);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all var(--transition);
      position: relative;
    }

    .icon-button:hover {
      background: rgba(0, 255, 65, 0.1);
      border-color: rgba(0, 255, 65, 0.2);
      color: var(--color-lime);
    }

    .icon-button:focus-visible {
      outline: 2px solid var(--color-lime);
      outline-offset: -2px;
    }

    .notification-badge {
      position: absolute;
      top: -4px;
      right: -4px;
      width: 20px;
      height: 20px;
      background: var(--color-lime);
      color: var(--color-black);
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.7rem;
      font-weight: 700;
    }

    /* ===== SECTIONS ===== */
    .section {
      margin-bottom: var(--spacing-xl);
    }

    .section-title {
      font-family: var(--font-display);
      font-size: 1.35rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-lg);
      letter-spacing: -0.01em;
    }

    .section-subtitle {
      font-size: 0.9rem;
      color: var(--color-grey-med);
      margin-bottom: var(--spacing-md);
    }

    /* ===== PORTFOLIO GRID ===== */
    .portfolio-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: var(--spacing-lg);
    }

    .portfolio-card {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      overflow: hidden;
      transition: all var(--transition);
      cursor: pointer;
      position: relative;
    }

    .portfolio-card:hover {
      border-color: rgba(0, 255, 65, 0.3);
      box-shadow: 0 8px 32px rgba(0, 255, 65, 0.12);
      transform: translateY(-4px);
    }

    .portfolio-image {
      width: 100%;
      height: 180px;
      background: linear-gradient(135deg, rgba(0, 255, 65, 0.15), rgba(0, 255, 65, 0.05));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 3rem;
      overflow: hidden;
    }

    .portfolio-content {
      padding: var(--spacing-md);
    }

    .portfolio-title {
      font-family: var(--font-display);
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-xs);
    }

    .portfolio-desc {
      font-size: 0.9rem;
      color: var(--color-grey-med);
      margin-bottom: var(--spacing-md);
      line-height: 1.5;
    }

    .portfolio-meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .portfolio-tag {
      display: inline-block;
      background: rgba(0, 255, 65, 0.1);
      color: var(--color-lime);
      padding: 0.35rem 0.75rem;
      border-radius: 6px;
      font-size: 0.8rem;
      font-weight: 500;
    }

    .portfolio-icon {
      width: 24px;
      height: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--color-lime);
    }

    /* ===== COMPANY GRID ===== */
    .company-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: var(--spacing-lg);
    }

    .company-card {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      padding: var(--spacing-lg);
      transition: all var(--transition);
      cursor: pointer;
      position: relative;
    }

    .company-card:hover {
      border-color: rgba(0, 255, 65, 0.3);
      box-shadow: 0 8px 32px rgba(0, 255, 65, 0.12);
      transform: translateY(-4px);
    }

    .company-logo {
      width: 60px;
      height: 60px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      border-radius: 6px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: var(--color-black);
      margin-bottom: var(--spacing-md);
      font-size: 1.5rem;
    }

    .company-name {
      font-family: var(--font-display);
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-xs);
    }

    .company-industry {
      font-size: 0.85rem;
      color: var(--color-grey-med);
      margin-bottom: var(--spacing-md);
    }

    .company-button {
      width: 100%;
      padding: var(--spacing-sm);
      background: var(--color-lime);
      color: var(--color-black);
      border: none;
      border-radius: 6px;
      font-family: var(--font-display);
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all var(--transition);
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .company-button:hover {
      background: var(--color-lime-hover);
      transform: translateY(-2px);
    }

    .company-button:focus-visible {
      outline: 2px solid var(--color-lime);
      outline-offset: 2px;
    }

    /* ===== NOTIFICATIONS ===== */
    .notifications-panel {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      padding: var(--spacing-lg);
      margin-bottom: var(--spacing-xl);
    }

    .notification-item {
      display: flex;
      gap: var(--spacing-md);
      padding: var(--spacing-md);
      border-bottom: 1px solid rgba(0, 255, 65, 0.1);
      align-items: flex-start;
    }

    .notification-item:last-child {
      border-bottom: none;
    }

    .notification-dot {
      width: 12px;
      height: 12px;
      border-radius: 4px;
      background: var(--color-lime);
      margin-top: 6px;
      flex-shrink: 0;
    }

    .notification-content {
      flex: 1;
    }

    .notification-title {
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-xs);
    }

    .notification-desc {
      font-size: 0.9rem;
      color: var(--color-grey-med);
      line-height: 1.5;
    }

    .notification-time {
      font-size: 0.8rem;
      color: var(--color-grey-med);
      margin-top: var(--spacing-xs);
    }

    /* ===== RESPONSIVE: TABLET (1024px) ===== */
    @media (max-width: 1024px) {
      .dashboard-container {
        grid-template-columns: 1fr;
      }

      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        flex-direction: row;
        align-items: center;
        padding: var(--spacing-md);
        border-right: none;
        border-bottom: 1px solid var(--color-border);
      }

      .sidebar-logo {
        margin-bottom: 0;
        margin-right: var(--spacing-lg);
      }

      .nav-menu {
        flex-direction: row;
        margin-bottom: 0;
        flex: 1;
        gap: var(--spacing-md);
      }

      .nav-link {
        padding: var(--spacing-sm) var(--spacing-md);
        white-space: nowrap;
      }

      .sidebar-footer {
        border-top: none;
        border-left: 1px solid var(--color-border);
        padding-top: 0;
        padding-left: var(--spacing-md);
        margin-top: 0;
        margin-left: auto;
      }

      .main-content {
        grid-column: 1;
        padding: var(--spacing-lg);
      }

      .portfolio-grid {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      }

      .company-grid {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      }
    }

    /* ===== RESPONSIVE: MOBILE (480px) ===== */
    @media (max-width: 480px) {
      .dashboard-container {
        grid-template-columns: 1fr;
      }

      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        flex-direction: column;
        padding: var(--spacing-md);
        border-right: none;
        border-bottom: 1px solid var(--color-border);
      }

      .sidebar-logo {
        font-size: 1.2rem;
        margin-bottom: var(--spacing-md);
        margin-right: 0;
      }

      .nav-menu {
        flex-direction: column;
        width: 100%;
        margin-bottom: var(--spacing-md);
        flex: none;
      }

      .nav-link {
        padding: var(--spacing-sm);
      }

      .sidebar-footer {
        width: 100%;
        border-left: none;
        border-top: 1px solid var(--color-border);
        padding-left: 0;
        padding-top: var(--spacing-md);
        margin-left: 0;
        margin-top: var(--spacing-md);
      }

      .main-content {
        padding: var(--spacing-md);
      }

      .dashboard-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .header-title {
        font-size: 1.5rem;
      }

      .header-controls {
        width: 100%;
      }

      .portfolio-grid,
      .company-grid {
        grid-template-columns: 1fr;
      }

      .notification-item {
        flex-direction: column;
        gap: var(--spacing-sm);
      }

      .notification-dot {
        margin-top: 0;
      }
    }

    /* ===== ACCESSIBILITY ===== */
    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }

      .orb {
        animation: none !important;
      }
    }
  </style>
  <link rel="stylesheet" href="assets/css/lime-background.css">
</head>
<body>
  <div class="lime-bg-image"></div>
  <div class="lime-bg-overlay"></div>

  <div id="lime-nav-root"></div>

  <div class="dashboard-container">
    <!-- Main Content -->
    <main class="main-content">
      <!-- Header -->
      <div class="dashboard-header">
        <h1 class="header-title">Welcome Back</h1>
        <div class="header-controls">
          <a href="LIMENOTIFICATIONS.html" class="icon-button" aria-label="Notifications">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
              <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <div class="notification-badge">3</div>
          </a>
          <a href="LIMESETTINGS.html" class="icon-button" aria-label="Settings">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
              <circle cx="12" cy="12" r="1"></circle>
              <path d="M12 1v6m0 6v6M4.22 4.22l4.24 4.24m3.08 3.08l4.24 4.24M1 12h6m6 0h6m-17.78 7.78l4.24-4.24m3.08-3.08l4.24-4.24"></path>
            </svg>
          </a>
        </div>
      </div>

      <!-- Profile Completeness Section -->
      <div id="dashboardCompletion" style="margin-bottom: 2rem;"></div>

      <!-- Notifications Section -->
      <section class="section">
        <div class="notifications-panel">
          <div class="notification-item">
            <div class="notification-dot"></div>
            <div class="notification-content">
              <div class="notification-title">New opportunity from TechCorp</div>
              <div class="notification-desc">They're interested in your full-stack development projects.</div>
              <div class="notification-time">2 hours ago</div>
            </div>
          </div>
          <div class="notification-item">
            <div class="notification-dot"></div>
            <div class="notification-content">
              <div class="notification-title">Profile viewed by MR UCHE</div>
              <div class="notification-desc">Check them out and see if it's a good fit.</div>
              <div class="notification-time">5 hours ago</div>
            </div>
          </div>
          <div class="notification-item">
            <div class="notification-dot"></div>
            <div class="notification-content">
              <div class="notification-title">Portfolio project featured</div>
              <div class="notification-desc">Your AI Dashboard project got 120 views today.</div>
              <div class="notification-time">1 day ago</div>
            </div>
          </div>
        </div>
      </section>

      <!-- Portfolio Section -->
      <section class="section">
        <h2 class="section-title">Your Portfolio</h2>
        <p class="section-subtitle">Showcase your best work to companies</p>
        <div class="portfolio-grid">
          <article class="portfolio-card">
            <div class="portfolio-image">01</div>
            <div class="portfolio-content">
              <h3 class="portfolio-title">AI Dashboard</h3>
              <p class="portfolio-desc">Real-time analytics dashboard with machine learning insights.</p>
              <div class="portfolio-meta">
                <span class="portfolio-tag">React</span>
                <a href="LIMEPORTFOLIOPROJECTS.html" class="portfolio-icon" aria-label="Open project">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M7 17L17 7M7 7h10v10"></path>
                  </svg>
                </a>
              </div>
            </div>
          </article>

          <article class="portfolio-card">
            <div class="portfolio-image">02</div>
            <div class="portfolio-content">
              <h3 class="portfolio-title">Mobile App</h3>
              <p class="portfolio-desc">Cross-platform mobile application for task management.</p>
              <div class="portfolio-meta">
                <span class="portfolio-tag">Flutter</span>
                <a href="LIMEPORTFOLIOPROJECTS.html" class="portfolio-icon" aria-label="Open project">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M7 17L17 7M7 7h10v10"></path>
                  </svg>
                </a>
              </div>
            </div>
          </article>

          <article class="portfolio-card">
            <div class="portfolio-image">03</div>
            <div class="portfolio-content">
              <h3 class="portfolio-title">E-Commerce Platform</h3>
              <p class="portfolio-desc">Full-stack e-commerce solution with payment integration.</p>
              <div class="portfolio-meta">
                <span class="portfolio-tag">Node.js</span>
                <a href="LIMEPORTFOLIOPROJECTS.html" class="portfolio-icon" aria-label="Open project">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M7 17L17 7M7 7h10v10"></path>
                  </svg>
                </a>
              </div>
            </div>
          </article>

          <article class="portfolio-card">
            <div class="portfolio-image">04</div>
            <div class="portfolio-content">
              <h3 class="portfolio-title">Chatbot System</h3>
              <p class="portfolio-desc">NLP-powered conversational AI chatbot for customer support.</p>
              <div class="portfolio-meta">
                <span class="portfolio-tag">Python</span>
                <a href="LIMEPORTFOLIOPROJECTS.html" class="portfolio-icon" aria-label="Open project">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M7 17L17 7M7 7h10v10"></path>
                  </svg>
                </a>
              </div>
            </div>
          </article>
        </div>
      </section>

      <!-- Companies Section -->
      <section class="section">
        <h2 class="section-title">Top Companies</h2>
        <p class="section-subtitle">Connect with leading organizations</p>
        <div class="company-grid">
          <article class="company-card">
            <div class="company-logo">TC</div>
            <h3 class="company-name">TechCorp</h3>
            <p class="company-industry">Software & SaaS</p>
            <button class="company-button">Connect</button>
          </article>

          <article class="company-card">
            <div class="company-logo">SX</div>
            <h3 class="company-name">Startup Bill Kongolo</h3>
            <p class="company-industry">Fintech</p>
            <button class="company-button">Connect</button>
          </article>

          <article class="company-card">
            <div class="company-logo">DI</div>
            <h3 class="company-name">Digital Innovations</h3>
            <p class="company-industry">AI & ML</p>
            <button class="company-button">Connect</button>
          </article>

          <article class="company-card">
            <div class="company-logo">CB</div>
            <h3 class="company-name">CloudBase</h3>
            <p class="company-industry">Infrastructure</p>
            <button class="company-button">Connect</button>
          </article>

          <article class="company-card">
            <div class="company-logo">VE</div>
            <h3 class="company-name">Vision Enterprise</h3>
            <p class="company-industry">Consulting</p>
            <button class="company-button">Connect</button>
          </article>

          <article class="company-card">
            <div class="company-logo">NX</div>
            <h3 class="company-name">NextGen Labs</h3>
            <p class="company-industry">Research & Dev</p>
            <button class="company-button">Connect</button>
          </article>
        </div>
      </section>
    </main>
  </div>
  <script src="lime-nav.js"></script>
  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>
  <script src="lime-profile-completeness.js"></script>
  <script>
    // Initialize profile completeness widget on dashboard
    renderCompletionWidget('dashboardCompletion', 'compact');
  </script>
</body>
</html>