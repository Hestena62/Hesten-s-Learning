<?php
// --- PAGE & HEADER VARIABLES ---
$pageTitle = "Algebra 1 Test";
$pageDescription = "An interactive, auto-grading Algebra 1 test based on the NY Regents exam.";
$pageKeywords = "algebra, math test, regents, php, auto-grading";
$pageAuthor = "Hesten's Learning";
$welcomeMessage = "Welcome to the Algebra 1 Test";
$welcomeParagraph = "Test your knowledge with these questions based on the NY Regents curriculum. Good luck!";

// --- Include the site header ---
include 'src/header.php';

// --- QUESTION DATA (Expanded with Hints & Explanations) ---
$questions = [
    [
        'id' => 'q1',
        'type' => 'mc',
        'text' => 'Which expression is equivalent to \(100x^2 - 16\)?',
        'options' => [
            '1' => '\( (50x - 8)(50x + 8) \)',
            '2' => '\( (50x - 8)(50x - 8) \)',
            '3' => '\( (10x - 4)(10x + 4) \)',
            '4' => '\( (10x - 4)(10x - 4) \)',
        ],
        'answer' => '3',
        'hint' => "This looks like a standard algebraic form. Do you recognize the 'difference of...' pattern?",
        'explanation' => "This is a difference of two squares, \(a^2 - b^2 = (a-b)(a+b)\). Here, \(a^2 = 100x^2\), so \(a = 10x\), and \(b^2 = 16\), so \(b = 4\). This gives \((10x - 4)(10x + 4)\)."
    ],
    [
        'id' => 'q2',
        'type' => 'mc',
        'text' => 'Josie has $2.30 in dimes and quarters. She has two more dimes than quarters. Which equation can be used to determine \(x\), the number of quarters she has?',
        'options' => [
            '1' => '\( 0.35(2x + 2) = 2.30 \)',
            '2' => '\( 0.25(x + 2) + 0.10x = 2.30 \)',
            '3' => '\( 0.25x + 0.10(x + 2) = 2.30 \)',
            '4' => '\( 0.25x + 0.10(x - 2) = 2.30 \)',
        ],
        'answer' => '3',
        'hint' => "Let \(x\) be the number of quarters. How would you write the number of dimes? The total *value* is $2.30.",
        'explanation' => "Quarters = \(x\). Dimes = \(x + 2\). The value of quarters is \(0.25x\). The value of dimes is \(0.10(x + 2)\). The total value is their sum: \(0.25x + 0.10(x + 2) = 2.30\)."
    ],
    [
        'id' => 'q3',
        'type' => 'mc',
        'text' => 'If \(g(x) = -2x^2 + 16\), then \(g(-3)\) equals:',
        'options' => [
            '1' => '-20',
            '2' => '-2',
            '3' => '34',
            '4' => '52',
        ],
        'answer' => '2',
        'hint' => "You need to substitute -3 everywhere you see an \(x\) in the function \(g(x) = -2x^2 + 16\).",
        'explanation' => "Substitute \(x = -3\): \(g(-3) = -2(-3)^2 + 16\). First, calculate the exponent: \((-3)^2 = 9\). Then multiply: \(-2(9) = -18\). Finally, add: \(-18 + 16 = -2\)."
    ],
    [
        'id' => 'q4',
        'type' => 'mc',
        'text' => 'What are the zeros of \(f(x) = x^2 - 8x - 20\)?',
        'options' => [
            '1' => '10 and 2',
            '2' => '10 and -2',
            '3' => '-10 and 2',
            '4' => '-10 and -2',
        ],
        'answer' => '2',
        'hint' => "The 'zeros' are the values of \(x\) that make \(f(x) = 0\). You can find them by factoring the quadratic \(x^2 - 8x - 20 = 0\).",
        'explanation' => "To factor \(x^2 - 8x - 20\), find two numbers that multiply to -20 and add to -8. These numbers are -10 and 2. So, \((x - 10)(x + 2) = 0\). The zeros are the values that make each factor zero: \(x - 10 = 0 \implies x = 10\) and \(x + 2 = 0 \implies x = -2\)."
    ],
    [
        'id' => 'q9',
        'type' => 'mc',
        'text' => 'Which table (f(x), g(x), h(x), j(x)) represents a linear function?',
        'options' => [
            '1' => 'f(x)',
            '2' => 'g(x)',
            '3' => 'h(x)',
            '4' => 'j(x)',
        ],
        'answer' => '4',
        'hint' => "A linear function has a constant rate of change (slope). Check the change in y for every 1-unit change in x in each table.",
        'explanation' => "In table j(x), for every 1-unit increase in x (from -3 to -2, -2 to -1, etc.), the y-value increases by a constant amount of 4. This constant rate of change means it is a linear function."
    ],
    [
        'id' => 'q17',
        'type' => 'mc',
        'text' => 'The formula for the area of a trapezoid is \(A = \frac{1}{2}h(b_1 + b_2)\). The height, \(h\), may be expressed as:',
        'options' => [
            '1' => '\( \frac{2A}{b_1 + b_2} \)',
            '2' => '\( \frac{1}{2}A(b_1 + b_2) \)',
            '3' => '\( \frac{b_1 + b_2}{2A} \)',
            '4' => '\( \frac{1}{2}A - (b_1 + b_2) \)',
        ],
        'answer' => '1',
        'hint' => "You need to isolate \(h\) in the equation \(A = \frac{1}{2}h(b_1 + b_2)\). Start by getting rid of the \(\frac{1}{2}\).",
        'explanation' => "Start with \(A = \frac{1}{2}h(b_1 + b_2)\). Multiply both sides by 2: \(2A = h(b_1 + b_2)\). Then, divide both sides by the term in parentheses: \(\frac{2A}{b_1 + b_2} = h\)."
    ],
    [
        'id' => 'q21',
        'type' => 'mc',
        'text' => 'When \(6x^3 - 2x + 8\) is subtracted from \(5x^3 + 3x - 4\), the result is:',
        'options' => [
            '1' => '\( x^3 - 5x + 12 \)',
            '2' => '\( x^3 + x + 4 \)',
            '3' => '\( -x^3 + 5x - 12 \)',
            '4' => '\( -x^3 + x + 4 \)',
        ],
        'answer' => '3',
        'hint' => "Be careful! You are subtracting the *entire* first polynomial from the second. Remember to distribute the negative sign.",
        'explanation' => "We are calculating \((5x^3 + 3x - 4) - (6x^3 - 2x + 8)\). Distribute the negative: \(5x^3 + 3x - 4 - 6x^3 + 2x - 8\). Combine like terms: \((5x^3 - 6x^3) + (3x + 2x) + (-4 - 8) = -x^3 + 5x - 12\)."
    ],
    [
        'id' => 'q25',
        'type' => 'text',
        'text' => 'Solve the equation \(\frac{1}{6}(4x + 12) = 9\) algebraically.',
        'answer' => '10.5',
        'hint' => "Start by isolating the parentheses. Multiply both sides by 6.",
        'explanation' => "Given \(\frac{1}{6}(4x + 12) = 9\). Multiply by 6: \(4x + 12 = 54\). Subtract 12: \(4x = 42\). Divide by 4: \(x = \frac{42}{4} = \frac{21}{2} = 10.5\)."
    ],
    [
        'id' => 'q29',
        'type' => 'text',
        'text' => 'Determine the 8th term of a geometric sequence whose first term is 5 and whose common ratio is 3.',
        'answer' => '10935',
        'hint' => "The formula for the nth term of a geometric sequence is \(a_n = a_1 \cdot r^{n-1}\). You are looking for the 8th term (\(n=8\)).",
        'explanation' => "Using the formula \(a_n = a_1 \cdot r^{n-1}\) with \(a_1 = 5\), \(r = 3\), and \(n = 8\): \(a_8 = 5 \cdot (3)^{8-1} = 5 \cdot (3)^7 = 5 \cdot 2187 = 10935\)."
    ],
    [
        'id' => 'q31_vertex',
        'type' => 'text',
        'text' => 'State the vertex of the function \(f(x) = -\frac{1}{3}x^2 + 4\). (e.g., (x,y))',
        'answer' => '(0,4)',
        'hint' => "The function is in vertex form, \(f(x) = a(x-h)^2 + k\), where the vertex is \((h, k)\). You can rewrite the function as \(f(x) = -\frac{1}{3}(x - 0)^2 + 4\).",
        'explanation' => "The vertex form is \(f(x) = a(x-h)^2 + k\). Our function is \(f(x) = -\frac{1}{3}x^2 + 4\), which is the same as \(f(x) = -\frac{1}{3}(x - 0)^2 + 4\). Comparing the two, \(h = 0\) and \(k = 4\). So the vertex is \((0, 4)\)."
    ],
    [
        'id' => 'q32_hours',
        'type' => 'text',
        'text' => 'A canoe rental charges $18 for the first hour and $7.50 for each additional hour. If Vince has $78 to spend, what is the <strong>maximum total number of hours</strong> he can rent the canoe?',
        'answer' => '9',
        'hint' => "The total cost is $18 for the *first* hour, plus $7.50 for the *additional* hours (\(x\)). This is $18 + 7.50x \le 78$. Solve for \(x\), but remember that \(x\) is the number of *additional* hours.",
        'explanation' => "The inequality is \(18 + 7.50x \le 78\), where \(x\) is additional hours. Subtract 18: \(7.50x \le 60\). Divide by 7.50: \(x \le 8\). This means Vince can rent for 8 *additional* hours. The maximum *total* hours is the 1st hour + 8 additional hours, which is 9 hours."
    ],
    [
        'id' => 'q35_hotdogs',
        'type' => 'text',
        'text' => 'Cameron sold a total of 25 items (hot dogs and sodas) for $45.00. A hot dog (\(x\)) costs $2.25 and a soda (\(y\)) costs $1.50. Determine algebraically the number of hot dogs Cameron sold.',
        'answer' => '10',
        'hint' => "You need a system of two equations. One for the number of items (\(x + y = 25\)) and one for the total cost.",
        'explanation' => "The system is: (1) \(x + y = 25\) and (2) \(2.25x + 1.50y = 45\). From (1), \(y = 25 - x\). Substitute this into (2): \(2.25x + 1.50(25 - x) = 45\). Distribute: \(2.25x + 37.5 - 1.50x = 45\). Combine like terms: \(0.75x + 37.5 = 45\). Subtract 37.5: \(0.75x = 7.5\). Divide by 0.75: \(x = 10\). Cameron sold 10 hot dogs."
    ],
];
$totalQuestions = count($questions);

