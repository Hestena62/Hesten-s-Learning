<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">

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
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Hesten's">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">
    <link rel="icon" type="image/png" href="/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">

    <script>
        // Register Service Worker
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(reg => console.log('Service Worker registered', reg))
                    .catch(err => console.error('Service Worker registration failed', err));
            });
        }
    </script>

    <!-- Open Graph -->
    <meta property="og:title" content="Hesten's Learning" />
    <meta property="og:description" content="Personalized, accessible learning for everyone." />
    <meta property="og:type" content="website" />

    <title><?php echo isset($pageTitle) ? $pageTitle : "Hesten's Learning"; ?></title>

    <!-- Resource Hints -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

    <!-- Font Loading -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600&family=Inter:wght@400;600;700&family=Cookie&family=Comic+Neue:wght@400;700&family=Merriweather:wght@400;700&family=Roboto+Mono:wght@400;700&family=Outfit:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/JS/gamification.js" defer></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["var(--site-font-family)", "Inter", "ui-sans-serif", "system-ui", "-apple-system", "sans-serif"],
                        dyslexic: ['"Open Dyslexic"', 'sans-serif'],
                        mono: ['"Roboto Mono"', 'monospace'],
                        handwriting: ['"Cookie"', 'cursive'],
                        outfit: ['"Outfit"', 'sans-serif'],
                    },
                    colors: {
                        'primary': 'var(--color-primary)',
                        'secondary': 'var(--color-secondary)',
                        'accent': 'var(--color-accent)',
                        'base-bg': 'var(--color-base-bg)',
                        'content-bg': 'var(--color-content-bg)',
                        'text-default': 'var(--color-text-default)',
                        'text-secondary': 'var(--color-text-secondary)',
                        'header-bg': 'var(--color-header-bg)',
                        // Compatibility Aliases
                        'card-bg': 'var(--color-content-bg)',
                        'text-primary': 'var(--color-text-default)',
                        'text-text-primary': 'var(--color-text-default)',
                    },
                    borderRadius: {
                        'base-rounded': '1.5rem',
                        'DEFAULT': '0.75rem',
                        'lg': '1rem',
                        'xl': '1.5rem',
                        '2xl': '2rem',
                        '3xl': '2.5rem',
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.5s ease-out forwards',
                        'bounce-short': 'bounceShort 1s ease-in-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        bounceShort: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
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
            src: url('/font/OpenDyslexic/OpenDyslexic-Regular.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Open Dyslexic';
            src: url('/font/OpenDyslexic/OpenDyslexic-Bold.otf') format('opentype');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Open Dyslexic';
            src: url('/font/OpenDyslexic/OpenDyslexic-Italic.otf') format('opentype');
            font-weight: normal;
            font-style: italic;
            font-display: swap;
        }

        html {
            overflow-x: hidden;
            max-width: 100vw;
        }

        body {
            background-color: var(--color-base-bg);
            background-image: var(--site-bg-gradient);
            background-attachment: fixed;
            background-size: cover;
            color: var(--color-text-default);
            font-size: var(--site-font-size, 1rem);
            line-height: var(--site-line-height, 1.6);
            letter-spacing: var(--site-letter-spacing, normal);
            word-spacing: var(--site-word-spacing, normal);
            transition: background-color 0.5s, color 0.3s;
            min-height: 100vh;
            font-family: var(--site-font-family, 'Outfit'), ui-sans-serif, system-ui, sans-serif;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            opacity: 0;
            animation: pageReveal 0.5s ease-out forwards;
        }

        /* Accessibilty Classes */
        .cursor-large,
        .cursor-large * {
            cursor: -webkit-image-set(url('https://cdn-icons-png.flaticon.com/512/5759/5759160.png') 2x) 24 24, auto !important;
        }

        .hide-images img,
        .hide-images video,
        .hide-images .hide-on-no-img {
            opacity: 0 !important;
            visibility: hidden !important;
        }

        /* Global Softness */
        * {
            border-color: rgba(0, 0, 0, 0.06);
        }

        button,
        .btn {
            border-radius: 9999px !important;
        }

        /* 1. Friendly & Playful (Light) */
        .light {
            --color-primary: #8b5cf6;
            --color-secondary: #ec4899;
            --color-accent: #06b6d4;
            --color-header-bg: rgba(255, 255, 255, 0.85);
            --color-link: #7c3aed;
            --color-base-bg: #fffbf0;
            --color-content-bg: #ffffff;
            --color-text-default: #334155;
            --color-text-secondary: #64748b;
            --site-bg-gradient: linear-gradient(135deg, #fffbf0 0%, #fff1f2 40%, #f0f9ff 100%);
        }

        /* 2. Soft Midnight (Dark) */
        .dark {
            --color-primary: #a78bfa;
            --color-secondary: #f472b6;
            --color-accent: #22d3ee;
            --color-header-bg: rgba(15, 23, 42, 0.85);
            --color-base-bg: #0f172a;
            --color-content-bg: #1e293b;
            --color-text-default: #f8fafc;
            --color-text-secondary: #94a3b8;
            --site-bg-gradient: linear-gradient(to bottom right, #0f172a, #1e1b4b);
        }

        .high-contrast {
            --color-primary: #ffff00;
            --color-secondary: #00ffff;
            --color-accent: #ff00ff;
            --color-header-bg: #000;
            --color-base-bg: #000;
            --color-content-bg: #000;
            --color-text-default: #ffff00;
            --color-text-secondary: #fff;
            --site-bg-gradient: none;
        }

        .high-contrast a {
            text-decoration: underline;
            color: #00ffff !important;
        }

        .sepia {
            --color-primary: #8f5902;
            --color-secondary: #a06703;
            --color-accent: #ce5c00;
            --color-header-bg: rgba(244, 236, 216, 0.95);
            --color-base-bg: #f4ecd8;
            --color-content-bg: #fdf6e3;
            --color-text-default: #433422;
            --color-text-secondary: #5c4118;
            --site-bg-gradient: linear-gradient(to bottom, #f4ecd8, #e8dbc3);
        }

        .midnight {
            --color-primary: #82aaff;
            --color-secondary: #c792ea;
            --color-accent: #89ddff;
            --color-header-bg: rgba(1, 22, 39, 0.9);
            --color-base-bg: #011627;
            --color-content-bg: #062137;
            --color-text-default: #d6deeb;
            --color-text-secondary: #9aa9bd;
            --site-bg-gradient: linear-gradient(to bottom, #011627, #01101e);
        }

        .teacher-only {
            display: none;
        }

        .teacher-mode .teacher-only {
            display: block;
            border: 2px dashed var(--color-accent);
            padding: 1rem;
            margin: 1rem 0;
            background: rgba(255, 230, 0, 0.1);
        }

        .focus-mode header,
        .focus-mode #announcement-bar,
        .focus-mode footer,
        .focus-mode .fixed-tools-container {
            display: none !important;
        }

        .focus-mode #main-content {
            margin-top: 2rem;
        }

        #reading-mask {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            pointer-events: none;
            z-index: 50;
        }

        #reading-guide {
            position: absolute;
            width: 100%;
            height: 3rem;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 9999px rgba(0, 0, 0, 0.7);
            border-top: 2px solid var(--color-accent);
            border-bottom: 2px solid var(--color-accent);
            cursor: row-resize;
            pointer-events: none;
            /* Crucial Fix: Allows clicking through the guide */
        }

        #initial-loader {
            position: fixed;
            inset: 0;
            background: var(--color-base-bg);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s;
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid var(--color-primary);
            border-bottom-color: transparent;
            border-radius: 50%;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes pageReveal {
            to {
                opacity: 1;
            }
        }

        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: var(--color-base-bg);
        }

        /* Announcement Bar */
        #announcement-bar-container {
            background: var(--color-primary);
            color: white;
            position: relative;
            z-index: 50;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .announcement-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 0.5rem 3rem;
            position: relative;
        }

        .announcement-slide {
            display: none;
            text-align: center;
            font-size: 0.875rem;
            animation: fadeIn 0.5s ease-out forwards;
        }

        .announcement-slide.active {
            display: block;
        }

        .announcement-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            z-index: 10;
        }

        .announcement-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            scale: 1.1;
        }

        .announcement-prev {
            left: 0.75rem;
        }

        .announcement-next {
            right: 3.5rem;
        }

        .announcement-close {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            opacity: 0.7;
            transition: opacity 0.2s;
            cursor: pointer;
            padding: 0.5rem;
        }

        .announcement-close:hover {
            opacity: 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .high-contrast #announcement-bar-container {
            background: #000;
            border-bottom: 2px solid #ffff00;
            color: #ffff00;
        }

        .high-contrast .announcement-btn {
            border: 1px solid #ffff00;
        }

        .focus-mode #announcement-bar-container {
            display: none !important;
        }

        /* Breadcrumbs */
        #breadcrumb-container {
            background: rgba(255, 255, 255, 0.5);
            backdrop-blur: 5px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dark #breadcrumb-container {
            background: rgba(30, 41, 59, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Search Palette */
        #search-palette {
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(8px);
        }

        /* Floating Assistant */
        #floating-assistant {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        #floating-assistant:hover {
            transform: scale(1.1) rotate(5deg);
        }
    </style>
