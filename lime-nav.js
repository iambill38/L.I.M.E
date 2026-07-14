(function () {
  var MAIN_LINKS = [
    { href: 'LIMEDASHBOARD.html', label: 'Dashboard' },
    { href: 'LIMESEARCH.html', label: 'Search' },
    { href: 'LIMEMESSAGES.html', label: 'Messages' },
    { href: 'LIMEAPPLICATION.html', label: 'Applications' },
    { href: 'LIMEPORTFOLIOPROJECTS.html', label: 'Portfolio' }
  ];

  var USER_LINKS = [
    { href: 'LIMEPROFILE.html', label: 'Profile' },
    { href: 'LIMERESUME.html', label: 'Resume' },
    { href: 'LIMESETTINGS.html', label: 'Settings' },
    { href: 'LIMENOTIFICATIONS.html', label: 'Notifications' },
    { href: 'LIMESAVEDJOBS.html', label: 'Saved Jobs' }
  ];

  function currentPage() {
    var path = window.location.pathname.split('/').pop();
    return path || 'LIMEDASHBOARD.html';
  }

  function isActive(href) {
    return href.toLowerCase() === currentPage().toLowerCase();
  }

  function buildNav() {
    var page = currentPage();
    var mainLinksHtml = MAIN_LINKS.map(function (link) {
      return '<a href="' + link.href + '" class="lime-nav-link' +
        (isActive(link.href) ? ' active' : '') + '">' + link.label + '</a>';
    }).join('');

    var userLinksHtml = USER_LINKS.map(function (link) {
      return '<a href="' + link.href + '" class="lime-nav-dropdown-link' +
        (isActive(link.href) ? ' active' : '') + '">' + link.label + '</a>';
    }).join('');

    var userMenuActive = USER_LINKS.some(function (link) {
      return isActive(link.href);
    });

    return (
      '<nav class="lime-nav" id="site-nav" aria-label="Main navigation">' +
        '<a href="LIMEDASHBOARD.html" class="lime-nav-logo" aria-label="L.I.M.E home">L.I.M.E</a>' +
        '<button type="button" class="lime-nav-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="lime-nav-menu">' +
          '<span class="lime-nav-toggle-bar"></span>' +
          '<span class="lime-nav-toggle-bar"></span>' +
          '<span class="lime-nav-toggle-bar"></span>' +
        '</button>' +
        '<div class="lime-nav-menu" id="lime-nav-menu">' +
          '<div class="lime-nav-links">' + mainLinksHtml + '</div>' +
          '<div class="lime-nav-user-menu' + (userMenuActive ? ' is-active-page' : '') + '">' +
            '<button type="button" class="lime-nav-user-toggle" aria-label="Account menu" aria-expanded="false" aria-haspopup="true">' +
              '<span class="lime-nav-avatar">BK</span>' +
              '<span class="lime-nav-user-info">' +
                '<span class="lime-nav-user-name">Bill Kongolo</span>' +
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
