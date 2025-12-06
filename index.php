<?php
// --- PHP Page Variables ---
$pageTitle       = "Hesten's Learning";
$pageDescription = "Empowering students with learning disabilities through personalized, accessible learning experiences in Math, ELA, and Science.";
$pageKeywords    = "learning disabilities, personalized education, online learning, math, ELA, science, accessible education";
$pageAuthor      = "Hesten's Learning";

// --- Dynamic Content Array ---
$learningLevels = [
    ['id' => 'pre-k', 'category' => 'elem', 'title' => 'Pre-K', 'description' => 'Counting objects, letter names, rhyming words, and more. Foundational skills.', 'link' => '/Level/a.php', 'icon' => 'fas fa-shapes'],
    ['id' => 'kindergarten', 'category' => 'elem', 'title' => 'Kindergarten', 'description' => 'Basic math concepts, phonics, early reading. Building blocks for a strong start.', 'link' => '/Level/b.php', 'icon' => 'fas fa-puzzle-piece'],
    ['id' => 'grade-1', 'category' => 'elem', 'title' => 'Grade 1', 'description' => 'Adding, subtracting, sentence formation. Developing independence.', 'link' => '/Level/c.php', 'icon' => 'fas fa-pencil-alt'],
    ['id' => 'grade-2', 'category' => 'elem', 'title' => 'Grade 2', 'description' => 'Basic multiplication, reading fluency. Expanding foundational knowledge.', 'link' => '/Level/d.php', 'icon' => 'fas fa-book-open'],
    ['id' => 'grade-3', 'category' => 'elem', 'title' => 'Grade 3', 'description' => 'Multiplication, division, reading comprehension. Critical thinking.', 'link' => '/Level/e.php', 'icon' => 'fas fa-calculator'],
    ['id' => 'grade-4', 'category' => 'elem', 'title' => 'Grade 4', 'description' => 'Advanced multiplication, division, reading comprehension. Deeper dives.', 'link' => '/Level/f.php', 'icon' => 'fas fa-divide'],
    ['id' => 'grade-5', 'category' => 'elem', 'title' => 'Grade 5', 'description' => 'Decimals, essay writing, ecosystems. Preparing for middle school.', 'link' => '/Level/g.php', 'icon' => 'fas fa-atom'],
    ['id' => 'grade-6', 'category' => 'middle', 'title' => 'Grade 6', 'description' => 'Fractions, essay writing, earth science. Transitioning to complex subjects.', 'link' => '/Level/h.php', 'icon' => 'fas fa-globe-americas'],
    ['id' => 'grade-7', 'category' => 'middle', 'title' => 'Grade 7', 'description' => 'Proportional relationships, persuasive writing, life science. Middle school mastery.', 'link' => '/Level/i.php', 'icon' => 'fas fa-dna'],
    ['id' => 'grade-8', 'category' => 'middle', 'title' => 'Grade 8', 'description' => 'Linear equations, historical analysis, earth science. Pre-high school readiness.', 'link' => '/Level/j.php', 'icon' => 'fas fa-history'],
    ['id' => 'grade-9', 'category' => 'high', 'title' => 'Grade 9', 'description' => 'Algebra, literature, physical science. Introduction to high school.', 'link' => '/Level/k.php', 'icon' => 'fas fa-flask'],
    ['id' => 'grade-10', 'category' => 'high', 'title' => 'Grade 10', 'description' => 'Geometry, world history, biology. Broadening academic horizons.', 'link' => '/Level/l.php', 'icon' => 'fas fa-project-diagram'],
    ['id' => 'grade-11', 'category' => 'high', 'title' => 'Grade 11', 'description' => 'Pre-calculus, advanced literature, chemistry. College prep.', 'link' => '/Level/m.php', 'icon' => 'fas fa-microscope'],
    ['id' => 'grade-12', 'category' => 'high', 'title' => 'Grade 12', 'description' => 'Advanced calculus, literature analysis, physics. Final preparations.', 'link' => '/Level/n.php', 'icon' => 'fas fa-graduation-cap'],
    ['id' => 'test-section', 'category' => 'extra', 'title' => 'Test/Extra', 'description' => 'Practice with quizzes, review extra materials, and challenge yourself.', 'link' => '/test', 'icon' => 'fas fa-star']
];

