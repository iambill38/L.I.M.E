<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Dashboard - L.I.M.E</title>
  <link rel="stylesheet" href="css/companydashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="lime-background.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css"></head>
<body class="has-lime-nav">
  <div id="lime-nav-root"></div>

  <!-- Main Content -->
    <main class="main-content">
      <!-- Page Header -->
      <header class="page-header">
        <div class="header-left">
          <h2 class="page-title">Recruitment Dashboard</h2>
          <p class="page-subtitle">Manage your hiring pipeline and candidate relationships</p>
        </div>
      </header>

      <!-- Dashboard Content -->
      <div class="dashboard-content">
        <!-- Overview Section -->
        <section class="section">
          <h3 class="section-title">Recruitment Overview</h3>
          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                  <polyline points="13 2 13 9 20 9"></polyline>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Active Jobs</p>
                <p class="stat-value">8</p>
                <p class="stat-change">2 new this week</p>
              </div>
            </div>

            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Applications</p>
                <p class="stat-value">127</p>
                <p class="stat-change">+24 this week</p>
              </div>
            </div>

            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="16" y1="2" x2="16" y2="6"></line>
                  <line x1="8" y1="2" x2="8" y2="6"></line>
                  <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Interviews Scheduled</p>
                <p class="stat-value">12</p>
                <p class="stat-change">5 next week</p>
              </div>
            </div>

            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"></path>
                  <path d="M16 12l-4-4-4 4"></path>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Shortlisted</p>
                <p class="stat-value">34</p>
                <p class="stat-change">Ready to interview</p>
              </div>
            </div>

            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"></path>
                  <path d="M12 6v6l4 2"></path>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Hires</p>
                <p class="stat-value">6</p>
                <p class="stat-change">This quarter</p>
              </div>
            </div>

            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Profile Views</p>
                <p class="stat-value">892</p>
                <p class="stat-change">+156 this week</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Two Column Layout -->
        <div class="content-grid">
          <!-- Left Column -->
          <div class="left-column">
            <!-- Recent Applications -->
            <section class="section">
              <div class="section-header">
                <h3 class="section-title">Recent Applicants</h3>
                <a href="#" class="see-all">View All</a>
              </div>

              <div class="applicants-list">
                <div class="applicant-card">
                  <div class="applicant-header">
                    <div class="applicant-photo">
                      <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 80 80'%3E%3Ccircle cx='40' cy='25' r='15' fill='%2300ff41'/%3E%3Cpath d='M10 75 Q10 55 40 55 Q70 55 70 75' fill='%2300ff41'/%3E%3C/svg%3E" alt="Applicant">
                    </div>
                    <div class="applicant-info">
                      <p class="applicant-name">Sarah Johnson</p>
                      <p class="applicant-degree">BSc Computer Science</p>
                      <p class="applicant-university">University of Tech</p>
                    </div>
                  </div>
                  <div class="match-badge">
                    <span class="match-percent">92%</span>
                    <p>Match</p>
                  </div>
                  <div class="applicant-skills">
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">React</span>
                    <span class="skill-tag">Node.js</span>
                  </div>
                  <div class="applicant-actions">
                    <button class="btn btn-secondary">View Profile</button>
                    <button class="btn btn-secondary">Download CV</button>
                    <button class="btn btn-primary">Shortlist</button>
                  </div>
                </div>

                <div class="applicant-card">
                  <div class="applicant-header">
                    <div class="applicant-photo">
                      <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 80 80'%3E%3Ccircle cx='40' cy='25' r='15' fill='%234199ff'/%3E%3Cpath d='M10 75 Q10 55 40 55 Q70 55 70 75' fill='%234199ff'/%3E%3C/svg%3E" alt="Applicant">
                    </div>
                    <div class="applicant-info">
                      <p class="applicant-name">Marcus Chen</p>
                      <p class="applicant-degree">BEng Data Science</p>
                      <p class="applicant-university">Institute of Analytics</p>
                    </div>
                  </div>
                  <div class="match-badge">
                    <span class="match-percent">88%</span>
                    <p>Match</p>
                  </div>
                  <div class="applicant-skills">
                    <span class="skill-tag">Python</span>
                    <span class="skill-tag">SQL</span>
                    <span class="skill-tag">Tableau</span>
                  </div>
                  <div class="applicant-actions">
                    <button class="btn btn-secondary">View Profile</button>
                    <button class="btn btn-secondary">Download CV</button>
                    <button class="btn btn-primary">Shortlist</button>
                  </div>
                </div>

                <div class="applicant-card">
                  <div class="applicant-header">
                    <div class="applicant-photo">
                      <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 80 80'%3E%3Ccircle cx='40' cy='25' r='15' fill='%23ff9900'/%3E%3Cpath d='M10 75 Q10 55 40 55 Q70 55 70 75' fill='%23ff9900'/%3E%3C/svg%3E" alt="Applicant">
                    </div>
                    <div class="applicant-info">
                      <p class="applicant-name">Amara Williams</p>
                      <p class="applicant-degree">BSc Marketing</p>
                      <p class="applicant-university">Business School</p>
                    </div>
                  </div>
                  <div class="match-badge">
                    <span class="match-percent">85%</span>
                    <p>Match</p>
                  </div>
                  <div class="applicant-skills">
                    <span class="skill-tag">Digital Marketing</span>
                    <span class="skill-tag">Content</span>
                    <span class="skill-tag">Analytics</span>
                  </div>
                  <div class="applicant-actions">
                    <button class="btn btn-secondary">View Profile</button>
                    <button class="btn btn-secondary">Download CV</button>
                    <button class="btn btn-primary">Shortlist</button>
                  </div>
                </div>
              </div>
            </section>

            <!-- Hiring Funnel -->
            <section class="section">
              <h3 class="section-title">Recruitment Funnel</h3>
              <div class="funnel-chart">
                <div class="funnel-stage">
                  <div class="funnel-bar" style="width: 100%;">
                    <span class="funnel-label">Applications</span>
                    <span class="funnel-count">127</span>
                  </div>
                </div>
                <div class="funnel-stage">
                  <div class="funnel-bar" style="width: 75%;">
                    <span class="funnel-label">Screened</span>
                    <span class="funnel-count">95</span>
                  </div>
                </div>
                <div class="funnel-stage">
                  <div class="funnel-bar" style="width: 50%;">
                    <span class="funnel-label">Shortlisted</span>
                    <span class="funnel-count">64</span>
                  </div>
                </div>
                <div class="funnel-stage">
                  <div class="funnel-bar" style="width: 30%;">
                    <span class="funnel-label">Interviewed</span>
                    <span class="funnel-count">38</span>
                  </div>
                </div>
                <div class="funnel-stage">
                  <div class="funnel-bar" style="width: 15%;">
                    <span class="funnel-label">Offers</span>
                    <span class="funnel-count">19</span>
                  </div>
                </div>
                <div class="funnel-stage">
                  <div class="funnel-bar" style="width: 10%;">
                    <span class="funnel-label">Hired</span>
                    <span class="funnel-count">6</span>
                  </div>
                </div>
              </div>
            </section>
          </div>

          <!-- Right Column -->
          <div class="right-column">
            <!-- Upcoming Interviews -->
            <section class="section">
              <div class="section-header">
                <h3 class="section-title">Scheduled Interviews</h3>
                <a href="#" class="see-all">Calendar</a>
              </div>

              <div class="interviews-list">
                <div class="interview-card">
                  <div class="interview-date">
                    <div class="date-day">25</div>
                    <div class="date-month">JUL</div>
                  </div>
                  <div class="interview-info">
                    <p class="interview-candidate">Sarah Johnson</p>
                    <p class="interview-position">Frontend Developer</p>
                    <p class="interview-time">2:00 PM • Zoom</p>
                  </div>
                  <button class="btn btn-primary compact">Join</button>
                </div>

                <div class="interview-card">
                  <div class="interview-date">
                    <div class="date-day">26</div>
                    <div class="date-month">JUL</div>
                  </div>
                  <div class="interview-info">
                    <p class="interview-candidate">Marcus Chen</p>
                    <p class="interview-position">Data Scientist</p>
                    <p class="interview-time">11:00 AM • Teams</p>
                  </div>
                  <button class="btn btn-primary compact">Join</button>
                </div>

                <div class="interview-card">
                  <div class="interview-date">
                    <div class="date-day">28</div>
                    <div class="date-month">JUL</div>
                  </div>
                  <div class="interview-info">
                    <p class="interview-candidate">Amara Williams</p>
                    <p class="interview-position">Marketing Lead</p>
                    <p class="interview-time">3:30 PM • In-person</p>
                  </div>
                  <button class="btn btn-primary compact">Details</button>
                </div>
              </div>
            </section>

            <!-- Active Job Listings -->
            <section class="section">
              <div class="section-header">
                <h3 class="section-title">Active Job Listings</h3>
                <a href="#" class="see-all">Post New</a>
              </div>

              <div class="jobs-list">
                <div class="job-listing-card">
                  <div class="job-header">
                    <p class="job-title">Frontend Developer</p>
                    <span class="job-status active">Active</span>
                  </div>
                  <p class="job-meta">Remote • Full-time • Graduate</p>
                  <div class="job-stats">
                    <div class="stat">
                      <span class="label">Applications</span>
                      <span class="value">32</span>
                    </div>
                    <div class="stat">
                      <span class="label">Shortlisted</span>
                      <span class="value">12</span>
                    </div>
                  </div>
                  <div class="job-actions-compact">
                    <button class="action-btn">Edit</button>
                    <button class="action-btn">Pause</button>
                    <button class="action-btn danger">Close</button>
                  </div>
                </div>

                <div class="job-listing-card">
                  <div class="job-header">
                    <p class="job-title">Data Scientist</p>
                    <span class="job-status active">Active</span>
                  </div>
                  <p class="job-meta">Hybrid • Graduate • Competitive</p>
                  <div class="job-stats">
                    <div class="stat">
                      <span class="label">Applications</span>
                      <span class="value">28</span>
                    </div>
                    <div class="stat">
                      <span class="label">Shortlisted</span>
                      <span class="value">8</span>
                    </div>
                  </div>
                  <div class="job-actions-compact">
                    <button class="action-btn">Edit</button>
                    <button class="action-btn">Pause</button>
                    <button class="action-btn danger">Close</button>
                  </div>
                </div>

                <div class="job-listing-card">
                  <div class="job-header">
                    <p class="job-title">Marketing Intern</p>
                    <span class="job-status active">Active</span>
                  </div>
                  <p class="job-meta">On-site • Internship • Entry-level</p>
                  <div class="job-stats">
                    <div class="stat">
                      <span class="label">Applications</span>
                      <span class="value">67</span>
                    </div>
                    <div class="stat">
                      <span class="label">Shortlisted</span>
                      <span class="value">14</span>
                    </div>
                  </div>
                  <div class="job-actions-compact">
                    <button class="action-btn">Edit</button>
                    <button class="action-btn">Pause</button>
                    <button class="action-btn danger">Close</button>
                  </div>
                </div>
              </div>
            </section>

            <!-- Analytics Insights -->
            <section class="section">
              <h3 class="section-title">Key Metrics</h3>
              <div class="metrics-list">
                <div class="metric-item">
                  <span class="metric-label">Avg. Time to Hire</span>
                  <span class="metric-value">18 days</span>
                </div>
                <div class="metric-item">
                  <span class="metric-label">Conversion Rate</span>
                  <span class="metric-value">4.7%</span>
                </div>
                <div class="metric-item">
                  <span class="metric-label">Top Source</span>
                  <span class="metric-value">L.I.M.E Platform</span>
                </div>
                <div class="metric-item">
                  <span class="metric-label">Interview Rate</span>
                  <span class="metric-value">40%</span>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>

      <!-- Footer -->
      
    </main>
  </div>

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