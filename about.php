<?php
// ====================================================================
// PHP SETUP: Define dynamic variables for use in header.php and footer.php
// ====================================================================
$pageTitle       = "About Us - Hesten's Learning";
$pageDescription = "Learn about our mission, team, and history in empowering students with learning disabilities through personalized education.";
$pageKeywords    = "about us, mission, team, history, education, learning disabilities, personalized learning";
$pageAuthor      = "Hesten Allison";

// Include the header file, which contains the <html>, <head>, and opening <body> tags,
// the accessibility features, announcement bar, and the main navigation structure.
include 'src/header.php';
?>

<!-- ==================================================================== -->
<!-- MAIN CONTENT SECTION -->
<!-- NOTE: The header.php already handles the opening <body> and <header> -->
<!-- The content below starts the main page wrapper. -->
<!-- ==================================================================== -->

<!-- Hero Section -->
<div
    class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
    <!-- Abstract Background Shapes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <i class="fas fa-info-circle absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
        <i class="fas fa-users absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
    </div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <span
            class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-4 uppercase tracking-wider backdrop-blur-md shadow-sm">
            Our Story
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md">
            About Us
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            Empowering students with personalized education.
        </p>
    </div>
</div>

<main class="container mx-auto p-4 lg:p-8 min-h-[70vh] bg-content-bg shadow-xl rounded-base-rounded mb-8">

    <!-- Applying Tailwind classes from the header's custom config -->
    <div class="space-y-10 p-4">

        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Our Mission</h2>
            <p class="text-text-default leading-loose">Our mission is to provide the best services to our customers and
                ensure their satisfaction. We strive to innovate and continuously improve our offerings to meet the
                evolving needs of our clients. Specifically, we focus on **empowering students with learning
                disabilities** through personalized and research-backed educational experiences. <a href="/mission.php"
                    class="text-primary font-bold hover:underline ml-1">Read our full Mission & Vision &rsaquo;</a></p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Our Team</h2>
            <p class="text-text-default leading-loose">We have a diverse team of professionals dedicated to achieving
                our mission. Our team members come from various backgrounds and bring a wealth of experience and
                expertise to the table, including educators, technologists, and learning specialists. We believe in
                fostering a collaborative and inclusive work environment where everyone can thrive.</p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Our History</h2>
            <p class="text-text-default leading-loose">Founded in 2023, we have grown rapidly and continue to expand our
                reach. Our journey began with a small group of passionate individuals who shared a common vision for
                accessible education. Over the years, we have achieved numerous milestones and have built a strong
                reputation in the field of inclusive learning.</p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Our Values</h2>
            <p class="text-text-default leading-loose">Integrity, excellence, and customer focus are at the core of
                everything we do. We are committed to upholding the highest standards of professionalism and ethical
                conduct. Our values guide our actions and decisions, ensuring that we always act in the best interests
                of our clients and stakeholders.</p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Contact Us</h2>
            <p class="text-text-default leading-loose">If you have any questions or would like to learn more about our
                services, please do not hesitate to contact us. You can reach us via email at <a
                    href="mailto:admin@hestena62.com"
                    class="text-accent hover:underline font-medium">admin@hestena62.com</a>. We look forward to hearing
                from you!</p>
        </section>

    </div>
</main>

<?php
// Include the footer file, which contains the footer element, modals, 
// and the closing </body> and </html> tags.
// It also contains the comprehensive site-wide JavaScript logic.
include 'src/footer.php';
?>