// --- Theme Mapping ---
// Maps categories to Tailwind Colors for distinct visual identity
$themeMap = [
    'elem' => [
        'border' => 'border-teal-400 dark:border-teal-500',
        'icon_bg' => 'bg-teal-100 dark:bg-teal-900',
        'icon_text' => 'text-teal-600 dark:text-teal-300',
        'hover_border' => 'hover:border-teal-500',
        'button_hover' => 'hover:bg-teal-500 hover:text-white',
        'accent' => 'text-teal-600 dark:text-teal-400'
    ],
    'middle' => [
        'border' => 'border-amber-400 dark:border-amber-500',
        'icon_bg' => 'bg-amber-100 dark:bg-amber-900',
        'icon_text' => 'text-amber-600 dark:text-amber-300',
        'hover_border' => 'hover:border-amber-500',
        'button_hover' => 'hover:bg-amber-500 hover:text-white',
        'accent' => 'text-amber-600 dark:text-amber-400'
    ],
    'high' => [
        'border' => 'border-rose-400 dark:border-rose-500',
        'icon_bg' => 'bg-rose-100 dark:bg-rose-900',
        'icon_text' => 'text-rose-600 dark:text-rose-300',
        'hover_border' => 'hover:border-rose-500',
        'button_hover' => 'hover:bg-rose-500 hover:text-white',
        'accent' => 'text-rose-600 dark:text-rose-400'
    ],
    'extra' => [
        'border' => 'border-violet-400 dark:border-violet-500',
        'icon_bg' => 'bg-violet-100 dark:bg-violet-900',
        'icon_text' => 'text-violet-600 dark:text-violet-300',
        'hover_border' => 'hover:border-violet-500',
        'button_hover' => 'hover:bg-violet-500 hover:text-white',
        'accent' => 'text-violet-600 dark:text-violet-400'
    ]
];

include 'src/header.php';
?>

<!-- Confetti Library (Deferred) -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js" defer></script>

<!-- Hero Section with Enhanced Gradient Overlay -->
<div
    class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
    <!-- Background Decor -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
        <i class="fas fa-shapes absolute top-10 left-10 text-8xl text-white/10 animate-pulse"></i>
        <i class="fas fa-calculator absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12"></i>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-white/5 rounded-full blur-3xl mix-blend-overlay">
        </div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto text-center">
        <div
            class="backdrop-blur-md bg-white/10 border border-white/20 p-8 md:p-12 rounded-3xl shadow-2xl animate-fade-in-up">
            <span
                class="inline-block py-1 px-4 rounded-full bg-black/20 text-white text-xs font-bold mb-6 tracking-wide uppercase border border-white/20 shadow-sm">
                Accessible Education for All
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight drop-shadow-lg text-white">
                Learning Without <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-teal-200 to-emerald-200">Limits</span>
            </h1>
            <p
                class="text-lg md:text-2xl mb-10 text-blue-50 max-w-3xl mx-auto leading-relaxed font-light drop-shadow-md">
                Empowering every student with personalized, accessible, and engaging educational experiences designed
                for <span class="font-bold text-white border-b-2 border-teal-300/50">how you learn</span>.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#level-grid"
                    class="bg-white text-blue-700 font-bold py-4 px-10 rounded-full shadow-lg transition-transform hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-white/50 text-lg flex items-center justify-center gap-2">
                    <span>Start Learning</span>
                    <i class="fas fa-arrow-down" aria-hidden="true"></i>
                </a>
                <a href="/about.php"
                    class="bg-transparent border-2 border-white/50 text-white font-bold py-4 px-10 rounded-full transition-colors hover:bg-white/10 focus:outline-none focus:ring-4 focus:ring-white/50 text-lg">
                    Learn More
                </a>
            </div>
        </div>

        <!-- Stats Bar -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12 text-center" aria-label="Site Statistics">
            <div class="p-4 rounded-xl bg-black/20 backdrop-blur border border-white/10 shadow-lg">
                <div class="text-3xl font-bold text-teal-300 mb-1 flex justify-center"><span
                        id="user-progress-stat">0</span>%</div>
                <div class="text-sm text-blue-100">Your Progress</div>
            </div>
            <div class="p-4 rounded-xl bg-black/20 backdrop-blur border border-white/10 shadow-lg">
                <div class="text-3xl font-bold text-amber-300 mb-1"><?php echo count($learningLevels); ?></div>
                <div class="text-sm text-blue-100">Grade Levels</div>
            </div>
            <div class="p-4 rounded-xl bg-black/20 backdrop-blur border border-white/10 shadow-lg">
                <div class="text-3xl font-bold text-rose-300 mb-1"><i class="fas fa-check"></i></div>
                <div class="text-sm text-blue-100">Free to Use</div>
            </div>
            <div class="p-4 rounded-xl bg-black/20 backdrop-blur border border-white/10 shadow-lg">
                <div class="text-3xl font-bold text-violet-300 mb-1"><i class="fas fa-lock"></i></div>
                <div class="text-sm text-blue-100">Private & Secure</div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Area -->
