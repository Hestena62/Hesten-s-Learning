<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="<?php echo isset($pageDescription) ? $pageDescription : ''; ?>" />
  <meta name="keywords"
    content="<?php echo isset($pageKeywords) ? $pageKeywords : ''; ?>" />
  <meta name="author" content="<?php echo isset($pageAuthor) ? $pageAuthor : ''; ?>" />
  <title><?php echo isset($pageTitle) ? $pageTitle : ''; ?></title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- OpenDyslexic Font (Accessibility Feature) -->
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Dyslexic&family=Inter:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <!-- Roboto Mono for a third font option -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet" />
  <!-- Google Fonts for Inter (Original Font) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

<script>
    // --- Tailwind Configuration with Dynamic CSS Variables ---
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            // Updated to handle multiple font options
            sans: ["var(--site-font-family, 'Inter')", "sans-serif"],
            dyslexic: ['"Open Dyslexic"', 'sans-serif'],
            mono: ['"Roboto Mono"', 'monospace'],
          },
          colors: {
            // Dynamic colors for easy theme switching
            'primary': 'var(--color-primary, #1D4ED8)', // Default to blue-700
            'secondary': 'var(--color-secondary, #3B82F6)', // Default to blue-500
            'accent': 'var(--color-accent, #60A5FA)', // Default to blue-400
            'base-bg': 'var(--color-base-bg, #F9FAFB)',
            'content-bg': 'var(--color-content-bg, #FFFFFF)',
            'text-default': 'var(--color-text-default, #1F2937)',
            'text-secondary': 'var(--color-text-secondary, #6B7280)',
            'focus-ring': 'var(--color-focus-ring, #F59E0B)', // High vis orange default

            // Legacy mappings
            'dark': 'var(--color-dark)',
            'light': 'var(--color-light)',
            'header-bg': 'var(--color-header-bg)',
            'footer-bg-from': 'var(--color-footer-bg-from)',
            'footer-bg-to': 'var(--color-footer-bg-to)',
            'link-color': 'var(--color-link)',
            'card-bg': 'var(--color-card-bg)',
          },
          borderRadius: {
            "base-rounded": "var(--border-radius-base, 0.75rem)",
          },
          transitionProperty: {
            'colors': 'background-color, border-color, color, fill, stroke',
          },
        },
      },
    };

    // --- Global Accessibility/Theme State Management ---
    const defaultSettings = {
      theme: 'light', // light, dark, high-contrast
      fontSize: 1.0, // rem
      lineHeight: 1.6, // unitless
      fontFamily: 'Inter',
      reducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    };

    const STORAGE_KEY = 'hl_accessibility_settings';

    function loadSettings() {
      try {
        const stored = localStorage.getItem(STORAGE_KEY);
        const loadedSettings = stored ? { ...defaultSettings, ...JSON.parse(stored) } : defaultSettings;
        if (loadedSettings.dyslexiaFont !== undefined) {
             loadedSettings.fontFamily = loadedSettings.dyslexiaFont ? 'Open Dyslexic' : 'Inter';
             delete loadedSettings.dyslexiaFont;
        }
        return loadedSettings;
      } catch (e) {
        console.error("Error loading settings from localStorage:", e);
        return defaultSettings;
      }
    }

    function saveSettings(settings) {
      try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
        applySettings(settings);
        currentSettings = settings;
      } catch (e) {
        console.error("Error saving settings to localStorage:", e);
      }
    }

    function applyHeadSettings(settings) {
      document.documentElement.style.setProperty('--site-font-size', `${settings.fontSize}rem`);
      document.documentElement.style.setProperty('--site-line-height', settings.lineHeight);

      let fontName = settings.fontFamily || 'Inter';
      if (fontName.includes(' ') || fontName === 'Open Dyslexic') {
          fontName = `"${fontName}"`;
      }
      document.documentElement.style.setProperty('--site-font-family', fontName);
    }

    function applySettings(settings) {
      applyHeadSettings(settings);
      const body = document.body;
      if (!body) return;

      body.classList.remove('light', 'dark', 'high-contrast');
      body.classList.add(settings.theme);

      if (settings.reducedMotion) {
        body.classList.add('reduced-motion');
      } else {
        body.classList.remove('reduced-motion');
      }
    }

    let currentSettings = loadSettings();
    applyHeadSettings(currentSettings);
  </script>

  <!-- Favicon -->
  <link rel="icon" href="Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" />

  <!-- Custom Styles -->
  <style>
    /* Base styles */
    body {
      background-color: var(--color-base-bg);
      color: var(--color-text-default);
      font-size: var(--site-font-size, 1rem);
      line-height: var(--site-line-height, 1.6);
      transition: background-color 0.3s, color 0.3s, font-size 0.3s, line-height 0.3s;
      min-height: 100vh;
      font-family: var(--site-font-family, "Inter", sans-serif);
    }

    /* TOP 1% ACCESSIBILITY REQUIREMENT:
      Force visible focus rings on ALL interactive elements.
      We use !important to override browser defaults and Tailwind utilities if needed.
    */
    :focus-visible {
      outline: 4px solid var(--color-focus-ring) !important;
      outline-offset: 2px !important;
      border-radius: 4px !important;
      z-index: 100; /* Ensure focus ring sits on top */
    }

    /* Fallback for browsers not supporting :focus-visible (mostly older ones, but good safety) */
    a:focus, button:focus, input:focus, select:focus, textarea:focus {
      outline: 4px solid var(--color-focus-ring);
      outline-offset: 2px;
    }
    
    /* Remove default focus if :focus-visible is supported to avoid double rings in some browsers */
    :focus:not(:focus-visible) {
      outline: none;
    }

    /* Themes */
    .light {
      --color-primary: #4F46E5;
      --color-secondary: #6366F1;
      --color-accent: #818CF8;
      --color-dark: #1F2937;
      --color-light: #F3F4F6;
      --color-header-bg: #1F2937;
      --color-footer-bg-from: #4F46E5;
      --color-footer-bg-to: #6366F1;
      --color-link: #4F46E5;
      --color-card-bg: #FFFFFF;
      --border-radius-base: 0.75rem;
      --color-base-bg: #F3F4F6;
      --color-content-bg: #FFFFFF;
      --color-text-default: #1F2937;
      --color-text-secondary: #374151;
      --color-focus-ring: #F59E0B; /* Amber-500 for good contrast against blue/white */
    }

    .dark {
      --color-primary: #6366F1;
      --color-secondary: #818CF8;
      --color-accent: #A5B4FC;
      --color-dark: #E5E7EB;
      --color-light: #1A202C;
      --color-header-bg: #2D3748;
      --color-footer-bg-from: #4c51bf;
      --color-footer-bg-to: #5a67d8;
      --color-link: #9f7aea;
      --color-card-bg: #2D3748;
      --border-radius-base: 0.75rem;
      --color-base-bg: #1A202C;
      --color-content-bg: #2D3748;
      --color-text-default: #E2E8F0;
      --color-text-secondary: #E5E7EB;
      --color-focus-ring: #FDBA74; /* Orange-300 for dark mode */
    }

    .high-contrast {
      --color-primary: #FFFF00;
      --color-secondary: #00FFFF;
      --color-accent: #00FFFF;
      --color-dark: #FFFFFF;
      --color-light: #000000;
      --color-header-bg: #000000;
      --color-footer-bg-from: #000000;
      --color-footer-bg-to: #000000;
      --color-link: #FFFF00;
      --color-card-bg: #000000;
      --border-radius-base: 0;
      --color-base-bg: #000000;
      --color-content-bg: #000000;
      --color-text-default: #FFFF00;
      --color-text-secondary: #FFFFFF;
      --color-focus-ring: #FFFFFF; /* White focus ring on black background */
    }

    .high-contrast a,
    .high-contrast .text-primary {
      color: var(--color-link) !important;
      text-decoration: underline; /* Links must be underlined in HC mode */
    }

    .high-contrast .bg-primary {
      background-color: #000000 !important;
      border: 2px solid #FFFF00 !important;
      color: #FFFF00 !important;
    }
    
    .high-contrast .bg-content-bg {
        border: 2px solid #FFFFFF;
    }

    /* Accessibility Utilities */
    .reduced-motion * {
      transition-duration: 0s !important;
      animation-duration: 0s !important;
      scroll-behavior: auto !important;
    }

    #reading-mask {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      pointer-events: none;
      z-index: 50;
      transition: background-color 0s;
    }

    #reading-guide {
      position: absolute;
      width: 100%;
      height: var(--guide-height, 2.5rem);
      background-color: rgba(255, 255, 255, 0.1);
      border-top: 2px solid var(--color-base-bg);
      border-bottom: 2px solid var(--color-base-bg);
      cursor: row-resize;
      pointer-events: auto;
    }

    /* Screen Reader Only Class - Improved */
    .sr-only {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border-width: 0;
    }
    
    /* Skip Link visible on focus */
    .skip-link {
        position: absolute;
        top: -9999px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--color-primary);
        color: white;
        padding: 1rem 2rem;
        z-index: 9999;
        text-decoration: none;
        font-weight: bold;
        border-radius: 0 0 0.5rem 0.5rem;
        transition: top 0.3s;
    }
    
    .skip-link:focus {
        top: 0;
        outline: 4px solid var(--color-focus-ring) !important;
    }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-track { background: var(--color-base-bg); }
    ::-webkit-scrollbar-thumb { background: var(--color-primary); border-radius: 5px; }
    ::-webkit-scrollbar-thumb:hover { background: var(--color-secondary); }

    .toggle {
      appearance: none;
      width: 3rem;
      height: 1.5rem;
      border-radius: 9999px;
      background-color: #CBD5E0;
      position: relative;
      transition: background-color 0.3s;
      cursor: pointer;
    }
    .toggle:checked { background-color: var(--color-primary); }
    .toggle::before {
      content: "";
      position: absolute;
      top: 0.25rem;
      left: 0.25rem;
      width: 1rem;
      height: 1rem;
      border-radius: 9999px;
      background-color: white;
      transition: transform 0.3s;
    }
    .toggle:checked::before { transform: translateX(1.5rem); }
  </style>
