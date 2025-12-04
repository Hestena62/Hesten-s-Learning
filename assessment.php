<?php
  // Page-specific variables
  $pageTitle = "Hesten's Learning - Assessment";
  $pageDescription = "Track progress, customize learning plans, and practice skills.";
  include 'src/header.php';
?>

<header class="bg-gradient-to-r from-primary to-secondary text-white py-16 px-4 text-center rounded-b-lg shadow-xl">
  <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-up">
    Your Assessment Dashboard
  </h1>
  <p class="text-lg md:text-xl mb-8 opacity-90">
    Track your progress, customize your learning plan, and practice skills.
  </p>
</header>

<section class="container mx-auto py-12 px-4">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Grade Selector -->
    <div class="lg:col-span-1 bg-content-bg rounded-xl shadow-lg p-6 flex flex-col justify-between border-t-4 border-primary transition-colors duration-300">
      <h2 class="text-2xl font-bold text-text-default mb-4">Select Your Grade</h2>
      <div class="flex-grow">
        <label for="user-grade" class="block text-text-secondary text-sm font-semibold mb-2">Current Grade Level:</label>
        <div class="relative">
          <select id="user-grade" class="block appearance-none w-full bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-primary transition duration-200" onchange="updateGrade()">
            <option>Pre-K</option>
            <option>First Grade</option>
            <option>Second Grade</option>
            <option>Third Grade</option>
            <option>Fourth Grade</option>
            <option>Fifth Grade</option>
            <option>Sixth Grade</option>
            <option>Seventh Grade</option>
            <option>Eighth Grade</option>
            <option>Ninth Grade</option>
            <option>Tenth Grade</option>
            <option>Eleventh Grade</option>
            <option>Twelfth Grade</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-text-secondary">
            <i class="fas fa-chevron-down text-xs"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Progress & Activity -->
    <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <!-- Tracker -->
      <div class="bg-content-bg rounded-xl shadow-lg p-6 border-t-4 border-accent transition-colors duration-300">
        <h2 class="text-2xl font-bold text-text-default mb-4">Progress Tracker</h2>
        <p class="text-text-secondary mb-4 text-sm">Overall progress across active session.</p>
        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-6 relative overflow-hidden">
          <div class="bg-primary h-6 rounded-full text-xs font-bold flex items-center justify-center text-white progress-bar-animated transition-all duration-500" style="width: 0%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            0%
          </div>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="bg-content-bg rounded-xl shadow-lg p-6 border-t-4 border-secondary transition-colors duration-300">
        <h2 class="text-2xl font-bold text-text-default mb-4">Recent Activity</h2>
        <ul id="recent-activity-list" class="space-y-2 max-h-40 overflow-y-auto custom-scrollbar">
          <!-- Populated by JS -->
          <li class="text-text-secondary italic text-sm">No recent activity.</li>
        </ul>
      </div>

      <!-- Recommendation -->
      <div class="lg:col-span-2 bg-content-bg rounded-xl shadow-lg p-6 transition-colors duration-300">
        <h2 class="text-2xl font-bold text-text-default mb-4">Personalized Learning Plan</h2>
        <div class="flex items-center space-x-4 bg-accent/10 p-4 rounded-lg border border-accent/20">
          <i class="fas fa-lightbulb text-primary text-3xl animate-pulse"></i>
          <div>
            <p class="text-sm text-text-secondary uppercase font-bold tracking-wide">Recommended Next Step</p>
            <p class="text-lg font-semibold text-text-default">Practice "Math" skills based on your selected grade.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Skills Section -->
