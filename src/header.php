<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Empowering students with learning disabilities through personalized, accessible learning experiences in Math, ELA, and Science." />
    <meta name="keywords"
        content="learning disabilities, personalized education, online learning, math, ELA, science, accessible education" />
    <meta name="author" content="Hesten's Learning" />

    <!-- PWA & Mobile Meta Tags -->
    <meta name="theme-color" content="#4F46E5" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Hesten's">

    <!-- Open Graph / Social Media -->
    <meta property="og:title" content="Hesten's Learning" />
    <meta property="og:description" content="Personalized, accessible learning for everyone." />
    <meta property="og:type" content="website" />

    <title>Hesten's Learning</title>

    <!-- 1. Resource Hints for Speed -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

    <!-- 2. Optimized Font Loading -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600&family=Inter:wght@400;600;700&family=Cookie&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" media="print" onload="this.media='all'" />
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" /></noscript>

    <!-- 3. Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["var(--site-font-family, 'Inter')", "sans-serif"],
                        dyslexic: ['"Open Dyslexic"', 'sans-serif'],
                        mono: ['"Roboto Mono"', 'monospace'],
                        handwriting: ['"Cookie"', 'cursive'],
                    },
                    colors: {
                        'primary': 'var(--color-primary, #1D4ED8)',
                        'secondary': 'var(--color-secondary, #3B82F6)',
                        'accent': 'var(--color-accent, #60A5FA)',
                        'base-bg': 'var(--color-base-bg, #F9FAFB)',
                        'content-bg': 'var(--color-content-bg, #FFFFFF)',
                        'text-default': 'var(--color-text-default, #1F2937)',
                        'text-secondary': 'var(--color-text-secondary, #6B7280)',
                        'header-bg': 'var(--color-header-bg)',
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.5s ease-out forwards',
                        'bounce-short': 'bounceShort 1s ease-in-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        bounceShort: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                },
            },
        };
    </script>

    <style>
        /* Base Styles & Variables */
        @font-face {
            font-family: 'Open Dyslexic';
            src: url('https://cdn.jsdelivr.net/npm/opendyslexic@2.1.0-beta1/charis-sil-modified/OpenDyslexic-Regular.woff') format('woff');
            font-display: swap;
        }

        /* CRITICAL FIX: Prevent Horizontal Scroll caused by off-canvas elements */
        html {
            overflow-x: hidden;
            max-width: 100vw;
        }

        body {
            background-color: var(--color-base-bg);
            background-image: var(--site-bg-gradient);
            background-attachment: scroll; 
            background-size: cover;
            color: var(--color-text-default);
            font-size: var(--site-font-size, 1rem);
            line-height: var(--site-line-height, 1.6);
            transition: background-color 0.3s, color 0.3s;
            min-height: 100vh;
            font-family: var(--site-font-family, "Inter", sans-serif);
            display: flex;
            flex-direction: column;
            overflow-x: hidden; /* Redundant safety */
            opacity: 0; 
            animation: pageReveal 0.5s ease-out forwards;
        }

        @keyframes pageReveal { to { opacity: 1; } }

        /* Themes */
        .light {
            --color-primary: #4F46E5;
            --color-secondary: #6366F1;
            --color-accent: #818CF8;
            --color-header-bg: #1F2937;
            --color-link: #4F46E5;
            --color-base-bg: #F3F4F6;
            --color-content-bg: #FFFFFF;
            --color-text-default: #1F2937;
            --color-text-secondary: #4B5563;
            --site-bg-gradient: linear-gradient(120deg, #fdfbf7 0%, #f0fdfa 50%, #eff6ff 100%);
        }

        .dark {
            --color-primary: #818CF8;
            --color-secondary: #A5B4FC;
            --color-accent: #C7D2FE;
            --color-header-bg: #111827;
            --color-base-bg: #111827;
            --color-content-bg: #1F2937;
            --color-text-default: #F3F4F6;
            --color-text-secondary: #D1D5DB;
            --site-bg-gradient: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
        }

        .high-contrast {
            --color-primary: #FFFF00;
            --color-secondary: #00FFFF;
            --color-accent: #00FFFF;
            --color-header-bg: #000000;
            --color-base-bg: #000000;
            --color-content-bg: #000000;
            --color-text-default: #FFFF00;
            --color-text-secondary: #FFFFFF;
            --site-bg-gradient: none;
        }

        /* Focus Mode Overrides */
        body.focus-mode header, 
        body.focus-mode #announcement-bar, 
        body.focus-mode footer,
        body.focus-mode #resume-banner {
            display: none !important;
        }
        body.focus-mode #main-content {
            margin-top: 2rem;
        }

        /* High Contrast Specifics */
        .high-contrast a { color: var(--color-link) !important; text-decoration: underline; }
        .high-contrast .bg-primary { background-color: #000000 !important; border: 2px solid #FFFF00 !important; color: #FFFF00 !important; }
        .high-contrast .level-card { border: 2px solid white; }

        /* Utilities */
        .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); border-width: 0; }
        :focus-visible { outline: 3px solid var(--color-accent); outline-offset: 2px; }
        
        /* Reading Guide */
        #reading-mask { position: fixed; inset: 0; background: rgba(0, 0, 0, 0.8); pointer-events: none; z-index: 50; }
        #reading-guide { position: absolute; width: 100%; height: 2.5rem; background: rgba(255, 255, 255, 0.1); border-top: 2px solid var(--color-base-bg); border-bottom: 2px solid var(--color-base-bg); cursor: ns-resize; pointer-events: auto; }

        /* Loader */
        #initial-loader { position: fixed; inset: 0; background: white; z-index: 9999; display: flex; justify-content: center; items-center: center; transition: opacity 0.5s; }
        .dark #initial-loader { background: #111827; }
        .loader-spinner { width: 48px; height: 48px; border: 5px solid #4F46E5; border-bottom-color: transparent; border-radius: 50%; display: inline-block; box-sizing: border-box; animation: rotation 1s linear infinite; }
        @keyframes rotation { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: var(--color-base-bg); }
        ::-webkit-scrollbar-thumb { background: var(--color-primary); border-radius: 5px; }
    </style>
</head>

<body class="light antialiased font-sans overflow-x-hidden selection:bg-primary selection:text-white">

    <!-- Fixed Tools Container -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 items-end">
        <!-- Scroll Top -->
        <button id="scroll-to-top" class="w-12 h-12 bg-white/90 dark:bg-gray-800/90 backdrop-blur border border-gray-200 dark:border-gray-700 text-primary rounded-full shadow-lg hover:scale-110 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300 transform translate-y-24 opacity-0 flex items-center justify-center" aria-label="Scroll to top" type="button">
            <i class="fas fa-arrow-up"></i>
        </button>
        
        <!-- Scratchpad Toggle -->
        <button id="scratchpad-toggle" class="w-14 h-14 bg-indigo-600 text-white rounded-full shadow-2xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition-all duration-300 transform hover:scale-105 flex items-center justify-center" aria-label="Open Quick Notes" aria-expanded="false" aria-controls="scratchpad-panel" type="button">
            <i class="fas fa-sticky-note text-xl"></i>
        </button>

        <!-- A11y Toggle -->
        <button id="a11y-toggle-button" class="w-14 h-14 bg-primary text-white rounded-full shadow-2xl hover:bg-secondary focus:outline-none focus:ring-4 focus:ring-accent transition-all duration-300 transform hover:scale-105 flex items-center justify-center" aria-label="Open Accessibility Settings" aria-expanded="false" aria-controls="a11y-settings-panel" type="button">
            <i class="fas fa-universal-access text-2xl"></i>
        </button>
    </div>

    <!-- Scratchpad Panel -->
    <div id="scratchpad-panel" class="fixed bottom-24 right-6 w-80 bg-yellow-50 dark:bg-gray-800 rounded-xl shadow-2xl transform scale-90 opacity-0 pointer-events-none transition-all duration-300 z-50 border-t-8 border-yellow-400 dark:border-indigo-500 origin-bottom-right" role="dialog" aria-labelledby="scratchpad-title">
        <div class="p-4">
            <div class="flex justify-between items-center mb-2">
                <h3 id="scratchpad-title" class="font-bold text-gray-800 dark:text-white flex items-center gap-2">
                    <i class="fas fa-pen-fancy text-yellow-600 dark:text-yellow-400"></i> Quick Notes
                </h3>
                <button id="scratchpad-close" class="text-gray-400 hover:text-gray-600 dark:hover:text-white p-2" aria-label="Close Notes" type="button"><i class="fas fa-times"></i></button>
            </div>
            <textarea id="quick-notes-area" class="w-full h-48 p-3 bg-white dark:bg-gray-700 rounded-lg border-0 shadow-inner resize-none focus:ring-2 focus:ring-yellow-400 text-sm leading-relaxed text-gray-700 dark:text-gray-200" placeholder="Type your thoughts here... they save automatically!"></textarea>
            <div class="mt-2 flex justify-between items-center text-xs text-gray-500 dark:text-gray-400">
                <span id="scratchpad-status" aria-live="polite">Saved</span>
                <button onclick="document.getElementById('quick-notes-area').value = ''; localStorage.setItem('hl_scratchpad', '');" class="hover:text-red-500" type="button">Clear</button>
            </div>
        </div>
    </div>

    <!-- Accessibility Panel -->
    <div id="a11y-settings-panel" class="fixed top-0 right-0 h-full w-80 bg-white/95 dark:bg-gray-900/95 backdrop-blur-xl shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l border-white/20 ring-1 ring-black/5" role="dialog" aria-modal="true" aria-labelledby="a11y-title">
        <div class="flex justify-between items-center mb-6">
            <h2 id="a11y-title" class="text-xl font-bold text-primary">Accessibility</h2>
            <button id="a11y-close-button" class="text-text-secondary hover:text-text-default p-2 rounded-full" aria-label="Close settings" type="button"><i class="fas fa-times text-lg"></i></button>
        </div>
        <div class="space-y-6">
            <!-- Focus Mode -->
            <div class="bg-indigo-50 dark:bg-indigo-900/30 p-4 rounded-lg border border-indigo-100 dark:border-indigo-800">
                <div class="flex items-center justify-between">
                    <label for="toggle-focus-mode" class="text-sm font-bold text-indigo-900 dark:text-indigo-200 flex items-center gap-2">
                        <i class="fas fa-eye-slash"></i> Focus Mode
                    </label>
                    <input type="checkbox" id="toggle-focus-mode" class="w-10 h-5 rounded-full appearance-none bg-gray-300 checked:bg-indigo-600 transition-all relative cursor-pointer before:content-[''] before:absolute before:top-[2px] before:left-[2px] before:w-4 before:h-4 before:bg-white before:rounded-full before:shadow-sm before:transition-transform checked:before:translate-x-5">
                </div>
                <p class="text-xs text-indigo-700 dark:text-indigo-300 mt-1">Hides menu, footer, and banners.</p>
            </div>

            <fieldset>
                <legend class="text-sm font-medium mb-2 text-text-default">Contrast & Theme</legend>
                <div class="flex space-x-2">
                    <button id="theme-light" class="flex-1 py-2 rounded-lg border hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-700 dark:text-gray-200" type="button"><i class="fas fa-sun"></i> Light</button>
                    <button id="theme-dark" class="flex-1 py-2 rounded-lg border hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-500" type="button"><i class="fas fa-moon"></i> Dark</button>
                    <button id="theme-contrast" class="flex-1 py-2 rounded-lg border hover:bg-gray-100 font-bold dark:border-gray-600 dark:text-gray-200" type="button"><i class="fas fa-low-vision"></i> High</button>
                </div>
            </fieldset>

            <fieldset>
                <legend class="text-sm font-medium mb-2 text-text-default">Font Style</legend>
                <div id="font-selection-buttons" class="grid grid-cols-1 gap-2">
                    <button type="button" data-font="Inter" class="font-selector py-2 px-3 rounded border text-left text-sm bg-primary text-white">Standard (Inter)</button>
                    <button type="button" data-font="Open Dyslexic" class="font-selector py-2 px-3 rounded border text-left text-sm" style="font-family: 'Open Dyslexic';">Dyslexic Friendly</button>
                    <button type="button" data-font="Lexend" class="font-selector py-2 px-3 rounded border text-left text-sm" style="font-family: 'Lexend';">Lexend (High Legibility)</button>
                </div>
            </fieldset>

            <div>
                <label for="font-size-slider" class="block text-sm font-medium mb-2 text-text-default">Text Size (<span id="font-size-value">100</span>%)</label>
                <input type="range" id="font-size-slider" min="0.8" max="1.5" step="0.1" value="1.0" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
            </div>

            <div class="space-y-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <label for="toggle-reading-mask" class="text-sm font-medium text-text-default">Reading Guide</label>
                    <input type="checkbox" id="toggle-reading-mask" class="w-10 h-5 rounded-full appearance-none bg-gray-300 checked:bg-primary transition-all relative cursor-pointer before:content-[''] before:absolute before:top-[2px] before:left-[2px] before:w-4 before:h-4 before:bg-white before:rounded-full before:shadow-sm before:transition-transform checked:before:translate-x-5">
                </div>
            </div>
            <button id="reset-a11y-settings" class="w-full bg-red-100 text-red-700 hover:bg-red-200 py-2 rounded-lg mt-4 text-sm font-bold transition-colors" type="button">Reset Settings</button>
        </div>
    </div>

    <!-- Reading Mask -->
    <div id="reading-mask" class="hidden">
        <div id="reading-guide" style="top: 30%"></div>
    </div>

    <!-- Announcement Bar -->
    <div id="announcement-bar" class="bg-primary text-white text-center py-2 px-8 relative transition-colors duration-300 shadow-md z-40" role="status">
        <p class="text-sm font-medium"><i class="fas fa-hammer mr-2"></i> Work in Progress: We are updating sections daily. Check <a class="underline" href="https://github.com/Hestena62/Hesten-s-Learning">GitHub</a> for updates.</p>
        <button id="close-announcement" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-white/80 hover:text-white p-2 rounded-full" aria-label="Close announcement" type="button"><i class="fas fa-times"></i></button>
    </div>

    <!-- HEADER -->
    <header class="bg-header-bg shadow-lg sticky top-0 z-40 transition-colors duration-300 backdrop-blur-sm bg-opacity-95">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex items-center justify-between flex-wrap" aria-label="Main Navigation">
                <!-- Logo -->
                <a class="flex items-center flex-shrink-0 text-white mr-6 rounded-lg p-1" href="#">
                    <div class="h-10 w-10 mr-3 border-2 border-white/20 rounded-full flex items-center justify-center bg-indigo-500 font-bold text-xl">H</div>
                    <span class="font-bold text-xl tracking-tight">Hesten's Learning</span>
                </a>

                <!-- Mobile Menu Button -->
                <div class="block lg:hidden">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white" aria-label="Toggle Menu" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <!-- Nav Links -->
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden transition-all duration-300" id="nav-content">
                    <div class="text-sm lg:flex-grow">
                        <a href="#" class="block mt-4 lg:inline-block lg:mt-0 mr-4 p-2 rounded-md bg-white/10 text-white font-bold"><i class="fas fa-home mr-1"></i> Home</a>
                        <a href="#level-grid" class="block mt-4 lg:inline-block lg:mt-0 mr-4 p-2 rounded-md text-gray-200 hover:text-white hover:bg-white/5"><i class="fas fa-book mr-1"></i> Learning</a>
                        <a href="#" class="block mt-4 lg:inline-block lg:mt-0 mr-4 p-2 rounded-md text-gray-200 hover:text-white hover:bg-white/5"><i class="fas fa-tasks mr-1"></i> Assessment</a>
                    </div>
                    <!-- Search -->
                    <div class="relative mt-4 lg:mt-0">
                        <form id="search-form" onsubmit="event.preventDefault();" role="search">
                            <label for="global-search-input" class="sr-only">Search</label>
                            <div class="relative group">
                                <input type="text" id="global-search-input" placeholder="Search site..." class="bg-gray-700/50 text-white rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-primary w-48 focus:w-64 transition-all placeholder-gray-400 border border-transparent" />
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-white"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>