<?php
  // --- PHP Page Variables ---
  $pageTitle = "Hesten's Learning";
  $pageDescription = "Hesten's Learning - Empowering students with learning disabilities through personalized learning experiences.";
  $pageKeywords = "learning disabilities, personalized education, online learning, math, ELA, science, social studies";
  $pageAuthor = "Hesten's Learning"; 
  
  $welcomeMessage = "Welcome!";
  $welcomeParagraph = "Thank you for visiting Hesten's Learning. If you are visiting from a recent Facebook post, and have questions? Please email me at <a href=\"mailto:admin@hestena62.com\" class=\"underline hover:text-accent\">admin@hestena62.com</a>";

  // --- Dynamic Content Array ---
  // Added 'icon' key for visual enhancement
  $learningLevels = [
    [
      'id' => 'pre-k',
      'title' => 'Pre-K',
      'description' => 'Counting objects, letter names, rhyming words, and more. Foundational skills for early learners.',
      'link' => '/Level/A.html',
      'icon' => 'fas fa-shapes'
    ],
    [
      'id' => 'kindergarten',
      'title' => 'Kindergarten',
      'description' => 'Basic math concepts, phonics, early reading, and more. Building blocks for a strong academic start.',
      'link' => '/Level/B.html',
      'icon' => 'fas fa-puzzle-piece'
    ],
    [
      'id' => 'grade-1',
      'title' => 'Grade 1',
      'description' => 'Adding, subtracting, sentence formation, and more. Key skills for developing independence.',
      'link' => '/Level/C.html',
      'icon' => 'fas fa-pencil-alt'
    ],
    [
      'id' => 'grade-2',
      'title' => 'Grade 2',
      'description' => 'Basic multiplication, reading fluency, and more. Expanding foundational knowledge and skills.',
      'link' => '/Level/B.html',
      'icon' => 'fas fa-book-open'
    ],
    [
      'id' => 'grade-3',
      'title' => 'Grade 3',
      'description' => 'Multiplication, division, reading comprehension, and more. Critical thinking development.',
      'link' => '/Level/D.html',
      'icon' => 'fas fa-calculator'
    ],
    [
      'id' => 'grade-4',
      'title' => 'Grade 4',
      'description' => 'Advanced multiplication, division, reading comprehension, and more. Deeper dives into subjects.',
      'link' => '/Level/D.html',
      'icon' => 'fas fa-divide'
    ],
    [
      'id' => 'grade-5',
      'title' => 'Grade 5',
      'description' => 'Decimals, essay writing, ecosystems, and more. Preparing for middle school academic rigor.',
      'link' => '/Level/E.html',
      'icon' => 'fas fa-atom'
    ],
    [
      'id' => 'grade-6',
      'title' => 'Grade 6',
      'description' => 'Fractions, essay writing, earth science, and more. Transitioning to more complex subjects.',
      'link' => '/Level/F.html',
      'icon' => 'fas fa-globe-americas'
    ],
    [
      'id' => 'grade-7',
      'title' => 'Grade 7',
      'description' => 'Proportional relationships, persuasive writing, life science, and more. Middle school mastery.',
      'link' => '/Level/G.html',
      'icon' => 'fas fa-dna'
    ],
    [
      'id' => 'grade-8',
      'title' => 'Grade 8',
      'description' => 'Linear equations, historical analysis, earth science, and more. Pre-high school readiness.',
      'link' => '/Level/H.html',
      'icon' => 'fas fa-history'
    ],
    [
      'id' => 'grade-9',
      'title' => 'Grade 9',
      'description' => 'Algebra, literature, physical science, and more. Introduction to high school academics.',
      'link' => '/Level/I.html',
      'icon' => 'fas fa-flask'
    ],
    [
      'id' => 'grade-10',
      'title' => 'Grade 10',
      'description' => 'Geometry, world history, biology, and more. Broadening academic horizons.',
      'link' => '/Level/J.html',
      'icon' => 'fas fa-project-diagram'
    ],
    [
      'id' => 'grade-11',
      'title' => 'Grade 11',
      'description' => 'Pre-calculus, advanced literature, chemistry, and more. Preparing for college-level studies.',
      'link' => '/Level/K.html',
      'icon' => 'fas fa-microscope'
    ],
    [
      'id' => 'grade-12',
      'title' => 'Grade 12',
      'description' => 'Advanced calculus, literature analysis, physics, and more. Final preparations for higher education.',
      'link' => '/Level/L.html',
      'icon' => 'fas fa-graduation-cap'
    ],
    [
      'id' => 'test-section',
      'title' => 'Test/Extra',
      'description' => 'Practice with quizzes, review extra materials, and challenge yourself to master new topics.',
      'link' => '/test',
      'icon' => 'fas fa-tasks'
    ],
  ];

  include 'src/header.php';
