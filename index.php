<?php
  // --- PHP Page Variables ---
  $pageTitle = "Hesten's Learning";
  $pageDescription = "Hesten's Learning - Empowering students with learning disabilities through personalized learning experiences.";
  $pageKeywords = "learning disabilities, personalized education, online learning, math, ELA, science, social studies";
  $pageAuthor = "Hesten's Learning";
  
  $welcomeMessage = "Welcome!";
  $welcomeParagraph = "Thank you for visiting Hesten's Learning. If you are visiting from a resint Facebook post, and have question? Please email me at <a href=\"mailto:admin@hestena62.com\">admin@hestena62.com</a>";

  // --- Dynamic Content Array ---
  // Store all learning levels in an array to be looped over.
  $learningLevels = [
    [
      'id' => 'pre-k',
      'title' => 'Pre-K',
      'description' => 'Counting objects, letter names, rhyming words, and more. Foundational skills for early learners.',
      'link' => '/Level/A.html'
    ],
    [
      'id' => 'kindergarten',
      'title' => 'Kindergarten',
      'description' => 'Basic math concepts, phonics, early reading, and more. Building blocks for a strong academic start.',
      'link' => '/Level/B.html'
    ],
    [
      'id' => 'grade-1',
      'title' => 'Grade 1',
      'description' => 'Adding, subtracting, sentence formation, and more. Key skills for developing independence in learning.',
      'link' => '/Level/C.html'
    ],
    [
      'id' => 'grade-2',
      'title' => 'Grade 2',
      'description' => 'Basic multiplication, reading fluency, and more. Expanding foundational knowledge and skills.',
      'link' => '/Level/B.html' // Note: This was B.html in original code
    ],
    [
      'id' => 'grade-3',
      'title' => 'Grade 3',
      'description' => 'Multiplication, division, reading comprehension, and more. Critical thinking and problem-solving development.',
      'link' => '/Level/D.html'
    ],
    [
      'id' => 'grade-4',
      'title' => 'Grade 4',
      'description' => 'Advanced multiplication, division, reading comprehension, and more. Deeper dives into academic subjects.',
      'link' => '/Level/D.html'
    ],
    [
      'id' => 'grade-5',
      'title' => 'Grade 5',
      'description' => 'Decimals, essay writing, ecosystems, and more. Preparing for middle school academic rigor.',
      'link' => '/Level/E.html'
    ],
    [
      'id' => 'grade-6',
      'title' => 'Grade 6',
      'description' => 'Fractions, essay writing, earth science, and more. Transitioning to more complex subjects.',
      'link' => '/Level/F.html'
    ],
    [
      'id' => 'grade-7',
      'title' => 'Grade 7',
      'description' => 'Proportional relationships, persuasive writing, life science, and more. Middle school curriculum mastery.',
      'link' => '/Level/G.html'
    ],
    [
      'id' => 'grade-8',
      'title' => 'Grade 8',
      'description' => 'Linear equations, historical analysis, earth science, and more. Pre-high school readiness.',
      'link' => '/Level/H.html'
    ],
    [
      'id' => 'grade-9',
      'title' => 'Grade 9',
      'description' => 'Algebra, literature, physical science, and more. Introduction to high school academics.',
      'link' => '/Level/I.html'
    ],
    [
      'id' => 'grade-10',
      'title' => 'Grade 10',
      'description' => 'Geometry, world history, biology, and more. Broadening academic horizons.',
      'link' => '/Level/J.html'
    ],
    [
      'id' => 'grade-11',
      'title' => 'Grade 11',
      'description' => 'Pre-calculus, advanced literature, chemistry, and more. Preparing for college-level studies.',
      'link' => '/Level/K.html'
    ],
    [
      'id' => 'grade-12',
      'title' => 'Grade 12',
      'description' => 'Advanced calculus, literature analysis, physics, and more. Final preparations for higher education.',
      'link' => '/Level/L.html'
    ],
    [
      'id' => 'test-section',
      'title' => 'Test/Extra',
      'description' => 'Practice with quizzes, review extra materials, and challenge yourself to master new topics across all subjects.',
      'link' => '/test'
    ],
  ];

  // Include the reusable header
  include 'src/header.php';
?>

  <!-- Hero section -->
  <!-- This content is specific to index.php -->
  <header
    class="bg-gradient-to-r from-primary to-secondary text-white py-16 px-4 text-center rounded-b-lg shadow-xl transition-colors duration-300">
    <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-up">
      Welcome to Our Learning Platform
    </h1>
    <p class="text-lg md:text-xl mb-8 animate-fade-in-up delay-100">
      Explore skills and improve at your own pace with personalized learning
      experiences.
    </p>
    <a href="about.php"
      class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105 animate-fade-in-up delay-200 focus:outline-none focus:ring-2 focus:ring-white"
      aria-label="Get Started with Hesten's Learning">Get Started</a>
  </header>

  <!-- Main content - Learning Levels -->
  <!-- This content is now dynamically generated by PHP -->
  <main class="container mx-auto py-12 px-4">
    <h2 id="learning-levels-heading" class="sr-only">Learning Levels</h2>
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" aria-labelledby="learning-levels-heading">
      
      <?php foreach ($learningLevels as $level): ?>
        <article
          class="bg-content-bg rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl flex flex-col justify-between">
          <h2 class="text-2xl font-bold text-text-default mb-3" id="<?php echo htmlspecialchars($level['id']); ?>">
            <?php echo htmlspecialchars($level['title']); ?>
          </h2>
          <p class="text-text-secondary mb-4 flex-grow">
            <?php echo htmlspecialchars($level['description']); ?>
          </p>
          <a href="<?php echo htmlspecialchars($level['link']); ?>"
            class="bg-primary text-white hover:bg-secondary py-2 px-4 rounded-lg font-medium text-center transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
            aria-label="Explore <?php echo htmlspecialchars($level['title']); ?> Skills">Explore Skills</a>
        </article>
      <?php endforeach; ?>

    </section>
  </main>

<?php
  // Include the reusable footer
  include 'src/footer.php';
?>

