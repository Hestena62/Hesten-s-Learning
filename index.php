<?php
// --- PHP Page Variables ---
$pageTitle = "Hesten's Learning";
$pageDescription = "Hesten's Learning - Empowering students with learning disabilities through personalized learning experiences.";
$pageKeywords = "learning disabilities, personalized education, online learning, math, ELA, science, social studies";
$pageAuthor = "Hesten's Learning";

// --- Dynamic Content Array ---
// NOTE: I've updated links to be more consistent where possible, but check if Level/B.html etc are correct.
$learningLevels = [
    ['id' => 'pre-k', 'category' => 'elem', 'title' => 'Pre-K', 'description' => 'Counting objects, letter names, rhyming words, and more. Foundational skills.', 'link' => '/Level/A.html', 'icon' => 'fas fa-shapes'],
    ['id' => 'kindergarten', 'category' => 'elem', 'title' => 'Kindergarten', 'description' => 'Basic math concepts, phonics, early reading. Building blocks for a strong start.', 'link' => '/Level/B.html', 'icon' => 'fas fa-puzzle-piece'],
    ['id' => 'grade-1', 'category' => 'elem', 'title' => 'Grade 1', 'description' => 'Adding, subtracting, sentence formation. Developing independence.', 'link' => '/Level/C.html', 'icon' => 'fas fa-pencil-alt'],
    ['id' => 'grade-2', 'category' => 'elem', 'title' => 'Grade 2', 'description' => 'Basic multiplication, reading fluency. Expanding foundational knowledge.', 'link' => '/Level/D.html', 'icon' => 'fas fa-book-open'], // Changed link to D (assuming progression) or verify if it should be B?
    ['id' => 'grade-3', 'category' => 'elem', 'title' => 'Grade 3', 'description' => 'Multiplication, division, reading comprehension. Critical thinking.', 'link' => '/Level/D.html', 'icon' => 'fas fa-calculator'],
    ['id' => 'grade-4', 'category' => 'elem', 'title' => 'Grade 4', 'description' => 'Advanced multiplication, division, reading comprehension. Deeper dives.', 'link' => '/Level/E.html', 'icon' => 'fas fa-divide'], // Changed link to E (unique)
    ['id' => 'grade-5', 'category' => 'elem', 'title' => 'Grade 5', 'description' => 'Decimals, essay writing, ecosystems. Preparing for middle school.', 'link' => '/Level/E.html', 'icon' => 'fas fa-atom'],
    ['id' => 'grade-6', 'category' => 'middle', 'title' => 'Grade 6', 'description' => 'Fractions, essay writing, earth science. Transitioning to complex subjects.', 'link' => '/Level/F.html', 'icon' => 'fas fa-globe-americas'],
    ['id' => 'grade-7', 'category' => 'middle', 'title' => 'Grade 7', 'description' => 'Proportional relationships, persuasive writing, life science. Middle school mastery.', 'link' => '/Level/G.html', 'icon' => 'fas fa-dna'],
    ['id' => 'grade-8', 'category' => 'middle', 'title' => 'Grade 8', 'description' => 'Linear equations, historical analysis, earth science. Pre-high school readiness.', 'link' => '/Level/H.html', 'icon' => 'fas fa-history'],
    ['id' => 'grade-9', 'category' => 'high', 'title' => 'Grade 9', 'description' => 'Algebra, literature, physical science. Introduction to high school.', 'link' => '/Level/I.html', 'icon' => 'fas fa-flask'],
    ['id' => 'grade-10', 'category' => 'high', 'title' => 'Grade 10', 'description' => 'Geometry, world history, biology. Broadening academic horizons.', 'link' => '/Level/J.html', 'icon' => 'fas fa-project-diagram'],
    ['id' => 'grade-11', 'category' => 'high', 'title' => 'Grade 11', 'description' => 'Pre-calculus, advanced literature, chemistry. College prep.', 'link' => '/Level/K.html', 'icon' => 'fas fa-microscope'],
    ['id' => 'grade-12', 'category' => 'high', 'title' => 'Grade 12', 'description' => 'Advanced calculus, literature analysis, physics. Final preparations.', 'link' => '/Level/L.html', 'icon' => 'fas fa-graduation-cap'],
    ['id' => 'test-section', 'category' => 'extra', 'title' => 'Test/Extra', 'description' => 'Practice with quizzes, review extra materials, and challenge yourself.', 'link' => '/test', 'icon' => 'fas fa-star']
];

