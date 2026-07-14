// Profile Completeness Tracker System
// Tracks and displays profile completion status across LIME

const ProfileCompletion = {
  // Define profile sections and their required fields
  sections: {
    personal: {
      name: 'Personal Info',
      icon: '[USER]',
      required: ['firstName', 'lastName', 'email', 'phone'],
      complete: false,
      weight: 20,
    },
    professional: {
      name: 'Professional',
      icon: '[BRIEFCASE]',
      required: ['title', 'company', 'experience'],
      complete: false,
      weight: 25,
    },
    education: {
      name: 'Education',
      icon: '[GRADUATION]',
      required: ['school', 'degree', 'field'],
      complete: false,
      weight: 15,
    },
    skills: {
      name: 'Skills',
      icon: '[STAR]',
      required: ['skills'],
      complete: false,
      weight: 20,
      minItems: 3,
    },
    resume: {
      name: 'Resume',
      icon: '[FILE]',
      required: ['resume'],
      complete: false,
      weight: 10,
    },
    social: {
      name: 'Social Links',
      icon: '[LINK]',
      required: ['social'],
      complete: false,
      weight: 10,
    },
  },

  // Sample profile data
  profileData: {
    firstName: 'Bill',
    lastName: 'Kongolo',
    email: 'bill@example.com',
    phone: '+1 (555) 123-4567',
    title: 'Full Stack Engineer',
    company: 'TechCorp',
    experience: '3 years',
    school: 'University of Tech',
    degree: 'Bachelor of Science',
    field: 'Computer Science',
    skills: ['JavaScript', 'React', 'Node.js', 'Python', 'AWS'],
    resume: true,
    social: {
      linkedin: 'linkedin.com/in/billkongolo',
      github: 'github.com/billkongolo',
    },
  },

  // Calculate completion percentage
  calculateCompletion() {
    let totalWeight = 0;
    let completedWeight = 0;

    for (const [key, section] of Object.entries(this.sections)) {
      totalWeight += section.weight;
      
      let isComplete = true;
      for (const field of section.required) {
        if (key === 'skills') {
          // Check if skills array has minimum items
          if (!this.profileData[field] || this.profileData[field].length < (section.minItems || 1)) {
            isComplete = false;
            break;
          }
        } else if (key === 'social') {
          // Check if at least one social link exists
          if (!this.profileData[field] || Object.values(this.profileData[field]).length === 0) {
            isComplete = false;
            break;
          }
        } else {
          if (!this.profileData[field]) {
            isComplete = false;
            break;
          }
        }
      }

      section.complete = isComplete;
      if (isComplete) {
        completedWeight += section.weight;
      }
    }

    return Math.round((completedWeight / totalWeight) * 100);
  },

  // Get completion status for each section
  getStatus() {
    const completion = this.calculateCompletion();
    const sections = [];

    for (const [key, section] of Object.entries(this.sections)) {
      sections.push({
        key: key,
        name: section.name,
        icon: section.icon,
        complete: section.complete,
        weight: section.weight,
      });
    }

    return {
      percentage: completion,
      sections: sections,
      isComplete: completion === 100,
    };
  },

  // Get incomplete sections
  getIncompleteSections() {
    return this.getStatus().sections.filter(s => !s.complete);
  },

  // Get next suggested section to complete
  getNextSection() {
    const incomplete = this.getIncompleteSections();
    if (incomplete.length === 0) return null;
    
    return incomplete[0];
  },
};

