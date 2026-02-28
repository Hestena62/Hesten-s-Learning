
/**
 * Global Command Palette (The Lighthouse)
 * Handles Ctrl+K searching and execution of site-wide actions.
 */

const lighthouseActions = [
    // Navigation
    { id: 'nav-home', title: 'Go to Home', icon: 'fas fa-home', category: 'Navigation', action: () => window.location.href = '/' },
    { id: 'nav-learning', title: 'Go to Learning Center', icon: 'fas fa-book', category: 'Navigation', action: () => window.location.href = '/learning.php' },
    { id: 'nav-assessment', title: 'Go to Assessments', icon: 'fas fa-tasks', category: 'Navigation', action: () => window.location.href = '/assessment' },
    { id: 'nav-library', title: 'Go to Library', icon: 'fas fa-book-open', category: 'Navigation', action: () => window.location.href = '/library' },
    { id: 'nav-parents', title: 'For Parents', icon: 'fas fa-user-friends', category: 'Navigation', action: () => window.location.href = '/parents.php' },
    { id: 'nav-teachers', title: 'For Teachers', icon: 'fas fa-chalkboard-teacher', category: 'Navigation', action: () => window.location.href = '/teachers.php' },
    { id: 'nav-students', title: 'For Students', icon: 'fas fa-user-graduate', category: 'Navigation', action: () => window.location.href = '/students.php' },
    { id: 'nav-help', title: 'Help Center', icon: 'fas fa-question-circle', category: 'Navigation', action: () => window.location.href = '/help-center.php' },
    
    // Accessibility / Themes
    { id: 'theme-light', title: 'Switch to Light Mode', icon: 'fas fa-sun', category: 'Appearance', action: () => window.updateGlobalSetting('theme', 'light') },
    { id: 'theme-dark', title: 'Switch to Dark Mode', icon: 'fas fa-moon', category: 'Appearance', action: () => window.updateGlobalSetting('theme', 'dark') },
    { id: 'theme-contrast', title: 'Switch to High Contrast', icon: 'fas fa-low-vision', category: 'Appearance', action: () => window.updateGlobalSetting('theme', 'high-contrast') },
    { id: 'theme-sepia', title: 'Switch to Sepia Mode', icon: 'fas fa-eye', category: 'Appearance', action: () => window.updateGlobalSetting('theme', 'sepia') },
    { id: 'theme-midnight', title: 'Switch to Midnight Mode', icon: 'fas fa-cloud-moon', category: 'Appearance', action: () => window.updateGlobalSetting('theme', 'midnight') },
    { id: 'toggle-focus', title: 'Toggle Focus Mode', icon: 'fas fa-expand', category: 'Accessibility', action: () => {
        const s = window.loadSettings ? window.loadSettings() : window.currentSettings;
        if (s) window.updateGlobalSetting('focusMode', !s.focusMode);
    }},
    { id: 'toggle-mask', title: 'Toggle Reading Mask', icon: 'fas fa-mask', category: 'Accessibility', action: () => {
        const s = window.loadSettings ? window.loadSettings() : window.currentSettings;
        if (s) window.updateGlobalSetting('readingMask', !s.readingMask);
    }},
    { id: 'toggle-cursor', title: 'Toggle Large Cursor', icon: 'fas fa-mouse-pointer', category: 'Accessibility', action: () => {
        const s = window.loadSettings ? window.loadSettings() : window.currentSettings;
        if (s) window.updateGlobalSetting('cursorSize', s.cursorSize === 'large' ? 'normal' : 'large');
    }},
    { id: 'toggle-images', title: 'Toggle Hide Images', icon: 'fas fa-image', category: 'Accessibility', action: () => {
        const s = window.loadSettings ? window.loadSettings() : window.currentSettings;
        if (s) window.updateGlobalSetting('hideImages', !s.hideImages);
    }},
    { id: 'toggle-teacher', title: 'Toggle Teacher Mode', icon: 'fas fa-shield-alt', category: 'Accessibility', action: () => {
        const s = window.loadSettings ? window.loadSettings() : window.currentSettings;
        if (s) window.updateGlobalSetting('teacherMode', !s.teacherMode);
    }},

    // Tools
    { id: 'tool-timer', title: 'Open Study Timer', icon: 'fas fa-stopwatch', category: 'Tools', action: () => document.getElementById('timer-toggle')?.click() },
    { id: 'tool-notes', title: 'Open Quick Notes', icon: 'fas fa-pen', category: 'Tools', action: () => document.getElementById('scratchpad-toggle')?.click() },
    { id: 'tool-cite', title: 'Open Citation Tool', icon: 'fas fa-quote-right', category: 'Tools', action: () => document.getElementById('citation-toggle')?.click() },
    { id: 'tool-scroll', title: 'Scroll to Top', icon: 'fas fa-arrow-up', category: 'Tools', action: () => window.scrollTo({ top: 0, behavior: 'smooth' }) },
];

