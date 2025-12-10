<?php
$pageTitle = "Hesten's Learning - Accessible Education";
$pageDescription = "Personalized learning in Math, ELA, and Science.";

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

<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-primary/5 via-base-bg to-accent/10 border-b border-border-color py-16 px-4 text-center overflow-hidden">
    <div class="absolute top-10 left-10 w-32 h-32 bg-primary/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-10 right-10 w-48 h-48 bg-secondary/10 rounded-full blur-3xl animate-float-delayed"></div>

    <div class="relative max-w-4xl mx-auto z-10">
        <span class="inline-block py-1.5 px-4 rounded-full bg-content-bg border border-border-color text-primary text-xs font-bold uppercase tracking-wider mb-6 shadow-sm">
            <i class="fas fa-universal-access mr-2"></i> Inclusive Education
        </span>
        <h1 class="text-5xl md:text-7xl font-extrabold text-text-default mb-6 leading-tight tracking-tight">
            Learning Without <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Limits</span>
        </h1>
        <p class="text-xl text-text-muted mb-8 leading-relaxed max-w-2xl mx-auto font-light">
            Empowering every student with personalized, accessible, and engaging educational experiences.
        </p>
    </div>
</div>

<main class="container mx-auto px-4 py-8" id="main-content">

    <!-- Progress Dashboard (Dynamic) -->
    <div id="progress-dashboard" class="mb-10 bg-content-bg rounded-2xl p-6 border border-border-color shadow-sm flex flex-col md:flex-row items-center justify-between gap-6 transition-all">
        <div class="flex items-center gap-4 w-full md:w-auto">
            <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center relative">
                <svg class="w-16 h-16 transform -rotate-90">
                    <circle cx="32" cy="32" r="28" stroke="currentColor" stroke-width="4" fill="none" class="text-gray-200 dark:text-gray-700" />
                    <circle id="progress-circle" cx="32" cy="32" r="28" stroke="currentColor" stroke-width="4" fill="none" class="text-primary transition-all duration-1000" stroke-dasharray="176" stroke-dashoffset="176" />
                </svg>
                <span id="progress-text" class="absolute font-bold text-sm text-primary">0%</span>
            </div>
            <div>
                <h2 class="text-xl font-bold text-text-default">Your Progress</h2>
                <p id="progress-subtext" class="text-sm text-text-muted">Start your journey today!</p>
            </div>
        </div>
        
        <div id="resume-container" class="hidden">
             <a id="resume-btn" href="#" class="bg-gradient-to-r from-primary to-secondary hover:opacity-90 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-transform hover:scale-105 flex items-center gap-2">
                <i class="fas fa-play"></i> Resume <span id="resume-target">Learning</span>
            </a>
        </div>
    </div>

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
                <button onclick="setCategory('all')" class="filter-btn active px-4 py-2 rounded-lg text-sm font-bold bg-text-default text-base-bg border border-text-default shadow-sm transition-all" data-filter="all">All</button>
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
            <!-- Accessible Flip Card -->
            <div class="level-card group h-80 perspective-1000"
                 role="button"
                 tabindex="0"
                 onkeydown="handleCardKey(event, this)"
                 onclick="flipCard(this)"
                 data-id="<?php echo $level['id']; ?>"
                 data-category="<?php echo $level['category']; ?>"
                 data-title="<?php echo strtolower($level['title']); ?>"
                 data-desc="<?php echo strtolower($level['description']); ?>">
                
                <div class="card-inner relative w-full h-full text-center transition-transform duration-700 transform-style-3d shadow-lg rounded-2xl">
                    
                    <!-- Front -->
                    <div class="card-front absolute w-full h-full backface-hidden bg-content-bg border border-border-color rounded-2xl p-8 flex flex-col items-center justify-center gap-6 group-focus:ring-4 ring-primary ring-opacity-50 transition-all <?php echo $style['border_hover']; ?>">
                        <div class="w-24 h-24 rounded-2xl <?php echo $style['bg_light'] . ' ' . $style['bg_dark']; ?> flex items-center justify-center <?php echo $style['text_light'] . ' ' . $style['text_dark']; ?> text-4xl shadow-sm mb-2">
                            <i class="<?php echo $level['icon']; ?>"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-text-default"><?php echo $level['title']; ?></h3>
                        
                        <!-- Status Badge (Hidden by default) -->
                        <div class="status-badge hidden bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full absolute top-4 right-4 dark:bg-green-900 dark:text-green-100">
                            <i class="fas fa-check"></i> Done
                        </div>

                        <div class="mt-auto text-text-muted text-xs font-bold uppercase tracking-widest opacity-70">
                            Click or Enter to Flip <i class="fas fa-sync-alt ml-1"></i>
                        </div>
                    </div>

                    <!-- Back -->
                    <div class="card-back absolute w-full h-full backface-hidden rotate-y-180 bg-content-bg border-2 border-primary/20 rounded-2xl p-8 flex flex-col items-center justify-between shadow-2xl">
                        <div class="w-full flex justify-between items-center pb-4 border-b border-border-color">
                            <h3 class="text-xl font-bold text-primary"><?php echo $level['title']; ?></h3>
                            <button tabindex="-1" class="text-text-muted hover:text-primary p-2 hover:bg-base-bg rounded-full transition-colors" onclick="event.stopPropagation(); toggleSpeech(this, '<?php echo addslashes($level['title']); ?>', '<?php echo addslashes($level['description']); ?>')">
                                <i class="fas fa-volume-up"></i>
                            </button>
                        </div>

                        <p class="text-text-default leading-relaxed text-sm py-4"><?php echo $level['description']; ?></p>

                        <div class="w-full space-y-3 mt-auto">
                            <!-- Helper: tabindex is managed via JS when flipped -->
                            <a href="<?php echo $level['link']; ?>" tabindex="-1" class="card-action w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-6 rounded-xl transition-colors shadow-md flex items-center justify-center gap-2">
                                Explore <i class="fas fa-arrow-right"></i>
                            </a>
                            <button tabindex="-1" onclick="event.stopPropagation(); toggleCompletion(this, '<?php echo $level['id']; ?>')" class="card-action completion-btn w-full bg-base-bg border border-border-color hover:border-green-500 hover:text-green-600 text-text-muted font-bold py-2 rounded-xl transition-all text-sm flex items-center justify-center gap-2">
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
        <p class="text-text-muted text-xl font-medium">No results found.</p>
        <button onclick="resetFilters()" class="text-primary font-bold mt-4 hover:underline">Reset</button>
    </div>