<main class="container mx-auto my-10 px-4 scroll-mt-24" id="main-content" tabindex="-1">

    <!-- Resume Learning Banner (Dynamic) -->
    <div id="resume-banner"
        class="hidden mb-12 bg-gradient-to-r from-teal-500 to-emerald-600 rounded-2xl p-1 shadow-lg transform hover:-translate-y-1 transition-all cursor-pointer group">
        <div
            class="bg-white/10 backdrop-blur-md rounded-xl p-6 flex flex-col md:flex-row items-center justify-between gap-4 h-full border border-white/10">
            <div class="flex items-center gap-4 text-white">
                <div
                    class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform shadow-inner">
                    <i class="fas fa-play"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Welcome Back!</h2>
                    <p class="text-blue-50">Ready to continue with <span id="next-level-name"
                            class="font-bold underline text-white decoration-amber-400 decoration-2"></span>?</p>
                </div>
            </div>
            <button
                class="bg-white text-teal-700 px-8 py-3 rounded-full font-bold hover:bg-teal-50 transition-colors shadow-md focus:ring-4 focus:ring-white/50">
                Resume Learning
            </button>
        </div>
    </div>

    <!-- Filter & Search Controls -->
    <div
        class="bg-content-bg p-6 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 mb-10 sticky top-4 z-30 transition-colors duration-300">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-3">
                <span class="w-2 h-8 bg-gradient-to-b from-primary to-accent rounded-full shadow-sm"
                    aria-hidden="true"></span>
                <h2 id="learning-levels-heading" class="text-2xl font-bold text-text-default">Select Your Grade</h2>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto items-center">
                <!-- Search -->
                <div class="relative w-full sm:w-64">
                    <label for="level-search" class="sr-only">Filter grades</label>
                    <input type="text" id="level-search" placeholder="Filter grades..."
                        class="w-full pl-10 pr-10 py-2.5 rounded-full border border-gray-300 dark:border-gray-600 bg-base-bg text-text-default focus:ring-2 focus:ring-primary focus:border-primary transition-all shadow-sm">
                    <i class="fas fa-filter absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                        aria-hidden="true"></i>
                    <button id="clear-search" onclick="resetFilters()"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary hidden focus:outline-none"
                        aria-label="Clear filter">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>

                <!-- Categories -->
                <div class="flex flex-wrap justify-center gap-2" role="group" aria-label="Filter by category">
                    <button onclick="setCategory('all')"
                        class="filter-btn active px-4 py-2 rounded-full text-sm font-bold bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-900 transition-all shadow-sm ring-offset-2 focus:ring-2"
                        aria-pressed="true" data-filter="all">All</button>
                    <!-- Color-Coded Filter Buttons -->
                    <button onclick="setCategory('elem')"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-bold bg-teal-50 text-teal-700 hover:bg-teal-100 dark:bg-teal-900/30 dark:text-teal-300 dark:hover:bg-teal-900/50 transition-all border border-transparent hover:border-teal-200"
                        aria-pressed="false" data-filter="elem">Elem</button>
                    <button onclick="setCategory('middle')"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-bold bg-amber-50 text-amber-700 hover:bg-amber-100 dark:bg-amber-900/30 dark:text-amber-300 dark:hover:bg-amber-900/50 transition-all border border-transparent hover:border-amber-200"
                        aria-pressed="false" data-filter="middle">Middle</button>
                    <button onclick="setCategory('high')"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-bold bg-rose-50 text-rose-700 hover:bg-rose-100 dark:bg-rose-900/30 dark:text-rose-300 dark:hover:bg-rose-900/50 transition-all border border-transparent hover:border-rose-200"
                        aria-pressed="false" data-filter="high">High</button>
                </div>
            </div>
        </div>
        <div class="mt-2 text-sm text-text-secondary text-right" aria-live="polite" id="results-count">Showing all
            levels</div>
    </div>

    <!-- Grid -->
    <section id="level-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
        aria-labelledby="learning-levels-heading">
        <?php foreach ($learningLevels as $index => $level) :
            $theme = isset($themeMap[$level['category']]) ? $themeMap[$level['category']] : $themeMap['elem'];
            ?>
            <article class="level-card group relative flex flex-col h-full"
                data-category="<?php echo htmlspecialchars($level['category']); ?>"
                data-title="<?php echo htmlspecialchars(strtolower($level['title'])); ?>"
                data-desc="<?php echo htmlspecialchars(strtolower($level['description'])); ?>"
                data-id="<?php echo htmlspecialchars($level['id']); ?>"
                data-link="<?php echo htmlspecialchars($level['link']); ?>">

                <!-- Card Container with Dynamic Border Color -->
                <div
                    class="bg-content-bg h-full rounded-2xl shadow-lg border-t-8 <?php echo $theme['border']; ?> border-l border-r border-b border-gray-100 dark:border-gray-700 hover:border-transparent <?php echo $theme['hover_border']; ?> transition-all duration-300 p-8 flex flex-col overflow-hidden hover:shadow-2xl hover:-translate-y-1">

                    <!-- Decorative Icon Background (Faded) -->
                    <div
                        class="absolute -right-6 -bottom-6 text-[8rem] opacity-5 transform rotate-12 group-hover:scale-110 transition-transform duration-500 pointer-events-none <?php echo $theme['accent']; ?>">
                        <i class="<?php echo htmlspecialchars($level['icon']); ?>"></i>
                    </div>

                    <!-- Actions Top Right -->
                    <div class="absolute top-4 right-4 flex gap-2 z-20">
                        <!-- TTS -->
                        <button type="button"
                            class="w-10 h-10 rounded-full bg-base-bg text-text-secondary hover:text-primary hover:bg-primary/10 transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary shadow-sm"
                            onclick="toggleSpeech(this, '<?php echo htmlspecialchars(addslashes($level['title'])); ?>', '<?php echo htmlspecialchars(addslashes($level['description'])); ?>')"
                            aria-label="Listen to description">
                            <i class="fas fa-volume-up"></i>
                        </button>
                        <!-- Mark Complete -->
                        <button type="button"
                            class="completion-toggle w-10 h-10 rounded-full bg-base-bg text-text-secondary hover:text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-green-500 shadow-sm"
                            onclick="toggleCompletion('<?php echo htmlspecialchars($level['id']); ?>', this)"
                            aria-label="Mark as complete">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>

                    <!-- Content Header with Dynamic Icon Colors -->
                    <div class="flex items-center gap-4 mb-4 relative z-10">
                        <div
                            class="w-12 h-12 rounded-xl flex items-center justify-center text-xl shadow-inner transition-colors <?php echo $theme['icon_bg'] . ' ' . $theme['icon_text']; ?>">
                            <i class="<?php echo htmlspecialchars($level['icon']); ?>"></i>
                        </div>
                        <h3
                            class="text-xl font-bold text-text-default group-hover:text-current transition-colors <?php echo $theme['accent']; ?>">
                            <?php echo htmlspecialchars($level['title']); ?>
                        </h3>
                    </div>

                    <p class="text-text-secondary mb-8 flex-grow leading-relaxed relative z-10">
                        <?php echo htmlspecialchars($level['description']); ?>
                    </p>

                    <a href="<?php echo htmlspecialchars($level['link']); ?>"
                        class="mt-auto relative z-10 w-full flex justify-between items-center bg-base-bg text-text-default font-bold py-3 px-6 rounded-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-current/30 group-focus:ring-4 <?php echo $theme['button_hover']; ?>">
                        <span>Explore Skills</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </section>

    <!-- Empty State -->
    <div id="no-results" class="hidden text-center py-24 px-4">
        <div class="inline-block p-6 rounded-full bg-base-bg mb-4">
            <i class="fas fa-search text-4xl text-gray-300"></i>
        </div>
        <h3 class="text-xl font-bold text-text-default mb-2">No levels found</h3>
        <p class="text-text-secondary mb-6">We couldn't find anything matching your search.</p>
        <button onclick="resetFilters()" class="text-primary font-bold hover:underline">Clear Search & Filters</button>
    </div>

