<?php
// Page-Specific Metadata
$pageTitle       = "Grade 3 | Hesten's Learning";
$pageDescription = "Master multiplication, reading comprehension, and more with our Grade 3 curriculum.";
$pageKeywords    = "Grade 3, multiplication, division, reading comprehension, life science, geography";
$pageAuthor      = "Hesten's Learning";

// Include Global Header
include '../src/header.php';
?>

<!-- Sticky Sub-Nav -->
<div
    class="sticky top-0 z-30 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 shadow-sm transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex overflow-x-auto py-3 gap-2 no-scrollbar" role="tablist" aria-label="Subject navigation tabs">
            <button onclick="switchTab('math')" id="tab-math"
                class="tab-button active group flex-shrink-0 flex items-center gap-2 px-5 py-2.5 rounded-full font-bold text-sm transition-all duration-300 border border-transparent hover:bg-blue-50 dark:hover:bg-blue-900/30 aria-selected:bg-blue-600 aria-selected:text-white aria-selected:shadow-lg aria-selected:scale-105"
                aria-selected="true" role="tab" aria-controls="content-math">
                <i class="fas fa-calculator text-blue-500 group-aria-selected:text-white transition-colors"></i>
                <span>Math</span>
            </button>
            <button onclick="switchTab('ela')" id="tab-ela"
                class="tab-button group flex-shrink-0 flex items-center gap-2 px-5 py-2.5 rounded-full font-bold text-sm text-gray-600 dark:text-gray-400 transition-all duration-300 border border-transparent hover:bg-pink-50 dark:hover:bg-pink-900/30 aria-selected:bg-pink-600 aria-selected:text-white aria-selected:shadow-lg aria-selected:scale-105"
                aria-selected="false" role="tab" aria-controls="content-ela">
                <i class="fas fa-book-reader text-pink-500 group-aria-selected:text-white transition-colors"></i>
                <span>Language Arts</span>
            </button>
            <button onclick="switchTab('science')" id="tab-science"
                class="tab-button group flex-shrink-0 flex items-center gap-2 px-5 py-2.5 rounded-full font-bold text-sm text-gray-600 dark:text-gray-400 transition-all duration-300 border border-transparent hover:bg-emerald-50 dark:hover:bg-emerald-900/30 aria-selected:bg-emerald-600 aria-selected:text-white aria-selected:shadow-lg aria-selected:scale-105"
                aria-selected="false" role="tab" aria-controls="content-science">
                <i class="fas fa-leaf text-emerald-500 group-aria-selected:text-white transition-colors"></i>
                <span>Science</span>
            </button>
            <button onclick="switchTab('social')" id="tab-social"
                class="tab-button group flex-shrink-0 flex items-center gap-2 px-5 py-2.5 rounded-full font-bold text-sm text-gray-600 dark:text-gray-400 transition-all duration-300 border border-transparent hover:bg-amber-50 dark:hover:bg-amber-900/30 aria-selected:bg-amber-600 aria-selected:text-white aria-selected:shadow-lg aria-selected:scale-105"
                aria-selected="false" role="tab" aria-controls="content-social">
                <i class="fas fa-globe-americas text-amber-500 group-aria-selected:text-white transition-colors"></i>
                <span>Social Studies</span>
            </button>
            <button onclick="switchTab('extra')" id="tab-extra"
                class="tab-button group flex-shrink-0 flex items-center gap-2 px-5 py-2.5 rounded-full font-bold text-sm text-gray-600 dark:text-gray-400 transition-all duration-300 border border-transparent hover:bg-violet-50 dark:hover:bg-violet-900/30 aria-selected:bg-violet-600 aria-selected:text-white aria-selected:shadow-lg aria-selected:scale-105"
                aria-selected="false" role="tab" aria-controls="content-extra">
                <i class="fas fa-gamepad text-violet-500 group-aria-selected:text-white transition-colors"></i>
                <span>Games & Extras</span>
            </button>
        </div>
    </div>
