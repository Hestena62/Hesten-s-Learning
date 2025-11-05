<?php
  // Page-specific variables for header.php
  $pageTitle = "Hesten's Learning - Assessment";
  $pageDescription = "Hesten's Learning - Personalized assessment and progress tracking for students with learning disabilities.";
  $pageKeywords = "assessment, progress tracker, learning plan, practice questions, skill selection";
  $pageAuthor = "Hesten's Learning";

  // Variables for the welcome popup (defined in header.php)
  $welcomeMessage = "Welcome to your Assessment!";
  $welcomeParagraph = "Track your progress, customize your learning plan, and practice new skills.";

  // Include the header
  include 'src/header.php';
?>

<!-- 
  START: Content copied from assessment.html 
  (The original <head>, <body>, and main navigation <header> are now in header.php)
-->

<header
  class="bg-gradient-to-r from-primary to-secondary text-white py-16 px-4 text-center rounded-b-lg shadow-xl"
>
  <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-4">
    Your Assessment Dashboard
  </h1>
  <p class="text-lg md:text-xl mb-8">
    Track your progress, customize your learning plan, and practice skills.
  </p>
</header>

<section class="container mx-auto py-12 px-4">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div
      class="lg:col-span-1 bg-white rounded-xl shadow-lg p-6 flex flex-col justify-between"
    >
      <h2 class="text-2xl font-bold text-gray-800 mb-4">
        Select Your Grade
      </h2>
      <div class="flex-grow">
        <label
          for="user-grade"
          class="block text-gray-700 text-sm font-semibold mb-2"
          >Current Grade Level:</label
        >
        <div class="relative">
          <select
            id="user-grade"
            class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200"
            onchange="updateGrade()"
          >
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
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </div>
        </div>
      </div>
    </div>

    <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
          Progress Tracker
        </h2>
        <p class="text-gray-600 mb-4">
          Overall progress across all subjects.
        </p>
        <div class="w-full bg-gray-200 rounded-full h-4 relative">
          <div
            class="bg-primary h-4 rounded-full text-xs flex items-center justify-center text-white progress-bar-animated"
            style="width: 70%; --progress-width: 70%"
            role="progressbar"
            aria-valuenow="70"
            aria-valuemin="0"
            aria-valuemax="100"
          >
            70%
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
          Recent Activity
        </h2>
        <p class="text-gray-600 mb-4">Your latest learning activities.</p>
        <ul
          id="recent-activity-list"
          class="list-disc list-inside text-gray-700 space-y-2"
        >
          <li class="p-2 bg-gray-50 rounded-md">
            Completed "Adding Single Digits"
          </li>
          <li class="p-2 bg-gray-50 rounded-md">
            Reviewed "Basic Verb Conjugation"
          </li>
          <li class="p-2 bg-gray-50 rounded-md">
            Started "Introduction to Cells"
          </li>
        </ul>
      </div>

      <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
          Personalized Learning Plan
        </h2>
        <p class="text-gray-600 mb-4">
          Based on your performance and goals, here's your next recommended
          lesson.
        </p>
        <div
          class="flex items-center space-x-4 bg-accent/20 p-4 rounded-lg"
        >
          <i class="fas fa-lightbulb text-primary text-3xl"></i>
          <p class="text-lg font-semibold text-gray-800">
            Next Lesson: "Algebra Fundamentals"
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container mx-auto py-12 px-4">
  <div class="bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
      Subject & Skill Selection
    </h2>
    <p class="text-gray-600 mb-8 text-center">
      Filter skills by grade level and topic to find exactly what you need.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
      <div>
        <label
          for="skill-level"
          class="block text-gray-700 text-sm font-semibold mb-2"
          >Skill Level</label
        >
        <div class="relative">
          <select
            id="skill-level"
            class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200"
            onchange="populateSkills()"
          >
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
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </div>
        </div>
      </div>
      <div>
        <label
          for="topic"
          class="block text-gray-700 text-sm font-semibold mb-2"
          >Topic</label
        >
        <div class="relative">
          <select
            id="topic"
            class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200"
            onchange="populateSkills()"
          >
            <option selected>All Topics</option>
            <option>Math</option>
            <option>Science</option>
            <option>Social Studies</option>
            <option>Language Arts</option>
          </select>
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </div>
        </div>
      </div>
    </div>
    <div id="skills-container" class="mt-4">
      <!-- Skills will be populated here by script -->
    </div>
  </div>
</section>

<section class="container mx-auto py-12 px-4">
  <div class="bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
      Practice Questions
    </h2>
    <p class="text-gray-600 mb-8 text-center">
      Test your knowledge with interactive practice questions.
    </p>

    <div class="space-y-6">
      <div
        id="question-progress"
        class="text-sm text-gray-500 text-right mb-2"
      ></div>
      <div
        class="question text-xl font-semibold text-gray-800"
        id="question"
      >
        Loading question...
      </div>
      <div
        class="options grid grid-cols-1 md:grid-cols-2 gap-4"
        id="options"
      >
        <!-- Options will be populated here by script -->
      </div>
      <div
        class="feedback text-base font-medium flex items-center"
        id="feedback"
      ></div>

      <div class="help-buttons flex flex-wrap gap-4 mt-6">
        <button
          class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
          id="hintButton"
          onclick="showHint()"
        >
          Show Hint
        </button>
        <button
          class="bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-600"
          id="explainButton"
          onclick="showExplanation()"
        >
          Show Explanation
        </button>
        <button
          class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-500"
          id="downloadAnswers"
        >
          Download Answers
        </button>
      </div>

      <div
        id="hintText"
        class="bg-blue-100 text-blue-800 p-4 rounded-lg mt-4 hidden"
      ></div>
      <div
        id="explanationText"
        class="bg-gray-100 text-gray-800 p-4 rounded-lg mt-4 hidden"
      ></div>
    </div>
  </div>
</section>

<div id="customModal" class="modal-overlay hidden">
  <div class="modal-content">
    <h3 id="modalTitle" class="text-2xl font-bold text-gray-800 mb-4"></h3>
    <p id="modalMessage" class="text-gray-700 mb-6"></p>
    <div
      id="modalContentArea"
      class="mb-6 text-gray-700 max-h-60 overflow-y-auto"
    ></div>
    <button
      id="modalCloseButton"
      class="bg-primary text-white py-2 px-5 rounded-lg hover:bg-secondary transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary"
    >
      Close
    </button>
  </div>
</div>

<!-- 
  END: Content copied from assessment.html 
-->

<!-- 
  START: Page-specific scripts from assessment.html 
  (The original footer is now in footer.php)
