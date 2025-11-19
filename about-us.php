<?php
  // ====================================================================
  // PHP SETUP: Define dynamic variables for use in header.php and footer.php
  // ====================================================================
  $pageTitle = "About Us - Hesten's Learning";
  $pageDescription = "Learn about our mission, team, and history in empowering students with learning disabilities through personalized education.";
  $pageKeywords = "about us, mission, team, history, education, learning disabilities, personalized learning";
  $pageAuthor = "Hesten Allison";
  
  // Include the header file, which contains the <html>, <head>, and opening <body> tags,
  // the accessibility features, announcement bar, and the main navigation structure.
  include 'src/header.php';
?>

<!-- ==================================================================== -->
<!-- MAIN CONTENT SECTION -->
<!-- NOTE: The header.php already handles the opening <body> and <header> -->
<!-- The content below starts the main page wrapper. -->
<!-- ==================================================================== -->

<main class="container mx-auto p-4 lg:p-8 min-h-[70vh] bg-content-bg shadow-xl rounded-base-rounded mt-4 lg:mt-8 mb-8">
    <header class="mb-8 p-4 border-b border-text-secondary/20">
        <!-- Using text-primary for the main heading as defined in the theme variables -->
        <h1 class="text-4xl font-extrabold text-primary">About Us</h1>
    </header>
    
    <!-- Applying Tailwind classes from the header's custom config -->
    <div class="space-y-10 p-4">
        
        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Our Mission</h2>
            <p class="text-text-default leading-loose">Our mission is to provide the best services to our customers and ensure their satisfaction. We strive to innovate and continuously improve our offerings to meet the evolving needs of our clients. Specifically, we focus on **empowering students with learning disabilities** through personalized and research-backed educational experiences.</p>
        </section>
        
        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Our Team</h2>
            <p class="text-text-default leading-loose">We have a diverse team of professionals dedicated to achieving our mission. Our team members come from various backgrounds and bring a wealth of experience and expertise to the table, including educators, technologists, and learning specialists. We believe in fostering a collaborative and inclusive work environment where everyone can thrive.</p>
        </section>
        
        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Our History</h2>
            <p class="text-text-default leading-loose">Founded in 2023, we have grown rapidly and continue to expand our reach. Our journey began with a small group of passionate individuals who shared a common vision for accessible education. Over the years, we have achieved numerous milestones and have built a strong reputation in the field of inclusive learning.</p>
        </section>
        
        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Our Values</h2>
            <p class="text-text-default leading-loose">Integrity, excellence, and customer focus are at the core of everything we do. We are committed to upholding the highest standards of professionalism and ethical conduct. Our values guide our actions and decisions, ensuring that we always act in the best interests of our clients and stakeholders.</p>
        </section>
        
        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">Contact Us</h2>
            <p class="text-text-default leading-loose">If you have any questions or would like to learn more about our services, please do not hesitate to contact us. You can reach us via email at <a href="mailto:admin@hestena62.com" class="text-accent hover:underline font-medium">admin@hestena62.com</a>. We look forward to hearing from you!</p>
        </section>
        
    </div>
</main>

<?php
  // Include the footer file, which contains the footer element, modals, 
  // and the closing </body> and </html> tags.
  // It also contains the comprehensive site-wide JavaScript logic.
  include 'src/footer.php';
?>