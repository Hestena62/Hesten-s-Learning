<?php
$pageTitle = "Hesten's Learning - Accessible Education";
$pageDescription = "Personalized learning in Math, ELA, and Science.";

// Defined colors for safe-listing in Tailwind
// We use full class strings in the map to ensure the JIT engine picks them up.
$levelStyles = [
    'elem' => [
        'bg_light' => 'bg-teal-100', 'bg_dark' => 'dark:bg-teal-900/30',
        'text_light' => 'text-teal-600', 'text_dark' => 'dark:text-teal-400',
        'border_hover' => 'hover:border-teal-500'
    ],
    'middle' => [
        'bg_light' => 'bg-amber-100', 'bg_dark' => 'dark:bg-amber-900/30',
        'text_light' => 'text-amber-600', 'text_dark' => 'dark:text-amber-400',
        'border_hover' => 'hover:border-amber-500'
    ],
    'high' => [
        'bg_light' => 'bg-rose-100', 'bg_dark' => 'dark:bg-rose-900/30',
        'text_light' => 'text-rose-600', 'text_dark' => 'dark:text-rose-400',
        'border_hover' => 'hover:border-rose-500'
    ],
    'extra' => [
        'bg_light' => 'bg-violet-100', 'bg_dark' => 'dark:bg-violet-900/30',
        'text_light' => 'text-violet-600', 'text_dark' => 'dark:text-violet-400',
        'border_hover' => 'hover:border-violet-500'
    ]
];

$learningLevels = [
    ['id' => 'pre-k', 'category' => 'elem', 'title' => 'Pre-K', 'description' => 'Counting objects, letter names, rhyming words.', 'link' => '/Level/a.php', 'icon' => 'fas fa-shapes'],
    ['id' => 'kindergarten', 'category' => 'elem', 'title' => 'Kindergarten', 'description' => 'Basic math concepts, phonics, early reading.', 'link' => '/Level/b.php', 'icon' => 'fas fa-puzzle-piece'],
    ['id' => 'grade-1', 'category' => 'elem', 'title' => 'Grade 1', 'description' => 'Adding, subtracting, sentence formation.', 'link' => '/Level/c.php', 'icon' => 'fas fa-pencil-alt'],
    ['id' => 'grade-2', 'category' => 'elem', 'title' => 'Grade 2', 'description' => 'Basic multiplication, reading fluency.', 'link' => '/Level/d.php', 'icon' => 'fas fa-book-open'],
    ['id' => 'grade-3', 'category' => 'elem', 'title' => 'Grade 3', 'description' => 'Multiplication, division, reading comprehension.', 'link' => '/Level/e.php', 'icon' => 'fas fa-calculator'],
    ['id' => 'grade-4', 'category' => 'elem', 'title' => 'Grade 4', 'description' => 'Advanced multiplication, deeper reading.', 'link' => '/Level/f.php', 'icon' => 'fas fa-divide'],
    ['id' => 'grade-5', 'category' => 'elem', 'title' => 'Grade 5', 'description' => 'Decimals, essay writing, ecosystems.', 'link' => '/Level/g.php', 'icon' => 'fas fa-atom'],
    ['id' => 'grade-6', 'category' => 'middle', 'title' => 'Grade 6', 'description' => 'Fractions, earth science, essays.', 'link' => '/Level/h.php', 'icon' => 'fas fa-globe-americas'],
    ['id' => 'grade-7', 'category' => 'middle', 'title' => 'Grade 7', 'description' => 'Proportions, persuasive writing, biology.', 'link' => '/Level/i.php', 'icon' => 'fas fa-dna'],
    ['id' => 'grade-8', 'category' => 'middle', 'title' => 'Grade 8', 'description' => 'Linear equations, history, analysis.', 'link' => '/Level/j.php', 'icon' => 'fas fa-history'],
    ['id' => 'grade-9', 'category' => 'high', 'title' => 'Grade 9', 'description' => 'Algebra, literature, physical science.', 'link' => '/Level/k.php', 'icon' => 'fas fa-flask'],
    ['id' => 'grade-10', 'category' => 'high', 'title' => 'Grade 10', 'description' => 'Geometry, world history, biology.', 'link' => '/Level/l.php', 'icon' => 'fas fa-project-diagram'],
    ['id' => 'grade-11', 'category' => 'high', 'title' => 'Grade 11', 'description' => 'Pre-calculus, chemistry, lit analysis.', 'link' => '/Level/m.php', 'icon' => 'fas fa-microscope'],
    ['id' => 'grade-12', 'category' => 'high', 'title' => 'Grade 12', 'description' => 'Calculus, physics, college prep.', 'link' => '/Level/n.php', 'icon' => 'fas fa-graduation-cap'],
    ['id' => 'test-section', 'category' => 'extra', 'title' => 'Test/Extra', 'description' => 'Practice quizzes and extra materials.', 'link' => '/test', 'icon' => 'fas fa-star']
];

include 'src/header.php';
?>

