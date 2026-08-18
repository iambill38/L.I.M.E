<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>lime.com</title>
  
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="lime-background.css">
<link rel="stylesheet" href="css/LIMEMOCKCOMPANY.css">  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css"></head>
<body class="has-lime-nav">
  <nav id="lime-nav">
   
  </nav>

<div class="lime-bg-image"></div>
  <div class="lime-bg-overlay"></div>

  <div id="lime-nav-root"></div>

  <div class="page-container">
    <!-- Header -->
    <div class="page-header">
      <button class="back-button" onclick="window.history.back()" aria-label="Go back">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
          <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
      </button>
      <div class="breadcrumb">
        <a href="#search">Search</a> / <span id="companyNameBreadcrumb">TechCorp</span>
      </div>
    </div>

    <!-- Company Hero -->
    <div class="company-hero">
      <div class="company-logo-section">
        <div class="company-logo" id="companyLogo">TC</div>
      </div>
      <div class="company-info">
        <h1 class="company-name" id="companyName">TechCorp</h1>
        
        <div class="company-meta">
          <div class="meta-item"><span class="icon icon-location"></span><span id="companyLocation">San Francisco, CA</span></div>
          <div class="meta-item"><span class="icon icon-building"></span><span id="companySize">Growth (51-500)</span></div>
          <div class="meta-item"><span class="icon icon-calendar"></span><span id="companyFounded">Founded 2018</span></div>
          <div class="company-rating"><span class="icon icon-star"></span><span id="companyRating">4.8</span><span style="color: var(--color-grey-med);">(324 reviews)</span></div>
        </div>

        <p class="company-description" id="companyDescription">
          We're building next-generation cloud infrastructure solutions for enterprise clients. Our mission is to empower businesses with cutting-edge technology and exceptional support.
        </p>

        <div class="company-tags" id="companyTagsContainer">
          <div class="company-tag">Series B Funded</div>
          <div class="company-tag">Remote-First</div>
          <div class="company-tag">Fast Growing</div>
        </div>

        <div class="company-actions">
          <button class="action-button" onclick="handleConnect()">Connect</button>
          <button class="action-button action-button-secondary" onclick="handleVisitWebsite()">Visit Website</button>
        </div>
      </div>
    </div>

    <!-- About Section -->
    <section class="section">
      <h2 class="section-title">About TechCorp</h2>
      <div class="section-content">
        <p class="about-text">
          TechCorp is a Series B-funded cloud infrastructure company focused on making enterprise software deployment simpler and faster. Since 2018, we've grown to serve over 5,000 companies across 40+ countries.
        </p>
        <p class="about-text">
          Our team of 150+ engineers, designers, and product experts work collaboratively to solve real customer problems. We believe in radical transparency, continuous learning, and building products that matter.
        </p>
      </div>
    </section>

    <!-- Open Roles Section -->
    <section class="section">
      <h2 class="section-title">Open Positions</h2>
      <div class="roles-grid">
        <div class="role-card">
          <div class="role-level">Senior</div>
          <h3 class="role-title">Senior Full Stack Engineer</h3>
          <p class="role-description">Lead development of our cloud platform. Work on API design, system architecture, and mentoring junior engineers.</p>
          <div class="role-meta"><span class="icon icon-money"></span><span>$150k - $200k</span><span class="icon icon-location-sm"></span><span>San Francisco, CA</span></div>
          <button class="role-apply" onclick="handleCompanyApply(this, 'Senior Full Stack Engineer', 'TechCorp', 'San Francisco, CA')">Apply Now</button>
          <button class="role-apply" style="background: transparent; color: var(--color-lime); border: 1px solid rgba(0, 255, 65, 0.3);" onclick="handleSaveJobFromCompany('Senior Full Stack Engineer', 'TechCorp', 'San Francisco, CA', '$150k - $200k')">Save</button>
        </div>

        <div class="role-card">
          <div class="role-level">Mid-Level</div>
          <h3 class="role-title">Product Designer</h3>
          <p class="role-description">Design user-facing features for our web and mobile applications. Collaborate with product and engineering teams.</p>
          <div class="role-meta"><span class="icon icon-money"></span><span>$100k - $140k</span><span class="icon icon-location-sm"></span><span>San Francisco, CA</span></div>
          <button class="role-apply" onclick="handleCompanyApply(this, 'Product Designer', 'TechCorp', 'San Francisco, CA')">Apply Now</button>
          <button class="role-apply" style="background: transparent; color: var(--color-lime); border: 1px solid rgba(0, 255, 65, 0.3);" onclick="handleSaveJobFromCompany('Product Designer', 'TechCorp', 'San Francisco, CA', '$100k - $140k')">Save</button>
        </div>

        <div class="role-card">
          <div class="role-level">Junior</div>
          <h3 class="role-title">Junior Frontend Developer</h3>
          <p class="role-description">Build beautiful, responsive user interfaces. Great opportunity to grow your skills in a supportive environment.</p>
          <div class="role-meta"><span class="icon icon-money"></span><span>$80k - $110k</span><span class="icon icon-location-sm"></span><span>Remote</span></div>
          <button class="role-apply" onclick="handleCompanyApply(this, 'Junior Frontend Developer', 'TechCorp', 'Remote')">Apply Now</button>
          <button class="role-apply" style="background: transparent; color: var(--color-lime); border: 1px solid rgba(0, 255, 65, 0.3);" onclick="handleSaveJobFromCompany('Junior Frontend Developer', 'TechCorp', 'Remote', '$80k - $110k')">Save</button>
        </div>

        <div class="role-card">
          <div class="role-level">Senior</div>
          <h3 class="role-title">DevOps Engineer</h3>
          <p class="role-description">Design and maintain our Kubernetes infrastructure. Optimize deployment pipelines and ensure system reliability.</p>
          <div class="role-meta"><span class="icon icon-money"></span><span>$140k - $190k</span><span class="icon icon-location-sm"></span><span>San Francisco, CA</span></div>
          <button class="role-apply" onclick="handleCompanyApply(this, 'DevOps Engineer', 'TechCorp', 'San Francisco, CA')">Apply Now</button>
          <button class="role-apply" style="background: transparent; color: var(--color-lime); border: 1px solid rgba(0, 255, 65, 0.3);" onclick="handleSaveJobFromCompany('DevOps Engineer', 'TechCorp', 'San Francisco, CA', '$140k - $190k')">Save</button>
        </div>
      </div>
    </section>

    <!-- Tech Stack Section -->
    <section class="section">
      <h2 class="section-title">Tech Stack</h2>
      <div class="section-content">
        <div class="tech-grid">
          <div class="tech-item"><span class="tech-icon tech-react"></span><div class="tech-name">React</div></div>
          <div class="tech-item"><span class="tech-icon tech-node"></span><div class="tech-name">Node.js</div></div>
          <div class="tech-item"><span class="tech-icon tech-postgres"></span><div class="tech-name">PostgreSQL</div></div>
          <div class="tech-item"><span class="tech-icon tech-k8s"></span><div class="tech-name">Kubernetes</div></div>
          <div class="tech-item"><span class="tech-icon tech-ts"></span><div class="tech-name">TypeScript</div></div>
          <div class="tech-item"><span class="tech-icon tech-docker"></span><div class="tech-name">Docker</div></div>
          <div class="tech-item"><span class="tech-icon tech-aws"></span><div class="tech-name">AWS</div></div>
          <div class="tech-item"><span class="tech-icon tech-graphql"></span><div class="tech-name">GraphQL</div></div>
        </div>
      </div>
    </section>

    <!-- Perks & Benefits Section -->
    <section class="section">
      <h2 class="section-title">Why Join TechCorp?</h2>
      <div class="section-content">
        <div class="perks-grid">
          <div class="perk-card"><div class="perk-icon perk-remote"></div><div class="perk-title">100% Remote Options</div><div class="perk-description">Work from anywhere. Flexible location policies for all roles.</div></div>
          <div class="perk-card"><div class="perk-icon perk-learning"></div><div class="perk-title">Learning Budget</div><div class="perk-description">$3k annually for courses, conferences, and skill development.</div></div>
          <div class="perk-card"><div class="perk-icon perk-health"></div><div class="perk-title">Health & Wellness</div><div class="perk-description">100% covered health insurance + wellness stipend.</div></div>
          <div class="perk-card"><div class="perk-icon perk-office"></div><div class="perk-title">Home Office Setup</div><div class="perk-description">$1k equipment budget to set up your perfect workspace.</div></div>
          <div class="perk-card"><div class="perk-icon perk-equity"></div><div class="perk-title">Equity Package</div><div class="perk-description">Competitive stock options for all full-time employees.</div></div>
          <div class="perk-card"><div class="perk-icon perk-retreat"></div><div class="perk-title">Team Retreats</div><div class="perk-description">2 company retreats per year at amazing destinations.</div></div>
        </div>
      </div>
    </section>

    <!-- Reviews Section -->
    <section class="section">
      <h2 class="section-title">Student Reviews</h2>
      <div class="section-content">
        <div class="reviews-list">
          <div class="review-card">
            <div class="review-header">
              <div class="review-avatar">SM</div>
              <div class="review-info">
                <div class="review-name">Sarah Mitchell</div>
                <div class="review-meta">Senior Product Designer • Joined 6 months ago</div>
              </div>
              <div class="review-rating"><span class="star-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.63-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.45 4.73L5.82 21z"></path></svg></span><span class="sr-only">5 out of 5 stars</span></div>
            </div>
            <div class="review-text">
              TechCorp has been an incredible place to grow. The team is supportive, the work is meaningful, and I've learned more in 6 months than I did in years at my previous role.
            </div>
          </div>

          <div class="review-card">
            <div class="review-header">
              <div class="review-avatar">JL</div>
              <div class="review-info">
                <div class="review-name">James Lee</div>
                <div class="review-meta">Full Stack Engineer • Joined 1 year ago</div>
              </div>
              <div class="review-rating"><span class="star-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.63-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.45 4.73L5.82 21z"></path></svg></span><span class="sr-only">5 out of 5 stars</span></div>
            </div>
            <div class="review-text">
              Great company with a real focus on engineering excellence. The codebase is clean, the processes are well-organized, and everyone genuinely cares about the product.
            </div>
          </div>

          <div class="review-card">
            <div class="review-header">
              <div class="review-avatar">AJ</div>
              <div class="review-info">
                <div class="review-name">Alex Johnson</div>
                <div class="review-meta">Junior Frontend Developer • Joined 3 months ago</div>
              </div>
              <div class="review-rating"><span class="star-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.63-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.45 4.73L5.82 21z"></path></svg></span><span class="sr-only">5 out of 5 stars</span></div>
            </div>
            <div class="review-text">
              As a junior, I was worried about being the least experienced person in the room. But the mentorship and onboarding here is exceptional. Highly recommend!
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bottom CTA -->
    <section class="section" style="text-align: center;">
      <h2 class="section-title">Ready to Join the Team?</h2>
      <div class="section-content">
        <p style="margin-bottom: var(--spacing-lg); color: var(--color-grey-light); font-size: 1.05rem;">
          Check out our open positions and apply today. We're always excited to meet talented engineers and designers.
        </p>
        <button class="action-button" onclick="document.querySelector('.roles-grid').scrollIntoView({ behavior: 'smooth' })">
          View All Positions
        </button>
      </div>
    </section>
  </div>

  <script>
    // Handle connect button
    function handleConnect() {
      console.log('Connect action triggered');
      alert('Connection request sent! TechCorp will review your profile.');
    }

    // Handle website visit
    function handleVisitWebsite() {
      console.log('Visit website action triggered');
      // Replace with actual company website URL
      alert('Opening TechCorp website...');
    }

    // Handle apply to role
    function handleApply(roleName) {
      console.log('Apply to role:', roleName);
      alert(`You applied for: ${roleName}\n\nYour profile and portfolio will be reviewed by TechCorp.`);
    }

    // In a real implementation, fetch project data from API:
    // const projectId = new URLSearchParams(window.location.search).get('id');
    // fetch(`/api/projects/${projectId}`)
    //   .then(r => r.json())
    //   .then(data => {
    //     document.getElementById('projectTitle').textContent = data.title;
    //     document.getElementById('projectTagline').textContent = data.tagline;
    //     // ... populate all sections
    //   });

    // Handle apply from company page
    function handleCompanyApply(button, role, company, location) {
      const success = applyToJob({
        companyName: company,
        companyLogo: company.substring(0, 2).toUpperCase(),
        role: role,
        location: location,
        salary: 'Competitive'
      });

      if (success) {
        button.disabled = true;
        button.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;vertical-align:-2px;margin-right:4px;"><polyline points="20 6 9 17 4 12"></polyline></svg>Applied';
        button.style.opacity = '0.6';
      }
    }

    // Handle save job from company page
    function handleSaveJobFromCompany(role, company, location, salary) {
      saveJob({
        title: role,
        company: company,
        logo: company.substring(0, 2).toUpperCase(),
        location: location,
        salary: salary,
        category: 'tech',
      });
    }
  </script>
  <script src="lime-nav.js"></script>

  <script src="lime-applications-helper.js"></script>

  


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