</head>

<body class="antialiased font-sans">
  <!-- 
     TOP 1% ACCESSIBILITY REQUIREMENT: SKIP LINK
     Must be the FIRST element in the body.
  -->
  <a href="#main-content" class="skip-link">Skip to Main Content</a>

  <script>
    (function () {
      document.body.classList.add(currentSettings.theme);
      if (currentSettings.reducedMotion) {
        document.body.classList.add('reduced-motion');
      }
    })();
  </script>

  <!-- Accessibility Toggle -->
  <button id="a11y-toggle-button"
    class="fixed bottom-6 right-6 z-50 p-4 bg-primary text-white rounded-full shadow-2xl hover:bg-secondary transition-all duration-300 transform hover:scale-110"
    aria-label="Open Accessibility Settings" aria-controls="a11y-settings-panel" aria-haspopup="dialog">
    <i class="fas fa-universal-access text-2xl"></i>
  </button>

  <!-- Accessibility Panel -->
  <div id="a11y-settings-panel"
    class="fixed top-0 right-0 h-full w-80 bg-content-bg shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l-4 border-primary"
    role="dialog" aria-modal="true" aria-label="Accessibility Options" aria-hidden="true">
    
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-bold text-primary">Accessibility</h2>
      <button id="a11y-close-button"
        class="text-text-secondary hover:text-text-default p-2 rounded-full"
        aria-label="Close settings">
        <i class="fas fa-times text-lg"></i>
      </button>
    </div>

    <div class="space-y-6">
      <fieldset>
        <legend class="block text-sm font-medium mb-2 text-text-default">Display Mode</legend>
        <div class="flex space-x-2">
          <button id="theme-light" class="flex-1 py-2 rounded-lg border border-gray-300 bg-white text-gray-800" aria-label="Light Mode"><i class="fas fa-sun mr-1"></i> Light</button>
          <button id="theme-dark" class="flex-1 py-2 rounded-lg border border-gray-300 bg-white text-gray-800" aria-label="Dark Mode"><i class="fas fa-moon mr-1"></i> Dark</button>
          <button id="theme-contrast" class="flex-1 py-2 rounded-lg border border-gray-300 bg-white text-gray-800" aria-label="High Contrast"><i class="fas fa-low-vision mr-1"></i> Contrast</button>
        </div>
      </fieldset>

      <fieldset>
        <legend class="block text-sm font-medium mb-2 text-text-default">Font Style</legend>
        <div id="font-selection-buttons" class="grid grid-cols-3 gap-2 text-xs font-semibold">
            <button data-font="Inter" class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800">Standard</button>
            <button data-font="Open Dyslexic" class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800">Dyslexic</button>
            <button data-font="Roboto Mono" class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800">Mono</button>
        </div>
      </fieldset>

      <div>
        <label for="font-size-slider" class="block text-sm font-medium mb-2 text-text-default">Text Size: <span id="font-size-value">100</span>%</label>
        <input type="range" id="font-size-slider" min="0.8" max="1.5" step="0.1" value="1.0" class="w-full h-2 bg-gray-200 rounded-lg cursor-pointer">
      </div>

      <div>
        <label for="line-height-slider" class="block text-sm font-medium mb-2 text-text-default">Line Spacing: <span id="line-height-value">1.6</span></label>
        <input type="range" id="line-height-slider" min="1.3" max="2.2" step="0.1" value="1.6" class="w-full h-2 bg-gray-200 rounded-lg cursor-pointer">
      </div>

      <div>
        <div class="flex items-center justify-between">
            <label for="toggle-reading-mask" class="text-sm font-medium text-text-default cursor-pointer">Reading Guide</label>
            <input type="checkbox" id="toggle-reading-mask" class="toggle">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
            <label for="toggle-reduced-motion" class="text-sm font-medium text-text-default cursor-pointer">Reduce Motion</label>
            <input type="checkbox" id="toggle-reduced-motion" class="toggle">
        </div>
      </div>

      <button id="reset-a11y-settings" class="w-full bg-gray-200 text-gray-800 py-2 rounded-lg mt-4 hover:bg-gray-300">
        Reset to Defaults
      </button>
    </div>
  </div>

  <div id="reading-mask" class="hidden">
    <div id="reading-guide" style="top: 30%"></div>
  </div>

  <div id="entry-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" role="dialog" aria-modal="true" aria-labelledby="entry-popup-title">
    <div class="bg-content-bg rounded-xl shadow-2xl p-8 max-w-sm w-full text-center relative">
      <h2 id="entry-popup-title" class="text-2xl font-bold mb-4 text-primary"><?php echo $welcomeMessage; ?></h2>
      <p class="mb-6 text-text-default"><?php echo $welcomeParagraph; ?></p>
      <button id="close-entry-popup" class="bg-primary text-white px-6 py-2 rounded-full font-semibold hover:bg-secondary">Close</button>
    </div>
  </div>

  <!-- Announcement -->
  <div id="announcement-bar" class="bg-primary text-white text-center py-2 relative" role="region" aria-label="Site Announcement">
    <div class="container mx-auto px-8">
        <p class="text-sm">I am working on each section a little at a time. If you would like a certain feature please email me at <a href="mailto:admin@hestena62.com" class="underline hover:text-white">admin@hestena62.com</a></p>
    </div>
    <button id="close-announcement" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white p-2" aria-label="Dismiss announcement">
      <i class="fas fa-times" aria-hidden="true"></i>
    </button>
  </div>

  <!-- Navigation -->
  <header class="bg-header-bg shadow-lg transition-colors duration-300">
    <div class="container mx-auto px-4 py-4">
      <nav class="flex items-center justify-between flex-wrap" aria-label="Main navigation">
        <a class="flex items-center flex-shrink-0 text-white mr-6 focus:ring-2 focus:ring-white rounded p-1" href="/">
          <img src="Images\6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="" class="rounded-full h-8 w-8 mr-2" aria-hidden="true"
            onerror="this.onerror=null; this.src='https://placehold.co/32x32/818CF8/FFFFFF?text=HL';" />
          <span class="font-semibold text-xl tracking-tight"><?php echo isset($pageTitle) && $pageTitle !== '' ? $pageTitle : 'Hesten\'s Learning'; ?></span>
        </a>

        <div class="block lg:hidden">
          <button id="nav-toggle"
            class="flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white"
            aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation menu">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-6z" />
            </svg>
          </button>
        </div>

        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden" id="nav-content">
          <div class="text-sm lg:flex-grow">
            <a href="/" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 p-2 rounded-md"><i class="fas fa-home mr-1" aria-hidden="true"></i> Home</a>
            <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 p-2 rounded-md"><i class="fas fa-book mr-1" aria-hidden="true"></i> Learning</a>
            <a href="/assessment.html" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white p-2 rounded-md"><i class="fas fa-tasks mr-1" aria-hidden="true"></i> Assessment</a>
          </div>
          <div class="relative mt-4 lg:mt-0">
            <form id="search-form" action="/search.php" method="GET" role="search">
              <label for="search-input" class="sr-only">Search courses</label>
              <input type="text" id="search-input" name="q" placeholder="Search..."
                class="bg-gray-700 text-white rounded-full py-2 pl-10 pr-4 focus:bg-gray-600 w-full lg:w-64" />
              <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" aria-hidden="true"></i>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- Popup Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const popup = document.getElementById("entry-popup");
      const closeBtn = document.getElementById("close-entry-popup");
      const POPUP_STORAGE_KEY = 'hl_popup_dismissed';

      if (popup && closeBtn) {
        if (localStorage.getItem(POPUP_STORAGE_KEY) === 'true') {
          popup.style.display = "none";
        } else {
          closeBtn.addEventListener("click", function () {
            popup.style.display = "none";
            localStorage.setItem(POPUP_STORAGE_KEY, 'true');
          });
          // Trap focus inside popup
          const focusable = popup.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
          const first = focusable[0];
          const last = focusable[focusable.length - 1];
          popup.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
              if (e.shiftKey) { if (document.activeElement === first) { last.focus(); e.preventDefault(); } }
              else { if (document.activeElement === last) { first.focus(); e.preventDefault(); } }
            }
          });
          closeBtn.focus();
        }
      }
    });
  </script>