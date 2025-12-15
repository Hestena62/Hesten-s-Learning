<?php
$pageTitle = "Hesten's Learning - Games Hub";
include 'src/header.php';
?>

<style>
    /* Game Specific Styles */
    .game-card {
        perspective: 1000px;
    }

    .game-card.flipped .card-front {
        transform: rotateY(180deg);
    }

    .game-card.flipped .card-back {
        transform: rotateY(0);
    }

    .card-inner {
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }

    /* Keyframes for animations if not in global */
    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .animate-fade-in {
        animation: fade-in 0.5s ease-out forwards;
    }
</style>

<main id="main-content" class="flex-grow">

    <!-- Hero Section -->
    <!-- Hero Section -->
    <div
        class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
        <!-- Abstract Background Shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <i class="fas fa-gamepad absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
            <i
                class="fas fa-puzzle-piece absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl lg:text-6xl font-black mb-4 tracking-tight drop-shadow-md">
                Accessible Game Zone
            </h1>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed mb-8">
                Play, learn, and grow with games designed for everyone. Keyboard friendly, screen reader optimized, and
                stress-free.
            </p>

            <div
                class="bg-white/10 backdrop-blur-md rounded-xl p-6 inline-block text-left text-sm border border-white/20 shadow-lg">
                <p class="font-bold mb-3 text-lg"><i class="fas fa-universal-access mr-2"></i>Accessibility Features:
                </p>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2">
                    <li><i class="fas fa-check text-green-300 mr-2"></i>Full Keyboard Support</li>
                    <li><i class="fas fa-check text-green-300 mr-2"></i>Screen Reader Announcements</li>
                    <li><i class="fas fa-check text-green-300 mr-2"></i>No Timers / Stress Free</li>
                    <li><i class="fas fa-check text-green-300 mr-2"></i>High Contrast Ready</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Game Selector -->
    <section class="max-w-7xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-primary mb-8 border-b pb-2">Select a Game</h2>

        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <!-- Game Card 1 -->
            <button onclick="loadGame('memory')"
                class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all text-left border-2 border-transparent focus:border-primary focus:ring-4 ring-primary/30">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition">
                    <i class="fas fa-brain text-9xl text-primary"></i>
                </div>
                <div class="relative z-10">
                    <span
                        class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block">Cognitive
                        Skills</span>
                    <h3 class="text-2xl font-bold mb-2 group-hover:text-primary transition">Memory Match</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Find the matching pairs! A classic memory game
                        optimized for keyboard navigation and audio feedback.</p>
                    <span class="font-bold text-primary flex items-center">
                        Play Now <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                    </span>
                </div>
            </button>

            <!-- Game Card 2 -->
            <button onclick="loadGame('math')"
                class="group relative bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all text-left border-2 border-transparent focus:border-primary focus:ring-4 ring-primary/30">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition">
                    <i class="fas fa-calculator text-9xl text-secondary"></i>
                </div>
                <div class="relative z-10">
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block">Math
                        Practice</span>
                    <h3 class="text-2xl font-bold mb-2 group-hover:text-primary transition">Math Master</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Practice your arithmetic at your own pace. No
                        falling numbers, just you and the math.</p>
                    <span class="font-bold text-primary flex items-center">
                        Play Now <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                    </span>
                </div>
            </button>
        </div>

        <!-- Active Game Container -->
        <div id="game-arena"
            class="hidden bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden border border-gray-200 dark:border-gray-700 relative">

            <!-- Game Header -->
            <div
                class="bg-gray-100 dark:bg-gray-900 p-4 flex justify-between items-center border-b dark:border-gray-700">
                <h3 id="arena-title" class="text-xl font-bold">Game Title</h3>
                <button onclick="closeGame()"
                    class="px-4 py-2 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg font-bold transition">
                    <i class="fas fa-times mr-2"></i> Exit Game
                </button>
            </div>

            <!-- Game Canvas/Area -->
            <div id="arena-content" class="p-8 min-h-[400px] flex flex-col items-center justify-center">
                <!-- Game content injected here via JS -->
            </div>

            <!-- ARIA Live Region for Screen Readers -->
            <div id="game-announcer" class="sr-only" aria-live="assertive" aria-atomic="true"></div>
        </div>

    </section>

</main>

