<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : 'Empowering students with learning disabilities.'; ?>" />
    <meta name="theme-color" content="#4F46E5" />

    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Hesten\'s Learning'; ?></title>

    <!-- Tailwind & Libraries -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600&family=Inter:wght@300;400;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

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
                        'base-bg': 'var(--color-base-bg)',
                        'content-bg': 'var(--color-content-bg)',
                        'text-default': 'var(--color-text-default)',
                        'text-muted': 'var(--color-text-muted)',
                        'border-color': 'var(--color-border)',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        };

        // --- A11y & Storage Logic ---
        const defaultSettings = { theme: 'light', fontSize: 1.0, lineHeight: 1.6, fontFamily: 'Inter', reducedMotion: false };
        const STORAGE_KEY = 'hl_accessibility_settings';

        function loadSettings() {
            try { return JSON.parse(localStorage.getItem(STORAGE_KEY)) || defaultSettings; } catch (e) { return defaultSettings; }
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
        @font-face { font-family: 'Open Dyslexic'; src: url('/font/OpenDyslexic/OpenDyslexic-Regular.otf'); font-display: swap; }
        @font-face { font-family: 'Inter'; src: url('/font/Inter/static/Inter_18pt-Regular.ttf'); font-display: swap; }

        body {
            background-color: var(--color-base-bg);
            color: var(--color-text-default);
            font-size: var(--site-font-size, 1rem);
            line-height: var(--site-line-height, 1.6);
            font-family: var(--site-font-family, "Inter", sans-serif);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Themes */
        .light {
            --color-primary: #2563EB; --color-secondary: #4F46E5;
            --color-base-bg: #F3F4F6; --color-content-bg: #FFFFFF;
            --color-text-default: #111827; --color-text-muted: #4B5563;
            --color-border: #E5E7EB;
        }
        .dark {
            --color-primary: #60A5FA; --color-secondary: #818CF8;
            --color-base-bg: #0F172A; --color-content-bg: #1E293B;
            --color-text-default: #F8FAFC; --color-text-muted: #94A3B8;
            --color-border: #334155;
        }
        .high-contrast {
            --color-primary: #FFFF00; --color-secondary: #00FFFF;
            --color-base-bg: #000000; --color-content-bg: #000000;
            --color-text-default: #FFFFFF; --color-text-muted: #FFFFFF;
            --color-border: #FFFFFF;
        }

        /* Utilities */
        .perspective-1000 { perspective: 1000px; }
        .transform-style-3d { transform-style: preserve-3d; }
        .backface-hidden { backface-visibility: hidden; }
        .rotate-y-180 { transform: rotateY(180deg); }
        
        #reading-guide { position: fixed; width: 100%; height: 60px; background: rgba(255, 255, 0, 0.15); border-top: 2px solid yellow; border-bottom: 2px solid yellow; pointer-events: none; z-index: 9999; display: none; }
        .reduced-motion * { animation: none !important; transition: none !important; }
        
        /* Nav Link Active State */
        .nav-link.active { color: var(--color-primary); font-weight: 700; background-color: rgba(37, 99, 235, 0.1); }
    </style>
</head>
<body class="antialiased flex flex-col min-h-screen">
    <script>applySettings(currentSettings);</script>
    <div id="reading-guide"></div>

    <!-- A11y Toggle -->
    <button id="a11y-toggle-button" class="fixed bottom-6 right-6 z-50 p-4 bg-primary text-white rounded-full shadow-lg hover:scale-110 transition-transform" aria-label="Accessibility Settings">
        <i class="fas fa-universal-access text-2xl"></i>
    </button>

    <!-- A11y Panel -->
    <div id="a11y-settings-panel" class="fixed top-0 right-0 h-full w-80 bg-content-bg shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l border-border-color">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-text-default">Accessibility</h2>
            <button id="a11y-close-button" class="text-text-muted hover:text-text-default"><i class="fas fa-times text-xl"></i></button>
        </div>
        
        <div class="space-y-6">
            <div>
                <h3 class="font-semibold mb-2 text-text-default">Theme</h3>
                <div class="flex gap-2">
                    <button onclick="saveSettings({...currentSettings, theme: 'light'})" class="flex-1 py-2 border rounded hover:bg-base-bg text-text-default">Light</button>
                    <button onclick="saveSettings({...currentSettings, theme: 'dark'})" class="flex-1 py-2 border rounded hover:bg-base-bg text-text-default">Dark</button>
                    <button onclick="saveSettings({...currentSettings, theme: 'high-contrast'})" class="flex-1 py-2 border rounded font-bold text-text-default">Contrast</button>
                </div>
            </div>
            <div>
                <h3 class="font-semibold mb-2 text-text-default">Text Size</h3>
                <input type="range" min="0.8" max="1.5" step="0.1" value="1.0" class="w-full accent-primary" oninput="saveSettings({...currentSettings, fontSize: this.value})">
            </div>
             <div>
                <h3 class="font-semibold mb-2 text-text-default">Reading Guide</h3>
                <label class="flex items-center gap-2 text-text-default cursor-pointer">
                    <input type="checkbox" id="toggle-reading-guide" class="accent-primary" onchange="document.getElementById('reading-guide').style.display = this.checked ? 'block' : 'none'">
                    <span>Enable Guide</span>
                </label>
            </div>
            <button onclick="saveSettings(defaultSettings); location.reload();" class="w-full bg-gray-200 dark:bg-gray-700 text-text-default py-2 rounded font-bold">Reset</button>
        </div>
    </div>

    <!-- Nav -->
    <header class="bg-white dark:bg-gray-900 border-b border-border-color sticky top-0 z-30 shadow-sm backdrop-blur-md bg-opacity-90">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex items-center justify-between flex-wrap">
                <a href="/" class="flex items-center gap-3 text-text-default group">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:rotate-12 transition-transform">H</div>
                    <span class="font-bold text-lg tracking-tight">Hesten's Learning</span>
                </a>

                <button id="nav-toggle" class="lg:hidden px-3 py-2 border rounded text-text-muted border-border-color">
                    <i class="fas fa-bars"></i>
                </button>

                <div id="nav-content" class="w-full lg:w-auto lg:flex hidden items-center gap-6 mt-4 lg:mt-0">
                    <div class="flex flex-col lg:flex-row gap-2 text-sm font-medium">
                        <?php 
                        $cur = basename($_SERVER['PHP_SELF']);
                        $linkClasses = "nav-link px-3 py-2 rounded-md transition-colors text-text-muted hover:text-primary hover:bg-base-bg";
                        ?>
                        <a href="/" class="<?php echo $linkClasses . ($cur == 'index.php' ? ' active' : ''); ?>">Home</a>
                        <a href="/learning.php" class="<?php echo $linkClasses . ($cur == 'learning.php' ? ' active' : ''); ?>">Learning</a>
                        <a href="/assessment.php" class="<?php echo $linkClasses . ($cur == 'assessment.php' ? ' active' : ''); ?>">Assessment</a>
                        <a href="/assistant.php" class="<?php echo $linkClasses . ($cur == 'assistant.php' ? ' active' : ''); ?>">Assistant</a>
                    </div>
                    
                    <form action="/search.php" method="GET" class="relative">
                        <input type="text" name="q" placeholder="Search..." class="bg-base-bg border border-border-color text-text-default text-sm rounded-full py-2 pl-10 pr-4 focus:ring-2 focus:ring-primary outline-none w-full lg:w-48 transition-all focus:w-64">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-text-muted text-xs"></i>
                    </form>
                </div>
            </nav>
        </div>
    </header>