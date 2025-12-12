// State Management
let currentQuestions = [];
let currentQuestionIndex = 0;
let score = 0;
let streak = 0;
let userAnswers = [];

// Expanded Database of Questions
const questionBank = [
    // ==================== PRE-K ====================
    { grade: "Pre-K", subject: "Math", question: "Which number comes after 2?", options: ["1", "3", "4", "5"], answer: "3", hint: "Count: 1, 2, ..." },
    { grade: "Pre-K", subject: "Math", question: "Which shape is round?", options: ["Square", "Circle", "Triangle", "Star"], answer: "Circle", hint: "It looks like a ball." },
    { grade: "Pre-K", subject: "Math", question: "How many fingers do you have on one hand?", options: ["4", "5", "10", "2"], answer: "5", hint: "Count your fingers." },
    { grade: "Pre-K", subject: "Language Arts", question: "What letter does 'Apple' start with?", options: ["A", "B", "C", "D"], answer: "A", hint: "Ah-ah-apple." },
    { grade: "Pre-K", subject: "Language Arts", question: "Which word rhymes with 'Cat'?", options: ["Dog", "Bat", "Fish", "Ball"], answer: "Bat", hint: "They sound similar." },
    { grade: "Pre-K", subject: "Science", question: "What shines in the sky during the day?", options: ["Moon", "Sun", "Stars", "Lamp"], answer: "Sun", hint: "It is very bright and hot." },
    { grade: "Pre-K", subject: "Social Studies", question: "Who helps us when we are sick?", options: ["Firefighter", "Doctor", "Baker", "Farmer"], answer: "Doctor", hint: "They work at a hospital." },

    // ==================== KINDERGARTEN ====================
    { grade: "Kindergarten", subject: "Math", question: "What is 2 + 3?", options: ["4", "5", "6", "1"], answer: "5", hint: "Count on your fingers." },
    { grade: "Kindergarten", subject: "Math", question: "Which number is ten?", options: ["1", "5", "10", "01"], answer: "10", hint: "It has a 1 and a 0." },
    { grade: "Kindergarten", subject: "Language Arts", question: "What is the opposite of 'Up'?", options: ["Left", "Down", "Right", "Over"], answer: "Down", hint: "Look at the floor." },
    { grade: "Kindergarten", subject: "Science", question: "What do plants need to grow?", options: ["Candy", "Water", "Toys", "Juice"], answer: "Water", hint: "Rain helps them." },
    { grade: "Kindergarten", subject: "Social Studies", question: "Who delivers the mail?", options: ["Doctor", "Mail Carrier", "Police Officer", "Chef"], answer: "Mail Carrier", hint: "They bring letters." },

    // ==================== 1ST GRADE ====================
    { grade: "First Grade", subject: "Math", question: "Which number is greater: 15 or 51?", options: ["15", "51", "Equal", "0"], answer: "51", hint: "Look at the tens place." },
    { grade: "First Grade", subject: "Math", question: "How many sides does a triangle have?", options: ["3", "4", "5", "2"], answer: "3", hint: "Tri means three." },
    { grade: "First Grade", subject: "Language Arts", question: "Identify the verb: 'The dog ran fast.'", options: ["Dog", "Ran", "Fast", "The"], answer: "Ran", hint: "It is the action word." },
    { grade: "First Grade", subject: "Science", question: "Which animal lays eggs?", options: ["Dog", "Cat", "Chicken", "Cow"], answer: "Chicken", hint: "It is a bird." },
    { grade: "First Grade", subject: "Social Studies", question: "What is a community?", options: ["A toy", "A place where people live", "A type of food", "A sport"], answer: "A place where people live", hint: "Like your town." },

    // ==================== 2ND GRADE ====================
    { grade: "Second Grade", subject: "Math", question: "What is 100 - 10?", options: ["80", "90", "110", "95"], answer: "90", hint: "Count back by ten." },
    { grade: "Second Grade", subject: "Math", question: "How many cents are in a quarter?", options: ["10", "5", "25", "50"], answer: "25", hint: "Quarter dollar." },
    { grade: "Second Grade", subject: "Language Arts", question: "What is the plural of 'Child'?", options: ["Childs", "Children", "Childrens", "Kids"], answer: "Children", hint: "Irregular plural." },
    { grade: "Second Grade", subject: "Science", question: "What tool measures temperature?", options: ["Ruler", "Thermometer", "Scale", "Clock"], answer: "Thermometer", hint: "Thermo means heat." },
    { grade: "Second Grade", subject: "Social Studies", question: "What shows us North, South, East, and West?", options: ["Compass", "Ruler", "Clock", "Scale"], answer: "Compass", hint: "Points North." },

    // ==================== 3RD GRADE ====================
    { grade: "Third Grade", subject: "Math", question: "What is 7 x 8?", options: ["54", "56", "64", "48"], answer: "56", hint: "5, 6, 7, 8... 56." },
    { grade: "Third Grade", subject: "Math", question: "Perimeter of a square with side 4?", options: ["8", "12", "16", "20"], answer: "16", hint: "Add all 4 sides." },
    { grade: "Third Grade", subject: "Language Arts", question: "Which word is an adjective?", options: ["Run", "Beautiful", "Boy", "Quickly"], answer: "Beautiful", hint: "Describes a noun." },
    { grade: "Third Grade", subject: "Science", question: "Center of our solar system?", options: ["Earth", "Mars", "The Sun", "The Moon"], answer: "The Sun", hint: "Planets orbit it." },
    { grade: "Third Grade", subject: "Social Studies", question: "What represents a country?", options: ["A Map", "A Flag", "A Tree", "A River"], answer: "A Flag", hint: "Colors and symbols." },

    // ==================== 4TH GRADE ====================
    { grade: "Fourth Grade", subject: "Math", question: "What is 1/2 + 1/4?", options: ["3/4", "2/6", "1/8", "2/4"], answer: "3/4", hint: "Convert 1/2 to 2/4." },
    { grade: "Fourth Grade", subject: "Math", question: "What angle is 90 degrees?", options: ["Acute", "Obtuse", "Right", "Straight"], answer: "Right", hint: "Like a square corner." },
    { grade: "Fourth Grade", subject: "Language Arts", question: "Correct homophone: 'I ___ the ball.'", options: ["Threw", "Through", "True", "Thorough"], answer: "Threw", hint: "Past tense of throw." },
    { grade: "Fourth Grade", subject: "Science", question: "State of matter of ice?", options: ["Liquid", "Gas", "Solid", "Plasma"], answer: "Solid", hint: "Hard and cold." },
    { grade: "Fourth Grade", subject: "Social Studies", question: "Branch that makes laws?", options: ["Executive", "Judicial", "Legislative", "Police"], answer: "Legislative", hint: "Congress." },

    // ==================== 5TH GRADE ====================
    { grade: "Fifth Grade", subject: "Math", question: "Volume of cube with side 3cm?", options: ["27 cm³", "9 cm³", "18 cm³", "81 cm³"], answer: "27 cm³", hint: "3 x 3 x 3." },
    { grade: "Fifth Grade", subject: "Math", question: "Order of Ops: 2 + 3 x 4 = ?", options: ["14", "20", "24", "10"], answer: "14", hint: "Multiply first." },
    { grade: "Fifth Grade", subject: "Language Arts", question: "Main idea of a story?", options: ["Theme", "Plot", "Setting", "Character"], answer: "Theme", hint: "The message." },
    { grade: "Fifth Grade", subject: "Science", question: "Photosynthesis needs sunlight, water, and ___?", options: ["Carbon Dioxide", "Oxygen", "Sugar", "Nitrogen"], answer: "Carbon Dioxide", hint: "Plants breathe it in." },
    { grade: "Fifth Grade", subject: "Social Studies", question: "First President of USA?", options: ["Washington", "Lincoln", "Jefferson", "Adams"], answer: "Washington", hint: "On the dollar bill." },

    // ==================== 6TH GRADE (Middle School Start) ====================
    // Math (Ratios, Stats, Early Algebra)
    { grade: "Sixth Grade", subject: "Math", question: "If the ratio of boys to girls is 2:3 and there are 12 girls, how many boys?", options: ["6", "8", "9", "10"], answer: "8", hint: "2/3 = x/12." },
    { grade: "Sixth Grade", subject: "Math", question: "What is the mean of 2, 4, and 9?", options: ["5", "4", "6", "15"], answer: "5", hint: "Sum divided by count." },
    { grade: "Sixth Grade", subject: "Math", question: "Solve for x: 3x = 15", options: ["3", "5", "12", "45"], answer: "5", hint: "Divide by 3." },
    // ELA
    { grade: "Sixth Grade", subject: "Language Arts", question: "Which point of view uses 'I' and 'Me'?", options: ["First Person", "Second Person", "Third Person", "Omniscient"], answer: "First Person", hint: "The narrator is speaking." },
    { grade: "Sixth Grade", subject: "Language Arts", question: "What is the climax of a story?", options: ["The beginning", "The turning point", "The end", "The setting"], answer: "The turning point", hint: "Highest tension." },
    // Science (Earth Science, Cells)
    { grade: "Sixth Grade", subject: "Science", question: "What is the basic unit of life?", options: ["Atom", "Cell", "Tissue", "Organ"], answer: "Cell", hint: "Microscopic building block." },
    { grade: "Sixth Grade", subject: "Science", question: "Which layer of Earth is liquid metal?", options: ["Crust", "Mantle", "Outer Core", "Inner Core"], answer: "Outer Core", hint: "Generates magnetic field." },
    // Social Studies (Ancient Civs)
    { grade: "Sixth Grade", subject: "Social Studies", question: "Which civilization built the pyramids?", options: ["Romans", "Greeks", "Egyptians", "Mayans"], answer: "Egyptians", hint: "Nile River valley." },
    { grade: "Sixth Grade", subject: "Social Studies", question: "What is a democracy?", options: ["Rule by one", "Rule by the people", "Rule by army", "Rule by rich"], answer: "Rule by the people", hint: "Demos means people." },

    // ==================== 7TH GRADE ====================
    // Math (Proportions, Integers)
    { grade: "Seventh Grade", subject: "Math", question: "What is -5 + 8?", options: ["3", "-3", "13", "-13"], answer: "3", hint: "Start at -5, go up 8." },
    { grade: "Seventh Grade", subject: "Math", question: "What is the area of a circle with radius 3? (π≈3.14)", options: ["9.42", "28.26", "18.84", "6"], answer: "28.26", hint: "πr²." },
    // ELA
    { grade: "Seventh Grade", subject: "Language Arts", question: "What is a stanza?", options: ["A paragraph in a poem", "A type of rhyme", "A character", "A play"], answer: "A paragraph in a poem", hint: "Grouping of lines." },
    { grade: "Seventh Grade", subject: "Language Arts", question: "Identify the preposition: 'The cat is under the table.'", options: ["Cat", "Is", "Under", "Table"], answer: "Under", hint: "Shows relationship/position." },
    // Science (Life Science)
    { grade: "Seventh Grade", subject: "Science", question: "Which organelle is the 'powerhouse' of the cell?", options: ["Nucleus", "Mitochondria", "Ribosome", "Vacuole"], answer: "Mitochondria", hint: "Makes energy (ATP)." },
    { grade: "Seventh Grade", subject: "Science", question: "What is the process of water turning to gas?", options: ["Condensation", "Evaporation", "Precipitation", "Freezing"], answer: "Evaporation", hint: "Heat causes it." },
    // Social Studies (World History/Geography)
    { grade: "Seventh Grade", subject: "Social Studies", question: "Which continent is the Sahara Desert in?", options: ["Asia", "Africa", "South America", "Australia"], answer: "Africa", hint: "The North part." },
    { grade: "Seventh Grade", subject: "Social Studies", question: "What was the Silk Road?", options: ["A paved highway", "Trade routes", "A silk factory", "A myth"], answer: "Trade routes", hint: "Connected East and West." },

    // ==================== 8TH GRADE ====================
    // Math (Pre-Algebra/Geometry)
    { grade: "Eighth Grade", subject: "Math", question: "What is the slope of y = 2x + 5?", options: ["2", "5", "x", "7"], answer: "2", hint: "y = mx + b." },
    { grade: "Eighth Grade", subject: "Math", question: "Pythagorean Theorem: If a=3, b=4, what is c?", options: ["5", "6", "7", "25"], answer: "5", hint: "a² + b² = c²." },
    // ELA
    { grade: "Eighth Grade", subject: "Language Arts", question: "What is irony?", options: ["A metal", "The opposite of what is expected", "A comparison", "A rhyme"], answer: "The opposite of what is expected", hint: "Unexpected outcome." },
    { grade: "Eighth Grade", subject: "Language Arts", question: "Which sentence is active voice?", options: ["The cake was eaten by me.", "I ate the cake.", "The cake was tasty.", "Eating is fun."], answer: "I ate the cake.", hint: "Subject does the action." },
    // Science (Physical Science)
    { grade: "Eighth Grade", subject: "Science", question: "Newton's First Law is also known as the Law of ___?", options: ["Gravity", "Inertia", "Force", "Motion"], answer: "Inertia", hint: "Objects stay at rest." },
    { grade: "Eighth Grade", subject: "Science", question: "What is the pH of a neutral substance?", options: ["1", "7", "14", "0"], answer: "7", hint: "Water is neutral." },
    // Social Studies (US History)
    { grade: "Eighth Grade", subject: "Social Studies", question: "Which war freed the slaves in the US?", options: ["Revolutionary War", "Civil War", "WWI", "War of 1812"], answer: "Civil War", hint: "North vs South." },
    { grade: "Eighth Grade", subject: "Social Studies", question: "Who wrote the Declaration of Independence?", options: ["Washington", "Jefferson", "Hamilton", "Franklin"], answer: "Jefferson", hint: "3rd President." },

    // ==================== 9TH GRADE (Freshman) ====================
    // Math (Algebra 1)
    { grade: "Ninth Grade", subject: "Math", question: "Factor: x² - 9", options: ["(x-3)(x-3)", "(x+3)(x-3)", "(x+9)(x-9)", "(x-9)(x+1)"], answer: "(x+3)(x-3)", hint: "Difference of squares." },
    { grade: "Ninth Grade", subject: "Math", question: "What is the quadratic formula?", options: ["-b ± √(b²-4ac) / 2a", "a² + b² = c²", "y = mx + b", "E = mc²"], answer: "-b ± √(b²-4ac) / 2a", hint: "Solves ax² + bx + c = 0." },
    // ELA
    { grade: "Ninth Grade", subject: "Language Arts", question: "Who wrote 'Romeo and Juliet'?", options: ["Dickens", "Shakespeare", "Twain", "Hemingway"], answer: "Shakespeare", hint: "The Bard." },
    { grade: "Ninth Grade", subject: "Language Arts", question: "What is a hyperbole?", options: ["An extreme exaggeration", "A geometric shape", "A type of poem", "A question"], answer: "An extreme exaggeration", hint: "I'm so hungry I could eat a horse." },
    // Science (Biology)
    { grade: "Ninth Grade", subject: "Science", question: "What molecule carries genetic information?", options: ["RNA", "DNA", "Protein", "Lipid"], answer: "DNA", hint: "Double helix." },
    { grade: "Ninth Grade", subject: "Science", question: "What is the process of cell division called?", options: ["Meiosis", "Mitosis", "Osmosis", "Diffusion"], answer: "Mitosis", hint: "Creates identical cells." },
    // Social Studies (World Geography)
    { grade: "Ninth Grade", subject: "Social Studies", question: "What is the longest river in the world?", options: ["Amazon", "Nile", "Mississippi", "Yangtze"], answer: "Nile", hint: "In Egypt." },
    { grade: "Ninth Grade", subject: "Social Studies", question: "What is the study of human populations?", options: ["Geography", "Demography", "Cartography", "Geology"], answer: "Demography", hint: "Demo means people." },

    // ==================== 10TH GRADE (Sophomore) ====================
    // Math (Geometry)
    { grade: "Tenth Grade", subject: "Math", question: "Sum of interior angles of a triangle?", options: ["90°", "180°", "360°", "270°"], answer: "180°", hint: "A straight line." },
    { grade: "Tenth Grade", subject: "Math", question: "Calculate the volume of a sphere (r=3).", options: ["36π", "12π", "100", "27π"], answer: "36π", hint: "4/3 πr³." },
    // ELA
    { grade: "Tenth Grade", subject: "Language Arts", question: "What is the 'thesis' of an essay?", options: ["The first sentence", "The main argument", "The conclusion", "The title"], answer: "The main argument", hint: "What you are proving." },
    { grade: "Tenth Grade", subject: "Language Arts", question: "Who wrote 'To Kill a Mockingbird'?", options: ["Harper Lee", "Mark Twain", "Steinbeck", "Orwell"], answer: "Harper Lee", hint: "Scout and Atticus." },
    // Science (Chemistry)
    { grade: "Tenth Grade", subject: "Science", question: "What is the chemical symbol for Gold?", options: ["Go", "Gd", "Au", "Ag"], answer: "Au", hint: "Aurum." },
    { grade: "Tenth Grade", subject: "Science", question: "What type of bond involves sharing electrons?", options: ["Ionic", "Covalent", "Hydrogen", "Metallic"], answer: "Covalent", hint: "Co-operation." },
    // Social Studies (World History)
    { grade: "Tenth Grade", subject: "Social Studies", question: "Which event started WWI?", options: ["Invasion of Poland", "Assassination of Archduke Ferdinand", "Bombing of Pearl Harbor", "Fall of Berlin Wall"], answer: "Assassination of Archduke Ferdinand", hint: "Sarajevo, 1914." },
    { grade: "Tenth Grade", subject: "Social Studies", question: "Who was the leader of Nazi Germany?", options: ["Mussolini", "Hitler", "Stalin", "Churchill"], answer: "Hitler", hint: "WWII dictator." },

    // ==================== 11TH GRADE (Junior) ====================
    // Math (Algebra 2 / Trig)
    { grade: "Eleventh Grade", subject: "Math", question: "What is log(100)?", options: ["1", "2", "10", "0"], answer: "2", hint: "10 to what power is 100?" },
    { grade: "Eleventh Grade", subject: "Math", question: "What is sin(30°)?", options: ["0", "0.5", "1", "√3/2"], answer: "0.5", hint: "1/2." },
    // ELA (American Lit)
    { grade: "Eleventh Grade", subject: "Language Arts", question: "Which period emphasized nature and self-reliance?", options: ["Realism", "Transcendentalism", "Modernism", "Puritanism"], answer: "Transcendentalism", hint: "Thoreau and Emerson." },
    { grade: "Eleventh Grade", subject: "Language Arts", question: "What does 'The Great Gatsby' critique?", options: ["The American Dream", "War", "Slavery", "Technology"], answer: "The American Dream", hint: "Jazz Age excess." },
    // Science (Physics)
    { grade: "Eleventh Grade", subject: "Science", question: "Force equals Mass times ___?", options: ["Velocity", "Acceleration", "Gravity", "Energy"], answer: "Acceleration", hint: "F=ma." },
    { grade: "Eleventh Grade", subject: "Science", question: "What is the unit of energy?", options: ["Watt", "Joule", "Newton", "Volt"], answer: "Joule", hint: "J." },
    // Social Studies (US History Modern)
    { grade: "Eleventh Grade", subject: "Social Studies", question: "What was the Cold War?", options: ["A winter battle", "Tension between US and USSR", "War in Antarctica", "Trade war"], answer: "Tension between US and USSR", hint: "Communism vs Capitalism." },
    { grade: "Eleventh Grade", subject: "Social Studies", question: "Which amendment gave women the vote?", options: ["13th", "19th", "21st", "1st"], answer: "19th", hint: "1920." },

    // ==================== 12TH GRADE (Senior) ====================
    // Math (Calculus / Stats)
    { grade: "Twelfth Grade", subject: "Math", question: "What is the derivative of x²?", options: ["x", "2x", "x²", "1"], answer: "2x", hint: "Power rule." },
    { grade: "Twelfth Grade", subject: "Math", question: "In stats, what is the 'mode'?", options: ["Average", "Middle value", "Most frequent", "Range"], answer: "Most frequent", hint: "Appears the most." },
    { grade: "Twelfth Grade", subject: "Math", question: "Evaluate: Integral of 2x dx", options: ["x² + C", "2x²", "2", "x"], answer: "x² + C", hint: "Reverse power rule." },
    // ELA (British/World Lit)
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Who wrote 'Hamlet'?", options: ["Chaucer", "Shakespeare", "Milton", "Austen"], answer: "Shakespeare", hint: "To be or not to be." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "What is a dystopia?", options: ["A perfect world", "A nightmare society", "A dream", "A comedy"], answer: "A nightmare society", hint: "Like '1984'." },
    { grade: "Twelfth Grade", subject: "Language Arts", question: "Who wrote '1984'?", options: ["Huxley", "Orwell", "Bradbury", "Golding"], answer: "Orwell", hint: "Big Brother." },
    // Science (Advanced / Environmental)
    { grade: "Twelfth Grade", subject: "Science", question: "What gas is the primary driver of climate change?", options: ["Oxygen", "Carbon Dioxide", "Nitrogen", "Argon"], answer: "Carbon Dioxide", hint: "Greenhouse gas." },
    { grade: "Twelfth Grade", subject: "Science", question: "What is the speed of light?", options: ["300 m/s", "3 x 10⁸ m/s", "Sound speed", "Infinite"], answer: "3 x 10⁸ m/s", hint: "c." },
    // Social Studies (Gov / Econ)
    { grade: "Twelfth Grade", subject: "Social Studies", question: "How many Supreme Court Justices are there?", options: ["7", "9", "12", "50"], answer: "9", hint: "Odd number." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "What happens when supply exceeds demand?", options: ["Prices go up", "Prices go down", "Shortage", "Inflation"], answer: "Prices go down", hint: "Surplus." },
    { grade: "Twelfth Grade", subject: "Social Studies", question: "What is 'GDP'?", options: ["Gross Domestic Product", "General Daily Price", "Govt Debt Plan", "Global Dollar Power"], answer: "Gross Domestic Product", hint: "Total value of goods." }
];

