<?php
// Page-Specific Metadata
$pageTitle       = "Pre-K Level A | Hesten's Learning";
$pageDescription = "Foundational Skills in Math, Language Arts, Science, and Social Studies designed for early learners.";
$pageKeywords    = "Pre-K, math, language arts, science, social studies, early learning";
$pageAuthor      = "Hesten's Learning";

// Include Global Header (Adjust path if necessary)
include '../src/header.php';
?>

<!-- Level A Specific Sub-Nav (Sticky Tabs) -->
<div
    class="sticky top-0 z-30 bg-base-bg/95 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700 shadow-sm transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="flex overflow-x-auto py-3 gap-2 no-scrollbar" role="tablist" aria-label="Subject navigation tabs">
            <button onclick="switchTab('math')" id="tab-math"
                class="tab-button active flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm transition-all duration-300 border border-transparent hover:bg-gray-200 dark:hover:bg-gray-700 aria-selected:bg-primary aria-selected:text-white aria-selected:shadow-md"
                aria-selected="true" role="tab" aria-controls="content-math">
                <i class="fas fa-calculator"></i> Math
            </button>
            <button onclick="switchTab('ela')" id="tab-ela"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-gray-200 dark:hover:bg-gray-700 aria-selected:bg-pink-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-ela">
                <i class="fas fa-book-open"></i> Language Arts
            </button>
            <button onclick="switchTab('science')" id="tab-science"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-gray-200 dark:hover:bg-gray-700 aria-selected:bg-green-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-science">
                <i class="fas fa-flask"></i> Science
            </button>
            <button onclick="switchTab('social')" id="tab-social"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-gray-200 dark:hover:bg-gray-700 aria-selected:bg-orange-500 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-social">
                <i class="fas fa-globe-americas"></i> Social Studies
            </button>
        </div>
    </div>
</div>

<!-- Hero Section -->
<header class="relative bg-gradient-to-br from-blue-600 to-indigo-700 text-white py-16 px-4 mb-12 overflow-hidden">
    <!-- Abstract Background Shapes -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10 pointer-events-none">
        <i class="fas fa-shapes absolute top-10 left-10 text-9xl animate-pulse"></i>
        <i class="fas fa-star absolute bottom-10 right-10 text-8xl animate-spin-slow"
            style="animation-duration: 12s;"></i>
    </div>

    <div class="container mx-auto text-center relative z-10">
        <span
            class="inline-block py-1 px-3 rounded-full bg-white/20 border border-white/30 text-xs font-bold mb-4 tracking-wide uppercase backdrop-blur-md">
            Pre-K Curriculum
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md">
            Level <span class="text-yellow-300">A</span>
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed mb-8">
            Start your journey here. Master counting, identifying objects, and exploring the world around you.
        </p>
        <a href="../assessment/index.html?grade=Pre-K"
            class="inline-block px-8 py-3 bg-yellow-400 text-blue-900 font-bold rounded-full hover:bg-yellow-300 transition-colors shadow-lg transform hover:-translate-y-1">
            <i class="fas fa-star mr-2"></i> Take Pre-K Assessment
        </a>
    </div>
</header>

