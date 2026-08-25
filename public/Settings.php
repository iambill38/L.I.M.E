<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings - lime.com</title>
  
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="lime-background.css">
<link rel="stylesheet" href="css/LIMESETTINGS.css">  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css"></head>
<body class="has-lime-nav">
  <nav id="lime-nav">
  
  </nav>

<div class="lime-bg-image"></div>
  <div class="lime-bg-overlay"></div>

  <div id="lime-nav-root"></div>

  <!-- Top Navigation -->

  <!-- Settings Container -->
  <div class="settings-container">
    <!-- Sidebar Menu -->
    <aside class="settings-sidebar">
      <div class="sidebar-title">Settings</div>
      <div class="settings-menu">
        <button class="menu-item active" data-section="account">
          <span class="menu-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
          Account
        </button>
        <button class="menu-item" data-section="privacy">
          <span class="menu-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
          Privacy
        </button>
        <button class="menu-item" data-section="notifications">
          <span class="menu-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></span>
          Notifications
        </button>
        <button class="menu-item" data-section="display">
          <span class="menu-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg></span>
          Display
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="settings-content">
      <!-- Account Settings Section -->
      <section class="settings-section active" id="account">
        <h2 class="section-title">Account Settings</h2>
        <p class="section-description">Manage your account security and email preferences</p>

        <div class="success-message" id="accountSuccess">Changes saved successfully!</div>

        <!-- Change Password -->
        <form id="passwordForm">
          <div class="form-group">
            <label for="current-password" class="form-label">Current Password</label>
            <input 
              type="password" 
              id="current-password" 
              class="form-input" 
              placeholder="Enter your current password"
              required
            >
          </div>

          <div class="form-group">
            <label for="new-password" class="form-label">New Password</label>
            <input 
              type="password" 
              id="new-password" 
              class="form-input" 
              placeholder="Enter a new password (min 8 characters)"
              minlength="8"
              required
            >
          </div>

          <div class="form-group">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input 
              type="password" 
              id="confirm-password" 
              class="form-input" 
              placeholder="Confirm your new password"
              minlength="8"
              required
            >
          </div>

          <div class="button-group">
            <button type="submit" class="button button-primary">Change Password</button>
            <button type="reset" class="button button-secondary">Cancel</button>
          </div>
        </form>

        <!-- Email Preferences -->
        <div style="margin-top: var(--spacing-xl); padding-top: var(--spacing-xl); border-top: 1px solid rgba(0, 255, 65, 0.1);">
          <h3 style="font-weight: 600; color: var(--color-white); margin-bottom: var(--spacing-lg);">Email Preferences</h3>

          <div class="setting-item">
            <div class="setting-info">
              <h3>Email Notifications</h3>
              <p>Receive emails about your account activity</p>
            </div>
            <div class="toggle-switch">
              <input type="checkbox" class="toggle-checkbox" id="emailNotif" checked onchange="saveSetting('emailNotif')">
            </div>
          </div>

          <div class="setting-item">
            <div class="setting-info">
              <h3>Marketing Emails</h3>
              <p>Receive tips, updates, and promotional content</p>
            </div>
            <div class="toggle-switch">
              <input type="checkbox" class="toggle-checkbox" id="marketingEmails" onchange="saveSetting('marketingEmails')">
            </div>
          </div>

          <div class="setting-item">
            <div class="setting-info">
              <h3>Weekly Digest</h3>
              <p>Get a weekly summary of your activity</p>
            </div>
            <div class="toggle-switch">
              <input type="checkbox" class="toggle-checkbox" id="weeklyDigest" checked onchange="saveSetting('weeklyDigest')">
            </div>
          </div>
        </div>

        <!-- Danger Zone -->
        <div class="danger-zone">
          <div class="danger-zone-title">Danger Zone</div>
          <div class="danger-zone-description">Logging out will end your current session. You'll need to sign in again to access your account.</div>
          <button class="button button-danger" onclick="handleLogout()">Logout</button>
        </div>
      </section>

      <!-- Privacy Settings Section -->
      <section class="settings-section" id="privacy">
        <h2 class="section-title">Privacy Settings</h2>
        <p class="section-description">Control who can see your profile and contact you</p>

        <div class="success-message" id="privacySuccess">Privacy settings updated!</div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Profile Visibility</h3>
            <p>Allow other students and companies to view your profile</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="profileVisible" checked onchange="saveSetting('profileVisible')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Show Portfolio</h3>
            <p>Display your portfolio projects publicly</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="showPortfolio" checked onchange="saveSetting('showPortfolio')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Allow Messages</h3>
            <p>Companies and students can message you</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="allowMessages" checked onchange="saveSetting('allowMessages')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Show Connections</h3>
            <p>Display your professional connections list</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="showConnections" onchange="saveSetting('showConnections')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Profile in Search Results</h3>
            <p>Appear when companies search for candidates</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="searchVisible" checked onchange="saveSetting('searchVisible')">
          </div>
        </div>

        <!-- Danger Zone -->
        <div class="danger-zone">
          <div class="danger-zone-title">Delete Account</div>
          <div class="danger-zone-description">Permanently delete your account and all associated data. This action cannot be undone.</div>
          <button class="button button-danger" onclick="handleDeleteAccount()">Delete Account</button>
        </div>
      </section>

      <!-- Notification Settings Section -->
      <section class="settings-section" id="notifications">
        <h2 class="section-title">Notification Settings</h2>
        <p class="section-description">Choose what notifications you want to receive</p>

        <div class="success-message" id="notificationSuccess">Notification preferences saved!</div>

        <h3 style="font-weight: 600; color: var(--color-white); margin-top: var(--spacing-lg); margin-bottom: var(--spacing-md);">In-App Notifications</h3>

        <div class="setting-item">
          <div class="setting-info">
            <h3>New Messages</h3>
            <p>Get notified when you receive a new message</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="notifMessages" checked onchange="saveSetting('notifMessages')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Application Updates</h3>
            <p>Get notified about your job applications</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="notifApplications" checked onchange="saveSetting('notifApplications')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Profile Viewed</h3>
            <p>Get notified when someone views your profile</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="notifProfileView" checked onchange="saveSetting('notifProfileView')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Connection Requests</h3>
            <p>Get notified when someone connects with you</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="notifConnection" checked onchange="saveSetting('notifConnection')">
          </div>
        </div>

        <h3 style="font-weight: 600; color: var(--color-white); margin-top: var(--spacing-lg); margin-bottom: var(--spacing-md);">Push Notifications</h3>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Browser Notifications</h3>
            <p>Receive push notifications in your browser</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="pushNotif" onchange="saveSetting('pushNotif')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Sound Notifications</h3>
            <p>Play a sound when you receive a notification</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="soundNotif" checked onchange="saveSetting('soundNotif')">
          </div>
        </div>
      </section>

      <!-- Display Settings Section -->
      <section class="settings-section" id="display">
        <h2 class="section-title">Display Preferences</h2>
        <p class="section-description">Customize how the interface looks and feels</p>

        <div class="success-message" id="displaySuccess">Display settings updated!</div>

        <div class="form-group">
          <label for="language" class="form-label">Language</label>
          <select id="language" class="form-input" onchange="saveSetting('language')">
            <option value="en">English</option>
            <option value="es">Español</option>
            <option value="fr">Français</option>
            <option value="de">Deutsch</option>
            <option value="pt">Português</option>
          </select>
        </div>

        <div class="form-group">
          <label for="timezone" class="form-label">Timezone</label>
          <select id="timezone" class="form-input" onchange="saveSetting('timezone')">
            <option value="utc">UTC</option>
            <option value="est">EST (Eastern)</option>
            <option value="cst">CST (Central)</option>
            <option value="mst">MST (Mountain)</option>
            <option value="pst">PST (Pacific)</option>
          </select>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Compact View</h3>
            <p>Use a more compact layout with less spacing</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="compactView" onchange="saveSetting('compactView')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>High Contrast</h3>
            <p>Use higher contrast colors for better readability</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="highContrast" onchange="saveSetting('highContrast')">
          </div>
        </div>

        <div class="setting-item">
          <div class="setting-info">
            <h3>Animations</h3>
            <p>Enable animations and transitions</p>
          </div>
          <div class="toggle-switch">
            <input type="checkbox" class="toggle-checkbox" id="animations" checked onchange="saveSetting('animations')">
          </div>
        </div>
      </section>
    </main>
  </div>

  <script>
    // Load settings from localStorage
    function loadSettings() {
      const settings = JSON.parse(localStorage.getItem('limeSettings') || '{}');
      
      // Apply saved settings to UI
      Object.keys(settings).forEach(key => {
        const element = document.getElementById(key);
        if (element) {
          if (element.type === 'checkbox') {
            element.checked = settings[key];
          } else if (element.tagName === 'SELECT') {
            element.value = settings[key];
          }
        }
      });
    }

    // Save a single setting
    window.saveSetting = function(key) {
      const element = document.getElementById(key);
      let value;

      if (element.type === 'checkbox') {
        value = element.checked;
      } else if (element.tagName === 'SELECT') {
        value = element.value;
      }

      // Load all settings
      const settings = JSON.parse(localStorage.getItem('limeSettings') || '{}');
      settings[key] = value;

      // Save all settings
      localStorage.setItem('limeSettings', JSON.stringify(settings));

      // Show success message for the section
      const section = element.closest('.settings-section');
      if (section) {
        const successMsg = section.querySelector('.success-message');
        if (successMsg) {
          successMsg.classList.add('show');
          setTimeout(() => {
            successMsg.classList.remove('show');
          }, 3000);
        }
      }
    };

    // Handle password change
    document.getElementById('passwordForm').addEventListener('submit', (e) => {
      e.preventDefault();

      const current = document.getElementById('current-password').value;
      const newPass = document.getElementById('new-password').value;
      const confirm = document.getElementById('confirm-password').value;

      if (newPass !== confirm) {
        alert('Passwords do not match!');
        return;
      }

      if (newPass.length < 8) {
        alert('Password must be at least 8 characters long');
        return;
      }

      // Save password (in real app, would send to server)
      const settings = JSON.parse(localStorage.getItem('limeSettings') || '{}');
      settings.password = newPass;
      localStorage.setItem('limeSettings', JSON.stringify(settings));

      // Show success
      document.getElementById('accountSuccess').classList.add('show');
      setTimeout(() => {
        document.getElementById('accountSuccess').classList.remove('show');
      }, 3000);

      // Reset form
      e.target.reset();
    });

    // Handle logout
    window.handleLogout = function() {
      if (confirm('Are you sure you want to logout?')) {
        // Clear session
        localStorage.removeItem('limeSession');
        alert('You have been logged out. Redirecting to login page...');
        window.location.href = 'logout.php';
      }
    };

    // Handle delete account
    window.handleDeleteAccount = function() {
      if (confirm('Are you absolutely sure? This cannot be undone.')) {
        if (confirm('Type "DELETE" to confirm account deletion.')) {
          // In real app, would send delete request to server
          alert('Account deleted. Redirecting...');
          localStorage.clear();
          window.location.href = 'logout.php';
        }
      }
    };

    // Menu item click handler
    document.querySelectorAll('.menu-item').forEach(item => {
      item.addEventListener('click', () => {
        // Remove active from all
        document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
        document.querySelectorAll('.settings-section').forEach(s => s.classList.remove('active'));

        // Add active to clicked
        item.classList.add('active');
        const sectionId = item.dataset.section;
        document.getElementById(sectionId).classList.add('active');
      });
    });

    // Load settings on page load
    loadSettings();
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