<?php
/**
 * search.php
 *
 * This script handles search queries for the website. It searches within a designated
 * directory (and optionally its subdirectories) for files matching the search term.
 *
 * Functionality:
 * - Processes search queries submitted via a form.
 * - Sanitizes user input to prevent security vulnerabilities.
 * - Recursively searches through directories (optional, configurable).
 * - Highlights matching search terms in the results.
 * - Displays search results with file name, snippet, and file path.
 * - Handles cases where no results are found.
 * - Includes error logging.
 *
 * Configuration:
 * - $searchDir: The directory to search within (relative path).
 * - $resultsPerPage: Number of search results to display per page.
 * - $maxDepth: Maximum depth to search within subdirectories.  Set to 0 for no limit.
 * - $excludedDirs: Array of directories to exclude from the search.
 */

// **Configuration**
$searchDir = './'; // Directory to search (default: current directory)
$resultsPerPage = 10; // Number of results per page
$maxDepth = 3; // Maximum recursion depth (0 for unlimited)
$excludedDirs = array('.', '..', 'admin', 'includes', 'tmp', "JS", "CSS"); // Directories to exclude

// **Error Logging**
ini_set('display_errors', 0); // Don't display errors directly to the user
ini_set('log_errors', 1); // Log errors to a file
ini_set('error_log', 'search_error.log'); // Specify the error log file

/**
 * Sanitizes user input to prevent Cross-Site Scripting (XSS) and SQL Injection.
 *
 * @param string $input The input string to sanitize.
 * @return string The sanitized input string.
 */
function sanitizeInput($input) {
    if (is_array($input)) {
        foreach ($input as $key => $value) {
            $input[$key] = sanitizeInput($value); // Recursively sanitize arrays
        }
        return $input;
    } else {
        $input = trim($input);
        $input = stripslashes($input);  // Remove backslashes
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8'); //prevent XSS
        return $input;
    }
}

/**
 * Recursively searches for files matching the search term within the specified directory.
 *
 * @param string $dir The directory to search in.
 * @param string $searchTerm The search term.
 * @param array $results Array to store the search results.
 * @param int $depth The current recursion depth.
 * @param int $maxDepth The maximum recursion depth.
 * @param array $excludedDirs Array of directories to exclude.
 */
function searchFiles($dir, $searchTerm, &$results, $depth, $maxDepth, $excludedDirs) {
    if ($maxDepth > 0 && $depth > $maxDepth) {
        return; // Stop recursion if max depth is reached
    }

    if (!is_dir($dir)) {
        return; // Ensure it's a directory
    }

    $files = scandir($dir);
    if ($files === false) {
        error_log("Error: Could not read directory: " . $dir);
        return; // Handle directory reading error
    }

    foreach ($files as $file) {
        if (in_array($file, $excludedDirs)) {
            continue; // Skip excluded directories
        }
        $path = $dir . '/' . $file;
        if (is_dir($path)) {
            searchFiles($path, $searchTerm, $results, $depth + 1, $maxDepth, $excludedDirs); // Recursive call for subdirectories
        } else {
            // Read file content and check for search term
            $content = @file_get_contents($path); // Use @ to suppress warnings
            if ($content === false) {
                error_log("Error: Could not read file: " . $path);
                continue; // Skip unreadable files
            }
            if (stripos($content, $searchTerm) !== false) {
                // Found a match!
                $snippet = extractSnippet($content, $searchTerm);
                $results[] = array(
                    'file_path' => $path,
                    'file_name' => $file,
                    'snippet' => $snippet,
                    'relevance' => substr_count(strtolower($content), strtolower($searchTerm)), // Simple relevance
                );
            }
        }
    }
}

/**
 * Extracts a snippet of text containing the search term from the file content.
 *
 * @param string $content The file content.
 * @param string $searchTerm The search term.
 * @param int $snippetLength The desired length of the snippet.
 * @return string The extracted snippet.
 */
