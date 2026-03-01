<?php
/**
 * Eureka Math Interactive Lesson: GPK-M1-TA-L1
 * Objective: Match 2 objects that are exactly the same.
 */

$pageTitle = "Match 2 Objects | Interactive Lesson";
$moduleInfo = "Grade PK • Module 1 • Topic A";
include '../src/header.php';
?>

<style>
    body {
        touch-action: manipulation;
    }

    .matching-card {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }

    .matching-card:active {
        transform: scale(0.95);
    }

    .selected {
        border: 4px solid #3b82f6;
        background-color: #dbeafe;
    }

    .matched {
        border: 4px solid #10b981;
        background-color: #d1fae5;
        pointer-events: none;
        opacity: 0.6;
    }

    .chant-finger {
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform: translateY(100px);
    }

    .chant-finger.show {
        transform: translateY(0);
    }
</style>

<main id="main-content" class="container mx-auto px-4 py-8 min-h-[60vh]">
    <div id="app" class="max-w-3xl mx-auto">

        <!-- Header -->
        <header class="mb-8 text-center">
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-sm font-semibold rounded-full mb-2">
                <?php echo $moduleInfo; ?>
            </span>
            <h1 class="text-4xl font-bold text-text-default mb-2">Match 2 Objects</h1>
            <p class="text-text-secondary">Objective: Match 2 objects that are exactly the same.</p>
        </header>

        <!-- Progress Stepper -->
        <div class="flex items-center justify-between mb-10 px-4">
            <div class="flex flex-col items-center">
                <div id="step-1-indicator"
                    class="w-10 h-10 rounded-full flex items-center justify-center bg-blue-600 text-white font-bold">1
                </div>
                <span class="text-xs mt-1 font-medium">Fluency</span>
            </div>
            <div class="flex-1 h-1 bg-gray-200 mx-2 -mt-4">
                <div id="progress-bar" class="h-full bg-blue-600 transition-all duration-500" style="width: 0%"></div>
            </div>
            <div class="flex flex-col items-center">
                <div id="step-2-indicator"
                    class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-200 text-text-secondary font-bold">
                    2</div>
                <span class="text-xs mt-1 font-medium">Concept</span>
            </div>
            <div class="flex-1 h-1 bg-gray-200 mx-2 -mt-4"></div>
            <div class="flex flex-col items-center">
                <div id="step-3-indicator"
                    class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-200 text-text-secondary font-bold">
                    3</div>
                <span class="text-xs mt-1 font-medium">Debrief</span>
            </div>
        </div>

        <!-- Section 1: Fluency (Count to 2 Chant) -->
        <section id="section-fluency"
            class="bg-content-bg rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-gray-700">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold mb-4">Let's Chant!</h2>
                <p class="text-lg text-text-secondary mb-8 italic">"1, 2, I count 2!"</p>

                <div
                    class="flex justify-center items-end gap-4 h-40 overflow-hidden mb-8 border-b-2 border-gray-100 dark:border-gray-700 pb-2">
                    <div id="finger-1" class="chant-finger">
                        <svg width="60" height="120" viewBox="0 0 60 120" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="10" width="30" height="110" rx="15" fill="#FFDBAC" />
                            <rect x="20" y="15" width="20" height="25" rx="5" fill="#F1C27D" />
                        </svg>
                        <p class="font-bold text-2xl mt-2">1</p>
                    </div>
                    <div id="finger-2" class="chant-finger">
                        <svg width="60" height="120" viewBox="0 0 60 120" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="10" width="30" height="110" rx="15" fill="#FFDBAC" />
                            <rect x="20" y="15" width="20" height="25" rx="5" fill="#F1C27D" />
                        </svg>
                        <p class="font-bold text-2xl mt-2">2</p>
                    </div>
                </div>

                <button onclick="startChant()" id="chant-btn"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-2xl font-bold text-xl shadow-lg transition-transform active:scale-95">
                    Start Chant
                </button>
            </div>
        </section>

        <!-- Section 2: Concept Development (Matching Mat) -->
        <section id="section-concept"
            class="hidden bg-content-bg rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-gray-700">
            <h2 class="text-2xl font-bold mb-2">Digital Matching Mat</h2>
            <p class="text-text-secondary mb-6">Find the objects that are <strong>exactly the same</strong>. Tap two
                matching items.</p>

            <div id="matching-grid" class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <!-- Cards will be injected by JS -->
            </div>

            <div class="flex justify-between items-center">
                <p class="text-text-secondary font-medium">Matches found: <span id="match-count"
                        class="text-blue-600">0</span>/4</p>
                <button id="next-concept" disabled
                    class="bg-gray-200 text-text-secondary px-6 py-2 rounded-xl font-bold" onclick="goToDebrief()">
                    Next Activity
                </button>
            </div>
        </section>

        <!-- Section 3: Debrief -->
        <section id="section-debrief"
            class="hidden bg-content-bg rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-gray-700 text-center">
            <div class="mb-6">
                <div
                    class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4">Lesson Complete!</h2>
                <div class="bg-base-bg p-6 rounded-2xl text-left inline-block w-full max-w-md">
                    <h3 class="font-bold mb-2">Debrief Questions:</h3>
                    <ul class="space-y-3 text-text-default">
                        <li class="flex gap-2"><span>•</span> How did you know those two things were exactly the same?
                        </li>
                        <li class="flex gap-2"><span>•</span> Can you find two objects in your room that are exactly the
                            same?</li>
                    </ul>
                </div>
            </div>
            <button onclick="window.location.reload()"
                class="bg-blue-600 text-white px-8 py-3 rounded-2xl font-bold">Try Again</button>
        </section>

    </div>
