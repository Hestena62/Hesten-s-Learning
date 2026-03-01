<!-- Toast Container -->
<div id="toast-container" class="fixed top-24 right-6 z-[100] flex flex-col gap-3 pointer-events-none"></div>

<!-- Offline Indicator -->
<div id="offline-indicator"
    class="fixed bottom-6 left-6 z-[60] transform -translate-x-24 opacity-0 transition-all duration-500 pointer-events-none">
    <div class="bg-red-600 text-white px-4 py-2 rounded-full shadow-2xl flex items-center gap-2 text-sm font-bold">
        <i class="fas fa-wifi-slash"></i>
        <span>You are Offline</span>
    </div>
</div>

<!-- FOOTER -->
<footer
    class="mt-auto bg-slate-900 text-slate-300 relative overflow-hidden font-sans border-t border-slate-800/50 w-full print:hidden">
    <!-- Decoration -->
    <div
        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 shadow-[0_0_20px_rgba(79,70,229,0.5)]">
    </div>
    <div
        class="absolute -top-[400px] -right-[400px] w-[800px] h-[800px] bg-blue-600/10 rounded-full blur-[100px] pointer-events-none overflow-hidden">
    </div>

    <div class="container mx-auto px-6 py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Column 1: About -->
            <div class="space-y-6">
                <h4
                    class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-90">
                    <i class="fas fa-graduation-cap text-blue-500"></i> About
                </h4>
                <div class="flex items-center gap-3 group">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-900/20 group-hover:rotate-6 transition-transform duration-300">
                        <span class="text-white font-bold text-xl font-serif">H</span>
                    </div>
                    <div class="flex flex-col">
                        <span
                            class="text-lg font-bold text-white tracking-tight leading-none group-hover:text-blue-400 transition-colors">Hesten's
                            Learning</span>
                        <span class="text-[10px] text-slate-500 uppercase tracking-widest font-semibold mt-1">Education
                            for
                            All</span>
                    </div>
                </div>
                <p class="text-slate-400 leading-relaxed text-sm">
                    Empowering students with learning disabilities through
                    personalized learning experiences.
                    <a href="/about.php"
                        class="text-blue-400 hover:text-blue-300 underline decoration-blue-500/30 hover:decoration-blue-300">Learn
                        more</a>
                </p>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h4
                    class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-90">
                    <i class="fas fa-link text-teal-500"></i> Quick Links
                </h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li>
                        <a href="/curriculum.php"
                            class="text-slate-400 hover:text-teal-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-book text-slate-600 group-hover:text-teal-500 transition-colors"></i>
                            Curriculum</a>
                    </li>
                    <li>
                        <a href="/research"
                            class="text-slate-400 hover:text-teal-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-flask text-slate-600 group-hover:text-teal-500 transition-colors"></i>
                            Research</a>
                    </li>
                    <li>
                        <a href="/library"
                            class="text-slate-400 hover:text-teal-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-book-open text-slate-600 group-hover:text-teal-500 transition-colors"></i>
                            Library</a>
                    </li>
                    <li>
                        <a href="/help-center.php"
                            class="text-slate-400 hover:text-teal-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-question-circle text-slate-600 group-hover:text-teal-500 transition-colors"></i>
                            Help Center</a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Support -->
            <div>
                <h4
                    class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-90">
                    <i class="fas fa-hand-holding-heart text-purple-500"></i> Support
                </h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li>
                        <a href="/contact.php"
                            class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-envelope text-slate-600 group-hover:text-purple-500 transition-colors"></i>
                            Contact Us</a>
                    </li>
                    <li>
                        <a href="/students.php"
                            class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-home text-slate-600 group-hover:text-purple-500 transition-colors"></i>
                            For Students</a>
                    </li>
                    <li>
                        <a href="/parents.php"
                            class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-users text-slate-600 group-hover:text-purple-500 transition-colors"></i>
                            For Parents</a>
                    </li>
                    <li>
                        <a href="/teachers.php"
                            class="text-slate-400 hover:text-purple-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-chalkboard-teacher text-slate-600 group-hover:text-purple-500 transition-colors"></i>
                            For Teachers</a>
                    </li>
                </ul>
            </div>

            <!-- Column 4: Legal -->
            <div>
                <h4
                    class="text-white font-bold text-lg mb-6 flex items-center gap-2 uppercase tracking-wide text-sm opacity-90">
                    <i class="fas fa-balance-scale text-rose-500"></i> Legal &
                    Settings
                </h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li>
                        <a href="/privacy-policy.php"
                            class="text-slate-400 hover:text-rose-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-shield-alt text-slate-600 group-hover:text-rose-500 transition-colors"></i>
                            Privacy Policy</a>
                    </li>
                    <li>
                        <a href="/terms-of-use.php"
                            class="text-slate-400 hover:text-rose-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-file-contract text-slate-600 group-hover:text-rose-500 transition-colors"></i>
                            Terms of Use</a>
                    </li>
                    <li>
                        <a href="/settings.php"
                            class="text-slate-400 hover:text-rose-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-universal-access text-slate-600 group-hover:text-rose-500 transition-colors"></i>
                            Accessibility</a>
                    </li>
                    <li>
                        <a href="/about.php"
                            class="text-slate-400 hover:text-rose-400 transition-colors flex items-center gap-3 group"><i
                                class="fas fa-info-circle text-slate-600 group-hover:text-rose-500 transition-colors"></i>
                            About Us</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent my-10"></div>

        <div class="flex flex-col md:flex-row justify-between items-center gap-6 text-sm text-slate-500">
            <div class="text-center md:text-left space-y-2">
                <p>
                    &copy; <span id="year">2025</span>
                    <span class="text-slate-300 font-semibold">Hesten's Learning</span>. All rights reserved. | Made
                    with
                    <i class="fas fa-heart text-red-500 animate-pulse mx-1"></i> for
                    education
                </p>
                <p class="text-xs">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">Hesten's Learning</a>
                    by
                    <a href="/about-me.php" class="text-slate-400 hover:text-white transition-colors">Hesten Allison</a>
                    is licensed under
                    <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/?ref=chooser-v1" target="_blank"
                        rel="license noopener noreferrer"
                        class="inline-flex items-center gap-1 text-slate-400 hover:text-white transition-colors underline decoration-slate-600 hover:decoration-white underline-offset-2">
                        CC BY-NC-SA 4.0
                        <img style="height: 16px !important; margin-left: 3px; vertical-align: text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt="" />
                        <img style="height: 16px !important; margin-left: 3px; vertical-align: text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt="" />
                        <img style="height: 16px !important; margin-left: 3px; vertical-align: text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1" alt="" />
                        <img style="height: 16px !important; margin-left: 3px; vertical-align: text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1" alt="" />
                    </a>
                </p>
            </div>

            <div class="flex flex-wrap justify-center items-center gap-6">
                <div class="gtranslate_wrapper"></div>
                <a href="https://www.buymeacoffee.com/hestena62l" target="_blank" rel="noopener noreferrer"
                    class="group relative inline-flex items-center gap-2 bg-[#FFDD00] text-black px-5 py-2.5 rounded-full font-bold font-['Cookie',cursive] text-lg hover:bg-[#ffe44d] transition-all shadow-lg hover:shadow-[#FFDD00]/30 transform hover:-translate-y-1 font-handwriting">
                    <img src="https://cdn.buymeacoffee.com/buttons/bmc-new-btn-logo.svg" alt="" class="h-5 w-5"
                        loading="lazy" />
                    <span>Buy me a coffee</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Global Modals -->
