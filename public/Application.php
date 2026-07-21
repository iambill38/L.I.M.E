<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Applications - lime.com</title>
  <style>
    /* ===== FONT IMPORTS ===== */
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap');

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
      
      /* Status colors */
      --status-applied: #4A90E2;
      --status-review: #F5A623;
      --status-accepted: #7ED321;
      --color-danger: #D0021B;

      --font-display: 'Space Grotesk', sans-serif;
      --font-body: 'Inter', sans-serif;

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


    /* ===== TOP NAVIGATION ===== */
    .page-nav {
      position: fixed;
      inset: 0 auto auto 0;
      width: 100%;
      display: flex;
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

    .user-avatar {
      width: 20px;
      height: 30px;
      border-radius: 4px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--color-black);
      font-weight: 700;
      font-size: 0.50rem;
      flex-shrink: 0;
    }

    .user-name {
      font-weight: 200;
      color: var(--color-white);
      font-size: 0.50rem;
      line-height: 1.1;
    }

    .user-status {
      font-size: 0.50rem;
      color: var(--color-grey-med);
      line-height: 1.1;
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

    /* ===== MAIN CONTENT ===== */
    .main-content {
      max-width: 1200px;
      margin: 76px auto 0;
      padding: var(--spacing-lg);
      position: relative;
      z-index: 1;
    }

    .content-header {
      margin-bottom: var(--spacing-xl);
    }

    .page-title {
      font-family: var(--font-display);
      font-size: 2rem;
      font-weight: 700;
      color: var(--color-white);
      margin-bottom: var(--spacing-sm);
      letter-spacing: -0.01em;
    }

    .page-subtitle {
      color: var(--color-grey-med);
      font-size: 0.95rem;
    }

    /* ===== FILTER SECTION ===== */
    .filter-section {
      display: flex;
      gap: var(--spacing-md);
      margin-bottom: var(--spacing-xl);
      flex-wrap: wrap;
      align-items: center;
    }

    .filter-group {
      display: flex;
      gap: var(--spacing-sm);
    }

    .filter-button {
      padding: 0.65rem 1.2rem;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(0, 255, 65, 0.15);
      border-radius: 6px;
      color: var(--color-grey-light);
      font-family: var(--font-body);
      font-size: 0.9rem;
      cursor: pointer;
      transition: all var(--transition);
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      min-height: 40px;
    }

    .filter-button:hover {
      border-color: rgba(0, 255, 65, 0.3);
      background: rgba(0, 255, 65, 0.1);
    }

    .filter-button.active {
      background: var(--color-lime);
      color: var(--color-black);
      border-color: var(--color-lime);
    }

    .filter-button:focus-visible {
      outline: 2px solid var(--color-lime);
      outline-offset: -2px;
    }

    .stats-group {
      display: flex;
      gap: var(--spacing-md);
      margin-left: auto;
    }

    .stat-card {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      padding: var(--spacing-md);
      text-align: center;
      min-width: 120px;
    }

    .stat-value {
      font-family: var(--font-display);
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--color-lime);
      margin-bottom: var(--spacing-xs);
    }

    .stat-label {
      font-size: 0.8rem;
      color: var(--color-grey-med);
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* ===== APPLICATIONS LIST ===== */
    .applications-list {
      display: flex;
      flex-direction: column;
      gap: var(--spacing-lg);
    }

    .application-card {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      padding: var(--spacing-lg);
      transition: all var(--transition);
      display: flex;
      gap: var(--spacing-lg);
      align-items: flex-start;
      position: relative;
    }

    .application-card:hover {
      border-color: rgba(0, 255, 65, 0.3);
      box-shadow: 0 8px 32px rgba(0, 255, 65, 0.12);
    }

    .company-logo {
      width: 70px;
      height: 70px;
      border-radius: 6px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: var(--color-black);
      font-size: 1.3rem;
      flex-shrink: 0;
    }

    .application-info {
      flex: 1;
      min-width: 0;
    }

    .application-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: var(--spacing-md);
      margin-bottom: var(--spacing-sm);
      flex-wrap: wrap;
    }

    .role-info h3 {
      font-family: var(--font-display);
      font-size: 1.2rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-xs);
    }

    .company-info {
      color: var(--color-grey-med);
      font-size: 0.95rem;
    }

    /* ===== STATUS BADGE ===== */
    .status-badge {
      display: inline-flex;
      align-items: center;
      gap: var(--spacing-xs);
      padding: 0.5rem 1rem;
      border-radius: 6px;
      font-size: 0.85rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      white-space: nowrap;
    }

    .status-badge.applied {
      background: rgba(74, 144, 226, 0.15);
      color: var(--status-applied);
      border: 1px solid rgba(74, 144, 226, 0.3);
    }

    .status-badge.review {
      background: rgba(245, 166, 35, 0.15);
      color: var(--status-review);
      border: 1px solid rgba(245, 166, 35, 0.3);
    }

    .status-badge.accepted {
      background: rgba(126, 211, 33, 0.15);
      color: var(--status-accepted);
      border: 1px solid rgba(126, 211, 33, 0.3);
    }


    .status-dot {
      width: 8px;
      height: 8px;
      border-radius: 4px;
      background: currentColor;
    }

    /* ===== APPLICATION DETAILS ===== */
    .application-details {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: var(--spacing-md);
      margin-bottom: var(--spacing-md);
      padding-bottom: var(--spacing-md);
      border-bottom: 1px solid rgba(0, 255, 65, 0.1);
    }

    .detail-item {
      display: flex;
      flex-direction: column;
      gap: var(--spacing-xs);
    }

    .detail-label {
      font-size: 0.75rem;
      color: var(--color-grey-med);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      font-weight: 600;
    }

    .detail-value {
      color: var(--color-grey-light);
      font-size: 0.95rem;
    }

    .detail-value strong {
      color: var(--color-white);
      font-weight: 600;
    }

    /* ===== ACTION BUTTONS ===== */
    .application-actions {
      display: flex;
      gap: var(--spacing-sm);
      flex-wrap: wrap;
    }

    .action-button {
      padding: 0.6rem 1.2rem;
      background: var(--color-lime);
      color: var(--color-black);
      border: none;
      border-radius: 6px;
      font-family: var(--font-display);
      font-weight: 600;
      font-size: 0.85rem;
      cursor: pointer;
      transition: all var(--transition);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      min-height: 38px;
    }

    .action-button:hover {
      background: var(--color-lime-hover);
      transform: translateY(-2px);
    }

    .action-button:focus-visible {
      outline: 2px solid var(--color-lime);
      outline-offset: 2px;
    }

    .action-button-secondary {
      background: transparent;
      color: var(--color-lime);
      border: 1px solid rgba(0, 255, 65, 0.3);
    }

    .action-button-secondary:hover {
      background: rgba(0, 255, 65, 0.1);
      border-color: rgba(0, 255, 65, 0.6);
    }

    .action-button-danger {
      background: transparent;
      color: var(--color-danger);
      border: 1px solid rgba(208, 2, 27, 0.3);
    }

    .action-button-danger:hover {
      background: rgba(208, 2, 27, 0.1);
      border-color: rgba(208, 2, 27, 0.6);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
      text-align: center;
      padding: var(--spacing-xl) var(--spacing-lg);
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
    }

    .empty-state-icon {
      width: 56px;
      height: 56px;
      margin: 0 auto var(--spacing-md);
      color: var(--color-lime);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .empty-state-icon svg {
      width: 100%;
      height: 100%;
    }

    .empty-state-title {
      font-family: var(--font-display);
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-sm);
    }

    .empty-state-text {
      color: var(--color-grey-med);
      margin-bottom: var(--spacing-lg);
    }

    .empty-state-button {
      display: inline-block;
      padding: var(--spacing-md) var(--spacing-lg);
      background: var(--color-lime);
      color: var(--color-black);
      border: none;
      border-radius: 6px;
      font-family: var(--font-display);
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      text-decoration: none;
      transition: all var(--transition);
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .empty-state-button:hover {
      background: var(--color-lime-hover);
      transform: translateY(-2px);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
      .application-card {
        flex-direction: column;
      }

      .application-header {
        flex-direction: column;
      }

      .stats-group {
        margin-left: 0;
        width: 100%;
        justify-content: space-around;
      }

      .stat-card {
        flex: 1;
      }
    }

    @media (max-width: 768px) {
      .main-content {
        padding: var(--spacing-md);
      }

      .page-title {
        font-size: 1.5rem;
      }

      .filter-section {
        flex-direction: column;
        align-items: flex-start;
      }

      .stats-group {
        width: 100%;
        margin-left: 0;
      }

      .application-details {
        grid-template-columns: repeat(2, 1fr);
      }

      .application-actions {
        flex-direction: column;
      }

      .action-button {
        width: 100%;
      }
    }

    @media (max-width: 480px) {
      .main-content {
        padding: var(--spacing-md);
      }

      .page-title {
        font-size: 1.25rem;
      }

      .content-header {
        margin-bottom: var(--spacing-lg);
      }

      .filter-section {
        gap: var(--spacing-sm);
      }

      .filter-button {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
      }

      .stats-group {
        grid-template-columns: repeat(2, 1fr);
      }

      .stat-card {
        padding: var(--spacing-md);
        min-width: 100px;
      }

      .stat-value {
        font-size: 1.5rem;
      }

      .company-logo {
        width: 60px;
        height: 60px;
        font-size: 1.1rem;
      }

      .application-card {
        padding: var(--spacing-md);
        gap: var(--spacing-md);
      }

      .role-info h3 {
        font-size: 1rem;
      }

      .application-details {
        grid-template-columns: 1fr;
        gap: var(--spacing-sm);
        margin-bottom: var(--spacing-sm);
        padding-bottom: var(--spacing-sm);
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
  <link rel="stylesheet" href="assets/css/lime-nav.css">
</head>
<body>
  <div class="lime-bg-image"></div>
  <div class="lime-bg-overlay"></div>

  <div id="lime-nav-root"></div>

 <div class="page-layout">

  <!-- Main Content -->
  <main class="main-content">
    <!-- Header -->
    <div class="content-header">
      <h1 class="page-title">My Applications</h1>
      <p class="page-subtitle">Track your job applications and interview status</p>
    </div>

    <!-- Filter & Stats Section -->
    <div class="filter-section">
      <div class="filter-group">
        <button class="filter-button active" data-filter="all">All</button>
        <button class="filter-button" data-filter="applied">Applied</button>
        <button class="filter-button" data-filter="review">Under Review</button>
        <button class="filter-button" data-filter="accepted">Accepted</button>
      </div>

      <div class="stats-group">
        <div class="stat-card">
          <div class="stat-value" id="totalApplications">0</div>
          <div class="stat-label">Total</div>
        </div>
        <div class="stat-card">
          <div class="stat-value" id="totalAccepted">0</div>
          <div class="stat-label">Accepted</div>
        </div>
        <div class="stat-card">
          <div class="stat-value" id="totalPending">0</div>
          <div class="stat-label">Pending</div>
        </div>
      </div>
    </div>

    <!-- Applications List -->
    <div class="applications-list" id="applicationsList">
      <!-- Applications rendered here by JavaScript -->
    </div>

    <!-- Empty State -->
    <div class="empty-state" id="emptyState" style="display: none;">
      <div class="empty-state-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg></div>
      <h2 class="empty-state-title">No applications yet</h2>
      <p class="empty-state-text">Start applying to jobs and track your progress here</p>
      <a href="LIMESEARCH.html" class="empty-state-button">Browse Jobs</a>
    </div>
  </main>

  <script>
    // Sample applications data (in real app, this would come from backend)
    const sampleApplications = [
      {
        id: 1,
        companyName: "TechCorp",
        companyLogo: "TC",
        role: "Senior Full Stack Engineer",
        location: "San Francisco, CA",
        salary: "$150k - $200k",
        status: "review", // applied, review, accepted
        appliedDate: "2024-12-10",
        lastUpdate: "2024-12-14",
      },
      {
        id: 2,
        companyName: "StartupXYZ",
        companyLogo: "SX",
        role: "Full Stack Intern",
        location: "Remote",
        salary: "$18/hour",
        status: "applied",
        appliedDate: "2024-12-12",
        lastUpdate: "2024-12-12",
      },
      {
        id: 3,
        companyName: "Digital Innovations",
        companyLogo: "DI",
        role: "AI/ML Engineer",
        location: "Boston, MA",
        salary: "$140k - $180k",
        status: "accepted",
        appliedDate: "2024-12-05",
        lastUpdate: "2024-12-13",
      },
    ];

    // State
    let allApplications = [...sampleApplications];
    let currentFilter = "all";

    // Load applications from localStorage
    function loadApplications() {
      const stored = localStorage.getItem("limeApplications");
      if (stored) {
        try {
          allApplications = JSON.parse(stored);
        } catch (e) {
          allApplications = [...sampleApplications];
        }
      }
    }

    // Save applications to localStorage
    function saveApplications() {
      localStorage.setItem("limeApplications", JSON.stringify(allApplications));
    }

    // Get status label
    function getStatusLabel(status) {
      const labels = {
        applied: "Applied",
        review: "Under Review",
        accepted: "Accepted",
      };
      return labels[status] || status;
    }

    // Format date
    function formatDate(dateString) {
      const date = new Date(dateString);
      const today = new Date();
      const diffTime = today - date;
      const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

      if (diffDays === 0) return "Today";
      if (diffDays === 1) return "Yesterday";
      if (diffDays < 7) return `${diffDays} days ago`;
      if (diffDays < 30) return `${Math.floor(diffDays / 7)} weeks ago`;

      return date.toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
        day: "numeric",
      });
    }

    // Render applications
    function renderApplications() {
      const listContainer = document.getElementById("applicationsList");
      const emptyState = document.getElementById("emptyState");

      // Filter applications
      let filtered = allApplications;
      if (currentFilter !== "all") {
        filtered = allApplications.filter((app) => app.status === currentFilter);
      }

      // Sort by applied date (newest first)
      filtered.sort((a, b) => new Date(b.appliedDate) - new Date(a.appliedDate));

      // Update stats
      updateStats();

      // Render
      if (filtered.length === 0) {
        listContainer.style.display = "none";
        emptyState.style.display = "block";
      } else {
        listContainer.style.display = "flex";
        emptyState.style.display = "none";

        listContainer.innerHTML = filtered
          .map(
            (app) => `
          <div class="application-card">
            <div class="company-logo">${app.companyLogo}</div>
            <div class="application-info">
              <div class="application-header">
                <div class="role-info">
                  <h3>${app.role}</h3>
                  <div class="company-info">${app.companyName} • ${app.location}</div>
                </div>
                <div class="status-badge ${app.status}">
                  <span class="status-dot"></span>
                  ${getStatusLabel(app.status)}
                </div>
              </div>

              <div class="application-details">
                <div class="detail-item">
                  <span class="detail-label">Applied</span>
                  <span class="detail-value">${formatDate(app.appliedDate)}</span>
                </div>
                <div class="detail-item">
                  <span class="detail-label">Last Update</span>
                  <span class="detail-value">${formatDate(app.lastUpdate)}</span>
                </div>
                <div class="detail-item">
                  <span class="detail-label">Salary Range</span>
                  <span class="detail-value"><strong>${app.salary}</strong></span>
                </div>
              </div>

              <div class="application-actions">
                <button class="action-button" onclick="handleViewCompany(${app.id})">View Company</button>
                <button class="action-button-secondary" onclick="handleViewRole(${app.id})">View Role</button>
                ${app.status === "applied" || app.status === "review" 
                  ? `<button class="action-button-danger" onclick="handleWithdraw(${app.id})">Withdraw</button>`
                  : ''}
              </div>
            </div>
          </div>
        `
          )
          .join("");

        // Add event listeners for withdraw buttons
        document.querySelectorAll('[onclick*="handleWithdraw"]').forEach((btn) => {
          btn.addEventListener("click", (e) => {
            e.preventDefault();
          });
        });
      }
    }

    // Update statistics
    function updateStats() {
      const total = allApplications.length;
      const accepted = allApplications.filter((a) => a.status === "accepted").length;
      const pending = allApplications.filter(
        (a) => a.status === "applied" || a.status === "review"
      ).length;

      document.getElementById("totalApplications").textContent = total;
      document.getElementById("totalAccepted").textContent = accepted;
      document.getElementById("totalPending").textContent = pending;
    }

    // Add new application
    window.addApplication = function (application) {
      const newApp = {
        id: Math.max(...allApplications.map((a) => a.id), 0) + 1,
        ...application,
        status: "applied",
        appliedDate: new Date().toISOString().split("T")[0],
        lastUpdate: new Date().toISOString().split("T")[0],
      };
      allApplications.push(newApp);
      saveApplications();
      renderApplications();
    };

    // Withdraw application
    window.handleWithdraw = function (id) {
      if (confirm("Are you sure you want to withdraw this application?")) {
        allApplications = allApplications.filter((app) => app.id !== id);
        saveApplications();
        renderApplications();
      }
    };

    // View company
    window.handleViewCompany = function (id) {
      const app = allApplications.find((a) => a.id === id);
      if (app) {
        alert(`Viewing ${app.companyName} company page...`);
        // In a real app, redirect to company page
      }
    };

    // View role
    window.handleViewRole = function (id) {
      const app = allApplications.find((a) => a.id === id);
      if (app) {
        alert(`Viewing ${app.role} role details...`);
        // In a real app, redirect to job details page
      }
    };

    // Filter handler
    document.querySelectorAll(".filter-button").forEach((btn) => {
      btn.addEventListener("click", () => {
        document.querySelectorAll(".filter-button").forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");
        currentFilter = btn.dataset.filter;
        renderApplications();
      });
    });

    // Initialize
    loadApplications();
    renderApplications();
  </script>
  <script src="lime-nav.js"></script>
</body>
</html>