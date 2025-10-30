<?php
// Start the session at the very top
session_start();

// ==================================================================
// 1. ALL QUESTIONS (from src/questions.php)
// ==================================================================
$all_questions = [
    'math' => [
        [
            'question' => 'What is 5 + 7?',
            'options' => ['10', '12', '15', '8'],
            'correct' => 1 // Index of the correct answer (12)
        ],
        [
            'question' => 'What is the value of \'x\' in the equation 2x + 3 = 11?',
            'options' => ['3', '4', '5', '6'],
            'correct' => 1 // Index of the correct answer (4)
        ],
        [
            'question' => 'What is the area of a rectangle with length 6 and width 4?',
            'options' => ['20', '24', '10', '18'],
            'correct' => 1 // Index of the correct answer (24)
        ]
    ],
    'ela' => [
        [
            'question' => 'Which word is a noun?',
            'options' => ['Run', 'Happy', 'Book', 'Quickly'],
            'correct' => 2 // Index of the correct answer (Book)
        ],
        [
            'question' => 'What is the past tense of "go"?',
            'options' => ['Gone', 'Went', 'Going', 'Goed'],
            'correct' => 1 // Index of the correct answer (Went)
        ],
        [
            'question' => 'Identify the adjective in the sentence: "The red car is fast."',
            'options' => ['Car', 'Is', 'Fast', 'Red'],
            'correct' => 3 // Index of the correct answer (Red)
        ]
    ],
    'science' => [
        [
            'question' => 'What is H2O?',
            'options' => ['Oxygen', 'Hydrogen Peroxide', 'Water', 'Salt'],
            'correct' => 2 // Index of the correct answer (Water)
        ],
        [
            'question' => 'What planet is known as the Red Planet?',
            'options' => ['Earth', 'Mars', 'Jupiter', 'Venus'],
            'correct' => 1 // Index of the correct answer (Mars)
        ],
        [
            'question' => 'What is the process by which plants make their own food?',
            'options' => ['Respiration', 'Photosynthesis', 'Digestion', 'Germination'],
            'correct' => 1 // Index of the correct answer (Photosynthesis)
        ]
    ],
    'social_studies' => [
        [
            'question' => 'Who was the first President of the United States?',
            'options' => ['Thomas Jefferson', 'Abraham Lincoln', 'George Washington', 'John Adams'],
            'correct' => 2 // Index of the correct answer (George Washington)
        ],
        [
            'question' => 'What is the capital of France?',
            'options' => ['London', 'Berlin', 'Madrid', 'Paris'],
            'correct' => 3 // Index of the correct answer (Paris)
        ],
        [
            'question' => 'Which ocean is the largest?',
            'options' => ['Atlantic', 'Indian', 'Arctic', 'Pacific'],
            'correct' => 3 // Index of the correct answer (Pacific)
        ]
    ]
];

// Function to safely get questions for a subject
function get_questions_for_subject($subject, $all_questions) {
    if (isset($all_questions[$subject])) {
        return $all_questions[$subject];
    } else {
        return []; // Return empty array if subject not found
    }
}

// Function to get subject title
function get_subject_title($subject) {
    $titles = [
        'math' => 'Math Test',
        'ela' => 'ELA Test',
        'science' => 'Science Test',
        'social_studies' => 'Social Studies Test'
    ];
    return $titles[$subject] ?? 'Unknown Test';
}

