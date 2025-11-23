<!DOCTYPE html>
<html lang="en-US">

<!--
  Reusable Header File (header.php)
  Refactored to use Bootstrap 5 for layout and Pure CSS/Vanilla JS for custom theming and accessibility,
  removing dynamic Tailwind conflicts.
-->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?php echo isset($pageDescription) ? $pageDescription : ''; ?>" />
  <meta name="keywords" content="<?php echo isset($pageKeywords) ? $pageKeywords : ''; ?>" />
  <meta name="author" content="<?php echo isset($pageAuthor) ? $pageAuthor : ''; ?>" />
  <title>
    <?php echo isset($pageTitle) ? $pageTitle : 'Hesten\'s Learning'; ?>
  </title>
  <link rel="icon" href="/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" type="image/png">

  <!-- Default Statcounter code -->
  <script type="text/javascript">
    var sc_project = 13182035;
    var sc_invisible = 1;
    var sc_security = "97cdda23";
  </script>
  <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
  <noscript>
    <div class="statcounter"><a title="Web Analytics Made Easy - Statcounter" href="https://statcounter.com/"
        target="_blank"><img class="statcounter" src="https://c.statcounter.com/13182035/0/97cdda23/1/"
          alt="Web Analytics Made Easy - Statcounter" referrerPolicy="no-referrer-when-downgrade"></a></div>
  </noscript>
  <!-- End of Statcounter Code -->


  <!-- Bootstrap CSS CDN (v5.3.3) for layout and utilities -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome for Icons: Provides a library of scalable vector icons. -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

  <!-- === FONT IMPORTS === -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Dyslexic&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet" />


  <!-- Inline JavaScript for Global Accessibility/Theme State Management -->
  <script>
    // --- Global Accessibility/Theme State Management (Simplified for pure CSS) ---

    // Key colors derived from Dark Theme (default) and Light Theme
    const THEME_COLORS = {
      'light': {
        '--color-primary': '#4F46E5', '--color-secondary': '#6366F1', '--color-accent': '#818CF8',
        '--color-base-bg': '#E5E7EB', '--color-content-bg': '#FFFFFF',
        '--color-header-bg': '#1F2937', '--color-text-default': '#1F2937', '--color-text-secondary': '#374151',
        '--gradient-from': '#4F46E5', '--gradient-to': '#6366F1'
      },
      'dark': {
        '--color-primary': '#6366F1', '--color-secondary': '#818CF8', '--color-accent': '#A5B4FC',
        '--color-base-bg': '#1A202C', '--color-content-bg': '#2D3748',
        '--color-header-bg': '#2D3748', '--color-text-default': '#E2E8F0', '--color-text-secondary': '#E5E7EB',
        '--gradient-from': '#4c51bf', '--gradient-to': '#5a67d8'
      },
      'high-contrast': {
        '--color-primary': '#FFFF00', '--color-secondary': '#00FFFF', '--color-accent': '#00FFFF',
        '--color-base-bg': '#000000', '--color-content-bg': '#333333',
        '--color-header-bg': '#111111', '--color-text-default': '#FFFF00', '--color-text-secondary': '#FFFFFF',
        '--gradient-from': '#111111', '--gradient-to': '#333333'
      }
    };

    const defaultSettings = {
      theme: 'dark', // light, dark, high-contrast
      fontSize: 1.0, // rem
      lineHeight: 1.6, // unitless
      fontFamily: 'Inter', // Default font
      reducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
      letterSpacing: 0, // px
      wordSpacing: 0, // px
      highlightLinks: false,
      readableWidth: false,
    };

    const STORAGE_KEY = 'hl_accessibility_settings';

    function loadSettings() {
      try {
        const stored = localStorage.getItem(STORAGE_KEY);
        const loadedSettings = stored ? { ...defaultSettings, ...JSON.parse(stored) } : defaultSettings;
        if (loadedSettings.dyslexiaFont !== undefined) { // Migration
          loadedSettings.fontFamily = loadedSettings.dyslexiaFont ? 'Open Dyslexic' : 'Inter';
          delete loadedSettings.dyslexiaFont;
        }
        return loadedSettings;
      } catch (e) {
        return defaultSettings;
      }
    }

    // Apply settings to the document element (available immediately)
    function applyHeadSettings(settings) {
      const root = document.documentElement;

      // 1. Theme/Colors (Crucial fix for FOUC/missing colors)
      const colors = THEME_COLORS[settings.theme] || THEME_COLORS['dark'];
      for (const [key, value] of Object.entries(colors)) {
        root.style.setProperty(key, value);
      }
      root.className = '';
      root.classList.add(settings.theme);

      // 2. Font Selection
      let fontName = settings.fontFamily || 'Inter';
      if (fontName.includes(' ') || fontName === 'Open Dyslexic') {
        fontName = `"${fontName}"`;
      }
      root.style.setProperty('--site-font-family', fontName);

      // 3. Sizing & Spacing
      root.style.setProperty('--site-font-size', `${settings.fontSize}rem`);
      root.style.setProperty('--site-line-height', settings.lineHeight);
      root.style.setProperty('--site-letter-spacing', `${settings.letterSpacing}px`);
      root.style.setProperty('--site-word-spacing', `${settings.wordSpacing}px`);

      // 4. Body classes (for accessibility)
      if (document.body) {
        applyBodySettings(settings);
      }
    }

    // Apply settings to the body (executed later in the body script)
    function applyBodySettings(settings) {
      const body = document.body;
      if (!body) return;

      body.classList.toggle('reduced-motion', settings.reducedMotion);
      body.classList.toggle('highlight-links', settings.highlightLinks);
      body.classList.toggle('readable-width', settings.readableWidth);
    }

    function saveSettings(settings) {
      try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
        applyHeadSettings(settings); // Apply and save
        currentSettings = settings; // Update global state
      } catch (e) {
        console.error("Error saving settings to localStorage:", e);
      }
    }

    let currentSettings = loadSettings();
    // Apply <head>-safe settings immediately to prevent FOUC
    applyHeadSettings(currentSettings);
  </script>

  <!-- Custom Styles (Pure CSS/Variables) -->
  <style>
    /* 1. Define Global CSS Variables (used by JavaScript to apply themes) 
    */
    :root {
      /* Base Colors (Dark Theme Default - Defined in JS, but defaults are here) */
      --color-primary: #6366F1;
      --color-secondary: #818CF8;
      --color-accent: #A5B4FC;
      --color-base-bg: #1A202C;
      --color-content-bg: #2D3748;
      --color-header-bg: #2D3748;
      --color-text-default: #E2E8F0;
      --color-text-secondary: #E5E7EB;

      /* Gradient Colors for Hero and Footer (Dark Theme Default) */
      --gradient-from: #4c51bf;
      --gradient-to: #5a67d8;

      /* Font & Sizing Defaults */
      --site-font-size: 1rem;
      --site-line-height: 1.6;
      --site-font-family: 'Inter', sans-serif;
      --site-letter-spacing: normal;
      --site-word-spacing: normal;
      --border-radius-base: 0.75rem;

      /* Transition Speed */
      --transition-speed: 0.3s;
    }

    /* 2. Base Body Styles (uses variables set by JS/Default)
    */
    body {
      background-color: var(--color-base-bg);
      color: var(--color-text-default);
      font-size: var(--site-font-size);
      line-height: var(--site-line-height);
      font-family: var(--site-font-family);
      letter-spacing: var(--site-letter-spacing);
      word-spacing: var(--site-word-spacing);
      transition: background-color var(--transition-speed), color var(--transition-speed), font-size var(--transition-speed), line-height var(--transition-speed);
      min-height: 100vh;
    }

    /* 3. Custom Utility Styles 
    */

    /* Custom Gradient Classes */
    .bg-gradient-primary {
      background: linear-gradient(to right, var(--gradient-from), var(--gradient-to));
    }

    /* Custom Header BG */
    .bg-header {
      background-color: var(--color-header-bg) !important;
    }

    /* Custom Text Colors */
    .text-primary {
      color: var(--color-primary) !important;
    }

    .text-secondary-light {
      color: var(--color-text-secondary) !important;
    }

    /* Custom Element BG Colors */
    .bg-content {
      background-color: var(--color-content-bg) !important;
    }

    /* Custom Border Radius */
    .rounded-base {
      border-radius: var(--border-radius-base) !important;
    }

    /* Shadow adjustments for dark mode look (used on cards and buttons) */
    .custom-shadow {
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
    }

    /* BUTTONS: Custom colors for Bootstrap elements */
    .btn-primary {
      --bs-btn-bg: var(--color-primary);
      --bs-btn-border-color: var(--color-primary);
      --bs-btn-hover-bg: var(--color-secondary);
      --bs-btn-hover-border-color: var(--color-secondary);
      --bs-btn-active-bg: var(--color-accent);
      --bs-btn-active-border-color: var(--color-accent);
      color: white; /* Ensure text is white */
    }

    /* High Contrast Mode Overrides */
    .high-contrast .custom-shadow {
      box-shadow: 0 0 10px var(--color-primary);
    }

    .high-contrast .btn-primary {
      background-color: #000000 !important;
      border: 2px solid var(--color-primary) !important;
      color: var(--color-primary) !important;
      --bs-btn-bg: #000000 !important;
      --bs-btn-border-color: var(--color-primary) !important;
      --bs-btn-hover-bg: #333333 !important;
      --bs-btn-hover-border-color: var(--color-primary) !important;
      color: var(--color-primary) !important;
    }

    /* LINK Hover Fixes (Bootstrap Utility Link Replacement) */
    .hover-white:hover {
        color: white !important;
    }

    .hover-accent:hover {
        color: var(--color-accent) !important;
    }

    /* 4. Accessibility Utilities
    */

    /* Reduced Motion */
    .reduced-motion * {
      transition-duration: 0s !important;
      animation-duration: 0s !important;
      scroll-behavior: auto !important;
    }

    /* Highlight Links */
    .highlight-links a {
      text-decoration: underline !important;
      text-decoration-thickness: 2px !important;
      background-color: #FFFF00 !important;
      color: #000000 !important;
      padding: 2px 4px;
      border-radius: 3px;
    }

    /* Readable Width */
    .readable-width main {
      max-width: 65ch;
      margin-left: auto;
      margin-right: auto;
    }

    /* Custom Scrollbar (Maintained from original) */
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background: var(--color-base-bg);
      border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb {
      background: var(--color-primary);
      border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: var(--color-secondary);
    }

    .dark ::-webkit-scrollbar-track,
    .high-contrast ::-webkit-scrollbar-track {
      background: var(--color-content-bg);
    }

    .dark ::-webkit-scrollbar-thumb,
    .high-contrast ::-webkit-scrollbar-thumb {
      background: var(--color-primary);
    }

    .dark ::-webkit-scrollbar-thumb:hover,
    .high-contrast ::-webkit-scrollbar-thumb:hover {
      background: var(--color-secondary);
    }

    /* A11Y Panel Toggles (Maintained from original) */
    .toggle {
      appearance: none;
      width: 3rem;
      height: 1.5rem;
      border-radius: 9999px;
      background-color: #CBD5E0;
      position: relative;
      transition: background-color var(--transition-speed);
      cursor: pointer;
    }

    .toggle:checked {
      background-color: var(--color-primary);
    }

    .toggle::before {
      content: "";
      position: absolute;
      top: 0.25rem;
      left: 0.25rem;
      width: 1rem;
      height: 1rem;
      border-radius: 9999px;
      background-color: white;
      transition: transform var(--transition-speed);
    }

    .toggle:checked::before {
      transform: translateX(1.5rem);
    }

    /* Reading Mask Styles */
    #reading-mask {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      pointer-events: none;
      z-index: 10;
      /* Adjusted z-index for Bootstrap modals/navs */
      transition: background-color 0s;
    }

    #reading-guide {
      position: absolute;
      width: 100%;
      height: var(--guide-height, 2.5rem);
      background-color: rgba(255, 255, 255, 0.1);
      border-top: 2px solid var(--color-base-bg);
      border-bottom: 2px solid var(--color-base-bg);
      cursor: pointer;
      pointer-events: auto;
      transition: background-color var(--transition-speed);
    }

    /* Animation */
    .announcement-bar {
        background-color: var(--color-primary) !important;
    }
    .announcement-content {
      animation: scroll-left 40s linear infinite;
    }

    @keyframes scroll-left {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }
  </style>
