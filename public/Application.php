<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Applications - lime.com</title>
  
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="lime-background.css">
  <link rel="stylesheet" href="css/LIMEAPPLICATION.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css">
</head>
<body class="has-lime-nav">
  <nav id="lime-nav">
   
  </nav>

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
      <a href="search.html" class="empty-state-button">Browse Jobs</a>
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