-->
<script>
  // This script block is copied directly from assessment.html
  // It handles grade updates, modal popups, and skill population.
  // Note: The original 'year' update is now in footer.php, but it's harmless to have here too.
  document.getElementById("year").textContent = new Date().getFullYear();

  // Toggle mobile navigation
  // NOTE: This functionality is already included in footer.php's main script.
  // Keeping it here might cause conflicts, but we'll leave it as it was in the original file.
  // Ideally, this would be removed and managed only by the footer.php script.
  const navToggle = document.getElementById("nav-toggle");
  const navContent = document.getElementById("nav-content");

  if(navToggle && navContent) { // Added check to prevent errors if footer.php script runs first
    navToggle.addEventListener("click", function () {
      navContent.classList.toggle("hidden");
      navContent.classList.toggle("mobile-menu-active"); // Add/remove active class for custom animation
    });
  }

  // Profile dropdown functionality
  // NOTE: Also duplicated from footer.php
  const profileMenuButton = document.getElementById("profile-menu-button");
  const profileDropdown = document.getElementById("profile-dropdown");

  if(profileMenuButton && profileDropdown) { // Added check
    profileMenuButton.addEventListener("click", function (event) {
      event.stopPropagation(); // Prevent document click from closing immediately
      profileDropdown.classList.toggle("hidden");
    });

    // Close dropdown if clicked outside
    document.addEventListener("click", function (event) {
      // Check if the click is outside both the button and the dropdown
      if (
        profileMenuButton && // Check if exists
        !profileMenuButton.contains(event.target) &&
        profileDropdown && // Check if exists
        !profileDropdown.contains(event.target)
      ) {
        profileDropdown.classList.add("hidden");
      }
    });
  }

  // Hide mobile menu on resize if it becomes desktop view
  // NOTE: Also duplicated from footer.php
  window.addEventListener("resize", function () {
    if (window.innerWidth >= 1024) {
      // Equivalent to Tailwind's 'lg' breakpoint
      if(navContent) navContent.classList.remove("hidden", "mobile-menu-active");
    } else {
      // Ensure the menu starts hidden on smaller screens unless explicitly opened
      if (navContent && !navContent.classList.contains("mobile-menu-active")) {
        navContent.classList.add("hidden");
      }
    }
  });

  // Grade update logic (MODIFIED)
  function updateGrade() {
    const grade = document.getElementById("user-grade").value;
    localStorage.setItem("user-grade", grade);
    
    // Use the modal function from footer.php if it exists, otherwise use the local one
    if(typeof showMessageBox === 'function') {
        showMessageBox(`Your current grade level has been set to: ${grade}.`);
    } else {
        showModal(
          "Grade Updated",
          `Your current grade level has been set to: ${grade}.`
        );
    }
    
    populateSkills(); // Repopulate skills when grade changes
    
    // --- ADDED FROM questionGenerator.js ---
    // Check if the function exists from the external file before calling it
    if (typeof loadQuestions === 'function') {
        loadQuestions(grade);
        // These global variables are defined in questionGenerator.js
        currentQuestionIndex = 0; 
        userAnswers = []; 
    }
    // --- END OF ADDED CODE ---
  }

  // --- Custom Modal Functions ---
  // These are local to this page, footer.php has its own (showMessageBox)
  const customModal = document.getElementById("customModal");
  const modalTitle = document.getElementById("modalTitle");
  const modalMessage = document.getElementById("modalMessage");
  const modalContentArea = document.getElementById("modalContentArea");
  const modalCloseButton = document.getElementById("modalCloseButton");

  function showModal(title, message, contentHtml = "") {
    if(!customModal) return; // Guard clause
    modalTitle.textContent = title;
    modalMessage.textContent = message;
    modalContentArea.innerHTML = contentHtml; // Set innerHTML for richer content
    customModal.classList.remove("hidden");
  }

  function closeModal() {
    if(!customModal) return; // Guard clause
    customModal.classList.add("hidden");
    modalContentArea.innerHTML = ""; // Clear content area on close
  }

  if(modalCloseButton) modalCloseButton.addEventListener("click", closeModal);

  // Close modal if clicked outside content
  if(customModal) {
    customModal.addEventListener("click", function (event) {
      if (event.target === customModal) {
        // Only close if clicking on the overlay itself
        closeModal();
      }
    });
  }

  // --- Data Structures for Skills ---
  // This massive object is kept from the original HTML
  const allSkills = {
    "Pre-K": {
      Math: [
        "Counting to 10",
        "Number Recognition (1-5)",
        "Number Recognition (6-10)",
        "Basic Shapes (Circle, Square, Triangle)",
        "Sorting and Classifying Objects",
        "Simple Patterns (AB, AAB)",
        "Comparing Quantities (More/Less/Same)",
        "Understanding Size (Big/Small)",
        "Positional Words (Above, Below, Next to)",
      ],
      "Language Arts": [
        "Letter Recognition (A-Z)",
        "Letter Sounds (Phonics Introduction)",
        "Rhyming Words",
        "Story Comprehension",
        "Listening to Stories",
        "Following Simple Directions",
        "Vocabulary Building (Common Objects)",
        "Name Writing Practice",
        "Recognizing Environmental Print",
      ],
      Science: [
        "Animal Identification",
        "Plant Parts",
        "Five Senses Exploration",
        "Weather Observation (Sunny, Rainy, Cloudy)",
        "Exploring Water and Sand",
        "Simple Experiments (Sink/Float)",
        "Day and Night",
        "Healthy Habits (Washing Hands, Brushing Teeth)",
        "Seasons and Changes",
      ],
      "Social Studies": [
        "My Family",
        "Community Helpers",
        "Classroom Rules and Routines",
        "Understanding Emotions",
        "Friendship and Sharing",
        "Celebrating Holidays and Traditions",
        "Recognizing Flags and Symbols",
        "Neighborhood Exploration",
        "Safety Rules (Home and School)",
      ],
    },

    "First Grade": {
      Math: [
        "Addition to 20",
        "Subtraction to 20",
        "Place Value (Tens/Ones)",
        "Counting to 120",
        "Skip Counting by 2s, 5s, 10s",
        "Comparing Numbers (Greater/Less)",
        "Word Problems (Addition/Subtraction)",
        "Understanding Equal Sign",
        "Measurement (Length, Weight, Capacity)",
        "Telling Time (Hour and Half Hour)",
        "Identifying Coins and Values",
        "Basic Geometry (2D/3D Shapes)",
        "Simple Graphs (Bar, Picture)",
      ],
      "Language Arts": [
        "Reading Simple Sentences",
        "Sentence Structure",
        "Punctuation (Periods, Question Marks, Exclamation Points)",
        "Phonics (Short and Long Vowels)",
        "Sight Words Recognition",
        "Story Retelling and Sequencing",
        "Comprehension Questions",
        "Writing Complete Sentences",
        "Capitalization Rules",
        "Nouns and Verbs",
        "Adjectives (Describing Words)",
        "Rhyming Words",
        "Listening and Speaking Skills",
      ],
      Science: [
        "Animal Habitats",
        "Weather Patterns",
        "Plant Life Cycle",
        "Basic Needs of Living Things",
        "Seasons and Changes",
        "Properties of Materials (Solid, Liquid, Gas)",
        "Observing the Sky (Sun, Moon, Stars)",
        "Five Senses",
        "Simple Experiments (Observation and Prediction)",
        "Recycling and Caring for Earth",
      ],
      "Social Studies": [
        "Maps and Globes",
        "Historical Figures",
        "Family and Community Roles",
        "School and Classroom Rules",
        "National Symbols (Flag, Pledge, Anthem)",
        "Holidays and Traditions",
        "Goods and Services",
        "Needs and Wants",
        "Timelines (Past, Present, Future)",
        "Geography (Landforms and Bodies of Water)",
        "Cultural Awareness",
        "Famous Landmarks",
      ],
    },

    "Second Grade": {
      Math: [
        "Addition and Subtraction within 100",
        "Place Value (Hundreds, Tens, Ones)",
        "Basic Multiplication (Arrays, Equal Groups)",
        "Fractions (Halves, Thirds, Quarters)",
        "Telling Time (Analog and Digital, to 5 minutes)",
        "Money (Identifying Coins, Counting Change)",
        "Measurement (Length, Weight, Volume)",
        "Simple Word Problems (Addition/Subtraction)",
        "Skip Counting (2s, 5s, 10s)",
        "Even and Odd Numbers",
        "Geometry (2D/3D Shapes, Sides, Vertices)",
        "Simple Bar and Picture Graphs",
        "Comparing Numbers (Greater Than, Less Than, Equal To)",
      ],
      "Language Arts": [
        "Reading Comprehension (Stories, Informational Texts)",
        "Identifying Main Idea and Details",
        "Sequencing Events in a Story",
        "Paragraph Writing (Topic Sentence, Supporting Details)",
        "Spelling Rules (Silent e, Plurals, Double Consonants)",
        "Phonics (Long and Short Vowels, Blends, Digraphs)",
        "Parts of Speech (Nouns, Verbs, Adjectives)",
        "Punctuation (Commas, Apostrophes, Quotation Marks)",
        "Writing Friendly Letters",
        "Synonyms and Antonyms",
        "Compound Words",
        "Contractions",
        "Retelling and Summarizing Stories",
        "Making Predictions and Inferences",
        "Listening and Speaking Skills",
      ],
      Science: [
        "States of Matter (Solid, Liquid, Gas)",
        "Simple Properties of Materials",
        "Life Cycles of Plants and Animals",
        "Habitats and Ecosystems",
        "Weather Patterns and Seasons",
        "Earth Materials (Rocks, Soil, Water)",
        "Simple Experiments (Observation, Prediction, Recording Data)",
        "Magnets and Forces",
        "Needs of Living Things",
        "Recycling and Conservation",
        "The Five Senses",
        "Sun, Moon, and Stars",
      ],
      "Social Studies": [
        "Local History and Community",
        "Civics Basics (Rules, Laws, Citizenship)",
        "Geography (Maps, Globes, Landforms)",
        "Famous Americans and Historical Figures",
        "National Symbols (Flag, Anthem, Landmarks)",
        "Holidays and Traditions",
        "Goods and Services",
        "Needs and Wants",
        "Timelines (Past, Present, Future)",
        "Community Helpers",
        "Government Roles (Mayor, President, etc.)",
        "Basic Economics (Spending, Saving, Earning)",
        "Diversity and Respect for Others",
      ],
    },

    "Third Grade": {
      Math: [
        "Multiplication Tables (0-10)",
        "Division Facts (0-10)",
        "Addition and Subtraction within 1,000",
        "Place Value (Thousands, Hundreds, Tens, Ones)",
        "Rounding to the Nearest 10 or 100",
        "Word Problems (Multiplication/Division)",
        "Fractions (Equal Parts, Simple Fractions, Number Line)",
        "Measurement (Length, Mass, Volume, Time to the Minute)",
        "Geometry (Perimeter, Area, Types of Angles, Polygons)",
        "Interpreting Bar Graphs and Pictographs",
        "Identifying and Describing 2D and 3D Shapes",
        "Patterns and Sequences",
      ],
      "Language Arts": [
        "Reading Comprehension (Fiction and Nonfiction)",
        "Identifying Main Idea and Supporting Details",
        "Summarizing Texts",
        "Informative Writing (Reports, Explanatory Texts)",
        "Opinion Writing (Stating and Supporting Opinions)",
        "Narrative Writing (Stories, Personal Narratives)",
        "Grammar (Nouns, Verbs, Adjectives, Pronouns, Adverbs)",
        "Subject-Verb Agreement",
        "Punctuation (Commas, Quotation Marks, Apostrophes)",
        "Capitalization Rules",
        "Poetry Analysis (Rhythm, Rhyme, Structure)",
        "Vocabulary Development (Prefixes, Suffixes, Context Clues)",
        "Spelling Patterns and Rules",
        "Using Reference Materials (Dictionary, Thesaurus)",
      ],
      Science: [
        "Forces and Motion (Pushes, Pulls, Gravity, Magnetism)",
        "Simple Machines (Levers, Pulleys, Inclined Planes)",
        "Solar System (Planets, Sun, Moon, Stars)",
        "Earth Science (Rocks, Soil, Water Cycle)",
        "Life Cycles of Plants and Animals",
        "Habitats and Adaptations",
        "Weather and Climate",
        "Scientific Investigation (Observation, Hypothesis, Experiment)",
        "Energy (Light, Heat, Sound)",
        "Environmental Awareness (Reduce, Reuse, Recycle)",
      ],
      "Social Studies": [
        "World Geography (Continents, Oceans, Maps, Globes)",
        "Ancient Civilizations (Egypt, Greece, Rome, China, Maya)",
        "Local and State History",
        "Civic Responsibility (Rules, Laws, Citizenship)",
        "Government (Branches, Leaders, Symbols)",
        "Economics (Producers, Consumers, Goods, Services, Barter)",
        "Cultural Traditions and Celebrations",
        "Timelines and Historical Events",
        "Famous People and Contributions",
        "Community Roles and Services",
        "Understanding Diversity and Respect",
      ],
    },

    "Fourth Grade": {
      Math: [
        "Multi-Digit Multiplication",
        "Long Division",
        "Understanding Place Value (Up to Millions)",
        "Addition and Subtraction of Large Numbers",
        "Decimal Introduction (Tenths and Hundredths)",
        "Comparing and Ordering Decimals",
        "Fractions (Equivalent, Comparing, Adding/Subtracting with Like Denominators)",
        "Mixed Numbers and Improper Fractions",
        "Measurement Conversion (Length, Weight, Capacity, Time)",
        "Area and Perimeter of Rectangles and Complex Shapes",
        "Geometry (Angles, Lines, Symmetry, Classifying Shapes)",
        "Interpreting Line Plots, Bar Graphs, and Frequency Tables",
        "Word Problems (Multi-Step, Real-World Contexts)",
      ],
      "Language Arts": [
        "Reading Comprehension (Fiction, Nonfiction, Poetry)",
        "Identifying Theme, Main Idea, and Supporting Details",
        "Summarizing and Paraphrasing Texts",
        "Making Inferences and Drawing Conclusions",
        "Narrative Writing (Personal and Imaginative Stories)",
        "Opinion Writing (Supporting with Reasons and Evidence)",
        "Expository/Informational Writing",
        "Research Skills (Using Multiple Sources, Note-Taking)",
        "Figurative Language (Simile, Metaphor, Idioms, Personification)",
        "Vocabulary Development (Prefixes, Suffixes, Context Clues)",
        "Grammar (Parts of Speech, Sentence Types, Subject-Verb Agreement)",
        "Punctuation (Quotation Marks, Commas, Apostrophes)",
        "Editing and Revising Writing",
      ],
      Science: [
        "Scientific Method (Observation, Hypothesis, Experiment, Conclusion)",
        "Electricity and Magnetism (Simple Circuits, Conductors/Insulators, Magnets)",
        "Geology (Rocks, Minerals, Erosion, Weathering, Soil Formation)",
        "Earth’s Resources (Renewable/Nonrenewable, Conservation)",
        "Water Cycle and Weather Patterns",
        "Ecosystems and Food Chains/Webs",
        "Animal and Plant Adaptations",
        "Human Body Systems (Digestive, Circulatory, Respiratory)",
        "Simple Machines (Levers, Pulleys, Inclined Planes)",
        "Energy Forms (Light, Sound, Heat, Motion)",
      ],
      "Social Studies": [
        "US Geography (States, Regions, Landforms, Map Skills)",
        "US History (Native Americans, Early Explorers, Colonization, Revolutionary War, Early America)",
        "Government Structure (Local, State, Federal; Branches of Government)",
        "Civic Responsibility and Citizenship",
        "Economics (Producers/Consumers, Goods/Services, Trade, Barter)",
        "Famous Americans and Historical Figures",
        "Cultural Diversity and Traditions",
        "Timelines and Chronological Order",
        "Current Events and News Literacy",
        "Symbols and Landmarks of the United States",
      ],
    },

    "Fifth Grade": {
      Math: [
        "Addition and Subtraction of Fractions (Unlike Denominators)",
        "Multiplication and Division of Fractions",
        "Decimals (Place Value, Addition, Subtraction, Multiplication, Division)",
        "Volume and Capacity (Cubic Units, Liquid Volume, Word Problems)",
        "Graphing Points on the Coordinate Plane (First Quadrant)",
        "Order of Operations (PEMDAS)",
        "Multi-Digit Multiplication and Division",
        "Interpreting and Creating Line Plots with Fractions",
        "Understanding and Comparing Large Numbers (Up to Millions)",
        "Measurement Conversion (Metric and Customary Units)",
        "Classifying 2D Shapes (Polygons, Triangles, Quadrilaterals)",
        "Understanding Patterns and Relationships",
        "Word Problems (Multi-Step, Real-World Contexts)",
      ],
      "Language Arts": [
        "Essay Writing (Opinion, Informative, Narrative)",
        "Literary Devices (Simile, Metaphor, Personification, Hyperbole)",
        "Public Speaking and Oral Presentations",
        "Reading Comprehension (Fiction, Nonfiction, Poetry)",
        "Identifying Theme, Main Idea, and Supporting Details",
        "Summarizing and Paraphrasing Texts",
        "Making Inferences and Drawing Conclusions",
        "Research Skills (Note-Taking, Using Multiple Sources, Citing Evidence)",
        "Grammar (Parts of Speech, Sentence Structure, Subject-Verb Agreement)",
        "Punctuation (Commas, Quotation Marks, Parentheses, Apostrophes)",
        "Vocabulary Development (Prefixes, Suffixes, Context Clues, Synonyms, Antonyms)",
        "Editing and Revising Writing",
        "Analyzing Characters, Setting, and Plot",
      ],
      Science: [
        "Chemistry Basics (Atoms, Molecules, States of Matter, Physical and Chemical Changes)",
        "Human Body Systems (Digestive, Circulatory, Respiratory, Nervous, Skeletal, Muscular)",
        "Ecosystems and Food Webs",
        "Earth and Space Science (Earth’s Layers, Plate Tectonics, Weathering, Erosion, Solar System)",
        "Scientific Method (Hypothesis, Experiment, Data Collection, Conclusion)",
        "Energy Forms and Transfer (Light, Sound, Heat, Electrical, Mechanical)",
        "Forces and Motion (Gravity, Friction, Magnetism)",
        "Adaptations and Survival",
        "Environmental Science (Conservation, Renewable/Nonrenewable Resources, Pollution)",
        "Life Cycles of Plants and Animals",
        "Weather and Climate Patterns",
      ],
      "Social Studies": [
        "World War II (Causes, Major Events, Key Figures, Impact)",
        "Current Events (News Literacy, Analyzing Sources, Global Awareness)",
        "U.S. History (Colonial America, Revolutionary War, Constitution, Westward Expansion, Civil War, Reconstruction)",
        "Geography (Continents, Oceans, U.S. States and Capitals, Map Skills, Latitude/Longitude)",
        "Civic Responsibility and Citizenship",
        "Government Structure (Branches, Local/State/Federal, Elections)",
        "Economics (Supply and Demand, Goods and Services, Trade, Barter, Currency)",
        "Cultural Diversity and Traditions",
        "Famous Americans and Historical Figures",
        "Timelines and Chronological Order",
        "Symbols and Landmarks of the United States",
        "Understanding Rights and Responsibilities",
      ],
    },

    "Sixth Grade": {
      Math: [
        "Ratios and Proportions",
        "Integers (Positive and Negative Numbers)",
        "Algebraic Expressions and Equations",
        "Order of Operations (PEMDAS)",
        "Fractions, Decimals, and Percents (Conversions, Operations)",
        "Greatest Common Factor and Least Common Multiple",
        "Coordinate Plane (Plotting Points, Quadrants)",
        "Area, Surface Area, and Volume (Rectangles, Prisms, Pyramids)",
        "Statistical Measures (Mean, Median, Mode, Range)",
        "Data Displays (Box Plots, Histograms, Dot Plots)",
        "Solving One-Step and Two-Step Equations",
        "Inequalities and Number Lines",
        "Introduction to Probability",
      ],
      "Language Arts": [
        "Research Papers (Planning, Drafting, Citing Sources)",
        "Argumentative Writing (Claims, Evidence, Counterarguments)",
        "Literary Genres (Fiction, Nonfiction, Poetry, Drama)",
        "Reading Comprehension (Main Idea, Details, Inference)",
        "Theme and Author’s Purpose",
        "Analyzing Characters, Setting, and Plot",
        "Figurative Language (Simile, Metaphor, Personification, Hyperbole)",
        "Grammar (Sentence Structure, Parts of Speech, Subject-Verb Agreement)",
        "Vocabulary Development (Prefixes, Suffixes, Context Clues)",
        "Summarizing and Paraphrasing Texts",
        "Public Speaking and Oral Presentations",
        "Editing and Revising Writing",
        "Citing Textual Evidence",
      ],
      Science: [
        "Cells and Genetics (Cell Structure, Function, DNA, Heredity)",
        "Astronomy (Solar System, Planets, Stars, Galaxies, Universe)",
        "Scientific Method (Hypothesis, Experiment, Data Analysis)",
        "Classification of Living Things (Kingdoms, Taxonomy)",
        "Ecosystems and Biomes (Food Webs, Energy Flow, Adaptations)",
        "Earth’s Structure (Layers, Plate Tectonics, Earthquakes, Volcanoes)",
        "Weather and Climate (Atmosphere, Water Cycle, Climate Zones)",
        "Forces and Motion (Newton’s Laws, Gravity, Friction)",
        "Energy Forms and Transfer (Thermal, Electrical, Light, Sound)",
        "Human Body Systems (Overview: Circulatory, Respiratory, Digestive, Nervous)",
      ],
      "Social Studies": [
        "Global Cultures (Customs, Traditions, Beliefs, World Religions)",
        "Economics Basics (Supply and Demand, Goods and Services, Trade, Currency)",
        "Ancient Civilizations (Mesopotamia, Egypt, Greece, Rome, China, India)",
        "Geography (Continents, Oceans, Latitude/Longitude, Map Skills)",
        "Government Systems (Democracy, Monarchy, Republic, Dictatorship)",
        "Civic Responsibility and Citizenship",
        "Historical Timelines and Chronology",
        "Current Events and Global Awareness",
        "Human Rights and Social Justice",
        "Migration and Population Patterns",
      ],
    },

    "Seventh Grade": {
      Math: [
        "Operations with Rational Numbers (Fractions, Decimals, Percents)",
        "Solving Linear Equations and Inequalities",
        "Proportional Relationships and Ratios",
        "Percent Problems (Tax, Discount, Markup, Tip)",
        "Scale Drawings and Geometric Constructions",
        "Area, Surface Area, and Volume of 2D and 3D Shapes",
        "Probability (Simple and Compound Events)",
        "Statistical Analysis (Mean, Median, Mode, Range, Outliers)",
        "Interpreting and Drawing Inferences from Data",
        "Graphing on the Coordinate Plane",
        "Understanding and Using Functions",
        "Pythagorean Theorem (Introduction)",
        "Word Problems (Multi-Step, Real-World Contexts)",
      ],
      "Language Arts": [
        "Critical Analysis of Fiction and Nonfiction Texts",
        "Debate Skills and Argumentative Writing",
        "Advanced Grammar (Clauses, Phrases, Sentence Structure)",
        "Literary Elements (Theme, Tone, Mood, Symbolism)",
        "Analyzing Author’s Purpose and Point of View",
        "Research Skills (Evaluating Sources, Note-Taking, Citing Evidence)",
        "Writing Essays (Narrative, Expository, Persuasive, Argumentative)",
        "Vocabulary Development (Greek/Latin Roots, Context Clues, Synonyms/Antonyms)",
        "Public Speaking and Oral Presentations",
        "Editing and Revising Writing",
        "Poetry Analysis and Creative Writing",
        "Summarizing and Paraphrasing",
        "Making Inferences and Drawing Conclusions",
      ],
      Science: [
        "Ecology (Ecosystems, Food Webs, Energy Flow, Biomes)",
        "Microbiology (Cells, Microorganisms, Disease, Microscopes)",
        "Scientific Method (Hypothesis, Experiment, Data Analysis, Conclusion)",
        "Genetics and Heredity (Traits, DNA, Punnett Squares)",
        "Human Body Systems (Skeletal, Muscular, Nervous, Circulatory, Digestive, Respiratory)",
        "Physical and Chemical Changes",
        "Matter and Its Properties (Atoms, Molecules, States of Matter)",
        "Earth Science (Rocks, Minerals, Plate Tectonics, Earthquakes, Volcanoes)",
        "Weather and Climate (Atmosphere, Water Cycle, Climate Zones)",
        "Forces and Motion (Newton’s Laws, Gravity, Friction, Simple Machines)",
        "Energy Forms and Transfer (Thermal, Electrical, Light, Sound)",
        "Environmental Science (Conservation, Pollution, Renewable/Nonrenewable Resources)",
      ],
      "Social Studies": [
        "Medieval History (Feudalism, Castles, Knights, The Middle Ages)",
        "Colonialism (Exploration, Colonization, Impact on Indigenous Peoples)",
        "World Geography (Continents, Oceans, Latitude/Longitude, Map Skills)",
        "Ancient Civilizations (Rome, China, India, Africa, Americas)",
        "Renaissance and Reformation",
        "Government Systems (Monarchy, Democracy, Republic, Dictatorship)",
        "Economics (Trade, Mercantilism, Supply and Demand, Currency)",
        "Civic Responsibility and Citizenship",
        "Historical Timelines and Chronology",
        "Cultural Diversity and Traditions",
        "Current Events and Global Awareness",
        "Human Rights and Social Justice",
        "Migration and Population Patterns",
      ],
    },

    "Eighth Grade": {
      Math: [
        "Linear Equations and Functions",
        "Systems of Equations (Graphing, Substitution, Elimination)",
        "Pythagorean Theorem and Its Applications",
        "Irrational Numbers and Square Roots",
        "Scientific Notation",
        "Exponents and Powers",
        "Solving and Graphing Inequalities",
        "Transformations (Translations, Rotations, Reflections, Dilations)",
        "Similarity and Congruence in Geometry",
        "Volume and Surface Area of Cylinders, Cones, and Spheres",
        "Scatter Plots and Data Analysis",
        "Bivariate Data and Linear Associations",
        "Problem Solving with Real-World Applications",
      ],
      "Language Arts": [
        "Expository Writing (Essays, Research Reports)",
        "Narrative Writing (Personal Narratives, Short Stories)",
        "Argumentative and Persuasive Writing",
        "Analyzing and Using Rhetorical Devices",
        "Poetry Analysis and Poetry Slam",
        "Literary Analysis (Theme, Character, Setting, Plot)",
        "Reading Comprehension (Fiction, Nonfiction, Drama, Poetry)",
        "Citing Textual Evidence",
        "Vocabulary Development (Greek/Latin Roots, Context Clues)",
        "Grammar (Sentence Structure, Phrases, Clauses, Verbals)",
        "Public Speaking and Oral Presentations",
        "Editing and Revising Writing",
        "Research Skills (Evaluating Sources, Note-Taking, Plagiarism Awareness)",
      ],
      Science: [
        "Physics Fundamentals (Motion, Forces, Newton’s Laws)",
        "Chemical Reactions (Types, Balancing Equations, Conservation of Mass)",
        "Properties of Matter (Elements, Compounds, Mixtures)",
        "Periodic Table and Atomic Structure",
        "Waves (Sound, Light, Electromagnetic Spectrum)",
        "Energy Forms and Transfer (Thermal, Electrical, Mechanical)",
        "Earth Science (Plate Tectonics, Earthquakes, Volcanoes)",
        "Ecology (Ecosystems, Food Webs, Human Impact)",
        "Genetics and Heredity (DNA, Traits, Punnett Squares)",
        "Scientific Method (Hypothesis, Experiment, Data Analysis, Conclusion)",
        "Lab Safety and Experimental Design",
      ],
      "Social Studies": [
        "U.S. History: Industrial Revolution (Inventions, Urbanization, Labor Movements)",
        "Civil War and Reconstruction",
        "Immigration and Social Change (Late 19th/Early 20th Century)",
        "World Wars I and II (Causes, Major Events, Impact)",
        "The Cold War (Origins, Major Events, End of the Cold War)",
        "Civil Rights Movement",
        "Government and Civics (Constitution, Amendments, Branches of Government)",
        "Economics (Supply and Demand, Market Structures, Globalization)",
        "Geography (Map Skills, Regions, Human-Environment Interaction)",
        "Contemporary Issues (Globalization, Technology, Environmental Challenges)",
        "Analyzing Primary and Secondary Sources",
        "Timelines and Chronological Thinking",
      ],
    },

    "Ninth Grade": {
      Math: [
        "Algebra I (Linear Equations, Inequalities, Graphing)",
        "Quadratic Equations (Factoring, Completing the Square, Quadratic Formula)",
        "Polynomials (Addition, Subtraction, Multiplication, Factoring)",
        "Functions (Domain, Range, Evaluating, Graphing)",
        "Systems of Equations (Substitution, Elimination, Graphical Solutions)",
        "Radicals and Exponents (Simplifying, Operations, Rational Exponents)",
        "Introduction to Trigonometry (Sine, Cosine, Tangent, Right Triangle Problems)",
        "Word Problems and Applications (Algebraic Modeling, Real-World Scenarios)",
        "Data Analysis (Mean, Median, Mode, Standard Deviation, Scatter Plots)",
        "Probability and Statistics (Basic Probability, Counting Principles, Data Interpretation)",
      ],
      "Language Arts": [
        "Literary Theory (Introduction to Literary Criticism, Major Schools of Thought)",
        "Dramatic Analysis (Reading and Analyzing Plays, Elements of Drama)",
        "Persuasive Speeches (Writing and Delivering Arguments, Rhetorical Devices)",
        "Reading Comprehension (Fiction, Nonfiction, Poetry, Drama)",
        "Essay Writing (Analytical, Expository, Persuasive, Narrative)",
        "Research Skills (Finding and Citing Sources, Avoiding Plagiarism)",
        "Vocabulary Development (Greek/Latin Roots, Context Clues, Academic Vocabulary)",
        "Grammar and Usage (Sentence Structure, Punctuation, Parts of Speech)",
        "Analyzing Theme, Character, Setting, and Plot",
        "Public Speaking and Oral Presentations",
      ],
      Science: [
        "Biology (Advanced) (Cell Structure and Function, Genetics, Evolution, Classification)",
        "Ecology (Advanced) (Ecosystems, Energy Flow, Biogeochemical Cycles, Human Impact)",
        "Scientific Method (Experimental Design, Data Analysis, Lab Safety)",
        "Chemistry Basics (Atoms, Molecules, Chemical Reactions, Periodic Table)",
        "Physics Introduction (Motion, Forces, Energy, Simple Machines)",
        "Earth and Space Science (Earth’s Structure, Plate Tectonics, Weather, Astronomy)",
        "Human Body Systems (Overview: Circulatory, Respiratory, Nervous, Digestive)",
        "Laboratory Skills (Microscope Use, Measurement, Data Recording)",
      ],
      "Social Studies": [
        "World History (Modern) (Renaissance to Present, Major Events and Movements)",
        "Political Science (Government Systems, Political Ideologies, Citizenship)",
        "Geography (World Regions, Physical and Human Geography, Map Skills)",
        "Economics (Supply and Demand, Market Structures, Globalization, Trade)",
        "Civic Responsibility (Rights and Duties, Community Involvement, Law)",
        "Contemporary Issues (Globalization, Technology, Environmental Challenges)",
        "Analyzing Primary and Secondary Sources",
        "Timelines and Chronological Thinking",
        "Cultural Diversity and Global Awareness",
      ],
    },

    "Tenth Grade": {
      Math: [
        "Geometry (Proofs, Theorems, Coordinate Geometry, Transformations)",
        "Circle Theorems (Arcs, Chords, Tangents, Inscribed Angles)",
        "Solid Geometry (Surface Area, Volume, 3D Figures)",
        "Trigonometry Basics (Sine, Cosine, Tangent, Right Triangle Applications)",
        "Algebra II (Quadratic Equations, Functions, Polynomials, Rational Expressions)",
        "Probability and Statistics (Permutations, Combinations, Data Analysis)",
        "Systems of Equations and Inequalities",
        "Sequences and Series (Arithmetic, Geometric)",
        "Complex Numbers (Introduction, Operations)",
        "Word Problems and Mathematical Modeling",
      ],
      "Language Arts": [
        "World Literature (Classical, Modern, Multicultural Texts)",
        "Literary Criticism (Major Schools, Critical Reading, Analysis)",
        "Research Methodology (Finding, Evaluating, Citing Sources)",
        "Analytical Essay Writing (Thesis, Evidence, Structure)",
        "Persuasive and Argumentative Writing",
        "Creative Writing (Short Stories, Poetry, Drama)",
        "Vocabulary Development (Greek/Latin Roots, Academic Vocabulary)",
        "Grammar and Usage (Advanced Sentence Structure, Punctuation, Diction)",
        "Public Speaking and Oral Presentations",
        "Literary Devices (Symbolism, Irony, Allusion, Imagery)",
        "Comparative Literature (Themes, Motifs, Cross-Cultural Analysis)",
        "Editing and Revising Writing",
      ],
      Science: [
        "Chemistry (Advanced) (Atomic Structure, Periodic Table, Chemical Bonding, Stoichiometry)",
        "Organic Chemistry (Hydrocarbons, Functional Groups, Reactions, Polymers)",
        "Physics (Mechanics, Energy, Waves, Electricity and Magnetism)",
        "Biology (Genetics, Evolution, Cell Biology, Ecology)",
        "Scientific Method (Experimental Design, Data Analysis, Lab Safety)",
        "Environmental Science (Ecosystems, Conservation, Human Impact)",
        "Earth and Space Science (Geology, Astronomy, Weather Systems)",
        "Laboratory Skills (Measurement, Data Collection, Analysis, Reporting)",
      ],
      "Social Studies": [
        "American History (Post-Civil War, Reconstruction, Industrialization, 20th Century)",
        "Sociology (Social Structures, Culture, Institutions, Social Change)",
        "World History (Modern Era, Global Conflicts, Decolonization, Contemporary Issues)",
        "Government and Civics (Constitution, Rights, Political Systems, Law)",
        "Economics (Microeconomics, Macroeconomics, Globalization, Trade)",
        "Geography (Physical and Human Geography, Map Skills, Demographics)",
        "Cultural Studies (Diversity, Identity, Globalization)",
        "Current Events and Media Literacy",
        "Research and Analysis of Primary/Secondary Sources",
        "Civic Responsibility and Community Engagement",
      ],
    },

    "Eleventh Grade": {
      Math: [
        "Pre-Calculus (Functions, Graphs, Limits)",
        "Trigonometry (Identities, Equations, Applications)",
        "Vectors (Operations, Applications, Dot and Cross Product)",
        "Matrices (Addition, Multiplication, Determinants, Inverses)",
        "Complex Numbers (Arithmetic, Polar Form, De Moivre's Theorem)",
        "Sequences and Series (Arithmetic, Geometric, Sigma Notation)",
        "Probability and Statistics (Combinatorics, Probability Distributions, Data Analysis)",
        "Analytic Geometry (Conic Sections, Parametric Equations)",
        "Mathematical Modeling (Real-World Applications, Problem Solving)",
        "Introduction to Calculus (Derivatives, Integrals, Applications)",
      ],
      "Language Arts": [
        "British Literature (Shakespeare, Romanticism, Victorian Era, Modernism)",
        "World Literature (Major Works from Europe, Asia, Africa, Americas)",
        "Literary Movements (Realism, Modernism, Postmodernism, Existentialism)",
        "Creative Writing (Short Stories, Poetry, Drama, Personal Essays)",
        "Research Papers (Thesis Development, MLA/APA Citation, Source Evaluation)",
        "Rhetorical Analysis (Speeches, Essays, Persuasive Techniques)",
        "Advanced Grammar and Syntax (Sentence Structure, Diction, Voice)",
        "Public Speaking and Oral Presentations",
        "Literary Criticism (Major Schools, Critical Approaches)",
        "SAT/ACT Reading and Writing Preparation",
      ],
      Science: [
        "Physics (Advanced) (Mechanics, Electricity and Magnetism, Waves, Optics)",
        "Quantum Physics (Introduction to Quantum Theory, Wave-Particle Duality, Atomic Models)",
        "Chemistry (Organic, Inorganic, Thermodynamics, Chemical Equilibrium)",
        "Biology (Genetics, Evolution, Cell Biology, Human Physiology)",
        "Environmental Science (Ecosystems, Conservation, Human Impact)",
        "Scientific Method (Experimental Design, Data Analysis, Lab Safety)",
        "Astronomy (Stars, Galaxies, Cosmology, Space Exploration)",
        "Engineering Principles (Basic Circuits, Materials Science, Design Process)",
        "AP/IB Science Preparation (Exam Strategies, Lab Skills)",
      ],
      "Social Studies": [
        "European History (Renaissance, Enlightenment, Industrial Revolution, World Wars, Modern Europe)",
        "International Relations (Diplomacy, Global Organizations, Treaties, Conflict Resolution)",
        "U.S. Government and Politics (Constitution, Federalism, Political Parties, Elections)",
        "Economics (Microeconomics, Macroeconomics, Globalization, Trade Policy)",
        "Sociology (Social Structures, Culture, Social Change, Inequality)",
        "Psychology (Development, Cognition, Behavior, Mental Health)",
        "Contemporary Issues (Globalization, Human Rights, Environmental Policy)",
        "Geography (Political, Economic, Cultural, Physical Geography)",
        "Civic Engagement (Community Service, Advocacy, Policy Analysis)",
        "AP/IB Social Studies Preparation (Essay Writing, Source Analysis, Exam Skills)",
      ],
    },

    "Twelfth Grade": {
      Math: [
        "Calculus (Limits, Derivatives, Integrals, Applications)",
        "Differential Equations (First and Second Order, Applications)",
        "Linear Algebra (Matrices, Vectors, Determinants, Eigenvalues)",
        "Probability and Statistics (Distributions, Hypothesis Testing, Regression)",
        "Advanced Trigonometry (Identities, Equations, Applications)",
        "Mathematical Modeling (Real-World Problems, Optimization)",
        "Discrete Mathematics (Logic, Set Theory, Combinatorics, Graph Theory)",
        "Complex Numbers (Arithmetic, Polar Form, De Moivre's Theorem)",
        "Sequences and Series (Convergence, Power Series, Taylor Series)",
        "Multivariable Calculus (Partial Derivatives, Multiple Integrals, Vector Calculus)",
      ],
      "Language Arts": [
        "Contemporary Literature (Modern Novels, Plays, Poetry, Nonfiction)",
        "Literary Adaptation (Film, Theater, Media Analysis)",
        "Thesis Writing (Research, Argumentation, Structure, Citations)",
        "Rhetorical Analysis (Speeches, Essays, Persuasive Techniques)",
        "Advanced Composition (Analytical, Expository, Persuasive, Narrative Essays)",
        "World Literature (Global Voices, Cross-Cultural Themes)",
        "Creative Writing (Short Stories, Poetry, Drama, Memoir)",
        "Public Speaking and Oral Presentations",
        "Literary Criticism (Major Theories, Critical Approaches)",
        "Editing and Revising (Peer Review, Self-Editing, Publication Preparation)",
      ],
      Science: [
        "Advanced Biology (Genetics, Evolution, Biotechnology, Human Physiology)",
        "Biochemistry (Macromolecules, Enzymes, Metabolism, Molecular Genetics)",
        "Physics (Mechanics, Electricity and Magnetism, Modern Physics, Quantum Theory)",
        "Chemistry (Organic, Inorganic, Thermodynamics, Chemical Equilibrium)",
        "Environmental Science (Ecosystems, Conservation, Climate Change, Sustainability)",
        "Anatomy and Physiology (Body Systems, Health, Disease)",
        "Scientific Research Methods (Experimental Design, Data Analysis, Lab Safety)",
        "Astronomy (Stars, Galaxies, Cosmology, Space Exploration)",
        "AP/IB Science Preparation (Exam Strategies, Lab Skills)",
        "Engineering Principles (Design Process, Materials Science, Robotics)",
      ],
      "Social Studies": [
        "Current Global Issues (Politics, Economics, Environment, Technology, Human Rights)",
        "Philosophy (Ethics, Logic, Major Philosophers, Worldviews)",
        "Government and Civics (Constitution, Law, Political Systems, Policy Analysis)",
        "Economics (Microeconomics, Macroeconomics, Globalization, Trade Policy)",
        "Sociology (Social Structures, Culture, Social Change, Inequality)",
        "Psychology (Development, Cognition, Behavior, Mental Health)",
        "World History (Modern Era, Global Conflicts, Decolonization, Contemporary Issues)",
        "International Relations (Diplomacy, Global Organizations, Conflict Resolution)",
        "Geography (Political, Economic, Cultural, Physical Geography)",
        "Civic Engagement (Community Service, Advocacy, Policy Analysis, Media Literacy)",
      ],
    },
  };

  // --- Dynamic Skill Sections ---
  function populateSkills() {
    const skillLevel = document.getElementById("skill-level").value;
    const topic = document.getElementById("topic").value;
    const skillsContainer = document.getElementById("skills-container");

    // Clear previous content
    skillsContainer.innerHTML = "";

    const skillsForLevel = allSkills[skillLevel];
    if (!skillsForLevel) {
      skillsContainer.innerHTML =
        '<p class="text-gray-600 text-center">No skills available for this grade level.</p>';
      return;
    }

    let filteredSkills = {};

    if (topic === "All Topics") {
      filteredSkills = skillsForLevel;
    } else {
      if (skillsForLevel[topic]) {
        filteredSkills[topic] = skillsForLevel[topic];
      } else {
        skillsContainer.innerHTML = `<p class="text-gray-600 text-center">No skills found for "${topic}" in "${skillLevel}".</p>`;
        return;
      }
    }

    for (const subj in filteredSkills) {
      const subjectSection = document.createElement("div");
      subjectSection.className = "mb-8";
      subjectSection.innerHTML = `<h3 class="text-xl font-bold text-gray-800 mb-4">${subj} Skills:</h3>`;

      const skillsGrid = document.createElement("div");
      skillsGrid.className =
        "grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4";

      filteredSkills[subj].forEach((skill) => {
        const skillDiv = document.createElement("div");
        skillDiv.className =
          "bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md transition duration-200 cursor-pointer text-gray-800 skill-item";
        skillDiv.textContent = skill;
        skillDiv.dataset.skillName = skill; // Store skill name for activity tracking
        skillsGrid.appendChild(skillDiv);
      });
      subjectSection.appendChild(skillsGrid);
      skillsContainer.appendChild(subjectSection);
    }
  }

  // --- Data Structure for Questions (REMOVED) ---
  // This section is now handled by questionGenerator.js

  // --- Question Generator Functions (REMOVED) ---
  // This section is now handled by questionGenerator.js

  // --- Recent Activity Tracking & Initial Load ---
  document.addEventListener("DOMContentLoaded", () => {
    const skillsContainer = document.getElementById("skills-container");
    const recentActivityList = document.getElementById(
      "recent-activity-list"
    );

    // Initialize skills on page load
    populateSkills();
    // loadQuestion() call removed - questionGenerator.js handles this

    // Event listener for skill clicks (Kept from original HTML)
    if(skillsContainer) { // Added check
      skillsContainer.addEventListener("click", (event) => {
        if (event.target.classList.contains("skill-item")) {
          // Ensure it's a clickable skill item
          const skillClicked = event.target.dataset.skillName;

          const newActivity = document.createElement("li");
          newActivity.className = "p-2 bg-gray-50 rounded-md"; // Apply Tailwind classes
          newActivity.textContent = `Clicked on skill: "${skillClicked}"`;

          // Add to the top of the list
          if (recentActivityList && recentActivityList.firstChild) {
            recentActivityList.insertBefore(
              newActivity,
              recentActivityList.firstChild
            );
          } else if (recentActivityList) {
            recentActivityList.appendChild(newActivity);
          }

          // Optional: Limit the number of recent activities to prevent list from growing too long
          const maxActivities = 5;
          if(recentActivityList) {
            while (recentActivityList.children.length > maxActivities) {
              recentActivityList.removeChild(recentActivityList.lastChild);
            }
          }
        }
      });
    }

    // Event listener for "Next Question" button (REMOVED)
    // Event listener for "Download Answers" button (REMOVED)
    // Both are now handled by questionGenerator.js
  });
</script>

<!-- These scripts were at the bottom of assessment.html and are required for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="JS/questionGenerator.js"></script>

<!-- 
  END: Page-specific scripts
-->


<?php
  // Include the footer
  include 'src/footer.php';
?>