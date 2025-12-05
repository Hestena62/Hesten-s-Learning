<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth scroll-pt-24">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : 'Empowering students with learning disabilities through personalized learning experiences.'; ?>" />
    <meta name="keywords" content="<?php echo isset($pageKeywords) ? htmlspecialchars($pageKeywords) : 'education, learning disabilities, accessibility, personalized learning, special education'; ?>" />
    <meta name="author" content="<?php echo isset($pageAuthor) ? htmlspecialchars($pageAuthor) : 'Hesten\'s Learning'; ?>" />

    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="<?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Hesten\'s Learning'; ?>" />
    <meta property="og:description" content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : 'Personalized, accessible learning for everyone.'; ?>" />
    <meta property="og:image" content="https://hestena62.com/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" />
    <meta property="og:url" content="https://hestena62.com" />    
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />

    <!-- Structured Data (JSON-LD) for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "EducationalOrganization",
      "name": "Hesten's Learning",
      "url": "https://hestena62.com",
      "logo": "https://hestena62.com/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png",
      "description": "Empowering students with learning disabilities through personalized learning experiences.",
      "sameAs": [
        "https://twitter.com/hestenslearning",
        "https://facebook.com/hestenslearning"
      ]
    }
    </script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- File linking all the needed libraries -->
    <script src="/src/all-lib.php"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Lexend:wght@300;400;600&family=Merriweather:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Hesten\'s Learning'; ?></title>

    <script>
        // --- Tailwind Configuration with Dynamic CSS Variables ---
        tailwind.config = {
            darkMode: 'class', // Enables dark mode via 'class' strategy
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["var(--site-font-family, 'Inter')", "sans-serif"],
                        dyslexic: ['"Open Dyslexic"', 'sans-serif'],
                        mono: ['"Roboto Mono"', 'monospace'],
                    },
                    colors: {
                        // Dynamic colors linked to CSS Variables
                        'primary': 'var(--color-primary, #1D4ED8)',
                        'secondary': 'var(--color-secondary, #3B82F6)',
                        'accent': 'var(--color-accent, #60A5FA)',
                        'base-bg': 'var(--color-base-bg, #F9FAFB)',
                        'content-bg': 'var(--color-content-bg, #FFFFFF)',
                        'text-default': 'var(--color-text-default, #1F2937)',
                        'text-secondary': 'var(--color-text-secondary, #6B7280)',
                        
                        // Legacy/Theme mapping
                        'header-bg': 'var(--color-header-bg)',
                        'footer-bg-from': 'var(--color-footer-bg-from)',
                        'footer-bg-to': 'var(--color-footer-bg-to)',
                        'link-color': 'var(--color-link)',
                        'card-bg': 'var(--color-card-bg)',
                    },
                    borderRadius: {
                        "base-rounded": "var(--border-radius-base, 0.75rem)",
                    },
                    animation: {
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.5s ease-out forwards',
                    },
                    keyframes: {
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                },
            },
        };

        // --- Critical Accessibility/Theme Initialization ---
        const defaultSettings = {
            theme: 'light',
            fontSize: 1.0,
            lineHeight: 1.6,
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
                return defaultSettings;
            }
        }

        function saveSettings(settings) {
            try {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
                applySettings(settings);
                currentSettings = settings;
            } catch (e) { console.error("Error saving settings", e); }
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
            
            if (settings.reducedMotion) body.classList.add('reduced-motion');
            else body.classList.remove('reduced-motion');
        }

        let currentSettings = loadSettings();
        applyHeadSettings(currentSettings);
    </script>

    <!-- Favicon -->
    <link rel="icon" href="Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" />

    <!-- Core CSS Variables & Fonts -->
    <style>
        /* Font Imports */
        @font-face { font-family: 'Open Dyslexic'; src: url('/font/OpenDyslexic/OpenDyslexic-Regular.otf') format('opentype'); font-display: swap; }
        @font-face { font-family: 'Inter'; src: url('/font/Inter/static/Inter_18pt-Regular.ttf') format('truetype'); font-display: swap; }
        @font-face { font-family: 'Roboto Mono'; src: url('/font/Roboto_Mono/static/RobotoMono-Regular.ttf') format('truetype'); font-display: swap; }

        body {
            /* Fallback background */
            background-color: var(--color-base-bg);
            /* Rich Gradient Background */
            background-image: var(--site-bg-gradient);
            background-attachment: fixed;
            background-size: cover;
            
            color: var(--color-text-default);
            font-size: var(--site-font-size, 1rem);
            line-height: var(--site-line-height, 1.6);
            transition: background-color 0.3s, color 0.3s, font-size 0.3s;
            min-height: 100vh;
            font-family: var(--site-font-family, "Inter", sans-serif);
        }

        /* --- Theme Definitions --- */
        .light {
            --color-primary: #4F46E5; --color-secondary: #6366F1; --color-accent: #818CF8;
            --color-header-bg: #1F2937; --color-footer-bg-from: #4F46E5; --color-footer-bg-to: #6366F1;
            --color-link: #4F46E5; --color-card-bg: #FFFFFF;
            --color-base-bg: #F3F4F6; --color-content-bg: #FFFFFF;
            --color-text-default: #1F2937; --color-text-secondary: #4B5563;
            --border-radius-base: 0.75rem;
            
            /* Enhanced Light Mode Gradient: Very subtle multi-color mesh for vibrancy */
            --site-bg-gradient: linear-gradient(120deg, #fdfbf7 0%, #f0fdfa 50%, #eff6ff 100%);
        }

        .dark {
            --color-primary: #818CF8; --color-secondary: #A5B4FC; --color-accent: #C7D2FE;
            --color-header-bg: #111827; --color-footer-bg-from: #312e81; --color-footer-bg-to: #4338ca;
            --color-link: #A5B4FC; --color-card-bg: #1F2937;
            --color-base-bg: #111827; --color-content-bg: #1F2937;
            --color-text-default: #F3F4F6; --color-text-secondary: #D1D5DB;
            --border-radius-base: 0.75rem;
            
            /* Enhanced Dark Mode Gradient: Deep Slate to Midnight Blue */
            --site-bg-gradient: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
        }

        .high-contrast {
            --color-primary: #FFFF00; --color-secondary: #00FFFF; --color-accent: #00FFFF;
            --color-header-bg: #000000; --color-footer-bg-from: #000000; --color-footer-bg-to: #000000;
            --color-link: #FFFF00; --color-card-bg: #000000;
            --color-base-bg: #000000; --color-content-bg: #000000;
            --color-text-default: #FFFF00; --color-text-secondary: #FFFFFF;
            --border-radius-base: 0;
            --site-bg-gradient: none; /* No gradient for high contrast */
        }

        /* High Contrast Specific Overrides */
        .high-contrast a { color: var(--color-link) !important; text-decoration: underline; }
        .high-contrast .bg-primary { background-color: #000000 !important; border: 2px solid #FFFF00 !important; color: #FFFF00 !important; }
        .high-contrast .bg-content-bg { border: 2px solid #FFFFFF; }
        
        /* Accessibility Tools */
        .reduced-motion * { transition-duration: 0.01s !important; animation-duration: 0.01s !important; scroll-behavior: auto !important; }
        .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); border-width: 0; }
        :focus-visible { outline: 3px solid var(--color-accent); outline-offset: 2px; }

        /* Reading Guides */
        #reading-mask { position: fixed; inset: 0; background: rgba(0,0,0,0.8); pointer-events: none; z-index: 50; }
        #reading-guide { position: absolute; width: 100%; height: 2.5rem; background: rgba(255,255,255,0.1); border-top: 2px solid var(--color-base-bg); border-bottom: 2px solid var(--color-base-bg); cursor: ns-resize; pointer-events: auto; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: var(--color-base-bg); }
        ::-webkit-scrollbar-thumb { background: var(--color-primary); border-radius: 5px; }
        
        /* Toggle Switch */
        .toggle { appearance: none; width: 3rem; height: 1.5rem; border-radius: 9999px; background-color: #CBD5E0; position: relative; cursor: pointer; transition: 0.3s; }
        .toggle:checked { background-color: var(--color-primary); }
        .toggle::before { content: ""; position: absolute; top: 0.25rem; left: 0.25rem; width: 1rem; height: 1rem; border-radius: 50%; background: white; transition: 0.3s; }
        .toggle:checked::before { transform: translateX(1.5rem); }
    </style>
</head>

<body class="antialiased font-sans">
    <!-- Skip to Content Link -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[60] focus:px-4 focus:py-2 focus:bg-white focus:text-primary focus:font-bold focus:rounded-lg focus:shadow-xl">
        Skip to main content
    </a>

    <script>
        // Apply theme immediately on body load
        (function() {
            document.body.classList.add(currentSettings.theme);
            if (currentSettings.reducedMotion) document.body.classList.add('reduced-motion');
        })();
    </script>

    <!-- ACCESSIBILITY SETTINGS BUTTON -->
    <button id="a11y-toggle-button" class="fixed bottom-6 right-6 z-50 p-4 bg-primary text-white rounded-full shadow-2xl hover:bg-secondary focus:outline-none focus:ring-4 focus:ring-accent transition-all duration-300 transform hover:scale-110" aria-label="Open Accessibility Settings">
        <i class="fas fa-universal-access text-2xl"></i>
    </button>

    <!-- ACCESSIBILITY SETTINGS PANEL -->
    <div id="a11y-settings-panel" class="fixed top-0 right-0 h-full w-80 bg-content-bg shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l-4 border-primary" role="dialog" aria-modal="true" aria-label="Accessibility Settings" aria-hidden="true">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-primary">Accessibility</h2>
            <button id="a11y-close-button" class="text-text-secondary hover:text-text-default p-2 rounded-full" aria-label="Close settings">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <div class="space-y-6">
            <!-- Theme -->
            <div>
                <h3 class="text-sm font-medium mb-2 text-text-default">Contrast & Theme</h3>
                <div class="flex space-x-2">
                    <button id="theme-light" class="flex-1 py-2 rounded-lg border hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-700 dark:text-gray-200" aria-label="Light Mode"><i class="fas fa-sun"></i> Light</button>
                    <button id="theme-dark" class="flex-1 py-2 rounded-lg border hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-500" aria-label="Dark Mode"><i class="fas fa-moon"></i> Dark</button>
                    <button id="theme-contrast" class="flex-1 py-2 rounded-lg border hover:bg-gray-100 font-bold dark:border-gray-600 dark:text-gray-200" aria-label="High Contrast"><i class="fas fa-low-vision"></i> High</button>
                </div>
            </div>

            <!-- Fonts -->
            <div>
                <h3 class="text-sm font-medium mb-2 text-text-default">Font Style</h3>
                <div id="font-selection-buttons" class="grid grid-cols-1 gap-2">
                    <button type="button" data-font="Inter" class="font-selector py-2 px-3 rounded border text-left text-sm">Standard (Inter)</button>
                    <button type="button" data-font="Open Dyslexic" class="font-selector py-2 px-3 rounded border text-left text-sm" style="font-family: 'Open Dyslexic';">Dyslexic Friendly</button>
                    <button type="button" data-font="Lexend" class="font-selector py-2 px-3 rounded border text-left text-sm" style="font-family: 'Lexend';">Lexend (High Legibility)</button>
                </div>
            </div>

            <!-- Sizing -->
            <div>
                <label for="font-size-slider" class="block text-sm font-medium mb-2 text-text-default">Text Size (<span id="font-size-value">100</span>%)</label>
                <input type="range" id="font-size-slider" min="0.8" max="1.5" step="0.1" value="1.0" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
            </div>

            <div>
                <label for="line-height-slider" class="block text-sm font-medium mb-2 text-text-default">Line Spacing (<span id="line-height-value">1.6</span>)</label>
                <input type="range" id="line-height-slider" min="1.3" max="2.2" step="0.1" value="1.6" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
            </div>

            <!-- Tools -->
            <div class="space-y-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <label for="toggle-reading-mask" class="text-sm font-medium text-text-default">Reading Guide</label>
                    <input type="checkbox" id="toggle-reading-mask" class="toggle">
                </div>
                <div class="flex items-center justify-between">
                    <label for="toggle-reduced-motion" class="text-sm font-medium text-text-default">Reduce Motion</label>
                    <input type="checkbox" id="toggle-reduced-motion" class="toggle">
                </div>
            </div>

            <button id="reset-a11y-settings" class="w-full bg-red-100 text-red-700 hover:bg-red-200 py-2 rounded-lg mt-4 text-sm font-bold transition-colors">
                Reset Settings
            </button>
        </div>
    </div>

    <!-- READING MASK OVERLAY -->
    <div id="reading-mask" class="hidden">
        <div id="reading-guide" style="top: 30%"></div>
    </div>

    <!-- ANNOUNCEMENT BAR -->
    <div id="announcement-bar" class="bg-primary text-white text-center py-2 px-8 relative transition-colors duration-300 shadow-md z-40" role="alert">
        <p class="text-sm font-medium">
            <i class="fas fa-hammer mr-2"></i> Work in Progress: We are updating sections daily. Feedback? Email <a href="mailto:admin@hestena62.com" class="underline hover:text-blue-200">admin@hestena62.com</a>
        </p>
        <button id="close-announcement" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-white/80 hover:text-white p-2 rounded-full focus:outline-none focus:ring-2 focus:ring-white" aria-label="Close announcement">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- MAIN NAVIGATION -->
    <header class="bg-header-bg shadow-lg sticky top-0 z-40 transition-colors duration-300">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex items-center justify-between flex-wrap" aria-label="Main navigation">
                <!-- Logo -->
                <a class="flex items-center flex-shrink-0 text-white mr-6 focus:outline-none focus:ring-2 focus:ring-white rounded-lg p-1" href="/">
                    <img src="Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="" class="rounded-full h-10 w-10 mr-3 border-2 border-white/20" onerror="this.src='https://placehold.co/40x40?text=HL';"/>
                    <span class="font-bold text-xl tracking-tight"><?php echo isset($pageTitle) && $pageTitle !== '' ? $pageTitle : 'Hesten\'s Learning'; ?></span>
                </a>

                <!-- Mobile Menu Button -->
                <div class="block lg:hidden">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white focus:outline-none focus:ring-2 focus:ring-white" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation menu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <!-- Nav Links -->
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden transition-all duration-300 ease-in-out" id="nav-content">
                    <div class="text-sm lg:flex-grow">
                        <?php 
                        $current_page = basename($_SERVER['PHP_SELF']);
                        function navClass($page, $current) {
                            $base = "block mt-4 lg:inline-block lg:mt-0 mr-4 p-2 rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-white ";
                            return $base . ($page == $current ? "bg-white/10 text-white font-bold" : "text-gray-200 hover:text-white hover:bg-white/5");
                        }
                        ?>
                        <a href="/" class="<?php echo navClass('index.php', $current_page); ?>">
                            <i class="fas fa-home mr-1"></i> Home
                        </a>
                        <a href="/learning.php" class="<?php echo navClass('learning.php', $current_page); ?>">
                            <i class="fas fa-book mr-1"></i> Learning
                        </a>
                        <a href="/assessment.php" class="<?php echo navClass('assessment.php', $current_page); ?>">
                            <i class="fas fa-tasks mr-1"></i> Assessment
                        </a>
                    </div>
                    
                    <!-- Global Search -->
                    <div class="relative mt-4 lg:mt-0">
                        <form id="search-form" action="/search.php" method="GET" role="search">
                            <label for="global-search-input" class="sr-only">Search entire site</label>
                            <div class="relative group">
                                <input type="text" id="global-search-input" name="q" placeholder="Search site..." 
                                    class="bg-gray-700/50 text-white rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-primary focus:bg-gray-700 w-48 focus:w-64 transition-all duration-300 placeholder-gray-400 border border-transparent focus:border-primary/50" />
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-white transition-colors"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>