// Render profile completeness widget
function renderCompletionWidget(containerId, size = 'normal') {
  const container = document.getElementById(containerId);
  if (!container) return;

  const status = ProfileCompletion.getStatus();
  const percentage = status.percentage;

  if (size === 'compact') {
    // Small version for dashboard
    container.innerHTML = `
      <div style="padding: 1.5rem; background: rgba(15, 20, 29, 0.75); border: 1px solid rgba(0, 255, 65, 0.15); border-radius: 6px;">
        <div style="font-family: 'Space Grotesk', sans-serif; font-size: 0.95rem; font-weight: 600; color: #ffffff; margin-bottom: 0.75rem;">
          Profile Strength
        </div>
        <div style="width: 100%; height: 8px; background: rgba(255, 255, 255, 0.1); border-radius: 3px; overflow: hidden; margin-bottom: 0.75rem;">
          <div style="width: ${percentage}%; height: 100%; background: #00ff41; transition: width 0.3s ease;"></div>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <span style="font-size: 1.5rem; font-weight: 700; color: #00ff41;">${percentage}%</span>
          <a href="LIMEPROFILE.html" style="color: #00ff41; text-decoration: none; font-size: 0.85rem; font-weight: 600;">Complete Profile</a>
        </div>
      </div>
    `;
  } else {
    // Full version for profile page
    container.innerHTML = `
      <div style="background: rgba(15, 20, 29, 0.75); border: 1px solid rgba(0, 255, 65, 0.15); border-radius: 6px; padding: 2rem;">
        <div style="font-family: 'Space Grotesk', sans-serif; font-size: 1.5rem; font-weight: 700; color: #ffffff; margin-bottom: 0.5rem;">
          Profile Completeness
        </div>
        <p style="color: #8a8a8a; font-size: 0.95rem; margin-bottom: 1.5rem;">
          Complete your profile to increase visibility to employers
        </p>

        <div style="margin-bottom: 2rem;">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
            <span style="font-weight: 600; color: #ffffff;">Overall Progress</span>
            <span style="font-size: 1.8rem; font-weight: 700; color: #00ff41;">${percentage}%</span>
          </div>
          <div style="width: 100%; height: 12px; background: rgba(255, 255, 255, 0.1); border-radius: 3px; overflow: hidden;">
            <div style="width: ${percentage}%; height: 100%; background: linear-gradient(90deg, #00ff41, #00dd38); transition: width 0.3s ease;"></div>
          </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
          ${status.sections.map(section => `
            <div style="display: flex; align-items: center; padding: 0.75rem; background: rgba(255, 255, 255, 0.03); border-radius: 6px; border-left: 3px solid ${section.complete ? '#00ff41' : 'transparent'};">
              <span style="font-size: 1rem; margin-right: 0.75rem;">${section.icon}</span>
              <div style="flex: 1;">
                <div style="font-weight: 600; color: ${section.complete ? '#00ff41' : '#e8e8e8'}; font-size: 0.95rem;">
                  ${section.name}
                </div>
              </div>
              <span style="font-size: 1.2rem;">${section.complete ? '[CHECK]' : '[CIRCLE]'}</span>
            </div>
          `).join('')}
        </div>

        ${!status.isComplete ? `
          <div style="margin-top: 1.5rem; padding: 1rem; background: rgba(0, 255, 65, 0.1); border: 1px solid rgba(0, 255, 65, 0.2); border-radius: 6px;">
            <div style="font-weight: 600; color: #00ff41; margin-bottom: 0.5rem;">
              Next: Complete ${ProfileCompletion.getNextSection().name}
            </div>
            <p style="font-size: 0.9rem; color: #8a8a8a; margin-bottom: 0.75rem;">
              Completing all sections helps employers understand your skills and experience better.
            </p>
            <button onclick="scrollToSection('${ProfileCompletion.getNextSection().key}')" style="padding: 0.6rem 1.2rem; background: #00ff41; color: #0a0a0a; border: none; border-radius: 6px; font-weight: 600; font-size: 0.85rem; cursor: pointer; text-transform: uppercase; letter-spacing: 0.05em;">
              Continue Editing
            </button>
          </div>
        ` : `
          <div style="margin-top: 1.5rem; padding: 1rem; background: rgba(126, 211, 33, 0.1); border: 1px solid rgba(126, 211, 33, 0.2); border-radius: 6px; text-align: center;">
            <span style="color: #7ED321; font-weight: 600;">Your profile is complete!</span>
          </div>
        `}
      </div>
    `;
  }
}

// Scroll to section helper
window.scrollToSection = function(sectionKey) {
  const element = document.getElementById('section-' + sectionKey);
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' });
  }
};