<!-- Hero Section with Floating Animations -->
<div class="relative bg-gradient-to-br from-primary/5 via-base-bg to-accent/10 border-b border-border-color py-24 px-4 text-center overflow-hidden">
    <!-- Abstract Background Decorations -->
    <div class="absolute top-10 left-10 w-32 h-32 bg-primary/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-10 right-10 w-48 h-48 bg-secondary/10 rounded-full blur-3xl animate-float-delayed"></div>

    <div class="relative max-w-4xl mx-auto z-10">
        <span class="inline-block py-1.5 px-4 rounded-full bg-content-bg border border-border-color text-primary text-xs font-bold uppercase tracking-wider mb-6 shadow-sm">
            <i class="fas fa-universal-access mr-2"></i> Inclusive Education
        </span>
        <h1 class="text-5xl md:text-7xl font-extrabold text-text-default mb-6 leading-tight tracking-tight">
            Learning Without <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Limits</span>
        </h1>
        <p class="text-xl text-text-muted mb-10 leading-relaxed max-w-2xl mx-auto font-light">
            Empowering every student with personalized, accessible, and engaging educational experiences.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#level-grid" class="bg-primary hover:bg-secondary text-white font-bold py-4 px-10 rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                Start Learning <i class="fas fa-arrow-down animate-bounce"></i>
            </a>
            <a href="/about.php" class="bg-content-bg border border-border-color text-text-default hover:text-primary font-semibold py-4 px-10 rounded-full shadow-sm hover:shadow-md transition-all">
                Learn More
            </a>
        </div>
    </div>
</div>

<main class="container mx-auto px-4 py-16" id="main-content">

    <!-- Controls Bar -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12 bg-content-bg p-6 rounded-2xl border border-border-color shadow-sm sticky top-4 z-20">
        <div class="flex items-center gap-3">
            <div class="w-1.5 h-8 bg-primary rounded-full"></div>
            <h2 class="text-2xl font-bold text-text-default">Select Grade</h2>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto items-center">
            <div class="relative w-full sm:w-64">
                <input type="text" id="level-search" placeholder="Filter grades..." class="w-full pl-10 pr-10 py-3 border border-border-color rounded-xl bg-base-bg text-text-default text-sm focus:ring-2 focus:ring-primary outline-none shadow-inner">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-text-muted text-xs"></i>
                <button id="clear-search" onclick="resetFilters()" class="hidden absolute right-3 top-1/2 -translate-y-1/2 text-text-muted hover:text-primary"><i class="fas fa-times-circle"></i></button>
            </div>

            <div class="flex gap-2">
                <button onclick="setCategory('all')" class="filter-btn active px-4 py-2 rounded-lg text-sm font-bold bg-text-default text-base-bg border border-text-default shadow-sm transform scale-105" data-filter="all">All</button>
                <button onclick="setCategory('elem')" class="filter-btn px-4 py-2 rounded-lg text-sm font-bold bg-base-bg text-text-default border border-border-color hover:border-teal-500 hover:text-teal-600 transition-all" data-filter="elem">Elem</button>
                <button onclick="setCategory('middle')" class="filter-btn px-4 py-2 rounded-lg text-sm font-bold bg-base-bg text-text-default border border-border-color hover:border-amber-500 hover:text-amber-600 transition-all" data-filter="middle">Middle</button>
                <button onclick="setCategory('high')" class="filter-btn px-4 py-2 rounded-lg text-sm font-bold bg-base-bg text-text-default border border-border-color hover:border-rose-500 hover:text-rose-600 transition-all" data-filter="high">High</button>
            </div>
        </div>
    </div>

    <!-- Grid -->
    <div id="level-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pb-10">
        <?php foreach ($learningLevels as $level): 
            $style = $levelStyles[$level['category']] ?? $levelStyles['elem'];
        ?>
            <!-- Flip Card -->
            <div class="level-card group h-80 cursor-pointer perspective-1000"
                 onclick="flipCard(this)"
                 data-category="<?php echo $level['category']; ?>"
                 data-title="<?php echo strtolower($level['title']); ?>"
                 data-desc="<?php echo strtolower($level['description']); ?>">
                
                <div class="card-inner relative w-full h-full text-center transition-transform duration-700 transform-style-3d shadow-lg rounded-2xl">
                    
                    <!-- Front -->
                    <div class="card-front absolute w-full h-full backface-hidden bg-content-bg border border-border-color rounded-2xl p-8 flex flex-col items-center justify-center gap-6 hover:shadow-xl transition-all <?php echo $style['border_hover']; ?>">
                        <div class="w-24 h-24 rounded-2xl <?php echo $style['bg_light'] . ' ' . $style['bg_dark']; ?> flex items-center justify-center <?php echo $style['text_light'] . ' ' . $style['text_dark']; ?> text-4xl shadow-sm mb-2">
                            <i class="<?php echo $level['icon']; ?>"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-text-default"><?php echo $level['title']; ?></h3>
                        <div class="mt-auto text-text-muted text-xs font-bold uppercase tracking-widest opacity-70">
                            Click to Flip <i class="fas fa-sync-alt ml-1"></i>
                        </div>
                    </div>

                    <!-- Back -->
                    <div class="card-back absolute w-full h-full backface-hidden rotate-y-180 bg-content-bg border-2 border-primary/20 rounded-2xl p-8 flex flex-col items-center justify-between shadow-2xl">
                        <div class="w-full flex justify-between items-center pb-4 border-b border-border-color">
                            <h3 class="text-xl font-bold text-primary"><?php echo $level['title']; ?></h3>
                            <button class="text-text-muted hover:text-primary p-2 hover:bg-base-bg rounded-full transition-colors" onclick="event.stopPropagation(); toggleSpeech(this, '<?php echo addslashes($level['title']); ?>', '<?php echo addslashes($level['description']); ?>')">
                                <i class="fas fa-volume-up"></i>
                            </button>
                        </div>

                        <p class="text-text-default leading-relaxed text-sm py-4"><?php echo $level['description']; ?></p>

                        <div class="w-full space-y-3 mt-auto">
                            <a href="<?php echo $level['link']; ?>" onclick="event.stopPropagation();" class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-6 rounded-xl transition-colors shadow-md flex items-center justify-center gap-2">
                                Explore <i class="fas fa-arrow-right"></i>
                            </a>
                            <button onclick="event.stopPropagation(); toggleCompletion(this, '<?php echo $level['id']; ?>')" class="completion-btn w-full bg-base-bg border border-border-color hover:border-green-500 hover:text-green-600 text-text-muted font-bold py-2 rounded-xl transition-all text-sm flex items-center justify-center gap-2">
                                <i class="fas fa-check"></i> Mark Done
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- No Results -->
    <div id="no-results" class="hidden text-center py-20">
        <div class="w-20 h-20 bg-base-bg rounded-full flex items-center justify-center mx-auto mb-4 text-text-muted text-3xl">
            <i class="fas fa-ghost"></i>
        </div>
        <p class="text-text-muted text-xl font-medium">No results found.</p>
        <button onclick="resetFilters()" class="text-primary font-bold mt-4 hover:underline">Reset</button>
    </div>