</div>

<!-- Hero Section -->
<header
    class="relative bg-gradient-to-br from-indigo-900 via-blue-900 to-violet-900 text-white py-20 px-4 overflow-hidden mb-12">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div
            class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20 animate-pulse">
        </div>
        <div class="absolute top-[-10%] right-[-5%] w-96 h-96 bg-purple-500/30 rounded-full blur-3xl animate-blob">
        </div>
        <div
            class="absolute bottom-[-10%] left-[-5%] w-96 h-96 bg-blue-500/30 rounded-full blur-3xl animate-blob animation-delay-2000">
        </div>
    </div>

    <div class="container mx-auto text-center relative z-10">
        <div
            class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-sm font-bold tracking-wider uppercase mb-6 shadow-lg">
            <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
            Grade 3 Curriculum
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tight drop-shadow-2xl">
            Level <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-pink-300 to-cyan-300">E</span>
        </h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto font-medium leading-relaxed drop-shadow-md">
            Dive into multiplication, explore properties of matter, and uncover the history of your community.
        </p>
    </div>
</header>

<!-- Main Content -->
<main id="main-content" class="container mx-auto px-4 pb-24 min-h-[60vh] scroll-mt-32 focus:outline-none" tabindex="-1">

    <!-- MATH SECTION -->
    <section id="content-math" class="tab-content block animate-fade-in-up">
        <!-- Section Header -->
        <div
            class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10 pb-6 border-b border-gray-200 dark:border-gray-800">
            <div class="flex items-center gap-4">
                <div
                    class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/30">
                    <i class="fas fa-calculator"></i>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Module 1: Multiplication</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">Concepts of Equal Groups and Arrays.</p>
                </div>
            </div>
            <div
                class="bg-blue-50 dark:bg-blue-900/30 px-4 py-2 rounded-lg border border-blue-100 dark:border-blue-800">
                <span class="text-sm font-bold text-blue-700 dark:text-blue-300">Target Skill:</span>
                <span class="text-sm text-blue-600 dark:text-blue-400 ml-1">OA.A.1, OA.A.3</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Topic A -->
            <article
                class="group relative bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gray-100 dark:bg-gray-700">
                    <div class="h-full bg-blue-500 transition-all duration-500 w-0" id="progress-topic-a"></div>
                </div>

                <div class="p-8">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Topic A: Equal Groups</h3>
                        <button
                            onclick="toggleSpeech(this, 'Topic A: Equal Groups', 'Understand multiplication as equal groups of objects.')"
                            class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors flex items-center justify-center">
                            <i class="fas fa-volume-up"></i>
                        </button>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                        Understand that multiplication represents equal groups of objects put together.
                    </p>

                    <ul class="space-y-3 lesson-list">
                        <li>
                            <button onclick="toggleLesson('topic-a-1', this)"
                                class="lesson-btn w-full text-left flex items-center gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700/50 border border-transparent hover:border-gray-200 dark:hover:border-gray-600 transition-all group">
                                <div
                                    class="w-8 h-8 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-sm text-transparent group-hover:border-blue-500 transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="flex-1">
                                    <span
                                        class="block font-bold text-gray-900 dark:text-white mb-1 group-hover:text-blue-600 transition-colors">Lesson
                                        1</span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Interpret equal
                                        groups.</span>
                                </div>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-a-2', this)"
                                class="lesson-btn w-full text-left flex items-center gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700/50 border border-transparent hover:border-gray-200 dark:hover:border-gray-600 transition-all group">
                                <div
                                    class="w-8 h-8 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-sm text-transparent group-hover:border-blue-500 transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="flex-1">
                                    <span
                                        class="block font-bold text-gray-900 dark:text-white mb-1 group-hover:text-blue-600 transition-colors">Lesson
                                        2</span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Relate addition to
                                        multiplication.</span>
                                </div>
                            </button>
                        </li>
                    </ul>
                </div>
            </article>

            <!-- Topic B -->
            <article
                class="group relative bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gray-100 dark:bg-gray-700">
                    <div class="h-full bg-indigo-500 transition-all duration-500 w-0" id="progress-topic-b"></div>
                </div>

                <div class="p-8">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Topic B: Arrays</h3>
                        <button
                            onclick="toggleSpeech(this, 'Topic B: Arrays', 'Learn to organize objects into rows and columns to multiply.')"
                            class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-colors flex items-center justify-center">
                            <i class="fas fa-volume-up"></i>
                        </button>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                        Learn to organize objects into rows and columns (arrays) to visual multiplication.
                    </p>

                    <ul class="space-y-3 lesson-list">
                        <li>
                            <button onclick="toggleLesson('topic-b-1', this)"
                                class="lesson-btn w-full text-left flex items-center gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700/50 border border-transparent hover:border-gray-200 dark:hover:border-gray-600 transition-all group">
                                <div
                                    class="w-8 h-8 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-sm text-transparent group-hover:border-indigo-500 transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="flex-1">
                                    <span
                                        class="block font-bold text-gray-900 dark:text-white mb-1 group-hover:text-indigo-600 transition-colors">Lesson
                                        3</span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Relate arrays to equal
                                        groups.</span>
                                </div>
                            </button>
                        </li>
                        <li>
                            <button onclick="toggleLesson('topic-b-2', this)"
                                class="lesson-btn w-full text-left flex items-center gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700/50 border border-transparent hover:border-gray-200 dark:hover:border-gray-600 transition-all group">
                                <div
                                    class="w-8 h-8 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-sm text-transparent group-hover:border-indigo-500 transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="flex-1">
                                    <span
                                        class="block font-bold text-gray-900 dark:text-white mb-1 group-hover:text-indigo-600 transition-colors">Lesson
                                        4</span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Match arrays to
                                        equations.</span>
                                </div>
                            </button>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
    </section>

    <!-- LANGUAGE ARTS SECTION -->
    <section id="content-ela" class="tab-content hidden animate-fade-in-up">
        <div
            class="flex flex-col items-center justify-center py-24 bg-white dark:bg-gray-800 rounded-3xl border-2 border-dashed border-gray-200 dark:border-gray-700 text-center px-4">
            <div class="w-24 h-24 rounded-full bg-pink-100 dark:bg-pink-900/50 flex items-center justify-center mb-6">
                <i class="fas fa-book-reader text-5xl text-pink-500"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">Reading Comprehension</h2>
            <p class="text-lg text-gray-500 dark:text-gray-400 max-w-md">We're writing exciting stories for you! Check
                back soon for Main Idea and Supporting Details practice.</p>
        </div>
    </section>

    <!-- SCIENCE SECTION -->
    <section id="content-science" class="tab-content hidden animate-fade-in-up">
        <div
            class="flex flex-col items-center justify-center py-24 bg-white dark:bg-gray-800 rounded-3xl border-2 border-dashed border-gray-200 dark:border-gray-700 text-center px-4">
            <div
                class="w-24 h-24 rounded-full bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center mb-6">
                <i class="fas fa-frog text-5xl text-emerald-500"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">Life Science</h2>
            <p class="text-lg text-gray-500 dark:text-gray-400 max-w-md">Life Cycles and Traits modules are sprouting
                soon.</p>
        </div>
    </section>

    <!-- SOCIAL STUDIES SECTION -->
    <section id="content-social" class="tab-content hidden animate-fade-in-up">
        <div
            class="flex flex-col items-center justify-center py-24 bg-white dark:bg-gray-800 rounded-3xl border-2 border-dashed border-gray-200 dark:border-gray-700 text-center px-4">
            <div class="w-24 h-24 rounded-full bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center mb-6">
                <i class="fas fa-map-marked-alt text-5xl text-amber-500"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">Geography & Communities</h2>
            <p class="text-lg text-gray-500 dark:text-gray-400 max-w-md">Maps and community history lessons are being
                drawn up.</p>
        </div>
    </section>

    <!-- EXTRAS SECTION -->
    <section id="content-extra" class="tab-content hidden animate-fade-in-up">
        <div
            class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10 pb-6 border-b border-gray-200 dark:border-gray-800">
            <div class="flex items-center gap-4">
                <div
                    class="w-16 h-16 rounded-2xl bg-gradient-to-br from-violet-500 to-purple-600 text-white flex items-center justify-center text-3xl shadow-lg shadow-violet-500/30">
                    <i class="fas fa-gamepad"></i>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Games & Resources</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">Reinforce your skills with fun activities.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Game Card -->
            <button onclick="openGameModal('multMaster')"
                class="group text-left bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all border border-gray-100 dark:border-gray-700 hover:-translate-y-1">
                <div
                    class="w-full h-40 rounded-2xl bg-violet-100 dark:bg-violet-900/30 mb-6 flex items-center justify-center overflow-hidden relative">
                    <i class="fas fa-times text-6xl text-violet-500 group-hover:scale-110 transition-transform"></i>
                    <div class="absolute inset-0 bg-violet-500/10 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Multiplication Master</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">Race against time to solve multiplication
                    facts!</p>
                <div class="flex items-center text-violet-600 font-bold text-sm">
                    Play Now <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </div>
            </button>

            <!-- Quiz Card -->
            <button
                class="group text-left bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all border border-gray-100 dark:border-gray-700 hover:-translate-y-1 opacity-75 cursor-not-allowed">
                <div
                    class="w-full h-40 rounded-2xl bg-blue-100 dark:bg-blue-900/30 mb-6 flex items-center justify-center">
                    <i class="fas fa-clipboard-question text-6xl text-blue-500"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Module Quiz</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">Coming Soon: Test your knowledge.</p>
                <div class="flex items-center text-gray-400 font-bold text-sm">
                    Locked <i class="fas fa-lock ml-2"></i>
                </div>
            </button>
        </div>
    </section>

