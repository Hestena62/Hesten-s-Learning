<?php
  // --- PHP Page Variables ---
  $pageTitle = "Assessments";
  $pageDescription = "Select a subject to start your assessment. Choose from Math, ELA, Science, or Social Studies.";
  $pageKeywords = "assessments, tests, quiz, math, ela, science, social studies";
  $pageAuthor = "Hesten's Learning";

  // Welcome message variables (can be customized)
  $welcomeMessage = "Assessments";
  $welcomeParagraph = "Please select a subject below to begin your test.";

  // Include the reusable header
  // Assuming header.php is in 'src/' directory as per index.php
  // If it's in the same directory, change to: include 'header.php';
  include 'src/header.php';

  // --- List of Available Tests ---
  $assessments = [
    [
      'subject' => 'math',
      'title' => 'Math',
      'description' => 'Test your skills in algebra, geometry, and basic arithmetic.',
      'icon' => 'fas fa-calculator'
    ],
    [
      'subject' => 'ela',
      'title' => 'ELA (Language Arts)',
      'description' => 'Test your knowledge of grammar, vocabulary, and reading comprehension.',
      'icon' => 'fas fa-book-open'
    ],
    [
      'subject' => 'science',
      'title' => 'Science',
      'description' => 'Explore concepts in biology, chemistry, and physics.',
      'icon' => 'fas fa-flask'
    ],
    [
      'subject' => 'social_studies',
      'title' => 'Social Studies',
      'description' => 'Show what you know about history, geography, and civics.',
      'icon' => 'fas fa-globe-americas'
    ]
  ];
?>

  <!-- Main content - Test Selection -->
  <main class="container mx-auto py-12 px-4">
    <h1 class="text-4xl font-bold text-center text-text-default mb-10">
      Select Your Assessment
    </h1>
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8" aria-label="Available assessments">
      
      <?php foreach ($assessments as $test): ?>
        <article
          class="bg-content-bg rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl flex flex-col justify-between text-center">
          
          <div>
            <i class="<?php echo htmlspecialchars($test['icon']); ?> text-5xl text-primary mb-4"></i>
            <h2 class="text-2xl font-bold text-text-default mb-3" id="<?php echo htmlspecialchars($test['subject']); ?>-test">
              <?php echo htmlspecialchars($test['title']); ?>
            </h2>
            <p class="text-text-secondary mb-6 flex-grow">
              <?php echo htmlspecialchars($test['description']); ?>
            </p>
          </div>

          <a href="take_test.php?subject=<?php echo htmlspecialchars($test['subject']); ?>"
            class="bg-primary text-white hover:bg-secondary py-3 px-6 rounded-lg font-semibold text-center transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
            aria-label="Start <?php echo htmlspecialchars($test['title']); ?> Test">
            Start Test
          </a>
        </article>
      <?php endforeach; ?>

    </section>
  </main>

<?php
  // Include the reusable footer
  // Assuming footer.php is in 'src/' directory as per index.php
  // If it's in the same directory, change to: include 'footer.php';
  include 'src/footer.php';
?>