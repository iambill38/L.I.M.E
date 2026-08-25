<?php
require_once __DIR__ . '/../src/helpers/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard - L.I.M.E</title>
  <link rel="stylesheet" href="css/StudentsDashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="lime-background.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css">
  <style>
    body.has-lime-nav .dashboard-content {
      padding-top: 96px;
    }
  </style>
</head>
<body class="has-lime-nav">
  <div id="lime-nav-root"></div>

  <!-- LIME Navigation -->
 

 

      <!-- Dashboard Content -->
      <div class="dashboard-content">
        <!-- Overview Section -->
        <section class="section">
          <h3 class="section-title">Quick Overview</h3>
          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                  <polyline points="13 2 13 9 20 9"></polyline>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Applications Sent</p>
                <p class="stat-value">12</p>
                <p class="stat-change">+3 this week</p>
              </div>
            </div>

            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                  <polyline points="17 21 17 13 7 13 7 21"></polyline>
                  <polyline points="7 3 7 8 17 8"></polyline>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Saved Jobs</p>
                <p class="stat-value">28</p>
                <p class="stat-change">+7 new this month</p>
              </div>
            </div>

            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="12" cy="12" r="1"></circle>
                  <path d="M12 1v6m0 6v6"></path>
                  <path d="M4.22 4.22l4.24 4.24m5.08 5.08l4.24 4.24"></path>
                  <path d="M1 12h6m6 0h6"></path>
                  <path d="M4.22 19.78l4.24-4.24m5.08-5.08l4.24-4.24"></path>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Interviews</p>
                <p class="stat-value">3</p>
                <p class="stat-change">1 this week</p>
              </div>
            </div>

            <div class="stat-card">
              <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
              </div>
              <div class="stat-content">
                <p class="stat-label">Companies Following</p>
                <p class="stat-value">15</p>
                <p class="stat-change">+2 this week</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Content Grid -->
        <div class="content-grid">
          <!-- Left Column -->
          <div class="left-column">
            <!-- Recent Jobs -->
            <section class="section">
              <div class="section-header">
                <h3 class="section-title">Recommended Jobs</h3>
                <a href="#" class="see-all">See All</a>
              </div>
              <div class="jobs-list">
                <div class="job-card">
                  <div class="job-header">
                    <div class="job-info">
                      <div class="company-logo" style="background: linear-gradient(135deg, #00ff41, rgba(0, 255, 65, 0.5));">TG</div>
                      <div>
                        <h4 class="job-title">Frontend Developer</h4>
                        <p class="company-name">Tech Giant</p>
                      </div>
                    </div>
                    <button class="icon-button" title="Save job">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                      </svg>
                    </button>
                  </div>
                  <div class="job-badges">
                    <span class="badge">Remote</span>
                    <span class="badge">Entry Level</span>
                  </div>
                  <p class="job-description">We're looking for a talented Frontend Developer to join our team. You'll work with React, TypeScript, and modern web technologies.</p>
                  <div class="job-footer">
                    <p class="salary-range">$60k - $80k</p>
                    <button class="btn btn-primary">Apply Now</button>
                  </div>
                </div>

                <div class="job-card">
                  <div class="job-header">
                    <div class="job-info">
                      <div class="company-logo" style="background: linear-gradient(135deg, #6366f1, rgba(99, 102, 241, 0.5));">DB</div>
                      <div>
                        <h4 class="job-title">Full Stack Developer</h4>
                        <p class="company-name">Digital Brands</p>
                      </div>
                    </div>
                    <button class="icon-button" title="Save job">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                      </svg>
                    </button>
                  </div>
                  <div class="job-badges">
                    <span class="badge">Hybrid</span>
                    <span class="badge">Mid Level</span>
                  </div>
                  <p class="job-description">Join our growing team to build web applications using Node.js and React. We value innovation and continuous learning.</p>
                  <div class="job-footer">
                    <p class="salary-range">$70k - $95k</p>
                    <button class="btn btn-primary">Apply Now</button>
                  </div>
                </div>

                <div class="job-card">
                  <div class="job-header">
                    <div class="job-info">
                      <div class="company-logo" style="background: linear-gradient(135deg, #ec4899, rgba(236, 72, 153, 0.5));">IA</div>
                      <div>
                        <h4 class="job-title">Junior Developer</h4>
                        <p class="company-name">Innov AI</p>
                      </div>
                    </div>
                    <button class="icon-button" title="Save job">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                      </svg>
                    </button>
                  </div>
                  <div class="job-badges">
                    <span class="badge">On-site</span>
                    <span class="badge">Internship</span>
                  </div>
                  <p class="job-description">Great opportunity to start your career in a fast-growing AI company. Mentorship provided by experienced developers.</p>
                  <div class="job-footer">
                    <p class="salary-range">$35k - $45k</p>
                    <button class="btn btn-primary">Apply Now</button>
                  </div>
                </div>
              </div>
            </section>

            <!-- Upcoming Interviews -->
            <section class="section">
              <div class="section-header">
                <h3 class="section-title">Upcoming Interviews</h3>
                <a href="#" class="see-all">See All</a>
              </div>
              <div class="interviews-list">
                <div class="interview-card">
                  <div class="interview-date">
                    <p class="date-day">15</p>
                    <p class="date-month">JAN</p>
                  </div>
                  <div class="interview-info">
                    <h4 class="interview-title">Tech Giant - Frontend Developer</h4>
                    <p class="interview-time">2:00 PM - Video Call</p>
                    <p class="interview-status">Confirmed</p>
                  </div>
                  <button class="icon-button" title="Join call">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M23 7l-7 5 7 5V7z"></path>
                      <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                    </svg>
                  </button>
                </div>

                <div class="interview-card">
                  <div class="interview-date">
                    <p class="date-day">18</p>
                    <p class="date-month">JAN</p>
                  </div>
                  <div class="interview-info">
                    <h4 class="interview-title">Digital Brands - Technical Round</h4>
                    <p class="interview-time">3:30 PM - In Person</p>
                    <p class="interview-status">Pending Response</p>
                  </div>
                  <button class="icon-button" title="View details">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <circle cx="12" cy="12" r="1"></circle>
                      <path d="M12 1v6m0 6v6"></path>
                      <path d="M4.22 4.22l4.24 4.24m5.08 5.08l4.24 4.24"></path>
                      <path d="M1 12h6m6 0h6"></path>
                      <path d="M4.22 19.78l4.24-4.24m5.08-5.08l4.24-4.24"></path>
                    </svg>
                  </button>
                </div>
              </div>
            </section>
          </div>

          <!-- Right Column -->
          <div class="right-column">
            <!-- Top Skills -->
            <section class="section">
              <div class="section-header">
                <h3 class="section-title">Top Skills</h3>
              </div>
              <div class="skills-list">
                <div class="skill-item">
                  <div class="skill-header">
                    <span class="skill-name">JavaScript</span>
                    <span class="skill-percent">92%</span>
                  </div>
                  <div class="progress-bar">
                    <div class="progress-fill" style="width: 92%"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-header">
                    <span class="skill-name">React</span>
                    <span class="skill-percent">85%</span>
                  </div>
                  <div class="progress-bar">
                    <div class="progress-fill" style="width: 85%"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-header">
                    <span class="skill-name">TypeScript</span>
                    <span class="skill-percent">78%</span>
                  </div>
                  <div class="progress-bar">
                    <div class="progress-fill" style="width: 78%"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-header">
                    <span class="skill-name">Python</span>
                    <span class="skill-percent">72%</span>
                  </div>
                  <div class="progress-bar">
                    <div class="progress-fill" style="width: 72%"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-header">
                    <span class="skill-name">SQL</span>
                    <span class="skill-percent">80%</span>
                  </div>
                  <div class="progress-bar">
                    <div class="progress-fill" style="width: 80%"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-header">
                    <span class="skill-name">Communication</span>
                    <span class="skill-percent">88%</span>
                  </div>
                  <div class="progress-bar">
                    <div class="progress-fill" style="width: 88%"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-header">
                    <span class="skill-name">Problem Solving</span>
                    <span class="skill-percent">82%</span>
                  </div>
                  <div class="progress-bar">
                    <div class="progress-fill" style="width: 82%"></div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Career Resources -->
            <section class="section">
              <h3 class="section-title">Career Resources</h3>
              <div class="resources-grid">
                <a href="#" class="resource-card">
                  <div class="resource-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                  </div>
                  <p class="resource-title">Resume Tips</p>
                </a>

                <a href="#" class="resource-card">
                  <div class="resource-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                      <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                    </svg>
                  </div>
                  <p class="resource-title">Interview Prep</p>
                </a>

                <a href="#" class="resource-card">
                  <div class="resource-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                      <line x1="12" y1="12" x2="20" y2="7.5"></line>
                      <line x1="12" y1="12" x2="12" y2="21"></line>
                      <line x1="12" y1="12" x2="4" y2="7.5"></line>
                    </svg>
                  </div>
                  <p class="resource-title">Coding Challenges</p>
                </a>

                <a href="#" class="resource-card">
                  <div class="resource-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                      <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                    </svg>
                  </div>
                  <p class="resource-title">Career Articles</p>
                </a>

                <a href="#" class="resource-card">
                  <div class="resource-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                      <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                  </div>
                  <p class="resource-title">Learning Resources</p>
                </a>

                <a href="#" class="resource-card">
                  <div class="resource-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <circle cx="12" cy="12" r="1"></circle>
                      <path d="M12 1v6m0 6v6"></path>
                      <path d="M4.22 4.22l4.24 4.24m5.08 5.08l4.24 4.24"></path>
                      <path d="M1 12h6m6 0h6"></path>
                      <path d="M4.22 19.78l4.24-4.24m5.08-5.08l4.24-4.24"></path>
                    </svg>
                  </div>
                  <p class="resource-title">Best Practices</p>
                </a>
              </div>
            </section>

            <!-- Notifications Panel -->
            <section class="section">
              <h3 class="section-title">Notifications</h3>
              <div class="notifications-list">
                <div class="notification-item new">
                  <div class="notification-dot"></div>
                  <div class="notification-content">
                    <p class="notification-title">New internship available</p>
                    <p class="notification-description">Tech Giant posted a new Frontend Developer position</p>
                    <p class="notification-time">2 hours ago</p>
                  </div>
                </div>

                <div class="notification-item new">
                  <div class="notification-dot"></div>
                  <div class="notification-content">
                    <p class="notification-title">Interview reminder</p>
                    <p class="notification-description">Your interview with Digital Brands is in 3 days</p>
                    <p class="notification-time">4 hours ago</p>
                  </div>
                </div>

                <div class="notification-item">
                  <div class="notification-content">
                    <p class="notification-title">Company message</p>
                    <p class="notification-description">Innov AI sent you a message about your application</p>
                    <p class="notification-time">1 day ago</p>
                  </div>
                </div>

                <div class="notification-item">
                  <div class="notification-content">
                    <p class="notification-title">Profile viewed</p>
                    <p class="notification-description">Your profile was viewed 5 times this week</p>
                    <p class="notification-time">2 days ago</p>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>

      <!-- Footer -->
      
    </main>
  </div>

  <script>
window.LIME_USER = {
    name: <?= json_encode($firstName) ?>,
    email: <?= json_encode($email) ?>,
    role: <?= json_encode($role) ?>
};
</script>

  <script src="lime-nav.js"></script>

  <script>
    // Handle nav link active state
    document.querySelectorAll('.lime-nav-link').forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelectorAll('.lime-nav-link').forEach(l => l.classList.remove('active'));
        this.classList.add('active');
        const page = this.dataset.page;
        console.log('Navigating to:', page);
      });
    });
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