</main>

<script>
    let currentCategory = 'all';

    function flipCard(card) {
        card.querySelector('.card-inner').classList.toggle('rotate-y-180');
    }

    function toggleCompletion(btn, id) {
        const isCompleted = btn.classList.contains('bg-green-100');
        if (!isCompleted) {
            btn.classList.add('bg-green-100', 'border-green-500', 'text-green-700', 'dark:bg-green-900', 'dark:text-green-100');
            btn.classList.remove('bg-base-bg', 'text-text-muted');
            btn.innerHTML = '<i class="fas fa-check-circle"></i> Done';
            
            const rect = btn.getBoundingClientRect();
            confetti({
                particleCount: 150,
                spread: 60,
                origin: { x: (rect.left + rect.width/2)/window.innerWidth, y: (rect.top + rect.height/2)/window.innerHeight }
            });
        } else {
            btn.classList.remove('bg-green-100', 'border-green-500', 'text-green-700', 'dark:bg-green-900', 'dark:text-green-100');
            btn.classList.add('bg-base-bg', 'text-text-muted');
            btn.innerHTML = '<i class="fas fa-check"></i> Mark Done';
        }
    }

    function setCategory(cat) {
        currentCategory = cat;
        document.querySelectorAll('.filter-btn').forEach(btn => {
            if (btn.dataset.filter === cat) {
                btn.className = 'filter-btn active px-4 py-2 rounded-lg text-sm font-bold bg-text-default text-base-bg border border-text-default shadow-sm transform scale-105';
            } else {
                btn.className = 'filter-btn px-4 py-2 rounded-lg text-sm font-bold bg-base-bg text-text-default border border-border-color hover:border-primary transition-all';
            }
        });
        applyFilters();
    }

    function applyFilters() {
        const searchVal = document.getElementById('level-search').value.toLowerCase();
        const cards = document.querySelectorAll('.level-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const matchesCat = currentCategory === 'all' || card.dataset.category === currentCategory;
            const matchesSearch = card.dataset.title.includes(searchVal) || card.dataset.desc.includes(searchVal);
            if (matchesCat && matchesSearch) { card.classList.remove('hidden'); visibleCount++; }
            else { card.classList.add('hidden'); }
        });

        const grid = document.getElementById('level-grid');
        const noRes = document.getElementById('no-results');
        const clearBtn = document.getElementById('clear-search');
        
        if (visibleCount === 0) { grid.classList.add('hidden'); noRes.classList.remove('hidden'); } 
        else { grid.classList.remove('hidden'); noRes.classList.add('hidden'); }
        
        if (searchVal.length > 0) clearBtn.classList.remove('hidden'); else clearBtn.classList.add('hidden');
    }

    function resetFilters() {
        document.getElementById('level-search').value = '';
        setCategory('all');
    }

    document.getElementById('level-search').addEventListener('input', applyFilters);

    function toggleSpeech(btn, title, desc) {
        if (window.speechSynthesis.speaking) { window.speechSynthesis.cancel(); return; }
        const text = `${title}. ${desc}`;
        const utterance = new SpeechSynthesisUtterance(text);
        window.speechSynthesis.speak(utterance);
    }
</script>

<?php include 'src/footer.php'; ?>