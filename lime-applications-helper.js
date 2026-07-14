// ===== LIME Applications Helper =====
// This file contains shared functions for the application tracking system
// Include this in any page that needs Apply functionality

// Toast notification system
const LIME_TOAST_ICONS = {
  success: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>',
  error: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>',
  warning: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>'
};

function showToast(message, type = 'success') {
  // Remove existing toast
  const existing = document.getElementById('limeToast');
  if (existing) existing.remove();

  // Create toast
  const toast = document.createElement('div');
  toast.id = 'limeToast';
  toast.style.cssText = `
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    display: flex;
    align-items: center;
    gap: 0.6rem;
    padding: 1rem 1.5rem;
    background: ${type === 'success' ? '#00ff41' : type === 'error' ? '#ff4141' : '#f5a623'};
    color: ${type === 'success' ? '#0a0a0a' : '#ffffff'};
    border-radius: 4px;
    font-weight: 600;
    z-index: 9999;
    animation: slideInUp 0.3s ease-out;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    font-family: 'Inter', sans-serif;
    font-size: 0.95rem;
  `;

  const icon = LIME_TOAST_ICONS[type] || LIME_TOAST_ICONS.success;
  toast.innerHTML = `<span style="width:18px;height:18px;flex-shrink:0;display:inline-flex;">${icon}</span><span>${message}</span>`;
  document.body.appendChild(toast);

  // Auto remove after 3 seconds
  setTimeout(() => {
    toast.style.animation = 'slideOutDown 0.3s ease-out';
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}

// Add toast animation styles to document
function addToastStyles() {
  if (document.getElementById('limeToastStyles')) return;
  
  const style = document.createElement('style');
  style.id = 'limeToastStyles';
  style.textContent = `
    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    @keyframes slideOutDown {
      from {
        opacity: 1;
        transform: translateY(0);
      }
      to {
        opacity: 0;
        transform: translateY(20px);
      }
    }
  `;
  document.head.appendChild(style);
}

// Initialize toast styles on page load
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', addToastStyles);
} else {
  addToastStyles();
}

// Main apply function
function applyToJob(jobData) {
  // Load existing applications
  let applications = [];
  try {
    const stored = localStorage.getItem('limeApplications');
    if (stored) {
      applications = JSON.parse(stored);
    }
  } catch (e) {
    console.error('Error loading applications:', e);
  }

  // Check if already applied
  const alreadyApplied = applications.some(
    (app) =>
      app.companyName === jobData.companyName &&
      app.role === jobData.role
  );

  if (alreadyApplied) {
    showToast('You have already applied to this role!', 'warning');
    return false;
  }

  // Create new application
  const newApplication = {
    id: Math.max(...applications.map((a) => a.id), 0) + 1,
    companyName: jobData.companyName,
    companyLogo: jobData.companyLogo || jobData.companyName.substring(0, 2).toUpperCase(),
    role: jobData.role,
    location: jobData.location || 'Remote',
    salary: jobData.salary || 'Competitive',
    status: 'applied',
    appliedDate: new Date().toISOString().split('T')[0],
    lastUpdate: new Date().toISOString().split('T')[0],
  };

  // Add to applications
  applications.push(newApplication);

  // Save to localStorage
  try {
    localStorage.setItem('limeApplications', JSON.stringify(applications));
    showToast(`Applied to ${jobData.role} at ${jobData.companyName}!`, 'success');
    return true;
  } catch (e) {
    console.error('Error saving application:', e);
    showToast('Error saving application. Please try again.', 'error');
    return false;
  }
}

// Function to check if user has applied
function hasApplied(companyName, role) {
  try {
    const stored = localStorage.getItem('limeApplications');
    if (!stored) return false;

    const applications = JSON.parse(stored);
    return applications.some(
      (app) => app.companyName === companyName && app.role === role
    );
  } catch (e) {
    return false;
  }
}