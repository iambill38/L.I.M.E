<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume Manager - lime.com</title>
  
  <link rel="stylesheet" href="lime-nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="lime-background.css">
<link rel="stylesheet" href="css/LIMERESUME.css">  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lime-theme.css"></head>
<body class="has-lime-nav">
  <nav id="lime-nav">
  
  </nav>

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