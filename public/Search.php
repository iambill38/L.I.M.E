<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>lime.com</title>
  <style>
    /* ===== FONT IMPORTS ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap');

    /* ===== CSS VARIABLES ===== */
    :root {
      --color-black: #0a0a0a;
      --color-navy: #0f1419;
      --color-white: #ffffff;
      --color-grey-light: #e8e8e8;
      --color-grey-med: #8a8a8a;
      --color-lime: #00ff41;
      --color-lime-hover: #00dd38;
      --color-lime-glow: rgba(0, 255, 65, 0.2);
      --color-border: rgba(0, 255, 65, 0.15);

      --font-display: 'Space Grotesk', sans-serif;
      --font-body: 'Inter', sans-serif;
      --font-logo: 'Poppins', sans-serif;

      --spacing-xs: 0.5rem;
      --spacing-sm: 1rem;
      --spacing-md: 1.5rem;
      --spacing-lg: 2rem;
      --spacing-xl: 3rem;

      --transition: 150ms cubic-bezier(0.2, 0, 0.38, 0.9);
    }

    /* ===== RESET ===== */
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
      min-height: 100dvh;
      position: relative;
      overflow-x: hidden;
      overflow-y: auto;
    }


    /* ===== LAYOUT ===== */
    .page-layout {
      display: grid;
      grid-template-columns: 260px minmax(0, 1fr);
      min-height: 100dvh;
      position: relative;
      z-index: 1;
      align-items: start;
      width: 100%;
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

    .nav-user:hover {
      border-color: rgba(0, 255, 65, 0.15);
      background: rgba(0, 255, 65, 0.08);
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

    .page-layout {
      display: block;
      margin-top: 76px;
    }

    .sidebar {
      display: none;
    }

    .sidebar-logo {
      font-family: var(--font-logo);
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--color-lime);
      text-transform: uppercase;
      letter-spacing: -0.02em;
    }

    .nav-menu {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 0.7rem;
      padding: var(--spacing-sm) var(--spacing-md);
      border-radius: 6px;
      color: var(--color-grey-light);
      text-decoration: none;
      transition: all var(--transition);
      border: 1px solid transparent;
      font-weight: 500;
    }

    .nav-link:hover,
    .nav-link.active {
      background: rgba(0, 255, 65, 0.12);
      border-color: rgba(0, 255, 65, 0.2);
      color: var(--color-lime);
    }

    .nav-icon {
      width: 20px;
      height: 20px;
      flex-shrink: 0;
    }

    .sidebar-footer {
      margin-top: auto;
      padding-top: 1rem;
      border-top: 1px solid var(--color-border);
    }

    .user-profile {
      display: flex;
      align-items: center;
      gap: 0.7rem;
      padding: 0.6rem;
      border-radius: 6px;
      text-decoration: none;
      color: inherit;
      background: rgba(255,255,255,0.03);
    }

    .user-avatar {
      width: 38px;
      height: 38px;
      border-radius: 4px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--color-black);
      font-weight: 700;
      font-size: 0.9rem;
    }

    .user-name {
      font-weight: 600;
      color: var(--color-white);
      font-size: 0.9rem;
    }

    .user-status {
      font-size: 0.75rem;
      color: var(--color-grey-med);
    }

    .search-container {
      display: flex;
      gap: var(--spacing-lg);
      max-width: 1400px;
      width: 100%;
      margin: 0 auto;
      padding: var(--spacing-xl);
      position: relative;
      z-index: 1;
      align-items: flex-start;
      min-width: 0;
    }

    /* ===== SIDEBAR FILTERS ===== */
    .filters-panel {
      flex: 0 0 320px;
      min-width: 280px;
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      padding: var(--spacing-lg);
      position: sticky;
      top: calc(76px + 1rem);
      align-self: flex-start;
      max-height: calc(100vh - 92px);
      overflow: auto;
    }

    .filters-title {
      font-family: var(--font-display);
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-md);
    }

    .filter-group {
      margin-bottom: var(--spacing-lg);
      padding-bottom: var(--spacing-lg);
      border-bottom: 1px solid var(--color-border);
    }

    .filter-group:last-child {
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }

    .filter-label {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--color-white);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-bottom: var(--spacing-sm);
      display: block;
    }

    .filter-input {
      width: 100%;
      padding: var(--spacing-sm);
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(0, 255, 65, 0.15);
      border-radius: 6px;
      color: var(--color-white);
      font-family: var(--font-body);
      font-size: 0.9rem;
      transition: all var(--transition);
      backdrop-filter: blur(10px);
    }

    .filter-input::placeholder {
      color: var(--color-grey-med);
    }

    .filter-input:hover {
      border-color: rgba(0, 255, 65, 0.3);
      background: rgba(255, 255, 255, 0.08);
    }

    .filter-input:focus {
      outline: none;
      border-color: var(--color-lime);
      background: rgba(0, 255, 65, 0.08);
      box-shadow: 0 0 0 3px rgba(0, 255, 65, 0.15);
    }

    .filter-options {
      display: flex;
      flex-direction: column;
      gap: var(--spacing-sm);
    }

    .filter-option {
      display: flex;
      align-items: center;
      gap: var(--spacing-sm);
    }

    .filter-checkbox {
      width: 20px;
      height: 20px;
      accent-color: var(--color-lime);
      cursor: pointer;
      transition: all var(--transition);
    }

    .filter-checkbox:hover {
      transform: scale(1.1);
    }

    .filter-checkbox:focus-visible {
      outline: 2px solid var(--color-lime);
      outline-offset: 2px;
    }

    .filter-option label {
      flex: 1;
      color: var(--color-grey-light);
      cursor: pointer;
      font-size: 0.9rem;
      transition: color var(--transition);
    }

    .filter-option input:checked + label {
      color: var(--color-lime);
      font-weight: 500;
    }

    .filter-count {
      color: var(--color-grey-med);
      font-size: 0.8rem;
      margin-left: auto;
    }

    .clear-filters {
      width: 100%;
      padding: var(--spacing-sm);
      background: transparent;
      border: 1px solid rgba(0, 255, 65, 0.2);
      color: var(--color-grey-light);
      border-radius: 6px;
      font-family: var(--font-body);
      font-size: 0.9rem;
      cursor: pointer;
      transition: all var(--transition);
      margin-top: var(--spacing-md);
    }

    .clear-filters:hover {
      background: rgba(0, 255, 65, 0.1);
      border-color: rgba(0, 255, 65, 0.3);
      color: var(--color-lime);
    }

    /* ===== MAIN CONTENT ===== */
    .search-content {
      display: flex;
      flex-direction: column;
      min-width: 0;
    }

    /* ===== HEADER ===== */
    .search-header {
      margin-bottom: var(--spacing-xl);
    }

    .search-title {
      font-family: var(--font-display);
      font-size: 2rem;
      font-weight: 700;
      color: var(--color-white);
      margin-bottom: var(--spacing-xs);
      letter-spacing: -0.01em;
    }

    .search-subtitle {
      color: var(--color-grey-med);
      font-size: 0.95rem;
    }

    /* ===== SEARCH BAR ===== */
    .search-bar-wrapper {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      padding: var(--spacing-md);
      margin-bottom: var(--spacing-xl);
      display: flex;
      gap: var(--spacing-sm);
      align-items: center;
    }

    .search-icon {
      width: 24px;
      height: 24px;
      color: var(--color-lime);
      flex-shrink: 0;
    }

    .search-input {
      flex: 1;
      background: transparent;
      border: none;
      color: var(--color-white);
      font-family: var(--font-body);
      font-size: 1rem;
      outline: none;
    }

    .search-input::placeholder {
      color: var(--color-grey-med);
    }

    .search-input:focus {
      color: var(--color-white);
    }

    /* ===== ACTIVE FILTERS ===== */
    .active-filters {
      display: flex;
      flex-wrap: wrap;
      gap: var(--spacing-sm);
      margin-bottom: var(--spacing-lg);
      align-items: center;
    }

    .active-filter-label {
      font-size: 0.85rem;
      color: var(--color-grey-med);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      font-weight: 600;
    }

    .filter-badge {
      display: inline-flex;
      align-items: center;
      gap: var(--spacing-xs);
      padding: 0.4rem 0.8rem;
      background: rgba(0, 255, 65, 0.15);
      border: 1px solid rgba(0, 255, 65, 0.3);
      border-radius: 6px;
      color: var(--color-lime);
      font-size: 0.85rem;
      font-weight: 500;
      transition: all var(--transition);
    }

    .filter-badge:hover {
      background: rgba(0, 255, 65, 0.25);
      border-color: var(--color-lime);
    }

    .filter-badge-remove {
      background: none;
      border: none;
      color: inherit;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 18px;
      height: 18px;
      transition: transform var(--transition);
      padding: 0;
    }

    .filter-badge-remove:hover {
      transform: scale(1.2);
    }

    /* ===== RESULTS SECTION ===== */
    .results-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: var(--spacing-lg);
      flex-wrap: wrap;
      gap: var(--spacing-md);
    }

    .results-count {
      font-size: 0.95rem;
      color: var(--color-grey-med);
    }

    .results-count strong {
      color: var(--color-lime);
      font-weight: 600;
    }

    .sort-control {
      display: flex;
      gap: var(--spacing-sm);
      align-items: center;
    }

    .sort-label {
      font-size: 0.9rem;
      color: var(--color-grey-med);
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .sort-select {
      padding: 0.5rem 1rem;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(0, 255, 65, 0.15);
      border-radius: 6px;
      color: var(--color-white);
      font-family: var(--font-body);
      font-size: 0.9rem;
      cursor: pointer;
      transition: all var(--transition);
    }

    .sort-select:hover {
      border-color: rgba(0, 255, 65, 0.3);
      background: rgba(255, 255, 255, 0.08);
    }

    .sort-select:focus {
      outline: none;
      border-color: var(--color-lime);
      background: rgba(0, 255, 65, 0.08);
    }

    /* ===== RESULTS GRID ===== */
    .results-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(280px, 1fr));
      gap: 1rem;
    }

    .opportunity-card {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      padding: 1rem;
      transition: all var(--transition);
      cursor: pointer;
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .opportunity-card:hover {
      border-color: rgba(0, 255, 65, 0.3);
      box-shadow: 0 8px 24px rgba(0, 255, 65, 0.12);
      transform: translateY(-2px);
    }

    .opportunity-header {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .company-logo-small {
      width: 50px;
      height: 50px;
      border-radius: 6px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: var(--color-black);
      font-size: 1rem;
      flex-shrink: 0;
    }

    .opportunity-info {
      flex: 1;
    }

    .company-name {
      font-family: var(--font-display);
      font-size: 1rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-xs);
    }

    .opportunity-title {
      font-size: 0.95rem;
      color: var(--color-lime);
      font-weight: 500;
      margin-bottom: var(--spacing-xs);
    }

    .opportunity-meta {
      display: flex;
      gap: var(--spacing-md);
      font-size: 0.8rem;
      color: var(--color-grey-med);
      flex-wrap: wrap;
    }

    .meta-item {
      display: flex;
      align-items: center;
      gap: var(--spacing-xs);
    }

    .opportunity-desc {
      font-size: 0.9rem;
      color: var(--color-grey-light);
      line-height: 1.5;
      margin-bottom: var(--spacing-md);
      flex: 1;
    }

    .opportunity-tags {
      display: flex;
      flex-wrap: wrap;
      gap: var(--spacing-xs);
      margin-bottom: var(--spacing-md);
    }

    .opportunity-tag {
      display: inline-block;
      background: rgba(0, 255, 65, 0.1);
      color: var(--color-lime);
      padding: 0.35rem 0.75rem;
      border-radius: 6px;
      font-size: 0.8rem;
      font-weight: 500;
    }

    .opportunity-cta {
      width: 100%;
      padding: var(--spacing-md);
      background: var(--color-lime);
      color: var(--color-black);
      border: none;
      border-radius: 6px;
      font-family: var(--font-display);
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all var(--transition);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: auto;
    }

    .opportunity-cta:hover {
      background: var(--color-lime-hover);
      transform: translateY(-2px);
      box-shadow: 0 4px 16px rgba(0, 255, 65, 0.3);
    }

    .opportunity-cta:focus-visible {
      outline: 2px solid var(--color-lime);
      outline-offset: 2px;
    }

    /* ===== NO RESULTS ===== */
    .no-results {
      text-align: center;
      padding: var(--spacing-xl);
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
    }

    .no-results-icon {
      font-size: 3rem;
      margin-bottom: var(--spacing-md);
    }

    .no-results-title {
      font-family: var(--font-display);
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-sm);
    }

    .no-results-text {
      color: var(--color-grey-med);
      margin-bottom: var(--spacing-lg);
    }

    .no-results-button {
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
      transition: all var(--transition);
      text-decoration: none;
      text-transform: uppercase;
    }

    .no-results-button:hover {
      background: var(--color-lime-hover);
      transform: translateY(-2px);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
      .page-layout {
        grid-template-columns: 1fr;
      }

      .sidebar {
        width: 100%;
        min-height: auto;
        border-right: none;
        border-bottom: 1px solid var(--color-border);
        padding-bottom: var(--spacing-lg);
      }

      .search-container {
        grid-template-columns: 1fr;
        padding: var(--spacing-lg);
      }

      .filters-panel {
        position: relative;
        top: 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--spacing-md);
        padding: var(--spacing-lg);
        height: auto;
      }

      .filter-group {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
      }

      .clear-filters {
        grid-column: 1 / -1;
      }

      .results-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      }
    }

    @media (max-width: 768px) {
      .search-container {
        grid-template-columns: 1fr;
        padding: var(--spacing-md);
        gap: var(--spacing-md);
      }

      .filters-panel {
        display: none;
      }

      .search-title {
        font-size: 1.5rem;
      }

      .results-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .sort-control {
        width: 100%;
      }

      .sort-select {
        flex: 1;
      }

      .results-grid {
        grid-template-columns: 1fr;
      }

      .search-bar-wrapper {
        padding: var(--spacing-md);
      }

      .search-input {
        font-size: 16px; /* Prevents iOS zoom */
      }
    }

    @media (max-width: 480px) {
      .search-container {
        padding: var(--spacing-md);
        gap: var(--spacing-md);
      }

      .search-title {
        font-size: 1.25rem;
      }

      .search-subtitle {
        font-size: 0.85rem;
      }

      .search-header {
        margin-bottom: var(--spacing-md);
      }

      .active-filters {
        margin-bottom: var(--spacing-md);
      }

      .results-count {
        font-size: 0.85rem;
      }

      .opportunity-card {
        padding: var(--spacing-md);
      }

      .company-logo-small {
        width: 48px;
        height: 48px;
        font-size: 1rem;
      }

      .company-name {
        font-size: 0.95rem;
      }

      .opportunity-title {
        font-size: 0.9rem;
      }

      .opportunity-desc {
        font-size: 0.85rem;
      }
    }

    /* ===== ACCESSIBILITY ===== */
    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }

      .orb {
        animation: none !important;
      }
    }
  </style>
  <link rel="stylesheet" href="assets/css/lime-nav.css">
  <link rel="stylesheet" href="assets/css/lime-background.css">
