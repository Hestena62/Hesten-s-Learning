<?php
  // --- MOCK DATABASE ---
  // This MUST match the database in take-test.php to grade correctly.
  // In a real app, you'd include this from a single file.
  $allTestsData = [
    1 => [
      'title' => 'Grade 3: Math Fundamentals',
      'icon' => 'fas fa-calculator',
      'questions' => [
        'q1' => [
          'text' => 'What is 8 x 7?',
          'options' => ['A' => 54, 'B' => 56, 'C' => 64, 'D' => 62],
          'correct' => 'B'
        ],
        'q2' => [
          'text' => 'What is 63 ÷ 9?',
          'options' => ['A' => 7, 'B' => 8, 'C' => 6, 'D' => 9],
          'correct' => 'A'
        ],
        'q3' => [
          'text' => 'Which fraction is equivalent to 1/2?',
          'options' => ['A' => '2/3', 'B' => '3/4', 'C' => '4/8', 'D' => '2/5'],
          'correct' => 'C'
        ],
      ]
    ],
    2 => [
      'title' => 'Grade 5: Reading Comprehension',
      'icon' => 'fas fa-book-open',
      'questions' => [
        'q1' => [
          'text' => 'Read the passage: "The old house stood on a hill, its windows dark and empty. The villagers whispered stories of strange noises and flickering lights." What is the mood of this passage?',
          'options' => ['A' => 'Joyful', 'B' => 'Peaceful', 'C' => 'Mysterious and spooky', 'D' => 'Exciting'],
          'correct' => 'C'
        ],
        'q2' => [
          'text' => 'What does the word "villagers" mean?',
          'options' => ['A' => 'People who live in a city', 'B' => 'People who own large houses', 'C' => 'People who live in a village', 'D' => 'People who tell stories'],
          'correct' => 'C'
        ],
      ]
    ],
    3 => [
      'title' => 'Grade 8: U.S. History',
      'icon' => 'fas fa-landmark',
      'questions' => [
        'q1' => [
          'text' => 'In what year was the Declaration of Independence signed?',
          'options' => ['A' => 1776, 'B' => 1789, 'C' => 1812, 'D' => 1492],
          'correct' => 'A'
        ],
      ]
    ],
    4 => [
      'title' => 'Algebra 1: Final Exam Practice',
      'icon' => 'fas fa-equals',
      'questions' => [
        'q1' => [
          'text' => 'Solve for x: 2x + 5 = 17',
          'options' => ['A' => 'x = 6', 'B' => 'x = 8.5', 'C' => 'x = 11', 'D' => 'x = 12'],
          'correct' => 'A'
        ],
      ]
    ],
    5 => [
      'title' => 'Biology: Cell Structures',
      'icon' => 'fas fa-dna',
      'questions' => [
        'q1' => [
          'text' => 'What is the "powerhouse" of the cell?',
          'options' => ['A' => 'Nucleus', 'B' => 'Ribosome', 'C' => 'Mitochondria', 'D' => 'Cell Membrane'],
          'correct' => 'C'
        ],
      ]
    ],
    6 => [
      'title' => 'Vocabulary Builder',
      'icon' => 'fas fa-spell-check',
      'questions' => [
        'q1' => [
          'text' => 'What is the definition of "ephemeral"?',
          'options' => ['A' => 'Long-lasting', 'B' => 'Short-lived or fleeting', 'C' => 'Extremely beautiful', 'D' => 'Very important'],
          'correct' => 'B'
        ],
      ]
    ],
  ];

  // --- Initialize Grading Variables ---
  $testId = null;
  $currentTest = null;
  $userAnswers = null;
  $errorMessage = '';
  $score = 0;
  $totalQuestions = 0;
  $resultsDetails = [];

  // --- Process the Submitted Form ---
  // Check if this is a POST request (i.e., form was submitted)
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['test_id']) && is_numeric($_POST['test_id'])) {
      $testId = (int)$_POST['test_id'];

      // Find the test in our "database"
      if (array_key_exists($testId, $allTestsData)) {
        $currentTest = $allTestsData[$testId];
        $questions = $currentTest['questions'];
        $totalQuestions = count($questions);
        $userAnswers = isset($_POST['answers']) ? $_POST['answers'] : [];

        // --- Loop through questions and grade ---
        foreach ($questions as $q_id => $questionData) {
          $isCorrect = false;
          $userAnswerKey = isset($userAnswers[$q_id]) ? $userAnswers[$q_id] : null;
          $correctAnswerKey = $questionData['correct'];
          
          if ($userAnswerKey === $correctAnswerKey) {
            $score++;
            $isCorrect = true;
          }

          // Store detailed results for display
          $resultsDetails[] = [
            'questionText' => $questionData['text'],
            'userAnswer' => $userAnswerKey ? $questionData['options'][$userAnswerKey] : 'No answer',
            'userAnswerKey' => $userAnswerKey,
            'correctAnswer' => $questionData['options'][$correctAnswerKey],
            'correctAnswerKey' => $correctAnswerKey,
            'isCorrect' => $isCorrect
          ];
        }

      } else {
        $errorMessage = 'The test you submitted (ID: ' . htmlspecialchars($testId) . ') could not be found.';
      }
    } else {
      $errorMessage = 'No valid test ID was submitted.';
    }
  } else {
    // This page was accessed directly, not via form submission
    $errorMessage = 'No test data received. Please select a test and submit your answers.';
  }

  // --- Calculate Final Score ---
  $percentage = ($totalQuestions > 0) ? round(($score / $totalQuestions) * 100) : 0;
  
  // --- PHP Page Variables ---
  $pageTitle = $currentTest ? 'Results: ' . $currentTest['title'] : 'Test Results';
  $pageDescription = 'See your test results for ' . ($currentTest ? $currentTest['title'] : 'your test');
  $pageKeywords = "test, quiz, assessment, results, score";
  $pageAuthor = "Hesten's Learning";
  
  // Disable the welcome popup on this page
  $welcomeMessage = '';
  $welcomeParagraph = '';

  // Include the reusable header
  include 'src/header.php';