// --- PAGE STATE MANAGEMENT ---
$isSetup = false;
$isQuizActive = false;
$isSubmitted = false;

// --- QUIZ & GRADING VARIABLES ---
$results = [];
$userAnswers = [];
$score = 0;
$percentage = 0;
$studentName = '';
$gradeLevel = '';
$timerMode = 'none';
$scramble = false;
$quizDurationMinutes = 20; // 20 minutes for a timed test

// --- DETERMINE PAGE STATE FROM POST DATA ---
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['grade_test'])) {
        // --- STATE 3: RESULTS SCREEN ---
        $isSubmitted = true;
        
        // Get settings passed from quiz form
        $studentName = htmlspecialchars($_POST['studentName'] ?? 'Student');
        $gradeLevel = htmlspecialchars($_POST['gradeLevel'] ?? 'N/A');
        
        // Helper function to normalize answers
        function normalize($val) {
            return str_replace([' ', '(', ')'], '', strtolower(trim($val)));
        }

        // Grade the quiz
        foreach ($questions as $question) {
            $key = $question['id'];
            $correctAnswer = $question['answer'];
            $userAnswer = isset($_POST[$key]) ? $_POST[$key] : '';
            $userAnswers[$key] = $userAnswer; // Store for PDF

            if (normalize($userAnswer) == normalize($correctAnswer)) {
                $score++;
                $results[$key] = 'correct';
            } else {
                $results[$key] = 'incorrect';
            }
        }
        $percentage = ($totalQuestions > 0) ? ($score / $totalQuestions) * 100 : 0;

    } elseif (isset($_POST['start_quiz'])) {
        // --- STATE 2: QUIZ SCREEN ---
        $isQuizActive = true;
        
        // Get settings from setup form
        $studentName = htmlspecialchars($_POST['studentName'] ?? 'Student');
        $gradeLevel = htmlspecialchars($_POST['gradeLevel'] ?? 'N/A');
        $timerMode = $_POST['timerMode'] ?? 'none';
        $scramble = isset($_POST['scramble']);

        if ($scramble) {
            shuffle($questions);
        }
    }

} else {
    // --- STATE 1: SETUP SCREEN (GET Request) ---
    $isSetup = true;
}