</main>

<script>
    // --- Application Logic ---
    let currentCategory = 'all';
    let currentSearch = '';
    let completedLevels = [];
    let currentUtterance = null;
    let searchTimeout = null;

    // Load progress on init
    document.addEventListener("DOMContentLoaded", () => {
        loadProgress();
        checkResumeLearning();

        // Setup Search Debounce
        document.getElementById('level-search')?.addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => applyFilters(), 250); // Wait 250ms before filtering
        });
    });

    // --- Progress System ---
    function loadProgress() {
        try {
            const stored = localStorage.getItem('hl_completed_levels');
            if (stored) completedLevels = JSON.parse(stored);
        } catch (e) { }
        updateProgressUI();
    }

    function saveProgress() {
        localStorage.setItem('hl_completed_levels', JSON.stringify(completedLevels));
    }

    function toggleCompletion(id, btn) {
        const index = completedLevels.indexOf(id);
        if (index > -1) {
            completedLevels.splice(index, 1);
        } else {
            completedLevels.push(id);
            // Trigger Confetti if available
            if (typeof confetti === 'function') {
                const rect = btn.getBoundingClientRect();
                confetti({
                    particleCount: 60,
                    spread: 60,
                    origin: { x: rect.left / window.innerWidth, y: rect.top / window.innerHeight }
                });
            }
        }
        saveProgress();
        updateProgressUI();
        checkResumeLearning();
    }

    function updateProgressUI() {
        // Update Buttons
        document.querySelectorAll('.completion-toggle').forEach(btn => {
            const id = btn.closest('.level-card').dataset.id;
            const isComplete = completedLevels.includes(id);

            if (isComplete) {
                btn.classList.add('bg-green-500', 'text-white', 'border-transparent');
                btn.classList.remove('bg-base-bg', 'text-text-secondary');
                btn.setAttribute('aria-pressed', 'true');
                btn.closest('.level-card').querySelector('.bg-content-bg').classList.add('ring-2', 'ring-green-400');
            } else {
                btn.classList.remove('bg-green-500', 'text-white', 'border-transparent');
                btn.classList.add('bg-base-bg', 'text-text-secondary');
                btn.setAttribute('aria-pressed', 'false');
                btn.closest('.level-card').querySelector('.bg-content-bg').classList.remove('ring-2', 'ring-green-400');
            }
        });

        // Update Stats
        const total = document.querySelectorAll('.level-card').length;
        const count = completedLevels.length;
        const pct = total ? Math.round((count / total) * 100) : 0;
        const statEl = document.getElementById('user-progress-stat');
        if (statEl) statEl.textContent = pct;
    }

    // --- Resume Banner ---
    function checkResumeLearning() {
        const banner = document.getElementById('resume-banner');
        if (!banner) return;

        if (completedLevels.length === 0) {
            banner.classList.add('hidden');
            return;
        }

        const cards = Array.from(document.querySelectorAll('.level-card'));
        const nextLevel = cards.find(card => !completedLevels.includes(card.dataset.id));

        if (nextLevel) {
            const title = nextLevel.dataset.title;
            const link = nextLevel.dataset.link;
            document.getElementById('next-level-name').textContent = title.charAt(0).toUpperCase() + title.slice(1);

            // Make whole banner clickable
            banner.onclick = () => window.location.href = link;
            banner.classList.remove('hidden');
        } else {
            banner.classList.add('hidden'); // Or show "All Done" message
        }
    }

    // --- TTS ---
    function toggleSpeech(btn, title, desc) {
        if (window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel();
            if (btn.classList.contains('speaking')) {
                btn.classList.remove('speaking', 'text-primary', 'animate-pulse');
                btn.innerHTML = '<i class="fas fa-volume-up"></i>';
                return;
            }
        }

        // Reset all buttons
        document.querySelectorAll('.speaking').forEach(b => {
            b.classList.remove('speaking', 'text-primary', 'animate-pulse');
            b.innerHTML = '<i class="fas fa-volume-up"></i>';
        });

        const text = `${title}. ${desc}`;
        const utterance = new SpeechSynthesisUtterance(text);

        utterance.onend = () => {
            btn.classList.remove('speaking', 'text-primary', 'animate-pulse');
            btn.innerHTML = '<i class="fas fa-volume-up"></i>';
        };

        btn.classList.add('speaking', 'text-primary', 'animate-pulse');
        btn.innerHTML = '<i class="fas fa-stop"></i>';
        window.speechSynthesis.speak(utterance);
    }

    // --- Filtering ---
    function setCategory(cat) {
        currentCategory = cat;
        // Update Buttons
        document.querySelectorAll('.filter-btn').forEach(btn => {
            if (btn.dataset.filter === cat) {
                // If it's the "All" button
                if (cat === 'all') {
                    btn.classList.add('bg-gray-800', 'text-white', 'dark:bg-gray-200', 'dark:text-gray-900');
                } else if (cat === 'elem') {
                    btn.classList.add('bg-teal-500', 'text-white', 'border-transparent');
                    btn.classList.remove('text-teal-700', 'bg-teal-50');
                } else if (cat === 'middle') {
                    btn.classList.add('bg-amber-500', 'text-white', 'border-transparent');
                    btn.classList.remove('text-amber-700', 'bg-amber-50');
                } else if (cat === 'high') {
                    btn.classList.add('bg-rose-500', 'text-white', 'border-transparent');
                    btn.classList.remove('text-rose-700', 'bg-rose-50');
                }
                btn.setAttribute('aria-pressed', 'true');
            } else {
                // Reset to inactive state based on type
                if (btn.dataset.filter === 'all') {
                    btn.classList.remove('bg-gray-800', 'text-white', 'dark:bg-gray-200', 'dark:text-gray-900');
                    // Add inactive style for "All"
                    btn.classList.add('bg-gray-200', 'text-gray-700', 'dark:bg-gray-700', 'dark:text-gray-300');
                } else if (btn.dataset.filter === 'elem') {
                    btn.classList.remove('bg-teal-500', 'text-white', 'border-transparent');
                    btn.classList.add('text-teal-700', 'bg-teal-50', 'dark:text-teal-300', 'dark:bg-teal-900/30');
                } else if (btn.dataset.filter === 'middle') {
                    btn.classList.remove('bg-amber-500', 'text-white', 'border-transparent');
                    btn.classList.add('text-amber-700', 'bg-amber-50', 'dark:text-amber-300', 'dark:bg-amber-900/30');
                } else if (btn.dataset.filter === 'high') {
                    btn.classList.remove('bg-rose-500', 'text-white', 'border-transparent');
                    btn.classList.add('text-rose-700', 'bg-rose-50', 'dark:text-rose-300', 'dark:bg-rose-900/30');
                }
                btn.setAttribute('aria-pressed', 'false');
            }
        });
        applyFilters();
    }

    function resetFilters() {
        document.getElementById('level-search').value = '';
        setCategory('all');
    }

    function applyFilters() {
        const input = document.getElementById('level-search');
        const term = input.value.toLowerCase().trim();
        const clearBtn = document.getElementById('clear-search');

        if (term) clearBtn.classList.remove('hidden');
        else clearBtn.classList.add('hidden');

        const cards = document.querySelectorAll('.level-card');
        let visible = 0;

        cards.forEach(card => {
            const matchesCat = currentCategory === 'all' || card.dataset.category === currentCategory;
            const matchesSearch = !term || card.dataset.title.includes(term) || card.dataset.desc.includes(term);

            if (matchesCat && matchesSearch) {
                card.classList.remove('hidden');
                visible++;
            } else {
                card.classList.add('hidden');
            }
        });

        const grid = document.getElementById('level-grid');
        const noResults = document.getElementById('no-results');
        const countMsg = document.getElementById('results-count');

        if (visible === 0) {
            grid.classList.add('hidden');
            noResults.classList.remove('hidden');
            countMsg.textContent = 'No results found';
        } else {
            grid.classList.remove('hidden');
            noResults.classList.add('hidden');
            countMsg.textContent = `Showing ${visible} result${visible !== 1 ? 's' : ''}`;
        }
    }
</script>

<?php include 'src/footer.php'; ?>