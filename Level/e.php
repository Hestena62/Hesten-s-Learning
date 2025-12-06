<?php
// Page-Specific Metadata
$pageTitle = "Grade 3/Level E | Hesten's Learning";
$pageDescription = "Foundational Skills in Math, Language Arts, Science, and Social Studies designed for early learners.";
$pageKeywords = "Grade 3, math, language arts, science, social studies, early learning";
$pageAuthor = "Hesten's Learning";

// Include Global Header (Adjust path if necessary)
include '../src/header.php';
?>

<!-- Level E Specific Sub-Nav (Sticky Tabs) -->
<div class="sticky top-0 z-30 bg-base-bg/95 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700 shadow-sm transition-colors duration-300">
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
            <button onclick="switchTab('extra')" id="tab-extra"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-gray-200 dark:hover:bg-gray-700 aria-selected:bg-purple-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-extra">
                <i class="fas fa-star"></i> Extras
            </button>
        </div>
    </div>
</div>

<!-- Hero Section -->
<header class="relative bg-gradient-to-br from-blue-600 to-indigo-700 text-white py-16 px-4 mb-12 overflow-hidden">
    <!-- Abstract Background Shapes -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10 pointer-events-none">
        <i class="fas fa-shapes absolute top-10 left-10 text-9xl animate-pulse"></i>
        <i class="fas fa-star absolute bottom-10 right-10 text-8xl animate-spin-slow" style="animation-duration: 12s;"></i>
    </div>

    <div class="container mx-auto text-center relative z-10">
        <span class="inline-block py-1 px-3 rounded-full bg-white/20 border border-white/30 text-xs font-bold mb-4 tracking-wide uppercase backdrop-blur-md">
            Grade 3 Curriculum
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md">
            Level <span class="text-yellow-300">E</span>
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            Start your adventure here! Become a counting expert, find cool objects, and discover the world around you.
        </p>
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
            <article class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow relative">
                    <!-- Progress Bar for this Card -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                        <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%" id="progress-topic-a"></div>
                    </div>

                    <!-- TTS Button -->
                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="toggleSpeech(this)"
                        data-title="Topic A: Matching Objects"
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
                            <button onclick="toggleLesson('topic-a-1', this)" class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary" aria-pressed="false">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson 1:</strong> Identify identical objects.</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-a-2', this)" class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary" aria-pressed="false">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson 2–3:</strong> Match 2 objects that are the same.</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-a-3', this)" class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary" aria-pressed="false">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson 4:</strong> Match 2 objects that are used together.</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </article>

            <!-- Topic Card B -->
            <article class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow relative">
                    <!-- Progress Bar for this Card -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                        <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%" id="progress-topic-b"></div>
                    </div>

                    <!-- TTS Button -->
                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="toggleSpeech(this)"
                        data-title="Topic B: Sorting"
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
                            <button onclick="toggleLesson('topic-b-1', this)" class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary" aria-pressed="false">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson 5:</strong> Make one group with a given attribute.</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-b-2', this)" class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary" aria-pressed="false">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson 6:</strong> Sort into two groups.</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-b-3', this)" class="lesson-btn w-full text-left flex items-start gap-3 text-sm p-2 rounded-lg hover:bg-base-bg transition-colors group focus:outline-none focus:ring-2 focus:ring-primary" aria-pressed="false">
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="text-text-default group-hover:text-primary transition-colors"><strong>Lesson 7:</strong> Sort the same group in two ways.</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </article>

        </div>
    </section>

    <!-- LANGUAGE ARTS SECTION (Placeholder) -->
    <section id="content-ela" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="flex flex-col items-center justify-center py-20 bg-content-bg rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
            <div class="w-20 h-20 bg-pink-100 dark:bg-pink-900 rounded-full flex items-center justify-center text-pink-500 text-3xl mb-4">
                <i class="fas fa-pencil-alt"></i>
            </div>
            <h2 class="text-2xl font-bold text-text-default">Language Arts</h2>
            <p class="text-text-secondary mt-2">Content for letters and rhyming is coming soon!</p>
        </div>
    </section>

    <!-- SCIENCE SECTION (Placeholder) -->
    <section id="content-science" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="flex flex-col items-center justify-center py-20 bg-content-bg rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
            <div class="w-20 h-20 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center text-green-500 text-3xl mb-4">
                <i class="fas fa-leaf"></i>
            </div>
            <h2 class="text-2xl font-bold text-text-default">Science</h2>
            <p class="text-text-secondary mt-2">Content for nature and observation is coming soon!</p>
        </div>
    </section>

    <!-- SOCIAL STUDIES SECTION (Placeholder) -->
    <section id="content-social" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="flex flex-col items-center justify-center py-20 bg-content-bg rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
            <div class="w-20 h-20 bg-orange-100 dark:bg-orange-900 rounded-full flex items-center justify-center text-orange-500 text-3xl mb-4">
                <i class="fas fa-users"></i>
            </div>
            <h2 class="text-2xl font-bold text-text-default">Social Studies</h2>
            <p class="text-text-secondary mt-2">Content for community and family is coming soon!</p>
        </div>
    </section>

    <!-- EXTRAS SECTION -->
    <section id="content-extra" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <!-- Section Header -->
        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-gray-200 dark:border-gray-700">
            <div class="w-12 h-12 rounded-xl bg-purple-500 text-white flex items-center justify-center text-xl shadow-lg">
                <i class="fas fa-star"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-text-default">Extras & Resources</h2>
                <p class="text-text-secondary text-sm">Review games, assessments, and curriculum guides.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Curriculum Understanding (New) -->
            <article class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-6 flex flex-col items-center text-center hover:shadow-xl transition-shadow cursor-pointer group" onclick="openResourceModal('curriculum')">
                <div class="w-16 h-16 rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="text-lg font-bold text-text-default mb-2">Curriculum Guide</h3>
                <p class="text-text-secondary text-sm mb-6">Understand the "Why" and "How" of Level E.</p>
                <button class="mt-auto w-full py-2 px-4 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition-colors">
                    Read Guide
                </button>
            </article>

            <!-- Card 2: Assessments -->
            <article class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-6 flex flex-col items-center text-center hover:shadow-xl transition-shadow cursor-pointer group" onclick="openResourceModal('assessment')">
                <div class="w-16 h-16 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <h3 class="text-lg font-bold text-text-default mb-2">Assessments</h3>
                <p class="text-text-secondary text-sm mb-6">Check your knowledge with end-of-level quizzes.</p>
                <button class="mt-auto w-full py-2 px-4 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-colors">
                    Take Quiz
                </button>
            </article>

            <!-- Card 3: Games -->
            <article class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-6 flex flex-col items-center text-center hover:shadow-xl transition-shadow cursor-pointer group" onclick="openResourceModal('games')">
                <div class="w-16 h-16 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-gamepad"></i>
                </div>
                <h3 class="text-lg font-bold text-text-default mb-2">Learning Games</h3>
                <p class="text-text-secondary text-sm mb-6">Fun interactive games to reinforce Level E skills.</p>
                <button class="mt-auto w-full py-2 px-4 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 transition-colors">
                    Play Now
                </button>
            </article>

            <!-- Card 4: Worksheets -->
            <article class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-6 flex flex-col items-center text-center hover:shadow-xl transition-shadow cursor-pointer group" onclick="openResourceModal('worksheets')">
                <div class="w-16 h-16 rounded-full bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-print"></i>
                </div>
                <h3 class="text-lg font-bold text-text-default mb-2">Printables</h3>
                <p class="text-text-secondary text-sm mb-6">Download and print worksheets for offline practice.</p>
                <button class="mt-auto w-full py-2 px-4 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 transition-colors">
                    Browse PDFs
                </button>
            </article>

        </div>
    </section>