?>

  <!-- Hero section for the Results Page -->
  <header
    class="bg-gradient-to-r from-green-500 to-teal-500 text-white py-16 px-4 text-center rounded-b-lg shadow-xl transition-colors duration-300">
    <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-up">
      Test Results
    </h1>
    <?php if ($currentTest): ?>
      <p class="text-2xl md:text-3xl font-semibold mb-4 animate-fade-in-up delay-100">
        <?php echo htmlspecialchars($currentTest['title']); ?>
      </p>
      <div
        class="inline-block bg-white text-gray-800 rounded-full py-4 px-8 shadow-xl animate-fade-in-up delay-200">
        <span class="text-xl text-text-secondary">Your Score</span>
        <h2 class="text-6xl font-bold text-green-600"><?php echo $percentage; ?>%</h2>
        <span class="text-xl text-text-default">
          (<?php echo $score; ?> out of <?php echo $totalQuestions; ?> correct)
        </span>
      </div>
    <?php endif; ?>
  </header>

  <!-- Main content - Results Breakdown -->
  <main class="container mx-auto py-12 px-4">
    
    <?php if (!empty($resultsDetails)): ?>
      <div class="max-w-3xl mx-auto bg-content-bg p-8 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-text-default text-center mb-8">Detailed Breakdown</h2>

        <div class="space-y-6">
          <?php $questionNumber = 1; foreach ($resultsDetails as $result): ?>
            <div
              class="border-l-4 <?php echo $result['isCorrect'] ? 'border-green-500' : 'border-red-500'; ?> bg-base-bg p-6 rounded-r-lg">
              
              <h3 class="text-lg font-semibold text-text-default mb-3">
                Question <?php echo $questionNumber; ?>: <?php echo htmlspecialchars($result['questionText']); ?>
              </h3>

              <?php if ($result['isCorrect']): ?>
                <div class="flex items-center text-green-600">
                  <i class="fas fa-check-circle mr-2"></i>
                  <p>
                    <span class="font-bold">Your answer (<?php echo htmlspecialchars($result['userAnswerKey']); ?>):</span>
                    <?php echo htmlspecialchars($result['userAnswer']); ?>
                  </p>
                </div>
              <?php else: ?>
                <div class="flex items-center text-red-600 mb-2">
                  <i class="fas fa-times-circle mr-2"></i>
                  <p>
                    <span class="font-bold">Your answer (<?php echo htmlspecialchars($result['userAnswerKey'] ?? 'N/A'); ?>):</span>
                    <?php echo htmlspecialchars($result['userAnswer']); ?>
                  </p>
                </div>
                <div class="flex items-center text-green-600">
                  <i class="fas fa-check-circle mr-2"></i>
                  <p>
                    <span class="font-bold">Correct answer (<?php echo htmlspecialchars($result['correctAnswerKey']); ?>):</span>
                    <?php echo htmlspecialchars($result['correctAnswer']); ?>
                  </p>
                </div>
              <?php endif; ?>

            </div>
          <?php $questionNumber++; endforeach; ?>
        </div>

        <div class="text-center mt-10">
          <a href="tests.php"
            class="bg-primary text-white hover:bg-secondary py-3 px-12 rounded-lg font-semibold text-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transform hover:scale-105">
            Take Another Test
          </a>
        </div>

      </div>
      
    <?php else: ?>
      <!-- Error message if no results could be processed -->
      <div class="text-center bg-content-bg p-8 rounded-xl shadow-lg max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-red-500 mb-4">Error</h2>
        <p class="text-text-default mb-6"><?php echo $errorMessage; ?></p>
        <a href="tests.php"
          class="bg-primary text-white hover:bg-secondary py-2 px-4 rounded-lg font-medium text-center transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
          Back to Test Selection
        </a>
      </div>
    <?php endif; ?>

  </main>

<?php
  // Include the reusable footer
  include 'src/footer.php';
?>