<!-- Main Content Area -->
<main id="main-content" class="container mx-auto px-4 pb-24 min-h-[60vh] scroll-mt-32" tabindex="-1">

    <!-- MATH SECTION -->
    <section id="content-math" class="tab-content block animate-fade-in-up" role="tabpanel">

        <!-- Module Header -->
        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-gray-200 dark:border-gray-700">
            <div class="w-12 h-12 rounded-xl bg-primary text-white flex items-center justify-center text-xl shadow-lg">
                <i class="fas fa-calculator"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-text-default">Module 1: Counting to 5</h2>
                <p class="text-text-secondary text-sm">Foundations of numbers and object recognition.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Topic Card A -->
            <article
                class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow relative">
                    <!-- Progress Bar for this Card -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                        <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%"
                            id="progress-topic-a"></div>
                    </div>

                    <!-- TTS Button -->
                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="toggleSpeech(this)" data-title="Topic A: Matching Objects"
                        data-desc="Learn to identify identical objects and match things that go together."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Topic A: Matching Objects</h3>
                    <p class="text-text-secondary mb-4 leading-relaxed">
                        Learn to identify identical objects and match things that go together.
                    </p>

                    <!-- Interactive Lesson List -->
                    <ul class="space-y-3 mb-6 lesson-list">
                        <li>
                            <button onclick="toggleLesson('topic-a-1', this)"
                                class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary"
                                aria-pressed="false">
                                <div
                                    class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson
                                        1:</strong> Identify identical objects.</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-a-2', this)"
                                class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary"
                                aria-pressed="false">
                                <div
                                    class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson
                                        2–3:</strong> Match 2 objects that are the same.</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-a-3', this)"
                                class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary"
                                aria-pressed="false">
                                <div
                                    class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson
                                        4:</strong> Match 2 objects that are used together.</span>
                            </button>
                        </li>
                    </ul>

                    <!-- TEACHER RESOURCES (Hidden by default) -->
                    <div class="teacher-only mt-4 pt-4 border-t border-dashed border-yellow-500/50">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-xs font-bold text-yellow-900 dark:text-yellow-100 uppercase tracking-wider">
                                <i class="fas fa-chalkboard-teacher mr-1"></i> Teacher Resources
                            </h4>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <button class="px-3 py-1.5 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700 rounded text-xs font-bold text-yellow-800 dark:text-yellow-200 hover:bg-yellow-100 transition-colors flex items-center gap-1">
                                <i class="fas fa-file-alt"></i> Lesson Plan (PDF)
                            </button>
                            <button class="px-3 py-1.5 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700 rounded text-xs font-bold text-yellow-800 dark:text-yellow-200 hover:bg-yellow-100 transition-colors flex items-center gap-1">
                                <i class="fas fa-key"></i> Answer Key
                            </button>
                            <button class="px-3 py-1.5 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700 rounded text-xs font-bold text-yellow-800 dark:text-yellow-200 hover:bg-yellow-100 transition-colors flex items-center gap-1">
                                <i class="fas fa-list-ol"></i> Standards
                            </button>
                        </div>
                    </div>

                </div>
            </article>

            <!-- Topic Card B -->
            <article
                class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow relative">
                    <!-- Progress Bar for this Card -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                        <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%"
                            id="progress-topic-b"></div>
                    </div>

                    <!-- TTS Button -->
                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="toggleSpeech(this)" data-title="Topic B: Sorting"
                        data-desc="Understand attributes and how to sort items into groups."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Topic B: Sorting</h3>
                    <p class="text-text-secondary mb-4 leading-relaxed">
                        Understand attributes and how to sort items into groups.
                    </p>

                    <ul class="space-y-3 mb-6 lesson-list">
                        <li>
                            <button onclick="toggleLesson('topic-b-1', this)"
                                class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary"
                                aria-pressed="false">
                                <div
                                    class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson
                                        5:</strong> Make one group with a given attribute.</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-b-2', this)"
                                class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary"
                                aria-pressed="false">
                                <div
                                    class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson
                                        6:</strong> Sort into two groups.</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-b-3', this)"
                                class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary"
                                aria-pressed="false">
                                <div
                                    class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson
                                        7:</strong> Sort the same group in two ways.</span>
                            </button>
                        </li>
                    </ul>

                    <!-- TEACHER RESOURCES (Hidden by default) -->
                    <div class="teacher-only mt-4 pt-4 border-t border-dashed border-yellow-500/50">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-xs font-bold text-yellow-900 dark:text-yellow-100 uppercase tracking-wider">
                                <i class="fas fa-chalkboard-teacher mr-1"></i> Teacher Resources
                            </h4>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <button class="px-3 py-1.5 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700 rounded text-xs font-bold text-yellow-800 dark:text-yellow-200 hover:bg-yellow-100 transition-colors flex items-center gap-1">
                                <i class="fas fa-file-alt"></i> Lesson Plan (PDF)
                            </button>
                            <button class="px-3 py-1.5 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700 rounded text-xs font-bold text-yellow-800 dark:text-yellow-200 hover:bg-yellow-100 transition-colors flex items-center gap-1">
                                <i class="fas fa-key"></i> Answer Key
                            </button>
                        </div>
                    </div>

                </div>
            </article>

        </div>
    </section>

    <!-- LANGUAGE ARTS SECTION (Placeholder) -->
    <section id="content-ela" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div
            class="flex flex-col items-center justify-center py-20 bg-content-bg rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
            <div
                class="w-20 h-20 bg-pink-100 dark:bg-pink-900 rounded-full flex items-center justify-center text-pink-500 text-3xl mb-4">
                <i class="fas fa-pencil-alt"></i>
            </div>
            <h2 class="text-2xl font-bold text-text-default">Language Arts</h2>
            <p class="text-text-secondary mt-2">Content for letters and rhyming is coming soon!</p>
        </div>
    </section>

    <!-- SCIENCE SECTION (Placeholder) -->
    <section id="content-science" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div
            class="flex flex-col items-center justify-center py-20 bg-content-bg rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
            <div
                class="w-20 h-20 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center text-green-500 text-3xl mb-4">
                <i class="fas fa-leaf"></i>
            </div>
            <h2 class="text-2xl font-bold text-text-default">Science</h2>
            <p class="text-text-secondary mt-2">Content for nature and observation is coming soon!</p>
        </div>
    </section>

    <!-- SOCIAL STUDIES SECTION (Placeholder) -->
    <section id="content-social" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div
            class="flex flex-col items-center justify-center py-20 bg-content-bg rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
            <div
                class="w-20 h-20 bg-orange-100 dark:bg-orange-900 rounded-full flex items-center justify-center text-orange-500 text-3xl mb-4">
                <i class="fas fa-users"></i>
            </div>
            <h2 class="text-2xl font-bold text-text-default">Social Studies</h2>
            <p class="text-text-secondary mt-2">Content for community and family is coming soon!</p>
        </div>
    </section>