// --- HELPER FUNCTIONS FOR HTML (for results page) ---
function get_result_class($key) {
    global $results, $isSubmitted;
    if (!$isSubmitted) return '';
    if (!isset($results[$key])) return '';
    return $results[$key] == 'correct' ? 'correct' : 'incorrect';
}

function show_correct_answer($key) {
    global $results, $questions, $isSubmitted;
    if ($isSubmitted && isset($results[$key]) && $results[$key] == 'incorrect') {
        // Find the question to get the correct answer
        $correctAnswer = '';
        foreach ($questions as $q) {
            if ($q['id'] == $key) {
                if ($q['type'] == 'mc') {
                    $correctAnswer = $q['options'][$q['answer']];
                } else {
                    $correctAnswer = $q['answer'];
                }
                break;
            }
        }
        // This function now echoes, so we'll keep it simple
        echo '<div class="incorrect-text font-semibold mt-2">Correct answer: ' . $correctAnswer . '</div>';
    }
}

function get_post_value($key) {
    // For the results page, get the value from the $userAnswers array
    global $userAnswers;
    return htmlspecialchars($userAnswers[$key] ?? '');
}

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
<!-- Add jsPDF Script for PDF generation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


<!-- Custom styles for quiz -->
<style>
    /* Feedback colors */
    .correct {
        border-left: 4px solid #22c55e;
        background-color: color-mix(in srgb, var(--color-content-bg, #FFFFFF) 90%, #22c55e 10%);
    }
    .incorrect {
        border-left: 4px solid #ef4444;
        background-color: color-mix(in srgb, var(--color-content-bg, #FFFFFF) 90%, #ef4444 10%);
    }
    .correct-text { color: #166534; }
    .dark .correct-text { color: #86efac; }
    .incorrect-text { color: #b91c1c; }
    .dark .incorrect-text { color: #fca5a5; }

    /* Progress Bar */
    .progress-bar-bg {
        background-color: var(--color-base-bg, #F9FAFB);
        border: 1px solid var(--color-secondary, #3B82F6);
    }
    .progress-bar-fg {
        background-color: var(--color-primary, #1D4ED8);
        transition: width 0.5s ease-in-out;
    }

    /* Quiz Card styles */
    .quiz-card {
        display: none; /* Hidden by default */
        animation: fadeIn 0.5s;
    }
    .quiz-card.active {
        display: block; /* Shown by JS */
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Hint/Explanation styles */
    .explanation-box, .hint-box {
        display: none;
        background-color: color-mix(in srgb, var(--color-base-bg, #F9FAFB) 90%, #e0e7ff 10%);
        border: 1px solid var(--color-accent, #60A5FA);
        padding: 1rem;
        margin-top: 1rem;
        border-radius: 0.5rem;
    }
    .dark .explanation-box, .dark .hint-box {
        background-color: color-mix(in srgb, var(--color-content-bg, #333) 90%, #4338ca 10%);
    }

    /* Disable inputs on review page */
    .review-mode input[type="radio"],
    .review-mode input[type="text"] {
        pointer-events: none;
        background-color: color-mix(in srgb, var(--color-content-bg, #FFFFFF) 50%, #9ca3af 50%);
        opacity: 0.7;
    }
    .review-mode .radio-label {
        pointer-events: none;
        cursor: default;
    }
    
    /* Timer styles */
    #quiz-timer {
        position: sticky;
        top: 10px; /* Adjust as needed if you have a sticky header */
        z-index: 10;
        animation: fadeIn 0.5s;
    }
</style>

<!-- Main Page Content -->
<main class="container mx-auto py-10 px-4">
    <div class="max-w-3xl mx-auto bg-content-bg text-text-default p-6 md:p-10 rounded-lg shadow-xl">

        <!-- Page Title -->
        <div class="flex items-center mb-2">
            <i class="fas fa-calculator text-3xl text-primary mr-3"></i>
            <h1 class="text-3xl font-bold text-text-default mb-0">Algebra 1 Test</h1>
        </div>
        <p class="text-text-secondary mb-6">Based on the NY Regents Algebra I Exam (August 2025)</p>


        <?php // --- STATE 1: SHOW SETUP SCREEN ---
        if ($isSetup): ?>
            
            <h2 class="text-2xl font-semibold text-text-default border-b-2 border-gray-200 pb-2 mb-6">Quiz Setup</h2>
            <p class="text-text-secondary mb-6">Please enter your information and choose your quiz settings below.</p>
            
            <form action="algebra_test.php" method="POST" id="setupForm">
                <input type="hidden" name="start_quiz" value="1">
                <div class="space-y-6">
                    <!-- Student Name -->
                    <div>
                        <label for="studentName" class="block text-sm font-medium text-text-default mb-1">Student Name</label>
                        <input type="text" id="studentName" name="studentName" class="w-full md:w-3/4 p-2 bg-base-bg border border-gray-300 rounded-md shadow-sm text-text-default focus:ring-primary focus:border-primary" placeholder="Enter your full name" required>
                    </div>

                    <!-- Grade Level -->
                    <div>
                        <label for="gradeLevel" class="block text-sm font-medium text-text-default mb-1">Current Grade Level</label>
                        <select id="gradeLevel" name="gradeLevel" class="w-full md:w-1/2 p-2 bg-base-bg border border-gray-300 rounded-md shadow-sm text-text-default focus:ring-primary focus:border-primary">
                            <option value="8">8th Grade</option>
                            <option value="9" selected>9th Grade</option>
                            <option value="10">10th Grade</option>
                            <option value="11">11th Grade</option>
                            <option value="12">12th Grade</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Timer Options -->
                    <div>
                        <label class="block text-sm font-medium text-text-default mb-2">Timer Options</label>
                        <div class="space-y-2">
                            <label class="radio-label block p-3 rounded-md border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                <input type="radio" name="timerMode" value="none" class="mr-2" checked> No Timer
                            </label>
                            <label class="radio-label block p-3 rounded-md border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                <input type="radio" name="timerMode" value="visible" class="mr-2"> Show elapsed time (count up)
                            </label>
                            <label class="radio-label block p-3 rounded-md border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                <input type="radio" name="timerMode" value="timed" class="mr-2"> Timed test (<?php echo $quizDurationMinutes; ?> min countdown)
                            </label>
                        </div>
                    </div>

                    <!-- Other Options -->
                    <div>
                        <label class="block text-sm font-medium text-text-default mb-2">Other Options</label>
                        <label class="radio-label flex items-center p-3 rounded-md border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                            <input type="checkbox" name="scramble" value="true" class="mr-3 h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded">
                            Scramble question order
                        </label>
                    </div>
                </div>

                <!-- Start Button -->
                <div class="mt-10">
                    <button type="submit" class="w-full bg-primary text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 text-lg focus:outline-none focus:ring-2 focus:ring-accent">
                        <i class="fas fa-play mr-2"></i> Start Quiz
                    </button>
                </div>
            </form>

        <?php // --- STATE 2: SHOW QUIZ SCREEN ---
        elseif ($isQuizActive): ?>

            <!-- Timer UI -->
            <?php if ($timerMode != 'none'): ?>
            <div id="quiz-timer" class="mb-6 p-3 bg-base-bg border border-gray-300 rounded-lg shadow-sm flex items-center justify-center sticky top-4 z-10">
                <i class="fas fa-clock text-primary mr-3 text-xl"></i>
                <span class="text-xl font-bold text-text-default" id="timer-display">00:00</span>
            </div>
            <?php endif; ?>

            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex justify-between mb-1">
                    <span class="text-base font-medium text-text-secondary">Progress</span>
                    <span class="text-sm font-medium text-text-secondary"><span id="progress-text">1</span>/<?php echo $totalQuestions; ?></span>
                </div>
                <div class="w-full progress-bar-bg rounded-full h-4">
                    <div id="progress-bar" class="progress-bar-fg h-4 rounded-full" style="width: <?php echo (1/$totalQuestions)*100; ?>%"></div>
                </div>
            </div>

            <!-- Quiz Form -->
            <form action="algebra_test.php" method="POST" id="quizForm">
                <!-- Hidden fields to pass settings -->
                <input type="hidden" name="grade_test" value="1">
                <input type="hidden" name="studentName" value="<?php echo $studentName; ?>">
                <input type="hidden" name="gradeLevel" value="<?php echo $gradeLevel; ?>">
                
                <?php foreach ($questions as $index => $q):
                    $key = $q['id'];
                    $isFirst = ($index == 0);
                    $isLast = ($index == $totalQuestions - 1);
                ?>
                <div id="question-<?php echo $index; ?>" class="quiz-card <?php echo $isFirst ? 'active' : ''; ?>">
                    <!-- Question Text -->
                    <p class="font-semibold text-lg mb-3 flex items-center">
                        <?php echo ($index + 1) . ". " . $q['text']; ?>
                    </p>
                    
                    <!-- Answer Area -->
                    <div class="space-y-2">
                        <?php if ($q['type'] == 'mc'): ?>
                            <?php foreach ($q['options'] as $value => $text): ?>
                                <label class="radio-label block p-3 rounded-md border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                    <input type="radio" name="<?php echo $key; ?>" value="<?php echo $value; ?>" class="mr-2">
                                    <?php echo $text; ?>
                                </label>
                            <?php endforeach; ?>
                        <?php elseif ($q['type'] == 'text'): ?>
                            <label for="<?php echo $key; ?>" class="sr-only"><?php echo $q['text']; ?></label>
                            <input type="text" id="<?php echo $key; ?>" name="<?php echo $key; ?>" class="w-full md:w-1/2 p-2 bg-base-bg border border-gray-300 rounded-md shadow-sm text-text-default focus:ring-primary focus:border-primary">
                        <?php endif; ?>
                    </div>

                    <!-- Hint & Explanation Buttons -->
                    <div class="mt-4 space-x-2">
                        <button type="button" class="hint-button text-sm text-blue-500 hover:underline" data-target="hint-<?php echo $index; ?>">
                            <i class="fas fa-lightbulb mr-1"></i> Show Hint
                        </button>
                        <button type="button" class="explanation-button text-sm text-green-600 hover:underline" data-target="explanation-<?php echo $index; ?>">
                            <i class="fas fa-book-open mr-1"></i> Show Explanation
                        </button>
                    </div>
                    
                    <div id="hint-<?php echo $index; ?>" class="hint-box text-text-secondary">
                        <strong>Hint:</strong> <?php echo $q['hint']; ?>
                    </div>
                    <div id="explanation-<?php echo $index; ?>" class="explanation-box text-text-default">
                        <strong>Explanation:</strong> <?php echo $q['explanation']; ?>
                    </div>

                    <!-- Navigation -->
                    <div class="flex justify-between mt-6">
                        <button type="button" class="prev-button bg-gray-500 text-white font-bold py-2 px-5 rounded-lg shadow-md hover:bg-gray-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-gray-400 <?php echo $isFirst ? 'hidden' : ''; ?>" data-target="<?php echo $index - 1; ?>">
                            <i class="fas fa-arrow-left mr-2"></i> Previous
                        </button>
                        <div class="<?php echo $isFirst ? 'hidden' : ''; ?>"></div> <!-- Spacer -->
                        
                        <?php if (!$isLast): ?>
                            <button type="button" class="next-button bg-primary text-white font-bold py-2 px-5 rounded-lg shadow-md hover:bg-secondary transition duration-300 focus:outline-none focus:ring-2 focus:ring-accent" data-target="<?php echo $index + 1; ?>">
                                Next <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        <?php else: ?>
                            <button type="submit" class="w-full md:w-auto bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-green-700 transition duration-300 text-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                                <i class="fas fa-check-double mr-2"></i> Grade My Test
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </form>

        <?php // --- STATE 3: SHOW RESULTS SCREEN ---
        elseif ($isSubmitted): ?>

            <!-- Results -->
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 rounded-md mb-8 shadow-sm" role="alert">
                <h2 class="text-2xl font-bold">Test Results for <?php echo $studentName; ?> (Grade <?php echo $gradeLevel; ?>)</h2>
                <p class="text-lg mt-2">You scored <strong class="font-bold"><?php echo $score; ?></strong> out of <strong class="font-bold"><?php echo $totalQuestions; ?></strong> questions correctly.</p>
            </div>
            <!-- Progress Bar -->
            <div class="mb-4">
                <div class="flex justify-between mb-1">
                    <span class="text-base font-medium text-primary">Final Score</span>
                    <span class="text-sm font-medium text-primary"><?php echo number_format($percentage, 0); ?>%</span>
                </div>
                <div class="w-full progress-bar-bg rounded-full h-4">
                    <div class="progress-bar-fg h-4 rounded-full" style="width: <?php echo $percentage; ?>%"></div>
                </div>
            </div>
            <!-- PDF Download Button -->
            <div class="mb-8">
                <button id="downloadPdfButton" class="w-full md:w-auto mt-2 bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition duration-300 text-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    <i class="fas fa-file-pdf mr-2"></i> Download Results as PDF
                </button>
            </div>
            
            <!-- Review Answers Form -->
            <form id="quizForm" class="review-mode">
                <h2 class="text-2xl font-semibold text-text-default border-b-2 border-gray-200 pb-2 mb-6">Review Your Answers</h2>
                
                <?php foreach ($questions as $index => $q):
                    $key = $q['id'];
                ?>
                <div class="mb-8 p-4 rounded-md <?php echo get_result_class($key); ?>">
                    <!-- Question Text -->
                    <p class="font-semibold text-lg mb-3 flex items-center">
                        <?php echo ($index + 1) . ". " . $q['text']; ?>
                        <?php show_feedback_icon($key); ?>
                    </p>
                    
                    <!-- Answer Area -->
                    <div class="space-y-2">
                        <?php if ($q['type'] == 'mc'): ?>
                            <?php foreach ($q['options'] as $value => $text): ?>
                                <label class="radio-label block p-3 rounded-md border border-gray-300 dark:border-gray-600">
                                    <input type="radio" name="<?php echo $key; ?>" value="<?php echo $value; ?>" class="mr-2" <?php if (get_post_value($key) == $value) echo 'checked'; ?>>
                                    <?php echo $text; ?>
                                </label>
                            <?php endforeach; ?>
                        <?php elseif ($q['type'] == 'text'): ?>
                            <label for="<?php echo $key; ?>" class="sr-only"><?php echo $q['text']; ?></label>
                            <input type="text" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo get_post_value($key); ?>" class="w-full md:w-1/2 p-2 bg-base-bg border border-gray-300 rounded-md shadow-sm text-text-default">
                        <?php endif; ?>
                    </div>

                    <!-- Correct Answer -->
                    <?php show_correct_answer($key); ?>

                    <!-- Hint & Explanation Buttons -->
                    <div class="mt-4 space-x-2">
                        <button type="button" class="hint-button text-sm text-blue-500 hover:underline" data-target="hint-<?php echo $index; ?>">
                            <i class="fas fa-lightbulb mr-1"></i> Show Hint
                        </button>
                        <button type="button" class="explanation-button text-sm text-green-600 hover:underline" data-target="explanation-<?php echo $index; ?>">
                            <i class="fas fa-book-open mr-1"></i> Show Explanation
                        </button>
                    </div>
                    
                    <div id="hint-<?php echo $index; ?>" class="hint-box text-text-secondary">
                        <strong>Hint:</strong> <?php echo $q['hint']; ?>
                    </div>
                    <div id="explanation-<?php echo $index; ?>" class="explanation-box text-text-default">
                        <strong>Explanation:</strong> <?php echo $q['explanation']; ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Retake Button -->
                <div class="mt-10">
                    <a href="algebra_test.php" class="block w-full text-center bg-gray-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 text-lg focus:outline-none focus:ring-2 focus:ring-gray-400">
                        <i class="fas fa-redo mr-2"></i> Take Again
                    </a>
                </div>
            </form>

        <?php endif; ?>

    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quizForm = document.getElementById('quizForm');
    const isQuizActive = <?php echo json_encode($isQuizActive); ?>;
    const isSubmitted = <?php echo json_encode($isSubmitted); ?>;
    let timerInterval = null;

    // --- TIMER LOGIC ---
    function startTimer(mode, durationSeconds = 0) {
        const timerDisplay = document.getElementById('timer-display');
        if (!timerDisplay) return;

        let secondsRemaining = durationSeconds;
        let secondsElapsed = 0;

        timerInterval = setInterval(() => {
            if (mode === 'timed') {
                secondsRemaining--;
                if (secondsRemaining < 0) {
                    clearInterval(timerInterval);
                    timerDisplay.textContent = 'Time\'s Up!';
                    timerDisplay.classList.add('text-red-500');
                    quizForm.submit();
                    return;
                }
                const minutes = Math.floor(secondsRemaining / 60);
                const seconds = secondsRemaining % 60;
                timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            } else if (mode === 'visible') {
                secondsElapsed++;
                const minutes = Math.floor(secondsElapsed / 60);
                const seconds = secondsElapsed % 60;
                timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            }
        }, 1000);
    }

    // --- QUIZ NAVIGATION (Card) LOGIC ---
    if (isQuizActive) {
        let currentQuestionIndex = 0;
        const questionCards = document.querySelectorAll('.quiz-card');
        const totalQuestions = questionCards.length;
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');

        function showQuestion(index) {
            questionCards.forEach((card, i) => {
                card.classList.toggle('active', i === index);
            });
            // Update progress
            currentQuestionIndex = index;
            progressText.textContent = (index + 1);
            progressBar.style.width = ((index + 1) / totalQuestions) * 100 + '%';
            // Ensure MathJax re-renders the new card
            if (window.MathJax) {
                window.MathJax.typesetPromise();
            }
        }

        quizForm.addEventListener('click', function(e) {
            if (e.target.classList.contains('next-button')) {
                const targetIndex = parseInt(e.target.dataset.target, 10);
                showQuestion(targetIndex);
            }
            if (e.target.classList.contains('prev-button')) {
                const targetIndex = parseInt(e.target.dataset.target, 10);
                showQuestion(targetIndex);
            }
        });
        
        showQuestion(0); // Show first question
        
        // Start the timer based on PHP settings
        const timerMode = '<?php echo $timerMode; ?>';
        if (timerMode === 'timed') {
            startTimer('timed', <?php echo $quizDurationMinutes * 60; ?>);
        } else if (timerMode === 'visible') {
            startTimer('visible');
        }
    }

    // --- HINT & EXPLANATION TOGGLE LOGIC ---
    // This event listener is placed on the main container to work on all 3 screens
    document.querySelector('.max-w-3xl').addEventListener('click', function(e) {
        let targetButton = null;
        if (e.target.classList.contains('hint-button')) {
            targetButton = e.target;
        } else if (e.target.parentElement.classList.contains('hint-button')) {
            targetButton = e.target.parentElement;
        } else if (e.target.classList.contains('explanation-button')) {
            targetButton = e.target;
        } else if (e.target.parentElement.classList.contains('explanation-button')) {
            targetButton = e.target.parentElement;
        }

        if (targetButton) {
            e.preventDefault();
            const targetBox = document.getElementById(targetButton.dataset.target);
            if (targetBox) {
                const isHidden = targetBox.style.display === 'none' || targetBox.style.display === '';
                targetBox.style.display = isHidden ? 'block' : 'none';
                if (isHidden && window.MathJax) {
                    window.MathJax.typesetPromise([targetBox]);
                }
            }
        }
    });

    // --- PDF DOWNLOAD LOGIC ---
    if (isSubmitted) {
        const downloadButton = document.getElementById('downloadPdfButton');
        
        // Pass PHP data to JavaScript
        const studentName = <?php echo json_encode($studentName); ?>;
        const gradeLevel = <?php echo json_encode($gradeLevel); ?>;
        const questionsData = <?php echo json_encode($questions); ?>;
        const userAnswersData = <?php echo json_encode($userAnswers); ?>;
        const resultsData = <?php echo json_encode($results); ?>;
        const finalScore = <?php echo $score; ?>;
        const finalPercentage = <?php echo number_format($percentage, 0); ?>;
        const totalQs = <?php echo $totalQuestions; ?>;

        downloadButton.addEventListener('click', function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            let yPos = 20;
            const formatText = (text) => text.replace(/\\\(|\\\)/g, ''); // Strips MathJax delimiters

            // --- PDF STYLING ---
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(18);
            doc.text('Algebra 1 Test Results', 105, yPos, { align: 'center' });
            yPos += 10;
            
            doc.setFontSize(14);
            doc.text(`Student: ${studentName}`, 105, yPos, { align: 'center' });
            yPos += 7;
            doc.text(`Grade Level: ${gradeLevel}`, 105, yPos, { align: 'center' });
            yPos += 10;

            doc.setFont('helvetica', 'normal');
            doc.setFontSize(12);
            doc.text(`Final Score: ${finalScore} / ${totalQs} (${finalPercentage}%)`, 105, yPos, { align: 'center' });
            yPos += 15;

            // --- PDF CONTENT LOOP ---
            questionsData.forEach((q, index) => {
                if (yPos > 270) { // Add new page
                    doc.addPage();
                    yPos = 20;
                }
                
                const key = q.id;
                const userAnswerRaw = userAnswersData[key] || 'No Answer';
                const isCorrect = resultsData[key] === 'correct';
                let correctAnswer = q.answer;
                let userAnswer = userAnswerRaw;

                if(q.type === 'mc') {
                    correctAnswer = formatText(q.options[q.answer] || '');
                    userAnswer = formatText(q.options[userAnswerRaw] || userAnswerRaw); // Get option text
                }

                // Question Text
                doc.setFont('helvetica', 'bold');
                doc.setFontSize(12);
                const qText = doc.splitTextToSize(`${index + 1}. ${formatText(q.text)}`, 180);
                doc.text(qText, 15, yPos);
                yPos += (qText.length * 5) + 5; 

                // User Answer
                doc.setFont('helvetica', 'normal');
                doc.setFontSize(10);
                doc.setTextColor(isCorrect ? '#22c55e' : '#ef4444');
                doc.text(`Your Answer: ${userAnswer} ${isCorrect ? '(Correct)' : '(Incorrect)'}`, 20, yPos);
                yPos += 5;

                // Correct Answer (if incorrect)
                if (!isCorrect) {
                    doc.setTextColor('#374151');
                    doc.text(`Correct Answer: ${correctAnswer}`, 20, yPos);
                    yPos += 5;
                }
                
                // Explanation
                doc.setTextColor('#6B7280'); // text-gray-500
                const exText = doc.splitTextToSize(`Explanation: ${formatText(q.explanation)}`, 175);
                
                // Check if explanation fits on the page
                if (yPos + (exText.length * 5) > 280) {
                    doc.addPage();
                    yPos = 20;
                }
                
                doc.text(exText, 20, yPos);
                yPos += (exText.length * 5) + 5;
                yPos += 5; // Extra padding
            });

            doc.save(`${studentName.replace(/ /g, '_')}_Algebra_1_Results.pdf`);
        });
    }

});
</script>

<?php
// --- Include the site footer ---
include 'src/footer.php';
?>

