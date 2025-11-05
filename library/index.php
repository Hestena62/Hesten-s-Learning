<?php
// --- Page-Specific Variables ---
// These variables will be used by header.php
$pageTitle = 'Hesten\'s Learning Library';
$pageDescription = 'Browse your personal collection of digital books in a Netflix-style interface.';
$pageKeywords = 'library, books, epub, pdf, digital library, collection';
$pageAuthor = 'Hesten\'s Learning'; // Or your site name
$welcomeMessage = "Welcome to Hesten\ 's Learning Library";

// --- TYPO FIX ---
// Changed "leashure" to "leisure"
$welcomeParagraph = "Please take a look around and read at your leisure.";

// --- Book Data Array ---
// In a real application, you would fetch this data from your database.
$categories = [
    "Recently Added" => [
        [
            "id" => "midnight-library", // <-- FUTURE IMPROVEMENT: Add a unique ID
            "title" => "The Midnight Library",
            "author" => "Matt Haig",
            "isbn" => "978-0735211292",
            "date" => "2020-09-29",
            "img" => "https://placehold.co/300x450/7c3aed/white?text=The+Midnight\nLibrary",
            "description" => "Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. To see how things would be if you had made other choices... Would you have done anything different, if you had the chance to undo your regrets?",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#"
        ],
        [
            "id" => "dune",
            "title" => "Dune",
            "author" => "Frank Herbert",
            "isbn" => "978-0441172719",
            "date" => "1965-08-01",
            "img" => "https://placehold.co/300x450/e89f33/black?text=Dune",
            "description" => "Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the 'spice' melange, a drug capable of extending life and enhancing consciousness. A stunning blend of adventure and mysticism, environmentalism, and politics.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#"
        ],
        [
            "id" => "atomic-habits",
            "title" => "Atomic Habits",
            "author" => "James Clear",
            "isbn" => "978-0735211292",
            "date" => "2018-10-16",
            "img" => "https://placehold.co/300x450/3498db/white?text=Atomic\nHabits",
            "description" => "An easy and proven way to build good habits and break bad ones. James Clear, an expert on habit formation, reveals practical strategies that will teach you exactly how to form good habits, break bad ones, and master the tiny behaviors that lead to remarkable results.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#"
        ],
        [
            "id" => "project-hail-mary",
            "title" => "Project Hail Mary",
            "author" => "Andy Weir",
            "isbn" => "978-0593135204",
            "date" => "2021-05-04",
            "img" => "https://placehold.co/300x450/f39c12/black?text=Project+Hail+Mary",
            "description" => "A lone astronaut. An impossible mission. An ally he never expected. Ryland Grace is the sole survivor on a desperate, last-chance mission—and if he fails, humanity and the earth itself will perish.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#"
        ],
        [
            "id" => "placeholder-1",
            "title" => "Placeholder Book 1",
            "author" => "Author 1",
            "isbn" => "123-456",
            "date" => "2023-01-01",
            "img" => "https://placehold.co/300x450/2ecc71/black?text=Book+One",
            "description" => "Description for placeholder book 1.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#"
        ],
        [
            "id" => "placeholder-2",
            "title" => "Placeholder Book 2",
            "author" => "Author 2",
            "isbn" => "123-457",
            "date" => "2023-02-01",
            "img" => "https://placehold.co/300x450/e74c3c/white?text=Book+Two",
            "description" => "Description for placeholder book 2.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#"
        ],
        [
            "id" => "placeholder-3",
            "title" => "Placeholder Book 3",
            "author" => "Author 3",
            "isbn" => "123-458",
            "date" => "2023-03-01",
            "img" => "https://placehold.co/300x450/9b59b6/white?text=Book+Three",
            "description" => "Description for placeholder book 3.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#"
        ],
        [
            "id" => "placeholder-4",
            "title" => "Placeholder Book 4",
            "author" => "Author 4",
            "isbn" => "123-459",
            "date" => "2023-04-01",
            "img" => "https://placehold.co/300x450/1abc9c/black?text=Book+Four",
            "description" => "Description for placeholder book 4.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#"
        ],
    ],
    "Classic Fiction" => [
        [
            "id" => "1984",
            "title" => "1984",
            "author" => "George Orwell",
            "isbn" => "978-0451524935",
            "date" => "1949-06-08",
            "img" => "https://m.media-amazon.com/images/I/71wANojhEKL._AC_UF1000,1000_QL80_.jpg",
            "fallback-img" => "https://placehold.co/300x450/c0392b/white?text=1984",
            "description" => "A dystopian social science fiction novel and cautionary tale. The story follows the life of Winston Smith, a low-ranking member of 'the Party,' who is frustrated by the omnipresent eyes of the party, and its ominous ruler Big Brother.",
            "pdf-link" => "https://cdn.hestena62.com/library/Nineteen%20eighty-four%20-%20George%20Orwell.pdf",
            "epub-link" => "https://cdn.hestena62.com/library/Nineteen%20eighty-four%20-%20George%20Orwell.epub",
            "read-online-link" => "library/read/1984.php"
        ],
        [
            "id" => "mockingbird",
            "title" => "To Kill a Mockingbird",
            "author" => "Harper Lee",
            "isbn" => "978-0061120084",
            "date" => "1960-07-11",
            "img" => "https://placehold.co/300x450/ecf0f1/black?text=To+Kill+a\nMockingbird",
            "description" => "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#"
        ],
        // ... other books with unique IDs ...
    ],
    // ... other categories ...
];