include 'src/header.php';
?>

<!-- Hero Section with Glassmorphism -->
<!-- Updated Padding: pt-16 pb-16 (was 24/32) and mb-12 (was 16) to reduce space -->
<header class="relative bg-gradient-to-br from-footer-bg-from to-footer-bg-to text-white pt-16 pb-16 px-4 rounded-b-[3rem] shadow-2xl overflow-hidden mb-12">
    <!-- Decorative Animated Background Icons -->
    <div class="absolute inset-0 opacity-10 pointer-events-none select-none overflow-hidden">
        <i class="fas fa-shapes absolute top-10 left-10 text-8xl animate-pulse text-white/50"></i>
        <i class="fas fa-calculator absolute bottom-1/4 right-10 text-[10rem] text-white/30 rotate-12"></i>
        <i class="fas fa-book absolute top-20 right-1/3 text-7xl text-white/40 -rotate-12"></i>
        <!-- Added wiggle animation for engagement -->
        <i class="fas fa-atom absolute bottom-10 left-1/4 text-8xl text-white/40 animate-wiggle" style="animation-duration: 4s;"></i>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-blue-500/20 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto text-center">
        <!-- Content Container -->
        <div class="backdrop-blur-sm bg-white/10 border border-white/20 p-8 md:p-12 rounded-3xl shadow-2xl animate-fade-in-up">
            <span class="inline-block py-1 px-3 rounded-full bg-accent/20 border border-accent/50 text-blue-50 text-sm font-bold mb-4 tracking-wide uppercase">
                Accessible Education for All
            </span>
            <h1 class="text-4xl md:text-7xl font-extrabold mb-6 tracking-tight leading-tight drop-shadow-md">
                Learning Without <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Limits</span>
            </h1>
            <p class="text-xl md:text-2xl mb-10 text-blue-50 max-w-3xl mx-auto leading-relaxed font-light">
                Empowering every student with personalized, accessible, and engaging educational experiences designed for <span class="font-bold text-white">how you learn</span>.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#main-content"
                    class="group bg-white text-blue-700 font-bold py-4 px-10 rounded-full shadow-[0_0_20px_rgba(255,255,255,0.3)] transition-all duration-300 hover:scale-110 hover:shadow-[0_0_30px_rgba(255,255,255,0.5)] focus:outline-none focus:ring-4 focus:ring-white/50 text-lg flex items-center justify-center gap-2 relative overflow-hidden">
                    <span class="relative z-10">Start Learning</span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    <i class="fas fa-arrow-down group-hover:translate-y-1 transition-transform relative z-10"></i>
                </a>
                <a href="about.php"
                    class="bg-transparent border-2 border-white/40 text-white font-bold py-4 px-10 rounded-full transition-all duration-300 hover:bg-white/10 hover:border-white focus:outline-none focus:ring-4 focus:ring-white/50 text-lg">
                    Learn More
                </a>
            </div>
        </div>

        <!-- Quick Stats Bar -->
        <div id="hero-stats" class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12 text-center animate-fade-in-up delay-200">
            <!-- UPDATED: Connected to Real Progress Logic -->
            <div class="p-4 rounded-xl bg-white/5 backdrop-blur-md border border-white/10 hover:bg-white/10 transition-colors">
                <div class="text-3xl font-bold text-accent mb-1 flex justify-center items-center">
                    <span id="user-progress-stat">0</span><span>%</span>
                </div>
                <div class="text-sm text-blue-100">Your Progress</div>
            </div>

            <div class="p-4 rounded-xl bg-white/5 backdrop-blur-md border border-white/10 hover:bg-white/10 transition-colors">
                <!-- Dynamic Count from PHP array size -->
                <div class="text-3xl font-bold text-accent mb-1"><?php echo count($learningLevels); ?></div>
                <div class="text-sm text-blue-100">Grade Levels</div>
            </div>
            <div class="p-4 rounded-xl bg-white/5 backdrop-blur-md border border-white/10 hover:bg-white/10 transition-colors">
                <div class="text-3xl font-bold text-accent mb-1">Free</div>
                <div class="text-sm text-blue-100">To Use</div>
            </div>
            <div class="p-4 rounded-xl bg-white/5 backdrop-blur-md border border-white/10 hover:bg-white/10 transition-colors">
                <div class="text-3xl font-bold text-accent mb-1 flex justify-center items-center">
                    <span class="stat-counter" data-target="100">0</span><span>%</span>
                </div>
                <div class="text-sm text-blue-100">Private & Secure</div>
            </div>
        </div>
    </div>
