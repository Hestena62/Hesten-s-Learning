<?php
// --- Page-Specific Variables ---
$pageTitle = "Assessment Results";
$pageDescription = "A report of the Pre-Kindergarten End-of-Module 1 Assessment results for a student.";
$pageKeywords = "math assessment, results, report, rubric, score";
$pageAuthor = "Hesten's Learning";

// Variables for the welcome popup (we can change this for the results page)
$welcomeMessage = "Assessment Report";
$welcomeParagraph = "This is the generated report based on your form submission. You can print this page or save it as a PDF.";

// Include the header file
include '..\src\header.php';

// --- Form Data Processing ---

// 1. Retrieve and sanitize student info
// Using htmlspecialchars to prevent XSS attacks when re-displaying data
$student_name = isset($_POST['student_name']) ? htmlspecialchars($_POST['student_name']) : 'N/A';
$assessment_date_str = isset($_POST['assessment_date']) ? htmlspecialchars($_POST['assessment_date']) : '';
$assessment_date = $assessment_date_str ? date("F j, Y", strtotime($assessment_date_str)) : 'N/A';


// 2. Retrieve topic data
$topic_e_do = isset($_POST['topic_e_do']) ? htmlspecialchars($_POST['topic_e_do']) : 'No observation recorded.';
$topic_e_say = isset($_POST['topic_e_say']) ? htmlspecialchars($_POST['topic_e_say']) : 'No response recorded.';
$topic_e_score = isset($_POST['topic_e_score']) ? htmlspecialchars($_POST['topic_e_score']) : '0';

$topic_f_do = isset($_POST['topic_f_do']) ? htmlspecialchars($_POST['topic_f_do']) : 'No observation recorded.';
$topic_f_say = isset($_POST['topic_f_say']) ? htmlspecialchars($_POST['topic_f_say']) : 'No response recorded.';
$topic_f_score = isset($_POST['topic_f_score']) ? htmlspecialchars($_POST['topic_f_score']) : '0';

$topic_g_do = isset($_POST['topic_g_do']) ? htmlspecialchars($_POST['topic_g_do']) : 'No observation recorded.';
$topic_g_say = isset($_POST['topic_g_say']) ? htmlspecialchars($_POST['topic_g_say']) : 'No response recorded.';
$topic_g_score = isset($_POST['topic_g_score']) ? htmlspecialchars($_POST['topic_g_score']) : '0';

$topic_h_do = isset($_POST['topic_h_do']) ? htmlspecialchars($_POST['topic_h_do']) : 'No observation recorded.';
$topic_h_say = isset($_POST['topic_h_say']) ? htmlspecialchars($_POST['topic_h_say']) : 'No response recorded.';
$topic_h_score = isset($_POST['topic_h_score']) ? htmlspecialchars($_POST['topic_h_score']) : '0';

// 3. Helper function to get score details (color, label, icon)
function getScoreDetails($score) {
    switch ($score) {
        case '1':
            return ['label' => 'Step 1: Needs Support', 'color' => 'text-red-600', 'bg' => 'bg-red-100', 'icon' => 'fa-times-circle'];
        case '2':
            return ['label' => 'Step 2: Developing', 'color' => 'text-orange-600', 'bg' => 'bg-orange-100', 'icon' => 'fa-exclamation-circle'];
        case '3':
            return ['label' => 'Step 3: Proficient', 'color' => 'text-yellow-600', 'bg' => 'bg-yellow-100', 'icon' => 'fa-arrow-circle-up'];
        case '4':
            return ['label' => 'Step 4: Mastery', 'color' => 'text-green-600', 'bg' => 'bg-green-100', 'icon' => 'fa-check-circle'];
        default:
            return ['label' => 'Not Scored', 'color' => 'text-gray-600', 'bg' => 'bg-gray-100', 'icon' => 'fa-question-circle'];
    }
}

// 4. Get details for each topic
$topic_e_details = getScoreDetails($topic_e_score);
$topic_f_details = getScoreDetails($topic_f_score);
$topic_g_details = getScoreDetails($topic_g_score);
$topic_h_details = getScoreDetails($topic_h_score);

// 5. Calculate total score
$total_score = (int)$topic_e_score + (int)$topic_f_score + (int)$topic_g_score + (int)$topic_h_score;
$max_score = 16;
$score_percent = ($max_score > 0) ? ($total_score / $max_score) * 100 : 0;

?>

