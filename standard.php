<?php
// --- Page Configuration ---
$pageTitle = "Common Core Standards Guide";
$pageDescription = "A simplified, accessible guide to Common Core State Standards (CCSS) for students and parents.";
$pageKeywords = "CCSS, Common Core, Education Standards, Math Standards, ELA Standards, Special Education";
$pageAuthor = "Hesten's Learning";

// --- Mock Data: CCSS Standards ---
// In a real app, this might come from a database.
// Structure: [Code, Grade, Subject, Official Text, Plain English Explanation]
$standards = [
    // KINDERGARTEN MATH
    [
        'code' => 'CCSS.MATH.CONTENT.K.CC.A.1',
        'grade' => 'K',
        'subject' => 'Math',
        'category' => 'Counting & Cardinality',
        'text' => 'Count to 100 by ones and by tens.',
        'explanation' => 'Students should be able to count out loud from 1 to 100. They should also be able to count by tens (10, 20, 30...) up to 100.'
    ],
    [
        'code' => 'CCSS.MATH.CONTENT.K.OA.A.1',
        'grade' => 'K',
        'subject' => 'Math',
        'category' => 'Operations & Algebraic Thinking',
        'text' => 'Represent addition and subtraction with objects, fingers, mental images, drawings, sounds, acting out situations, verbal explanations, expressions, or equations.',
        'explanation' => 'Show math using real things! Use fingers, blocks, or drawings to show what happens when you add things together or take them away.'
    ],
    // GRADE 5 ELA
    [
        'code' => 'CCSS.ELA-LITERACY.RL.5.2',
        'grade' => '5',
        'subject' => 'ELA',
        'category' => 'Reading: Literature',
        'text' => 'Determine a theme of a story, drama, or poem from details in the text, including how characters in a story or drama respond to challenges or how the speaker in a poem reflects upon a topic; summarize the text.',
        'explanation' => 'Read a story and figure out the "big idea" or lesson. Look at how characters handle problems to understand the message. Be able to retell the story in your own words.'
    ],
    // GRADE 8 MATH
    [
        'code' => 'CCSS.MATH.CONTENT.8.EE.A.1',
        'grade' => '8',
        'subject' => 'Math',
        'category' => 'Expressions & Equations',
        'text' => 'Know and apply the properties of integer exponents to generate equivalent numerical expressions.',
        'explanation' => 'Understand how powers (exponents) work. For example, know that 3² means 3 times 3, and be able to solve problems using these rules.'
    ],
    // HIGH SCHOOL MATH
    [
        'code' => 'CCSS.MATH.CONTENT.HSF.IF.A.1',
        'grade' => 'HS',
        'subject' => 'Math',
        'category' => 'Functions',
        'text' => 'Understand that a function from one set (called the domain) to another set (called the range) assigns to each element of the domain exactly one element of the range.',
        'explanation' => 'Learn that a function is like a machine: if you put one specific number in, you get exactly one specific answer out. It never gives two different answers for the same input.'
    ],
    // HIGH SCHOOL ELA
    [
        'code' => 'CCSS.ELA-LITERACY.RI.9-10.1',
        'grade' => 'HS',
        'subject' => 'ELA',
        'category' => 'Reading: Informational Text',
        'text' => 'Cite strong and thorough textual evidence to support analysis of what the text says explicitly as well as inferences drawn from the text.',
        'explanation' => 'When you make a claim about something you read, prove it! Point to the exact sentences in the text that support your idea, both for things directly stated and things you figured out (inferred).'
    ]
];

include 'src/header.php';
?>

<!-- Header / Hero Section -->
<div class="relative bg-gradient-to-br from-primary to-blue-900 text-white pt-16 pb-20 px-4 mb-8 shadow-xl overflow-hidden rounded-b-[3rem]">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
        <i class="fas fa-book absolute top-10 right-10 text-9xl rotate-12"></i>
        <i class="fas fa-graduation-cap absolute bottom-10 left-10 text-8xl -rotate-12"></i>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-4 uppercase tracking-wider backdrop-blur-md">
            Academic Roadmap
        </span>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-6">Common Core Standards</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
            A simple, accessible guide to what students are expected to learn at each grade level. We've translated the academic language into plain English.
        </p>
    </div>
</div>

