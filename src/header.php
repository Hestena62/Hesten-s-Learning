<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="<?php echo isset($pageDescription) ? $pageDescription : 'Empowering students with learning disabilities through personalized learning experiences.'; ?>" />
  <meta name="keywords"
    content="<?php echo isset($pageKeywords) ? $pageKeywords : 'education, learning disabilities, accessibility'; ?>" />
  <meta name="author" content="<?php echo isset($pageAuthor) ? $pageAuthor : 'Hesten\'s Learning'; ?>" />
  
  <!-- Open Graph / Social Media Meta Tags -->
  <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : 'Hesten\'s Learning'; ?>" />
  <meta property="og:description" content="<?php echo isset($pageDescription) ? $pageDescription : 'Personalized, accessible learning for everyone.'; ?>" />
  <meta property="og:image" content="https://hestena62.com/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" />
  <meta property="og:url" content="https://hestena62.com" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />

  <title><?php echo isset($pageTitle) ? $pageTitle : 'Hesten\'s Learning'; ?></title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  
  <!-- Fonts: Inter (Standard), Open Dyslexic (A11y), Roboto Mono (Code/Focus) -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Dyslexic&family=Inter:wght@400;500;600;700;800;900&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet" />

<script>
    // --- Tailwind & CSS Variables Configuration ---
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ["var(--site-font-family, 'Inter')", "sans-serif"],
            dyslexic: ['"Open Dyslexic"', 'sans-serif'],
            mono: ['"Roboto Mono"', 'monospace'],
          },
          colors: {
            'primary': 'var(--color-primary, #1D4ED8)',
            'secondary': 'var(--color-secondary, #3B82F6)',
            'accent': 'var(--color-accent, #60A5FA)',
            'base-bg': 'var(--color-base-bg, #F9FAFB)',
            'content-bg': 'var(--color-content-bg, #FFFFFF)',
            'text-default': 'var(--color-text-default, #1F2937)',
            'text-secondary': 'var(--color-text-secondary, #6B7280)',
            'focus-ring': 'var(--color-focus-ring, #F59E0B)', 
            // Legacy/Theme mapping
            'header-bg': 'var(--color-header-bg)',
            'footer-bg-from': 'var(--color-footer-bg-from)',
            'footer-bg-to': 'var(--color-footer-bg-to)',
            'link-color': 'var(--color-link)',
          },
          animation: {
            'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
          }
        },
      },
    };

    // --- State Management ---
    const defaultSettings = {
      theme: 'light',
      fontSize: 1.0, 
      lineHeight: 1.6,
      fontFamily: 'Inter',
      reducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
      readingMask: false
    };

    const STORAGE_KEY = 'hl_a11y_v3';

    function loadSettings() {
      try {
        const stored = localStorage.getItem(STORAGE_KEY);
        return stored ? { ...defaultSettings, ...JSON.parse(stored) } : defaultSettings;
      } catch (e) { return defaultSettings; }
    }

    function saveSettings(settings) {
      try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
        applySettings(settings);
        currentSettings = settings;
      } catch (e) { console.error(e); }
    }

    function applyHeadSettings(settings) {
      document.documentElement.style.setProperty('--site-font-size', `${settings.fontSize}rem`);
      document.documentElement.style.setProperty('--site-line-height', settings.lineHeight);
      
      let fontName = settings.fontFamily || 'Inter';
      if (fontName.includes(' ') || fontName === 'Open Dyslexic') fontName = `"${fontName}"`;
      document.documentElement.style.setProperty('--site-font-family', fontName);
    }

    function applySettings(settings) {
      applyHeadSettings(settings);
      const body = document.body;
      if (!body) return;

      body.classList.remove('light', 'dark', 'high-contrast');
      body.classList.add(settings.theme);

      // Reduced Motion
      if (settings.reducedMotion) {
        body.classList.add('reduced-motion');
        document.documentElement.classList.remove('scroll-smooth');
      } else {
        body.classList.remove('reduced-motion');
        document.documentElement.classList.add('scroll-smooth');
      }

      // Reading Mask
      const mask = document.getElementById('reading-mask');
      if (mask) {
        if (settings.readingMask) {
          mask.classList.remove('hidden');
        } else {
          mask.classList.add('hidden');
        }
      }
    }

    let currentSettings = loadSettings();
    applyHeadSettings(currentSettings);
  </script>

  <style>
    /* --- CSS Variables & Themes --- */
    body {
      background-color: var(--color-base-bg);
      color: var(--color-text-default);
      font-size: var(--site-font-size, 1rem);
      line-height: var(--site-line-height, 1.6);
      transition: background-color 0.3s ease, color 0.3s ease;
      font-family: var(--site-font-family, "Inter", sans-serif);
    }

    /* Strict Focus Visibility (WCAG AAA) */
    :focus-visible {
      outline: 3px solid var(--color-focus-ring) !important;
      outline-offset: 4px !important;
      border-radius: 2px !important;
      box-shadow: 0 0 0 4px var(--color-base-bg) !important; /* Creates a gap for better contrast */
      z-index: 50;
    }
    :focus:not(:focus-visible) { outline: none; }

    /* Light Theme */
    .light {
      --color-primary: #2563EB;     /* Blue 600 */
      --color-secondary: #3B82F6;   /* Blue 500 */
      --color-accent: #60A5FA;      /* Blue 400 */
      --color-base-bg: #F3F4F6;     /* Gray 100 */
      --color-content-bg: #FFFFFF;  /* White */
      --color-text-default: #111827;/* Gray 900 */
      --color-text-secondary: #4B5563;/* Gray 600 */
      --color-header-bg: #1F2937;
      --color-footer-bg-from: #1E3A8A; /* Dark Blue */
      --color-footer-bg-to: #2563EB;   /* Blue 600 */
      --color-focus-ring: #D97706;  /* Amber 600 */
      --color-link: #2563EB;
    }

    /* Dark Theme */
    .dark {
      --color-primary: #6366F1;     /* Indigo 500 */
      --color-secondary: #818CF8;   /* Indigo 400 */
      --color-accent: #A5B4FC;      /* Indigo 300 */
      --color-base-bg: #0F172A;     /* Slate 900 */
      --color-content-bg: #1E293B;  /* Slate 800 */
      --color-text-default: #F8FAFC;/* Slate 50 */
      --color-text-secondary: #CBD5E1;/* Slate 300 */
      --color-header-bg: #1E293B;
      --color-footer-bg-from: #312E81;
      --color-footer-bg-to: #4338CA;
      --color-focus-ring: #FDBA74;  /* Orange 300 */
      --color-link: #818CF8;
    }

    /* High Contrast Theme */
    .high-contrast {
      --color-primary: #FFFF00;     /* Yellow */
      --color-secondary: #00FFFF;   /* Cyan */
      --color-accent: #FFFFFF;      /* White */
      --color-base-bg: #000000;     /* Black */
      --color-content-bg: #000000;  /* Black */
      --color-text-default: #FFFF00;/* Yellow */
      --color-text-secondary: #00FFFF;/* Cyan */
      --color-header-bg: #000000;
      --color-footer-bg-from: #000000;
      --color-footer-bg-to: #000000;
      --color-focus-ring: #FFFFFF;
      --color-link: #FFFF00;
    }
    
    .high-contrast .bg-content-bg, .high-contrast nav, .high-contrast header, .high-contrast footer {
        border: 2px solid #FFFFFF;
    }
    .high-contrast a { text-decoration: underline; }

    /* Animation Keyframes */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translate3d(0, 40px, 0); }
        to { opacity: 1; transform: translate3d(0, 0, 0); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }

    /* Accessibility Utilities */
    .reduced-motion * {
      animation-duration: 0.01s !important;
      transition-duration: 0.01s !important;
      scroll-behavior: auto !important;
    }

    .skip-link {
        position: absolute; top: -9999px; left: 50%; transform: translateX(-50%);
        background: var(--color-primary); color: white; padding: 1rem 2rem; z-index: 10000;
        font-weight: bold; border-radius: 0 0 0.5rem 0.5rem; transition: top 0.2s;
        text-decoration: none;
    }
    .skip-link:focus { top: 0; }

    .sr-only {
      position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px;
      overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0;
    }

    /* Reading Guide */
    #reading-mask {
      position: fixed; top: 0; left: 0; width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.85); pointer-events: none; z-index: 60;
    }
    #reading-guide {
      position: absolute; width: 100%; height: 3rem; background: rgba(255,255,255,0.15);
      border-top: 3px solid var(--color-focus-ring); border-bottom: 3px solid var(--color-focus-ring);
      cursor: row-resize; pointer-events: auto;
    }
  </style>
