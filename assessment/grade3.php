<?php
// Page configuration
$pageTitle = "Grade 3 Math Assessment";
$pageDescription = "Comprehensive Grade 3 Math Assessment covering Operations, Fractions, Measurement, and Geometry.";
$pageKeywords = "math, grade 3, assessment, test, accessibility, education";

// Include the existing header (ensures all styles and a11y settings are loaded)
include '../src/header.php';
?>

<!-- PDF Generation Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- MAIN CONTENT WRAPPER -->
<main id="main-content" class="container mx-auto px-4 py-8 min-h-screen transition-colors duration-300">

    <!-- ========================================== -->
    <!-- SECTION 1: ENTRANCE / CONFIGURATION PANEL -->
    <!-- ========================================== -->
    <section id="entrance-panel" class="max-w-3xl mx-auto my-10">
        <div class="bg-content-bg rounded-xl shadow-2xl overflow-hidden border border-gray-200 dark:border-gray-700">
            <div class="bg-primary p-6 text-white">
                <h1 class="text-3xl font-bold flex items-center">
                    <i class="fas fa-clipboard-check mr-4"></i> Grade 3 Math Assessment
                </h1>
                <p class="mt-2 opacity-90">Please enter your details and select your testing preferences below.</p>
            </div>

            <form id="setup-form" class="p-8 space-y-8" onsubmit="startAssessment(event)">
                
                <!-- Student Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="student-name" class="block text-sm font-bold text-text-default mb-2">Student Name</label>
                        <input type="text" id="student-name" required
                            class="w-full px-4 py-3 rounded-lg bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default focus:ring-2 focus:ring-primary focus:outline-none transition-all"
                            placeholder="Enter full name">
                    </div>
                    <div>
                        <label for="current-date" class="block text-sm font-bold text-text-default mb-2">Date</label>
                        <input type="date" id="current-date" required
                            class="w-full px-4 py-3 rounded-lg bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                    </div>
                    <div>
                        <label for="grade-level" class="block text-sm font-bold text-text-default mb-2">Current Grade Level</label>
                        <select id="grade-level" required
                            class="w-full px-4 py-3 rounded-lg bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                            <option value="3" selected>Grade 3</option>
                            <option value="2">Grade 2</option>
                            <option value="4">Grade 4</option>
                        </select>
                    </div>
                </div>

                <hr class="border-gray-200 dark:border-gray-700">

                <!-- Test Settings / Accommodations -->
                <div>
                    <h3 class="text-xl font-bold text-primary mb-4 flex items-center">
                        <i class="fas fa-cogs mr-2"></i> Test Settings & Accommodations
                    </h3>
                    
                    <div class="bg-base-bg p-6 rounded-lg space-y-4">
                        
                        <!-- Timer Option -->
                        <div class="flex items-center justify-between flex-wrap gap-4">
                            <div class="flex items-center">
                                <input type="checkbox" id="setting-timer" class="toggle mr-3">
                                <label for="setting-timer" class="font-medium text-text-default cursor-pointer">Enable Countdown Timer</label>
                            </div>
                            <div id="timer-duration-container" class="hidden flex items-center bg-content-bg p-2 rounded border border-gray-300 dark:border-gray-600">
                                <label for="timer-minutes" class="text-sm mr-2 text-text-default">Duration (minutes):</label>
                                <input type="number" id="timer-minutes" min="1" max="180" value="45" class="w-20 p-1 rounded bg-base-bg text-text-default border border-gray-300 dark:border-gray-600">
                            </div>
                        </div>

                        <!-- Clock Option -->
                        <div class="flex items-center">
                            <input type="checkbox" id="setting-clock" class="toggle mr-3">
                            <label for="setting-clock" class="font-medium text-text-default cursor-pointer">Show Current Time Clock</label>
                        </div>

                        <!-- Elapsed Time Option -->
                        <div class="flex items-center">
                            <input type="checkbox" id="setting-elapsed" class="toggle mr-3">
                            <label for="setting-elapsed" class="font-medium text-text-default cursor-pointer">Show Elapsed Time (Stopwatch)</label>
                        </div>

                        <!-- Text-to-Speech Option -->
                        <div class="flex items-center">
                            <input type="checkbox" id="setting-tts" class="toggle mr-3">
                            <label for="setting-tts" class="font-medium text-text-default cursor-pointer">Enable Text-to-Speech (Read Aloud)</label>
                        </div>
                    </div>
                </div>

                <!-- Start Button -->
                <div class="text-center pt-4">
                    <button type="submit" 
                        class="bg-green-600 hover:bg-green-700 text-white font-bold text-xl py-4 px-12 rounded-full shadow-lg transform transition hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-400">
                        Start Assessment <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </section>


    <!-- ========================================== -->
    <!-- SECTION 2: ACTIVE ASSESSMENT INTERFACE    -->
    <!-- ========================================== -->
    <div id="assessment-interface" class="hidden transition-opacity duration-500 opacity-0">
        
        <!-- Sticky Status Bar -->
        <div class="sticky top-20 z-30 bg-content-bg shadow-md rounded-lg p-4 mb-8 border-l-4 border-accent flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center">
                <div class="bg-primary text-white rounded-full w-10 h-10 flex items-center justify-center mr-3">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <span class="block text-xs text-text-secondary uppercase tracking-wider">Student</span>
                    <span id="display-student-name" class="font-bold text-text-default text-lg">--</span>
                </div>
            </div>

            <div class="flex gap-6 text-text-default font-mono text-xl">
                <!-- Clock -->
                <div id="status-clock" class="hidden flex items-center bg-base-bg px-3 py-1 rounded">
                    <i class="far fa-clock mr-2 text-primary"></i> <span id="clock-display">00:00</span>
                </div>
                <!-- Timer -->
                <div id="status-timer" class="hidden flex items-center bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-100 px-3 py-1 rounded">
                    <i class="fas fa-hourglass-half mr-2"></i> <span id="timer-display">00:00</span>
                </div>
                <!-- Elapsed -->
                <div id="status-elapsed" class="hidden flex items-center bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100 px-3 py-1 rounded">
                    <i class="fas fa-stopwatch mr-2"></i> <span id="elapsed-display">00:00</span>
                </div>
            </div>
        </div>

        <!-- Assessment Form -->
        <form id="assessment-form" class="space-y-12 max-w-4xl mx-auto pb-20">
            
            <!-- DOMAIN: OPERATIONS & ALGEBRAIC THINKING -->
            <section class="bg-content-bg p-8 rounded-xl shadow-lg border-t-8 border-purple-500">
                <h2 class="text-2xl font-bold text-primary mb-6 flex items-center border-b pb-2 border-gray-200 dark:border-gray-700">
                    <i class="fas fa-calculator mr-3"></i> Operations & Algebraic Thinking
                </h2>

                <div class="space-y-8">
                    <!-- Q1 -->
                    <div class="question-block group" tabindex="0">
                        <div class="flex items-start mb-3">
                            <span class="bg-gray-200 dark:bg-gray-700 text-text-default font-bold rounded px-2 py-1 mr-3 text-sm">Q1</span>
                            <div class="flex-grow">
                                <p class="text-lg text-text-default font-medium question-text">Which equation shows the Commutative Property of Multiplication?</p>
                            </div>
                            <button type="button" class="tts-btn hidden text-primary hover:text-accent p-2 ml-2 rounded-full hover:bg-base-bg focus:ring-2 focus:ring-primary" aria-label="Read Question 1">
                                <i class="fas fa-volume-up text-xl"></i>
                            </button>
                        </div>
                        <div class="ml-10 space-y-2">
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q1" value="a" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">5 × 2 = 10</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q1" value="b" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">3 × 4 = 4 × 3</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q1" value="c" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">10 ÷ 2 = 5</span>
                            </label>
                        </div>
                    </div>

                    <!-- Q2 -->
                    <div class="question-block" tabindex="0">
                        <div class="flex items-start mb-3">
                            <span class="bg-gray-200 dark:bg-gray-700 text-text-default font-bold rounded px-2 py-1 mr-3 text-sm">Q2</span>
                            <div class="flex-grow">
                                <p class="text-lg text-text-default font-medium question-text">Fill in the missing number: 7 × ? = 42</p>
                            </div>
                            <button type="button" class="tts-btn hidden text-primary hover:text-accent p-2 ml-2 rounded-full hover:bg-base-bg focus:ring-2 focus:ring-primary" aria-label="Read Question 2">
                                <i class="fas fa-volume-up text-xl"></i>
                            </button>
                        </div>
                        <div class="ml-10">
                            <input type="number" name="q2" class="w-32 p-2 rounded-lg border-2 border-gray-300 focus:border-primary bg-base-bg text-text-default text-lg" placeholder="Answer">
                        </div>
                    </div>

                    <!-- Q3 -->
                    <div class="question-block" tabindex="0">
                        <div class="flex items-start mb-3">
                            <span class="bg-gray-200 dark:bg-gray-700 text-text-default font-bold rounded px-2 py-1 mr-3 text-sm">Q3</span>
                            <div class="flex-grow">
                                <p class="text-lg text-text-default font-medium question-text">Sarah has 24 apples. She wants to put them equally into 4 baskets. How many apples will be in each basket?</p>
                            </div>
                            <button type="button" class="tts-btn hidden text-primary hover:text-accent p-2 ml-2 rounded-full hover:bg-base-bg focus:ring-2 focus:ring-primary" aria-label="Read Question 3">
                                <i class="fas fa-volume-up text-xl"></i>
                            </button>
                        </div>
                        <div class="ml-10 space-y-2">
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q3" value="a" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">6 apples</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q3" value="b" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">8 apples</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q3" value="c" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">20 apples</span>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            <!-- DOMAIN: NUMBER & OPERATIONS -->
            <section class="bg-content-bg p-8 rounded-xl shadow-lg border-t-8 border-blue-500">
                <h2 class="text-2xl font-bold text-primary mb-6 flex items-center border-b pb-2 border-gray-200 dark:border-gray-700">
                    <i class="fas fa-hashtag mr-3"></i> Number & Operations
                </h2>

                <div class="space-y-8">
                    <!-- Q4 -->
                    <div class="question-block" tabindex="0">
                        <div class="flex items-start mb-3">
                            <span class="bg-gray-200 dark:bg-gray-700 text-text-default font-bold rounded px-2 py-1 mr-3 text-sm">Q4</span>
                            <div class="flex-grow">
                                <p class="text-lg text-text-default font-medium question-text">What is 453 rounded to the nearest 10?</p>
                            </div>
                            <button type="button" class="tts-btn hidden text-primary hover:text-accent p-2 ml-2 rounded-full hover:bg-base-bg focus:ring-2 focus:ring-primary" aria-label="Read Question 4">
                                <i class="fas fa-volume-up text-xl"></i>
                            </button>
                        </div>
                        <div class="ml-10">
                            <input type="number" name="q4" class="w-32 p-2 rounded-lg border-2 border-gray-300 focus:border-primary bg-base-bg text-text-default text-lg" placeholder="Answer">
                        </div>
                    </div>

                    <!-- Q5 -->
                    <div class="question-block" tabindex="0">
                        <div class="flex items-start mb-3">
                            <span class="bg-gray-200 dark:bg-gray-700 text-text-default font-bold rounded px-2 py-1 mr-3 text-sm">Q5</span>
                            <div class="flex-grow">
                                <p class="text-lg text-text-default font-medium question-text">Solve: 538 + 246 = ?</p>
                            </div>
                            <button type="button" class="tts-btn hidden text-primary hover:text-accent p-2 ml-2 rounded-full hover:bg-base-bg focus:ring-2 focus:ring-primary" aria-label="Read Question 5">
                                <i class="fas fa-volume-up text-xl"></i>
                            </button>
                        </div>
                        <div class="ml-10">
                            <input type="number" name="q5" class="w-32 p-2 rounded-lg border-2 border-gray-300 focus:border-primary bg-base-bg text-text-default text-lg" placeholder="Answer">
                        </div>
                    </div>

                    <!-- Q6 Fraction -->
                    <div class="question-block" tabindex="0">
                        <div class="flex items-start mb-3">
                            <span class="bg-gray-200 dark:bg-gray-700 text-text-default font-bold rounded px-2 py-1 mr-3 text-sm">Q6</span>
                            <div class="flex-grow">
                                <p class="text-lg text-text-default font-medium question-text">Which fraction is equivalent to 1/2?</p>
                            </div>
                            <button type="button" class="tts-btn hidden text-primary hover:text-accent p-2 ml-2 rounded-full hover:bg-base-bg focus:ring-2 focus:ring-primary" aria-label="Read Question 6">
                                <i class="fas fa-volume-up text-xl"></i>
                            </button>
                        </div>
                        <div class="ml-10 space-y-2">
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q6" value="a" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">2/3</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q6" value="b" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">2/4</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q6" value="c" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">1/3</span>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            <!-- DOMAIN: MEASUREMENT & GEOMETRY -->
            <section class="bg-content-bg p-8 rounded-xl shadow-lg border-t-8 border-green-500">
                <h2 class="text-2xl font-bold text-primary mb-6 flex items-center border-b pb-2 border-gray-200 dark:border-gray-700">
                    <i class="fas fa-ruler-combined mr-3"></i> Measurement & Geometry
                </h2>

                <div class="space-y-8">
                    <!-- Q7 -->
                    <div class="question-block" tabindex="0">
                        <div class="flex items-start mb-3">
                            <span class="bg-gray-200 dark:bg-gray-700 text-text-default font-bold rounded px-2 py-1 mr-3 text-sm">Q7</span>
                            <div class="flex-grow">
                                <p class="text-lg text-text-default font-medium question-text">A rectangle has a length of 5 meters and a width of 3 meters. What is the area?</p>
                            </div>
                            <button type="button" class="tts-btn hidden text-primary hover:text-accent p-2 ml-2 rounded-full hover:bg-base-bg focus:ring-2 focus:ring-primary" aria-label="Read Question 7">
                                <i class="fas fa-volume-up text-xl"></i>
                            </button>
                        </div>
                        <div class="ml-10">
                            <div class="flex items-center">
                                <input type="number" name="q7" class="w-32 p-2 rounded-lg border-2 border-gray-300 focus:border-primary bg-base-bg text-text-default text-lg" placeholder="Answer">
                                <span class="ml-2 text-text-default">square meters</span>
                            </div>
                        </div>
                    </div>

                    <!-- Q8 -->
                    <div class="question-block" tabindex="0">
                        <div class="flex items-start mb-3">
                            <span class="bg-gray-200 dark:bg-gray-700 text-text-default font-bold rounded px-2 py-1 mr-3 text-sm">Q8</span>
                            <div class="flex-grow">
                                <p class="text-lg text-text-default font-medium question-text">Which shape has 4 equal sides and 4 right angles?</p>
                            </div>
                            <button type="button" class="tts-btn hidden text-primary hover:text-accent p-2 ml-2 rounded-full hover:bg-base-bg focus:ring-2 focus:ring-primary" aria-label="Read Question 8">
                                <i class="fas fa-volume-up text-xl"></i>
                            </button>
                        </div>
                        <div class="ml-10 space-y-2">
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q8" value="a" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">Triangle</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q8" value="b" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">Square</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-base-bg cursor-pointer transition">
                                <input type="radio" name="q8" value="c" class="w-5 h-5 text-primary focus:ring-primary">
                                <span class="ml-3 text-text-default">Rectangle (non-square)</span>
                            </label>
                        </div>
                    </div>

                     <!-- Q9 Time -->
                     <div class="question-block" tabindex="0">
                        <div class="flex items-start mb-3">
                            <span class="bg-gray-200 dark:bg-gray-700 text-text-default font-bold rounded px-2 py-1 mr-3 text-sm">Q9</span>
                            <div class="flex-grow">
                                <p class="text-lg text-text-default font-medium question-text">If school starts at 8:00 AM and ends at 3:00 PM, how many hours is the school day?</p>
                            </div>
                            <button type="button" class="tts-btn hidden text-primary hover:text-accent p-2 ml-2 rounded-full hover:bg-base-bg focus:ring-2 focus:ring-primary" aria-label="Read Question 9">
                                <i class="fas fa-volume-up text-xl"></i>
                            </button>
                        </div>
                        <div class="ml-10">
                             <div class="flex items-center">
                                <input type="number" name="q9" class="w-32 p-2 rounded-lg border-2 border-gray-300 focus:border-primary bg-base-bg text-text-default text-lg" placeholder="Answer">
                                <span class="ml-2 text-text-default">hours</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SUBMIT -->
            <div class="text-center pt-8">
                <button type="button" onclick="submitAssessment()"
                    class="bg-primary hover:bg-secondary text-white font-bold text-xl py-4 px-12 rounded-full shadow-lg transform transition hover:scale-105 focus:outline-none focus:ring-4 focus:ring-accent">
                    Submit Assessment <i class="fas fa-check-circle ml-2"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- ========================================== -->
    <!-- SECTION 3: RESULTS & EXPLANATIONS PANEL   -->
    <!-- ========================================== -->
    <div id="results-panel" class="hidden transition-opacity duration-500 opacity-0 max-w-4xl mx-auto pb-20">
        
        <!-- Results Header -->
        <div class="bg-content-bg p-8 rounded-xl shadow-lg border-t-8 border-primary mb-8 text-center">
            <h2 class="text-3xl font-bold text-primary mb-4">Assessment Complete!</h2>
            <div class="text-5xl font-bold mb-2" id="final-score-display">0/0</div>
            <p class="text-text-secondary text-lg" id="final-percentage-display">0%</p>
            
            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                <button onclick="downloadPDF()" class="bg-secondary text-white px-6 py-3 rounded-lg font-bold hover:bg-primary transition shadow-md flex items-center justify-center">
                    <i class="fas fa-file-pdf mr-2"></i> Download Results PDF
                </button>
                <button onclick="location.reload()" class="bg-gray-500 text-white px-6 py-3 rounded-lg font-bold hover:bg-gray-600 transition shadow-md flex items-center justify-center">
                    <i class="fas fa-redo mr-2"></i> Retake Assessment
                </button>
            </div>
        </div>

        <!-- Detailed Feedback -->
        <div class="bg-content-bg p-8 rounded-xl shadow-lg">
            <h3 class="text-2xl font-bold text-text-default mb-6 border-b pb-2">Detailed Feedback</h3>
            <div id="results-list" class="space-y-6">
                <!-- Javascript will populate this -->
            </div>
        </div>
    </div>

