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
<!-- Uses z-40 to stay below header but above content -->
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
            Pre-K Curriculum
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md">
            Level <span class="text-yellow-300">A</span>
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            Start your journey here. Master counting, identifying objects, and exploring the world around you.
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

                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start gap-3 text-sm text-text-default">
                            <i class="fas fa-check-circle text-green-500 mt-1"></i>
                            <span><strong>Lesson 1:</strong> Identify identical objects.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-text-default">
                            <i class="fas fa-check-circle text-green-500 mt-1"></i>
                            <span><strong>Lesson 2–3:</strong> Match 2 objects that are the same.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-text-default">
                            <i class="fas fa-check-circle text-green-500 mt-1"></i>
                            <span><strong>Lesson 4:</strong> Match 2 objects that are used together.</span>
                        </li>
                    </ul>
                </div>

                <!-- AI Interaction Footer -->
                <div class="bg-base-bg p-4 border-t border-gray-100 dark:border-gray-700 grid grid-cols-3 gap-2">
                    <button class="explain-button py-2 px-2 rounded-lg bg-white dark:bg-gray-800 text-primary text-xs font-bold shadow-sm hover:shadow hover:-translate-y-0.5 transition-all border border-gray-200 dark:border-gray-600"
                        data-topic="Matching Identical Objects for Pre-K">
                        <i class="fas fa-lightbulb mr-1"></i> Explain
                    </button>
                    <button class="activity-button py-2 px-2 rounded-lg bg-white dark:bg-gray-800 text-purple-600 dark:text-purple-400 text-xs font-bold shadow-sm hover:shadow hover:-translate-y-0.5 transition-all border border-gray-200 dark:border-gray-600"
                        data-topic="Matching Objects Activity">
                        <i class="fas fa-gamepad mr-1"></i> Activity
                    </button>
                    <button class="story-button py-2 px-2 rounded-lg bg-white dark:bg-gray-800 text-orange-500 text-xs font-bold shadow-sm hover:shadow hover:-translate-y-0.5 transition-all border border-gray-200 dark:border-gray-600"
                        data-topic="A story about finding matching socks">
                        <i class="fas fa-book-open mr-1"></i> Story
                    </button>
                </div>
                <!-- AI Output Area -->
                <div class="ai-output hidden bg-yellow-50 dark:bg-gray-900 p-4 text-sm text-text-default border-t border-yellow-200 dark:border-gray-700 animate-fade-in-up"></div>
            </article>

            <!-- Topic Card B -->
            <article class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <div class="p-6 flex-grow relative">
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

                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start gap-3 text-sm text-text-default">
                            <i class="fas fa-check-circle text-green-500 mt-1"></i>
                            <span><strong>Lesson 5:</strong> Make one group with a given attribute.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-text-default">
                            <i class="fas fa-check-circle text-green-500 mt-1"></i>
                            <span><strong>Lesson 6:</strong> Sort into two groups.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-text-default">
                            <i class="fas fa-check-circle text-green-500 mt-1"></i>
                            <span><strong>Lesson 7:</strong> Sort the same group in two ways.</span>
                        </li>
                    </ul>
                </div>

                <!-- AI Interaction Footer -->
                <div class="bg-base-bg p-4 border-t border-gray-100 dark:border-gray-700 grid grid-cols-3 gap-2">
                    <button class="explain-button py-2 px-2 rounded-lg bg-white dark:bg-gray-800 text-primary text-xs font-bold shadow-sm hover:shadow hover:-translate-y-0.5 transition-all border border-gray-200 dark:border-gray-600"
                        data-topic="Sorting by color and shape for Pre-K">
                        <i class="fas fa-lightbulb mr-1"></i> Explain
                    </button>
                    <button class="activity-button py-2 px-2 rounded-lg bg-white dark:bg-gray-800 text-purple-600 dark:text-purple-400 text-xs font-bold shadow-sm hover:shadow hover:-translate-y-0.5 transition-all border border-gray-200 dark:border-gray-600"
                        data-topic="Sorting toys activity">
                        <i class="fas fa-gamepad mr-1"></i> Activity
                    </button>
                    <button class="story-button py-2 px-2 rounded-lg bg-white dark:bg-gray-800 text-orange-500 text-xs font-bold shadow-sm hover:shadow hover:-translate-y-0.5 transition-all border border-gray-200 dark:border-gray-600"
                        data-topic="The bear who sorted his berries">
                        <i class="fas fa-book-open mr-1"></i> Story
                    </button>
                </div>
                <!-- AI Output Area -->
                <div class="ai-output hidden bg-yellow-50 dark:bg-gray-900 p-4 text-sm text-text-default border-t border-yellow-200 dark:border-gray-700 animate-fade-in-up"></div>
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

</main>

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
            btn.classList.remove('active', 'bg-gray-200', 'dark:bg-gray-700'); // Clean cleanup
            btn.setAttribute('aria-selected', 'false');

            // Remove specific color classes (Reset to default secondary text)
            btn.classList.add('text-text-secondary');
            btn.classList.remove('text-white', 'shadow-md');

            // Remove specific bg colors based on ID
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

    // AI Placeholder Logic (Simulated for Demo)
    // NOTE: In a real app, this would call your backend which calls Gemini
    document.addEventListener("DOMContentLoaded", function() {
        const aiButtons = document.querySelectorAll('.explain-button, .activity-button, .story-button');

        aiButtons.forEach(btn => {
            btn.addEventListener('click', async function() {
                const outputDiv = this.closest('article').querySelector('.ai-output');
                const topic = this.getAttribute('data-topic');
                const type = this.classList.contains('explain-button') ? 'Explanation' :
                    this.classList.contains('activity-button') ? 'Activity' : 'Story';

                // Reset UI
                outputDiv.classList.remove('hidden');
                outputDiv.innerHTML = `<div class="flex items-center gap-2"><div class="loader"></div> Generating ${type}...</div>`;

                // Simulate delay
                await new Promise(r => setTimeout(r, 1000));

                // Simulated Response
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

    // Simple Loader CSS for the script above (in case global CSS doesn't have it)
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
        /* Hide scrollbar for tab container */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    `;
    document.head.appendChild(style);
</script>

<?php include '../src/footer.php'; ?>