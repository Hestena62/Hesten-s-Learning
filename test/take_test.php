<?php
  session_start(); // Start the session to store correct answers

  include 'src/questions.php'; // Include the questions data

  // Get the subject from the URL
  $subject = $_GET['subject'] ?? '';
  $questions = get_questions_for_subject($subject, $all_questions);
  $subject_title = get_subject_title($subject);

  // If no subject or invalid subject, redirect to assessment home
  if (empty($questions)) {
      header('Location: assessment.php');
      exit;
  }

  // Store the correct answers and subject in the session for results.php
  $_SESSION['current_test_subject'] = $subject;
  $_SESSION['current_test_questions'] = $questions; // Store full questions for review
  $_SESSION['current_test_correct_answers'] = array_column($questions, 'correct');


  // --- PHP Page Variables ---
  $pageTitle = $subject_title;
  $pageDescription = "Take the " . $subject_title . ".";
  $pageKeywords = "test, quiz, $subject";
  $pageAuthor = "Hesten's Learning";

  // Welcome message variables
  $welcomeMessage = $subject_title;
  $welcomeParagraph = "Please answer all questions to the best of your ability.";

  // Include the reusable header
  include 'src/header.php';
?>

  <!-- Main content - Test Form -->
  <main class="container mx-auto py-12 px-4">
    <h1 class="text-4xl font-bold text-center text-text-default mb-10">
      <?php echo htmlspecialchars($subject_title); ?>
    </h1>

    <form action="results.php" method="POST" class="max-w-3xl mx-auto bg-content-bg p-8 rounded-xl shadow-lg">
      
      <?php foreach ($questions as $index => $q): ?>
        <fieldset class="mb-8 border-b border-gray-200 dark:border-gray-700 pb-6">
          <legend class="text-xl font-semibold text-text-default mb-4">
            Question <?php echo $index + 1; ?>: <?php echo htmlspecialchars($q['question']); ?>
          </legend>
          
          <div class="space-y-3">
            <?php foreach ($q['options'] as $opt_index => $option): ?>
              <label for="q<?php echo $index; ?>_opt<?php echo $opt_index; ?>" class="block w-full p-4 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors cursor-pointer has-[:checked]:bg-primary has-[:checked]:text-white has-[:checked]:border-primary">
                <input 
                  type="radio" 
                  name="q<?php echo $index; ?>" 
                  id="q<?php echo $index; ?>_opt<?php echo $opt_index; ?>" 
                  value="<?php echo $opt_index; ?>" 
                  class="mr-3"
                  required>
                <?php echo htmlspecialchars($option); ?>
              </label>
            <?php endforeach; ?>
          </div>
        </fieldset>
      <?php endforeach; ?>

      <div class="text-center">
        <button 
          type="submit" 
          class="bg-primary text-white text-lg font-bold hover:bg-secondary py-3 px-10 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
          Submit Answers
        </button>
      </div>

    </form>
  </main>

<?php
  // Include the reusable footer
  include 'src/footer.php';
?>

