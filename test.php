<?php
  // --- PHP Page Variables ---
  $pageTitle = "Testing Center - Hesten's Learning";
  $pageDescription = "Take practice tests and quizzes to assess your skills in math, ELA, science, and more.";
  $pageKeywords = "tests, quizzes, assessment, personalized learning, math test, ela test";
  $pageAuthor = "Hesten's Learning";
  
  // Set welcome message variables to empty or different values for this page
  // We can control the popup on a per-page basis
  $welcomeMessage = "Welcome to the Testing Center";
  $welcomeParagraph = "Please select a test from the options below to get started. Good luck!";

  // --- Dynamic Content Array for Tests ---
  // *** FIX: Removed leading slash '/' from 'link' paths to make them relative. ***
  // This ensures they work even if the project is in a subdirectory.
  $availableTests = [
    [
      'id' => 1,
      'title' => 'Grade 3: Math Fundamentals',
      'description' => 'A comprehensive test covering multiplication, division, and fractions for Grade 3.',
      'link' => 'take-test.php?id=1', // <-- Removed slash
      'icon' => 'fas fa-calculator' // Font Awesome icon class
    ],
    [
      'id' => 2,
      'title' => 'Grade 5: Reading Comprehension',
      'description' => 'Assess your reading skills with passages and questions designed for Grade 5 students.',
      'link' => 'take-test.php?id=2', // <-- Removed slash
      'icon' => 'fas fa-book-open'
    ],
    [
      'id' => 3,
      'title' => 'Grade 8: U.S. History',
      'description' => 'Test your knowledge of key events and figures in early American history.',
      'link' => 'take-test.php?id=3', // <-- Removed slash
      'icon' => 'fas fa-landmark'
    ],
    [
      'id' => 4,
      'title' => 'Algebra 1: Final Exam Practice',
      'description' => 'A full-length practice exam covering linear equations, functions, and polynomials.',
      'link' => 'take-test.php?id=4', // <-- Removed slash
      'icon' => 'fas fa-equals'
    ],
    [
      'id' => 5,
      'title' => 'Biology: Cell Structures',
      'description' => 'A focused quiz on organelles, mitosis, and cellular respiration.',
      'link' => 'take-test.php?id=5', // <-- Removed slash
      'icon' => 'fas fa-dna'
    ],
    [
      'id' => 6,
      'title' => 'Vocabulary Builder',
      'description' => 'Expand your vocabulary with this challenging quiz on advanced words and their meanings.',
      'link' => 'take-test.php?id=6', // <-- Removed slash
      'icon' => 'fas fa-spell-check'
    ],
  ];

  // Include the reusable header
  include 'src/header.php';
?>

  <!-- Hero section for the Testing Page -->
  <header
    class="bg-gradient-to-r from-green-500 to-teal-500 text-white py-16 px-4 text-center rounded-b-lg shadow-xl transition-colors duration-300">
    <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-up">
      Test Your Knowledge
    </h1>
    <p class="text-lg md:text-xl mb-8 animate-fade-in-up delay-100">
      Select an assessment below to track your progress and identify areas for improvement.
    </p>
  </header>

  <!-- Main content - Test Selection -->
  <main class="container mx-auto py-12 px-4">
    <h2 id="test-selection-heading" class="text-3xl font-bold text-center text-text-default mb-10">Available Tests & Quizzes</h2>
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" aria-labelledby="test-selection-heading">
      
      <?php foreach ($availableTests as $test): ?>
        <article
          class="bg-content-bg rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl flex flex-col justify-between">
          <div>
            <div class="flex items-center text-primary mb-3">
              <i class="<?php echo htmlspecialchars($test['icon']); ?> fa-2x mr-3 w-8 text-center"></i>
              <h3 class="text-2xl font-bold text-text-default">
                <?php echo htmlspecialchars($test['title']); ?>
              </h3>
            </div>
            <p class="text-text-secondary mb-4 flex-grow">
              <?php echo htmlspecialchars($test['description']); ?>
            </p>
          </div>
          <a href="<?php echo htmlspecialchars($test['link']); ?>"
            class="bg-green-600 text-white hover:bg-green-700 py-2 px-4 rounded-lg font-medium text-center transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Start Test
          </a>
        </article>
      <?php endforeach; ?>

    </section>
  </main>

<?php
  // Include the reusable footer
  include 'src/footer.php';
?>