<!-- GAME LOGIC SCRIPT -->
<script>
    // --- Sound Engine (Web Audio API) ---
    // Generates simple tones so no external mp3 files are needed
    const audioCtx = new (window.AudioContext || window.webkitAudioContext)();

    function playTone(freq, type, duration) {
        if (audioCtx.state === 'suspended') audioCtx.resume();
        const osc = audioCtx.createOscillator();
        const gain = audioCtx.createGain();
        osc.type = type;
        osc.frequency.setValueAtTime(freq, audioCtx.currentTime);
        gain.gain.setValueAtTime(0.1, audioCtx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.00001, audioCtx.currentTime + duration);
        osc.connect(gain);
        gain.connect(audioCtx.destination);
        osc.start();
        osc.stop(audioCtx.currentTime + duration);
    }

    const sounds = {
        click: () => playTone(400, 'sine', 0.1),
        match: () => { playTone(600, 'sine', 0.1); setTimeout(() => playTone(800, 'sine', 0.2), 100); },
        wrong: () => { playTone(200, 'sawtooth', 0.3); },
        win: () => {
            [400, 500, 600, 800].forEach((f, i) => setTimeout(() => playTone(f, 'square', 0.2), i * 150));
        }
    };

    // --- Screen Reader Announcer ---
    function announce(text) {
        const el = document.getElementById('game-announcer');
        if (el) {
            el.textContent = '';
            setTimeout(() => { el.textContent = text; }, 50);
        }
    }

    // --- Game Logic ---
    const arena = document.getElementById('game-arena');
    const arenaTitle = document.getElementById('arena-title');
    const arenaContent = document.getElementById('arena-content');

    function loadGame(gameType) {
        arena.classList.remove('hidden');
        arena.scrollIntoView({ behavior: 'smooth' });

        if (gameType === 'memory') startMemoryGame();
        if (gameType === 'math') startMathGame();
    }

    function closeGame() {
        arena.classList.add('hidden');
        announce("Game closed.");
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // --- GAME 1: MEMORY MATCH ---
    function startMemoryGame() {
        arenaTitle.textContent = "Memory Match";
        announce("Memory Match started. Grid is 4 by 4. Use arrow keys to navigate, Enter to flip cards.");

        const icons = ['star', 'heart', 'bolt', 'moon', 'cloud', 'sun', 'snowflake', 'leaf'];
        // Duplicate and shuffle
        let cards = [...icons, ...icons].sort(() => 0.5 - Math.random());

        let gridHtml = `<div class="grid grid-cols-4 gap-4 w-full max-w-md" role="grid" aria-label="Memory Game Board">`;
        cards.forEach((icon, index) => {
            gridHtml += `
                <button id="card-${index}" class="game-card h-24 w-full bg-secondary rounded-lg relative text-white text-3xl transition-transform transform hover:scale-105 focus:scale-105 focus:ring-4 ring-accent outline-none" 
                    onclick="flipCard(${index}, '${icon}')" 
                    aria-label="Card ${index + 1}, hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <i class="fas fa-question opacity-50"></i>
                    </div>
                </button>
            `;
        });
        gridHtml += `</div><div class="mt-6 text-center"><button onclick="startMemoryGame()" class="px-6 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg font-bold">Restart Game</button></div>`;

        arenaContent.innerHTML = gridHtml;

        // Focus first card
        setTimeout(() => {
            const firstCard = document.getElementById('card-0');
            if (firstCard) firstCard.focus();
        }, 100);

        // Reset Game State
        flippedCards = [];
        matchedPairs = 0;
        totalPairs = icons.length;
    }

    let flippedCards = [];
    let matchedPairs = 0;
    let totalPairs = 8;
    let isProcessing = false;

    function flipCard(index, icon) {
        if (isProcessing) return;
        const btn = document.getElementById(`card-${index}`);

        // Ignore if already matched or flipped
        if (btn.classList.contains('bg-success') || btn.classList.contains('bg-white')) return;

        sounds.click();

        // Visual Flip
        btn.classList.remove('bg-secondary');
        btn.classList.add('bg-white', 'text-primary');
        btn.innerHTML = `<i class="fas fa-${icon}"></i>`;
        btn.setAttribute('aria-label', `Card ${index + 1}, ${icon}`);
        announce(`${icon}`);

        flippedCards.push({ index, icon });

        if (flippedCards.length === 2) {
            isProcessing = true;
            checkForMatch();
        }
    }

    function checkForMatch() {
        const [c1, c2] = flippedCards;
        const btn1 = document.getElementById(`card-${c1.index}`);
        const btn2 = document.getElementById(`card-${c2.index}`);

        if (c1.icon === c2.icon) {
            // Match!
            sounds.match();
            announce(`Match found! ${c1.icon}`);
            setTimeout(() => {
                btn1.classList.remove('bg-white', 'text-primary');
                btn2.classList.remove('bg-white', 'text-primary');
                btn1.classList.add('bg-success', 'text-white', 'cursor-default');
                btn2.classList.add('bg-success', 'text-white', 'cursor-default');
                btn1.setAttribute('aria-label', `${c1.icon}, matched`);
                btn2.setAttribute('aria-label', `${c2.icon}, matched`);
                matchedPairs++;
                checkWin();
                isProcessing = false;
                flippedCards = [];
            }, 500);
        } else {
            // No Match
            sounds.wrong();
            announce("No match.");
            setTimeout(() => {
                // Reset Card 1
                btn1.classList.remove('bg-white', 'text-primary');
                btn1.classList.add('bg-secondary');
                btn1.innerHTML = `<i class="fas fa-question opacity-50"></i>`;
                btn1.setAttribute('aria-label', `Card ${c1.index + 1}, hidden`);

                // Reset Card 2
                btn2.classList.remove('bg-white', 'text-primary');
                btn2.classList.add('bg-secondary');
                btn2.innerHTML = `<i class="fas fa-question opacity-50"></i>`;
                btn2.setAttribute('aria-label', `Card ${c2.index + 1}, hidden`);

                isProcessing = false;
                flippedCards = [];
            }, 1000); // Longer delay so they can see the mismatch
        }
    }

    function checkWin() {
        if (matchedPairs === totalPairs) {
            sounds.win();
            announce("Congratulations! You found all pairs.");
            arenaContent.innerHTML += `
                <div class="absolute inset-0 bg-black/80 flex flex-col items-center justify-center text-white p-6 text-center animate-fade-in">
                    <h4 class="text-4xl font-bold mb-4 text-success">Victory!</h4>
                    <p class="text-xl mb-6">You cleared the board!</p>
                    <button onclick="startMemoryGame()" class="px-8 py-3 bg-primary rounded-full font-bold hover:scale-105 transition">Play Again</button>
                </div>
            `;
            // Trap focus in Play Again
            setTimeout(() => {
                const playAgainBtn = arenaContent.querySelector('button');
                if (playAgainBtn) playAgainBtn.focus();
            }, 100);
        }
    }


    // --- GAME 2: MATH MASTER ---
    let currentAnswer = 0;

    function startMathGame() {
        arenaTitle.textContent = "Math Master";
        announce("Math Master started. Type the correct answer and press Enter or click Submit.");
        generateMathProblem();
    }

    function generateMathProblem() {
        const num1 = Math.floor(Math.random() * 10) + 1;
        const num2 = Math.floor(Math.random() * 10) + 1;
        const isAddition = Math.random() > 0.5;

        currentAnswer = isAddition ? num1 + num2 : num1 * num2;
        const symbol = isAddition ? '+' : '×';
        const problemText = `${num1} ${symbol} ${num2}`;

        arenaContent.innerHTML = `
            <div class="text-center w-full max-w-md">
                <div class="mb-8 p-8 bg-gray-100 dark:bg-gray-700 rounded-2xl border-4 border-dashed border-primary">
                    <span class="text-6xl font-black font-mono tracking-widest" aria-label="Problem: ${num1} ${isAddition ? 'plus' : 'times'} ${num2}">${problemText}</span>
                </div>
                
                <div class="flex gap-4 justify-center">
                    <input type="number" id="math-input" class="w-32 text-center text-3xl font-bold p-3 rounded-lg border-2 border-gray-300 focus:border-primary outline-none text-gray-900 bg-white dark:bg-gray-600 dark:text-white" placeholder="?" aria-label="Enter your answer">
                    <button onclick="checkMathAnswer()" class="bg-primary text-white px-8 py-3 rounded-lg font-bold hover:bg-secondary transition">Submit</button>
                </div>
                
                <p id="math-feedback" class="h-8 mt-4 font-bold text-xl" aria-live="polite"></p>
            </div>
        `;

        const input = document.getElementById('math-input');
        if (input) {
            input.focus();
            input.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') checkMathAnswer();
            });
        }

        // Speak the new problem
        announce(`New problem: ${num1} ${isAddition ? 'plus' : 'times'} ${num2}`);
    }

    function checkMathAnswer() {
        const input = document.getElementById('math-input');
        const feedback = document.getElementById('math-feedback');
        const userVal = parseInt(input.value);

        if (isNaN(userVal)) {
            feedback.textContent = "Please enter a number.";
            feedback.className = "h-8 mt-4 font-bold text-xl text-yellow-500";
            return;
        }

        if (userVal === currentAnswer) {
            sounds.match();
            feedback.textContent = "Correct! Great job!";
            feedback.className = "h-8 mt-4 font-bold text-xl text-success";
            announce("Correct!");
            setTimeout(generateMathProblem, 1500);
        } else {
            sounds.wrong();
            feedback.textContent = "Try again!";
            feedback.className = "h-8 mt-4 font-bold text-xl text-error";
            announce("Incorrect, try again.");
            input.value = '';
            input.focus();
        }
    }
</script>

<?php include 'src/footer.php'; ?>