<!-- Print-Only CSS -->
<style>
  @media print {
    /* Hide everything except the main report area */
    body > *:not(#print-area) {
      display: none !important;
    }
    
    /* Ensure the print area takes up the full page */
    #print-area {
      display: block !important;
      width: 100% !important;
      position: absolute !important;
      top: 0 !important;
      left: 0 !important;
      margin: 0 !important;
      padding: 20px !important;
    }

    /* Hide the print button itself */
    #print-button-container {
      display: none !important;
    }

    /* Remove shadows and backgrounds for printing */
    .print-no-shadow {
      box-shadow: none !important;
    }
    .print-bg-white {
      background-color: #ffffff !important;
    }
    .print-text-black {
      color: #000000 !important;
    }
    
    /* Make sure text colors are visible */
    .text-text-default, .text-text-secondary, .text-primary {
        color: #000000 !important;
    }
    
    /* Ensure score colors print */
    .print-color-red { color: #DC2626 !important; }
    .print-color-orange { color: #F97316 !important; }
    .print-color-yellow { color: #EAB308 !important; }
    .print-color-green { color: #16A34A !important; }
    .print-color-gray { color: #4B5563 !important; }

    /* Prevent page breaks inside sections */
    .assessment-section {
        page-break-inside: avoid;
    }
  }
</style>

<!-- Main Content Area -->
<main class="container mx-auto p-4 md:p-8" aria-labelledby="main-heading">

  <!-- Print Button Container -->
  <div id="print-button-container" class="flex justify-between items-center mb-6">
    <h1 id="main-heading" class="text-3xl md:text-4xl font-bold text-primary">Student Assessment Report</h1>
    <button onclick="window.print()"
      class="px-6 py-2 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-secondary focus:outline-none focus:ring-4 focus:ring-accent transition-all duration-300 transform hover:scale-105">
      <i class="fas fa-print mr-2"></i> Print / Save as PDF
    </button>
  </div>

  <!-- This 'print-area' is what will be visible when printing -->
  <div id="print-area" class="bg-content-bg text-text-default p-6 md:p-10 rounded-base-rounded shadow-lg print-no-shadow print-bg-white transition-colors duration-300 space-y-8">

    <!-- Report Header: Student Info -->
    <header class="border-b border-gray-300 dark:border-gray-700 pb-6 mb-8">
      <div class="flex justify-between items-start">
        <div>
          <h2 class="text-2xl font-bold text-primary print-text-black"><?php echo $student_name; ?></h2>
          <p class="text-lg text-text-secondary print-text-black">Pre-K Module 1 Assessment</p>
          <p class="text-md text-text-secondary print-text-black">Date: <?php echo $assessment_date; ?></p>
        </div>
        <div class="text-right">
          <h3 class="text-2xl font-bold text-primary print-text-black">Total Score</h3>
          <p class="text-4xl font-bold text-text-default print-text-black"><?php echo $total_score; ?> / <?php echo $max_score; ?></p>
          <p class="text-lg text-text-secondary print-text-black">(<?php echo round($score_percent, 1); ?>%)</p>
        </div>
      </div>
    </header>

    <!-- Assessment Sections -->

    <!-- Topic E Results -->
    <section class="assessment-section border border-gray-200 dark:border-gray-700 rounded-lg p-6">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-2xl font-semibold text-primary print-text-black">Topic E: How Many Questions (4 or 5)</h3>
        <span class="px-4 py-2 rounded-full font-semibold <?php echo $topic_e_details['bg'] . ' ' . $topic_e_details['color']; ?> print-color-<?php echo explode('-', $topic_e_details['color'])[1]; ?>">
          <i class="fas <?php echo $topic_e_details['icon']; ?> mr-2"></i>
          <?php echo $topic_e_details['label']; ?>
        </span>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <h4 class="font-semibold text-text-default print-text-black mb-2">What did the student do?</h4>
          <p class="text-text-secondary print-text-black whitespace-pre-wrap"><?php echo $topic_e_do; ?></p>
        </div>
        <div>
          <h4 class="font-semibold text-text-default print-text-black mb-2">What did the student say?</h4>
          <p class="text-text-secondary print-text-black whitespace-pre-wrap"><?php echo $topic_e_say; ?></p>
        </div>
      </div>
    </section>

    <!-- Topic F Results -->
    <section class="assessment-section border border-gray-200 dark:border-gray-700 rounded-lg p-6">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-2xl font-semibold text-primary print-text-black">Topic F: Matching Numeral (up to 5)</h3>
        <span class="px-4 py-2 rounded-full font-semibold <?php echo $topic_f_details['bg'] . ' ' . $topic_f_details['color']; ?> print-color-<?php echo explode('-', $topic_f_details['color'])[1]; ?>">
          <i class="fas <?php echo $topic_f_details['icon']; ?> mr-2"></i>
          <?php echo $topic_f_details['label']; ?>
        </span>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <h4 class="font-semibold text-text-default print-text-black mb-2">What did the student do?</h4>
          <p class="text-text-secondary print-text-black whitespace-pre-wrap"><?php echo $topic_f_do; ?></p>
        </div>
        <div>
          <h4 class="font-semibold text-text-default print-text-black mb-2">What did the student say?</h4>
          <p class="text-text-secondary print-text-black whitespace-pre-wrap"><?php echo $topic_f_say; ?></p>
        </div>
      </div>
    </section>

    <!-- Topic G Results -->
    <section class="assessment-section border border-gray-200 dark:border-gray-700 rounded-lg p-6">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-2xl font-semibold text-primary print-text-black">Topic G: One More (1 to 5)</h3>
        <span class="px-4 py-2 rounded-full font-semibold <?php echo $topic_g_details['bg'] . ' ' . $topic_g_details['color']; ?> print-color-<?php echo explode('-', $topic_g_details['color'])[1]; ?>">
          <i class="fas <?php echo $topic_g_details['icon']; ?> mr-2"></i>
          <?php echo $topic_g_details['label']; ?>
        </span>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <h4 class="font-semibold text-text-default print-text-black mb-2">What did the student do?</h4>
          <p class="text-text-secondary print-text-black whitespace-pre-wrap"><?php echo $topic_g_do; ?></p>
        </div>
        <div>
          <h4 class="font-semibold text-text-default print-text-black mb-2">What did the student say?</h4>
          <p class="text-text-secondary print-text-black whitespace-pre-wrap"><?php echo $topic_g_say; ?></p>
        </div>
      </div>
    </section>

    <!-- Topic H Results -->
    <section class="assessment-section border border-gray-200 dark:border-gray-700 rounded-lg p-6">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-2xl font-semibold text-primary print-text-black">Topic H: Counting 5, 4, 3, 2, 1</h3>
        <span class="px-4 py-2 rounded-full font-semibold <?php echo $topic_h_details['bg'] . ' ' . $topic_h_details['color']; ?> print-color-<?php echo explode('-', $topic_h_details['color'])[1]; ?>">
          <i class="fas <?php echo $topic_h_details['icon']; ?> mr-2"></i>
          <?php echo $topic_h_details['label']; ?>
        </span>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <h4 class="font-semibold text-text-default print-text-black mb-2">What did the student do?</h4>
          <p class="text-text-secondary print-text-black whitespace-pre-wrap"><?php echo $topic_h_do; ?></p>
        </div>
        <div>
          <h4 class="font-semibold text-text-default print-text-black mb-2">What did the student say?</h4>
          <p class="text-text-secondary print-text-black whitespace-pre-wrap"><?php echo $topic_h_say; ?></p>
        </div>
      </div>
    </section>

    <!-- Answer Key / Rubric -->
    <section class="assessment-section pt-8 border-t border-gray-300 dark:border-gray-700">
      <h3 class="text-2xl font-semibold text-primary print-text-black mb-4">Answer Key: Progression Toward Mastery</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 dark:border-gray-700 divide-y divide-gray-300 dark:divide-gray-700">
          <thead class="bg-base-bg">
            <tr>
              <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-text-default print-text-black">Score</th>
              <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-text-default print-text-black">Topic E (Counting)</th>
              <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-text-default print-text-black">Topic F (Matching)</th>
              <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-text-default print-text-black">Topic G (One More)</th>
              <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-text-default print-text-black">Topic H (Counting 5-1)</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            <tr class="bg-red-100/50">
              <td class="px-4 py-3 font-medium text-red-700 print-color-red">Step 1</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Little evidence of understanding. Unable to count 1-5 with one-to-one correspondence.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Little evidence of understanding matching numeral to quantity.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Little evidence of understanding how to count 1 more.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Little evidence of understanding how to count from 5 to 1.</td>
            </tr>
            <tr class="bg-orange-100/50">
              <td class="px-4 py-3 font-medium text-orange-700 print-color-orange">Step 2</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Beginning to understand. Has difficulty with cardinality or one-to-one correspondence.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Beginning to understand matching and creating groups.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Beginning to understand how to count 1 more.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Counts 5-1 with two or three errors.</td>
            </tr>
            <tr class="bg-yellow-100/50">
              <td class="px-4 py-3 font-medium text-yellow-700 print-color-yellow">Step 3</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Able to do two of the following: count to 5 in different configurations, show cardinality, use one-to-one correspondence.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Demonstrates some understanding but is inaccurate or inconsistent in matching or creating groups.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Correctly counts 1 more, but requires prompting or a clue.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Counts 5-1 with materials and by rote with one error.</td>
            </tr>
            <tr class="bg-green-100/50">
              <td class="px-4 py-3 font-medium text-green-700 print-color-green">Step 4</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Correctly counts to 5 in all configurations, demonstrates cardinality, and uses one-to-one correspondence.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Correctly matches numerals 1-4 and creates a group of 5 to match the numeral.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Correctly counts 1 more within 5 without prompting.</td>
              <td class="px-4 py-3 text-sm text-text-secondary print-text-black">Correctly counts 5-1 with materials and by rote.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

  </div>
</main>
<!-- /End Main Content Area -->

<?php
// Include the footer file
include '..\src\footer.php';
?>