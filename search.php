<?php
// search.php - Handles search queries
$query = isset($_GET['q']) ? trim($_GET['q']) : '';
$pageTitle = "Search Results for '$query' | Hesten's Learning";
$pageDescription = "Search results for learning materials.";

// Mock Database of Content
$contentDatabase = [
    ['id' => 'pre-k', 'title' => 'Pre-K Level A', 'desc' => 'Counting objects, matching, sorting, and early foundations.', 'link' => '/Level/A.php', 'tags' => 'math counting sorting pre-k'],
    ['id' => 'kinder', 'title' => 'Kindergarten Level B', 'desc' => 'Basic addition, phonics, and reading readiness.', 'link' => '/Level/B.html', 'tags' => 'math reading kindergarten'],
    ['id' => 'gr1', 'title' => 'Grade 1 Level C', 'desc' => 'Sentence structure, subtraction, and basic science.', 'link' => '/Level/C.html', 'tags' => 'math ela grade 1'],
    // Add more as needed...
];

$results = [];
if ($query !== '') {
    foreach ($contentDatabase as $item) {
        if (
            stripos($item['title'], $query) !== false ||
            stripos($item['desc'], $query) !== false ||
            stripos($item['tags'], $query) !== false
        ) {
            $results[] = $item;
        }
    }
}

include 'src/header.php';
?>

<div class="container mx-auto px-4 py-12 min-h-[60vh]">
    <h1 class="text-3xl font-bold text-text-default mb-2">Search Results</h1>
    <p class="text-text-secondary mb-8">
        <?php
        if ($query === '') echo "Please enter a search term.";
        else echo count($results) . " result(s) found for \"<strong>" . htmlspecialchars($query) . "</strong>\"";
        ?>
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($results as $res): ?>
            <article class="bg-content-bg rounded-2xl shadow-md border border-gray-200 dark:border-gray-700 p-6 hover:shadow-lg transition-shadow">
                <h2 class="text-xl font-bold text-primary mb-2">
                    <a href="<?php echo $res['link']; ?>" class="hover:underline">
                        <?php echo htmlspecialchars($res['title']); ?>
                    </a>
                </h2>
                <p class="text-text-secondary mb-4 text-sm">
                    <?php echo htmlspecialchars($res['desc']); ?>
                </p>
                <a href="<?php echo $res['link']; ?>" class="inline-block bg-base-bg text-text-default px-4 py-2 rounded-lg text-sm font-bold border border-gray-300 dark:border-gray-600 hover:bg-primary hover:text-white hover:border-primary transition-colors">
                    View Level <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </article>
        <?php endforeach; ?>

        <?php if (count($results) === 0 && $query !== ''): ?>
            <div class="col-span-full text-center py-12 bg-base-bg rounded-2xl border border-dashed border-gray-300 dark:border-gray-700">
                <i class="fas fa-search text-4xl text-gray-400 mb-4"></i>
                <h3 class="text-lg font-bold text-text-default">No matches found</h3>
                <p class="text-text-secondary">Try checking your spelling or using different keywords.</p>
                <a href="/" class="inline-block mt-4 text-primary font-bold hover:underline">Return Home</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'src/footer.php'; ?>