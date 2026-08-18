<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DASHBOARD</title>
  
  <link rel="stylesheet" href="lime-nav.css">
<link rel="stylesheet" href="css/LIMEANALYTICS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="lime-background.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css">
 <<--- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">----->
</head>
<body class="has-lime-nav">
  

<!-- Global Navigation -->
  <div id="lime-nav-root"></div>
  <div class="bg-orbs">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
  </div><main class="main-content">
    <h1 class="page-title">Analytics</h1>
    <p class="page-subtitle">Track your job search performance and insights</p>

    <div id="analyticsCompletion" style="margin-bottom: 1.5rem;"></div>

    <!-- Key Metrics -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-label">Total Applications</div>
        <div class="stat-value" id="totalApps">0</div>
        <div class="stat-change" id="appsChange">+0 this month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Accepted</div>
        <div class="stat-value" id="accepted">0</div>
        <div class="stat-change" id="acceptedChange">0%</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Under Review</div>
        <div class="stat-value" id="pending">0</div>
        <div class="stat-change" id="pendingChange">Waiting</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Rejected</div>
        <div class="stat-value" id="rejected">0</div>
        <div class="stat-change" id="rejectedChange">0%</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Success Rate</div>
        <div class="stat-value" id="successRate">0%</div>
        <div class="stat-change" id="successChange">Tracked</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Avg Days to Response</div>
        <div class="stat-value" id="avgDays">0</div>
        <div class="stat-change" id="avgChange">Days</div>
      </div>
    </div>

    <!-- Charts -->
    <div class="charts-grid">
      <!-- Applications by Status -->
      <div class="chart-card">
        <div class="chart-title">Applications by Status</div>
        <div class="bar-chart" id="statusChart">
        </div>
      </div>

      <!-- Top Companies -->
      <div class="chart-card">
        <div class="chart-title">Top Applied Companies</div>
        <div class="bar-chart" id="companiesChart">
        </div>
      </div>

      <!-- Applications by Role -->
      <div class="chart-card">
        <div class="chart-title">Applications by Role</div>
        <div class="bar-chart" id="rolesChart">
        </div>
      </div>

      <!-- Applications Over Time -->
      <div class="chart-card">
        <div class="chart-title">Application Timeline</div>
        <div class="timeline" id="timelineChart">
        </div>
      </div>
    </div>

    <!-- Insights -->
    <div class="insights-section">
      <div class="section-title">Insights & Recommendations</div>
      <div id="insightsContainer">
      </div>
    </div>
  </main>

  <script src="lime-nav.js"></script>
  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>
  <script src="lime-profile-completeness.js"></script>
  <script>
    renderCompletionWidget('analyticsCompletion', 'compact');

    function loadApplicationData() {
      const stored = localStorage.getItem('limeApplications');
      if (stored) {
        try {
          return JSON.parse(stored);
        } catch (e) {
          return [];
        }
      }
      return [];
    }

    function calculateAnalytics(applications) {
      const stats = {
        total: applications.length,
        accepted: applications.filter(a => a.status === 'Accepted').length,
        pending: applications.filter(a => a.status === 'Under Review').length,
        rejected: applications.filter(a => a.status === 'Rejected').length,
      };

      stats.successRate = stats.total > 0 ? Math.round((stats.accepted / stats.total) * 100) : 0;
      stats.companies = {};
      stats.roles = {};
      stats.dates = {};

      applications.forEach(app => {
        stats.companies[app.companyName] = (stats.companies[app.companyName] || 0) + 1;
        stats.roles[app.role] = (stats.roles[app.role] || 0) + 1;

        const month = new Date(app.appliedDate).toLocaleDateString('en-US', { year: '2-digit', month: 'short' });
        stats.dates[month] = (stats.dates[month] || 0) + 1;
      });

      return stats;
    }

    function renderStatusChart(stats) {
      const container = document.getElementById('statusChart');
      const max = Math.max(stats.accepted, stats.pending, stats.rejected, 1);
      
      const statuses = [
        { label: 'Accepted', value: stats.accepted, color: '#7ED321' },
        { label: 'Under Review', value: stats.pending, color: '#00ff41' },
        { label: 'Rejected', value: stats.rejected, color: '#ff6b6b' },
      ];

      container.innerHTML = statuses.map(s => `
        <div class="bar-item">
          <div class="bar-label">${s.label}</div>
          <div class="bar">
            <div class="bar-fill" style="width: ${(s.value / max) * 100}%; background: ${s.color};">
              <span class="bar-value">${s.value}</span>
            </div>
          </div>
        </div>
      `).join('');
    }

    function renderCompaniesChart(stats) {
      const container = document.getElementById('companiesChart');
      const sorted = Object.entries(stats.companies)
        .sort((a, b) => b[1] - a[1])
        .slice(0, 5);
      
      if (sorted.length === 0) {
        container.innerHTML = '<p style="color: var(--color-grey-med); text-align: center;">No applications yet</p>';
        return;
      }

      const max = sorted[0][1];
      
      container.innerHTML = sorted.map(([company, count]) => `
        <div class="bar-item">
          <div class="bar-label">${company.substring(0, 12)}</div>
          <div class="bar">
            <div class="bar-fill" style="width: ${(count / max) * 100}%;">
              <span class="bar-value">${count}</span>
            </div>
          </div>
        </div>
      `).join('');
    }

    function renderRolesChart(stats) {
      const container = document.getElementById('rolesChart');
      const sorted = Object.entries(stats.roles)
        .sort((a, b) => b[1] - a[1])
        .slice(0, 5);
      
      if (sorted.length === 0) {
        container.innerHTML = '<p style="color: var(--color-grey-med); text-align: center;">No applications yet</p>';
        return;
      }

      const max = sorted[0][1];
      
      container.innerHTML = sorted.map(([role, count]) => `
        <div class="bar-item">
          <div class="bar-label">${role.substring(0, 15)}</div>
          <div class="bar">
            <div class="bar-fill" style="width: ${(count / max) * 100}%;">
              <span class="bar-value">${count}</span>
            </div>
          </div>
        </div>
      `).join('');
    }

    function renderTimelineChart(stats) {
      const container = document.getElementById('timelineChart');
      const sorted = Object.entries(stats.dates)
        .sort((a, b) => new Date(b[0]) - new Date(a[0]))
        .slice(0, 6);
      
      if (sorted.length === 0) {
        container.innerHTML = '<p style="color: var(--color-grey-med); text-align: center;">No applications yet</p>';
        return;
      }

      container.innerHTML = sorted.map(([month, count]) => `
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="timeline-label">${month}</div>
            <div class="timeline-date">${count} application${count !== 1 ? 's' : ''}</div>
          </div>
        </div>
      `).join('');
    }

    function renderInsights(stats, applications) {
      const container = document.getElementById('insightsContainer');
      const insights = [];

      if (stats.total === 0) {
        insights.push({
          title: 'Get Started',
          text: 'You haven\'t applied to any jobs yet. Start exploring opportunities in the Search section.',
        });
      } else {
        if (stats.successRate >= 50) {
          insights.push({
            title: 'Strong Performance',
            text: `Your ${stats.successRate}% acceptance rate is above average. Keep up the great work!`,
          });
        } else if (stats.successRate > 0) {
          insights.push({
            title: 'Acceptance Pattern',
            text: `You have a ${stats.successRate}% acceptance rate. Review your application materials to improve this.`,
          });
        }

        const topCompany = Object.entries(stats.companies).sort((a, b) => b[1] - a[1])[0];
        if (topCompany) {
          insights.push({
            title: 'Focus Area',
            text: `You\'ve applied to ${topCompany[1]} positions at ${topCompany[0]}. Consider diversifying your applications.`,
          });
        }

        if (stats.pending > 0) {
          insights.push({
            title: 'Keep Applying',
            text: `You have ${stats.pending} applications under review. Continue applying to increase your chances.`,
          });
        }

        const avgResponse = stats.total > 0 ? 14 : 0;
        if (avgResponse > 0) {
          insights.push({
            title: 'Response Time',
            text: `Most companies respond within ${avgResponse} days. Be patient and keep track of your applications.`,
          });
        }
      }

      container.innerHTML = insights.map(insight => `
        <div class="insight-item">
          <div class="insight-title">[INSIGHT] ${insight.title}</div>
          <div class="insight-text">${insight.text}</div>
        </div>
      `).join('');
    }

    function updateDashboard() {
      const applications = loadApplicationData();
      const stats = calculateAnalytics(applications);

      // Update metrics
      document.getElementById('totalApps').textContent = stats.total;
      document.getElementById('accepted').textContent = stats.accepted;
      document.getElementById('pending').textContent = stats.pending;
      document.getElementById('rejected').textContent = stats.rejected;
      document.getElementById('successRate').textContent = stats.successRate + '%';
      document.getElementById('avgDays').textContent = '14';

      // Update change indicators
      const thisMonth = applications.filter(a => {
        const now = new Date();
        const appDate = new Date(a.appliedDate);
        return appDate.getMonth() === now.getMonth() && appDate.getFullYear() === now.getFullYear();
      }).length;

      document.getElementById('appsChange').textContent = `+${thisMonth} this month`;
      document.getElementById('acceptedChange').textContent = `${stats.successRate}%`;
      document.getElementById('pendingChange').textContent = `Waiting`;
      document.getElementById('rejectedChange').textContent = `${Math.round((stats.rejected / Math.max(stats.total, 1)) * 100)}%`;
      document.getElementById('successChange').textContent = `Tracked`;
      document.getElementById('avgChange').textContent = `average`;

      // Render charts
      renderStatusChart(stats);
      renderCompaniesChart(stats);
      renderRolesChart(stats);
      renderTimelineChart(stats);

      // Render insights
      renderInsights(stats, applications);
    }

    updateDashboard();
  </script>

  


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

</html>
