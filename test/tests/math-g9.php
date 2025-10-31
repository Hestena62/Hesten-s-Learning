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

// --- CONSTANTS ---
$quizFile = 'quizzes/algebra-1-final.json';
$quizDurationMinutes = 20; // 20 minutes for a timed test

// --- PAGE STATE MANAGEMENT ---
$isSetup = false;
$isQuizActive = false;
$isSubmitted = false;

// --- QUIZ & GRADING VARIABLES ---
$questions = [];
$original_questions = []; // For topic breakdown
$results = [];
$userAnswers = [];
$flaggedQuestions = [];
$revealedQuestions = [];
$topicScores = [];
$score = 0;
$percentage = 0;
$studentName = '';
$gradeLevel = '';
$timerMode = 'none';
$scramble = false;

// --- LOAD QUIZ DATA ---
function loadQuestions($filePath) {
    if (!file_exists($filePath)) {
        return [];
    }
    $json = file_get_contents($filePath);
    return json_decode($json, true);
}

// --- DETERMINE PAGE STATE FROM POST DATA ---
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Load the question data for both quiz and results states
    $questions = json_decode($_POST['questions_data'] ?? '[]', true);
    if (empty($questions)) {
        // Fallback for results page if questions_data isn't passed (e.g., JS fail)
        // Note: This relies on the original file, so it won't reflect a scrambled quiz.
        // The JS passing the data is the primary method.
        $questions = loadQuestions($quizFile);
    }
    $original_questions = json_decode($_POST['questions_data_original'] ?? json_encode($questions), true);


    if (isset($_POST['grade_test'])) {
        // --- STATE 3: RESULTS SCREEN ---
        $isSubmitted = true;
        
        $studentName = htmlspecialchars($_POST['studentName'] ?? 'Student');
        $gradeLevel = htmlspecialchars($_POST['gradeLevel'] ?? 'N/A');
        $flaggedQuestions = json_decode($_POST['flagged_questions'] ?? '[]', true);
        
        // Helper function to normalize text answers
        function normalize($val) {
            return str_replace([' ', '(', ')'], '', strtolower(trim($val)));
        }

        // Initialize Topic Scores
        foreach ($original_questions as $q) {
            if (!isset($topicScores[$q['topic']])) {
                $topicScores[$q['topic']] = ['correct' => 0, 'total' => 0];
            }
            $topicScores[$q['topic']]['total']++;
        }

        // Grade the quiz
        foreach ($questions as $q) {
            $key = $q['id'];
            $correctAnswer = $q['answer'];
            $userAnswerRaw = isset($_POST[$key]) ? $_POST[$key] : '';
            $userAnswers[$key] = $userAnswerRaw; // Store for PDF/Review

            $isCorrect = false;

            // Check if user clicked "Show Answer"
            if (isset($_POST['reveal_' . $key])) {
                $results[$key] = 'incorrect';
                $revealedQuestions[] = $key;
                continue; // Skip grading, it's automatically wrong
            }

            // Grade based on question type
            switch ($q['type']) {
                case 'mc':
                    $isCorrect = (normalize($userAnswerRaw) == normalize($correctAnswer));
                    break;
                case 'text':
                    $isCorrect = (normalize($userAnswerRaw) == normalize($correctAnswer));
                    break;
                case 'graph':
                    $answer = $correctAnswer; // This is already an array: {"m": 2, "b": -1}
                    $userAnswer = json_decode($userAnswerRaw, true);
                    if ($userAnswer && isset($userAnswer['m']) && isset($userAnswer['b'])) {
                        // Check slope and intercept with a small tolerance
                        $isCorrect = abs($answer['m'] - $userAnswer['m']) < 0.1 && abs($answer['b'] - $userAnswer['b']) < 0.1;
                    }
                    break;
                case 'match':
                    $answer = $correctAnswer; // This is an array: {"Stem 1": "Option A", ...}
                    $userAnswer = json_decode($userAnswerRaw, true);
                    if ($userAnswer && count($answer) == count($userAnswer)) {
                        $isCorrect = true;
                        foreach ($answer as $stem => $option) {
                            if (!isset($userAnswer[$stem]) || $userAnswer[$stem] != $option) {
                                $isCorrect = false;
                                break;
                            }
                        }
                    }
                    break;
            }

            if ($isCorrect) {
                $score++;
                $results[$key] = 'correct';
                // Find original topic to update score
                foreach ($original_questions as $orig_q) {
                    if ($orig_q['id'] == $key) {
                        $topicScores[$orig_q['topic']]['correct']++;
                        break;
                    }
                }
            } else {
                $results[$key] = 'incorrect';
            }
        }
        $percentage = (count($questions) > 0) ? ($score / count($questions)) * 100 : 0;

    } elseif (isset($_POST['start_quiz'])) {
        // --- STATE 2: QUIZ SCREEN ---
        $isQuizActive = true;
        
        $studentName = htmlspecialchars($_POST['studentName'] ?? 'Student');
        $gradeLevel = htmlspecialchars($_POST['gradeLevel'] ?? 'N/A');
        $timerMode = $_POST['timerMode'] ?? 'none';
        $scramble = isset($_POST['scramble']);

        // Load and set up questions
        $original_questions = loadQuestions($quizFile);
        $questions = $original_questions;
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
        $correctAnswerText = '';
        foreach ($questions as $q) {
            if ($q['id'] == $key) {
                switch ($q['type']) {
                    case 'mc':
                        $correctAnswerText = $q['options'][$q['answer']];
                        break;
                    case 'text':
                        $correctAnswerText = $q['answer'];
                        break;
                    case 'graph':
                        $correctAnswerText = "Line with slope \(m = {$q['answer']['m']}\) and y-intercept \(b = {$q['answer']['b']}\).";
                        break;
                    case 'match':
                        $matches = [];
                        foreach ($q['answer'] as $stem => $option) {
                            $matches[] = "<li><em>{$stem}</em> &rarr; <strong>{$option}</strong></li>";
                        }
                        $correctAnswerText = "<ul class='list-disc list-inside ml-2'>" . implode('', $matches) . "</ul>";
                        break;
                }
                break;
            }
        }
        echo '<div class="correct-text font-semibold mt-2">Correct answer: ' . $correctAnswerText . '</div>';
    }
}


