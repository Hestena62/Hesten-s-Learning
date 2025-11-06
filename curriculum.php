<?php
  // Define page-specific variables for the header
  $pageTitle = 'Curriculum Overview | Hesten\'s Learning';
  $pageDescription = 'Explore the standards-based curriculum at Hesten\'s Learning, including EngageNY for Math and ELA, and NGSS for Science.';
  $pageKeywords = 'curriculum, EngageNY, CCSS, Common Core, NGSS, Next Generation Science Standards, math, ELA, science, history, social studies';
  $pageAuthor = 'Hesten\'s Learning';

  // Define variables for the welcome popup (from header.php)
  $welcomeMessage = 'Our Curriculum';
  $welcomeParagraph = 'Discover the core subjects and standards that guide our learning experiences.';

  // Include the header
  include 'src/header.php';
?>

<!-- Main Content Area -->
<main id="main-content" class="transition-colors duration-300">
  <div class="container mx-auto px-4 py-12 md:py-16">

    <!-- Page Title -->
    <h1 class="text-4xl md:text-5xl font-bold text-primary text-center mb-8 transition-colors duration-300">
      Curriculum Overview
    </h1>

    <!-- Introductory Text -->
    <p class="text-lg text-text-secondary text-center max-w-3xl mx-auto mb-12 transition-colors duration-300">
      Our curriculum is built on a foundation of proven, standards-based frameworks. We believe in providing a clear,
      consistent, and high-quality education by aligning our materials with trusted resources like EngageNY, the Common Core State Standards (CCSS), and
      the Next Generation Science Standards (NGSS).
    </p>

    <!-- Standards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">

      <!-- Math Card (Updated) -->
      <section
        class="bg-content-bg shadow-lg rounded-xl p-6 transform hover:scale-105 transition-transform duration-300 ease-in-out"
        aria-labelledby="math-heading">
        <div class="flex items-center mb-4">
          <i class="fas fa-calculator text-4xl text-primary mr-4" aria-hidden="true"></i>
          <h2 id="math-heading" class="text-2xl font-semibold text-text-default">Mathematics (EngageNY)</h2>
        </div>
        <p class="text-text-secondary mb-4">
          Based on the <strong>EngageNY</strong> curriculum, which is aligned with the <strong>Common Core State Standards (CCSS)</strong> for Mathematics.
        </p>
        <p class="text-text-default mb-6">
          Our math curriculum focuses on developing a deep conceptual understanding of key concepts, procedural fluency,
          and the ability to apply mathematical practices to solve real-world problems.
        </p>
        <a href="https://www.engageny.org/mathematics" target="_blank" rel="noopener noreferrer"
          class="inline-block bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent">
          View EngageNY Math <i class="fas fa-external-link-alt ml-1" aria-hidden="true"></i>
        </a>
      </section>

      <!-- ELA Card (Updated) -->
      <section
        class="bg-content-bg shadow-lg rounded-xl p-6 transform hover:scale-105 transition-transform duration-300 ease-in-out"
        aria-labelledby="ela-heading">
        <div class="flex items-center mb-4">
          <i class="fas fa-book-open text-4xl text-primary mr-4" aria-hidden="true"></i>
          <h2 id="ela-heading" class="text-2xl font-semibold text-text-default">English Language Arts (EngageNY)</h2>
        </div>
        <p class="text-text-secondary mb-4">
          Based on the <strong>EngageNY</strong> curriculum, which is aligned with the <strong>Common Core State Standards (CCSS)</strong> for English Language Arts.
        </p>
        <p class="text-text-default mb-6">
          We focus on building strong literacy skills by integrating reading, writing, speaking, and listening. Students
          engage with complex texts and learn to craft evidence-based arguments.
        </p>
        <a href="https://www.engageny.org/ela" target="_blank" rel="noopener noreferrer"
          class="inline-block bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent">
          View EngageNY ELA <i class="fas fa-external-link-alt ml-1" aria-hidden="true"></i>
        </a>
      </section>

      <!-- Science Card (Unchanged) -->
      <section
        class="bg-content-bg shadow-lg rounded-xl p-6 transform hover:scale-105 transition-transform duration-300 ease-in-out"
        aria-labelledby="science-heading">
        <div class="flex items-center mb-4">
          <i class="fas fa-flask text-4xl text-primary mr-4" aria-hidden="true"></i>
          <h2 id="science-heading" class="text-2xl font-semibold text-text-default">Science</h2>
        </div>
        <p class="text-text-secondary mb-4">
          Aligned with the <strong>Next Generation Science Standards (NGSS)</strong>.
        </p>
        <p class="text-text-default mb-6">
          Our science curriculum is designed to be a three-dimensional experience, blending disciplinary core ideas,
          science and engineering practices, and crosscutting concepts to foster inquiry and understanding.
        </p>
        <a href="https://nextgenscience.org/" target="_blank" rel="noopener noreferrer"
          class="inline-block bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent">
          View NGSS <i class="fas fa-external-link-alt ml-1" aria-hidden="true"></i>
        </a>
      </section>

      <!-- History / Social Studies Card (Unchanged) -->
      <section
        class="bg-content-bg shadow-lg rounded-xl p-6 transform hover:scale-105 transition-transform duration-300 ease-in-out"
        aria-labelledby="social-studies-heading">
        <div class="flex items-center mb-4">
          <i class="fas fa-globe-americas text-4xl text-primary mr-4" aria-hidden="true"></i>
          <h2 id="social-studies-heading" class="text-2xl font-semibold text-text-default">History & Social Studies</h2>
        </div>
        <p class="text-text-secondary mb-4">
          Guided by the <strong>CCSS for History/Social Studies</strong> and the <strong>C3 Framework</strong>.
        </p>
        <p class="text-text-default mb-6">
          We emphasize critical thinking and literacy within history, civics, geography, and economics. Students learn to
          evaluate sources, develop claims, and communicate their conclusions effectively.
        </p>
        <a href="https://www.socialstudies.org/standards/c3" target="_blank" rel="noopener noreferrer"
          class="inline-block bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent">
          View C3 Framework <i class="fas fa-external-link-alt ml-1" aria-hidden="true"></i>
        </a>
      </section>

    </div> <!-- /end grid -->

  </div>
</main>

<?php
  // Include the footer
  include 'src/footer.php';
?>