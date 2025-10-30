<?php
  session_start(); // Start session to get answers and subject

  include 'questions.php'; // Include questions data to display review

  // --- Check if test data exists in session ---
  if (!isset($_SESSION['current_test_subject']) || !isset($_SESSION['current_test_correct_answers']) || !isset($_SESSION['current_test_questions']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
      // If no data, redirect to home
      header('Location: assessment.php');
      exit;
  }

  // --- Get data from session and POST ---
  $subject = $_SESSION['current_test_subject'];
  $subject_title = get_subject_title($subject);
  $questions = $_SESSION['current_test_questions'];
  $correct_answers = $_SESSION['current_test_correct_answers'];
  $user_answers = $_POST; // Get all answers from POST

  // --- Calculate Score ---
  $score = 0;
  $total_questions = count($questions);
  $test_review_html = ''; // For displaying on the page
  $test_review_txt = ""; // For .txt download

  $test_review_txt .= "$subject_title - Results\n";
  $test_review_txt .= "=============================\n\n";

  for ($i = 0; $i < $total_questions; $i++) {
      $user_answer_index = $user_answers['q' . $i] ?? null; // Get user's selected index
      $correct_answer_index = $correct_answers[$i];
      
      $q = $questions[$i];
      $question_text = $q['question'];
      $correct_answer_text = $q['options'][$correct_answer_index];
      $user_answer_text = ($user_answer_index !== null) ? $q['options'][$user_answer_index] : "No Answer";

      $is_correct = ($user_answer_index == $correct_answer_index);
      if ($is_correct) {
          $score++;
      }

      // --- Build HTML Review ---
      $test_review_html .= '<div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">';
      $test_review_html .= '<h4 class="text-lg font-semibold text-text-default mb-2">Question ' . ($i + 1) . ': ' . htmlspecialchars($question_text) . '</h4>';
      
      if ($is_correct) {
          $test_review_html .= '<p class="text-green-600 dark:text-green-400 font-medium"><i class="fas fa-check-circle mr-2"></i>Your Answer: ' . htmlspecialchars($user_answer_text) . ' (Correct)</p>';
      } else {
          $test_review_html .= '<p class="text-red-600 dark:text-red-400 font-medium"><i class="fas fa-times-circle mr-2"></i>Your Answer: ' . htmlspecialchars($user_answer_text) . '</p>';
          $test_review_html .= '<p class="text-green-600 dark:text-green-400 font-medium"><i class="fas fa-check-circle mr-2"></i>Correct Answer: ' . htmlspecialchars($correct_answer_text) . '</p>';
      }
      $test_review_html .= '</div>';

      // --- Build TXT Review ---
      $test_review_txt .= "Question " . ($i + 1) . ": " . $question_text . "\n";
      $test_review_txt .= "Your Answer: " . $user_answer_text . "\n";
      if (!$is_correct) {
          $test_review_txt .= "Correct Answer: " . $correct_answer_text . "\n";
      }
      $test_review_txt .= "Status: " . ($is_correct ? "Correct" : "Incorrect") . "\n\n";
  }

  $percentage = ($total_questions > 0) ? round(($score / $total_questions) * 100) : 0;
  $test_review_txt .= "=============================\n";
  $test_review_txt .= "Final Score: $score out of $total_questions ($percentage%)\n";

  // --- Clear session data for this test ---
  unset($_SESSION['current_test_subject']);
  unset($_SESSION['current_test_correct_answers']);
  unset($_SESSION['current_test_questions']);

  // --- PHP Page Variables ---
  $pageTitle = "Test Results";
  $pageDescription = "View your test results for the $subject_title.";
  $pageKeywords = "test, quiz, results, score, $subject";
  $pageAuthor = "Hesten's Learning";

  // Welcome message variables
  $welcomeMessage = "Test Results";
  $welcomeParagraph = "Here's how you did on the $subject_title.";

  // Include the reusable header
  include 'src/header.php';
?>

  <!-- Main content - Results Display -->
  <main class="container mx-auto py-12 px-4">
    <div class="max-w-4xl mx-auto bg-content-bg p-8 rounded-xl shadow-lg">

      <h1 class="text-4xl font-bold text-center text-text-default mb-4">
        Your Score
      </h1>
      
      <!-- Grade Display -->
      <div class="text-center mb-8">
        <p class="text-6xl font-extrabold text-primary"><?php echo $percentage; ?>%</p>
        <p class="text-2xl text-text-secondary font-semibold">
          You answered <?php echo $score; ?> out of <?php echo $total_questions; ?> questions correctly.
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-col md:flex-row justify-center gap-4 mb-10">
        <a href="take_test.php?subject=<?php echo htmlspecialchars($subject); ?>" 
           class="bg-primary text-white text-center font-semibold hover:bg-secondary py-3 px-6 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
           <i class="fas fa-redo mr-2"></i>Retake Test
        </a>
        <a href="assessment.php" 
           class="bg-gray-600 text-white text-center font-semibold hover:bg-gray-700 py-3 px-6 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
           <i class="fas fa-th-large mr-2"></i>All Assessments
        </a>
      </div>

      <!-- Download Options -->
      <div class="text-center mb-10 border-t border-b border-gray-200 dark:border-gray-700 py-6">
        <h3 class="text-lg font-semibold text-text-default mb-3">Download Your Results</h3>
        <div class="flex flex-col md:flex-row justify-center gap-3">
          <button id="download-txt" class="bg-blue-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
            <i class="fas fa-file-alt mr-2"></i>Download .txt
          </button>
          <button id="download-pdf" disabled class="bg-red-500 text-white font-medium py-2 px-4 rounded-lg opacity-50 cursor-not-allowed" aria-label="PDF download not implemented">
            <i class="fas fa-file-pdf mr-2"></i>Download .pdf
          </button>
          <button id="download-docx" disabled class="bg-indigo-500 text-white font-medium py-2 px-4 rounded-lg opacity-50 cursor-not-allowed" aria-label="DOCX download not implemented">
            <i class="fas fa-file-word mr-2"></i>Download .docx
          </button>
        </div>
        <p class="text-xs text-text-secondary mt-3">(PDF and DOCX downloads require server-side libraries and are not implemented in this demo)</p>
      </div>

      <!-- Test Review Section -->
      <div id="test-review-section">
        <h2 class="text-3xl font-bold text-text-default mb-6">Answer Review</h2>
        <?php echo $test_review_html; ?>
      </div>

      <!-- Hidden div for TXT download content -->
      <div id="txt-download-content" class="hidden">
        <?php echo htmlspecialchars($test_review_txt); ?>
      </div>

    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const downloadTxtBtn = document.getElementById('download-txt');
      if (downloadTxtBtn) {
        downloadTxtBtn.addEventListener('click', function() {
          // Get the plain text content from the hidden div
          const textContent = document.getElementById('txt-download-content').textContent;
          
          // Create a Blob
          const blob = new Blob([textContent], { type: 'text/plain' });
          
          // Create a temporary <a> element to trigger the download
          const a = document.createElement('a');
          a.href = URL.createObjectURL(blob);
          a.download = '<?php echo htmlspecialchars($subject); ?>-test-results.txt';
          
          // Append to body, click, and remove
          document.body.appendChild(a);
          a.click();
          document.body.removeChild(a);
          URL.revokeObjectURL(a.href);
        });
      }
    });
  </script>

<?php
  // Include the reusable footer
  include 'src/footer.php';
?>
