<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume Manager - lime.com</title>
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
      max-width: 900px;
      margin: 76px auto 0;
      padding: var(--spacing-lg);
      position: relative;
      z-index: 1;
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
      margin-bottom: var(--spacing-xl);
    }

    .upload-section {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 2px dashed var(--color-lime);
      border-radius: 6px;
      padding: var(--spacing-xl);
      margin-bottom: var(--spacing-xl);
      text-align: center;
      transition: all var(--transition);
      cursor: pointer;
    }

    .upload-section:hover {
      border-color: var(--color-lime);
      background: rgba(0, 255, 65, 0.05);
    }

    .upload-section.dragover {
      border-color: var(--color-lime);
      background: rgba(0, 255, 65, 0.1);
    }

    .upload-icon {
      font-size: 2.5rem;
      margin-bottom: var(--spacing-md);
    }

    .upload-title {
      font-family: var(--font-display);
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-sm);
    }

    .upload-text {
      color: var(--color-grey-med);
      font-size: 0.95rem;
      margin-bottom: var(--spacing-lg);
    }

    .upload-input {
      display: none;
    }

    .upload-button {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      background: var(--color-lime);
      color: var(--color-black);
      border: none;
      border-radius: 6px;
      font-family: var(--font-display);
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      transition: all var(--transition);
    }

    .upload-button:hover {
      background: var(--color-lime-hover);
      transform: translateY(-2px);
    }

    .resumes-section {
      margin-bottom: var(--spacing-xl);
    }

    .section-title {
      font-family: var(--font-display);
      font-size: 1.2rem;
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-lg);
    }

    .resumes-list {
      display: flex;
      flex-direction: column;
      gap: var(--spacing-md);
    }

    .resume-item {
      background: rgba(15, 20, 29, 0.75);
      backdrop-filter: blur(20px);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      padding: var(--spacing-lg);
      display: flex;
      align-items: center;
      gap: var(--spacing-lg);
      transition: all var(--transition);
    }

    .resume-item:hover {
      border-color: rgba(0, 255, 65, 0.3);
      box-shadow: 0 8px 32px rgba(0, 255, 65, 0.12);
    }

    .resume-item.default {
      border-color: var(--color-lime);
      background: rgba(0, 255, 65, 0.05);
    }

    .file-icon {
      width: 50px;
      height: 50px;
      border-radius: 6px;
      background: rgba(0, 255, 65, 0.15);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      flex-shrink: 0;
    }

    .resume-info {
      flex: 1;
      min-width: 0;
    }

    .resume-name {
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: var(--spacing-xs);
      word-break: break-word;
    }

    .resume-meta {
      display: flex;
      gap: var(--spacing-md);
      font-size: 0.85rem;
      color: var(--color-grey-med);
      flex-wrap: wrap;
    }

    .default-badge {
      display: inline-block;
      padding: 0.25rem 0.75rem;
      background: var(--color-lime);
      color: var(--color-black);
      border-radius: 6px;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .resume-actions {
      display: flex;
      gap: var(--spacing-sm);
      flex-wrap: wrap;
    }

    .action-btn {
      padding: 0.5rem 1rem;
      background: transparent;
      border: 1px solid rgba(0, 255, 65, 0.3);
      color: var(--color-lime);
      border-radius: 6px;
      font-family: var(--font-body);
      font-weight: 600;
      font-size: 0.8rem;
      cursor: pointer;
      transition: all var(--transition);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      white-space: nowrap;
    }

    .action-btn:hover {
      background: rgba(0, 255, 65, 0.1);
      border-color: rgba(0, 255, 65, 0.6);
    }

    .action-btn-danger {
      color: #ff4141;
      border-color: rgba(255, 65, 65, 0.3);
    }

    .action-btn-danger:hover {
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
      font-size: 2.5rem;
      margin-bottom: var(--spacing-md);
    }

    .empty-state-text {
      color: var(--color-grey-med);
      font-size: 0.95rem;
    }

    @media (max-width: 768px) {
      .main-content {
        padding: var(--spacing-md);
      }

      .page-title {
        font-size: 1.5rem;
      }

      .resume-item {
        flex-direction: column;
        align-items: flex-start;
      }

      .resume-actions {
        width: 100%;
      }

      .action-btn {
        flex: 1;
      }
    }

    @media (max-width: 480px) {
      .page-title {
        font-size: 1.25rem;
      }

      .upload-section {
        padding: var(--spacing-lg);
      }

      .upload-icon {
        font-size: 2rem;
      }

      .resume-meta {
        flex-direction: column;
        gap: var(--spacing-xs);
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
  <link rel="stylesheet" href="assets/css/lime-nav.css">
  <link rel="stylesheet" href="assets/css/lime-background.css">
</head>
<body>
  <div class="lime-bg-image"></div>
  <div class="lime-bg-overlay"></div>

  <div id="lime-nav-root"></div>


  <main class="main-content">
    <h1 class="page-title">Resume Manager</h1>
    <p class="page-subtitle">Upload and manage your resumes for job applications</p>

    <div class="upload-section" id="uploadSection">
      <div class="upload-icon">[Upload]</div>
      <div class="upload-title">Upload Resume</div>
      <p class="upload-text">Drag and drop your resume or click to browse (PDF, DOC, DOCX)</p>
      <input type="file" id="fileInput" class="upload-input" accept=".pdf,.doc,.docx" />
      <button class="upload-button" onclick="document.getElementById('fileInput').click()">Select File</button>
    </div>

    <div class="resumes-section">
      <h2 class="section-title">Your Resumes</h2>
      <div class="resumes-list" id="resumesList">
      </div>
    </div>
  </main>
  <script src="lime-nav.js"></script>


  <script src="lime-applications-helper.js"></script>
  <script src="lime-form-validation.js"></script>
  <script>
    const sampleResumes = [
      {
        id: 1,
        name: 'Bill_Kongolo_Resume_2024.pdf',
        type: 'application/pdf',
        size: 245000,
        uploadDate: new Date(Date.now() - 5 * 24 * 60 * 60000),
        isDefault: true,
      },
      {
        id: 2,
        name: 'Bill_Kongolo_Resume_Tech.docx',
        type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        size: 125000,
        uploadDate: new Date(Date.now() - 15 * 24 * 60 * 60000),
        isDefault: false,
      },
    ];

    let resumes = [...sampleResumes];

    function loadResumes() {
      const stored = localStorage.getItem('limeResumes');
      if (stored) {
        try {
          const parsed = JSON.parse(stored);
          resumes = parsed.map(r => ({
            ...r,
            uploadDate: new Date(r.uploadDate),
          }));
        } catch (e) {
          resumes = [...sampleResumes];
        }
      }
    }

    function saveResumes() {
      localStorage.setItem('limeResumes', JSON.stringify(resumes));
    }

    function formatFileSize(bytes) {
      if (bytes === 0) return '0 Bytes';
      const k = 1024;
      const sizes = ['Bytes', 'KB', 'MB'];
      const i = Math.floor(Math.log(bytes) / Math.log(k));
      return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    }

    function formatDate(date) {
      const now = new Date();
      const diffDays = Math.floor((now - date) / (1000 * 60 * 60 * 24));

      if (diffDays === 0) return 'Today';
      if (diffDays === 1) return 'Yesterday';
      if (diffDays < 30) return `${diffDays} days ago`;

      return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
      });
    }

    function getFileIcon(filename) {
      if (filename.endsWith('.pdf')) return '[PDF]';
      if (filename.endsWith('.doc') || filename.endsWith('.docx')) return '[DOC]';
      return '[FILE]';
    }

    function renderResumes() {
      const list = document.getElementById('resumesList');

      if (resumes.length === 0) {
        list.innerHTML = `
          <div class="empty-state">
            <div class="empty-state-icon">[No Resume]</div>
            <p class="empty-state-text">No resumes uploaded yet. Upload your first resume to get started.</p>
          </div>
        `;
        return;
      }

      resumes.sort((a, b) => b.uploadDate - a.uploadDate);

      list.innerHTML = resumes.map(resume => `
        <div class="resume-item ${resume.isDefault ? 'default' : ''}">
          <div class="file-icon">${getFileIcon(resume.name)}</div>
          <div class="resume-info">
            <div class="resume-name">${resume.name}</div>
            <div class="resume-meta">
              <span>${formatFileSize(resume.size)}</span>
              <span>Uploaded ${formatDate(resume.uploadDate)}</span>
              ${resume.isDefault ? '<span class="default-badge">Default</span>' : ''}
            </div>
          </div>
          <div class="resume-actions">
            ${!resume.isDefault ? `<button class="action-btn" onclick="setDefault(${resume.id})">Set Default</button>` : ''}
            <button class="action-btn" onclick="downloadResume('${resume.name}')">Download</button>
            <button class="action-btn action-btn-danger" onclick="deleteResume(${resume.id})">Delete</button>
          </div>
        </div>
      `).join('');
    }

    window.setDefault = function(id) {
      resumes.forEach(r => r.isDefault = r.id === id);
      saveResumes();
      renderResumes();
      showToast('Resume set as default', 'success');
    };

    window.downloadResume = function(filename) {
      showToast('Downloading ' + filename, 'success');
    };

    window.deleteResume = function(id) {
      if (confirm('Are you sure you want to delete this resume?')) {
        resumes = resumes.filter(r => r.id !== id);
        saveResumes();
        renderResumes();
        showToast('Resume deleted', 'success');
      }
    };

    function addResume(filename, type) {
      const newResume = {
        id: Math.max(...resumes.map(r => r.id), 0) + 1,
        name: filename,
        type: type,
        size: Math.floor(Math.random() * 500000) + 50000,
        uploadDate: new Date(),
        isDefault: resumes.length === 0,
      };

      resumes.push(newResume);
      saveResumes();
      renderResumes();
      showToast('Resume uploaded successfully', 'success');
    }

    const fileInput = document.getElementById('fileInput');
    fileInput.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (file) {
        addResume(file.name, file.type);
        fileInput.value = '';
      }
    });

    const uploadSection = document.getElementById('uploadSection');
    uploadSection.addEventListener('dragover', (e) => {
      e.preventDefault();
      uploadSection.classList.add('dragover');
    });

    uploadSection.addEventListener('dragleave', () => {
      uploadSection.classList.remove('dragover');
    });

    uploadSection.addEventListener('drop', (e) => {
      e.preventDefault();
      uploadSection.classList.remove('dragover');
      
      const files = e.dataTransfer.files;
      if (files.length > 0) {
        const file = files[0];
        const validTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        
        if (validTypes.includes(file.type)) {
          addResume(file.name, file.type);
        } else {
          showToast('Please upload PDF, DOC, or DOCX file', 'error');
        }
      }
    });

    loadResumes();
    renderResumes();
  </script>
</body>
</html>