<?php
  // --- settings.php ---
  $pageTitle = "Accessibility Settings - Hesten's Learning";
  $pageDescription = "Customize your viewing experience with advanced accessibility controls.";
  include 'src/header.php';
?>

<main class="container mx-auto px-4 py-12 mb-16" id="main-content">
    
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-4 mb-8">
            <a href="/" class="p-3 bg-gray-200 dark:bg-gray-700 rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors" aria-label="Go back to Home">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-4xl font-bold text-text-default">Accessibility Settings</h1>
        </div>

        <div class="bg-content-bg rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            
            <!-- Header -->
            <div class="bg-primary/10 p-6 border-b border-gray-200 dark:border-gray-700">
                <p class="text-text-secondary">Customize the look and feel of Hesten's Learning to match your specific needs. These settings are saved automatically to your device.</p>
            </div>

            <div class="p-8 space-y-10">
                
                <!-- Section 1: Display Mode -->
                <section aria-labelledby="theme-heading">
                    <h2 id="theme-heading" class="text-2xl font-bold text-text-default mb-4 flex items-center gap-2">
                        <i class="fas fa-adjust text-accent"></i> Display Mode
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <button id="page-theme-light" class="theme-card flex flex-col items-center justify-center p-6 rounded-xl border-2 border-gray-200 hover:border-primary cursor-pointer transition-all bg-white text-gray-900 shadow-sm hover:shadow-md">
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                                <i class="fas fa-sun text-xl text-yellow-500"></i>
                            </div>
                            <span class="font-bold">Light Mode</span>
                        </button>
                        <button id="page-theme-dark" class="theme-card flex flex-col items-center justify-center p-6 rounded-xl border-2 border-gray-700 hover:border-primary cursor-pointer transition-all bg-gray-800 text-white shadow-sm hover:shadow-md">
                            <div class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center mb-3">
                                <i class="fas fa-moon text-xl text-indigo-300"></i>
                            </div>
                            <span class="font-bold">Dark Mode</span>
                        </button>
                        <button id="page-theme-contrast" class="theme-card flex flex-col items-center justify-center p-6 rounded-xl border-2 border-black hover:border-white cursor-pointer transition-all bg-black text-yellow-400 shadow-sm hover:shadow-md">
                            <div class="w-12 h-12 bg-gray-900 rounded-full flex items-center justify-center mb-3 border border-yellow-400">
                                <i class="fas fa-adjust text-xl"></i>
                            </div>
                            <span class="font-bold">High Contrast</span>
                        </button>
                    </div>
                </section>

                <hr class="border-gray-200 dark:border-gray-700" />

                <!-- Section 2: Typography -->
                <section aria-labelledby="typo-heading">
                    <h2 id="typo-heading" class="text-2xl font-bold text-text-default mb-6 flex items-center gap-2">
                        <i class="fas fa-font text-accent"></i> Typography
                    </h2>
                    
                    <div class="space-y-8">
                        <!-- Font Family -->
                        <div>
                            <label class="block text-sm font-bold text-text-secondary mb-3">Font Family</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <button data-set-font="Inter" class="page-font-selector py-3 px-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 text-text-default hover:border-primary transition-all font-sans text-left">
                                    <span class="block font-bold">Standard</span>
                                    <span class="text-xs opacity-75">Inter (Sans-serif)</span>
                                </button>
                                <button data-set-font="Open Dyslexic" class="page-font-selector py-3 px-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 text-text-default hover:border-primary transition-all font-dyslexic text-left">
                                    <span class="block font-bold">Dyslexic Friendly</span>
                                    <span class="text-xs opacity-75">Open Dyslexic</span>
                                </button>
                                <button data-set-font="Roboto Mono" class="page-font-selector py-3 px-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 text-text-default hover:border-primary transition-all font-mono text-left">
                                    <span class="block font-bold">Monospace</span>
                                    <span class="text-xs opacity-75">Roboto Mono (Coding)</span>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Font Size -->
                            <div>
                                <label for="page-fs-slider" class="flex justify-between text-sm font-bold text-text-secondary mb-2">
                                    <span>Font Size</span>
                                    <span class="text-primary"><span id="page-fs-value">100</span>%</span>
                                </label>
                                <div class="flex items-center gap-4">
                                    <i class="fas fa-font text-xs text-text-secondary"></i>
                                    <input type="range" id="page-fs-slider" min="0.8" max="1.6" step="0.1" class="w-full h-2 bg-gray-300 rounded-lg cursor-pointer accent-primary">
                                    <i class="fas fa-font text-xl text-text-secondary"></i>
                                </div>
                            </div>

                            <!-- Line Height -->
                            <div>
                                <label for="page-lh-slider" class="flex justify-between text-sm font-bold text-text-secondary mb-2">
                                    <span>Line Spacing</span>
                                    <span class="text-primary" id="page-lh-value">1.6</span>
                                </label>
                                <div class="flex items-center gap-4">
                                    <i class="fas fa-bars text-xs text-text-secondary"></i>
                                    <input type="range" id="page-lh-slider" min="1.0" max="2.5" step="0.1" class="w-full h-2 bg-gray-300 rounded-lg cursor-pointer accent-primary">
                                    <i class="fas fa-bars text-xl text-text-secondary"></i>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Word Spacing (Advanced) -->
                            <div>
                                <label for="page-ws-slider" class="flex justify-between text-sm font-bold text-text-secondary mb-2">
                                    <span>Word Spacing</span>
                                    <span class="text-primary"><span id="page-ws-value">Normal</span></span>
                                </label>
                                <input type="range" id="page-ws-slider" min="0" max="1.0" step="0.1" class="w-full h-2 bg-gray-300 rounded-lg cursor-pointer accent-primary">
                            </div>

                            <!-- Letter Spacing (Advanced) -->
                            <div>
                                <label for="page-ls-slider" class="flex justify-between text-sm font-bold text-text-secondary mb-2">
                                    <span>Letter Spacing</span>
                                    <span class="text-primary"><span id="page-ls-value">Normal</span></span>
                                </label>
                                <input type="range" id="page-ls-slider" min="0" max="0.3" step="0.05" class="w-full h-2 bg-gray-300 rounded-lg cursor-pointer accent-primary">
                            </div>
                        </div>
                    </div>
                </section>

                <hr class="border-gray-200 dark:border-gray-700" />

                <!-- Section 3: Tools -->
                <section aria-labelledby="tools-heading">
                    <h2 id="tools-heading" class="text-2xl font-bold text-text-default mb-6 flex items-center gap-2">
                        <i class="fas fa-tools text-accent"></i> Assisted Reading
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-base-bg rounded-xl border border-gray-200 dark:border-gray-700">
                            <div>
                                <span class="block font-bold text-text-default">Reading Guide</span>
                                <span class="text-sm text-text-secondary">Adds a horizontal guide line that follows your cursor.</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="page-mask-toggle" class="sr-only peer">
                                <div class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-7 after:w-7 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-base-bg rounded-xl border border-gray-200 dark:border-gray-700">
                            <div>
                                <span class="block font-bold text-text-default">Reduce Motion</span>
                                <span class="text-sm text-text-secondary">Minimizes animations and smooth scrolling effects.</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="page-motion-toggle" class="sr-only peer">
                                <div class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-7 after:w-7 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </section>

                <div class="pt-6">
                    <button id="page-reset-btn" class="w-full py-4 rounded-xl border-2 border-red-200 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 dark:border-red-900 dark:text-red-400 font-bold transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-undo"></i> Reset All Settings to Default
                    </button>
                </div>

            </div>
        </div>
    </div>

