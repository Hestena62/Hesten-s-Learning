<?php
$pageTitle = "Assessment | Hesten's Learning";
$pageDescription = "Empowering students with learning disabilities through personalized, accessible learning experiences in Math, ELA, and Science.";
include '../src/header.php';
?>

<!-- MAIN CONTENT START -->

<!-- Assessment Selection View (Hidden by default, shown if no grade selected) -->
<div id="assessment-selection" class="container mx-auto px-4 py-12 hidden">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-4">
            Select Your Assessment Level
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
            Choose a grade level to begin your personalized knowledge check.
        </p>
    </div>

    <div id="grade-selection-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Grid items injected by JS -->
    </div>
</div>

<!-- QUIZ CONTENT (Hidden if no grade selected) -->
<header id="quiz-header"
    class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10 text-center">

    <!-- Abstract Background Shapes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <i class="fas fa-tasks absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
        <i
            class="fas fa-check-circle absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
    </div>

    <div class="container mx-auto relative z-10">
        <div
            class="inline-flex items-center gap-2 py-1 px-3 rounded-full bg-white/10 border border-white/20 text-xs font-bold tracking-wider uppercase mb-4 backdrop-blur-md shadow-sm">
            <i class="fas fa-star text-yellow-300"></i> Assessment
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-4 drop-shadow">
            <span id="header-grade-name">Loading...</span> Knowledge Check
        </h1>
        <p class="text-lg opacity-90 max-w-2xl mx-auto mb-8">
            Test your skills across all major subjects.
        </p>

        <!-- Navigation Group -->
        <div class="flex flex-wrap justify-center items-center gap-4">
            <!-- Previous Button -->
            <a id="btn-prev" href="#"
                class="hidden group flex items-center px-4 py-2 bg-blue-800/40 hover:bg-blue-800 text-blue-100 rounded-full font-semibold transition-all border border-blue-400/30">
                <i class="fas fa-chevron-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                <span id="btn-prev-label">Previous</span>
            </a>

            <!-- Spacer -->
            <div id="spacer-prev" class="hidden md:block w-32"></div>

            <!-- Main Curriculum Link -->
            <a id="link-curriculum" href="#"
                class="px-6 py-2 bg-white text-blue-700 rounded-full font-bold hover:bg-blue-50 transition-colors shadow-lg flex items-center">
                <i class="fas fa-th mr-2"></i> Return to Curriculum
            </a>

            <!-- Next Button -->
            <a id="btn-next" href="#"
                class="hidden group flex items-center px-4 py-2 bg-blue-800/40 hover:bg-blue-800 text-blue-100 rounded-full font-semibold transition-all border border-blue-400/30">
                <span id="btn-next-label">Next</span>
                <i class="fas fa-chevron-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>

            <!-- Spacer -->
            <div id="spacer-next" class="hidden md:block w-32"></div>
        </div>
    </div>
</header>

