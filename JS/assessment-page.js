
document.addEventListener("DOMContentLoaded", () => {
    // === GRADE CONFIGURATION ===
    const gradeConfig = {
        "pre-k": { label: "Pre-K", link: "/Level/a.php", icon: "fa-shapes", color: "bg-pink-500" },
        k: { label: "Kindergarten", link: "/Level/b.php", icon: "fa-child", color: "bg-purple-500" },
        1: { label: "First Grade", link: "/Level/c.php", icon: "fa-star", color: "bg-indigo-500" },
        2: { label: "Second Grade", link: "/Level/d.php", icon: "fa-rocket", color: "bg-blue-500" },
        3: { label: "Third Grade", link: "/Level/e.php", icon: "fa-book-open", color: "bg-sky-500" },
        4: { label: "Fourth Grade", link: "/Level/f.php", icon: "fa-map", color: "bg-teal-500" },
        5: { label: "Fifth Grade", link: "/Level/g.php", icon: "fa-flask", color: "bg-emerald-500" },
        6: { label: "Sixth Grade", link: "/Level/h.php", icon: "fa-globe", color: "bg-green-500" },
        7: { label: "Seventh Grade", link: "/Level/i.php", icon: "fa-landmark", color: "bg-lime-600" },
        8: { label: "Eighth Grade", link: "/Level/j.php", icon: "fa-dna", color: "bg-yellow-600" },
        9: { label: "Ninth Grade", link: "/Level/k.php", icon: "fa-atom", color: "bg-orange-600" },
        10: { label: "Tenth Grade", link: "/Level/l.php", icon: "fa-microscope", color: "bg-red-600" },
        11: { label: "Eleventh Grade", link: "/Level/m.php", icon: "fa-brain", color: "bg-rose-600" },
        12: { label: "Twelfth Grade", link: "/Level/n.php", icon: "fa-graduation-cap", color: "bg-slate-700" },
        ap: { label: "Advanced Placement", link: "#", icon: "fa-university", color: "bg-indigo-900" },
    };

    // === GET PARAMETER ===
    const urlParams = new URLSearchParams(window.location.search);
    let grade = urlParams.get("grade");

    const quizHeader = document.getElementById("quiz-header");
    const quizContainer = document.getElementById("quiz-container");
    const selectionContainer = document.getElementById("assessment-selection");

    // === MODE 1: LANDING PAGE (No Grade Selected) ===
    if (!grade || grade.trim() === "") {
        if (quizHeader) quizHeader.classList.add("hidden");
        if (quizContainer) quizContainer.classList.add("hidden");
        if (selectionContainer) {
            selectionContainer.classList.remove("hidden");
            const grid = document.getElementById("grade-selection-grid");
            if (grid) {
                grid.innerHTML = ""; // Clear existing
                Object.entries(gradeConfig).forEach(([key, info]) => {
                    const card = document.createElement("a");
                    // Assuming 'info.color' might be used for styling, but for now using a standard aesthetic
                    card.href = `?grade=${key}`;
                    card.className = "group block bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700";

                    const iconColor = info.color || "bg-blue-600";

                    card.innerHTML = `
                        <div class="${iconColor} h-32 flex items-center justify-center p-4 relative overflow-hidden">
                            <i class="fas ${info.icon || 'fa-star'} text-6xl text-white/30 absolute -bottom-4 -right-4 transform rotate-12 group-hover:scale-110 transition-transform"></i>
                             <i class="fas ${info.icon || 'fa-star'} text-4xl text-white relative z-10 drop-shadow-md"></i>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary transition-colors">${info.label}</h3>
                            <span class="text-sm font-medium text-blue-600 dark:text-blue-400 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all">Start Assessment <i class="fas fa-arrow-right ml-1"></i></span>
                        </div>
                    `;
                    grid.appendChild(card);
                });
            }
        }
        return; // Stop here, do not load quiz logic
    }

    // === MODE 2: QUIZ PAGE (Grade Selected) ===
    // Ensure correct visibility
    if (selectionContainer) selectionContainer.classList.add("hidden");
    if (quizHeader) quizHeader.classList.remove("hidden");
    if (quizContainer) quizContainer.classList.remove("hidden");

    grade = grade.trim().toLowerCase();

    // === ALIASES ===
    const alias = {
        prek: "pre-k",
        "pre k": "pre-k",
        kindergarten: "k",
        kinder: "k",
        "1st": "1",
        first: "1",
        "2nd": "2",
        second: "2",
        "3rd": "3",
        third: "3",
        "4th": "4",
        fourth: "4",
        "5th": "5",
        fifth: "5",
        "6th": "6",
        sixth: "6",
        "7th": "7",
        seventh: "7",
        "8th": "8",
        eighth: "8",
        "9th": "9",
        ninth: "9",
        "10th": "10",
        tenth: "10",
        "11th": "11",
        eleventh: "11",
        "12th": "12",
        twelfth: "12",
    };

    if (alias[grade]) {
        grade = alias[grade];
    }

    // === FIND THE REAL KEY ===
    let currentKey = "3"; // fallback
    let matchFound = false;

    for (const [key, info] of Object.entries(gradeConfig)) {
        const cleanLabel = info.label.toLowerCase().replace(/[\s-]/g, "");
        const cleanInput = grade.replace(/[\s-]/g, "");

        if (
            key === grade ||
            info.label.toLowerCase() === grade ||
            cleanLabel === cleanInput
        ) {
            currentKey = key;
            matchFound = true;
            break;
        }
    }

    // If grade was somehow invalid, maybe redirect or show error? For now fallback to 3rd.
    // Ideally we might want to show the selection screen instead of fallback if invalid.
    if (!matchFound) {
        // Optional: Redirect to selection if invalid grade
        // window.location.href = window.location.pathname; 
        // For now, keeping legacy behavior of defaulting to 3rd grade logic if something weird starts
    }

    // === FINAL VALUES ===
    const gradeName = gradeConfig[currentKey].label;
    const levelLink = gradeConfig[currentKey].link;

    // === PREV / NEXT (perfect order) ===
    const order = ["pre-k", "k", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "ap"];
    const pos = order.indexOf(currentKey);

    // === DOM UPDATES ===

    // 1. Page Titles
    document.title = `${gradeName} Assessment | Hesten's Learning`;
    document.getElementById("header-grade-name").textContent = gradeName;

    // 2. Hidden Inputs (for existing JS logic)
    document.getElementById("force-grade").value = gradeName;
    document.getElementById("grade-key").value = currentKey;

    // 3. Curriculum Link
    document.getElementById("link-curriculum").href = levelLink;

    // 4. Debug Info (if element exists)
    const dbgGrade = document.getElementById("debug-grade");
    if (dbgGrade) dbgGrade.textContent = grade;

    const dbgKey = document.getElementById("debug-key");
    if (dbgKey) dbgKey.textContent = currentKey;

    const dbgName = document.getElementById("debug-name");
    if (dbgName) dbgName.textContent = gradeName;

    // 5. Previous Button
    const prevBtn = document.getElementById("btn-prev");
    const prevSpacer = document.getElementById("spacer-prev");
    if (pos > 0) {
        const prevKey = order[pos - 1];
        prevBtn.href = `?grade=${prevKey}`;
        prevBtn.title = `Go to ${gradeConfig[prevKey].label}`;
        document.getElementById("btn-prev-label").textContent =
            gradeConfig[prevKey].label;
        prevBtn.classList.remove("hidden");
        if (prevSpacer) prevSpacer.classList.add("hidden");
    } else {
        prevBtn.classList.add("hidden");
        if (prevSpacer) prevSpacer.classList.remove("hidden");
    }

    // 6. Next Button
    const nextBtn = document.getElementById("btn-next");
    const nextSpacer = document.getElementById("spacer-next");
    if (pos < order.length - 1) { // Dynamic end check
        const nextKey = order[pos + 1];
        nextBtn.href = `?grade=${nextKey}`;
        nextBtn.title = `Go to ${gradeConfig[nextKey].label}`;
        document.getElementById("btn-next-label").textContent =
            gradeConfig[nextKey].label;
        nextBtn.classList.remove("hidden");
        if (nextSpacer) nextSpacer.classList.add("hidden");
    } else {
        nextBtn.classList.add("hidden");
        if (nextSpacer) nextSpacer.classList.remove("hidden");
    }

    // === TRIGGER EXISTING LOGIC ===
    console.log("Initializing with grade:", gradeName);
    if (typeof loadQuestions === "function") {
        loadQuestions(gradeName);
    }
});

