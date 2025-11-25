<?php
  // --- PHP Page Variables ---
  $pageTitle = "Hesten's Learning";
  $pageDescription = "Hesten's Learning - Empowering students with learning disabilities through personalized learning experiences.";
  $pageKeywords = "learning disabilities, personalized education, online learning, math, ELA, science, social studies";
  $pageAuthor = "Hesten's Learning"; 
  
  $welcomeMessage = "Welcome to Hesten's Learning!";
  $welcomeParagraph = "Thank you for visiting. We are dedicated to making education accessible for everyone. If you have questions or feedback, please email <a href=\"mailto:admin@hestena62.com\" class=\"underline text-primary hover:text-secondary\">admin@hestena62.com</a>.";

  // --- Dynamic Content Array ---
  $learningLevels = [
    ['id' => 'pre-k', 'title' => 'Pre-K', 'description' => 'Counting objects, letter names, rhyming words, and more. Foundational skills.', 'link' => '/Level/A.html', 'icon' => 'fas fa-shapes'],
    ['id' => 'kindergarten', 'title' => 'Kindergarten', 'description' => 'Basic math concepts, phonics, early reading. Building blocks for a strong start.', 'link' => '/Level/B.html', 'icon' => 'fas fa-puzzle-piece'],
    ['id' => 'grade-1', 'title' => 'Grade 1', 'description' => 'Adding, subtracting, sentence formation. Developing independence.', 'link' => '/Level/C.html', 'icon' => 'fas fa-pencil-alt'],
    ['id' => 'grade-2', 'title' => 'Grade 2', 'description' => 'Basic multiplication, reading fluency. Expanding foundational knowledge.', 'link' => '/Level/B.html', 'icon' => 'fas fa-book-open'],
    ['id' => 'grade-3', 'title' => 'Grade 3', 'description' => 'Multiplication, division, reading comprehension. Critical thinking.', 'link' => '/Level/D.html', 'icon' => 'fas fa-calculator'],
    ['id' => 'grade-4', 'title' => 'Grade 4', 'description' => 'Advanced multiplication, division, reading comprehension. Deeper dives.', 'link' => '/Level/D.html', 'icon' => 'fas fa-divide'],
    ['id' => 'grade-5', 'title' => 'Grade 5', 'description' => 'Decimals, essay writing, ecosystems. Preparing for middle school.', 'link' => '/Level/E.html', 'icon' => 'fas fa-atom'],
    ['id' => 'grade-6', 'title' => 'Grade 6', 'description' => 'Fractions, essay writing, earth science. Transitioning to complex subjects.', 'link' => '/Level/F.html', 'icon' => 'fas fa-globe-americas'],
    ['id' => 'grade-7', 'title' => 'Grade 7', 'description' => 'Proportional relationships, persuasive writing, life science. Middle school mastery.', 'link' => '/Level/G.html', 'icon' => 'fas fa-dna'],
    ['id' => 'grade-8', 'title' => 'Grade 8', 'description' => 'Linear equations, historical analysis, earth science. Pre-high school readiness.', 'link' => '/Level/H.html', 'icon' => 'fas fa-history'],
    ['id' => 'grade-9', 'title' => 'Grade 9', 'description' => 'Algebra, literature, physical science. Introduction to high school.', 'link' => '/Level/I.html', 'icon' => 'fas fa-flask'],
    ['id' => 'grade-10', 'title' => 'Grade 10', 'description' => 'Geometry, world history, biology. Broadening academic horizons.', 'link' => '/Level/J.html', 'icon' => 'fas fa-project-diagram'],
    ['id' => 'grade-11', 'title' => 'Grade 11', 'description' => 'Pre-calculus, advanced literature, chemistry. College prep.', 'link' => '/Level/K.html', 'icon' => 'fas fa-microscope'],
    ['id' => 'grade-12', 'title' => 'Grade 12', 'description' => 'Advanced calculus, literature analysis, physics. Final preparations.', 'link' => '/Level/L.html', 'icon' => 'fas fa-graduation-cap'],
    ['id' => 'test-section', 'title' => 'Test/Extra', 'description' => 'Practice with quizzes, review extra materials, and challenge yourself.', 'link' => '/test', 'icon' => 'fas fa-star']
  ];

  include 'src/header.php';