</header>

<!-- Features Section -->
<section class="container mx-auto px-4 mb-24" aria-labelledby="features-heading">
    <div class="text-center mb-12">
        <h2 id="features-heading" class="text-3xl md:text-4xl font-bold text-text-default mb-4">Why Choose Hesten's Learning?</h2>
        <p class="text-text-secondary max-w-2xl mx-auto">We combine modern technology with proven educational strategies to create a platform where everyone succeeds.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <article class="group p-8 rounded-2xl bg-content-bg shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 border border-transparent hover:border-primary/20">
            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-2xl rotate-3 group-hover:rotate-6 transition-transform flex items-center justify-center mx-auto mb-6 text-2xl shadow-inner">
                <i class="fas fa-universal-access"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-3 text-center">Accessibility First</h3>
            <p class="text-text-secondary leading-relaxed text-center">Built from the ground up with dyslexia-friendly fonts, reading guides, and high-contrast modes for all learners.</p>
        </article>
        <!-- Feature 2 -->
        <article class="group p-8 rounded-2xl bg-content-bg shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 border border-transparent hover:border-primary/20">
            <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 rounded-2xl -rotate-3 group-hover:-rotate-6 transition-transform flex items-center justify-center mx-auto mb-6 text-2xl shadow-inner">
                <i class="fas fa-road"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-3 text-center">Personalized Paths</h3>
            <p class="text-text-secondary leading-relaxed text-center">Learn at your own pace with curriculum tailored to specific grade level needs and individual abilities.</p>
        </article>
        <!-- Feature 3 -->
        <article class="group p-8 rounded-2xl bg-content-bg shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 border border-transparent hover:border-primary/20">
            <div class="w-16 h-16 bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 rounded-2xl rotate-3 group-hover:rotate-6 transition-transform flex items-center justify-center mx-auto mb-6 text-2xl shadow-inner">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-3 text-center">Comprehensive</h3>
            <p class="text-text-secondary leading-relaxed text-center">Complete coverage of Math, ELA, Science, and Social Studies from Pre-K through Grade 12.</p>
        </article>
    </div>
</section>

<!-- How It Works Section -->
<section class="container mx-auto px-4 mb-24">
    <div class="bg-base-bg rounded-3xl p-8 md:p-12 border border-gray-200 dark:border-gray-700">
        <div class="text-center mb-12">
            <span class="text-primary font-bold tracking-wider uppercase text-sm">Getting Started</span>
            <h2 class="text-3xl font-bold text-text-default mt-2">Your Learning Journey</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
            <!-- Decorative Line for Desktop -->
            <div class="hidden md:block absolute top-12 left-1/6 right-1/6 h-0.5 bg-gray-300 dark:bg-gray-600 -z-10" aria-hidden="true"></div>

            <!-- Step 1 -->
            <div class="text-center relative">
                <div class="w-24 h-24 bg-white dark:bg-gray-800 rounded-full border-4 border-primary flex items-center justify-center mx-auto mb-6 shadow-lg z-10 relative">
                    <span class="text-3xl font-bold text-primary">1</span>
                </div>
                <h3 class="text-xl font-bold text-text-default mb-2">Select Grade</h3>
                <p class="text-text-secondary text-sm px-4">Choose your current grade level from the options below.</p>
            </div>

            <!-- Step 2 -->
            <div class="text-center relative">
                <div class="w-24 h-24 bg-white dark:bg-gray-800 rounded-full border-4 border-primary flex items-center justify-center mx-auto mb-6 shadow-lg z-10 relative">
                    <span class="text-3xl font-bold text-primary">2</span>
                </div>
                <h3 class="text-xl font-bold text-text-default mb-2">Choose Topic</h3>
                <p class="text-text-secondary text-sm px-4">Pick a subject you want to practice or explore new skills.</p>
            </div>

            <!-- Step 3 -->
            <div class="text-center relative">
                <div class="w-24 h-24 bg-white dark:bg-gray-800 rounded-full border-4 border-primary flex items-center justify-center mx-auto mb-6 shadow-lg z-10 relative">
                    <span class="text-3xl font-bold text-primary">3</span>
                </div>
                <h3 class="text-xl font-bold text-text-default mb-2">Start Learning</h3>
                <p class="text-text-secondary text-sm px-4">Engage with interactive lessons designed for you.</p>
            </div>
        </div>
    </div>