<div id="quiz-container" class="container mx-auto px-4 pb-12">
    <!-- Hidden inputs for JavaScript -->
    <input type="hidden" id="force-grade" value="" />
    <input type="hidden" id="grade-key" value="" />

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Stats -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-t-4 border-blue-500">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                    Your Progress
                </h3>
                <div class="relative pt-1">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span
                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200 dark:bg-blue-900 dark:text-blue-200">
                                Current Score
                            </span>
                        </div>
                        <div class="text-right">
                            <span
                                class="text-xs font-semibold inline-block text-blue-600 dark:text-blue-400 progress-bar-text">
                                0%
                            </span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-4 mb-4 text-xs flex rounded bg-blue-200 dark:bg-blue-900/50">
                        <div style="width: 0%"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500 progress-bar-animated">
                        </div>
                    </div>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400 italic">
                    Complete questions to earn badges!
                </p>
            </div>

            <!-- Subject Filter -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                    Focus Area
                </h3>
                <div class="space-y-2">
                    <button onclick="filterQuestions('All')"
                        class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 transition-colors font-medium border border-transparent focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <i class="fas fa-layer-group w-6 text-center mr-2 text-gray-400"></i>
                        Mix All Subjects
                    </button>
                    <button onclick="filterQuestions('Math')"
                        class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 transition-colors font-medium border border-transparent focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <i class="fas fa-calculator w-6 text-center mr-2 text-blue-500"></i>
                        Math
                    </button>
                    <button onclick="filterQuestions('Language Arts')"
                        class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-pink-50 dark:hover:bg-pink-900/30 hover:text-pink-600 transition-colors font-medium border border-transparent focus:border-pink-500 focus:ring-1 focus:ring-pink-500">
                        <i class="fas fa-book-reader w-6 text-center mr-2 text-pink-500"></i>
                        Language Arts
                    </button>
                    <button onclick="filterQuestions('Science')"
                        class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-emerald-50 dark:hover:bg-emerald-900/30 hover:text-emerald-600 transition-colors font-medium border border-transparent focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                        <i class="fas fa-flask w-6 text-center mr-2 text-emerald-500"></i>
                        Science
                    </button>
                    <button onclick="filterQuestions('Social Studies')"
                        class="w-full text-left px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-amber-50 dark:hover:bg-amber-900/30 hover:text-amber-600 transition-colors font-medium border border-transparent focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                        <i class="fas fa-globe-americas w-6 text-center mr-2 text-amber-500"></i>
                        Social Studies
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Quiz Area -->
        <div class="lg:col-span-2">
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 h-full flex flex-col relative overflow-hidden">
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 p-4 opacity-5">
                    <i class="fas fa-puzzle-piece text-9xl"></i>
                </div>

                <div class="flex justify-between items-center mb-6 border-b border-gray-100 dark:border-gray-700 pb-4">
                    <div>
                        <span class="text-sm font-bold text-gray-500 uppercase tracking-wide">Question</span>
                        <div id="question-count" class="text-4xl font-black text-gray-900 dark:text-white">
                            1<span class="text-xl text-gray-400 font-medium">/10</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <span id="streak-counter"
                            class="px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-sm font-bold hidden animate-pulse">
                            🔥 0 streak
                        </span>
                    </div>
                </div>

                <div class="flex-grow mb-8">
                    <h2 id="question"
                        class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-8 leading-snug min-h-[4rem]">
                        Loading Question...
                    </h2>

                    <div id="options" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Options injected by JS -->
                    </div>
                </div>

                <!-- Feedback Area -->
                <div id="feedback-area"
                    class="min-h-[60px] p-4 rounded-lg hidden mb-6 animate-fade-in-up transition-all duration-300">
                    <div class="flex items-start gap-3">
                        <div id="feedback-icon" class="text-2xl mt-1"></div>
                        <div>
                            <h4 id="feedback-title" class="font-bold text-lg"></h4>
                            <p id="feedback" class="text-sm opacity-90"></p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                    <button onclick="showHint()"
                        class="text-yellow-600 dark:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 px-4 py-2 rounded-lg transition-colors font-medium text-sm flex items-center gap-2">
                        <i class="far fa-lightbulb"></i> Need a Hint?
                    </button>

                    <button id="next-btn" onclick="nextQuestionAdapter()"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-blue-500/30 transform hover:-translate-y-1 transition-all disabled:opacity-50 disabled:cursor-not-allowed hidden">
                        Next Question <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>

                  <button onclick="document.getElementById('send-report-modal').classList.remove('hidden'); document.getElementById('send-report-modal').classList.add('flex');"
                    class="w-full flex items-center justify-center gap-3 bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-0.5">
                    <i class="fas fa-paper-plane"></i> Send Report to Adult
                </button>

                <!-- Hint Modal (Inline) -->
                <div id="hintText"
                    class="hidden mt-4 bg-yellow-50 dark:bg-yellow-900/30 p-4 rounded-lg border-l-4 border-yellow-400 text-yellow-800 dark:text-yellow-200 text-sm transition-all">
                    <strong>Hint:</strong> <span id="hint-content"></span>
                </div>

                  <button onclick="document.getElementById('send-report-modal').classList.remove('hidden'); document.getElementById('send-report-modal').classList.add('flex');"
                    class="w-full flex items-center justify-center gap-3 bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-0.5">
                    <i class="fas fa-paper-plane"></i> Send Report to Adult
                </button>
                
            </div>
        </div>
    </div>
</div>

