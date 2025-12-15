<?php
// --- Page Configuration ---
$pageTitle       = "Help Center & User Guide";
$pageDescription = "Learn how to use Hesten's Learning. Guides for students, parents, and teachers on accessibility, curriculum, and progress tracking.";
$pageKeywords    = "help center, user guide, how to use, accessibility tools, special education resources";
$pageAuthor      = "Hesten's Learning";

include 'src/header.php';
?>

<!-- Hero Section with Search -->
<div
    class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-10">
        <i class="fas fa-question-circle absolute top-10 left-10 text-9xl animate-pulse"></i>
        <i class="fas fa-hands-helping absolute bottom-10 right-10 text-[10rem] rotate-12"></i>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-white/10 rounded-full blur-3xl">
        </div>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto text-center">
        <span
            class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-6 uppercase tracking-wider backdrop-blur-md">
            Support & Documentation
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight">How can we help?</h1>
        <p class="text-xl text-blue-100 mb-10 font-light">
            Guides, tips, and answers for everyone in the Hesten's Learning community.
        </p>

        <!-- Search Bar -->
        <div class="relative max-w-xl mx-auto group">
            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400 group-focus-within:text-primary transition-colors"></i>
            </div>
            <input type="text" id="help-search" onkeyup="filterFAQ()"
                class="w-full pl-12 pr-4 py-4 rounded-full text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-white/30 shadow-2xl transition-all"
                placeholder="Search for answers (e.g., 'progress', 'dyslexia font')...">
        </div>
    </div>
</div>

