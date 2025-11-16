<?php
// --- Page-Specific Variables ---
// These variables are used by your header.php to set the title, description, etc.
$pageTitle = 'Research Platform';
$pageDescription = 'An ongoing research journal exploring the educational journey of students with dyslexia.';
$pageKeywords = 'dyslexia, research, journal, education, classroom';
$pageAuthor = 'Research Team'; // You can change this as needed

// --- Include Header ---
// This brings in the <head>, <body>, nav bar, and accessibility panel
include 'src\header.php';
?>

<!-- 
  --- Page-Specific Styles ---
  These styles were in your original HTML file's <head>.
  We add them here to apply your custom scrollbar styles for the content and modal.
-->
<style>
    /* Custom scrollbar for content area */
    .content-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .content-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9; /* slate-100 */
    }
    .content-scrollbar::-webkit-scrollbar-thumb {
        background: #94a3b8; /* slate-400 */
        border-radius: 3px;
    }
    .content-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #64748b; /* slate-500 */
    }
    /* Custom scrollbar for modal content */
    #modalContentArea::-webkit-scrollbar {
        width: 6px;
    }
    #modalContentArea::-webkit-scrollbar-track {
        background: #e2e8f0; /* slate-200 */
    }
    #modalContentArea::-webkit-scrollbar-thumb {
        background: #94a3b8; /* slate-400 */
        border-radius: 3px;
    }
    #modalContentArea::-webkit-scrollbar-thumb:hover {
        background: #64748b; /* slate-500 */
    }
    /* Hide scrollbar by default */
    .modal-scrollbar-hidden {
         scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none;  /* IE and Edge */
    }
    .modal-scrollbar-hidden::-webkit-scrollbar {
        display: none; /* Chrome, Safari, and Opera */
    }
</style>

<!-- 
  --- Main Page Content ---
  This is the <main> block from your original HTML file.
-->
<main class="flex-1 overflow-y-auto content-scrollbar py-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- MODIFIED: Replaced static text colors with theme-aware CSS variable classes -->
        <h2 class="text-2xl font-bold text-text-default mb-2">Project Journal: Dyslexia in the Classroom</h2>
        <p class="text-lg text-text-secondary mb-8">An ongoing research journal exploring the educational journey of students with dyslexia.</p>
        
        <!-- Journal Entries Container -->
        <!-- Entries will be dynamically injected here by JavaScript -->
        <div id="journalEntriesContainer" class="space-y-6">
            <!-- Loading/Empty state can be handled by JS, but for simplicity, we'll just populate -->
        </div>
    </div>
</main>

<!-- 
  --- Modal for Full Entry ---
  This is the modal HTML from your original HTML file.
  We place it here so it's part of the body, before the footer.
