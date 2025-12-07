<?php
// --- Page-Specific Variables ---
$pageTitle        = 'Hesten\'s Learning Library';
$pageDescription  = 'Browse your personal collection of digital books in a Netflix-style interface.';
$pageKeywords     = 'library, books, epub, pdf, digital library, collection';
$pageAuthor       = 'Hesten\'s Learning';
$welcomeMessage   = "Welcome to Hesten's Learning Library";
$welcomeParagraph = "Please take a look around and read at your leisure.";

// --- Book Data Array ---
$categories = [
    "Recently Added" => [
        [
            "id" => "midnight-library",
            "title" => "The Midnight Library",
            "author" => "Matt Haig",
            "isbn" => "978-0735211292",
            "date" => "2020-09-29",
            "img" => "https://placehold.co/300x450/7c3aed/white?text=The+Midnight\nLibrary",
            "description" => "Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "txt-link" => "#",
            "mobi-link" => "#",
            "word-link" => "#",
            "lexile" => "850L"
        ],
        [
            "id" => "dune",
            "title" => "Dune",
            "author" => "Frank Herbert",
            "isbn" => "978-0441172719",
            "date" => "1965-08-01",
            "img" => "https://placehold.co/300x450/e89f33/black?text=Dune",
            "description" => "Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "txt-link" => "#",
            "mobi-link" => "#",
            "word-link" => "#",
            "lexile" => "1080L"
        ],
        [
            "id" => "atomic-habits",
            "title" => "Atomic Habits",
            "author" => "James Clear",
            "isbn" => "978-0735211292",
            "date" => "2018-10-16",
            "img" => "https://placehold.co/300x450/3498db/white?text=Atomic\nHabits",
            "description" => "An easy and proven way to build good habits and break bad ones. James Clear reveals practical strategies that will teach you exactly how to form good habits.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "txt-link" => "#",
            "mobi-link" => "#",
            "word-link" => "#",
            "lexile" => "1100L"
        ]
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
            "description" => "A dystopian social science fiction novel and cautionary tale. The story follows the life of Winston Smith, a low-ranking member of 'the Party'.",
            "pdf-link" => "https://cdn.hestena62.com/library/Nineteen%20eighty-four%20-%20Goerge%20Orwell.pdf",
            "epub-link" => "https://cdn.hestena62.com/library/Nineteen%20eighty-four%20-%20George%20Orwell.epub",
            "read-online-link" => "/library/read/1984.php",
            "txt-link" => "https://cdn.hestena62.com/library/Nineteen%20eighty-four%20-%20George%20Orwell.txt",
            "mobi-link" => "https://cdn.hestena62.com/library/Nineteen%20eighty-four%20-%20George%20Orwell.mobi",
            "word-link" => "https://cdn.hestena62.com/library/Nineteen%20eighty-four%20-%20George%20Orwell.docx",
            "lexile" => "1090L"
        ],
        [
            "id" => "mockingbird",
            "title" => "To Kill a Mockingbird",
            "author" => "Harper Lee",
            "isbn" => "978-0061120084",
            "date" => "1960-07-11",
            "img" => "https://placehold.co/300x450/ecf0f1/black?text=To+Kill+a\nMockingbird",
            "description" => "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "txt-link" => "#",
            "mobi-link" => "#",
            "word-link" => "#",
            "lexile" => "870L"
        ]
    ],
    "Science Fiction" => [
        [
            "id" => "ender-s-game",
            "title" => "Ender's Game",
            "author" => "Orson Scott Card",
            "isbn" => "978-0812550702",
            "date" => "1985-01-15",
            "img" => "https://placehold.co/300x450/2980b9/white?text=Ender's+Game",
            "description" => "In order to develop a secure defense against a hostile alien race's next attack, government agencies breed child geniuses and train them as soldiers.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "txt-link" => "#",
            "mobi-link" => "#",
            "word-link" => "#",
            "lexile" => "780L"
        ]
    ],
    "Fantasy" => [
        [
            "id" => "the-hobbit",
            "title" => "The Hobbit",
            "author" => "J.R.R. Tolkien",
            "isbn" => "978-0345339683",
            "date" => "1937-09-21",
            "img" => "https://placehold.co/300x450/27ae60/white?text=The+Hobbit",
            "description" => "A great modern classic and the prelude to The Lord of the Rings. Bilbo Baggins is a hobbit who enjoys a comfortable, unambitious life.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "txt-link" => "#",
            "mobi-link" => "#",
            "word-link" => "#",
            "lexile" => "1000L"
        ]
    ]
];

