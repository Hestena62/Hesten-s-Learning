<?php
// --- DEBUGGING: SHOW ALL ERRORS ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --- END DEBUGGING ---

// --- Configuration ---
$pageTitle = "My Blog";
$pageDescription = "Welcome to my personal blog.";
$pageAuthor = "Blog Platform";
$posts_per_page = 5;

// --- Database Connection ---
function getDB() {
    try {
        $db = new PDO('sqlite:blog.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

$db = getDB();
$post = null;
$posts = [];
$page = 1;
$total_pages = 1;

// --- Logic ---
if (isset($_GET['post'])) {
    // --- Single Post View ---
    $slug = $_GET['post'];
    $stmt = $db->prepare("SELECT * FROM posts WHERE slug = :slug");
    $stmt->bindParam(':slug', $slug);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        $pageTitle = $post['title']; // Update page title to post title
    } else {
        $pageTitle = "Post Not Found";
    }

} else {
    // --- List View (Pagination) ---
    // Get current page
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = (int)$_GET['page'];
    }
    if ($page < 1) $page = 1;

    // Calculate offset
    $offset = ($page - 1) * $posts_per_page;

    // Get total number of posts
    $total_posts_stmt = $db->query("SELECT COUNT(*) FROM posts");
    $total_posts = $total_posts_stmt->fetchColumn();
    $total_pages = ceil($total_posts / $posts_per_page);

    // Fetch paginated posts
    $stmt = $db->prepare("SELECT * FROM posts ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $posts_per_page, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Include the header
require 'src/header.php';
?>

<!-- Main Content -->
<main class="container mx-auto px-4 py-12 min-h-[calc(100vh-300px)]">
    <div class="max-w-3xl mx-auto">

        <?php if ($post): ?>
            <!-- Single Post View -->
            <article class="bg-content-bg text-text-default p-8 rounded-xl shadow-lg">
                <h1 class="text-4xl font-bold text-primary mb-4"><?php echo htmlspecialchars($post['title']); ?></h1>
                <p class="text-sm text-text-secondary mb-6">
                    Posted on <?php echo date('F j, Y, g:i a', strtotime($post['created_at'])); ?>
                </p>
                <div class="prose prose-lg max-w-none text-text-default prose-headings:text-primary prose-a:text-blue-500">
                    <!-- nl2br converts newlines to <br> tags, and htmlspecialchars prevents XSS -->
                    <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                </div>
                <a href="blog.php" class="inline-block mt-8 text-blue-500 hover:underline">
                    &larr; Back to all posts
                </a>
            </article>

        <?php elseif (isset($_GET['post'])): ?>
            <!-- Post Not Found View -->
            <div class="bg-content-bg text-text-default p-8 rounded-xl shadow-lg text-center">
                <h1 class="text-3xl font-bold text-red-500 mb-4">Post Not Found</h1>
                <p class="text-text-secondary mb-6">Sorry, we couldn't find the post you're looking for.</p>
                <a href="blog.php" class="inline-block bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200">
                    &larr; Back to all posts
                </a>
            </div>

        <?php else: ?>
            <!-- Blog List View -->
            <h1 class="text-4xl font-bold text-primary mb-8 text-center">My Blog</h1>
            
            <?php if (empty($posts)): ?>
                <div class="bg-content-bg text-text-default p-8 rounded-xl shadow-lg text-center">
                    <h2 class="text-2xl font-semibold text-text-secondary">No posts yet!</h2>
                    <p class="mt-2">Check back later, or <a href="admin.php" class="text-blue-500 hover:underline">add a new post</a>.</p>
                </div>
            <?php endif; ?>

            <div class="space-y-8">
                <?php foreach ($posts as $p): ?>
                    <article class="bg-content-bg text-text-default p-8 rounded-xl shadow-lg transition-transform transform hover:scale-[1.02]">
                        <h2 class="text-3xl font-bold mb-3">
                            <a href="blog.php?post=<?php echo htmlspecialchars($p['slug']); ?>" class="text-primary hover:text-secondary">
                                <?php echo htmlspecialchars($p['title']); ?>
                            </a>
                        </h2>
                        <p class="text-sm text-text-secondary mb-4">
                            Posted on <?php echo date('F j, Y', strtotime($p['created_at'])); ?>
                        </p>
                        <p class="text-text-default mb-6">
                            <!-- Create a short snippet -->
                            <?php echo htmlspecialchars(substr($p['content'], 0, 200)); ?>...
                        </p>
                        <a href="blog.php?post=<?php echo htmlspecialchars($p['slug']); ?>" class="font-semibold text-blue-500 hover:underline">
                            Read more &rarr;
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <nav class="flex justify-between items-center mt-12" aria-label="Pagination">
                    <div>
                        <?php if ($page > 1): ?>
                            <a href="blog.php?page=<?php echo $page - 1; ?>"
                               class="inline-block bg-content-bg text-text-default px-4 py-2 rounded-lg shadow-md hover:bg-gray-100 dark:hover:bg-gray-700">
                                &larr; Previous
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <span class="text-text-secondary">
                        Page <?php echo $page; ?> of <?php echo $total_pages; ?>
                    </span>

                    <div>
                        <?php if ($page < $total_pages): ?>
                            <a href="blog.php?page=<?php echo $page + 1; ?>"
                               class="inline-block bg-content-bg text-text-default px-4 py-2 rounded-lg shadow-md hover:bg-gray-100 dark:hover:bg-gray-700">
                                Next &rarr;
                            </a>
                        <?php endif; ?>
                    </div>
                </nav>
            <?php endif; ?>

        <?php endif; ?>

    </div>
</main>

<?php
// Include the footer
require 'src/footer.php';
?>