</section>

<!-- Learning Levels Grid -->
<main class="container mx-auto my-10 px-4 scroll-mt-24" id="main-content" tabindex="-1">

    <!-- Controls Bar -->
    <div class="bg-content-bg p-6 rounded-2xl shadow-md border border-gray-200 dark:border-gray-700 mb-10 sticky top-4 z-20 backdrop-blur-md bg-opacity-95">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="w-full md:w-auto">
                <h2 id="learning-levels-heading" class="text-3xl font-bold text-text-default flex items-center gap-3">
                    <span class="w-2 h-8 bg-primary rounded-full"></span>
                    Select Your Grade
                </h2>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto items-center">
                <!-- Search Input -->
                <div class="relative w-full sm:w-64">
                    <label for="level-search" class="sr-only">Search grades or topics</label>
                    <input type="text" id="level-search" placeholder="Search grades..."
                        class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 bg-base-bg text-text-default focus:ring-2 focus:ring-primary focus:border-transparent transition-all focus:w-full sm:focus:w-72 shadow-sm focus:shadow-md"> <!-- oninput handled in script below -->
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>

                <!-- Filter Buttons -->
                <div class="flex flex-wrap justify-center gap-2" role="group" aria-label="Filter content">
                    <button type="button" onclick="setCategory('all')" class="filter-btn active px-4 py-2 rounded-full text-sm font-bold bg-primary text-white transition-all shadow-sm" aria-pressed="true" data-filter="all">All</button>
                    <button type="button" onclick="setCategory('elem')" class="filter-btn px-4 py-2 rounded-full text-sm font-bold bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition-all" aria-pressed="false" data-filter="elem">Elementary</button>
                    <button type="button" onclick="setCategory('middle')" class="filter-btn px-4 py-2 rounded-full text-sm font-bold bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition-all" aria-pressed="false" data-filter="middle">Middle</button>
                    <button type="button" onclick="setCategory('high')" class="filter-btn px-4 py-2 rounded-full text-sm font-bold bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition-all" aria-pressed="false" data-filter="high">High School</button>
                </div>
            </div>
        </div>
        <!-- Live Region for Screen Readers -->
        <div class="mt-2 text-sm text-text-secondary text-right" aria-live="polite" id="results-count">
            Showing all levels
        </div>
    </div>

    <section id="level-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" aria-labelledby="learning-levels-heading">
        <?php
        $delay = 0.1; // Staggered animation initial delay
        foreach ($learningLevels as $level):
        ?>
            <article class="level-card group h-full animate-fade-in-up"
                style="animation-delay: <?php echo $delay; ?>s;"
                data-category="<?php echo htmlspecialchars($level['category']); ?>"
                data-title="<?php echo htmlspecialchars(strtolower($level['title'])); ?>"
                data-desc="<?php echo htmlspecialchars(strtolower($level['description'])); ?>"
                data-id="<?php echo htmlspecialchars($level['id']); ?>"> <!-- Added data-id for JS -->

                <div class="bg-content-bg h-full rounded-2xl shadow-lg transition-all duration-300 transform hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(8,_112,_184,_0.2)] border-t-8 border-primary p-8 flex flex-col relative overflow-hidden ring-1 ring-black/5 dark:ring-white/10 dark:hover:shadow-[0_20px_50px_rgba(29,_78,_216,_0.3)]">

                    <!-- Floating Icon Background -->
                    <div class="absolute -right-6 -bottom-6 text-[8rem] opacity-5 group-hover:opacity-10 transition-opacity text-primary pointer-events-none rotate-12">
                        <i class="<?php echo htmlspecialchars($level['icon']); ?>"></i>
                    </div>

                    <!-- NEW: TTS (Text-to-Speech) Toggle Button (Top Left) -->
                    <button type="button"
                        class="tts-toggle absolute top-4 left-4 w-10 h-10 rounded-full bg-base-bg border-2 border-gray-200 dark:border-gray-600 text-gray-400 flex items-center justify-center hover:border-primary hover:text-primary transition-all z-20 focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="toggleSpeech(this)"
                        data-title="<?php echo htmlspecialchars($level['title']); ?>"
                        data-desc="<?php echo htmlspecialchars($level['description']); ?>"
                        aria-label="Read <?php echo htmlspecialchars($level['title']); ?> aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <!-- Completion Toggle Button (Top Right) -->
                    <button type="button"
                        class="completion-toggle absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg border-2 border-gray-200 dark:border-gray-600 text-gray-300 flex items-center justify-center hover:border-green-500 hover:text-green-500 transition-all z-20 focus:outline-none focus:ring-2 focus:ring-green-400"
                        onclick="toggleCompletion('<?php echo htmlspecialchars($level['id']); ?>', this)"
                        aria-label="Mark <?php echo htmlspecialchars($level['title']); ?> as complete">
                        <i class="fas fa-check"></i>
                    </button>

                    <!-- Header -->
                    <div class="flex items-center gap-4 mb-6 relative z-10">
                        <div class="w-14 h-14 shrink-0 bg-base-bg rounded-xl shadow-inner flex items-center justify-center text-primary text-2xl group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            <i class="<?php echo htmlspecialchars($level['icon']); ?>"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-text-default group-hover:text-primary transition-colors" id="<?php echo htmlspecialchars($level['id']); ?>">
                            <?php echo htmlspecialchars($level['title']); ?>
                        </h3>
                    </div>

                    <p class="text-text-secondary mb-8 flex-grow leading-relaxed relative z-10">
                        <?php echo htmlspecialchars($level['description']); ?>
                    </p>

                    <a href="<?php echo htmlspecialchars($level['link']); ?>"
                        class="relative z-10 w-full inline-flex justify-between items-center bg-base-bg text-text-default py-4 px-6 rounded-xl font-bold border border-transparent hover:border-primary hover:text-primary hover:bg-white dark:hover:bg-gray-800 transition-all duration-300 focus:ring-4 focus:ring-primary/40 focus:outline-none group-focus:ring-4 shadow-sm"
                        aria-labelledby="<?php echo htmlspecialchars($level['id']); ?>">
                        <span>Explore Skills</span>
                        <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                    </a>

                </div>
            </article>
        <?php
            $delay += 0.05; // Increment delay for next card
        endforeach;
        ?>
    </section>

    <!-- No Results Message -->
    <div id="no-results" class="hidden text-center py-20">
        <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl text-gray-400">
            <i class="fas fa-search"></i>
        </div>
        <h3 class="text-xl font-bold text-text-default">No levels found</h3>
        <p class="text-text-secondary">Try adjusting your search or category filter.</p>
        <button onclick="resetFilters()" type="button" class="mt-4 text-primary font-bold hover:underline">Clear Filters</button>
    </div>

