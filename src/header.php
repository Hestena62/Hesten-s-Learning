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
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Lexend:wght@300;400;600&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["var(--site-font-family, 'Inter')", "sans-serif"],
                        dyslexic: ['"Open Dyslexic"', 'sans-serif'],
                        lexend: ['"Lexend"', 'sans-serif'],
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
        const defaultSettings = { 
            theme: 'light', 
            fontSize: 1.0, 
            lineHeight: 1.6, 
            fontFamily: 'Inter', 
            reducedMotion: false,
            soundEnabled: true 
        };
        const STORAGE_KEY = 'hl_accessibility_settings';

        function loadSettings() {
            try { return { ...defaultSettings, ...JSON.parse(localStorage.getItem(STORAGE_KEY)) }; } catch (e) { return defaultSettings; }
        }

        function saveSettings(settings) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
            applySettings(settings);
            currentSettings = settings;
        }

        function applySettings(settings) {
            const root = document.documentElement;
            
            // Text Size
            root.style.setProperty('--site-font-size', `${settings.fontSize}rem`);
            
            // Line Height
            root.style.setProperty('--site-line-height', settings.lineHeight);
            
            // Font Family
            let fontName = settings.fontFamily || 'Inter';
            if (fontName === 'Open Dyslexic') fontName = '"Open Dyslexic"';
            else if (fontName === 'Lexend') fontName = '"Lexend"';
            root.style.setProperty('--site-font-family', fontName);

            // Theme
            document.body.classList.remove('light', 'dark', 'high-contrast');
            document.body.classList.add(settings.theme);
            
            // Reduced Motion
            if (settings.reducedMotion) document.body.classList.add('reduced-motion');
            else document.body.classList.remove('reduced-motion');

            // UI Updates (Sync inputs with state)
            const soundToggle = document.getElementById('toggle-sound');
            if(soundToggle) soundToggle.checked = settings.soundEnabled;
            
            const motionToggle = document.getElementById('toggle-reduced-motion');
            if(motionToggle) motionToggle.checked = settings.reducedMotion;

            const fontBtns = document.querySelectorAll('.font-btn');
            fontBtns.forEach(btn => {
                if(btn.dataset.font === settings.fontFamily) {
                    btn.classList.add('ring-2', 'ring-primary', 'bg-gray-100', 'dark:bg-gray-700');
                } else {
                    btn.classList.remove('ring-2', 'ring-primary', 'bg-gray-100', 'dark:bg-gray-700');
                }
            });
        }

        let currentSettings = loadSettings();
    </script>

    <style>
        /* Fonts */
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
        
        /* Custom Range Slider */
        input[type=range] {
            -webkit-appearance: none;
            background: transparent;
        }
        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 16px;
            width: 16px;
            border-radius: 50%;
            background: var(--color-primary);
            cursor: pointer;
            margin-top: -6px;
        }
        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 4px;
            cursor: pointer;
            background: #cbd5e1;
            border-radius: 2px;
        }
        .dark input[type=range]::-webkit-slider-runnable-track {
            background: #475569;
        }
    </style>
