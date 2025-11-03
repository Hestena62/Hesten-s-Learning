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
  <!-- ADDED: Roboto Mono for a third font option -->
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

            // Original colors from index.html, now mapped to new var names
            // We will define these in the theme styles (.light, .dark, .high-contrast)
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
      fontFamily: 'Inter', // UPDATED: Replaces dyslexiaFont with a string value
      reducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    };

    const STORAGE_KEY = 'hl_accessibility_settings';

    function loadSettings() {
      try {
        const stored = localStorage.getItem(STORAGE_KEY);
        // FIX for migration: if old settings exist but new fontFamily is missing, initialize it.
        const loadedSettings = stored ? { ...defaultSettings, ...JSON.parse(stored) } : defaultSettings;
        
        // Remove old 'dyslexiaFont' if it exists and wasn't explicitly cleared by a reset.
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
        applySettings(settings); // Apply settings on save
        currentSettings = settings; // Update global state
      } catch (e) {
        console.error("Error saving settings to localStorage:", e);
      }
    }

    // [FIX] Updated function to apply settings that are safe to run in <head>
    function applyHeadSettings(settings) {
      // Set CSS variables for dynamic sizing and spacing
      document.documentElement.style.setProperty('--site-font-size', `${settings.fontSize}rem`);
      document.documentElement.style.setProperty('--site-line-height', settings.lineHeight);

      // 2. Font Selection
      let fontName = settings.fontFamily || 'Inter';
      
      // Wrap in quotes if needed for CSS/Tailwind lookup
      if (fontName.includes(' ') || fontName === 'Open Dyslexic') {
          fontName = `"${fontName}"`;
      }

      document.documentElement.style.setProperty(
        '--site-font-family',
        fontName
      );
    }

    // [FIX] Updated applySettings function
    function applySettings(settings) {
      // 1. Apply <head> settings (font size, line height, font family)
      applyHeadSettings(settings);

      const body = document.body;
      if (!body) return; // Guard clause in case body isn't ready

      // 2. Theme Application
      // [FIX] Remove only theme classes, preserving base layout classes
      body.classList.remove('light', 'dark', 'high-contrast');
      body.classList.add(settings.theme);

      // 3. Motion
      if (settings.reducedMotion) {
        body.classList.add('reduced-motion');
      } else {
        body.classList.remove('reduced-motion');
      }
    }

    // Initialize state globally
    let currentSettings = loadSettings();

    // [FIX] Only apply <head>-safe settings here to prevent errors
    applyHeadSettings(currentSettings);

    // [FIX] The body-specific settings (theme, motion) will be applied
    // by an inline script immediately inside the <body> tag to prevent FOUC.

  </script>

  <!-- Favicon -->
  <link rel="icon" href="Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" />

  <!-- Custom Styles -->
  <style>
    /* Base styles from dynamic variables */
    body {
      /* Styles from new accessibility features */
      background-color: var(--color-base-bg);
      color: var(--color-text-default);
      font-size: var(--site-font-size, 1rem);
      line-height: var(--site-line-height, 1.6);
      transition: background-color 0.3s, color 0.3s, font-size 0.3s, line-height 0.3s;
      min-height: 100vh;
      /* Apply font from the variable set in applyHeadSettings */
      font-family: var(--site-font-family, "Inter", sans-serif);
    }

    /* --- THEMES --- */

    /* Light Theme (Maps to original index.html styles) */
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

      /* New accessibility vars */
      --color-base-bg: #F3F4F6;
      /* --color-light */
      --color-content-bg: #FFFFFF;
      --color-text-default: #1F2937;
      /* --color-dark */
      --color-text-secondary: #374151;
      /* Tailwind gray-700 for better contrast */
    }

    /* Dark Mode (Maps to original index.html dark-mode) */
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

      /* New accessibility vars */
      --color-base-bg: #1A202C;
      /* Original dark-mode background */
      --color-content-bg: #2D3748;
      /* Original dark-mode card bg */
      --color-text-default: #E2E8F0;
      /* Original dark-mode text */
      --color-text-secondary: #E5E7EB;
      /* Lightened for contrast */
    }

    .dark .shadow-lg {
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
    }

    .dark footer {
      background: linear-gradient(to right, var(--color-footer-bg-from), var(--color-footer-bg-to));
    }

    .dark header.bg-dark {
      background-color: var(--color-header-bg);
    }

    /* High Contrast Mode (Maps to original index.html high-contrast) */
    .high-contrast {
      --color-primary: #FFFF00;
      --color-secondary: #00FFFF;
      --color-accent: #00FFFF;
      --color-dark: #FFFFFF;
      --color-light: #000000;
      --color-header-bg: #111111;
      --color-footer-bg-from: #111111;
      --color-footer-bg-to: #111111;
      --color-link: #FFFF00;
      --color-card-bg: #333333;
      --border-radius-base: 0;

      /* New accessibility vars */
      --color-base-bg: #000000;
      --color-content-bg: #333333;
      --color-text-default: #FFFF00;
      /* Bright yellow text */
      --color-text-secondary: #FFFFFF;
    }

    .high-contrast a,
    .high-contrast .text-primary {
      color: var(--color-link) !important;
    }

    .high-contrast .bg-primary {
      background-color: #000000 !important;
      border: 2px solid #FFFF00 !important;
      color: #FFFF00 !important;
    }

    .high-contrast .shadow-lg {
      box-shadow: 0 0 10px #FFFF00;
    }

    .high-contrast header.bg-dark,
    .high-contrast footer {
      background-color: var(--color-header-bg) !important;
      background-image: none !important;
    }


    /* Apply dynamic radius from original file */
    .rounded-base-rounded {
      border-radius: var(--border-radius-base);
    }

    /* Apply dynamic card bg from original file */
    .bg-card-bg {
      background-color: var(--color-card-bg);
    }

    /* Apply dynamic link color from original file */
    a {
      color: var(--color-link);
    }

    /* --- ACCESSIBILITY UTILITIES --- */

    /* Reduced Motion */
    .reduced-motion * {
      transition-duration: 0s !important;
      animation-duration: 0s !important;
      scroll-behavior: auto !important;
    }

    /* Reading Mask/Guide */
    #reading-mask {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      /* Semi-transparent black overlay */
      pointer-events: none;
      /* Allows clicks to pass through */
      z-index: 50;
      /* Below modals, above content */
      transition: background-color 0s;
      /* No transition for this, as it's an accessibility tool */
    }

    #reading-guide {
      position: absolute;
      width: 100%;
      /* Guide covers full width */
      height: var(--guide-height, 2.5rem);
      /* Adjustable height */
      background-color: rgba(255, 255, 255, 0.1);
      /* Slightly visible guide area */
      border-top: 2px solid var(--color-base-bg);
      border-bottom: 2px solid var(--color-base-bg);
      cursor: pointer;
      pointer-events: auto;
      /* Guide can be dragged */
      transition: background-color 0.3s;
    }

    /* Reading Mask in dark/high contrast mode */
    .dark #reading-guide,
    .high-contrast #reading-guide {
      background-color: rgba(255, 255, 255, 0.05);
      border-top: 2px solid var(--color-text-default);
      border-bottom: 2px solid var(--color-text-default);
    }

    /* Custom Scrollbar for aesthetics/contrast */
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

    /* A11Y: Visually hidden class for screen readers (from original index.html) */
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

    /* Helper styles for new accessibility panel toggles (daisyUI classes) */
    .toggle {
      appearance: none;
      width: 3rem;
      height: 1.5rem;
      border-radius: 9999px;
      background-color: #CBD5E0;
      /* gray-400 */
      position: relative;
      transition: background-color 0.3s;
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
      transition: transform 0.3s;
    }

    .toggle:checked::before {
      transform: translateX(1.5rem);
    }
  </style>