```html
<!-- Results View (Hidden by default, shown when quiz ends) -->
<div id="results-view" class="container mx-auto px-4 py-12 hidden">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
        <div class="bg-gradient-to-br from-indigo-600 to-purple-700 p-10 text-center text-white">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full mb-4 backdrop-blur-md">
                <i class="fas fa-award text-4xl text-yellow-300"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-extrabold mb-2">Assessment Complete!</h2>
            <p class="text-indigo-100">You've finished your personalized knowledge check.</p>
        </div>

        <div class="p-8">
            <div class="grid grid-cols-2 gap-4 mb-8">
                <div class="bg-gray-50 dark:bg-gray-700/50 p-6 rounded-2xl text-center border border-gray-100 dark:border-gray-600">
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Final Score</p>
                    <p id="final-score" class="text-4xl font-black text-indigo-600 dark:text-indigo-400">0%</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 p-6 rounded-2xl text-center border border-gray-100 dark:border-gray-600">
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Questions</p>
                    <p id="final-count" class="text-4xl font-black text-gray-900 dark:text-white">0/10</p>
                </div>
            </div>

            <div class="space-y-4">
                <button onclick="downloadReport()"
                    class="w-full flex items-center justify-center gap-3 bg-emerald-600 hover:bg-emerald-700 text-white py-4 rounded-xl font-bold shadow-lg shadow-emerald-500/20 transition-all transform hover:-translate-y-0.5">
                    <i class="fas fa-file-download"></i> Download Report (.txt)
                </button>

                <button onclick="document.getElementById('send-report-modal').classList.remove('hidden'); document.getElementById('send-report-modal').classList.add('flex');"
                    class="w-full flex items-center justify-center gap-3 bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-0.5">
                    <i class="fas fa-paper-plane"></i> Send Report to Adult
                </button>

                <button onclick="location.reload()"
                    class="w-full flex items-center justify-center gap-3 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 py-4 rounded-xl font-bold transition-all">
                    <i class="fas fa-redo"></i> Try Another Grade
                </button>
            </div>
        </div>
    </div>
</div>
```


<div id="send-report-modal"
    class="fixed inset-0 bg-black/75 backdrop-blur-sm hidden items-center justify-center z-[100]" role="dialog"
    aria-modal="true">
    <div
        class="bg-content-bg rounded-xl shadow-2xl p-6 max-w-lg w-full border border-gray-200 dark:border-gray-700 relative">
        <button
            onclick="document.getElementById('send-report-modal').classList.add('hidden'); document.getElementById('send-report-modal').classList.remove('flex');"
            class="absolute top-4 right-4 text-text-secondary hover:text-red-500">
            <i class="fas fa-times text-xl"></i>
        </button>
        <h3 class="text-2xl font-bold text-primary mb-4 flex items-center gap-2">
            <i class="fas fa-paper-plane"></i> Send Report to Adult
        </h3>
        <p class="text-sm text-text-secondary mb-6">
            Fill out the form below to send the assessment results. Make sure to attach your downloaded `.txt` report!
        </p>

        <!-- FormSubmit Form -->
        <!-- NOTE: Replace 'your-email@example.com' with the actual receiving adult's or admin's email address -->
        <form action="https://formsubmit.co/reports@hestena62.com" method="POST" enctype="multipart/form-data"
            class="space-y-4">

            <!-- FormSubmit Configurations -->
            <input type="hidden" name="_subject" value="New Assessment Report from Hesten's Learning">
            <input type="hidden" name="_captcha" value="true">
            <input type="hidden" name="_template" value="table">

            <div>
                <label for="adult-email" class="block text-sm font-bold text-text-default mb-1">To Email:</label>
                <input type="email" id="adult-email" name="email" required placeholder="adult@example.com"
                    class="w-full px-4 py-2 rounded-lg bg-base-bg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary text-text-default" />
            </div>

            <div>
                <label for="cc-email" class="block text-sm font-bold text-text-default mb-1">CC Email
                    (Optional):</label>
                <input type="email" id="cc-email" name="_cc" placeholder="another_adult@example.com"
                    class="w-full px-4 py-2 rounded-lg bg-base-bg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary text-text-default" />
            </div>

            <div>
                <label for="report-message" class="block text-sm font-bold text-text-default mb-1">Message:</label>
                <textarea id="report-message" name="message" rows="3" placeholder="I have finished my assessment!"
                    class="w-full px-4 py-2 rounded-lg bg-base-bg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary text-text-default"></textarea>
            </div>

            <div>
                <label for="report-file" class="block text-sm font-bold text-text-default mb-1">Attach Report (TXT
                    only):</label>
                <!-- Only allow txt uploads -->
                <input type="file" id="report-file" name="attachment" accept=".txt" required
                    class="w-full text-sm text-text-default file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-secondary transition-colors" />
                <p class="text-xs text-text-secondary mt-1">Please download your results first, then upload the file
                    here.</p>
            </div>

            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-2">
                <button type="button"
                    onclick="document.getElementById('send-report-modal').classList.add('hidden'); document.getElementById('send-report-modal').classList.remove('flex');"
                    class="px-4 py-2 text-text-default bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-lg font-bold transition-colors">
                    Cancel
                </button>
                <button type="submit"
                    class="px-6 py-2 bg-primary text-white rounded-lg font-bold hover:bg-secondary focus:ring-4 focus:ring-accent transition-all shadow-lg">
                    Send Report <i class="fas fa-paper-plane ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>
 -->

<script src="/JS/p-12.js"></script>
<script src="/JS/AP.js"></script>
<script src="/JS/assessment-page.js"></script>

<?php include '../src/footer.php'; ?>