function extractSnippet($content, $searchTerm, $snippetLength = 200) {
    $index = stripos($content, $searchTerm);
    if ($index === false) {
        return ''; // Should not happen, but handle it
    }

    $start = max(0, $index - $snippetLength / 2);
    $end = min(strlen($content), $index + strlen($searchTerm) + $snippetLength / 2);

    $snippet = substr($content, $start, $end - $start);
    // Ensure the snippet does not cut a word in half.
    $words = explode(' ', $snippet);
    if ($start > 0) {
      array_shift($words);
    }
    if ($end < strlen($content)) {
       array_pop($words);
    }
    $snippet = implode(' ', $words);

    // Highlight the search term in the snippet
    $highlightedSnippet = str_ireplace($searchTerm, '<span class="bg-yellow-200 px-1 font-semibold">'.$searchTerm.'</span>', $snippet);
    return '...' . $highlightedSnippet . '...';
}

// **Main Execution**

// Sanitize the search term
$searchTerm = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';
$searchTerm = trim($searchTerm);  // Remove leading/trailing spaces

// Get the current page number for pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = max(1, min($page, $totalPages)); // Clamp page number

$results = array(); // Initialize an empty array to store search results

if ($searchTerm != '') {
    // Perform the search
    searchFiles($searchDir, $searchTerm, $results, 1, $maxDepth, $excludedDirs);

    // Sort results by relevance (highest first)
    usort($results, function($a, $b) {
        return $b['relevance'] - $a['relevance'];
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Search Results</h1>
        <form method="get" action="search.php" class="flex mb-6">
            <input type="text" name="search" placeholder="Enter your search term..." value="<?php echo htmlspecialchars($searchTerm); ?>" class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-r-md transition-colors duration-300">Search</button>
        </form>

        <?php if ($searchTerm != ''): ?>
            <?php if (count($results) > 0): ?>
                <p class="text-gray-600 mb-4">Found <?php echo count($results); ?> results for "<span class="font-semibold"><?php echo htmlspecialchars($searchTerm); ?></span>"</p>

                <?php
                // Pagination
                $totalResults = count($results);
                $totalPages = ceil($totalResults / $resultsPerPage);
                $page = max(1, min($page, $totalPages)); // Clamp page number
                $startIndex = ($page - 1) * $resultsPerPage;
                $endIndex = min($startIndex + $resultsPerPage - 1, $totalResults - 1);

                for ($i = $startIndex; $i <= $endIndex; $i++):
                    $result = $results[$i];
                    ?>
                    <div class="bg-white rounded-md shadow-md mb-4 p-4 border border-gray-200">
                        <h3 class="text-xl font-semibold text-blue-600 mb-2">
                            <a href="<?php echo htmlspecialchars($result['file_path']); ?>" target="_blank" rel="noopener noreferrer" class="hover:underline">
                                <?php echo htmlspecialchars($result['file_name']); ?>
                            </a>
                        </h3>
                        <p class="text-gray-700 leading-relaxed"><?php echo $result['snippet']; ?></p>
                        <p class="text-gray-500 text-sm mt-2">File path: <?php echo htmlspecialchars($result['file_path']); ?></p>
                    </div>
                <?php endfor; ?>

                <?php if ($totalPages > 1): ?>
                    <div class="flex justify-center mt-6">
                        <?php if ($page > 1): ?>
                            <a href="search.php?search=<?php echo urlencode($searchTerm); ?>&page=<?php echo $page - 1; ?>" class="mx-2 px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">Previous</a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="search.php?search=<?php echo urlencode($searchTerm); ?>&page=<?php echo $i; ?>" class="mx-2 px-3 py-2 rounded-md transition-colors duration-200 <?php echo ($i == $page) ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'; ?>"><?php echo $i; ?></a>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <a href="search.php?search=<?php echo urlencode($searchTerm); ?>&page=<?php echo $page + 1; ?>" class="mx-2 px-3 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">Next</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <p class="text-gray-600 text-center py-4 bg-gray-50 rounded-md border border-gray-200 mt-6">No results found for "<span class="font-semibold"><?php echo htmlspecialchars($searchTerm); ?></span>"</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