</head>
<body>
  <div class="lime-bg-image"></div>
  <div class="lime-bg-overlay"></div>

  <div id="lime-nav-root"></div>


  <div class="page-layout">
    <div id="searchCompletion" style="margin-bottom: 1.5rem;"></div>

    <div class="search-container">
      <!-- Filters Panel (Desktop) now on the left side -->
      <aside class="filters-panel">
      <h2 class="filters-title">Filters</h2>

      <!-- Search Filter -->
      <div class="filter-group">
        <label for="companySearch" class="filter-label">Company</label>
        <input 
          type="text" 
          id="companySearch" 
          class="filter-input" 
          placeholder="Search company"
        >
      </div>

      <!-- Industry Filter -->
      <div class="filter-group">
        <label class="filter-label">Industry</label>
        <div class="filter-options">
          <div class="filter-option">
            <input type="checkbox" id="industry-saas" class="filter-checkbox" data-filter="industry" value="SaaS">
            <label for="industry-saas">SaaS</label>
            <span class="filter-count">12</span>
          </div>
          <div class="filter-option">
            <input type="checkbox" id="industry-fintech" class="filter-checkbox" data-filter="industry" value="Fintech">
            <label for="industry-fintech">Fintech</label>
            <span class="filter-count">8</span>
          </div>
          <div class="filter-option">
            <input type="checkbox" id="industry-ai" class="filter-checkbox" data-filter="industry" value="AI & ML">
            <label for="industry-ai">AI & ML</label>
            <span class="filter-count">15</span>
          </div>
          <div class="filter-option">
            <input type="checkbox" id="industry-ecommerce" class="filter-checkbox" data-filter="industry" value="E-Commerce">
            <label for="industry-ecommerce">E-Commerce</label>
            <span class="filter-count">6</span>
          </div>
          <div class="filter-option">
            <input type="checkbox" id="industry-consulting" class="filter-checkbox" data-filter="industry" value="Consulting">
            <label for="industry-consulting">Consulting</label>
            <span class="filter-count">10</span>
          </div>
        </div>
      </div>

      <!-- Role Type Filter -->
      <div class="filter-group">
        <label class="filter-label">Role Type</label>
        <div class="filter-options">
          <div class="filter-option">
            <input type="checkbox" id="role-internship" class="filter-checkbox" data-filter="role" value="Internship">
            <label for="role-internship">Internship</label>
            <span class="filter-count">18</span>
          </div>
          <div class="filter-option">
            <input type="checkbox" id="role-entry" class="filter-checkbox" data-filter="role" value="Entry Level">
            <label for="role-entry">Entry Level</label>
            <span class="filter-count">22</span>
          </div>
          <div class="filter-option">
            <input type="checkbox" id="role-contract" class="filter-checkbox" data-filter="role" value="Contract">
            <label for="role-contract">Contract</label>
            <span class="filter-count">9</span>
          </div>
          <div class="filter-option">
            <input type="checkbox" id="role-freelance" class="filter-checkbox" data-filter="role" value="Freelance">
            <label for="role-freelance">Freelance</label>
            <span class="filter-count">14</span>
          </div>
        </div>
      </div>

      <!-- Location Filter -->
      <div class="filter-group">
        <label for="locationSearch" class="filter-label">Location</label>
        <input 
          type="text" 
          id="locationSearch" 
          class="filter-input" 
          placeholder="City or region"
        >
      </div>

      <button class="clear-filters" id="clearFiltersBtn">Clear All Filters</button>
    </aside>

      <!-- Main Content -->
      <div class="search-content">
      <div class="search-header">
        <h1 class="search-title">Discover Opportunities</h1>
        <p class="search-subtitle">Browse companies and find your next opportunity</p>
      </div>

      <!-- Search Bar -->
      <div class="search-bar-wrapper">
        <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="m21 21-4.35-4.35"></path>
        </svg>
        <input 
          type="search" 
          id="mainSearch" 
          class="search-input" 
          placeholder="Search companies, roles, or skills..."
          autocomplete="off"
        >
      </div>

      <!-- Active Filters Display -->
      <div id="activeFiltersContainer" class="active-filters" style="display: none;">
        <span class="active-filter-label">Active:</span>
        <div id="activeFiltersList"></div>
      </div>

      <!-- Results Header -->
      <div class="results-header">
        <div class="results-count">
          Found <strong id="resultCount">24</strong> opportunities
        </div>
        <div class="sort-control">
          <label for="sortBy" class="sort-label">Sort by:</label>
          <select id="sortBy" class="sort-select">
            <option value="relevant">Most Relevant</option>
            <option value="recent">Most Recent</option>
            <option value="popular">Most Popular</option>
            <option value="rating">Highest Rated</option>
          </select>
        </div>
      </div>

      <!-- Results Grid -->
      <div id="resultsGrid" class="results-grid">
        <!-- Results will be rendered here by JavaScript -->
      </div>

      <!-- No Results State -->
      <div id="noResults" class="no-results" style="display: none;">
        <div class="no-results-icon"><span class="icon icon-search-large"></span></div>
        <h3 class="no-results-title">No opportunities found</h3>
        <p class="no-results-text">Try adjusting your filters or search terms</p>
        <button class="no-results-button" id="resetSearchBtn">Reset Search</button>
      </div>
    </div>
  </div>
