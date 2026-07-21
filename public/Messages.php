<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>lime.com</title>
  <style>
    /* ===== FONT IMPORTS ===== */
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap');

    /* ===== CSS VARIABLES ===== */
    :root {
      --color-black: #0a0a0a;
      --color-navy: #0f1419;
      --color-white: #ffffff;
      --color-grey-light: #e8e8e8;
      --color-grey-med: #8a8a8a;
      --color-grey-dark: #2a2f3e;
      --color-lime: #00ff41;
      --color-lime-hover: #00dd38;
      --color-lime-glow: rgba(0, 255, 65, 0.2);
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
      display: flex;
      position: relative;
      overflow: hidden;
    }


    /* ===== TOP NAVIGATION ===== */
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
      z-index: 5;
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
      min-width: 0;
    }

    .nav-user:hover {
      border-color: rgba(0, 255, 65, 0.15);
      background: rgba(0, 255, 65, 0.08);
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
      flex-shrink: 0;
    }

    .user-name {
      font-weight: 600;
      color: var(--color-white);
      font-size: 0.95rem;
      line-height: 1.1;
    }

    .user-status {
      font-size: 0.75rem;
      color: var(--color-grey-med);
      line-height: 1.1;
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

    /* ===== CHAT CONTAINER ===== */
    .chat-container {
      width: 100%;
      height: calc(100vh - 76px);
      margin-top: 76px;
      display: grid;
      grid-template-columns: 340px 1fr;
      position: relative;
      z-index: 1;
    }

    /* ===== CONVERSATIONS SIDEBAR ===== */
    .conversations-panel {
      background: rgba(15, 20, 29, 0.85);
      backdrop-filter: blur(20px);
      border-right: 1px solid var(--color-border);
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .conversations-header {
      padding: var(--spacing-lg);
      border-bottom: 1px solid var(--color-border);
    }

    .conversations-title {
      font-family: var(--font-display);
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--color-white);
      margin-bottom: var(--spacing-md);
      letter-spacing: -0.01em;
    }

    .search-messages {
      position: relative;
    }

    .search-messages input {
      width: 100%;
      padding: var(--spacing-sm) var(--spacing-md);
      padding-left: 2.5rem;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(0, 255, 65, 0.15);
      border-radius: 6px;
      color: var(--color-white);
      font-family: var(--font-body);
      font-size: 0.9rem;
      transition: all var(--transition);
      min-height: 40px;
    }

    .search-messages input::placeholder {
      color: var(--color-grey-med);
    }

    .search-messages input:hover {
      border-color: rgba(0, 255, 65, 0.3);
      background: rgba(255, 255, 255, 0.08);
    }

    .search-messages input:focus {
      outline: none;
      border-color: var(--color-lime);
      background: rgba(0, 255, 65, 0.08);
      box-shadow: 0 0 0 3px rgba(0, 255, 65, 0.15);
    }

    .search-icon {
      position: absolute;
      left: var(--spacing-md);
      top: 50%;
      transform: translateY(-50%);
      width: 18px;
      height: 18px;
      color: var(--color-grey-med);
      display: flex;
      align-items: center;
      justify-content: center;
      pointer-events: none;
    }

    .conversations-list {
      flex: 1;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 0;
    }

    .conversations-list::-webkit-scrollbar {
      width: 6px;
    }

    .conversations-list::-webkit-scrollbar-track {
      background: transparent;
    }

    .conversations-list::-webkit-scrollbar-thumb {
      background: rgba(0, 255, 65, 0.2);
      border-radius: 3px;
    }

    .conversations-list::-webkit-scrollbar-thumb:hover {
      background: rgba(0, 255, 65, 0.3);
    }

    .conversation-item {
      padding: var(--spacing-md) var(--spacing-lg);
      border-bottom: 1px solid rgba(0, 255, 65, 0.05);
      cursor: pointer;
      transition: all var(--transition);
      display: flex;
      gap: var(--spacing-md);
      align-items: flex-start;
    }

    .conversation-item:hover {
      background: rgba(0, 255, 65, 0.1);
    }

    .conversation-item.active {
      background: rgba(0, 255, 65, 0.15);
      border-left: 3px solid var(--color-lime);
      padding-left: calc(var(--spacing-lg) - 3px);
    }

    .conversation-avatar {
      width: 48px;
      height: 48px;
      border-radius: 4px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: var(--color-black);
      font-size: 0.95rem;
      flex-shrink: 0;
    }

    .conversation-info {
      flex: 1;
      min-width: 0;
    }

    .conversation-name {
      font-weight: 600;
      color: var(--color-white);
      margin-bottom: 0.25rem;
    }

    .conversation-preview {
      font-size: 0.85rem;
      color: var(--color-grey-med);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .conversation-time {
      font-size: 0.8rem;
      color: var(--color-grey-med);
    }

    /* ===== CHAT AREA ===== */
    .chat-area {
      display: flex;
      flex-direction: column;
      background: linear-gradient(180deg, rgba(15, 20, 29, 0.6) 0%, rgba(15, 20, 29, 0.4) 100%);
    }

    .chat-header {
      padding: var(--spacing-lg);
      border-bottom: 1px solid var(--color-border);
      background: rgba(15, 20, 29, 0.85);
      backdrop-filter: blur(20px);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .chat-user-info {
      display: flex;
      align-items: center;
      gap: var(--spacing-md);
    }

    .chat-avatar {
      width: 48px;
      height: 48px;
      border-radius: 4px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: var(--color-black);
      font-size: 1.1rem;
    }

    .chat-user-details {
      display: flex;
      flex-direction: column;
    }

    .chat-user-name {
      font-weight: 600;
      color: var(--color-white);
    }

    .chat-user-status {
      font-size: 0.8rem;
      color: var(--color-grey-med);
    }

    .chat-user-status.online::before {
      content: '● ';
      color: var(--color-lime);
    }

    .chat-header-actions {
      display: flex;
      gap: var(--spacing-sm);
    }

    .header-icon-btn {
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(0, 255, 65, 0.15);
      border-radius: 6px;
      color: var(--color-grey-light);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all var(--transition);
    }

    .header-icon-btn:hover {
      background: rgba(0, 255, 65, 0.1);
      border-color: rgba(0, 255, 65, 0.3);
      color: var(--color-lime);
    }

    .header-icon-btn:focus-visible {
      outline: 2px solid var(--color-lime);
      outline-offset: -2px;
    }

    /* ===== MESSAGES ===== */
    .messages-area {
      flex: 1;
      overflow-y: auto;
      padding: var(--spacing-lg);
      display: flex;
      flex-direction: column;
      gap: var(--spacing-md);
    }

    .messages-area::-webkit-scrollbar {
      width: 6px;
    }

    .messages-area::-webkit-scrollbar-track {
      background: transparent;
    }

    .messages-area::-webkit-scrollbar-thumb {
      background: rgba(0, 255, 65, 0.2);
      border-radius: 3px;
    }

    .messages-area::-webkit-scrollbar-thumb:hover {
      background: rgba(0, 255, 65, 0.3);
    }

    .message {
      display: flex;
      gap: var(--spacing-sm);
      max-width: 70%;
      animation: slideIn 300ms ease-out;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .message.sent {
      align-self: flex-end;
      flex-direction: row-reverse;
    }

    .message.received {
      align-self: flex-start;
    }

    .message-avatar {
      width: 32px;
      height: 32px;
      border-radius: 4px;
      background: linear-gradient(135deg, var(--color-lime), rgba(0, 255, 65, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      color: var(--color-black);
      font-size: 0.75rem;
      flex-shrink: 0;
    }

    .message.sent .message-avatar {
      display: none;
    }

    .message-bubble {
      padding: var(--spacing-sm) var(--spacing-md);
      border-radius: 6px;
      word-break: break-word;
      font-size: 0.95rem;
      line-height: 1.5;
    }

    .message.sent .message-bubble {
      background: var(--color-lime);
      color: var(--color-black);
      border-radius: 4px 3px 6px 6px;
    }

    .message.received .message-bubble {
      background: rgba(255, 255, 255, 0.08);
      color: var(--color-grey-light);
      border-radius: 3px 6px 6px 6px;
      border: 1px solid rgba(0, 255, 65, 0.15);
    }

    .message-time {
      font-size: 0.75rem;
      color: var(--color-grey-med);
      margin-top: 0.25rem;
      text-align: right;
    }

    .message.received .message-time {
      text-align: left;
    }

    /* ===== TYPING INDICATOR ===== */
    .typing-indicator {
      display: flex;
      align-items: center;
      gap: var(--spacing-xs);
      padding: var(--spacing-sm) var(--spacing-md);
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(0, 255, 65, 0.15);
      border-radius: 6px;
      width: fit-content;
      max-width: 70px;
    }

    .typing-dot {
      width: 8px;
      height: 8px;
      border-radius: 4px;
      background: var(--color-lime);
      animation: typing 1.4s infinite;
    }

    .typing-dot:nth-child(2) {
      animation-delay: 0.2s;
    }

    .typing-dot:nth-child(3) {
      animation-delay: 0.4s;
    }

    @keyframes typing {
      0%, 60%, 100% { opacity: 0.3; transform: translateY(0); }
      30% { opacity: 1; transform: translateY(-10px); }
    }

    /* ===== INPUT AREA ===== */
    .input-area {
      padding: var(--spacing-lg);
      border-top: 1px solid var(--color-border);
      background: rgba(15, 20, 29, 0.85);
      backdrop-filter: blur(20px);
      display: flex;
      gap: var(--spacing-md);
      align-items: flex-end;
    }

    .input-wrapper {
      flex: 1;
      display: flex;
      gap: var(--spacing-sm);
    }

    .message-input {
      flex: 1;
      padding: var(--spacing-sm) var(--spacing-md);
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(0, 255, 65, 0.15);
      border-radius: 6px;
      color: var(--color-white);
      font-family: var(--font-body);
      font-size: 0.95rem;
      resize: none;
      max-height: 120px;
      min-height: 44px;
      transition: all var(--transition);
    }

    .message-input::placeholder {
      color: var(--color-grey-med);
    }

    .message-input:hover {
      border-color: rgba(0, 255, 65, 0.3);
      background: rgba(255, 255, 255, 0.08);
    }

    .message-input:focus {
      outline: none;
      border-color: var(--color-lime);
      background: rgba(0, 255, 65, 0.08);
      box-shadow: 0 0 0 3px rgba(0, 255, 65, 0.15);
    }

    .send-button {
      width: 44px;
      height: 44px;
      background: var(--color-lime);
      border: none;
      border-radius: 6px;
      color: var(--color-black);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all var(--transition);
      flex-shrink: 0;
    }

    .send-button:hover {
      background: var(--color-lime-hover);
      transform: translateY(-2px);
      box-shadow: 0 4px 16px rgba(0, 255, 65, 0.3);
    }

    .send-button:focus-visible {
      outline: 2px solid var(--color-lime);
      outline-offset: 2px;
    }

    .send-button:active {
      transform: translateY(0);
    }

    .send-icon {
      width: 20px;
      height: 20px;
    }

    /* ===== EMPTY STATE ===== */
    .no-chat {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      color: var(--color-grey-med);
      text-align: center;
      gap: var(--spacing-lg);
    }

    .no-chat-icon {
      font-size: 4rem;
      opacity: 0.5;
    }

    .no-chat-title {
      font-family: var(--font-display);
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--color-white);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
      .chat-container {
        grid-template-columns: 300px 1fr;
      }

      .conversations-panel {
        max-width: 300px;
      }

      .message {
        max-width: 80%;
      }
    }

    @media (max-width: 768px) {
      .chat-container {
        grid-template-columns: 1fr;
      }

      .conversations-panel {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        max-width: 100%;
        z-index: 100;
        transform: translateX(-100%);
        transition: transform 300ms ease-out;
      }

      .conversations-panel.open {
        transform: translateX(0);
      }

      .chat-area {
        width: 100%;
      }

      .message {
        max-width: 85%;
      }

      .chat-header {
        padding: var(--spacing-md);
      }

      .chat-user-info {
        gap: var(--spacing-sm);
      }

      .chat-avatar {
        width: 40px;
        height: 40px;
        font-size: 0.9rem;
      }

      .messages-area {
        padding: var(--spacing-md);
      }

      .input-area {
        padding: var(--spacing-md);
      }
    }

    @media (max-width: 480px) {
      .chat-header {
        padding: var(--spacing-sm) var(--spacing-md);
      }

      .chat-user-details {
        display: none;
      }

      .messages-area {
        padding: var(--spacing-sm);
        gap: var(--spacing-sm);
      }

      .input-area {
        padding: var(--spacing-sm);
        gap: var(--spacing-sm);
      }

      .message-input {
        font-size: 16px; /* Prevents iOS zoom */
        min-height: 40px;
      }

      .send-button {
        width: 40px;
        height: 40px;
      }

      .message {
        max-width: 90%;
      }

      .header-icon-btn {
        width: 36px;
        height: 36px;
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
  <link rel="stylesheet" href="assets/css/lime-background.css">
  <link rel="stylesheet" href="assets/css/lime-nav.css">
</head>
<body>
  <div class="lime-bg-image"></div>
  <div class="lime-bg-overlay"></div>

  <div id="lime-nav-root"></div>


  <div class="chat-container">
    <!-- Conversations Sidebar -->
    <aside class="conversations-panel" id="conversationsPanel">
      <div class="conversations-header">
        <h1 class="conversations-title">Messages</h1>
        <div class="search-messages">
          <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
          </svg>
          <input 
            type="text" 
            id="searchInput" 
            placeholder="Search conversations..." 
            autocomplete="off"
          >
        </div>
      </div>

      <div class="conversations-list" id="conversationsList">
        <!-- Conversations populated by JavaScript -->
      </div>
    </aside>

    <!-- Chat Area -->
    <main class="chat-area">
      <!-- Chat Header -->
      <header class="chat-header" id="chatHeader">
        <div class="chat-user-info">
          <div class="chat-avatar" id="chatAvatar">TC</div>
          <div class="chat-user-details">
            <div class="chat-user-name" id="chatUserName">TechCorp</div>
            <div class="chat-user-status online" id="chatUserStatus">Online</div>
          </div>
        </div>
        <div class="chat-header-actions">
          <button class="header-icon-btn" aria-label="Call" title="Call">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 20px; height: 20px;">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
          </button>
          <button class="header-icon-btn" aria-label="More options" title="More options">
            <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;">
              <circle cx="12" cy="5" r="2"></circle>
              <circle cx="12" cy="12" r="2"></circle>
              <circle cx="12" cy="19" r="2"></circle>
            </svg>
          </button>
        </div>
      </header>

      <!-- Messages Area -->
      <div class="messages-area" id="messagesArea">
        <div class="no-chat">
          <div class="no-chat-icon"><span class="icon icon-chat-large"></span></div>
          <div class="no-chat-title">Select a conversation</div>
          <p>Choose a conversation from the list to start messaging</p>
        </div>
      </div>

      <!-- Input Area -->
      <div class="input-area">
        <div class="input-wrapper">
          <input 
            type="text" 
            id="messageInput" 
            class="message-input" 
            placeholder="Type your message..." 
            autocomplete="off"
            disabled
          >
          <button id="sendButton" class="send-button" aria-label="Send message" disabled>
            <svg class="send-icon" viewBox="0 0 24 24" fill="currentColor">
              <path d="M16.6915026,12.4744748 L3.50612381,13.2599618 C3.19218622,13.2599618 3.03521743,13.4170592 3.03521743,13.5741566 L1.15159189,20.0151496 C0.8376543,20.8006365 0.99,21.89 1.77946707,22.52 C2.41,22.99 3.50612381,23.1 4.13399899,22.8429026 L21.714504,14.0454487 C22.6563168,13.5741566 23.1272231,12.6315722 22.9702544,11.6889879 L4.13399899,1.16346272 C3.34915502,0.9 2.40734225,0.9 1.77946707,1.4429026 C0.994623095,2.0151496 0.837654326,3.1 1.15159189,3.88555085 L3.03521743,10.3265461 C3.03521743,10.4835148 3.19218622,10.6406122 3.50612381,10.6406122 L16.6915026,11.4261026 C16.6915026,11.4261026 17.1624089,11.4261026 17.1624089,12.0487618 C17.1624089,12.5892337 16.6915026,12.4744748 16.6915026,12.4744748 Z"></path>
            </svg>
          </button>
        </div>
      </div>
    </main>
  </div>

  <script>
    // Sample conversation data
    const conversations = [
      {
        id: 1,
        name: 'TechCorp',
        avatar: 'TC',
        lastMessage: 'Interested in discussing the role?',
        timestamp: '2 min ago',
        online: true,
        messages: [
          { id: 1, sender: 'received', text: 'Hey! We loved your portfolio', time: '10:30 AM' },
          { id: 2, sender: 'received', text: 'Your AI Dashboard project is impressive. We have an open position that might be perfect for you.', time: '10:32 AM' },
          { id: 3, sender: 'sent', text: 'Thanks! I\'m definitely interested. Can you tell me more about the role?', time: '10:35 AM' },
          { id: 4, sender: 'received', text: 'Of course! We\'re looking for a senior full-stack developer to join our team.', time: '10:37 AM' },
          { id: 5, sender: 'received', text: 'Interested in discussing the role?', time: '10:38 AM' }
        ]
      },
      {
        id: 2,
        name: 'StartupXYZ',
        avatar: 'SX',
        lastMessage: 'When are you available for a call?',
        timestamp: '1 hour ago',
        online: false,
        messages: [
          { id: 1, sender: 'received', text: 'Your profile view count has reached 150!', time: '9:15 AM' },
          { id: 2, sender: 'received', text: 'We\'d like to connect and learn more about your experience', time: '9:20 AM' },
          { id: 3, sender: 'sent', text: 'Sounds great! I\'m excited to learn more', time: '9:25 AM' },
          { id: 4, sender: 'received', text: 'When are you available for a call?', time: '9:30 AM' }
        ]
      },
      {
        id: 3,
        name: 'Digital Innovations',
        avatar: 'DI',
        lastMessage: 'Looking forward to meeting you!',
        timestamp: '5 hours ago',
        online: true,
        messages: [
          { id: 1, sender: 'sent', text: 'Hi, I\'m interested in your company. What roles are you hiring for?', time: '2:00 PM' },
          { id: 2, sender: 'received', text: 'We have several openings in our AI/ML team. Your skills look great!', time: '2:15 PM' },
          { id: 3, sender: 'received', text: 'Looking forward to meeting you!', time: '2:20 PM' }
        ]
      },
      {
        id: 4,
        name: 'CloudBase',
        avatar: 'CB',
        lastMessage: 'Thanks for applying!',
        timestamp: '1 day ago',
        online: true,
        messages: [
          { id: 1, sender: 'received', text: 'Thanks for applying to our role!', time: 'Yesterday' },
          { id: 2, sender: 'received', text: 'We\'re impressed with your resume. Next step: coding challenge', time: 'Yesterday' }
        ]
      },
      {
        id: 5,
        name: 'Vision Enterprise',
        avatar: 'VE',
        lastMessage: 'Have a great day!',
        timestamp: '2 days ago',
        online: false,
        messages: [
          { id: 1, sender: 'sent', text: 'Interested in consulting opportunities?', time: '2 days ago' },
          { id: 2, sender: 'received', text: 'Absolutely! Let\'s chat more about this.', time: '2 days ago' }
        ]
      }
    ];

    let currentConversationId = null;
    const conversationsList = document.getElementById('conversationsList');
    const messagesArea = document.getElementById('messagesArea');
    const messageInput = document.getElementById('messageInput');
    const sendButton = document.getElementById('sendButton');
    const searchInput = document.getElementById('searchInput');
    const chatHeader = document.getElementById('chatHeader');
    const chatUserName = document.getElementById('chatUserName');
    const chatUserStatus = document.getElementById('chatUserStatus');
    const chatAvatar = document.getElementById('chatAvatar');
    const conversationsPanel = document.getElementById('conversationsPanel');

    // Render conversations list
    function renderConversations(filter = '') {
      const filtered = conversations.filter(
        (c) => c.name.toLowerCase().includes(filter.toLowerCase()) ||
               c.lastMessage.toLowerCase().includes(filter.toLowerCase())
      );

      conversationsList.innerHTML = filtered
        .map(
          (convo) => `
        <div class="conversation-item ${convo.id === currentConversationId ? 'active' : ''}" data-id="${convo.id}">
          <div class="conversation-avatar">${convo.avatar}</div>
          <div class="conversation-info">
            <div class="conversation-name">${convo.name}</div>
            <div class="conversation-preview">${convo.lastMessage}</div>
          </div>
          <div class="conversation-time">${convo.timestamp}</div>
        </div>
      `
        )
        .join('');

      // Add event listeners
      document.querySelectorAll('.conversation-item').forEach((item) => {
        item.addEventListener('click', () => {
          selectConversation(parseInt(item.dataset.id));
        });
      });
    }

    // Select conversation and load messages
    function selectConversation(id) {
      currentConversationId = id;
      const conversation = conversations.find((c) => c.id === id);

      if (!conversation) return;

      // Update header
      chatAvatar.textContent = conversation.avatar;
      chatUserName.textContent = conversation.name;
      chatUserStatus.textContent = conversation.online ? 'Online' : 'Offline';
      chatUserStatus.className = conversation.online ? 'chat-user-status online' : 'chat-user-status';

      // Enable input
      messageInput.disabled = false;
      sendButton.disabled = false;

      // Render messages
      renderMessages(conversation);

      // Scroll to bottom
      setTimeout(() => {
        messagesArea.scrollTop = messagesArea.scrollHeight;
      }, 100);

      // Update active state
      renderConversations(searchInput.value);

      // Close sidebar on mobile
      conversationsPanel.classList.remove('open');
    }

    // Render messages
    function renderMessages(conversation) {
      messagesArea.innerHTML = conversation.messages
        .map(
          (msg) => `
        <div class="message ${msg.sender}">
          ${msg.sender === 'received' ? `<div class="message-avatar">${conversation.avatar}</div>` : ''}
          <div>
            <div class="message-bubble">${msg.text}</div>
            <div class="message-time">${msg.time}</div>
          </div>
        </div>
      `
        )
        .join('');
    }

    // Send message
    function sendMessage() {
      const text = messageInput.value.trim();
      if (!text || !currentConversationId) return;

      const conversation = conversations.find((c) => c.id === currentConversationId);
      if (!conversation) return;

      // Add message to conversation
      const now = new Date();
      const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
      conversation.messages.push({
        id: conversation.messages.length + 1,
        sender: 'sent',
        text: text,
        time: time
      });

      // Update last message
      conversation.lastMessage = text;
      conversation.timestamp = 'now';

      // Clear input
      messageInput.value = '';

      // Re-render
      renderMessages(conversation);
      renderConversations(searchInput.value);

      // Scroll to bottom
      setTimeout(() => {
        messagesArea.scrollTop = messagesArea.scrollHeight;
      }, 50);

      // Simulate received message after delay
      setTimeout(() => {
        const responses = [
          'That sounds great!',
          'I agree, let\'s do it!',
          'Sounds good to me.',
          'Perfect, I\'m in!',
          'Let me check and get back to you.'
        ];
        const randomResponse = responses[Math.floor(Math.random() * responses.length)];
        const responseTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        conversation.messages.push({
          id: conversation.messages.length + 1,
          sender: 'received',
          text: randomResponse,
          time: responseTime
        });
        conversation.lastMessage = randomResponse;
        renderMessages(conversation);
        setTimeout(() => {
          messagesArea.scrollTop = messagesArea.scrollHeight;
        }, 50);
      }, 1500);
    }

    // Event listeners
    sendButton.addEventListener('click', sendMessage);
    messageInput.addEventListener('keypress', (e) => {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
      }
    });

    searchInput.addEventListener('input', (e) => {
      renderConversations(e.target.value);
    });

    // Mobile menu toggle
    chatHeader.addEventListener('click', (e) => {
      if (e.target.closest('.header-icon-btn')) {
        conversationsPanel.classList.toggle('open');
      }
    });

    // Close sidebar when selecting on mobile
    document.addEventListener('click', (e) => {
      if (window.innerWidth <= 768 && conversationsPanel.classList.contains('open')) {
        if (!conversationsPanel.contains(e.target) && !chatHeader.contains(e.target)) {
          conversationsPanel.classList.remove('open');
        }
      }
    });

    // Initial render
    renderConversations();
  </script>
  <script src="lime-nav.js"></script>

  <script src="lime-profile-completeness.js"></script>
  <script>
    renderCompletionWidget("messagesCompletion", "compact");
  </script>
</body>
</html>