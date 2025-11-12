<?php
// Article Page - Displays a single topic with pagination

// Include the data
// [FIX] Corrected path to be in the parent directory
require_once __DIR__ . '/wiki-data.php';

// --- Get Topic ---
$topicSlug = $_GET['topic'] ?? null;
$topic = null;

if ($topicSlug === 'random') {
    $topic = getRandomTopic($wikiTopics);
    // Redirect to the actual slug to make pagination links work
    header('Location: article.php?topic=' . $topic['slug']);
    exit;
} elseif ($topicSlug) {
    $topic = getTopicBySlug($topicSlug, $wikiTopics);
}

// --- Pagination Logic ---
$contentPages = [];
$totalPages = 0;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$pageContent = '';

if ($topic) {
    // Split the content by our special "PAGEBREAK" comment
    $contentPages = explode('<!-- PAGEBREAK -->', $topic['content']);
    $totalPages = count($contentPages);

    // Ensure current page is valid
    if ($currentPage < 1) {
        $currentPage = 1;
    }
    if ($currentPage > $totalPages) {
        $currentPage = $totalPages;
    }

    // Get the content for the current page (array index is $currentPage - 1)
    $pageContent = $contentPages[$currentPage - 1] ?? 'Page content not found.';
}

// --- Set Page Variables ---
$pageTitle = $topic ? htmlspecialchars($topic['title']) : "Topic Not Found";
$pageDescription = $topic ? "Page $currentPage of " . htmlspecialchars($topic['title']) : "Topic not found.";
$pageAuthor = "WikiMock Project";
$pageKeywords = $topic ? htmlspecialchars($topic['title']) . ", wiki, php" : "error";
$welcomeMessage = "Welcome to WikiMock!"; // For the header popup
$welcomeParagraph = "You are reading an article."; // For the header popup

// Include the header
require_once 'header.php';
?>

<!-- Main Content -->
<main class="container mx-auto px-4 py-10 min-h-screen">
    <div class="bg-content-bg shadow-lg rounded-xl p-8">

        <?php if ($topic): ?>
            <!-- Article Header -->
            <h1 class="text-4xl font-bold mb-4 text-primary">
                <?php echo htmlspecialchars($topic['title']); ?>
            </h1>
            <p class="text-sm text-text-secondary mb-6 border-b border-gray-300 pb-4">
                From WikiMock, the free encyclopedia
            </p>

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none text-text-default">
                <?php echo $pageContent; // Content is already HTML from the data file ?>
            </div>

            <!-- Pagination Links -->
            <?php if ($totalPages > 1): ?>
                <nav class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0 mt-8 pt-6" aria-label="Pagination">
                    <div class="flex w-0 flex-1">
                        <?php if ($currentPage > 1): ?>
                            <a href="article.php?topic=<?php echo htmlspecialchars($topicSlug); ?>&page=<?php echo $currentPage - 1; ?>"
                               class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                                <i class="fas fa-arrow-left mr-2" aria-hidden="true"></i>
                                Previous
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="hidden md:flex">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="article.php?topic=<?php echo htmlspecialchars($topicSlug); ?>&page=<?php echo $i; ?>"
                               class="<?php echo $i === $currentPage ? 'z-10 inline-flex items-center border-b-2 border-primary px-4 pt-4 text-sm font-medium text-primary' : 'inline-flex items-center border-b-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white'; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                    </div>

                    <div class="flex w-0 flex-1 justify-end">
                        <?php if ($currentPage < $totalPages): ?>
                            <a href="article.php?topic=<?php echo htmlspecialchars($topicSlug); ?>&page=<?php echo $currentPage + 1; ?>"
                               class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                                Next
                                <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </nav>
            <?php endif; ?>

        <?php else: ?>
            <!-- Topic Not Found -->
            <h1 class="text-4xl font-bold mb-4 text-red-600">
                Article Not Found
            </h1>
            <p class="text-lg text-text-secondary mb-6">
                Sorry, the topic you requested (<code><?php echo htmlspecialchars($topicSlug); ?></code>) could not be found.
            </p>
            <a href="index.php" class="text-primary hover:underline">
                &larr; Return to Main Page
            </a>
        <?php endif; ?>

    </div>
</main>
<!-- /Main Content -->

<?php
// Include the footer
require_once 'footer.php';
?>