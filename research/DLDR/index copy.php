<?php
// --- Page-Specific Variables ---
$pageTitle = 'Research Platform';
$pageDescription = 'An ongoing research journal exploring the educational journey of students with dyslexia.';
$pageKeywords = 'dyslexia, research, journal, education, classroom, phonology, reading';
$pageAuthor = 'Research Team';

// --- Include Header ---
include '../../src/header.php';
?>

<!-- 
  --- Page-Specific Styles ---
  Custom scrollbars and animation classes
-->
<style>
    /* Custom scrollbar for content area */
    .content-scrollbar::-webkit-scrollbar { width: 8px; }
    .content-scrollbar::-webkit-scrollbar-track { background: var(--color-base-bg); }
    .content-scrollbar::-webkit-scrollbar-thumb { background: var(--color-text-secondary); border-radius: 4px; opacity: 0.5; }
    .content-scrollbar::-webkit-scrollbar-thumb:hover { background: var(--color-primary); }

    /* Hide scrollbar for modal but allow scroll */
    .modal-scrollbar-hidden { scrollbar-width: none; -ms-overflow-style: none; }
    .modal-scrollbar-hidden::-webkit-scrollbar { display: none; }

    /* Tag Styles */
    .journal-tag {
        transition: all 0.2s ease;
    }
    .journal-tag:hover {
        transform: translateY(-1px);
    }
    
    /* Fade animation for list updates */
    .fade-in { animation: fadeIn 0.3s ease-in-out; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- 
  --- Main Page Content ---
-->
<main class="flex-1 overflow-y-auto content-scrollbar py-10 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="mb-8 text-center sm:text-left">
            <h2 class="text-3xl font-bold text-text-default mb-3">Project Journal</h2>
            <p class="text-lg text-text-secondary max-w-2xl">
                Exploring the educational journey of students with dyslexia through evidence-based research and classroom observations.
            </p>
        </div>

        <!-- Controls Bar: Search & Sort -->
        <div class="bg-content-bg rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 p-4 mb-8 flex flex-col md:flex-row gap-4 justify-between items-center sticky top-20 z-30">
            <!-- Search -->
            <div class="relative w-full md:w-96 group">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-text-secondary group-focus-within:text-primary transition-colors"></i>
                <input type="text" id="searchInput" placeholder="Search title, content, or tags..." 
                    class="w-full pl-10 pr-4 py-2 bg-base-bg border border-slate-200 dark:border-slate-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-text-default placeholder-text-secondary transition-all">
            </div>

            <!-- Sort & Filter Actions -->
            <div class="flex items-center gap-3 w-full md:w-auto">
                <div class="relative w-full md:w-48">
                    <select id="sortSelect" class="w-full appearance-none pl-4 pr-10 py-2 bg-base-bg border border-slate-200 dark:border-slate-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-text-default cursor-pointer">
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                        <option value="az">Title (A-Z)</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-text-secondary pointer-events-none"></i>
                </div>
            </div>
        </div>

        <!-- Active Filters (Hidden by default) -->
        <div id="activeFilters" class="hidden mb-6 flex-wrap gap-2 items-center">
            <span class="text-sm text-text-secondary">Filtered by:</span>
            <span id="filterTagBadge" class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-medium">
                <span id="filterTagText">Tag Name</span>
                <button id="clearFilterBtn" class="hover:text-red-500 ml-1"><i class="fas fa-times"></i></button>
            </span>
        </div>

        <!-- Journal Entries Grid -->
        <div id="journalEntriesContainer" class="grid grid-cols-1 gap-6">
            <!-- Content injected by JS -->
        </div>

        <!-- Pagination Controls -->
        <div id="paginationControls" class="mt-10 flex justify-center items-center gap-2 hidden">
            <!-- Injected by JS -->
        </div>
    </div>
</main>

<!-- 
  --- Modal for Full Entry ---
-->
<div id="entryModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
    <div class="bg-content-bg rounded-xl shadow-2xl w-full max-w-4xl transform transition-all duration-300 scale-95 opacity-0 flex flex-col max-h-[90vh] relative border border-slate-200 dark:border-slate-700" id="modalPanel">
        
        <!-- Modal Header -->
        <div class="flex justify-between items-start px-6 py-5 border-b border-slate-200 dark:border-slate-700 bg-base-bg/50 rounded-t-xl">
            <div class="pr-8">
                <h3 class="text-xl sm:text-2xl font-bold text-text-default leading-tight" id="modalTitle"></h3>
                <div class="flex flex-wrap items-center gap-3 mt-2 text-sm text-text-secondary">
                    <span class="flex items-center gap-1"><i class="far fa-user"></i> <span id="modalAuthor"></span></span>
                    <span class="flex items-center gap-1"><i class="far fa-calendar"></i> <span id="modalDate"></span></span>
                </div>
            </div>
            <button id="closeModalBtn" class="text-text-secondary hover:text-red-500 transition-colors p-1 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div id="modalContentArea" class="p-6 sm:p-8 space-y-6 overflow-y-auto modal-scrollbar-hidden flex-1">
            <!-- Tags in Modal -->
            <div id="modalTags" class="flex flex-wrap gap-2"></div>

            <!-- Summary Box -->
            <div class="bg-primary/5 border-l-4 border-primary p-4 rounded-r-lg">
                <h4 class="text-sm font-bold text-primary uppercase tracking-wide mb-1">Abstract</h4>
                <p id="modalSummary" class="text-text-default italic leading-relaxed"></p>
            </div>

            <!-- Full Content -->
            <div class="prose dark:prose-invert max-w-none text-text-default">
                <div id="modalFullContent" class="space-y-4 leading-relaxed"></div>
            </div>
        </div>

        <!-- Modal Footer (Actions) -->
        <div class="px-6 py-4 bg-base-bg border-t border-slate-200 dark:border-slate-700 rounded-b-xl flex flex-col sm:flex-row justify-between items-center gap-4">
            
            <!-- Navigation within Modal -->
            <div class="flex items-center gap-2 order-2 sm:order-1 w-full sm:w-auto justify-between sm:justify-start">
                <button id="prevEntryBtn" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-text-secondary hover:text-primary hover:bg-content-bg rounded-lg border border-transparent hover:border-slate-200 dark:hover:border-slate-700 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                    <i class="fas fa-arrow-left"></i> Previous
                </button>
                <button id="nextEntryBtn" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-text-secondary hover:text-primary hover:bg-content-bg rounded-lg border border-transparent hover:border-slate-200 dark:hover:border-slate-700 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                    Next <i class="fas fa-arrow-right"></i>
                </button>
            </div>

            <!-- Export Tools -->
            <div class="flex flex-wrap items-center gap-2 order-1 sm:order-2">
                <button id="shareBtn" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Copy Text">
                    <i class="fas fa-copy"></i> <span class="text-sm font-medium ml-1">Copy</span>
                </button>
                <div class="h-4 w-px bg-slate-300 dark:bg-slate-600 mx-1"></div>
                <span class="text-xs font-bold text-text-secondary uppercase tracking-wider">Export:</span>
                <button id="pdfBtn" class="px-3 py-1.5 text-xs font-bold bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded hover:bg-primary hover:text-white hover:border-primary transition-all">PDF</button>
                <button id="htmlBtn" class="px-3 py-1.5 text-xs font-bold bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded hover:bg-primary hover:text-white hover:border-primary transition-all">HTML</button>
                <button id="mdBtn" class="px-3 py-1.5 text-xs font-bold bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded hover:bg-primary hover:text-white hover:border-primary transition-all">MD</button>
            </div>
        </div>
    </div>
</div>

<!-- Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/turndown/dist/turndown.js"></script>

<!-- Application Logic -->
<script type="module">
    // --- DATA STORE ---
    const journalData = [
        {
            id: 'scope-definition-001',
            title: 'Journal Scope: The Multifaceted Impact of Dyslexia',
            author: 'Research Team',
            date: 'December 5, 2025',
            timestamp: new Date('2025-12-05').getTime(),
            tags: ['Overview', 'Neurobiology', 'Scope', 'Advocacy'],
            summary: 'Our journal goes beyond "reading backward." This inaugural post outlines the neurobiological, cognitive, and emotional scope of dyslexia that we will explore.',
            fullSummary: 'Dyslexia is often misunderstood as simply "reading backward," but it is a complex neurobiological condition that affects nearly every aspect of a student\'s learning journey. This foundational article outlines the scope of this journal, breaking down the impact of dyslexia into four critical areas: Core Academic Skills, Cognitive Processes, Social and Emotional Impact, and Educational Considerations. We explain why covering each of these areas is critical for identifying and supporting students effectively.',
            fullContent: `
                <p class="text-lg leading-relaxed mb-6 font-medium text-text-default">
                    Dyslexia, being a neurobiological condition, can permeate almost every aspect of a student's learning journey, often in ways that are not immediately obvious. It's much more than just "reading backward." This journal will explore the following critical areas:
                </p>

                <!-- SECTION I -->
                <h2 class="text-2xl font-bold text-primary mt-8 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">I. Core Academic Skills</h2>

                <h3 class="text-xl font-bold mt-6 mb-2">Phonological Awareness</h3>
                <p class="mb-2 italic text-sm text-text-secondary">This is the foundational skill for reading and is the most common area of difficulty.</p>
                <ul class="list-disc pl-5 space-y-1 mb-4 text-text-default">
                    <li><strong>Rhyming & Alliteration:</strong> Struggling to identify patterns (e.g., "cat" and "hat").</li>
                    <li><strong>Segmentation:</strong> Trouble breaking words into syllables or individual phonemes.</li>
                    <li><strong>Manipulation:</strong> Difficulty adding, deleting, or substituting sounds.</li>
                </ul>
                <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border-l-4 border-red-500 mb-6">
                    <strong class="block text-red-700 dark:text-red-300 mb-1">Why this matters:</strong>
                    <p class="text-sm text-text-default">Without strong phonological awareness, learning phonics becomes exceptionally challenging, directly impeding reading and spelling development.</p>
                </div>

                <h3 class="text-xl font-bold mt-6 mb-2">Reading Fluency & Comprehension</h3>
                <ul class="list-disc pl-5 space-y-1 mb-4 text-text-default">
                    <li><strong>Fluency:</strong> Dyslexic students often read slowly, word-by-word, leading to fatigue and a lack of prosody (expression).</li>
                    <li><strong>Comprehension:</strong> The cognitive effort spent on decoding leaves little capacity for understanding meaning, leading to reduced vocabulary and trouble with inference.</li>
                </ul>
                <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border-l-4 border-red-500 mb-6">
                    <strong class="block text-red-700 dark:text-red-300 mb-1">Why this matters:</strong>
                    <p class="text-sm text-text-default">Poor comprehension affects performance in all subjects that rely on reading, including science, history, and even math word problems.</p>
                </div>

                <h3 class="text-xl font-bold mt-6 mb-2">Writing, Spelling, and Language</h3>
                <p class="mb-2 text-text-default">Writing challenges include phonetic spelling ("fone" for "phone"), difficulty organizing ideas, and dysgraphia (poor handwriting). Spoken language issues can include "tip-of-the-tongue" phenomena (anomia).</p>
                
                <h3 class="text-xl font-bold mt-6 mb-2">Mathematics & Foreign Languages</h3>
                <p class="mb-2 text-text-default"><strong>Math:</strong> Issues with memorizing facts, sequencing multi-step problems, and understanding word problems.</p>
                <p class="mb-2 text-text-default"><strong>Languages:</strong> Significant struggle with pronunciation and vocabulary in new languages.</p>

                <!-- SECTION II -->
                <h2 class="text-2xl font-bold text-primary mt-10 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">II. Cognitive and Processing Aspects</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="bg-base-bg p-4 rounded border border-gray-100 dark:border-gray-700">
                        <h4 class="font-bold mb-2">Processing Speed</h4>
                        <p class="text-sm">Slower reading and delayed response times. Students may know the material but fail timed tests.</p>
                    </div>
                    <div class="bg-base-bg p-4 rounded border border-gray-100 dark:border-gray-700">
                        <h4 class="font-bold mb-2">Working Memory</h4>
                        <p class="text-sm">Difficulty holding numbers in mind for math, or forgetting the start of a sentence by the end.</p>
                    </div>
                </div>
                <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border-l-4 border-blue-500 mb-6">
                    <strong class="block text-blue-700 dark:text-blue-300 mb-1">Why this matters:</strong>
                    <p class="text-sm text-text-default">These neurological differences are the underlying cause of learning difficulties, requiring specific evidence-based instructional approaches rather than just "working harder."</p>
                </div>

                <!-- SECTION III -->
                <h2 class="text-2xl font-bold text-primary mt-10 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">III. Social and Emotional Impact</h2>

                <ul class="list-disc pl-5 space-y-2 mb-4 text-text-default">
                    <li><strong>Self-Esteem:</strong> Repeated struggles lead to feelings of inadequacy ("I'm not smart enough").</li>
                    <li><strong>Anxiety:</strong> School avoidance, test anxiety, and physical symptoms like headaches.</li>
                    <li><strong>Motivation:</strong> "Learned helplessness"—giving up because effort doesn't seem to yield results.</li>
                    <li><strong>Social Isolation:</strong> Fear of embarrassment prevents class participation and peer connection.</li>
                </ul>
                <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg border-l-4 border-orange-500 mb-6">
                    <strong class="block text-orange-700 dark:text-orange-300 mb-1">Why this matters:</strong>
                    <p class="text-sm text-text-default">These emotional toll can lead to a withdrawal from academic and social activities, impacting overall well-being far beyond the classroom.</p>
                </div>

                <!-- SECTION IV -->
                <h2 class="text-2xl font-bold text-primary mt-10 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">IV. Educational Support</h2>

                <p class="mb-4 text-text-default">We will advocate for:</p>
                <ul class="list-disc pl-5 space-y-2 mb-4 text-text-default">
                    <li><strong>Early Identification:</strong> To prevent the "widening gap" and secondary emotional trauma.</li>
                    <li><strong>Specialized Instruction:</strong> Multisensory, explicit, and systematic phonics (Structured Literacy).</li>
                    <li><strong>Accommodations:</strong> Tools like text-to-speech that level the playing field without lowering expectations.</li>
                    <li><strong>Strengths-Based Approach:</strong> Focusing on talents in arts, engineering, or problem-solving to boost confidence.</li>
                </ul>
                
                <p class="mt-8 font-bold text-center text-primary">Dyslexia is not "cured," but managed. Understanding this scope ensures support transitions from school into adulthood.</p>
            `
        }
    ];

    // --- STATE ---
    let state = {
        entries: [...journalData], // Filtered list
        currentPage: 1,
        itemsPerPage: 5,
        searchQuery: '',
        sortBy: 'newest',
        filterTag: null, // null or string
        currentEntryId: null
    };

    const { jsPDF } = window.jspdf;
    const turndownService = new TurndownService();

    // --- UI REFERENCES ---
    const container = document.getElementById('journalEntriesContainer');
    const searchInput = document.getElementById('searchInput');
    const sortSelect = document.getElementById('sortSelect');
    const paginationEl = document.getElementById('paginationControls');
    const activeFiltersEl = document.getElementById('activeFilters');
    const filterTagText = document.getElementById('filterTagText');
    const clearFilterBtn = document.getElementById('clearFilterBtn');

    // --- INIT ---
    function init() {
        processData(); // Sort and Filter
        render();      // Draw UI
        setupEventListeners();
    }

    // --- CORE LOGIC ---

    function processData() {
        let result = journalData;

        // 1. Search
        if (state.searchQuery) {
            const q = state.searchQuery.toLowerCase();
            result = result.filter(e => 
                e.title.toLowerCase().includes(q) || 
                e.summary.toLowerCase().includes(q) ||
                e.tags.some(t => t.toLowerCase().includes(q))
            );
        }

        // 2. Tag Filter
        if (state.filterTag) {
            result = result.filter(e => e.tags.includes(state.filterTag));
        }

        // 3. Sort
        result.sort((a, b) => {
            if (state.sortBy === 'newest') return b.timestamp - a.timestamp;
            if (state.sortBy === 'oldest') return a.timestamp - b.timestamp;
            if (state.sortBy === 'az') return a.title.localeCompare(b.title);
            return 0;
        });

        state.entries = result;
        
        // Reset to page 1 if pages decrease
        const maxPage = Math.ceil(state.entries.length / state.itemsPerPage) || 1;
        if (state.currentPage > maxPage) state.currentPage = 1;
    }

    function render() {
        // Active Filters UI
        if (state.filterTag) {
            activeFiltersEl.classList.remove('hidden');
            activeFiltersEl.classList.add('flex');
            filterTagText.textContent = state.filterTag;
        } else {
            activeFiltersEl.classList.add('hidden');
            activeFiltersEl.classList.remove('flex');
        }

        container.innerHTML = '';

        if (state.entries.length === 0) {
            container.innerHTML = `
                <div class="text-center py-16 bg-base-bg rounded-lg border border-dashed border-slate-300 dark:border-slate-700">
                    <i class="fas fa-search text-4xl text-text-secondary mb-4 opacity-50"></i>
                    <p class="text-lg text-text-secondary">No journals found matching your criteria.</p>
                    <button id="resetSearchBtn" class="mt-4 text-primary font-bold hover:underline">Clear Search</button>
                </div>
            `;
            document.getElementById('resetSearchBtn')?.addEventListener('click', clearAllFilters);
            paginationEl.classList.add('hidden');
            return;
        }

        // Pagination Slice
        const start = (state.currentPage - 1) * state.itemsPerPage;
        const end = start + state.itemsPerPage;
        const pageItems = state.entries.slice(start, end);

        // Render Cards
        pageItems.forEach(entry => {
            const card = document.createElement('article');
            card.className = 'bg-content-bg shadow-sm hover:shadow-md transition-shadow rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden flex flex-col fade-in';
            
            // Generate Tag HTML
            const tagHtml = entry.tags.map(tag => 
                `<span class="journal-tag inline-block px-2 py-1 text-xs font-semibold bg-base-bg text-text-secondary rounded-md cursor-pointer hover:bg-primary hover:text-white" data-tag="${tag}">#${tag}</span>`
            ).join('');

            card.innerHTML = `
                <div class="p-6 flex-1">
                    <div class="flex justify-between items-start mb-2">
                        <div class="space-x-1 mb-2">${tagHtml}</div>
                        <span class="text-xs text-text-secondary whitespace-nowrap">${entry.date}</span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-text-default hover:text-primary transition-colors cursor-pointer read-trigger" data-id="${entry.id}">
                        ${entry.title}
                    </h3>
                    
                    <p class="text-sm text-text-secondary mt-1 mb-4">By ${entry.author}</p>
                    
                    <p class="text-text-default leading-relaxed line-clamp-3">
                        ${entry.summary}
                    </p>
                </div>
                <div class="px-6 pb-6 pt-0 flex justify-between items-center mt-auto">
                    <button class="read-more-btn flex items-center gap-2 text-sm font-bold text-primary hover:text-secondary transition-colors" data-id="${entry.id}">
                        Read Article <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            `;
            container.appendChild(card);
        });

        renderPagination();
    }

    function renderPagination() {
        const totalPages = Math.ceil(state.entries.length / state.itemsPerPage);
        
        if (totalPages <= 1) {
            paginationEl.classList.add('hidden');
            return;
        }
        
        paginationEl.classList.remove('hidden');
        paginationEl.innerHTML = '';

        // Prev Button
        const prevBtn = document.createElement('button');
        prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prevBtn.disabled = state.currentPage === 1;
        prevBtn.className = `p-2 rounded-lg ${state.currentPage === 1 ? 'text-gray-300 cursor-not-allowed' : 'text-primary hover:bg-base-bg'}`;
        prevBtn.onclick = () => changePage(state.currentPage - 1);
        paginationEl.appendChild(prevBtn);

        // Page Numbers
        for (let i = 1; i <= totalPages; i++) {
            const pageBtn = document.createElement('button');
            pageBtn.textContent = i;
            if (i === state.currentPage) {
                pageBtn.className = 'w-8 h-8 rounded-lg bg-primary text-white font-bold shadow-md';
            } else {
                pageBtn.className = 'w-8 h-8 rounded-lg text-text-secondary hover:bg-base-bg hover:text-primary transition-colors';
            }
            pageBtn.onclick = () => changePage(i);
            paginationEl.appendChild(pageBtn);
        }

        // Next Button
        const nextBtn = document.createElement('button');
        nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
        nextBtn.disabled = state.currentPage === totalPages;
        nextBtn.className = `p-2 rounded-lg ${state.currentPage === totalPages ? 'text-gray-300 cursor-not-allowed' : 'text-primary hover:bg-base-bg'}`;
        nextBtn.onclick = () => changePage(state.currentPage + 1);
        paginationEl.appendChild(nextBtn);
    }

    // --- EVENTS & ACTIONS ---

    function changePage(pageNum) {
        state.currentPage = pageNum;
        render();
        container.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function clearAllFilters() {
        state.searchQuery = '';
        state.filterTag = null;
        searchInput.value = '';
        processData();
        render();
    }

    function setupEventListeners() {
        // Search
        searchInput.addEventListener('input', (e) => {
            state.searchQuery = e.target.value;
            state.currentPage = 1;
            processData();
            render();
        });

        // Sort
        sortSelect.addEventListener('change', (e) => {
            state.sortBy = e.target.value;
            processData();
            render();
        });

        // Clear Filter
        if(clearFilterBtn) {
            clearFilterBtn.addEventListener('click', () => {
                state.filterTag = null;
                processData();
                render();
            });
        }

        // Container Clicks (Delegation for cards and tags)
        container.addEventListener('click', (e) => {
            // Click Tag
            if (e.target.classList.contains('journal-tag')) {
                state.filterTag = e.target.dataset.tag;
                state.currentPage = 1;
                processData();
                render();
                return;
            }

            // Click Open Modal
            const btn = e.target.closest('.read-more-btn') || e.target.closest('.read-trigger');
            if (btn) {
                openEntryModal(btn.dataset.id);
            }
        });

        // Modal Controls
        document.getElementById('closeModalBtn').addEventListener('click', () => showModal(false));
        document.getElementById('entryModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('entryModal')) showModal(false);
        });

        // Prev/Next in Modal
        document.getElementById('prevEntryBtn').addEventListener('click', () => navigateModal(-1));
        document.getElementById('nextEntryBtn').addEventListener('click', () => navigateModal(1));

        // Downloads
        setupDownloads();
    }

    // --- MODAL LOGIC ---

    function showModal(show = true) {
        const modal = document.getElementById('entryModal');
        const panel = document.getElementById('modalPanel');
        
        if (show) {
            document.body.style.overflow = 'hidden';
            modal.classList.remove('hidden');
            // Small delay for animation
            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                panel.classList.remove('opacity-0', 'scale-95');
                panel.classList.add('scale-100');
            });
        } else {
            document.body.style.overflow = '';
            modal.classList.add('opacity-0');
            panel.classList.add('opacity-0', 'scale-95');
            panel.classList.remove('scale-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                state.currentEntryId = null;
            }, 300);
        }
    }

    function openEntryModal(id) {
        const entry = journalData.find(e => e.id === id);
        if (!entry) return;

        state.currentEntryId = id;

        // Content
        document.getElementById('modalTitle').textContent = entry.title;
        document.getElementById('modalAuthor').textContent = entry.author;
        document.getElementById('modalDate').textContent = entry.date;
        document.getElementById('modalSummary').textContent = entry.fullSummary;
        document.getElementById('modalFullContent').innerHTML = entry.fullContent;
        
        // Tags
        const tagsContainer = document.getElementById('modalTags');
        tagsContainer.innerHTML = entry.tags.map(t => 
            `<span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded font-bold uppercase tracking-wider">${t}</span>`
        ).join('');

        // Navigation Button State
        updateModalNavButtons();

        showModal(true);
    }

    function navigateModal(direction) {
        // Find current index in the FILTERED list (state.entries)
        // This allows users to browse through their search results
        const currentIndex = state.entries.findIndex(e => e.id === state.currentEntryId);
        if (currentIndex === -1) return;

        const newIndex = currentIndex + direction;
        if (newIndex >= 0 && newIndex < state.entries.length) {
            openEntryModal(state.entries[newIndex].id);
        }
    }

    function updateModalNavButtons() {
        const currentIndex = state.entries.findIndex(e => e.id === state.currentEntryId);
        const prevBtn = document.getElementById('prevEntryBtn');
        const nextBtn = document.getElementById('nextEntryBtn');

        prevBtn.disabled = currentIndex <= 0;
        nextBtn.disabled = currentIndex >= state.entries.length - 1;
        
        // Visual styling for disabled state handled by CSS :disabled class
    }

    // --- DOWNLOADS & UTILS ---

    function setupDownloads() {
        const getEntry = () => journalData.find(e => e.id === state.currentEntryId);

        document.getElementById('shareBtn').addEventListener('click', function() {
            const entry = getEntry();
            if(!entry) return;
            
            const text = `${entry.title}\n${window.location.href}`;
            navigator.clipboard.writeText(text).then(() => {
                const icon = this.querySelector('i');
                const span = this.querySelector('span');
                const originalIcon = icon.className;
                
                icon.className = 'fas fa-check';
                span.textContent = 'Copied!';
                setTimeout(() => {
                    icon.className = originalIcon;
                    span.textContent = 'Copy';
                }, 2000);
            });
        });

        document.getElementById('txtBtn').addEventListener('click', () => {
            const entry = getEntry();
            if(!entry) return;
            const text = `${entry.title}\nBy ${entry.author}\n\nSummary:\n${entry.fullSummary}\n\n---\n\n${entry.fullContent.replace(/<[^>]*>?/gm, '')}`; // Simple strip tags
            download(entry.title + '.txt', text, 'text/plain');
        });

        document.getElementById('htmlBtn').addEventListener('click', () => {
            const entry = getEntry();
            if(!entry) return;
            const html = `<html><body><h1>${entry.title}</h1>${entry.fullContent}</body></html>`;
            download(entry.title + '.html', html, 'text/html');
        });

        document.getElementById('pdfBtn').addEventListener('click', () => {
            const entry = getEntry();
            if(!entry) return;
            
            const doc = new jsPDF();
            const pageWidth = doc.internal.pageSize.getWidth();
            const pageHeight = doc.internal.pageSize.getHeight();
            const margin = 20;
            const maxLineWidth = pageWidth - (margin * 2);
            let cursorY = margin;

            // Helper to add text and check page bounds
            function addText(text, fontSize, fontType, textColor = 0) {
                doc.setFontSize(fontSize);
                doc.setFont("helvetica", fontType);
                doc.setTextColor(textColor);
                
                const lines = doc.splitTextToSize(text, maxLineWidth);
                
                lines.forEach(line => {
                    if (cursorY > pageHeight - margin) {
                        doc.addPage();
                        cursorY = margin;
                    }
                    doc.text(line, margin, cursorY);
                    cursorY += (fontSize / 2); // Line spacing relative to font
                });
                
                cursorY += (fontSize / 3); // Paragraph spacing
            }

            // 1. Title
            addText(entry.title, 18, "bold");
            
            // 2. Author/Date
            addText(`By ${entry.author} | ${entry.date}`, 10, "normal", 100);
            cursorY += 5; // Extra gap

            // 3. Summary Heading
            addText("Abstract", 12, "bold");
            
            // 4. Summary Text
            addText(entry.fullSummary, 11, "italic");
            
            // 5. Divider Line
            if (cursorY > pageHeight - margin) { doc.addPage(); cursorY = margin; }
            doc.setDrawColor(200);
            doc.line(margin, cursorY, pageWidth - margin, cursorY);
            cursorY += 15;

            // 6. Full Content
            // We fetch the text from the rendered DOM element to preserve visual line breaks
            const contentEl = document.getElementById('modalFullContent');
            // Fallback if modal isn't open or element missing (unlikely)
            const rawText = contentEl ? contentEl.innerText : entry.fullContent.replace(/<[^>]+>/g, '\n');
            
            addText(rawText, 11, "normal");

            // Save
            doc.save(`${entry.title.substring(0, 30).replace(/[^a-z0-9]/gi, '_')}.pdf`);
        });
    }

    function download(filename, content, mime) {
        const element = document.createElement('a');
        const file = new Blob([content], {type: mime});
        element.href = URL.createObjectURL(file);
        element.download = filename;
        document.body.appendChild(element);
        element.click();
        document.body.removeChild(element);
    }

    // Run
    init();

</script>

<?php
include '../../src/footer.php';
?>