-->
<div id="entryModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50 hidden transition-opacity duration-300 opacity-0" aria-labelledby="modalTitle" role="dialog" aria-modal="true">
    <!-- MODIFIED: Replaced bg-white with bg-content-bg -->
    <div class="bg-content-bg rounded-lg shadow-xl w-full max-w-3xl transform transition-all duration-300 scale-95 opacity-0 flex flex-col max-h-[90vh]" id="modalPanel">
        
        <!-- Modal Header -->
        <!-- MODIFIED: Replaced static colors with theme-aware classes -->
        <div class="flex justify-between items-center px-6 py-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="text-xl font-semibold text-text-default" id="modalTitle"></h3>
            <button id="closeModalBtn" class="text-text-secondary hover:text-text-default">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Modal Body (Scrollable) -->
        <div id="modalContentArea" class="p-6 sm:p-8 space-y-6 overflow-y-auto modal-scrollbar-hidden">
            <!-- MODIFIED: Replaced static colors with theme-aware classes -->
            <div class="text-sm text-text-secondary">
                <span id="modalAuthor" class="font-medium text-text-default"></span> &middot; <span id="modalDate"></span>
            </div>
            
            <!-- Summary Section -->
            <div>
                <h4 class="text-lg font-semibold text-text-default mb-2">Summary</h4>
                <p id="modalSummary" class="text-text-default leading-relaxed"></p>
            </div>

            <!-- Divider -->
            <!-- MODIFIED: Added dark mode border -->
            <hr class="border-slate-200 dark:border-slate-700">

            <!-- Full Content Section -->
            <div>
                <h4 class="text-lg font-semibold text-text-default mb-3">Full Text</h4>
                <!-- MODIFIED: Replaced static colors with theme-aware classes -->
                <div id="modalFullContent" class="text-text-default space-y-4 leading-relaxed">
                    <!-- Full content HTML will be injected here -->
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <!-- MODIFIED: Replaced static colors with theme-aware classes -->
        <div class="px-6 py-4 bg-base-bg border-t border-slate-200 dark:border-slate-700 rounded-b-lg flex flex-wrap gap-2 justify-between items-center">
            <div class="flex flex-wrap gap-2">
                <button id="shareBtn" class="flex items-center gap-1.5 px-3 py-1.5 text-sm bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded-md shadow-sm hover:bg-base-bg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12s-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 100-2.684 3 3 0 000 2.684z" /></svg>
                    <span>Share</span>
                </button>
                <span id="shareFeedback" class="text-sm text-cyan-600 hidden items-center px-2">Copied!</span>
            </div>
            <div class="flex flex-wrap gap-2">
                <span class="text-sm text-text-secondary self-center hidden sm:inline">Download as:</span>
                <button id="pdfBtn" class="px-2.5 py-1.5 text-sm bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded-md shadow-sm hover:bg-base-bg" title="Download PDF">PDF</button>
                <button id="htmlBtn" class="px-2.5 py-1.5 text-sm bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded-md shadow-sm hover:bg-base-bg" title="Download HTML">HTML</button>
                <button id="txtBtn" class="px-2.5 py-1.5 text-sm bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded-md shadow-sm hover:bg-base-bg" title="Download TXT">TXT</button>
                <button id="mdBtn" class="px-2.5 py-1.5 text-sm bg-content-bg border border-slate-300 dark:border-slate-600 text-text-default rounded-md shadow-sm hover:bg-base-bg" title="Download Markdown">.md</button>
            </div>
        </div>
    </div>
</div>

<!-- 
  --- Page-Specific JavaScript ---
  These scripts are required by your application logic below.
  We load them here, just before the footer.php include.
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/turndown/dist/turndown.js"></script>

<!-- 
  --- Application Logic ---
  This is the <script type="module"> from your original HTML file.
  It contains all the logic to render journal entries, handle modals, and manage downloads.
