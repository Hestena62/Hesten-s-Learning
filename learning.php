<?php
// --- Page Configuration ---
$pageTitle       = "My Learning Journey | Hesten's Learning";
$pageDescription = "Track your progress, earn badges, and continue your personalized learning path.";
$pageKeywords    = "dashboard, learning journey, progress, badges, k-12, accessibility";
$pageAuthor      = "Hesten's Learning";

// --- Dynamic Content Array ---
$learningLevels = [
    ['id' => 'pre-k', 'category' => 'elem', 'title' => 'Pre-K', 'description' => 'Counting objects, letter names, rhyming words, and more.', 'link' => '/Level/a.php', 'icon' => 'fas fa-shapes'],
    ['id' => 'kindergarten', 'category' => 'elem', 'title' => 'Kindergarten', 'description' => 'Basic math concepts, phonics, early reading. Building blocks.', 'link' => '/Level/b.php', 'icon' => 'fas fa-puzzle-piece'],
    ['id' => 'grade-1', 'category' => 'elem', 'title' => 'Grade 1', 'description' => 'Adding, subtracting, sentence formation. Developing independence.', 'link' => '/Level/c.php', 'icon' => 'fas fa-pencil-alt'],
    ['id' => 'grade-2', 'category' => 'elem', 'title' => 'Grade 2', 'description' => 'Basic multiplication, reading fluency. Expanding knowledge.', 'link' => '/Level/d.php', 'icon' => 'fas fa-book-open'],
    ['id' => 'grade-3', 'category' => 'elem', 'title' => 'Grade 3', 'description' => 'Multiplication, division, reading comprehension. Critical thinking.', 'link' => '/Level/e.php', 'icon' => 'fas fa-calculator'],
    ['id' => 'grade-4', 'category' => 'elem', 'title' => 'Grade 4', 'description' => 'Advanced multiplication, division, deeper dives.', 'link' => '/Level/f.php', 'icon' => 'fas fa-divide'],
    ['id' => 'grade-5', 'category' => 'elem', 'title' => 'Grade 5', 'description' => 'Decimals, essay writing, ecosystems. Middle school prep.', 'link' => '/Level/g.php', 'icon' => 'fas fa-atom'],
    ['id' => 'grade-6', 'category' => 'middle', 'title' => 'Grade 6', 'description' => 'Fractions, essay writing, earth science.', 'link' => '/Level/h.php', 'icon' => 'fas fa-globe-americas'],
    ['id' => 'grade-7', 'category' => 'middle', 'title' => 'Grade 7', 'description' => 'Proportional relationships, persuasive writing, life science.', 'link' => '/Level/i.php', 'icon' => 'fas fa-dna'],
    ['id' => 'grade-8', 'category' => 'middle', 'title' => 'Grade 8', 'description' => 'Linear equations, historical analysis, pre-high school readiness.', 'link' => '/Level/j.php', 'icon' => 'fas fa-history'],
    ['id' => 'grade-9', 'category' => 'high', 'title' => 'Grade 9', 'description' => 'Algebra, literature, physical science.', 'link' => '/Level/k.php', 'icon' => 'fas fa-flask'],
    ['id' => 'grade-10', 'category' => 'high', 'title' => 'Grade 10', 'description' => 'Geometry, world history, biology.', 'link' => '/Level/l.php', 'icon' => 'fas fa-project-diagram'],
    ['id' => 'grade-11', 'category' => 'high', 'title' => 'Grade 11', 'description' => 'Pre-calculus, advanced literature, chemistry.', 'link' => '/Level/m.php', 'icon' => 'fas fa-microscope'],
    ['id' => 'grade-12', 'category' => 'high', 'title' => 'Grade 12', 'description' => 'Advanced calculus, literature analysis, physics.', 'link' => '/Level/n.p-hp', 'icon' => 'fas fa-graduation-cap'],
    ['id' => 'test-section', 'category' => 'extra', 'title' => 'Test/Extra', 'description' => 'Practice with quizzes and review extra materials.', 'link' => '/test', 'icon' => 'fas fa-star']
];

$themeMap = [
    'elem' => ['border' => 'border-teal-400', 'icon_bg' => 'bg-teal-100', 'icon_text' => 'text-teal-600', 'accent' => 'text-teal-600'],
    'middle' => ['border' => 'border-amber-400', 'icon_bg' => 'bg-amber-100', 'icon_text' => 'text-amber-600', 'accent' => 'text-amber-600'],
    'high' => ['border' => 'border-rose-400', 'icon_bg' => 'bg-rose-100', 'icon_text' => 'text-rose-600', 'accent' => 'text-rose-600'],
    'extra' => ['border' => 'border-violet-400', 'icon_bg' => 'bg-violet-100', 'icon_text' => 'text-violet-600', 'accent' => 'text-violet-600']
];