</head>

<body>
  <!-- This inline script ensures body classes are applied instantly -->
  <script>
    (function () {
      applyBodySettings(currentSettings);
    })();
  </script>

  <!-- ACCESSIBILITY SETTINGS PANEL BUTTON -->
  <button id="a11y-toggle-button"
    class="btn btn-lg btn-primary rounded-circle shadow-lg position-fixed bottom-0 end-0 m-4 z-3"
    style="transition: all var(--transition-speed);"
    aria-label="Toggle Accessibility Settings Panel" aria-controls="a11y-settings-panel">
    <i class="fas fa-universal-access fs-4"></i>
  </button>

  <!-- ACCESSIBILITY SETTINGS PANEL (OFFCANVAS) -->
  <div class="offcanvas offcanvas-end bg-content" tabindex="-1" id="a11y-settings-panel"
    aria-labelledby="a11y-settings-label" data-bs-scroll="true" data-bs-backdrop="false">
    <div class="offcanvas-header border-bottom" style="--bs-border-color: var(--color-accent);">
      <h5 class="offcanvas-title text-primary fw-bold" id="a11y-settings-label">Accessibility Settings</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
        id="a11y-close-button" style="color: var(--color-text-default);"></button>
    </div>
    <div class="offcanvas-body p-4">
      <div class="d-flex flex-column gap-4">
        <!-- Theme Settings -->
        <div>
          <label class="form-label text-text-default fw-medium mb-2">Display Mode</label>
          <div class="d-flex justify-content-between gap-2">
            <button id="theme-light"
              class="btn btn-outline-secondary w-100 py-2" aria-label="Set theme to Light">
              <i class="fas fa-sun me-1"></i> Light
            </button>
            <button id="theme-dark"
              class="btn btn-outline-secondary w-100 py-2" aria-label="Set theme to Dark">
              <i class="fas fa-moon me-1"></i> Dark
            </button>
            <button id="theme-contrast"
              class="btn btn-outline-secondary w-100 py-2" aria-label="Set theme to High Contrast">
              <i class="fas fa-low-vision me-1"></i> Contrast
            </button>
          </div>
        </div>

        <!-- Font Selection -->
        <div>
          <label class="form-label text-text-default fw-medium mb-2">Reading Font</label>
          <div id="font-selection-buttons" class="d-flex flex-wrap gap-2 small">
            <button data-font="Inter" class="font-selector btn btn-outline-secondary btn-sm flex-fill">Default</button>
            <button data-font="Merriweather" class="font-selector btn btn-outline-secondary btn-sm flex-fill">Serif</button>
            <button data-font="Open Dyslexic" class="font-selector btn btn-outline-secondary btn-sm flex-fill">Dyslexic</button>
            <button data-font="Roboto Mono" class="font-selector btn btn-outline-secondary btn-sm flex-fill">Monospace</button>
          </div>
        </div>

        <!-- Text Size Slider -->
        <div>
          <label for="font-size-slider" class="form-label text-text-default fw-medium mb-2">Text Size (<span
              id="font-size-value">100</span>%)</label>
          <input type="range" id="font-size-slider" min="0.8" max="1.6" step="0.1" value="1.0"
            class="form-range" style="--bs-range-progress-bg: var(--color-primary);">
          <div class="d-flex justify-content-between small text-secondary-light mt-1">
            <span>Small</span>
            <span>Default</span>
            <span>Large</span>
          </div>
        </div>

        <!-- Line Height Slider -->
        <div>
          <label for="line-height-slider" class="form-label text-text-default fw-medium mb-2">Line Height
            (<span id="line-height-value">1.6</span>)</label>
          <input type="range" id="line-height-slider" min="1.3" max="2.0" step="0.1" value="1.6"
            class="form-range" style="--bs-range-progress-bg: var(--color-primary);">
          <div class="d-flex justify-content-between small text-secondary-light mt-1">
            <span>Compact</span>
            <span>Spacious</span>
          </div>
        </div>

        <!-- Letter Spacing Slider -->
        <div>
          <label for="letter-spacing-slider" class="form-label text-text-default fw-medium mb-2">Letter Spacing
            (<span id="letter-spacing-value">0</span>px)</label>
          <input type="range" id="letter-spacing-slider" min="-1" max="3" step="0.5" value="0"
            class="form-range" style="--bs-range-progress-bg: var(--color-primary);">
          <div class="d-flex justify-content-between small text-secondary-light mt-1">
            <span>Tight</span>
            <span>Default</span>
            <span>Wide</span>
          </div>
        </div>

        <!-- Word Spacing Slider -->
        <div>
          <label for="word-spacing-slider" class="form-label text-text-default fw-medium mb-2">Word Spacing
            (<span id="word-spacing-value">0</span>px)</label>
          <input type="range" id="word-spacing-slider" min="0" max="5" step="0.5" value="0"
            class="form-range" style="--bs-range-progress-bg: var(--color-primary);">
          <div class="d-flex justify-content-between small text-secondary-light mt-1">
            <span>Default</span>
            <span>Spacious</span>
          </div>
        </div>

        <hr class="border-secondary" style="--bs-border-color: var(--color-content-bg);">

        <!-- Toggle Switches -->
        <div class="form-check form-switch d-flex justify-content-between align-items-center">
          <label class="form-check-label text-text-default fw-medium" for="toggle-highlight-links">Highlight Links</label>
          <input type="checkbox" id="toggle-highlight-links" class="toggle" role="switch" aria-checked="false">
        </div>
        <div class="form-check form-switch d-flex justify-content-between align-items-center">
          <label class="form-check-label text-text-default fw-medium" for="toggle-readable-width">Readable Width</label>
          <input type="checkbox" id="toggle-readable-width" class="toggle" role="switch" aria-checked="false">
        </div>
        <div class="form-check form-switch d-flex justify-content-between align-items-center">
          <label class="form-check-label text-text-default fw-medium" for="toggle-reading-mask">Reading Guide/Mask</label>
          <input type="checkbox" id="toggle-reading-mask" class="toggle" role="switch" aria-checked="false">
        </div>
        <div class="form-check form-switch d-flex justify-content-between align-items-center">
          <label class="form-check-label text-text-default fw-medium" for="toggle-reduced-motion">Reduce Animations</label>
          <input type="checkbox" id="toggle-reduced-motion" class="toggle" role="switch" aria-checked="false">
        </div>


        <!-- Reset Button -->
        <button id="reset-a11y-settings" class="btn btn-outline-secondary w-100 mt-4">
          Reset All Settings
        </button>
      </div>
    </div>
  </div>


  <!-- READING MASK/GUIDE OVERLAY (Initially Hidden) -->
  <div id="reading-mask" class="d-none">
    <div id="reading-guide" style="top: 30%"></div>
  </div>


  <!-- Anouncment section (FIXED) -->
  <div id="announcement-bar" class="announcement-bar text-white py-2 d-flex align-items-center position-relative" role="region"
    aria-label="Site Announcement">

    <!-- Scroller Wrapper - handles overflow and positioning -->
    <div class="flex-grow-1 overflow-hidden text-nowrap position-relative" style="height: 1.5rem;">
      <div class="announcement-content d-inline-block position-absolute top-50 start-0 translate-middle-y">
        <!-- New Announcement -->
        <span class="d-inline-block px-3 small">
          I am working on the light theme, for the moment dark mode is enabled by default.
        </span>
        <span class="text-accent small" aria-hidden="true">&bull;</span>
        <!-- Original Announcement -->
        <span class="d-inline-block px-3 small">
          I am working on each section a little at a time. If you would like a certain feature please email me at <a
            href="mailto:admin@hestena62.com" class="fw-bold text-accent text-decoration-underline hover-white">admin@hestena62.com</a>
        </span>
        <span class="text-accent small" aria-hidden="true">&bull;</span>
        <!-- Duplicated content for smooth infinite scroll -->
        <span class="d-inline-block px-3 small">
          I am working on the light theme, for the moment dark mode is enabled by default.
        </span>
        <span class="text-accent small" aria-hidden="true">&bull;</span>
      </div>
    </div>

    <!-- Close button -->
    <button id="close-announcement" class="btn btn-sm text-white hover-accent px-3 flex-shrink-0" aria-label="Close announcement">
      <i class="fas fa-times fs-6" aria-hidden="true"></i>
    </button>
  </div>


  <!-- Navigation Bar -->
  <header class="bg-header shadow-lg transition-colors">
    <div class="container-xl px-4 py-3">
      <nav class="navbar navbar-expand-lg" aria-label="Main navigation">
        <!-- Logo and brand name -->
        <a class="navbar-brand text-white d-flex align-items-center me-4" href="/">
          <img src="..\Images\6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="Company Logo"
            class="rounded-circle" style="height: 32px; width: 32px; margin-right: 0.5rem;"
            onerror="this.onerror=null; this.src='https://placehold.co/32x32/818CF8/FFFFFF?text=HL';" />
          <span class="fw-semibold fs-5">
            <?php echo isset($pageTitle) && $pageTitle !== '' ? $pageTitle : 'Hesten\'s Learning'; ?>
          </span>
        </a>

        <!-- Mobile menu button -->
        <button class="navbar-toggler btn-sm border text-light" type="button" data-bs-toggle="collapse"
          data-bs-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation menu" id="nav-toggle">
          <svg class="fill-current" style="height: 1.25rem; width: 1.25rem;" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <title>Menu</title>
            <path fill="currentColor" d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-6z" />
          </svg>
        </button>

        <!-- Navigation links and search/profile -->
        <div class="collapse navbar-collapse" id="nav-content">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-light hover-white rounded-2 px-3 py-2" href="/">
                <i class="fas fa-home me-1" aria-hidden="true"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light hover-white rounded-2 px-3 py-2" href="/assessment.php">
                <i class="fas fa-tasks me-1" aria-hidden="true"></i> Assessment
              </a>
            </li>
          </ul>

          <!-- Search bar -->
          <form id="search-form" class="d-flex" action="/search.php" method="GET" role="search">
            <div class="input-group">
              <span class="input-group-text border-0" id="search-addon" style="background-color: var(--color-content-bg); border-radius: 9999px 0 0 9999px; color: var(--color-text-secondary);">
                <i class="fas fa-search" aria-hidden="true"></i>
              </span>
              <input type="search" id="search-input" name="q" placeholder="Search courses..."
                class="form-control border-0" style="background-color: var(--color-content-bg); border-radius: 0 9999px 9999px 0; width: 15rem; max-width: 20rem; color: var(--color-text-default);" />
              <label for="search-input" class="sr-only">Search courses</label>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </header>