<div id="message-box" class="fixed inset-0 bg-black/75 backdrop-blur-sm hidden items-center justify-center z-[100]"
    role="alertdialog" aria-modal="true" aria-labelledby="message-title">
    <div
        class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-sm w-full text-center border border-gray-200 dark:border-gray-700">
        <h4 id="message-title" class="text-xl font-bold mb-4 text-primary">Notification</h4>
        <p id="message-text" class="mb-6 text-text-default">Message content.</p>
        <button id="message-ok-button"
            class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary"
            type="button">OK</button>
    </div>
</div>

<!-- GTranslate -->
<script>
    window.gtranslateSettings = {
        default_language: "en",
        native_language_names: true,
        wrapper_selector: ".gtranslate_wrapper",
        flag_style: "3d",
        alt_flags: {
            en: "usa"
        }
    };
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>

<!-- Footer Logic -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const y = document.getElementById("year");
        if (y) y.textContent = new Date().getFullYear();
    });

    // Helper: Message Box
    window.showMessageBox = function (msg) {
        const b = document.getElementById("message-box");
        if (b) {
            document.getElementById("message-text").textContent = msg;
            b.classList.remove("hidden");
            b.style.display = 'flex';
            document.getElementById("message-ok-button").onclick = () => {
                b.classList.add("hidden");
                b.style.display = 'none';
            };
        } else {
            console.log(msg);
        }
    };

    // Helper: Confetti (Load on demand)
    window.triggerConfetti = function (origin) {
        if (typeof confetti === 'function') confetti({
            particleCount: 100,
            spread: 70,
            origin: origin || {
                y: 0.6
            }
        });
        else {
            const s = document.createElement('script');
            s.src = 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js';
            s.onload = () => confetti({
                particleCount: 100,
                spread: 70,
                origin: origin || {
                    y: 0.6
                }
            });
            document.body.appendChild(s);
        }
    };

    // --- MAIN INITIALIZATION & FEATURES ---
    document.addEventListener('DOMContentLoaded', () => {
        // ... (existing code)
        initOfflineIndicator();
    });

    // Helper: Toast Notifications
    window.showToast = function (message, type = 'info') {
        const container = document.getElementById('toast-container');
        if (!container) return;

        const toast = document.createElement('div');
        const colors = {
            success: 'bg-green-500',
            error: 'bg-red-500',
            warning: 'bg-amber-500',
            info: 'bg-primary'
        };
        const icons = {
            success: 'fa-check-circle',
            error: 'fa-exclamation-circle',
            warning: 'fa-exclamation-triangle',
            info: 'fa-info-circle'
        };

        toast.className = `pointer-events-auto flex items-center gap-3 ${colors[type] || colors.info} text-white px-6 py-4 rounded-xl shadow-2xl transform translate-x-10 opacity-0 transition-all duration-300 min-w-[300px] border border-white/20`;
        toast.innerHTML = `
            <i class="fas ${icons[type] || icons.info} text-xl"></i>
            <div class="flex-grow font-bold">${message}</div>
            <button class="hover:scale-110 transition-transform"><i class="fas fa-times"></i></button>
        `;

        container.appendChild(toast);

        // Animate In
        setTimeout(() => {
            toast.classList.remove('translate-x-10', 'opacity-0');
        }, 10);

        // Auto Close
        const close = () => {
            toast.classList.add('translate-x-10', 'opacity-0');
            setTimeout(() => toast.remove(), 300);
        };

        toast.querySelector('button').onclick = close;
        setTimeout(close, 5000);
    };

    function initOfflineIndicator() {
        const indicator = document.getElementById('offline-indicator');
        if (!indicator) return;

        const updateStatus = () => {
            if (navigator.onLine) {
                indicator.classList.add('-translate-x-24', 'opacity-0');
            } else {
                indicator.classList.remove('-translate-x-24', 'opacity-0');
            }
        };

        window.addEventListener('online', updateStatus);
        window.addEventListener('offline', updateStatus);
        updateStatus();
    }
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Remove Loader
        const loader = document.getElementById('initial-loader');
        if (loader) setTimeout(() => {
            loader.style.opacity = '0';
            setTimeout(() => loader.remove(), 500);
        }, 300);

        // 2. Mobile Nav Toggle
        document.getElementById("nav-toggle")?.addEventListener("click", () => document.getElementById("nav-content").classList.toggle("hidden"));

        // 3. Init Panels
        setupPanel('a11y-toggle-button', 'a11y-settings-panel', 'a11y-close-button');
        setupPanel('timer-toggle', 'timer-panel', 'timer-close');
        setupPanel('scratchpad-toggle', 'scratchpad-panel', 'scratchpad-close');
        setupPanel('citation-toggle', 'citation-panel', 'citation-close');

        // 4. Init Features
        initReadingMask();
        initTimer();
        initScratchpad();
        initCitation();
        initScrollTop();

        // 5. Ensure Inputs are Synced (Safely)
        if (typeof window.syncPanelInputs === 'function') {
            const settings = window.loadSettings ? window.loadSettings() : (window.currentSettings || {});
            window.syncPanelInputs(settings);
        }
    });

    function setupPanel(tid, pid, cid) {
        const t = document.getElementById(tid);
        const p = document.getElementById(pid);
        const c = document.getElementById(cid);
        if (!t || !p) return;
        const toggle = () => {
            if (pid.includes('settings')) p.classList.toggle('translate-x-full');
            else {
                p.classList.toggle('opacity-0');
                p.classList.toggle('pointer-events-none');
                p.classList.toggle('scale-90');
            }
        };
        t.onclick = toggle;
        if (c) c.onclick = toggle;
    }

    function initReadingMask() {
        const g = document.getElementById('reading-guide');
        if (g) {
            document.addEventListener('mousemove', e => {
                const s = window.loadSettings ? window.loadSettings() : window.currentSettings;
                if (s && s.readingMask) {
                    g.style.top = (e.clientY - 24) + 'px';
                }
            });
        }
    }

    function initTimer() {
        let iv, time = 1500;
        const d = document.getElementById('timer-display');
        const s = document.getElementById('timer-start');
        const r = document.getElementById('timer-reset');
        if (!d) return;
        const update = () => {
            const m = Math.floor(time / 60);
            const sc = time % 60;
            d.textContent = `${m}:${sc.toString().padStart(2, '0')}`;
        };
        s.onclick = () => {
            if (iv) {
                clearInterval(iv);
                iv = null;
                s.innerText = 'Start';
            } else {
                s.innerText = 'Pause';
                iv = setInterval(() => {
                    time--;
                    update();
                    if (time <= 0) {
                        clearInterval(iv);
                        window.showMessageBox('Time up!');
                        s.innerText = 'Start';
                    }
                }, 1000);
            }
        };
        r.onclick = () => {
            clearInterval(iv);
            iv = null;
            time = 1500;
            update();
            s.innerText = 'Start';
        };
    }

    function initScratchpad() {
        const t = document.getElementById('quick-notes-area');
        if (!t) return;
        try {
            t.value = localStorage.getItem('hl_scratchpad') || '';
            t.addEventListener('input', () => {
                localStorage.setItem('hl_scratchpad', t.value);
                document.getElementById('scratchpad-status').innerText = 'Saving...';
                setTimeout(() => document.getElementById('scratchpad-status').innerText = 'Saved', 1000);
            });
        } catch (e) {
            console.warn('LocalStorage restricted');
        }

        document.getElementById('download-notes').onclick = () => {
            const a = document.createElement('a');
            a.href = URL.createObjectURL(new Blob([t.value], {
                type: 'text/plain'
            }));
            a.download = 'notes.txt';
            a.click();
        };
    }

    function initCitation() {
        const btn = document.getElementById('cite-gen');
        if (btn) btn.onclick = () => {
            const t = document.getElementById('cite-title').value || document.title;
            const d = new Date();
            document.getElementById('cite-result').value = `${t}. (${d.getFullYear()}). Hesten's Learning. Retrieved ${d.toLocaleDateString()}.`;
        };
    }

    function initScrollTop() {
        const b = document.getElementById('scroll-to-top');
        if (b) {
            window.addEventListener('scroll', () => b.classList.toggle('opacity-0', window.scrollY < 300));
            b.onclick = () => window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    }
</script>