/**
 * Initializes the quiz based on grade and subject filters
 * @param {string} gradeName - The grade level (e.g., 'Third Grade')
 * @param {string} subjectFilter - The subject (e.g., 'Math', 'All')
 */
function loadQuestions(gradeName, subjectFilter = 'All') {
    // Reset State
    currentQuestionIndex = 0;
    score = 0;
    userAnswers = [];

    // Normalize inputs
    const gName = gradeName.trim();

    // Filter logic
    currentQuestions = questionBank.filter(q => {
        const gradeMatch = q.grade === gName;
        const subjectMatch = subjectFilter === 'All' || q.subject === subjectFilter;
        return gradeMatch && subjectMatch;
    });

    // Shuffle questions for variety
    currentQuestions.sort(() => Math.random() - 0.5);

    // Initial UI Update
    updateProgressBar(0);
    document.getElementById('question-count').innerHTML = `1<span class="text-xl text-gray-400 font-medium">/${currentQuestions.length}</span>`;

    // Reset Feedback UI via inline observer triggers
    const feedbackEl = document.getElementById('feedback');
    if (feedbackEl) feedbackEl.textContent = "";

    document.getElementById('next-btn').classList.add('hidden');
    document.getElementById('hintText').classList.add('hidden');

    // Load first question
    if (currentQuestions.length > 0) {
        loadCurrentQuestion();
    } else {
        document.getElementById('question').textContent = "No questions found for this category yet!";
        document.getElementById('options').innerHTML = "";
    }
}