?>

  <!-- Hero Section -->
  <header class="bg-gradient-to-r from-footer-bg-from to-footer-bg-to text-white py-24 px-4 text-center rounded-b-[4rem] shadow-2xl relative overflow-hidden mb-16">
    <!-- Decorative Background Icons -->
    <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none select-none">
        <i class="fas fa-shapes absolute top-10 left-10 text-7xl animate-pulse"></i>
        <i class="fas fa-calculator absolute bottom-20 right-20 text-9xl"></i>
        <i class="fas fa-book absolute top-20 right-1/3 text-6xl"></i>
        <i class="fas fa-atom absolute bottom-10 left-1/4 text-6xl"></i>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 animate-fade-in-up tracking-tight leading-tight">
          Learning Without Limits
        </h1>
        <p class="text-xl md:text-2xl mb-10 text-blue-100 animate-fade-in-up delay-100 max-w-2xl mx-auto leading-relaxed">
          Empowering every student with personalized, accessible, and engaging educational experiences.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up delay-200">
            <a href="#main-content"
              class="bg-white text-blue-700 font-bold py-4 px-10 rounded-full shadow-lg transition-all duration-300 hover:scale-105 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-white/50 text-lg">
              Start Learning
            </a>
            <a href="about.php"
              class="bg-transparent border-2 border-white/30 text-white font-bold py-4 px-10 rounded-full transition-all duration-300 hover:bg-white/10 hover:border-white focus:outline-none focus:ring-4 focus:ring-white/50 text-lg">
              Learn More
            </a>
        </div>
    </div>
  </header>

  <!-- Features Section -->
  <section class="container mx-auto px-4 mb-20" aria-labelledby="features-heading">
    <h2 id="features-heading" class="sr-only">Why Choose Us</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <!-- Feature 1 -->
        <article class="p-8 rounded-2xl bg-content-bg shadow-lg hover:shadow-xl transition-shadow duration-300 border border-transparent hover:border-primary/20">
            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl shadow-inner">
                <i class="fas fa-universal-access"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-3">Accessibility First</h3>
            <p class="text-text-secondary leading-relaxed">Built with dyslexia-friendly fonts, reading guides, and high-contrast modes for all learners.</p>
        </article>
        <!-- Feature 2 -->
        <article class="p-8 rounded-2xl bg-content-bg shadow-lg hover:shadow-xl transition-shadow duration-300 border border-transparent hover:border-primary/20">
            <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl shadow-inner">
                <i class="fas fa-road"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-3">Personalized Paths</h3>
            <p class="text-text-secondary leading-relaxed">Learn at your own pace with curriculum tailored to specific grade level needs and abilities.</p>
        </article>
        <!-- Feature 3 -->
        <article class="p-8 rounded-2xl bg-content-bg shadow-lg hover:shadow-xl transition-shadow duration-300 border border-transparent hover:border-primary/20">
            <div class="w-16 h-16 bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl shadow-inner">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-3">Comprehensive</h3>
            <p class="text-text-secondary leading-relaxed">Complete coverage of Math, ELA, Science, and Social Studies from Pre-K through Grade 12.</p>
        </article>
    </div>
  </section>

  <!-- Learning Levels Grid -->
  <main class="container mx-auto my-10 px-4 scroll-mt-24" id="main-content" tabindex="-1">
    <div class="flex items-center justify-between mb-10 border-b border-gray-200 dark:border-gray-700 pb-4">
        <h2 id="learning-levels-heading" class="text-3xl font-bold text-text-default border-l-8 border-primary pl-4">
            Select Your Grade Level
        </h2>
    </div>
    
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" aria-labelledby="learning-levels-heading">
      <?php foreach ($learningLevels as $level): ?>
        <article class="group h-full">
          <div class="bg-content-bg h-full rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-8 border-primary p-8 flex flex-col relative overflow-hidden">
            
            <!-- Floating Icon Background -->
            <div class="absolute -right-4 -bottom-4 text-9xl opacity-5 group-hover:opacity-10 transition-opacity text-primary pointer-events-none">
                <i class="<?php echo htmlspecialchars($level['icon']); ?>"></i>
            </div>

            <!-- Icon Bubble -->
            <div class="w-14 h-14 bg-base-bg rounded-xl shadow-sm flex items-center justify-center text-primary text-2xl mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                <i class="<?php echo htmlspecialchars($level['icon']); ?>"></i>
            </div>

            <h3 class="text-2xl font-bold text-text-default mb-3" id="<?php echo htmlspecialchars($level['id']); ?>">
              <?php echo htmlspecialchars($level['title']); ?>
            </h3>
            
            <p class="text-text-secondary mb-8 flex-grow leading-relaxed">
              <?php echo htmlspecialchars($level['description']); ?>
            </p>
            
            <a href="<?php echo htmlspecialchars($level['link']); ?>"
              class="w-full inline-flex justify-between items-center bg-base-bg text-text-default py-4 px-6 rounded-xl font-bold border border-transparent hover:border-primary hover:text-primary transition-all duration-300 focus:ring-4 focus:ring-primary/40 focus:outline-none"
              aria-labelledby="<?php echo htmlspecialchars($level['id']); ?>">
              <span>Explore Skills</span>
              <i class="fas fa-arrow-right"></i>
            </a>

          </div>
        </article>
      <?php endforeach; ?>
    </section>
  </main>

<?php include 'src/footer.php'; ?>