</main>

<!-- Game Modal -->
<div id="game-modal" class="fixed inset-0 z-[100] hidden" role="dialog" aria-modal="true">
    <div class="absolute inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity" onclick="closeGameModal()"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div
            class="relative w-full max-w-2xl bg-content-bg rounded-3xl shadow-2xl overflow-hidden border border-gray-700/50 animate-scale-up">
            <!-- Modal Header -->
            <div
                class="bg-gradient-to-r from-violet-600 to-indigo-600 p-4 flex justify-between items-center text-white">
                <h3 class="text-xl font-bold flex items-center gap-2"><i class="fas fa-gamepad"></i> Multiplication
                    Master</h3>
                <button onclick="closeGameModal()"
                    class="w-8 h-8 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Game Canvas area -->
            <div id="game-container" class="p-8 text-center min-h-[400px] flex flex-col items-center justify-center">
                <!-- Injected via JS -->
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script>
    // --- Tab Logic ---
    function switchTab(tabId) {
        // Hide all
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.tab-button').forEach(el => {
            el.classList.remove('active', 'text-white', 'shadow-lg', 'scale-105');
            el.setAttribute('aria-selected', 'false');

            // Remove specific colored backgrounds (reset to default hover state)
            el.classList.remove('bg-blue-600', 'bg-pink-600', 'bg-emerald-600', 'bg-amber-600', 'bg-violet-600');

            // Restore default text colors
            const icon = el.querySelector('i');
            if (icon && el.id === 'tab-math') icon.className = "fas fa-calculator text-blue-500 group-aria-selected:text-white transition-colors";
            if (icon && el.id === 'tab-ela') icon.className = "fas fa-book-reader text-pink-500 group-aria-selected:text-white transition-colors";
            if (icon && el.id === 'tab-science') icon.className = "fas fa-leaf text-emerald-500 group-aria-selected:text-white transition-colors";
            if (icon && el.id === 'tab-social') icon.className = "fas fa-globe-americas text-amber-500 group-aria-selected:text-white transition-colors";
            if (icon && el.id === 'tab-extra') icon.className = "fas fa-gamepad text-violet-500 group-aria-selected:text-white transition-colors";
        });

        // Show target
        document.getElementById(`content-${tabId}`).classList.remove('hidden');

        // Activate button
        const btn = document.getElementById(`tab-${tabId}`);
        btn.classList.add('active', 'text-white', 'shadow-lg', 'scale-105');
        btn.setAttribute('aria-selected', 'true');

        // Add specific Active Color
        if (tabId === 'math') btn.classList.add('bg-blue-600');
        if (tabId === 'ela') btn.classList.add('bg-pink-600');
        if (tabId === 'science') btn.classList.add('bg-emerald-600');
        if (tabId === 'social') btn.classList.add('bg-amber-600');
        if (tabId === 'extra') btn.classList.add('bg-violet-600');
    }

    // --- Lesson Progress Logic ---
    let completedLessons = [];
    document.addEventListener("DOMContentLoaded", () => {
        try {
            completedLessons = JSON.parse(localStorage.getItem('hl_grade3_progress')) || [];
        } catch (e) { }

        // Init UI
        document.querySelectorAll('.lesson-btn').forEach(btn => {
            const id = btn.getAttribute('onclick').match(/'([^']+)'/)[1];
            if (completedLessons.includes(id)) markLessonCompleteUI(btn);
        });
        updateTopicBars();
    });

    function toggleLesson(id, btn) {
        if (completedLessons.includes(id)) {
            completedLessons = completedLessons.filter(l => l !== id);
            markLessonIncompleteUI(btn);
        } else {
            completedLessons.push(id);
            markLessonCompleteUI(btn);
            confetti({ particleCount: 40, spread: 60, origin: { y: 0.7 }, colors: ['#3b82f6', '#8b5cf6'] });
        }
        localStorage.setItem('hl_grade3_progress', JSON.stringify(completedLessons));
        updateTopicBars();
    }

    function markLessonCompleteUI(btn) {
        const icon = btn.querySelector('.check-icon');
        icon.classList.remove('text-transparent', 'border-gray-300', 'dark:border-gray-500');
        icon.classList.add('bg-green-500', 'border-green-500', 'text-white');
        btn.querySelector('span.block').classList.add('line-through', 'opacity-50');
    }

    function markLessonIncompleteUI(btn) {
        const icon = btn.querySelector('.check-icon');
        icon.classList.add('text-transparent', 'border-gray-300', 'dark:border-gray-500');
        icon.classList.remove('bg-green-500', 'border-green-500', 'text-white');
        btn.querySelector('span.block').classList.remove('line-through', 'opacity-50');
    }

    function updateTopicBars() {
        ['topic-a', 'topic-b'].forEach(topic => {
            const btns = Array.from(document.querySelectorAll('.lesson-btn')).filter(b => b.getAttribute('onclick').includes(topic));
            if (btns.length === 0) return;
            const done = btns.filter(b => completedLessons.includes(b.getAttribute('onclick').match(/'([^']+)'/)[1])).length;
            const pct = (done / btns.length) * 100;
            const bar = document.getElementById(`progress-${topic}`);
            if (bar) bar.style.width = `${pct}%`;
        });
    }

    // --- TTS helper ---
    function toggleSpeech(btn, title, text) {
        if ('speechSynthesis' in window) {
            if (window.speechSynthesis.speaking) {
                window.speechSynthesis.cancel();
                return;
            }
            const utterance = new SpeechSynthesisUtterance(`${title}. ${text}`);
            window.speechSynthesis.speak(utterance);
        }
    }

    // --- Game Logic: Multiplication Master ---
    let gameScore = 0;
    let gameTimer = null;
    let timeLeft = 30;

    function openGameModal() {
        document.getElementById('game-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        startGame();
    }

    function closeGameModal() {
        document.getElementById('game-modal').classList.add('hidden');
        document.body.style.overflow = '';
        clearInterval(gameTimer);
    }

    function startGame() {
        gameScore = 0;
        timeLeft = 30;
        nextQuestion();
    }

    function nextQuestion() {
        const container = document.getElementById('game-container');
        if (timeLeft <= 0) {
            showResult(container);
            return;
        }

        const num1 = Math.floor(Math.random() * 9) + 1; // 1-9
        const num2 = Math.floor(Math.random() * 5) + 1; // 1-5 (keep it simple for now)
        const ans = num1 * num2;

        // Generate distractor answers
        let options = [ans];
        while (options.length < 3) {
            let fake = ans + Math.floor(Math.random() * 10) - 5;
            if (fake > 0 && !options.includes(fake)) options.push(fake);
        }
        options.sort(() => Math.random() - 0.5);

        container.innerHTML = `
            <div class="mb-6">
                <div class="text-sm font-bold text-gray-500 uppercase tracking-widest mb-2">Time Left: ${timeLeft}s</div>
                <div class="w-full bg-gray-200 rounded-full h-2 max-w-xs mx-auto overflow-hidden">
                    <div class="bg-violet-500 h-full transition-all duration-1000 ease-linear" style="width: ${(timeLeft / 30) * 100}%"></div>
                </div>
            </div>
            
            <div class="text-6xl font-black text-gray-900 dark:text-white mb-8 animate-bounce-short">
                ${num1} × ${num2} = ?
            </div>

            <div class="grid grid-cols-3 gap-4 max-w-md mx-auto w-full">
                ${options.map(opt => `
                    <button onclick="checkAnswer(${opt}, ${ans})" class="py-6 rounded-xl bg-white dark:bg-gray-700 shadow-md border-2 border-transparent hover:border-violet-500 text-3xl font-bold transition-all hover:-translate-y-1 active:scale-95 text-gray-800 dark:text-white">
                        ${opt}
                    </button>
                `).join('')}
            </div>
            
            <div class="mt-8 text-sm font-bold text-gray-400">Score: ${gameScore}</div>
        `;

        clearInterval(gameTimer);
        gameTimer = setInterval(() => {
            timeLeft--;
            if (timeLeft < 0) {
                showResult(container);
            } else {
                // Refresh UI for timer bar only? simplified by just recalling render not ideal but fast
                // Update specific elements to avoid jitter
                const timerBar = container.querySelector('.bg-violet-500');
                if (timerBar) timerBar.style.width = `${(timeLeft / 30) * 100}%`;
                const text = container.querySelector('.tracking-widest');
                if (text) text.innerText = `Time Left: ${timeLeft}s`;
            }
        }, 1000);
    }

    function checkAnswer(selected, correct) {
        if (selected === correct) {
            gameScore += 10;
            confetti({ particleCount: 20, spread: 40, origin: { y: 0.6 } });
        } else {
            // Shake effect or red flash could go here
            gameScore = Math.max(0, gameScore - 5);
        }
        nextQuestion();
    }

    function showResult(container) {
        clearInterval(gameTimer);
        container.innerHTML = `
            <div class="text-center">
                <div class="w-24 h-24 rounded-full bg-violet-100 text-violet-600 flex items-center justify-center text-5xl mx-auto mb-6">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Time's Up!</h3>
                <p class="text-xl text-gray-500 mb-8">Final Score: <span class="font-black text-violet-600">${gameScore}</span></p>
                
                <button onclick="startGame()" class="px-8 py-3 rounded-full bg-violet-600 text-white font-bold hover:bg-violet-700 transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Play Again
                </button>
            </div>
        `;
        confetti({ particleCount: 150, spread: 100, origin: { y: 0.6 } });
    }
</script>

<?php include '../src/footer.php'; ?>