/**
 * Renders the current question and options to the DOM
 */
function loadCurrentQuestion() {
    if (currentQuestionIndex >= currentQuestions.length) {
        finishQuiz();
        return;
    }

    const q = currentQuestions[currentQuestionIndex];

    // Update Question Text
    document.getElementById('question').textContent = q.question;

    // Update Counter
    document.getElementById('question-count').innerHTML = `${currentQuestionIndex + 1}<span class="text-xl text-gray-400 font-medium">/${currentQuestions.length}</span>`;

    // Setup Hint
    document.getElementById('hint-content').textContent = q.hint;
    document.getElementById('hintText').classList.add('hidden');

    // Reset Feedback/Next Button
    document.getElementById('feedback').textContent = "";
    document.getElementById('next-btn').classList.add('hidden');
    document.getElementById('next-btn').disabled = true;

    // Render Options
    const optionsContainer = document.getElementById('options');
    optionsContainer.innerHTML = ''; // Clear old options

    // Create buttons for each option
    q.options.forEach(opt => {
        const btn = document.createElement('button');
        btn.className = "w-full text-left p-4 rounded-xl border-2 border-gray-200 dark:border-gray-700 hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all font-medium text-lg text-gray-700 dark:text-gray-200 shadow-sm hover:shadow-md active:scale-[0.98]";
        btn.textContent = opt;
        btn.onclick = () => checkAnswer(opt, q.answer, btn);
        optionsContainer.appendChild(btn);
    });
}

