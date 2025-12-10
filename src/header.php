<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : 'Empowering students with learning disabilities.'; ?>" />
    <meta name="keywords" content="<?php echo isset($pageKeywords) ? htmlspecialchars($pageKeywords) : 'education, learning disabilities, accessibility'; ?>" />
    <meta name="author" content="Hesten's Learning" />
    <meta name="theme-color" content="#4F46E5" />

    <!-- PWA & Icons -->
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">
    <link rel="icon" href="/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" />

    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Hesten\'s Learning'; ?></title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Confetti Library -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Lexend:wght@300;400;600&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["var(--site-font-family, 'Inter')", "sans-serif"],
                        dyslexic: ['"Open Dyslexic"', 'sans-serif'],
                    },
                    colors: {
                        primary: 'var(--color-primary)',
                        secondary: 'var(--color-secondary)',
                        accent: 'var(--color-accent)',
                        'base-bg': 'var(--color-base-bg)',
                        'content-bg': 'var(--color-content-bg)',
                        'text-default': 'var(--color-text-default)',
                        'text-muted': 'var(--color-text-muted)',
                        'border-color': 'var(--color-border)',
                    }
                }
            }
        };

        // --- A11y Logic ---
        const defaultSettings = { theme: 'light', fontSize: 1.0, lineHeight: 1.6, fontFamily: 'Inter', reducedMotion: false };
        const STORAGE_KEY = 'hl_accessibility_settings';

        function loadSettings() {
            try {
                const stored = localStorage.getItem(STORAGE_KEY);
                return stored ? { ...defaultSettings, ...JSON.parse(stored) } : defaultSettings;
            } catch (e) { return defaultSettings; }
        }

        function saveSettings(settings) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
            applySettings(settings);
            currentSettings = settings;
        }

        function applySettings(settings) {
            const root = document.documentElement;
            root.style.setProperty('--site-font-size', `${settings.fontSize}rem`);
            root.style.setProperty('--site-line-height', settings.lineHeight);
            
            let fontName = settings.fontFamily || 'Inter';
            if (fontName === 'Open Dyslexic') fontName = '"Open Dyslexic"';
            root.style.setProperty('--site-font-family', fontName);

            document.body.classList.remove('light', 'dark', 'high-contrast');
            document.body.classList.add(settings.theme);
            
            if (settings.reducedMotion) document.body.classList.add('reduced-motion');
            else document.body.classList.remove('reduced-motion');
        }

        let currentSettings = loadSettings();
    </script>

    <style>
        /* Core Theme Variables */
        @font-face { font-family: 'Open Dyslexic'; src: url('/font/OpenDyslexic/OpenDyslexic-Regular.otf'); font-display: swap; }
        @font-face { font-family: 'Inter'; src: url('/font/Inter/static/Inter_18pt-Regular.ttf'); font-display: swap; }

        body {
            background-color: var(--color-base-bg);
            color: var(--color-text-default);
            font-size: var(--site-font-size, 1rem);
            line-height: var(--site-line-height, 1.6);
            font-family: var(--site-font-family, "Inter", sans-serif);
            transition: background-color 0.2s, color 0.2s;
        }

        /* Simplified Theme Colors */
        .light {
            --color-primary: #2563EB; /* Blue 600 */
            --color-secondary: #4F46E5; /* Indigo 600 */
            --color-accent: #3B82F6;
            --color-base-bg: #F9FAFB; /* Gray 50 */
            --color-content-bg: #FFFFFF;
            --color-text-default: #111827; /* Gray 900 */
            --color-text-muted: #4B5563; /* Gray 600 */
            --color-border: #E5E7EB; /* Gray 200 */
        }

        .dark {
            --color-primary: #60A5FA; /* Blue 400 */
            --color-secondary: #818CF8; /* Indigo 400 */
            --color-accent: #93C5FD;
            --color-base-bg: #111827; /* Gray 900 */
            --color-content-bg: #1F2937; /* Gray 800 */
            --color-text-default: #F9FAFB; /* Gray 50 */
            --color-text-muted: #9CA3AF; /* Gray 400 */
            --color-border: #374151; /* Gray 700 */
        }

        .high-contrast {
            --color-primary: #0000EE;
            --color-secondary: #0000EE;
            --color-accent: #000000;
            --color-base-bg: #FFFFFF;
            --color-content-bg: #FFFFFF;
            --color-text-default: #000000;
            --color-text-muted: #000000;
            --color-border: #000000;
        }

        /* 3D Flip Card Utilities */
        .perspective-1000 { perspective: 1000px; }
        .transform-style-3d { transform-style: preserve-3d; }
        .backface-hidden { backface-visibility: hidden; }
        .rotate-y-180 { transform: rotateY(180deg); }

        /* Reading Guide */
        #reading-mask { position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 40; pointer-events: none; }
        #reading-guide { position: absolute; width: 100%; height: 3rem; background: rgba(255,255,255,0.15); border-top: 2px solid yellow; border-bottom: 2px solid yellow; pointer-events: auto; cursor: ns-resize; }
        
        .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); border: 0; }
        .reduced-motion * { transition: none !important; animation: none !important; }
    </style>