// ==================================================================
// 2. HEADER FUNCTION (from src/header.php)
// ==================================================================
function render_header($pageTitle, $pageDescription, $pageKeywords, $pageAuthor, $welcomeMessage = "Welcome!", $welcomeParagraph = "Welcome to Hesten's Learning.") {
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="<?php echo htmlspecialchars($pageDescription); ?>" />
  <meta name="keywords"
    content="<?php echo htmlspecialchars($pageKeywords); ?>" />
  <meta name="author" content="<?php echo htmlspecialchars($pageAuthor); ?>" />
  <title><?php echo htmlspecialchars($pageTitle); ?></title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- OpenDyslexic Font (Accessibility Feature) -->
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Dyslexic&family=Inter:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <!-- Google Fonts for Inter (Original Font) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <script>
    // --- Tailwind Configuration with Dynamic CSS Variables ---
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            // Inter is the default sans-serif, OpenDyslexic is an option
            sans: ["var(--site-font-family, 'Inter')", "sans-serif"],
            dyslexic: ['"Open Dyslexic"', 'sans-serif'],
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
      dyslexiaFont: false,
      reducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    };

    const STORAGE_KEY = 'hl_accessibility_settings';

    function loadSettings() {
      try {
        const stored = localStorage.getItem(STORAGE_KEY);
        return stored ? { ...defaultSettings, ...JSON.parse(stored) } : defaultSettings;
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

    // [FIX] New function to apply settings that are safe to run in <head>
    function applyHeadSettings(settings) {
      // Set CSS variables for dynamic sizing and spacing
      document.documentElement.style.setProperty('--site-font-size', `${settings.fontSize}rem`);
      document.documentElement.style.setProperty('--site-line-height', settings.lineHeight);

      // 2. Dyslexia Font
      // [FIX] Set only the font name. The 'sans-serif' fallback
      // is handled by the Tailwind config ('font-sans').
      document.documentElement.style.setProperty(
        '--site-font-family',
        settings.dyslexiaFont ? '"Open Dyslexic"' : 'Inter'
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
  <link rel="icon" href="Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png"
    onerror="this.onerror=null; this.href='https://placehold.co/16x16/000000/FFFFFF?text=HL';" />

  <!-- Custom Styles -->
  <style>
    /* Base styles from dynamic variables */
    body {
      /* [FIX] Removed user-select: none; to allow text selection. */

      /* Styles from new accessibility features */
      background-color: var(--color-base-bg);
      color: var(--color-text-default);
      font-size: var(--site-font-size, 1rem);
      line-height: var(--site-line-height, 1.6);
      transition: background-color 0.3s, color 0.3s, font-size 0.3s, line-height 0.3s;
      min-height: 100vh;
      /* Apply original font from index.html as the base */
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

      <!-- Dyslexia Font Toggle -->
      <div>
        <label for="toggle-dyslexia" class="block text-sm font-medium mb-2 text-text-default">Dyslexia-Friendly
          Font</label>
        <div class="flex items-center justify-between">
          <span class="text-text-secondary">Use OpenDyslexic</span>
          <input type="checkbox" id="toggle-dyslexia" class="toggle" role="switch" aria-checked="false">
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
      <h2 id="entry-popup-title" class="text-2xl font-bold mb-4 text-primary"><?php echo htmlspecialchars($welcomeMessage); ?></h2>
      <!-- text-text-default makes this modal theme-aware -->
      <!-- Use nl2br and htmlspecialchars for security and formatting -->
      <p class="mb-6 text-text-default"><?php echo nl2br(htmlspecialchars($welcomeParagraph)); ?></p>
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
    <p class="text-sm">Dark Mode is working on the settings page</p>
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
        <a class="flex items-center flex-shrink-0 text-white mr-6" href="index.php?page=home">
          <img src="Images/large.ico" alt="Company Logo" class="rounded-full h-8 w-8 mr-2"
            onerror="this.onerror=null; this.src='https://placehold.co/32x32/818CF8/FFFFFF?text=HL';" />
          <span class="font-semibold text-xl tracking-tight"><?php echo htmlspecialchars($pageTitle); ?></span>
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
            <a href="index.php?page=home"
              class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
              <i class="fas fa-home mr-1" aria-hidden="true"></i> Home
            </a>
            <a href="index.php?page=assessment"
              class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
              <i class="fas fa-tasks mr-1" aria-hidden="true"></i> Assessments
            </a>
            <!-- Example of other links from original header -->
             <a href="/learning.html"
              class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
              <i class="fas fa-book mr-1" aria-hidden="true"></i> Learning
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
          <div class="relative ml-4">
            <button
              class="flex items-center text-gray-200 hover:text-white focus:outline-none p-2 rounded-md focus:ring-2 focus:ring-white"
              id="profile-menu-button" type="button" aria-haspopup="true" aria-expanded="false"
              aria-controls="profile-dropdown">
              <img id="profile-pic" src="Images/large.ico" alt="Profile Picture" class="rounded-full h-8 w-8 mr-2"
                onerror="this.onerror=null; this.src='https://placehold.co/32x32/818CF8/FFFFFF?text=PP';" />
              <span id="profile-name" class="hidden md:inline-block">User</span>
              <i class="fas fa-chevron-down ml-2 text-xs" aria-hidden="true"></i>
              <span class="sr-only">Toggle user menu</span>
            </button>
            <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 hidden"
              role="menu" aria-orientation="vertical" aria-labelledby="profile-menu-button">
              <a href="/profile.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"><i
                  class="fas fa-user mr-2" aria-hidden="true"></i> Profile</a>
              <a href="/settings.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                role="menuitem"><i class="fas fa-cog mr-2" aria-hidden="true"></i> Settings</a>
              <a href="/help.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"><i
                  class="fas fa-question-circle mr-2" aria-hidden="true"></i> Help</a>
              <div class="border-t border-gray-100 my-1" role="separator"></div>
              <button id="sign-out" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                role="menuitem">
                <i class="fas fa-sign-out-alt mr-2" aria-hidden="true"></i> Sign Out
              </button>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
<?php
} // End of render_header() function

// ==================================================================
// 3. FOOTER FUNCTION (from src/footer.php)
// ==================================================================
function render_footer($pageTitle) {
  $currentYear = date("Y"); 
?>
  <!-- Footer -->
  <!-- Gradient is now controlled by theme variables -->
  <footer
    class="bg-gradient-to-r from-footer-bg-from to-footer-bg-to text-white py-10 px-4 rounded-t-xl shadow-lg transition-colors duration-300">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
      <!-- About -->
      <div>
        <h3 class="text-lg font-semibold mb-3 flex items-center">
          <i class="fas fa-graduation-cap mr-2" aria-hidden="true"></i> About
        </h3>
        <p class="text-sm opacity-90">
          Empowering students with learning disabilities through personalized
          learning experiences.
          <a href="/about.html"
            class="text-accent underline hover:text-white ml-1 focus:outline-none focus:ring-2 focus:ring-white">Learn
            more</a>
        </p>
      </div>
      <!-- Quick Links -->
      <div>
        <h3 class="text-lg font-semibold mb-3 flex items-center" id="quick-links-heading">
          <i class="fas fa-link mr-2" aria-hidden="true"></i> Quick Links
        </h3>
        <nav aria-labelledby="quick-links-heading">
          <ul class="space-y-2">
            <li>
              <a href="/curriculum"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-book mr-2" aria-hidden="true"></i>Curriculum</a>
            </li>
            <li>
              <a href="/research/index.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-flask mr-2" aria-hidden="true"></i>Research</a>
            </li>
            <li>
              <a href="/standard"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-chart-line mr-2" aria-hidden="true"></i>Standards</a>
            </li>
            <li>
              <a href="/help"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-question-circle mr-2" aria-hidden="true"></i>Help Center</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- Support -->
      <div>
        <h3 class="text-lg font-semibold mb-3 flex items-center" id="support-heading">
          <i class="fas fa-hands-helping mr-2" aria-hidden="true"></i> Support
        </h3>
        <nav aria-labelledby="support-heading">
          <ul class="space-y-2">
            <li>
              <a href="/contact.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-envelope mr-2" aria-hidden="true"></i>Contact Us</a>
            </li>
            <li>
              <a href="/students.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-home mr-2" aria-hidden="true"></i>For Students</a>
            </li>
            <li>
              <a href="/parents.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-users mr-2" aria-hidden="true"></i>For Parents</a>
            </li>
            <li>
              <a href="/teachers.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-chalkboard-teacher mr-2" aria-hidden="true"></i>For Teachers</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- Legal & Settings -->
      <div>
        <h3 class="text-lg font-semibold mb-3 flex items-center" id="legal-heading">
          <i class="fas fa-balance-scale mr-2" aria-hidden="true"></i> Legal & Settings
        </h3>
        <nav aria-labelledby="legal-heading">
          <ul class="space-y-2">
            <li>
              <a href="/privacy.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-shield-alt mr-2" aria-hidden="true"></i>Privacy Policy</a>
            </li>
            <li>
              <a href="/terms.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-file-contract mr-2" aria-hidden="true"></i>Terms of Use</a>
            </li>
            <li>
              <a href="/accessibility.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-universal-access mr-2" aria-hidden="true"></i>Accessibility</a>
            </li>
            <li>
              <a href="/about-us.html"
                class="hover:underline hover:text-accent transition focus:outline-none focus:ring-2 focus:ring-white rounded"><i
                  class="fas fa-info-circle mr-2" aria-hidden="true"></i>About Us</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="mt-10 border-t border-accent pt-6 text-center text-sm opacity-90">
      <p>
        &copy; <span id="year"><?php echo $currentYear; ?></span> <?php echo htmlspecialchars($pageTitle); ?>. All rights reserved.
        <span class="mx-2" aria-hidden="true">|</span>
        Made with <i class="fas fa-heart text-red-400" aria-label="love"></i> for education
      </p>
      <p class="mt-2">
        <a property="dct:title" rel="cc:attributionURL" href="http://hestena62.com"
          class="text-accent underline hover:text-white focus:outline-none focus:ring-2 focus:ring-white rounded">Hesten's
          Learning</a>
        by
        <a rel="cc:attributionURL dct:creator" property="cc:attributionName" href="http://hestena62.com/about-me.html"
          class="text-accent underline hover:text-white focus:outline-none focus:ring-2 focus:ring-white rounded">Hesten
          Allison</a>
        is licensed under
        <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/?ref=chooser-v1" target="_blank"
          rel="license noopener noreferrer"
          class="text-accent underline hover:text-white focus:outline-none focus:ring-2 focus:ring-white rounded">CC
          BY-NC-SA 4.0</a>
      </p>
      <div class="gtranslate_wrapper mt-4"></div>
      <script>
        window.gtranslateSettings = {
          default_language: "en",
          native_language_names: true,
          detect_browser_language: true,
          wrapper_selector: ".gtranslate_wrapper",
          flag_style: "3d",
          alt_flags: { en: "usa" },
        };
      </script>
      <script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>
      <div class="mt-4 flex justify-center items-center gap-4">
        <a href="#"
          onclick="window.open('https://www.sitelock.com/verify.php?site=hestena62.com','SiteLock','width=600,height=600,left=160,top=170');"
          title="SiteLock" class="focus:outline-none focus:ring-2 focus:ring-white rounded">
          <img alt="SiteLock" src="https://shield.sitelock.com/shield/hestena62.com"
            class="h-8 w-auto rounded shadow" />
        </a>

        <a href="https://www.buymeacoffee.com/hestena62"
          class="focus:outline-none focus:ring-2 focus:ring-white rounded">
          <img
            src="https://img.buymeacoffee.com/button-api/?text=Buy me a coffee&emoji=&slug=hestena62&button_colour=BD5FFF&font_colour=ffffff&font_family=Cookie&outline_colour=000000&coffee_colour=FFDD00"
            alt="Buy me a coffee" />
        </a>

      </div>
    </div>


  </footer>

  <!-- REPLACED MODALS with new theme-aware and focus-trapping versions -->

  <!-- Message Box Modal -->
  <div id="message-box" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-[100]"
    role="alertdialog" aria-modal="true" aria-labelledby="message-title">
    <!-- bg-content-bg makes this theme-aware -->
    <div
      class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-sm w-full text-center transform scale-100 transition-transform duration-300">
      <h4 id="message-title" class="text-xl font-bold mb-4 text-primary">Notification</h4>
      <p id="message-text" class="mb-6 text-text-default">This is a general message.</p>
      <button id="message-ok-button"
        class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent">
        OK
      </button>
    </div>
  </div>

  <!-- Confirmation Modal -->
  <div id="confirmation-modal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-[100]"
    role="dialog" aria-modal="true" aria-labelledby="confirmation-title">
    <!-- bg-content-bg makes this theme-aware -->
    <div
      class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-sm w-full text-center transform scale-100 transition-transform duration-300">
      <h4 id="confirmation-title" class="text-xl font-bold mb-4 text-red-500">Confirm Action</h4>
      <p id="confirmation-text" class="mb-6 text-text-default">Are you sure you want to proceed?</p>
      <div class="flex justify-center space-x-4">
        <button id="confirm-yes-button"
          class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-red-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-400">
          Yes
        </button>
        <button id="confirm-no-button"
          class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-semibold hover:bg-gray-400 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
          No
        </button>
      </div>
    </div>
  </div>

  <!-- REPLACED SCRIPT with new comprehensive script -->
  <script>
    // --- GLOBAL MODAL FUNCTIONS (New versions with focus trap) ---
    const messageBox = document.getElementById("message-box");
    const messageText = document.getElementById("message-text");
    const messageOkButton = document.getElementById("message-ok-button");
    const confirmationModal = document.getElementById("confirmation-modal");
    const confirmationText = document.getElementById("confirmation-text");
    const confirmYesButton = document.getElementById("confirm-yes-button");
    const confirmNoButton = document.getElementById("confirm-no-button");

    // Helper to manage focus for accessibility when modals are open
    let lastFocusedElement = null;

    // A11Y: Function to handle focus trap in modals
    // [FIX] Updated function to properly add/remove its event listener
    function trapFocus(modalElement) {
      const focusableElements = modalElement.querySelectorAll(
        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
      );
      if (focusableElements.length === 0) return;

      const firstFocusableElement = focusableElements[0];
      const lastFocusableElement = focusableElements[focusableElements.length - 1];

      // [FIX] Define a named handler to add/remove
      const handleFocusTrap = function (e) {
        if (e.key !== 'Tab') {
          return;
        }

        if (e.shiftKey) { // Shift + Tab
          if (document.activeElement === firstFocusableElement) {
            lastFocusableElement.focus();
            e.preventDefault();
          }
        } else { // Tab
          if (document.activeElement === lastFocusableElement) {
            firstFocusableElement.focus();
            e.preventDefault();
          }
        }
      };

      // [FIX] Store the handler on the element so we can remove it later
      modalElement._handleFocusTrap = handleFocusTrap;
      modalElement.addEventListener('keydown', modalElement._handleFocusTrap);

      // Focus the first element
      firstFocusableElement.focus();
    }

    // [FIX] Helper to remove the focus trap listener
    function removeTrapFocus(modalElement) {
      if (modalElement && modalElement._handleFocusTrap) {
        modalElement.removeEventListener('keydown', modalElement._handleFocusTrap);
        delete modalElement._handleFocusTrap;
      }
    }


    function showMessageBox(message) {
      if (!messageBox || !messageText || !messageOkButton) return;

      lastFocusedElement = document.activeElement; // Store focus
      messageText.textContent = message;
      messageBox.classList.remove("hidden");
      messageBox.style.display = 'flex';

      // A11Y: Focus the OK button and trap focus
      trapFocus(messageBox);

      messageOkButton.onclick = () => {
        messageBox.classList.add("hidden");
        messageBox.style.display = 'none';
        removeTrapFocus(messageBox); // [FIX] Remove listener
        if (lastFocusedElement) lastFocusedElement.focus(); // Restore focus
      };
    }

    function showConfirmationModal(message, onConfirm) {
      if (!confirmationModal || !confirmationText || !confirmYesButton || !confirmNoButton) return;

      lastFocusedElement = document.activeElement; // Store focus
      confirmationText.textContent = message;
      confirmationModal.classList.remove("hidden");
      confirmationModal.style.display = 'flex';

      // A11Y: Focus the "No" button by default and trap focus
      trapFocus(confirmationModal);
      if (confirmNoButton) confirmNoButton.focus();

      const handleConfirmation = (result) => {
        confirmationModal.classList.add("hidden");
        confirmationModal.style.display = 'none';
        removeTrapFocus(confirmationModal); // [FIX] Remove listener
        if (lastFocusedElement) lastFocusedElement.focus(); // Restore focus
        onConfirm(result);
      };

      confirmYesButton.onclick = () => handleConfirmation(true);
      confirmNoButton.onclick = () => handleConfirmation(false);
    }

    // --- UI Interactions (Navigation, Dropdown, Announcement) ---

    // Mobile Navigation Toggle
    const navToggle = document.getElementById("nav-toggle");
    const navContent = document.getElementById("nav-content");

    if (navToggle && navContent) {
      navToggle.addEventListener("click", function () {
        const isHidden = navContent.classList.toggle("hidden");
        this.setAttribute('aria-expanded', isHidden ? 'false' : 'true');
        navContent.setAttribute('aria-hidden', isHidden ? 'true' : 'false');
      });
    }

    // Profile Dropdown Toggle
    const profileMenuButton = document.getElementById("profile-menu-button");
    const profileDropdown = document.getElementById("profile-dropdown");

    if (profileMenuButton && profileDropdown) {
      profileMenuButton.addEventListener("click", function (event) {
        event.stopPropagation();
        const isHidden = profileDropdown.classList.toggle("hidden");
        this.setAttribute('aria-expanded', isHidden ? 'false' : 'true');
      });
    }

    document.addEventListener("click", function (event) {
      if (profileMenuButton && profileDropdown && !profileMenuButton.contains(event.target) && !profileDropdown.contains(event.target)) {
        profileDropdown.classList.add("hidden");
        profileMenuButton.setAttribute('aria-expanded', 'false');
      }
    });

    // Announcement Bar Close
    const closeAnnouncementBtn = document.getElementById("close-announcement");
    const announcementBar = document.getElementById("announcement-bar");
    if (closeAnnouncementBtn && announcementBar) {
      closeAnnouncementBtn.addEventListener("click", function () {
        announcementBar.style.display = "none";
      });
    }


    // --- ADVANCED ACCESSIBILITY PANEL LOGIC ---

    const a11yPanel = document.getElementById('a11y-settings-panel');
    const a11yToggleButton = document.getElementById('a11y-toggle-button');
    const a11yCloseButton = document.getElementById('a11y-close-button');

    if (a11yPanel && a11yToggleButton && a11yCloseButton) {
      // Panel open/close
      a11yToggleButton.addEventListener('click', () => {
        a11yPanel.classList.remove('translate-x-full');
        a11yPanel.setAttribute('aria-hidden', 'false');
        trapFocus(a11yPanel);
      });

      a11yCloseButton.addEventListener('click', () => {
        a11yPanel.classList.add('translate-x-full');
        a11yPanel.setAttribute('aria-hidden', 'true');
        removeTrapFocus(a11yPanel); // [FIX] Remove listener
        a11yToggleButton.focus();
      });

      // Close on escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !a11yPanel.classList.contains('translate-x-full')) {
          a11yPanel.classList.add('translate-x-full');
          a11yPanel.setAttribute('aria-hidden', 'true');
          removeTrapFocus(a11yPanel); // [FIX] Remove listener
          a11yToggleButton.focus();
        }
      });
    }


    // --- ACCESSIBILITY SETTINGS CONTROLS ---

    // Note: currentSettings is already loaded and applied by this point.
    // We just need to initialize the controls to match.

    // Theme Buttons
    document.getElementById('theme-light')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'light' }));
    document.getElementById('theme-dark')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'dark' }));
    document.getElementById('theme-contrast')?.addEventListener('click', () => saveSettings({ ...currentSettings, theme: 'high-contrast' }));

    // Dyslexia Font Toggle
    const dyslexiaToggle = document.getElementById('toggle-dyslexia');
    if (dyslexiaToggle) {
      dyslexiaToggle.checked = currentSettings.dyslexiaFont;
      dyslexiaToggle.setAttribute('aria-checked', currentSettings.dyslexiaFont);
      dyslexiaToggle.addEventListener('change', (e) => {
        e.target.setAttribute('aria-checked', e.target.checked);
        saveSettings({ ...currentSettings, dyslexiaFont: e.target.checked });
      });
    }

    // Reduced Motion Toggle
    const motionToggle = document.getElementById('toggle-reduced-motion');
    if (motionToggle) {
      motionToggle.checked = currentSettings.reducedMotion;
      motionToggle.setAttribute('aria-checked', currentSettings.reducedMotion);
      motionToggle.addEventListener('change', (e) => {
        e.target.setAttribute('aria-checked', e.target.checked);
        saveSettings({ ...currentSettings, reducedMotion: e.target.checked });
      });
    }

    // Font Size Slider
    const fontSizeSlider = document.getElementById('font-size-slider');
    const fontSizeValue = document.getElementById('font-size-value');
    if (fontSizeSlider && fontSizeValue) {
      fontSizeSlider.value = currentSettings.fontSize;
      fontSizeValue.textContent = Math.round(currentSettings.fontSize * 100);

      fontSizeSlider.addEventListener('input', (e) => {
        const value = parseFloat(e.target.value);
        fontSizeValue.textContent = Math.round(value * 100);
        // Apply immediately for visual feedback
        document.documentElement.style.setProperty('--site-font-size', `${value}rem`);
      });
      // Save on release
      fontSizeSlider.addEventListener('change', (e) => {
        saveSettings({ ...currentSettings, fontSize: parseFloat(e.target.value) });
      });
    }

    // Line Height Slider
    const lineHeightSlider = document.getElementById('line-height-slider');
    const lineHeightValue = document.getElementById('line-height-value');
    if (lineHeightSlider && lineHeightValue) {
      lineHeightSlider.value = currentSettings.lineHeight;
      lineHeightValue.textContent = currentSettings.lineHeight.toFixed(1);

      lineHeightSlider.addEventListener('input', (e) => {
        const value = parseFloat(e.target.value);
        lineHeightValue.textContent = value.toFixed(1);
        // Apply immediately for visual feedback
        document.documentElement.style.setProperty('--site-line-height', value);
      });
      // Save on release
      lineHeightSlider.addEventListener('change', (e) => {
        saveSettings({ ...currentSettings, lineHeight: parseFloat(e.target.value) });
      });
    }

    // Reading Mask Logic
    const readingMaskToggle = document.getElementById('toggle-reading-mask');
    const readingMask = document.getElementById('reading-mask');
    const readingGuide = document.getElementById('reading-guide');
    let isDragging = false;

    if (readingMaskToggle && readingMask && readingGuide) {
      readingMaskToggle.checked = false; // Mask is not persistent across sessions for usability
      readingMaskToggle.setAttribute('aria-checked', 'false');

      readingMaskToggle.addEventListener('change', (e) => {
        e.target.setAttribute('aria-checked', e.target.checked);
        if (e.target.checked) {
          readingMask.classList.remove('hidden');
        } else {
          readingMask.classList.add('hidden');
        }
      });

      // Draggable reading guide logic (Touch and Mouse)
      const startDrag = (e) => {
        isDragging = true;
        readingGuide.style.cursor = 'grabbing';
        e.preventDefault();
      };

      const dragGuide = (clientY) => {
        if (!isDragging) return;
        // Calculate new top percentage based on mouse/touch position
        let newTop = (clientY / window.innerHeight) * 100;
        // Clamp value to prevent dragging outside of visible area (10% to 90%)
        newTop = Math.max(10, Math.min(90, newTop));
        readingGuide.style.top = `${newTop}%`;
      };

      const stopDrag = () => {
        isDragging = false;
        readingGuide.style.cursor = 'pointer';
      };

      // Mouse Events
      readingGuide.addEventListener('mousedown', startDrag);
      document.addEventListener('mousemove', (e) => dragGuide(e.clientY));
      document.addEventListener('mouseup', stopDrag);

      // Touch Events
      readingGuide.addEventListener('touchstart', (e) => startDrag(e.touches[0]));
      document.addEventListener('touchmove', (e) => dragGuide(e.touches[0].clientY));
      document.addEventListener('touchend', stopDrag);
    }

    // Reset Button
    const resetA11yBtn = document.getElementById('reset-a11y-settings');
    if (resetA11yBtn) {
      resetA11yBtn.addEventListener('click', () => {
        localStorage.removeItem(STORAGE_KEY);
        // [FIX] Use the defaultSettings object, not a new literal
        saveSettings({ ...defaultSettings }); // Save and apply defaults

        // Update UI elements to reflect reset
        if (fontSizeSlider) fontSizeSlider.value = defaultSettings.fontSize;
        if (fontSizeValue) fontSizeValue.textContent = Math.round(defaultSettings.fontSize * 100);
        if (lineHeightSlider) lineHeightSlider.value = defaultSettings.lineHeight;
        if (lineHeightValue) lineHeightValue.textContent = defaultSettings.lineHeight.toFixed(1);
        if (dyslexiaToggle) {
          dyslexiaToggle.checked = defaultSettings.dyslexiaFont;
          dyslexiaToggle.setAttribute('aria-checked', defaultSettings.dyslexiaFont);
        }
        if (motionToggle) {
          motionToggle.checked = defaultSettings.reducedMotion;
          motionToggle.setAttribute('aria-checked', defaultSettings.reducedMotion);
        }

        // Force reset of non-persistent mask
        if (readingMaskToggle) {
          readingMaskToggle.checked = false;
          readingMaskToggle.setAttribute('aria-checked', 'false');
        }
        if (readingMask) readingMask.classList.add('hidden');

        showMessageBox("Settings have been reset to default values.");
      });
    }

  </script>

