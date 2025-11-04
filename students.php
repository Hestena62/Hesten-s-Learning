<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Student Resources - Hesten's Learning";
$pageDescription = "Find all the resources you need for Math, ELA, Science, and Social Studies to support students with learning disabilities.";
$pageAuthor = "Hesten's Learning Team";

// Variables for the welcome popup (located in header.php)
$welcomeMessage = "Welcome, Student!";
$welcomeParagraph = "We've gathered engaging and accessible resources tailored just for you. Get started by exploring your subjects below!";

// Include the header file, which contains the <html>, <head>, and opening <body> tags,
// as well as the navigation bar, accessibility panel, and welcome popup.
include 'src/header.php';
?>

    <!-- Main Content Area -->
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Student Resources</h1>
        <p class="text-center text-lg text-text-secondary mb-8">Find all the resources you need for Math, ELA, Science, and Social Studies.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Math Resources Card -->
            <div class="col-span-1">
                <div class="bg-card-bg rounded-base-rounded shadow-lg p-6 flex flex-col h-full transition-colors duration-300">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-calculator mr-2" aria-hidden="true"></i>Math Resources</h5>
                    <p class="text-text-secondary mb-4 flex-grow">Explore a variety of resources to help you master mathematics concepts, from basic arithmetic to advanced calculus. Click below to see all resources.</p>
                    <!-- Button to open Math modal -->
                    <button onclick="openModal('mathModal')" class="mt-6 px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-accent">
                        View Math Resources
                    </button>
                </div>
            </div>

            <!-- ELA Resources Card -->
            <div class="col-span-1">
                <div class="bg-card-bg rounded-base-rounded shadow-lg p-6 flex flex-col h-full transition-colors duration-300">
                    <h5 class="text-xl font-semibold text-green-600 mb-3"><i class="fas fa-book-open mr-2" aria-hidden="true"></i>ELA Resources</h5>
                    <p class="text-text-secondary mb-4 flex-grow">Enhance your reading, writing, and language skills with our comprehensive English Language Arts resources. Click below to see all resources.</p>
                    <!-- Button to open ELA modal -->
                    <button onclick="openModal('elaModal')" class="mt-6 px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-green-400">
                        View ELA Resources
                    </button>
                </div>
            </div>

            <!-- Science Resources Card -->
            <div class="col-span-1">
                <div class="bg-card-bg rounded-base-rounded shadow-lg p-6 flex flex-col h-full transition-colors duration-300">
                    <h5 class="text-xl font-semibold text-red-600 mb-3"><i class="fas fa-flask mr-2" aria-hidden="true"></i>Science Resources</h5>
                    <p class="text-text-secondary mb-4 flex-grow">Dive into the world of science with resources covering biology, chemistry, physics, and earth science. Click below to see all resources.</p>
                    <!-- Button to open Science modal -->
                    <button onclick="openModal('scienceModal')" class="mt-6 px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-red-400">
                        View Science Resources
                    </button>
                </div>
            </div>

            <!-- Social Studies Resources Card -->
            <div class="col-span-1">
                <div class="bg-card-bg rounded-base-rounded shadow-lg p-6 flex flex-col h-full transition-colors duration-300">
                    <h5 class="text-xl font-semibold text-yellow-600 mb-3"><i class="fas fa-globe-americas mr-2" aria-hidden="true"></i>Social Studies Resources</h5>
                    <p class="text-text-secondary mb-4 flex-grow">Explore history, geography, civics, and economics with engaging social studies materials. Click below to see all resources.</p>
                    <!-- Button to open Social Studies modal -->
                    <button onclick="openModal('socialModal')" class="mt-6 px-4 py-2 bg-yellow-600 text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-yellow-400">
                        View Social Studies Resources
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Modals Section -->

    <!-- Math Modal -->
    <div id="mathModal" class="modal-backdrop hidden" onclick="closeModal('mathModal', event)">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="text-2xl font-semibold text-primary"><i class="fas fa-calculator mr-2" aria-hidden="true"></i>Math Resources</h3>
                    <button onclick="closeModal('mathModal')" class="modal-close-button" aria-label="Close math resources modal">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Practice Problems</h4>
                        <p class="text-text-secondary mb-4">Access a wide range of interactive practice problems, complete with hints and step-by-step solutions to help you understand challenging concepts. The best way to learn math is by doing it!</p>
                        <a href="/student/math-practice.html" class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 mb-4 font-medium transition-colors">Go to Our Practice Problems &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://www.khanacademy.org/math" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Khan Academy</a>: Free practice exercises, quizzes, and instructional videos for all levels.</li>
                            <li><a href="https://www.ixl.com/math" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">IXL Math</a>: Comprehensive K-12 practice problems with detailed explanations.</li>
                        </ul>
                    </section>
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Video Tutorials</h4>
                        <p class="text-text-secondary mb-4">Watch engaging video lessons that break down everything from fractions to algebra. Our visual aids and clear explanations make learning easy.</p>
                        <a href="/student/math-tutorials.html" class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 mb-4 font-medium transition-colors">Browse Our Video Tutorials &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://www.youtube.com/@TheOrganicChemistryTutor" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">The Organic Chemistry Tutor</a>: (Don't let the name fool you!) Amazing, clear videos on Algebra, Geometry, Calculus, and more.</li>
                            <li><a href="https://www.youtube.com/@patrickjmt" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">PatrickJMT</a>: Free math videos from Arithmetic to Differential Equations.</li>
                        </ul>
                    </section>
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Study Guides & Notes</h4>
                        <p class="text-text-secondary mb-4">Download printable study guides and formula sheets. These are perfect for quick reference, test prep, and reinforcing what you've learned in class.</p>
                        <a href="/student/math-study-guides.html" class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 mb-4 font-medium transition-colors">Find Our Study Guides &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">Key Concepts & Formulas:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><strong>PEMDAS:</strong> Parentheses, Exponents, Multiplication/Division, Addition/Subtraction.</li>
                            <li><strong>Area of a Circle:</strong> $A = \pi r^2$</li>
                            <li><strong>Pythagorean Theorem:</strong> $a^2 + b^2 = c^2$</li>
                            <li><strong>Slope-Intercept Form:</strong> $y = mx + b$</li>
                        </ul>
                    </section>
                    <section>
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Interactive Math Games</h4>
                        <p class="text-text-secondary mb-4">Have fun while learning! Our math games are designed to improve your skills in a fun, competitive, and engaging way.</p>
                        <a href="/student/math-games.html" class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 mb-4 font-medium transition-colors">Play Our Math Games &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://www.desmos.com/calculator" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Desmos</a>: A beautiful, free graphing calculator and art tool.</li>
                            <li><a href="https://www.pbskids.org/games/math" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">PBS Kids Math Games</a>: Fun games for elementary and middle school concepts.</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- ELA Modal -->
    <div id="elaModal" class="modal-backdrop hidden" onclick="closeModal('elaModal', event)">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="text-2xl font-semibold text-green-600"><i class="fas fa-book-open mr-2" aria-hidden="true"></i>ELA Resources</h3>
                    <button onclick="closeModal('elaModal')" class="modal-close-button" aria-label="Close ELA resources modal">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Reading Comprehension</h4>
                        <p class="text-text-secondary mb-4">Practice with a variety of texts and question sets designed to improve your ability to understand, analyze, and interpret what you read.</p>
                        <a href="/student/ela-reading.html" class="inline-block px-4 py-2 bg-green-600/10 text-green-700 rounded-lg hover:bg-green-600/20 mb-4 font-medium transition-colors">Start Reading Practice &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">Active Reading Tips:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><strong>Annotate:</strong> Highlight key passages and write notes in the margins.</li>
                            <li><strong>Summarize:</strong> After each section, try to explain the main idea in one sentence.</li>
                            <li><strong>Ask Questions:</strong> Write down questions you have as you read.</li>
                        </ul>
                        <h5 class="text-lg font-medium text-text-primary mt-4 mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://www.newsela.com" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Newsela</a>: Read current events articles at different reading levels.</li>
                            <li><a href="https://www.readwritethink.org/student-interactives" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">ReadWriteThink</a>: Interactive tools for reading and writing.</li>
                        </ul>
                    </section>
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Writing Prompts & Guides</h4>
                        <p class="text-text-secondary mb-4">Get creative with our writing prompts for narratives, essays, and reports. Use our guides to structure your writing and improve your style.</p>
                        <a href="/student/ela-writing.html" class="inline-block px-4 py-2 bg-green-600/10 text-green-700 rounded-lg hover:bg-green-600/20 mb-4 font-medium transition-colors">Explore Writing Guides &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">Example Writing Prompts:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><strong>Narrative:</strong> Write a story about a time you found something you weren't looking for.</li>
                            <li><strong>Persuasive:</strong> Argue for or against this statement: "Social media is good for society."</li>
                            <li><strong>Expository:</strong> Explain how to do your favorite hobby.</li>
                        </ul>
                         <h5 class="text-lg font-medium text-text-primary mt-4 mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://owl.purdue.edu/owl/purdue_owl.html" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Purdue OWL</a>: The ultimate guide for writing, grammar, and citation styles.</li>
                        </ul>
                    </section>
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Grammar & Vocabulary</h4>
                        <p class="text-text-secondary mb-4">Master the rules of grammar with interactive exercises. Expand your vocabulary with daily words, quizzes, and word-based games.</p>
                        <a href="/student/ela-grammar.html" class="inline-block px-4 py-2 bg-green-600/10 text-green-700 rounded-lg hover:bg-green-600/20 mb-4 font-medium transition-colors">Improve Your Grammar &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">Common Pitfalls:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><strong>Their / There / They're:</strong> (Possession / Place / "They are")</li>
                            <li><strong>Your / You're:</strong> (Possession / "You are")</li>
                            <li><strong>Its / It's:</strong> (Possession / "It is")</li>
                        </ul>
                        <h5 class="text-lg font-medium text-text-primary mt-4 mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://www.merriam-webster.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Merriam-Webster</a>: Dictionary and thesaurus with word games.</li>
                            <li><a href="https://www.grammar-monster.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Grammar Monster</a>: Easy-to-understand explanations and interactive tests.</li>
                        </ul>
                    </section>
                    <section>
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Literature Analysis</h4>
                        <p class="text-text-secondary mb-4">Learn how to analyze literature like a pro. We provide guides on theme, character, plot, and literary devices for common books and plays.</p>
                        <a href="/student/ela-literature.html" class="inline-block px-4 py-2 bg-green-600/10 text-green-700 rounded-lg hover:bg-green-600/20 mb-4 font-medium transition-colors">Analyze Literature &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">Key Literary Devices:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><strong>Metaphor:</strong> A direct comparison (e.g., "His eyes were ice.").</li>
                            <li><strong>Simile:</strong> A comparison using "like" or "as" (e.g., "He was as cold as ice.").</li>
                            <li><strong>Theme:</strong> The central idea or message of the story.</li>
                            <li><strong>Character Arc:</strong> The change a character undergoes from beginning to end.</li>
                        </ul>
                        <h5 class="text-lg font-medium text-text-primary mt-4 mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://www.sparknotes.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">SparkNotes</a>: Study guides for hundreds of books.</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Science Modal -->
    <div id="scienceModal" class="modal-backdrop hidden" onclick="closeModal('scienceModal', event)">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="text-2xl font-semibold text-red-600"><i class="fas fa-flask mr-2" aria-hidden="true"></i>Science Resources</h3>
                    <button onclick="closeModal('scienceModal')" class="modal-close-button" aria-label="Close science resources modal">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Virtual Experiments</h4>
                        <p class="text-text-secondary mb-4">Engage in safe, interactive virtual labs. Conduct experiments in biology, chemistry, and physics right from your computer.</p>
                        <a href="/student/science-experiments.html" class="inline-block px-4 py-2 bg-red-600/10 text-red-700 rounded-lg hover:bg-red-600/20 mb-4 font-medium transition-colors">Try Our Virtual Labs &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://phet.colorado.edu/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">PhET Interactive Simulations</a>: Fun, free simulations for physics, chemistry, biology, and math.</li>
                            <li><a href="https://www.biointeractive.org/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Howard Hughes Medical Institute</a>: Real science, virtual labs, and data analysis.</li>
                        </ul>
                    </section>
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Science Articles & News</h4>
                        <p class="text-text-secondary mb-4">Stay up-to-date with the latest scientific discoveries. Read articles on space, nature, technology, and health, written just for students.</p>
                        <a href="/student/science-articles.html" class="inline-block px-4 py-2 bg-red-600/10 text-red-700 rounded-lg hover:bg-red-600/20 mb-4 font-medium transition-colors">Read Our Science News &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://www.nasa.gov/students" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">NASA for Students</a>: Learn about space, rockets, and our planet.</li>
                            <li><a href="https://kids.nationalgeographic.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">National Geographic Kids</a>: Explore the world with articles on animals, nature, and history.</li>
                        </ul>
                    </section>
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Diagrams & Models</h4>
                        <p class="text-text-secondary mb-4">Explore detailed, interactive diagrams of the human body, chemical structures, and physical processes to help visualize complex topics.</p>
                        <a href="/student/science-diagrams.html" class="inline-block px-4 py-2 bg-red-600/10 text-red-700 rounded-lg hover:bg-red-600/20 mb-4 font-medium transition-colors">View Interactive Diagrams &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://ptable.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Ptable</a>: An amazing interactive periodic table.</li>
                            <li><a href="https://www.visiblebody.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Visible Body</a>: 3D models of the human anatomy (some free resources).</li>
                        </ul>
                    </section>
                    <section>
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Science Quizzes</h4>
                        <p class="text-text-secondary mb-4">Test your knowledge with quizzes on everything from the solar system to the periodic table. Get instant feedback to help you study.</p>
                        <a href="/student/science-quizzes.html" class="inline-block px-4 py-2 bg-red-600/10 text-red-700 rounded-lg hover:bg-red-600/20 mb-4 font-medium transition-colors">Take a Science Quiz &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://quizlet.com/subject/science/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Quizlet</a>: Create and use flashcards for any science topic.</li>
                            <li><a href="https://kahoot.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Kahoot!</a>: Play and create fun, game-based quizzes.</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Studies Modal -->
    <div id="socialModal" class="modal-backdrop hidden" onclick="closeModal('socialModal', event)">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="text-2xl font-semibold text-yellow-600"><i class="fas fa-globe-americas mr-2" aria-hidden="true"></i>Social Studies Resources</h3>
                    <button onclick="closeModal('socialModal')" class="modal-close-button" aria-label="Close social studies resources modal">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Historical Timelines</h4>
                        <p class="text-text-secondary mb-4">Walk through history with our interactive timelines. See key events, figures, and eras come to life and understand how they connect.</p>
                        <a href="/student/social-history.html" class="inline-block px-4 py-2 bg-yellow-600/10 text-yellow-700 rounded-lg hover:bg-yellow-600/20 mb-4 font-medium transition-colors">Explore Our Timelines &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://www.history.com/topics" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">History.com</a>: Explore articles, videos, and timelines on thousands of topics.</li>
                            <li><a href="https://www.worldhistory.org/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">World History Encyclopedia</a>: A detailed, non-profit encyclopedia for world history.</li>
                        </ul>
                    </section>
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Interactive Maps</h4>
                        <p class="text-text-secondary mb-4">Explore the world with interactive maps. Learn about geography, historical boundaries, trade routes, and cultural regions.</p>
                        <a href="/student/social-maps.html" class="inline-block px-4 py-2 bg-yellow-600/10 text-yellow-700 rounded-lg hover:bg-yellow-600/20 mb-4 font-medium transition-colors">View Our Interactive Maps &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://earth.google.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Google Earth</a>: Explore the globe in 3D, from street level to space.</li>
                            <li><a href="https://www.nationalgeographic.org/education/mapping/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">National Geographic Maps</a>: Tools and maps for students to explore geography.</li>
                        </ul>
                    </section>
                    <section class="mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Civics & Government</h4>
                        <p class="text-text-secondary mb-4">Understand how government works. Learn about the constitution, your rights and responsibilities, and the political process.</p>
                        <a href="/student/social-civics.html" class="inline-block px-4 py-2 bg-yellow-600/10 text-yellow-700 rounded-lg hover:bg-yellow-600/20 mb-4 font-medium transition-colors">Learn About Civics &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://www.icivics.org/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">iCivics</a>: Play games that teach you about civics, government, and law.</li>
                            <li><a href="https://www.whitehouse.gov/about-the-white-house/our-government/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">The White House - Our Government</a>: Learn about the branches of government.</li>
                        </ul>
                    </section>
                    <section>
                        <h4 class="text-xl font-semibold text-text-primary mb-3">Current Events Analysis</h4>
                        <p class="text-text-secondary mb-4">Connect the past to the present. We provide student-friendly breakdowns of current events and explain their historical context.</p>
                        <a href="/student/social-current-events.html" class="inline-block px-4 py-2 bg-yellow-600/10 text-yellow-700 rounded-lg hover:bg-yellow-600/20 mb-4 font-medium transition-colors">Analyze Current Events &rarr;</a>
                        <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                        <ul class="list-disc list-inside text-text-secondary space-y-1">
                            <li><a href="https://newsela.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Newsela</a>: News articles adjusted for different reading levels.</li>
                            <li><a href="https://www.timeforkids.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">TIME for Kids</a>: Age-appropriate news on world events, science, and more.</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>


    <!-- 
      MODAL STYLES AND SCRIPT 
      (Ideally, CSS styles would go in your main CSS file, 
      but they are placed here for a self-contained example)
    -->
    <style>
        .modal-backdrop {
            position: fixed;
            z-index: 50;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Darker backdrop */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            backdrop-filter: blur(4px); /* Apply blur effect */
            -webkit-backdrop-filter: blur(4px);
            opacity: 0; /* Hidden by default */
            transition: opacity 0.3s ease-in-out;
            visibility: hidden; /* Use visibility for accessibility */
        }
        .modal-backdrop.flex { /* Style when modal is open */
            opacity: 1;
            visibility: visible;
        }
        .modal-content-wrapper {
            width: 100%;
            max-width: 42rem; /* 'max-w-3xl' */
            max-height: 90vh; /* Set max height */
            transform: scale(0.95); /* Start slightly smaller */
            transition: transform 0.3s ease-in-out;
        }
        .modal-backdrop.flex .modal-content-wrapper {
            transform: scale(1); /* Animate to full size */
        }
        .modal-content {
            background-color: var(--color-bg-primary); /* Use CSS variables from your theme */
            color: var(--color-text-primary);
            border-radius: var(--rounded-base); /* Use CSS variable */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            overflow: hidden; /* Ensures rounded corners on children */
            display: flex;
            flex-direction: column;
            max-height: 90vh; /* Match wrapper */
        }
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem; /* 'p-6' */
            border-bottom: 1px solid var(--color-border); /* Use CSS variable */
        }
        .modal-body {
            padding: 1.5rem; /* 'p-6' */
            overflow-y: auto; /* Make modal body scrollable */
        }
        .modal-close-button {
            background-color: transparent;
            border: none;
            font-size: 1.5rem; /* 'text-2xl' */
            line-height: 1;
            color: var(--color-text-secondary);
            cursor: pointer;
            padding: 0.25rem;
            border-radius: var(--rounded-full);
            transition: color 0.2s, background-color 0.2s;
        }
        .modal-close-button:hover {
            color: var(--color-text-primary);
            background-color: var(--color-bg-secondary);
        }
        .modal-close-button:focus {
            outline: 2px solid var(--color-accent);
            outline-offset: 2px;
        }
        /* Style for the borders between sections */
        .modal-body .border-b {
            border-bottom-width: 1px;
            border-color: var(--color-border, #e5e7eb); /* Fallback color */
        }
        /* Dark mode support for border */
        @media (prefers-color-scheme: dark) {
            .modal-body .border-b {
                border-color: var(--color-border, #374151); /* Fallback dark color */
            }
        }
    </style>

    <script>
        // Function to open a modal by its ID
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                // Remove 'hidden' and add 'flex' to show it
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                
                // Find the modal body and scroll to top
                const modalBody = modal.querySelector('.modal-body');
                if (modalBody) {
                    modalBody.scrollTop = 0;
                }

                // Trap focus inside the modal for accessibility
                trapFocus(modal);
                // Prevent background scrolling
                document.body.style.overflow = 'hidden';
            }
        }

        // Function to close a modal by its ID
        function closeModal(modalId, event) {
            // If the click is on the backdrop (event.target === modal), close it.
            // If it's from the close button (no event or event.target !== modal), close it.
            const modal = document.getElementById(modalId);
            if (modal && (!event || event.target === modal)) {
                // Add 'hidden' and remove 'flex' to hide it
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                // Restore background scrolling
                document.body.style.overflow = '';
            }
        }
        
        // Handle closing modal with the 'Escape' key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                // Find all open modals and close them
                document.querySelectorAll('.modal-backdrop.flex').forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
                // Restore background scrolling
                document.body.style.overflow = '';
            }
        });

        // Basic focus trapping for accessibility
        function trapFocus(modal) {
            const focusableElements = modal.querySelectorAll(
                'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
            );
            // Fallback in case no focusable elements are found
            if (focusableElements.length === 0) {
                // Focus the modal content wrapper itself if it has a tabindex
                const contentWrapper = modal.querySelector('.modal-content-wrapper');
                if (contentWrapper) {
                    contentWrapper.setAttribute('tabindex', '-1');
                    contentWrapper.focus();
                }
                return;
            }

            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];

            // Set initial focus on the first element (e.g., the close button)
            if(firstElement) {
                // Use a tiny timeout to ensure focus is set after modal is fully rendered
                setTimeout(() => firstElement.focus(), 50);
            }

            modal.addEventListener('keydown', function(e) {
                if (e.key !== 'Tab') {
                    return; // Do nothing if not Tab key
                }

                if (e.shiftKey) { // if shift + tab
                    if (document.activeElement === firstElement) {
                        lastElement.focus(); // move focus to last element
                        e.preventDefault();
                    }
                } else { // if tab
                    if (document.activeElement === lastElement) {
                        firstElement.focus(); // move focus to first element
                        e.preventDefault();
                    }
                }
            });
        }
    </script>

    <!-- 
      ==================================================
      UNDER CONSTRUCTION OVERLAY
      ==================================================
      This is the full-page, un-closable overlay you requested.
      It will cover the entire page content.
    -->
    <div id="constructionOverlay" style="
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100vw; 
        height: 100vh; 
        background-color: rgba(255, 255, 255, 0.95); 
        z-index: 9999; 
        display: flex; 
        flex-direction: column;
        justify-content: center; 
        align-items: center;
        text-align: center;
        font-family: Arial, sans-serif;
        color: #333;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    ">
        <!-- Using Font Awesome icon already loaded on your page -->
        <div style="font-size: 4rem; color: #f59e0b; margin-bottom: 1.5rem;">
            <i class="fas fa-tools" aria-hidden="true"></i>
        </div>
        <h1 style="font-size: 3rem; font-weight: bold; margin: 0 0 1rem 0;">
            Under Construction
        </h1>
        <p style="font-size: 1.25rem; max-width: 500px; padding: 0 1rem; line-height: 1.6;">
            This page is currently being updated with new and exciting resources! 
            Please check back soon.
        </p>
    </div>
    <!-- End Under Construction Overlay -->


<?php
// Include the footer file, which contains the <footer>, modals, and closing </body> and </html> tags.
include 'src/footer.php';
?>