/**
 * Validates the user's selection
 * @param {string} selected - The option text clicked
 * @param {string} correct - The correct answer text
 * @param {HTMLElement} btnElement - The button element clicked
 */
function checkAnswer(selected, correct, btnElement) {
    const isCorrect = selected === correct;
    const optionsContainer = document.getElementById('options');
    const buttons = optionsContainer.getElementsByTagName('button');

    // Disable all buttons to prevent double answers
    for (let btn of buttons) {
        btn.disabled = true;
        btn.classList.add('opacity-70', 'cursor-not-allowed');
        if (btn.textContent === correct) {
            // Highlight correct answer Green
            btn.classList.remove('border-gray-200', 'hover:border-blue-500');
            btn.classList.add('bg-green-100', 'border-green-500', 'text-green-800', 'dark:bg-green-900', 'dark:text-green-200');
        }
    }

    if (isCorrect) {
        score++;
        streak++;
        updateStreak(streak);
        document.getElementById('feedback').textContent = "Correct! Great job."; // Trigger mutation observer
    } else {
        streak = 0;
        updateStreak(streak);
        document.getElementById('feedback').textContent = `Incorrect. The answer was ${correct}.`; // Trigger mutation observer

        // Highlight chosen wrong answer Red
        btnElement.classList.add('bg-red-100', 'border-red-500', 'text-red-800', 'dark:bg-red-900', 'dark:text-red-200');
    }

    // Update Progress
    currentQuestionIndex++;
    updateProgressBar((score / currentQuestions.length) * 100);

    // Show Next Button
    const nextBtn = document.getElementById('next-btn');
    nextBtn.classList.remove('hidden');
    nextBtn.disabled = false;

    // Focus next button for accessibility
    nextBtn.focus();
}