//SAMPLE DATA
  <script>
    // Sample data
    const opportunities = [
      {
        id: 1,
        company: 'LimeMockCompany',
        logo: 'LM',
        title: 'Frontend Developer',
        industry: 'SaaS',
        role: 'Entry Level',
        location: 'San Francisco, CA',
        description: 'Join our growing team to build cutting-edge web applications using React and TypeScript.',
        tags: ['React', 'TypeScript', 'CSS'],
        url: 'LIMEMOCKCOMPANY.html', // Only this opportunity is connected today
      },
      {
        id: 2,
        company: 'StartupXYZ',
        logo: 'SX',
        title: 'Full Stack Intern',
        industry: 'Fintech',
        role: 'Internship',
        location: 'Remote',
        description: 'Work on fintech solutions and learn from experienced engineers. Great mentorship.',
        tags: ['Node.js', 'React', 'SQL'],
      },
      {
        id: 3,
        company: 'Digital Innovations',
        logo: 'DI',
        title: 'AI/ML Engineer',
        industry: 'AI & ML',
        role: 'Entry Level',
        location: 'Boston, MA',
        description: 'Build machine learning models for real-world applications. Strong team culture.',
        tags: ['Python', 'TensorFlow', 'MLOps'],
      },
      {
        id: 4,
        company: 'CloudBase',
        logo: 'CB',
        title: 'Backend Developer',
        industry: 'SaaS',
        role: 'Entry Level',
        location: 'Austin, TX',
        description: 'Develop scalable backend systems using Go and Kubernetes. Remote-friendly.',
        tags: ['Go', 'Kubernetes', 'PostgreSQL'],
      },
      {
        id: 5,
        company: 'Vision Enterprise',
        logo: 'VE',
        title: 'UI/UX Designer Contract',
        industry: 'Consulting',
        role: 'Contract',
        location: 'New York, NY',
        description: 'Short-term contract to redesign our product interfaces. Flexible schedule.',
        tags: ['Figma', 'UI Design', 'User Research'],
      },
      {
        id: 6,
        company: 'NextGen Labs',
        logo: 'NX',
        title: 'DevOps Engineer',
        industry: 'AI & ML',
        role: 'Entry Level',
        location: 'Seattle, WA',
        description: 'Manage cloud infrastructure and CI/CD pipelines. Learning opportunity.',
        tags: ['AWS', 'Docker', 'CI/CD'],
      },
      {
        id: 7,
        company: 'ShopHub',
        logo: 'SH',
        title: 'E-Commerce Developer',
        industry: 'E-Commerce',
        role: 'Entry Level',
        location: 'Los Angeles, CA',
        description: 'Build features for our online marketplace platform. Growing team.',
        tags: ['React', 'Node.js', 'Payment APIs'],
      },
      {
        id: 8,
        company: 'PayFlow',
        logo: 'PF',
        title: 'Software Engineer Freelance',
        industry: 'Fintech',
        role: 'Freelance',
        location: 'Remote',
        description: 'Freelance opportunities for experienced developers. Project-based work.',
        tags: ['JavaScript', 'APIs', 'Security'],
      },
      {
        id: 9,
        company: 'DesignStudio',
        logo: 'DS',
        title: 'Junior Developer',
        industry: 'Consulting',
        role: 'Entry Level',
        location: 'Chicago, IL',
        description: 'Join our creative team building custom solutions for clients.',
        tags: ['React', 'Tailwind CSS', 'Next.js'],
      },
      {
        id: 10,
        company: 'DataFlow',
        logo: 'DF',
        title: 'Data Science Intern',
        industry: 'AI & ML',
        role: 'Internship',
        location: 'Remote',
        description: 'Learn data science from industry experts. Work on real datasets.',
        tags: ['Python', 'Pandas', 'Data Visualization'],
      },
      {
        id: 11,
        company: 'EcoTech',
        logo: 'ET',
        title: 'Full Stack Developer',
        industry: 'SaaS',
        role: 'Entry Level',
        location: 'Portland, OR',
        description: 'Build sustainable tech solutions. Mission-driven company.',
        tags: ['React', 'Python', 'PostgreSQL'],
      },
      {
        id: 12,
        company: 'FinanceHub',
        logo: 'FH',
        title: 'Software Engineer',
        industry: 'Fintech',
        role: 'Entry Level',
        location: 'Remote',
        description: 'Work on financial platforms. Competitive salary and benefits.',
        tags: ['Java', 'Spring Boot', 'Microservices'],
      },
    ];

    let filteredResults = [...opportunities];
    const activeFilters = {
      search: '',
      company: '',
      industries: [],
      roles: [],
      location: '',
    };

    // Render opportunities
    function renderResults() {
      const grid = document.getElementById('resultsGrid');
      const noResults = document.getElementById('noResults');
      const resultCount = document.getElementById('resultCount');

      if (filteredResults.length === 0) {
        grid.style.display = 'none';
        noResults.style.display = 'block';
      } else {
        grid.style.display = 'grid';
        noResults.style.display = 'none';
        resultCount.textContent = filteredResults.length;

        grid.innerHTML = filteredResults
          .map(
            (opp) => `
          <article class="opportunity-card">
            <div class="opportunity-header">
              <div class="company-logo-small">${opp.logo}</div>
              <div class="opportunity-info">
                <div class="company-name">${opp.company}</div>
                <div class="opportunity-title">${opp.title}</div>
              </div>
            </div>
            <div class="opportunity-meta">
              <div class="meta-item"><span class="icon icon-location"></span>${opp.location}</div>
              <div class="meta-item"><span class="icon icon-company"></span>${opp.industry}</div>
              <div class="meta-item"><span class="icon icon-role"></span>${opp.role}</div>
            </div>
            <p class="opportunity-desc">${opp.description}</p>
            <div class="opportunity-tags">
              ${opp.tags.map((tag) => `<span class="opportunity-tag">${tag}</span>`).join('')}
            </div>
            <button class="opportunity-cta" onclick="handleSearchApply(this, '${opp.company}', '${opp.title}', '${opp.location}')">Apply Now</button>
            <button class="opportunity-cta" style="background: transparent; color: var(--color-lime); border: 1px solid rgba(0, 255, 65, 0.3);" onclick="handleSaveJob('${opp.company}', '${opp.title}', '${opp.location}', '${opp.salary || 'Competitive'}')" title="Save for later">Save</button>
          </article>
        `
          )
          .join('');
      }
    }

    // Update active filters display
    function updateActiveFiltersDisplay() {
      const container = document.getElementById('activeFiltersContainer');
      const list = document.getElementById('activeFiltersList');
      const allActive = [
        ...activeFilters.industries.map((ind) => ({ type: 'industry', value: ind })),
        ...activeFilters.roles.map((role) => ({ type: 'role', value: role })),
      ];

      if (allActive.length === 0) {
        container.style.display = 'none';
      } else {
        container.style.display = 'flex';
        list.innerHTML = allActive
          .map(
            (filter) => `
          <div class="filter-badge">
            ${filter.value}
            <button class="filter-badge-remove" data-type="${filter.type}" data-value="${filter.value}" aria-label="Remove ${filter.value} filter"><span class="icon icon-close-sm"></span></button>
          </div>
        `
          )
          .join('');

        // Add remove listeners
        document.querySelectorAll('.filter-badge-remove').forEach((btn) => {
          btn.addEventListener('click', () => {
            const type = btn.dataset.type;
            const value = btn.dataset.value;
            if (type === 'industry') {
              activeFilters.industries = activeFilters.industries.filter((v) => v !== value);
              document.getElementById(`industry-${value.toLowerCase().replace(/[^a-z]/g, '')}`).checked = false;
            } else if (type === 'role') {
              activeFilters.roles = activeFilters.roles.filter((v) => v !== value);
              document.getElementById(`role-${value.toLowerCase().replace(/[^a-z]/g, '')}`).checked = false;
            }
            filterResults();
          });
        });
      }
    }

    // Filter results
    function filterResults() {
      filteredResults = opportunities.filter((opp) => {
        const matchSearch =
          opp.company.toLowerCase().includes(activeFilters.search.toLowerCase()) ||
          opp.title.toLowerCase().includes(activeFilters.search.toLowerCase()) ||
          opp.tags.some((tag) => tag.toLowerCase().includes(activeFilters.search.toLowerCase()));

        const matchCompany = activeFilters.company === '' || opp.company.toLowerCase().includes(activeFilters.company.toLowerCase());

        const matchIndustry =
          activeFilters.industries.length === 0 || activeFilters.industries.includes(opp.industry);

        const matchRole = activeFilters.roles.length === 0 || activeFilters.roles.includes(opp.role);

        const matchLocation =
          activeFilters.location === '' ||
          opp.location.toLowerCase().includes(activeFilters.location.toLowerCase());

        return matchSearch && matchCompany && matchIndustry && matchRole && matchLocation;
      });

      renderResults();
      updateActiveFiltersDisplay();
    }

    // Event listeners
    document.getElementById('mainSearch').addEventListener('input', (e) => {
      activeFilters.search = e.target.value;
      filterResults();
    });

    document.getElementById('companySearch').addEventListener('input', (e) => {
      activeFilters.company = e.target.value;
      filterResults();
    });

    document.getElementById('locationSearch').addEventListener('input', (e) => {
      activeFilters.location = e.target.value;
      filterResults();
    });

    document.querySelectorAll('.filter-checkbox').forEach((checkbox) => {
      checkbox.addEventListener('change', (e) => {
        const filter = e.target.dataset.filter;
        const value = e.target.value;

        if (filter === 'industry') {
          if (e.target.checked) {
            activeFilters.industries.push(value);
          } else {
            activeFilters.industries = activeFilters.industries.filter((v) => v !== value);
          }
        } else if (filter === 'role') {
          if (e.target.checked) {
            activeFilters.roles.push(value);
          } else {
            activeFilters.roles = activeFilters.roles.filter((v) => v !== value);
          }
        }

        filterResults();
      });
    });

    document.getElementById('clearFiltersBtn').addEventListener('click', () => {
      activeFilters.industries = [];
      activeFilters.roles = [];
      activeFilters.company = '';
      activeFilters.location = '';
      activeFilters.search = '';

      document.querySelectorAll('.filter-checkbox').forEach((cb) => (cb.checked = false));
      document.getElementById('companySearch').value = '';
      document.getElementById('locationSearch').value = '';
      document.getElementById('mainSearch').value = '';

      filteredResults = [...opportunities];
      renderResults();
      updateActiveFiltersDisplay();
    });

    document.getElementById('resetSearchBtn').addEventListener('click', () => {
      document.getElementById('clearFiltersBtn').click();
    });

    document.getElementById('sortBy').addEventListener('change', (e) => {
      const sort = e.target.value;
      if (sort === 'recent') {
        filteredResults.sort((a, b) => b.id - a.id);
      } else if (sort === 'popular') {
        filteredResults.sort(() => Math.random() - 0.5);
      } else if (sort === 'rating') {
        filteredResults.sort(() => Math.random() - 0.5);
      } else {
        filteredResults = opportunities.filter(
          (opp) =>
            opp.company.toLowerCase().includes(activeFilters.search.toLowerCase()) ||
            opp.title.toLowerCase().includes(activeFilters.search.toLowerCase())
        );
      }
      renderResults();
    });

    // Initial render
    renderResults();

    // Handle apply from search results
    function handleSearchApply(button, company, role, location) {
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

    // Handle save job from search results
    function handleSaveJob(company, role, location, salary) {
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
  <script src="lime-profile-completeness.js"></script>
  <script>
    renderCompletionWidget("searchCompletion", "compact");
  </script>
</body>
</html>