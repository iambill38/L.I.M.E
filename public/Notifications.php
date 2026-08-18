<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications - lime.com</title>
  
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="lime-background.css">
<link rel="stylesheet" href="css/LIMENOTIFICATIONS.css">  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css"></head>
<body class="has-lime-nav">
  <nav id="lime-nav">
    
  </nav>

<div class="lime-bg-image"></div>
  <div class="lime-bg-overlay"></div>

  <div id="lime-nav-root"></div>

  <!-- Top Navigation -->

  <!-- Main Content -->
  <main class="main-content">
    <!-- Header -->
    <div class="content-header">
      <div>
        <h1 class="page-title">Notifications</h1>
        <p class="page-subtitle">Stay updated on your activity</p>
      </div>
      <div class="header-actions">
        <button class="btn-small" onclick="markAllAsRead()">Mark All Read</button>
        <button class="btn-small" onclick="clearAllNotifications()">Clear All</button>
      </div>
    </div>

    <!-- Statistics -->
    <div class="notification-stats">
      <div class="stat-item">
        <div class="stat-number" id="totalNotifications">0</div>
        <div class="stat-label">Total</div>
      </div>
      <div class="stat-item">
        <div class="stat-number" id="unreadCount">0</div>
        <div class="stat-label">Unread</div>
      </div>
      <div class="stat-item">
        <div class="stat-number" id="todayCount">0</div>
        <div class="stat-label">Today</div>
      </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
      <button class="filter-button active" data-filter="all">All</button>
      <button class="filter-button" data-filter="job">Jobs</button>
      <button class="filter-button" data-filter="message">Messages</button>
      <button class="filter-button" data-filter="application">Applications</button>
      <button class="filter-button" data-filter="profile">Profile</button>
      <button class="filter-button" data-filter="interview">Interviews</button>
    </div>

    <!-- Notifications List -->
    <div class="notifications-list" id="notificationsList">
      <!-- Notifications rendered here -->
    </div>

    <!-- Empty State -->
    <div class="empty-state" id="emptyState" style="display: none;">
      <div class="empty-state-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></div>
      <h2 class="empty-state-title">No notifications</h2>
      <p class="empty-state-text">You're all caught up! Check back later for updates</p>
    </div>
  </main>

  <!-- Scripts -->
  <script src="lime-nav.js"></script>

  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>
  <script>
    // Sample notifications data
    const sampleNotifications = [
      {
        id: 1,
        type: 'job',
        icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>',
        title: 'New Job Match',
        message: 'TechCorp is hiring for Senior Full Stack Engineer - matches your skills!',
        timestamp: new Date(Date.now() - 15 * 60000), // 15 mins ago
        read: false,
      },
      {
        id: 2,
        type: 'message',
        icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>',
        title: 'New Message',
        message: 'StartupXYZ: "Thanks for your application! We\'ll review and get back to you soon."',
        timestamp: new Date(Date.now() - 45 * 60000), // 45 mins ago
        read: false,
      },
      {
        id: 3,
        type: 'application',
        icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
        title: 'Application Accepted',
        message: 'Digital Innovations has accepted your application for AI/ML Engineer position!',
        timestamp: new Date(Date.now() - 2 * 60 * 60000), // 2 hours ago
        read: false,
      },
      {
        id: 4,
        type: 'profile',
        icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>',
        title: 'Profile Viewed',
        message: 'CloudBase viewed your profile',
        timestamp: new Date(Date.now() - 4 * 60 * 60000), // 4 hours ago
        read: true,
      },
      {
        id: 5,
        type: 'interview',
        icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
        title: 'Interview Scheduled',
        message: 'Your interview with TechCorp is scheduled for tomorrow at 2:00 PM',
        timestamp: new Date(Date.now() - 1 * 24 * 60 * 60000), // 1 day ago
        read: true,
      },
      {
        id: 6,
        type: 'job',
        icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>',
        title: 'Job Recommendation',
        message: 'Backend Developer role at CloudBase matches your experience level',
        timestamp: new Date(Date.now() - 2 * 24 * 60 * 60000), // 2 days ago
        read: true,
      },
      {
        id: 7,
        type: 'message',
        icon: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>',
        title: 'Message from Company',
        message: 'Digital Innovations: "We\'re impressed with your profile. Are you interested in discussing the role?"',
        timestamp: new Date(Date.now() - 3 * 24 * 60 * 60000), // 3 days ago
        read: true,
      },
      {
        id: 8,
        type: 'application',
        icon: 'fa-hourglass-end',
        title: 'Application Under Review',
        message: 'TechCorp is currently reviewing your application for Senior Full Stack Engineer',
        timestamp: new Date(Date.now() - 4 * 24 * 60 * 60000), // 4 days ago
        read: true,
      },
    ];

    let allNotifications = [...sampleNotifications];
    let currentFilter = 'all';

    // Load notifications from localStorage
    function loadNotifications() {
      const stored = localStorage.getItem('limeNotifications');
      if (stored) {
        try {
          allNotifications = JSON.parse(stored);
        } catch (e) {
          allNotifications = [...sampleNotifications];
        }
      }
    }

    // Save notifications to localStorage
    function saveNotifications() {
      localStorage.setItem('limeNotifications', JSON.stringify(allNotifications));
    }

    // Format time
    function formatTime(date) {
      const now = new Date();
      const diffMs = now - date;
      const diffMins = Math.floor(diffMs / 60000);
      const diffHours = Math.floor(diffMs / 3600000);
      const diffDays = Math.floor(diffMs / 86400000);

      if (diffMins < 1) return 'Just now';
      if (diffMins < 60) return `${diffMins}m ago`;
      if (diffHours < 24) return `${diffHours}h ago`;
      if (diffDays < 7) return `${diffDays}d ago`;
      
      return date.toLocaleDateString('en-US', {
        month: 'short',
        day: 'numeric',
      });
    }

    // Render notifications
    function renderNotifications() {
      const listContainer = document.getElementById('notificationsList');
      const emptyState = document.getElementById('emptyState');

      let filtered = allNotifications;
      if (currentFilter !== 'all') {
        filtered = allNotifications.filter((n) => n.type === currentFilter);
      }

      // Sort by date (newest first)
      filtered.sort((a, b) => b.timestamp - a.timestamp);

      updateStats();

      if (filtered.length === 0) {
        listContainer.style.display = 'none';
        emptyState.style.display = 'block';
      } else {
        listContainer.style.display = 'flex';
        emptyState.style.display = 'none';

        listContainer.innerHTML = filtered
          .map(
            (notif) => `
          <div class="notification-item ${notif.read ? '' : 'unread'}" onclick="markAsRead(${notif.id})">
            <div class="notification-icon ${notif.type}">
              ${notif.icon}
            </div>
            <div class="notification-content">
              <div class="notification-header">
                <h3 class="notification-title">${notif.title}</h3>
                <span class="notification-type ${notif.type}">${notif.type}</span>
              </div>
              <p class="notification-message">${notif.message}</p>
              <div class="notification-meta">
                <div class="notification-time">
                  ${formatTime(new Date(notif.timestamp))}
                </div>
                <div class="notification-actions">
                  <button class="action-icon-btn" onclick="event.stopPropagation(); deleteNotification(${notif.id})" title="Delete">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        `
          )
          .join('');
      }
    }

    // Update statistics
    function updateStats() {
      const total = allNotifications.length;
      const unread = allNotifications.filter((n) => !n.read).length;
      const today = allNotifications.filter((n) => {
        const notifDate = new Date(n.timestamp);
        const todayStart = new Date();
        todayStart.setHours(0, 0, 0, 0);
        return notifDate >= todayStart;
      }).length;

      document.getElementById('totalNotifications').textContent = total;
      document.getElementById('unreadCount').textContent = unread;
      document.getElementById('todayCount').textContent = today;
    }

    // Mark as read
    window.markAsRead = function (id) {
      const notif = allNotifications.find((n) => n.id === id);
      if (notif) {
        notif.read = true;
        saveNotifications();
        renderNotifications();
      }
    };

    // Mark all as read
    window.markAllAsRead = function () {
      allNotifications.forEach((n) => (n.read = true));
      saveNotifications();
      renderNotifications();
      showToast('All notifications marked as read', 'success');
    };

    // Delete notification
    window.deleteNotification = function (id) {
      allNotifications = allNotifications.filter((n) => n.id !== id);
      saveNotifications();
      renderNotifications();
      showToast('Notification deleted', 'success');
    };

    // Clear all notifications
    window.clearAllNotifications = function () {
      if (confirm('Are you sure you want to clear all notifications?')) {
        allNotifications = [];
        saveNotifications();
        renderNotifications();
        showToast('All notifications cleared', 'success');
      }
    };

    // Filter handler
    document.querySelectorAll('.filter-button').forEach((btn) => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-button').forEach((b) => b.classList.remove('active'));
        btn.classList.add('active');
        currentFilter = btn.dataset.filter;
        renderNotifications();
      });
    });

    // Initialize
    loadNotifications();
    renderNotifications();
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