<main class="container mx-auto px-4 mb-20 min-h-screen" id="main-content">

    <!-- Filters & Search Control Bar -->
    <div class="bg-content-bg rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-10 sticky top-4 z-30 transition-colors">
        <div class="flex flex-col lg:flex-row gap-6 justify-between items-start lg:items-center">
            
            <!-- Filters -->
            <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                <!-- Subject Select -->
                <div class="relative group">
                    <label for="subject-filter" class="sr-only">Filter by Subject</label>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-book-open text-primary group-hover:text-accent transition-colors"></i>
                    </div>
                    <select id="subject-filter" onchange="filterStandards()" 
                        class="pl-10 pr-10 py-3 bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default rounded-xl focus:ring-2 focus:ring-primary focus:border-primary appearance-none w-full sm:w-48 cursor-pointer font-medium shadow-sm transition-all hover:bg-gray-50 dark:hover:bg-gray-800">
                        <option value="all">All Subjects</option>
                        <option value="Math">Math</option>
                        <option value="ELA">ELA (English)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-text-secondary">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <!-- Grade Select -->
                <div class="relative group">
                    <label for="grade-filter" class="sr-only">Filter by Grade</label>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-layer-group text-primary group-hover:text-accent transition-colors"></i>
                    </div>
                    <select id="grade-filter" onchange="filterStandards()" 
                        class="pl-10 pr-10 py-3 bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default rounded-xl focus:ring-2 focus:ring-primary focus:border-primary appearance-none w-full sm:w-48 cursor-pointer font-medium shadow-sm transition-all hover:bg-gray-50 dark:hover:bg-gray-800">
                        <option value="all">All Grades</option>
                        <option value="K">Kindergarten</option>
                        <option value="1">Grade 1</option>
                        <option value="2">Grade 2</option>
                        <option value="3">Grade 3</option>
                        <option value="4">Grade 4</option>
                        <option value="5">Grade 5</option>
                        <option value="6">Grade 6</option>
                        <option value="7">Grade 7</option>
                        <option value="8">Grade 8</option>
                        <option value="HS">High School</option>
                    </select>
                     <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-text-secondary">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>

            <!-- Search -->
            <div class="relative w-full lg:w-96">
                <label for="standard-search" class="sr-only">Search standards</label>
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="standard-search" onkeyup="filterStandards()" 
                    placeholder="Search by code or keyword..." 
                    class="w-full pl-11 pr-4 py-3 bg-base-bg border border-gray-300 dark:border-gray-600 rounded-xl text-text-default placeholder-gray-400 focus:ring-2 focus:ring-primary focus:border-primary transition-all shadow-sm">
            </div>
        </div>
        
        <!-- Live Count -->
        <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center text-sm text-text-secondary">
            <span id="showing-count">Showing all standards</span>
            <button onclick="resetFilters()" class="text-primary hover:underline font-bold text-xs uppercase tracking-wide">Reset Filters</button>
        </div>
    </div>

    <!-- Standards Grid -->
    <div id="standards-container" class="space-y-6">
        <?php foreach ($standards as $std): ?>
            <!-- Standard Card -->
            <article class="standard-item bg-content-bg rounded-xl shadow-md border-l-4 border-primary hover:shadow-lg transition-all duration-300 overflow-hidden"
                data-grade="<?php echo $std['grade']; ?>"
                data-subject="<?php echo $std['subject']; ?>"
                data-search="<?php echo strtolower($std['code'] . ' ' . $std['text'] . ' ' . $std['explanation']); ?>">
                
                <div class="p-6">
                    <!-- Header Row -->
                    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 mb-4">
                        <div>
                            <div class="flex flex-wrap gap-2 mb-2">
                                <span class="px-2 py-1 bg-primary/10 text-primary text-xs font-bold rounded uppercase tracking-wide">
                                    <?php echo $std['subject']; ?>
                                </span>
                                <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-text-secondary text-xs font-bold rounded">
                                    Grade <?php echo $std['grade']; ?>
                                </span>
                                <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 text-xs font-mono rounded border border-blue-100 dark:border-blue-800">
                                    <?php echo $std['code']; ?>
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-text-default">
                                <?php echo $std['category']; ?>
                            </h3>
                        </div>
                        
                        <!-- TTS Button -->
                        <button onclick="readStandard(this)" 
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-base-bg text-text-secondary hover:text-primary hover:bg-primary/10 transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                            aria-label="Read standard aloud">
                            <i class="fas fa-volume-up"></i>
                        </button>
                    </div>

                    <!-- Official Text -->
                    <div class="mb-4">
                        <p class="text-sm text-text-secondary uppercase tracking-wider font-bold mb-1">Official Standard</p>
                        <p class="text-text-default font-serif italic border-l-2 border-gray-300 dark:border-gray-600 pl-4 py-1">
                            "<?php echo $std['text']; ?>"
                        </p>
                    </div>

                    <!-- Plain English Translation (Highlight) -->
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-100 dark:border-green-900/50">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-lightbulb text-green-600 dark:text-green-400 mt-1"></i>
                            <div>
                                <h4 class="text-green-800 dark:text-green-300 font-bold text-sm mb-1">Plain English Explanation</h4>
                                <p class="text-text-default text-base leading-relaxed">
                                    <?php echo $std['explanation']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- No Results State -->
    <div id="no-results" class="hidden text-center py-20">
        <div class="w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl text-gray-400">
            <i class="fas fa-search"></i>
        </div>
        <h3 class="text-xl font-bold text-text-default mb-2">No standards found</h3>
        <p class="text-text-secondary">Try adjusting your filters or search terms.</p>
        <button onclick="resetFilters()" class="mt-4 text-primary font-bold hover:underline">Clear Filters</button>
    </div>

