<?php
// Page-Specific Metadata
$pageTitle = "Pre-K Level A | Hesten's Learning";
$pageDescription = "Foundational Skills in Math, Language Arts, Science, and Social Studies designed for early learners.";
$pageKeywords = "Pre-K, math, language arts, science, social studies, early learning";
$pageAuthor = "Hesten's Learning";

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
                        data-desc="Learn to identify identical objects and match things that go together.This follows EngageNY Module 1 Topic A."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <div class="text-xs font-semibold text-primary/80 mb-1 uppercase tracking-wider">CCSS Range: PK.CC.1
                        - PK.CC.4</div>
                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Topic A: Matching Objects</h3>
                    <p class="text-text-secondary mb-4 leading-relaxed">
                        Learn to identify identical objects and match things that go together.
                    </p>

                    <!-- Interactive Lesson List -->
                    <ul class="space-y-3 mb-6 lesson-list">
                        <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg transition-colors group">
                            <button onclick="toggleLesson('topic-a-1', this)"
                                class="flex-shrink-0 mt-0.5 focus:outline-none focus:ring-2 focus:ring-primary rounded-full transition-transform active:scale-90"
                                aria-label="Mark Lesson 1 as complete" aria-pressed="false">
                                <div
                                    class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                            </button>
                            <a href="#"
                                class="text-sm text-text-default hover:text-primary transition-colors leading-snug pt-0.5 lesson-link">
                                <strong>Lesson 1:</strong> Identify identical objects.
                            </a>
                        </li>
                        <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg transition-colors group">
                            <button onclick="toggleLesson('topic-a-2', this)"
                                class="flex-shrink-0 mt-0.5 focus:outline-none focus:ring-2 focus:ring-primary rounded-full transition-transform active:scale-90"
                                aria-label="Mark Lesson 2-3 as complete" aria-pressed="false">
                                <div
                                    class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                            </button>
                            <a href="#"
                                class="text-sm text-text-default hover:text-primary transition-colors leading-snug pt-0.5 lesson-link">
                                <strong>Lesson 2–3:</strong> Match 2 objects that are the same.
                            </a>
                        </li>
                    </ul>

                    <!-- TEACHER RESOURCES -->
                    <div class="teacher-only mt-4 pt-4 border-t border-dashed border-yellow-500/50">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-xs font-bold text-yellow-900 dark:text-yellow-100 uppercase tracking-wider">
                                <i class="fas fa-chalkboard-teacher mr-1"></i> Teacher Resources
                            </h4>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <button
                                class="px-3 py-1.5 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700 rounded text-xs font-bold text-yellow-800 dark:text-yellow-200 hover:bg-yellow-100 transition-colors flex items-center gap-1">
                                <i class="fas fa-file-alt"></i> Module 1 Guide
                            </button>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Topic Card B -->
            <article
                class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                        <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%"
                            id="progress-topic-b"></div>
                    </div>

                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="toggleSpeech(this)" data-title="Topic B: Sorting"
                        data-desc="Understand attributes and how to sort items into groups. This follows EngageNY Module 1 Topic B."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <div class="text-xs font-semibold text-primary/80 mb-1 uppercase tracking-wider">CCSS Range: PK.MD.1
                        - PK.MD.3</div>
                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Topic B: Sorting</h3>
                    <p class="text-text-secondary mb-4 leading-relaxed">
                        Understand attributes and how to sort items into groups.
                    </p>

                    <ul class="space-y-3 mb-6 lesson-list">
                        <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg transition-colors group">
                            <button onclick="toggleLesson('topic-b-1', this)"
                                class="flex-shrink-0 mt-0.5 focus:outline-none focus:ring-2 focus:ring-primary rounded-full transition-transform active:scale-90"
                                aria-label="Mark Lesson 5 as complete" aria-pressed="false">
                                <div
                                    class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                            </button>
                            <a href="#"
                                class="text-sm text-text-default hover:text-primary transition-colors leading-snug pt-0.5 lesson-link">
                                <strong>Lesson 5:</strong> Make one group with a given attribute.
                            </a>
                        </li>
                    </ul>
                </div>
            </article>

            <!-- Module 2 Header (NEW) -->
            <div
                class="col-span-1 lg:col-span-2 flex items-center gap-4 mt-8 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                <div
                    class="w-10 h-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center text-lg shadow-md">
                    <i class="fas fa-shapes"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-text-default">Module 2: Shapes</h2>
                    <p class="text-text-secondary text-xs">Exploring two and three-dimensional shapes.</p>
                </div>
            </div>

            <!-- Shapes Card -->
            <article
                class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                        <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%"
                            id="progress-shapes"></div>
                    </div>

                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="toggleSpeech(this)" data-title="Topic A: Circles and Squares"
                        data-desc="Identifying and describing circles and squares in our world."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <div class="text-xs font-semibold text-primary/80 mb-1 uppercase tracking-wider">CCSS Range: PK.G.1
                        - PK.G.3</div>
                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Topic A: 2D Shapes</h3>
                    <p class="text-text-secondary mb-4 leading-relaxed">
                        Learn to recognize circles, squares, and triangles.
                    </p>

                    <ul class="space-y-3 mb-6 lesson-list">
                        <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg transition-colors group">
                            <button onclick="toggleLesson('shapes-1', this)"
                                class="flex-shrink-0 mt-0.5 focus:outline-none focus:ring-2 focus:ring-primary rounded-full transition-transform active:scale-90"
                                aria-label="Mark Lesson 1 as complete" aria-pressed="false">
                                <div
                                    class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                            </button>
                            <a href="#"
                                class="text-sm text-text-default hover:text-primary transition-colors leading-snug pt-0.5 lesson-link">
                                <strong>Lesson 1:</strong> Find the circles in the room.
                            </a>
                        </li>
                        <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg transition-colors group">
                            <button onclick="toggleLesson('shapes-2', this)"
                                class="flex-shrink-0 mt-0.5 focus:outline-none focus:ring-2 focus:ring-primary rounded-full transition-transform active:scale-90"
                                aria-label="Mark Lesson 2 as complete" aria-pressed="false">
                                <div
                                    class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                            </button>
                            <a href="#"
                                class="text-sm text-text-default hover:text-primary transition-colors leading-snug pt-0.5 lesson-link">
                                <strong>Lesson 2:</strong> Sort shapes by sides.
                            </a>
                        </li>
                    </ul>
                </div>
            </article>

        </div>
    </section>

    <!-- LANGUAGE ARTS SECTION (Placeholder) -->
    <section id="content-ela" class="tab-content hidden animate-fade-in-up" role="tabpanel">

        <!-- Domain 1 Header -->
        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-gray-200 dark:border-gray-700">
            <div class="w-12 h-12 rounded-xl bg-pink-600 text-white flex items-center justify-center text-xl shadow-lg">
                <i class="fas fa-child"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-text-default">Domain 1: All About Me</h2>
                <p class="text-text-secondary text-sm">Understanding our bodies and feelings (EngageNY CKLA).</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Topic: The Five Senses -->
            <article
                class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                        <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%"
                            id="progress-ela-senses"></div>
                    </div>

                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="toggleSpeech(this)" data-title="Topic: The Five Senses"
                        data-desc="Learn about how we see, hear, smell, taste, and touch the world."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">The Five Senses</h3>
                    <p class="text-text-secondary mb-4 leading-relaxed">
                        Discover the amazing tools our bodies use to learn.
                    </p>

                    <ul class="space-y-3 mb-6 lesson-list">
                        <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg transition-colors group">
                            <button onclick="toggleLesson('ela-senses-1', this)"
                                class="flex-shrink-0 mt-0.5 focus:outline-none focus:ring-2 focus:ring-primary rounded-full transition-transform active:scale-90"
                                aria-label="Mark Lesson 1 as complete">
                                <div
                                    class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                            </button>
                            <span class="text-sm text-text-default pt-0.5 lesson-link"><strong>Lesson 1:</strong> Sight
                                and Hearing.</span>
                        </li>
                        <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg transition-colors group">
                            <button onclick="toggleLesson('ela-senses-2', this)"
                                class="flex-shrink-0 mt-0.5 focus:outline-none focus:ring-2 focus:ring-primary rounded-full transition-transform active:scale-90"
                                aria-label="Mark Lesson 2 as complete">
                                <div
                                    class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                            </button>
                            <span class="text-sm text-text-default pt-0.5 lesson-link"><strong>Lesson 2:</strong> Smell,
                                Taste, and Touch.</span>
                        </li>
                    </ul>
                </div>
            </article>

            <!-- Topic: Nursery Rhymes -->
            <article
                class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                        <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%"
                            id="progress-ela-rhymes"></div>
                    </div>

                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="toggleSpeech(this)" data-title="Topic: Nursery Rhymes"
                        data-desc="Exploring language through fun rhymes and classic fables."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Nursery Rhymes</h3>
                    <p class="text-text-secondary mb-4 leading-relaxed">
                        Rhymes help us hear sounds in words and build vocabulary.
                    </p>

                    <ul class="space-y-3 mb-6 lesson-list">
                        <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg transition-colors group">
                            <button onclick="toggleLesson('ela-rhymes-1', this)"
                                class="flex-shrink-0 mt-0.5 focus:outline-none focus:ring-2 focus:ring-primary rounded-full transition-transform active:scale-90"
                                aria-label="Mark Lesson 1 as complete">
                                <div
                                    class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                            </button>
                            <span class="text-sm text-text-default pt-0.5 lesson-link"><strong>Lesson 1:</strong> Humpty
                                Dumpty & Little Bo Peep.</span>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
    </section>

    <section id="content-science" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-gray-200 dark:border-gray-700">
            <div
                class="w-12 h-12 rounded-xl bg-green-600 text-white flex items-center justify-center text-xl shadow-lg">
                <i class="fas fa-leaf"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-text-default">Science</h2>
                <p class="text-text-secondary text-sm">Exploring nature and the changing world.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <article
                class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden p-6 relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                    <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%"
                        id="progress-sci-weather"></div>
                </div>
                <h3 class="text-xl font-bold mb-2">Weather & Seasons</h3>
                <p class="text-text-secondary mb-4">Observe how the sky changes and how we dress for the weather.</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg group">
                        <button onclick="toggleLesson('sci-weather-1', this)"
                            class="flex-shrink-0 mt-0.5 transition-transform active:scale-90">
                            <div
                                class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                <i class="fas fa-check"></i>
                            </div>
                        </button>
                        <span class="text-sm pt-0.5 lesson-link">Types of weather (Sunny, Rainy, Snowy).</span>
                    </li>
                </ul>
            </article>
        </div>
    </section>

    <!-- SOCIAL STUDIES SECTION -->
    <section id="content-social" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-gray-200 dark:border-gray-700">
            <div
                class="w-12 h-12 rounded-xl bg-orange-500 text-white flex items-center justify-center text-xl shadow-lg">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-text-default">Social Studies</h2>
                <p class="text-text-secondary text-sm">Learning about families and our neighborhood.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <article
                class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden p-6 relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 dark:bg-gray-700">
                    <div class="h-full bg-green-500 transition-all duration-500" style="width: 0%"
                        id="progress-soc-family"></div>
                </div>
                <h3 class="text-xl font-bold mb-2">My Community</h3>
                <p class="text-text-secondary mb-4">Discovering who lives in our house and who helps in our town.</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 p-2 rounded-lg hover:bg-base-bg group">
                        <button onclick="toggleLesson('soc-family-1', this)"
                            class="flex-shrink-0 mt-0.5 transition-transform active:scale-90">
                            <div
                                class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon">
                                <i class="fas fa-check"></i>
                            </div>
                        </button>
                        <span class="text-sm pt-0.5 lesson-link">Family members and friends.</span>
                    </li>
                </ul>
            </article>
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

    document.addEventListener("DOMContentLoaded", function () {
        loadLessonProgress();

        // Initialize UI
        // Note: New structure uses buttons inside lis. 
        // We select the button that has the onclick handler.
        const btns = document.querySelectorAll('button[onclick^="toggleLesson"]');
        btns.forEach(btn => {
            const match = btn.getAttribute('onclick').match(/'([^']+)'/);
            if (match) {
                const id = match[1];
                updateLessonBtnUI(btn, completedLessons.includes(id));
            }
        });
        updateTopicProgress('topic-a');
        updateTopicProgress('topic-b');
    });

    function loadLessonProgress() {
        try {
            const stored = localStorage.getItem('hl_completed_lessons_granular');
            if (stored) completedLessons = JSON.parse(stored);
        } catch (e) { }
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

            // --- GLOBAL GAMIFICATION INTEGRATION ---
            if (window.addXP) {
                window.addXP(10, 'Lesson Completed');
            }
            if (window.incrementStat) {
                window.incrementStat('lessonsCompleted');
            }

            // Confetti effect
            if (window.triggerConfetti) {
                window.triggerConfetti({ y: 0.7 });
            }
        }

        localStorage.setItem('hl_completed_lessons_granular', JSON.stringify(completedLessons));
        updateLessonBtnUI(btn, isComplete);

        // Update progress bars
        // Prefix is usually before the first or second dash (e.g., topic-a, ela-senses)
        const parts = lessonId.split('-');
        let topicPrefix = parts[0];
        if (parts.length > 2) topicPrefix = parts.slice(0, 2).join('-');

        updateTopicProgress(topicPrefix);
    }

    function updateLessonBtnUI(btn, isComplete) {
        const checkIcon = btn.querySelector('.check-icon');
        // Handle both <a> sibling and <span> sibling structures
        const parent = btn.closest('li') || btn.closest('article');
        const link = parent.querySelector('.lesson-link');

        if (isComplete) {
            btn.setAttribute('aria-pressed', 'true');
            if (checkIcon) {
                checkIcon.classList.remove('text-transparent', 'border-gray-300', 'dark:border-gray-500');
                checkIcon.classList.add('bg-green-500', 'border-green-500', 'text-white');
            }
            if (link) {
                link.classList.add('line-through', 'text-text-secondary', 'opacity-60');
            }
        } else {
            btn.setAttribute('aria-pressed', 'false');
            if (checkIcon) {
                checkIcon.classList.add('text-transparent', 'border-gray-300', 'dark:border-gray-500');
                checkIcon.classList.remove('bg-green-500', 'border-green-500', 'text-white');
            }
            if (link) {
                link.classList.remove('line-through', 'text-text-secondary', 'opacity-60');
            }
        }
    }

    function updateTopicProgress(topicPrefix) {
        // Find buttons that contain the topic prefix in their toggleLesson call
        const allBtns = document.querySelectorAll('button[onclick^="toggleLesson"]');
        const topicBtns = Array.from(allBtns).filter(b =>
            b.getAttribute('onclick').includes(`'${topicPrefix}`)
        );

        const total = topicBtns.length;
        if (total === 0) return;

        const completed = topicBtns.filter(b => {
            const match = b.getAttribute('onclick').match(/'([^']+)'/);
            return match && completedLessons.includes(match[1]);
        }).length;

        const pct = Math.round((completed / total) * 100);

        // Find progress bar (id format: progress-topic-a, progress-ela-senses, etc.)
        const bar = document.getElementById(`progress-${topicPrefix}`);
        if (bar) bar.style.width = `${pct}%`;
    }

    // --- TTS Logic ---
    function toggleSpeech(btn) {
        const title = btn.getAttribute('data-title');
        const desc = btn.getAttribute('data-desc');
        const textToSpeak = `${title}. ${desc}`;

        if ('speechSynthesis' in window) {
            // If already speaking, stop it
            if (window.speechSynthesis.speaking) {
                window.speechSynthesis.cancel();
                btn.classList.remove('bg-primary', 'text-white');
                return;
            }

            const utterance = new SpeechSynthesisUtterance(textToSpeak);
            utterance.rate = 0.9; // Slightly slower for Pre-K
            utterance.pitch = 1.1; // Slightly friendlier tone

            utterance.onstart = () => btn.classList.add('bg-primary', 'text-white');
            utterance.onend = () => btn.classList.remove('bg-primary', 'text-white');
            utterance.onerror = () => btn.classList.remove('bg-primary', 'text-white');

            window.speechSynthesis.speak(utterance);
        } else {
            alert("Sorry, your browser doesn't support Text-to-Speech.");
        }
    }

    // AI Placeholder Logic
    document.addEventListener("DOMContentLoaded", function () {
        const aiButtons = document.querySelectorAll('.explain-button, .activity-button, .story-button');

        aiButtons.forEach(btn => {
            btn.addEventListener('click', async function () {
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