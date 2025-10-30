<?php
  // --- MOCK DATABASE ---
  // In a real application, this data would come from a database.
  // We define all tests and their questions here.
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

  // --- Get Test ID and Find Test Data ---
  $testId = null;
  $currentTest = null;
  $errorMessage = '';

  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $testId = (int)$_GET['id'];
    if (array_key_exists($testId, $allTestsData)) {
      $currentTest = $allTestsData[$testId];
    } else {
      $errorMessage = 'The test you requested (ID: ' . htmlspecialchars($testId) . ') could not be found.';
    }
  } else {
    $errorMessage = 'No valid test ID was provided.';
  }

  // --- PHP Page Variables ---
  $pageTitle = $currentTest ? $currentTest['title'] : 'Test Not Found';
  $pageDescription = $currentTest ? 'Take the ' . $currentTest['title'] . ' test.' : 'Test not found.';
  $pageKeywords = "test, quiz, assessment, " . ($currentTest ? $currentTest['title'] : '');
  $pageAuthor = "Hesten's Learning";
  
  // Disable the welcome popup on this page
  $welcomeMessage = '';
  $welcomeParagraph = '';

  // Include the reusable header
  include 'src/header.php';
?>

  <!-- Hero section for the specific Test Page -->
  <header
    class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-16 px-4 text-center rounded-b-lg shadow-xl transition-colors duration-300">
    <?php if ($currentTest): ?>
      <i class="<?php echo htmlspecialchars($currentTest['icon']); ?> fa-3x mb-4"></i>
      <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-up">
        <?php echo htmlspecialchars($currentTest['title']); ?>
      </h1>
      <p class="text-lg md:text-xl mb-8 animate-fade-in-up delay-100">
        Please answer all questions to the best of your ability.
      </p>
    <?php else: ?>
      <i class="fas fa-exclamation-triangle fa-3x mb-4"></i>
      <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-up">
        Test Not Found
      </h1>
    <?php endif; ?>
  </header>

  <!-- Main content - Test Form -->
  <main class="container mx-auto py-12 px-4">
    
    <?php if ($currentTest): ?>
      <!-- Test form submits to grade-test.php -->
      <form action="grade-test.php" method="POST" class="max-w-3xl mx-auto bg-content-bg p-8 rounded-xl shadow-lg">
        
        <!-- Hidden input to tell the grading script which test this is -->
        <input type="hidden" name="test_id" value="<?php echo $testId; ?>">
        
        <?php 
          $questionNumber = 1;
          foreach ($currentTest['questions'] as $q_id => $question): 
        ?>
          <fieldset class="mb-8">
            <legend class="text-2xl font-bold text-text-default mb-4">
              Question <?php echo $questionNumber; ?>: <?php echo htmlspecialchars($question['text']); ?>
            </legend>
            <div class="space-y-4">
              <?php foreach ($question['options'] as $optionKey => $optionText): ?>
                <label
                  class="block w-full p-4 bg-base-bg border border-transparent rounded-lg hover:bg-accent hover:text-white transition-colors duration-200 cursor-pointer has-[:checked]:bg-primary has-[:checked]:text-white has-[:checked]:border-accent">
                  <input type"radio" name="answers[<?php echo $q_id; ?>]" value="<?php echo $optionKey; ?>"
                    class="sr-only" required>
                  <span class="font-medium"><?php echo htmlspecialchars($optionKey); ?>:</span>
                  <?php echo htmlspecialchars($optionText); ?>
                </label>
              <?php endforeach; ?>
            </div>
          </fieldset>
        <?php 
          $questionNumber++;
          endforeach; 
        ?>

        <div class="text-center mt-10">
          <button type="submit"
            class="bg-green-600 text-white hover:bg-green-700 py-3 px-12 rounded-lg font-semibold text-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transform hover:scale-105">
            Submit Your Answers
          </button>
        </div>

      </form>
      
    <?php else: ?>
      <!-- Error message if test wasn't found -->
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
