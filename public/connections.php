<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connections - lime.com</title>
  
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="css/LIMECONNECTIONS.css">  <link rel="stylesheet" href="lime-background.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css"></head>
<body class="has-lime-nav">
  <nav id="lime-nav">
    <!-- <a href="Analytics.html" class="lime-nav-logo">L.I.M.E</a> -->
   
  </nav>

<!-- Global Navigation -->
  <div id="lime-nav-root"></div>
  <div class="bg-orbs">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
  </div>

  

  <main class="main-content">
    <h1 class="page-title">Network</h1>
    <p class="page-subtitle">Connect with students and recruiters in your field</p>

    <div id="connectionsCompletion" style="margin-bottom: 1.5rem;"></div>

    <div class="stats-group">
      <div class="stat-card">
        <div class="stat-value" id="totalConnections">12</div>
        <div class="stat-label">Connections</div>
      </div>
      <div class="stat-card">
        <div class="stat-value" id="pendingRequests">3</div>
        <div class="stat-label">Pending</div>
      </div>
      <div class="stat-card">
        <div class="stat-value" id="followingCount">8</div>
        <div class="stat-label">Following</div>
      </div>
    </div>

    <div class="tabs">
      <button class="tab active" data-tab="all">Discover</button>
      <button class="tab" data-tab="connections">My Connections</button>
      <button class="tab" data-tab="pending">Pending</button>
      <button class="tab" data-tab="following">Following</button>
    </div>

    <!-- Discover Tab -->
    <div class="tab-content" data-tab="all">
      <div class="search-bar">
        <input type="text" class="search-input" id="searchInput" placeholder="Search by name or role..." />
      </div>
      <div class="profiles-grid" id="discoverGrid">
      </div>
    </div>

    <!-- My Connections Tab -->
    <div class="tab-content" data-tab="connections" style="display: none;">
      <div class="profiles-grid" id="connectionsGrid">
      </div>
    </div>

    <!-- Pending Tab -->
    <div class="tab-content" data-tab="pending" style="display: none;">
      <div class="profiles-grid" id="pendingGrid">
      </div>
    </div>

    <!-- Following Tab -->
    <div class="tab-content" data-tab="following" style="display: none;">
      <div class="profiles-grid" id="followingGrid">
      </div>
    </div>
  </main>

  <script src="lime-nav.js"></script>
  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>
  <script src="lime-profile-completeness.js"></script>
  <script>
    renderCompletionWidget('connectionsCompletion', 'compact');
  </script>
  <script>
    const sampleProfiles = [
      {
        id: 1,
        name: 'Sarah Chen',
        initials: 'SC',
        title: 'Product Designer',
        location: 'San Francisco, CA',
        status: 'connected',
        skills: ['UI/UX', 'Figma', 'Design Systems'],
      },
      {
        id: 2,
        name: 'Alex Rodriguez',
        initials: 'AR',
        title: 'Full Stack Engineer',
        location: 'Austin, TX',
        status: 'pending',
        skills: ['React', 'Node.js', 'AWS'],
      },
      {
        id: 3,
        name: 'Maya Patel',
        initials: 'MP',
        title: 'Data Scientist',
        location: 'New York, NY',
        status: 'stranger',
        skills: ['Python', 'TensorFlow', 'SQL'],
      },
      {
        id: 4,
        name: 'James Wilson',
        initials: 'JW',
        title: 'iOS Developer',
        location: 'Seattle, WA',
        status: 'connected',
        skills: ['Swift', 'iOS', 'Objective-C'],
      },
      {
        id: 5,
        name: 'Emma Thompson',
        initials: 'ET',
        title: 'Marketing Manager',
        location: 'Boston, MA',
        status: 'following',
        skills: ['Digital Marketing', 'Analytics', 'Growth'],
      },
      {
        id: 6,
        name: 'David Kim',
        initials: 'DK',
        title: 'DevOps Engineer',
        location: 'San Jose, CA',
        status: 'stranger',
        skills: ['Kubernetes', 'Docker', 'AWS'],
      },
      {
        id: 7,
        name: 'Lisa Garcia',
        initials: 'LG',
        title: 'QA Automation',
        location: 'Denver, CO',
        status: 'pending',
        skills: ['Selenium', 'Test Automation', 'Java'],
      },
      {
        id: 8,
        name: 'Ryan Murphy',
        initials: 'RM',
        title: 'Backend Engineer',
        location: 'Portland, OR',
        status: 'connected',
        skills: ['Python', 'PostgreSQL', 'Microservices'],
      },
    ];

    let connections = [];
    let pendingRequests = [];
    let following = [];
    let currentTab = 'all';

    function loadConnections() {
      const stored = localStorage.getItem('limeConnections');
      if (stored) {
        try {
          const data = JSON.parse(stored);
          connections = data.connections || [];
          pendingRequests = data.pending || [];
          following = data.following || [];
        } catch (e) {
          initializeDefaults();
        }
      } else {
        initializeDefaults();
      }
    }

    function initializeDefaults() {
      connections = [1, 4, 8];
      pendingRequests = [2, 7];
      following = [5];
    }

    function saveConnections() {
      localStorage.setItem('limeConnections', JSON.stringify({
        connections,
        pending: pendingRequests,
        following,
      }));
      updateStats();
    }

    function updateStats() {
      document.getElementById('totalConnections').textContent = connections.length;
      document.getElementById('pendingRequests').textContent = pendingRequests.length;
      document.getElementById('followingCount').textContent = following.length;
    }

    function getProfileStatus(profileId) {
      if (connections.includes(profileId)) return 'connected';
      if (pendingRequests.includes(profileId)) return 'pending';
      if (following.includes(profileId)) return 'following';
      return 'stranger';
    }

    function getActionButton(profileId) {
      const status = getProfileStatus(profileId);

      if (status === 'connected') {
        return `<button class="btn btn-secondary" onclick="removeConnection(${profileId})">Remove</button>`;
      } else if (status === 'pending') {
        return `<button class="btn btn-secondary" onclick="cancelRequest(${profileId})">Cancel</button>`;
      } else if (status === 'following') {
        return `<button class="btn btn-primary" onclick="connect(${profileId})">Connect</button>
                <button class="btn btn-secondary" onclick="unfollow(${profileId})">Unfollow</button>`;
      } else {
        return `<button class="btn btn-primary" onclick="connect(${profileId})">Connect</button>
                <button class="btn btn-secondary" onclick="follow(${profileId})">Follow</button>`;
      }
    }

    function renderProfiles(containerIdGridId, filterFn) {
      const container = document.getElementById(gridId);
      const profiles = sampleProfiles.filter(filterFn);

      if (profiles.length === 0) {
        container.innerHTML = `
          <div class="empty-state" style="grid-column: 1/-1;">
            <div class="empty-state-icon">[User]</div>
            <div class="empty-state-title">No profiles found</div>
            <div class="empty-state-text">Try searching or exploring other sections</div>
          </div>
        `;
        return;
      }

      container.innerHTML = profiles.map(profile => `
        <div class="profile-card">
          <div class="profile-avatar">${profile.initials}</div>
          <div class="profile-name">${profile.name}</div>
          <div class="profile-title">${profile.title}</div>
          <div class="profile-meta">
            <span>[L]</span>
            <span>${profile.location}</span>
          </div>
          <div style="display: flex; gap: var(--spacing-xs); flex-wrap: wrap; justify-content: center;">
            ${profile.skills.map(skill => `<span class="connection-badge">${skill}</span>`).join('')}
          </div>
          ${getProfileStatus(profile.id) === 'connected' ? `<span class="connected-badge">Connected</span>` : ''}
          <div class="action-buttons">
            ${getActionButton(profile.id)}
          </div>
        </div>
      `).join('');
    }

    function renderTab() {
      const gridMap = {
        'all': ['discoverGrid', p => true],
        'connections': ['connectionsGrid', p => connections.includes(p.id)],
        'pending': ['pendingGrid', p => pendingRequests.includes(p.id)],
        'following': ['followingGrid', p => following.includes(p.id)],
      };

      const [gridId, filterFn] = gridMap[currentTab];
      renderProfiles(gridId, filterFn);
    }

    window.connect = function(profileId) {
      if (!connections.includes(profileId)) {
        connections.push(profileId);
        pendingRequests = pendingRequests.filter(id => id !== profileId);
        following = following.filter(id => id !== profileId);
        saveConnections();
        renderTab();
        showToast('Connection added', 'success');
      }
    };

    window.removeConnection = function(profileId) {
      connections = connections.filter(id => id !== profileId);
      saveConnections();
      renderTab();
      showToast('Connection removed', 'success');
    };

    window.follow = function(profileId) {
      if (!following.includes(profileId)) {
        following.push(profileId);
        saveConnections();
        renderTab();
        showToast('Now following', 'success');
      }
    };

    window.unfollow = function(profileId) {
      following = following.filter(id => id !== profileId);
      saveConnections();
      renderTab();
      showToast('Unfollowed', 'success');
    };

    window.cancelRequest = function(profileId) {
      pendingRequests = pendingRequests.filter(id => id !== profileId);
      saveConnections();
      renderTab();
      showToast('Request cancelled', 'success');
    };

    document.querySelectorAll('.tab').forEach(tab => {
      tab.addEventListener('click', () => {
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.style.display = 'none');
        
        tab.classList.add('active');
        currentTab = tab.dataset.tab;
        document.querySelector(`[data-tab="${currentTab}"]`).style.display = 'block';
        renderTab();
      });
    });

    document.getElementById('searchInput').addEventListener('input', (e) => {
      const term = e.target.value.toLowerCase();
      const filtered = term ? p => 
        p.name.toLowerCase().includes(term) || 
        p.title.toLowerCase().includes(term)
      : () => true;
      
      renderProfiles('discoverGrid', filtered);
    });

    loadConnections();
    updateStats();
    renderTab();
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