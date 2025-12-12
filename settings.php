<?php
$pageTitle       = "Accessibility Settings - Hesten's Learning";
$pageDescription = "Customize your learning experience with advanced accessibility tools, fonts, and themes.";
include 'src/header.php';
?>

<main id="main-content" class="container mx-auto px-4 py-12 mb-12">

    <header class="mb-10 text-center md:text-left">
        <h1 class="text-4xl font-bold text-text-default mb-4">
            <i class="fas fa-sliders-h text-primary mr-3"></i> Accessibility & Preferences
        </h1>
        <p class="text-text-secondary max-w-2xl text-lg">
            Customize Hesten's Learning to match your needs. Settings are saved automatically to your browser.
        </p>
    </header>

    <div class="flex flex-col lg:flex-row gap-8">

        <!-- SETTINGS SIDEBAR (Navigation) -->
        <aside class="w-full lg:w-1/4">
            <nav
                class="sticky top-24 bg-content-bg rounded-xl shadow-md p-4 border border-gray-200 dark:border-gray-700">
                <ul class="space-y-2">
                    <li>
                        <a href="#visuals"
                            class="flex items-center p-3 rounded-lg hover:bg-base-bg text-text-default font-bold transition-colors">
                            <i class="fas fa-eye w-8 text-center text-primary"></i> Visuals & Themes
                        </a>
                    </li>
                    <li>
                        <a href="#typography"
                            class="flex items-center p-3 rounded-lg hover:bg-base-bg text-text-default font-bold transition-colors">
                            <i class="fas fa-font w-8 text-center text-primary"></i> Typography
                        </a>
                    </li>
                    <li>
                        <a href="#tools"
                            class="flex items-center p-3 rounded-lg hover:bg-base-bg text-text-default font-bold transition-colors">
                            <i class="fas fa-toolbox w-8 text-center text-primary"></i> Cognitive Tools
                        </a>
                    </li>
                    <li>
                        <a href="#data"
                            class="flex items-center p-3 rounded-lg hover:bg-base-bg text-text-default font-bold transition-colors">
                            <i class="fas fa-save w-8 text-center text-primary"></i> Data & Reset
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- MAIN SETTINGS AREA -->
        <div class="w-full lg:w-1/2 space-y-8">

            <!-- SECTION: VISUALS -->
            <section id="visuals"
                class="bg-content-bg rounded-2xl shadow-lg p-8 border border-gray-200 dark:border-gray-700 scroll-mt-24">
                <h2
                    class="text-2xl font-bold text-text-default mb-6 flex items-center border-b border-gray-200 dark:border-gray-700 pb-3">
                    Visuals & Themes
                </h2>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-text-secondary mb-3">Color Theme</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        <button onclick="updateSetting('theme', 'light')"
                            class="theme-btn group relative p-4 rounded-xl border-2 border-gray-200 hover:border-primary transition-all text-center bg-gray-50 text-gray-900"
                            data-val="light">
                            <i class="fas fa-sun text-2xl mb-2 text-yellow-500"></i>
                            <span class="block font-bold">Light</span>
                            <div
                                class="absolute inset-0 border-4 border-primary rounded-xl opacity-0 scale-95 transition-all selected-ring">
                            </div>
                        </button>

                        <button onclick="updateSetting('theme', 'dark')"
                            class="theme-btn group relative p-4 rounded-xl border-2 border-gray-600 hover:border-primary transition-all text-center bg-slate-900 text-white"
                            data-val="dark">
                            <i class="fas fa-moon text-2xl mb-2 text-indigo-400"></i>
                            <span class="block font-bold">Dark</span>
                            <div
                                class="absolute inset-0 border-4 border-primary rounded-xl opacity-0 scale-95 transition-all selected-ring">
                            </div>
                        </button>

                        <button onclick="updateSetting('theme', 'high-contrast')"
                            class="theme-btn group relative p-4 rounded-xl border-2 border-black hover:border-yellow-400 transition-all text-center bg-black text-yellow-300"
                            data-val="high-contrast">
                            <i class="fas fa-adjust text-2xl mb-2"></i>
                            <span class="block font-bold">Contrast</span>
                            <div
                                class="absolute inset-0 border-4 border-yellow-400 rounded-xl opacity-0 scale-95 transition-all selected-ring">
                            </div>
                        </button>

                        <button onclick="updateSetting('theme', 'sepia')"
                            class="theme-btn group relative p-4 rounded-xl border-2 border-amber-200 hover:border-amber-600 transition-all text-center bg-[#F4ECD8] text-[#433422]"
                            data-val="sepia">
                            <i class="fas fa-coffee text-2xl mb-2 text-amber-700"></i>
                            <span class="block font-bold">Sepia</span>
                            <div
                                class="absolute inset-0 border-4 border-amber-600 rounded-xl opacity-0 scale-95 transition-all selected-ring">
                            </div>
                        </button>

                        <button onclick="updateSetting('theme', 'midnight')"
                            class="theme-btn group relative p-4 rounded-xl border-2 border-blue-900 hover:border-blue-400 transition-all text-center bg-[#011627] text-[#D6DEEB]"
                            data-val="midnight">
                            <i class="fas fa-star text-2xl mb-2 text-blue-300"></i>
                            <span class="block font-bold">Midnight</span>
                            <div
                                class="absolute inset-0 border-4 border-blue-400 rounded-xl opacity-0 scale-95 transition-all selected-ring">
                            </div>
                        </button>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="saturation-slider" class="block text-sm font-bold text-text-default mb-2">Color
                        Saturation: <span id="saturation-display">100</span>%</label>
                    <input type="range" id="saturation-slider" min="0" max="200" step="10"
                        class="w-full h-3 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary"
                        oninput="updateSetting('saturation', this.value)">
                    <div class="flex justify-between text-xs text-text-secondary mt-1">
                        <span>Grayscale (0%)</span>
                        <span>Normal (100%)</span>
                        <span>Vivid (200%)</span>
                    </div>
                </div>
            </section>

            <!-- SECTION: TYPOGRAPHY -->
            <section id="typography"
                class="bg-content-bg rounded-2xl shadow-lg p-8 border border-gray-200 dark:border-gray-700 scroll-mt-24">
                <h2
                    class="text-2xl font-bold text-text-default mb-6 flex items-center border-b border-gray-200 dark:border-gray-700 pb-3">
                    Typography
                </h2>

                <div class="mb-8">
                    <label for="font-family-select"
                        class="block text-sm font-bold text-text-default mb-2">Typeface</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <button onclick="updateSetting('fontFamily', 'Inter')"
                            class="font-btn p-3 border rounded text-left hover:bg-base-bg data-[active=true]:ring-2 data-[active=true]:ring-primary data-[active=true]:bg-blue-50 dark:data-[active=true]:bg-blue-900/20"
                            data-font="Inter" style="font-family: 'Inter', sans-serif">
                            <span class="font-bold block">Inter</span>
                            <span class="text-xs text-text-secondary">Standard, clean sans-serif.</span>
                        </button>
                        <button onclick="updateSetting('fontFamily', 'Lexend')"
                            class="font-btn p-3 border rounded text-left hover:bg-base-bg data-[active=true]:ring-2 data-[active=true]:ring-primary data-[active=true]:bg-blue-50 dark:data-[active=true]:bg-blue-900/20"
                            data-font="Lexend" style="font-family: 'Lexend', sans-serif">
                            <span class="font-bold block">Lexend</span>
                            <span class="text-xs text-text-secondary">Designed for reading proficiency.</span>
                        </button>
                        <button onclick="updateSetting('fontFamily', 'Open Dyslexic')"
                            class="font-btn p-3 border rounded text-left hover:bg-base-bg data-[active=true]:ring-2 data-[active=true]:ring-primary data-[active=true]:bg-blue-50 dark:data-[active=true]:bg-blue-900/20"
                            data-font="Open Dyslexic" style="font-family: 'Open Dyslexic', sans-serif">
                            <span class="font-bold block">Open Dyslexic</span>
                            <span class="text-xs text-text-secondary">Weighted bottoms for dyslexia.</span>
                        </button>
                        <button onclick="updateSetting('fontFamily', 'Comic Neue')"
                            class="font-btn p-3 border rounded text-left hover:bg-base-bg data-[active=true]:ring-2 data-[active=true]:ring-primary data-[active=true]:bg-blue-50 dark:data-[active=true]:bg-blue-900/20"
                            data-font="Comic Neue" style="font-family: 'Comic Neue', cursive">
                            <span class="font-bold block">Comic Neue</span>
                            <span class="text-xs text-text-secondary">Informal, highly readable.</span>
                        </button>
                        <button onclick="updateSetting('fontFamily', 'Merriweather')"
                            class="font-btn p-3 border rounded text-left hover:bg-base-bg data-[active=true]:ring-2 data-[active=true]:ring-primary data-[active=true]:bg-blue-50 dark:data-[active=true]:bg-blue-900/20"
                            data-font="Merriweather" style="font-family: 'Merriweather', serif">
                            <span class="font-bold block">Merriweather</span>
                            <span class="text-xs text-text-secondary">Classic serif for long reading.</span>
                        </button>
                        <button onclick="updateSetting('fontFamily', 'Roboto Mono')"
                            class="font-btn p-3 border rounded text-left hover:bg-base-bg data-[active=true]:ring-2 data-[active=true]:ring-primary data-[active=true]:bg-blue-50 dark:data-[active=true]:bg-blue-900/20"
                            data-font="Roboto Mono" style="font-family: 'Roboto Mono', monospace">
                            <span class="font-bold block">Monospace</span>
                            <span class="text-xs text-text-secondary">Good for coding and differentiation.</span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-text-default mb-2">Text Size</label>
                        <input type="range" id="size-slider" min="0.8" max="2.0" step="0.1"
                            class="w-full accent-primary" oninput="updateSetting('fontSize', this.value)">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-text-default mb-2">Line Height</label>
                        <input type="range" id="line-slider" min="1.0" max="2.5" step="0.1"
                            class="w-full accent-primary" oninput="updateSetting('lineHeight', this.value)">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-text-default mb-2">Letter Spacing</label>
                        <input type="range" id="letter-slider" min="0" max="0.3" step="0.01"
                            class="w-full accent-primary" oninput="updateSetting('letterSpacing', this.value)">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-text-default mb-2">Word Spacing</label>
                        <input type="range" id="word-slider" min="0" max="0.5" step="0.05" class="w-full accent-primary"
                            oninput="updateSetting('wordSpacing', this.value)">
                    </div>
                </div>
            </section>

            <!-- SECTION: TOOLS -->
            <section id="tools"
                class="bg-content-bg rounded-2xl shadow-lg p-8 border border-gray-200 dark:border-gray-700 scroll-mt-24">
                <h2
                    class="text-2xl font-bold text-text-default mb-6 flex items-center border-b border-gray-200 dark:border-gray-700 pb-3">
                    Cognitive Tools
                </h2>

                <div class="space-y-6">
                    <!-- Reading Guide -->
                    <div class="flex items-center justify-between p-4 bg-base-bg rounded-xl">
                        <div>
                            <span class="font-bold text-text-default block">Reading Guide</span>
                            <span class="text-sm text-text-secondary">A horizontal bar to help focus on lines of
                                text.</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="mask-toggle" class="sr-only peer"
                                onchange="updateSetting('readingMask', this.checked)">
                            <div
                                class="w-14 h-7 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Link Highlights -->
                    <div class="flex items-center justify-between p-4 bg-base-bg rounded-xl">
                        <div>
                            <span class="font-bold text-text-default block">Highlight Links</span>
                            <span class="text-sm text-text-secondary">Add a yellow background and underline to all
                                links.</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="link-toggle" class="sr-only peer"
                                onchange="updateSetting('linkHighlight', this.checked)">
                            <div
                                class="w-14 h-7 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Reduced Motion -->
                    <div class="flex items-center justify-between p-4 bg-base-bg rounded-xl">
                        <div>
                            <span class="font-bold text-text-default block">Reduce Motion</span>
                            <span class="text-sm text-text-secondary">Stop animations and smooth scrolling.</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="motion-toggle" class="sr-only peer"
                                onchange="updateSetting('reducedMotion', this.checked)">
                            <div
                                class="w-14 h-7 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Large Cursor -->
                    <div class="flex items-center justify-between p-4 bg-base-bg rounded-xl">
                        <div>
                            <span class="font-bold text-text-default block">Larger Cursor</span>
                            <span class="text-sm text-text-secondary">Make the mouse cursor larger and easier to
                                see.</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="cursor-toggle" class="sr-only peer"
                                onchange="updateSetting('cursorSize', this.checked ? 'large' : 'normal')">
                            <div
                                class="w-14 h-7 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Hide Images -->
                    <div class="flex items-center justify-between p-4 bg-base-bg rounded-xl">
                        <div>
                            <span class="font-bold text-text-default block">Hide Images</span>
                            <span class="text-sm text-text-secondary">Hide photos to reduce distraction (shows
                                text).</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="images-toggle" class="sr-only peer"
                                onchange="updateSetting('hideImages', this.checked)">
                            <div
                                class="w-14 h-7 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>
                </div>
            </section>

            <!-- SECTION: DATA -->
            <section id="data"
                class="bg-content-bg rounded-2xl shadow-lg p-8 border border-gray-200 dark:border-gray-700 scroll-mt-24">
                <h2
                    class="text-2xl font-bold text-text-default mb-6 flex items-center border-b border-gray-200 dark:border-gray-700 pb-3">
                    Data & Reset
                </h2>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button onclick="resetSettings()"
                        class="flex-1 bg-red-100 hover:bg-red-200 text-red-700 font-bold py-4 px-6 rounded-xl transition-colors border border-red-200">
                        <i class="fas fa-undo mr-2"></i> Reset to Defaults
                    </button>
                    <!-- Simulated Export feature -->
                    <button onclick="exportSettings()"
                        class="flex-1 bg-base-bg hover:bg-gray-200 text-text-default font-bold py-4 px-6 rounded-xl transition-colors border border-gray-300 dark:border-gray-600">
                        <i class="fas fa-download mr-2"></i> Export Settings
                    </button>
                </div>
            </section>

        </div>

        <!-- LIVE PREVIEW SIDEBAR (Desktop) -->
        <aside class="hidden lg:block w-1/4">
            <div class="sticky top-24">
                <div class="bg-content-bg p-6 rounded-2xl shadow-xl border border-primary/20">
                    <h3 class="text-sm font-bold text-primary uppercase tracking-wider mb-4">Live Preview</h3>
                    <div class="space-y-4">
                        <h4 class="text-2xl font-bold text-text-default leading-tight">The quick brown fox jumps over
                            the lazy dog.</h4>
                        <p class="text-text-secondary">
                            This text demonstrates your current typography settings. Adjust line height, spacing, and
                            font size to see changes instantly.
                        </p>
                        <div class="p-4 bg-base-bg rounded-lg border border-gray-200 dark:border-gray-700">
                            <a href="#" class="text-primary hover:underline">This is a sample link</a>
                        </div>
                        <div
                            class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 text-xs text-text-secondary">
                            Changes are saved automatically.
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>