include 'src/header.php';
?>

<!-- Hero / Dashboard Top -->
<div class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-32 px-4 rounded-b-[3rem] shadow-2xl overflow-hidden mb-[-4rem]">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <i class="fas fa-meteor absolute top-10 left-10 text-8xl text-white/10 rotate-45"></i>
        <i class="fas fa-star absolute bottom-20 right-10 text-[12rem] text-white/5"></i>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div>
                <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-xs font-bold mb-4 uppercase tracking-wider backdrop-blur-md">Your Dashboard</span>
                <h1 class="text-4xl md:text-5xl font-black mb-2 tracking-tight">My Learning Journey</h1>
                <p class="text-blue-100 text-lg font-light max-w-xl">Welcome back! Every lesson you complete brings you closer to your goals.</p>
            </div>
            
            <!-- Quick Stats -->
            <div class="flex gap-4">
                <div class="bg-white/10 backdrop-blur-md p-4 rounded-3xl border border-white/20 shadow-xl text-center w-28">
                    <div class="text-3xl font-black text-teal-300" id="dash-streak">0</div>
                    <div class="text-[10px] uppercase font-bold tracking-widest opacity-70">Streak</div>
                </div>
                <div class="bg-white/10 backdrop-blur-md p-4 rounded-3xl border border-white/20 shadow-xl text-center w-32">
                    <div class="text-3xl font-black text-amber-300" id="dash-level">1</div>
                    <div class="text-[10px] uppercase font-bold tracking-widest opacity-70">Level</div>
                </div>
                <div class="bg-white/10 backdrop-blur-md p-4 rounded-3xl border border-white/20 shadow-xl text-center w-28">
                    <div class="text-3xl font-black text-rose-300" id="dash-badges">0</div>
                    <div class="text-[10px] uppercase font-bold tracking-widest opacity-70">Badges</div>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="container mx-auto px-4 mb-20 relative z-20">
    
    <!-- DASHBOARD GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        
        <!-- Continue Learning -->
        <div class="lg:col-span-2 bg-content-bg rounded-[2.5rem] shadow-xl border border-gray-100 dark:border-gray-800 p-8 flex flex-col md:flex-row items-center gap-8 group">
            <div class="w-32 h-32 rounded-3xl bg-primary/10 flex items-center justify-center text-5xl text-primary shrink-0 transition-transform group-hover:scale-110" id="continue-icon">
                <i class="fas fa-play"></i>
            </div>
            <div class="flex-grow text-center md:text-left">
                <div class="text-xs font-bold text-primary uppercase tracking-widest mb-1">Recommended for you</div>
                <h2 class="text-3xl font-black text-text-default mb-2" id="continue-title">Start Your Journey</h2>
                <p class="text-text-secondary mb-6 line-clamp-2" id="continue-desc">Pick a grade level below to begin your personalized learning path.</p>
                <a href="#browse-all" id="continue-btn" class="inline-flex items-center gap-2 bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-secondary transition-all transform hover:scale-105 shadow-lg">
                    <span>Continue Now</span> <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Progress Overview -->
        <div class="bg-content-bg rounded-[2.5rem] shadow-xl border border-gray-100 dark:border-gray-800 p-8">
            <h3 class="font-black text-xl mb-6 flex items-center gap-2 text-text-default">
                <i class="fas fa-chart-line text-primary"></i> Level Progress
            </h3>
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between text-sm font-bold mb-2">
                        <span class="text-text-secondary">Current XP</span>
                        <span class="text-primary" id="dash-xp-val">0 / 100</span>
                    </div>
                    <div class="w-full h-4 bg-gray-100 dark:bg-gray-700 rounded-full overflow-hidden p-1 shadow-inner">
                        <div id="dash-xp-bar" class="h-full bg-gradient-to-r from-primary to-secondary rounded-full transition-all duration-1000" style="width: 0%"></div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-base-bg rounded-2xl border border-gray-100 dark:border-gray-700">
                        <div class="text-xs font-bold text-text-secondary uppercase mb-1">Completed</div>
                        <div class="text-2xl font-black text-text-default" id="dash-stat-lessons">0</div>
                    </div>
                    <div class="p-4 bg-base-bg rounded-2xl border border-gray-100 dark:border-gray-700">
                        <div class="text-xs font-bold text-text-secondary uppercase mb-1">AI Questions</div>
                        <div class="text-2xl font-black text-text-default" id="dash-stat-questions">0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BADGE CASE -->
    <div class="bg-content-bg rounded-[2.5rem] shadow-xl border border-gray-100 dark:border-gray-800 p-8 mb-12 overflow-hidden">
        <div class="flex justify-between items-center mb-8">
            <h3 class="font-black text-2xl flex items-center gap-3 text-text-default">
                <i class="fas fa-award text-amber-500 text-3xl"></i> My Badge Case
            </h3>
            <span class="text-sm font-bold text-text-secondary" id="badge-count-text">0 / 7 Unlocked</span>
        </div>
        
        <div class="flex flex-wrap gap-6 justify-center" id="badge-gallery">
            <!-- Badges injected by JS -->
        </div>
    </div>

    <!-- BROWSE ALL SECTION -->
    <div id="browse-all" class="scroll-mt-24">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-10">
            <div class="flex items-center gap-3">
                <span class="w-2 h-8 bg-gradient-to-b from-primary to-accent rounded-full shadow-sm"></span>
                <h2 class="text-3xl font-black text-text-default">Explore Curriculum</h2>
            </div>
            
            <div class="flex flex-wrap justify-center gap-2">
                <button onclick="setCategory('all')" class="filter-btn active px-6 py-2 rounded-full text-sm font-black bg-primary text-white shadow-lg transition-all" data-filter="all">All</button>
                <button onclick="setCategory('elem')" class="filter-btn px-6 py-2 rounded-full text-sm font-black bg-teal-50 text-teal-700 hover:bg-teal-100 transition-all" data-filter="elem">Elementary</button>
                <button onclick="setCategory('middle')" class="filter-btn px-6 py-2 rounded-full text-sm font-black bg-amber-50 text-amber-700 hover:bg-amber-100 transition-all" data-filter="middle">Middle</button>
                <button onclick="setCategory('high')" class="filter-btn px-6 py-2 rounded-full text-sm font-black bg-rose-50 text-rose-700 hover:bg-rose-100 transition-all" data-filter="high">High School</button>
            </div>
        </div>

        <section id="level-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($learningLevels as $level) : 
                $theme = $themeMap[$level['category']];
            ?>
            <div class="level-card group" data-category="<?= $level['category'] ?>">
                <div class="bg-content-bg rounded-3xl p-8 border border-gray-100 dark:border-gray-700 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2 border-t-8 <?= $theme['border'] ?>">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-14 h-14 rounded-2xl <?= $theme['icon_bg'] ?> <?= $theme['icon_text'] ?> flex items-center justify-center text-2xl group-hover:rotate-12 transition-transform shadow-inner">
                            <i class="<?= $level['icon'] ?>"></i>
                        </div>
                        <h4 class="text-xl font-black text-text-default"><?= $level['title'] ?></h4>
                    </div>
                    <p class="text-text-secondary text-sm mb-8 line-clamp-2 leading-relaxed"><?= $level['description'] ?></p>
                    <a href="<?= $level['link'] ?>" class="flex items-center justify-between w-full bg-base-bg p-4 rounded-2xl font-bold group-hover:bg-primary group-hover:text-white transition-all shadow-sm">
                        <span>Explore Skills</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        updateDashboard();
        // Listen for updates
        window.addEventListener('gamification-updated', updateDashboard);
    });

    function updateDashboard() {
        if (!window.getGamificationData) return;
        
        const data = window.getGamificationData();
        const defs = window.getBadgeDefinitions();
        
        // Update Stats
        document.getElementById('dash-streak').textContent = data.streak || 0;
        document.getElementById('dash-level').textContent = data.level;
        document.getElementById('dash-badges').textContent = data.badges.length;
        
        document.getElementById('dash-stat-lessons').textContent = data.stats.lessonsCompleted;
        document.getElementById('dash-stat-questions').textContent = data.stats.questionsAsked;
        
        // Progress Bar
        const nextXP = window.getNextLevelXP(data.level);
        const pct = (data.xp / nextXP) * 100;
        document.getElementById('dash-xp-val').textContent = `${data.xp} / ${nextXP}`;
        document.getElementById('dash-xp-bar').style.width = `${pct}%`;
        
        // Badge Gallery
        const gallery = document.getElementById('badge-gallery');
        gallery.innerHTML = '';
        defs.forEach(badge => {
            const isEarned = data.badges.includes(badge.id);
            const badgeEl = document.createElement('div');
            badgeEl.className = `flex flex-col items-center gap-2 p-4 rounded-2xl w-28 text-center transition-all ${isEarned ? 'bg-base-bg shadow-md scale-105 border border-primary/20' : 'opacity-30 grayscale'}`;
            badgeEl.innerHTML = `
                <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-xl ${badge.color}">
                    <i class="${badge.icon}"></i>
                </div>
                <div class="text-[10px] font-black text-text-default uppercase leading-tight">${badge.title}</div>
            `;
            badgeEl.title = isEarned ? badge.desc : 'Locked: ' + badge.desc;
            gallery.appendChild(badgeEl);
        });
        document.getElementById('badge-count-text').textContent = `${data.badges.length} / ${defs.length} Unlocked`;

        // Update "Continue Learning"
        updateRecommended(data);
    }

    function updateRecommended(data) {
        const completed = JSON.parse(localStorage.getItem('hl_completed_levels') || '[]');
        const levels = [
            {id:'pre-k', title:'Pre-K', icon:'fas fa-shapes', desc:'Ready to start the basics?'},
            {id:'kindergarten', title:'Kindergarten', icon:'fas fa-puzzle-piece', desc:'Phonics and counting fun!'},
            {id:'grade-1', title:'Grade 1', icon:'fas fa-pencil-alt', desc:'Sentences and addition.'},
            {id:'grade-2', title:'Grade 2', icon:'fas fa-book-open', desc:'Multiplication and reading fluency.'},
            {id:'grade-3', title:'Grade 3', icon:'fas fa-calculator', desc:'Division and comprehension.'},
            {id:'grade-4', title:'Grade 4', icon:'fas fa-divide', desc:'Advanced math and deep dives.'},
            {id:'grade-5', title:'Grade 5', icon:'fas fa-atom', desc:'Essay writing and ecosystems.'},
            {id:'grade-6', title:'Grade 6', icon:'fas fa-globe-americas', desc:'Fractions and earth science.'},
            {id:'grade-7', title:'Grade 7', icon:'fas fa-dna', desc:'Life science and proportions.'},
            {id:'grade-8', title:'Grade 8', icon:'fas fa-history', desc:'Historical analysis and equations.'},
            {id:'grade-9', title:'Grade 9', icon:'fas fa-flask', desc:'Algebra and physics intro.'},
            {id:'grade-10', title:'Grade 10', icon:'fas fa-project-diagram', desc:'Geometry and biology.'},
            {id:'grade-11', title:'Grade 11', icon:'fas fa-microscope', desc:'Calculus and chemistry prep.'},
            {id:'grade-12', title:'Grade 12', icon:'fas fa-graduation-cap', desc:'The final academic step!'}
        ];

        const next = levels.find(l => !completed.includes(l.id)) || levels[0];
        const titleEl = document.getElementById('continue-title');
        const descEl = document.getElementById('continue-desc');
        const iconEl = document.getElementById('continue-icon');
        const btnEl = document.getElementById('continue-btn');

        if (completed.length > 0) {
            titleEl.textContent = `Resume ${next.title}`;
            descEl.textContent = next.desc;
            iconEl.innerHTML = `<i class="${next.icon}"></i>`;
            btnEl.href = `/Level/${String.fromCharCode(97 + levels.indexOf(next))}.php`;
        }
    }

    function setCategory(cat) {
        document.querySelectorAll('.filter-btn').forEach(btn => {
            if (btn.dataset.filter === cat) {
                btn.classList.add('active', 'bg-primary', 'text-white', 'shadow-lg');
                btn.classList.remove('bg-teal-50', 'text-teal-700', 'bg-amber-50', 'text-amber-700', 'bg-rose-50', 'text-rose-700');
            } else {
                btn.classList.remove('active', 'bg-primary', 'text-white', 'shadow-lg');
                const f = btn.dataset.filter;
                if (f === 'elem') btn.classList.add('bg-teal-50', 'text-teal-700');
                if (f === 'middle') btn.classList.add('bg-amber-50', 'text-amber-700');
                if (f === 'high') btn.classList.add('bg-rose-50', 'text-rose-700');
                if (f === 'all') btn.classList.add('bg-gray-100', 'text-gray-700');
            }
        });

        document.querySelectorAll('.level-card').forEach(card => {
            if (cat === 'all' || card.dataset.category === cat) card.style.display = 'block';
            else card.style.display = 'none';
        });
    }
</script>

<?php include 'src/footer.php'; ?>