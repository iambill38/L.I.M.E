(function () {
  // ============================================================================
  // CHANGE #1: Added detection for company dashboard vs student portal
  // This allows the navigation to show different links based on which section
  // of the platform the user is in
  // ============================================================================
  
  // Student portal navigation (existing)
  var STUDENT_MAIN_LINKS = [
    { href: 'Analytics.php', label: 'Dashboard' },
    { href: 'search.php', label: 'Search' },
    { href: 'messages.php', label: 'Messages' },
    { href: 'application.php', label: 'Applications' },
    { href: 'portfolioprojects.php', label: 'Portfolio' }
  ];

  var STUDENT_USER_LINKS = [
    { href: 'profiles.php', label: 'Profile' },
    { href: 'resumes.php', label: 'Resume' },
    { href: 'savedjobs.php', label: 'Saved Jobs' },
    { href: 'notifications.php', label: 'Notifications' },
    { href: 'settings.php', label: 'Settings' }
  ];

  // ============================================================================
  // CHANGE #2: Added company/recruiter dashboard navigation
  // These are the navigation links specific to company recruiters managing jobs
  // ============================================================================
  var COMPANY_MAIN_LINKS = [
    { href: 'companydashboard.php', label: 'Dashboard' },
    { href: 'joblistings.php', label: 'Job Listings' },
    { href: 'applicants.php', label: 'Applicants' },
    { href: 'interviews.php', label: 'Interviews' },
    { href: 'shortlisted.php', label: 'Shortlisted' },
    { href: 'messages.php', label: 'Messages' },
    { href: 'analytics.php', label: 'Analytics' }
  ];

  var COMPANY_USER_LINKS = [
    { href: 'companyprofile.php', label: 'Company Profile' },
    { href: 'notifications.php', label: 'Notifications' },
    { href: 'settings.php', label: 'Settings' }
  ];

  // ============================================================================
  // CHANGE #3: Added function to detect if user is in company section
  // Checks if current page is a company dashboard page
  // ============================================================================
  function isCompanyDashboard() {
    var path = window.location.pathname.toLowerCase();
    var companyPages = [
      'companydashboard',
      'joblistings',
      'applicants',
      'interviews',
      'shortlisted',
      'companyprofile'
    ];
    
    return companyPages.some(function (page) {
      return path.includes(page);
    });
  }

  // ============================================================================
  // CHANGE #4: Function now selects correct navigation based on current section
  // ============================================================================
  function getNavigationLinks() {
    if (isCompanyDashboard()) {
      return {
        main: COMPANY_MAIN_LINKS,
        user: COMPANY_USER_LINKS
      };
    }
    return {
      main: STUDENT_MAIN_LINKS,
      user: STUDENT_USER_LINKS
    };
  }

  function getHomeLink() {
    return isCompanyDashboard() ? 'companydashboard.php' : 'studentdashboard.php';
  }

  function currentPage() {
    var path = window.location.pathname.split('/').pop();
    return path || (isCompanyDashboard() ? 'companydashboard.php' : 'studentdashboard.php');
  }
  
  function isActive(href) {
    return href.toLowerCase() === currentPage().toLowerCase();
  }

  function buildNav() {
    var page = currentPage();
    var navLinks = getNavigationLinks();
    var mainLinks = navLinks.main;
    var userLinks = navLinks.user;

    var mainLinksHtml = mainLinks.map(function (link) {
      return '<a href="' + link.href + '" class="lime-nav-link' +
        (isActive(link.href) ? ' active' : '') + '">' + link.label + '</a>';
    }).join('');

    var userLinksHtml = userLinks.map(function (link) {
      return '<a href="' + link.href + '" class="lime-nav-dropdown-link' +
        (isActive(link.href) ? ' active' : '') + '">' + link.label + '</a>';
    }).join('');

    var userMenuActive = userLinks.some(function (link) {
      return isActive(link.href);
    });

    return (
      '<nav class="lime-nav" id="site-nav" aria-label="Main navigation">' +
        '<a href="' + getHomeLink() + '" class="lime-nav-logo" aria-label="L.I.M.E home">L.I.M.E</a>' +
        '<button type="button" class="lime-nav-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="lime-nav-menu">' +
          '<span class="lime-nav-toggle-bar"></span>' +
          '<span class="lime-nav-toggle-bar"></span>' +
          '<span class="lime-nav-toggle-bar"></span>' +
        '</button>' +
        '<div class="lime-nav-menu" id="lime-nav-menu">' +
          '<div class="lime-nav-links">' + mainLinksHtml + '</div>' +
          '<div class="lime-nav-user-menu' + (userMenuActive ? ' is-active-page' : '') + '">' +
            '<button type="button" class="lime-nav-user-toggle" aria-label="Account menu" aria-expanded="false" aria-haspopup="true">' +
              '<span class="lime-nav-avatar">' + ((window.LIME_USER && window.LIME_USER.initials) || 'G') + '</span>' +
              '<span class="lime-nav-user-info">' +
                '<span class="lime-nav-user-name">' + ((window.LIME_USER && window.LIME_USER.name) || 'Guest') + '</span>' +
                '<span class="lime-nav-user-status">Online</span>' +
              '</span>' +
              '<svg class="lime-nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">' +
                '<path d="M6 9l6 6 6-6"></path>' +
              '</svg>' +
            '</button>' +
            '<div class="lime-nav-dropdown" hidden>' + userLinksHtml + '</div>' +
          '</div>' +
        '</div>' +
      '</nav>'
    );
  }

  function removeLegacyNavigation(root) {
    document.querySelectorAll('nav.lime-nav').forEach(function (nav) {
      if (!root.contains(nav)) {
        nav.parentNode.removeChild(nav);
      }
    });
  }

  function closeMobileMenu(root) {
    var menu = root.querySelector('.lime-nav-menu');
    var toggle = root.querySelector('.lime-nav-toggle');
    if (menu) menu.classList.remove('is-open');
    if (toggle) {
      toggle.setAttribute('aria-expanded', 'false');
      toggle.setAttribute('aria-label', 'Open menu');
    }
  }

  function closeUserMenu(root) {
    var userMenu = root.querySelector('.lime-nav-user-menu');
    var userToggle = root.querySelector('.lime-nav-user-toggle');
    var dropdown = root.querySelector('.lime-nav-dropdown');
    if (userMenu) userMenu.classList.remove('is-open');
    if (dropdown) dropdown.hidden = true;
    if (userToggle) userToggle.setAttribute('aria-expanded', 'false');
  }

  function init() {
    var root = document.getElementById('lime-nav-root');
    if (!root) return;

    removeLegacyNavigation(root);
    root.innerHTML = buildNav();
    document.body.classList.add('has-lime-nav');

    var toggle = root.querySelector('.lime-nav-toggle');
    var menu = root.querySelector('.lime-nav-menu');
    var userMenu = root.querySelector('.lime-nav-user-menu');
    var userToggle = root.querySelector('.lime-nav-user-toggle');
    var dropdown = root.querySelector('.lime-nav-dropdown');

    if (toggle && menu) {
      toggle.addEventListener('click', function () {
        var open = !menu.classList.contains('is-open');
        if (open) {
          menu.classList.add('is-open');
          toggle.setAttribute('aria-expanded', 'true');
          toggle.setAttribute('aria-label', 'Close menu');
        } else {
          closeMobileMenu(root);
        }
        closeUserMenu(root);
      });
    }

    if (userToggle && dropdown && userMenu) {
      userToggle.addEventListener('click', function (event) {
        event.stopPropagation();
        var open = dropdown.hidden;
        closeUserMenu(root);
        if (open) {
          dropdown.hidden = false;
          userMenu.classList.add('is-open');
          userToggle.setAttribute('aria-expanded', 'true');
        }
      });
    }

    document.addEventListener('click', function (event) {
      if (!root.contains(event.target)) {
        closeMobileMenu(root);
        closeUserMenu(root);
      }
    });

    root.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        closeMobileMenu(root);
        closeUserMenu(root);
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

async function syncLimeSessionUser() {
    try {
        const response = await fetch('session-user.php', {
            method: 'GET',
            credentials: 'same-origin',
            cache: 'no-store'
        });

        if (!response.ok) {
            return;
        }

        const data = await response.json();

        if (!data.loggedIn || !data.user) {
            return;
        }

        // Store user globally
        window.LIME_USER = data.user;

        const name = data.user.name || 'Student';
        const initial = name.charAt(0).toUpperCase();

        // Update name everywhere in navbar
        document.querySelectorAll('.lime-nav-user-name').forEach(function(element) {
            element.textContent = name;
        });

        // Update avatar initial
        document.querySelectorAll('.lime-nav-avatar').forEach(function(element) {
            element.textContent = initial;
        });

    } catch (error) {
        console.error('Unable to load L.I.M.E user session:', error);
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', syncLimeSessionUser);
} else {
    syncLimeSessionUser();
}