</main>

<!-- Generic Resource Modal -->
<div id="resource-modal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeResourceModal()"></div>
    
    <!-- Modal Panel -->
    <div class="flex items-center justify-center min-h-screen p-4 text-center">
        <div class="relative transform overflow-hidden rounded-2xl bg-base-bg text-left shadow-2xl transition-all sm:w-full sm:max-w-lg w-full border border-gray-200 dark:border-gray-700">
            <!-- Header -->
            <div class="bg-gradient-to-r from-gray-50 to-white dark:from-gray-800 dark:to-gray-900 px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <h3 class="text-lg font-bold text-text-default flex items-center gap-2" id="modal-title">
                    <!-- Title injected via JS -->
                </h3>
                <button onclick="closeResourceModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none rounded-full p-1 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <!-- Body -->
            <div class="px-6 py-6 max-h-[70vh] overflow-y-auto" id="modal-content">
                <!-- Content injected via JS -->
            </div>
            
            <!-- Footer -->
            <div class="bg-gray-50 dark:bg-gray-800/50 px-6 py-3 flex justify-end">
                <button type="button" class="inline-flex justify-center rounded-lg border border-transparent bg-primary px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2" onclick="closeResourceModal()">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

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
            btn.classList.remove('bg-primary', 'bg-pink-600', 'bg-green-600', 'bg-orange-500', 'bg-purple-600');
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
            if (tabName === 'extra') targetBtn.classList.add('bg-purple-600'); 
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

    // --- Modal Logic ---
    const modalData = {
        curriculum: {
            title: '<i class="fas fa-lightbulb text-yellow-500"></i> Curriculum Guide: Level E',
            content: `
                <div class="space-y-4">
                    <p class="text-text-secondary">Level E is designed to transition students from concrete observation to abstract thinking. Here is the breakdown:</p>
                    <div class="grid gap-3">
                        <div class="p-3 bg-blue-50 dark:bg-blue-900/30 rounded-lg border border-blue-100 dark:border-blue-800">
                            <h4 class="font-bold text-blue-700 dark:text-blue-300">Math</h4>
                            <p class="text-sm text-text-secondary">Focus on grouping, counting to 100, and early addition concepts.</p>
                        </div>
                        <div class="p-3 bg-pink-50 dark:bg-pink-900/30 rounded-lg border border-pink-100 dark:border-pink-800">
                            <h4 class="font-bold text-pink-700 dark:text-pink-300">Language Arts</h4>
                            <p class="text-sm text-text-secondary">Rhyming, letter sounds, and simple sentence structures.</p>
                        </div>
                        <div class="p-3 bg-green-50 dark:bg-green-900/30 rounded-lg border border-green-100 dark:border-green-800">
                            <h4 class="font-bold text-green-700 dark:text-green-300">Science</h4>
                            <p class="text-sm text-text-secondary">Observation skills, nature walks, and identifying living vs. non-living.</p>
                        </div>
                    </div>
                </div>
            `
        },
        assessment: {
            title: '<i class="fas fa-clipboard-check text-blue-600"></i> Level E Assessments',
            content: `
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-700 flex justify-between items-center group transition-colors">
                            <span class="text-text-default font-medium">Mid-Module 1 Quiz</span>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-primary"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-700 flex justify-between items-center group transition-colors">
                            <span class="text-text-default font-medium">End of Module 1 Test</span>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-primary"></i>
                        </a>
                    </li>
                </ul>
            `
        },
        games: {
            title: '<i class="fas fa-gamepad text-green-600"></i> Interactive Games',
            content: `
                <div class="grid grid-cols-2 gap-3">
                    <a href="#" class="block p-4 rounded-xl bg-green-50 dark:bg-green-900/20 hover:bg-green-100 dark:hover:bg-green-900/40 text-center transition-colors">
                        <i class="fas fa-shapes text-3xl text-green-500 mb-2"></i>
                        <div class="text-sm font-bold text-text-default">Shape Sorter</div>
                    </a>
                    <a href="#" class="block p-4 rounded-xl bg-blue-50 dark:bg-blue-900/20 hover:bg-blue-100 dark:hover:bg-blue-900/40 text-center transition-colors">
                        <i class="fas fa-sort-numeric-down text-3xl text-blue-500 mb-2"></i>
                        <div class="text-sm font-bold text-text-default">Number Jump</div>
                    </a>
                </div>
            `
        },
        worksheets: {
            title: '<i class="fas fa-print text-red-500"></i> Printable Worksheets',
            content: `
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-2 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors cursor-pointer">
                        <i class="fas fa-file-pdf text-red-500 text-xl"></i>
                        <div>
                            <div class="text-sm font-bold text-text-default">Counting 1-5 Practice.pdf</div>
                            <div class="text-xs text-text-secondary">1.2 MB</div>
                        </div>
                        <i class="fas fa-download ml-auto text-gray-400"></i>
                    </div>
                    <div class="flex items-center gap-3 p-2 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors cursor-pointer">
                        <i class="fas fa-file-pdf text-red-500 text-xl"></i>
                        <div>
                            <div class="text-sm font-bold text-text-default">Object Matching.pdf</div>
                            <div class="text-xs text-text-secondary">0.8 MB</div>
                        </div>
                        <i class="fas fa-download ml-auto text-gray-400"></i>
                    </div>
                </div>
            `
        }
    };

    function openResourceModal(type) {
        const modal = document.getElementById('resource-modal');
        const titleEl = document.getElementById('modal-title');
        const contentEl = document.getElementById('modal-content');
        const data = modalData[type];

        if (data) {
            titleEl.innerHTML = data.title;
            contentEl.innerHTML = data.content;
            modal.classList.remove('hidden');
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }
    }

    function closeResourceModal() {
        const modal = document.getElementById('resource-modal');
        modal.classList.add('hidden');
        // Restore body scroll
        document.body.style.overflow = '';
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