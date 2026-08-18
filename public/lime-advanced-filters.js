// Advanced Job Search Filters System
// Provides comprehensive filtering capabilities for job search

const AdvancedFilters = {
  // Filter definitions
  filterOptions: {
    experienceLevel: [
      { id: 'entry', label: 'Entry Level', value: 'entry' },
      { id: 'mid', label: 'Mid Level', value: 'mid' },
      { id: 'senior', label: 'Senior', value: 'senior' },
    ],
    jobType: [
      { id: 'fulltime', label: 'Full-Time', value: 'full-time' },
      { id: 'parttime', label: 'Part-Time', value: 'part-time' },
      { id: 'internship', label: 'Internship', value: 'internship' },
      { id: 'contract', label: 'Contract', value: 'contract' },
      { id: 'freelance', label: 'Freelance', value: 'freelance' },
    ],
    workLocation: [
      { id: 'remote', label: 'Remote', value: 'remote' },
      { id: 'hybrid', label: 'Hybrid', value: 'hybrid' },
      { id: 'onsite', label: 'On-Site', value: 'on-site' },
    ],
    companySize: [
      { id: 'startup', label: 'Startup (1-50)', value: 'startup' },
      { id: 'small', label: 'Small (51-200)', value: 'small' },
      { id: 'medium', label: 'Medium (201-1000)', value: 'medium' },
      { id: 'large', label: 'Large (1000+)', value: 'large' },
    ],
    industry: [
      { id: 'tech', label: 'Technology', value: 'tech' },
      { id: 'finance', label: 'Finance', value: 'finance' },
      { id: 'healthcare', label: 'Healthcare', value: 'healthcare' },
      { id: 'ecommerce', label: 'E-Commerce', value: 'ecommerce' },
      { id: 'media', label: 'Media & Entertainment', value: 'media' },
      { id: 'consulting', label: 'Consulting', value: 'consulting' },
    ],
    salaryRange: [
      { id: '0-50k', label: '$0 - $50K', min: 0, max: 50000 },
      { id: '50-100k', label: '$50K - $100K', min: 50000, max: 100000 },
      { id: '100-150k', label: '$100K - $150K', min: 100000, max: 150000 },
      { id: '150k+', label: '$150K+', min: 150000, max: 999999 },
    ],
    postingDate: [
      { id: '7days', label: 'Last 7 Days', days: 7 },
      { id: '30days', label: 'Last 30 Days', days: 30 },
      { id: '90days', label: 'Last 90 Days', days: 90 },
    ],
  },

  // Current active filters
  activeFilters: {
    experienceLevel: [],
    jobType: [],
    workLocation: [],
    companySize: [],
    industry: [],
    salaryRange: [],
    postingDate: [],
  },

  // Toggle filter
  toggleFilter(filterType, filterId) {
    const filters = this.activeFilters[filterType];
    const index = filters.indexOf(filterId);
    
    if (index > -1) {
      filters.splice(index, 1);
    } else {
      filters.push(filterId);
    }
    
    this.saveFilters();
  },

  // Clear all filters
  clearAllFilters() {
    for (const key in this.activeFilters) {
      this.activeFilters[key] = [];
    }
    this.saveFilters();
  },

  // Get active filter count
  getActiveFilterCount() {
    let count = 0;
    for (const key in this.activeFilters) {
      count += this.activeFilters[key].length;
    }
    return count;
  },

  // Save filters to localStorage
  saveFilters() {
    localStorage.setItem('limeAdvancedFilters', JSON.stringify(this.activeFilters));
  },

  // Load filters from localStorage
  loadFilters() {
    const stored = localStorage.getItem('limeAdvancedFilters');
    if (stored) {
      try {
        this.activeFilters = JSON.parse(stored);
      } catch (e) {
        this.clearAllFilters();
      }
    }
  },

  // Check if job matches all active filters
  matchesFilters(job) {
    // Experience level filter
    if (this.activeFilters.experienceLevel.length > 0) {
      if (!this.activeFilters.experienceLevel.includes(job.experienceLevel)) {
        return false;
      }
    }

    // Job type filter
    if (this.activeFilters.jobType.length > 0) {
      if (!this.activeFilters.jobType.includes(job.jobType)) {
        return false;
      }
    }

    // Work location filter
    if (this.activeFilters.workLocation.length > 0) {
      if (!this.activeFilters.workLocation.includes(job.workLocation)) {
        return false;
      }
    }

    // Company size filter
    if (this.activeFilters.companySize.length > 0) {
      if (!this.activeFilters.companySize.includes(job.companySize)) {
        return false;
      }
    }

    // Industry filter
    if (this.activeFilters.industry.length > 0) {
      if (!this.activeFilters.industry.includes(job.industry)) {
        return false;
      }
    }

    // Salary range filter
    if (this.activeFilters.salaryRange.length > 0) {
      const jobSalaryMin = job.salaryMin || 0;
      let matchesSalary = false;
      
      for (const rangeId of this.activeFilters.salaryRange) {
        const range = this.filterOptions.salaryRange.find(r => r.id === rangeId);
        if (range && jobSalaryMin >= range.min && jobSalaryMin <= range.max) {
          matchesSalary = true;
          break;
        }
      }
      
      if (!matchesSalary) return false;
    }

    // Posting date filter
    if (this.activeFilters.postingDate.length > 0) {
      const jobDate = new Date(job.postedDate);
      const now = new Date();
      let matchesDate = false;
      
      for (const dateId of this.activeFilters.postingDate) {
        const dateOption = this.filterOptions.postingDate.find(d => d.id === dateId);
        if (dateOption) {
          const cutoffDate = new Date(now.getTime() - dateOption.days * 24 * 60 * 60 * 1000);
          if (jobDate >= cutoffDate) {
            matchesDate = true;
            break;
          }
        }
      }
      
      if (!matchesDate) return false;
    }

    return true;
  },
};

