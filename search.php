<?php
/**
 * search.php
 *
 * This script handles search queries for the website. It searches within a designated
 * directory (and optionally its subdirectories) for files matching the search term.
 *
 * Functionality:
 * - Integrates with header.php and footer.php
 * - Processes search queries submitted via a form.
 * - Sanitizes user input for HTML output to prevent security vulnerabilities.
 * - Recursively searches through directories.
 * - Highlights matching search terms in the results.
 * - Displays search results with file name, snippet, and file path.
 * - Allows filtering by file type (e.g., .php, .html).
 * - Handles cases where no results are found.
 * - Includes error logging.
 *
 * Configuration:
 * - $searchDir: The directory to search within (relative path).
 * - $resultsPerPage: Number of search results to display per page.
 * - $maxDepth: Maximum depth to search within subdirectories. Set to 0 for no limit.
 * - $excludedDirs: Array of directories to exclude from the search.
 * - $allowedFileTypes: Array of extensions to include in the search.
 */

// **Page-specific Variables for Header**
$pageTitle = "Search Results - Hesten's Learning";
$pageDescription = "Search for content across Hesten's Learning.";
$pageKeywords = "search, find, results, education, learning";
$pageAuthor = "Hesten Allison";

// **Include Header**
// This brings in the HTML head, accessibility panel, and navigation
require_once 'src/header.php';

// **Configuration**
$searchDir = ['./', "/test", "/student", "research", "/library"]; // Directory to search (default: current directory)
$resultsPerPage = 10; // Number of results per page
$maxDepth = 3; // Maximum recursion depth (0 for unlimited)
$excludedDirs = ['.', '..', 'admin', 'includes', 'tmp', 'JS', 'CSS', 'src', 'vendor', '.git', '.idea']; // Directories to exclude
$allowedFileTypes = ['php', 'html', 'htm', 'txt', 'md']; // File types to search
$searchableFileTypes = ['php', 'html', 'txt']; // File types to show in the filter dropdown


// **Error Logging**
ini_set('display_errors', 0); // Don't display errors directly to the user
ini_set('log_errors', 1); // Log errors to a file
ini_set('error_log', 'search_error.log'); // Specify the error log file

/**
 * Sanitizes user input FOR HTML OUTPUT.
 *
 * @param string $input The input string to sanitize.
 * @return string The sanitized input string.
 */
function sanitizeForHTML($input) {
    if (is_array($input)) {
        // Recursively sanitize arrays
        return array_map('sanitizeForHTML', $input);
    } else {
        $input = trim($input);
        // stripslashes() is not needed if magic quotes are off (default)
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8'); //prevent XSS
        return $input;
    }
}

/**
 * Recursively searches for files matching the search term.
 *
 * @param string $dir The directory to search in.
 * @param string $rawSearchTerm The RAW (un-sanitized) search term.
 * @param string $fileTypeFilter Optional file extension to filter by.
 * @param array &$results Array to store the search results.
 * @param int $depth The current recursion depth.
 * @param int $maxDepth The maximum recursion depth.
 * @param array $excludedDirs Array of directories to exclude.
 * @param array $allowedFileTypes Array of allowed file extensions.
 */
function searchFiles($dir, $rawSearchTerm, $fileTypeFilter, &$results, $depth, $maxDepth, $excludedDirs, $allowedFileTypes) {
    if ($maxDepth > 0 && $depth > $maxDepth) {
        return; // Stop recursion if max depth is reached
    }

    if (!is_dir($dir) || !is_readable($dir)) {
         error_log("Error: Could not read directory: " . $dir);
        return; // Ensure it's a readable directory
    }

    $files = scandir($dir);
    if ($files === false) {
        error_log("Error: Could not scan directory: " . $dir);
        return; // Handle directory scanning error
    }

    foreach ($files as $file) {
        if (in_array($file, $excludedDirs)) {
            continue; // Skip excluded directories
        }

        $path = rtrim($dir, '/') . '/' . $file;

        if (is_dir($path)) {
            searchFiles($path, $rawSearchTerm, $fileTypeFilter, $results, $depth + 1, $maxDepth, $excludedDirs, $allowedFileTypes); // Recursive call
        } else {
            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

            // Check if file type is allowed and matches filter (if set)
            if (in_array($ext, $allowedFileTypes)) {
                if ($fileTypeFilter && $ext !== $fileTypeFilter) {
                    continue; // Skip if file type filter doesn't match
                }

                $content = @file_get_contents($path);
                if ($content === false) {
                    error_log("Error: Could not read file: " . $path);
                    continue; // Skip unreadable files
                }

                if (stripos($content, $rawSearchTerm) !== false) {
                    // Found a match!
                    $snippet = extractSnippet($content, $rawSearchTerm);
                    $results[] = array(
                        'file_path' => $path,
                        'file_name' => $file,
                        'file_ext' => $ext,
                        'snippet' => $snippet,
                        'relevance' => substr_count(strtolower($content), strtolower($rawSearchTerm)), // Simple relevance
                    );
                }
            }
        }
    }
}

