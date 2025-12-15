<?php
// --- Page Configuration ---
$pageTitle       = "Curriculum & Learning | Hesten's Learning";
$pageDescription = "Browse our complete K-12 curriculum including Math, ELA, and Science. Accessible learning for everyone.";
$pageKeywords    = "curriculum, grades, k-12, math, ela, science, special education";
$pageAuthor      = "Hesten's Learning";

// --- Dynamic Content Array (Duplicated from index.php) ---
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

<!-- Confetti Library -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js" defer></script>

<!-- Hero Section -->
<div
    class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
    <!-- Abstract Background Shapes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <i class="fas fa-book absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
        <i
            class="fas fa-graduation-cap absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
    </div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <span
            class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-4 uppercase tracking-wider backdrop-blur-md shadow-sm">
            Curriculum
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md">
            Complete Learning Path
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            Explore all grade levels and subjects available on Hesten's Learning.
        </p>
    </div>
</div>

<main class="container mx-auto px-4 mb-20" id="main-content">

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
                            class="w-16 h-16 rounded-2xl <?php echo $theme['icon_bg']; ?> <?php echo $theme['icon_text']; ?> flex items-center justify-center text-3xl shadow-inner group-hover:scale-110 transition-transform duration-300">
                            <i class="<?php echo htmlspecialchars($level['icon']); ?>"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-text-default group-hover:text-primary transition-colors">
                                <?php echo htmlspecialchars($level['title']); ?>
                            </h3>
                            <span
                                class="text-xs uppercase tracking-wider font-semibold text-text-secondary bg-base-bg px-2 py-1 rounded-md border border-gray-200 dark:border-gray-700">
                                <?php echo htmlspecialchars(ucfirst($level['category'])); ?>
                            </span>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-text-secondary leading-relaxed mb-8 flex-grow relative z-10">
                        <?php echo htmlspecialchars($level['description']); ?>
                    </p>

                    <!-- CTA Button -->
                    <a href="<?php echo htmlspecialchars($level['link']); ?>"
                        class="w-full block text-center py-3 px-6 rounded-xl border-2 font-bold transition-all duration-300 transform group-hover:scale-105 <?php echo $theme['border']; ?> <?php echo $theme['accent']; ?> <?php echo $theme['button_hover']; ?> bg-transparent relative z-10">
                        Start Learning <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<script>
    // --- Filter Logic ---
    function setCategory(category) {
        // Update Buttons
        document.querySelectorAll('.filter-btn').forEach(btn => {
            if (btn.dataset.filter === category) {
                btn.classList.add('active', 'bg-gray-800', 'text-white', 'dark:bg-gray-200', 'dark:text-gray-900', 'shadow-sm', 'ring-offset-2', 'focus:ring-2');
                btn.classList.remove('bg-teal-50', 'text-teal-700', 'bg-amber-50', 'text-amber-700', 'bg-rose-50', 'text-rose-700', 'dark:bg-teal-900/30', 'dark:text-teal-300', 'dark:bg-amber-900/30', 'dark:text-amber-300', 'dark:bg-rose-900/30', 'dark:text-rose-300');
                btn.setAttribute('aria-pressed', 'true');
            } else {
                btn.classList.remove('active', 'bg-gray-800', 'text-white', 'dark:bg-gray-200', 'dark:text-gray-900', 'shadow-sm', 'ring-offset-2', 'focus:ring-2');
                btn.setAttribute('aria-pressed', 'false');

                // Add back original color classes based on filter type
                const filter = btn.dataset.filter;
                if (filter === 'elem') btn.classList.add('bg-teal-50', 'text-teal-700', 'dark:bg-teal-900/30', 'dark:text-teal-300');
                else if (filter === 'middle') btn.classList.add('bg-amber-50', 'text-amber-700', 'dark:bg-amber-900/30', 'dark:text-amber-300');
                else if (filter === 'high') btn.classList.add('bg-rose-50', 'text-rose-700', 'dark:bg-rose-900/30', 'dark:text-rose-300');
            }
        });

        const cards = document.querySelectorAll('.level-card');
        const searchTerm = document.getElementById('level-search').value.toLowerCase();
        let count = 0;

        cards.forEach(card => {
            const cardCat = card.dataset.category;
            const matchesCategory = category === 'all' || cardCat === category;
            const matchesSearch = card.dataset.title.includes(searchTerm) || card.dataset.desc.includes(searchTerm);

            if (matchesCategory && matchesSearch) {
                card.style.display = 'flex'; // Restore flex display
                count++;
            } else {
                card.style.display = 'none';
            }
        });

        updateCount(count);
    }

    function resetFilters() {
        document.getElementById('level-search').value = '';
        document.getElementById('clear-search').classList.add('hidden');
        setCategory('all');
    }

    // Search Input Listener
    document.getElementById('level-search').addEventListener('keyup', (e) => {
        const val = e.target.value.toLowerCase();
        const clearBtn = document.getElementById('clear-search');
        if (val.length > 0) clearBtn.classList.remove('hidden');
        else clearBtn.classList.add('hidden');

        // Trigger filter with current active category
        const activeCat = document.querySelector('.filter-btn.active').dataset.filter;
        setCategory(activeCat);
    });

    function updateCount(count) {
        const countEl = document.getElementById('results-count');
        if (count === 0) countEl.innerText = 'No levels found';
        else countEl.innerText = `Showing ${count} level${count !== 1 ? 's' : ''}`;
    }

    // --- Interactive Utilities (Completion & TTS) ---
    // These functions rely on global logic but are initialized here for the grid cards
    function toggleCompletion(id, btn) {
        // Simple toggle visual for now (actual logic handled in footer/global js generally)
        // In a real app, this would save to localStorage
        const icon = btn.querySelector('i');
        if (btn.classList.contains('bg-green-100')) {
            // Undo
            btn.classList.remove('bg-green-100', 'text-green-600');
            btn.classList.add('bg-base-bg', 'text-text-secondary');
        } else {
            // Complete
            btn.classList.remove('bg-base-bg', 'text-text-secondary');
            btn.classList.add('bg-green-100', 'text-green-600');
            confetti({
                particleCount: 100,
                spread: 70,
                origin: { y: 0.6 }
            });
        }
    }

    function toggleSpeech(btn, title, desc) {
        if ('speechSynthesis' in window) {
            if (window.speechSynthesis.speaking) {
                window.speechSynthesis.cancel();
                return;
            }
            const utterance = new SpeechSynthesisUtterance(title + ". " + desc);
            window.speechSynthesis.speak(utterance);
        }
    }
</script>

<?php include 'src/footer.php'; ?>