</main>

<script>
    let completedLevels = [];
    let currentCategory = 'all';

    // --- Sound Effects (Synthesized to avoid external files) ---
    const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    function playSound(type) {
        if (!currentSettings.soundEnabled) return;
        if (audioCtx.state === 'suspended') audioCtx.resume();
        
        const osc = audioCtx.createOscillator();
        const gain = audioCtx.createGain();
        osc.connect(gain);
        gain.connect(audioCtx.destination);

        if (type === 'flip') {
            osc.frequency.setValueAtTime(400, audioCtx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(600, audioCtx.currentTime + 0.1);
            gain.gain.setValueAtTime(0.05, audioCtx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.1);
            osc.start();
            osc.stop(audioCtx.currentTime + 0.1);
        } else if (type === 'success') {
            osc.frequency.setValueAtTime(600, audioCtx.currentTime);
            osc.frequency.setValueAtTime(800, audioCtx.currentTime + 0.1);
            gain.gain.setValueAtTime(0.1, audioCtx.currentTime);
            gain.gain.linearRampToValueAtTime(0.001, audioCtx.currentTime + 0.4);
            osc.start();
            osc.stop(audioCtx.currentTime + 0.4);
        }
    }

    // --- Initialization ---
    document.addEventListener('DOMContentLoaded', () => {
        loadProgress();
        updateDashboard();
    });

    // --- Persistence Logic ---
    function loadProgress() {
        try { completedLevels = JSON.parse(localStorage.getItem('hl_completed_levels')) || []; } catch(e) {}
        
        // Sync UI
        document.querySelectorAll('.level-card').forEach(card => {
            const id = card.dataset.id;
            const btn = card.querySelector('.completion-btn');
            if(completedLevels.includes(id)) {
                setCardCompleteUI(card, btn, true);
            }
        });
    }

    function saveProgress() {
        localStorage.setItem('hl_completed_levels', JSON.stringify(completedLevels));
        updateDashboard();
    }

    function toggleCompletion(btn, id) {
        const card = btn.closest('.level-card');
        const index = completedLevels.indexOf(id);
        
        if (index === -1) {
            // Mark Complete
            completedLevels.push(id);
            setCardCompleteUI(card, btn, true);
            playSound('success');
            
            // Confetti
            const rect = btn.getBoundingClientRect();
            confetti({
                particleCount: 100,
                spread: 70,
                origin: { x: (rect.left + rect.width/2)/window.innerWidth, y: (rect.top + rect.height/2)/window.innerHeight }
            });
        } else {
            // Mark Incomplete
            completedLevels.splice(index, 1);
            setCardCompleteUI(card, btn, false);
            playSound('flip');
        }
        saveProgress();
    }

    function setCardCompleteUI(card, btn, isComplete) {
        const badge = card.querySelector('.status-badge');
        if (isComplete) {
            btn.classList.add('bg-green-100', 'border-green-500', 'text-green-700', 'dark:bg-green-900', 'dark:text-green-100');
            btn.classList.remove('bg-base-bg', 'text-text-muted');
            btn.innerHTML = '<i class="fas fa-check-circle"></i> Done';
            badge.classList.remove('hidden');
        } else {
            btn.classList.remove('bg-green-100', 'border-green-500', 'text-green-700', 'dark:bg-green-900', 'dark:text-green-100');
            btn.classList.add('bg-base-bg', 'text-text-muted');
            btn.innerHTML = '<i class="fas fa-check"></i> Mark Done';
            badge.classList.add('hidden');
        }
    }

    // --- Dashboard Logic ---
    function updateDashboard() {
        const total = <?php echo count($learningLevels); ?>;
        const count = completedLevels.length;
        const percentage = total === 0 ? 0 : Math.round((count / total) * 100);
        
        // Update Circle
        const offset = 176 - (176 * percentage) / 100;
        document.getElementById('progress-circle').style.strokeDashoffset = offset;
        document.getElementById('progress-text').textContent = percentage + '%';
        
        // Update Text
        const subtext = document.getElementById('progress-subtext');
        const resumeCont = document.getElementById('resume-container');
        
        if(count === 0) {
            subtext.textContent = "Start your journey today!";
            resumeCont.classList.add('hidden');
        } else if (count === total) {
            subtext.textContent = "You're a superstar! All done!";
            resumeCont.classList.add('hidden');
        } else {
            subtext.textContent = "Keep it up! You're doing great.";
            resumeCont.classList.remove('hidden');
            
            // Find next level
            const cards = Array.from(document.querySelectorAll('.level-card'));
            const next = cards.find(c => !completedLevels.includes(c.dataset.id));
            if(next) {
                const title = next.dataset.title;
                const link = next.querySelector('a').getAttribute('href');
                document.getElementById('resume-target').textContent = title.charAt(0).toUpperCase() + title.slice(1);
                document.getElementById('resume-btn').href = link;
            }
        }
    }

    // --- Interaction Logic ---
    function flipCard(card) {
        if(event.target.closest('button') || event.target.closest('a')) return;
        
        playSound('flip');
        const inner = card.querySelector('.card-inner');
        const isFlipped = inner.classList.toggle('rotate-y-180');
        
        // Manage focus for accessibility
        const actions = card.querySelectorAll('.card-action');
        actions.forEach(el => el.setAttribute('tabindex', isFlipped ? '0' : '-1'));
    }

    function handleCardKey(e, card) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            flipCard(card);
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