</head>

<!-- Body now gets classes applied dynamically by JS -->

<body class="antialiased font-sans">

  <!-- [FIX] Inline script to apply theme/motion from localStorage immediately -->
  <!-- This prevents the "Flash of Unstyled Content" (FOUC) -->
  <script>
    (function () {
      // currentSettings is available from the <head> script
      document.body.classList.add(currentSettings.theme);
      if (currentSettings.reducedMotion) {
        document.body.classList.add('reduced-motion');
      }
    })();
  </script>

  <!-- ACCESSIBILITY SETTINGS PANEL BUTTON -->
  <button id="a11y-toggle-button"
    class="fixed bottom-6 right-6 z-50 p-4 bg-primary text-white rounded-full shadow-2xl hover:bg-secondary focus:outline-none focus:ring-4 focus:ring-accent transition-all duration-300 transform hover:scale-110"
    aria-label="Toggle Accessibility Settings Panel" aria-controls="a11y-settings-panel">
    <i class="fas fa-universal-access text-2xl"></i>
  </button>

  <!-- ACCESSIBILITY SETTINGS PANEL (SIDEBAR) -->
  <div id="a11y-settings-panel"
    class="fixed top-0 right-0 h-full w-72 bg-content-bg shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l-4 border-primary"
    role="dialog" aria-modal="true" aria-label="Accessibility and Display Settings" aria-hidden="true">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-xl font-bold text-primary">Accessibility Settings</h3>
      <button id="a11y-close-button"
        class="text-text-secondary hover:text-text-default p-2 rounded-full focus:outline-none focus:ring-2 focus:ring-primary"
        aria-label="Close settings panel">
        <i class="fas fa-times text-lg"></i>
      </button>
    </div>

    <div class="space-y-6">
      <!-- Theme Settings -->
      <div>
        <label class="block text-sm font-medium mb-2 text-text-default">Display Mode</label>
        <div class="flex space-x-2">
          <button id="theme-light"
            class="flex-1 py-2 rounded-lg border border-gray-300 bg-white text-gray-800 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 transition-colors duration-200"
            aria-label="Set theme to Light">
            <i class="fas fa-sun mr-1"></i> Light
          </button>
          <button id="theme-dark"
            class="flex-1 py-2 rounded-lg border border-gray-300 bg-white text-gray-800 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 transition-colors duration-200"
            aria-label="Set theme to Dark">
            <i class="fas fa-moon mr-1"></i> Dark
          </button>
          <button id="theme-contrast"
            class="flex-1 py-2 rounded-lg border border-gray-300 bg-white text-gray-800 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 transition-colors duration-200"
            aria-label="Set theme to High Contrast">
            <i class="fas fa-low-vision mr-1"></i> Contrast
          </button>
        </div>
      </div>

      <!-- NEW: Font Selection (replaces Dyslexia Font Toggle) -->
      <div>
        <label class="block text-sm font-medium mb-2 text-text-default">Reading Font</label>
        <div id="font-selection-buttons" class="grid grid-cols-3 gap-2 text-xs font-semibold">
            <!-- Inter (Default) -->
            <button data-font="Inter" class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800 dark:bg-gray-700 dark:text-white transition-colors duration-200">Default</button>
            <!-- Open Dyslexic -->
            <button data-font="Open Dyslexic" class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800 dark:bg-gray-700 dark:text-white transition-colors duration-200">Dyslexic</button>
            <!-- Roboto Mono -->
            <button data-font="Roboto Mono" class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800 dark:bg-gray-700 dark:text-white transition-colors duration-200">Monospace</button>
        </div>
      </div>

      <!-- Text Size Slider -->
      <div>
        <label for="font-size-slider" class="block text-sm font-medium mb-2 text-text-default">Text Size (<span
            id="font-size-value">100</span>%)</label>
        <input type="range" id="font-size-slider" min="0.8" max="1.4" step="0.1" value="1.0"
          class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer range-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700">
        <div class="flex justify-between text-xs mt-1 text-text-secondary">
          <span>Small</span>
          <span>Default</span>
          <span>Large</span>
        </div>
      </div>

      <!-- Line Height Slider -->
      <div>
        <label for="line-height-slider" class="block text-sm font-medium mb-2 text-text-default">Line Height / Spacing
          (<span id="line-height-value">1.6</span>)</label>
        <input type="range" id="line-height-slider" min="1.3" max="2.0" step="0.1" value="1.6"
          class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700">
        <div class="flex justify-between text-xs mt-1 text-text-secondary">
          <span>Compact</span>
          <span>Spacious</span>
        </div>
      </div>

      <!-- Reading Mask Toggle -->
      <div>
        <label for="toggle-reading-mask" class="block text-sm font-medium mb-2 text-text-default">Reading
          Guide/Mask</label>
        <div class="flex items-center justify-between">
          <span class="text-text-secondary">Enable draggable guide</span>
          <input type="checkbox" id="toggle-reading-mask" class="toggle" role="switch" aria-checked="false">
        </div>
      </div>

      <!-- Reduced Motion Toggle -->
      <div>
        <label for="toggle-reduced-motion" class="block text-sm font-medium mb-2 text-text-default">Reduce
          Animations</label>
        <div class="flex items-center justify-between">
          <span class="text-text-secondary">Disable transitions and animations</span>
          <input type="checkbox" id="toggle-reduced-motion" class="toggle" role="switch" aria-checked="false">
        </div>
      </div>

      <button id="reset-a11y-settings"
        class="w-full bg-gray-200 text-gray-800 py-2 rounded-lg mt-4 hover:bg-gray-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
        Reset All Settings
      </button>
    </div>
  </div>

  <!-- READING MASK/GUIDE OVERLAY (Initially Hidden) -->
  <!-- The mask is partially opaque, and the guide is transparent to focus text -->
  <div id="reading-mask" class="hidden">
    <div id="reading-guide" style="top: 30%"></div>
  </div>


  <!--Popup-->
  <div id="entry-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" role="dialog"
    aria-modal="true" aria-labelledby="entry-popup-title">
    <!-- content-bg makes this modal theme-aware -->
    <div class="bg-content-bg rounded-xl shadow-2xl p-8 max-w-sm w-full text-center relative">
      <h2 id="entry-popup-title" class="text-2xl font-bold mb-4 text-primary"><?php echo $welcomeMessage; ?></h2>
      <!-- text-text-default makes this modal theme-aware -->
      <p class="mb-6 text-text-default"><?php echo $welcomeParagraph; ?></p>
      <button id="close-entry-popup"
        class="bg-primary text-white px-6 py-2 rounded-full font-semibold hover:bg-secondary transition focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
        aria-label="Close welcome message">
        Close
      </button>
    </div>
  </div>
  <script>
    // [FIX] Updated popup script with localStorage persistence
    document.addEventListener("DOMContentLoaded", function () {
      const popup = document.getElementById("entry-popup");
      const closeBtn = document.getElementById("close-entry-popup");
      const POPUP_STORAGE_KEY = 'hl_popup_dismissed';

      if (popup && closeBtn) {
        // Check if popup was already dismissed
        try {
          if (localStorage.getItem(POPUP_STORAGE_KEY) === 'true') {
            popup.style.display = "none";
            return; // Don't attach listener or focus
          }
        } catch (e) {
          console.warn("Could not read from localStorage", e);
        }

        // Show popup and attach listener
        closeBtn.addEventListener("click", function () {
          popup.style.display = "none";
          // Save dismissed state
          try {
            localStorage.setItem(POPUP_STORAGE_KEY, 'true');
          } catch (e) {
            console.warn("Could not write to localStorage", e);
          }
        });
        // Auto-focus the close button for accessibility
        closeBtn.focus();
      }
    });
  </script>

  <!-- Anouncment section-->
  <div id="announcement-bar"
    class="bg-primary text-white text-center py-2 flex items-center justify-center relative transition-colors duration-300"
    role="region" aria-label="Site Announcement">
    <p class="text-sm">I am working on each section a little at a time. If you would like a certain feature please email me at <a href="mailto:admin@hestena62.com">admin@hestena62.com</a></p>
    <button id="close-announcement"
      class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white hover:text-accent text-lg focus:outline-none focus:ring-2 focus:ring-white"
      aria-label="Close announcement">
      <i class="fas fa-times" aria-hidden="true"></i>
    </button>
  </div>
  <!-- Removed redundant script, logic is now at the bottom -->

  <!-- Navigation Bar -->
  <!-- header-bg class will be controlled by theme variables -->
  <header class="bg-header-bg shadow-lg transition-colors duration-300">
    <div class="container mx-auto px-4 py-4">
      <nav class="flex items-center justify-between flex-wrap" aria-label="Main navigation">
        <!-- Logo and brand name -->
        <a class="flex items-center flex-shrink-0 text-white mr-6" href="/">
          <img src="Images\6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="Company Logo" class="rounded-full h-8 w-8 mr-2"
            onerror="this.onerror=null; this.src='https://placehold.co/32x32/818CF8/FFFFFF?text=HL';" />
          <span class="font-semibold text-xl tracking-tight"><?php echo isset($pageTitle) && $pageTitle !== '' ? $pageTitle : 'Hesten\'s Learning'; ?></span>
        </a>

        <!-- Mobile menu button -->
        <div class="block lg:hidden">
          <button id="nav-toggle"
            class="flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white focus:outline-none focus:ring-2 focus:ring-white"
            aria-controls="nav-content" aria-expanded="false">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-6z" />
            </svg>
            <span class="sr-only">Toggle navigation menu</span>
          </button>
        </div>

        <!-- Navigation links and search/profile -->
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden" id="nav-content">
          <div class="text-sm lg:flex-grow">
            <a href="/"
              class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
              <i class="fas fa-home mr-1" aria-hidden="true"></i> Home
            </a>
            <a href="#"
              class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
              <i class="fas fa-book mr-1" aria-hidden="true"></i> Learning
            </a>
            <a href="/assessment.html"
              class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
              <i class="fas fa-tasks mr-1" aria-hidden="true"></i> Assessment
            </a>
          </div>
          <div class="relative">
            <form id="search-form" action="/search.php" method="GET" role="search">
              <label for="search-input" class="sr-only">Search courses</label>
              <input type="text" id="search-input" name="q" placeholder="Search courses..."
                class="search-input bg-gray-700 text-white rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-primary focus:w-64 transition-all duration-300 ease-in-out" />
              <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                aria-hidden="true"></i>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </header>