// ==========================================
// CUSTOM LOGIC: Download Results Feature
// ==========================================

// Store user results as they answer
window.quizResultsData = [];

// 1. Hook into loadQuestions to reset data on start/restart
if (typeof loadQuestions === 'function') {
    const originalLoadQuestions = loadQuestions;
    loadQuestions = function (gradeName, subjectFilter) {
        window.quizResultsData = [];
        originalLoadQuestions(gradeName, subjectFilter);
    };
}

// 2. Hook into checkAnswer to capture data per question
if (typeof checkAnswer === 'function') {
    const originalCheckAnswer = checkAnswer;
    checkAnswer = function (selected, correct, btnElement) {
        try {
            // Capture current question data before index increments
            if (typeof currentQuestions !== 'undefined' && typeof currentQuestionIndex !== 'undefined') {
                const q = currentQuestions[currentQuestionIndex];
                if (q) {
                    window.quizResultsData.push({
                        question: q.question,
                        selected: selected,
                        correct: correct,
                        isCorrect: selected === correct,
                        timestamp: new Date().toLocaleTimeString()
                    });
                }
            }
        } catch (e) {
            console.error("Error logging answer for report:", e);
        }
        // Call original function
        originalCheckAnswer(selected, correct, btnElement);
    };
}

// 3. Hook into finishQuiz to inject the Download Button
if (typeof finishQuiz === 'function') {
    const originalFinishQuiz = finishQuiz;
    finishQuiz = function () {
        originalFinishQuiz(); // Let original rendering happen

        // Wait for DOM update then inject button
        setTimeout(() => {
            const container = document.getElementById('options');
            // Find the container div created by original finishQuiz
            const resultDiv = container ? container.querySelector('div.text-center') : null;

            if (resultDiv) {
                // Create Download Button
                const downloadBtn = document.createElement('button');
                downloadBtn.className = "bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 transition mt-4 md:ml-4 block md:inline-block w-full md:w-auto shadow-lg shadow-green-500/30";
                downloadBtn.innerHTML = '<i class="fas fa-file-download mr-2"></i> Download Results';
                downloadBtn.onclick = generateAndDownloadText;

                // Append to the result card
                resultDiv.appendChild(downloadBtn);
            }
        }, 100);
    };
}

