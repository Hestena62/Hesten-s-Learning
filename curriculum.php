<?php
// Set dynamic variables for the header/footer includes
$pageTitle = "Curriculum - Hesten's Learning";
$pageDescription = "Explore the math, ELA, and testing curriculum aligned with EngageNY standards for Hesten's Learning.";
$welcomeMessage = "Welcome to the Curriculum!";
$welcomeParagraph = "Explore our educational programs designed for personalized learning.";

// The header.php file includes all necessary setup (Tailwind, Font Awesome, etc.)
// and starts the body tag.
include 'src/header.php';
?>

    <!-- Main Content Area -->
    <!-- The body element received its base styling from header.php -->
    <main class="container mx-auto my-10 px-4">
        <h1 class="text-3xl font-bold text-center mb-8 text-text-default">Our Curriculum Offerings</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Math Curriculum Card -->
            <div class="bg-content-bg rounded-base-rounded shadow-lg p-6 border-t-4 border-primary transition-all duration-300 hover:shadow-xl">
                <h2 class="text-xl font-semibold mb-3 text-primary">Math Curriculum</h2>
                <p class="text-text-secondary mb-4">Our mathematics program follows the EngageNY math framework:</p>
                <ul class="list-disc list-inside space-y-2 text-text-default">
                    <li><strong class="font-medium">Elementary (K-5):</strong> A STORY OF UNITS</li>
                    <li><strong class="font-medium">Middle School (6-8):</strong> A STORY OF RATIONS</li>
                    <li><strong class="font-medium">High School (9-12):</strong> A STORY OF FUNCTIONS</li>
                </ul>
                <a href="/math-modules.html" class="mt-4 inline-block px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-content-bg">
                    Explore Math Modules
                </a>
            </div>

            <!-- ELA Curriculum Card -->
            <div class="bg-content-bg rounded-base-rounded shadow-lg p-6 border-t-4 border-primary transition-all duration-300 hover:shadow-xl">
                <h2 class="text-xl font-semibold mb-3 text-primary">ELA Curriculum</h2>
                <p class="text-text-secondary mb-4">Our English Language Arts program aligns with EngageNY standards:</p>
                <ul class="list-disc list-inside space-y-2 text-text-default">
                    <li><strong class="font-medium">Reading:</strong> Comprehension and analysis</li>
                    <li><strong class="font-medium">Writing:</strong> Composition and research</li>
                    <li><strong class="font-medium">Language:</strong> Grammar and vocabulary</li>
                </ul>
                <!-- Note: The original button was a non-linked button, kept as a button -->
                <button class="mt-4 w-full px-4 py-2 border border-primary text-primary font-semibold rounded-lg hover:bg-primary hover:text-white transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-content-bg">
                    View ELA Resources
                </button>
            </div>

            <!-- Testing Card -->
            <div class="bg-content-bg rounded-base-rounded shadow-lg p-6 border-t-4 border-primary transition-all duration-300 hover:shadow-xl">
                <h2 class="text-xl font-semibold mb-3 text-primary">Testing</h2>
                <p class="text-text-secondary mb-4">Our tests follow a measure of NYCCSSST:</p>
                <ul class="list-disc list-inside space-y-2 text-text-default">
                    <li><strong class="font-medium">Reading:</strong> Comprehension and analysis</li>
                    <li><strong class="font-medium">Math:</strong> Composition and research</li>
                    <li><strong class="font-medium">Social Studies:</strong> Grammar and vocabulary</li>
                    <li><strong class="font-medium">Science:</strong> Grammar and vocabulary</li>
                </ul>
                <a href="/tests/index.html" class="mt-4 inline-block px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-secondary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-content-bg">
                    View Testing Resources
                </a>
            </div>
        </div>
    </main>

<?php
// The footer.php file includes the footer, modals, and closes the body/html tags.
include 'src/footer.php';
?>