</main>

<!-- FAQ Section (Accessible Accordion) -->
<section class="container mx-auto px-4 py-20 max-w-4xl">
    <h2 class="text-3xl font-bold text-center text-text-default mb-10">Frequently Asked Questions</h2>
    <div class="space-y-4">
        <details class="group bg-content-bg rounded-xl border border-gray-200 dark:border-gray-700 open:shadow-lg transition-all duration-300">
            <summary class="flex justify-between items-center cursor-pointer p-6 font-bold text-lg text-text-default list-none focus:ring-2 focus:ring-primary focus:outline-none rounded-xl">
                Is Hesten's Learning really free?
                <span class="transition-transform group-open:rotate-180 text-primary">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </summary>
            <div class="px-6 pb-6 text-text-secondary leading-relaxed">
                Yes! Our mission is to provide accessible education to everyone. All core curriculum content from Pre-K to Grade 12 is completely free to access.
            </div>
        </details>

        <details class="group bg-content-bg rounded-xl border border-gray-200 dark:border-gray-700 open:shadow-lg transition-all duration-300">
            <summary class="flex justify-between items-center cursor-pointer p-6 font-bold text-lg text-text-default list-none focus:ring-2 focus:ring-primary focus:outline-none rounded-xl">
                Do I need an account to use the site?
                <span class="transition-transform group-open:rotate-180 text-primary">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </summary>
            <div class="px-6 pb-6 text-text-secondary leading-relaxed">
                No account is required to access the learning materials.
            </div>
        </details>

        <details class="group bg-content-bg rounded-xl border border-gray-200 dark:border-gray-700 open:shadow-lg transition-all duration-300">
            <summary class="flex justify-between items-center cursor-pointer p-6 font-bold text-lg text-text-default list-none focus:ring-2 focus:ring-primary focus:outline-none rounded-xl">
                Can I use this on a tablet or phone?
                <span class="transition-transform group-open:rotate-180 text-primary">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </summary>
            <div class="px-6 pb-6 text-text-secondary leading-relaxed">
                Absolutely. Our entire platform is fully responsive and optimized for mobile devices, tablets, and desktops.
            </div>
        </details>
    </div>