<main class="container mx-auto px-4 mb-20" id="main-content">

    <!-- Role Selection Tabs -->
    <div class="flex flex-wrap justify-center gap-4 mb-12" role="tablist" aria-label="User Guides">
        <button onclick="switchTab('student')" id="tab-student"
            class="role-tab active flex items-center gap-2 px-8 py-4 rounded-full text-lg font-bold bg-primary text-white shadow-lg transform transition-all hover:scale-105 focus:ring-4 focus:ring-primary/40"
            aria-selected="true" aria-controls="panel-student">
            <i class="fas fa-user-graduate"></i> I'm a Student
        </button>
        <button onclick="switchTab('parent')" id="tab-parent"
            class="role-tab flex items-center gap-2 px-8 py-4 rounded-full text-lg font-bold bg-content-bg text-text-secondary border-2 border-transparent hover:border-primary/50 shadow-sm transition-all hover:bg-white dark:hover:bg-gray-800 focus:ring-4 focus:ring-gray-200"
            aria-selected="false" aria-controls="panel-parent">
            <i class="fas fa-user-friends"></i> I'm a Parent
        </button>
        <button onclick="switchTab('teacher')" id="tab-teacher"
            class="role-tab flex items-center gap-2 px-8 py-4 rounded-full text-lg font-bold bg-content-bg text-text-secondary border-2 border-transparent hover:border-primary/50 shadow-sm transition-all hover:bg-white dark:hover:bg-gray-800 focus:ring-4 focus:ring-gray-200"
            aria-selected="false" aria-controls="panel-teacher">
            <i class="fas fa-chalkboard-teacher"></i> I'm a Teacher
        </button>
    </div>

    <!-- CONTENT PANELS -->

    <!-- 1. STUDENT PANEL -->
    <section id="panel-student" class="role-panel animate-fade-in-up">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- Guide Card 1 -->
            <div
                class="bg-content-bg p-8 rounded-3xl shadow-lg border-l-8 border-primary relative overflow-hidden group">
                <div class="absolute right-0 top-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                    <i class="fas fa-universal-access text-9xl text-primary"></i>
                </div>
                <h3 class="text-2xl font-bold text-text-default mb-4 flex items-center gap-3">
                    <span
                        class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center text-sm">1</span>
                    Customize Your View
                </h3>
                <p class="text-text-secondary mb-6 leading-relaxed">
                    Make the site easier to read. Click the <i class="fas fa-universal-access mx-1 text-primary"></i>
                    icon in the bottom right corner to:
                </p>
                <ul class="space-y-3 text-text-default">
                    <li class="flex items-center gap-3"><i class="fas fa-font text-accent"></i> Change the font (try
                        Open Dyslexic!)</li>
                    <li class="flex items-center gap-3"><i class="fas fa-adjust text-accent"></i> Switch to Dark Mode or
                        High Contrast</li>
                    <li class="flex items-center gap-3"><i class="fas fa-ruler-vertical text-accent"></i> Make text
                        bigger or add line spacing</li>
                </ul>
            </div>

            <!-- Guide Card 2 -->
            <div
                class="bg-content-bg p-8 rounded-3xl shadow-lg border-l-8 border-green-500 relative overflow-hidden group">
                <div class="absolute right-0 top-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                    <i class="fas fa-check-circle text-9xl text-green-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-text-default mb-4 flex items-center gap-3">
                    <span
                        class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center text-sm">2</span>
                    Track Your Progress
                </h3>
                <p class="text-text-secondary mb-6 leading-relaxed">
                    When you finish a lesson or grade level, click the <i class="fas fa-check mx-1 text-green-500"></i>
                    checkmark button.
                </p>
                <ul class="space-y-3 text-text-default">
                    <li class="flex items-center gap-3"><i class="fas fa-magic text-green-500"></i> You'll see confetti
                        when you finish!</li>
                    <li class="flex items-center gap-3"><i class="fas fa-save text-green-500"></i> Your progress saves
                        automatically on this device.</li>
                    <li class="flex items-center gap-3"><i class="fas fa-undo text-green-500"></i> You can uncheck it
                        anytime if you want to practice again.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 2. PARENT PANEL -->
    <section id="panel-parent" class="role-panel hidden animate-fade-in-up">
        <div class="bg-blue-50 dark:bg-blue-900/20 rounded-3xl p-8 mb-10 border border-blue-100 dark:border-blue-800">
            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-4"><i class="fas fa-shield-alt mr-2"></i>
                Privacy & Safety First</h3>
            <p class="text-blue-800 dark:text-blue-200 leading-relaxed text-lg">
                Hesten's Learning is designed to be completely safe for children. <strong>We do not require accounts,
                    emails, or passwords.</strong> All progress is stored locally in your browser's memory
                (LocalStorage). This means no personal data is ever sent to a server or shared with third parties.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-content-bg p-6 rounded-2xl shadow-md">
                <div
                    class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center text-2xl mb-4">
                    <i class="fas fa-book-reader"></i></div>
                <h4 class="text-xl font-bold text-text-default mb-2">Reading Support</h4>
                <p class="text-text-secondary text-sm">Use the "Reading Guide" (mask) in the accessibility menu to help
                    your child focus on one line at a time. Text-to-Speech is available on most lessons.</p>
            </div>
            <div class="bg-content-bg p-6 rounded-2xl shadow-md">
                <div
                    class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center text-2xl mb-4">
                    <i class="fas fa-list-ol"></i></div>
                <h4 class="text-xl font-bold text-text-default mb-2">Standard Alignment</h4>
                <p class="text-text-secondary text-sm">Check our <a href="standards.php"
                        class="text-primary underline">Standards Page</a> to see how our content aligns with Common Core
                    (CCSS) requirements for your child's grade.</p>
            </div>
            <div class="bg-content-bg p-6 rounded-2xl shadow-md">
                <div
                    class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center text-2xl mb-4">
                    <i class="fas fa-mobile-alt"></i></div>
                <h4 class="text-xl font-bold text-text-default mb-2">Any Device</h4>
                <p class="text-text-secondary text-sm">Our site works on iPads, Chromebooks, and phones. You can switch
                    devices, but note that progress doesn't sync between them (for privacy).</p>
            </div>
        </div>
    </section>

    <!-- 3. TEACHER PANEL -->
    <section id="panel-teacher" class="role-panel hidden animate-fade-in-up">
        <div class="flex flex-col md:flex-row gap-8 items-start">
            <div class="flex-1">
                <h3 class="text-2xl font-bold text-text-default mb-4">In the Classroom</h3>
                <p class="text-text-secondary mb-6 leading-relaxed">
                    Hesten's Learning is a free tool for your "Response to Intervention" (RTI) or special education
                    toolkit. Because there are no logins, you can get students started instantly.
                </p>

                <div class="space-y-4">
                    <div class="flex gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center shrink-0 font-bold">
                            1</div>
                        <div>
                            <h5 class="font-bold text-text-default">Differentiation</h5>
                            <p class="text-sm text-text-secondary">Direct students to specific grade levels regardless
                                of their actual grade. A 5th grader can practice Grade 2 math without stigma, as the
                                interface looks consistent.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center shrink-0 font-bold">
                            2</div>
                        <div>
                            <h5 class="font-bold text-text-default">Smart Board Friendly</h5>
                            <p class="text-sm text-text-secondary">Use "High Contrast" mode when projecting on a
                                whiteboard to ensure visibility from the back of the room.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center shrink-0 font-bold">
                            3</div>
                        <div>
                            <h5 class="font-bold text-text-default">No Setup Time</h5>
                            <p class="text-sm text-text-secondary">Since there are no rosters to import or passwords to
                                reset, it's perfect for station rotations or independent work time.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="w-full md:w-1/3 bg-content-bg p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                <h4 class="font-bold text-lg mb-4 border-b pb-2 border-gray-100 dark:border-gray-700">Quick Resources
                </h4>
                <ul class="space-y-3">
                    <li><a href="standards.php"
                            class="block p-3 rounded-lg bg-base-bg hover:bg-primary/10 hover:text-primary transition-colors"><i
                                class="fas fa-file-alt mr-2"></i> CCSS Standards Guide</a></li>
                    <li><a href="#"
                            class="block p-3 rounded-lg bg-base-bg hover:bg-primary/10 hover:text-primary transition-colors"><i
                                class="fas fa-print mr-2"></i> Printable Worksheets (Coming Soon)</a></li>
                    <li><a href="mailto:admin@hestena62.com"
                            class="block p-3 rounded-lg bg-base-bg hover:bg-primary/10 hover:text-primary transition-colors"><i
                                class="fas fa-envelope mr-2"></i> Request a Feature</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <div class="mt-24 max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-text-default mb-10">Frequently Asked Questions</h2>

        <div class="space-y-4" id="faq-container">
            <!-- FAQ 1 -->
            <details
                class="faq-item group bg-content-bg rounded-xl border border-gray-200 dark:border-gray-700 open:shadow-lg transition-all duration-300">
                <summary
                    class="flex justify-between items-center cursor-pointer p-6 font-bold text-lg text-text-default list-none focus:ring-2 focus:ring-primary focus:outline-none rounded-xl">
                    <span>Is this site really free?</span>
                    <span class="transition-transform group-open:rotate-180 text-primary"><i
                            class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="px-6 pb-6 text-text-secondary leading-relaxed">
                    Yes. Hesten's Learning is a personal project dedicated to accessible education. There are no
                    paywalls, subscriptions, or hidden fees.
                </div>
            </details>

            <!-- FAQ 2 -->
            <details
                class="faq-item group bg-content-bg rounded-xl border border-gray-200 dark:border-gray-700 open:shadow-lg transition-all duration-300">
                <summary
                    class="flex justify-between items-center cursor-pointer p-6 font-bold text-lg text-text-default list-none focus:ring-2 focus:ring-primary focus:outline-none rounded-xl">
                    <span>How do I save my progress?</span>
                    <span class="transition-transform group-open:rotate-180 text-primary"><i
                            class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="px-6 pb-6 text-text-secondary leading-relaxed">
                    Progress is saved automatically to the device and browser you are currently using. If you clear your
                    browser history/cookies, progress may be reset. We recommend not clearing "Local Storage" if you
                    want to keep your checkmarks.
                </div>
            </details>

            <!-- FAQ 3 -->
            <details
                class="faq-item group bg-content-bg rounded-xl border border-gray-200 dark:border-gray-700 open:shadow-lg transition-all duration-300">
                <summary
                    class="flex justify-between items-center cursor-pointer p-6 font-bold text-lg text-text-default list-none focus:ring-2 focus:ring-primary focus:outline-none rounded-xl">
                    <span>What is the "Open Dyslexic" font?</span>
                    <span class="transition-transform group-open:rotate-180 text-primary"><i
                            class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="px-6 pb-6 text-text-secondary leading-relaxed">
                    Open Dyslexic is a font designed to mitigate some of the common reading errors caused by dyslexia.
                    The letters have heavy weighted bottoms to indicate direction and help reinforce the line of text.
                    You can enable it in the accessibility menu (bottom right).
                </div>
            </details>

            <!-- FAQ 4 -->
            <details
                class="faq-item group bg-content-bg rounded-xl border border-gray-200 dark:border-gray-700 open:shadow-lg transition-all duration-300">
                <summary
                    class="flex justify-between items-center cursor-pointer p-6 font-bold text-lg text-text-default list-none focus:ring-2 focus:ring-primary focus:outline-none rounded-xl">
                    <span>Can I use this offline?</span>
                    <span class="transition-transform group-open:rotate-180 text-primary"><i
                            class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="px-6 pb-6 text-text-secondary leading-relaxed">
                    Currently, an internet connection is required to load the lessons and resources.
                </div>
            </details>
        </div>

        <!-- No Results Message -->
        <p id="faq-no-results" class="hidden text-center text-text-secondary mt-8">No matching questions found.</p>
    </div>