// Include Global Header (Root)
include '../src/header.php';
?>

<!-- HERO BACKGROUND -->
<div class="fixed inset-0 -z-10 bg-gradient-to-br from-indigo-900 via-purple-900 to-slate-900">
    <div
        class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 animate-pulse">
    </div>
    <div class="absolute top-[-10%] left-[20%] w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-blob"></div>
    <div
        class="absolute bottom-[-10%] right-[20%] w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-blob animation-delay-2000">
    </div>
</div>

<main id="main-content" class="min-h-screen relative z-10 font-sans pb-20">

    <!-- Hero Section -->
    <section class="relative pt-32 pb-12 text-center px-4">
        <div class="animate-fade-in-up">
            <div
                class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-white/10 backdrop-blur-md mb-6 border border-white/20 shadow-xl">
                <i class="fas fa-book-reader text-4xl text-blue-300"></i>
            </div>
            <h1 class="text-5xl md:text-6xl font-black text-white mb-6 tracking-tight drop-shadow-md">
                The <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-300">Library</span>
            </h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
                <?php echo $welcomeParagraph; ?>
            </p>
        </div>

        <!-- Real-time Search -->
        <div class="mt-12 max-w-xl mx-auto relative group animate-fade-in-up" style="animation-delay: 0.1s;">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full opacity-20 group-hover:opacity-30 blur-lg transition duration-300">
            </div>
            <div
                class="relative flex items-center bg-white/10 backdrop-blur-md border border-white/20 rounded-full p-2 shadow-2xl">
                <i class="fas fa-search text-white/50 ml-4 text-lg"></i>
                <input type="text" id="library-search" placeholder="Search title, author, or ISBN..."
                    class="w-full bg-transparent border-none text-white placeholder-blue-200/50 px-4 py-3 focus:ring-0 focus:outline-none text-lg">
            </div>
        </div>
    </section>

    <!-- Library Content -->
    <div class="container mx-auto px-4 md:px-8 space-y-16">

        <?php foreach ($categories as $categoryName => $books) : ?>
            <section class="library-category animate-fade-in-up">
                <div class="flex items-center gap-4 mb-8">
                    <h2 class="text-2xl font-bold text-white border-l-4 border-blue-400 pl-4">
                        <?php echo htmlspecialchars($categoryName); ?></h2>
                    <div class="h-px bg-white/10 flex-grow"></div>
                </div>

                <!-- Horizontal Scroll Container -->
                <div class="flex overflow-x-auto gap-6 pb-8 pt-2 scrollbar-hide snap-x">
                    <?php foreach ($books as $book) : ?>
                        <!-- Book Card -->
                        <div class="book-card flex-shrink-0 w-48 md:w-56 snap-start group cursor-pointer relative"
                            onclick="openModal(this)" data-title="<?php echo htmlspecialchars($book['title']); ?>"
                            data-author="<?php echo htmlspecialchars($book['author']); ?>"
                            data-isbn="<?php echo htmlspecialchars($book['isbn']); ?>"
                            data-date="<?php echo htmlspecialchars($book['date']); ?>"
                            data-img="<?php echo htmlspecialchars($book['img']); ?>"
                            data-description="<?php echo htmlspecialchars($book['description']); ?>"
                            data-pdf-link="<?php echo htmlspecialchars($book['pdf-link']); ?>"
                            data-epub-link="<?php echo htmlspecialchars($book['epub-link']); ?>"
                            data-read-online-link="<?php echo htmlspecialchars($book['read-online-link'] ?? '#'); ?>"
                            data-txt-link="<?php echo htmlspecialchars($book['txt-link'] ?? '#'); ?>"
                            data-mobi-link="<?php echo htmlspecialchars($book['mobi-link'] ?? '#'); ?>"
                            data-word-link="<?php echo htmlspecialchars($book['word-link'] ?? '#'); ?>"
                            data-lexile="<?php echo htmlspecialchars($book['lexile'] ?? ''); ?>">

                            <!-- Cover Image Wrapper -->
                            <div
                                class="relative aspect-[2/3] rounded-xl overflow-hidden shadow-2xl transition-transform duration-300 group-hover:scale-105 group-hover:-translate-y-2 border border-white/10">
                                <img src="<?php echo htmlspecialchars($book['img']); ?>"
                                    alt="<?php echo htmlspecialchars($book['title']); ?>" class="w-full h-full object-cover"
                                    onerror="this.onerror=null; this.src='<?php echo isset($book['fallback-img']) ? htmlspecialchars($book['fallback-img']) : 'https://placehold.co/300x450/6b7280/white?text=Image+Not+Found'; ?>';">

                                <!-- Hover Overlay -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                    <span class="text-white text-xs font-bold uppercase tracking-wider mb-1"><i
                                            class="fas fa-book-open mr-1"></i> View Details</span>
                                </div>
                            </div>

                            <!-- Info (Below Card) -->
                            <div class="mt-4 text-center">
                                <h3 class="text-white font-bold text-lg leading-tight truncate px-1 book-title">
                                    <?php echo htmlspecialchars($book['title']); ?></h3>
                                <p class="text-blue-200/70 text-sm mt-1 book-author">
                                    <?php echo htmlspecialchars($book['author']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>

        <!-- No Results Message -->
        <div id="no-results" class="hidden text-center py-20">
            <i class="fas fa-search mb-4 text-4xl text-white/20"></i>
            <h3 class="text-xl font-bold text-white/50">No books found matching your search.</h3>
        </div>

    </div>

</main>

<!-- Book Modal -->
<div id="bookModal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300"
    onclick="closeModal()">
    <div class="bg-slate-900 border border-white/20 rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto m-4 relative flex flex-col md:flex-row overflow-hidden"
        onclick="event.stopPropagation()">

        <!-- Close Button -->
        <button onclick="closeModal()"
            class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-black/50 text-white hover:bg-white hover:text-black transition-colors flex items-center justify-center">
            <i class="fas fa-times"></i>
        </button>

        <!-- Book Cover Side -->
        <div class="w-full md:w-1/3 relative h-64 md:h-auto">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50 z-10"></div>
            <img id="modal-img" src="" alt="Book Cover" class="w-full h-full object-cover">
        </div>

        <!-- Details Side -->
        <div class="w-full md:w-2/3 p-8 md:p-10 flex flex-col">
            <div class="mb-6">
                <h2 id="modal-title" class="text-3xl md:text-4xl font-black text-white mb-2 leading-tight"></h2>
                <p id="modal-author" class="text-xl text-blue-400 font-medium"></p>
            </div>

            <div
                class="grid grid-cols-2 gap-4 mb-6 text-sm text-slate-400 bg-white/5 p-4 rounded-xl border border-white/5">
                <div>
                    <span class="block text-xs uppercase tracking-wider opacity-50 mb-1">Published</span>
                    <span id="modal-date" class="text-white font-mono"></span>
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-wider opacity-50 mb-1">ISBN</span>
                    <span id="modal-isbn" class="text-white font-mono"></span>
                </div>
                <div id="modal-lexile-container" class="col-span-2 border-t border-white/10 pt-3 mt-1">
                    <span class="block text-xs uppercase tracking-wider opacity-50 mb-1">Lexile / Reading Level</span>
                    <span id="modal-lexile" class="text-emerald-400 font-bold"></span>
                </div>
            </div>

            <div class="flex-grow">
                <p id="modal-description" class="text-slate-300 leading-relaxed text-lg"></p>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 pt-6 border-t border-white/10 flex flex-wrap gap-4">
                <a id="modal-read-online-link" href="#"
                    class="flex-1 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-white py-3 px-6 rounded-xl font-bold text-center shadow-lg hover:shadow-emerald-500/20 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <i class="fas fa-book-open"></i> Read Online
                </a>

                <div class="flex gap-2">
                    <a id="modal-pdf-link" href="#"
                        class="bg-slate-800 hover:bg-slate-700 text-white p-3 rounded-xl border border-white/10 transition-colors tooltip-btn"
                        title="Download PDF">
                        <i class="fas fa-file-pdf text-red-400"></i>
                    </a>
                    <a id="modal-epub-link" href="#"
                        class="bg-slate-800 hover:bg-slate-700 text-white p-3 rounded-xl border border-white/10 transition-colors tooltip-btn"
                        title="Download ePUB">
                        <i class="fas fa-book text-blue-400"></i>
                    </a>
                    <a id="modal-mobi-link" href="#"
                        class="bg-slate-800 hover:bg-slate-700 text-white p-3 rounded-xl border border-white/10 transition-colors tooltip-btn"
                        title="Download MOBI">
                        <i class="fas fa-tablet-alt text-orange-400"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // --- Live Search Logic ---
    const searchInput = document.getElementById('library-search');
    const bookCards = document.querySelectorAll('.book-card');
    const categories = document.querySelectorAll('.library-category');
    const noResults = document.getElementById('no-results');

    searchInput.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();
        let visibleCount = 0;

        categories.forEach(category => {
            let hasVisibleBook = false;
            const books = category.querySelectorAll('.book-card');

            books.forEach(book => {
                const title = book.querySelector('.book-title').textContent.toLowerCase();
                const author = book.querySelector('.book-author').textContent.toLowerCase();
                // We can also search data attributes if needed
                if (title.includes(term) || author.includes(term)) {
                    book.style.display = 'block';
                    hasVisibleBook = true;
                    visibleCount++;
                } else {
                    book.style.display = 'none';
                }
            });

            // Hide empty categories
            if (hasVisibleBook) {
                category.style.display = 'block';
            } else {
                category.style.display = 'none';
            }
        });

        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    });

    // --- Modal Logic ---
    const modal = document.getElementById('bookModal');
    const modalTitle = document.getElementById('modal-title');
    const modalAuthor = document.getElementById('modal-author');
    const modalDescription = document.getElementById('modal-description');
    const modalIsbn = document.getElementById('modal-isbn');
    const modalDate = document.getElementById('modal-date');
    const modalImg = document.getElementById('modal-img');
    const modalReadOnlineLink = document.getElementById('modal-read-online-link');
    const modalPdfLink = document.getElementById('modal-pdf-link');
    const modalEpubLink = document.getElementById('modal-epub-link');
    const modalMobiLink = document.getElementById('modal-mobi-link');
    const modalLexile = document.getElementById('modal-lexile');
    const modalLexileContainer = document.getElementById('modal-lexile-container');

    window.openModal = function (element) {
        const data = element.dataset;

        modalTitle.textContent = data.title;
        modalAuthor.textContent = data.author;
        modalDescription.textContent = data.description;
        modalIsbn.textContent = data.isbn;
        modalDate.textContent = data.date;
        modalImg.src = data.img;

        // Links
        setupLink(modalReadOnlineLink, data.readOnlineLink);
        setupLink(modalPdfLink, data.pdfLink);
        setupLink(modalEpubLink, data.epubLink);
        setupLink(modalMobiLink, data.mobiLink);

        // Lexile
        if (data.lexile) {
            modalLexile.textContent = data.lexile;
            modalLexileContainer.style.display = 'block';
        } else {
            modalLexileContainer.style.display = 'none';
        }

        modal.classList.remove('hidden');
        // Small delay for fade in
        setTimeout(() => modal.classList.remove('opacity-0'), 10);
    }

    function setupLink(el, url) {
        if (!url || url === '#') {
            el.classList.add('opacity-50', 'pointer-events-none', 'grayscale');
            el.href = '#';
        } else {
            el.classList.remove('opacity-50', 'pointer-events-none', 'grayscale');
            el.href = url;
        }
    }

    window.closeModal = function () {
        modal.classList.add('opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 300);
    }

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });
</script>

<?php include '../src/footer.php'; ?>