</body>

</html>
<?php
} // End of render_footer() function

// ==================================================================
// 4. MAIN ROUTER / PAGE LOGIC
// ==================================================================

// Get current page from URL, default to 'home'
$page = $_GET['page'] ?? 'home';

switch ($page) {

    // -------------------------
    // CASE: ASSESSMENT HOME
    // -------------------------
    case 'assessment':
        // --- PHP Page Variables ---
        $pageTitle = "Assessments";
        $pageDescription = "Select a subject to start your assessment. Choose from Math, ELA, Science, or Social Studies.";
        $pageKeywords = "assessments, tests, quiz, math, ela, science, social studies";
        $pageAuthor = "Hesten's Learning";
        $welcomeMessage = "Assessments";
        $welcomeParagraph = "Please select a subject below to begin your test.";

        render_header($pageTitle, $pageDescription, $pageKeywords, $pageAuthor, $welcomeMessage, $welcomeParagraph);

        // --- List of Available Tests ---
        $assessments = [
            [
            'subject' => 'math',
            'title' => 'Math',
            'description' => 'Test your skills in algebra, geometry, and basic arithmetic.',
            'icon' => 'fas fa-calculator'
            ],
            [
            'subject' => 'ela',
            'title' => 'ELA (Language Arts)',
            'description' => 'Test your knowledge of grammar, vocabulary, and reading comprehension.',
            'icon' => 'fas fa-book-open'
            ],
            [
            'subject' => 'science',
            'title' => 'Science',
            'description' => 'Explore concepts in biology, chemistry, and physics.',
            'icon' => 'fas fa-flask'
            ],
            [
            'subject' => 'social_studies',
            'title' => 'Social Studies',
            'description' => 'Show what you know about history, geography, and civics.',
            'icon' => 'fas fa-globe-americas'
            ]
        ];
    ?>
    <!-- Main content - Test Selection -->
    <main class="container mx-auto py-12 px-4">
      <h1 class="text-4xl font-bold text-center text-text-default mb-10">
        Select Your Assessment
      </h1>
      <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8" aria-label="Available assessments">
        
        <?php foreach ($assessments as $test): ?>
          <article
            class="bg-content-bg rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl flex flex-col justify-between text-center">
            
            <div>
              <i class="<?php echo htmlspecialchars($test['icon']); ?> text-5xl text-primary mb-4"></i>
              <h2 class="text-2xl font-bold text-text-default mb-3" id="<?php echo htmlspecialchars($test['subject']); ?>-test">
                <?php echo htmlspecialchars($test['title']); ?>
              </h2>
              <p class="text-text-secondary mb-6 flex-grow">
                <?php echo htmlspecialchars($test['description']); ?>
              </p>
            </div>

            <!-- UPDATE: Link points to single file with parameters -->
            <a href="index.php?page=take_test&subject=<?php echo htmlspecialchars($test['subject']); ?>"
              class="bg-primary text-white hover:bg-secondary py-3 px-6 rounded-lg font-semibold text-center transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
              aria-label="Start <?php echo htmlspecialchars($test['title']); ?> Test">
              Start Test
            </a>
          </article>
        <?php endforeach; ?>

      </section>
    </main>
    <?php
        render_footer($pageTitle);
        break;

    // -------------------------
    // CASE: TAKE TEST
    // -------------------------
    case 'take_test':
        // Get the subject from the URL
        $subject = $_GET['subject'] ?? '';
        $questions = get_questions_for_subject($subject, $all_questions);
        $subject_title = get_subject_title($subject);

        // If no subject or invalid subject, redirect to assessment home
        if (empty($questions)) {
            header('Location: index.php?page=assessment');
            exit;
        }

        // Store the correct answers and subject in the session for results.php
        $_SESSION['current_test_subject'] = $subject;
        $_SESSION['current_test_questions'] = $questions; // Store full questions for review
        $_SESSION['current_test_correct_answers'] = array_column($questions, 'correct');


        // --- PHP Page Variables ---
        $pageTitle = $subject_title;
        $pageDescription = "Take the " . $subject_title . ".";
        $pageKeywords = "test, quiz, $subject";
        $pageAuthor = "Hesten's Learning";
        $welcomeMessage = $subject_title;
        $welcomeParagraph = "Please answer all questions to the best of your ability.";

        render_header($pageTitle, $pageDescription, $pageKeywords, $pageAuthor, $welcomeMessage, $welcomeParagraph);
    ?>
    <!-- Main content - Test Form -->
    <main class="container mx-auto py-12 px-4">
      <h1 class="text-4xl font-bold text-center text-text-default mb-10">
        <?php echo htmlspecialchars($subject_title); ?>
      </h1>

      <!-- UPDATE: Form action points to single file with parameters -->
      <form action="index.php?page=results" method="POST" class="max-w-3xl mx-auto bg-content-bg p-8 rounded-xl shadow-lg">
        
        <?php foreach ($questions as $index => $q): ?>
          <fieldset class="mb-8 border-b border-gray-200 dark:border-gray-700 pb-6">
            <legend class="text-xl font-semibold text-text-default mb-4">
              Question <?php echo $index + 1; ?>: <?php echo htmlspecialchars($q['question']); ?>
            </legend>
            
            <div class="space-y-3">
              <?php foreach ($q['options'] as $opt_index => $option): ?>
                <label for="q<?php echo $index; ?>_opt<?php echo $opt_index; ?>" class="block w-full p-4 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors cursor-pointer has-[:checked]:bg-primary has-[:checked]:text-white has-[:checked]:border-primary">
                  <input 
                    type="radio" 
                    name="q<?php echo $index; ?>" 
                    id="q<?php echo $index; ?>_opt<?php echo $opt_index; ?>" 
                    value="<?php echo $opt_index; ?>" 
                    class="mr-3"
                    required>
                  <?php echo htmlspecialchars($option); ?>
                </label>
              <?php endforeach; ?>
            </div>
          </fieldset>
        <?php endforeach; ?>

        <div class="text-center">
          <button 
            type="submit" 
            class="bg-primary text-white text-lg font-bold hover:bg-secondary py-3 px-10 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
            Submit Answers
          </button>
        </div>

      </form>
    </main>
    <?php
        render_footer($pageTitle);
        break;

    // -------------------------
    // CASE: RESULTS PAGE
    // -------------------------
    case 'results':
        // --- Check if test data exists in session ---
        if (!isset($_SESSION['current_test_subject']) || !isset($_SESSION['current_test_correct_answers']) || !isset($_SESSION['current_test_questions']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            // If no data, redirect to home
            header('Location: index.php?page=assessment');
            exit;
        }

        // --- Get data from session and POST ---
        $subject = $_SESSION['current_test_subject'];
        $subject_title = get_subject_title($subject);
        $questions = $_SESSION['current_test_questions'];
        $correct_answers = $_SESSION['current_test_correct_answers'];
        $user_answers = $_POST; // Get all answers from POST

        // --- Calculate Score ---
        $score = 0;
        $total_questions = count($questions);
        $test_review_html = ''; // For displaying on the page
        $test_review_txt = ""; // For .txt download

        $test_review_txt .= "$subject_title - Results\n";
        $test_review_txt .= "=============================\n\n";

        for ($i = 0; $i < $total_questions; $i++) {
            $user_answer_index = $user_answers['q' . $i] ?? null; // Get user's selected index
            $correct_answer_index = $correct_answers[$i];
            
            $q = $questions[$i];
            $question_text = $q['question'];
            $correct_answer_text = $q['options'][$correct_answer_index];
            $user_answer_text = ($user_answer_index !== null) ? $q['options'][$user_answer_index] : "No Answer";

            $is_correct = ($user_answer_index == $correct_answer_index);
            if ($is_correct) {
                $score++;
            }

            // --- Build HTML Review ---
            $test_review_html .= '<div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">';
            $test_review_html .= '<h4 class="text-lg font-semibold text-text-default mb-2">Question ' . ($i + 1) . ': ' . htmlspecialchars($question_text) . '</h4>';
            
            if ($is_correct) {
                $test_review_html .= '<p class="text-green-600 dark:text-green-400 font-medium"><i class="fas fa-check-circle mr-2"></i>Your Answer: ' . htmlspecialchars($user_answer_text) . ' (Correct)</p>';
            } else {
                $test_review_html .= '<p class="text-red-600 dark:text-red-400 font-medium"><i class="fas fa-times-circle mr-2"></i>Your Answer: ' . htmlspecialchars($user_answer_text) . '</p>';
                $test_review_html .= '<p class="text-green-600 dark:text-green-400 font-medium"><i class="fas fa-check-circle mr-2"></i>Correct Answer: ' . htmlspecialchars($correct_answer_text) . '</p>';
            }
            $test_review_html .= '</div>';

            // --- Build TXT Review ---
            $test_review_txt .= "Question " . ($i + 1) . ": " . $question_text . "\n";
            $test_review_txt .= "Your Answer: " . $user_answer_text . "\n";
            if (!$is_correct) {
                $test_review_txt .= "Correct Answer: " . $correct_answer_text . "\n";
            }
            $test_review_txt .= "Status: " . ($is_correct ? "Correct" : "Incorrect") . "\n\n";
        }

        $percentage = ($total_questions > 0) ? round(($score / $total_questions) * 100) : 0;
        $test_review_txt .= "=============================\n";
        $test_review_txt .= "Final Score: $score out of $total_questions ($percentage%)\n";

        // --- Clear session data for this test ---
        unset($_SESSION['current_test_subject']);
        unset($_SESSION['current_test_correct_answers']);
        unset($_SESSION['current_test_questions']);

        // --- PHP Page Variables ---
        $pageTitle = "Test Results";
        $pageDescription = "View your test results for the $subject_title.";
        $pageKeywords = "test, quiz, results, score, $subject";
        $pageAuthor = "Hesten's Learning";
        $welcomeMessage = "Test Results";
        $welcomeParagraph = "Here's how you did on the $subject_title.";

        render_header($pageTitle, $pageDescription, $pageKeywords, $pageAuthor, $welcomeMessage, $welcomeParagraph);
    ?>
    <!-- Main content - Results Display -->
    <main class="container mx-auto py-12 px-4">
      <div class="max-w-4xl mx-auto bg-content-bg p-8 rounded-xl shadow-lg">

        <h1 class="text-4xl font-bold text-center text-text-default mb-4">
          Your Score
        </h1>
        
        <!-- Grade Display -->
        <div class="text-center mb-8">
          <p class="text-6xl font-extrabold text-primary"><?php echo $percentage; ?>%</p>
          <p class="text-2xl text-text-secondary font-semibold">
            You answered <?php echo $score; ?> out of <?php echo $total_questions; ?> questions correctly.
          </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col md:flex-row justify-center gap-4 mb-10">
          <!-- UPDATE: Links point to single file with parameters -->
          <a href="index.php?page=take_test&subject=<?php echo htmlspecialchars($subject); ?>" 
            class="bg-primary text-white text-center font-semibold hover:bg-secondary py-3 px-6 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
            <i class="fas fa-redo mr-2"></i>Retake Test
          </a>
          <a href="index.php?page=assessment" 
            class="bg-gray-600 text-white text-center font-semibold hover:bg-gray-700 py-3 px-6 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            <i class="fas fa-th-large mr-2"></i>All Assessments
          </a>
        </div>

        <!-- Download Options -->
        <div class="text-center mb-10 border-t border-b border-gray-200 dark:border-gray-700 py-6">
          <h3 class="text-lg font-semibold text-text-default mb-3">Download Your Results</h3>
          <div class="flex flex-col md:flex-row justify-center gap-3">
            <button id="download-txt" class="bg-blue-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
              <i class="fas fa-file-alt mr-2"></i>Download .txt
            </button>
            <button id="download-pdf" disabled class="bg-red-500 text-white font-medium py-2 px-4 rounded-lg opacity-50 cursor-not-allowed" aria-label="PDF download not implemented">
              <i class="fas fa-file-pdf mr-2"></i>Download .pdf
            </button>
            <button id="download-docx" disabled class="bg-indigo-500 text-white font-medium py-2 px-4 rounded-lg opacity-50 cursor-not-allowed" aria-label="DOCX download not implemented">
              <i class="fas fa-file-word mr-2"></i>Download .docx
            </button>
          </div>
          <p class="text-xs text-text-secondary mt-3">(PDF and DOCX downloads require server-side libraries and are not implemented in this demo)</p>
        </div>

        <!-- Test Review Section -->
        <div id="test-review-section">
          <h2 class="text-3xl font-bold text-text-default mb-6">Answer Review</h2>
          <?php echo $test_review_html; ?>
        </div>

        <!-- Hidden div for TXT download content -->
        <div id="txt-download-content" class="hidden">
          <?php echo htmlspecialchars($test_review_txt); ?>
        </div>

      </div>
    </main>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const downloadTxtBtn = document.getElementById('download-txt');
        if (downloadTxtBtn) {
          downloadTxtBtn.addEventListener('click', function() {
            // Get the plain text content from the hidden div
            const textContent = document.getElementById('txt-download-content').textContent;
            
            // Create a Blob
            const blob = new Blob([textContent], { type: 'text/plain' });
            
            // Create a temporary <a> element to trigger the download
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = '<?php echo htmlspecialchars($subject); ?>-test-results.txt';
            
            // Append to body, click, and remove
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(a.href);
          });
        }
      });
    </script>
    <?php
        render_footer($pageTitle);
        break;

    // -------------------------
    // CASE: HOME PAGE (DEFAULT)
    // -------------------------
    case 'home':
    default:
        // --- PHP Page Variables ---
        $pageTitle = "Hesten's Learning";
        $pageDescription = "Hesten's Learning - Empowering students with learning disabilities through personalized learning experiences.";
        $pageKeywords = "learning disabilities, personalized education, online learning, math, ELA, science, social studies";
        $pageAuthor = "Hesten's Learning";
        $welcomeMessage = "Welcome!";
        $welcomeParagraph = "Thank you for visiting Hesten's Learning. If you are visiting from a resint Facebook post, and have question? Please email me at admin@hestena62.com";

        // --- Dynamic Content Array ---
        $learningLevels = [
            [
            'id' => 'pre-k',
            'title' => 'Pre-K',
            'description' => 'Counting objects, letter names, rhyming words, and more. Foundational skills for early learners.',
            'link' => '/Level/A.html'
            ],
            // ... (all other levels from your original index.php) ...
            [
            'id' => 'grade-12',
            'title' => 'Grade 12',
            'description' => 'Advanced calculus, literature analysis, physics, and more. Final preparations for higher education.',
            'link' => '/Level/L.html'
            ],
            [
            'id' => 'test-section',
            'title' => 'Assessments', // <-- UPDATED TITLE
            'description' => 'Practice with quizzes and tests to master new topics across all subjects.',
            'link' => 'index.php?page=assessment' // <-- UPDATED LINK
            ],
        ];

        render_header($pageTitle, $pageDescription, $pageKeywords, $pageAuthor, $welcomeMessage, $welcomeParagraph);
    ?>
    <!-- Hero section -->
    <header
      class="bg-gradient-to-r from-primary to-secondary text-white py-16 px-4 text-center rounded-b-lg shadow-xl transition-colors duration-300">
      <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-up">
        Welcome to Our Learning Platform
      </h1>
      <p class="text-lg md:text-xl mb-8 animate-fade-in-up delay-100">
        Explore skills and improve at your own pace with personalized learning
        experiences.
      </p>
      <a href="/about.html"
        class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105 animate-fade-in-up delay-200 focus:outline-none focus:ring-2 focus:ring-white"
        aria-label="Get Started with Hesten's Learning">Get Started</a>
    </header>

    <!-- Main content - Learning Levels -->
    <main class="container mx-auto py-12 px-4">
      <h2 id="learning-levels-heading" class="sr-only">Learning Levels</h2>
      <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" aria-labelledby="learning-levels-heading">
        
        <?php foreach ($learningLevels as $level): ?>
          <article
            class="bg-content-bg rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl flex flex-col justify-between">
            <h2 class="text-2xl font-bold text-text-default mb-3" id="<?php echo htmlspecialchars($level['id']); ?>">
              <?php echo htmlspecialchars($level['title']); ?>
            </h2>
            <p class="text-text-secondary mb-4 flex-grow">
              <?php echo htmlspecialchars($level['description']); ?>
            </p>
            <a href="<?php echo htmlspecialchars($level['link']); ?>"
              class="bg-primary text-white hover:bg-secondary py-2 px-4 rounded-lg font-medium text-center transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
              aria-label="Explore <?php echo htmlspecialchars($level['title']); ?> Skills">Explore Skills</a>
          </article>
        <?php endforeach; ?>

      </section>
    </main>
    <?php
        render_footer($pageTitle);
        break;
} // End of switch statement

?>

