<?php
// --- DEBUGGING: SHOW ALL ERRORS ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --- END DEBUGGING ---

session_start();

// --- Configuration ---
$admin_password = 'your_secret_password'; // !! CHANGE THIS !!
$pageTitle = "Blog Admin";
$pageDescription = "Admin panel to create new blog posts.";
$pageAuthor = "Blog Platform";

$message = '';
$message_type = ''; // 'success' or 'error'

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

// --- Login Handling ---
if (isset($_POST['password'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['loggedin'] = true;
        $message = 'Login successful!';
        $message_type = 'success';
    } else {
        $message = 'Incorrect password.';
        $message_type = 'error';
    }
}

// --- Logout Handling ---
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// --- Post Creation Handling ---
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (isset($_POST['title']) && isset($_POST['content'])) {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        if (empty($title) || empty($content)) {
            $message = 'Title and content cannot be empty.';
            $message_type = 'error';
        } else {
            try {
                // Generate a random, unique slug
                $slug = bin2hex(random_bytes(5)); // e.g., 'a8f5b'

                $db = getDB();
                $stmt = $db->prepare("INSERT INTO posts (slug, title, content) VALUES (:slug, :title, :content)");
                
                $stmt->bindParam(':slug', $slug);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':content', $content);
                
                $stmt->execute();

                $message = "New post created successfully! View it <a href='blog.php?post={$slug}' target='_blank' class='font-bold underline text-blue-300 hover:text-white'>here</a>.";
                $message_type = 'success';

            } catch (PDOException $e) {
                $message = 'Error creating post: ' . $e->getMessage();
                $message_type = 'error';
            }
        }
    }
}

// Include the header
require 'src/header.php';
?>

<!-- Main Content -->
<main class="container mx-auto px-4 py-12 min-h-[calc(100vh-300px)]">
    <div class="max-w-2xl mx-auto bg-content-bg text-text-default p-8 rounded-xl shadow-lg">

        <h1 class="text-3xl font-bold text-primary mb-6 text-center">
            Blog Admin
        </h1>

        <?php if ($message): ?>
            <div class="mb-6 p-4 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
            <!-- Login Form -->
            <form action="admin.php" method="POST">
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-text-secondary mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <button type="submit"
                        class="w-full bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200">
                    Login
                </button>
            </form>
        <?php else: ?>
            <!-- New Post Form -->
            <form action="admin.php" method="POST">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-text-secondary mb-2">Post Title</label>
                    <input type="text" id="title" name="title" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-text-secondary mb-2">Post Content</label>
                    <textarea id="content" name="content" rows="10" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-base-bg text-text-default focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                </div>
                <button type="submit"
                        class="w-full bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200">
                    Create Post
                </button>
            </form>
            <div class="text-center mt-6">
                <a href="admin.php?logout=true"
                   class="text-sm text-red-500 hover:underline">Logout</a>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php
// Include the footer
require 'src/footer.php';
?>