<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-300 py-12 border-t border-gray-800 font-sans print:hidden">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- About -->
            <div class="mb-6 md:mb-0">
                <h4 class="text-white font-bold text-lg mb-4 uppercase tracking-wider">Hesten's Learning</h4>
                <p class="text-sm leading-relaxed mb-4">
                    Empowering students with learning disabilities through personalized, accessible learning experiences
                    in Math, ELA, and Science.
                </p>
                <div class="flex gap-4">
                    <!-- Socials or Icons could go here -->
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4 uppercase tracking-wider">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/curriculum.php" class="hover:text-white transition-colors">Curriculum</a></li>
                    <li><a href="/research" class="hover:text-white transition-colors">Research</a></li>
                    <li><a href="/library" class="hover:text-white transition-colors">Library</a></li>
                    <li><a href="/help-center.php" class="hover:text-white transition-colors">Help Center</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4 uppercase tracking-wider">Support</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/contact.php" class="hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="/students.php" class="hover:text-white transition-colors">For Students</a></li>
                    <li><a href="/parents.php" class="hover:text-white transition-colors">For Parents</a></li>
                    <li><a href="/teachers.php" class="hover:text-white transition-colors">For Teachers</a></li>
                </ul>
            </div>

            <!-- Legal & Settings -->
            <div>
                <h4 class="text-white font-bold text-lg mb-4 uppercase tracking-wider">Legal</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/privacy-policy.php" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="/terms-of-use.php" class="hover:text-white transition-colors">Terms of Use</a></li>
                    <li><a href="/settings.php" class="hover:text-white transition-colors">Accessibility Settings</a>
                    </li>
                    <li><a href="/about.php" class="hover:text-white transition-colors">About Us</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm">
            <p>&copy; <span id="year">2025</span> Hesten's Learning. All rights reserved.</p>
            <div class="mt-4 md:mt-0">
                <div class="gtranslate_wrapper"></div>
            </div>
        </div>
    </div>
</footer>

<!-- Global Modals -->
<div id="message-box" class="fixed inset-0 bg-black/75 backdrop-blur-sm hidden items-center justify-center z-[100]"
    role="alertdialog" aria-modal="true">
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
    window.showMessageBox = function(msg) {
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
    window.triggerConfetti = function(origin) {
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