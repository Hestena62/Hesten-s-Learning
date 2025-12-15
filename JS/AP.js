// State Management
let currentQuestions = [];
let currentQuestionIndex = 0;
let score = 0;
let streak = 0;
let userAnswers = [];

// Expanded Database of Questions
const questionBank = [
// ==================== PRE-K ====================
    // Existing
    { grade: "Pre-K", subject: "Math", question: "Which number comes after 2?", options: ["1", "3", "4", "5"], answer: "3", hint: "Count: 1, 2, ..." },
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