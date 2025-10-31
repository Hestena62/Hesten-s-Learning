<?php
// --- PAGE & HEADER VARIABLES ---
// Define variables required by header.php
$pageTitle = "Algebra 1 Test";
$pageDescription = "An interactive, auto-grading Algebra 1 test based on the NY Regents exam.";
$pageKeywords = "algebra, math test, regents, php, auto-grading";
$pageAuthor = "Hesten's Learning"; // Or your name

// Define variables for the header's welcome popup
$welcomeMessage = "Welcome to the Algebra 1 Test";
$welcomeParagraph = "Test your knowledge with these questions based on the NY Regents curriculum. Good luck!";

// --- Include the site header ---
include 'src/header.php';

// --- ANSWER KEY ---
// Sourced from the provided algone-82025-exam.pdf and algone-82025-rg.pdf
$answerKey = [
    // Part I (Multiple Choice)
    'q1' => '3',
    'q2' => '3',
    'q3' => '2',
    'q4' => '2',
    'q9' => '4',
    'q17' => '1',
    'q21' => '3',
    // Part II, III, IV (Constructed Response)
    'q25' => '10.5',
    'q29' => '10935',
    'q31_vertex' => '(0,4)',
    'q32_hours' => '9',
    'q35_hotdogs' => '10',
];

// --- VARIABLES ---
$results = [];
$score = 0;
$totalQuestions = count($answerKey);
$isSubmitted = false;
$percentage = 0;

// --- GRADING LOGIC ---
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $isSubmitted = true;

    // Helper function to normalize answers for comparison
    function normalize($val) {
        return str_replace(' ', '', strtolower(trim($val)));
    }

    foreach ($answerKey as $key => $correctAnswer) {
        $userAnswer = isset($_POST[$key]) ? $_POST[$key] : '';

        // Compare normalized answers
        if (normalize($userAnswer) == normalize($correctAnswer)) {
            $score++;
            $results[$key] = 'correct';
        } else {
            $results[$key] = 'incorrect';
        }
    }

    $percentage = ($totalQuestions > 0) ? ($score / $totalQuestions) * 100 : 0;
}

// --- HELPER FUNCTIONS FOR HTML ---
function get_result_class($key) {
    global $results, $isSubmitted;
    if (!$isSubmitted) return '';
    if (!isset($results[$key])) return '';
    return $results[$key] == 'correct' ? 'correct' : 'incorrect';
}

function show_correct_answer($key) {
    global $results, $answerKey, $isSubmitted;
    if ($isSubmitted && isset($results[$key]) && $results[$key] == 'incorrect') {
        echo '<div class="incorrect-text font-semibold mt-2">Correct answer: ' . htmlspecialchars($answerKey[$key]) . '</div>';
    }
}

function get_post_value($key) {
    return htmlspecialchars($_POST[$key] ?? '');
}

// Helper to show a feedback icon
function show_feedback_icon($key) {
    global $results, $isSubmitted;
    if (!$isSubmitted || !isset($results[$key])) return;
    
    if ($results[$key] == 'correct') {
        echo '<i class="fas fa-check-circle text-green-500 text-xl ml-3" aria-label="Correct"></i>';
    } else {
        echo '<i class="fas fa-times-circle text-red-500 text-xl ml-3" aria-label="Incorrect"></i>';
    }
}

?>

<!-- Add MathJax Script for rendering LaTeX -->
<script>
  window.MathJax = {
    tex: {
      inlineMath: [['\\(', '\\)']],
      displayMath: [['\\[', '\\]']]
    },
    svg: {
      fontCache: 'global'
    }
  };
</script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js" id="MathJax-script" async></script>

