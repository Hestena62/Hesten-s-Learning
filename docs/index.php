<?php
// Define page-specific variables for the header
$pageTitle = "Hesten's Learning";
$pageDescription = "Welcome to Hesten's Learning platform. Find documentation, guides, and instructions on how to use our site.";
$pageKeywords = "hesten, learning, docs, documentation, guides, how-to";
$pageAuthor = "Hesten Allison";

// Welcome popup messages (from header.php)
$welcomeMessage = "Welcome!";
$welcomeParagraph = "This is the main landing page. Check out our documentation to get started.";

// Include the header
require_once '..\src\header.php';
?>

<!-- Main Content Area -->
<main class="container mx-auto px-4 py-12 min-h-screen">
    <div class="bg-content-bg text-text-default rounded-xl shadow-lg p-8 max-w-2xl mx-auto text-center">
        
        <h1 class="text-4xl font-bold text-primary mb-4">
            Welcome to Your Website
        </h1>
        
        <p class="text-lg text-text-secondary mb-8">
            This is the main landing page for your site. You can find all the documentation, user guides, and instructions you need by visiting our documentation center.
        </p>
        
        <a href="docs/docs.php" 
           class="inline-block bg-primary text-white text-lg font-semibold px-8 py-3 rounded-lg hover:bg-secondary transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-accent">
            Go to Documentation
        </a>
        
    </div>
</main>
<!-- End Main Content Area -->

<?php
// Include the footer
require_once '..\src\footer.php';
?>