// 4. Function to generate TXT file and trigger download
function generateAndDownloadText() {
    const grade = document.getElementById('header-grade-name')?.textContent || "Assessment";
    let content = `HESTEN'S LEARNING - ASSESSMENT REPORT\n`;
    content += `Subject Level: ${grade}\n`;
    content += `Date: ${new Date().toLocaleString()}\n`;
    content += `=================================================\n\n`;

    let scoreCount = 0;

    if (window.quizResultsData.length === 0) {
        content += "No questions were answered.\n";
    } else {
        window.quizResultsData.forEach((item, idx) => {
            content += `Q${idx + 1}: ${item.question}\n`;
            content += `   Your Answer:    ${item.selected}\n`;
            if (!item.isCorrect) {
                content += `   Correct Answer: ${item.correct}\n`;
            }
            content += `   Result:         ${item.isCorrect ? "[ CORRECT ]" : "[ INCORRECT ]"}\n`;
            content += `-------------------------------------------------\n`;
            if (item.isCorrect) scoreCount++;
        });
    }

    const percentage = window.quizResultsData.length > 0
        ? Math.round((scoreCount / window.quizResultsData.length) * 100)
        : 0;

    content += `\nSUMMARY:\n`;
    content += `Total Questions: ${window.quizResultsData.length}\n`;
    content += `Correct Answers: ${scoreCount}\n`;
    content += `Final Score:     ${percentage}%\n`;

    // Create blob and link
    const blob = new Blob([content], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    // Filename: Assessment_Result_YYYY-MM-DD.txt
    a.download = `Assessment_Result_${new Date().toISOString().slice(0, 10)}.txt`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}

// ==========================================
// END CUSTOM LOGIC
// ==========================================

let currentSubjectFilter = "All";

function filterQuestions(subject) {
    currentSubjectFilter = subject;
    const gradeName = document.getElementById("force-grade").value;

    console.log("Filtering questions for:", gradeName, "Subject:", subject);

    if (typeof loadQuestions === "function") {
        loadQuestions(gradeName, subject);
    }

    // Reset UI
    document.getElementById("feedback-area").classList.add("hidden");
    document.getElementById("next-btn").classList.add("hidden");
}

function nextQuestionAdapter() {
    if (typeof loadCurrentQuestion === "function") {
        loadCurrentQuestion();
    }
}

// Feedback observer
const observer = new MutationObserver((mutations) => {
    const fb = document.getElementById("feedback");
    if (fb && fb.textContent.trim() !== "") {
        document.getElementById("feedback-area").classList.remove("hidden");
        const isCorrect = fb.textContent.includes("Correct");
        const icon = document.getElementById("feedback-icon");
        const title = document.getElementById("feedback-title");

        if (isCorrect) {
            document
                .getElementById("feedback-area")
                .classList.add(
                    "bg-green-100",
                    "dark:bg-green-900/30",
                    "text-green-800",
                    "dark:text-green-200"
                );
            document
                .getElementById("feedback-area")
                .classList.remove(
                    "bg-red-100",
                    "dark:bg-red-900/30",
                    "text-red-800",
                    "dark:text-red-200"
                );
            icon.innerHTML =
                '<i class="fas fa-check-circle text-green-600"></i>';
            title.textContent = "Correct!";
        } else {
            document
                .getElementById("feedback-area")
                .classList.add(
                    "bg-red-100",
                    "dark:bg-red-900/30",
                    "text-red-800",
                    "dark:text-red-200"
                );
            document
                .getElementById("feedback-area")
                .classList.remove(
                    "bg-green-100",
                    "dark:bg-green-900/30",
                    "text-green-800",
                    "dark:text-green-200"
                );
            icon.innerHTML = '<i class="fas fa-times-circle text-red-600"></i>';
            title.textContent = "Incorrect";
        }
    } else {
        document.getElementById("feedback-area").classList.add("hidden");
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const fb = document.getElementById("feedback");
    if (fb) {
        observer.observe(fb, {
            childList: true,
            subtree: true,
            characterData: true,
        });
    }
});
