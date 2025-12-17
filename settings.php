<?php
$pageTitle       = "Accessibility Settings - Hesten's Learning";
$pageDescription = "Customize your learning experience with advanced accessibility tools, fonts, and themes.";
include 'src/header.php';
?>

<main id="main-content" class="container mx-auto px-4 py-12 mb-12">

    <header class="mb-10 text-center md:text-left animate-fade-in-up">
        <h1
            class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent mb-4">
            <i class="fas fa-sliders-h text-primary mr-3"></i> Accessibility & Preferences
        </h1>
        <p class="text-text-secondary max-w-2xl text-lg font-medium">
            Customize Hesten's Learning to match your unique needs. Your preferences are saved automatically.
        </p>
    </header>

    <div class="flex flex-col lg:flex-row gap-8">

        <!-- SETTINGS SIDEBAR (Navigation) -->
        <aside class="w-full lg:w-1/4 animate-fade-in-up" style="animation-delay: 0.1s;">
            <nav
                class="sticky top-24 bg-content-bg/80 backdrop-blur rounded-2xl shadow-xl p-6 border border-white/20 ring-1 ring-black/5">
                <ul class="space-y-3">
                    <li>
                        <a href="#visuals"
                            class="flex items-center p-3 rounded-xl hover:bg-primary/10 text-text-default font-bold transition-all hover:translate-x-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-eye"></i>
                            </div>
                            Visuals & Themes
                        </a>
                    </li>
                    <li>
                        <a href="#typography"
                            class="flex items-center p-3 rounded-xl hover:bg-primary/10 text-text-default font-bold transition-all hover:translate-x-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-font"></i>
                            </div>
                            Typography
                        </a>
                    </li>
                    <li>
                        <a href="#tools"
                            class="flex items-center p-3 rounded-xl hover:bg-primary/10 text-text-default font-bold transition-all hover:translate-x-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-teal-100 dark:bg-teal-900 text-teal-600 dark:text-teal-300 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-toolbox"></i>
                            </div>
                            Cognitive Tools
                        </a>
                    </li>
                    <li>
                        <a href="#data"
                            class="flex items-center p-3 rounded-xl hover:bg-primary/10 text-text-default font-bold transition-all hover:translate-x-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-rose-100 dark:bg-rose-900 text-rose-600 dark:text-rose-300 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-save"></i>
                            </div>
                            Data & Reset
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- MAIN SETTINGS AREA -->
        <div class="w-full lg:w-1/2 space-y-8">

            <!-- SECTION: VISUALS -->
            <section id="visuals"
                class="bg-content-bg/80 backdrop-blur rounded-3xl shadow-xl p-8 border border-white/20 scroll-mt-28 animate-fade-in-up"
                style="animation-delay: 0.2s;">
                <h2
                    class="text-2xl font-bold text-text-default mb-6 flex items-center border-b border-gray-200 dark:border-gray-700 pb-3">
                    Visuals & Themes
                </h2>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-text-secondary mb-4 uppercase tracking-wider">Color
                        Theme</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        <button onclick="updateGlobalSetting('theme', 'light')"
                            class="group relative p-4 rounded-2xl border-2 border-gray-200 hover:border-primary transition-all text-center bg-gray-50 text-gray-900 shadow-sm hover:shadow-md">
                            <i class="fas fa-sun text-3xl mb-3 text-yellow-500 block"></i>
                            <span class="font-bold">Light</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'dark')"
                            class="group relative p-4 rounded-2xl border-2 border-slate-700 hover:border-primary transition-all text-center bg-slate-900 text-white shadow-sm hover:shadow-md">
                            <i class="fas fa-moon text-3xl mb-3 text-indigo-400 block"></i>
                            <span class="font-bold">Dark</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'midnight')"
                            class="group relative p-4 rounded-2xl border-2 border-blue-900 hover:border-blue-400 transition-all text-center bg-[#011627] text-[#D6DEEB] shadow-sm hover:shadow-md">
                            <i class="fas fa-star text-3xl mb-3 text-blue-300 block"></i>
                            <span class="font-bold">Midnight</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-blue-400 scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'sepia')"
                            class="group relative p-4 rounded-2xl border-2 border-amber-200 hover:border-amber-600 transition-all text-center bg-[#F4ECD8] text-[#433422] shadow-sm hover:shadow-md">
                            <i class="fas fa-coffee text-3xl mb-3 text-amber-700 block"></i>
                            <span class="font-bold">Sepia</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-amber-600 scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'high-contrast')"
                            class="group relative p-4 rounded-2xl border-2 border-black hover:border-yellow-400 transition-all text-center bg-black text-yellow-300 shadow-sm hover:shadow-md">
                            <i class="fas fa-adjust text-3xl mb-3 block"></i>
                            <span class="font-bold">Contrast</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-yellow-400 scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>
                    </div>
                </div>

                <div class="mb-6 bg-base-bg p-6 rounded-2xl">
                    <label for="saturation-slider"
                        class="flex justify-between text-sm font-bold text-text-default mb-4">
                        <span>Color Saturation</span>
                        <span id="page-saturation-display"
                            class="bg-primary text-white px-2 py-0.5 rounded text-xs">100%</span>
                    </label>
                    <input type="range" id="saturation-slider" min="0" max="200" step="10"
                        class="w-full h-3 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-secondary transition-all"
                        oninput="updateGlobalSetting('saturation', this.value); document.getElementById('page-saturation-display').innerText = this.value + '%'">
                    <div class="flex justify-between text-xs text-text-secondary mt-2 font-medium">
                        <span>Grayscale (0%)</span>
                        <span>Normal</span>
                        <span>Vivid (200%)</span>
                    </div>
                </div>
            </section>

            <!-- SECTION: TYPOGRAPHY -->
            <section id="typography"
                class="bg-content-bg/80 backdrop-blur rounded-3xl shadow-xl p-8 border border-white/20 scroll-mt-28 animate-fade-in-up"
                style="animation-delay: 0.3s;">
                <h2
                    class="text-2xl font-bold text-text-default mb-6 flex items-center border-b border-gray-200 dark:border-gray-700 pb-3">
                    Typography
                </h2>

                <div class="mb-8">
                    <label
                        class="block text-sm font-bold text-text-secondary mb-4 uppercase tracking-wider">Typeface</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <button onclick="updateGlobalSetting('fontFamily', 'Outfit')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Outfit</span>
                            <span class="text-xs text-text-secondary">Modern, clean, and friendly.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Inter')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Inter', sans-serif">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Inter</span>
                            <span class="text-xs text-text-secondary">Standard geometric sans-serif.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Lexend')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Lexend', sans-serif">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Lexend</span>
                            <span class="text-xs text-text-secondary">Proven to improve reading speed.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Open Dyslexic')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Open Dyslexic', sans-serif">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Open Dyslexic</span>
                            <span class="text-xs text-text-secondary">Weighted bottoms for dyslexia.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Comic Neue')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Comic Neue', cursive">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Comic Neue</span>
                            <span class="text-xs text-text-secondary">Playful and easy to read.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Roboto Mono')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Roboto Mono', monospace">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Monospace</span>
                            <span class="text-xs text-text-secondary">Good for coding and differentiation.</span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-base-bg p-5 rounded-2xl">
                        <label class="block text-sm font-bold text-text-default mb-3">Text Size</label>
                        <input type="range" id="page-size-slider" min="0.8" max="2.0" step="0.1"
                            class="w-full accent-primary h-2 bg-gray-300 rounded-lg appearance-none cursor-pointer"
                            oninput="updateGlobalSetting('fontSize', this.value)">
                    </div>
                    <div class="bg-base-bg p-5 rounded-2xl">
                        <label class="block text-sm font-bold text-text-default mb-3">Line Height</label>
                        <input type="range" id="page-line-slider" min="1.0" max="2.5" step="0.1"
                            class="w-full accent-primary h-2 bg-gray-300 rounded-lg appearance-none cursor-pointer"
                            oninput="updateGlobalSetting('lineHeight', this.value)">
                    </div>
                    <div class="bg-base-bg p-5 rounded-2xl">
                        <label class="block text-sm font-bold text-text-default mb-3">Letter Spacing</label>
                        <input type="range" id="page-letter-slider" min="0" max="0.3" step="0.01"
                            class="w-full accent-primary h-2 bg-gray-300 rounded-lg appearance-none cursor-pointer"
                            oninput="updateGlobalSetting('letterSpacing', this.value)">
                    </div>
                    <div class="bg-base-bg p-5 rounded-2xl">
                        <label class="block text-sm font-bold text-text-default mb-3">Word Spacing</label>
                        <input type="range" id="page-word-slider" min="0" max="0.5" step="0.05"
                            class="w-full accent-primary h-2 bg-gray-300 rounded-lg appearance-none cursor-pointer"
                            oninput="updateGlobalSetting('wordSpacing', this.value)">
                    </div>
                </div>
            </section>

            <!-- SECTION: TOOLS -->
            <section id="tools"
                class="bg-content-bg/80 backdrop-blur rounded-3xl shadow-xl p-8 border border-white/20 scroll-mt-28 animate-fade-in-up"
                style="animation-delay: 0.4s;">
                <h2
                    class="text-2xl font-bold text-text-default mb-6 flex items-center border-b border-gray-200 dark:border-gray-700 pb-3">
                    Cognitive Tools
                </h2>

                <div class="space-y-4">
                    <!-- Component: Toggle Card -->
                    <div
                        class="flex items-center justify-between p-5 bg-base-bg rounded-2xl transition-colors hover:bg-gray-100 dark:hover:bg-gray-800">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center text-xl">
                                <i class="fas fa-align-justify"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Reading Guide</span>
                                <span class="text-sm text-text-secondary">A focus bar that follows your mouse.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-mask-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('readingMask', this.checked)">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Large Cursor -->
                    <div
                        class="flex items-center justify-between p-5 bg-base-bg rounded-2xl transition-colors hover:bg-gray-100 dark:hover:bg-gray-800">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-600 flex items-center justify-center text-xl">
                                <i class="fas fa-mouse-pointer"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Extra Large Cursor</span>
                                <span class="text-sm text-text-secondary">Easier to track on screen.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-cursor-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('cursorSize', this.checked ? 'large' : 'normal')">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Hide Images -->
                    <div
                        class="flex items-center justify-between p-5 bg-base-bg rounded-2xl transition-colors hover:bg-gray-100 dark:hover:bg-gray-800">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-rose-100 dark:bg-rose-900/30 text-rose-600 flex items-center justify-center text-xl">
                                <i class="fas fa-image"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Hide Images</span>
                                <span class="text-sm text-text-secondary">Remove visual distractions.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-images-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('hideImages', this.checked)">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>
                </div>
            </section>

            <!-- SECTION: DATA -->
            <section id="data"
                class="bg-content-bg/80 backdrop-blur rounded-3xl shadow-xl p-8 border border-white/20 scroll-mt-28 animate-fade-in-up"
                style="animation-delay: 0.5s;">
                <h2
                    class="text-2xl font-bold text-text-default mb-6 flex items-center border-b border-gray-200 dark:border-gray-700 pb-3">
                    Data & Reset
                </h2>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button onclick="localStorage.removeItem('hl_accessibility_settings'); window.location.reload();"
                        class="flex-1 bg-red-100 hover:bg-red-200 text-red-700 font-bold py-4 px-6 rounded-2xl transition-colors border border-red-200 shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-undo"></i> Reset to Defaults
                    </button>
                    <!-- Simulated Export feature -->
                    <button onclick="exportSettings()"
                        class="flex-1 bg-base-bg hover:bg-gray-200 text-text-default font-bold py-4 px-6 rounded-2xl transition-colors border border-gray-300 dark:border-gray-600 shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-download"></i> Export Settings
                    </button>
                </div>
            </section>

        </div>

        <!-- LIVE PREVIEW SIDEBAR (Desktop) -->
        <aside class="hidden lg:block w-1/4 animate-fade-in-up" style="animation-delay: 0.6s;">
            <div class="sticky top-24">
                <div class="bg-content-bg p-8 rounded-3xl shadow-2xl border border-primary/20 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-primary to-accent"></div>
                    <h3
                        class="text-xs font-bold text-primary uppercase tracking-widest mb-6 border-b border-gray-100 pb-2">
                        Live Preview</h3>
                    <div class="space-y-6">
                        <h4 class="text-3xl font-bold text-text-default leading-tight">Alligators and crocodiles are
                            distinct.</h4>
                        <p class="text-text-secondary leading-relaxed">
                            This text demonstrates your current typography settings. Notice how the spacing, font
                            weight, and size change to help you read better.
                        </p>
                        <div class="p-4 bg-primary/5 rounded-xl border border-primary/10">
                            <a href="#" class="text-primary hover:underline font-bold flex items-center gap-2"><i
                                    class="fas fa-link"></i> Sample Link</a>
                        </div>
                    </div>
                </div>
                <div class="mt-6 text-center text-text-secondary text-sm">
                    <i class="fas fa-check-circle text-green-500 mr-1"></i> Changes saved automatically
                </div>
            </div>
        </aside>
    </div>

