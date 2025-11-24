<!DOCTYPE html>
<html lang="en-US">

<!--
  Reusable Header File (header.php)
  Contains: HTML head, Accessibility Panel, Announcement Bar, and Navigation Bar
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

  <!-- Default Statcounter code for Hesten's Learning https://hestena62.com
       This section integrates StatCounter for website analytics. -->
  <script type="text/javascript">
    // StatCounter project ID
    var sc_project = 13182035;
    // Makes the counter invisible on the page
    var sc_invisible = 1;
    // Security code for the StatCounter project
    var sc_security = "97cdda23";
  </script>

  <!-- Asynchronously loads the StatCounter JavaScript file -->
  <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
  <noscript>
    <div class="statcounter"><a title="Web Analytics Made Easy - Statcounter" href="https://statcounter.com/"
        target="_blank"><img class="statcounter" src="https://c.statcounter.com/13182035/0/97cdda23/1/"
          alt="Web Analytics Made Easy - Statcounter" referrerPolicy="no-referrer-when-downgrade"></a></div>
  </noscript>
  <!-- End of Statcounter Code -->


  <!-- Tailwind CSS CDN: Imports the Tailwind CSS framework for styling. -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome for Icons: Provides a library of scalable vector icons. -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

  <!-- === UPDATED: FONT IMPORTS === -->
  <!-- Google Fonts for Inter (Original Font) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <!-- OpenDyslexic Font (Accessibility Feature) -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Dyslexic&display=swap" rel="stylesheet" />
  <!-- Roboto Mono (Monospace Option) -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet" />
  <!-- ADDED: Merriweather (Serif Option) -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet" />


  <!-- Inline JavaScript for Tailwind Configuration and Global Accessibility/Theme State Management -->
  <script>
    // --- Tailwind Configuration with Dynamic CSS Variables ---
    tailwind.config = {
      theme: {
        // Extends Tailwind's default theme with custom configurations.
        extend: {
          fontFamily: {
            // Updated to handle multiple font options
            sans: ["var(--site-font-family, 'Inter')", "sans-serif"],
            dyslexic: ['"Open Dyslexic"', 'sans-serif'],
            mono: ['"Roboto Mono"', 'monospace'],
            // ADDED: Serif font option
            serif: ['"Merriweather"', 'serif'],
          },
          // Defines dynamic color variables that can be changed based on theme.
          colors: {
            // Dynamic colors for easy theme switching
            'primary': 'var(--color-primary, #1D4ED8)', // Default to blue-700
            'secondary': 'var(--color-secondary, #3B82F6)', // Default to blue-500
            'accent': 'var(--color-accent, #60A5FA)', // Default to blue-400
            'base-bg': 'var(--color-base-bg, #F9FAFB)',
            'content-bg': 'var(--color-content-bg, #FFFFFF)',
            'text-default': 'var(--color-text-default, #1F2937)',
            'text-secondary': 'var(--color-text-secondary, #6B7280)',

            // ADDED for consistent hero gradient
            'hero-bg-from': 'var(--color-hero-bg-from)',
            'hero-bg-to': 'var(--color-hero-bg-to)',
            // END ADDED

            // Original colors from index.html, now mapped to new var names
            'dark': 'var(--color-dark)',
            'light': 'var(--color-light)',
            'header-bg': 'var(--color-header-bg)',
            'footer-bg-from': 'var(--color-footer-bg-from)',
            'footer-bg-to': 'var(--color-footer-bg-to)',
            'link-color': 'var(--color-link)',
            'card-bg': 'var(--color-card-bg)',
          },
          borderRadius: {
            // Custom border-radius variable for consistent rounding.
            "base-rounded": "var(--border-radius-base, 0.75rem)",
          },
          transitionProperty: {
            'colors': 'background-color, border-color, color, fill, stroke',
            // Custom transition property for smoother theme changes.
          },
        },
      },
    };

    // --- Global Accessibility/Theme State Management ---
    const defaultSettings = {
      // Defines the default accessibility and theme settings for the website.
      theme: 'dark', // light, dark, high-contrast
      fontSize: 1.0, // rem
      lineHeight: 1.6, // unitless
      fontFamily: 'Inter', // Default font
      reducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
      // ADDED: New settings
      letterSpacing: 0, // px
      wordSpacing: 0, // px
      highlightLinks: false,
      readableWidth: false,
    };

    // Key used to store and retrieve settings from localStorage.
    const STORAGE_KEY = 'hl_accessibility_settings';

    function loadSettings() {
      try {
        const stored = localStorage.getItem(STORAGE_KEY);
        // Merge defaults with stored settings to ensure new features are added
        const loadedSettings = stored ? { ...defaultSettings, ...JSON.parse(stored) } : defaultSettings;
        
        // Migration logic for old 'dyslexiaFont' boolean
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

    // Settings that can be applied in the <head>
    function applyHeadSettings(settings) {
      const docEl = document.documentElement;

      // 1. Sizing
      docEl.style.setProperty('--site-font-size', `${settings.fontSize}rem`);
      docEl.style.setProperty('--site-line-height', settings.lineHeight);

      // 2. Spacing (New)
      docEl.style.setProperty('--site-letter-spacing', `${settings.letterSpacing}px`);
      docEl.style.setProperty('--site-word-spacing', `${settings.wordSpacing}px`);

      // 3. Font Selection
      let fontName = settings.fontFamily || 'Inter';
      if (fontName.includes(' ') || fontName === 'Open Dyslexic') {
        fontName = `"${fontName}"`;
      }
      docEl.style.setProperty('--site-font-family', fontName);
    }

    // Settings that must be applied to the <body>
    function applyBodySettings(settings) {
      const body = document.body;
      if (!body) return; // Guard clause

      // 1. Theme
      body.classList.remove('light', 'dark', 'high-contrast');
      body.classList.add(settings.theme);

      // 2. Motion
      if (settings.reducedMotion) {
        body.classList.add('reduced-motion');
      } else {
        body.classList.remove('reduced-motion');
      }

      // 3. Highlight Links (New)
      if (settings.highlightLinks) {
        body.classList.add('highlight-links');
      } else {
        body.classList.remove('highlight-links');
      }

      // 4. Readable Width (New)
      if (settings.readableWidth) {
        body.classList.add('readable-width');
      } else {
        body.classList.remove('readable-width');
      }
    }

    // Combined function to apply all settings by calling both head and body specific functions.
    function applySettings(settings) {
      applyHeadSettings(settings);
      applyBodySettings(settings);
    }


    // Initialize state globally by loading settings from localStorage or using defaults.
    let currentSettings = loadSettings();

    // Apply <head>-safe settings immediately. This ensures that critical styling
    // (like font sizes and families) are set as early as possible to prevent
    // a flash of unstyled content (FOUC).
    applyHeadSettings(currentSettings);

    // Body-specific settings will be applied by an inline script inside <body>

  </script>

  <!-- Favicon -->
  <!-- Defines the favicon for the website, displayed in browser tabs. -->
  <link rel="icon" href="Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" />

  <!-- Custom Styles -->
  <style>
    /* Base styles from dynamic variables */
    /* Sets fundamental styles for the body, utilizing CSS variables for dynamic theming and accessibility. */
    body {
      background-color: var(--color-base-bg);
      color: var(--color-text-default);
      font-size: var(--site-font-size, 1rem);
      line-height: var(--site-line-height, 1.6);
      /* Apply font from the variable */
      font-family: var(--site-font-family, "Inter", sans-serif);

      /* ADDED: Spacing variables */
      letter-spacing: var(--site-letter-spacing, normal);
      word-spacing: var(--site-word-spacing, normal);

      transition: background-color 0.3s, color 0.3s, font-size 0.3s, line-height 0.3s, letter-spacing 0.3s, word-spacing 0.3s;
      min-height: 100vh;
    }

    /* --- THEMES --- */

    /* Light Theme (Maps to original index.html styles) */
    /* Defines CSS variables for the light theme, controlling colors, backgrounds, and borders. */
    .light {
      --color-primary: #4F46E5;
      --color-secondary: #6366F1;
      --color-accent: #818CF8;
      --color-dark: #1F2937;

      /* ADDED for consistent hero gradient */
      --color-hero-bg-from: #6366F1;
      --color-hero-bg-to: #818CF8;
      /* END ADDED */

      /* UPDATED: Increased contrast between base and content */
      --color-light: #E5E7EB;
      /* Was #F3F4F6 (gray-200) */
      --color-base-bg: #E5E7EB;
      /* Was #F3F4F6 (gray-200) */
      --color-content-bg: #FFFFFF;
      /* White */
      --color-card-bg: #FFFFFF;
      /* White */

      --color-header-bg: #1F2937;
      --color-footer-bg-from: #4F46E5;
      --color-footer-bg-to: #6366F1;
      --color-link: #4F46E5;
      --border-radius-base: 0.75rem;

      --color-text-default: #1F2937;
      --color-text-secondary: #374151;
    }

    /* Dark Mode (Maps to original index.html dark-mode) */
    /* Defines CSS variables for the dark theme, overriding light theme variables for a darker aesthetic. */
    .dark {
      --color-primary: #6366F1;
      --color-secondary: #818CF8;
      --color-accent: #A5B4FC;
      --color-dark: #E5E7EB;
      --color-light: #1A202C;

      /* ADDED for consistent hero gradient */
      --color-hero-bg-from: #6366F1;
      --color-hero-bg-to: #818CF8;
      /* END ADDED */

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
    }

    /* Adjusts shadow for dark mode to be more visible against dark backgrounds. */
    .dark .shadow-lg {
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
    }

    /* Applies a gradient background to the footer in dark mode. */
    .dark footer {
      background: linear-gradient(to right, var(--color-footer-bg-from), var(--color-footer-bg-to));
    }

    /* Sets the header background color in dark mode. */
    .dark header.bg-dark {
      background-color: var(--color-header-bg);
    }

    /* High Contrast Mode (Maps to original index.html high-contrast) */
    /* Defines CSS variables for the high-contrast theme, prioritizing readability with stark color differences. */
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

      /* High contrast hero gradient (matches other high-contrast backgrounds) */
      --color-hero-bg-from: #111111;
      --color-hero-bg-to: #333333;

      --color-base-bg: #000000;
      --color-content-bg: #333333;
      --color-text-default: #FFFF00;
      --color-text-secondary: #FFFFFF;
    }

    /* Ensures links and primary text use the high-contrast link color. */
    .high-contrast a,
    .high-contrast .text-primary {
      color: var(--color-link) !important;
    }

    /* Styles primary buttons for high contrast. */
    .high-contrast .bg-primary {
      background-color: #000000 !important;
      border: 2px solid #FFFF00 !important;
      color: #FFFF00 !important;
    }

    /* Adjusts shadows for high contrast. */
    .high-contrast .shadow-lg {
      box-shadow: 0 0 10px #FFFF00;
    }

    .high-contrast header.bg-dark,
    .high-contrast footer {

      /* Apply dynamic link color from original file */ /* This rule is misplaced and will not apply correctly. */
      a {
        color: var(--color-link);
      }

      /* --- ACCESSIBILITY UTILITIES --- */

      /* --- ACCESSIBILITY UTILITIES --- */

      /* ADDED: Announcement Scroller */
      .announcement-content {
        /* We double the content in HTML, so we animate 50% */
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

      /* Reduced Motion */
      /* Disables transitions and animations when reduced motion is enabled for accessibility. */
      .reduced-motion * {
        transition-duration: 0s !important;
        animation-duration: 0s !important;
        scroll-behavior: auto !important;
      }

      /* ADDED: Highlight Links */
      /* Styles links with a high-contrast background and text color for improved visibility. */
      .highlight-links a {
        text-decoration: underline !important;
        text-decoration-thickness: 2px !important;
        /* Use high-contrast, theme-agnostic colors */
        background-color: #FFFF00 !important;
        /* Yellow */
        color: #000000 !important;
        /* Black */
        padding: 2px 4px;
        border-radius: 3px;
      }

      /* Ensure footer links are also contrasted */
      /* Applies high-contrast styling to footer links specifically. */
      .highlight-links footer a {
        background-color: #FFFF00 !important;
        color: #000000 !important;
      }

      /* ADDED: Readable Width */
      /* Constrains the main content width for better readability, especially on wide screens. */
      .readable-width main {
        max-width: 65ch;
        /* "character" unit, ideal for readability */
        margin-left: auto;
        margin-right: auto;
      }


      /* Reading Mask/Guide */
      /* Styles the overlay for the reading mask feature. */
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

      /* Styles the draggable reading guide within the mask. */
      #reading-guide {
        position: absolute;
        width: 100%;
        height: var(--guide-height, 2.5rem);
        background-color: rgba(255, 255, 255, 0.1);
        border-top: 2px solid var(--color-base-bg);
        border-bottom: 2px solid var(--color-base-bg);
        cursor: pointer;
        pointer-events: auto;
        transition: background-color 0.3s;
      }

      /* Adjusts reading guide styles for dark and high-contrast themes. */
      .dark #reading-guide,
      .high-contrast #reading-guide {
        background-color: rgba(255, 255, 255, 0.05);
        border-top: 2px solid var(--color-text-default);
        border-bottom: 2px solid var(--color-text-default);
      }

      /* Custom Scrollbar: Styles the appearance of the scrollbar across the site. */
      ::-webkit-scrollbar {
        width: 10px;
      }

      /* Styles the track of the scrollbar. */
      ::-webkit-scrollbar-track {
        background: var(--color-base-bg);
        border-radius: 5px;
      }

      /* Styles the thumb (draggable part) of the scrollbar. */
      ::-webkit-scrollbar-thumb {
        background: var(--color-primary);
        border-radius: 5px;
      }

      /* Styles the scrollbar thumb on hover. */
      ::-webkit-scrollbar-thumb:hover {
        background: var(--color-secondary);
      }

      /* Adjusts scrollbar track for dark and high-contrast themes. */
      .dark ::-webkit-scrollbar-track,
      .high-contrast ::-webkit-scrollbar-track {
        background: var(--color-content-bg);
      }

      /* Adjusts scrollbar thumb for dark and high-contrast themes. */
      .dark ::-webkit-scrollbar-thumb,
      .high-contrast ::-webkit-scrollbar-thumb {
        background: var(--color-primary);
      }

      .dark ::-webkit-scrollbar-thumb:hover,
      .high-contrast ::-webkit-scrollbar-thumb:hover {
        background: var(--color-secondary);
      }

      /* A11Y: Visually hidden */
      /* Utility class to visually hide content while keeping it accessible to screen readers. */
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

      /* Helper styles for toggles */
      /* Base styles for custom toggle switches used in the accessibility panel. */
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

      /* Styles for the toggle when it is checked (on). */
      .toggle:checked {
        background-color: var(--color-primary);
      }

      /* Styles for the draggable "thumb" of the toggle switch. */
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

      /* Moves the toggle thumb when the switch is checked. */
      .toggle:checked::before {
        transform: translateX(1.5rem);
      }
  </style>
</head>

<body class="antialiased font-sans">

  <!-- This inline script applies body-specific settings immediately after the body tag opens. -->
  <!-- Inline script to apply <body> settings from localStorage immediately -->
  <script>
    (function () {
      // currentSettings is available from the <head> script
      applyBodySettings(currentSettings);
    })();
  </script>

  <!-- ACCESSIBILITY SETTINGS PANEL BUTTON -->
  <!-- Floating action button to open the accessibility settings panel. -->
  <button id="a11y-toggle-button"
    class="fixed bottom-6 right-6 z-50 p-4 bg-primary text-white rounded-full shadow-2xl hover:bg-secondary focus:outline-none focus:ring-4 focus:ring-accent transition-all duration-300 transform hover:scale-110"
    aria-label="Toggle Accessibility Settings Panel" aria-controls="a11y-settings-panel">
    <i class="fas fa-universal-access text-2xl"></i>
  </button>

  <!-- ACCESSIBILITY SETTINGS PANEL (SIDEBAR) -->
  <!-- Sidebar panel containing various accessibility and display settings. -->
  <div id="a11y-settings-panel"
    class="fixed top-0 right-0 h-full w-80 bg-content-bg shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l-4 border-primary"
    role="dialog" aria-modal="true" aria-label="Accessibility and Display Settings" aria-hidden="true">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-xl font-bold text-primary">Accessibility Settings</h3>
      <button id="a11y-close-button"
        class="text-text-secondary hover:text-text-default p-2 rounded-full focus:outline-none focus:ring-2 focus:ring-primary"
        aria-label="Close settings panel">
        <i class="fas fa-times text-lg"></i>
      </button>
    </div>

    <!-- === UPDATED: Settings Panel Layout === -->
    <div class="space-y-6">
      <!-- Section for theme selection (Light, Dark, High Contrast). -->
      <!-- Theme Settings -->
      <div>
        <label class="block text-sm font-medium mb-2 text-text-default">Display Mode</label>
        <div class="grid grid-cols-3 gap-2">
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

      <!-- Section for font selection. -->
      <!-- Font Selection -->
      <div>
        <label class="block text-sm font-medium mb-2 text-text-default">Reading Font</label>
        <!-- UPDATED: now grid-cols-4 -->
        <div id="font-selection-buttons" class="grid grid-cols-4 gap-2 text-xs font-semibold">
          <button data-font="Inter"
            class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800 dark:bg-gray-700 dark:text-white transition-colors duration-200">Default</button>
          <button data-font="Merriweather"
            class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800 dark:bg-gray-700 dark:text-white transition-colors duration-200">Serif</button>
          <button data-font="Open Dyslexic"
            class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800 dark:bg-gray-700 dark:text-white transition-colors duration-200">Dyslexic</button>
          <button data-font="Roboto Mono"
            class="font-selector py-2 rounded-lg border border-gray-300 bg-white text-gray-800 dark:bg-gray-700 dark:text-white transition-colors duration-200">Monospace</button>
        </div>
      </div>

      <!-- Slider for adjusting text size. -->
      <!-- Text Size Slider -->
      <div>
        <label for="font-size-slider" class="block text-sm font-medium mb-2 text-text-default">Text Size (<span
            id="font-size-value">100</span>%)</label>
        <!-- UPDATED: max="1.6" -->
        <input type="range" id="font-size-slider" min="0.8" max="1.6" step="0.1" value="1.0"
          class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer range-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700">
        <div class="flex justify-between text-xs mt-1 text-text-secondary">
          <span>Small</span>
          <span>Default</span>
          <span>Large</span>
        </div>
      </div>

      <!-- Slider for adjusting line height. -->
      <!-- Line Height Slider -->
      <div>
        <label for="line-height-slider" class="block text-sm font-medium mb-2 text-text-default">Line Height
          (<span id="line-height-value">1.6</span>)</label>
        <input type="range" id="line-height-slider" min="1.3" max="2.0" step="0.1" value="1.6"
          class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700">
        <div class="flex justify-between text-xs mt-1 text-text-secondary">
          <span>Compact</span>
          <span>Spacious</span>
        </div>
      </div>

      <!-- Slider for adjusting letter spacing. -->
      <!-- ADDED: Letter Spacing Slider -->
      <div>
        <label for="letter-spacing-slider" class="block text-sm font-medium mb-2 text-text-default">Letter Spacing
          (<span id="letter-spacing-value">0</span>px)</label>
        <input type="range" id="letter-spacing-slider" min="-1" max="3" step="0.5" value="0"
          class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700">
        <div class="flex justify-between text-xs mt-1 text-text-secondary">
          <span>Tight</span>
          <span>Default</span>
          <span>Wide</span>
        </div>
      </div>

      <!-- Slider for adjusting word spacing. -->
      <!-- ADDED: Word Spacing Slider -->
      <div>
        <label for="word-spacing-slider" class="block text-sm font-medium mb-2 text-text-default">Word Spacing
          (<span id="word-spacing-value">0</span>px)</label>
        <input type="range" id="word-spacing-slider" min="0" max="5" step="0.5" value="0"
          class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700">
        <div class="flex justify-between text-xs mt-1 text-text-secondary">
          <span>Default</span>
          <span>Spacious</span>
        </div>
      </div>

      <!-- Horizontal rule for visual separation. -->
      <!-- Divider -->
      <hr class="border-gray-200 dark:border-gray-700">
      <!-- Toggle switch for highlighting links. -->

      <!-- ADDED: Highlight Links Toggle -->
      <div>
        <label for="toggle-highlight-links" class="block text-sm font-medium mb-2 text-text-default">Highlight
          Links</label>
        <div class="flex items-center justify-between">
          <span class="text-text-secondary text-sm">Underline and highlight all links</span>
          <input type="checkbox" id="toggle-highlight-links" class="toggle" role="switch" aria-checked="false">
        </div>
      </div>

      <!-- Toggle switch for enabling readable width. -->
      <!-- ADDED: Readable Width Toggle -->
      <div>
        <label for="toggle-readable-width" class="block text-sm font-medium mb-2 text-text-default">Readable
          Width</label>
        <div class="flex items-center justify-between">
          <span class="text-text-secondary text-sm">Constrain main content width</span>
          <input type="checkbox" id="toggle-readable-width" class="toggle" role="switch" aria-checked="false">
        </div>
      </div>

      <!-- Toggle switch for the reading mask/guide. -->
      <!-- Reading Mask Toggle -->
      <div>
        <label for="toggle-reading-mask" class="block text-sm font-medium mb-2 text-text-default">Reading
          Guide/Mask</label>
        <div class="flex items-center justify-between">
          <span class="text-text-secondary text-sm">Enable draggable guide</span>
          <input type="checkbox" id="toggle-reading-mask" class="toggle" role="switch" aria-checked="false">
        </div>
      </div>

      <!-- Toggle switch for reducing animations. -->
      <!-- Reduced Motion Toggle -->
      <div>
        <label for="toggle-reduced-motion" class="block text-sm font-medium mb-2 text-text-default">Reduce
          Animations</label>
        <div class="flex items-center justify-between">
          <span class="text-text-secondary text-sm">Disable transitions and animations</span>
          <input type="checkbox" id="toggle-reduced-motion" class="toggle" role="switch" aria-checked="false">
        </div>
      </div>

      <!-- Button to reset all accessibility settings to their default values. -->
      <button id="reset-a11y-settings"
        class="w-full bg-gray-200 text-gray-800 py-2 rounded-lg mt-4 hover:bg-gray-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
        Reset All Settings
      </button>
    </div>
  </div>

  <!-- READING MASK/GUIDE OVERLAY (Initially Hidden): This div acts as the overlay for the reading mask feature. -->
  <!-- READING MASK/GUIDE OVERLAY (Initially Hidden) -->
  <div id="reading-mask" class="hidden">
    <div id="reading-guide" style="top: 30%"></div>
  </div>


  <!-- Anouncment section: Displays important announcements or messages to users. -->
  <!-- Anouncment section-->
  <div id="announcement-bar"
    class="bg-primary text-white py-2 flex items-center relative transition-colors duration-300" role="region"
    aria-label="Site Announcement">

    <!-- This div is the "window" for the scroller, takes up remaining space -->
    <div class="flex-1 overflow-hidden whitespace-nowrap">
      <!-- This div is the content that moves. We'll animate this with CSS -->
      <div class="announcement-content inline-block">
        <!-- New Announcement -->
        <span class="announcement-item inline-block px-4 text-sm">
          I am working on the light theme, for the moment dark mode is enabled by default.
        </span>
        <span class="announcement-divider text-accent" aria-hidden="true">&bull;</span>
        <!-- Original Announcement -->
        <span class="announcement-item inline-block px-4 text-sm">
          I am working on each section a little at a time. If you would like a certain feature please email me at <a
            href="mailto:admin@hestena62.com" class="font-bold underline hover:text-accent">admin@hestena62.com</a>
        </span>
        <span class="announcement-divider text-accent" aria-hidden="true">&bull;</span>
      </div>
    </div>

    <!-- Close button, outside the scroller window -->
    <!-- Button to close the announcement bar. -->
    <button id="close-announcement"
      class="flex-shrink-0 px-4 text-white hover:text-accent text-lg focus:outline-none focus:ring-2 focus:ring-white"
      aria-label="Close announcement">
      <i class="fas fa-times" aria-hidden="true"></i>
    </button>
  </div>
  <!-- Removed redundant script, logic is now at the bottom -->

  <!-- Navigation Bar: Provides primary navigation links and site branding. -->
  <!-- Navigation Bar -->
  <header class="bg-header-bg shadow-lg transition-colors duration-300">
    <div class="container mx-auto px-4 py-4">
      <nav class="flex items-center justify-between flex-wrap" aria-label="Main navigation">
        <!-- Logo and brand name: Displays the site logo and title, linking to the homepage. -->
        <!-- Logo and brand name -->
        <a class="flex items-center flex-shrink-0 text-white mr-6" href="/">
          <img src="..\Images\6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="Company Logo"
            class="rounded-full h-8 w-8 mr-2"
            onerror="this.onerror=null; this.src='https://placehold.co/32x32/818CF8/FFFFFF?text=HL';" />
          <span class="font-semibold text-xl tracking-tight">
            <?php echo isset($pageTitle) && $pageTitle !== '' ? $pageTitle : 'Hesten\'s Learning'; ?>
          </span>
        </a>

        <!-- Mobile menu button -->
        <!-- Button to toggle the navigation menu on smaller screens. -->
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

        <!-- Navigation links and search/profile: Contains the main navigation items and search functionality. -->
        <!-- Navigation links and search/profile -->
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden" id="nav-content">
          <div class="text-sm lg:flex-grow">
            <a href="/"
              class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
              <i class="fas fa-home mr-1" aria-hidden="true"></i> Home
            </a>
           
           <!-- <a href="#"
              class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
              <i class="fas fa-book mr-1" aria-hidden="true"></i> Learning
            </a> -->
        
            <a href="/assessment.php"
              class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
              <i class="fas fa-tasks mr-1" aria-hidden="true"></i> Assessment
            </a>
          </div>
          <!-- Search bar for finding courses or content. -->
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