</head>

<body class="light antialiased font-sans overflow-x-hidden selection:bg-primary selection:text-white">

    <!-- Fixed Tools Container (Increased Z-index to sit above Reading Mask) -->
    <div id="fixed-tools-container" class="fixed bottom-6 right-6 z-[60] flex flex-col gap-3 items-end print:hidden">
        <button id="scroll-to-top"
            class="w-12 h-12 bg-content-bg backdrop-blur border border-gray-200 dark:border-gray-700 text-primary rounded-full shadow-lg hover:scale-110 focus:outline-none transition-all duration-300 transform translate-y-24 opacity-0 flex items-center justify-center"
            type="button"><i class="fas fa-arrow-up"></i></button>
        <button onclick="window.print()"
            class="w-12 h-12 bg-gray-600 text-white rounded-full shadow-lg hover:scale-105 flex items-center justify-center transition-all"
            title="Print Page" type="button"><i class="fas fa-print"></i></button>
        <button id="citation-toggle"
            class="w-14 h-14 bg-pink-500 text-white rounded-full shadow-2xl hover:scale-105 flex items-center justify-center transition-all"
            type="button"><i class="fas fa-quote-right text-xl"></i></button>
        <button id="timer-toggle"
            class="w-14 h-14 bg-green-600 text-white rounded-full shadow-2xl hover:scale-105 flex items-center justify-center transition-all"
            type="button"><i class="fas fa-stopwatch text-xl"></i></button>
        <button id="scratchpad-toggle"
            class="w-14 h-14 bg-indigo-600 text-white rounded-full shadow-2xl hover:scale-105 flex items-center justify-center transition-all"
            type="button"><i class="fas fa-pen text-xl"></i></button>
        <button id="a11y-toggle-button"
            class="w-14 h-14 bg-primary text-white rounded-full shadow-2xl hover:bg-secondary transition-all transform hover:scale-105 flex items-center justify-center animate-bounce-short"
            type="button"><i class="fas fa-universal-access text-2xl"></i></button>
    </div>

    <!-- Floating AI Assistant Bubble -->
    <a href="/assistant.php" id="floating-assistant"
        class="fixed bottom-24 left-6 z-[60] w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-600 text-white rounded-full shadow-2xl flex items-center justify-center hover:shadow-indigo-500/50 transition-all print:hidden"
        title="Get Help from AI Assistant">
        <i class="fas fa-robot text-2xl"></i>
        <span class="absolute -top-1 -right-1 flex h-4 w-4">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-4 w-4 bg-indigo-500"></span>
        </span>
    </a>

    <!-- PANELS -->
    <div id="timer-panel"
        class="fixed bottom-24 right-6 w-64 bg-content-bg rounded-xl shadow-2xl transform scale-90 opacity-0 pointer-events-none transition-all duration-300 z-50 border-t-8 border-green-500 origin-bottom-right">
        <div class="p-4 text-center">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-bold text-text-default gap-2 flex items-center"><i
                        class="fas fa-clock text-green-600"></i> Timer</h3>
                <button id="timer-close" class="text-text-secondary hover:text-red-500"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="text-4xl font-mono font-bold text-text-default mb-4" id="timer-display">25:00</div>
            <div class="flex justify-center gap-2">
                <button id="timer-start"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-bold text-sm">Start</button>
                <button id="timer-reset"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 font-bold text-sm">Reset</button>
            </div>
        </div>
    </div>

    <div id="scratchpad-panel"
        class="fixed bottom-24 right-6 w-80 bg-content-bg rounded-xl shadow-2xl transform scale-90 opacity-0 pointer-events-none transition-all duration-300 z-50 border-t-8 border-indigo-500 origin-bottom-right">
        <div class="p-4">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-bold text-text-default gap-2 flex items-center"><i
                        class="fas fa-pen text-indigo-600"></i> Notes</h3>
                <button id="scratchpad-close" class="text-text-secondary hover:text-red-500"><i
                        class="fas fa-times"></i></button>
            </div>
            <textarea id="quick-notes-area"
                class="w-full h-40 p-3 bg-base-bg rounded-lg border-none resize-none text-sm text-text-default focus:ring-2 focus:ring-primary"
                placeholder="Type here..."></textarea>
            <div class="flex justify-between mt-2">
                <span id="scratchpad-status" class="text-xs text-text-secondary">Saved</span>
                <button id="download-notes" class="text-xs font-bold text-primary hover:underline">Download</button>
            </div>
        </div>
    </div>

    <div id="citation-panel"
        class="fixed bottom-24 right-6 w-80 bg-content-bg rounded-xl shadow-2xl transform scale-90 opacity-0 pointer-events-none transition-all duration-300 z-50 border-t-8 border-pink-500 origin-bottom-right">
        <div class="p-4">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-bold text-text-default gap-2 flex items-center"><i
                        class="fas fa-quote-right text-pink-600"></i> Cite</h3>
                <button id="citation-close" class="text-text-secondary hover:text-red-500"><i
                        class="fas fa-times"></i></button>
            </div>
            <input type="text" id="cite-title" placeholder="Page Title"
                class="w-full p-2 mb-2 bg-base-bg rounded text-sm text-text-default">
            <button id="cite-gen" class="w-full bg-pink-500 text-white rounded p-1 mb-2">Generate APA/MLA</button>
            <textarea id="cite-result" readonly
                class="w-full h-20 bg-base-bg text-text-default text-xs p-2 rounded"></textarea>
        </div>
    </div>

    <!-- A11y Panel -->
    <div id="a11y-settings-panel"
        class="fixed top-0 right-0 h-full w-full sm:w-96 bg-content-bg shadow-2xl z-[70] transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l border-white/20 backdrop-blur-xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-primary flex items-center gap-2"><i class="fas fa-sliders-h"></i>
                Settings</h2>
            <button id="a11y-close-button" class="text-text-secondary hover:text-text-default p-2"><i
                    class="fas fa-times text-xl"></i></button>
        </div>
        <div class="space-y-6">
            <div>
                <h3 class="font-bold text-text-secondary mb-2 uppercase text-xs">Theme</h3>
                <div class="grid grid-cols-2 gap-2">
                    <button class="p-2 border rounded bg-gray-50 text-black hover:border-primary"
                        onclick="updateGlobalSetting('theme', 'light')">Light</button>
                    <button class="p-2 border rounded bg-gray-900 text-white hover:border-primary"
                        onclick="updateGlobalSetting('theme', 'dark')">Dark</button>
                    <button class="p-2 border rounded bg-black text-yellow-300 hover:border-yellow-400"
                        onclick="updateGlobalSetting('theme', 'high-contrast')">Contrast</button>
                    <button class="p-2 border rounded bg-[#f4ecd8] text-[#433422] hover:border-amber-600"
                        onclick="updateGlobalSetting('theme', 'sepia')">Sepia</button>
                    <button class="col-span-2 p-2 border rounded bg-[#011627] text-[#d6deeb] hover:border-blue-400"
                        onclick="updateGlobalSetting('theme', 'midnight')">Midnight</button>
                </div>
            </div>
            <div>
                <h3 class="font-bold text-text-secondary mb-2 uppercase text-xs">Font</h3>
                <select id="panel-font" onchange="updateGlobalSetting('fontFamily', this.value)"
                    class="w-full p-2 rounded bg-base-bg border text-text-default">
                    <option value="Outfit">Outfit (Modern)</option>
                    <option value="Inter">Inter (Standard)</option>
                    <option value="Open Dyslexic">Open Dyslexic</option>
                    <option value="Lexend">Lexend</option>
                    <option value="Comic Neue">Comic Neue</option>
                    <option value="Roboto Mono">Monospace</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-text-default mb-1">Text Size</label>
                <input type="range" id="panel-size" class="w-full accent-primary" min="0.8" max="2.0" step="0.1"
                    oninput="updateGlobalSetting('fontSize', this.value)">
            </div>
            <div>
                <label class="block text-xs font-bold text-text-default mb-1">Line Height</label>
                <input type="range" id="panel-line" class="w-full accent-primary" min="1.0" max="2.5" step="0.1"
                    oninput="updateGlobalSetting('lineHeight', this.value)">
            </div>
            <div>
                <label class="block text-xs font-bold text-text-default mb-1">Saturation</label>
                <input type="range" id="panel-saturation" class="w-full accent-primary" min="0" max="200" step="10"
                    oninput="updateGlobalSetting('saturation', this.value)">
            </div>
            <div class="space-y-3">
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Reading Mask</span>
                    <input type="checkbox" id="panel-mask" onchange="updateGlobalSetting('readingMask', this.checked)"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Large Cursor</span>
                    <input type="checkbox" id="panel-cursor"
                        onchange="updateGlobalSetting('cursorSize', this.checked ? 'large' : 'normal')"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Hide Images</span>
                    <input type="checkbox" id="panel-images" onchange="updateGlobalSetting('hideImages', this.checked)"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Teacher Mode</span>
                    <input type="checkbox" id="panel-teacher"
                        onchange="updateGlobalSetting('teacherMode', this.checked)" class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Focus Mode</span>
                    <input type="checkbox" id="panel-focus" onchange="updateGlobalSetting('focusMode', this.checked)"
                        class="accent-primary">
                </label>
            </div>
            <button onclick="localStorage.removeItem('hl_accessibility_settings'); location.reload()"
                class="w-full py-2 bg-red-100 text-red-700 rounded font-bold mt-4">Reset</button>
            <div class="text-center pt-2">
                <a href="/settings.php" class="text-primary text-sm hover:underline">Full Settings Page</a>
            </div>
        </div>
    </div>

    <div id="reading-mask" class="hidden">
        <div id="reading-guide" style="top:30%"></div>
    </div>


    <!-- Announcement Bar -->
    <div id="announcement-bar-container" class="hidden">
        <div class="announcement-wrapper container mx-auto">
            <button class="announcement-btn announcement-prev" aria-label="Previous announcement">
                <i class="fas fa-chevron-left text-xs"></i>
            </button>

            <div id="announcement-carousel">
                <!-- Announcements will be injected here -->
            </div>

            <button class="announcement-btn announcement-next" aria-label="Next announcement">
                <i class="fas fa-chevron-right text-xs"></i>
            </button>

            <button class="announcement-close" id="close-announcement-bar" aria-label="Close announcements">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <header
        class="bg-header-bg shadow-sm sticky top-0 z-40 transition-colors duration-300 backdrop-blur-md border-b border-white/10 print:hidden">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex items-center justify-between flex-wrap">
                <a class="flex items-center flex-shrink-0 text-primary mr-8 group" href="/">
                    <div
                        class="h-10 w-10 mr-3 bg-gradient-to-br from-primary to-secondary text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg group-hover:rotate-12 transition-transform">
                        <img src="/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36-removebg-preview.png" alt="Logo"
                            class="w-7 h-7 object-contain">
                    </div>
                    <span class="font-bold text-xl tracking-tight text-text-default">Hesten's Learning</span>
                </a>
                <div class="block lg:hidden">
                    <button id="nav-toggle"
                        class="flex items-center px-3 py-2 border rounded text-text-default border-gray-400 hover:text-primary transition-colors"><i
                            class="fas fa-bars"></i></button>
                </div>
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden transition-all duration-300 gap-6"
                    id="nav-content">
                    <div class="text-sm lg:flex-grow flex flex-col lg:flex-row gap-2 lg:gap-6 mt-4 lg:mt-0 font-medium">
                        <a href="/" class="block lg:inline-block p-2 text-text-default hover:text-primary"><i
                                class="fas fa-home mr-1"></i> Home</a>
                        <a href="/learning.php"
                            class="block lg:inline-block p-2 text-text-default hover:text-primary"><i
                                class="fas fa-book mr-1"></i> Learning</a>
                        <a href="/assessment" class="block lg:inline-block p-2 text-text-default hover:text-primary"><i
                                class="fas fa-tasks mr-1"></i> Assessment</a>
                        <a href="/library" class="block lg:inline-block p-2 text-text-default hover:text-primary"><i
                                class="fas fa-book-open mr-1"></i> Library</a>
                    </div>
                    <div class="relative mt-4 lg:mt-0">
                        <div class="flex items-center group cursor-pointer" onclick="toggleSearchPalette(true)">
                            <div
                                class="bg-base-bg text-text-secondary rounded-full py-2 pl-10 pr-4 w-full lg:w-48 border border-gray-200 dark:border-gray-700 flex justify-between items-center group-hover:border-primary transition-colors">
                                <span>Search...</span>
                                <span
                                    class="text-[10px] bg-gray-200 dark:bg-gray-700 px-1.5 py-0.5 rounded border border-gray-300 dark:border-gray-600">Ctrl
                                    K</span>
                            </div>
                            <i class="fas fa-search absolute left-3 text-gray-400 group-hover:text-primary"></i>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Breadcrumbs Container -->
        <div id="breadcrumb-container" class="py-2 px-4 print:hidden">
            <div
                class="container mx-auto flex items-center gap-2 text-xs font-bold text-text-secondary uppercase tracking-widest overflow-x-auto whitespace-nowrap scrollbar-hide">
                <!-- Breadcrumbs will be dynamically injected here -->
            </div>
        </div>
    </header>

    <!-- Search Palette Modal -->
    <div id="search-palette"
        class="fixed inset-0 z-[100] hidden items-start justify-center pt-32 px-4 transition-all duration-300 opacity-0">
        <div class="bg-content-bg w-full max-w-2xl rounded-2xl shadow-2xl border border-white/10 overflow-hidden transform scale-95 transition-all duration-300"
            id="search-palette-modal">
            <div class="p-6 border-b border-gray-100 dark:border-gray-800">
                <div class="relative flex items-center">
                    <i class="fas fa-search absolute left-4 text-xl text-primary"></i>
                    <input type="text" id="search-palette-input" placeholder="Type to search lessons, games, or help..."
                        class="w-full pl-12 pr-4 py-4 bg-transparent text-xl font-bold text-text-default focus:outline-none placeholder:text-text-secondary">
                    <button onclick="toggleSearchPalette(false)" class="ml-4 text-text-secondary hover:text-red-500"><i
                            class="fas fa-times text-xl"></i></button>
                </div>
            </div>
            <div id="search-palette-results" class="max-h-[60vh] overflow-y-auto p-4 space-y-2">
                <!-- Sample results -->
                <div class="text-xs text-text-secondary px-4 py-2 uppercase tracking-widest font-bold">Quick Navigation
                </div>
                <a href="/" class="flex items-center gap-4 p-4 rounded-xl hover:bg-primary/5 group transition-all">
                    <div
                        class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="flex-grow">
                        <div class="font-bold text-text-default">Return to Home</div>
                        <div class="text-sm text-text-secondary">Back to main grade selection</div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-300 group-hover:text-primary"></i>
                </a>
                <a href="/learning.php"
                    class="flex items-center gap-4 p-4 rounded-xl hover:bg-primary/5 group transition-all">
                    <div
                        class="w-10 h-10 rounded-lg bg-green-100 dark:bg-green-900/30 flex items-center justify-center text-green-600">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="flex-grow">
                        <div class="font-bold text-text-default">Learning Dashboard</div>
                        <div class="text-sm text-text-secondary">View your courses and progress</div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-300 group-hover:text-primary"></i>
                </a>
            </div>
            <div
                class="p-4 bg-base-bg border-t border-gray-100 dark:border-gray-800 flex justify-between text-[10px] text-text-secondary uppercase font-bold tracking-widest">
                <div class="flex gap-4">
                    <span><kbd class="bg-gray-200 dark:bg-gray-700 px-1 rounded">↵</kbd> Select</span>
                    <span><kbd class="bg-gray-200 dark:bg-gray-700 px-1 rounded">↑↓</kbd> Navigate</span>
                </div>
                <div><kbd class="bg-gray-200 dark:bg-gray-700 px-1 rounded">ESC</kbd> to close</div>
            </div>
        </div>
    </div>

    <script>
        // --- CORE SETTINGS ---
        const STORAGE_KEY = 'hl_accessibility_settings';
        const defaultSettings = {
            theme: 'light',
            fontSize: 1.0,
            lineHeight: 1.6,
            fontFamily: 'Outfit',
            letterSpacing: 0,
            wordSpacing: 0,
            saturation: 100,
            readingMask: false,
            cursorSize: 'normal',
            hideImages: false,
            focusMode: false,
            teacherMode: false
        };
        let currentSettings = defaultSettings;

        (function init() {
            try {
                const stored = localStorage.getItem(STORAGE_KEY);
                if (stored) currentSettings = {
                    ...defaultSettings,
                    ...JSON.parse(stored)
                };
                // CRITICAL FIX: Expose settings to window for footer scripts (like Reading Mask)
                window.currentSettings = currentSettings;
            } catch (e) {
                console.warn('LocalStorage access denied', e);
            }
        })();

        // Define functions globally so they can be called by other scripts
        function updateGlobalSetting(key, value) {
            currentSettings[key] = value;
            window.currentSettings = currentSettings; // Keep window reference synced
            saveSettingsInternal(); // Call local function
            applySettings(currentSettings);
        }

        function saveSettingsInternal() {
            try {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(currentSettings));
                // Dispatch event for updated synchronization
                window.dispatchEvent(new CustomEvent('settings-changed', {
                    detail: currentSettings
                }));
            } catch (e) {
                console.warn('Could not save settings', e);
            }
        }

        // Expose API
        window.loadSettings = () => currentSettings;
        window.saveSettings = (s) => {
            currentSettings = {
                ...currentSettings,
                ...s
            };
            window.currentSettings = currentSettings;
            saveSettingsInternal();
            applySettings(currentSettings);
        };
        window.updateGlobalSetting = updateGlobalSetting;
        window.syncPanelInputs = syncPanelInputs;

        function applySettings(s) {
            if (!s) s = defaultSettings;
            const r = document.documentElement; // HTML tag
            const b = document.body; // Body tag

            // CSS Variables (Applied to Body for simple variable inheritance)
            b.style.setProperty('--site-font-size', `${s.fontSize}rem`);
            b.style.setProperty('--site-line-height', s.lineHeight);
            b.style.setProperty('--site-letter-spacing', `${s.letterSpacing}em`);
            b.style.setProperty('--site-word-spacing', `${s.wordSpacing}em`);
            b.style.setProperty('--site-font-family', s.fontFamily.includes(' ') ? `"${s.fontFamily}"` : s.fontFamily);
            r.style.filter = `saturate(${s.saturation}%)`;

            // Classes - Apply to BOTH HTML (for Tailwind) and Body (for CSS selectors)
            const themes = ['light', 'dark', 'high-contrast', 'sepia', 'midnight'];
            r.classList.remove(...themes);
            b.classList.remove(...themes);

            r.classList.add(s.theme);
            b.classList.add(s.theme);

            // Toggles
            const toggleClass = (el, cls, cond) => {
                if (cond) el.classList.add(cls);
                else el.classList.remove(cls);
            };

            toggleClass(b, 'focus-mode', !!s.focusMode);
            toggleClass(b, 'teacher-mode', !!s.teacherMode);
            toggleClass(b, 'cursor-large', s.cursorSize === 'large');
            toggleClass(b, 'hide-images', !!s.hideImages);

            // Also apply to HTML for consistency if needed
            toggleClass(r, 'focus-mode', !!s.focusMode);

            // Mask
            const m = document.getElementById('reading-mask');
            if (m) m.classList.toggle('hidden', !s.readingMask);

            // Breadcrumbs Init
            initBreadcrumbs();

            // Sync Panel UI
            syncPanelInputs(s);
        }

        function initBreadcrumbs() {
            const container = document.querySelector('#breadcrumb-container .container');
            if (!container) return;

            const path = window.location.pathname;
            if (path === '/' || path === '/index.php') {
                document.getElementById('breadcrumb-container').classList.add('hidden');
                return;
            }
            document.getElementById('breadcrumb-container').classList.remove('hidden');

            const parts = path.split('/').filter(p => p && !p.endsWith('.php'));
            let html = `<a href="/" class="hover:text-primary transition-colors">Home</a>`;

            let currentPath = '';
            parts.forEach((part, index) => {
                currentPath += `/${part}`;
                const name = part.replace(/-/g, ' ');
                html += ` <i class="fas fa-chevron-right text-[8px] opacity-30"></i> `;
                if (index === parts.length - 1) {
                    html += `<span class="text-primary">${name}</span>`;
                } else {
                    html += `<a href="${currentPath}" class="hover:text-primary transition-colors">${name}</a>`;
                }
            });

            // Add filename if it's not index
            const file = path.split('/').pop().replace('.php', '');
            if (file && file !== 'index' && file !== parts[parts.length - 1]) {
                html += ` <i class="fas fa-chevron-right text-[8px] opacity-30"></i> `;
                html += `<span class="text-primary">${file.replace(/-/g, ' ')}</span>`;
            }

            container.innerHTML = html;
        }

        window.toggleSearchPalette = function (show) {
            const palette = document.getElementById('search-palette');
            const modal = document.getElementById('search-palette-modal');
            const input = document.getElementById('search-palette-input');

            if (show) {
                palette.classList.remove('hidden');
                setTimeout(() => {
                    palette.classList.add('opacity-100');
                    modal.classList.remove('scale-95');
                    input.focus();
                }, 10);
            } else {
                palette.classList.remove('opacity-100');
                modal.classList.add('scale-95');
                setTimeout(() => palette.classList.add('hidden'), 300);
            }
        };

        // Keyboard Shortcuts
        document.addEventListener('keydown', e => {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                toggleSearchPalette(true);
            }
            if (e.key === 'Escape') toggleSearchPalette(false);
        });

        const searchIndex = [
            { title: 'Home', desc: 'Main grade selection and overview', link: '/', icon: 'fa-home', color: 'text-blue-500', bg: 'bg-blue-100' },
            { title: 'Learning Dashboard', desc: 'Your courses, progress and streaks', link: '/learning.php', icon: 'fa-book', color: 'text-green-500', bg: 'bg-green-100' },
            { title: 'Assessment Center', desc: 'Tests, quizzes and evaluations', link: '/assessment', icon: 'fa-tasks', color: 'text-amber-500', bg: 'bg-amber-100' },
            { title: 'Library', desc: 'Articles, books and resources', link: '/library', icon: 'fa-book-open', color: 'text-purple-500', bg: 'bg-purple-100' },
            { title: 'Help Center', desc: 'FAQs and support guides', link: '/help-center.php', icon: 'fa-question-circle', color: 'text-rose-500', bg: 'bg-rose-100' },
            { title: 'Accessibility Settings', desc: 'Customize your learning experience', link: '/settings.php', icon: 'fa-universal-access', color: 'text-primary', bg: 'bg-primary/20' },
            { title: 'Contact Us', desc: 'Get in touch with our team', link: '/contact.php', icon: 'fa-envelope', color: 'text-indigo-500', bg: 'bg-indigo-100' },
            { title: 'About Hesten\'s Learning', desc: 'Our mission and team', link: '/about.php', icon: 'fa-info-circle', color: 'text-teal-500', bg: 'bg-teal-100' }
        ];

        document.getElementById('search-palette-input')?.addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase().trim();
            const resultsContainer = document.getElementById('search-palette-results');
            if (!resultsContainer) return;

            if (!term) {
                // Show default navigation
                resultsContainer.innerHTML = `
                    <div class="text-xs text-text-secondary px-4 py-2 uppercase tracking-widest font-bold">Quick Navigation</div>
                    ${searchIndex.slice(0, 4).map(item => `
                        <a href="${item.link}" class="flex items-center gap-4 p-4 rounded-xl hover:bg-primary/5 group transition-all">
                            <div class="w-10 h-10 rounded-lg ${item.bg} dark:bg-opacity-20 flex items-center justify-center ${item.color}"><i class="fas ${item.icon}"></i></div>
                            <div class="flex-grow">
                                <div class="font-bold text-text-default">${item.title}</div>
                                <div class="text-sm text-text-secondary">${item.desc}</div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-300 group-hover:text-primary"></i>
                        </a>
                    `).join('')}
                `;
                return;
            }

            const filtered = searchIndex.filter(item => 
                item.title.toLowerCase().includes(term) || 
                item.desc.toLowerCase().includes(term)
            );

            if (filtered.length === 0) {
                resultsContainer.innerHTML = `<div class="p-12 text-center text-text-secondary italic">No results found for "${term}"</div>`;
            } else {
                resultsContainer.innerHTML = `
                    <div class="text-xs text-text-secondary px-4 py-2 uppercase tracking-widest font-bold">Search Results</div>
                    ${filtered.map(item => `
                        <a href="${item.link}" class="flex items-center gap-4 p-4 rounded-xl hover:bg-primary/5 group transition-all">
                            <div class="w-10 h-10 rounded-lg ${item.bg} dark:bg-opacity-20 flex items-center justify-center ${item.color}"><i class="fas ${item.icon}"></i></div>
                            <div class="flex-grow">
                                <div class="font-bold text-text-default">${item.title}</div>
                                <div class="text-sm text-text-secondary">${item.desc}</div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-300 group-hover:text-primary"></i>
                        </a>
                    `).join('')}
                `;
            }
        });

        // --- ANNOUNCEMENT BAR ---
        const announcements = [
            "Welcome to Hesten's Learning! We're empowering students with personalized lessons.",
            "New Math lessons are now available in the Learning section. Check them out!",
            "I am working on each section a little at a time. If you have any feedback please email me at admin@hestena62.com",
            "Try our new Assessment tools to track your progress!"
        ];

        let currentAnnouncementIndex = 0;
        const BAR_STORAGE_KEY = 'hl_announcement_closed';

        function initAnnouncementBar() {
            const container = document.getElementById('announcement-bar-container');
            const carousel = document.getElementById('announcement-carousel');
            const closeBtn = document.getElementById('close-announcement-bar');

            if (!container || !carousel || !closeBtn) return;

            // Check if user has closed the bar
            if (localStorage.getItem(BAR_STORAGE_KEY) === 'true') {
                return;
            }

            // Populate carousel
            announcements.forEach((text, index) => {
                const slide = document.createElement('div');
                slide.className = `announcement-slide ${index === 0 ? 'active' : ''}`;
                slide.innerHTML = `<p class="font-medium">${text}</p>`;
                carousel.appendChild(slide);
            });

            container.classList.remove('hidden');

            // Controls
            const prevBtn = document.querySelector('.announcement-prev');
            const nextBtn = document.querySelector('.announcement-next');

            if (prevBtn) prevBtn.addEventListener('click', () => showAnnouncement(currentAnnouncementIndex - 1));
            if (nextBtn) nextBtn.addEventListener('click', () => showAnnouncement(currentAnnouncementIndex + 1));

            closeBtn.addEventListener('click', () => {
                container.style.height = '0';
                container.style.opacity = '0';
                setTimeout(() => container.classList.add('hidden'), 300);
                localStorage.setItem(BAR_STORAGE_KEY, 'true');
            });
        }

        function showAnnouncement(index) {
            const slides = document.querySelectorAll('.announcement-slide');
            if (slides.length === 0) return;

            slides[currentAnnouncementIndex].classList.remove('active');
            currentAnnouncementIndex = (index + slides.length) % slides.length;
            slides[currentAnnouncementIndex].classList.add('active');
        }

        // Initialize on DOMContentLoaded
        document.addEventListener('DOMContentLoaded', () => {
            initAnnouncementBar();
        });

        // Expose applySettings for debugging or external use
        window.applySettings = applySettings;

        function syncPanelInputs(s) {
            const el = (id) => document.getElementById(id);
            if (el('panel-font')) el('panel-font').value = s.fontFamily;
            if (el('panel-size')) el('panel-size').value = s.fontSize;
            if (el('panel-line')) el('panel-line').value = s.lineHeight;
            if (el('panel-saturation')) el('panel-saturation').value = s.saturation;

            if (el('panel-mask')) el('panel-mask').checked = !!s.readingMask;
            if (el('panel-cursor')) el('panel-cursor').checked = (s.cursorSize === 'large');
            if (el('panel-images')) el('panel-images').checked = !!s.hideImages;
            if (el('panel-teacher')) el('panel-teacher').checked = !!s.teacherMode;
            if (el('panel-focus')) el('panel-focus').checked = !!s.focusMode;
        }

        // Apply immediately to prevent FOUC
        applySettings(currentSettings);

        // Listen for internal system updates
        window.addEventListener('settings-changed', (e) => {
            currentSettings = e.detail;
            window.currentSettings = currentSettings;
            applySettings(currentSettings);
        });
    </script>