<section class="container mx-auto py-12 px-4">
  <div class="bg-content-bg rounded-xl shadow-lg p-8 transition-colors duration-300">
    <div class="text-center mb-8">
      <h2 class="text-3xl font-bold text-text-default mb-2">Subject & Skill Selection</h2>
      <p class="text-text-secondary">Filter skills by grade level and topic.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
      <div>
        <label for="skill-level" class="block text-text-secondary text-sm font-bold mb-2">Skill Level</label>
        <div class="relative">
          <select id="skill-level" class="block appearance-none w-full bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default py-3 px-4 pr-8 rounded-lg focus:ring-2 focus:ring-primary transition" onchange="populateSkills()">
            <option>Pre-K</option>
            <option>First Grade</option>
            <option>Second Grade</option>
            <option>Third Grade</option>
            <option>Fourth Grade</option>
            <option>Fifth Grade</option>
            <option>Sixth Grade</option>
            <option>Seventh Grade</option>
            <option>Eighth Grade</option>
            <option>Ninth Grade</option>
            <option>Tenth Grade</option>
            <option>Eleventh Grade</option>
            <option>Twelfth Grade</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-text-secondary">
             <i class="fas fa-chevron-down text-xs"></i>
          </div>
        </div>
      </div>
      <div>
        <label for="topic" class="block text-text-secondary text-sm font-bold mb-2">Topic</label>
        <div class="relative">
          <select id="topic" class="block appearance-none w-full bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default py-3 px-4 pr-8 rounded-lg focus:ring-2 focus:ring-primary transition" onchange="populateSkills()">
            <option selected>All Topics</option>
            <option>Math</option>
            <option>Science</option>
            <option>Social Studies</option>
            <option>Language Arts</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-text-secondary">
             <i class="fas fa-chevron-down text-xs"></i>
          </div>
        </div>
      </div>
    </div>
    
    <div id="skills-container" class="grid grid-cols-1 gap-6">
      <!-- Skills Populated via JS -->
    </div>
  </div>
</section>

<!-- Practice Section -->
<section class="container mx-auto py-12 px-4 mb-12">
  <div class="bg-content-bg rounded-xl shadow-lg p-8 border-t-4 border-green-500 transition-colors duration-300">
    <div class="flex justify-between items-center mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
      <h2 class="text-3xl font-bold text-text-default">Practice Questions</h2>
      <span id="question-progress" class="text-sm font-mono text-primary bg-primary/10 px-3 py-1 rounded-full border border-primary/20">Question 1</span>
    </div>

    <div class="space-y-6">
      <div class="question text-2xl font-medium text-text-default min-h-[3rem]" id="question">
        Loading question...
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="options">
        <!-- Options Populated via JS -->
      </div>
      
      <div class="min-h-[2rem] flex items-center" id="feedback-container">
          <div class="feedback text-base font-bold" id="feedback"></div>
      </div>

      <div class="flex flex-wrap gap-3 mt-6">
        <button id="hintButton" onclick="showHint()" class="hidden bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-100 border border-yellow-200 dark:border-yellow-700 hover:bg-yellow-200 dark:hover:bg-yellow-800 py-2 px-4 rounded-lg transition focus:ring-2 focus:ring-yellow-400">
          <i class="far fa-lightbulb mr-2"></i>Show Hint
        </button>
        <button id="explainButton" onclick="showExplanation()" class="hidden bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-100 border border-blue-200 dark:border-blue-700 hover:bg-blue-200 dark:hover:bg-blue-800 py-2 px-4 rounded-lg transition focus:ring-2 focus:ring-blue-400">
          <i class="fas fa-book-open mr-2"></i>Explanation
        </button>
        <button id="downloadAnswers" class="ml-auto bg-green-600 text-white hover:bg-green-700 py-2 px-6 rounded-lg shadow transition focus:ring-2 focus:ring-green-500">
          <i class="fas fa-file-pdf mr-2"></i>Download Results
        </button>
      </div>

      <div id="hintText" class="bg-yellow-50 dark:bg-yellow-900/30 border-l-4 border-yellow-400 p-4 rounded text-yellow-800 dark:text-yellow-100 hidden animate-fade-in-up"></div>
      <div id="explanationText" class="bg-blue-50 dark:bg-blue-900/30 border-l-4 border-blue-400 p-4 rounded text-blue-800 dark:text-blue-100 hidden animate-fade-in-up"></div>
    </div>
  </div>
</section>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<!-- Logic separated for cleaner code -->
<script src="JS/assessment-core.js"></script>
<script src="JS/questionGenerator.js"></script>

<?php include 'src/footer.php'; ?>