</section>

<script>
    // State for filters
    let currentCategory = 'all';
    let currentSearch = '';

    // NEW: Progress State
    let completedLevels = [];

    // NEW: TTS State
    let currentTTSBtn = null;

    // Attach Event Listeners properly
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('level-search');
        if (searchInput) {
            // Using 'input' event catches pasting and 'x' clear clicks, unlike keyup
            searchInput.addEventListener('input', applyFilters);
        }

        // Initialize Stats Observer
        initStatsCounter();

        // NEW: Load Progress
        loadProgress();
    });

    // --- NEW: TTS (Text-to-Speech) Logic ---
    function toggleSpeech(btn) {
        // Prevent event bubbling if necessary (though btn is absolute)
        if (event) event.stopPropagation();

        // 1. If this specific button is already speaking, stop it.
        if (currentTTSBtn === btn && window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel();
            resetTTSUI(btn);
            currentTTSBtn = null;
            return;
        }

        // 2. If speaking something else, stop it first.
        window.speechSynthesis.cancel();
        if (currentTTSBtn) {
            resetTTSUI(currentTTSBtn);
        }

        // 3. Start speaking current card
        const title = btn.getAttribute('data-title');
        const desc = btn.getAttribute('data-desc');
        const textToRead = `${title}. ${desc}`;

        const utterance = new SpeechSynthesisUtterance(textToRead);

        // Optional: Select voice preference? (Default usually fine)
        // const voices = window.speechSynthesis.getVoices();

        utterance.onend = function() {
            resetTTSUI(btn);
            currentTTSBtn = null;
        };

        utterance.onerror = function() {
            resetTTSUI(btn);
            currentTTSBtn = null;
        }

        // Update UI to Active State
        btn.innerHTML = '<i class="fas fa-stop"></i>';
        btn.classList.add('bg-primary', 'text-white', 'animate-pulse', 'border-primary');
        btn.classList.remove('bg-base-bg', 'text-gray-400', 'border-gray-200', 'dark:border-gray-600');

        currentTTSBtn = btn;
        window.speechSynthesis.speak(utterance);
    }

    function resetTTSUI(btn) {
        if (!btn) return;
        btn.innerHTML = '<i class="fas fa-volume-up"></i>';
        btn.classList.remove('bg-primary', 'text-white', 'animate-pulse', 'border-primary');
        btn.classList.add('bg-base-bg', 'text-gray-400', 'border-gray-200', 'dark:border-gray-600');
    }


    // --- NEW: Progress Tracking Logic ---
    function loadProgress() {
        try {
            const stored = localStorage.getItem('hl_completed_levels');
            if (stored) {
                completedLevels = JSON.parse(stored);
            }
        } catch (e) {
            console.error("Could not load progress", e);
        }

        // Update UI
        updateProgressUI();
    }

    function toggleCompletion(levelId, btnElement) {
        // Prevent bubbling if button is inside a clickable card area
        if (event) event.stopPropagation();

        const index = completedLevels.indexOf(levelId);

        if (index > -1) {
            // Remove
            completedLevels.splice(index, 1);
        } else {
            // Add
            completedLevels.push(levelId);
            // Trigger a nice confetti or sound effect here in the future!
        }

        saveProgress();
        updateProgressUI();
    }

    function saveProgress() {
        localStorage.setItem('hl_completed_levels', JSON.stringify(completedLevels));
    }

    function updateProgressUI() {
        // 1. Update Card Styles
        const buttons = document.querySelectorAll('.completion-toggle');
        buttons.forEach(btn => {
            // Find parent article to get ID
            const card = btn.closest('.level-card');
            const id = card.getAttribute('data-id');

            if (completedLevels.includes(id)) {
                // Completed State
                btn.classList.add('bg-green-100', 'border-green-500', 'text-green-600', 'dark:bg-green-900', 'dark:text-green-300');
                btn.classList.remove('bg-base-bg', 'border-gray-200', 'text-gray-300', 'dark:border-gray-600');
                btn.setAttribute('aria-pressed', 'true');

                // Optional: Add a visual indicator to the card itself
                card.querySelector('.bg-content-bg').classList.add('ring-2', 'ring-green-400');
            } else {
                // Incomplete State
                btn.classList.remove('bg-green-100', 'border-green-500', 'text-green-600', 'dark:bg-green-900', 'dark:text-green-300');
                btn.classList.add('bg-base-bg', 'border-gray-200', 'text-gray-300', 'dark:border-gray-600');
                btn.setAttribute('aria-pressed', 'false');

                card.querySelector('.bg-content-bg').classList.remove('ring-2', 'ring-green-400');
            }
        });

        // 2. Update Hero Stat
        const totalLevels = document.querySelectorAll('.level-card').length; // Or use PHP count passed to JS
        const completedCount = completedLevels.length;
        const percentage = totalLevels > 0 ? Math.round((completedCount / totalLevels) * 100) : 0;

        const statEl = document.getElementById('user-progress-stat');
        if (statEl) {
            // Simple counting animation for the stat
            statEl.innerText = percentage;
        }
    }

    // --- Stats Counter Animation ---
    function initStatsCounter() {
        const stats = document.querySelectorAll('.stat-counter');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.getAttribute('data-target'));
                    const duration = 2000; // ms
                    const start = 0;
                    const startTime = performance.now();

                    const updateCounter = (currentTime) => {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);

                        // Ease out function
                        const easeOut = 1 - Math.pow(1 - progress, 3);

                        const current = Math.floor(easeOut * target);
                        el.innerText = current;

                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            el.innerText = target;
                        }
                    };

                    requestAnimationFrame(updateCounter);
                    observer.unobserve(el);
                }
            });
        }, {
            threshold: 0.5
        });

        stats.forEach(stat => observer.observe(stat));
    }

    // --- Filter Logic ---
    function setCategory(category) {
        currentCategory = category;

        // Update Buttons Visual State
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(btn => {
            const isMatch = btn.dataset.filter === category;
            if (isMatch) {
                btn.classList.add('bg-primary', 'text-white');
                btn.classList.remove('bg-gray-200', 'text-gray-700', 'dark:bg-gray-700', 'dark:text-gray-200');
                btn.setAttribute('aria-pressed', 'true');
            } else {
                btn.classList.remove('bg-primary', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700', 'dark:bg-gray-700', 'dark:text-gray-200');
                btn.setAttribute('aria-pressed', 'false');
            }
        });

        applyFilters();
    }

    function resetFilters() {
        const searchInput = document.getElementById('level-search');
        if (searchInput) searchInput.value = '';
        currentSearch = '';
        setCategory('all');
    }

    function applyFilters() {
        // Get search value
        const searchInput = document.getElementById('level-search');
        if (searchInput) {
            currentSearch = searchInput.value.toLowerCase().trim();
        }

        const cards = document.querySelectorAll('.level-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const cardCat = card.dataset.category;
            const cardTitle = card.dataset.title || '';
            const cardDesc = card.dataset.desc || '';

            // Check Category Match
            const catMatch = (currentCategory === 'all' || cardCat === currentCategory);

            // Check Search Match
            const searchMatch = (currentSearch === '' || cardTitle.includes(currentSearch) || cardDesc.includes(currentSearch));

            if (catMatch && searchMatch) {
                // Use classList for hidden state instead of inline styles for cleaner CSS handling
                card.classList.remove('hidden');

                // Trigger reflow for animation if needed, or just let CSS transition handle it
                requestAnimationFrame(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                });
                visibleCount++;
            } else {
                card.classList.add('hidden');
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
            }
        });

        // Update Results Count for Screen Reader
        const resultsMsg = document.getElementById('results-count');
        if (resultsMsg) resultsMsg.textContent = `Showing ${visibleCount} result${visibleCount !== 1 ? 's' : ''}`;

        // Show/Hide "No Results" graphic
        const noResults = document.getElementById('no-results');
        const grid = document.getElementById('level-grid');

        if (visibleCount === 0) {
            if (noResults) noResults.classList.remove('hidden');
            if (grid) grid.classList.add('hidden');
        } else {
            if (noResults) noResults.classList.add('hidden');
            if (grid) grid.classList.remove('hidden');
        }
    }
</script>

<?php include 'src/footer.php'; ?>