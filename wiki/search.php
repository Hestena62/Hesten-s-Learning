<?php
// Search Page - Finds articles matching a query

// Include the data
// [FIX] Corrected path to be in the parent directory
require_once __DIR__ . '/wiki-data.php';

// --- Get Search Query ---
$query = $_GET['q'] ?? '';
$results = [];

if (trim($query) !== '') {
    foreach ($wikiTopics as $topic) {
        // Search in title OR content (case-insensitive)
        if (stripos($topic['title'], $query) !== false || stripos($topic['content'], $query) !== false) {
            $results[] = $topic;
        }
    }
}

// --- Set Page Variables ---
$pageTitle = 'Search Results for "' . htmlspecialchars($query) . '"';
$pageDescription = "Search results from WikiMock.";
$pageAuthor = "WikiMock Project";
$pageKeywords = "search, wiki, php";
$welcomeMessage = "Welcome to WikiMock!"; // For the header popup
$welcomeParagraph = "Here are your search results."; // For the header popup

// Include the header
require_once 'header.php';
?>

<!-- Main Content -->
<main class="container mx-auto px-4 py-10 min-h-screen">
    <div class="bg-content-bg shadow-lg rounded-xl p-8">
        
        <h1 class="text-3xl font-bold mb-6 text-primary border-b border-gray-300 pb-4">
            Search Results
        </h1>

        <p class="text-lg text-text-secondary mb-6">
            You searched for: <strong>"<?php echo htmlspecialchars($query); ?>"</strong>
        </p>

        <?php if (empty($query)): ?>
            <p class="text-text-secondary">Please enter a search term in the box above.</p>
        <?php elseif (empty($results)): ?>
            <p class="text-text-secondary">No articles were found matching your query.</p>
        <?php else: ?>
            <p class="text-text-secondary mb-4">Found <?php echo count($results); ?> matching article(s):</p>
            <ul class="space-y-4">
                <?php foreach ($results as $topic): ?>
                    <li>
                        <a href="article.php?topic=<?php echo htmlspecialchars($topic['slug']); ?>" 
                           class="block p-4 rounded-lg bg-base-bg hover:bg-secondary hover:text-white transition-all duration-200 group">
                            <h2 class="text-xl font-semibold text-primary group-hover:text-white">
                                <?php echo htmlspecialchars($topic['title']); ?>
                            </h2>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
    </div>
</main>
<!-- /Main Content -->

<?php
// Include the footer
require_once 'footer.php';
?>