// Render filter panel
function renderFilterPanel(containerId) {
  const container = document.getElementById(containerId);
  if (!container) return;

  const filterCount = AdvancedFilters.getActiveFilterCount();

  container.innerHTML = `
    <div style="background: rgba(15, 20, 29, 0.75); border: 1px solid rgba(0, 255, 65, 0.15); border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <div style="font-family: 'Space Grotesk', sans-serif; font-size: 1.1rem; font-weight: 600; color: #ffffff;">
          Advanced Filters ${filterCount > 0 ? `<span style="color: #00ff41;">(${filterCount})</span>` : ''}
        </div>
        ${filterCount > 0 ? `<button onclick="clearAllFilters()" style="background: transparent; color: #00ff41; border: 1px solid rgba(0, 255, 65, 0.3); padding: 0.4rem 0.8rem; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em;">Clear All</button>` : ''}
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
        <!-- Experience Level -->
        <div>
          <div style="font-weight: 600; color: #ffffff; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Experience Level</div>
          ${AdvancedFilters.filterOptions.experienceLevel.map(option => `
            <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer; font-size: 0.9rem;">
              <input type="checkbox" ${AdvancedFilters.activeFilters.experienceLevel.includes(option.id) ? 'checked' : ''} onchange="toggleAdvancedFilter('experienceLevel', '${option.id}'); renderFilterPanel('filterPanel');" style="cursor: pointer; width: 16px; height: 16px;">
              ${option.label}
            </label>
          `).join('')}
        </div>

        <!-- Job Type -->
        <div>
          <div style="font-weight: 600; color: #ffffff; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Job Type</div>
          ${AdvancedFilters.filterOptions.jobType.map(option => `
            <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer; font-size: 0.9rem;">
              <input type="checkbox" ${AdvancedFilters.activeFilters.jobType.includes(option.value) ? 'checked' : ''} onchange="toggleAdvancedFilter('jobType', '${option.value}'); renderFilterPanel('filterPanel');" style="cursor: pointer; width: 16px; height: 16px;">
              ${option.label}
            </label>
          `).join('')}
        </div>

        <!-- Work Location -->
        <div>
          <div style="font-weight: 600; color: #ffffff; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Work Location</div>
          ${AdvancedFilters.filterOptions.workLocation.map(option => `
            <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer; font-size: 0.9rem;">
              <input type="checkbox" ${AdvancedFilters.activeFilters.workLocation.includes(option.value) ? 'checked' : ''} onchange="toggleAdvancedFilter('workLocation', '${option.value}'); renderFilterPanel('filterPanel');" style="cursor: pointer; width: 16px; height: 16px;">
              ${option.label}
            </label>
          `).join('')}
        </div>

        <!-- Company Size -->
        <div>
          <div style="font-weight: 600; color: #ffffff; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Company Size</div>
          ${AdvancedFilters.filterOptions.companySize.map(option => `
            <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer; font-size: 0.9rem;">
              <input type="checkbox" ${AdvancedFilters.activeFilters.companySize.includes(option.value) ? 'checked' : ''} onchange="toggleAdvancedFilter('companySize', '${option.value}'); renderFilterPanel('filterPanel');" style="cursor: pointer; width: 16px; height: 16px;">
              ${option.label}
            </label>
          `).join('')}
        </div>

        <!-- Industry -->
        <div>
          <div style="font-weight: 600; color: #ffffff; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Industry</div>
          ${AdvancedFilters.filterOptions.industry.map(option => `
            <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer; font-size: 0.9rem;">
              <input type="checkbox" ${AdvancedFilters.activeFilters.industry.includes(option.value) ? 'checked' : ''} onchange="toggleAdvancedFilter('industry', '${option.value}'); renderFilterPanel('filterPanel');" style="cursor: pointer; width: 16px; height: 16px;">
              ${option.label}
            </label>
          `).join('')}
        </div>

        <!-- Salary Range -->
        <div>
          <div style="font-weight: 600; color: #ffffff; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Salary Range</div>
          ${AdvancedFilters.filterOptions.salaryRange.map(option => `
            <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer; font-size: 0.9rem;">
              <input type="checkbox" ${AdvancedFilters.activeFilters.salaryRange.includes(option.id) ? 'checked' : ''} onchange="toggleAdvancedFilter('salaryRange', '${option.id}'); renderFilterPanel('filterPanel');" style="cursor: pointer; width: 16px; height: 16px;">
              ${option.label}
            </label>
          `).join('')}
        </div>

        <!-- Posting Date -->
        <div>
          <div style="font-weight: 600; color: #ffffff; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Posted Date</div>
          ${AdvancedFilters.filterOptions.postingDate.map(option => `
            <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer; font-size: 0.9rem;">
              <input type="checkbox" ${AdvancedFilters.activeFilters.postingDate.includes(option.id) ? 'checked' : ''} onchange="toggleAdvancedFilter('postingDate', '${option.id}'); renderFilterPanel('filterPanel');" style="cursor: pointer; width: 16px; height: 16px;">
              ${option.label}
            </label>
          `).join('')}
        </div>
      </div>
    </div>
  `;
}

// Global functions for filter interaction
window.toggleAdvancedFilter = function(filterType, filterId) {
  AdvancedFilters.toggleFilter(filterType, filterId);
  if (window.applyAdvancedFilters) {
    window.applyAdvancedFilters();
  }
};

window.clearAllFilters = function() {
  AdvancedFilters.clearAllFilters();
  renderFilterPanel('filterPanel');
  if (window.applyAdvancedFilters) {
    window.applyAdvancedFilters();
  }
};