</main>

<script>
    function filterStandards() {
        const subject = document.getElementById('subject-filter').value;
        const grade = document.getElementById('grade-filter').value;
        const search = document.getElementById('standard-search').value.toLowerCase();
        
        const items = document.querySelectorAll('.standard-item');
        let visibleCount = 0;

        items.forEach(item => {
            const itemSubject = item.dataset.subject;
            const itemGrade = item.dataset.grade;
            const itemSearchData = item.dataset.search;

            const subjectMatch = (subject === 'all' || itemSubject === subject);
            const gradeMatch = (grade === 'all' || itemGrade === grade);
            const searchMatch = (search === '' || itemSearchData.includes(search));

            if (subjectMatch && gradeMatch && searchMatch) {
                item.classList.remove('hidden');
                // Add simple fade in animation
                item.style.opacity = '0';
                setTimeout(() => item.style.opacity = '1', 50);
                visibleCount++;
            } else {
                item.classList.add('hidden');
            }
        });

        // Update UI states
        const noResults = document.getElementById('no-results');
        const container = document.getElementById('standards-container');
        const countLabel = document.getElementById('showing-count');

        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
            container.classList.add('hidden');
            countLabel.textContent = 'No results';
        } else {
            noResults.classList.add('hidden');
            container.classList.remove('hidden');
            countLabel.textContent = `Showing ${visibleCount} standard${visibleCount !== 1 ? 's' : ''}`;
        }
    }

    function resetFilters() {
        document.getElementById('subject-filter').value = 'all';
        document.getElementById('grade-filter').value = 'all';
        document.getElementById('standard-search').value = '';
        filterStandards();
    }

    // Simple Text-to-Speech for Accessibility
    function readStandard(btn) {
        // Stop any current speech
        window.speechSynthesis.cancel();

        // Visual feedback reset
        document.querySelectorAll('.fa-stop').forEach(icon => {
            icon.classList.remove('fa-stop');
            icon.classList.add('fa-volume-up');
            icon.closest('button').classList.remove('text-primary', 'animate-pulse');
        });

        const card = btn.closest('.standard-item');
        const code = card.querySelector('.font-mono').innerText;
        const text = card.querySelector('.font-serif').innerText;
        const expl = card.querySelector('.bg-green-50 p').innerText;

        const utterance = new SpeechSynthesisUtterance(`Standard ${code}. ${text}. In other words: ${expl}`);
        
        // Icon change
        const icon = btn.querySelector('i');
        icon.classList.remove('fa-volume-up');
        icon.classList.add('fa-stop');
        btn.classList.add('text-primary', 'animate-pulse');

        utterance.onend = () => {
            icon.classList.remove('fa-stop');
            icon.classList.add('fa-volume-up');
            btn.classList.remove('text-primary', 'animate-pulse');
        };

        window.speechSynthesis.speak(utterance);
    }
</script>

<?php include 'src/footer.php'; ?>