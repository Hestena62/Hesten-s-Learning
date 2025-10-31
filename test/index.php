<?php
  // Define PHP variables for the header
  $pageTitle = "Hesten's Learning - Testing Platform";
  $pageDescription = "Select a test to begin. We offer practice tests for Math, English, Science, and Social Studies for grades 3-12.";
  $pageKeywords = "testing platform, online tests, math test, english test, science test, social studies test, grades 3-12";
  $pageAuthor = "Hesten Allison";
  
  // Define variables for the popup (as seen in header.php)
  $welcomeMessage = "Welcome to the Testing Center";
  $welcomeParagraph = "Please select a subject and grade level to start your test.";

  // Include the header
  include 'header.php'; 
?>

<!-- Main content area -->
<main class="container mx-auto px-4 py-12 min-h-screen">
  
  <h1 class="text-4xl font-bold text-center text-primary mb-12">Select Your Test</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    
    <?php
      // Define the subjects and their icons
      $subjects = [
        "Math" => "fas fa-calculator",
        "English" => "fas fa-book-open",
        "Science" => "fas fa-flask",
        "Social Studies" => "fas fa-globe-americas"
      ];

      // Define the grades
      $grades = range(3, 12);

      // --- DEFINE YOUR TEST LINKS HERE ---
      // Add the specific URL for each subject and grade.
      // Use the 'subject-slug' (like 'math', 'english') and the grade number as keys.
      // If a link is not specified, it will default to '#'
      $test_links = [
        "math" => [
          3 => "/tests/math-g3.html",
          4 => "/tests/math-g4.html",
          5 => "/tests/math-g5.html",
          6 => "/tests/math-g6.html",
          7 => "/tests/math-g7.html",
          8 => "/tests/math-g8.html",
          9 => "/tests/math-g9.html",
          10 => "/tests/math-g10.html",
          11 => "/tests/math-g11.html",
          12 => "/tests/math-g12.html"
        ],
        "english" => [
          3 => "/tests/english-g3.html",
          4 => "/tests/english-g4.html",
          5 => "#", // Example of a missing link
          6 => "#",
          7 => "#",
          8 => "#",
          9 => "#",
          10 => "#",
          11 => "#",
          12 => "#"
        ],
        "science" => [
          3 => "#",
          4 => "#",
          5 => "#",
          6 => "#",
          7 => "#",
          8 => "#",
          9 => "#",
          10 => "#",
          11 => "#",
          12 => "#"
        ],
        "social-studies" => [
          3 => "#",
          4 => "#",
          5 => "#",
          6 => "#",
          7 => "#",
          8 => "#",
          9 => "#",
          10 => "#",
          11 => "#",
          12 => "#"
        ]
      ];
      // --- END OF TEST LINKS ---

      // Loop through each subject to create a card
      foreach ($subjects as $subject => $icon) {
        $subject_slug = strtolower(str_replace(' ', '-', $subject)); // e.g., "social-studies"
    ?>

    <!-- Subject Card -->
    <section class="bg-content-bg shadow-xl rounded-xl p-6 transition-all duration-300 hover:shadow-2xl" aria-labelledby="<?php echo $subject_slug; ?>-heading">
      <h2 id="<?php echo $subject_slug; ?>-heading" class="text-3xl font-semibold text-primary mb-6 flex items-center">
        <i class="<?php echo $icon; ?> mr-3" aria-hidden="true"></i>
        <?php echo htmlspecialchars($subject); ?> Tests
      </h2>
      
      <p class="text-text-secondary mb-6">Select a grade level to start your <?php echo htmlspecialchars($subject); ?> test.</p>

      <!-- Grade Level Grid -->
      <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3">
        <?php
          // Loop through grades to create buttons
          foreach ($grades as $grade) {
            // Check if a specific link exists in our array, otherwise default to '#'
            $link = $test_links[$subject_slug][$grade] ?? '#';
        ?>
        <a href="<?php echo htmlspecialchars($link); ?>" 
           class="bg-primary text-white text-center font-semibold py-3 px-2 rounded-lg shadow-md hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2 <?php echo ($link === '#') ? 'opacity-50 cursor-not-allowed' : ''; ?>"
           aria-label="Grade <?php echo $grade; ?> <?php echo htmlspecialchars($subject); ?> Test"
           <?php if ($link === '#') { echo ' onclick="return false;"'; } // Prevent click if link is '#' ?>
           >
          Grade <?php echo $grade; ?>
        </a>
        <?php
          } // End grades loop
        ?>
      </div>
    </section>

    <?php
      } // End subjects loop
    ?>

  </div> <!-- End main grid -->

</main>
<!-- End main content area -->

<?php
  // Include the footer
  include 'footer.php'; 
?>

