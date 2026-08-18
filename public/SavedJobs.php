<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saved Jobs - lime.com</title>
  
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="lime-background.css">
<link rel="stylesheet" href="css/LIMESAVEDJOBS.css">  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css"></head>
<body class="has-lime-nav">
  <nav id="lime-nav">
   
  </nav>

<div class="lime-bg-image"></div>
  <div class="lime-bg-overlay"></div>

  <div id="lime-nav-root"></div>


  <main class="main-content">
    <div class="content-header">
      <h1 class="page-title">Saved Jobs</h1>
      <p class="page-subtitle">Your favorite job opportunities for later</p>
    </div>

    <div id="jobsCompletion" style="margin-bottom: 1.5rem;"></div>

    <div class="filter-section">
      <div>
        <button class="filter-button active" data-filter="all">All</button>
        <button class="filter-button" data-filter="tech">Technology</button>
        <button class="filter-button" data-filter="design">Design</button>
        <button class="filter-button" data-filter="business">Business</button>
      </div>

      <div class="stats-group">
        <div class="stat-card">
          <div class="stat-value" id="totalSaved">0</div>
          <div class="stat-label">Total Saved</div>
        </div>
        <div class="stat-card">
          <div class="stat-value" id="recentCount">0</div>
          <div class="stat-label">This Week</div>
        </div>
      </div>
    </div>

    <div class="jobs-grid" id="jobsGrid">
    </div>

    <div class="empty-state" id="emptyState" style="display: none;">
      <div class="empty-state-icon">[No Bookmark Icon]</div>
      <h2 class="empty-state-title">No saved jobs yet</h2>
      <p class="empty-state-text">Start saving jobs from search to view them here</p>
      <a href="search.html" class="empty-state-button">Browse Jobs</a>
    </div>
  </main>
  <script src="lime-nav.js"></script>


  <script src="lime-applications-helper.js"></script>
  <script src="lime-profile-completeness.js"></script>
  <script>
    renderCompletionWidget("jobsCompletion", "compact");
  </script>
  <script src="lime-form-validation.js"></script>
  <script>
    const sampleJobs = [
      {
        id: 1,
        title: 'Senior Full Stack Engineer',
        company: 'TechCorp',
        logo: 'TC',
        location: 'San Francisco, CA',
        salary: '$150k - $200k',
        category: 'tech',
        savedDate: new Date(Date.now() - 2 * 24 * 60 * 60000),
      },
      {
        id: 2,
        title: 'Product Designer',
        company: 'TechCorp',
        logo: 'TC',
        location: 'San Francisco, CA',
        salary: '$120k - $160k',
        category: 'design',
        savedDate: new Date(Date.now() - 5 * 24 * 60 * 60000),
      },
      {
        id: 3,
        title: 'Junior Frontend Developer',
        company: 'StartupXYZ',
        logo: 'SX',
        location: 'Remote',
        salary: '$80k - $120k',
        category: 'tech',
        savedDate: new Date(Date.now() - 1 * 24 * 60 * 60000),
      },
      {
        id: 4,
        title: 'Business Analyst',
        company: 'CloudBase',
        logo: 'CB',
        location: 'Austin, TX',
        salary: '$100k - $140k',
        category: 'business',
        savedDate: new Date(Date.now() - 3 * 24 * 60 * 60000),
      },
      {
        id: 5,
        title: 'UX/UI Designer',
        company: 'Digital Innovations',
        logo: 'DI',
        location: 'Boston, MA',
        salary: '$110k - $150k',
        category: 'design',
        savedDate: new Date(Date.now() - 7 * 24 * 60 * 60000),
      },
      {
        id: 6,
        title: 'DevOps Engineer',
        company: 'TechCorp',
        logo: 'TC',
        location: 'San Francisco, CA',
        salary: '$130k - $180k',
        category: 'tech',
        savedDate: new Date(Date.now() - 4 * 24 * 60 * 60000),
      },
    ];

    let savedJobs = [...sampleJobs];
    let currentFilter = 'all';

    function loadSavedJobs() {
      const stored = localStorage.getItem('limeSavedJobs');
      if (stored) {
        try {
          const parsed = JSON.parse(stored);
          savedJobs = parsed.map(job => ({
            ...job,
            savedDate: new Date(job.savedDate),
          }));
        } catch (e) {
          savedJobs = [...sampleJobs];
        }
      }
    }

    function saveSavedJobs() {
      localStorage.setItem('limeSavedJobs', JSON.stringify(savedJobs));
    }

    function formatDate(date) {
      const now = new Date();
      const diffTime = now - date;
      const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

      if (diffDays === 0) return 'Today';
      if (diffDays === 1) return 'Yesterday';
      if (diffDays < 7) return `${diffDays} days ago`;

      return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
      });
    }

    function renderJobs() {
      const grid = document.getElementById('jobsGrid');
      const emptyState = document.getElementById('emptyState');

      let filtered = savedJobs;
      if (currentFilter !== 'all') {
        filtered = savedJobs.filter(job => job.category === currentFilter);
      }

      filtered.sort((a, b) => b.savedDate - a.savedDate);

      updateStats();

      if (filtered.length === 0) {
        grid.style.display = 'none';
        emptyState.style.display = 'block';
      } else {
        grid.style.display = 'grid';
        emptyState.style.display = 'none';

        grid.innerHTML = filtered.map(job => `
          <div class="job-card">
            <div class="job-header">
              <div class="company-logo">${job.logo}</div>
              <div>
                <div class="job-title">${job.title}</div>
                <div class="company-name">${job.company}</div>
              </div>
            </div>

            <div class="job-meta">
              <div class="meta-item">
                <span class="meta-icon">[L]</span>
                ${job.location}
              </div>
              <div class="job-salary">${job.salary}</div>
            </div>

            <div class="saved-date">
              Saved ${formatDate(job.savedDate)}
            </div>

            <div class="job-actions">
              <button class="btn btn-primary" onclick="handleApplyFromSaved(${job.id}, '${job.title}', '${job.company}', '${job.location}')">Apply Now</button>
              <button class="btn btn-danger" onclick="handleRemoveSaved(${job.id})">Remove</button>
            </div>
          </div>
        `).join('');
      }
    }

    function updateStats() {
      const total = savedJobs.length;
      const thisWeek = savedJobs.filter(job => {
        const weekAgo = new Date(Date.now() - 7 * 24 * 60 * 60000);
        return job.savedDate >= weekAgo;
      }).length;

      document.getElementById('totalSaved').textContent = total;
      document.getElementById('recentCount').textContent = thisWeek;
    }

    window.handleApplyFromSaved = function(id, title, company, location) {
      const success = applyToJob({
        companyName: company,
        companyLogo: company.substring(0, 2).toUpperCase(),
        role: title,
        location: location,
        salary: 'Competitive',
      });

      if (success) {
        showToast('Applied to ' + title + ' at ' + company, 'success');
      }
    };

    window.handleRemoveSaved = function(id) {
      savedJobs = savedJobs.filter(job => job.id !== id);
      saveSavedJobs();
      renderJobs();
      showToast('Job removed from saved', 'success');
    };

    window.saveJob = function(jobData) {
      const exists = savedJobs.some(job => job.title === jobData.title && job.company === jobData.company);
      if (exists) {
        showToast('Already saved this job', 'warning');
        return;
      }

      const newJob = {
        id: Math.max(...savedJobs.map(j => j.id), 0) + 1,
        ...jobData,
        savedDate: new Date(),
      };

      savedJobs.push(newJob);
      saveSavedJobs();
      showToast('Job saved to favorites', 'success');
    };

    document.querySelectorAll('.filter-button').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentFilter = btn.dataset.filter;
        renderJobs();
      });
    });

    loadSavedJobs();
    renderJobs();
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