/**
 * Reveals the hint
 */
function showHint() {
    const hintBox = document.getElementById('hintText');
    hintBox.classList.remove('hidden');
    hintBox.classList.add('animate-pulse');
    setTimeout(() => hintBox.classList.remove('animate-pulse'), 1000);
}

/**
 * Updates the visual progress bar
 */
function updateProgressBar(percent) {
    const bar = document.querySelector('.progress-bar-animated');
    const text = document.querySelector('.progress-bar-text');
    if (bar && text) {
        bar.style.width = `${percent}%`;
        text.textContent = `${Math.round(percent)}%`;
    }
}

/**
 * Updates the streak counter UI
 */
function updateStreak(count) {
    const streakEl = document.getElementById('streak-counter');
    if (count > 1) {
        streakEl.classList.remove('hidden');
        streakEl.textContent = `🔥 ${count} Streak!`;
    } else {
        streakEl.classList.add('hidden');
    }
}

/**
 * Handles End of Game State
 */
function finishQuiz() {
    const container = document.getElementById('options');
    document.getElementById('question').textContent = "Assessment Complete!";
    document.getElementById('question-count').classList.add('hidden');
    document.getElementById('next-btn').classList.add('hidden');

    const finalScore = Math.round((score / currentQuestions.length) * 100);

    let message = "";
    let icon = "";

    if (finalScore === 100) { message = "Perfect Score! You're a superstar!"; icon = "🏆"; }
    else if (finalScore >= 80) { message = "Great job! You know your stuff."; icon = "🌟"; }
    else if (finalScore >= 50) { message = "Good effort! Keep practicing."; icon = "📚"; }
    else { message = "Keep trying! Practice makes perfect."; icon = "💪"; }

    container.innerHTML = `
        <div class="text-center p-8 bg-blue-50 dark:bg-gray-700 rounded-xl">
            <div class="text-6xl mb-4">${icon}</div>
            <h3 class="text-2xl font-bold mb-2">You scored ${finalScore}%</h3>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">${message}</p>
            <button onclick="location.reload()" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                Try Again
            </button>
        </div>
    `;
}