</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Sync Controls with Global State
        const settings = loadSettings(); // Uses function from header.php

        // 1. Theme Buttons
        const themeMap = { 'light': 'page-theme-light', 'dark': 'page-theme-dark', 'high-contrast': 'page-theme-contrast' };
        
        function updateThemeUI(activeTheme) {
            Object.values(themeMap).forEach(id => {
                document.getElementById(id).classList.remove('ring-4', 'ring-primary', 'ring-offset-2');
            });
            const activeId = themeMap[activeTheme];
            if(activeId) document.getElementById(activeId).classList.add('ring-4', 'ring-primary', 'ring-offset-2');
        }
        updateThemeUI(settings.theme);

        Object.entries(themeMap).forEach(([themeName, btnId]) => {
            document.getElementById(btnId).addEventListener('click', () => {
                const newSettings = loadSettings();
                newSettings.theme = themeName;
                saveSettings(newSettings);
                updateThemeUI(themeName);
            });
        });

        // 2. Font Family
        function updateFontUI(activeFont) {
            document.querySelectorAll('.page-font-selector').forEach(btn => {
                if(btn.dataset.setFont === activeFont) {
                    btn.classList.add('border-primary', 'bg-blue-50', 'dark:bg-blue-900/30');
                    btn.classList.remove('border-gray-200', 'dark:border-gray-700');
                } else {
                    btn.classList.remove('border-primary', 'bg-blue-50', 'dark:bg-blue-900/30');
                    btn.classList.add('border-gray-200', 'dark:border-gray-700');
                }
            });
        }
        updateFontUI(settings.fontFamily);

        document.querySelectorAll('.page-font-selector').forEach(btn => {
            btn.addEventListener('click', () => {
                const newSettings = loadSettings();
                newSettings.fontFamily = btn.dataset.setFont;
                saveSettings(newSettings);
                updateFontUI(newSettings.fontFamily);
            });
        });

        // 3. Range Sliders Generic Handler
        function bindSlider(id, key, displayId, unit = '', mapValue = (v) => v) {
            const slider = document.getElementById(id);
            const display = document.getElementById(displayId);
            
            if(!slider || !display) return;

            // Set Initial
            slider.value = settings[key] || (key === 'fontSize' ? 1.0 : 0); // fallback
            
            const updateDisplay = (val) => {
                let showVal = val;
                if(key === 'fontSize') showVal = Math.round(val * 100);
                if(key === 'wordSpacing' || key === 'letterSpacing') {
                    showVal = val == 0 ? 'Normal' : val + 'em';
                }
                display.innerText = showVal;
            };
            updateDisplay(slider.value);

            // Listeners
            slider.addEventListener('input', (e) => {
                const val = e.target.value;
                updateDisplay(val);
                // Apply immediately for visual feedback
                document.documentElement.style.setProperty(unit, val + (key.includes('Spacing') ? 'em' : (key === 'fontSize' ? 'rem' : '')));
            });

            slider.addEventListener('change', (e) => {
                const newSettings = loadSettings();
                newSettings[key] = e.target.value;
                saveSettings(newSettings);
            });
        }

        bindSlider('page-fs-slider', 'fontSize', 'page-fs-value', '--site-font-size');
        bindSlider('page-lh-slider', 'lineHeight', 'page-lh-value', '--site-line-height');
        bindSlider('page-ws-slider', 'wordSpacing', 'page-ws-value', '--site-word-spacing');
        bindSlider('page-ls-slider', 'letterSpacing', 'page-ls-value', '--site-letter-spacing');

        // 4. Toggles
        const maskToggle = document.getElementById('page-mask-toggle');
        maskToggle.checked = settings.readingMask;
        maskToggle.addEventListener('change', (e) => {
            const newSettings = loadSettings();
            newSettings.readingMask = e.target.checked;
            saveSettings(newSettings);
        });

        const motionToggle = document.getElementById('page-motion-toggle');
        motionToggle.checked = settings.reducedMotion;
        motionToggle.addEventListener('change', (e) => {
            const newSettings = loadSettings();
            newSettings.reducedMotion = e.target.checked;
            saveSettings(newSettings);
        });

        // 5. Reset
        document.getElementById('page-reset-btn').addEventListener('click', () => {
            if(confirm('Are you sure you want to reset all accessibility settings to default?')) {
                saveSettings(defaultSettings);
                window.location.reload();
            }
        });
    });
</script>

<?php include 'src/footer.php'; ?>