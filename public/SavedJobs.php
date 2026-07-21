<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saved Jobs - lime.com</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap');

    :root {
      --color-black: #0a0a0a;
      --color-navy: #0f1419;
      --color-white: #ffffff;
      --color-grey-light: #e8e8e8;
      --color-grey-med: #8a8a8a;
      --color-lime: #00ff41;
      --color-lime-hover: #00dd38;
      --color-border: rgba(0, 255, 65, 0.15);

      --font-display: 'Space Grotesk', sans-serif;
      --font-body: 'Inter', sans-serif;

      --spacing-xs: 0.5rem;
      --spacing-sm: 1rem;
      --spacing-md: 1.5rem;
      --spacing-lg: 2rem;
      --spacing-xl: 3rem;

      --transition: 150ms cubic-bezier(0.2, 0, 0.38, 0.9);
    }

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

    .user-avatar {
      width: 42px;
      height: 42px;
      border-radius: 4px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--color-black);
      font-weight: 700;
      font-size: 0.95rem;
      flex-shrink: 0;
    }

    .user-name {
      font-weight: 600;
      color: var(--color-white);
      font-size: 0.95rem;
    }

    .user-status {
      font-size: 0.75rem;
      color: var(--color-grey-med);
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

    .filter-section {
      display: flex;
      gap: var(--spacing-md);
      margin-bottom: var(--spacing-xl);
      flex-wrap: wrap;
      align-items: center;
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

    .jobs-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: var(--spacing-lg);
    }

    .job-card {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      padding: var(--spacing-lg);
      transition: all var(--transition);
      display: flex;
      flex-direction: column;
      gap: var(--spacing-md);
    }

    .job-card:hover {
      border-color: rgba(0, 255, 65, 0.3);
      box-shadow: 0 8px 32px rgba(0, 255, 65, 0.12);
    }

    .job-header {
      display: flex;
      align-items: flex-start;
      gap: var(--spacing-md);
    }

    .company-logo {
      width: 60px;
      height: 60px;
      border-radius: 6px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: var(--color-black);
      font-size: 1.1rem;
      flex-shrink: 0;
    }

    .job-title {
      font-family: var(--font-display);
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-xs);
    }

    .company-name {
      color: var(--color-grey-med);
      font-size: 0.9rem;
    }

    .job-meta {
      display: flex;
      flex-direction: column;
      gap: var(--spacing-sm);
      font-size: 0.9rem;
      color: var(--color-grey-light);
    }

    .meta-item {
      display: flex;
      align-items: center;
      gap: var(--spacing-sm);
    }

    .meta-icon {
      width: 20px;
      text-align: center;
      color: var(--color-lime);
    }

    .job-salary {
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-sm);
    }

    .saved-date {
      font-size: 0.8rem;
      color: var(--color-grey-med);
      padding-top: var(--spacing-md);
      border-top: 1px solid var(--color-border);
    }

    .job-actions {
      display: flex;
      gap: var(--spacing-sm);
      margin-top: auto;
    }

    .btn {
      flex: 1;
      padding: 0.6rem 1rem;
      border: none;
      border-radius: 6px;
      font-family: var(--font-body);
      font-weight: 600;
      font-size: 0.85rem;
      cursor: pointer;
      transition: all var(--transition);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      min-height: 36px;
    }

    .btn-primary {
      background: var(--color-lime);
      color: var(--color-black);
    }

    .btn-primary:hover {
      background: var(--color-lime-hover);
      transform: translateY(-2px);
    }

    .btn-danger {
      background: transparent;
      color: #ff4141;
      border: 1px solid rgba(255, 65, 65, 0.3);
    }

    .btn-danger:hover {
      background: rgba(255, 65, 65, 0.1);
      border-color: rgba(255, 65, 65, 0.6);
    }

    .empty-state {
      text-align: center;
      padding: var(--spacing-xl) var(--spacing-lg);
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
    }

    .empty-state-icon {
      font-size: 3rem;
      margin-bottom: var(--spacing-md);
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

    @media (max-width: 1024px) {
      .stats-group {
        margin-left: 0;
        width: 100%;
        justify-content: space-around;
        margin-top: var(--spacing-lg);
      }

      .stat-card {
        flex: 1;
      }

      .filter-section {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    @media (max-width: 768px) {
      .main-content {
        padding: var(--spacing-md);
      }

      .page-title {
        font-size: 1.5rem;
      }

      .jobs-grid {
        grid-template-columns: 1fr;
      }

      .job-actions {
        flex-direction: column;
      }

      .btn {
        width: 100%;
      }
    }

    @media (max-width: 480px) {
      .page-title {
        font-size: 1.25rem;
      }

      .job-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .stat-card {
        min-width: 100px;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
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
      <a href="LIMESEARCH.html" class="empty-state-button">Browse Jobs</a>
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
</body>
</html>