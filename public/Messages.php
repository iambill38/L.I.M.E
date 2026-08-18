<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Messages - L.I.M.E</title>
  <link rel="stylesheet" href="lime-theme.css" />
  <link rel="stylesheet" href="lime-nav.css" />
  <link rel="stylesheet" href="lime-background.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    html,
    body {
      width: 100%;
      min-height: 100%;
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: #0F1419;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
      min-height: 0;
      padding-top: 90px; /* adjust if your nav is fixed */
    }

    .messages-wrapper {
      display: flex;
      flex: 1;
      min-height: 0;
      background: transparent;
    }

    .sidebar {
      width: 300px;
      background: rgba(26, 31, 46, 0.5);
      border-right: 1px solid rgba(207, 224, 231, 0.1);
      display: flex;
      flex-direction: column;
      padding: 1.5rem;
      overflow-y: auto;
    }

    .sidebar-title {
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1rem;
    }

    .search-box {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.6rem 0.8rem;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(207, 224, 231, 0.15);
      border-radius: 6px;
      margin-bottom: 1.5rem;
    }

    .search-box input {
      flex: 1;
      background: transparent;
      border: none;
      color: var(--text-primary);
      font-family: 'Inter', sans-serif;
      font-size: 0.9rem;
    }

    .search-box input::placeholder {
      color: var(--text-muted);
    }

    .search-box input:focus {
      outline: none;
    }

    .search-box i {
      color: var(--text-muted);
      width: 16px;
      height: 16px;
    }

    .conversations-list {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .conversation-item {
      padding: 1rem;
      background: rgba(83, 113, 121, 0.2);
      border: 1px solid rgba(207, 224, 231, 0.1);
      border-radius: 6px;
      cursor: pointer;
      transition: all 150ms ease;
    }

    .conversation-item:hover {
      background: rgba(83, 113, 121, 0.3);
      border-color: rgba(207, 224, 231, 0.2);
    }

    .conversation-name {
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 0.25rem;
      font-size: 0.95rem;
    }

    .conversation-preview {
      font-size: 0.8rem;
      color: var(--text-muted);
    }

    .chat-panel {
      flex: 1;
      display: flex;
      flex-direction: column;
      background: transparent;
      min-height: 0;
    }

    .chat-header {
      padding: 1.5rem;
      background: rgba(26, 31, 46, 0.4);
      border-bottom: 1px solid rgba(207, 224, 231, 0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .chat-user {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .chat-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--accent), rgba(83, 113, 121, 0.6));
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text-primary);
      font-weight: 600;
      font-size: 0.9rem;
    }

    .chat-user-info h3 {
      font-size: 1rem;
      font-weight: 600;
      color: var(--text-primary);
      margin: 0;
    }

    .chat-user-status {
      font-size: 0.8rem;
      color: var(--text-muted);
    }

    .chat-user-status.online {
      color: #4ade80;
    }

    .chat-actions {
      display: flex;
      gap: 0.5rem;
    }

    .action-btn {
      width: 36px;
      height: 36px;
      border: 1px solid rgba(207, 224, 231, 0.15);
      background: rgba(255, 255, 255, 0.04);
      border-radius: 6px;
      color: var(--text-secondary);
      cursor: pointer;
      transition: all 150ms ease;
    }

    .action-btn:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: rgba(207, 224, 231, 0.25);
    }

    .messages-area {
      flex: 1;
      overflow-y: auto;
      padding: 2rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      min-height: 0;
    }

    .message-group {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .message-group.sent {
      justify-content: flex-end;
    }

    .message-bubble {
      max-width: 50%;
      padding: 0.75rem 1rem;
      background: rgba(83, 113, 121, 0.2);
      border: 1px solid rgba(207, 224, 231, 0.1);
      border-radius: 8px;
      color: var(--text-secondary);
      word-wrap: break-word;
      font-size: 0.95rem;
      line-height: 1.5;
    }

    .message-group.sent .message-bubble {
      background: var(--accent);
      border-color: var(--accent);
      color: var(--text-primary);
    }

    .message-time {
      font-size: 0.75rem;
      color: var(--text-muted);
      margin-top: 0.25rem;
    }

    .input-area {
      padding: 1.5rem;
      background: rgba(26, 31, 46, 0.4);
      border-top: 1px solid rgba(207, 224, 231, 0.1);
    }

    .input-wrapper {
      display: flex;
      gap: 0.5rem;
      align-items: flex-end;
    }

    .message-input {
      flex: 1;
      padding: 0.75rem 1rem;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(207, 224, 231, 0.15);
      border-radius: 6px;
      color: var(--text-primary);
      font-family: 'Inter', sans-serif;
      font-size: 0.95rem;
      resize: none;
      max-height: 100px;
    }

    .message-input::placeholder {
      color: var(--text-muted);
    }

    .message-input:focus {
      outline: none;
      background: rgba(255, 255, 255, 0.08);
      border-color: rgba(207, 224, 231, 0.25);
    }

    .send-btn {
      width: 40px;
      height: 40px;
      background: var(--accent);
      border: none;
      border-radius: 6px;
      color: var(--text-primary);
      cursor: pointer;
      transition: all 150ms ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .send-btn:hover {
      background: var(--storm-blue);
    }

    @media (max-width: 1024px) {
      .sidebar {
        width: 250px;
      }

      .message-bubble {
        max-width: 60%;
      }
    }

    @media (max-width: 768px) {
      .messages-wrapper {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        max-height: 240px;
        border-right: none;
        border-bottom: 1px solid rgba(207, 224, 231, 0.1);
      }

      .chat-panel {
        min-height: 0;
      }

      .message-bubble {
        max-width: 80%;
      }
    }
  </style>
</head>
<body class="has-lime-nav">
  <div id="lime-nav-root"></div>

  <main class="main-content">
    <div class="messages-wrapper">
      <div class="sidebar">
        <h2 class="sidebar-title">Messages</h2>
        <div class="search-box">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="Search..." />
        </div>
        <div class="conversations-list">
          <div class="conversation-item">
            <div class="conversation-name">John Developer</div>
            <div class="conversation-preview">Hey, how are you doing?</div>
          </div>
          <div class="conversation-item">
            <div class="conversation-name">Sarah Designer</div>
            <div class="conversation-preview">Let's discuss the project...</div>
          </div>
          <div class="conversation-item">
            <div class="conversation-name">Mike Manager</div>
            <div class="conversation-preview">Great work on the task!</div>
          </div>
        </div>
      </div>

      <div class="chat-panel">
        <div class="chat-header">
          <div class="chat-user">
            <div class="chat-avatar">JD</div>
            <div>
              <h3>John Developer</h3>
              <div class="chat-user-status online">Online</div>
            </div>
          </div>
          <div class="chat-actions">
            <button class="action-btn"><i class="fas fa-phone"></i></button>
            <button class="action-btn"><i class="fas fa-video"></i></button>
            <button class="action-btn"><i class="fas fa-info-circle"></i></button>
          </div>
        </div>

        <div class="messages-area">
          <div class="message-group">
            <div>
              <div class="message-bubble">Hey! How are you doing?</div>
              <div class="message-time">10:30 AM</div>
            </div>
          </div>
          <div class="message-group sent">
            <div>
              <div class="message-bubble">I'm doing great! Just working on the project.</div>
              <div class="message-time">10:32 AM</div>
            </div>
          </div>
          <div class="message-group">
            <div>
              <div class="message-bubble">That's awesome! Let's sync up later to discuss progress.</div>
              <div class="message-time">10:35 AM</div>
            </div>
          </div>
        </div>

        <div class="input-area">
          <div class="input-wrapper">
            <textarea class="message-input" placeholder="Type a message..." rows="1"></textarea>
            <button class="send-btn"><i class="fas fa-paper-plane"></i></button>
          </div>
        </div>
      </div>
    </div>
  </main>

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

  <script src="lime-nav.js"></script>
</body>
</html>