</main>

<script>
    // --- SETTINGS PAGE SYNC LOGIC ---

    function syncPageUI(s) {
        if (!s) s = loadSettings(); // Default to global load if not provided

        // Sliders
        if (document.getElementById('saturation-slider')) {
            document.getElementById('saturation-slider').value = s.saturation || 100;
            document.getElementById('page-saturation-display').innerText = (s.saturation || 100) + '%';
        }
        if (document.getElementById('page-size-slider')) document.getElementById('page-size-slider').value = s.fontSize;
        if (document.getElementById('page-line-slider')) document.getElementById('page-line-slider').value = s.lineHeight;
        if (document.getElementById('page-letter-slider')) document.getElementById('page-letter-slider').value = s.letterSpacing || 0;
        if (document.getElementById('page-word-slider')) document.getElementById('page-word-slider').value = s.wordSpacing || 0;

        // Toggles
        if (document.getElementById('page-mask-toggle')) document.getElementById('page-mask-toggle').checked = !!s.readingMask;
        if (document.getElementById('page-cursor-toggle')) document.getElementById('page-cursor-toggle').checked = (s.cursorSize === 'large');
        if (document.getElementById('page-images-toggle')) document.getElementById('page-images-toggle').checked = !!s.hideImages;
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
        syncPageUI();

        // Listen for internal updates (from header a11y panel)
        window.addEventListener('settings-changed', (e) => {
            syncPageUI(e.detail);
        });
    });
</script>

<?php include 'src/footer.php'; ?>