function get_post_value($key) {
    global $userAnswers;
    return htmlspecialchars($userAnswers[$key] ?? '');
}

function show_feedback_icon($key) {
    global $results, $isSubmitted, $flaggedQuestions, $revealedQuestions;
    if (!$isSubmitted) return '';

    $icons = '';
    if (in_array($key, $flaggedQuestions)) {
        $icons .= '<i class="fas fa-flag text-yellow-500 text-lg ml-3" title="Flagged for Review"></i>';
    }
    if (in_array($key, $revealedQuestions)) {
        $icons .= '<i class="fas fa-eye text-blue-500 text-lg ml-3" title="Answer was Revealed"></i>';
    }

    if (isset($results[$key])) {
        if ($results[$key] == 'correct') {
            $icons .= '<i class="fas fa-check-circle text-green-500 text-xl ml-3" aria-label="Correct"></i>';
        } else {
            $icons .= '<i class="fas fa-times-circle text-red-500 text-xl ml-3" aria-label="Incorrect"></i>';
        }
    }
    echo $icons;
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
<!-- Add JSXGraph for graphing questions -->
<script src="https://cdn.jsdelivr.net/npm/jsxgraph@1.6.0/distill/jsxgraphcore.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/jsxgraph@1.6.0/distill/jsxgraph.css" />
<!-- Add SortableJS for drag-and-drop -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>


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
    .review-mode .radio-label, .review-mode .jxgbox {
        pointer-events: none;
        cursor: default;
        opacity: 0.8;
    }
    .review-mode .match-stems, .review-mode .match-options {
        pointer-events: none;
    }
    
    /* Timer styles */
    #quiz-timer {
        position: sticky;
        top: 10px;
        z-index: 10;
        animation: fadeIn 0.5s;
    }
    
    /* Flag button */
    .flag-button {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.25rem;
        color: var(--color-text-secondary);
        transition: color 0.2s, transform 0.2s;
    }
    .flag-button.flagged {
        color: #f59e0b; /* yellow-500 */
        transform: scale(1.1);
    }
    .dark .flag-button.flagged {
        color: #fcd34d; /* yellow-300 */
    }

    /* JSXGraph board */
    .jxgbox {
        width: 100%;
        height: 300px;
        border: 1px solid var(--color-text-secondary);
        border-radius: 0.5rem;
    }
    
    /* Drag-and-drop matching */
    .match-container {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .match-stems, .match-options {
        flex: 1;
        min-width: 200px;
        padding: 0.5rem;
        border: 1px dashed var(--color-text-secondary);
        border-radius: 0.5rem;
    }
    .match-options {
        background-color: color-mix(in srgb, var(--color-base-bg, #F9FAFB) 50%, transparent 50%);
    }
    .match-item {
        padding: 0.75rem;
        margin-bottom: 0.5rem;
        background-color: var(--color-content-bg);
        border: 1px solid var(--color-accent);
        border-radius: 0.25rem;
        cursor: grab;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .match-item:active {
        cursor: grabbing;
    }
    /* Ghost class for SortableJS */
    .sortable-ghost {
        opacity: 0.4;
        background: var(--color-accent);
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
            
            <form action="" method="POST" id="setupForm">
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
            
            <!-- Clear any old quiz progress when on the setup screen -->
            <script>
                localStorage.removeItem('algebraQuizProgress');
            </script>

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
                    <span class="text-sm font-medium text-text-secondary"><span id="progress-text">1</span>/<?php echo count($questions); ?></span>
                </div>
                <div class="w-full progress-bar-bg rounded-full h-4">
                    <div id="progress-bar" class="progress-bar-fg h-4 rounded-full" style="width: <?php echo (1/count($questions))*100; ?>%"></div>
                </div>
            </div>

            <!-- Quiz Form -->
            <form action="" method="POST" id="quizForm">
                <!-- Hidden fields to pass settings -->
                <input type="hidden" name="grade_test" value="1">
                <input type="hidden" name="studentName" value="<?php echo $studentName; ?>">
                <input type="hidden" name="gradeLevel" value="<?php echo $gradeLevel; ?>">
                <input type="hidden" name="flagged_questions" id="flagged_questions_input" value="[]">
                <!-- Pass question data for grading and topic breakdown -->
                <input type="hidden" name="questions_data" value="<?php echo htmlspecialchars(json_encode($questions)); ?>">
                <input type="hidden" name="questions_data_original" value="<?php echo htmlspecialchars(json_encode($original_questions)); ?>">
                
                <?php foreach ($questions as $index => $q):
                    $key = $q['id'];
                    $isFirst = ($index == 0);
                    $isLast = ($index == count($questions) - 1);
                ?>
                <div id="question-<?php echo $index; ?>" class="quiz-card <?php echo $isFirst ? 'active' : ''; ?>" data-question-id="<?php echo $key; ?>">
                    <!-- Question Header (Text + Flag) -->
                    <div class="flex justify-between items-start mb-3">
                        <p class="font-semibold text-lg flex-1">
                            <?php echo ($index + 1) . ". " . $q['text']; ?>
                        </p>
                        <button type="button" class="flag-button ml-3 p-2" title="Flag for Review" data-question-id="<?php echo $key; ?>">
                            <i class="far fa-flag"></i>
                        </button>
                    </div>
                    
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
                        
                        <?php elseif ($q['type'] == 'graph'): ?>
                            <div id="graph-<?php echo $key; ?>" class="jxgbox"></div>
                            <input type="hidden" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="">
                            <p class="text-sm text-text-secondary mt-1">Plot two points to define the line.</p>

                        <?php elseif ($q['type'] == 'match'): ?>
                            <p class="text-sm text-text-secondary mb-2">Drag the items from the left to match them with the options on the right.</p>
                            <div class="match-container">
                                <div class="match-stems" id="stems-<?php echo $key; ?>">
                                    <?php foreach ($q['stems'] as $stem): ?>
                                    <div class="match-item" data-id="<?php echo htmlspecialchars($stem); ?>"><?php echo $stem; ?></div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="match-options" id="options-<?php echo $key; ?>">
                                    <?php 
                                    $shuffled_options = $q['options'];
                                    shuffle($shuffled_options);
                                    foreach ($shuffled_options as $option): 
                                    ?>
                                    <div class="match-item" data-id="<?php echo htmlspecialchars($option); ?>"><?php echo $option; ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <input type="hidden" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="">
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
                        <button type="button" class="show-answer-button text-sm text-red-500 hover:underline" data-target="explanation-<?php echo $index; ?>" data-question-id="<?php echo $key; ?>">
                            <i class="fas fa-eye mr-1"></i> Show Answer
                        </button>
                    </div>
                    
                    <div id="hint-<?php echo $index; ?>" class="hint-box text-text-secondary">
                        <strong>Hint:</strong> <?php echo $q['hint']; ?>
                    </div>
                    <div id="explanation-<?php echo $index; ?>" class="explanation-box text-text-default">
                        <strong>Explanation:</strong> <?php echo $q['explanation']; ?>
                    </div>
                    <!-- Hidden input to track "Show Answer" clicks -->
                    <input type="hidden" name="reveal_<?php echo $key; ?>" id="reveal_<?php echo $key; ?>" value="">

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
                <p class="text-lg mt-2">You scored <strong class="font-bold"><?php echo $score; ?></strong> out of <strong class="font-bold"><?php echo count($questions); ?></strong> questions correctly.</p>
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
            
            <!-- Topic Breakdown -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-text-default border-b-2 border-gray-200 pb-2 mb-4">Score by Topic</h3>
                <div class="space-y-3">
                    <?php foreach ($topicScores as $topic => $data):
                        $topicPercentage = ($data['total'] > 0) ? ($data['correct'] / $data['total']) * 100 : 0;
                    ?>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-base font-medium text-text-default"><?php echo htmlspecialchars($topic); ?></span>
                            <span class="text-sm font-medium text-text-secondary"><?php echo $data['correct']; ?> / <?php echo $data['total']; ?></span>
                        </div>
                        <div class="w-full progress-bar-bg rounded-full h-3">
                            <div class="progress-bar-fg h-3 rounded-full" style="width: <?php echo $topicPercentage; ?>%"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Review Answers Form -->
            <form id="quizForm" class="review-mode">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-text-default border-b-2 border-gray-200 pb-2">Review Your Answers</h2>
                    <!-- Filter Button -->
                    <label class="flex items-center cursor-pointer">
                        <span class="text-sm font-medium text-text-default mr-2">Show Incorrect Only</span>
                        <input type="checkbox" id="filter-incorrect-toggle" class="toggle">
                    </label>
                </div>
                
                <?php foreach ($questions as $index => $q):
                    $key = $q['id'];
                    $resultClass = get_result_class($key);
                ?>
                <div class="review-item <?php echo $resultClass; ?> mb-8 p-4 rounded-md">
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
                        
                        <?php elseif ($q['type'] == 'graph'): ?>
                            <div id="graph-<?php echo $key; ?>" class="jxgbox"></div>
                            <input type="hidden" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo get_post_value($key); ?>">

                        <?php elseif ($q['type'] == 'match'): ?>
                            <div class="match-container">
                                <div class="match-stems" id="stems-<?php echo $key; ?>">
                                    <!-- Stems will be on the left -->
                                </div>
                                <div class="match-options" id="options-<?php echo $key; ?>">
                                    <!-- Matched options will be here -->
                                </div>
                            </div>
                            <input type="hidden" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo get_post_value($key); ?>">

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
                    <a href="" class="block w-full text-center bg-gray-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 text-lg focus:outline-none focus:ring-2 focus:ring-gray-400">
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
    let secondsElapsed = 0; // Outer scope for timer
    const QUIZ_STORAGE_KEY = 'algebraQuizProgress';
    let flaggedQuestions = []; // JS tracking for flags
    let graphBoards = {}; // Store graph boards
    let matchGroups = {}; // Store match groups

    // --- TIMER LOGIC ---
    function startTimer(mode, durationSeconds = 0, initialElapsed = 0) {
        const timerDisplay = document.getElementById('timer-display');
        if (!timerDisplay) return;

        secondsElapsed = initialElapsed;
        let secondsRemaining = durationSeconds - initialElapsed;

        timerInterval = setInterval(() => {
            if (mode === 'timed') {
                secondsRemaining--;
                if (secondsRemaining < 0) {
                    clearInterval(timerInterval);
                    timerDisplay.textContent = 'Time\'s Up!';
                    timerDisplay.classList.add('text-red-500');
                    saveProgress(); 
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

    // --- ADVANCED QUESTION INIT ---
    function initGraphQuestion(q, index) {
        const key = q.id;
        const boardId = `graph-${key}`;
        const input = document.getElementById(key);
        if (!document.getElementById(boardId)) return;

        const board = JXG.JSXGraph.initBoard(boardId, {
            boundingbox: [-5, 5, 5, -5],
            axis: true,
            grid: true
        });
        graphBoards[key] = board;

        let p1 = board.create('point', [-2, -5], { name: 'A', size: 3 });
        let p2 = board.create('point', [2, 3], { name: 'B', size: 3 });
        let line = board.create('line', [p1, p2], { strokeColor: '#007bff', strokeWidth: 2 });

        const updateInput = () => {
            if (p2.X() - p1.X() === 0) return; // Avoid division by zero
            const m = (p2.Y() - p1.Y()) / (p2.X() - p1.X());
            const b = p1.Y() - m * p1.X();
            input.value = JSON.stringify({ m: m, b: b });
            saveProgress(); // Save on graph update
        };

        p1.on('drag', updateInput);
        p2.on('drag', updateInput);
        
        // Return points for `loadProgress`
        return { p1, p2, updateInput };
    }

    function initMatchQuestion(q, index) {
        const key = q.id;
        const stemsContainer = document.getElementById(`stems-${key}`);
        const optionsContainer = document.getElementById(`options-${key}`);
        const input = document.getElementById(key);
        if (!stemsContainer || !optionsContainer) return;

        const updateInput = () => {
            const matches = {};
            // Assume stems are fixed, options are dragged
            const stemItems = stemsContainer.querySelectorAll('.match-item');
            const optionItems = optionsContainer.querySelectorAll('.match-item');

            // This setup assumes one-to-one matching, stems on left, options on right
            // A better setup: Stems on left, droppable "zones" on right
            
            // Let's change the logic: Stems are on the left, options (droppables) on the right.
            // This is complex. A simpler way: two lists, drag from one to the other.
            // Let's use SortableJS for two lists.
            
            // Re-think: The HTML has two lists. Let's make options draggable INTO stems.
            // No, that's complex. Let's make options sortable *next to* stems.
            // New Plan: `stems` are static. `options` are sortable. User sorts `options` to match the order of `stems`.
            
            // Let's stick to the current HTML: stems in one box, options in another.
            // This implies the user drags options from `options` to `stems`.
            // Let's re-build the HTML for this.

            // --- New Match HTML Structure (Implied) ---
            // <div class="match-stems">
            //   <div class="match-stem-item"><span>Stem 1</span><div class="drop-zone" data-stem="Stem 1"></div></div>
            // </div>
            // <div class="match-options">
            //   <div class="match-item" data-id="Option A">Option A</div>
            // </div>
            
            // This is too complex. Let's use the two-list SortableJS setup.
            // The HTML is fine. Stems on left, Options on right.
            // The *order* is what matters.
            
            // New plan: User sorts the `options` list to match the `stems` list.
            new Sortable(optionsContainer, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: () => {
                    const matches = {};
                    const stemItems = stemsContainer.querySelectorAll('.match-item');
                    const optionItems = optionsContainer.querySelectorAll('.match-item');
                    
                    stemItems.forEach((stem, i) => {
                        if (optionItems[i]) {
                            matches[stem.dataset.id] = optionItems[i].dataset.id;
                        }
                    });
                    input.value = JSON.stringify(matches);
                    saveProgress();
                }
            });
            
            // Return initial state for `loadProgress`
            return { updateInput: () => {} }; // updateInput is handled by onEnd
        }
    }


    // --- QUIZ NAVIGATION (Card) LOGIC ---
    if (isQuizActive) {
        let currentQuestionIndex = 0;
        const questionCards = document.querySelectorAll('.quiz-card');
        const totalQuestions = questionCards.length;
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const allQuestionsData = <?php echo json_encode($questions); ?>;
        
        // --- LOCALSTORAGE SAVE ---
        function saveProgress() {
            const formData = new FormData(quizForm);
            const answers = {};
            formData.forEach((value, key) => {
                if (!['grade_test', 'studentName', 'gradeLevel', 'flagged_questions', 'questions_data', 'questions_data_original'].includes(key) && !key.startsWith('reveal_')) {
                    answers[key] = value;
                }
            });
            
            const progress = {
                studentName: <?php echo json_encode($studentName); ?>,
                gradeLevel: <?php echo json_encode($gradeLevel); ?>,
                timerMode: <?php echo json_encode($timerMode); ?>,
                scramble: <?php echo json_encode($scramble); ?>,
                questions: allQuestionsData,
                currentQuestionIndex: currentQuestionIndex,
                answers: answers,
                timerElapsed: secondsElapsed,
                flagged: flaggedQuestions,
                revealed: Array.from(document.querySelectorAll('input[name^="reveal_"]')).filter(el => el.value === 'true').map(el => el.name.replace('reveal_', ''))
            };
            localStorage.setItem(QUIZ_STORAGE_KEY, JSON.stringify(progress));
            
            // Update hidden flag input
            document.getElementById('flagged_questions_input').value = JSON.stringify(flaggedQuestions);
        }

        // --- LOCALSTORAGE LOAD ---
        function loadProgress() {
            const defaultState = { currentQuestionIndex: 0, timerElapsed: 0, flagged: [], revealed: [] };
            const savedProgress = localStorage.getItem(QUIZ_STORAGE_KEY);
            if (!savedProgress) return defaultState;

            try {
                const progress = JSON.parse(savedProgress);
                
                const currentSettings = {
                    studentName: <?php echo json_encode($studentName); ?>,
                    gradeLevel: <?php echo json_encode($gradeLevel); ?>,
                    timerMode: <?php echo json_encode($timerMode); ?>,
                    scramble: <?php echo json_encode($scramble); ?>,
                    questions: allQuestionsData
                };

                if (progress.studentName !== currentSettings.studentName ||
                    progress.gradeLevel !== currentSettings.gradeLevel ||
                    progress.timerMode !== currentSettings.timerMode ||
                    progress.scramble !== currentSettings.scramble ||
                    JSON.stringify(progress.questions) !== JSON.stringify(currentSettings.questions)) {
                    
                    localStorage.removeItem(QUIZ_STORAGE_KEY);
                    return defaultState;
                }

                // Restore answers
                for (const [key, value] of Object.entries(progress.answers)) {
                    const radioInput = quizForm.querySelector(`[name="${key}"][value="${value}"]`);
                    if (radioInput) {
                        radioInput.checked = true;
                    } else {
                        const textInput = quizForm.querySelector(`[name="${key}"]`);
                        if (textInput) {
                            textInput.value = value;
                        }
                    }
                    
                    // Handle advanced question loading
                    if (graphBoards[key] && value) {
                        const { p1, p2, updateInput } = graphBoards[key];
                        const { m, b } = JSON.parse(value);
                        // Set points to reflect saved line
                        p1.setPosition(JXG.COORDS_BY_USER, [0, b]);
                        p2.setPosition(JXG.COORDS_BY_USER, [1, m + b]);
                        board.update();
                        updateInput(); // Re-calculate and set input
                    }
                    
                    if (matchGroups[key] && value) {
                        // This is harder. We need to re-order the list.
                        // We'll skip re-ordering for now, as it's complex.
                        // The saved `input.value` is enough to grade.
                    }
                }
                
                // Restore "revealed" state
                progress.revealed.forEach(key => {
                    const input = document.getElementById(`reveal_${key}`);
                    if (input) input.value = 'true';
                    // Disable inputs for this question
                    document.querySelector(`[data-question-id="${key}"]`).querySelectorAll('input, button.show-answer-button').forEach(el => {
                        el.disabled = true;
                        if (el.classList.contains('radio-label')) el.style.pointerEvents = 'none';
                    });
                });
                
                // Return loaded state
                return { 
                    currentQuestionIndex: progress.currentQuestionIndex, 
                    timerElapsed: progress.timerElapsed,
                    flagged: progress.flagged,
                    revealed: progress.revealed
                };

            } catch (e) {
                console.error("Error loading quiz progress:", e);
                localStorage.removeItem(QUIZ_STORAGE_KEY);
                return defaultState;
            }
        }

        function showQuestion(index) {
            questionCards.forEach((card, i) => {
                card.classList.toggle('active', i === index);
            });
            currentQuestionIndex = index;
            progressText.textContent = (index + 1);
            progressBar.style.width = ((index + 1) / totalQuestions) * 100 + '%';
            
            saveProgress();
            
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
        
        // --- INITIATE QUIZ ---
        // 1. Init all advanced questions
        allQuestionsData.forEach((q, index) => {
            if (q.type === 'graph') {
                graphBoards[q.id] = initGraphQuestion(q, index);
            }
            if (q.type === 'match') {
                matchGroups[q.id] = initMatchQuestion(q, index);
            }
        });
        
        // 2. Load progress
        const loadedState = loadProgress();
        currentQuestionIndex = loadedState.currentQuestionIndex;
        secondsElapsed = loadedState.timerElapsed;
        flaggedQuestions = loadedState.flagged;
        
        // 3. Restore flag icons
        flaggedQuestions.forEach(key => {
            const btn = document.querySelector(`.flag-button[data-question-id="${key}"]`);
            if (btn) {
                btn.classList.add('flagged');
                btn.querySelector('i').classList.replace('far', 'fas');
            }
        });
        document.getElementById('flagged_questions_input').value = JSON.stringify(flaggedQuestions);
        
        // 4. Show the correct question
        showQuestion(currentQuestionIndex);
        
        // 5. Save progress on any form input change
        quizForm.addEventListener('input', saveProgress);
        
        // 6. Start the timer
        const timerMode = '<?php echo $timerMode; ?>';
        if (timerMode === 'timed') {
            startTimer('timed', <?php echo $quizDurationMinutes * 60; ?>, secondsElapsed);
        } else if (timerMode === 'visible') {
            startTimer('visible', 0, secondsElapsed);
        }
    }

    // --- HINT, EXPLANATION, FLAG, & SHOW ANSWER ---
    document.querySelector('.max-w-3xl').addEventListener('click', function(e) {
        let targetButton = e.target.closest('button');
        if (!targetButton) return;

        // Hint & Explanation
        if (targetButton.classList.contains('hint-button') || targetButton.classList.contains('explanation-button')) {
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
        
        // Flag Button
        if (targetButton.classList.contains('flag-button')) {
            e.preventDefault();
            const key = targetButton.dataset.questionId;
            const icon = targetButton.querySelector('i');
            if (targetButton.classList.toggle('flagged')) {
                // Add flag
                icon.classList.replace('far', 'fas');
                if (!flaggedQuestions.includes(key)) {
                    flaggedQuestions.push(key);
                }
            } else {
                // Remove flag
                icon.classList.replace('fas', 'far');
                flaggedQuestions = flaggedQuestions.filter(f => f !== key);
            }
            saveProgress();
        }
        
        // Show Answer Button
        if (targetButton.classList.contains('show-answer-button')) {
            e.preventDefault();
            showConfirmationModal("This will mark this question as incorrect and show the answer. Are you sure?", (confirmed) => {
                if (confirmed) {
                    const key = targetButton.dataset.questionId;
                    // Show explanation
                    const targetBox = document.getElementById(targetButton.dataset.target);
                    if (targetBox) {
                        targetBox.style.display = 'block';
                        if (window.MathJax) window.MathJax.typesetPromise([targetBox]);
                    }
                    // Mark as revealed
                    document.getElementById(`reveal_${key}`).value = 'true';
                    // Disable inputs for this card
                    const card = targetButton.closest('.quiz-card');
                    card.querySelectorAll('input, .jxgbox, .match-stems, .match-options').forEach(el => {
                        el.disabled = true;
                        el.style.pointerEvents = 'none';
                        el.style.opacity = '0.7';
                    });
                    targetButton.disabled = true;
                    saveProgress();
                }
            });
        }
    });

    // --- RESULTS PAGE LOGIC ---
    if (isSubmitted) {
        // Clear progress from local storage
        localStorage.removeItem(QUIZ_STORAGE_KEY);
        
        // "Review Incorrect Only" Toggle
        const filterToggle = document.getElementById('filter-incorrect-toggle');
        if (filterToggle) {
            filterToggle.addEventListener('change', function(e) {
                const incorrectOnly = e.target.checked;
                document.querySelectorAll('.review-item.correct').forEach(el => {
                    el.style.display = incorrectOnly ? 'none' : 'block';
                });
            });
        }
        
        // Init graphs/matching for review mode
        <?php foreach ($questions as $q): ?>
            <?php if ($q['type'] == 'graph'): ?>
            {
                const key = '<?php echo $q['id']; ?>';
                const boardId = `graph-${key}`;
                const input = document.getElementById(key);
                if (document.getElementById(boardId) && input.value) {
                    const board = JXG.JSXGraph.initBoard(boardId, {
                        boundingbox: [-5, 5, 5, -5],
                        axis: true, grid: true, showNavigation: false
                    });
                    const { m, b } = JSON.parse(input.value);
                    board.create('line', [[0, b], [1, m + b]], { strokeColor: '#007bff', strokeWidth: 2, fixed: true });
                }
            }
            <?php elseif ($q['type'] == 'match'): ?>
            {
                const key = '<?php echo $q['id']; ?>';
                const input = document.getElementById(key);
                if (input.value) {
                    const matches = JSON.parse(input.value);
                    const stemsContainer = document.getElementById(`stems-${key}`);
                    const optionsContainer = document.getElementById(`options-${key}`);
                    stemsContainer.innerHTML = ''; // Clear
                    optionsContainer.innerHTML = ''; // Clear

                    // Rebuild the lists based on user's answer
                    <?php foreach ($q['stems'] as $stem): ?>
                        stemsContainer.innerHTML += `<div class="match-item" data-id="<?php echo htmlspecialchars($stem); ?>"><?php echo $stem; ?></div>`;
                        const matchedOption = matches['<?php echo htmlspecialchars($stem); ?>'] || '<i>No Match</i>';
                        optionsContainer.innerHTML += `<div class="match-item" data-id="">${matchedOption}</div>`;
                    <?php endforeach; ?>
                }
            }
            <?php endif; ?>
        <?php endforeach; ?>

        // PDF Download
        const downloadButton = document.getElementById('downloadPdfButton');
        downloadButton.addEventListener('click', function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            let yPos = 20;
            const formatText = (text) => text.replace(/\\\(|\\\)/g, ''); // Strips MathJax

            // --- PDF DATA ---
            const studentName = <?php echo json_encode($studentName); ?>;
            const gradeLevel = <?php echo json_encode($gradeLevel); ?>;
            const questionsData = <?php echo json_encode($questions); ?>;
            const originalQuestionsData = <?php echo json_encode($original_questions); ?>;
            const userAnswersData = <?php echo json_encode($userAnswers); ?>;
            const resultsData = <?php echo json_encode($results); ?>;
            const topicScoresData = <?php echo json_encode($topicScores); ?>;
            const flaggedData = <?php echo json_encode($flaggedQuestions); ?>;
            const revealedData = <?php echo json_encode($revealedQuestions); ?>;
            const finalScore = <?php echo $score; ?>;
            const finalPercentage = <?php echo number_format($percentage, 0); ?>;
            const totalQs = <?php echo count($questions); ?>;

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
            
            // --- TOPIC BREAKDOWN ---
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(14);
            doc.text('Score by Topic', 15, yPos);
            yPos += 7;
            doc.setFont('helvetica', 'normal');
            doc.setFontSize(10);
            
            Object.entries(topicScoresData).forEach(([topic, data]) => {
                if (yPos > 270) { doc.addPage(); yPos = 20; }
                const perc = (data.total > 0) ? (data.correct / data.total) * 100 : 0;
                doc.text(`${topic}: ${data.correct} / ${data.total} (${perc.toFixed(0)}%)`, 20, yPos);
                yPos += 6;
            });
            yPos += 10;

            // --- PDF CONTENT LOOP ---
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(14);
            doc.text('Question Review', 15, yPos);
            yPos += 7;

            questionsData.forEach((q, index) => {
                if (yPos > 270) { doc.addPage(); yPos = 20; }
                
                const key = q.id;
                const userAnswerRaw = userAnswersData[key] || 'No Answer';
                const isCorrect = resultsData[key] === 'correct';
                let correctAnswer = q.answer;
                let userAnswer = userAnswerRaw;
                let qText = formatText(q.text);
                
                let status = isCorrect ? '(Correct)' : '(Incorrect)';
                if (flaggedData.includes(key)) status += ' (Flagged)';
                if (revealedData.includes(key)) status = '(Answer Revealed)';
                
                doc.setFont('helvetica', 'bold');
                doc.setFontSize(12);
                doc.setTextColor('#000000');
                const qTextSplit = doc.splitTextToSize(`${index + 1}. ${qText}`, 180);
                doc.text(qTextSplit, 15, yPos);
                yPos += (qTextSplit.length * 5) + 2; 
                
                doc.setFont('helvetica', 'normal');
                doc.setFontSize(10);
                doc.setTextColor(isCorrect ? '#22c55e' : '#ef4444');
                if (revealedData.includes(key)) doc.setTextColor('#3b82f6'); // blue
                
                // Format user answer
                if (q.type === 'mc') {
                    userAnswer = formatText(q.options[userAnswerRaw] || userAnswerRaw);
                    correctAnswer = formatText(q.options[q.answer] || '');
                } else if (q.type === 'graph') {
                    const coords = JSON.parse(userAnswerRaw || '{}');
                    userAnswer = `Line with m=${coords.m?.toFixed(2)}, b=${coords.b?.toFixed(2)}`;
                    correctAnswer = `Line with m=${q.answer.m}, b=${q.answer.b}`;
                } else if (q.type === 'match') {
                    const matches = JSON.parse(userAnswerRaw || '{}');
                    userAnswer = Object.entries(matches).map(([s, o]) => `(${s} -> ${o})`).join(', ');
                    correctAnswer = Object.entries(q.answer).map(([s, o]) => `(${s} -> ${o})`).join(', ');
                }

                doc.text(`Your Answer: ${userAnswer} ${status}`, 20, yPos);
                yPos += 5;

                if (!isCorrect && !revealedData.includes(key)) {
                    doc.setTextColor('#374151');
                    doc.text(`Correct Answer: ${correctAnswer}`, 20, yPos);
                    yPos += 5;
                }
                yPos += 7;
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