/**
 * Extracts a snippet of text containing the search term.
 *
 * @param string $content The file content.
 * @param string $rawSearchTerm The RAW (un-sanitized) search term.
 * @param int $snippetLength The desired length of the snippet.
 * @return string The extracted snippet.
 */
function extractSnippet($content, $rawSearchTerm, $snippetLength = 250) {
    $index = stripos($content, $rawSearchTerm);
    if ($index === false) {
        return '';
    }

    $start = max(0, $index - ($snippetLength / 2));
    $snippet = substr($content, $start, $snippetLength);
    
    // Clean up HTML tags from snippet to avoid broken tags
    $snippet = strip_tags($snippet);

    // NOW we sanitize for HTML output
    $safeSnippet = htmlspecialchars($snippet, ENT_QUOTES, 'UTF-8');
    $safeSearchTerm = htmlspecialchars($rawSearchTerm, ENT_QUOTES, 'UTF-8');
    
    // Re-highlight the search term
    // Use theme-aware colors
    $highlightedSnippet = str_ireplace(
        $safeSearchTerm, 
        '<span class="bg-primary text-white px-1 font-semibold">' . $safeSearchTerm . '</span>', 
        $safeSnippet
    );

    return '...' . $highlightedSnippet . '...';
}

// **Main Execution**

// Get RAW inputs
$rawSearchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
$rawFileTypeFilter = isset($_GET['type']) ? trim($_GET['type']) : '';

// Sanitize for file type check
$fileTypeFilter = sanitizeForHTML($rawFileTypeFilter); // Use sanitized version for check/display
if (!in_array($fileTypeFilter, $searchableFileTypes)) {
    $fileTypeFilter = ''; // Reset if not a valid filter
}

// Get the current page number for pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = max(1, $page); // Page must be at least 1

$results = array(); // Initialize results

if ($rawSearchTerm != '') {
    searchFiles($searchDir, $rawSearchTerm, $fileTypeFilter, $results, 0, $maxDepth, $excludedDirs, $allowedFileTypes);

    // Sort results by relevance (highest first)
    usort($results, function($a, $b) {
        return $b['relevance'] - $a['relevance'];
    });
}

// Pagination calculations
$totalResults = count($results);
$totalPages = $totalResults > 0 ? ceil($totalResults / $resultsPerPage) : 1;
$page = max(1, min($page, $totalPages)); // Clamp page number
$startIndex = ($page - 1) * $resultsPerPage;
$endIndex = min($startIndex + $resultsPerPage - 1, $totalResults - 1);

// **Sanitize for output**
$safeSearchTerm = sanitizeForHTML($rawSearchTerm);

?>