</main>

<!-- Confetti Library -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<!-- PAGE SPECIFIC SCRIPTS -->
<script>
    // Tab Switching Logic
    function switchTab(tabName) {
        // 1. Hide all content
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(content => content.classList.add('hidden'));

        // 2. Deactivate all buttons
        const buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(btn => {
            btn.classList.remove('active', 'bg-gray-200', 'dark:bg-gray-700');
            btn.setAttribute('aria-selected', 'false');

            // Reset to default secondary text
            btn.classList.add('text-text-secondary');
            btn.classList.remove('text-white', 'shadow-md');

            // Remove specific bg colors
            btn.classList.remove('bg-primary', 'bg-pink-600', 'bg-green-600', 'bg-orange-500');
        });

        // 3. Show Target Content
        const targetContent = document.getElementById(`content-${tabName}`);
        if (targetContent) targetContent.classList.remove('hidden');

        // 4. Activate Target Button
        const targetBtn = document.getElementById(`tab-${tabName}`);
        if (targetBtn) {
            targetBtn.classList.add('active');
            targetBtn.setAttribute('aria-selected', 'true');
            targetBtn.classList.remove('text-text-secondary');
            targetBtn.classList.add('text-white', 'shadow-md');

            // Apply specific color
            if (tabName === 'math') targetBtn.classList.add('bg-primary');
            if (tabName === 'ela') targetBtn.classList.add('bg-pink-600');
            if (tabName === 'science') targetBtn.classList.add('bg-green-600');
            if (tabName === 'social') targetBtn.classList.add('bg-orange-500');
        }
    }

    // --- Granular Lesson Tracking Logic ---
    let completedLessons = [];

    document.addEventListener("DOMContentLoaded", function() {
        loadLessonProgress();

        // Initialize UI
        document.querySelectorAll('.lesson-btn').forEach(btn => {
            const id = btn.getAttribute('onclick').match(/'([^']+)'/)[1];
            updateLessonBtnUI(btn, completedLessons.includes(id));
        });
        updateTopicProgress('topic-a');
        updateTopicProgress('topic-b');
    });

    function loadLessonProgress() {
        try {
            const stored = localStorage.getItem('hl_completed_lessons_granular');
            if (stored) completedLessons = JSON.parse(stored);
        } catch (e) {}
    }

    function toggleLesson(lessonId, btn) {
        const index = completedLessons.indexOf(lessonId);
        let isComplete = false;

        if (index > -1) {
            completedLessons.splice(index, 1);
            isComplete = false;
        } else {
            completedLessons.push(lessonId);
            isComplete = true;
            // Small burst of confetti for lesson completion
            confetti({
                particleCount: 30,
                spread: 50,
                origin: {
                    y: 0.8
                },
                colors: ['#22c55e', '#ffffff'] // Green and white
            });
        }

        localStorage.setItem('hl_completed_lessons_granular', JSON.stringify(completedLessons));
        updateLessonBtnUI(btn, isComplete);

        // Update bar
        const topicId = lessonId.split('-').slice(0, 2).join('-'); // topic-a
        updateTopicProgress(topicId);
    }

    function updateLessonBtnUI(btn, isComplete) {
        const checkIcon = btn.querySelector('.check-icon');
        const textSpan = btn.querySelector('span');

        if (isComplete) {
            btn.setAttribute('aria-pressed', 'true');
            checkIcon.classList.remove('text-transparent', 'border-gray-300', 'dark:border-gray-500');
            checkIcon.classList.add('bg-green-500', 'border-green-500', 'text-white');
            textSpan.classList.add('line-through', 'text-text-secondary', 'opacity-60');
            textSpan.classList.remove('text-text-default');
        } else {
            btn.setAttribute('aria-pressed', 'false');
            checkIcon.classList.add('text-transparent', 'border-gray-300', 'dark:border-gray-500');
            checkIcon.classList.remove('bg-green-500', 'border-green-500', 'text-white');
            textSpan.classList.remove('line-through', 'text-text-secondary', 'opacity-60');
            textSpan.classList.add('text-text-default');
        }
    }

    function updateTopicProgress(topicPrefix) {
        // Count how many buttons in this topic (by checking onclick string)
        const topicBtns = Array.from(document.querySelectorAll('.lesson-btn')).filter(b =>
            b.getAttribute('onclick').includes(topicPrefix)
        );
        const total = topicBtns.length;
        if (total === 0) return;

        const completed = topicBtns.filter(b => {
            const id = b.getAttribute('onclick').match(/'([^']+)'/)[1];
            return completedLessons.includes(id);
        }).length;

        const pct = Math.round((completed / total) * 100);

        // Find progress bar
        const bar = document.getElementById(`progress-${topicPrefix}`);
        if (bar) bar.style.width = `${pct}%`;
    }

    // AI Placeholder Logic
    document.addEventListener("DOMContentLoaded", function() {
        const aiButtons = document.querySelectorAll('.explain-button, .activity-button, .story-button');

        aiButtons.forEach(btn => {
            btn.addEventListener('click', async function() {
                const outputDiv = this.closest('article').querySelector('.ai-output');
                const topic = this.getAttribute('data-topic');
                const type = this.classList.contains('explain-button') ? 'Explanation' :
                    this.classList.contains('activity-button') ? 'Activity' : 'Story';

                outputDiv.classList.remove('hidden');
                outputDiv.innerHTML = `<div class="flex items-center gap-2"><div class="loader"></div> Generating ${type}...</div>`;
                await new Promise(r => setTimeout(r, 1000));

                outputDiv.innerHTML = `
                    <div class="flex justify-between items-start mb-2">
                        <strong class="text-primary">${type}: ${topic}</strong>
                        <button onclick="this.closest('.ai-output').classList.add('hidden')" class="text-xs text-red-500 hover:underline">Close</button>
                    </div>
                    <p class="leading-relaxed">This is a simulated AI response for <strong>${topic}</strong>. Connect the actual Gemini API to the backend to generate dynamic content suitable for Pre-K students.</p>
                `;
            });
        });
    });

    const style = document.createElement('style');
    style.innerHTML = `
        .loader {
            border: 2px solid #f3f3f3;
            border-top: 2px solid var(--color-primary);
            border-radius: 50%;
            width: 12px; height: 12px;
            animation: spin 1s linear infinite;
            display: inline-block;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    `;
    document.head.appendChild(style);
</script>

<?php include '../src/footer.php'; ?>