// --- Include Header ---
// This file contains the <head>, <body> tag, and navigation
require_once 'src/header.php';
?>

<!-- 
    --- Page-Specific Styles ---
    IMPROVEMENT: Consider moving this to an external CSS file (e.g., /css/library.css)
    and including it in header.php for better organization.
-->
<style>
    /* Customize scrollbars for a cleaner look */
    .book-row::-webkit-scrollbar {
        height: 8px;
    }
    .book-row::-webkit-scrollbar-track {
        /* Use theme-aware colors */
        background: var(--color-content-bg, #2d3748); 
        border-radius: 10px;
    }
    .book-row::-webkit-scrollbar-thumb {
        background: var(--color-secondary, #4a5568);
        border-radius: 10px;
    }
    .book-row::-webkit-scrollbar-thumb:hover {
        background: var(--color-primary, #718096);
    }

    /* Book cover styles */
    .book-cover {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .book-cover:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.5);
    }
    
    /* Modal fade-in */
    .modal-fade {
        transition: opacity 0.3s ease;
    }

    /* --- IMPROVEMENT: Hide download buttons if they are disabled --- */
    .download-link[href="#"],
    .download-link[href=""] {
        display: none;
    }
</style>

<!-- 
    --- Work in Progress Popup ---
    This is a one-time popup for the library page.
-->
<div id="work-in-progress-popup" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden" role="dialog"
    aria-modal="true" aria-labelledby="wip-popup-title">
    <!-- content-bg makes this modal theme-aware -->
    <div class="bg-content-bg rounded-xl shadow-2xl p-8 max-w-lg w-full text-center relative mx-4">
      <h2 id="wip-popup-title" class="text-2xl font-bold mb-4 text-primary">A Note from Hesten</h2>
      <!-- text-text-default makes this modal theme-aware -->
      <p class="mb-6 text-text-default text-lg">
        Please enjoy the books with images, as I am adding books one at a time.
      </p>
      <button id="close-wip-popup"
        class="bg-primary text-white px-6 py-2 rounded-full font-semibold hover:bg-secondary transition focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
        aria-label="Close this note">
        Got it!
      </button>
    </div>
</div>

<!-- 
    --- Main Page Content ---
    This is the unique content for the library page.
-->
<div class="container mx-auto px-4 py-8">

    <?php
    // --- Dynamic Category & Book Rendering ---
    // Loop through each Category
    foreach ($categories as $categoryName => $books) :
    ?>
        
        <!-- Category Section -->
        <section class="mb-12">
            <!-- Category Title, using theme-aware text color -->
            <h2 class="text-2xl font-semibold mb-4 text-text-secondary"><?php echo htmlspecialchars($categoryName); ?></h2>
            
            <!-- Book Row -->
            <div class="book-row flex space-x-4 overflow-x-auto pb-4">
                
                <?php
                // Loop through each Book in the Category
                foreach ($books as $book) :
                ?>

                    <!-- 
                        Book Item
                        ---
                        IMPROVEMENT (Scalability): 
                        For a very large library, consider only putting a unique ID here,
                        e.g., data-book-id="<?php echo htmlspecialchars($book['id']); ?>".
                        Then, use JavaScript (fetch) to get the book's details from the server
                        as JSON when the modal is opened. This keeps the initial HTML light.
                    -->
                    <div class="flex-shrink-0 cursor-pointer group" 
                         onclick="openModal(this)"
                         data-title="<?php echo htmlspecialchars($book['title']); ?>"
                         data-author="<?php echo htmlspecialchars($book['author']); ?>"
                         data-isbn="<?php echo htmlspecialchars($book['isbn']); ?>"
                         data-date="<?php echo htmlspecialchars($book['date']); ?>"
                         data-img="<?php echo htmlspecialchars($book['img']); ?>"
                         data-description="<?php echo htmlspecialchars($book['description']); ?>"
                         data-pdf-link="<?php echo htmlspecialchars($book['pdf-link']); ?>"
                         data-epub-link="<?php echo htmlspecialchars($book['epub-link']); ?>"
                         data-read-online-link="<?php echo htmlspecialchars($book['read-online-link'] ?? '#'); ?>">
                        
                        <img src="<?php echo htmlspecialchars($book['img']); ?>" 
                             alt="<?php echo htmlspecialchars($book['title']); ?>"
                             class="book-cover w-40 h-60 md:w-48 md:h-72 object-cover rounded-lg"
                             onerror="this.onerror=null; this.src='<?php echo isset($book['fallback-img']) ? htmlspecialchars($book['fallback-img']) : 'https://placehold.co/300x450/6b7280/white?text=Image+Not+Found'; ?>';">
                    </div>

                <?php endforeach; // End book loop ?>

            </div> <!-- End book-row -->
        </section> <!-- End Category Section -->

    <?php endforeach; // End category loop ?>

</div> <!-- End Main Content Container -->


<!-- 
    --- Book Modal Structure ---
    This is the pop-up that displays book information.
    It's hidden by default and populated by JavaScript.
    It uses theme-aware colors like bg-content-bg and text-text-default.
-->
<div id="bookModal" class="modal-fade hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 p-4 opacity-0" onclick="closeModal()">
    
    <!-- Use bg-content-bg for theme-aware background -->
    <div class="bg-content-bg rounded-lg shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
        <!-- Modal Content -->
        <div class="flex flex-col md:flex-row">
            <!-- Book Cover -->
            <img id="modal-img" src="https://placehold.co/300x450" alt="Book Cover" class="w-full md:w-1/3 h-auto object-cover rounded-l-lg">
            
            <!-- Book Details -->
            <div class="p-6 md:p-8 flex-1">
                <div class="flex justify-between items-start mb-2">
                    <!-- Use text-text-default for theme-aware text -->
                    <h2 id="modal-title" class="text-3xl font-bold text-text-default">Book Title</h2>
                    <button onclick="closeModal()" class="text-text-secondary hover:text-text-default text-3xl font-bold">&times;</button>
                </div>
                
                <!-- Use text-primary for theme-aware accent color -->
                <p id="modal-author" class="text-lg text-primary mb-4">by Author Name</p>
                
                <!-- Use text-text-secondary for theme-aware body text -->
                <p id="modal-description" class="text-text-secondary mb-6 leading-relaxed">Book description goes here.</p>

                <h3 class="text-xl font-semibold mb-3 text-text-default">Book Info</h3>
                <div class="grid grid-cols-2 gap-x-4 gap-y-2 text-text-secondary mb-6">
                    <div>
                        <strong class="text-text-default">ISBN:</strong>
                        <span id="modal-isbn">000-0000000000</span>
                    </div>
                    <div>
                        <strong class="text-text-default">Published:</strong>
                        <span id="modal-date">YYYY-MM-DD</span>
                    </div>
                </div>

                <h3 class="text-xl font-semibold mb-3 text-text-default">Downloads</h3>
                <div class="flex flex-wrap gap-4">
                    
                    <!-- 
                        --- IMPROVEMENT (Conditional Rendering) ---
                        The 'download-link' class is added.
                        The CSS will now hide this <a> tag if its href is "#" or "".
                    -->
                    
                    <!-- Read Online Button (Styled with green) -->
                    <a id="modal-read-online-link" href="#" class="download-link inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition duration-200 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        Read Online
                    </a>
                    
                    <!-- PDF Button (Styled with red) -->
                    <a id="modal-pdf-link" href="#" class="download-link inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition duration-200 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        PDF
                    </a>
                    <!-- ePub Button (Styled with blue) -->
                    <a id="modal-epub-link" href="#" class="download-link inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-200 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.747 0-3.332.477-4.5 1.253"></path></svg>
                        Epub
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 
    --- Page-Specific JavaScript ---
    IMPROVEMENT: Consider moving these scripts to an external JS file (e.g., /js/library.js)
    and including it in footer.php for better organization.
-->
<script>
// --- WIP Popup Script ---
document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("work-in-progress-popup");
    const closeBtn = document.getElementById("close-wip-popup");
    const POPUP_STORAGE_KEY = 'hl_library_wip_dismissed';

    if (popup && closeBtn) {
        // Check if popup was already dismissed
        try {
            if (localStorage.getItem(POPUP_STORAGE_KEY) === 'true') {
                popup.classList.add("hidden");
                return; // Don't show it
            }
        } catch (e) {
            console.warn("Could not read from localStorage", e);
        }

        // If not dismissed, show it
        popup.classList.remove("hidden");

        // Attach listener to close button
        closeBtn.addEventListener("click", function () {
            popup.classList.add("hidden");
            // Save dismissed state
            try {
                localStorage.setItem(POPUP_STORAGE_KEY, 'true');
            } catch (e) {
                console.warn("Could not write to localStorage", e);
            }
        });
        
        // Auto-focus the close button for accessibility
        closeBtn.focus();
    }
});