<!-- Custom styles for correct/incorrect feedback to work with themes -->
<style>
    /* Define styles for correct/incorrect feedback */
    /* These use CSS variables from header.php to be theme-aware */
    .correct {
        border-left: 4px solid #22c55e; /* green-500 */
        background-color: color-mix(in srgb, var(--color-content-bg, #FFFFFF) 90%, #22c55e 10%);
    }
    .incorrect {
        border-left: 4px solid #ef4444; /* red-500 */
        background-color: color-mix(in srgb, var(--color-content-bg, #FFFFFF) 90%, #ef4444 10%);
    }
    .correct-text {
        color: #166534; /* green-800 */
    }
    .dark .correct-text {
        color: #86efac; /* green-300 */
    }
    .incorrect-text {
        color: #b91c1c; /* red-800 */
    }
    .dark .incorrect-text {
         color: #fca5a5; /* red-300 */
    }
    
    /* Disable inputs after submission */
    .submitted input[type="radio"],
    .submitted input[type="text"] {
        pointer-events: none;
        background-color: color-mix(in srgb, var(--color-content-bg, #FFFFFF) 50%, #9ca3af 50%);
        opacity: 0.7;
    }
    .submitted .radio-label {
        pointer-events: none;
        cursor: default;
    }

    /* Progress Bar */
    .progress-bar-bg {
        background-color: var(--color-base-bg, #F9FAFB);
        border: 1px solid var(--color-secondary, #3B82F6);
    }
    .progress-bar-fg {
        background-color: var(--color-primary, #1D4ED8);
        transition: width 0.5s ease-in-out;
    }
</style>

<!-- Main Page Content -->
<main class="container mx-auto py-10 px-4">
    <!-- Use 'bg-content-bg' and 'text-text-default' from header.php theme -->
    <div class="max-w-3xl mx-auto bg-content-bg text-text-default p-6 md:p-10 rounded-lg shadow-xl">

        <div class="flex items-center mb-2">
            <i class="fas fa-calculator text-3xl text-primary mr-3"></i>
            <h1 class="text-3xl font-bold text-text-default mb-0">Algebra 1 Test</h1>
        </div>
        <p class="text-text-secondary mb-6">Based on the NY Regents Algebra I Exam (August 2025)</p>

        <!-- --- PROGRESS BAR / RESULTS BLOCK --- -->
        <?php if ($isSubmitted): ?>
            <!-- Show Results -->
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 rounded-md mb-8 shadow-sm" role="alert">
                <h2 class="text-2xl font-bold">Test Results</h2>
                <p class="text-lg mt-2">You scored <strong class="font-bold"><?php echo $score; ?></strong> out of <strong class="font-bold"><?php echo $totalQuestions; ?></strong> questions correctly.</p>
            </div>

            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex justify-between mb-1">
                    <span class="text-base font-medium text-primary">Score</span>
                    <span class="text-sm font-medium text-primary"><?php echo number_format($percentage, 0); ?>%</span>
                </div>
                <div class="w-full progress-bar-bg rounded-full h-4">
                    <div class="progress-bar-fg h-4 rounded-full" style="width: <?php echo $percentage; ?>%"></div>
                </div>
            </div>

        <?php else: ?>
            <!-- Show "In Progress" -->
            <div class="mb-8">
                <div class="flex justify-between mb-1">
                    <span class="text-base font-medium text-text-secondary">Progress</span>
                    <span class="text-sm font-medium text-text-secondary">0/<?php echo $totalQuestions; ?></span>
                </div>
                <div class="w-full progress-bar-bg rounded-full h-4">
                    <div class="progress-bar-fg h-4 rounded-full" style="width: 0%"></div>
                </div>
            </div>
        <?php endif; ?>


        <!-- --- TEST FORM --- -->
        <form action="" method="POST" class="<?php echo $isSubmitted ? 'submitted' : ''; ?>">
            
            <h2 class="text-2xl font-semibold text-text-default border-b-2 border-gray-200 pb-2 mb-6">Part I: Multiple Choice</h2>

            <!-- Question 1 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q1'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    1. (From Q1) Which expression is equivalent to \(100x^2 - 16\)?
                    <?php show_feedback_icon('q1'); ?>
                </p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q1" value="1" class="mr-2" <?php if (get_post_value('q1') == '1') echo 'checked'; ?>>\( (50x - 8)(50x + 8) \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q1" value="2" class="mr-2" <?php if (get_post_value('q1') == '2') echo 'checked'; ?>>\( (50x - 8)(50x - 8) \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q1" value="3" class="mr-2" <?php if (get_post_value('q1') == '3') echo 'checked'; ?>>\( (10x - 4)(10x + 4) \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q1" value="4" class="mr-2" <?php if (get_post_value('q1') == '4') echo 'checked'; ?>>\( (10x - 4)(10x - 4) \)</label>
                </div>
                <?php show_correct_answer('q1'); ?>
            </div>

            <!-- Question 2 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q2'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    2. (From Q2) Josie has $2.30 in dimes and quarters. She has two more dimes than quarters. Which equation can be used to determine \(x\), the number of quarters she has?
                    <?php show_feedback_icon('q2'); ?>
                </p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q2" value="1" class="mr-2" <?php if (get_post_value('q2') == '1') echo 'checked'; ?>>\( 0.35(2x + 2) = 2.30 \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q2" value="2" class="mr-2" <?php if (get_post_value('q2') == '2') echo 'checked'; ?>>\( 0.25(x + 2) + 0.10x = 2.30 \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q2" value="3" class="mr-2" <?php if (get_post_value('q2') == '3') echo 'checked'; ?>>\( 0.25x + 0.10(x + 2) = 2.30 \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q2" value="4" class="mr-2" <?php if (get_post_value('q2') == '4') echo 'checked'; ?>>\( 0.25x + 0.10(x - 2) = 2.30 \)</label>
                </div>
                <?php show_correct_answer('q2'); ?>
            </div>

            <!-- Question 3 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q3'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    3. (From Q3) If \(g(x) = -2x^2 + 16\), then \(g(-3)\) equals:
                    <?php show_feedback_icon('q3'); ?>
                </p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q3" value="1" class="mr-2" <?php if (get_post_value('q3') == '1') echo 'checked'; ?>> -20</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q3" value="2" class="mr-2" <?php if (get_post_value('q3') == '2') echo 'checked'; ?>> -2</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q3" value="3" class="mr-2" <?php if (get_post_value('q3') == '3') echo 'checked'; ?>> 34</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q3" value="4" class="mr-2" <?php if (get_post_value('q3') == '4') echo 'checked'; ?>> 52</label>
                </div>
                <?php show_correct_answer('q3'); ?>
            </div>

            <!-- Question 4 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q4'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    4. (From Q4) What are the zeros of \(f(x) = x^2 - 8x - 20\)?
                    <?php show_feedback_icon('q4'); ?>
                </p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q4" value="1" class="mr-2" <?php if (get_post_value('q4') == '1') echo 'checked'; ?>> 10 and 2</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q4" value="2" class="mr-2" <?php if (get_post_value('q4') == '2') echo 'checked'; ?>> 10 and -2</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q4" value="3" class="mr-2" <?php if (get_post_value('q4') == '3') echo 'checked'; ?>> -10 and 2</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q4" value="4" class="mr-2" <?php if (get_post_value('q4') == '4') echo 'checked'; ?>> -10 and -2</label>
                </div>
                <?php show_correct_answer('q4'); ?>
            </div>

            <!-- Question 9 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q9'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    5. (From Q9) Which table (f(x), g(x), h(x), j(x)) represents a linear function?
                    <?php show_feedback_icon('q9'); ?>
                </p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q9" value="1" class="mr-2" <?php if (get_post_value('q9') == '1') echo 'checked'; ?>> f(x)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q9" value="2" class="mr-2" <?php if (get_post_value('q9') == '2') echo 'checked'; ?>> g(x)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q9" value="3" class="mr-2" <?php if (get_post_value('q9') == '3') echo 'checked'; ?>> h(x)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q9" value="4" class="mr-2" <?php if (get_post_value('q9') == '4') echo 'checked'; ?>> j(x)</label>
                </div>
                <?php show_correct_answer('q9'); ?>
            </div>

            <!-- Question 17 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q17'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    6. (From Q17) The formula for the area of a trapezoid is \(A = \frac{1}{2}h(b_1 + b_2)\). The height, \(h\), may be expressed as:
                    <?php show_feedback_icon('q17'); ?>
                </p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q17" value="1" class="mr-2" <?php if (get_post_value('q17') == '1') echo 'checked'; ?>>\( \frac{2A}{b_1 + b_2} \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q17" value="2" class="mr-2" <?php if (get_post_value('q17') == '2') echo 'checked'; ?>>\( \frac{1}{2}A(b_1 + b_2) \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q17" value="3" class="mr-2" <?php if (get_post_value('q17') == '3') echo 'checked'; ?>>\( \frac{b_1 + b_2}{2A} \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q17" value="4" class="mr-2" <?php if (get_post_value('q17') == '4') echo 'checked'; ?>>\( \frac{1}{2}A - (b_1 + b_2) \)</label>
                </div>
                <?php show_correct_answer('q17'); ?>
            </div>

            <!-- Question 21 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q21'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    7. (From Q21) When \(6x^3 - 2x + 8\) is subtracted from \(5x^3 + 3x - 4\), the result is:
                    <?php show_feedback_icon('q21'); ?>
                </p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q21" value="1" class="mr-2" <?php if (get_post_value('q21') == '1') echo 'checked'; ?>>\( x^3 - 5x + 12 \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q21" value="2" class="mr-2" <?php if (get_post_value('q21') == '2') echo 'checked'; ?>>\( x^3 + x + 4 \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q21" value="3" class="mr-2" <?php if (get_post_value('q21') == '3') echo 'checked'; ?>>\( -x^3 + 5x - 12 \)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"><input type="radio" name="q21" value="4" class="mr-2" <?php if (get_post_value('q21') == '4') echo 'checked'; ?>>\( -x^3 + x + 4 \)</label>
                </div>
                <?php show_correct_answer('q21'); ?>
            </div>

            <h2 class="text-2xl font-semibold text-text-default border-b-2 border-gray-200 pb-2 mb-6 mt-12">Part II: Constructed Response</h2>

            <!-- Question 25 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q25'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    8. (From Q25) Solve the equation \(\frac{1}{6}(4x + 12) = 9\) algebraically.
                    <?php show_feedback_icon('q25'); ?>
                </p>
                <label for="q25" class="block text-sm font-medium text-text-secondary mb-1">Your answer:</label>
                <input type="text" id="q25" name="q25" value="<?php echo get_post_value('q25'); ?>" class="w-full md:w-1/2 p-2 bg-base-bg border border-gray-300 rounded-md shadow-sm text-text-default focus:ring-primary focus:border-primary">
                <?php show_correct_answer('q25'); ?>
            </div>

            <!-- Question 29 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q29'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    9. (From Q29) Determine the 8th term of a geometric sequence whose first term is 5 and whose common ratio is 3.
                    <?php show_feedback_icon('q29'); ?>
                </p>
                <label for="q29" class="block text-sm font-medium text-text-secondary mb-1">Your answer:</label>
                <input type="text" id="q29" name="q29" value="<?php echo get_post_value('q29'); ?>" class="w-full md:w-1/2 p-2 bg-base-bg border border-gray-300 rounded-md shadow-sm text-text-default focus:ring-primary focus:border-primary">
                <?php show_correct_answer('q29'); ?>
            </div>

            <!-- Question 31 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q31_vertex'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    10. (From Q31) State the vertex of the function \(f(x) = -\frac{1}{3}x^2 + 4\).
                    <?php show_feedback_icon('q31_vertex'); ?>
                </p>
                <label for="q31_vertex" class="block text-sm font-medium text-text-secondary mb-1">Vertex (e.g., (x,y)):</label>
                <input type="text" id="q31_vertex" name="q31_vertex" value="<?php echo get_post_value('q31_vertex'); ?>" class="w-full md:w-1/2 p-2 bg-base-bg border border-gray-300 rounded-md shadow-sm text-text-default focus:ring-primary focus:border-primary">
                <?php show_correct_answer('q31_vertex'); ?>
            </div>

            <!-- Question 32 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q32_hours'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    11. (From Q32) A canoe rental charges $18 for the first hour and $7.50 for each additional hour. If Vince has $78 to spend, what is the <strong>maximum total number of hours</strong> he can rent the canoe?
                    <?php show_feedback_icon('q32_hours'); ?>
                </p>
                <label for="q32_hours" class="block text-sm font-medium text-text-secondary mb-1">Max total hours:</label>
                <input type="text" id="q32_hours" name="q32_hours" value="<?php echo get_post_value('q32_hours'); ?>" class="w-full md:w-1/2 p-2 bg-base-bg border border-gray-300 rounded-md shadow-sm text-text-default focus:ring-primary focus:border-primary">
                <?php show_correct_answer('q32_hours'); ?>
            </div>

            <!-- Question 35 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q35_hotdogs'); ?>">
                <p class="font-semibold text-lg mb-3 flex items-center">
                    12. (From Q35) Cameron sold a total of 25 items (hot dogs and sodas) for $45.00. A hot dog (\(x\)) costs $2.25 and a soda (\(y\)) costs $1.50. Determine algebraically the number of hot dogs Cameron sold.
                    <?php show_feedback_icon('q35_hotdogs'); ?>
                </p>
                <label for="q35_hotdogs" class="block text-sm font-medium text-text-secondary mb-1">Number of hot dogs (x):</label>
                <input type="text" id="q35_hotdogs" name="q35_hotdogs" value="<?php echo get_post_value('q35_hotdogs'); ?>" class="w-full md:w-1/2 p-2 bg-base-bg border border-gray-300 rounded-md shadow-sm text-text-default focus:ring-primary focus:border-primary">
                <?php show_correct_answer('q35_hotdogs'); ?>
            </div>

            <!-- --- SUBMIT/RETAKE BUTTON --- -->
            <div class="mt-10">
                <?php if (!$isSubmitted): ?>
                    <!-- Use theme-aware button classes -->
                    <button type="submit" class="w-full bg-primary text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 text-lg focus:outline-none focus:ring-2 focus:ring-accent">
                        <i class="fas fa-check-double mr-2"></i> Grade My Test
                    </button>
                <?php else: ?>
                    <a href="" class="block w-full text-center bg-gray-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 text-lg focus:outline-none focus:ring-2 focus:ring-gray-400">
                        <i class="fas fa-redo mr-2"></i> Take Again
                    </a>
                <?php endif; ?>
            </div>

        </form>
    </div>
</main>

<?php
// --- Include the site footer ---
include 'src/footer.php';
?>

