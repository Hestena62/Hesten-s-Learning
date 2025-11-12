<?php
// Main Page - Lists all available topics

// Include the data
// [FIX] Corrected path to be in the parent directory
require_once __DIR__ . '/wiki-data.php';

// Set page variables for the header
$pageTitle = "WikiMock - Main Page";
$pageDescription = "A mock Wikipedia site demonstrating PHP pagination.";
$pageAuthor = "WikiMock Project";
$pageKeywords = "wiki, php, pagination, mock";
$welcomeMessage = "Welcome to WikiMock!"; // For the header popup
$welcomeParagraph = "Browse our articles below."; // For the header popup

// Include the header
require_once 'header.php';
?>

<!-- Main Content -->
<main class="container mx-auto px-4 py-10 min-h-screen">
    <div class="bg-content-bg shadow-lg rounded-xl p-8">
        <h1 class="text-4xl font-bold mb-6 text-primary border-b border-gray-300 pb-4">
            Available Articles
        </h1>
        
        <p class="text-lg text-text-secondary mb-6">
            Welcome to WikiMock! This is a demonstration of a simple PHP-powered encyclopedia. All content is stored in a single PHP file and paginated for easy reading.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (empty($wikiTopics)): ?>
                <p class="text-text-secondary">No articles have been added yet.</p>
            <?php else: ?>
                <?php foreach ($wikiTopics as $topic): ?>
                    <a href="article.php?topic=<?php echo htmlspecialchars($topic['slug']); ?>" 
                       class="block bg-base-bg p-6 rounded-lg shadow-md hover:shadow-xl hover:bg-secondary hover:text-white transition-all duration-300 group">
                        <h2 class="text-2xl font-semibold text-primary group-hover:text-white mb-2">
                            <?php echo htmlspecialchars($topic['title']); ?>
                        </h2>
                        <p class="text-text-secondary group-hover:text-gray-100">
                            Read more about <?php echo htmlspecialchars($topic['title']); ?>...
                        </p>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
    </div>
</main>
<!-- /Main Content -->

<?php
// Include the footer
require_once 'footer.php';
?>