</head>
<body class="antialiased flex flex-col min-h-screen">
    <script>applySettings(currentSettings);</script>
    <div id="reading-guide"></div>

    <!-- A11y Toggle -->
    <button id="a11y-toggle-button" class="fixed bottom-6 right-6 z-50 p-4 bg-primary text-white rounded-full shadow-lg hover:scale-110 transition-transform focus:outline-none focus:ring-4 focus:ring-white/50" aria-label="Accessibility Settings">
        <i class="fas fa-universal-access text-2xl"></i>
    </button>

    <!-- Full Accessibility Panel -->
    <div id="a11y-settings-panel" class="fixed top-0 right-0 h-full w-80 md:w-96 bg-content-bg shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto border-l border-border-color flex flex-col" role="dialog" aria-modal="true" aria-label="Accessibility Settings">
        
        <!-- Panel Header -->
        <div class="flex justify-between items-center p-6 border-b border-border-color bg-base-bg sticky top-0 z-10">
            <h2 class="text-xl font-bold text-text-default flex items-center gap-2">
                <i class="fas fa-universal-access text-primary"></i> Accessibility
            </h2>
            <button id="a11y-close-button" class="text-text-muted hover:text-text-default p-2 rounded-full hover:bg-black/5 dark:hover:bg-white/10 transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <div class="p-6 space-y-8 flex-grow">
            
            <!-- Section: Theme -->
            <div>
                <h3 class="text-xs font-bold text-text-muted uppercase tracking-wider mb-3">Contrast & Theme</h3>
                <div class="flex gap-2">
                    <button onclick="saveSettings({...currentSettings, theme: 'light'})" class="flex-1 py-3 px-2 border border-border-color rounded-lg hover:bg-gray-100 text-gray-800 text-sm font-medium transition-colors flex flex-col items-center gap-1">
                        <i class="fas fa-sun text-lg"></i> Light
                    </button>
                    <button onclick="saveSettings({...currentSettings, theme: 'dark'})" class="flex-1 py-3 px-2 border border-border-color rounded-lg hover:bg-gray-800 text-gray-800 dark:text-white bg-gray-100 dark:bg-gray-800 text-sm font-medium transition-colors flex flex-col items-center gap-1">
                        <i class="fas fa-moon text-lg"></i> Dark
                    </button>
                    <button onclick="saveSettings({...currentSettings, theme: 'high-contrast'})" class="flex-1 py-3 px-2 border-2 border-black bg-white text-black text-sm font-bold transition-colors flex flex-col items-center gap-1">
                        <i class="fas fa-adjust text-lg"></i> Contrast
                    </button>
                </div>
            </div>

            <!-- Section: Font Style -->
            <div>
                <h3 class="text-xs font-bold text-text-muted uppercase tracking-wider mb-3">Font Style</h3>
                <div class="space-y-2">
                    <button data-font="Inter" onclick="saveSettings({...currentSettings, fontFamily: 'Inter'})" class="font-btn w-full text-left px-4 py-3 border border-border-color rounded-lg hover:bg-base-bg text-text-default transition-all flex items-center justify-between group">
                        <span class="font-sans">Standard (Inter)</span>
                        <i class="fas fa-check opacity-0 group-[.ring-2]:opacity-100 text-primary"></i>
                    </button>
                    <button data-font="Open Dyslexic" onclick="saveSettings({...currentSettings, fontFamily: 'Open Dyslexic'})" class="font-btn w-full text-left px-4 py-3 border border-border-color rounded-lg hover:bg-base-bg text-text-default transition-all flex items-center justify-between group" style="font-family: 'Open Dyslexic'">
                        <span>Dyslexic Friendly</span>
                        <i class="fas fa-check opacity-0 group-[.ring-2]:opacity-100 text-primary"></i>
                    </button>
                    <button data-font="Lexend" onclick="saveSettings({...currentSettings, fontFamily: 'Lexend'})" class="font-btn w-full text-left px-4 py-3 border border-border-color rounded-lg hover:bg-base-bg text-text-default transition-all flex items-center justify-between group" style="font-family: 'Lexend'">
                        <span>High Legibility (Lexend)</span>
                        <i class="fas fa-check opacity-0 group-[.ring-2]:opacity-100 text-primary"></i>
                    </button>
                </div>
            </div>

            <!-- Section: Sizing -->
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between mb-2">
                        <h3 class="text-xs font-bold text-text-muted uppercase tracking-wider">Text Size</h3>
                        <span class="text-xs font-mono text-primary bg-primary/10 px-2 py-0.5 rounded" id="font-size-display">100%</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-font text-xs text-text-muted"></i>
                        <input type="range" min="0.8" max="1.5" step="0.1" value="1.0" class="w-full h-2 rounded-lg appearance-none cursor-pointer" oninput="saveSettings({...currentSettings, fontSize: this.value}); document.getElementById('font-size-display').innerText = Math.round(this.value * 100) + '%'">
                        <i class="fas fa-font text-lg text-text-default"></i>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between mb-2">
                        <h3 class="text-xs font-bold text-text-muted uppercase tracking-wider">Line Spacing</h3>
                        <span class="text-xs font-mono text-primary bg-primary/10 px-2 py-0.5 rounded" id="line-height-display">1.6</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-align-justify text-xs text-text-muted"></i>
                        <input type="range" min="1.3" max="2.2" step="0.1" value="1.6" class="w-full h-2 rounded-lg appearance-none cursor-pointer" oninput="saveSettings({...currentSettings, lineHeight: this.value}); document.getElementById('line-height-display').innerText = this.value">
                        <i class="fas fa-align-justify text-lg text-text-default"></i>
                    </div>
                </div>
            </div>

            <!-- Section: Tools -->
            <div>
                <h3 class="text-xs font-bold text-text-muted uppercase tracking-wider mb-3">Tools & Preferences</h3>
                <div class="space-y-3">
                    <label class="flex items-center justify-between p-3 border border-border-color rounded-lg hover:bg-base-bg cursor-pointer group">
                        <span class="text-sm font-medium text-text-default flex items-center gap-2">
                            <i class="fas fa-ruler-horizontal text-primary"></i> Reading Guide
                        </span>
                        <input type="checkbox" id="toggle-reading-guide" class="accent-primary w-5 h-5" onchange="document.getElementById('reading-guide').style.display = this.checked ? 'block' : 'none'">
                    </label>
                    
                    <label class="flex items-center justify-between p-3 border border-border-color rounded-lg hover:bg-base-bg cursor-pointer group">
                        <span class="text-sm font-medium text-text-default flex items-center gap-2">
                            <i class="fas fa-film text-primary"></i> Reduce Motion
                        </span>
                        <input type="checkbox" id="toggle-reduced-motion" class="accent-primary w-5 h-5" onchange="saveSettings({...currentSettings, reducedMotion: this.checked})">
                    </label>

                    <label class="flex items-center justify-between p-3 border border-border-color rounded-lg hover:bg-base-bg cursor-pointer group">
                        <span class="text-sm font-medium text-text-default flex items-center gap-2">
                            <i class="fas fa-volume-up text-primary"></i> Sound Effects
                        </span>
                        <input type="checkbox" id="toggle-sound" class="accent-primary w-5 h-5" onchange="saveSettings({...currentSettings, soundEnabled: this.checked})">
                    </label>
                </div>
            </div>

            <!-- Reset -->
            <button onclick="saveSettings(defaultSettings); location.reload();" class="w-full bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40 py-3 rounded-lg font-bold text-sm transition-colors flex items-center justify-center gap-2 mt-4">
                <i class="fas fa-undo"></i> Reset to Defaults
            </button>
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

    <script>
        // Panel Toggle Logic
        const panel = document.getElementById('a11y-settings-panel');
        const toggleBtn = document.getElementById('a11y-toggle-button');
        const closeBtn = document.getElementById('a11y-close-button');

        function openPanel() {
            panel.classList.remove('translate-x-full');
            panel.setAttribute('aria-hidden', 'false');
            closeBtn.focus();
        }

        function closePanel() {
            panel.classList.add('translate-x-full');
            panel.setAttribute('aria-hidden', 'true');
            toggleBtn.focus();
        }

        toggleBtn.addEventListener('click', openPanel);
        closeBtn.addEventListener('click', closePanel);

        // Close on Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !panel.classList.contains('translate-x-full')) {
                closePanel();
            }
        });

        // Initialize sliders
        document.querySelector('input[type=range][max="1.5"]').value = currentSettings.fontSize;
        document.querySelector('input[type=range][max="2.2"]').value = currentSettings.lineHeight;
        document.getElementById('font-size-display').innerText = Math.round(currentSettings.fontSize * 100) + '%';
        document.getElementById('line-height-display').innerText = currentSettings.lineHeight;
    </script>