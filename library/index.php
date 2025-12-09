<?php
// --- Page-Specific Variables ---
$pageTitle        = 'Hesten\'s Learning Library';
$pageDescription  = 'Browse your personal collection of digital books in a Netflix-style interface.';
$pageKeywords     = 'library, books, epub, pdf, digital library, collection, education, textbooks';
$pageAuthor       = 'Hesten\'s Learning';
$welcomeMessage   = "Welcome to Hesten's Learning Library";
$welcomeParagraph = "Explore our vast collection of fiction classics and comprehensive educational resources for all grade levels.";

// --- Book Data Array ---
$categories = [
    "Recently Added" => [
        [
            "id" => "midnight-library",
            "title" => "The Midnight Library",
            "author" => "Matt Haig",
            "isbn" => "978-0735211292",
            "date" => "2020-09-29",
            "img" => "https://covers.openlibrary.org/b/isbn/9780525559474-L.jpg",
            "description" => "Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "lexile" => "850L"
        ],
        [
            "id" => "dune",
            "title" => "Dune",
            "author" => "Frank Herbert",
            "isbn" => "978-0441172719",
            "date" => "1965-08-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780441172719-L.jpg",
            "description" => "Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "lexile" => "1080L"
        ],
        [
            "id" => "project-hail-mary",
            "title" => "Project Hail Mary",
            "author" => "Andy Weir",
            "isbn" => "978-0593135204",
            "date" => "2021-05-04",
            "img" => "https://covers.openlibrary.org/b/isbn/9780593135204-L.jpg",
            "description" => "Ryland Grace is the sole survivor on a desperate, last-chance mission—and if he fails, humanity and the earth itself will perish.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "lexile" => "950L"
        ]
    ],
    "K-8: Language Arts & Readers" => [
        [
            "id" => "mcguffey-primer",
            "title" => "McGuffey's Eclectic Primer",
            "author" => "William Holmes McGuffey",
            "isbn" => "978-0471294283",
            "date" => "1836-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780471294283-L.jpg",
            "description" => "The classic first reader used for generations to teach reading, featuring simple phonics and moral lessons.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/14640",
            "epub-link" => "https://www.gutenberg.org/ebooks/14640",
            "lexile" => "BR"
        ],
        [
            "id" => "mcguffey-1",
            "title" => "McGuffey's First Reader",
            "author" => "William Holmes McGuffey",
            "isbn" => "978-0471294290",
            "date" => "1836-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780471294290-L.jpg",
            "description" => "Continuing from the Primer, the First Reader introduces more complex vocabulary and sentence structures.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/14642",
            "epub-link" => "https://www.gutenberg.org/ebooks/14642",
            "lexile" => "200L"
        ],
        [
            "id" => "mcguffey-2",
            "title" => "McGuffey's Second Reader",
            "author" => "William Holmes McGuffey",
            "isbn" => "978-0471294306",
            "date" => "1836-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780471294306-L.jpg",
            "description" => "Designed for 2nd and 3rd grades, focusing on storytelling, spelling, and articulation.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/14668",
            "epub-link" => "https://www.gutenberg.org/ebooks/14668",
            "lexile" => "450L"
        ],
        [
            "id" => "mcguffey-3",
            "title" => "McGuffey's Third Reader",
            "author" => "William Holmes McGuffey",
            "isbn" => "978-0471294313",
            "date" => "1836-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780471294313-L.jpg",
            "description" => "For 4th to 6th grades, covering more advanced themes, elocution exercises, and longer narrative passages.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/14766",
            "epub-link" => "https://www.gutenberg.org/ebooks/14766",
            "lexile" => "600L"
        ],
        [
            "id" => "mcguffey-4",
            "title" => "McGuffey's Fourth Reader",
            "author" => "William Holmes McGuffey",
            "isbn" => "978-0471294320",
            "date" => "1837-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780471294320-L.jpg",
            "description" => "A challenging reader for middle grades featuring classic literature excerpts and poetry.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/14880",
            "epub-link" => "https://www.gutenberg.org/ebooks/14880",
            "lexile" => "800L"
        ],
        [
            "id" => "aesops-fables",
            "title" => "Aesop's Fables",
            "author" => "Aesop",
            "isbn" => "978-0140446494",
            "date" => "-600",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140446494-L.jpg",
            "description" => "A collection of fables credited to Aesop, a slave and storyteller believed to have lived in ancient Greece.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/21",
            "epub-link" => "https://www.gutenberg.org/ebooks/21",
            "lexile" => "1000L"
        ]
    ],
    "K-8: Science & Nature" => [
        [
            "id" => "fairyland-science",
            "title" => "The Fairy-Land of Science",
            "author" => "Arabella B. Buckley",
            "isbn" => "978-1409923831",
            "date" => "1879-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9781409923831-L.jpg",
            "description" => "A classic introduction to science for children, explaining concepts like sunbeams, air, water, and plants in an engaging narrative style.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/18528",
            "epub-link" => "https://www.gutenberg.org/ebooks/18528",
            "lexile" => "900L"
        ],
        [
            "id" => "burgess-bird",
            "title" => "The Burgess Bird Book",
            "author" => "Thornton W. Burgess",
            "isbn" => "978-0486213804",
            "date" => "1919-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780486213804-L.jpg",
            "description" => "A delightful introduction to bird life for children through the adventures of Peter Rabbit and his friends.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/3073",
            "epub-link" => "https://www.gutenberg.org/ebooks/3073",
            "lexile" => "750L"
        ],
        [
            "id" => "wonder-book-chem",
            "title" => "The Wonder Book of Chemistry",
            "author" => "Jean-Henri Fabre",
            "isbn" => "978-1596053335",
            "date" => "1922-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9781596053335-L.jpg",
            "description" => "Fabre, the great French naturalist, presents chemistry to his children in a series of engaging experiments and conversations.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/24026",
            "epub-link" => "https://www.gutenberg.org/ebooks/24026",
            "lexile" => "950L"
        ]
    ],
    "K-8: History & Geography" => [
        [
            "id" => "story-of-mankind",
            "title" => "The Story of Mankind",
            "author" => "Hendrik Willem van Loon",
            "isbn" => "978-0871401755",
            "date" => "1921-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780871401755-L.jpg",
            "description" => "Winner of the first Newbery Medal, this book provides a sweeping history of western civilization for young readers.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/754",
            "epub-link" => "https://www.gutenberg.org/ebooks/754",
            "lexile" => "1050L"
        ],
        [
            "id" => "childs-history-world",
            "title" => "A Child's History of England",
            "author" => "Charles Dickens",
            "isbn" => "978-1542385626",
            "date" => "1851-01-25",
            "img" => "https://covers.openlibrary.org/b/isbn/9781542385626-L.jpg",
            "description" => "Charles Dickens' take on the history of England, written specifically for his own children.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/699",
            "epub-link" => "https://www.gutenberg.org/ebooks/699",
            "lexile" => "1000L"
        ],
        [
            "id" => "oregon-trail",
            "title" => "The Oregon Trail",
            "author" => "Francis Parkman",
            "isbn" => "978-0140439212",
            "date" => "1849-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140439212-L.jpg",
            "description" => "A primary account of a journey along the Oregon Trail, giving students a firsthand look at the American frontier.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1229",
            "epub-link" => "https://www.gutenberg.org/ebooks/1229",
            "lexile" => "1180L"
        ]
    ],
    "High School: Mathematics" => [
         [
            "id" => "algebra-and-trig",
            "title" => "Algebra and Trigonometry",
            "author" => "OpenStax",
            "isbn" => "978-1938168376",
            "date" => "2015-02-13",
            "img" => "https://covers.openlibrary.org/b/isbn/9781938168376-L.jpg",
            "description" => "A comprehensive open-source textbook covering the algebraic principles and trigonometry needed for calculus and other advanced coursework.",
            "pdf-link" => "https://openstax.org/details/books/algebra-and-trigonometry",
            "epub-link" => "#",
            "lexile" => "1100L"
        ],
        [
            "id" => "precalculus",
            "title" => "Precalculus",
            "author" => "OpenStax",
            "isbn" => "978-1938168345",
            "date" => "2014-10-23",
            "img" => "https://covers.openlibrary.org/b/isbn/9781938168345-L.jpg",
            "description" => "Comprehensive preparation for Calculus. Covers functions, logarithms, analytical geometry, and sequences.",
            "pdf-link" => "https://openstax.org/details/books/precalculus",
            "epub-link" => "#",
            "lexile" => "1150L"
        ],
        [
            "id" => "intro-statistics",
            "title" => "Introductory Statistics",
            "author" => "OpenStax",
            "isbn" => "978-1938168208",
            "date" => "2013-12-10",
            "img" => "https://covers.openlibrary.org/b/isbn/9781938168208-L.jpg",
            "description" => "Introduction to statistics for high school and college students, covering data analysis, probability, and inference.",
            "pdf-link" => "https://openstax.org/details/books/introductory-statistics",
            "epub-link" => "#",
            "lexile" => "1100L"
        ],
        [
            "id" => "calculus-vol-1",
            "title" => "Calculus Volume 1",
            "author" => "OpenStax",
            "isbn" => "978-1938168024",
            "date" => "2016-03-30",
            "img" => "https://covers.openlibrary.org/b/isbn/9781938168024-L.jpg",
            "description" => "The first of three volumes, focusing on functions, limits, derivatives, and integration.",
            "pdf-link" => "https://openstax.org/details/books/calculus-volume-1",
            "epub-link" => "#",
            "lexile" => "1200L"
        ],
        [
            "id" => "euclids-elements",
            "title" => "Euclid's Elements",
            "author" => "Euclid",
            "isbn" => "978-1888009194",
            "date" => "-300",
            "img" => "https://covers.openlibrary.org/b/isbn/9781888009194-L.jpg",
            "description" => "The classic treatise on geometry. For over two millennia, this was the primary textbook for teaching mathematics.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/21076",
            "epub-link" => "https://www.gutenberg.org/ebooks/21076",
            "lexile" => "1300L"
        ]
    ],
    "High School: Science" => [
        [
            "id" => "biology-2e",
            "title" => "Biology 2e",
            "author" => "OpenStax",
            "isbn" => "978-1947172517",
            "date" => "2018-03-28",
            "img" => "https://covers.openlibrary.org/b/isbn/9781947172517-L.jpg",
            "description" => "A comprehensive biology textbook covering cells, genetics, evolution, and ecology.",
            "pdf-link" => "https://openstax.org/details/books/biology-2e",
            "epub-link" => "#",
            "lexile" => "1150L"
        ],
        [
            "id" => "chemistry-2e",
            "title" => "Chemistry 2e",
            "author" => "OpenStax",
            "isbn" => "978-1947172623",
            "date" => "2019-02-14",
            "img" => "https://covers.openlibrary.org/b/isbn/9781947172623-L.jpg",
            "description" => "Designed for the two-semester general chemistry course, covering atoms, molecules, reactions, and thermodynamics.",
            "pdf-link" => "https://openstax.org/details/books/chemistry-2e",
            "epub-link" => "#",
            "lexile" => "1200L"
        ],
        [
            "id" => "college-physics",
            "title" => "College Physics",
            "author" => "OpenStax",
            "isbn" => "978-1938168000",
            "date" => "2012-06-19",
            "img" => "https://covers.openlibrary.org/b/isbn/9781938168000-L.jpg",
            "description" => "Introduction to physics using algebra-based methods. Covers mechanics, thermodynamics, electromagnetism, and optics.",
            "pdf-link" => "https://openstax.org/details/books/college-physics",
            "epub-link" => "#",
            "lexile" => "1100L"
        ],
        [
            "id" => "origin-of-species",
            "title" => "On the Origin of Species",
            "author" => "Charles Darwin",
            "isbn" => "978-0451529060",
            "date" => "1859-11-24",
            "img" => "https://covers.openlibrary.org/b/isbn/9780451529060-L.jpg",
            "description" => "Darwin's foundational text on evolutionary biology, introducing the scientific theory that populations evolve over the course of generations.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1228",
            "epub-link" => "https://www.gutenberg.org/ebooks/1228",
            "lexile" => "1200L"
        ],
        [
            "id" => "relativity",
            "title" => "Relativity: The Special and General Theory",
            "author" => "Albert Einstein",
            "isbn" => "978-0486417141",
            "date" => "1916-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780486417141-L.jpg",
            "description" => "Einstein's own explanation of his famous theory, written for the general public.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/5001",
            "epub-link" => "https://www.gutenberg.org/ebooks/5001",
            "lexile" => "1300L"
        ]
    ],
    "High School: Social Studies" => [
        [
            "id" => "us-history",
            "title" => "U.S. History",
            "author" => "OpenStax",
            "isbn" => "978-1938168369",
            "date" => "2014-12-30",
            "img" => "https://covers.openlibrary.org/b/isbn/9781938168369-L.jpg",
            "description" => "Covers the breadth of the chronological history of the United States and also provides the necessary depth to ensure the course is manageable.",
            "pdf-link" => "https://openstax.org/details/books/us-history",
            "epub-link" => "#",
            "lexile" => "1150L"
        ],
        [
            "id" => "american-government",
            "title" => "American Government 3e",
            "author" => "OpenStax",
            "isbn" => "978-1951693381",
            "date" => "2021-07-28",
            "img" => "https://covers.openlibrary.org/b/isbn/9781951693381-L.jpg",
            "description" => "The core concepts of American Government and Politics, including the Constitution, civil liberties, and political participation.",
            "pdf-link" => "https://openstax.org/details/books/american-government-3e",
            "epub-link" => "#",
            "lexile" => "1200L"
        ],
         [
            "id" => "economics",
            "title" => "Principles of Economics",
            "author" => "OpenStax",
            "isbn" => "978-1947172364",
            "date" => "2017-10-11",
            "img" => "https://covers.openlibrary.org/b/isbn/9781947172364-L.jpg",
            "description" => "Covers both micro and macroeconomics, balancing theory with application.",
            "pdf-link" => "https://openstax.org/details/books/principles-of-economics-2e",
            "epub-link" => "#",
            "lexile" => "1200L"
        ],
        [
            "id" => "common-sense",
            "title" => "Common Sense",
            "author" => "Thomas Paine",
            "isbn" => "978-0140390162",
            "date" => "1776-01-10",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140390162-L.jpg",
            "description" => "The pamphlet that inspired the Thirteen Colonies to declare and fight for independence from Great Britain.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/147",
            "epub-link" => "https://www.gutenberg.org/ebooks/147",
            "lexile" => "1330L"
        ],
        [
            "id" => "federalist-papers",
            "title" => "The Federalist Papers",
            "author" => "Alexander Hamilton",
            "isbn" => "978-0451528810",
            "date" => "1788-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780451528810-L.jpg",
            "description" => "A collection of 85 articles and essays written to promote the ratification of the United States Constitution.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1404",
            "epub-link" => "https://www.gutenberg.org/ebooks/1404",
            "lexile" => "1450L"
        ]
    ],
    "Classic Fiction" => [
        [
            "id" => "1984",
            "title" => "1984",
            "author" => "George Orwell",
            "isbn" => "978-0451524935",
            "date" => "1949-06-08",
            "img" => "https://covers.openlibrary.org/b/isbn/9780451524935-L.jpg",
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
            "id" => "pride-and-prejudice",
            "title" => "Pride and Prejudice",
            "author" => "Jane Austen",
            "isbn" => "978-0141439518",
            "date" => "1813-01-28",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141439518-L.jpg",
            "description" => "A romantic novel of manners that charts the emotional development of the protagonist Elizabeth Bennet.",
            "pdf-link" => "https://www.gutenberg.org/files/1342/1342-pdf.pdf",
            "epub-link" => "https://www.gutenberg.org/ebooks/1342.epub3.images",
            "read-online-link" => "#",
            "lexile" => "1070L"
        ],
        [
            "id" => "jane-eyre",
            "title" => "Jane Eyre",
            "author" => "Charlotte Brontë",
            "isbn" => "978-0141441146",
            "date" => "1847-10-16",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141441146-L.jpg",
            "description" => "A novel following the emotions and experiences of its eponymous heroine, including her growth to adulthood and her love for Mr. Rochester.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1260",
            "epub-link" => "https://www.gutenberg.org/ebooks/1260",
            "read-online-link" => "#",
            "lexile" => "890L"
        ],
        [
            "id" => "wuthering-heights",
            "title" => "Wuthering Heights",
            "author" => "Emily Brontë",
            "isbn" => "978-0141439556",
            "date" => "1847-12-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141439556-L.jpg",
            "description" => "A tale of the all-encompassing and passionate, yet thwarted, love between Heathcliff and Catherine Earnshaw, and how this unresolved passion eventually destroys them.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/768",
            "epub-link" => "https://www.gutenberg.org/ebooks/768",
            "read-online-link" => "#",
            "lexile" => "880L"
        ],
        [
            "id" => "great-expectations",
            "title" => "Great Expectations",
            "author" => "Charles Dickens",
            "isbn" => "978-0141439563",
            "date" => "1861-08-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141439563-L.jpg",
            "description" => "The story of the orphan Pip, writing his life from his early days of childhood until adulthood and trying to be a gentleman along the way.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1400",
            "epub-link" => "https://www.gutenberg.org/ebooks/1400",
            "read-online-link" => "#",
            "lexile" => "1150L"
        ],
        [
            "id" => "moby-dick",
            "title" => "Moby Dick",
            "author" => "Herman Melville",
            "isbn" => "978-0142437247",
            "date" => "1851-10-18",
            "img" => "https://covers.openlibrary.org/b/isbn/9780142437247-L.jpg",
            "description" => "The narrative of Captain Ahab's obsessive quest for revenge against Moby Dick, the giant white sperm whale that bit off his leg.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/2701",
            "epub-link" => "https://www.gutenberg.org/ebooks/2701",
            "read-online-link" => "#",
            "lexile" => "1200L"
        ],
        [
            "id" => "great-gatsby",
            "title" => "The Great Gatsby",
            "author" => "F. Scott Fitzgerald",
            "isbn" => "978-0743273565",
            "date" => "1925-04-10",
            "img" => "https://covers.openlibrary.org/b/isbn/9780743273565-L.jpg",
            "description" => "A portrait of the Jazz Age in all of its decadence and excess. Jay Gatsby, a man who orders his life around one desire: to be reunited with Daisy Buchanan.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/64317",
            "epub-link" => "https://www.gutenberg.org/ebooks/64317",
            "read-online-link" => "#",
            "lexile" => "1010L"
        ],
        [
            "id" => "mockingbird",
            "title" => "To Kill a Mockingbird",
            "author" => "Harper Lee",
            "isbn" => "978-0061120084",
            "date" => "1960-07-11",
            "img" => "https://covers.openlibrary.org/b/isbn/9780061120084-L.jpg",
            "description" => "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "lexile" => "870L"
        ],
        [
            "id" => "little-women",
            "title" => "Little Women",
            "author" => "Louisa May Alcott",
            "isbn" => "978-0140390698",
            "date" => "1868-09-30",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140390698-L.jpg",
            "description" => "Following the lives of the four March sisters—Meg, Jo, Beth, and Amy—the novel details their passage from childhood to womanhood.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/514",
            "epub-link" => "https://www.gutenberg.org/ebooks/514",
            "read-online-link" => "#",
            "lexile" => "1300L"
        ],
        [
            "id" => "les-miserables",
            "title" => "Les Misérables",
            "author" => "Victor Hugo",
            "isbn" => "978-0451419439",
            "date" => "1862-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780451419439-L.jpg",
            "description" => "Ex-convict Jean Valjean seeks redemption while being pursued by the ruthless Inspector Javert in post-revolutionary France.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/135",
            "epub-link" => "https://www.gutenberg.org/ebooks/135",
            "read-online-link" => "#",
            "lexile" => "990L"
        ],
        [
            "id" => "crime-and-punishment",
            "title" => "Crime and Punishment",
            "author" => "Fyodor Dostoevsky",
            "isbn" => "978-0140449133",
            "date" => "1866-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140449133-L.jpg",
            "description" => "The mental anguish and moral dilemmas of Rodion Raskolnikov, an impoverished ex-student in Saint Petersburg who formulates a plan to kill an unscrupulous pawnbroker.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/2554",
            "epub-link" => "https://www.gutenberg.org/ebooks/2554",
            "read-online-link" => "#",
            "lexile" => "1020L"
        ],
        [
            "id" => "anna-karenina",
            "title" => "Anna Karenina",
            "author" => "Leo Tolstoy",
            "isbn" => "978-0143035008",
            "date" => "1878-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780143035008-L.jpg",
            "description" => "A complex novel in eight parts, with more than a dozen major characters, it is spread over more than 800 pages (depending on the translation), typically contained in two volumes.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1399",
            "epub-link" => "https://www.gutenberg.org/ebooks/1399",
            "read-online-link" => "#",
            "lexile" => "1100L"
        ]
    ],
    "Horror & Gothic" => [
        [
            "id" => "dracula",
            "title" => "Dracula",
            "author" => "Bram Stoker",
            "isbn" => "978-0486411095",
            "date" => "1897-05-26",
            "img" => "https://covers.openlibrary.org/b/isbn/9780486411095-L.jpg",
            "description" => "The story of Count Dracula's attempt to move from Transylvania to England so that he may find new blood and spread the undead curse.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/345",
            "epub-link" => "https://www.gutenberg.org/ebooks/345",
            "read-online-link" => "#",
            "lexile" => "1070L"
        ],
        [
            "id" => "picture-of-dorian-gray",
            "title" => "The Picture of Dorian Gray",
            "author" => "Oscar Wilde",
            "isbn" => "978-0141439570",
            "date" => "1890-07-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141439570-L.jpg",
            "description" => "Dorian Gray sells his soul to ensure that his portrait ages while he remains young and beautiful, living a life of debauchery and sin.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/174",
            "epub-link" => "https://www.gutenberg.org/ebooks/174",
            "read-online-link" => "#",
            "lexile" => "1120L"
        ],
        [
            "id" => "jekyll-and-hyde",
            "title" => "Dr. Jekyll and Mr. Hyde",
            "author" => "Robert Louis Stevenson",
            "isbn" => "978-0141439730",
            "date" => "1886-01-05",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141439730-L.jpg",
            "description" => "A lawyer investigates the strange occurrences between his old friend, Dr. Henry Jekyll, and the evil Edward Hyde.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/43",
            "epub-link" => "https://www.gutenberg.org/ebooks/43",
            "read-online-link" => "#",
            "lexile" => "960L"
        ],
        [
            "id" => "sleepy-hollow",
            "title" => "The Legend of Sleepy Hollow",
            "author" => "Washington Irving",
            "isbn" => "978-1541249653",
            "date" => "1820-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780553213508-L.jpg",
            "description" => "Schoolmaster Ichabod Crane courts Katrina Van Tassel but encounters the spectral Headless Horseman in the secluded glen of Sleepy Hollow.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/41",
            "epub-link" => "https://www.gutenberg.org/ebooks/41",
            "read-online-link" => "#",
            "lexile" => "1140L"
        ],
         [
            "id" => "metamorphosis",
            "title" => "The Metamorphosis",
            "author" => "Franz Kafka",
            "isbn" => "978-0553213690",
            "date" => "1915-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780553213690-L.jpg",
            "description" => "Gregor Samsa wakes up one morning to find himself transformed into a monstrous vermin, and struggles to adjust to his new condition.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/5200",
            "epub-link" => "https://www.gutenberg.org/ebooks/5200",
            "read-online-link" => "#",
            "lexile" => "1340L"
        ]
    ],
    "Science Fiction" => [
        [
            "id" => "frankenstein",
            "title" => "Frankenstein",
            "author" => "Mary Shelley",
            "isbn" => "978-0486282114",
            "date" => "1818-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780486282114-L.jpg",
            "description" => "The story of Victor Frankenstein, a young scientist who creates a sapient creature in an unorthodox scientific experiment.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/84",
            "epub-link" => "https://www.gutenberg.org/ebooks/84",
            "read-online-link" => "#",
            "lexile" => "1170L"
        ],
        [
            "id" => "war-of-the-worlds",
            "title" => "The War of the Worlds",
            "author" => "H.G. Wells",
            "isbn" => "978-0141441030",
            "date" => "1898-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141441030-L.jpg",
            "description" => "A science fiction novel that chronicles the invasion of England by Martians with advanced weaponry.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/36",
            "epub-link" => "https://www.gutenberg.org/ebooks/36",
            "read-online-link" => "#",
            "lexile" => "1100L"
        ],
        [
            "id" => "20000-leagues",
            "title" => "20,000 Leagues Under the Sea",
            "author" => "Jules Verne",
            "isbn" => "978-1853260315",
            "date" => "1870-06-20",
            "img" => "https://covers.openlibrary.org/b/isbn/9781853260315-L.jpg",
            "description" => "Captain Nemo and his submarine Nautilus explore the mysteries of the deep ocean, as seen through the eyes of Professor Aronnax.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/164",
            "epub-link" => "https://www.gutenberg.org/ebooks/164",
            "read-online-link" => "#",
            "lexile" => "1050L"
        ],
        [
            "id" => "journey-center-earth",
            "title" => "Journey to the Center of the Earth",
            "author" => "Jules Verne",
            "isbn" => "978-0140445336",
            "date" => "1864-11-25",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140445336-L.jpg",
            "description" => "A professor, his nephew, and a guide descend into an Icelandic volcano to encounter prehistoric animals and natural hazards deep underground.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/18857",
            "epub-link" => "https://www.gutenberg.org/ebooks/18857",
            "read-online-link" => "#",
            "lexile" => "1080L"
        ],
        [
            "id" => "ender-s-game",
            "title" => "Ender's Game",
            "author" => "Orson Scott Card",
            "isbn" => "978-0812550702",
            "date" => "1985-01-15",
            "img" => "https://covers.openlibrary.org/b/isbn/9780812550702-L.jpg",
            "description" => "In order to develop a secure defense against a hostile alien race's next attack, government agencies breed child geniuses and train them as soldiers.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "lexile" => "780L"
        ],
        [
            "id" => "time-machine",
            "title" => "The Time Machine",
            "author" => "H.G. Wells",
            "isbn" => "978-0141439976",
            "date" => "1895-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141439976-L.jpg",
            "description" => "A Victorian scientist propels himself into the year 802,701 AD, where he meets the peaceful Eloi and the subterranean Morlocks.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/35",
            "epub-link" => "https://www.gutenberg.org/ebooks/35",
            "read-online-link" => "#",
            "lexile" => "1050L"
        ]
    ],
    "Fantasy" => [
        [
            "id" => "the-hobbit",
            "title" => "The Hobbit",
            "author" => "J.R.R. Tolkien",
            "isbn" => "978-0345339683",
            "date" => "1937-09-21",
            "img" => "https://covers.openlibrary.org/b/isbn/9780345339683-L.jpg",
            "description" => "A great modern classic and the prelude to The Lord of the Rings. Bilbo Baggins is a hobbit who enjoys a comfortable, unambitious life.",
            "pdf-link" => "#",
            "epub-link" => "#",
            "read-online-link" => "#",
            "lexile" => "1000L"
        ],
        [
            "id" => "grimms-fairy-tales",
            "title" => "Grimms' Fairy Tales",
            "author" => "The Brothers Grimm",
            "isbn" => "978-0140444018",
            "date" => "1812-12-20",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140444018-L.jpg",
            "description" => "A world-famous collection of German fairy tales, including Cinderella, Rapunzel, Snow White, and Hansel and Gretel.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/2591",
            "epub-link" => "https://www.gutenberg.org/ebooks/2591",
            "read-online-link" => "#",
            "lexile" => "900L"
        ],
        [
            "id" => "alice-in-wonderland",
            "title" => "Alice's Adventures in Wonderland",
            "author" => "Lewis Carroll",
            "isbn" => "978-0141439761",
            "date" => "1865-11-26",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141439761-L.jpg",
            "description" => "Alice falls through a rabbit hole into a fantasy world populated by peculiar, anthropomorphic creatures.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/11",
            "epub-link" => "https://www.gutenberg.org/ebooks/11",
            "read-online-link" => "#",
            "lexile" => "860L"
        ],
        [
            "id" => "peter-pan",
            "title" => "Peter Pan",
            "author" => "J.M. Barrie",
            "isbn" => "978-0141329819",
            "date" => "1911-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141329819-L.jpg",
            "description" => "The story of a mischievous young boy who can fly and never grows up, spending his childhood on the island of Neverland.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/16",
            "epub-link" => "https://www.gutenberg.org/ebooks/16",
            "read-online-link" => "#",
            "lexile" => "920L"
        ],
        [
            "id" => "wizard-of-oz",
            "title" => "The Wonderful Wizard of Oz",
            "author" => "L. Frank Baum",
            "isbn" => "978-0141321028",
            "date" => "1900-05-17",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141321028-L.jpg",
            "description" => "Dorothy is swept away by a tornado from Kansas to the magical Land of Oz.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/55",
            "epub-link" => "https://www.gutenberg.org/ebooks/55",
            "read-online-link" => "#",
            "lexile" => "1000L"
        ]
    ],
    "Adventure & Mystery" => [
        [
            "id" => "sherlock-holmes",
            "title" => "The Adventures of Sherlock Holmes",
            "author" => "Arthur Conan Doyle",
            "isbn" => "978-0140437713",
            "date" => "1892-10-14",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140437713-L.jpg",
            "description" => "A collection of twelve short stories featuring the famous consulting detective Sherlock Holmes.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1661",
            "epub-link" => "https://www.gutenberg.org/ebooks/1661",
            "read-online-link" => "#",
            "lexile" => "1060L"
        ],
        [
            "id" => "robinson-crusoe",
            "title" => "Robinson Crusoe",
            "author" => "Daniel Defoe",
            "isbn" => "978-0141439822",
            "date" => "1719-04-25",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141439822-L.jpg",
            "description" => "The autobiography of a castaway who spends 28 years on a remote tropical desert island near Trinidad.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/521",
            "epub-link" => "https://www.gutenberg.org/ebooks/521",
            "read-online-link" => "#",
            "lexile" => "1070L"
        ],
         [
            "id" => "gullivers-travels",
            "title" => "Gulliver's Travels",
            "author" => "Jonathan Swift",
            "isbn" => "978-0141439495",
            "date" => "1726-10-28",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141439495-L.jpg",
            "description" => "Lemuel Gulliver travels to several remote nations of the world, encountering tiny people, giants, and talking horses.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/829",
            "epub-link" => "https://www.gutenberg.org/ebooks/829",
            "read-online-link" => "#",
            "lexile" => "1210L"
        ],
        [
            "id" => "three-musketeers",
            "title" => "The Three Musketeers",
            "author" => "Alexandre Dumas",
            "isbn" => "978-0140440256",
            "date" => "1844-07-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140440256-L.jpg",
            "description" => "D'Artagnan travels to Paris to join the Musketeers of the Guard and befriends the legendary trio: Athos, Porthos, and Aramis.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1257",
            "epub-link" => "https://www.gutenberg.org/ebooks/1257",
            "read-online-link" => "#",
            "lexile" => "980L"
        ],
        [
            "id" => "treasure-island",
            "title" => "Treasure Island",
            "author" => "Robert Louis Stevenson",
            "isbn" => "978-0141321004",
            "date" => "1883-11-14",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141321004-L.jpg",
            "description" => "A tale of buccaneers and buried gold, focusing on the young Jim Hawkins and the pirate Long John Silver.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/120",
            "epub-link" => "https://www.gutenberg.org/ebooks/120",
            "read-online-link" => "#",
            "lexile" => "1070L"
        ],
        [
            "id" => "monte-cristo",
            "title" => "The Count of Monte Cristo",
            "author" => "Alexandre Dumas",
            "isbn" => "978-0140449266",
            "date" => "1844-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140449266-L.jpg",
            "description" => "The story of Edmond Dantès, a young sailor who is falsely accused of treason and imprisoned without trial, and his brilliant strategy for revenge.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1184",
            "epub-link" => "https://www.gutenberg.org/ebooks/1184",
            "read-online-link" => "#",
            "lexile" => "980L"
        ],
        [
            "id" => "call-of-the-wild",
            "title" => "The Call of the Wild",
            "author" => "Jack London",
            "isbn" => "978-0141321059",
            "date" => "1903-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780141321059-L.jpg",
            "description" => "The story of Buck, a domesticated cloud who is stolen from his California home and sold into service as a sled dog in Alaska.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/215",
            "epub-link" => "https://www.gutenberg.org/ebooks/215",
            "read-online-link" => "#",
            "lexile" => "1120L"
        ],
        [
            "id" => "don-quixote",
            "title" => "Don Quixote",
            "author" => "Miguel de Cervantes",
            "isbn" => "978-0060934347",
            "date" => "1605-01-16",
            "img" => "https://covers.openlibrary.org/b/isbn/9780060934347-L.jpg",
            "description" => "The adventures of a noble from La Mancha who reads so many chivalric romances that he loses his mind and decides to become a knight-errant.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/996",
            "epub-link" => "https://www.gutenberg.org/ebooks/996",
            "read-online-link" => "#",
            "lexile" => "1300L"
        ]
    ],
    "Philosophy & Thought" => [
        [
            "id" => "the-republic",
            "title" => "The Republic",
            "author" => "Plato",
            "isbn" => "978-0140449140",
            "date" => "-375",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140449140-L.jpg",
            "description" => "A Socratic dialogue, authored by Plato around 375 BC, concerning justice, the order and character of the just city-state, and the just man.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1497",
            "epub-link" => "https://www.gutenberg.org/ebooks/1497",
            "read-online-link" => "#",
            "lexile" => "1400L"
        ],
        [
            "id" => "meditations",
            "title" => "Meditations",
            "author" => "Marcus Aurelius",
            "isbn" => "978-0812968255",
            "date" => "180",
            "img" => "https://covers.openlibrary.org/b/isbn/9780812968255-L.jpg",
            "description" => "A series of personal writings by Marcus Aurelius, Roman Emperor from 161 to 180 AD, recording his private notes to himself and ideas on Stoic philosophy.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/2680",
            "epub-link" => "https://www.gutenberg.org/ebooks/2680",
            "read-online-link" => "#",
            "lexile" => "1200L"
        ],
        [
            "id" => "art-of-war",
            "title" => "The Art of War",
            "author" => "Sun Tzu",
            "isbn" => "978-1590302255",
            "date" => "-500",
            "img" => "https://covers.openlibrary.org/b/isbn/9781590302255-L.jpg",
            "description" => "An ancient Chinese military treatise dating from the Late Spring and Autumn Period. The work, which is attributed to the ancient Chinese military strategist Sun Tzu, is composed of 13 chapters.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/132",
            "epub-link" => "https://www.gutenberg.org/ebooks/132",
            "read-online-link" => "#",
            "lexile" => "1140L"
        ],
        [
            "id" => "the-prince",
            "title" => "The Prince",
            "author" => "Niccolò Machiavelli",
            "isbn" => "978-0140449157",
            "date" => "1532-01-01",
            "img" => "https://covers.openlibrary.org/b/isbn/9780140449157-L.jpg",
            "description" => "A 16th-century political treatise, often claimed to be one of the first works of modern political philosophy, in which the effective truth is taken to be more important than any abstract ideal.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/1232",
            "epub-link" => "https://www.gutenberg.org/ebooks/1232",
            "read-online-link" => "#",
            "lexile" => "1400L"
        ],
        [
            "id" => "walden",
            "title" => "Walden",
            "author" => "Henry David Thoreau",
            "isbn" => "978-0691096124",
            "date" => "1854-08-09",
            "img" => "https://covers.openlibrary.org/b/isbn/9780691096124-L.jpg",
            "description" => "A reflection upon simple living in natural surroundings. The work is part personal declaration of independence, social experiment, voyage of spiritual discovery, satire, and manual for self-reliance.",
            "pdf-link" => "https://www.gutenberg.org/ebooks/205",
            "epub-link" => "https://www.gutenberg.org/ebooks/205",
            "read-online-link" => "#",
            "lexile" => "1340L"
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
                        <?php echo htmlspecialchars($categoryName); ?>
                    </h2>
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
                                    <?php echo htmlspecialchars($book['title']); ?>
                                </h3>
                                <p class="text-blue-200/70 text-sm mt-1 book-author">
                                    <?php echo htmlspecialchars($book['author']); ?>
                                </p>
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