</head>

<body class="antialiased flex flex-col min-h-screen">

  <a href="#main-content" class="skip-link">Skip to Main Content</a>

  <!-- Init Scripts to prevent FOUC -->
  <script>
    (function () {
      document.body.classList.add(currentSettings.theme);
      if (currentSettings.reducedMotion) document.body.classList.add('reduced-motion');
      // Apply initial mask state before page load finishes
      if (currentSettings.readingMask) {
          // We can't access element by ID yet safely in head/early body, 
          // so we rely on applySettings called after load or by the bottom script.
      }
    })();
  </script>

  <!-- Accessibility Settings Panel Trigger -->
  <button id="a11y-toggle-button"
    class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-primary text-white rounded-full shadow-2xl hover:bg-secondary focus:ring-4 focus:ring-offset-2 focus:ring-primary transition-transform hover:scale-105 flex items-center justify-center"
    aria-label="Open Accessibility Settings" aria-controls="a11y-settings-panel" aria-haspopup="true">
    <i class="fas fa-universal-access text-2xl"></i>
  </button>

  <!-- Accessibility Panel -->
  <div id="a11y-settings-panel"
    class="fixed top-0 right-0 h-full w-80 bg-content-bg shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l-4 border-primary"
    role="dialog" aria-modal="true" aria-label="Accessibility Options" aria-hidden="true">
    
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-bold text-primary">Accessibility</h2>
      <button id="a11y-close-button" class="text-text-secondary hover:text-primary p-2 rounded-full transition-colors" aria-label="Close settings">
        <i class="fas fa-times text-xl"></i>
      </button>
    </div>

    <div class="space-y-8">
      <!-- Theme -->
      <fieldset>
        <legend class="block text-sm font-bold mb-3 text-text-default">Display Mode</legend>
        <div class="flex gap-2">
          <button id="theme-light" class="flex-1 py-3 rounded-lg border-2 border-gray-200 bg-white text-gray-900 hover:border-primary transition-all" aria-label="Light Mode"><i class="fas fa-sun mr-2"></i>Light</button>
          <button id="theme-dark" class="flex-1 py-3 rounded-lg border-2 border-gray-700 bg-gray-800 text-white hover:border-primary transition-all" aria-label="Dark Mode"><i class="fas fa-moon mr-2"></i>Dark</button>
          <button id="theme-contrast" class="flex-1 py-3 rounded-lg border-2 border-black bg-black text-yellow-400 hover:border-yellow-400 transition-all font-bold" aria-label="High Contrast"><i class="fas fa-adjust mr-2"></i>HC</button>
        </div>
      </fieldset>

      <!-- Fonts -->
      <fieldset>
        <legend class="block text-sm font-bold mb-3 text-text-default">Font Style</legend>
        <div class="grid grid-cols-1 gap-2">
            <button data-font="Inter" class="font-selector w-full py-2 px-4 rounded border bg-content-bg text-text-default hover:bg-base-bg text-left">Standard (Inter)</button>
            <button data-font="Open Dyslexic" class="font-selector w-full py-2 px-4 rounded border bg-content-bg text-text-default hover:bg-base-bg text-left font-dyslexic">Dyslexic Friendly</button>
            <button data-font="Roboto Mono" class="font-selector w-full py-2 px-4 rounded border bg-content-bg text-text-default hover:bg-base-bg text-left font-mono">Monospace / Coding</button>
        </div>
      </fieldset>

      <!-- Sliders -->
      <div>
        <label for="font-size-slider" class="block text-sm font-bold mb-2 text-text-default">Text Size: <span id="font-size-value">100</span>%</label>
        <input type="range" id="font-size-slider" min="0.8" max="1.6" step="0.1" value="1.0" class="w-full h-2 bg-gray-300 rounded-lg cursor-pointer accent-primary">
      </div>

      <!-- Toggles -->
      <div class="space-y-4">
        <div class="flex items-center justify-between">
            <label for="toggle-reading-mask" class="text-sm font-bold text-text-default cursor-pointer">Reading Guide</label>
            <input type="checkbox" id="toggle-reading-mask" class="w-12 h-6 rounded-full appearance-none bg-gray-300 checked:bg-primary transition-colors relative cursor-pointer after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:w-4 after:h-4 after:rounded-full after:transition-transform checked:after:translate-x-6">
        </div>
        <div class="flex items-center justify-between">
            <label for="toggle-reduced-motion" class="text-sm font-bold text-text-default cursor-pointer">Reduce Motion</label>
            <input type="checkbox" id="toggle-reduced-motion" class="w-12 h-6 rounded-full appearance-none bg-gray-300 checked:bg-primary transition-colors relative cursor-pointer after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:w-4 after:h-4 after:rounded-full after:transition-transform checked:after:translate-x-6">
        </div>
      </div>

      <button id="reset-a11y-settings" class="w-full bg-base-bg border border-text-secondary text-text-default py-3 rounded-lg mt-4 hover:bg-gray-200 transition-colors font-semibold">
        Reset to Defaults
      </button>
    </div>
  </div>

  <!-- Reading Mask DOM -->
  <div id="reading-mask" class="hidden">
    <div id="reading-guide" style="top: 30%"></div>
  </div>

  <!-- Welcome Popup -->
  <div id="entry-popup" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-[100] hidden" role="dialog" aria-modal="true" aria-labelledby="entry-popup-title">
    <div class="bg-content-bg rounded-2xl shadow-2xl p-8 max-w-md w-full text-center relative mx-4 border border-gray-200 dark:border-gray-700">
      <h2 id="entry-popup-title" class="text-3xl font-bold mb-4 text-primary"><?php echo $welcomeMessage; ?></h2>
      <p class="mb-8 text-lg text-text-default leading-relaxed"><?php echo $welcomeParagraph; ?></p>
      <button id="close-entry-popup" class="bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-secondary focus:ring-4 focus:ring-offset-2 focus:ring-primary transition-all transform hover:scale-105">
        Get Started
      </button>
    </div>
  </div>

  <!-- Announcement Bar -->
  <div id="announcement-bar" class="bg-primary text-white text-center py-3 relative z-40 transition-colors" role="region" aria-label="Site Announcement">
    <div class="container mx-auto px-12">
        <p class="text-sm font-medium">
            <i class="fas fa-info-circle mr-2"></i>
            I am working on each section a little at a time. Feature requests? Email <a href="mailto:admin@hestena62.com" class="underline hover:text-white font-bold decoration-2">admin@hestena62.com</a>
        </p>
    </div>
    <button id="close-announcement" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white/80 hover:text-white p-2 rounded-full hover:bg-white/10 transition-colors" aria-label="Dismiss announcement">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <!-- Main Navigation -->
  <header class="bg-header-bg shadow-md transition-colors duration-300 relative z-30">
    <div class="container mx-auto px-4 py-3">
      <nav class="flex items-center justify-between flex-wrap">
        
        <!-- Logo -->
        <a class="flex items-center flex-shrink-0 text-white mr-8 group" href="/">
          <div class="rounded-full bg-white p-1 mr-3 group-hover:scale-110 transition-transform">
             <img src="Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="" class="h-8 w-8 rounded-full" 
             onerror="this.onerror=null; this.src='https://placehold.co/32x32/818CF8/FFFFFF?text=HL';" />
          </div>
          <span class="font-bold text-xl tracking-tight group-hover:text-accent transition-colors"><?php echo isset($pageTitle) ? $pageTitle : 'Hesten\'s Learning'; ?></span>
        </a>

        <!-- Mobile Menu Button -->
        <div class="block lg:hidden">
          <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white transition-colors" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
        </div>

        <!-- Links -->
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden" id="nav-content">
          <div class="text-sm lg:flex-grow font-medium">
            <a href="/" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-6 hover:underline decoration-2 underline-offset-4 transition-all">
                <i class="fas fa-home mr-1 text-accent"></i> Home
            </a>
            <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-6 hover:underline decoration-2 underline-offset-4 transition-all">
                <i class="fas fa-book-open mr-1 text-accent"></i> Learning
            </a>
            <a href="/assessment.html" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white hover:underline decoration-2 underline-offset-4 transition-all">
                <i class="fas fa-clipboard-check mr-1 text-accent"></i> Assessment
            </a>
          </div>
          
          <!-- Search -->
          <div class="relative mt-4 lg:mt-0">
            <form action="/search.php" method="GET" role="search" class="relative">
              <label for="search-input" class="sr-only">Search</label>
              <input type="text" id="search-input" name="q" placeholder="Search topics..."
                class="bg-gray-700/50 text-white border border-gray-600 rounded-full py-2 pl-10 pr-4 focus:bg-gray-700 focus:border-accent w-full lg:w-64 transition-all placeholder-gray-400" />
              <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- Interactive Scripts -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      
      // 1. Accessibility Panel Toggle Logic
      const a11yPanel = document.getElementById('a11y-settings-panel');
      const a11yBtn = document.getElementById('a11y-toggle-button');
      const a11yClose = document.getElementById('a11y-close-button');

      function togglePanel(show) {
          if (!a11yPanel) return;
          if (show) {
              a11yPanel.classList.remove('translate-x-full');
              a11yPanel.setAttribute('aria-hidden', 'false');
              // Focus management for accessibility
              if(a11yClose) a11yClose.focus();
          } else {
              a11yPanel.classList.add('translate-x-full');
              a11yPanel.setAttribute('aria-hidden', 'true');
              // Return focus to trigger
              if(a11yBtn) a11yBtn.focus();
          }
      }

      if(a11yBtn) a11yBtn.addEventListener('click', () => togglePanel(true));
      if(a11yClose) a11yClose.addEventListener('click', () => togglePanel(false));
      
      // Close panel on Escape key
      document.addEventListener('keydown', (e) => {
          if (e.key === 'Escape' && a11yPanel && !a11yPanel.classList.contains('translate-x-full')) {
              togglePanel(false);
          }
      });

      // 2. Settings Interaction Listeners
      
      // Themes
      document.getElementById('theme-light')?.addEventListener('click', () => saveSettings({...currentSettings, theme: 'light'}));
      document.getElementById('theme-dark')?.addEventListener('click', () => saveSettings({...currentSettings, theme: 'dark'}));
      document.getElementById('theme-contrast')?.addEventListener('click', () => saveSettings({...currentSettings, theme: 'high-contrast'}));

      // Fonts
      document.querySelectorAll('.font-selector').forEach(btn => {
          btn.addEventListener('click', (e) => {
             saveSettings({...currentSettings, fontFamily: e.target.dataset.font});
          });
      });

      // Font Size Slider
      const fsSlider = document.getElementById('font-size-slider');
      const fsValue = document.getElementById('font-size-value');
      if(fsSlider) {
          fsSlider.value = currentSettings.fontSize;
          if(fsValue) fsValue.textContent = Math.round(currentSettings.fontSize * 100);
          
          fsSlider.addEventListener('input', (e) => {
             const val = e.target.value;
             document.documentElement.style.setProperty('--site-font-size', `${val}rem`);
             if(fsValue) fsValue.textContent = Math.round(val * 100);
          });
          fsSlider.addEventListener('change', (e) => {
             saveSettings({...currentSettings, fontSize: e.target.value});
          });
      }

      // Reduced Motion Toggle
      const motionToggle = document.getElementById('toggle-reduced-motion');
      if(motionToggle) {
          motionToggle.checked = currentSettings.reducedMotion;
          motionToggle.addEventListener('change', (e) => {
              saveSettings({...currentSettings, reducedMotion: e.target.checked});
          });
      }

      // Reading Mask Toggle
      const maskToggle = document.getElementById('toggle-reading-mask');
      if(maskToggle) {
          maskToggle.checked = currentSettings.readingMask;
          maskToggle.addEventListener('change', (e) => {
              saveSettings({...currentSettings, readingMask: e.target.checked});
          });
      }

      // Reset Button
      document.getElementById('reset-a11y-settings')?.addEventListener('click', () => {
          saveSettings(defaultSettings);
          // Reload page to force clean reset of all UI elements
          window.location.reload();
      });

      // 3. Reading Guide Drag Logic
      const readingGuide = document.getElementById('reading-guide');
      if (readingGuide) {
          let isDragging = false;
          
          const onMove = (clientY) => {
              if (!isDragging) return;
              const percent = (clientY / window.innerHeight) * 100;
              readingGuide.style.top = `${Math.min(Math.max(percent, 5), 95)}%`;
          };

          readingGuide.addEventListener('mousedown', () => isDragging = true);
          document.addEventListener('mouseup', () => isDragging = false);
          document.addEventListener('mousemove', (e) => onMove(e.clientY));
          
          readingGuide.addEventListener('touchstart', () => isDragging = true);
          document.addEventListener('touchend', () => isDragging = false);
          document.addEventListener('touchmove', (e) => onMove(e.touches[0].clientY));
      }

      // 4. Existing Popup & Nav Logic
      const popup = document.getElementById("entry-popup");
      if(popup && !localStorage.getItem('hl_popup_dismissed')) {
          popup.classList.remove('hidden');
          const closeBtn = document.getElementById("close-entry-popup");
          if(closeBtn) {
              closeBtn.focus();
              closeBtn.addEventListener("click", () => {
                  popup.classList.add('hidden');
                  localStorage.setItem('hl_popup_dismissed', 'true');
              });
          }
      }
      
      document.getElementById('nav-toggle')?.addEventListener('click', function() {
          document.getElementById('nav-content').classList.toggle('hidden');
      });

      document.getElementById('close-announcement')?.addEventListener('click', function() {
          document.getElementById('announcement-bar').style.display = 'none';
      });

      // Apply initial settings (Redundant but safe for ensuring UI state matches)
      applySettings(currentSettings);
    });
  </script>