let selectedIndex = 0;
let filteredActions = [];

document.addEventListener('DOMContentLoaded', () => {
    // Inject CSS for the results selection highlight if not in stylesheet
    if (!document.getElementById('lighthouse-styles')) {
        const style = document.createElement('style');
        style.id = 'lighthouse-styles';
        style.innerHTML = `
            .lighthouse-overlay { transition: opacity 0.3s ease, backdrop-filter 0.3s ease; }
            .lighthouse-modal { transform: scale(0.95); transition: transform 0.2s cubic-bezier(0.18, 0.89, 0.32, 1.28), opacity 0.2s ease; }
            .lighthouse-modal.active { transform: scale(1); opacity: 1; }
            .action-item { border-left: 4px solid transparent; }
            .action-item.selected { background: rgba(var(--color-primary-rgb, 79, 70, 229), 0.1); border-left-color: var(--color-primary, #4f46e5); }
        `;
        document.head.appendChild(style);
    }

    const palette = document.getElementById('lighthouse-palette');
    const input = document.getElementById('lighthouse-input');
    const results = document.getElementById('lighthouse-results');

    if (!palette || !input || !results) return;

    // keyboard shortcut
    window.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            togglePalette();
        }
        if (e.key === 'Escape' && !palette.classList.contains('hidden')) {
            togglePalette();
        }
    });

    function togglePalette() {
        const isHidden = palette.classList.contains('hidden');
        if (isHidden) {
            palette.classList.remove('hidden');
            palette.classList.add('flex');
            setTimeout(() => palette.classList.add('active'), 10);
            input.value = '';
            input.focus();
            renderResults('');
        } else {
            palette.classList.remove('active');
            setTimeout(() => {
                palette.classList.add('hidden');
                palette.classList.remove('flex');
            }, 200);
        }
    }

    input.addEventListener('input', (e) => {
        renderResults(e.target.value);
    });

    function renderResults(query) {
        query = query.toLowerCase();
        filteredActions = lighthouseActions.filter(a => 
            a.title.toLowerCase().includes(query) || 
            a.category.toLowerCase().includes(query)
        );

        selectedIndex = 0;
        results.innerHTML = '';

        if (filteredActions.length === 0) {
            results.innerHTML = '<div class="p-8 text-center text-text-secondary italic">No matching commands found. Ready for your search!</div>';
            return;
        }

        let currentCategory = '';
        filteredActions.forEach((action, index) => {
            if (action.category !== currentCategory) {
                currentCategory = action.category;
                const catHeader = document.createElement('div');
                catHeader.className = 'px-4 py-2 text-[10px] font-bold text-text-secondary uppercase tracking-widest bg-base-bg/30 border-y border-white/5';
                catHeader.textContent = currentCategory;
                results.appendChild(catHeader);
            }

            const item = document.createElement('div');
            item.className = `action-item p-4 flex items-center gap-4 cursor-pointer transition-all duration-200 ${index === 0 ? 'selected' : 'hover:bg-primary/5'}`;
            item.innerHTML = `
                <div class="w-10 h-10 rounded-xl bg-base-bg flex items-center justify-center text-primary shadow-sm group-hover:scale-110 transition-transform">
                    <i class="${action.icon} text-lg"></i>
                </div>
                <div class="flex-grow">
                    <div class="font-bold text-text-default text-base leading-none mb-1">${action.title}</div>
                    <div class="text-[11px] text-text-secondary font-medium opacity-70">${action.category}</div>
                </div>
                <div class="keyboard-hint px-2 py-1 bg-base-bg rounded text-[9px] font-mono text-text-secondary border border-black/5 opacity-40">ENTER</div>
            `;
            item.onmouseenter = () => {
                selectedIndex = index;
                const items = results.querySelectorAll('.action-item');
                updateSelection(items);
            };
            item.onclick = () => {
                action.action();
                togglePalette();
            };
            results.appendChild(item);
        });
    }

    // Navigation logic
    input.addEventListener('keydown', (e) => {
        const items = results.querySelectorAll('.action-item');
        if (e.key === 'ArrowDown') {
            e.preventDefault();
            selectedIndex = (selectedIndex + 1) % filteredActions.length;
            updateSelection(items);
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            selectedIndex = (selectedIndex - 1 + filteredActions.length) % filteredActions.length;
            updateSelection(items);
        } else if (e.key === 'Enter') {
            e.preventDefault();
            if (filteredActions[selectedIndex]) {
                filteredActions[selectedIndex].action();
                togglePalette();
            }
        }
    });

    function updateSelection(items) {
        items.forEach((item, index) => {
            if (index === selectedIndex) {
                item.classList.add('selected');
                item.scrollIntoView({ block: 'nearest' });
            } else {
                item.classList.remove('selected');
            }
        });
    }

    // Close when clicking outside
    palette.addEventListener('mousedown', (e) => {
        if (e.target === palette) togglePalette();
    });
});
