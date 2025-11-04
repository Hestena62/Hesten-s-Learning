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
                    <p class="text-text-secondary mb-4 flex-grow">Explore a variety of resources to help you master mathematics concepts, from basic arithmetic to advanced calculus.</p>
                    <ul class="list-none space-y-2 mt-4">
                        <li><a href="/student/math-practice.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Practice Problems</a></li>
                        <li><a href="/student/math-tutorials.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Video Tutorials</a></li>
                        <li><a href="/student/math-study-guides.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Study Guides & Notes</a></li>
                        <li><a href="/student/math-games.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Interactive Math Games</a></li>
                    </ul>
                    <a href="/student/math-resources.html" class="mt-6 px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-accent">View All Math Resources</a>
                </div>
            </div>

            <!-- ELA Resources Card -->
            <div class="col-span-1">
                <div class="bg-card-bg rounded-base-rounded shadow-lg p-6 flex flex-col h-full transition-colors duration-300">
                    <h5 class="text-xl font-semibold text-green-600 mb-3"><i class="fas fa-book-open mr-2" aria-hidden="true"></i>ELA Resources</h5>
                    <p class="text-text-secondary mb-4 flex-grow">Enhance your reading, writing, and language skills with our comprehensive English Language Arts resources.</p>
                    <ul class="list-none space-y-2 mt-4">
                        <li><a href="/student/ela-reading.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Reading Comprehension</a></li>
                        <li><a href="/student/ela-writing.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Writing Prompts & Guides</a></li>
                        <li><a href="/student/ela-grammar.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Grammar & Vocabulary</a></li>
                        <li><a href="/student/ela-literature.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Literature Analysis</a></li>
                    </ul>
                    <a href="/student/ela-resources.html" class="mt-6 px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-green-400">View All ELA Resources</a>
                </div>
            </div>

            <!-- Science Resources Card -->
            <div class="col-span-1">
                <div class="bg-card-bg rounded-base-rounded shadow-lg p-6 flex flex-col h-full transition-colors duration-300">
                    <h5 class="text-xl font-semibold text-red-600 mb-3"><i class="fas fa-flask mr-2" aria-hidden="true"></i>Science Resources</h5>
                    <p class="text-text-secondary mb-4 flex-grow">Dive into the world of science with resources covering biology, chemistry, physics, and earth science.</p>
                    <ul class="list-none space-y-2 mt-4">
                        <li><a href="/student/science-experiments.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Virtual Experiments</a></li>
                        <li><a href="/student/science-articles.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Science Articles & News</a></li>
                        <li><a href="/student/science-diagrams.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Diagrams & Models</a></li>
                        <li><a href="/student/science-quizzes.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Science Quizzes</a></li>
                    </ul>
                    <a href="/student/science-resources.html" class="mt-6 px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-red-400">View All Science Resources</a>
                </div>
            </div>

            <!-- Social Studies Resources Card -->
            <div class="col-span-1">
                <div class="bg-card-bg rounded-base-rounded shadow-lg p-6 flex flex-col h-full transition-colors duration-300">
                    <h5 class="text-xl font-semibold text-yellow-600 mb-3"><i class="fas fa-globe-americas mr-2" aria-hidden="true"></i>Social Studies Resources</h5>
                    <p class="text-text-secondary mb-4 flex-grow">Explore history, geography, civics, and economics with engaging social studies materials.</p>
                    <ul class="list-none space-y-2 mt-4">
                        <li><a href="/student/social-history.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Historical Timelines</a></li>
                        <li><a href="/student/social-maps.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Interactive Maps</a></li>
                        <li><a href="/student/social-civics.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Civics & Government</a></li>
                        <li><a href="/student/social-current-events.html" class="text-link-color hover:underline focus:outline-none focus:ring-2 focus:ring-accent rounded"><i class="fas fa-angle-right mr-2" aria-hidden="true"></i>Current Events Analysis</a></li>
                    </ul>
                    <a href="/student/social-studies-resources.html" class="mt-6 px-4 py-2 bg-yellow-600 text-white rounded-lg font-semibold hover:opacity-90 text-center transition-opacity duration-200 focus:outline-none focus:ring-4 focus:ring-yellow-400">View All Social Studies Resources</a>
                </div>
            </div>
        </div>
    </main>

<?php
// Include the footer file, which contains the <footer>, modals, and closing </body> and </html> tags.
include 'src/footer.php';
?>