</main>

<script>
    // --- Role Tab Logic ---
    function switchTab(role) {
        // 1. Update Buttons
        document.querySelectorAll('.role-tab').forEach(btn => {
            if (btn.id === `tab-${role}`) {
                btn.classList.add('bg-primary', 'text-white', 'shadow-lg');
                btn.classList.remove('bg-content-bg', 'text-text-secondary', 'shadow-sm');
                btn.setAttribute('aria-selected', 'true');
            } else {
                btn.classList.remove('bg-primary', 'text-white', 'shadow-lg');
                btn.classList.add('bg-content-bg', 'text-text-secondary', 'shadow-sm');
                btn.setAttribute('aria-selected', 'false');
            }
        });

        // 2. Update Panels
        document.querySelectorAll('.role-panel').forEach(panel => {
            if (panel.id === `panel-${role}`) {
                panel.classList.remove('hidden');
                // Trigger animation replay
                panel.classList.remove('animate-fade-in-up');
                void panel.offsetWidth; // trigger reflow
                panel.classList.add('animate-fade-in-up');
            } else {
                panel.classList.add('hidden');
            }
        });
    }

    // --- FAQ Search Logic ---
    function filterFAQ() {
        const input = document.getElementById('help-search').value.toLowerCase();
        const items = document.querySelectorAll('.faq-item');
        let hasResults = false;

        items.forEach(item => {
            const question = item.querySelector('summary span').textContent.toLowerCase();
            const answer = item.querySelector('div').textContent.toLowerCase();

            if (question.includes(input) || answer.includes(input)) {
                item.style.display = 'block';
                if (input !== '') item.setAttribute('open', 'true'); // Auto-open on search
                hasResults = true;
            } else {
                item.style.display = 'none';
                item.removeAttribute('open');
            }
        });

        const msg = document.getElementById('faq-no-results');
        if (!hasResults) msg.classList.remove('hidden');
        else msg.classList.add('hidden');
    }
</script>

<?php include 'src/footer.php'; ?>