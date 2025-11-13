<?php
// --- DEBUGGING: SHOW ALL ERRORS ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --- END DEBUGGING ---

// --- Configuration ---
$pageTitle = "About Us";
$pageDescription = "Learn more about our mission and team.";


// Include the header
require 'src/header.php';
?>

<!-- Main Content -->
<main class="container mx-auto px-4 py-12 min-h-[calc(100vh-300px)]">
    <div class="max-w-3xl mx-auto bg-content-bg text-text-default p-8 rounded-xl shadow-lg">
        
        <h1 class="text-4xl font-bold text-primary mb-6">About Us</h1>
        
        <div class="prose prose-lg max-w-none text-text-default prose-headings:text-primary">
            <p>
                Welcome to our platform! This is a simple blog created to demonstrate a PHP and SQLite-based system.
            </p>
            <p>
                Our mission is to provide a clean, accessible, and easy-to-use blogging experience. All posts are stored securely in a local SQLite database, and each post gets a unique, randomized URL for sharing.
            </p>
            
            <h2 class="text-2xl font-semibold mt-8 mb-4">Our Features</h2>
            <ul>
                <li><strong>Dynamic Content:</strong> Posts are managed via a simple admin panel.</li>
                <li><strong>Secure & Lightweight:</strong> Uses PHP and SQLite for a serverless database.</li>
                <li><strong>Unique Slugs:</strong> Every post has a random, unguessable link.</li>
                <li><strong>Pagination:</strong> The main blog page is paginated for easy browsing.</li>
                <li><strong>Accessible Design:</strong> Built using your accessible header and footer.</li>
            </ul>

            <h2 class="text-2xl font-semibold mt-8 mb-4">The Team</h2>
            <p>
                This platform was built by me, your friendly AI assistant, using the components you provided. I'm here to help you build and iterate on your ideas!
            </p>
        </div>

    </div>
</main>

<?php
// Include the footer
require 'src/footer.php';
?>