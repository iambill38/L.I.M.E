<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Jobs - lime.com</title>
  
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="css/LIMESEARCH.css">  <link rel="stylesheet" href="lime-background.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css"></head>
<body class="has-lime-nav">
  <nav id="lime-nav">
  
  </nav>

<!-- Global Navigation -->
  <div id="lime-nav-root"></div>

  <main class="search-container">
    <div class="page-header">
      <h1 class="page-title">Job Search</h1>
      <p class="page-subtitle">Explore opportunities that match your skills and interests</p>
    </div>

    <!-- Search Filters -->
    <div class="search-filters">
      <div class="filter-group">
        <label for="searchQuery" class="filter-label">Search by Title, Company, or Skills</label>
        <input 
          type="text" 
          id="searchQuery" 
          class="filter-input" 
          placeholder="e.g., Frontend Developer, React, Full-time..."
        >
      </div>

      <div class="filter-group">
        <label class="filter-label">Job Type</label>
        <div class="filter-buttons">
          <button class="filter-btn active" data-type="all">All</button>
          <button class="filter-btn" data-type="full-time">Full-time</button>
          <button class="filter-btn" data-type="part-time">Part-time</button>
          <button class="filter-btn" data-type="contract">Contract</button>
          <button class="filter-btn" data-type="internship">Internship</button>
        </div>
      </div>

      <div class="filter-group">
        <label for="location" class="filter-label">Location</label>
        <input 
          type="text" 
          id="location" 
          class="filter-input" 
          placeholder="City, Remote, etc..."
        >
      </div>

      <div class="search-actions">
        <button class="btn-secondary" onclick="resetFilters()">Reset</button>
        <button class="btn-primary" onclick="performSearch()">Search Jobs</button>
      </div>
    </div>

    <!-- Results Section -->
    <div class="search-results">
      <div class="results-header">
        <div class="results-count">
          Found <strong id="resultCount">0</strong> jobs matching your criteria
        </div>
      </div>

      <div id="resultsContainer">
        <div class="empty-state">
          <div class="empty-state-title">Start Your Search</div>
          <p>Refine your filters and search to find the perfect job opportunity</p>
        </div>
      </div>
    </div>
  </main>

  <script src="lime-nav.js"></script>
  <script>
    const SAMPLE_JOBS = [
      {
        id: 1,
        title: 'Frontend Developer',
        company: 'TechCorp',
        type: 'full-time',
        location: 'Remote',
        description: 'Join our growing team as a Frontend Developer with React expertise.',
        tags: ['React', 'JavaScript', 'CSS']
      },
      {
        id: 2,
        title: 'Full Stack Engineer',
        company: 'StartupXYZ',
        type: 'full-time',
        location: 'San Francisco, CA',
        description: 'Build scalable web applications with modern technologies.',
        tags: ['Node.js', 'React', 'MongoDB']
      }
    ];

    function performSearch() {
      const query = document.getElementById('searchQuery').value.toLowerCase();
      const filtered = SAMPLE_JOBS.filter(job => 
        job.title.toLowerCase().includes(query) || 
        job.company.toLowerCase().includes(query)
      );
      
      document.getElementById('resultCount').textContent = filtered.length;
      const container = document.getElementById('resultsContainer');
      
      if (filtered.length === 0) {
        container.innerHTML = '<div class="empty-state"><div class="empty-state-title">No Results</div></div>';
      } else {
        container.innerHTML = filtered.map(job => `
          <div class="job-card">
            <div class="job-company">${job.company}</div>
            <h3 class="job-title">${job.title}</h3>
            <p class="job-description">${job.description}</p>
            <div class="job-tags">${job.tags.map(t => `<span class="job-tag">${t}</span>`).join('')}</div>
          </div>
        `).join('');
      }
    }

    function resetFilters() {
      document.getElementById('searchQuery').value = '';
      document.getElementById('resultsContainer').innerHTML = '<div class="empty-state"><div class="empty-state-title">Start Your Search</div></div>';
    }
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