<!-- Main Content Area -->
<main class="container mx-auto px-4 py-8">
    <div class="bg-content-bg shadow-lg rounded-xl p-6 md:p-8">

        <h1 class="text-3xl font-bold text-primary mb-6">Search Results</h1>

        <!-- Search Form -->
        <form method="get" action="search.php" class="flex flex-col md:flex-row gap-2 mb-6" role="search">
            <div class="flex-1">
                <label for="search-input" class="sr-only">Enter your search term...</label>
                <input type="text" id="search-input" name="search" placeholder="Enter your search term..."
                    value="<?php echo $safeSearchTerm; ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600">
            </div>
            
            <div class="flex-shrink-0">
                <label for="type-filter" class="sr-only">Filter by file type</label>
                <select id="type-filter" name="type" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 h-[42px]">
                    <option value="">All File Types</option>
                    <?php foreach ($searchableFileTypes as $type): ?>
                        <option value="<?php echo $type; ?>" <?php echo ($fileTypeFilter == $type) ? 'selected' : ''; ?>>
                            .<?php echo strtoupper($type); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit"
                class="bg-primary hover:bg-secondary text-white px-5 py-2 rounded-lg transition-colors duration-300 font-semibold">
                <i class="fas fa-search mr-1"></i> Search
            </button>
        </form>

        <!-- Search Results -->
        <?php if ($rawSearchTerm != ''): ?>
            <div class="mb-4">
                <p class="text-text-secondary">
                    Found <?php echo $totalResults; ?> results for
                    "<strong class="text-primary"><?php echo $safeSearchTerm; ?></strong>"
                    <?php if ($fileTypeFilter): ?>
                        (filtered by <strong class="text-primary">.<?php echo $fileTypeFilter; ?></strong>)
                    <?php endif; ?>
                </p>
            </div>

            <?php if ($totalResults > 0): ?>
                <div class="space-y-4">
                    <?php for ($i = $startIndex; $i <= $endIndex; $i++):
                        $result = $results[$i];
                    ?>
                        <div class="bg-base-bg rounded-lg shadow-sm p-4 border border-gray-200 dark:border-gray-700">
                            <h3 class="text-xl font-semibold text-primary mb-2">
                                <a href="<?php echo htmlspecialchars($result['file_path'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"
                                    class="hover:underline">
                                    <?php echo htmlspecialchars($result['file_name'], ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h3>
                            <div class="text-text-default leading-relaxed text-sm">
                                <?php echo $result['snippet']; // Snippet is already HTML-safe and highlighted ?>
                            </div>
                            <p class="text-text-secondary text-sm mt-2">
                                File path: <?php echo htmlspecialchars($result['file_input'], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        </div>
                    <?php endfor; ?>
                </div>

                <!-- Pagination Controls -->
                <?php if ($totalPages > 1): ?>
                    <nav class="flex justify-center mt-8" aria-label="Search results pagination">
                        <ul class="flex items-center gap-2">
                            <!-- Previous Button -->
                            <?php if ($page > 1): ?>
                                <li>
                                    <a href="search.php?search=<?php echo urlencode($rawSearchTerm); ?>&type=<?php echo urlencode($fileTypeFilter); ?>&page=<?php echo $page - 1; ?>"
                                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                                        <span class="sr-only">Previous page</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <!-- Page Numbers -->
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li>
                                    <a href="search.php?search=<?php echo urlencode($rawSearchTerm); ?>&type=<?php echo urlencode($fileTypeFilter); ?>&page=<?php echo $i; ?>"
                                        class="px-4 py-2 rounded-md transition-colors duration-200 <?php echo ($i == $page) ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600'; ?>"
                                        <?php if ($i == $page): ?> aria-current="page" <?php endif; ?>>
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <!-- Next Button -->
                            <?php if ($page < $totalPages): ?>
                                <li>
                                    <a href="search.php?search=<?php echo urlencode($rawSearchTerm); ?>&type=<?php echo urlencode($fileTypeFilter); ?>&page=<?php echo $page + 1; ?>"
                                        class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                                        <span class="sr-only">Next page</span>
                                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>

            <?php else: ?>
                <!-- No Results Found -->
                <div class="text-center py-8">
                    <i class="fas fa-search-minus text-4xl text-text-secondary mb-4"></i>
                    <p class="text-text-secondary text-lg">
                        No results found for "<strong class="text-primary"><?php echo $safeSearchTerm; ?></strong>"
                        <?php if ($fileTypeFilter): ?>
                            in <strong class="text-primary">.<?php echo $fileTypeFilter; ?></strong> files
                        <?php endif; ?>
                    </p>
                    <a href="/search.php" class="mt-4 inline-block text-primary hover:underline">Clear search and try again</a>
                </div>
            <?php endif; ?>
        <?php else: ?>
             <!-- Prompt to search -->
             <div class="text-center py-8">
                <i class="fas fa-search text-4xl text-text-secondary mb-4"></i>
                <p class="text-text-secondary text-lg">
                    Please enter a term in the search bar above to find content.
                </p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
// **Include Footer**
// This brings in the footer, modals, and closing HTML tags
require_once 'src/footer.php';
?>