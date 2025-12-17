<?php
// search.php - Handles search queries
$query           = isset($_GET['q']) ? trim($_GET['q']) : '';
$pageTitle       = "Search Results for '$query' | Hesten's Learning";
$pageDescription = "Search results for learning materials.";

// Expanded Database of Content
$contentDatabase = [
    // Main Pages
    ['title' => 'Home', 'desc' => 'The main dashboard and starting point for your learning journey.', 'link' => '/', 'tags' => 'home start dashboard main'],
    ['title' => 'Learning Center', 'desc' => 'Access all grade levels and subjects in one place.', 'link' => '/learning.php', 'tags' => 'learning subjects grades classes'],
    ['title' => 'Assessment', 'desc' => 'Take quizzes and track your progress.', 'link' => '/assessment', 'tags' => 'quiz test exam assessment score'],
    ['title' => 'Library', 'desc' => 'Read books and access open source materials.', 'link' => '/library', 'tags' => 'library books reading study'],
    ['title' => 'Games', 'desc' => ' Educational games to make learning fun.', 'link' => '/games.php', 'tags' => 'games play fun interactive'],

    // Support Pages
    ['title' => 'For Students', 'desc' => 'Resources and guides specifically for students.', 'link' => '/students.php', 'tags' => 'students help guide tips'],
    ['title' => 'For Parents', 'desc' => 'Information for parents to help support their children.', 'link' => '/parents.php', 'tags' => 'parents guardians support monitoring'],
    ['title' => 'For Teachers', 'desc' => 'Lesson plans, keys, and teacher mode information.', 'link' => '/teachers.php', 'tags' => 'teachers educators lesson plans keys'],
    ['title' => 'Help Center', 'desc' => 'Get help with using the website and accessibility tools.', 'link' => '/help-center.php', 'tags' => 'help support faq contact questions'],
    ['title' => 'Contact Us', 'desc' => 'Reach out to the Hesten\'s Learning team.', 'link' => '/contact.php', 'tags' => 'contact email message reach'],
    ['title' => 'About Us', 'desc' => 'Our mission and story.', 'link' => '/about.php', 'tags' => 'about mission story team'],
    ['title' => 'Mission Statement', 'desc' => 'Our core values and goals for education.', 'link' => '/mission.php', 'tags' => 'mission values goals vision'],
    ['title' => 'Skills Dictionary', 'desc' => 'A glossary of skills and terms used in our curriculum.', 'link' => '/skills-dictionary.php', 'tags' => 'skills glossary dictionary terms definitions'],
    ['title' => 'Curriculum Overview', 'desc' => 'Detailed breakdown of what is covered in each grade.', 'link' => '/curriculum.php', 'tags' => 'curriculum syllabus standards'],
    ['title' => 'Academic Research', 'desc' => 'Research papers and academic resources.', 'link' => '/research', 'tags' => 'research papers academic science'],

    // Legal
    ['title' => 'Privacy Policy', 'desc' => 'How we handle your data.', 'link' => '/privacy-policy.php', 'tags' => 'privacy legal data policy'],
    ['title' => 'Terms of Use', 'desc' => 'Rules for using the site.', 'link' => '/terms-of-use.php', 'tags' => 'terms rules legal conditions'],

    // Levels (Mock Data for key levels)
    ['title' => 'Pre-K (Level A)', 'desc' => 'Counting objects, matching, sorting, and early foundations.', 'link' => '/Level/a.php', 'tags' => 'math counting sorting pre-k level a'],
    ['title' => 'Kindergarten', 'desc' => 'Basic addition, phonics, and reading readiness.', 'link' => '/learning.php?grade=kindergarten', 'tags' => 'math reading kindergarten'],
    ['title' => 'Grade 1', 'desc' => 'Sentence structure, subtraction, and basic science.', 'link' => '/learning.php?grade=grade-1', 'tags' => 'math ela grade 1'],
    ['title' => 'Grade 2', 'desc' => 'Multiplication intro, reading fluency.', 'link' => '/learning.php?grade=grade-2', 'tags' => 'math ela grade 2'],
    ['title' => 'High School Science', 'desc' => 'Biology, Chemistry, and Physics materials.', 'link' => '/learning.php?category=high', 'tags' => 'science high school biology chemistry physics'],
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

<main id="main-content" class="container mx-auto px-4 py-12 min-h-[60vh]">
    <div class="max-w-4xl mx-auto">
        <h1
            class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent mb-6 animate-fade-in-up">
            Search Results
        </h1>

        <!-- Search Input Repetition -->
        <form action="/search.php" method="GET" class="mb-10 animate-fade-in-up" style="animation-delay: 0.1s;">
            <div class="relative">
                <input type="text" name="q" value="<?php echo htmlspecialchars($query); ?>"
                    placeholder="Search again..."
                    class="w-full bg-content-bg border-2 border-gray-200 dark:border-gray-700 rounded-full py-4 pl-12 pr-4 text-lg focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/20 transition-all shadow-md">
                <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-xl"></i>
                <button type="submit"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-primary text-white px-6 py-2 rounded-full font-bold hover:bg-secondary transition-colors">Search</button>
            </div>
        </form>

        <p class="text-text-secondary mb-8 text-lg animate-fade-in-up" style="animation-delay: 0.2s;">
            <?php
            if ($query === '')
                echo "Please enter a search term above.";
            else
                echo count($results) . " result(s) found for \"<strong class='text-primary'>" . htmlspecialchars($query) . "</strong>\"";
            ?>
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 animate-fade-in-up" style="animation-delay: 0.3s;">
            <?php foreach ($results as $res) : ?>
                <article
                    class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-6 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group">
                    <h2 class="text-xl font-bold text-text-default mb-2 group-hover:text-primary transition-colors">
                        <a href="<?php echo $res['link']; ?>" class="hover:underline decoration-2 decoration-primary/50">
                            <?php echo htmlspecialchars($res['title']); ?>
                        </a>
                    </h2>
                    <p class="text-text-secondary mb-6 text-sm leading-relaxed">
                        <?php echo htmlspecialchars($res['desc']); ?>
                    </p>
                    <a href="<?php echo $res['link']; ?>"
                        class="inline-flex items-center gap-2 text-primary font-bold hover:gap-4 transition-all bg-primary/10 px-4 py-2 rounded-lg">
                        Visit Page <i class="fas fa-arrow-right"></i>
                    </a>
                </article>
            <?php endforeach; ?>

            <?php if (count($results) === 0 && $query !== '') : ?>
                <div
                    class="col-span-full text-center py-16 bg-white/50 dark:bg-black/20 rounded-3xl border-2 border-dashed border-gray-300 dark:border-gray-700">
                    <div
                        class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4 text-4xl text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="text-xl font-bold text-text-default mb-2">No matches found</h3>
                    <p class="text-text-secondary">We looked everywhere, but couldn't find what you were looking for.</p>
                    <div class="mt-8 flex justify-center gap-4">
                        <a href="/"
                            class="bg-primary text-white px-6 py-3 rounded-xl font-bold hover:bg-secondary transition-colors shadow-lg shadow-primary/30">Go
                            Home</a>
                        <a href="/learning.php"
                            class="bg-white dark:bg-gray-800 text-text-default px-6 py-3 rounded-xl font-bold hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors border border-gray-200 dark:border-gray-700">Browse
                            Content</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include 'src/footer.php'; ?>