// --- Book Modal Script ---
(function() {
    const modal = document.getElementById('bookModal');
    if (!modal) return; // Guard clause if modal isn't on the page

    // Get modal elements once
    const modalTitle = document.getElementById('modal-title');
    const modalAuthor = document.getElementById('modal-author');
    const modalDescription = document.getElementById('modal-description');
    const modalIsbn = document.getElementById('modal-isbn');
    const modalDate = document.getElementById('modal-date');
    const modalImg = document.getElementById('modal-img');
    const modalPdfLink = document.getElementById('modal-pdf-link');
    const modalEpubLink = document.getElementById('modal-epub-link');
    const modalReadOnlineLink = document.getElementById('modal-read-online-link');

    // Make functions available globally
    window.openModal = function(element) {
        // Get all data from the clicked element
        const data = element.dataset;

        // Populate the modal fields
        modalTitle.textContent = data.title;
        modalAuthor.textContent = 'by '.concat(data.author);
        modalDescription.textContent = data.description;
        modalIsbn.textContent = data.isbn;
        modalDate.textContent = data.date;
        modalImg.src = data.img;
        
        // Set href for links
        modalPdfLink.href = data.pdfLink;
        modalEpubLink.href = data.epubLink;
        modalReadOnlineLink.href = data.readOnlineLink;

        // --- IMPROVEMENT (Conditional Rendering) ---
        // This JavaScript part is technically redundant now because the CSS
        // ( .download-link[href="#"] ) already handles hiding.
        // However, this is how you would do it purely in JS.
        // We can leave the CSS-only solution as it's simpler.
        // modalPdfLink.style.display = (data.pdfLink && data.pdfLink !== "#") ? 'inline-flex' : 'none';
        // modalEpubLink.style.display = (data.epubLink && data.epubLink !== "#") ? 'inline-flex' : 'none';

        // Show the modal with a fade-in effect
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
        }, 10); // Short delay to allow CSS transition to apply
    }

    window.closeModal = function() {
        // Fade-out effect
        modal.classList.add('opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300); // Must match the transition duration
    }

    // Close modal if escape key is pressed
    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
})();
</script>

<?php
// --- Include Footer ---
// This file contains the footer, global modals, and closing </body>/</html> tags
require_once 'src/footer.php';
?>