</main>

<script>
    // Game State
    const items = [
        { id: 1, type: 'apple', icon: '🍎' },
        { id: 2, type: 'apple', icon: '🍎' },
        { id: 3, type: 'bear', icon: '🧸' },
        { id: 4, type: 'bear', icon: '🧸' },
        { id: 5, type: 'sock', icon: '🧦' },
        { id: 6, type: 'sock', icon: '🧦' },
        { id: 7, type: 'star', icon: '⭐' },
        { id: 8, type: 'star', icon: '⭐' }
    ];

    let selectedCards = [];
    let matches = 0;

    // Fluency Logic
    function startChant() {
        const f1 = document.getElementById('finger-1');
        const f2 = document.getElementById('finger-2');
        const btn = document.getElementById('chant-btn');

        btn.disabled = true;
        btn.textContent = "Listen...";

        // Sequence
        setTimeout(() => { f1.classList.add('show'); }, 500);
        setTimeout(() => { f2.classList.add('show'); }, 1500);
        setTimeout(() => {
            btn.textContent = "Ready!";
            btn.classList.replace('bg-blue-600', 'bg-green-600');
            btn.onclick = goToConcept;
            btn.disabled = false;
            btn.textContent = "Next: Matching Activity";
        }, 2500);
    }

    // Navigation
    function goToConcept() {
        document.getElementById('section-fluency').classList.add('hidden');
        document.getElementById('section-concept').classList.remove('hidden');
        document.getElementById('step-2-indicator').classList.replace('bg-gray-200', 'bg-blue-600');
        document.getElementById('step-2-indicator').classList.replace('text-text-secondary', 'text-white');
        document.getElementById('progress-bar').style.width = '50%';
        initGame();
    }

    function goToDebrief() {
        document.getElementById('section-concept').classList.add('hidden');
        document.getElementById('section-debrief').classList.remove('hidden');
        document.getElementById('step-3-indicator').classList.replace('bg-gray-200', 'bg-blue-600');
        document.getElementById('step-3-indicator').classList.replace('text-text-secondary', 'text-white');
        document.getElementById('progress-bar').style.width = '100%';

        // Trigger confetti on complete
        if (typeof triggerConfetti === 'function') triggerConfetti();
    }

    // Matching Game Logic
    function initGame() {
        const grid = document.getElementById('matching-grid');
        const shuffled = [...items].sort(() => Math.random() - 0.5);

        grid.innerHTML = '';
        shuffled.forEach(item => {
            const card = document.createElement('div');
            card.className = 'matching-card bg-base-bg border-2 border-gray-100 dark:border-gray-700 rounded-2xl h-32 flex items-center justify-center text-5xl shadow-sm';
            card.dataset.id = item.id;
            card.dataset.type = item.type;
            card.textContent = item.icon;
            card.onclick = () => handleCardClick(card);
            grid.appendChild(card);
        });
    }

    function handleCardClick(card) {
        if (card.classList.contains('matched') || selectedCards.includes(card)) return;

        card.classList.add('selected');
        selectedCards.push(card);

        if (selectedCards.length === 2) {
            const [c1, c2] = selectedCards;
            if (c1.dataset.type === c2.dataset.type) {
                // Match found
                setTimeout(() => {
                    c1.classList.replace('selected', 'matched');
                    c2.classList.replace('selected', 'matched');
                    matches++;
                    document.getElementById('match-count').textContent = matches;
                    if (matches === 4) {
                        enableNext();
                    }
                }, 300);
            } else {
                // No match
                setTimeout(() => {
                    c1.classList.remove('selected');
                    c2.classList.remove('selected');
                }, 500);
            }
            selectedCards = [];
        }
    }

    function enableNext() {
        const btn = document.getElementById('next-concept');
        btn.disabled = false;
        btn.classList.replace('bg-gray-200', 'bg-blue-600');
        btn.classList.replace('text-text-secondary', 'text-white');
        btn.classList.add('hover:bg-blue-700', 'shadow-lg');
    }
</script>

<?php include '../src/footer.php'; ?>