</main>

<script>
    // --- SETTINGS PAGE LOGIC ---

    function updateSetting(key, value) {
        // Get fresh copy from localStorage or memory (global function from header)
        const settings = loadSettings();

        // Update specific key
        settings[key] = value;

        // Save & Apply Global
        saveSettings(settings);

        // Update Local UI (Visual feedback)
        updateUIState(settings);
    }

    function updateUIState(settings) {
        // Update Theme Buttons Ring
        document.querySelectorAll('.theme-btn').forEach(btn => {
            const ring = btn.querySelector('.selected-ring');
            if (btn.dataset.val === settings.theme) {
                ring.classList.remove('opacity-0', 'scale-95');
            } else {
                ring.classList.add('opacity-0', 'scale-95');
            }
        });

        // Update Font Buttons
        document.querySelectorAll('.font-btn').forEach(btn => {
            if (btn.dataset.font === settings.fontFamily) {
                btn.setAttribute('data-active', 'true');
                btn.classList.add('ring-2', 'ring-primary', 'bg-blue-50', 'dark:bg-blue-900/20');
            } else {
                btn.setAttribute('data-active', 'false');
                btn.classList.remove('ring-2', 'ring-primary', 'bg-blue-50', 'dark:bg-blue-900/20');
            }
        });

        // Update Sliders
        if (document.getElementById('saturation-slider')) {
            document.getElementById('saturation-slider').value = settings.saturation || 100;
            document.getElementById('saturation-display').innerText = settings.saturation || 100;
        }
        if (document.getElementById('size-slider')) document.getElementById('size-slider').value = settings.fontSize;
        if (document.getElementById('line-slider')) document.getElementById('line-slider').value = settings.lineHeight;
        if (document.getElementById('letter-slider')) document.getElementById('letter-slider').value = settings.letterSpacing || 0;
        if (document.getElementById('word-slider')) document.getElementById('word-slider').value = settings.wordSpacing || 0;

        // Update Toggles
        if (document.getElementById('mask-toggle')) document.getElementById('mask-toggle').checked = settings.readingMask;
        if (document.getElementById('link-toggle')) document.getElementById('link-toggle').checked = settings.linkHighlight;
        if (document.getElementById('motion-toggle')) document.getElementById('motion-toggle').checked = settings.reducedMotion;
        if (document.getElementById('cursor-toggle')) document.getElementById('cursor-toggle').checked = (settings.cursorSize === 'large');
        if (document.getElementById('images-toggle')) document.getElementById('images-toggle').checked = settings.hideImages;
    }

    function resetSettings() {
        if (confirm('Are you sure you want to reset all accessibility settings to default?')) {
            // defaultSettings is global from header.php
            saveSettings(defaultSettings);
            window.location.reload();
        }
    }

    function exportSettings() {
        const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(loadSettings()));
        const downloadAnchorNode = document.createElement('a');
        downloadAnchorNode.setAttribute("href", dataStr);
        downloadAnchorNode.setAttribute("download", "hesten-settings.json");
        document.body.appendChild(downloadAnchorNode);
        downloadAnchorNode.click();
        downloadAnchorNode.remove();
        alert('Settings downloaded as hesten-settings.json');
    }

    // Initialize UI on Load
    document.addEventListener('DOMContentLoaded', () => {
        updateUIState(loadSettings());
    });
</script>

<?php include 'src/footer.php'; ?>