-->
<script type="module">
    // --- DATA STORE ---
    // Add new journal entries here.
    // 'summary' is the short snippet for the card.
    // 'fullSummary' is the summary for the modal.
    // 'fullContent' is the main article text for the modal (as an HTML string).
    const journalData = [
        {
            id: 'entry-1',
            title: 'Initial Observations: The Impact of Classroom Layout',
            author: 'Research Team',
            date: 'October 28, 2025',
            summary: 'This first week of observation focused on three separate 4th-grade classrooms, each with a different physical layout...', // Short snippet for the card
            fullSummary: 'This first week of observation focused on three separate 4th-grade classrooms, each with a different physical layout. The goal was to identify potential environmental barriers or aids for students exhibiting dyslexic tendencies.',
            fullContent: `
                <p><strong>Classroom A (Traditional Rows):</strong> Students with suspected dyslexia appeared to have more difficulty tracking text on the main whiteboard, especially from the back of the room. There was a noticeable increase in "off-task" behavior, such as fidgeting or looking out the window, during periods of direct instruction.</p>
                <p><strong>Classroom B (Group Pods):</strong> This layout facilitated peer-to-peer support, which was a double-edged sword. While some students quietly received help from peers, others appeared to rely heavily on them, masking their own reading challenges. The noise level was also a significant factor, potentially creating a distracting environment for students who require high levels of concentration for decoding.</p>
                <p>Further research will involve interviewing the teachers from each classroom to correlate these observations with their own assessments.</p>
            `
        },
        {
            id: 'entry-2',
            title: 'Technology in Practice: Assistive Tech Adoption and Stigma',
            author: 'Research Team',
            date: 'November 10, 2025',
            summary: 'This entry examines the use of text-to-speech (TTS) software and specialized fonts in a controlled setting...',
            fullSummary: 'This journal entry examines the use of text-to-speech (TTS) software and specialized fonts (e.g., OpenDyslexic) in a controlled setting. We provided two students, both with formal dyslexia diagnoses, access to tablets equipped with these tools.',
            fullContent: `
                <p><strong>Student 1 (Male, 9):</strong> Immediately gravitated towards the TTS feature. His comprehension scores on test materials improved by an average of 35% when using TTS versus reading unaided. However, he expressed reluctance to use the device "in front of everyone" for fear of appearing different.</p>
                <p><strong>Student 2 (Female, 10):</strong> Showed a strong preference for the specialized font, stating it made the letters "stop jumping." While her reading speed only increased marginally (8%), her self-reported reduction in visual stress and fatigue was significant.</p>
                <p>The key takeaway is not just the efficacy of the tools, but the critical importance of addressing the social-emotional component. The perceived stigma of using assistive technology can be as significant a barrier as the disability itself. Normalizing these tools as "just another way to learn" (like glasses or pencils) must be part of the implementation strategy.</p>
            `
        }
    ];

    // --- GLOBAL VARIABLES ---
    let currentEntry = null; // Stores the data of the currently open modal
    const { jsPDF } = window.jspdf; // Get PDF library
    const turndownService = new TurndownService(); // Get Markdown library

    // --- UI ELEMENTS ---
    const entriesContainer = document.getElementById('journalEntriesContainer');
    const modal = document.getElementById('entryModal');
    const modalPanel = document.getElementById('modalPanel');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalTitle = document.getElementById('modalTitle');
    const modalAuthor = document.getElementById('modalAuthor');
    const modalDate = document.getElementById('modalDate');
    const modalSummary = document.getElementById('modalSummary');
    const modalFullContent = document.getElementById('modalFullContent');
    const modalContentArea = document.getElementById('modalContentArea');
    
    // --- DOWNLOAD & SHARE BUTTONS ---
    const shareBtn = document.getElementById('shareBtn');
    const shareFeedback = document.getElementById('shareFeedback');
    const pdfBtn = document.getElementById('pdfBtn');
    const htmlBtn = document.getElementById('htmlBtn');
    const txtBtn = document.getElementById('txtBtn');
    const mdBtn = document.getElementById('mdBtn');


    // --- RENDER FUNCTION ---
    
    /**
     * Renders the journal summary cards on the main page.
     */
    function renderJournalCards() {
        if (!entriesContainer) {
            console.warn('journalEntriesContainer not found. Skipping render.');
            return;
        }
        entriesContainer.innerHTML = ''; // Clear existing entries
        
        if (journalData.length === 0) {
            entriesContainer.innerHTML = `<p class="text-slate-500">No journal entries found.</p>`;
            return;
        }

        journalData.forEach(entry => {
            const card = document.createElement('article');
            // MODIFIED: Replaced static colors with theme-aware classes
            card.className = 'bg-content-bg shadow-sm rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden flex flex-col';
            card.innerHTML = `
                <div class="p-6 sm:p-8 flex-1">
                    <!-- MODIFIED: Replaced static colors with theme-aware classes -->
                    <h3 class="text-xl font-semibold text-text-default">
                        ${entry.title}
                    </h3>
                    <!-- MODIFIED: Replaced static colors with theme-aware classes -->
                    <p class="text-sm text-text-secondary mt-2 mb-4">
                        By <span class="font-medium text-text-default">${entry.author}</span> &middot; ${entry.date}
                    </p>
                    <!-- MODIFIED: Replaced static colors with theme-aware classes -->
                    <p class="text-text-default leading-relaxed">
                        ${entry.summary}
                    </p>
                </div>
                <div class="px-6 sm:px-8 pb-6">
                    <!-- MODIFIED: Replaced static colors with theme-aware classes (from header) -->
                    <button class="read-more-btn font-medium text-primary hover:text-secondary" data-id="${entry.id}">
                        Read More &rarr;
                    </button>
                </div>
            `;
            entriesContainer.appendChild(card);
        });
    }

    // --- MODAL FUNCTIONS ---

    /**
     * Shows or hides the modal.
     * @param {boolean} show - True to show, false to hide.
     */
    function showModal(show = true) {
        if (!modal || !modalPanel || !modalContentArea) return;

        if (show) {
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                modalPanel.classList.remove('scale-95', 'opacity-0');
                modalPanel.classList.add('scale-100', 'opacity-100');
                modalContentArea.classList.remove('modal-scrollbar-hidden'); // Show scrollbar
            }, 10); // Short delay for transition
        } else {
            document.body.style.overflow = ''; // Restore scrolling
            modalPanel.classList.remove('scale-100', 'opacity-100');
            modalPanel.classList.add('scale-95', 'opacity-0');
            modal.classList.remove('opacity-100');
            modalContentArea.classList.add('modal-scrollbar-hidden'); // Hide scrollbar
            setTimeout(() => {
                modal.classList.add('hidden');
                currentEntry = null; // Clear current entry
                modalContentArea.scrollTop = 0; // Reset scroll
            }, 300); // Match transition duration
        }
    }
    
    /**
     * Opens the modal and populates it with entry data.
     * @param {string} entryId - The ID of the journal entry to show.
     */
    function openEntryModal(entryId) {
        const entry = journalData.find(e => e.id === entryId);
        if (!entry) return;

        currentEntry = entry; // Store for download buttons

        // Populate modal fields
        if (modalTitle) modalTitle.textContent = entry.title;
        if (modalAuthor) modalAuthor.textContent = `By ${entry.author}`;
        if (modalDate) modalDate.textContent = entry.date;
        if (modalSummary) modalSummary.textContent = entry.fullSummary;
        if (modalFullContent) modalFullContent.innerHTML = entry.fullContent;

        showModal(true);
    }
    
    // --- DOWNLOAD & SHARE FUNCTIONS ---
    
    /**
     * Creates and triggers a file download.
     * @param {string} filename - The name of the file to save.
     * @param {string} content - The text content of the file.
     * @param {string} mimeType - The MIME type (e.g., 'text/plain').
     */
    function downloadFile(filename, content, mimeType) {
        const blob = new Blob([content], { type: mimeType });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }

    /**
     * Cleans up HTML for exports.
     */
    function getExportableContent(asHtml = false) {
        if (!currentEntry) return { title: 'export', html: '', text: '' };
        
        const title = currentEntry.title;
        const author = `By ${currentEntry.author}`;
        const date = currentEntry.date;
        
        const summaryTitle = "Summary";
        const summary = currentEntry.fullSummary;
        
        const contentTitle = "Full Text";
        const content = currentEntry.fullContent; // This is already HTML
        
        if (asHtml) {
            // Create a full HTML document string
            const htmlString = `
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-R">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>${title}</title>
                    <style>
                        body { font-family: sans-serif; line-height: 1.6; max-width: 800px; margin: 20px auto; padding: 20px; }
                        h1 { color: #333; }
                        h2 { color: #555; border-bottom: 1px solid #eee; padding-bottom: 5px; }
                        p { color: #444; }
                        .meta { font-style: italic; color: #777; }
                    </style>
                </head>
                <body>
                    <h1>${title}</h1>
                    <p class="meta">${author} &middot; ${date}</p>
                    <h2>${summaryTitle}</h2>
                    <p>${summary}</p>
                    <hr>
                    <h2>${contentTitle}</h2>
                    ${content}
                </body>
                </html>
            `;
            return { title, html: htmlString, text: '' };
        }
        
        // For TXT and PDF
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = content;
        const plainContent = tempDiv.textContent || tempDiv.innerText || '';

        const textString = `
${title}
${author} | ${date}

---
${summaryTitle}
---
${summary}

---
${contentTitle}
---
${plainContent}
        `;
        
        // For Markdown
        const mdContent = turndownService.turndown(content);
        const mdString = `
# ${title}
*${author} | ${date}*

---
## ${summaryTitle}
${summary}

---
## ${contentTitle}
${mdContent}
        `;
        
        return { title, html: mdString, text: textString.trim() };
    }

    // --- EVENT LISTENERS ---

    // Main content click delegation
    if (entriesContainer) {
        entriesContainer.addEventListener('click', (e) => {
            const readMoreBtn = e.target.closest('.read-more-btn');
            if (readMoreBtn) {
                const entryId = readMoreBtn.dataset.id;
                openEntryModal(entryId);
            }
        });
    }

    // Modal close buttons
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', () => showModal(false));
    }
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                showModal(false);
            }
        });
    }
    
    // --- Share & Download Button Listeners ---
    
    if (shareBtn) {
        shareBtn.addEventListener('click', () => {
            if (!currentEntry) return;
            const textToCopy = `${currentEntry.title}\n\n${currentEntry.fullSummary}`;
            
            // Use fallback copy method for iframe compatibility
            const textArea = document.createElement('textarea');
            textArea.value = textToCopy;
            textArea.style.position = 'fixed'; // Make invisible
            textArea.style.top = '-9999px';
            textArea.style.left = '-9999px';
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
                if (shareFeedback) {
                    shareFeedback.classList.remove('hidden');
                    shareFeedback.classList.add('flex');
                    setTimeout(() => {
                        shareFeedback.classList.add('hidden');
                        shareFeedback.classList.remove('flex');
                    }, 2000);
                }
            } catch (err) {
                console.error('Failed to copy text: ', err);
            }
            document.body.removeChild(textArea);
        });
    }

    if (txtBtn) {
        txtBtn.addEventListener('click', () => {
            if (!currentEntry) return;
            const { title, text } = getExportableContent(false);
            const filename = `${title.toLowerCase().replace(/[\s\W-]+/g, '_')}.txt`;
            downloadFile(filename, text, 'text/plain;charset=utf-8');
        });
    }

    if (mdBtn) {
        mdBtn.addEventListener('click', () => {
            if (!currentEntry) return;
            const { title, html } = getExportableContent(false); // html here is mdString
            const filename = `${title.toLowerCase().replace(/[\s\W-]+/g, '_')}.md`;
            downloadFile(filename, html, 'text/markdown;charset=utf-8');
        });
    }
    
    if (htmlBtn) {
        htmlBtn.addEventListener('click', () => {
            if (!currentEntry) return;
            const { title, html } = getExportableContent(true);
            const filename = `${title.toLowerCase().replace(/[\s\W-]+/g, '_')}.html`;
            downloadFile(filename, html, 'text/html;charset=utf-8');
        });
    }
    
    if (pdfBtn) {
        pdfBtn.addEventListener('click', () => {
            if (!currentEntry) return;
            const { title, text } = getExportableContent(false);
            const filename = `${title.toLowerCase().replace(/[\s\W-]+/g, '_')}.pdf`;
            
            try {
                const doc = new jsPDF();
                
                // jspdf's text method is basic, splitTextToSize is needed for wrapping
                const margins = { top: 20, left: 15, right: 15, bottom: 20 };
                const pageWidth = doc.internal.pageSize.getWidth() - margins.left - margins.right;
                
                // Set font. jspdf supports core fonts like 'Helvetica' by default.
                // Using 'Inter' might require font registration, so we'll use a safe fallback.
                doc.setFont('Helvetica', 'normal'); 
                
                const lines = doc.splitTextToSize(text, pageWidth);
                
                let y = margins.top;
                
                lines.forEach((line) => {
                    if (y > doc.internal.pageSize.getHeight() - margins.bottom) {
                        doc.addPage();
                        y = margins.top;
                    }
                    doc.text(line, margins.left, y);
                    y += 7; // line height
                });
                
                doc.save(filename);
            } catch (err)
{
                console.error("Error generating PDF:", err);
                // Fallback to text download if PDF fails
                if (txtBtn) txtBtn.click();
            }
        });
    }

    // --- INITIALIZATION ---
    renderJournalCards();

</script>

<?php
// --- Include Footer ---
// This brings in the <footer>, site-wide modals, all global scripts,
// and closes the </body> and </html> tags.
include '..\..\src\footer.php';
?>