</head>
<body class="antialiased flex flex-col min-h-screen">
    
    <script>applySettings(currentSettings);</script>

    <!-- Skip Link -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-white focus:text-black focus:font-bold focus:ring-2">Skip to content</a>

    <!-- Accessibility Toggle & Panel -->
    <button id="a11y-toggle-button" class="fixed bottom-6 right-6 z-50 p-4 bg-primary text-white rounded-full shadow-lg hover:bg-secondary focus:outline-none focus:ring-4 focus:ring-accent transition-transform hover:scale-105" aria-label="Accessibility Settings">
        <i class="fas fa-universal-access text-2xl"></i>
    </button>

    <div id="a11y-settings-panel" class="fixed top-0 right-0 h-full w-80 bg-content-bg shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l border-border-color" aria-hidden="true">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-text-default">Accessibility</h2>
            <button id="a11y-close-button" class="text-text-muted hover:text-text-default p-2" aria-label="Close settings"><i class="fas fa-times text-lg"></i></button>
        </div>

        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-semibold mb-2 text-text-default">Theme</h3>
                <div class="flex gap-2">
                    <button id="theme-light" class="flex-1 py-2 px-3 border border-border-color rounded hover:bg-base-bg text-text-default text-sm">Light</button>
                    <button id="theme-dark" class="flex-1 py-2 px-3 border border-border-color rounded hover:bg-base-bg text-text-default text-sm">Dark</button>
                    <button id="theme-contrast" class="flex-1 py-2 px-3 border border-border-color rounded hover:bg-base-bg text-text-default text-sm font-bold">Contrast</button>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold mb-2 text-text-default">Font</h3>
                <div id="font-selection-buttons" class="flex flex-col gap-2">
                    <button data-font="Inter" class="font-selector py-2 px-3 border border-border-color rounded text-left text-sm text-text-default">Standard (Inter)</button>
                    <button data-font="Open Dyslexic" class="font-selector py-2 px-3 border border-border-color rounded text-left text-sm text-text-default" style="font-family: 'Open Dyslexic'">Dyslexic Friendly</button>
                    <button data-font="Lexend" class="font-selector py-2 px-3 border border-border-color rounded text-left text-sm text-text-default" style="font-family: 'Lexend'">Lexend</button>
                </div>
            </div>

            <div>
                <label for="font-size-slider" class="block text-sm font-semibold mb-2 text-text-default">Text Size (<span id="font-size-value">100</span>%)</label>
                <input type="range" id="font-size-slider" min="0.8" max="1.5" step="0.1" value="1.0" class="w-full">
            </div>

            <div>
                <label for="line-height-slider" class="block text-sm font-semibold mb-2 text-text-default">Line Spacing (<span id="line-height-value">1.6</span>)</label>
                <input type="range" id="line-height-slider" min="1.3" max="2.2" step="0.1" value="1.6" class="w-full">
            </div>

            <div class="border-t border-border-color pt-4 space-y-3">
                <div class="flex items-center justify-between">
                    <label for="toggle-reading-mask" class="text-sm font-semibold text-text-default">Reading Guide</label>
                    <input type="checkbox" id="toggle-reading-mask" class="accent-primary">
                </div>
                <div class="flex items-center justify-between">
                    <label for="toggle-reduced-motion" class="text-sm font-semibold text-text-default">Reduce Motion</label>
                    <input type="checkbox" id="toggle-reduced-motion" class="accent-primary">
                </div>
            </div>

            <button id="reset-a11y-settings" class="w-full bg-gray-200 text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-white py-2 rounded mt-4 text-sm font-bold">Reset Defaults</button>
        </div>
    </div>

    <!-- Reading Mask Overlay -->
    <div id="reading-mask" class="hidden"><div id="reading-guide" style="top: 30%"></div></div>

    <!-- Announcement Bar -->
    <div id="announcement-bar" class="bg-primary text-white text-center py-2 px-4 text-sm relative">
        <span><i class="fas fa-info-circle mr-2"></i> We are updating sections daily.</span>
        <button id="close-announcement" class="absolute right-4 top-1/2 -translate-y-1/2 text-white/80 hover:text-white"><i class="fas fa-times"></i></button>
    </div>

    <!-- Main Header -->
    <header class="bg-white dark:bg-gray-900 border-b border-border-color sticky top-0 z-30 shadow-sm">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex items-center justify-between flex-wrap">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 text-text-default">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg transform rotate-3">H</div>
                    <span class="font-bold text-lg tracking-tight">Hesten's Learning</span>
                </a>

                <!-- Mobile Toggle -->
                <button id="nav-toggle" class="lg:hidden px-3 py-2 border rounded text-text-muted border-border-color hover:text-text-default hover:border-text-default">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Menu -->
                <div id="nav-content" class="w-full lg:w-auto lg:flex hidden items-center gap-6 mt-4 lg:mt-0">
                    <div class="flex flex-col lg:flex-row gap-4 lg:gap-6 text-sm font-medium">
                        <a href="/" class="text-text-default hover:text-primary transition-colors font-bold">Home</a>
                        <a href="/learning.php" class="text-text-muted hover:text-primary transition-colors">Learning</a>
                        <a href="/assessment.php" class="text-text-muted hover:text-primary transition-colors">Assessment</a>
                        <a href="/assistant.php" class="text-text-muted hover:text-primary transition-colors">Assistant</a>
                    </div>
                    
                    <!-- Search -->
                    <form action="/search.php" method="GET" class="relative">
                        <input type="text" name="q" placeholder="Search..." class="bg-base-bg border border-border-color text-text-default text-sm rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-primary w-full lg:w-48 transition-all focus:w-64">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-text-muted text-xs"></i>
                    </form>
                </div>
            </nav>
        </div>
    </header>