<?php include 'src/header.php'; ?>

    <!-- MAIN HERO -->
    <div class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <i class="fas fa-shapes absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
            <i class="fas fa-calculator absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto text-center">
            <div class="bg-white/20 border border-white/20 p-8 md:p-12 rounded-3xl shadow-2xl animate-fade-in-up">
                <span class="inline-block py-1 px-4 rounded-full bg-black/20 text-white text-xs font-bold mb-6 tracking-wide uppercase border border-white/20 shadow-sm">Accessible Education for All</span>
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight drop-shadow-lg text-white">
                    Learning Without <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-200 to-emerald-100">Limits</span>
                </h1>
                <p class="text-lg md:text-2xl mb-10 text-blue-50 max-w-3xl mx-auto leading-relaxed font-light drop-shadow-md">
                    Empowering every student with personalized, accessible, and engaging educational experiences designed for <span class="font-bold text-white border-b-2 border-teal-300/50">how you learn</span>.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#level-grid" class="bg-white text-blue-700 font-bold py-4 px-10 rounded-full shadow-lg transition-transform hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-white/50 text-lg flex items-center justify-center gap-2">
                        <span>Start Learning</span> <i class="fas fa-arrow-down"></i>
                    </a>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12 text-center">
                <div class="p-4 rounded-xl bg-black/30 border border-white/10 shadow-lg">
                    <div class="text-3xl font-bold text-teal-300 mb-1 flex justify-center"><span id="user-progress-stat">0</span>%</div>
                    <div class="text-sm text-blue-100">Your Progress</div>
                </div>
                <!-- Streak -->
                <div class="p-4 rounded-xl bg-black/30 border border-white/10 shadow-lg">
                    <div class="text-3xl font-bold text-amber-300 mb-1 flex justify-center items-center gap-2">
                        <i class="fas fa-fire text-2xl"></i> <span id="streak-stat">0</span>
                    </div>
                    <div class="text-sm text-blue-100">Day Streak</div>
                </div>
                <div class="p-4 rounded-xl bg-black/30 border border-white/10 shadow-lg">
                    <div class="text-3xl font-bold text-rose-300 mb-1"><i class="fas fa-check"></i></div>
                    <div class="text-sm text-blue-100">Free to Use</div>
                </div>
                <div class="p-4 rounded-xl bg-black/30 border border-white/10 shadow-lg">
                    <div class="text-3xl font-bold text-violet-300 mb-1"><i class="fas fa-lock"></i></div>
                    <div class="text-sm text-blue-100">Private & Secure</div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="container mx-auto my-10 px-4 scroll-mt-24" id="main-content" tabindex="-1">
        
        <!-- Resume Banner -->
        <div id="resume-banner" class="hidden mb-12 bg-gradient-to-r from-teal-500 to-emerald-600 rounded-2xl p-1 shadow-lg transform hover:-translate-y-1 transition-all cursor-pointer group">
            <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 flex flex-col md:flex-row items-center justify-between gap-4 h-full border border-white/10">
                <div class="flex items-center gap-4 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform shadow-inner"><i class="fas fa-play"></i></div>
                    <div>
                        <h2 class="text-xl font-bold">Welcome Back!</h2>
                        <p class="text-blue-50">Ready to continue with <span id="next-level-name" class="font-bold underline text-white decoration-amber-400 decoration-2"></span>?</p>
                    </div>
                </div>
                <button class="bg-white text-teal-700 px-8 py-3 rounded-full font-bold hover:bg-teal-50 transition-colors shadow-md" type="button">Resume Learning</button>
            </div>
        </div>

        <!-- Filter Controls -->
        <div class="bg-content-bg p-6 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 mb-10 sticky top-24 z-30 transition-colors duration-300">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-3">
                    <span class="w-2 h-8 bg-gradient-to-b from-primary to-accent rounded-full shadow-sm"></span>
                    <h2 class="text-2xl font-bold text-text-default">Select Your Grade</h2>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto items-center">
                    <!-- Search -->
                    <div class="relative w-full sm:w-64">
                        <label for="level-search" class="sr-only">Filter grades</label>
                        <input type="text" id="level-search" placeholder="Filter grades..." class="w-full pl-10 pr-10 py-2.5 rounded-full border border-gray-300 dark:border-gray-600 bg-base-bg text-text-default focus:ring-2 focus:ring-primary transition-all shadow-sm">
                        <i class="fas fa-filter absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <button id="clear-search" onclick="resetFilters()" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary hidden focus:outline-none" aria-label="Clear Search" type="button"><i class="fas fa-times-circle"></i></button>
                    </div>
                    <!-- Categories -->
                    <div class="flex flex-wrap justify-center gap-2" role="group" aria-label="Filter Categories">
                        <button onclick="setCategory('all')" class="filter-btn active px-4 py-2 rounded-full text-sm font-bold bg-gray-800 text-white transition-all shadow-sm" data-filter="all" type="button">All</button>
                        <button onclick="setCategory('elem')" class="filter-btn px-4 py-2 rounded-full text-sm font-bold bg-teal-50 text-teal-700 hover:bg-teal-100 transition-all" data-filter="elem" type="button">Elem</button>
                        <button onclick="setCategory('middle')" class="filter-btn px-4 py-2 rounded-full text-sm font-bold bg-amber-50 text-amber-700 hover:bg-amber-100 transition-all" data-filter="middle" type="button">Middle</button>
                        <button onclick="setCategory('high')" class="filter-btn px-4 py-2 rounded-full text-sm font-bold bg-rose-50 text-rose-700 hover:bg-rose-100 transition-all" data-filter="high" type="button">High</button>
                    </div>
                </div>
            </div>
            <div class="mt-2 text-sm text-text-secondary text-right" id="results-count" aria-live="polite">Showing all levels</div>
        </div>

        <!-- Grid Container -->
        <section id="level-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" aria-label="Grade Levels"></section>

        <!-- Empty State -->
        <div id="no-results" class="hidden text-center py-24 px-4">
            <div class="inline-block p-6 rounded-full bg-base-bg mb-4"><i class="fas fa-search text-4xl text-gray-300"></i></div>
            <h3 class="text-xl font-bold text-text-default mb-2">No levels found</h3>
            <p class="text-text-secondary mb-6">We couldn't find anything matching your search.</p>
            <button onclick="resetFilters()" class="text-primary font-bold hover:underline" type="button">Clear Search & Filters</button>
        </div>
    </main>

    <!-- PAGE SPECIFIC LOGIC -->
    <script>
        // --- DATA ---
        const learningLevels = [
            {id: 'pre-k', category: 'elem', title: 'Pre-K', description: 'Counting objects, letter names, rhyming words, and more. Foundational skills.', link: '#', icon: 'fas fa-shapes'},
            {id: 'kindergarten', category: 'elem', title: 'Kindergarten', description: 'Basic math concepts, phonics, early reading. Building blocks for a strong start.', link: '#', icon: 'fas fa-puzzle-piece'},
            {id: 'grade-1', category: 'elem', title: 'Grade 1', description: 'Adding, subtracting, sentence formation. Developing independence.', link: '#', icon: 'fas fa-pencil-alt'},
            {id: 'grade-2', category: 'elem', title: 'Grade 2', description: 'Basic multiplication, reading fluency. Expanding foundational knowledge.', link: '#', icon: 'fas fa-book-open'},
            {id: 'grade-3', category: 'elem', title: 'Grade 3', description: 'Multiplication, division, reading comprehension. Critical thinking.', link: '#', icon: 'fas fa-calculator'},
            {id: 'grade-4', category: 'elem', title: 'Grade 4', description: 'Advanced multiplication, division, reading comprehension. Deeper dives.', link: '#', icon: 'fas fa-divide'},
            {id: 'grade-5', category: 'elem', title: 'Grade 5', description: 'Decimals, essay writing, ecosystems. Preparing for middle school.', link: '#', icon: 'fas fa-atom'},
            {id: 'grade-6', category: 'middle', title: 'Grade 6', description: 'Fractions, essay writing, earth science. Transitioning to complex subjects.', link: '#', icon: 'fas fa-globe-americas'},
            {id: 'grade-7', category: 'middle', title: 'Grade 7', description: 'Proportional relationships, persuasive writing, life science. Middle school mastery.', link: '#', icon: 'fas fa-dna'},
            {id: 'grade-8', category: 'middle', title: 'Grade 8', description: 'Linear equations, historical analysis, earth science. Pre-high school readiness.', link: '#', icon: 'fas fa-history'},
            {id: 'grade-9', category: 'high', title: 'Grade 9', description: 'Algebra, literature, physical science. Introduction to high school.', link: '#', icon: 'fas fa-flask'},
            {id: 'grade-10', category: 'high', title: 'Grade 10', description: 'Geometry, world history, biology. Broadening academic horizons.', link: '#', icon: 'fas fa-project-diagram'},
            {id: 'grade-11', category: 'high', title: 'Grade 11', description: 'Pre-calculus, advanced literature, chemistry. College prep.', link: '#', icon: 'fas fa-microscope'},
            {id: 'grade-12', category: 'high', title: 'Grade 12', description: 'Advanced calculus, literature analysis, physics. Final preparations.', link: '#', icon: 'fas fa-graduation-cap'},
            {id: 'test-section', category: 'extra', title: 'Test/Extra', description: 'Practice with quizzes, review extra materials, and challenge yourself.', link: '#', icon: 'fas fa-star'}
        ];

        const themeMap = {
            'elem': { border: 'border-teal-400 dark:border-teal-500', icon_bg: 'bg-teal-100 dark:bg-teal-900', icon_text: 'text-teal-600 dark:text-teal-300', hover: 'hover:border-teal-500', btn: 'hover:bg-teal-500 hover:text-white', accent: 'text-teal-600 dark:text-teal-400' },
            'middle': { border: 'border-amber-400 dark:border-amber-500', icon_bg: 'bg-amber-100 dark:bg-amber-900', icon_text: 'text-amber-600 dark:text-amber-300', hover: 'hover:border-amber-500', btn: 'hover:bg-amber-500 hover:text-white', accent: 'text-amber-600 dark:text-amber-400' },
            'high': { border: 'border-rose-400 dark:border-rose-500', icon_bg: 'bg-rose-100 dark:bg-rose-900', icon_text: 'text-rose-600 dark:text-rose-300', hover: 'hover:border-rose-500', btn: 'hover:bg-rose-500 hover:text-white', accent: 'text-rose-600 dark:text-rose-400' },
            'extra': { border: 'border-violet-400 dark:border-violet-500', icon_bg: 'bg-violet-100 dark:bg-violet-900', icon_text: 'text-violet-600 dark:text-violet-300', hover: 'hover:border-violet-500', btn: 'hover:bg-violet-500 hover:text-white', accent: 'text-violet-600 dark:text-violet-400' }
        };

        // --- STATE ---
        let currentCategory = 'all';
        let completedLevels = [];
        let bookmarkedLevels = [];
        let searchTimeout = null;

        // --- INIT ---
        document.addEventListener("DOMContentLoaded", () => {
            loadProgress();
            checkStreak();
            renderGrid();
            checkResumeLearning();

            // Search Debounce
            document.getElementById('level-search')?.addEventListener('input', () => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(applyFilters, 250);
            });
        });

        // --- RENDER GRID ---
        function renderGrid() {
            const grid = document.getElementById('level-grid');
            grid.innerHTML = ''; 
            const sortedLevels = [...learningLevels].sort((a, b) => {
                const aBook = bookmarkedLevels.includes(a.id) ? 1 : 0;
                const bBook = bookmarkedLevels.includes(b.id) ? 1 : 0;
                return bBook - aBook;
            });

            sortedLevels.forEach(level => {
                const theme = themeMap[level.category] || themeMap['elem'];
                const isBookmarked = bookmarkedLevels.includes(level.id);
                
                const cardHTML = `
                <article class="level-card group relative flex flex-col h-full" 
                    data-category="${level.category}" 
                    data-title="${level.title.toLowerCase()}" 
                    data-desc="${level.description.toLowerCase()}" 
                    data-id="${level.id}">
                    
                    <div class="bg-content-bg h-full rounded-2xl shadow-lg border-t-8 ${theme.border} border-l border-r border-b border-gray-100 dark:border-gray-700 hover:border-transparent ${theme.hover} transition-all duration-300 p-8 flex flex-col overflow-hidden hover:shadow-2xl hover:-translate-y-1">
                        
                        <div class="absolute -right-6 -bottom-6 text-[8rem] opacity-5 transform rotate-12 group-hover:scale-110 transition-transform duration-500 pointer-events-none ${theme.accent}">
                            <i class="${level.icon}"></i>
                        </div>

                        <div class="absolute top-4 right-4 flex gap-2 z-20">
                            <button type="button" class="bookmark-toggle w-10 h-10 rounded-full transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-sm ${isBookmarked ? 'bg-yellow-100 text-yellow-500' : 'bg-base-bg text-text-secondary hover:text-yellow-500'}" onclick="toggleBookmark('${level.id}')" aria-label="${isBookmarked ? 'Remove Bookmark' : 'Bookmark Level'}">
                                <i class="${isBookmarked ? 'fas' : 'far'} fa-star"></i>
                            </button>
                            <button type="button" class="w-10 h-10 rounded-full bg-base-bg text-text-secondary hover:text-primary hover:bg-primary/10 transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary shadow-sm" onclick="toggleSpeech(this, '${level.title}', '${level.description}')" aria-label="Read Aloud">
                                <i class="fas fa-volume-up"></i>
                            </button>
                            <!-- Teacher Override -->
                            <button type="button" class="completion-toggle w-10 h-10 rounded-full bg-base-bg text-text-secondary hover:text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-green-500 shadow-sm" onclick="manualToggleCompletion('${level.id}', this)" aria-label="Mark Complete (Manual)">
                                <i class="fas fa-check"></i>
                            </button>
                        </div>

                        <div class="flex items-center gap-4 mb-4 relative z-10">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-xl shadow-inner transition-colors ${theme.icon_bg} ${theme.icon_text}">
                                <i class="${level.icon}"></i>
                            </div>
                            <h3 class="text-xl font-bold text-text-default group-hover:text-current transition-colors ${theme.accent}">${level.title}</h3>
                        </div>

                        <p class="text-text-secondary mb-8 flex-grow leading-relaxed relative z-10">${level.description}</p>

                        <!-- Direct Link -->
                        <a href="${level.link}" class="mt-auto relative z-10 w-full flex justify-between items-center bg-base-bg text-text-default font-bold py-3 px-6 rounded-xl transition-all duration-300 group-focus:ring-4 ${theme.btn}">
                            <span>Explore Skills</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </article>`;
                grid.insertAdjacentHTML('beforeend', cardHTML);
            });
            updateProgressUI();
        }

        // --- FILTERING ---
        function setCategory(cat) {
            currentCategory = cat;
            document.querySelectorAll('.filter-btn').forEach(btn => {
                if (btn.dataset.filter === cat) {
                    btn.classList.remove('bg-gray-200', 'text-gray-700', 'bg-teal-50', 'bg-amber-50', 'bg-rose-50');
                    if (cat === 'all') btn.classList.add('bg-gray-800', 'text-white');
                    else if (cat === 'elem') btn.classList.add('bg-teal-500', 'text-white');
                    else if (cat === 'middle') btn.classList.add('bg-amber-500', 'text-white');
                    else if (cat === 'high') btn.classList.add('bg-rose-500', 'text-white');
                } else {
                    btn.className = 'filter-btn px-4 py-2 rounded-full text-sm font-bold transition-all'; 
                    if (btn.dataset.filter === 'all') btn.classList.add('bg-gray-200', 'text-gray-700');
                    else if (btn.dataset.filter === 'elem') btn.classList.add('bg-teal-50', 'text-teal-700', 'hover:bg-teal-100');
                    else if (btn.dataset.filter === 'middle') btn.classList.add('bg-amber-50', 'text-amber-700', 'hover:bg-amber-100');
                    else if (btn.dataset.filter === 'high') btn.classList.add('bg-rose-50', 'text-rose-700', 'hover:bg-rose-100');
                }
            });
            applyFilters();
        }

        function applyFilters() {
            const input = document.getElementById('level-search');
            const term = input.value.toLowerCase().trim();
            const clearBtn = document.getElementById('clear-search');
            if (term) clearBtn.classList.remove('hidden'); else clearBtn.classList.add('hidden');

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

        function resetFilters() {
            document.getElementById('level-search').value = '';
            setCategory('all');
        }

        // --- PROGRESS ---
        function loadProgress() {
            try {
                const storedComp = localStorage.getItem('hl_completed_levels');
                if (storedComp) completedLevels = JSON.parse(storedComp);
                const storedBook = localStorage.getItem('hl_bookmarked_levels');
                if (storedBook) bookmarkedLevels = JSON.parse(storedBook);
            } catch (e) { }
        }

        function checkStreak() {
            const lastVisit = localStorage.getItem('hl_last_visit');
            const streakCount = parseInt(localStorage.getItem('hl_streak') || '0');
            const today = new Date().toDateString();
            
            if (lastVisit === today) {
                document.getElementById('streak-stat').textContent = streakCount;
            } else if (lastVisit) {
                const yesterday = new Date();
                yesterday.setDate(yesterday.getDate() - 1);
                if (lastVisit === yesterday.toDateString()) {
                    const newStreak = streakCount + 1;
                    localStorage.setItem('hl_streak', newStreak);
                    document.getElementById('streak-stat').textContent = newStreak;
                    localStorage.setItem('hl_last_visit', today);
                } else {
                    localStorage.setItem('hl_streak', 1);
                    document.getElementById('streak-stat').textContent = 1;
                    localStorage.setItem('hl_last_visit', today);
                }
            } else {
                localStorage.setItem('hl_streak', 1);
                document.getElementById('streak-stat').textContent = 1;
                localStorage.setItem('hl_last_visit', today);
            }
        }

        function toggleBookmark(id) {
            const index = bookmarkedLevels.indexOf(id);
            if (index > -1) bookmarkedLevels.splice(index, 1);
            else bookmarkedLevels.push(id);
            localStorage.setItem('hl_bookmarked_levels', JSON.stringify(bookmarkedLevels));
            renderGrid();
        }

        function manualToggleCompletion(id, btn) {
            const index = completedLevels.indexOf(id);
            if (index > -1) {
                completedLevels.splice(index, 1);
            } else {
                completedLevels.push(id);
                // Added Missing Confetti for Manual Toggle
                const rect = btn.getBoundingClientRect();
                const x = rect.left / window.innerWidth;
                const y = rect.top / window.innerHeight;
                triggerConfetti({ x, y });
            }
            localStorage.setItem('hl_completed_levels', JSON.stringify(completedLevels));
            updateProgressUI();
            checkResumeLearning();
        }

        function updateProgressUI() {
            document.querySelectorAll('.completion-toggle').forEach(btn => {
                const id = btn.closest('.level-card').dataset.id;
                if (completedLevels.includes(id)) {
                    btn.classList.add('bg-green-500', 'text-white');
                    btn.classList.remove('bg-base-bg', 'text-text-secondary');
                    btn.closest('.level-card').querySelector('.bg-content-bg').classList.add('ring-2', 'ring-green-400');
                } else {
                    btn.classList.remove('bg-green-500', 'text-white');
                    btn.classList.add('bg-base-bg', 'text-text-secondary');
                    btn.closest('.level-card').querySelector('.bg-content-bg').classList.remove('ring-2', 'ring-green-400');
                }
            });
            const total = learningLevels.length;
            const count = completedLevels.length;
            const pct = total ? Math.round((count / total) * 100) : 0;
            document.getElementById('user-progress-stat').textContent = pct;
        }

        function checkResumeLearning() {
            const banner = document.getElementById('resume-banner');
            if (!banner) return;
            if (completedLevels.length === 0) {
                banner.classList.add('hidden');
                return;
            }
            const nextLevel = learningLevels.find(l => !completedLevels.includes(l.id));
            if (nextLevel) {
                document.getElementById('next-level-name').textContent = nextLevel.title;
                banner.onclick = () => window.location.href = nextLevel.link;
                banner.classList.remove('hidden');
            } else {
                banner.classList.add('hidden');
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
            document.querySelectorAll('.speaking').forEach(b => {
                b.classList.remove('speaking', 'text-primary', 'animate-pulse');
                b.innerHTML = '<i class="fas fa-volume-up"></i>';
            });
            const utterance = new SpeechSynthesisUtterance(`${title}. ${desc}`);
            utterance.onend = () => {
                btn.classList.remove('speaking', 'text-primary', 'animate-pulse');
                btn.innerHTML = '<i class="fas fa-volume-up"></i>';
            };
            btn.classList.add('speaking', 'text-primary', 'animate-pulse');
            btn.innerHTML = '<i class="fas fa-stop"></i>';
            window.speechSynthesis.speak(utterance);
        }
    </script>

<?php include 'src/footer.php'; ?>