?>

  <!-- Hero section -->
  <header class="bg-gradient-to-r from-blue-600 to-purple-700 text-white py-20 px-4 text-center rounded-b-[3rem] shadow-xl relative overflow-hidden mb-12">
    <!-- Decorative background element -->
    <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none" aria-hidden="true">
        <i class="fas fa-shapes absolute top-10 left-10 text-6xl"></i>
        <i class="fas fa-calculator absolute bottom-20 right-20 text-8xl"></i>
        <i class="fas fa-book absolute top-20 right-1/3 text-5xl"></i>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 animate-fade-in-up tracking-tight">
        Welcome to Hesten's Learning
        </h1>
        <p class="text-xl md:text-2xl mb-10 opacity-90 animate-fade-in-up delay-100 max-w-2xl mx-auto leading-relaxed">
        Empowering every student with personalized, accessible, and engaging learning experiences.
        </p>
        <div class="flex justify-center gap-4 animate-fade-in-up delay-200">
            <a href="#main-content"
            class="bg-white text-blue-600 font-bold py-3 px-8 rounded-full shadow-lg transition-transform duration-300 hover:scale-105 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-blue-300"
            aria-label="Skip to learning levels">
            Start Learning
            </a>
            <a href="about.php"
            class="bg-transparent border-2 border-white text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 hover:bg-white hover:text-blue-600 focus:outline-none focus:ring-4 focus:ring-purple-300"
            aria-label="Learn more about Hesten's Learning">
            About Us
            </a>
        </div>
    </div>
  </header>

  <!-- Features / Why Choose Us -->
  <section class="container mx-auto px-4 mb-16" aria-labelledby="features-heading">
    <h2 id="features-heading" class="sr-only">Why Choose Hesten's Learning</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <article class="p-6 rounded-2xl bg-content-bg shadow-md">
            <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl" aria-hidden="true">
                <i class="fas fa-universal-access"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-2">Accessibility First</h3>
            <p class="text-text-secondary">Designed with dyslexia-friendly fonts, reading masks, and high-contrast modes.</p>
        </article>
        <article class="p-6 rounded-2xl bg-content-bg shadow-md">
            <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl" aria-hidden="true">
                <i class="fas fa-road"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-2">Personalized Path</h3>
            <p class="text-text-secondary">Learn at your own pace with curriculum tailored to your specific grade level needs.</p>
        </article>
        <article class="p-6 rounded-2xl bg-content-bg shadow-md">
            <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl" aria-hidden="true">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-2">Comprehensive</h3>
            <p class="text-text-secondary">Covering Math, ELA, Science, and Social Studies from Pre-K through Grade 12.</p>
        </article>
    </div>
  </section>

  <!-- Main content - Learning Levels -->
  <main class="container mx-auto my-10 px-4" id="main-content" tabindex="-1">
    <div class="flex items-center justify-between mb-8">
        <h2 id="learning-levels-heading" class="text-3xl font-bold text-text-default border-l-4 border-primary pl-4">
            Select Your Level
        </h2>
    </div>
    
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" aria-labelledby="learning-levels-heading">
      
      <?php foreach ($learningLevels as $level): ?>
        <article class="h-full">
          <!-- Card Container -->
          <div class="bg-content-bg h-full rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-primary p-6 flex flex-col relative group">
            
            <!-- Icon Bubble (Decorative) -->
            <div class="absolute -top-6 right-6 w-12 h-12 bg-white dark:bg-gray-700 rounded-full shadow-md flex items-center justify-center text-primary text-xl border-2 border-primary group-hover:scale-110 transition-transform" aria-hidden="true">
                <i class="<?php echo htmlspecialchars($level['icon']); ?>"></i>
            </div>

            <!-- Title -->
            <h3 class="text-2xl font-bold text-text-default mb-3 mt-2" id="<?php echo htmlspecialchars($level['id']); ?>">
              <?php echo htmlspecialchars($level['title']); ?>
            </h3>
            
            <!-- Description -->
            <p class="text-text-secondary mb-6 flex-grow leading-relaxed">
              <?php echo htmlspecialchars($level['description']); ?>
            </p>
            
            <!-- Button -->
            <a href="<?php echo htmlspecialchars($level['link']); ?>"
              class="w-full inline-flex justify-center items-center bg-primary text-white py-3 px-4 rounded-lg font-semibold transition-colors duration-300 hover:bg-secondary focus:ring-4 focus:ring-accent focus:outline-none group-hover:shadow-md"
              aria-labelledby="<?php echo htmlspecialchars($level['id']); ?>">
              <span>Explore Skills</span>
              <i class="fas fa-arrow-right ml-2 text-sm transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
            </a>

          </div>
        </article>
      <?php endforeach; ?>

    </section>
  </main>

<?php
  // Include the reusable footer
  include 'src/footer.php';
?>