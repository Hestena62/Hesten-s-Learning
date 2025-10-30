<?php
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
}

$percentage = ($totalQuestions > 0) ? ($score / $totalQuestions) * 100 : 0;

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Algebra 1 Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Define styles for correct/incorrect feedback */
        .correct {
            border-left: 4px solid #22c55e; /* green-500 */
            background-color: #f0fdf4; /* green-50 */
        }
        .incorrect {
            border-left: 4px solid #ef4444; /* red-500 */
            background-color: #fef2f2; /* red-50 */
        }
        .correct-text {
            color: #166534; /* green-800 */
        }
        .incorrect-text {
            color: #b91c1c; /* red-800 */
        }
        
        /* Disable inputs after submission */
        .submitted input[type="radio"],
        .submitted input[type="text"] {
            pointer-events: none;
            background-color: #f9fafb; /* gray-50 */
        }
        .submitted .radio-label {
            pointer-events: none;
            cursor: default;
        }

        /* Style for math code */
        code {
            font-family: monospace;
            background-color: #f3f4f6; /* gray-100 */
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.95em;
        }
    </style>
    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4 md:p-8">

    <div class="max-w-3xl mx-auto bg-white p-6 md:p-10 rounded-lg shadow-xl">

        <h1 class="text-3xl font-bold text-gray-800 mb-2">Algebra 1 Test</h1>
        <p class="text-gray-600 mb-6">Based on the NY Regents Algebra I Exam (August 2025)</p>

        <!-- --- RESULTS BLOCK --- -->
        <?php if ($isSubmitted): ?>
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 rounded-md mb-8 shadow-sm">
            <h2 class="text-2xl font-bold">Test Results</h2>
            <p class="text-lg mt-2">You scored <strong class="font-bold"><?php echo $score; ?></strong> out of <strong class="font-bold"><?php echo $totalQuestions; ?></strong> questions correctly.</p>
            <p class="text-lg font-semibold"><?php echo number_format($percentage, 0); ?>%</p>
            <p class="mt-3">See your answers and the correct solutions below.</p>
        </div>
        <?php endif; ?>

        <!-- --- TEST FORM --- -->
        <form action="" method="POST" class="<?php echo $isSubmitted ? 'submitted' : ''; ?>">
            
            <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-200 pb-2 mb-6">Part I: Multiple Choice</h2>

            <!-- Question 1 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q1'); ?>">
                <p class="font-semibold text-lg mb-3">1. (From Q1) Which expression is equivalent to <code>100x<sup>2</sup> - 16</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q1" value="1" class="mr-2" <?php if (get_post_value('q1') == '1') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>(50x - 8)(50x + 8)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q1" value="2" class="mr-2" <?php if (get_post_value('q1') == '2') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>(50x - 8)(50x - 8)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q1" value="3" class="mr-2" <?php if (get_post_value('q1') == '3') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>(10x - 4)(10x + 4)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q1" value="4" class="mr-2" <?php if (get_post_value('q1') == '4') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>(10x - 4)(10x - 4)</code></label>
                </div>
                <?php show_correct_answer('q1'); ?>
            </div>

            <!-- Question 2 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q2'); ?>">
                <p class="font-semibold text-lg mb-3">2. (From Q2) Josie has $2.30 in dimes and quarters. She has two more dimes than quarters. Which equation can be used to determine <code>x</code>, the number of quarters she has?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q2" value="1" class="mr-2" <?php if (get_post_value('q2') == '1') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>0.35(2x + 2) = 2.30</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q2" value="2" class="mr-2" <?php if (get_post_value('q2') == '2') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>0.25(x + 2) + 0.10x = 2.30</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q2" value="3" class="mr-2" <?php if (get_post_value('q2') == '3') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>0.25x + 0.10(x + 2) = 2.30</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q2" value="4" class="mr-2" <?php if (get_post_value('q2') == '4') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>0.25x + 0.10(x - 2) = 2.30</code></label>
                </div>
                <?php show_correct_answer('q2'); ?>
            </div>

            <!-- Question 3 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q3'); ?>">
                <p class="font-semibold text-lg mb-3">3. (From Q3) If <code>g(x) = -2x<sup>2</sup> + 16</code>, then <code>g(-3)</code> equals:</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q3" value="1" class="mr-2" <?php if (get_post_value('q3') == '1') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>-20</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q3" value="2" class="mr-2" <?php if (get_post_value('q3') == '2') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>-2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q3" value="3" class="mr-2" <?php if (get_post_value('q3') == '3') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>34</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q3" value="4" class="mr-2" <?php if (get_post_value('q3') == '4') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>52</code></label>
                </div>
                <?php show_correct_answer('q3'); ?>
            </div>

            <!-- Question 4 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q4'); ?>">
                <p class="font-semibold text-lg mb-3">4. (From Q4) What are the zeros of <code>f(x) = x<sup>2</sup> - 8x - 20</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q4" value="1" class="mr-2" <?php if (get_post_value('q4') == '1') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>10 and 2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q4" value="2" class="mr-2" <?php if (get_post_value('q4') == '2') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>10 and -2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q4" value="3" class="mr-2" <?php if (get_post_value('q4') == '3') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>-10 and 2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q4" value="4" class="mr-2" <?php if (get_post_value('q4') == '4') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>-10 and -2</code></label>
                </div>
                <?php show_correct_answer('q4'); ?>
            </div>

            <!-- Question 9 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q9'); ?>">
                <p class="font-semibold text-lg mb-3">5. (From Q9) Which table (<code>f(x), g(x), h(x), j(x)</code>) represents a linear function?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q9" value="1" class="mr-2" <?php if (get_post_value('q9') == '1') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>f(x)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q9" value="2" class="mr-2" <?php if (get_post_value('q9') == '2') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>g(x)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q9" value="3" class="mr-2" <?php if (get_post_value('q9') == '3') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>h(x)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q9" value="4" class="mr-2" <?php if (get_post_value('q9') == '4') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>j(x)</code></label>
                </div>
                <?php show_correct_answer('q9'); ?>
            </div>

            <!-- Question 17 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q17'); ?>">
                <p class="font-semibold text-lg mb-3">6. (From Q17) The formula for the area of a trapezoid is <code>A = (1/2)h(b<sub>1</sub> + b<sub>2</sub>)</code>. The height, <code>h</code>, may be expressed as:</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q17" value="1" class="mr-2" <?php if (get_post_value('q17') == '1') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>2A / (b<sub>1</sub> + b<sub>2</sub>)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q17" value="2" class="mr-2" <?php if (get_post_value('q17') == '2') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>(1/2)A(b<sub>1</sub> + b<sub>2</sub>)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q17" value="3" class="mr-2" <?php if (get_post_value('q17') == '3') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>(b<sub>1</sub> + b<sub>2</sub>) / 2A</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q17" value="4" class="mr-2" <?php if (get_post_value('q17') == '4') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>(1/2)A - (b<sub>1</sub> + b<sub>2</sub>)</code></label>
                </div>
                <?php show_correct_answer('q17'); ?>
            </div>

            <!-- Question 21 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q21'); ?>">
                <p class="font-semibold text-lg mb-3">7. (From Q21) When <code>6x<sup>3</sup> - 2x + 8</code> is subtracted from <code>5x<sup>3</sup> + 3x - 4</code>, the result is:</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q21" value="1" class="mr-2" <?php if (get_post_value('q21') == '1') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>x<sup>3</sup> - 5x + 12</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q21" value="2" class="mr-2" <?php if (get_post_value('q21') == '2') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>x<sup>3</sup> + x + 4</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q21" value="3" class="mr-2" <?php if (get_post_value('q21') == '3') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>-x<sup>3</sup> + 5x - 12</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer"><input type="radio" name="q21" value="4" class="mr-2" <?php if (get_post_value('q21') == '4') echo 'checked'; ?> <?php if ($isSubmitted) echo 'disabled'; ?>><code>-x<sup>3</sup> + x + 4</code></label>
                </div>
                <?php show_correct_answer('q21'); ?>
            </div>

            <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-200 pb-2 mb-6 mt-12">Part II: Constructed Response</h2>

            <!-- Question 25 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q25'); ?>">
                <p class="font-semibold text-lg mb-3">8. (From Q25) Solve the equation <code>(1/6)(4x + 12) = 9</code> algebraically.</p>
                <label for="q25" class="block text-sm font-medium text-gray-700 mb-1">Your answer:</label>
                <input type="text" id="q25" name="q25" value="<?php echo get_post_value('q25'); ?>" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm" <?php if ($isSubmitted) echo 'disabled'; ?>>
                <?php show_correct_answer('q25'); ?>
            </div>

            <!-- Question 29 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q29'); ?>">
                <p class="font-semibold text-lg mb-3">9. (From Q29) Determine the 8th term of a geometric sequence whose first term is 5 and whose common ratio is 3.</p>
                <label for="q29" class="block text-sm font-medium text-gray-700 mb-1">Your answer:</label>
                <input type="text" id="q29" name="q29" value="<?php echo get_post_value('q29'); ?>" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm" <?php if ($isSubmitted) echo 'disabled'; ?>>
                <?php show_correct_answer('q29'); ?>
            </div>

            <!-- Question 31 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q31_vertex'); ?>">
                <p class="font-semibold text-lg mb-3">10. (From Q31) State the vertex of the function <code>f(x) = -(1/3)x<sup>2</sup> + 4</code>.</p>
                <label for="q31_vertex" class="block text-sm font-medium text-gray-700 mb-1">Vertex (e.g., (x,y)):</label>
                <input type="text" id="q31_vertex" name="q31_vertex" value="<?php echo get_post_value('q31_vertex'); ?>" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm" <?php if ($isSubmitted) echo 'disabled'; ?>>
                <?php show_correct_answer('q31_vertex'); ?>
            </div>

            <!-- Question 32 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q32_hours'); ?>">
                <p class="font-semibold text-lg mb-3">11. (From Q32) A canoe rental charges $18 for the first hour and $7.50 for each additional hour. If Vince has $78 to spend, what is the <strong>maximum total number of hours</strong> he can rent the canoe?</p>
                <label for="q32_hours" class="block text-sm font-medium text-gray-700 mb-1">Max total hours:</label>
                <input type="text" id="q32_hours" name="q32_hours" value="<?php echo get_post_value('q32_hours'); ?>" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm" <?php if ($isSubmitted) echo 'disabled'; ?>>
                <?php show_correct_answer('q32_hours'); ?>
            </div>

            <!-- Question 35 -->
            <div class="mb-8 p-4 rounded-md <?php echo get_result_class('q35_hotdogs'); ?>">
                <p class="font-semibold text-lg mb-3">12. (From Q35) Cameron sold a total of 25 items (hot dogs and sodas) for $45.00. A hot dog (<code>x</code>) costs $2.25 and a soda (<code>y</code>) costs $1.50. Determine algebraically the number of hot dogs Cameron sold.</p>
                <label for="q35_hotdogs" class="block text-sm font-medium text-gray-700 mb-1">Number of hot dogs (x):</label>
                <input type="text" id="q35_hotdogs" name="q35_hotdogs" value="<?php echo get_post_value('q35_hotdogs'); ?>" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm" <?php if ($isSubmitted) echo 'disabled'; ?>>
                <?php show_correct_answer('q35_hotdogs'); ?>
            </div>

            <!-- --- SUBMIT/RETAKE BUTTON --- -->
            <div class="mt-10">
                <?php if (!$isSubmitted): ?>
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 text-lg">Grade My Test</button>
                <?php else: ?>
                    <a href="" class="block w-full text-center bg-gray-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 text-lg">Take Again</a>
                <?php endif; ?>
            </div>

        </form>
    </div>
</body>
</html>