</main>

<script>
    // Set default date to today
    document.getElementById('current-date').valueAsDate = new Date();

    // Toggle Timer Duration Input
    document.getElementById('setting-timer').addEventListener('change', function(e) {
        const container = document.getElementById('timer-duration-container');
        if (e.target.checked) {
            container.classList.remove('hidden');
        } else {
            container.classList.add('hidden');
        }
    });

    let assessmentInterval;
    let secondsElapsed = 0;
    let timerSecondsRemaining = 0;
    
    // Correct Answers & Explanations Database
    const answerKey = {
        q1: { 
            correct: 'b', 
            text: '3 × 4 = 4 × 3',
            explanation: "The Commutative Property means you can swap the numbers and still get the same answer (3×4 is the same as 4×3)."
        },
        q2: { 
            correct: 6, 
            text: '6',
            explanation: "Because 7 times 6 equals 42."
        },
        q3: { 
            correct: 'a', 
            text: '6 apples',
            explanation: "24 apples divided by 4 baskets equals 6 apples per basket (24 ÷ 4 = 6)."
        },
        q4: { 
            correct: 450, 
            text: '450',
            explanation: "When rounding 453 to the nearest 10, we look at the ones digit (3). Since 3 is less than 5, we round down to 450."
        },
        q5: { 
            correct: 784, 
            text: '784',
            explanation: "538 + 246 = 784."
        },
        q6: { 
            correct: 'b', 
            text: '2/4',
            explanation: "2/4 simplifies to 1/2 because 2 is half of 4."
        },
        q7: { 
            correct: 15, 
            text: '15',
            explanation: "Area = Length × Width. 5 meters × 3 meters = 15 square meters."
        },
        q8: { 
            correct: 'b', 
            text: 'Square',
            explanation: "A square is a special rectangle with 4 equal sides and 4 right angles."
        },
        q9: { 
            correct: 7, 
            text: '7',
            explanation: "From 8:00 to 12:00 is 4 hours. From 12:00 to 3:00 is 3 hours. 4 + 3 = 7 hours."
        }
    };

    // --- START ASSESSMENT LOGIC ---
    function startAssessment(e) {
        e.preventDefault();

        // Get Settings
        const studentName = document.getElementById('student-name').value;
        const useTimer = document.getElementById('setting-timer').checked;
        const useClock = document.getElementById('setting-clock').checked;
        const useElapsed = document.getElementById('setting-elapsed').checked;
        const useTTS = document.getElementById('setting-tts').checked;

        // UI Updates
        document.getElementById('display-student-name').textContent = studentName;
        document.getElementById('entrance-panel').classList.add('hidden');
        
        const assessmentInterface = document.getElementById('assessment-interface');
        assessmentInterface.classList.remove('hidden');
        
        // Trigger reflow/fade-in
        setTimeout(() => {
            assessmentInterface.classList.remove('opacity-0');
        }, 50);

        // TTS Setup
        if (useTTS) {
            const ttsButtons = document.querySelectorAll('.tts-btn');
            ttsButtons.forEach(btn => {
                btn.classList.remove('hidden');
                btn.addEventListener('click', function() {
                    const questionText = this.parentElement.querySelector('.question-text').textContent;
                    speakText(questionText);
                });
            });
        }

        // Status Bar Setup
        if (useClock) {
            document.getElementById('status-clock').classList.remove('hidden');
            updateClock();
        }
        if (useElapsed) {
            document.getElementById('status-elapsed').classList.remove('hidden');
        }
        if (useTimer) {
            document.getElementById('status-timer').classList.remove('hidden');
            const minutes = parseInt(document.getElementById('timer-minutes').value) || 45;
            timerSecondsRemaining = minutes * 60;
            updateTimerDisplay();
        }

        // Start Interval
        assessmentInterval = setInterval(() => {
            // Clock
            if (useClock) updateClock();
            
            // Elapsed
            if (useElapsed) {
                secondsElapsed++;
                document.getElementById('elapsed-display').textContent = formatTime(secondsElapsed);
            }

            // Timer
            if (useTimer) {
                if (timerSecondsRemaining > 0) {
                    timerSecondsRemaining--;
                    updateTimerDisplay();
                } else {
                    clearInterval(assessmentInterval);
                    alert("Time is up! Please submit your assessment.");
                    submitAssessment();
                }
            }
        }, 1000);
    }

    // --- SUBMIT & GRADE LOGIC ---
    function submitAssessment() {
        clearInterval(assessmentInterval);
        
        // Use showMessageBox if available (from footer), else alert
        if (typeof showMessageBox === 'function') {
            showMessageBox("Assessment submitted! Generating results...");
        }

        let score = 0;
        let totalQuestions = 9;
        const resultsList = document.getElementById('results-list');
        resultsList.innerHTML = ''; // Clear previous results

        const form = document.getElementById('assessment-form');
        const formData = new FormData(form);

        // Loop through Questions 1 to 9
        for (let i = 1; i <= totalQuestions; i++) {
            const qKey = 'q' + i;
            const userAnswer = formData.get(qKey); // Gets value from radio or input
            const correctData = answerKey[qKey];
            
            let isCorrect = false;
            
            // Comparison Logic (handle numbers vs strings)
            if (typeof correctData.correct === 'number') {
                isCorrect = parseInt(userAnswer) === correctData.correct;
            } else {
                isCorrect = userAnswer === correctData.correct;
            }

            if (isCorrect) score++;

            // Create Result Item HTML
            const resultItem = document.createElement('div');
            resultItem.className = `p-4 rounded-lg border-l-4 ${isCorrect ? 'bg-green-50 border-green-500 dark:bg-green-900/20' : 'bg-red-50 border-red-500 dark:bg-red-900/20'}`;
            
            resultItem.innerHTML = `
                <div class="flex justify-between items-start mb-2">
                    <h4 class="font-bold text-text-default">Question ${i}</h4>
                    <span class="px-3 py-1 rounded-full text-sm font-bold ${isCorrect ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800'}">
                        ${isCorrect ? 'Correct' : 'Incorrect'}
                    </span>
                </div>
                <div class="text-text-secondary text-sm space-y-1">
                    <p><strong>Correct Answer:</strong> ${correctData.text}</p>
                    <p class="italic text-text-default mt-2"><i class="fas fa-info-circle text-primary"></i> ${correctData.explanation}</p>
                </div>
            `;
            resultsList.appendChild(resultItem);
        }

        // Update Score UI
        const percentage = Math.round((score / totalQuestions) * 100);
        document.getElementById('final-score-display').textContent = `${score}/${totalQuestions}`;
        document.getElementById('final-score-display').className = `text-5xl font-bold mb-2 ${percentage >= 70 ? 'text-green-600' : 'text-red-600'}`;
        document.getElementById('final-percentage-display').textContent = `${percentage}%`;

        // Hide Test, Show Results
        document.getElementById('assessment-interface').classList.add('hidden');
        const resultsPanel = document.getElementById('results-panel');
        resultsPanel.classList.remove('hidden');
        setTimeout(() => resultsPanel.classList.remove('opacity-0'), 50);
        
        // A11y focus
        resultsPanel.focus();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // --- PDF DOWNLOAD FUNCTION ---
    function downloadPDF() {
        const studentName = document.getElementById('student-name').value || "Student";
        const element = document.getElementById('results-panel');
        
        // Options for html2pdf
        const opt = {
            margin:       0.5,
            filename:     `${studentName}_Math_Assessment_Results.pdf`,
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2, useCORS: true },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        // Temporary hide buttons for the PDF
        const buttons = element.querySelectorAll('button');
        buttons.forEach(btn => btn.style.display = 'none');

        // Generate PDF
        html2pdf().set(opt).from(element).save().then(() => {
            // Restore buttons
            buttons.forEach(btn => btn.style.display = '');
        });
    }

    // --- HELPER FUNCTIONS ---

    function updateClock() {
        const now = new Date();
        document.getElementById('clock-display').textContent = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }

    function updateTimerDisplay() {
        document.getElementById('timer-display').textContent = formatTime(timerSecondsRemaining);
    }

    function formatTime(totalSeconds) {
        const m = Math.floor(totalSeconds / 60);
        const s = totalSeconds % 60;
        return `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
    }

    function speakText(text) {
        if ('speechSynthesis' in window) {
            window.speechSynthesis.cancel(); // Stop current speech
            const utterance = new SpeechSynthesisUtterance(text);
            const voices = window.speechSynthesis.getVoices();
            utterance.rate = 0.9; 
            window.speechSynthesis.speak(utterance);
        } else {
            alert("Sorry, your browser does not support Text-to-Speech.");
        }
    }
</script>

<?php include '../src/footer.php'; ?>